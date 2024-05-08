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
                    <form action="<?php echo site_url('akun/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('akun'); ?>" class="btn btn-default">Reset</a>
                                <?php
                                }
                                ?>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-bottom: 10px">
                    <tr>
                        <th>No</th>
                        <th>Nama Akun</th>
                        <th>Akun Alias</th>
                        <th>Nomor Rekening</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr><?php
                            foreach ($data_akun as $d_akun) {
                                ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $d_akun->nama_akun ?></td>
                            <td><?php echo $d_akun->alias ?></td>
                            <td><?php echo $d_akun->nomor_rekening ?></td>
                            <td><?php echo $d_akun->keterangan  ?></td>
                            <td style="text-align:center">
                                <div class="btn-group" role="group">
                                    <?php if ($d_akun->aktif) { ?>
                                        <a class="btn btn-primary" href='<?= base_url('akun/update/' . $d_akun->id) ?>'><i class="fas fa-search"></i>Lihat</a>
                                        <a class="btn btn-danger" href='<?= base_url('akun/nonaktifkan/' . $d_akun->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Me-non aktifkan Akun??')">Disable</a>
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