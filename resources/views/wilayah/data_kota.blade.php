<div class="body table-responsive">
    <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
            <thead class="cf">
                <tr>
                    <th class="th-font">No.</th>
                    <th class="th-font" width=40%>Nama</th>
                    <th class="th-font" width=40%>Deskripsi</th>
                    <th class="th-font">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $no => $data)
                <tr>
                    <th class="th-font" data-title="Nomor">
                        {{ ++$no + ($cities->currentPage()-1) * $cities->perPage() }}</th>
                    <td class="th-font" data-title="Nama">{{ $data->name }}</td>
                    <td class="th-font" data-title="Deskripsi">{{ $data->description}}</td>
                    <td class="th-font" data-title="Aksi">
                        <div class="btn-group">
                            <button type="button" class="btn bg-cyan dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Aksi <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <form action="{{ route('kota.destroy', $data->id) }}" method="post">
                                    {{-- <li class="ul-style"><a href="{{ route('kota.show',$data->id) }}"
                                            class="btn-action">Lihat Detail</li> --}}
                                    {{-- <li role="separator" class="divider"></li> --}}
                                    <li class="ul-style"><a href="{{ route('kota.edit',$data->id) }}"
                                            class="btn-action">Edit</a></li>
                                    <li>
                                    <li role="separator" class="divider"></li>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <li class="ul-style">
                                        <button class="btn-action" type="submit"
                                            onclick="return confirm('Yakin ingin menghapus Kota Ini ?')">Hapus</button>
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
            <ul class="pagination">{!! $cities->links() !!}</ul>
        </nav>
    </section>
</div>
