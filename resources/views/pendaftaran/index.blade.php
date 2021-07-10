@extends('layout\app')
@section('title', 'Data Pendaftaran')
@section('transaksi', 'active')
@section('pendaftaran', 'active')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    @include('layout.notice')
                    <h2>
                        TABEL DATA PENDAFTARAN
                    </h2>
                    <a href="{{ route('pendaftaran.create') }}" class="btn btn-sm btn-info btn-jarak">Tambah Data Pendaftaran</a>
                </div>
                <div class="body table-responsive">
                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                                <tr>
                                    <th class="th-font">No.</th>
                                    <th class="th-font">Nama Pasien</th>
                                    <th class="th-font">Tanggal Daftar</th>
                                    <th class="th-font">Status</th>
                                    <th class="th-font">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registers as $no => $pendaftaran)
                                <tr>
                                    <th class="th-font" data-title="Nomor">
                                        {{ ++$no + ($registers->currentPage()-1) * $registers->perPage() }}</th>
                                    <td class="th-font" data-title="Nama Pasien">{{ $pendaftaran->pasien->nama }}</td>
                                    <td class="th-font" data-title="Tanggal Daftar">{{ Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->format('d-m-Y') }}</td>
                                    <td class="th-font" data-title="Status">{{ $pendaftaran->status }}</td>
                                    <td class="th-font" data-title="Aksi">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-cyan dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="post">
                                                    <li class="ul-style"><a href="{{ route('pendaftaran.show',$pendaftaran->id) }}" class="btn-action">Lihat Detail</li>
                                                    <li role="separator" class="divider"></li>
                                                    <li  class="ul-style"><a href="{{ route('pendaftaran.edit',$pendaftaran->id) }}" class="btn-action">Edit</a></li>
                                                    <li>
                                                    <li role="separator" class="divider"></li>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <li  class="ul-style">
                                                    <button class="btn-action" type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus Pendaftaran Ini ?')">Hapus</button>
                                                    </li>
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">{!! $registers->links() !!}</ul>
                        </nav>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
