<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Diskon</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Keterangan Diskon <?php echo form_error('keterangan_diskon') ?></label>
                    <input type="text" class="form-control" name="keterangan_diskon" id="keterangan_diskon" placeholder="Keterangan Diskon" value="<?php echo $keterangan_diskon; ?>" />
                </div>
                <div class="form-group">
                    <label for="bigint">Nominal Diskon <?php echo form_error('nominal_diskon') ?></label>
                    <input type="text" class="form-control" name="nominal_diskon" id="nominal_diskon" placeholder="Nominal Diskon" value="<?php echo $nominal_diskon; ?>" />
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('diskon') ?>" class="btn btn-success">Back</a>
            </form>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->