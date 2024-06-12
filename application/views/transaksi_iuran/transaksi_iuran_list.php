<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">List Transaksi Pedagang Pantai</h1>

        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="row">
                    <div class="col">
                        <div id="message" class="alert alert-danger">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-3 text-right">
                    <form action="<?php echo site_url('transaksi_iuran/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" id="date-picker1" value="<?= $awal_periode <> '' ? date_format(date_create_from_format('Y-m-d', $awal_periode), 'd/m/Y') : '' ?>">
                            <input type="hidden" id="date-picker1-alt" name="awal_periode">
                            <p>-</p>
                            <input type="text" class="form-control datepicker" id="date-picker2" value="<?= $sampai_dengan <> '' ? date_format(date_create_from_format('Y-m-d', $sampai_dengan), 'd/m/Y') : '' ?>">
                            <input type="hidden" id="date-picker2-alt" name="akhir_periode">
                            <span class="input-group-btn">
                                <a href="<?php echo site_url('transaksi_iuran'); ?>" class="btn btn-default">Reset</a>

                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-bordered" style="margin-bottom: 10px">
                <tr>
                    <th>Nomor Trx.</th>
                    <th>Tanggal Trx.</th>
                    <th>Nama Pedagang</th>
                    <th>Nominal</th>
                    <th>Ket.</th>
                    <th>Petugas</th>

                </tr><?php
                        foreach ($data_transaksi as $dt) {

                            $start++;
                            ?>
                    <tr>

                        <td><?= str_pad($dt->id_transaksi, 4, '0', STR_PAD_LEFT) ?></td>
                        <td><?php echo date_format(date_create($dt->tanggal_transaksi), 'd-M-Y') ?></td>
                        <td><?php echo $dt->nama_pemilik ?></td>
                        <td><?php echo number_format($dt->debet, 0, ',', '.')
                                ?></td>
                        <td><?= $dt->alias ?></td>
                        <td><?php echo $dt->nama_user ?></td>
                        <td style="text-align:center">
                            <div class="btn-group" role="group">
                                <a class="btn btn-success" href='<?= base_url('transaksi_iuran/read/' . $dt->id_transaksi) ?>'><i class="fas fa-money-check-alt"></i>Kwitansi</a>
                                <?php if ($_SESSION['role'] == 0) { ?>
                                    <a class="btn btn-primary" href='<?= base_url('transaksi_iuran/update/' . $dt->id_transaksi) ?>'><i class="fas fa-money-check-alt"></i>Edit</a>

                                    <a class="btn btn-danger" href='<?= base_url('transaksi_iuran/delete/' . $dt->id_transaksi) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

                                <?php } ?>

                            </div>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="row">
                <div class="col-md-6">
                    <?php if ($total_nominal > 0) { ?>
                        <a href="#" class="btn btn-primary">Total Nominal : <?php echo number_format($total_nominal, 0, ',', '.') ?></a>
                    <?php } ?>
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