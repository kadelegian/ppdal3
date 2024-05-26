<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<head>

    <style>
        @page {
            margin-top: 10px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            max-width: 1024px;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table.no-border {
            border: none;
        }

        td.no-border {
            border: none;
        }

        th,
        td {
            border: 1px solid #ddd;

        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .vertical-center {
            vertical-align: middle;
            text-align: center;
            width: 50%;
        }

        .table-success {
            background-color: rgb(191, 240, 222);
        }

        .text-middle {
            vertical-align: middle;
        }

        .text-right {
            text-align: right;
        }

        .center-div {
            text-align: center;
        }

        .row {
            display: flex;
        }

        .column {
            flex: 1;
            box-sizing: border-box;
        }
    </style>
</head>

<div class="container">
    <div class="center-div">
        <h3>LAPORAN KAS</h3>
    </div>
    <table>
        <thead>

            <tr>
                <th class="vertical-center">KETERANGAN</th>
                <th class="vertical-center">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>SALDO AWAL</strong></td>
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
        </tbody>
    </table>
    <table class="no-border">
        <tr>
            <td class="no-border" colspan="2"><br></td>
        </tr>
        <tr>
            <td class="no-border vertical-center" colspan="2">Legian, <?= $tanggal ?></td>
        </tr>
        <tr>
            <td class="no-border vertical-center" colspan="2">Pengurus Pantai Desa Adat Legian</td>
        </tr>
        <tr>
            <td class="no-border" colspan="2"><br></td>
        </tr>
        <tr>
            <td class="no-border vertical-center">Ketua</td>
            <td class="no-border vertical-center">Bendahara</td>
        </tr>
        <tr>
            <td class="no-border" colspan="2"><br></td>
        </tr>
        <tr>
            <td class="no-border" colspan="2"><br></td>
        </tr>
        <tr>
            <td class="no-border vertical-center">(<?= $info_lembaga->ketua ?>)</td>
            <td class="no-border vertical-center">(<?= $info_lembaga->bendahara ?>)</td>
        </tr>
        <tr>
            <td class="no-border" colspan="2"><br></td>
        </tr>

        <tr>
            <td class="no-border vertical-center" colspan="2">Mengetahui</td>

        </tr>
        <tr>
            <td class="no-border" colspan="2"><br></td>
        </tr>
        <tr>
            <td class="no-border" colspan="2"><br></td>
        </tr>
        <tr>
            <td class="no-border vertical-center" colspan="2">(<?= $info_lembaga->bendesa ?>)</td>

        </tr>
    </table>
</div>

</html>