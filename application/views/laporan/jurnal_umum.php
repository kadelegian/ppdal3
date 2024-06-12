<?php
defined('BASEPATH') or exit('No direct script access allowed');
$start = 0;
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1>Jurnal Umum</h1>

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
                    <form action="<?php echo site_url('laporan/jurnal_umum'); ?>" id="form-filter" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" name="awal_periode" class="form-control datepicker" id="date-picker1" value="<?= $awal_periode <> '' ? $awal_periode : '' ?>">
                            <input type="hidden" id="date-picker1-alt">
                            <p>-</p>
                            <input type="text" name="akhir_periode" class="form-control datepicker" id="date-picker2" value="<?= $sampai_dengan <> '' ? $sampai_dengan : '' ?>">
                            <input type="hidden" id="date-picker2-alt">
                            <span class="input-group-btn">
                                <a href="<?php echo site_url('laporan/jurnal_umum'); ?>" class="btn btn-default">Reset</a>

                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 text-right">

                </div>
            </div>

            <table class="table table-sm" style="margin-bottom: 10px">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Balance</th>
                    <th><?= number_format($summary[0]->total_debet, 0, ',', '.') ?></th>
                    <th><?= number_format($summary[0]->total_kredit, 0, ',', '.') ?></th>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <th>REF.</th>
                    <th>Keterangan</th>
                    <th>Kode Akun</th>
                    <th>Nama Akun</th>
                    <th>Petugas</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                </tr>

                <?php if (!empty($data_jurnal)) : ?>
                    <?php
                        foreach ($data_jurnal as $dt) {
                            $start++;
                            ?>
                        <tr>
                            <td><?php echo date_format(date_create($dt->tanggal), 'd/m/Y') ?></td>
                            <td><?php echo $dt->id_transaksi ?></td>
                            <td><?php echo $dt->keterangan ?></td>
                            <td><?php echo $dt->kode_akun ?></td>
                            <td><?php echo $dt->nama_akun ?></td>
                            <td><?php echo $dt->username ?></td>
                            <td><?php echo number_format($dt->debet, 0, ',', '.') ?></td>
                            <td><?php echo number_format($dt->kredit, 0, ',', '.') ?></td>
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