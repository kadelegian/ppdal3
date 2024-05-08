<?php
defined('BASEPATH') or exit('No direct script access allowed');
$str_tipe = '';
if ($tipe == 1) {
    $str_tipe = '_asongan';
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Jenis Dagangan <?= ($tipe > 0 ? 'Asongan' : 'Pantai') ?></h1>

        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <?php echo anchor(site_url($btn_create), 'Create', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-4 text-center">
                    <?php if ($this->session->userdata('message') <> '') { ?>

                        <P class="text text-info text-sm" id="message">

                            <?php echo $this->session->userdata('message'); ?>
                        </P>

                    <?php } ?>
                </div>
                <div class="col-md-1 text-right">
                </div>
                <div class="col-md-3 text-right">
                    <form action="<?php echo site_url('jenis_dagangan' . $str_tipe . '/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('jenis_dagangan' . $str_tipe); ?>" class="btn btn-default">Reset</a>
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
                        <th>Nama Dagangan</th>
                        <th>Prefix Dagangan</th>
                        <?php if ($tipe < 1) { ?>
                            <th>Iuran</th>
                        <?php } ?>
                        <th>Action</th>
                    </tr><?php
                            $str_tipe = '';
                            if ($tipe == 1) {
                                $str_tipe = '_asongan';
                            }
                            foreach ($jenis_dagangan_data as $jenis_dagangan) {
                                ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $jenis_dagangan->nama_dagangan ?></td>
                            <td><?php echo $jenis_dagangan->prefix_dagangan ?></td>
                            <?php if ($tipe < 1) { ?>
                                <td><?php echo number_format($jenis_dagangan->iuran, 0, ",", ".")  ?></td>
                            <?php } ?>
                            <td style="text-align:center">
                                <div class="btn-group" role="group">

                                    <a class="btn btn-primary" href='<?= base_url('jenis_dagangan' . $str_tipe . '/' . 'update/' . $jenis_dagangan->id) ?>'>Lihat</a>
                                    <a class="btn btn-danger" href='<?= base_url('jenis_dagangan' . $str_tipe . '/' . 'delete/' . $jenis_dagangan->id) ?>' onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus data?')">Delete</a>

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