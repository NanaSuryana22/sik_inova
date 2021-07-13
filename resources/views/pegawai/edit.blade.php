@extends('layout\app')
@section('title', 'Edit Data Pegawai')
@section('master', 'active')
@section('pegawai', 'active')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Edit Data Pegawai</h2><br />
                <button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal"
                    data-target="#defaultModal">BUAT DATA USER</button>
            </div>
            <div class="body">
                <form id="form_validation" action="{{ route('pegawai.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }} {{ method_field('PUT') }}
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
                                name="id_card" autocomplete="off" required value="{{ $employee->id_card }}">
                        </div>
                        @if($errors->has('id_card'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('id_card') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea name="alamat" cols="30" rows="5"
                                class="form-control no-resize @error('alamat') is-invalid @enderror"
                                required>{{ $employee->alamat }}</textarea>
                        </div>
                        @if($errors->has('alamat'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('alamat') }}</strong>
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
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label><br /><br />
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" class="with-gap" id="laki_laki">
                            <label for="laki_laki">Laki-Laki</label>
                            <input type="radio" name="jenis_kelamin" value="Perempuan" class="with-gap" id="perempuan">
                            <label for="perempuan" class="m-l-20">Perempuan</label>
                        </div>
                        @if($errors->has('jenis_kelamin'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('jenis_kelamin') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="pendidikan_terakhir">Pendidikan Terakhir</label><br /><br />
                            <select name="pendidikan_terakhir"
                                class="form-control @error('pendidikan_terakhir') is-invalid @enderror show-tick"
                                required value="{{ old('pendidikan_terakhir') }}">
                                <option value="{{ $employee->pendidikan_terakhir }}">Pilih Pendidikan Terakhir</option>
                                <option value="SMA/K">SMA/K</option>
                                <option value="Diploma 1">Diploma 1</option>
                                <option value="Diploma 2">Diploma 2</option>
                                <option value="Diploma 3">Diploma 3</option>
                                <option value="Sarjana 1">Sarjana 1</option>
                                <option value="Sarjana 2">Sarjana 2</option>
                                <option value="Sarjana 3">Sarjana 3</option>
                            </select>
                        </div>
                        @if($errors->has('pendidikan_terakhir'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('pendidikan_terakhir') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <label for="photo">Upload Foto</label>
                        <input type="file" class="form-control form-control-sm @error('photo') is-invalid @enderror"
                            name="photo" id="photo" value="{{ $employee->photo }}"><br />
                        @if($errors->has('photo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('photo') }}</strong>
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
