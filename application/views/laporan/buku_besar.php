<?php
defined('BASEPATH') or exit('No direct script access allowed');

if ($info_akun_terpilih->sn == 'd') {
    $saldo = $saldo_page['debet'] - $saldo_page['kredit'];
} elseif ($info_akun_terpilih->sn == 'k') {
    $saldo = $saldo_page['kredit'] - $saldo_page['debet'];
}

if ($info_akun_terpilih->sn == 'd') {
    $sa = $saldo_awal->debet - $saldo_awal->kredit;
    $sak = $summary->debet + $sa;
} else {
    $sa = $saldo_awal->kredit - $saldo_awal->debet;
    $sak = $summary->kredit + $sa;
}
$saldo += $sa;
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h1>Buku Besar</h1>
            <h4>Periode <?= date_format(date_create_from_format('Y-m-d', $periode), 'd/m/Y') ?> - <?= date('d/m/Y') ?></h4>
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
            <div class="row justify-content-between align-items-end">
                <div class="col-auto">
                    <form action="<?php echo site_url('laporan/buku_besar'); ?>" id="form-filter" class="form-inline" method="get">
                        <div class="form-group my-3" style="margin-right: 3px;">
                            <select name="id_akun" id="id_akun" class="form-control">
                                <?php foreach ($data_semua_akun as $dt) : ?>
                                    <option value="<?= $dt->id ?>" <?= $dt->id == $info_akun_terpilih->id ? 'selected' : '' ?>><?= $dt->kode_akun . '|' . $dt->nama_akun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Tampilkan">
                        </div>
                    </form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Saldo Awal</span>
                        </div>
                        <input type="text" readonly class="form-control" aria-describedby="basic-addon1" value="<?= number_format($sa, 0, ',', '.') ?>">
                    </div>


                </div>
                <div class="col-auto">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Saldo Akhir</span>
                        </div>
                        <input type="text" readonly class="form-control" aria-describedby="basic-addon1" value="<?= number_format($sak, 0, ',', '.') ?>">
                    </div>
                </div>
            </div>

            <table class="table table-sm" style="margin-bottom: 10px">

                <tr>
                    <th>Tanggal</th>
                    <th>REF.</th>
                    <th>Keterangan</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
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