<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Setting Saldo <?= $akun->nama_akun ?></h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action ?>" id="setting" method="post">
                <div class="form-group">
                    <label for="tanggal">Tanggal Saldo</label>
                    <input type="text" name="tanggal" id="tanggal" class="form-control tanggal">
                </div>
                <div class="form-group">
                    <label for="saldo" class="input-group">Saldo</label>
                    <input type="text" id="saldo" class="form-control" name="saldo">

                </div>
                <input type="hidden" value="<?= $akun->id ?>" name="id_akun">
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('akun') ?>" class="btn btn-warning">Batal</a>
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
    document.getElementById('saldo').addEventListener('input', handleInputChange);
</script>