@extends('layout\app')
@section('title', 'Ubah Data Pengobatan / Pemeriksaan')
@section('transaksi', 'active')
@section('pengobatan', 'active')
@section('content')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Tambah Data Hak Akses</h2>
            </div>
            <div class="body">
                <form id="form_validation" action="{{ route('pengobatan.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <select class="livesearch form-control p-3" name="pendaftaran_id"></select>
                        @if($errors->has('pendaftaran_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('pendaftaran_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">SIMPAN</button>
                    <button class="btn btn-warning waves-effect" type="reset">RESET</button>
                    <button type="button" class="btn btn-link waves-effect pull-right" data-dismiss="modal">BATAL</button>
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
        placeholder: 'Pilih Pasien Dengan Memasukan Nomor Pendaftaran',
        ajax: {
            url: '/search-pasien-pendaftaran',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.no_pasien,
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
