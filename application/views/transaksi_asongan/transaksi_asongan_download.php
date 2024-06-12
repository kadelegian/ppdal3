<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <style>
        .alnright {
            text-align: right;
        }

        tr.judul {
            background-color: #ededed;

        }

        tr.strip {
            background-color: #e4f1f5;
        }

        @page {
            margin-top: 10px;
        }

        body {
            max-width: 1024px;
            margin: 10px auto;
        }

        table.small-font {
            font-size: normal;
        }

        @media print {
            .print-none {
                visibility: hidden;
            }
        }

        .form-inline {
            display: flex;
            flex-flow: row wrap;
            align-items: center;
        }

        /* Add some margins for each label */
        .form-inline label {
            margin: 5px 10px 5px 0;
        }

        /* Style the input fields */
        .form-inline input {
            vertical-align: middle;
            margin: 5px 10px 5px 0;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        /* Style the submit button */
        .form-inline button {
            padding: 10px 20px;
            background-color: dodgerblue;
            border: 1px solid #ddd;
            color: white;
        }

        .form-inline button:hover {
            background-color: royalblue;
        }

        /* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
        @media (max-width: 800px) {
            .form-inline input {
                margin: 10px 0;
            }

            .form-inline {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>

</head>
<!-- Begin Page Content -->

<div>
    <div style="width: 100%;">
        <div style="width: 24%; float:left;padding:2px;">
            <img src="<?= base_url('assets/img/logo.jpg') ?>" width="100%" alt="">
            <div style="text-align: center;">
                <h5><?= $info_lembaga->nama_lembaga ?></h5>
                <?= $info_lembaga->alamat ?><br>
                <?= $info_lembaga->kecamatan . '-' . $info_lembaga->kabupaten ?><br>
                <?= $info_lembaga->telp ?>
            </div>
        </div>
        <div style="width: 75%;float:right;">
            <div>
                <table class="small-font" style="width: 100%;margin-bottom:15px;">
                    <tr>

                        <td>No.Transaksi</td>
                        <td>:</td>
                        <td><?= $nomor_transaksi ?></td>
                        <td></td>
                        <td>Tanggal </td>
                        <td> : </td>
                        <td class="alnright"><?= $tanggal_transaksi ?></td>
                    </tr>
                    <tr>

                        <td>Nama Pedagang</td>
                        <td>:</td>
                        <td><?= $nama_pemilik ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>

                        <td>Jenis Dagangan</td>
                        <td>:</td>
                        <td><?= $jenis_dagangan ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>Nomor Kartu </td>
                        <td> : </td>
                        <td><?= $nomor_kartu ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </table>

            </div>
            <table class="small-font" style="width: 100%; ">
                <thead>
                    <tr>
                        <th scope="col">
                            Bukti Pembayaran Iuran
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>

            </table>

            <table class="small-font" style="width: 100%;  border-collapse:collapse;">
                <thead>
                    <tr class="judul">
                        <th scope="col">Keterangan</th>
                        <th style="text-align: left;" scope="col">Nominal</th>
                        <th style="text-align:right;" scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $keterangan_iuran . '(' . $kali_nominal . 'x)' ?></td>
                        <td></td>
                        <td style="text-align: right;"><?= number_format($total_iuran, 0, ',', '.')  ?></td>
                    </tr>

                    <?php if ($total_extra_charge > 0) { ?>
                        <tr style="border-top: 1px;">
                            <td><?= $keterangan_extra_charge . '(' . $kali_nominal . 'x)' ?></td>
                            <td></td>
                            <td style="text-align: right;"><?= number_format($total_extra_charge, 0, ',', '.') ?></td>
                        </tr>
                    <?php } ?>

                    <?php if ($total_diskon > 0) { ?>
                        <tr style="border-top: 1px;">
                            <td><?= $keterangan_diskon ?></td>
                            <td><?= $kali_nominal . 'x ' . number_format($nominal_diskon, 0, ',', '.') ?></td>
                            <td style="text-align: right;"><?= number_format($total_diskon, 0, ',', '.') ?></td>
                        </tr>
                    <?php } ?>
                    <tr style="border-top: 1px; background-color:#e8faeb;">
                        <td> </td>
                        <td><strong>Total Bayar</strong> </td>
                        <td style="text-align: right;">
                            <strong>
                                <?= number_format($total_bayar, 0, ',', '.') ?>

                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                </tbody>
            </table>

            <table class="small-font" style="width:100%;margin-top:30px;">
                <tr>
                    <td>
                        <strong>
                            <i>

                                <u>
                                    <?= 'Terbilang : ' . $terbilang ?>
                                </u>
                            </i>

                        </strong>
                    </td>

                    <td rowspan="3" style="text-align: center;">Petugas,<br><br><br><u><?= '(' . $nama_user . ')' ?></u></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td style="text-align: center;">Terimakasih Atas Kerjasamanya</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>

                </tr>
            </table>

        </div>

    </div>

</div>
<script>
    window.addEventListener("afterprint", goback);

    function goback() {
        location.replace("<?= base_url('pedagang/read/' . $id_kartu) ?>");
    }
</script>