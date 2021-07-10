<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\Kota;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\WilayahRequest;

class WilayahController extends Controller
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
        $wilayahs = Wilayah::orderBy('id', 'asc')->paginate(10);
        return view('wilayah.index')->with('wilayahs', $wilayahs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wilayah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WilayahRequest $request)
    {
        $wilayah = new Wilayah;
        $wilayah->name         = $request->name;
        $wilayah->description  = $request->description;
        $wilayah->save();

        Session::flash("notice", "Data Wilayah Baru Berhasil Dibuat.");
        return redirect()->route("wilayah.show", $wilayah);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(Wilayah $wilayah)
    {
        $cities = Kota::where('id_wilayah', $wilayah->id)->paginate(10);
        return view('wilayah.show', compact('wilayah'))->with('cities', $cities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit(Wilayah $wilayah)
    {
        return view('wilayah.edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(WilayahRequest $request, $id)
    {
        $wilayah = Wilayah::find($id);
        $wilayah->name = $request->name;
        $wilayah->description = $request->description;
        $wilayah->save();

        Session::flash("notice", "Data Wilayah terpilih Berhasil Diubah.");
        return redirect()->route("wilayah.show", $wilayah);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kota::where('id_wilayah', $id)->delete();
        Wilayah::destroy($id);
        Session::flash("notice", "Wilayah terpilih berhasil dihapus");
        return redirect()->route("wilayah.index");
    }
}
