<div class="body table-responsive">
    <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
            <thead class="cf">
                <tr>
                    <th class="th-font">Nama Obat</th>
                    <th class="th-font">Dosis Pemakaian</th>
                    <th class="th-font">Keterangan</th>
                    <th class="th-font">Harga Obat</th>
                    <th class="th-font">Jumlah Obat</th>
                    <th class="th-font">Total Pembelian</th>
                    @if($pengobatan->status_pembayaran == 'Ditangguhkan')
                        <th class="th-font">Aksi</th>
                    @endif
                </tr>
            </thead>web
            <tbody>
                @foreach($reseps as $no => $data)
                <tr>
                    <td class="th-font" data-title="Nama Obat">{{ $data->obat->name }}</td>
                    <td class="th-font" data-title="Dosis Pemakaian">{{ $data->dosis }}</td>
                    <td class="th-font" data-title="Keterangan">{{ $data->keterangan}}</td>
                    <td class="th-font" data-title="Harga Obat">@currency($data->harga_obat)</td>
                    <td class="th-font" data-title="Jumlah Obat">{{ $data->jumlah_obat }}</td>
                    <td class="th-font" data-title="Total Pembelian">@currency($data->harga_obat*$data->jumlah_obat)</td>
                    @if($pengobatan->status_pembayaran == 'Ditangguhkan')
                        <td class="th-font" data-title="Aksi">
                            <form action="{{ route('resep.destroy', $data->id) }}" method="post">
                                <div class="icon-button-demo">
                                    <button type="button"
                                        class="btn btn-info btn-circle waves-effect waves-circle waves-float"
                                        onclick="window.location.href='{{ route('resep.edit',$data->id) }}'">
                                        <i class="fa fa-pencil-square"></i>
                                    </button>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                        class="btn btn-info btn-circle waves-effect waves-circle waves-float"
                                        onclick="return confirm('Yakin ingin menghapus Resep Ini ?');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tr>
                <td colspan="5" align="right">Total Biaya Obat :</td>
                <td><b>@currency($total_biaya_resep[0]->total_biaya_obat)</b></td>
                @if($pengobatan->status_pembayaran == 'Ditangguhkan')
                    <td></td>
                @endif
            </tr>
        </table>
        <nav>
            <ul class="pagination">{!! $reseps->links() !!}</ul>
        </nav>
    </section>
</div>
