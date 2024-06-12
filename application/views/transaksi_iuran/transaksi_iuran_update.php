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
                    <h6 class="font-weight-bold text-primary d-lg-block d-sm-none d-md-none">Edit Transaksi Pembayaran</h6>

                    <table>
                        <tr>
                            <td>Nomor Kartu</td>
                            <td>:</td>
                            <td><?= $data_pedagang->nomor_kartu ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pedagang</td>
                            <td>:</td>
                            <td><?= $data_pedagang->nama_pemilik ?></td>
                        </tr>
                        <tr>
                            <td>Dagangan</td>
                            <td>:</td>
                            <td><?= $data_pedagang->nama_dagangan ?></td>
                        </tr>
                        <tr>
                            <td>Wilayah</td>
                            <td>:</td>
                            <td><?= $data_pedagang->wilayah ?></td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php if ($_SESSION['role'] == 0) : ?>
                        <div class="row">
                            <div class="col-auto">
                                <label>Edit Pembayaran:</label>

                            </div>

                        </div>
                        <div class="row">

                            <div class="col-lg">
                                <form id="form-update" action="<?= $action ?>" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="input1">Dari Periode :</label>
                                            <input type="text" id="input1" readonly class="form-control" value="<?= date_format(date_create_from_format('Y-m-d', $periode_awal), 'M, Y') ?>">
                                            <input type="hidden" id="min-month" value="<?= $min_month ?>">
                                            <input type="hidden" id="awal_periode" name="awal_periode" value="<?= $periode_awal ?>">
                                            <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                                            <input type="hidden" name="id_jenis_dagangan" value="<?= $data_pedagang->id_jenis_dagangan ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="periode_akhir">Sampai Dengan :</label>
                                            <input type="text" class="form-control" id="periode_akhir" readonly value="<?= date_format(date_create_from_format('Y-m-d', $periode_akhir), 'M, Y') ?>">
                                            <input type="hidden" name="sampai_dengan" id="sampai_dengan" value="<?= $periode_akhir ?>">
                                            <input type="hidden" name="id_pedagang" value="<?= $data_pedagang->id ?>">
                                            <input type="hidden" name="nama_pemilik" value="<?= $data_pedagang->nama_pemilik ?>">
                                            <input type="hidden" name="nomor_kartu" value="<?= $data_pedagang->nomor_kartu ?>">
                                            <input type="hidden" name="jenis_dagangan" value="<?= $data_pedagang->nama_dagangan ?>">
                                            <input type="hidden" name="wilayah" value="<?= $data_pedagang->wilayah ?>">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="catatan">Catatan :</label> <?= form_error('catatan') ?>
                                        <input type="text" id="catatan" name="catatan" class="form-control">
                                    </div>
                                    <input type="submit" class="btn btn-success" name="btn-proses" value="<?= $button ?>"></input>
                                </form>
                            </div>

                        </div>

                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <!-- /.container-fluid -->

</div>