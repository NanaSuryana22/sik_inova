@extends('layout\app')
@section('title', 'Halaman Data Pegawai')
@section('master', 'active')
@section('pegawai', 'active')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Tambah Data Pegawai</h2>
            </div>
            <div class="body">
                <form id="form_validation" action="{{ route('pegawai.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="id_card">No. Identitas</label>
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
                        <div class="form-line">
                            <select name="role_id" class="select_to form-control @error('role_id') is-invalid @enderror show-tick"
                                required value="{{ old('role_id') }}">
                                <option value="">Pilih Jabatan</option>
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
                            <select name="user_id" class="select_to form-control @error('user_id') is-invalid @enderror show-tick"
                                required value="{{ old('user_id') }}">
                                <option value="">-- Pilih User --</option>
                            </select>
                        </div>
                        @if($errors->has('user_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('user_id') }}</strong>
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

@push('scripts')
<script src="{{ url('js/pegawai.js') }}" type="text/javascript">
@endpush
