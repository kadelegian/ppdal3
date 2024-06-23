<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Transaksi Pengeluaran Kas</h1>

        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <?php echo anchor(site_url('transaksi_pengeluaran/create'), 'Create', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-1 text-right">
                </div>
                <div class="col-md-3 text-right">
                    <form action="<?php echo site_url('transaksi_pengeluaran/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" name="awal_periode" class="form-control datepicker" id="date-picker1" value="<?= $awal_periode <> '' ? date_format(date_create_from_format('Y-m-d', $awal_periode), 'd/m/Y') : '' ?>">
                            <input type="hidden" id="date-picker1-alt">
                            <p>-</p>
                            <input type="text" name="akhir_periode" class="form-control datepicker" id="date-picker2" value="<?= $sampai_dengan <> '' ? date_format(date_create_from_format('Y-m-d', $sampai_dengan), 'd/m/Y') : '' ?>">
                            <input type="hidden" id="date-picker2-alt">
                            <span class="input-group-btn">
                                <a href="<?php echo site_url('transaksi_pengeluaran'); ?>" class="btn btn-default">Reset</a>

                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">

                <table class="table table-bordered" style="margin-bottom: 10px">
                    <tr>
                        <th style="text-align:center">Action </th>
                        <th>REF.</th>
                        <th>Tanggal</th>
                        <th>Keterangan </th>
                        <th>Nama Akun</th>
                        <th>Petugas</th>

                        <th>Debet</th>
                        <th>Kredit</th>
                    </tr><?php
                            if ($total_rows > 0) {
                                for ($r = 0; $r <= $total_rows; $r += 2) {

                                    ?>
                            <tr>
                                <?php ++$start; ?>
                                <td style="text-align:center">
                                    <div class="btn-group" role="group">
                                        <!-- id trx >0 adalah transaksi iuran & penjamin, kode >1000 transaksi transfer otomatis -->
                                        <a class="btn btn-primary" href='<?= base_url('transaksi_pengeluaran/update/' . $data_transaksi[$r]->id) ?>'>Lihat</a>
                                        <a class="btn btn-danger" href='<?= base_url('transaksi_pengeluaran/delete/' . $data_transaksi[$r]->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

                                    </div>

                                </td>
                                <td><?= $data_transaksi[$r]->id ?></td>
                                <td><?php echo date_format(date_create_from_format('Y-m-d h:i:s', $data_transaksi[$r]->tanggal), 'd/m/Y') ?></td>
                                <td><?php echo $data_transaksi[$r]->keterangan ?>
                                    <br> <?= $data_transaksi[$r + 1]->keterangan ?>
                                </td>
                                <td>
                                    <?php echo $data_transaksi[$r]->nama_akun ?>
                                    <br> <?= $data_transaksi[$r + 1]->nama_akun ?>
                                </td>
                                <td><?php echo $data_transaksi[$r]->username ?></td>

                                <td>
                                    <?php echo number_format($data_transaksi[$r]->debet, 0, ",", ".") ?>
                                    <br>
                                    <?php echo number_format($data_transaksi[$r + 1]->debet, 0, ",", ".") ?>
                                </td>
                                <td>
                                    <?php echo number_format($data_transaksi[$r]->kredit, 0, ",", ".") ?>
                                    <br>
                                    <?php echo number_format($data_transaksi[$r + 1]->kredit, 0, ",", ".") ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>

            </div>
            <div class="row">

                <div class="col-md-6 text-right">
                    <?php echo $pagination ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->