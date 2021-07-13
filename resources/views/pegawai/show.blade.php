@extends('layout\app')
@section('title', 'Halaman Detail Informasi Pegawai')
@section('master', 'active')
@section('pegawai', 'active')
@section('content')
<div class="container-fluid">
    @include('layout.notice')
    <div class="block-header">
        <h2>Detail Informasi Pegawai</h2>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-12">
                            <img src="{{ url($employee->photo) }}" alt="..." class="img-thumbnail">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <br />
                            <dl class="row clearfix">
                                <dt class="col-sm-4">Nama Pegawai</dt>
                                <dd class="col-sm-8">{{ $employee->user->name }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Jabatan</dt>
                                <dd class="col-sm-8">{{ $employee->user->role->name }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Nomor Identitas</dt>
                                <dd class="col-sm-8">{{ $employee->id_card }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </dl>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <br>
                            <dl class="row clearfix">
                                <dt class="col-sm-4">Jenis Kelamin</dt>
                                <dd class="col-sm-8">{{ $employee->jenis_kelamin }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Alamat</dt>
                                <dd class="col-sm-8">{{ $employee->alamat }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Kota / Wilayah</dt>
                                <dd class="col-sm-8">{{ $employee->kota->name }} / {{ $employee->wilayah->name }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Pendidikan Terakhir</dt>
                                <dd class="col-sm-8">{{ $employee->pendidikan_terakhir }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Dibuat</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($employee->created_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Diubah</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($employee->updated_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </dl>
                            <form action="{{ route('pegawai.destroy', $employee->id) }}" method="post">
                                <a href="{{ route('pegawai.edit',$employee->id) }}" class="btn btn-warning btn-md">
                                    <i class="fa fa-pencil" title="Edit"></i>
                                </a>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-md btn-show-margin"
                                    onclick="return confirm('Yakin ingin menghapus data Pegawai Ini ?')">
                                    <i class="fa fa-trash" title="Hapus"></i>
                                </button>
                                <a href="{{ url()->previous() }}" class="pull-right btn btn-primary btn-md">
                                    <i class="fa fa-mail-reply" title="Kembali"></i>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
