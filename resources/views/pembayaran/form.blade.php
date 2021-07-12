<?php
$total_biaya_resep = DB::select('SELECT (SELECT SUM(a.harga_obat*a.jumlah_obat) FROM resep a, pengobatan b WHERE a.pengobatan_id = '.$data->id.') as total_biaya_obat');
?>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Data Pembayaran</h4>
            </div>
            <div class="modal-body">
                <form id="form_validation" action="{{ route('pembayaran.update', $data->id) }}" method="POST">
                    {{ csrf_field() }} {{ method_field('PUT') }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                autocomplete="off" required value="{{ $data->pasien->nama }}" disabled>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">No. Pendaftaran</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                autocomplete="off" required value="{{ $data->pendaftaran->no_pasien }}" disabled>
                        </div>
                    </div>
                    <fieldset>
                        <legend>Data Biaya Tindakan</legend>
                        <table class="table table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                            <tr>
                                <th class="th-font">Nama</th>
                                <th class="th-font">Biaya Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->pengobatan_details as $data_tindakan)
                            <tr>
                                <td class="th-font" data-title="Nama">{{ $data_tindakan->tindakan->name }}</td>
                                <td class="th-font" data-title="Biaya">@currency($data_tindakan->tindakan->harga)</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="1">Total Biaya Tindakan :</td>
                            <td><b>@currency($data->pengobatan_details->sum('biaya_tindakan'))</b></td>
                        </tr>
                    </table>
                    </fieldset>
                    <fieldset>
                        <legend>Data Biaya Resep Obat</legend>
                        <table class="table table-bordered table-striped table-condensed cf">
                                <thead class="cf">
                                    <tr>
                                        <th class="th-font">Nama Obat</th>
                                        <th class="th-font">Harga Obat</th>
                                        <th class="th-font">Jumlah Obat</th>
                                        <th class="th-font">Total Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data->reseps as $data_resep)
                                    <tr>
                                        <td class="th-font" data-title="Nama Obat">{{ $data_resep->obat->name }}</td>
                                        <td class="th-font" data-title="Harga Obat">@currency($data_resep->harga_obat)</td>
                                        <td class="th-font" data-title="Jumlah Obat">{{ $data_resep->jumlah_obat }}</td>
                                        <td class="th-font" data-title="Total Pembelian">@currency($data_resep->harga_obat*$data_resep->jumlah_obat)</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <td colspan="3">Total Biaya Obat :</td>
                                    <td><b>@currency($total_biaya_resep[0]->total_biaya_obat)</b></td>
                                </tr>
                            </table>
                    </fieldset>
                    <button class="btn btn-primary waves-effect" type="submit" onclick="return confirm('Status Pembayaran Akan Berubah Menjadi Lunas, Anda Yakin ?');"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-info waves-effect pull-right" data-dismiss="modal"><i
                            class="fa fa-close"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
