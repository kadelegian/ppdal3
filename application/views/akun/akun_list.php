<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Daftar Akun</h1>

        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <?php echo anchor(site_url('akun/create'), 'Create', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-1 text-right">
                </div>
                <div class="col-md-3 text-right">

                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-sm" style="margin-bottom: 10px">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Balance</th>
                        <th id="total_debet"><?= $total_debet ?></th>
                        <th id="total_kredit"><?= $total_kredit ?></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Kode Akun</th>
                        <th>Nama Akun</th>
                        <th>Akun Sistem</th>
                        <th>Tipe</th>
                        <th>S.A. Debet</th>
                        <th>S.A. Kredit</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($data_akun as $d_akun) {
                        ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>

                            <td><?php echo $d_akun->kode_akun ?></td>
                            <td><?php echo $d_akun->nama_akun ?></td>
                            <td><?php if ($d_akun->is_iuran) {
                                        echo 'Iuran';
                                    }
                                    if ($d_akun->is_penjamin) {
                                        echo ' Penjamin';
                                    } ?></td>
                            <td><?php echo $d_akun->tipe ?></td>
                            <td><?php echo number_format($d_akun->debet, 0, ',', '.') ?></td>
                            <td><?php echo number_format($d_akun->kredit, 0, ',', '.') ?></td>
                            <td style="text-align:center">
                                <div class="btn-group" role="group">
                                    <?php if ($d_akun->aktif) { ?>
                                        <a class="btn btn-primary" href='<?= base_url('akun/update/' . $d_akun->id) ?>'><i class="fas fa-search"></i>Lihat</a>
                                        <?php if (!$d_akun->sistem) { ?>
                                            <a class="btn btn-danger" href='<?= base_url('akun/nonaktifkan/' . $d_akun->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Me-non aktifkan Akun??')">Disable</a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
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