@extends('layout\app')
@section('title', 'Halaman Data Tindakan')
@section('master', 'active')
@section('tindakan', 'active')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    @include('layout.notice')
                    <h2>
                        TABEL DATA TINDAKAN
                    </h2>
                    <a href="{{ route('tindakan.create') }}" class="btn btn-sm btn-info btn-jarak">Tambah Data Tindakan</a>
                </div>
                <div class="body table-responsive">
                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                                <tr>
                                    <th class="th-font">No.</th>
                                    <th class="th-font" width=40%>Nama</th>
                                    <th class="th-font" width=20%>Harga</th>
                                    <th class="th-font" width=40%>Deskripsi</th>
                                    <th class="th-font">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tindakans as $no => $tindakan)
                                <tr>
                                    <th class="th-font" data-title="Nomor">
                                        {{ ++$no + ($tindakans->currentPage()-1) * $tindakans->perPage() }}</th>
                                    <td class="th-font" data-title="Nama">{{ $tindakan->name }}</td>
                                    <td class="th-font" data-title="Harga">@currency($tindakan->harga)</td>
                                    <td class="th-font" data-title="Deskripsi">{{ $tindakan->description }}</td>
                                    <td class="th-font" data-title="Aksi">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-cyan dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <form action="{{ route('tindakan.destroy', $tindakan->id) }}" method="post">
                                                    <li class="ul-style"><a href="{{ route('tindakan.show',$tindakan->id) }}" class="btn-action">Lihat Detail</li>
                                                    <li role="separator" class="divider"></li>
                                                    <li  class="ul-style"><a href="{{ route('tindakan.edit',$tindakan->id) }}" class="btn-action">Edit</a></li>
                                                    <li>
                                                    <li role="separator" class="divider"></li>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <li  class="ul-style">
                                                    <button class="btn-action" type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus data tindakan Ini ?')">Hapus</button>
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
                            <ul class="pagination">{!! $tindakans->links() !!}</ul>
                        </nav>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
