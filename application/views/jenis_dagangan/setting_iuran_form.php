<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $periode_iuran = $periode; ?>
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Setting Iuran per Periode <?= date_format(date_create_from_format('Y-m-d', $periode_iuran), 'M Y') ?></h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action ?>" id="setting" method="post">
                <?php foreach ($data_jenis as $jenis) : ?>
                    <div class="form-group">
                        <label for="<?= $jenis->id == 0 ? $jenis->id_jenis_dagangan : $jenis->id ?>"><?= $jenis->nama_dagangan ?></label>
                        <input type="text" class="form-control" name="<?= $jenis->id == 0 ? $jenis->id_jenis_dagangan : $jenis->id ?>" placeholder="Nominal" id="iuran" value="<?= (isset($jenis->iuran) ? $jenis->iuran : 0) ?>" />
                    </div>
                <?php endforeach; ?>
                <input type="hidden" value="<?= $periode_iuran ?>" name="periode">
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url() ?>" class="btn btn-warning">Batal</a>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    // Select the form element
    const form = document.querySelector('#setting'); // Replace '#yourFormId' with your form's ID

    // Get all the text input elements within the form
    const textInputs = form.querySelectorAll('input[type="text"]');

    // Loop through each text input element
    textInputs.forEach(function(input) {
        // Add a 'keyup' event listener to each input element
        input.addEventListener('keyup', function(event) {
            input.value = formatNumber(this.value);
        });
    });

    /* Fungsi formatRupiah */
    function formatNumber(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }
</script>