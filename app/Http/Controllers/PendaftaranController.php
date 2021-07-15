<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Pendaftaran;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Requests\PendaftaranRequest;
use Carbon\Carbon;

class PendaftaranController extends Controller
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
        $registers = Pendaftaran::orderBy('id', 'asc')->paginate(10);
        return view('pendaftaran.index')->with('registers', $registers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pendaftaran_terakhir = isset(Pendaftaran::all()->last()->id)+1;
        $format_pendaftaran = Carbon::now()->format('Ymd');
        return view('pendaftaran.create')->with('pendaftaran_terakhir', $pendaftaran_terakhir)
                                         ->with('format_pendaftaran', $format_pendaftaran);
    }

    public function selectSearch(Request $request)
    {
    	$pasien = [];

        if($request->has('q')){
            $search = $request->q;
            $pasien = Pasien::select("id", "nama")
                            ->where('nama', 'LIKE', "%$search%")
                            ->orWhere('nik', 'LIKE', "%$search%")
                            ->get();
        }
        return response()->json($pasien);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendaftaranRequest $request)
    {
        $daftar = new Pendaftaran;
        $daftar->pasien_id = $request->pasien_id;
        $daftar->tanggal_daftar = $request->tanggal_daftar;
        $daftar->keluhan_pasien = $request->keluhan_pasien;
        $daftar->no_pasien = $request->no_pasien;
        $daftar->status = 'Dalam Antrian';
        $daftar->save();

        Session::flash("notice", "Pendaftaran pasien baru berhasil ditambahkan.");
        return redirect()->route("pendaftaran.show", $daftar);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        $now = Carbon::now();
        $b_day = Carbon::parse($pendaftaran->pasien->tanggal_lahir); // Tanggal Lahir
        $umur = $b_day->diffInYears($now);
        return view('pendaftaran.show')->with('pendaftaran', $pendaftaran)->with('umur', $umur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('pendaftaran.edit')->with('pendaftaran', $pendaftaran);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(PendaftaranRequest $request, $id)
    {
        $daftar = Pendaftaran::find($id);
        $daftar->pasien_id = $request->pasien_id;
        $daftar->tanggal_daftar = $request->tanggal_daftar;
        $daftar->keluhan_pasien = $request->keluhan_pasien;
        $daftar->no_pasien = $request->no_pasien;
        $daftar->status = 'Dalam Antrian';
        $daftar->save();

        Session::flash("notice", "Data pendaftaran berhasil diubah.");
        return redirect()->route("pendaftaran.show", $daftar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pendaftaran::destroy($id);
        Session::flash("notice", "Data pendaftaran terpilih berhasil dihapus.");
        return redirect()->route("pendaftaran.index");
    }
}
