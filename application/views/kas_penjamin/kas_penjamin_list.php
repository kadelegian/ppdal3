<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Kas Penjamin</h1>

        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">

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
                <table class="table table-bordered" style="margin-bottom: 10px">
                    <tr>
                        <th>No</th>
                        <th>Rekening</th>
                        <th>Nominal</th>
                        <th style="text-align:center">Action</th>
                    </tr><?php $start = 0;
                            foreach ($data_kas_penjamin as $dt) {

                                ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $dt->nama_akun ?></td>
                            <td><?php echo number_format($dt->jumlah, 0, ",", ".") ?></td>
                            <td style="text-align:center">
                                <div class="btn-group" role="group">
                                    <form action="<?= base_url('kas_penjamin/transfer') ?>" method="post">
                                        <input type="hidden" name="id_akun" value="<?= $dt->id ?>">
                                        <input type="hidden" name="nominal" value="<?= $dt->jumlah ?>">
                                        <input type="submit" class="btn btn-primary" value="Setor"> </form>

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

                </div>

            </div>
        </div>
    </div>

    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->