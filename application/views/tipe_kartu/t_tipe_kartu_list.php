<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Data Tipe Kartu</h1>

        </div>

        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <?php echo anchor(site_url('tipe_kartu/create'), 'Create', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-1 text-right">
                </div>
                <div class="col-md-3 text-right">
                    <form action="<?php echo site_url('tipe_kartu/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('tipe_kartu'); ?>" class="btn btn-default">Reset</a>
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
                    <th>Tipe Kartu</th>
                    <th>Extra Charge</th>
                    <th>Diskon</th>
                    <th>Action</th>
                </tr><?php
                        foreach ($tipe_kartu_data as $tipe_kartu) {
                            ?>
                    <tr>
                        <td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $tipe_kartu->tipe_kartu ?></td>
                        <td><?php echo $tipe_kartu->keterangan_charge . '(' . number_format($tipe_kartu->extra_charge, 0, ",", ".") . ')' ?></td>
                        <td><?php echo $tipe_kartu->keterangan_diskon . '(' . number_format($tipe_kartu->nominal_diskon, 0, ",", ".") . ')' ?></td>
                        <td style="text-align:center">
                            <a class="btn btn-primary" href='<?= base_url('tipe_kartu/update/' . $tipe_kartu->id) ?>'>Lihat</a>
                            <a class="btn btn-danger" href='<?= base_url('tipe_kartu/delete/' . $tipe_kartu->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

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