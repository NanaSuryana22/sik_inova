<?php

namespace App\Http\Controllers;

use App\Models\PengobatanDetail;
use App\Models\Pengobatan;
use App\Models\Tindakan;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\PengobatanDetailRequest;

class PengobatanDetailController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pengobatan = Pengobatan::find($request->pengobatan_id);
        return view('pengobatan_detail.create')->with('pengobatan', $pengobatan);
    }

    public function selectTindakan(Request $request)
    {
    	$tindakan = [];

        if($request->has('q')){
            $search   = $request->q;
            $tindakan = Tindakan::select("id", "name")
                                ->where('name', 'LIKE', "%$search%")
                                ->orWhere('description', 'LIKE', "%$search%")
                                ->get();
        }
        return response()->json($tindakan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengobatanDetailRequest $request)
    {
        $pengobatan = Pengobatan::find($request->pengobatan_id);

        $pengobatanDetail = new PengobatanDetail;
        $pengobatanDetail->pengobatan_id = $request->pengobatan_id;
        $pengobatanDetail->tindakan_id = $request->tindakan_id;
        $pengobatanDetail->biaya_tindakan = Tindakan::find($request->tindakan_id)->harga;
        $pengobatanDetail->keterangan = $request->keterangan;
        $pengobatanDetail->save();

        $pengobatan->total_biaya_pengobatan = $pengobatan->total_biaya_pengobatan + $pengobatanDetail->biaya_tindakan;
        $pengobatan->save();

        Session::flash("notice", "Pengobatan untuk biaya tindakan baru berhasil ditambahkan.");
        return redirect()->route("pengobatan.show", $pengobatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengobatanDetail  $pengobatanDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PengobatanDetail $pengobatanDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengobatanDetail  $pengobatanDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PengobatanDetail $pengobatanDetail)
    {
        return view('pengobatan_detail.edit')->with('pengobatan_detail', $pengobatanDetail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengobatanDetail  $pengobatanDetail
     * @return \Illuminate\Http\Response
     */
    public function update(PengobatanDetailRequest $request, $id)
    {
        $pengobatanDetail = PengobatanDetail::find($id);
        $pengobatan = Pengobatan::find($pengobatanDetail->pengobatan_id);

        // mengurangi biaya tindakan pada biaya pengobatan
        $pengobatan->total_biaya_pengobatan = $pengobatan->total_biaya_pengobatan - $pengobatanDetail->biaya_tindakan;
        $pengobatan->save();

        $pengobatanDetail->pengobatan_id = $request->pengobatan_id;
        $pengobatanDetail->tindakan_id = $request->tindakan_id;
        $pengobatanDetail->biaya_tindakan = Tindakan::find($request->tindakan_id)->harga;
        $pengobatanDetail->keterangan = $request->keterangan;
        $pengobatanDetail->save();

        $pengobatan->total_biaya_pengobatan = $pengobatan->total_biaya_pengobatan + $pengobatanDetail->biaya_tindakan;
        $pengobatan->save();

        Session::flash("notice", "Pengobatan untuk biaya tindakan terpilih berhasil diubah.");
        return redirect()->route("pengobatan.show", $pengobatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengobatanDetail  $pengobatanDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengobatan = Pengobatan::find(PengobatanDetail::find($id)->pengobatan_id);
        $pengobatan->total_biaya_pengobatan = $pengobatan->total_biaya_pengobatan - PengobatanDetail::find($id)->biaya_tindakan;
        $pengobatan->save();
        PengobatanDetail::destroy($id);
        Session::flash("notice", "Pengobatan terpilih berhasil diubah.");
        return redirect()->route("pengobatan.show", $pengobatan);
    }
}
