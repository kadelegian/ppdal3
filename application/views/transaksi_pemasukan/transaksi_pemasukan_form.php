<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transaksi Pemasukan</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= $tanggal ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="id_akun_kas">Akun/Rekening Penerima </label>
                    <select class="form-control" name="id_akun_kas" id="id_akun_kas">
                        <?php foreach ($data_akun_kas as $dt_ak) {

                            ?>
                            <option value="<?= $dt_ak->id ?>" <?= $dt_ak->id == $id_akun_kas ? 'selected' : '' ?>><?= $dt_ak->kode_akun . ' | ' . $dt_ak->nama_akun ?></option>
                        <?php

                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan_charge">Keterangan<?php echo form_error('keterangan') ?></label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
                </div>
                <div class="form-group">
                    <label for="id_akun_tujuan">Jenis Pendapatan</label>
                    <select class="form-control" name="id_akun_tujuan" id="id_akun_tujuan">
                        <?php foreach ($akun_tujuan as $dt_jp) { ?>
                            <option value="<?= $dt_jp->id ?>" <?= $dt_jp->id == $id_akun_tujuan ? 'selected' : '' ?>><?= $dt_jp->kode_akun . ' | ' . $dt_jp->nama_akun ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nominal">Nominal<?php echo form_error('nominal') ?></label>
                    <?php if ($nominal == '') {
                        $nominal = 0;
                    } else {
                        $nominal = preg_replace('/\D/', '', $nominal);
                    } ?>
                    <input type="text" class="form-control" name="nominal" id="nominal" value="<?php echo number_format($nominal, 0, ',', '.'); ?>" />
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('transaksi_pemasukan') ?>" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    // Function to format a number with commas
    function formatNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Function to handle input change event
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

    // Add event listener to the input field
    document.getElementById('nominal').addEventListener('input', handleInputChange);
</script>