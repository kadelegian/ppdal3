<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Wilayah</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="int">Nomor Wilayah <?php echo form_error('nomor_wilayah') ?></label>
                    <input type="text" class="form-control" name="nomor_wilayah" id="nomor_wilayah" placeholder="Nomor Wilayah" value="<?php echo $nomor_wilayah; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Wilayah <?php echo form_error('wilayah') ?></label>
                    <input type="text" class="form-control" name="wilayah" id="wilayah" placeholder="Wilayah" value="<?php echo $wilayah; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Prefix Wilayah <?php echo form_error('prefix_wilayah') ?></label>
                    <input type="text" class="form-control" name="prefix_wilayah" id="prefix_wilayah" placeholder="Prefix Wilayah" value="<?php echo $prefix_wilayah; ?>" />
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('wilayah') ?>" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->