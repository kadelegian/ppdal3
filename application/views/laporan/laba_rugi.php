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
                    <th rowspan="2" style="text-align: center; vertical-align:middle;">Kode Akun</th>
                    <th rowspan="2" style="text-align: center; vertical-align:middle;">Nama Akun</th>
                    <th colspan="2" style="text-align: center;">Saldo Awal</th>

                    <th colspan="2" style="text-align: center;">Pergerakan</th>

                    <th colspan="2" style="text-align: center;">Saldo Akhir</th>

                    <th colspan="2" style="text-align: center;">Laba Rugi</th>

                    <th colspan="2" style="text-align: center;">Neraca</th>

                </tr>
                <tr>

                    <th style="text-align: center;">Debet</th>
                    <th style="text-align: center;">Kredit</th>
                    <th style="text-align: center;">Debet</th>
                    <th style="text-align: center;">Kredit</th>
                    <th style="text-align: center;">Debet</th>
                    <th style="text-align: center;">Kredit</th>
                    <th style="text-align: center;">Debet</th>
                    <th style="text-align: center;">Kredit</th>
                    <th style="text-align: center;">Debet</th>
                    <th style="text-align: center;">Kredit</th>
                </tr>

                <?php if (!empty($data_buku_besar)) : ?>
                    <?php
                        foreach ($data_buku_besar as $dt) {
                            if ($info_akun_terpilih->sn == 'd') {
                                $saldo = ($saldo + $dt->debet) - $dt->kredit;
                            } else {
                                $saldo = ($saldo + $dt->kredit) - $dt->debet;
                            }
                            ?>
                        <tr>
                            <td><?php echo date_format(date_create($dt->tanggal), 'd/m/Y') ?></td>
                            <td><?php echo $dt->id_transaksi ?></td>
                            <td><?php echo $dt->keterangan ?></td>
                            <td><?php echo number_format($dt->debet, 0, ',', '.') ?></td>
                            <td><?php echo number_format($dt->kredit, 0, ',', '.') ?></td>
                            <td><?php echo number_format($saldo, 0, ',', '.') ?></td>
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
            <div class="row align-item-center">
                <div class="col">

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