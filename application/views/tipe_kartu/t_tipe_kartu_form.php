<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Extra Charge</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Tipe Kartu <?php echo form_error('tipe_kartu') ?></label>
                    <input type="text" class="form-control" name="tipe_kartu" id="tipe_kartu" placeholder="Tipe Kartu" value="<?php echo $tipe_kartu; ?>" />
                </div>

                <div class="form-group">
                    <label for="extra_charge">Extra Charge:</label>
                    <select class="form-control" id="id_extra_charge" name="id_extra_charge">
                        <?php foreach ($extra_charge as $charge) : ?>
                            <option value="<?= $charge->id ?>" <?= $charge->id == $id_extra_charge ? 'selected' : '' ?>><?= $charge->keterangan_charge ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="extra_charge">Diskon:</label>
                    <select class="form-control" id="id_diskon" name="id_diskon">
                        <?php foreach ($diskon as $disk) : ?>
                            <option value="<?= $disk->id ?>" <?= $disk->id == $id_diskon ? 'selected' : '' ?>><?= $disk->keterangan_diskon ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('tipe_kartu') ?>" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->