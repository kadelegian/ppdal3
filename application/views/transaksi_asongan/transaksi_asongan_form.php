<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-print-none">
            <h6 class="m-0 font-weight-bold text-primary">Pembayaran Iuran</h6>
        </div>
        <div class="card-body">
            <form id="form_pembayaran" action="<?= base_url('/transaksi_iuran_pedagang/create_action') ?>" method="post">

                <div class="form-group d-print-none">
                    <label for="nomor_kartu">Nomor Kartu </label>
                    <input type="text" class="form-control" name="nomor_kartu" id="nomor_kartu" placeholder="Nomor Kartu" value="<?php echo $nomor_kartu; ?>" readonly />
                </div>
                <input type="hidden" name="id_pedagang" value="<?php echo $id_pedagang; ?>" />
                <input type="hidden" name="jenis_dagangan" value="<?php echo $jenis_dagangan; ?>" />
                <input type="hidden" name="wilayah" value="<?php echo $wilayah; ?>" />
                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                <input type="hidden" name="extra_charge" value="<?= $extra_charge ?>">
                <input type="hidden" name="diskon" value="<?= $diskon ?>">
                <input type="hidden" name="total_pembayaran" value="<?= $total_pembayaran ?>">
                <input type="hidden" name="keterangan_iuran" value="<?= $keterangan_iuran ?>">
                <?php foreach ($detail_iuran as $detail) : ?>
                    <input type="hidden" name="periode[]" value="<?= $detail['periode'] ?>">
                    <input type="hidden" name="iuran[]" value="<?= $detail['iuran'] ?>">
                <?php endforeach; ?>
                <div class="form-group">
                    <label for="nama_pedagang">Nama Pedagang </label>
                    <input type="text" name="nama_pemilik" class="form-control" value="<?= $nama_pedagang ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                    <input type="text" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= date('d/m/Y') ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="akun">Cara Pembayaran</label>
                    <select name="akun" id="akun" class="form-control">

                        <?php foreach ($data_akun as $akun) : ?>
                            <option value="<?= $akun->id ?>"><?= strtoupper($akun->alias) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Keterangan</th>

                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_print as $dt) : ?>
                                <tr>
                                    <td><?= $dt['keterangan'] ?></td>

                                    <td><?= $dt['jumlah'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td scope="row" align="end">Total</td>
                                <td scope="row"><?= number_format($total_pembayaran, 0, ',', '.') ?></td>

                            </tr>
                        </tbody>

                    </table>
                </div>
                <div class="d-print-none">

                    <button id="btn_action" class="btn btn-primary"><?= $button ?></button>
                    <a href="<?php echo site_url('pedagang/read/' . $id_pedagang) ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>