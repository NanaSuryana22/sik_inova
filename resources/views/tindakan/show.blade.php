@extends('layout\app')
@section('title', 'Halaman Detail Data Tindakan')
@section('master', 'active')
@section('tindakan', 'active')
@section('content')
<div class="container-fluid">
    @include('layout.notice')
    <div class="block-header">
        <h2>Detail Informasi Tindakan</h2>
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
                                <dd class="col-sm-8">{{ $tindakan->name }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Harga</dt>
                                <dd class="col-sm-8">@currency($tindakan->harga)</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Deskripsi</dt>
                                <dd class="col-sm-8">{{ $tindakan->description }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Dibuat</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($tindakan->created_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Diubah</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($tindakan->updated_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </dl>
                            <form action="{{ route('tindakan.destroy', $tindakan->id) }}" method="post">
                                <a href="{{ route('tindakan.edit',$tindakan->id) }}" class="btn btn-warning btn-md">
                                    <i class="fa fa-pencil" title="Edit"></i>
                                </a>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-md btn-show-margin"
                                    onclick="return confirm('Yakin ingin menghapus data tindakan Ini ?')">
                                    <i class="fa fa-trash" title="Hapus"></i>
                                </button>
                                <a href="{{ route('tindakan.index') }}" class="pull-right btn btn-primary btn-md">
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
