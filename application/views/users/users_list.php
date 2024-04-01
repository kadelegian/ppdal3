<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Data User</h1>

        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <?php echo anchor(site_url('users/create'), 'Create', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-1 text-right">
                </div>
                <div class="col-md-3 text-right">
                    <form action="<?php echo site_url('users/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Reset</a>
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
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Tanggal Reg.</th>
                    <th>Status</th>
                    <th>Nama Lengkap</th>
                    <th>Action</th>
                </tr><?php
                        foreach ($users_data as $users) {
                            ?>
                    <tr>
                        <td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $users->username ?></td>
                        <td><?php echo $users->email ?></td>
                        <td><?php echo date('d-m-Y', $users->created_on) ?></td>
                        <td>
                            <?php if ($users->active) : ?>
                                <a class="btn btn-sm btn-danger" href='<?= base_url('users/disable/' . $users->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menonaktifkan <?= $users->full_name ?> ?')">Non Aktifkan</a>
                            <?php else : ?>
                                <a class="btn btn-sm btn-success" href='<?= base_url('users/aktifkan/' . $users->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Mengaktifkan <?= $users->full_name ?> ?')">Aktifkan</a>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $users->full_name ?></td>
                        <td style="text-align:center">
                            <a class="btn btn-sm btn-primary" href='<?= base_url('users/update/' . $users->id) ?>'>Lihat</a>
                            <a class="btn btn-sm btn-danger" href='<?= base_url('users/delete/' . $users->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

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