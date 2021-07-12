<div class="body table-responsive">
    <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
            <thead class="cf">
                <tr>
                    <th class="th-font">Nama</th>
                    <th class="th-font">Keterangan</th>
                    <th class="th-font">Biaya Tindakan</th>
                    @if($pengobatan->status_pembayaran == 'Ditangguhkan')
                        <th class="th-font">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($pengobatan_details as $no => $data)
                <tr>
                    <td class="th-font" data-title="Nama">{{ $data->tindakan->name }}</td>
                    <td class="th-font" data-title="Keterangan">{{ $data->keterangan}}</td>
                    <td class="th-font" data-title="Biaya">@currency($data->tindakan->harga)</td>
                    @if($pengobatan->status_pembayaran == 'Ditangguhkan')
                        <td class="th-font" data-title="Aksi">
                            <form action="{{ route('pengobatan_detail.destroy', $data->id) }}" method="post">
                                <div class="icon-button-demo">
                                    <button type="button"
                                        class="btn btn-info btn-circle waves-effect waves-circle waves-float"
                                        onclick="window.location.href='{{ route('pengobatan_detail.edit', $data->id) }}'">
                                        <i class="fa fa-pencil-square"></i>
                                    </button>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                        class="btn btn-info btn-circle waves-effect waves-circle waves-float"
                                        onclick="return confirm('Yakin ingin menghapus Tindakan Ini ?');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
            <tr>
                <td colspan="2" align="right">Total Biaya Tindakan :</td>
                <td><b>@currency($pengobatan_details->sum('biaya_tindakan'))</b></td>
                @if($pengobatan->status_pembayaran == 'Ditangguhkan')
                <td></td>
                @endif
            </tr>
        </table>
        <nav>
            <ul class="pagination">{!! $pengobatan_details->links() !!}</ul>
        </nav>
    </section>
</div>
