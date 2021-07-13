@extends('layout\app')
@section('title', 'Edit Data Pasien')
@section('transaksi', 'active')
@section('pasien', 'active')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Edit Data Pasien</h2>
            </div>
            <div class="body">
                <form id="form_validation" action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    {{ csrf_field() }} {{method_field('PUT')}}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                autocomplete="off" required value="{{ $pasien->nama }}">
                        </div>
                        @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="nik">Nomor Induk Kependudukan (NIK)</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                                autocomplete="off" required value="{{ $pasien->nik }}">
                        </div>
                        @if($errors->has('nik'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('nik') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="alamat">Alamat Tinggal</label>
                            <textarea name="alamat" cols="30" rows="5"
                                class="form-control no-resize @error('alamat') is-invalid @enderror"
                                required>{{ $pasien->alamat }}</textarea>
                        </div>
                        @if($errors->has('alamat'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('alamat') }}</strong>
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
                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                name="tempat_lahir" autocomplete="off" required value="{{ $pasien->tempat_lahir }}">
                        </div>
                        @if($errors->has('tempat_lahir'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('tempat_lahir') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label><br />
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                name="tanggal_lahir" autocomplete="off" required value="{{ $pasien->tanggal_lahir }}">
                        </div>
                        @if($errors->has('tanggal_lahir'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('tanggal_lahir') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="no_handphone">No. Handphone</label>
                            <input type="text" class="form-control @error('no_handphone') is-invalid @enderror"
                                name="no_handphone" autocomplete="off" required value="{{ $pasien->no_handphone }}">
                        </div>
                        @if($errors->has('no_handphone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('no_handphone') }}</strong>
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
@endsection
