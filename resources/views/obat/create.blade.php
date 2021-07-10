@extends('layout\app')
@section('title', 'Tambah Data Obat')
@section('master', 'active')
@section('obat', 'active')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Tambah Data Obat</h2>
            </div>
            <div class="body">
                <form id="form_validation" action="{{ route('obat.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                autocomplete="off" required value="{{ old('name') }}">
                        </div>
                        @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="harga">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                                autocomplete="off" required value="{{ old('harga') }}">
                        </div>
                        @if($errors->has('harga'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('harga') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="description">Deskripsi</label>
                            <textarea name="description" cols="30" rows="5"
                                class="form-control no-resize @error('description') is-invalid @enderror"
                                required>{{ old('description') }}</textarea>
                        </div>
                        @if($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('description') }}</strong>
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
