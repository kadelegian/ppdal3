<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Extra Charge</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="keterangan_charge">Keterangan Charge <?php echo form_error('keterangan_charge') ?></label>
                    <input type="text" class="form-control" name="keterangan_charge" id="keterangan_charge" placeholder="Keterangan Charge" value="<?php echo $keterangan_charge; ?>" />
                </div>
                <div class="form-group">
                    <label for="extra_charge">Extra Charge <?php echo form_error('extra_charge') ?></label>
                    <input type="text" class="form-control" name="extra_charge" id="extra_charge" placeholder="Extra Charge" value="<?php echo $extra_charge; ?>" />
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('extra_charge') ?>" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    var rupiah = document.getElementById('extra_charge');
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