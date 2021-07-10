@extends('layout\app')
@section('title', 'Data Pasien')
@section('transaksi', 'active')
@section('pasien', 'active')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    @include('layout.notice')
                    <h2>
                        TABEL DATA PASIEN
                    </h2>
                    <a href="{{ route('pasien.create') }}" class="btn btn-sm btn-info btn-jarak">Tambah Data Pasien</a>
                </div>
                <div class="body table-responsive">
                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                                <tr>
                                    <th class="th-font">No.</th>
                                    <th class="th-font">Nama</th>
                                    <th class="th-font">NIK</th>
                                    <th class="th-font">Jenis Kelamin</th>
                                    <th class="th-font">No. Handphone</th>
                                    <th class="th-font">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $no => $pasien)
                                <tr>
                                    <th class="th-font" data-title="Nomor">
                                        {{ ++$no + ($patients->currentPage()-1) * $patients->perPage() }}</th>
                                    <td class="th-font" data-title="Nama">{{ $pasien->nama }}</td>
                                    <td class="th-font" data-title="NIK">{{ $pasien->nik }}</td>
                                    <td class="th-font" data-title="Jenis Kelamin">{{ $pasien->jenis_kelamin }}</td>
                                    <td class="th-font" data-title="No. Handphone">{{ $pasien->no_handphone }}</td>
                                    <td class="th-font" data-title="Aksi">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-cyan dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="post">
                                                    <li class="ul-style"><a href="{{ route('pasien.show',$pasien->id) }}" class="btn-action">Lihat Detail</li>
                                                    <li role="separator" class="divider"></li>
                                                    <li  class="ul-style"><a href="{{ route('pasien.edit',$pasien->id) }}" class="btn-action">Edit</a></li>
                                                    <li>
                                                    <li role="separator" class="divider"></li>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <li  class="ul-style">
                                                    <button class="btn-action" type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus Pasien Ini ?')">Hapus</button>
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
                            <ul class="pagination">{!! $patients->links() !!}</ul>
                        </nav>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
