<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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