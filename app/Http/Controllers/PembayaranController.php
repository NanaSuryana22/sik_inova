<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengobatan;
use Session;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\DB;
use App\Models\PengobatanDetail;
use App\Models\Resep;
use Carbon\Carbon;

class PembayaranController extends Controller
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
        $pengobatans = Pengobatan::orderBy('id', 'asc')->paginate(10);
        return view('pembayaran.index')->with('pengobatans', $pengobatans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengobatan = Pengobatan::find($id);
        $pengobatan_details = PengobatanDetail::where('pengobatan_id', $pengobatan->id)->paginate(10);
        $reseps = Resep::where('pengobatan_id', $pengobatan->id)->paginate(10);
        $total_biaya_resep = DB::select('SELECT (SELECT SUM(a.harga_obat*a.jumlah_obat) from resep a WHERE a.pengobatan_id = '.$pengobatan->id.') AS total_biaya_obat');
        return view('pembayaran.show')->with('pengobatan', $pengobatan)->with('pengobatan_details', $pengobatan_details)->with('reseps', $reseps)->with('total_biaya_resep', $total_biaya_resep);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengobatan = Pengobatan::find($id);
        $pengobatan->status_pembayaran = 'Lunas';
        $pengobatan->tanggal_pembayaran = Carbon::now();
        $pengobatan->save();

        $pendaftaran = Pendaftaran::find($pengobatan->pendaftaran_id);
        $pendaftaran->status = 'Selesai';
        $pendaftaran->save();

        Session::flash("notice", "Pembayaran berhasil dilakukan.");
        return redirect()->route("pembayaran.show", $pengobatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
