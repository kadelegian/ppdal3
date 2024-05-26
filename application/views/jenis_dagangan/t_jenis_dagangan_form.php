<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Dagangan <?= ($tipe > 0 ? 'Asongan' : 'Pantai') ?></h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Nama Dagangan <?php echo form_error('nama_dagangan') ?></label>
                    <input type="text" class="form-control" name="nama_dagangan" id="nama_dagangan" placeholder="Nama Dagangan" value="<?php echo $nama_dagangan; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Prefix Dagangan <?php echo form_error('prefix_dagangan') ?></label>
                    <input type="text" class="form-control" name="prefix_dagangan" id="prefix_dagangan" placeholder="Prefix Dagangan" value="<?php echo $prefix_dagangan; ?>" />
                </div>
                <div class="form-group">
                    <select name="tipe" class="form-control" id="tipe">
                        <option value="0" <?= $tipe == 0 ? 'selected' : '' ?>>Pdg.Pantai</option>
                        <option value="1" <?= $tipe == 1 ? 'selected' : '' ?>>Asongan</option>
                    </select>

                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('jenis_dagangan') ?>" class="btn btn-warning">Kembali</a>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->