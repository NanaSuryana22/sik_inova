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
                        <form action="{{ route('kota.destroy', $data->id) }}" method="POST">
                            <div class="icon-button-demo">
                                <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" onclick="window.location.href='{{ route('kota.edit', $data->id) }}'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin ingin menghapus data kota Ini ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </form>
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
