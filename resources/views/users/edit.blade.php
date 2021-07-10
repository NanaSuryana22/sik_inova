@extends('layout\app')
@section('title', 'Halaman Edit Data User')
@section('master', 'active')
@section('user', 'active')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Ubah Data Pengguna</h2>
            </div>
            <div class="body">
                <form id="form_validation" action="{{ route('users.update', $user->id) }}" method="POST">
                    {{ csrf_field() }} {{method_field('PUT')}}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="name">Nama Pengguna</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                autocomplete="off" required value="{{ $user->name }}">
                        </div>
                        @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="email">E-Mail</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                required autocomplete="off" value="{{ $user->email }}">
                        </div>
                        @if($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="role_id" class="form-control @error('role_id') is-invalid @enderror show-tick"
                                required value="{{ old('role_id') }}">
                                <option value="{{ $user->role_id }}">Pilih Hak Akses</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('role_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('role_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" autocomplete="off">
                        </div>
                        @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('password') }}</strong>
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
