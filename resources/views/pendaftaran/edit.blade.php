@extends('layout\app')
@section('title', 'Ubah Data Pendaftaran')
@section('transaksi', 'active')
@section('pendaftaran', 'active')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Ubah Data Pendaftaran</h2><br />
                <button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal"
                    data-target="#defaultModal">BUAT DATA PASIEN</button>
            </div>
            <div class="body">
                <form id="form_validation" action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST">
                    {{ csrf_field() }} {{ method_field('PUT') }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="no_pasien">No. Pendaftaran</label>
                            <input type="text" class="form-control @error('no_pasien') is-invalid @enderror" name="no_pasien"
                                autocomplete="off" required value="{{ $pendaftaran->no_pasien }}" disabled>
                            <input type="hidden" name="no_pasien" value="{{ $pendaftaran->no_pasien }}">
                        </div>
                        @if($errors->has('no_pasien'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('no_pasien') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <select class="livesearch form-control p-3" name="pasien_id" value="{{ $pendaftaran->pasien_id }}">{{ $pendaftaran->pasien->nama }}</select>
                        @if($errors->has('pasien_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('pasien_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="tanggal_daftar">Tanggal Daftar</label>
                            <input type="date" class="form-control @error('tanggal_daftar') is-invalid @enderror" name="tanggal_daftar"
                                autocomplete="off" required value="{{ $pendaftaran->tanggal_daftar }}">
                        </div>
                        @if($errors->has('tanggal_daftar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('tanggal_daftar') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="keluhan_pasien">Keluhan Pasien</label>
                            <textarea name="keluhan_pasien" cols="30" rows="5"
                                class="form-control no-resize @error('keluhan_pasien') is-invalid @enderror"
                                required>{{ $pendaftaran->keluhan_pasien }}</textarea>
                        </div>
                        @if($errors->has('keluhan_pasien'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('keluhan_pasien') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Simpan</button>
                    <button class="btn btn-warning waves-effect" type="reset">Reset</button>
                    <a class="btn btn-info waves-effect pull-right" href="{{ url()->previous() }}">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@include('pendaftaran.tambah_pasien')
@endsection

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@push('scripts')
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Pilih pasien',
        ajax: {
            url: '/ajax-autocomplete-search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nama,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endpush
