@extends('layout\app')
@section('title', 'Halaman Detail Data Obat')
@section('master', 'active')
@section('obat', 'active')
@section('content')
<div class="container-fluid">
    @include('layout.notice')
    <div class="block-header">
        <h2>Detail Informasi Obat</h2>
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
                                <dt class="col-sm-4">Nama</dt>
                                <dd class="col-sm-8">{{ $obat->name }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Harga</dt>
                                <dd class="col-sm-8">@currency($obat->harga)</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Deskripsi</dt>
                                <dd class="col-sm-8">{{ $obat->description }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Dibuat</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($obat->created_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Diubah</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($obat->updated_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </dl>
                            <form action="{{ route('obat.destroy', $obat->id) }}" method="post">
                                <a href="{{ route('obat.edit',$obat->id) }}" class="btn btn-warning btn-md">
                                    <i class="fa fa-pencil" title="Edit"></i>
                                </a>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-md btn-show-margin"
                                    onclick="return confirm('Yakin ingin menghapus data obat Ini ?')">
                                    <i class="fa fa-trash" title="Hapus"></i>
                                </button>
                                <a href="{{ route('obat.index') }}" class="pull-right btn btn-primary btn-md">
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
