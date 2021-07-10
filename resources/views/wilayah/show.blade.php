@extends('layout\app')
@section('title', 'Halaman Detail Wilayah')
@section('master', 'active')
@section('wilayah', 'active')
@section('content')
<div class="container-fluid">
    @include('layout.notice')
    <div class="block-header">
        <h2>Detail Informasi Wilayah</h2>
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
                                <dd class="col-sm-8">{{ $wilayah->name }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Deskripsi</dt>
                                <dd class="col-sm-8">{{ $wilayah->description }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Dibuat</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($wilayah->created_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Diubah</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($wilayah->updated_at)->format('d-m-Y') }}</dd>
                            </dl>
                            <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingOne_1">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion_1"
                                                href="#collapseOne_1" aria-expanded="true"
                                                aria-controls="collapseOne_1">
                                                Data Kota
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel"
                                        aria-labelledby="headingOne_1">
                                        <div class="panel-body">
                                            <a href="{{ route('kota.create', ['wilayah_id' => $wilayah->id]) }}" class="btn btn-sm btn-info btn-jarak">Tambah Data Kota</a>
                                            @if (isset($cities))
                                                @include('wilayah.data_kota')
                                            @else
                                                Data Kota Masih Kosong
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('wilayah.destroy', $wilayah->id) }}" method="post">
                                <a href="{{ route('wilayah.edit',$wilayah->id) }}" class="btn btn-warning btn-md">
                                    <i class="fa fa-pencil" title="Edit"></i>
                                </a>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-md btn-show-margin"
                                    onclick="return confirm('Yakin ingin menghapus Wilayah Ini ?')">
                                    <i class="fa fa-trash" title="Hapus"></i>
                                </button>
                                <a href="{{ route('wilayah.index') }}" class="pull-right btn btn-primary btn-md">
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
