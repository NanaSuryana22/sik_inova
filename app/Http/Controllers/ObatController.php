<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Obat;
use Illuminate\Http\Request;
use App\Http\Requests\ObatRequest;

class ObatController extends Controller
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
        $obats = Obat::orderBy('id', 'asc')->paginate(10);
        return view('obat.index')->with('obats', $obats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObatRequest $request)
    {
        $obat = new Obat;
        $obat->name = $request->name;
        $obat->description = $request->description;
        $obat->harga = $request->harga;
        $obat->save();

        Session::flash("notice", "Obat $obat->name berhasil ditambahkan.");
        return redirect()->route("obat.show", $obat);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        return view('obat.show')->with('obat', $obat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        return view('obat.edit')->with('obat', $obat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(ObatRequest $request, $id)
    {
        $obat = Obat::find($id);
        $obat->name = $request->name;
        $obat->description = $request->description;
        $obat->harga = $request->harga;
        $obat->save();

        Session::flash("notice", "Obat $obat->name berhasil diedit.");
        return redirect()->route("obat.show", $obat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Obat::destroy($id);
        Session::flash("notice", "Obat terpilih berhasil dihapus");
        return redirect()->route("obat.index");
    }
}
