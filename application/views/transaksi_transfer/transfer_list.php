<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Daftar Transfer</h1>

        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <?php echo anchor(site_url('transaksi_transfer/create'), 'Create', 'class="btn btn-primary"'); ?>
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
                            <input type="text" class="form-control datepicker" id="date-picker1" value="<?= $awal_periode <> '' ? date_format(date_create_from_format('Y-m-d', $awal_periode), 'd/m/Y') : '' ?>">
                            <input type="hidden" id="date-picker1-alt" name="awal_periode">
                            <p>-</p>
                            <input type="text" class="form-control datepicker" id="date-picker2" value="<?= $sampai_dengan <> '' ? date_format(date_create_from_format('Y-m-d', $sampai_dengan), 'd/m/Y') : '' ?>">
                            <input type="hidden" id="date-picker2-alt" name="akhir_periode">
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
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan </th>
                        <th>Nominal</th>
                        <th>Rekening Sumber</th>
                        <th>Rekening Tujuan</th>
                        <th>Petugas</th>

                        <th style="text-align:center">Action</th>
                    </tr><?php

                            foreach ($data_transaksi as $dt) {

                                ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo date('d/m/Y', strtotime($dt->tanggal)) ?></td>
                            <td><?php echo $dt->keterangan ?></td>
                            <td><?php echo number_format($dt->nominal, 0, ",", ".") ?></td>
                            <td><?php echo $dt->rekening_sumber ?></td>
                            <td><?php echo $dt->rekening_tujuan ?></td>
                            <td><?php echo $dt->username ?></td>

                            <td style="text-align:center">
                                <div class="btn-group" role="group">

                                    <a class="btn btn-primary" href='<?= base_url('transaksi_transfer/update/' . $dt->id) ?>'>Lihat</a>
                                    <a class="btn btn-danger" href='<?= base_url('transaksi_transfer/delete/' . $dt->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

                                </div>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
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