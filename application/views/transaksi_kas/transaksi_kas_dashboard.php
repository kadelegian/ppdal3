<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Transaksi Kas</h1>

        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($data_saldo as $data) : ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $data->nama_akun ?></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($data->saldo, 0, ',', '.') ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-2">
                    <?php echo anchor(site_url('pedagang/create'), 'Tambah Transaksi', 'class="btn btn-success"'); ?>
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


            </div>
        </div>
    </div>
</div>