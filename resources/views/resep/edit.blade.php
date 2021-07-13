@extends('layout\app')
@section('title', 'Edit Data Resep')
@section('transaksi', 'active')
@section('pengobatan', 'active')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Edit Data Resep</h2>
            </div>
            <div class="body">
                <form id="form_validation" action="{{ route('resep.update', $resep->id) }}" method="POST">
                    {{ csrf_field() }} {{ method_field('PUT') }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="hidden" id="pengobatan_id" name="pengobatan_id" value="{{ $resep->pengobatan_id }}">
                            <label class="form-label" for="pengobatan_id">Resep Untuk Pasien</label>
                            <input type="text" class="form-control @error('pengobatan_id') is-invalid @enderror"
                                autocomplete="off" required value="{{ $resep->pengobatan->pasien->nama }}" disabled>
                        </div>
                        @if($errors->has('pengobatan_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('pengobatan_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <select class="livesearch form-control p-3" name="obat_id"></select>
                        @if($errors->has('obat_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('obat_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="jumlah_obat">Jumlah Obat</label>
                            <input type="number" class="form-control @error('jumlah_obat') is-invalid @enderror"
                                name="jumlah_obat" autocomplete="off" required value="{{ $resep->jumlah_obat }}">
                        </div>
                        @if($errors->has('jumlah_obat'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('jumlah_obat') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="dosis">Dosis Pemakaian</label>
                            <input type="text" class="form-control @error('dosis') is-invalid @enderror" name="dosis"
                                autocomplete="off" required value="{{ $resep->dosis }}">
                        </div>
                        @if($errors->has('dosis'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('dosis') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <textarea name="keterangan" cols="30" rows="5"
                                class="form-control no-resize @error('keterangan') is-invalid @enderror"
                                required>{{ $resep->keterangan }}</textarea>
                        </div>
                        @if($errors->has('keterangan'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('keterangan') }}</strong>
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

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@push('scripts')
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Pilih Obat',
        ajax: {
            url: '/search-obat',
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
