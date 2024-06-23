<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h1>Laba Rugi</h1>
            <h4>Periode <?= date_format(date_create_from_format('Y-m-d', $periode), 'd/m/Y') ?> - <?= date('d/m/Y') ?></h4>
        </div>

        <div class="card-body">


            <table class="table table-sm table-bordered" style="margin-bottom: 10px">


                <tr>

                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th style="text-align: center;">Saldo</th>

                </tr>

                <tr>
                    <td colspan="3"><strong>Pendapatan</strong></td>
                </tr>

                <?php
                foreach ($data_pendapatan as $dt) {
                    $total_pendapatan += $dt['saldo']; ?>
                    <tr>
                        <td><?php echo $dt['kode_akun'] ?></td>
                        <td><?php echo $dt['nama_akun'] ?></td>
                        <td style="text-align: end;"><?php echo number_format($dt['saldo'], 0, ',', '.') ?></td>

                    </tr>
                <?php } ?>

                <tr style="background-color: lightgray;">
                    <td colspan="2" style="text-align: end;"><strong>Total Pendapatan</strong></td>
                    <td style="text-align: end;"><strong><?= number_format($total_pendapatan, 0, ',', '.') ?></strong></td>
                </tr>

                <tr>
                    <td colspan="3"><strong>Biaya</strong></td>
                </tr>

                <?php

                if (sizeof($data_biaya) > 0) {
                    foreach ($data_biaya as $dtb) { ?>
                        <tr>
                            <td><?php echo $dtb['kode_akun'] ?></td>
                            <td><?php echo $dtb['nama_akun'] ?></td>
                            <td style="text-align: end;"><?php echo number_format($dtb['saldo'], 0, ',', '.') ?></td>

                        </tr>
                <?php }
                } ?>

                <tr style="background-color: lightgray;">
                    <td colspan="2" style="text-align: end;"><strong>Total Biaya</strong></td>
                    <td style="text-align: end;"><strong><?= number_format($total_biaya, 0, ',', '.') ?></strong></td>
                </tr>

                <?php $labarugi = $total_pendapatan - $total_biaya;
                if ($labarugi < 0) {
                    $judul = 'Rugi';
                } else {
                    $judul = 'Laba';
                } ?>
                <tr style="background-color:lightblue">
                    <td colspan="2" style="text-align: end;"><strong><?= $judul ?></strong></td>
                    <td style="text-align: end;"><strong><?= number_format($labarugi, 0, ',', '.') ?></strong></td>
                </tr>
            </table>
            <div class="row align-item-center">


            </div>
        </div>
    </div>

    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->