<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Role;
use App\Models\Wilayah;
use App\Models\Kota;
use Illuminate\Http\Request;
use App\HTTP\Requests\EmployeeRequest;
use Illuminate\Support\Str;
use Session;

class EmployeeController extends Controller
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
        $employees = Employee::orderBy('id', 'asc')->paginate(10);
        return view('pegawai.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('pegawai.create')->with('roles', $roles);
    }

    public function selectUser(Request $request)
    {
        $users = [];

        if($request->has('q')){
            $search = $request->q;
            $users = User::select("id", "name")
                            ->where('name', 'LIKE', "%$search%")
                            ->orWhere('email', 'LIKE', "%$search%")
                            ->get();
        }
        return response()->json($users);
    }

    public function selectKota(Request $request)
    {
        $cities = [];

        if($request->has('q')){
            $search = $request->q;
            $cities = Kota::select("id", "name")
                            ->where('name', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%")
                            ->get();
        }
        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('photo');
        $dp_image = 'photo_pegawai/';
        $image_name = Str::random(6).'_'.$image->getClientOriginalName();
        $image->move($dp_image, $image_name);

        $pegawai = new Employee;
        $pegawai->user_id = $request->user_id;
        $pegawai->id_card = $request->id_card;
        $pegawai->alamat = $request->alamat;
        $pegawai->wilayah_id = Kota::find($request->kota_id)->id_wilayah;
        $pegawai->kota_id = $request->kota_id;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->pendidikan_terakhir = $request->pendidikan_terakhir;
        if ($request->hasFile('photo')) {
            $pegawai->photo = $dp_image . $image_name;
        }
        $pegawai->save();

        Session::flash("notice", "Pegawai baru berhasil ditambahkan.");
        return redirect()->route("pegawai.show", $pegawai);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('pegawai.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $roles = Role::all();
        return view('pegawai.edit')->with('employee', $employee)->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Employee::find($id);
        if (empty($request->file('photo'))) {
            $image_n = $pegawai->photo;
        }
        else {
            $image = $request->file('photo');
            $dp_image = 'photo_pegawai/';
            $image_name = Str::random(6).'_'.$image->getClientOriginalName();
            $image->move($dp_image, $image_name);
            $image_n = $dp_image . $image_name;
        }

        $pegawai->user_id = $request->user_id;
        $pegawai->id_card = $request->alamat;
        $pegawai->wilayah_id = $request->wilayah_id;
        $pegawai->kota_id = $request->kota_id;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->pendidikan_terakhir = $request->pendidikan_terakhir;
        $pegawai->photo = $image_n;
        $pegawai->save();

        Session::flash("notice", "Pegawai terpilih berhasil diubah.");
        return redirect()->route("pegawai.show", $pegawai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        Session::flash("notice", "Pegawai terpilih berhasil dihapus");
        return redirect()->route("pegawai.index");
    }
}
