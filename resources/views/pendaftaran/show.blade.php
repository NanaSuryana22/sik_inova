@extends('layout\app')
@section('title', 'Halaman Detail Informasi Pendaftaran')
@section('transaksi', 'active')
@section('pendaftaran', 'active')
@section('content')
<div class="container-fluid">
    @include('layout.notice')
    <div class="block-header">
        <h2>Detail Informasi Pendaftaran</h2>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-12 col-sm-12">
                            <br />
                            <dl class="row clearfix">
                                <dt class="col-sm-4">No. Pendaftaran</dt>
                                <dd class="col-sm-8">{{ $pendaftaran->no_pasien }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Nama Pasien</dt>
                                <dd class="col-sm-8">{{ $pendaftaran->pasien->nama }} - {{ $umur }} Tahun</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Jenis Kelamin</dt>
                                <dd class="col-sm-8">{{ $pendaftaran->pasien->jenis_kelamin }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Daftar</dt>
                                <dd class="col-sm-8">{{ Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Keluhan Pasien</dt>
                                <dd class="col-sm-8">{{ $pendaftaran->keluhan_pasien }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Status</dt>
                                <dd class="col-sm-8">{{ $pendaftaran->status }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Dibuat</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($pendaftaran->created_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Diubah</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($pendaftaran->updated_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </dl>
                            <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="post">
                                <a href="{{ route('pendaftaran.edit',$pendaftaran->id) }}" class="btn btn-warning btn-md">
                                    <i class="fa fa-pencil" title="Edit"></i>
                                </a>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-md btn-show-margin"
                                    onclick="return confirm('Yakin ingin menghapus pendaftaran Ini ?')">
                                    <i class="fa fa-trash" title="Hapus"></i>
                                </button>
                                <a href="{{ route('pendaftaran.index') }}" class="pull-right btn btn-primary btn-md">
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
