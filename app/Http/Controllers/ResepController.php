<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Obat;
use App\Models\Pengobatan;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\ResepRequest;

class ResepController extends Controller
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
        return view('resep.create')->with('pengobatan', $pengobatan);
    }

    public function selectObat(Request $request)
    {
    	$obat = [];

        if($request->has('q')){
            $search   = $request->q;
            $obat     = Obat::select("id", "name")
                                ->where('name', 'LIKE', "%$search%")
                                ->orWhere('description', 'LIKE', "%$search%")
                                ->get();
        }
        return response()->json($obat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResepRequest $request)
    {
        $pengobatan = Pengobatan::find($request->pengobatan_id);

        $resep = new Resep;
        $resep->pengobatan_id = $request->pengobatan_id;
        $resep->obat_id = $request->obat_id;
        $resep->harga_obat = Obat::find($request->obat_id)->harga;
        $resep->keterangan = $request->keterangan;
        $resep->jumlah_obat = $request->jumlah_obat;
        $resep->dosis = $request->dosis;
        $resep->save();

        $pengobatan->total_biaya_pengobatan = $pengobatan->total_biaya_pengobatan + ($resep->harga_obat*$resep->jumlah_obat);
        $pengobatan->save();

        Session::flash("notice", "Resep baru berhasil ditambahkan.");
        return redirect()->route("pengobatan.show", $pengobatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function show(Resep $resep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        return view('resep.edit')->with('resep', $resep);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function update(ResepRequest $request, $id)
    {
        $resep = Resep::find($id);
        $pengobatan = Pengobatan::find($request->pengobatan_id);
        $pengobatan->total_biaya_pengobatan = $pengobatan->total_biaya_pengobatan - ($resep->harga_obat*$resep->jumlah_obat);
        $pengobatan->save();

        $resep->pengobatan_id = $request->pengobatan_id;
        $resep->obat_id = $request->obat_id;
        $resep->harga_obat = Obat::find($request->obat_id)->harga;
        $resep->keterangan = $request->keterangan;
        $resep->jumlah_obat = $request->jumlah_obat;
        $resep->dosis = $request->dosis;
        $resep->save();

        $pengobatan->total_biaya_pengobatan = $pengobatan->total_biaya_pengobatan + ($resep->harga_obat*$resep->jumlah_obat);
        $pengobatan->save();

        Session::flash("notice", "Resep terpilih berhasil diubah.");
        return redirect()->route("pengobatan.show", $pengobatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resep      = Resep::find($id);
        $pengobatan = Pengobatan::find($resep->pengobatan_id);
        $pengobatan->total_biaya_pengobatan = $pengobatan->total_biaya_pengobatan - ($resep->harga_obat*$resep->jumlah_obat);
        $pengobatan->save();

        Resep::destroy($id);
        Session::flash("notice", "Pengobatan terpilih berhasil diubah.");
        return redirect()->route("pengobatan.show", $pengobatan);
    }
}
