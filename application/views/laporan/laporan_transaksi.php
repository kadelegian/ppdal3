<?php
defined('BASEPATH') or exit('No direct script access allowed');
$start = 1;
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1>Laporan Transaksi</h1>

        </div>

        <div class="card-body">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger" id="message">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-3 text-right">
                    <form action="<?php echo site_url('laporan_transaksi'); ?>" id="form-filter" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" name="awal_periode" class="form-control datepicker" id="date-picker1" value="<?= $awal_periode <> '' ? $awal_periode : '' ?>">
                            <input type="hidden" id="date-picker1-alt">
                            <p>-</p>
                            <input type="text" name="akhir_periode" class="form-control datepicker" id="date-picker2" value="<?= $sampai_dengan <> '' ? $sampai_dengan : '' ?>">
                            <input type="hidden" id="date-picker2-alt">
                            <span class="input-group-btn">
                                <a href="<?php echo site_url('laporan_transaksi'); ?>" class="btn btn-default">Reset</a>

                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>

            </div>

            <table class="table table-sm" style="margin-bottom: 10px">

                <tr>

                    <th>#</th>
                    <th>Tanggal</th>
                    <th>REF.</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Cara Bayar</th>
                    <th>Petugas</th>

                </tr>

                <?php if (!empty($data_laporan)) : ?>
                    <?php
                        foreach ($data_laporan as $dt) {

                            ?>
                        <tr>
                            <td style="text-align: center;"><?= $start++; ?></td>
                            <td><?php echo date_format(date_create($dt->tanggal_transaksi), 'd/m/Y') ?></td>
                            <td><?php echo $dt->id_transaksi ?></td>
                            <td><?php echo $dt->keterangan ?></td>
                            <td><?php echo number_format($dt->total_bayar, 0, ',', '.') ?></td>

                            <td><?php echo $dt->cara_bayar ?></td>
                            <td><?php echo $dt->username ?></td>

                        </tr>
                    <?php
                        }
                        ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8">No transactions found</td>
                    </tr>
                <?php endif; ?>
            </table>
            <?php foreach ($summary_cara_bayar as $sumary) { ?>
                <div class="row mb-2">
                    <a href="#" class="btn btn-secondary"><?= $sumary->cara_bayar . ' : ' . number_format($sumary->total_nominal, 0, ',', '.') ?></a>
                </div>
            <?php } ?>
            <div class="row">

                <div class="col text-right">
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