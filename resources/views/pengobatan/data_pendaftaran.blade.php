<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Data Pendaftaran</h4>
                {{-- <form action="">
                    <label for="exampleFormControlSelect1">Search</label>
                    <input type="search" class="form-control" placeholder="Masukan Pencarian"
                        aria-describedby="search-addon" name="cari" />
                </form> --}}
                <input type="text" id="search" class="form-control mt-3 mb-5" placeholder="Ketikan Sesuatu...">
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                        <tr>
                            <th class="th-font">No Pendaftaran</th>
                            <th class="th-font">Nama</th>
                            <th class="th-font">Jenis Kelamin</th>
                            <th class="th-font">Tanggal Daftar</th>
                            <th class="th-font">Keluhan</th>
                        </tr>
                    </thead>
                    <tbody id="tampil">
                        @foreach($pendaftaran as $no => $data)
                        <tr>
                            <td class="th-font" data-title="No Pendaftaran">{{ $data->no_pasien }}</td>
                            <td class="th-font" data-title="Nama">{{ $data->nama }}</td>
                            <td class="th-font" data-title="Jenis Kelamin">{{ $data->jenis_kelamin }}</td>
                            <td class="th-font" data-title="Tanggal Daftar">{{ $data->tanggal_daftar }}</td>
                            <td class="th-font" data-title="Keluhan">{{ $data->keluhan_pasien }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                $.ajax({
                    type: 'POST',
                    url: '/',
                    data: {
                        search: $(this).val()
                    },
                    cache: false,
                    success: function(data) {
                        $('#tampil').html(data);
                    }
                });
            });
        });
    </script>
@endpush
