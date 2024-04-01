<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Pedagang</h1>

        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-6">
                    <?php echo anchor(site_url('pedagang/create'), 'Create', 'class="btn btn-success"'); ?>
                </div>


                <div class="col-6">
                    <div class="float-right">
                        <form action="<?php echo site_url('pedagang/index'); ?>" class="form-inline" method="get">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('pedagang'); ?>" class="btn btn-default">Reset</a>
                                <?php
                                }
                                ?>

                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </form>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="input-group">
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>No</th>

                    <th>Nama Pedagang</th>
                    <th>Alamat Pedagang</th>
                    <th>No Hp</th>
                    <th>Join Date</th>
                    <th style="text-align:center">Action</th>
                </tr><?php
                        foreach ($pedagang_data as $pedagang) {
                            ?>
                    <tr>
                        <td width="80px"><?php echo ++$start ?></td>

                        <td><?php echo $pedagang->nama_pedagang ?></td>
                        <td><?php echo $pedagang->alamat_pedagang ?></td>
                        <td><?php echo $pedagang->no_hp ?></td>
                        <td><?php echo date_format(date_create_from_format('Y-m-d', $pedagang->join_date), 'd/m/Y')  ?></td>
                        <td style="text-align:center" width="auto">
                            <a class="btn btn-primary" href='<?= base_url('pedagang/update/' . $pedagang->id) ?>'>Lihat</a>
                            <a class="btn btn-danger" href='<?= base_url('pedagang/delete/' . $pedagang->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="row">
                <div class="col-auto">
                    <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                    <?php echo anchor(site_url('pedagang/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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