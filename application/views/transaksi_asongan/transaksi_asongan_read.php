<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img src="<?= base_url('assets/img/logo.png') ?>" width="75" alt="">
                    </div>
                    <div class="col-auto">
                        <table>

                            <tr>
                                <td>Nomor Transaksi</td>
                                <td>:</td>
                                <td><?= $nomor_transaksi ?></td>
                            </tr>
                            <tr>
                                <td>Nama Pedagang</td>
                                <td>:</td>
                                <td><?= $nama_pedagang ?></td>
                            </tr>

                            <tr>
                                <td>Jenis Dagangan</td>
                                <td>:</td>
                                <td><?= $jenis_dagangan ?></td>
                            </tr>

                        </table>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col-auto">
                        <table>

                            <tr>
                                <td>Tanggal </td>
                                <td> : </td>
                                <td><?= $tanggal_transaksi ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Kartu </td>
                                <td> : </td>
                                <td><?= $nomor_kartu ?></td>
                            </tr>
                            <tr>
                                <td>Wilayah </td>
                                <td> : </td>
                                <td><?= $wilayah ?></td>
                            </tr>

                        </table>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-auto">
                        <strong>
                            Bukti Pembayaran Iuran
                        </strong>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <table class="table table-sm my-2">
                            <thead class="thead-light ">
                                <tr>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $keterangan_iuran ?></td>
                                    <td><?= $kali_nominal . 'x ' . number_format($nominal_iuran, 0, ',', '.') ?></td>
                                    <td><?= number_format($total_iuran, 0, ',', '.')  ?></td>
                                </tr>
                                <tr>
                                    <td><?= $keterangan_charge ?></td>
                                    <td><?= $kali_nominal . 'x ' . number_format($nominal_charge, 0, ',', '.') ?></td>
                                    <td><?= number_format($total_charge, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td><?= $keterangan_diskon ?></td>
                                    <td><?= $kali_nominal . 'x ' . number_format($nominal_diskon, 0, ',', '.') ?></td>
                                    <td><?= number_format($total_diskon, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td><strong>Total Bayar</strong> </td>
                                    <td>
                                        <strong>
                                            <?= number_format($total_bayar, 0, ',', '.') ?>

                                        </strong>
                                    </td>
                                </tr>


                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <table>
                            <tr>
                                <td>Terbilang :</td>
                            </tr>
                            <tr>
                                <td><?= $terbilang ?></td>

                            </tr>

                        </table>
                    </div>
                    <div class="col"></div>
                    <div class="col">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                Petugas,
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <u>
                                    <?= '(' . $nama_user . ')' ?>

                                </u>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-print-none">
            <div class="col-auto">
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-primary" onclick="window.print()"><i class="fas fa-print"></i>Print</button>
                    <form method="post" action="<?= base_url('transaksi_iuran_pedagang/download/') ?>" target="_blank">
                        <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $id_transaksi ?>">
                        <button type="submit" class="btn btn-success"><i class="fas fa-download"></i>Download</button>
                    </form>
                    <a href="<?= base_url() ?>">
                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i>Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- /.container-fluid -->

</div>