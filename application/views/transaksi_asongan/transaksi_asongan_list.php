<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Transaksi Iuran Asongan</h1>

        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-3 text-right">
                    <form action="<?php echo site_url('transaksi_iuran/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('transaksi_iuran'); ?>" class="btn btn-default">Reset</a>
                                <?php
                                }
                                ?>
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
                    <th>Petugas</th>

                </tr><?php
                        foreach ($data_transaksi as $dt) {
                            ?>
                    <tr>

                        <td><?= str_pad($dt->nomor_transaksi, 4, '0', STR_PAD_LEFT) ?></td>
                        <td><?php echo date_format(date_create($dt->tanggal_transaksi), 'd-M-Y') ?></td>
                        <td><?php echo $dt->nama_pedagang ?></td>
                        <td><?php echo number_format($dt->nominal, 0, ',', '.') ?></td>
                        <td><?php echo $dt->nama_user ?></td>
                        <td style="text-align:center">
                            <div class="btn-group" role="group">
                                <a class="btn btn-success" href='<?= base_url('transaksi_iuran_pedagang/read/' . $dt->id_transaksi) ?>'><i class="fas fa-money-check-alt"></i></a>

                                <a class="btn btn-danger" href='<?= base_url('transaksi_iuran_pedagang/delete/' . $dt->id_transaksi) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

                            </div>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
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