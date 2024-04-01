<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kartu</h6>
            <?= validation_errors() ?>
        </div>
        <div class="card-body">
            <?php echo form_open($action) ?>
            <div class="form-group">
                <?php if ($button == 'Create') {
                    $id_pedagang = 0;
                } ?>
                <input type="hidden" class="form-control" name="id_pedagang" id="id_pedagang" placeholder="Id Pedagang" value="<?php echo $id_pedagang; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nama Pemilik Kartu <?php echo form_error('nama_pemilik') ?></label>
                <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo $nama_pemilik; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nomor Kartu <?php echo form_error('nomor_kartu') ?></label>
                <input type="text" class="form-control" name="nomor_kartu" id="nomor_kartu" placeholder="Nomor Kartu" value="<?php echo $nomor_kartu; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Alamat<?php echo form_error('alamat_kartu') ?></label>
                <input type="text" class="form-control" name="alamat_kartu" id="alamat_kartu" placeholder="Alamat Kartu" value="<?php echo $alamat_kartu; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nomor Telp <?php echo form_error('nomor_telp') ?></label>
                <input type="text" class="form-control" name="nomor_telp" id="nomor_telp" placeholder="Nomor Telp" value="<?php echo $nomor_telp; ?>" />
            </div>
            <div class="form-group">
                <label for="id_tipe_kartu">Tipe Kartu <?php echo form_error('id_tipe_kartu') ?></label>
                <select class="form-control" id="id_tipe_kartu" name="id_tipe_kartu">
                    <?php foreach ($tipe_kartu as $tipe) : ?>
                        <option value="<?= $tipe->id ?>" <?= $tipe->id == $id_tipe_kartu ? 'selected' : '' ?>><?= $tipe->tipe_kartu ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="form-group">
                <label for="join_date">Terdaftar Sejak<?php echo form_error('join_date') ?></label>
                <input type="text" name="join_date" class="datepicker form-control" id="join_date" value="<?php echo $join_date != null ? date_format(date_create_from_format('Y-m-d', $join_date), 'd/m/Y') : '' ?>" />
            </div>
            <div class="form-group">
                <label for="id_wilayah">Wilayah <?php echo form_error('id_wilayah') ?></label>
                <select class="form-control" id="id_wilayah" name="id_wilayah">
                    <?php foreach ($wilayah as $zone) : ?>
                        <option value="<?= $zone->id ?>" <?= $zone->id == $id_wilayah ? 'selected' : '' ?>><?= $zone->wilayah ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="form-group">
                <label for="id_jenis_dagangan">Jenis Dagangan <?php echo form_error('id_jenis_dagangan') ?></label>
                <select class="form-control" id="id_jenis_dagangan" name="id_jenis_dagangan">
                    <?php foreach ($jenis_dagangan as $jenis) : ?>
                        <option value="<?= $jenis->id ?>" <?= $jenis->id == $id_jenis_dagangan ? 'selected' : '' ?>><?= $jenis->nama_dagangan ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="form-group">
                <label for="varchar">Hash <?php echo form_error('hash') ?></label>
                <input type="text" class="form-control" name="hash" id="hash" placeholder="Hash" value="<?php echo $hash; ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('kartu') ?>" class="btn btn-grey">Kembali</a>
            <?php echo form_close() ?>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>