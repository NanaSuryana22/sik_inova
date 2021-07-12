@extends('layout\app')
@section('title', 'Informasi Detail Data Pembayaran')
@section('transaksi', 'active')
@section('pembayaran', 'active')
@section('content')
<div class="container-fluid">
    @include('layout.notice')
    <div class="block-header">
        <h2>Detail Informasi Pembayaran</h2>
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
                                <dt class="col-sm-4">Nama Pasien</dt>
                                <dd class="col-sm-8">{{ $pengobatan->pasien->nama }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">No. Pendaftaran</dt>
                                <dd class="col-sm-8">{{ $pengobatan->pendaftaran->no_pasien }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Keluhan Pasien</dt>
                                <dd class="col-sm-8">{{ $pengobatan->pendaftaran->keluhan_pasien }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Jenis Kelamin</dt>
                                <dd class="col-sm-8">{{ $pengobatan->pasien->jenis_kelamin }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tempat, Tanggal Lahir</dt>
                                <dd class="col-sm-8">{{ $pengobatan->pasien->tempat_lahir }},
                                    {{ Carbon\Carbon::parse($pengobatan->pasien->tanggal_lahir)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Nomor Handphone</dt>
                                <dd class="col-sm-8">{{ $pengobatan->pasien->no_handphone }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Alamat Tinggal</dt>
                                <dd class="col-sm-8">{{ $pengobatan->pasien->alamat }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Status Pengobatan</dt>
                                <dd class="col-sm-8"><b>{{ $pengobatan->pendaftaran->status }}</b></dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Total Pembayaran</dt>
                                <dd class="col-sm-8"><b>@currency($pengobatan->total_biaya_pengobatan)</b></dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Status Pembayaran</dt>
                                <dd class="col-sm-8">{{ $pengobatan->status_pembayaran }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Dibuat</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($pengobatan->created_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <dt class="col-sm-4">Tanggal Diubah</dt>
                                <dd class="col-sm-8">
                                    {{ Carbon\Carbon::parse($pengobatan->updated_at)->format('d-m-Y') }}</dd>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </dl>
                            <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingOne_1">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion_1"
                                                href="#collapseOne_1" aria-expanded="true"
                                                aria-controls="collapseOne_1">
                                                Data Tindakan
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel"
                                        aria-labelledby="headingOne_1">
                                        <div class="panel-body">
                                            <a href="{{ route('pengobatan_detail.create', ['pengobatan_id' => $pengobatan->id]) }}"
                                                class="btn btn-sm btn-info btn-jarak">Tambah Data Tindakan</a>
                                            @if (isset($pengobatan_details))
                                            @include('pengobatan.data_tindakan')
                                            @else
                                            <br /><br />
                                            <b>Data Tindakan Masih Kosong</b>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="headingTwo_1">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                    data-parent="#accordion_1" href="#collapseTwo_1"
                                                    aria-expanded="false" aria-controls="collapseTwo_1">
                                                    Data Resep Obat
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingTwo_1">
                                            <div class="panel-body">
                                                <a href="{{ route('resep.create', ['pengobatan_id' => $pengobatan->id]) }}"
                                                    class="btn btn-sm btn-info btn-jarak">Tambah Data Resep</a>
                                                @if (isset($reseps))
                                                @include('pengobatan.data_resep')
                                                @else
                                                <br /><br />
                                                <b>Data Resep Masih Kosong</b>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('pengobatan.destroy', $pengobatan->id) }}" method="post">
                                <a href="{{ route('pengobatan.edit',$pengobatan->id) }}" class="btn btn-warning btn-md">
                                    <i class="fa fa-pencil" title="Edit"></i>
                                </a>
                                {{-- {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-md btn-show-margin"
                                    onclick="return confirm('Yakin ingin menghapus User Ini ?')">
                                    <i class="fa fa-trash" title="Hapus"></i>
                                </button> --}}
                                <a href="{{ route('pembayaran.index') }}" class="pull-right btn btn-primary btn-md">
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
