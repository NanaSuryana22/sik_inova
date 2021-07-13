@extends('layout\app')
@section('title', 'Tambah Data Pegawai')
@section('master', 'active')
@section('pegawai', 'active')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Tambah Data Pegawai</h2><br />
                <button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal"
                    data-target="#defaultModal">BUAT DATA USER</button>
            </div>
            <div class="body">
                <form id="form_validation" action="{{ route('pegawai.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <select class="livesearch form-control p-3" name="user_id"></select>
                        @if($errors->has('user_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('user_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="id_card">Nomor Kartu Identitas</label>
                            <input type="text" class="form-control @error('id_card') is-invalid @enderror"
                                name="id_card" autocomplete="off" required value="{{ old('id_card') }}">
                        </div>
                        @if($errors->has('id_card'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('id_card') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <select class="searchkota form-control p-3" name="kota_id"></select>
                        @if($errors->has('kota_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('kota_id') }}</strong>
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
@include('pegawai.tambah_user')
@endsection

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@push('scripts')
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Pilih User / Pengguna',
        ajax: {
            url: '/search-user',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('.searchkota').select2({
        placeholder: 'Pilih Kota',
        ajax: {
            url: '/search-kota',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
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
