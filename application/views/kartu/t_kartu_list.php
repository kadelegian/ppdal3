<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Data Pedagang Pantai</h1>

        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4 mr-auto">
                    <?php echo anchor(site_url('kartu/create'), 'Create', 'class="btn btn-primary"'); ?>

                </div>
                <div class="col-md-4 text-center">
                    <?php if ($this->session->userdata('message') <> '') { ?>
                        <div style="margin-top: 8px" class="alert alert-info" id="message">
                            <?php echo $this->session->userdata('message'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-auto">
                    <form action="<?php echo site_url('kartu/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('kartu'); ?>" class="btn btn-default">Reset</a>
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

                        <th>Nama Pemilik</th>
                        <th>Nomor Kartu</th>
                        <th>Dagangan</th>
                        <th>Wilayah</th>
                        <th>Join Date</th>
                        <th>Action</th>
                    </tr><?php
                            foreach ($kartu_data as $kartu) {
                                ?>
                        <tr>


                            <td><?php echo $kartu->nama_pemilik ?></td>
                            <td><?php echo $kartu->nomor_kartu ?></td>
                            <td><?php echo $kartu->nama_dagangan ?></td>
                            <td><?php echo $kartu->wilayah ?></td>
                            <td><?php echo date_format(date_create_from_format('Y-m-d', $kartu->join_date), 'd/m/Y') ?></td>

                            <td style="text-align:center">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-success" href='<?= base_url('kartu/read/' . $kartu->id) ?>'><i class="fas fa-money-check-alt"></i></a>
                                    <a class="btn btn-primary" href='<?= base_url('kartu/update/' . $kartu->id) ?>'>Lihat</a>
                                    <a class="btn btn-danger" href='<?= base_url('kartu/delete/' . $kartu->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

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
                    <?php echo anchor(site_url('kartu/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-6 text-center">
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