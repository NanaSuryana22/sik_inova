<div class="body table-responsive">
    <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
            <thead class="cf">
                <tr>
                    <th class="th-font">Nama</th>
                    <th class="th-font">Biaya Tindakan</th>
                    <th class="th-font">Keterangan</th>
                    <th class="th-font">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengobatan_details as $no => $data)
                <tr>
                    <td class="th-font" data-title="Nama">{{ $data->tindakan->name }}</td>
                    <td class="th-font" data-title="Biaya">@currency($data->tindakan->harga)</td>
                    <td class="th-font" data-title="Keterangan">{{ $data->keterangan}}</td>
                    <td class="th-font" data-title="Aksi">
                        <div class="btn-group">
                            <button type="button" class="btn bg-cyan dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Aksi <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <form action="{{ route('pengobatan_detail.destroy', $data->id) }}" method="post">
                                    {{-- <li class="ul-style"><a href="{{ route('pengobatan_detail.show',$data->id) }}"
                                            class="btn-action">Lihat Detail</li> --}}
                                    {{-- <li role="separator" class="divider"></li> --}}
                                    <li class="ul-style"><a href="{{ route('pengobatan_detail.edit',$data->id) }}"
                                            class="btn-action">Edit</a></li>
                                    <li>
                                    <li role="separator" class="divider"></li>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <li class="ul-style">
                                        <button class="btn-action" type="submit"
                                            onclick="return confirm('Yakin ingin menghapus Tindakan Ini ?')">Hapus</button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tr>
                <td colspan="3">Total Biaya Tindakan :</td>
                <td><b>@currency($pengobatan_details->sum('biaya_tindakan'))</b></td>
            </tr>
        </table>
        <nav>
            <ul class="pagination">{!! $pengobatan_details->links() !!}</ul>
        </nav>
    </section>
</div>
