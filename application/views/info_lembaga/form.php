<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Info Lembaga</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="nama_lembaga">Nama Lembaga <?php echo form_error('nama_lembaga') ?></label>
                    <input type="text" class="form-control" name="nama_lembaga" id="nama_lembaga" placeholder="Nama Lembaga" value="<?php echo $nama_lembaga; ?>" />
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat<?php echo form_error('alamat') ?></label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan<?php echo form_error('kecamatan') ?></label>
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kabupaten<?php echo form_error('kabupaten') ?></label>
                    <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" />
                </div>
                <div class="form-group">
                    <label for="telp">Nomor Telp<?php echo form_error('telp') ?></label>
                    <input type="text" class="form-control" name="telp" id="telp" placeholder="Nomor Telp" value="<?php echo $telp; ?>" />
                </div>
                <div class="form-group">
                    <label for="ketua">Nama Ketua<?php echo form_error('ketua') ?></label>
                    <input type="text" class="form-control" name="ketua" id="ketua" placeholder="Nama Ketua" value="<?php echo $ketua; ?>" />
                </div>
                <div class="form-group">
                    <label for="bendahara">Nama Bendahara<?php echo form_error('bendahara') ?></label>
                    <input type="text" class="form-control" name="bendahara" id="bendahara" placeholder="Nama Bendahara" value="<?php echo $bendahara; ?>" />
                </div>
                <div class="form-group">
                    <label for="bendesa">Nama Bendesa<?php echo form_error('bendesa') ?></label>
                    <input type="text" class="form-control" name="bendesa" id="bendesa" placeholder="Nama Bendesa" value="<?php echo $bendesa; ?>" />
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url() ?>" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->