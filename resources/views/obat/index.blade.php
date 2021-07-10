@extends('layout\app')
@section('title', 'Halaman Data Obat')
@section('master', 'active')
@section('obat', 'active')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    @include('layout.notice')
                    <h2>
                        TABEL DATA OBAT
                    </h2>
                    <a href="{{ route('obat.create') }}" class="btn btn-sm btn-info btn-jarak">Tambah Data Obat</a>
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
                                @foreach($obats as $no => $obat)
                                <tr>
                                    <th class="th-font" data-title="Nomor">
                                        {{ ++$no + ($obats->currentPage()-1) * $obats->perPage() }}</th>
                                    <td class="th-font" data-title="Nama">{{ $obat->name }}</td>
                                    <td class="th-font" data-title="Harga">@currency($obat->harga)</td>
                                    <td class="th-font" data-title="Deskripsi">{{ $obat->description }}</td>
                                    <td class="th-font" data-title="Aksi">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-cyan dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <form action="{{ route('obat.destroy', $obat->id) }}" method="post">
                                                    <li class="ul-style"><a href="{{ route('obat.show',$obat->id) }}" class="btn-action">Lihat Detail</li>
                                                    <li role="separator" class="divider"></li>
                                                    <li  class="ul-style"><a href="{{ route('obat.edit',$obat->id) }}" class="btn-action">Edit</a></li>
                                                    <li>
                                                    <li role="separator" class="divider"></li>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <li  class="ul-style">
                                                    <button class="btn-action" type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus data obat Ini ?')">Hapus</button>
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
                            <ul class="pagination">{!! $obats->links() !!}</ul>
                        </nav>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
