<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $button ?> Data Pedagang</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <input type="hidden" value="<?= base_url() ?>" id="base_url">
                <div class="form-group">
                    <label for="nama_pedagang">Nama Pedagang <?php echo form_error('nama_pedagang') ?></label>
                    <input type="text" class="form-control" name="nama_pedagang" id="nama_pedagang" placeholder="Nama Pedagang" value="<?php echo $nama_pedagang; ?>" />
                </div>
                <div class="form-group">
                    <label for="alamat_pedagang">Alamat Pedagang <?php echo form_error('alamat_pedagang') ?></label>
                    <textarea class="form-control" rows="3" name="alamat_pedagang" id="alamat_pedagang" placeholder="Alamat Pedagang"><?php echo $alamat_pedagang; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_hp">No Hp <?php echo form_error('no_hp') ?></label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
                </div>
                <div class="form-group">
                    <label for="join_date">Join Date <?php echo form_error('join_date') ?></label>
                    <input type="text" name="join_date" class="datepicker form-control" id="join_date" value="<?php echo $join_date != null ? date_format(date_create_from_format('Y-m-d', $join_date), 'd/m/Y') : '' ?>" />
                </div>
                <div class="form-group">
                    <label for="charge_pedagang">Charge Pribadi Pedagang <?php echo form_error('charge_pedagang') ?></label>
                    <input type="text" name="charge_pedagang" class="form-control" id="charge_pedagang" value="<?php echo number_format($charge_pedagang, 0, ",", ".") ?>" />
                </div>
                <div class="form-group">
                    <label for="diskon_pedagang">Diskon Pribadi Pedagang <?php echo form_error('diskon_pedagang') ?></label>
                    <input type="text" name="diskon_pedagang" class="form-control" id="diskon_pedagang" value="<?php echo number_format($diskon_pedagang, 0, ",", ".") ?>" />
                </div>

                <input type="hidden" id='id_pedagang' name="id" value="<?php echo $id; ?>" />
                <div class="form-group">

                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('pedagang') ?>" class="btn btn-grey">Kembali</a>
                </div>
            </form>
            <?php if ($button == 'Update') : ?>
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <div>
                                <form method="post" action="<?= base_url('pedagang/add_kartu') ?>" class="form-inline">
                                    <label for="nomorKartu">Input Nomor Kartu</label>
                                    <input type="hidden" value="<?= $id ?>" name="id_pedagang">
                                    <input class="form-control" type="text" name="nomorKartu">
                                    <input type="submit" class="btn btn-primary" name="btn_add_kartu" value="+">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="form_kartu">

                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>

                            <th>Nomor Kartu</th>
                            <th>Tipe Kartu</th>
                            <th>Wilayah</th>
                            <th>Jenis Dagangan</th>
                            <th>Action</th>
                        </tr><?php
                                    foreach ($kartu_data as $kartu) {
                                        ?>
                            <tr>

                                <td><?php echo $kartu->nomor_kartu ?></td>
                                <td><?php echo $kartu->tipe_kartu ?></td>
                                <td><?php echo $kartu->wilayah ?></td>
                                <td><?php echo $kartu->nama_dagangan ?></td>

                                <td style="text-align:center">
                                    <a class="btn btn-sm btn-danger" href="<?= base_url('pedagang/unpair_kartu/?id=') . $kartu->id ?>" onclick="javascript:return confirm('Apakah Anda Yakin Akan Menghapus kartu?')">Hapus</a>

                                </td>
                            </tr>
                        <?php
                            }
                            ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    var charge = document.getElementById('charge_pedagang');
    var diskon = document.getElementById('diskon_pedagang');
    charge.addEventListener('keyup', function(e) {

        charge.value = formatNumber(this.value);
    });
    diskon.addEventListener('keyup', function(e) {
        diskon.value = formatNumber(this.value);
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