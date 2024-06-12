<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Rekening</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="kode_akun">Kode Akun <?php echo form_error('kode_akun') ?></label>
                    <input type="text" class="form-control" name="kode_akun" id="kode_akun" placeholder="Kode Akun" value="<?php echo $kode_akun; ?>" />
                </div>
                <div class="form-group">
                    <label for="nama_akun">Nama Akun <?php echo form_error('nama_akun') ?></label>

                    <input type="text" class="form-control" name="nama_akun" id="nama_akun" placeholder="Nama Akun" value="<?php echo $nama_akun; ?>" />
                </div>
                <div class="form-group">
                    <label for="alias">Akun Alias *jika ditampilkan di transaksi <?php echo form_error('alias') ?></label>
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
                    <label for="kode_jenis">Kode Jenis <?php echo form_error('kode_jenis') ?></label>
                    <select class="form-control" name="kode_jenis" id="kode_jenis">
                        <?php foreach ($list_kode_jenis as $jenis) : ?>
                            <option value="<?= $jenis->id ?>" <?= ($jenis->id == $kode_jenis ? 'selected' : '') ?>><?= $jenis->keterangan . ' ( ' . $jenis->sn . ' | ' . $jenis->pos . ' )' ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="debet">Saldo Awal Debet <?php echo form_error('debet') ?></label>
                    <input type="text" class="form-control " name="debet" id="debet" placeholder="Debet" value="<?php echo number_format($debet, 0, ',', '.'); ?>" />
                </div>
                <div class="form-group">
                    <label for="kredit">Saldo Awal Kredit <?php echo form_error('kredit') ?></label>
                    <input type="text" class="form-control" name="kredit" id="kredit" placeholder="kredit" value="<?php echo number_format($kredit, 0, ',', '.'); ?>" />
                </div>

                <div class="form-group">

                    <input name="is_bank" type="checkbox" value="1" <?= ($is_bank == '1' ? 'checked' : '') ?>> Tampilkan Saat Transaksi <br>
                    <input type="checkbox" name="is_iuran" value="1" <?= ($is_iuran == '1' ? 'checked' : '') ?>> Transaksi Iuran Akan Dialokasikan Ke Akun ini <br>
                    <input type="checkbox" name="is_penjamin" value="1" <?= ($is_penjamin == '1' ? 'checked' : '') ?>> Transaksi Penjamin Akan Dialokasikan Ke Akun ini
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('akun') ?>" class="btn btn-warning">Kembali</a>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    function formatNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function handleInputChange(event) {
        const input = event.target;
        let value = input.value.replace(/[^\d-]/g, ''); // Remove non-numeric characters except '-'

        // Count the occurrence of '-' in the value
        const minusCount = (value.match(/-/g) || []).length;

        // Remove all '-' if there is more than one
        if (minusCount > 1) {
            value = value.replace(/-/g, '');
        }

        // If it's negative and starts with '-', do nothing
        if (value.startsWith('-')) {
            if (minusCount > 1) {
                value = '-' + value;
            }
        }

        // Parse the number
        let number = parseInt(value, 10);

        // If it's a valid number, format it
        if (!isNaN(number)) {
            // Format the number
            value = formatNumber(number);
        }

        // Update the input value
        input.value = value;
    }
    document.getElementById('debet').addEventListener('input', handleInputChange);
    document.getElementById('kredit').addEventListener('input', handleInputChange);
</script>