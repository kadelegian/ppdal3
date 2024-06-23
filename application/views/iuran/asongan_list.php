<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Transaksi Pedagang Asongan</h1>

        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-4">
                    <div>
                        <form action="<?php echo site_url('iuran_asongan/index'); ?>" class="form-inline" method="get">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('iuran_asongan'); ?>" class="btn btn-default">Reset</a>
                                <?php
                                }
                                ?>

                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </form>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <?php if ($this->session->userdata('message') <> '') { ?>
                        <div class="alert alert-info alert-sm" id="message">
                            <?php echo $this->session->userdata('message'); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-4">


                </div>
            </div>
            <div class="row">
                <div class="input-group">
                </div>
            </div>
            <table class="table table-hover table-striped table-bordered mt-2">
                <tr>

                    <th>Nomor ID</th>
                    <th>Nama Pedagang</th>
                    <th>Wilayah</th>
                    <th>Dagangan</th>
                    <th>Join Date</th>

                </tr><?php
                        foreach ($pedagang_data as $pedagang) {
                            ?>
                    <tr>
                        <?php ++$start; ?>
                        <td>
                            <?php if ($pedagang->alias <> '-') { ?>
                                <a href="<?= base_url('pedagang/read/' . $pedagang->alias) ?>">
                                    <?= $pedagang->nomor ?>
                                </a>
                            <?php } else { ?>
                                <?= $pedagang->nomor ?>
                            <?php } ?>
                        </td>
                        <td><?php if ($pedagang->alias <> '-') { ?>
                                <a href="<?= base_url('pedagang/read/' . $pedagang->alias) ?>">
                                    <?php echo $pedagang->nama_pedagang ?>
                                </a>
                        </td>
                    <?php } else { ?>
                        <?php echo $pedagang->nama_pedagang ?></td>
                    <?php } ?>
                    <td><?= $pedagang->wilayah ?></td>

                    <td><?php echo $pedagang->nama_dagangan ?></td>
                    <td><?php echo date_format(date_create_from_format('Y-m-d', $pedagang->join_date), 'd/m/Y')  ?></td>

                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="row">

                <div class="col text-center">
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