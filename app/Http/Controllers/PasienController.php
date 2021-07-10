<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Requests\PasienRequest;

class PasienController extends Controller
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
        $patients = Pasien::orderBy('id', 'asc')->paginate(10);
        return view('pasien.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasien = new Pasien;
        $pasien->nama = $request->name;
        $pasien->nik = $request->nik;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->tempat_lahir = $request->tempat_lahir;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->no_handphone = $request->no_handphone;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        Session::flash("notice", "Pasien bernama $pasien->nama berhasil ditambahkan.");
        return redirect()->route("pasien.show", $pasien);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        return view('pasien.show')->with('pasien', $pasien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit')->with('pasien', $pasien);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        $pasien->nama = $request->name;
        $pasien->nik = $request->nik;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->tempat_lahir = $request->tempat_lahir;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->no_handphone = $request->no_handphone;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        Session::flash("notice", "Pasien bernama $pasien->nama berhasil diubah.");
        return redirect()->route("pasien.show", $pasien);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::destroy($id);
        Session::flash("notice", "Pasien terpilih berhasil dihapus");
        return redirect()->route("pasien.index");
    }
}
