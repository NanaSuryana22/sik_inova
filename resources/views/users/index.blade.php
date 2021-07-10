@extends('layout\app')
@section('title', 'Halaman Pengguna')
@section('master', 'active')
@section('user', 'active')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    @include('layout.notice')
                    <h2>
                        TABEL DATA PENGGUNA
                    </h2>
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-info btn-jarak">Tambah Data User</a>
                </div>
                <div class="body table-responsive">
                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                                <tr>
                                    <th class="th-font">No.</th>
                                    <th class="th-font" width=40%>Nama</th>
                                    <th class="th-font" width=40%>Hak Akses</th>
                                    <th class="th-font">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $no => $user)
                                <tr>
                                    <th class="th-font" data-title="Nomor">
                                        {{ ++$no + ($users->currentPage()-1) * $users->perPage() }}</th>
                                    <td class="th-font" data-title="Nama">{{ $user->name }}</td>
                                    <td class="th-font" data-title="Hak Akses">{{ $user->role->name }}</td>
                                    <td class="th-font" data-title="Aksi">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-cyan dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                    <li class="ul-style"><a href="{{ route('users.show',$user->id) }}" class="btn-action">Lihat Detail</li>
                                                    <li role="separator" class="divider"></li>
                                                    <li  class="ul-style"><a href="{{ route('users.edit',$user->id) }}" class="btn-action">Edit</a></li>
                                                    <li>
                                                    <li role="separator" class="divider"></li>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <li  class="ul-style">
                                                    <button class="btn-action" type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus Pengguna Ini ?')">Hapus</button>
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
                            <ul class="pagination">{!! $users->links() !!}</ul>
                        </nav>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
