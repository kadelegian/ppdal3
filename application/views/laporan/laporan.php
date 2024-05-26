<!-- Begin Page Content -->
<div class="container-fluid text-center">


  <!-- Page Heading -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h1 class="h3 mb-0 text-gray-800">LAPORAN KAS </h1>

    </div>
    <div class="card-body">
      <div class="table">
        <table class="table table-bordered table-sm" style="margin-bottom: 10px">
          <tr>
            <th>KETERANGAN</th>
            <th>TOTAL</th>

          </tr>
          <tr>
            <td class="text-left"><strong>SALDO AWAL</strong></td>
            <TD></TD>
          </tr>
          <?php
          $total_sa = 0;
          foreach ($saldo_awal as $sa) {
            ?>
            <tr>
              <td class="text-left"><?php echo $sa->nama_akun ?>
                <?php $total_sa = $total_sa + $sa->saldo; ?>
              </td>
              <td class="text-right"><?= number_format($sa->saldo, 0, ',', '.') ?></td>
            </tr>
          <?php
          }
          ?>
          <tr>
            <th class="table-success">TOTAL SALDO AWAL</th>
            <th class="table-success text-right"><?= number_format($total_sa, 0, ',', '.') ?></th>
          </tr>
          <tr>
            <td class="text-left">
              <strong>PEMASUKAN</strong>
            </td>
            <Td></Td>
          </tr>
          <?php $total_pemasukan = 0;
          foreach ($pemasukan as $pm) : ?>
            <?php $total_pemasukan += $pm->debet; ?>
            <tr>
              <td class="text-left"><?= $pm->keterangan ?></td>
              <td class="text-right"><?= number_format($pm->debet, 0, ',', '.') ?> </td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <tH class="table-success">TOTAL PEMASUKAN</tH>
            <th class="table-success text-right"><?= number_format($total_pemasukan, 0, ',', '.') ?></th>

          </tr>
          <tr>
            <td class="text-left">
              <strong>

                PENGELUARAN
              </strong>

            </td>
            <td></td>
          </tr>
          <?php $total_keluar = 0;
          foreach ($pengeluaran as $png) : ?>
            <?php $total_keluar += $png->kredit; ?>
            <tr>
              <td class="text-left"><?= $png->keterangan ?></td>
              <td class="text-right"><?= number_format($png->kredit, 0, ',', '.') ?></td>

            </tr>
          <?php endforeach; ?>
          <tr>
            <th class="table-success">TOTAL PENGELUARAN</th>
            <th class="table-success text-right"><?= number_format($total_keluar, 0, ',', '.') ?></th>

          </tr>

          <tr>
            <td class="text-left">
              <strong>

                SALDO AKHIR
              </strong>

            </td>
            <td></td>
          </tr>
          <?php $total_saldo_akhir = 0;
          foreach ($saldo_akhir as $salak) : ?>
            <?php $total_saldo_akhir += $salak->saldo; ?>
            <tr>
              <td class="text-left "><?= $salak->nama_akun ?></td>
              <td class="text-right"><?= number_format($salak->saldo, 0, ',', '.') ?></td>

            </tr>
          <?php endforeach; ?>
          <tr>
            <th class="table-success">TOTAL SALDO AKHIR</th>
            <th class="table-success text-right"><?= number_format($total_saldo_akhir, 0, ',', '.') ?></th>

          </tr>
        </table>

      </div>

    </div>
  </div>

  <!-- Content Row -->

  <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->