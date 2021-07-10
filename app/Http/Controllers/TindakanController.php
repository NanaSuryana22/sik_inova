<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Tindakan;
use Illuminate\Http\Request;
use App\Http\Requests\TindakanRequest;

class TindakanController extends Controller
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
        $tindakans = Tindakan::orderBy('id', 'asc')->paginate(10);
        return view('tindakan.index')->with('tindakans', $tindakans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tindakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TindakanRequest $request)
    {
        $tindakan = new Tindakan;
        $tindakan->name = $request->name;
        $tindakan->description = $request->description;
        $tindakan->harga = $request->harga;
        $tindakan->save();

        Session::flash("notice", "Data tindakan berhasil ditambahkan.");
        return redirect()->route("tindakan.show", $tindakan);
    }

    public function show(Tindakan $tindakan)
    {
        return view('tindakan.show')->with('tindakan', $tindakan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tindakan $tindakan)
    {
        return view('tindakan.edit')->with('tindakan', $tindakan);
    }


    public function update(TindakanRequest $request, $id)
    {
        $tindakan = Tindakan::find($id);
        $tindakan->name = $request->name;
        $tindakan->description = $request->description;
        $tindakan->harga = $request->harga;
        $tindakan->save();

        Session::flash("notice", "Data tindakan terpilih berhasil diedit.");
        return redirect()->route("tindakan.show", $tindakan);
    }

    public function destroy($id)
    {
        Tindakan::destroy($id);
        Session::flash("notice", "Data tindakan terpilih berhasil dihapus");
        return redirect()->route("tindakan.index");
    }
}
