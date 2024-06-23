<?php
defined('BASEPATH') or exit('No direct script access allowed');
$total_aset = 0;
$total_kewajiban = 0;
$total_modal = 0;
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h1>Neraca</h1>
            <h4>Periode <?= date_format(date_create_from_format('Y-m-d', $periode), 'd/m/Y') ?> - <?= date('d/m/Y') ?></h4>
        </div>

        <div class="card-body">


            <table class="table table-sm table-bordered" style="margin-bottom: 10px">


                <tr>

                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th style="text-align: center;">Saldo</th>

                </tr>
                <?php if (sizeof($data_aset) > 0) { ?>
                    <tr>
                        <td colspan="3"><strong>Aset</strong></td>
                    </tr>

                    <?php
                        foreach ($data_aset as $dt) {
                            $total_aset += $dt->saldo_akhir; ?>
                        <tr>
                            <td><?php echo $dt->kode_akun ?></td>
                            <td><?php echo $dt->nama_akun ?></td>
                            <td style="text-align: end;"><?php echo number_format($dt->saldo_akhir, 0, ',', '.') ?></td>

                        </tr>
                    <?php } ?>

                    <tr style="background-color: lightgray;">
                        <td colspan="2" style="text-align: end;"><strong>Total Aset</strong></td>
                        <td style="text-align: end;"><strong><?= number_format($total_aset, 0, ',', '.') ?></strong></td>
                    </tr>
                <?php } ?>
                <?php if (sizeof($data_kewajiban) > 0) { ?>
                    <tr>
                        <td colspan="3"><strong>Kewajiban</strong></td>
                    </tr>

                    <?php
                        foreach ($data_kewajiban as $dtb) {
                            $total_kewajiban += $dtb->saldo_akhir; ?>
                        <tr>
                            <td><?php echo $dtb->kode_akun ?></td>
                            <td><?php echo $dtb->nama_akun ?></td>
                            <td style="text-align: end;"><?php echo number_format($dtb->saldo_akhir, 0, ',', '.') ?></td>

                        </tr>
                    <?php } ?>

                    <tr style="background-color: lightgray;">
                        <td colspan="2" style="text-align: end;"><strong>Total Kewajiban</strong></td>
                        <td style="text-align: end;"><strong><?= number_format($total_kewajiban, 0, ',', '.') ?></strong></td>
                    </tr>
                <?php } ?>

                <?php if (sizeof($data_modal) > 0 || $labarugi_periode > 0) { ?>
                    <tr>
                        <td colspan="3"><strong>Modal</strong></td>
                    </tr>

                    <?php
                        foreach ($data_modal as $dtc) {
                            $total_modal += $dtc->saldo_akhir; ?>
                        <tr>
                            <td><?php echo $dtc->kode_akun ?></td>
                            <td><?php echo $dtc->nama_akun ?></td>
                            <td style="text-align: end;"><?php echo number_format($dtc->saldo_akhir, 0, ',', '.') ?></td>

                        </tr>
                    <?php } ?>
                    <tr>
                        <td>3300</td>
                        <td>LABA PERIODE BERJALAN</td>
                        <td style="text-align: end;"><?php echo number_format($labarugi_periode, 0, ',', '.') ?></td>

                    </tr>
                    <tr style="background-color: lightgray;">
                        <td colspan="2" style="text-align: end;"><strong>Total Modal</strong></td>
                        <td style="text-align: end;"><strong><?= number_format($total_modal + $labarugi_periode, 0, ',', '.') ?></strong></td>
                    </tr>
                <?php } ?>

                <tr style="background-color:lightblue">
                    <td colspan="2" style="text-align: end;">Total Kewajiban & Modal</td>
                    <td style="text-align: end;"><strong><?= number_format($total_modal + $labarugi_periode + $total_kewajiban, 0, ',', '.') ?></strong></td>
                </tr>
            </table>
            <div class="row align-item-center">


            </div>
        </div>
    </div>

    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->