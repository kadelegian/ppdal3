<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Dagangan</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Nama Dagangan <?php echo form_error('nama_dagangan') ?></label>
                    <input type="text" class="form-control" name="nama_dagangan" id="nama_dagangan" placeholder="Nama Dagangan" value="<?php echo $nama_dagangan; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Prefix Dagangan <?php echo form_error('prefix_dagangan') ?></label>
                    <input type="text" class="form-control" name="prefix_dagangan" id="prefix_dagangan" placeholder="Prefix Dagangan" value="<?php echo $prefix_dagangan; ?>" />
                </div>
                <div class="form-group">
                    <label for="bigint">Iuran <?php echo form_error('iuran') ?></label>
                    <input type="text" class="form-control" name="iuran" id="iuran" placeholder="Iuran" value="<?php echo number_format($iuran, 0, ",", "."); ?>" />
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('jenis_dagangan') ?>" class="btn btn-warning">Kembali</a>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    var rupiah = document.getElementById('iuran');
    rupiah.addEventListener('keyup', function(e) {

        rupiah.value = formatNumber(this.value);
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