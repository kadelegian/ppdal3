<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $button ?> Data Pedagang Asongan</h6>

        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <input type="hidden" value="<?= base_url() ?>" id="base_url">
                <div class="form-group">
                    <label for="nama_pedagang">Nama Pedagang <?php echo form_error('nama_pedagang') ?></label>
                    <input type="text" class="form-control" name="nama_pedagang" id="nama_pedagang" placeholder="Nama Pedagang" value="<?php echo $nama_pedagang; ?>" />
                </div>
                <div class="form-group">
                    <label for="no_hp">No Hp <?php echo form_error('no_hp') ?></label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
                </div>
                <div class="form-group">

                    <label for="join_date">Join Date <?php echo form_error('join_date') ?></label>
                    <input type="text" name="join_date" class="datepicker form-control" id="join_date" value="<?php echo $join_date ?>" />
                </div>
                <div class="form-group">
                    <label for="id_jenis_dagangan">Jenis Dagangan <?php echo form_error('id_jenis_dagangan') ?></label>
                    <select class="form-control" id="id_jenis_dagangan" name="id_jenis_dagangan">
                        <?php foreach ($jenis_dagangan as $jd) : ?>
                            <option value="<?= $jd->id ?>" <?= $jd->id == $id_jenis_dagangan ? 'selected' : '' ?>><?= $jd->nama_dagangan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_extra_charge">Penjamin <?php echo form_error('id_extra_charge') ?></label>
                    <select class="form-control" id="id_extra_charge" name="id_extra_charge">
                        <?php foreach ($extra_charge as $penjamin) : ?>
                            <option value="<?= $penjamin->id ?>" <?= $penjamin->id == $id_extra_charge ? 'selected' : '' ?>><?= $penjamin->keterangan_charge . '(' . number_format($penjamin->extra_charge, 0, ",", ".") . ')' ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_wilayah">Wilayah <?php echo form_error('id_wilayah') ?></label>
                    <select class="form-control" id="id_wilayah" name="id_wilayah">
                        <?php foreach ($data_wilayah as $wilayah) : ?>
                            <option value="<?= $wilayah->id ?>" <?= $wilayah->id == $id_wilayah ? 'selected' : '' ?>><?= $wilayah->wilayah ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="hidden" id='id' name="id" value="<?php echo $id; ?>" />
                <div class="form-group">

                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('pedagang') ?>" class="btn btn-grey">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->