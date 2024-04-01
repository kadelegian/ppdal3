<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengelolaan Akun</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="nama_akun">Nama Akun <?php echo form_error('nama_akun') ?></label>

                    <input type="text" class="form-control" name="nama_akun" id="nama_akun" placeholder="Nama Akun" value="<?php echo $nama_akun; ?>" />
                </div>
                <div class="form-group">
                    <label for="alias">Akun Alias <?php echo form_error('alias') ?></label>
                    <input type="text" class="form-control" name="alias" id="alias" placeholder="Akun Alias" value="<?php echo $alias; ?>" />
                </div>
                <div class="form-group">
                    <label for="nomor_rekening">Nomor Rekening <?php echo form_error('nomor_rekening') ?></label>
                    <input type="text" class="form-control" name="nomor_rekening" id="nomor_rekening" placeholder="Nomor Rekening" value="<?php echo $nomor_rekening; ?>" />
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
                </div>
                <div class="form-group">

                    <input name="is_bank" type="checkbox" value="1" <?= ($is_bank == '1' ? 'checked' : '') ?>> Akun Bank

                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('akun') ?>" class="btn btn-warning">Kembali</a>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->