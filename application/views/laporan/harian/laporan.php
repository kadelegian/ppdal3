<?php
defined('BASEPATH') or exit('No direct script access allowed');
$total_debet = 0;
$total_kredit = 0;
$jenis_pemasukan = array();
$jenis_pengeluaran = array();
foreach ($data_jenis_pemasukan as $akun_masuk) {
  $jenis_pemasukan[$akun_masuk->id] = 0;
}
foreach ($data_jenis_pengeluaran as $akun_keluar) {
  $jenis_pengeluaran[$akun_keluar->id] = 0;
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h1 class="h3 mb-0 text-gray-800">Laporan Harian</h1>

    </div>
    <div class="card-body">
      <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">

        </div>
        <div class="col-md-4 text-center">
          <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          </div>
        </div>
        <div class="col-md-1 text-right">
        </div>
        <div class="col-md-3 text-right">

        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px">
          <tr>
            <th>No</th>
            <th>Tanggal</th>

            <th>Keterangan </th>
            <th>Debet</th>
            <th>Kredit</th>

          </tr>
          <?php $id = -1;
          $print_detail = false;
          $start = 0;
          foreach ($data_transaksi as $dt) {  ?>
            <?php

              if ($dt->kode > 0) {
                //pemasukan

                $jenis_pemasukan[$dt->kode] += $dt->debet;
              } else {
                $jenis_pengeluaran[$dt->kode_pengeluaran] += $dt->kredit;
              }

              if ($dt->kode == 1) { ?>

              <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td><?php echo date('d/m/Y', strtotime($dt->tanggal_transaksi)) ?></td>


                <td><?php echo $dt->info_debet ?></td>
                <td><?php echo number_format($dt->total_bayar, 0, ",", ".") ?></td>
                <td></td>
                <?php $total_debet = $total_debet + $dt->total_bayar; ?>
              </tr>
              <tr>
                <td width="80px"></td>
                <td></td>

                <td><?php echo $dt->keterangan ?></td>
                <td></td>
                <td><?php echo number_format($dt->debet, 0, ",", ".") ?></td>
                <?php $total_kredit = $total_kredit + $dt->debet; ?>
              </tr>
            <?php } elseif ($dt->kode == 2) { ?>
              <tr>
                <td width="80px"></td>
                <td></td>

                <td><?php echo $dt->keterangan ?></td>
                <td></td>
                <td><?php echo number_format($dt->debet, 0, ",", ".") ?></td>
                <?php $total_kredit = $dt->debet + $total_kredit; ?>
              </tr>
            <?php } elseif ($dt->kode > 2) { ?>
              <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td><?php echo date('d/m/Y', strtotime($dt->tanggal_transaksi)) ?></td>

                <td><?php echo $dt->keterangan ?></td>
                <td><?php echo number_format($dt->debet, 0, ",", ".") ?></td>
                <td></td>
                <?php $total_debet = $total_debet + $dt->debet; ?>
              </tr>
              <tr>
                <td width="80px"></td>
                <td></td>

                <td><?php echo 'Pendapatan ' . $dt->keterangan ?></td>
                <td></td>
                <td><?php echo number_format($dt->debet, 0, ",", ".") ?></td>
                <?php $total_kredit = $total_kredit + $dt->debet; ?>
              </tr>
            <?php } else { ?>
              <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td><?php echo date('d/m/Y', strtotime($dt->tanggal_transaksi)) ?></td>


                <td><?php echo 'Biaya ' . $dt->keterangan ?></td>
                <td></td>
                <td><?php echo number_format($dt->kredit, 0, ",", ".") ?></td>
                <?php $total_kredit = $total_kredit + $dt->kredit; ?>
              </tr>
              <tr>
                <td width="80px"></td>
                <td></td>

                <td><?php echo $dt->keterangan ?></td>
                <td><?php echo number_format($dt->kredit, 0, ",", ".") ?></td>
                <td></td>
                <?php $total_debet = $total_debet + $dt->kredit; ?>
              </tr>
            <?php } ?>

          <?php } ?>
          <tr>
            <td width="80px"></td>

            <td></td>
            <td style="text-align: end;"><strong>TOTAL</strong></td>
            <td><strong><?php echo number_format($total_debet, 0, ",", ".") ?></strong></td>
            <td><strong><?php echo number_format($total_kredit, 0, ",", ".") ?></strong></td>

          </tr>
        </table>

      </div>
      <div class="row">
        <div class="col-md-6 col-6">
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <tr>
                <th>Akun</th>
                <th>Total Debet</th>
                <th>Total Kredit</th>


              </tr>
              <?php foreach ($data_jenis_pemasukan as $dta) { ?>
                <tr>
                  <td><?= $dta->keterangan ?></td>
                  <?php if ($dta->id < 3) { ?>
                    <td><?= number_format($jenis_pemasukan[$dta->id], '0', ',', '.') ?></td>
                    <td></td>

                  <?php } else { ?>
                    <td></td>
                    <td><?= number_format($jenis_pemasukan[$dta->id], '0', ',', '.') ?></td>
                  <?php } ?>

                </tr>
              <?php } ?>
              <?php foreach ($data_jenis_pengeluaran as $dtb) { ?>
                <tr>
                  <td><?= $dtb->keterangan ?></td>
                  <td></td>
                  <td><?= number_format($jenis_pengeluaran[$dtb->id], '0', ',', '.') ?></td>

                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
        <div class="col-md-6 text-right">

        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->