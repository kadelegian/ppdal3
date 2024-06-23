<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Transaksi Iuran Pedagang Pantai</h1>

        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4 mr-auto">
                    <form action="<?php echo site_url('iuran_pedagang/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('iuran_pedagang'); ?>" class="btn btn-default">Reset</a>
                                <?php
                                }
                                ?>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 text-center">
                    <?php if ($this->session->userdata('message') <> '') { ?>
                        <div style="margin-top: 8px" class="alert alert-info" id="message">
                            <?php echo $this->session->userdata('message'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-auto">

                </div>
            </div>
            <div class="table-responsive">

                <table class="table table-hover table-striped table-bordered mt-2">
                    <tr>

                        <th>Nomor Kartu</th>
                        <th>Nama Pedagang</th>
                        <th>Dagangan</th>
                        <th>Wilayah</th>
                        <th>Join Date</th>

                    </tr><?php
                            foreach ($kartu_data as $kartu) {
                                ?>
                        <tr>
                            <td><?php if ($kartu->alias <> '-') { ?>
                                    <a href="<?= base_url('kartu/read/' . $kartu->alias) ?>">
                                        <?php echo $kartu->nomor_kartu ?>
                                    </a>
                                <?php } else { ?>
                                    <?php echo $kartu->nomor_kartu ?>
                                <?php } ?>
                            </td>
                            <td><?php if ($kartu->alias <> '-') { ?>
                                    <a href="<?= base_url('kartu/read/' . $kartu->alias) ?>">
                                        <?php echo $kartu->nama_pemilik ?></td>
                            </a>
                        <?php } else { ?>
                            <?php echo $kartu->nama_pemilik ?>
                        <?php } ?>
                        </td>
                        <td><?php echo $kartu->nama_dagangan ?></td>
                        <td><?php echo $kartu->wilayah ?></td>
                        <td><?php echo date_format(date_create_from_format('Y-m-d', $kartu->join_date), 'd/m/Y') ?></td>


                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
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