<?php

namespace App\Http\Controllers;

use App\Models\Pengobatan;
use App\Models\PengobatanDetail;
use App\Models\Resep;
use Illuminate\Http\Request;
use Session;
use App\Models\Pendaftaran;
use App\Http\Requests\PengobatanRequest;
use Illuminate\Support\Facades\DB;

class PengobatanController extends Controller
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
        return view('pengobatan.index')->with('pengobatans', $pengobatans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cari = $request->cari;
        $pendaftaran = DB::table('pendaftaran')->join('pasien', 'pendaftaran.pasien_id', '=', 'pasien.id')
                                ->select('pendaftaran.no_pasien', 'pasien.nama', 'pasien.jenis_kelamin', 'pendaftaran.tanggal_daftar','pendaftaran.keluhan_pasien')
                                ->where('pendaftaran.status', '=', 'Dalam Antrian')
                                ->orwhere('pendaftaran.no_pasien','like',"%".$cari."%")->orWhere('pasien.nama', 'like',"%".$cari."%")
                                ->get();
        // dd($pendaftaran);
        return view('pengobatan.create')->with('pendaftaran', $pendaftaran);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengobatanRequest $request)
    {
        $pengobatan = new Pengobatan;
        $pengobatan->pendaftaran_id = $request->pendaftaran_id;
        $pengobatan->pasien_id = Pendaftaran::find($request->pendaftaran_id)->pasien_id;
        $pengobatan->total_biaya_pengobatan = 0;
        $pengobatan->status_pembayaran = 'Ditangguhkan';
        $pengobatan->save();

        $pendaftaran = Pendaftaran::find($pengobatan->pendaftaran_id);
        $pendaftaran->status = 'Sedang Dalam Pemeriksaan Dokter';
        $pendaftaran->save();

        Session::flash("notice", "Data Pengobatan berhasil ditambahkan.");
        return redirect()->route("pengobatan.show", $pengobatan);
    }

    public function selectPendaftaran(Request $request)
    {
    	$pasien = [];

        if($request->has('q')){
            $search = $request->q;
            $pasien = Pendaftaran::where('status', 'Dalam Antrian')->select("id", "no_pasien")
                                ->where('no_pasien', 'LIKE', "%$search%")
                                ->get();
        }
        return response()->json($pasien);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengobatan  $pengobatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengobatan $pengobatan)
    {
        $pengobatan_details = PengobatanDetail::where('pengobatan_id', $pengobatan->id)->paginate(10);
        $reseps = Resep::where('pengobatan_id', $pengobatan->id)->paginate(10);
        $total_biaya_resep = DB::select('SELECT (SELECT SUM(a.harga_obat*a.jumlah_obat) FROM resep a, pengobatan b WHERE a.pengobatan_id = '.$pengobatan->id.') as total_biaya_obat');
        return view('pengobatan.show')->with('pengobatan', $pengobatan)->with('pengobatan_details', $pengobatan_details)->with('reseps', $reseps)->with('total_biaya_resep', $total_biaya_resep);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengobatan  $pengobatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengobatan $pengobatan)
    {
        return view('pengobatan.edit')->with('pengobatan', $pengobatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengobatan  $pengobatan
     * @return \Illuminate\Http\Response
     */
    public function update(PengobatanRequest $request, $id)
    {
        $pengobatan = Pengobatan::find($id);
        $pengobatan->pendaftaran_id = $request->pendaftaran_id;
        $pengobatan->pasien_id = Pendaftaran::find($request->pendaftaran_id)->pasien_id;
        $pengobatan->save();

        Session::flash("notice", "Data Pengobatan berhasil diubah.");
        return redirect()->route("pengobatan.show", $pengobatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengobatan  $pengobatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengobatan::destroy($id);
        Session::flash("notice", "Data Pengobatan terpilih berhasil dihapus.");
        return redirect()->route("pengobatan.index");
    }
}
