<div class="body table-responsive">
    <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
            <thead class="cf">
                <tr>
                    <th class="th-font">Nama Obat</th>
                    <th class="th-font">Harga Obat</th>
                    <th class="th-font">Jumlah Obat</th>
                    <th class="th-font">Total Pembelian</th>
                    <th class="th-font">Dosis Pemakaian</th>
                    <th class="th-font">Keterangan</th>
                    <th class="th-font">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reseps as $no => $data)
                <tr>
                    <td class="th-font" data-title="Nama Obat">{{ $data->obat->name }}</td>
                    <td class="th-font" data-title="Harga Obat">@currency($data->harga_obat)</td>
                    <td class="th-font" data-title="Jumlah Obat">{{ $data->jumlah_obat }}</td>
                    <td class="th-font" data-title="Total Pembelian">@currency($data->harga_obat*$data->jumlah_obat)</td>
                    <td class="th-font" data-title="Dosis Pemakaian">{{ $data->dosis }}</td>
                    <td class="th-font" data-title="Keterangan">{{ $data->keterangan}}</td>
                    <td class="th-font" data-title="Aksi">
                        <div class="btn-group">
                            <button type="button" class="btn bg-cyan dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Aksi <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <form action="{{ route('resep.destroy', $data->id) }}" method="post">
                                    {{-- <li class="ul-style"><a href="{{ route('resep.show',$data->id) }}"
                                            class="btn-action">Lihat Detail</li> --}}
                                    {{-- <li role="separator" class="divider"></li> --}}
                                    <li class="ul-style"><a href="{{ route('resep.edit',$data->id) }}"
                                            class="btn-action">Edit</a></li>
                                    <li>
                                    <li role="separator" class="divider"></li>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <li class="ul-style">
                                        <button class="btn-action" type="submit"
                                            onclick="return confirm('Yakin ingin menghapus Resep Ini ?')">Hapus</button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tr>
                <td colspan="3">Total Biaya Obat :</td>
                <td><b>@currency($total_biaya_resep[0]->total_biaya_obat)</b></td>
            </tr>
        </table>
        <nav>
            <ul class="pagination">{!! $reseps->links() !!}</ul>
        </nav>
    </section>
</div>
