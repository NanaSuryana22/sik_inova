@extends('layout\app')
@section('title', 'Halaman Edit Data Wilayah')
@section('master', 'active')
@section('wilayah', 'active')
@section('content')
<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Edit Data Wilayah</h2>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{ route('wilayah.update', $wilayah->id) }}" method="POST">
                        {{ csrf_field() }} {{method_field('PUT')}}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    autocomplete="off" required value="{{ $wilayah->name }}">
                            </div>
                            @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="description">Deskripsi</label>
                                <textarea name="description" cols="30" rows="5" class="form-control no-resize @error('description') is-invalid @enderror" required>{{ $wilayah->description }}</textarea>
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
