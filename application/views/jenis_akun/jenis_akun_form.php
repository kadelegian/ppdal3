<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Akun</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="keterangan">Keterangan<?php echo form_error('keterangan') ?></label>

                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />

                </div>
                <div class="form-group">
                    <label for="sn">Saldo Normal<?php echo form_error('sn') ?></label>
                    <select class="form-control" name="sn" id="sn">
                        <option value="d" <?= ($sn == 'd' ? 'selected' : '') ?>>Debet</option>
                        <option value="k" <?= ($sn == 'k' ? 'selected' : '') ?>>Kredit</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="pos">Posisi</label>
                    <select class="form-control" name="pos" id="pos">
                        <option value="lr" <?= ($pos == 'lr' ? 'selected' : '') ?>>Laba Rugi</option>
                        <option value="nr" <?= ($pos == 'nr' ? 'selected' : '') ?>>Neraca</option>
                    </select>
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('jenis_akun') ?>" class="btn btn-warning">Kembali</a>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->