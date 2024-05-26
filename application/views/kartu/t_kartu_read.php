<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">

            <div class="card shadow mb-4">

                <img class="card-img-top d-block d-md-none d-lg-none" src="<?= base_url('assets/img/logo.jpg') ?>" alt="Card image">
                <div class="card-body">
                    <h6 class="font-weight-bold text-primary d-lg-block d-sm-none d-md-none">Data Pedagang Pantai</h6>

                    <table>
                        <tr>
                            <td>Nomor Kartu</td>
                            <td>:</td>
                            <td><?= $nomor_kartu ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pedagang</td>
                            <td>:</td>
                            <td><?= $nama_pemilik ?></td>
                        </tr>
                        <tr>
                            <td>Dagangan</td>
                            <td>:</td>
                            <td><?= $jenis_dagangan ?></td>
                        </tr>
                        <tr>
                            <td>Wilayah</td>
                            <td>:</td>
                            <td><?= $wilayah ?></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">

                        <h6 class="m-0 font-weight-bold text-primary">Histori Pembayaran</h6>

                    </div>
                </div>
                <div class="card-body">
                    <?php if ($user_role > 1) : ?>
                        <div class="row">
                            <div class="col-auto">

                                <label for="tgl_awal">Terima Pembayaran:</label>
                                <span class="text-danger"><?= $this->session->flashdata('error') != null ? $this->session->flashdata('error') : '' ?></span>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-lg">
                                <?php echo form_open('transaksi_iuran/create', array('class' => 'form form-inline')) ?>

                                <div class="form-group">

                                    <input type="hidden" name="id_kartu" value="<?= $id ?>">
                                    <input type="hidden" name="nama_pemilik" value="<?= $nama_pemilik ?>">
                                    <input type="hidden" name="wilayah" value="<?= $wilayah ?>">
                                    <input type="hidden" name="nomor_kartu" value="<?= $nomor_kartu ?>">
                                    <input type="hidden" name="id_jenis_dagangan" value="<?= $id_jenis_dagangan ?>">
                                    <input type="hidden" name="jenis_dagangan" value="<?= $jenis_dagangan ?>">

                                    <input type="text" readonly class="form-control" value="<?= $tanggal_jatuh_tempo != null ? date_format(date_create_from_format('Y-m-d', $tanggal_jatuh_tempo), 'M, Y') : '' ?>">
                                    <input type="hidden" id="min-month" value="<?= $min_month ?>">
                                    <input type="hidden" name="awal_periode" value="<?= date_format(date_create_from_format('Y-m-d', $tanggal_jatuh_tempo), 'Y-m-d') ?>">
                                </div>

                                <div class="form-group mx-2">S.D.</div>
                                <div class="form-group">

                                    <input type="text" class="form-control" id="periode_akhir" readonly>
                                    <input type="hidden" name="sampai_dengan" id="sampai_dengan">

                                </div>
                                <div class="form-group mx-2">

                                    <input type="submit" class="btn btn-success" name="btn-proses" value="Proses"></input>

                                </div>

                                <?php echo form_close() ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col my-2">

                                <button class="btn btn-primary" id="btnPrint">Print Detail</button>
                            </div>

                        </div>
                    <?php endif; ?>
                    <table class="table table-hover">
                        <tr>
                            <th>No.</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th>Pilih</th>
                        </tr>

                        <?php
                        $tanggal = date_create_from_format('Y-m-d', $tanggal_jatuh_tempo);
                        $bulan_awal = date_format($tanggal, 'm');
                        $tahun = date_format($tanggal, 'Y');
                        $counter = 1;
                        $index_periode = 0;
                        ?>
                        <form id="formDetailKartu" action="<?= base_url('kartu/detail_kartu') ?>" method="post">
                            <?php foreach ($histori_payment as $payment) : ?>
                                <tr>
                                    <td><?= $counter++ ?></td>
                                    <td><?= date('M, Y', strtotime($payment->periode)) ?></td>
                                    <td>Lunas</td>
                                    <td>
                                        <input type="checkbox" id="checkbox<?= $counter ?>" name="periode[]" value="<?= $payment->id ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <input type="hidden" name="id_kartu" value="<?= $id ?>">
                            <button type="submit" style="display: none;"></button>
                        </form>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <!-- /.container-fluid -->

</div>
<script>
    var form = document.getElementById("formDetailKartu");
    async function handleSubmit(event) {
        event.preventDefault();
        var data = new FormData(event.target);
        fetch(event.target.action, {
            method: form.method,
            body: data,
            headers: {
                'Accept': 'application/json'
            }
        }).then(response => {
            if (response.ok) {

                form.reset()
            }
        }).catch(error => {

        });
    }
    form.addEventListener("submit", handleSubmit);
    document.getElementById('btnPrint').addEventListener('click', function() {
        document.getElementById('formDetailKartu').submit();
    });
</script>