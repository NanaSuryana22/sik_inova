<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Wilayah;
use Session;
use App\Http\Requests\KotaRequest;
use Illuminate\Http\Request;

class KotaController extends Controller
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
        $wilayah = Wilayah::find($request->wilayah_id);
        return view('kota.create')->with('wilayah', $wilayah);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KotaRequest $request)
    {
        $wilayah = Wilayah::find($request->wilayah_id);
        $kota    = new Kota;
        $kota->name         = $request->name;
        $kota->description  = $request->description;
        $kota->id_wilayah   = $request->wilayah_id;
        $kota->save();

        Session::flash("notice", "Data Kota Baru Berhasil Ditambahkan.");
        return redirect()->route("wilayah.show", $wilayah);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kota::find($id);
        return view('kota.edit')->with('kota', $kota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(KotaRequest $request, $id)
    {
        $kota    = Kota::find($id);
        $wilayah = Wilayah::find($kota->id_wilayah);

        $kota->name = $request->name;
        $kota->description = $request->description;
        $kota->id_wilayah  = $request->wilayah_id;
        $kota->save();

        Session::flash("notice", "Kota terpilih Berhasil Diubah.");
        return redirect()->route("wilayah.show", $wilayah);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::find($id);
        $wilayah = Wilayah::find($kota->id_wilayah);
        Kota::destroy($id);
        Session::flash("notice", "Kota terpilih berhasil dihapus");
        return redirect()->route("wilayah.show", $wilayah);
    }
}
