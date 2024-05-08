<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card_shadow">
        <div class="card-header">

            <div class="row">
                <?= form_open(base_url('jenis_dagangan/setting_create'), array('method' => 'post', 'class' => 'form-inline')) ?>
                <div class="form_group">
                    <input type="hidden" id="min-month" value="-120">
                    <input type="text" readonly class="form-control" id="periode_akhir" placeholder="Periode Baru">
                    <input type="hidden" id="sampai_dengan" name="periode">
                    <button class="btn btn-success">Create</button>
                </div>
                <?= form_close() ?>
                <?php if ($this->session->userdata('message') <> '') { ?>
                    <div style="margin-top: 8px" class="alert alert-info" id="message">
                        <?php echo $this->session->userdata('message'); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php foreach ($list_periode as $periode) { ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col col-auto">
                        <h1 class="h3 mb-0 text-gray-800">Periode Iuran <?= date_format(date_create_from_format('Y-m-d', $periode->periode), 'M, Y') ?></h1>

                    </div>
                    <div class="col col-auto">
                        <a href="<?= base_url('jenis_dagangan/delete_setting_iuran/?p=' . $periode->periode) ?>" class="btn btn-danger" onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="row" style="margin-bottom: 10px">
                    <?php
                        foreach ($setting as $row) {
                            if ($row->periode == $periode->periode) {
                                ?>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?= $row->nama_dagangan ?></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($row->iuran, 0, ',', '.') ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="row justify-content-end">
                    <div class="col col-auto">
                        <a href="<?= base_url('jenis_dagangan/update_iuran/' . $row->periode) ?>" class="btn btn-primary">Edit</a>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>
    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->