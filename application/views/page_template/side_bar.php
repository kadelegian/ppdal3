<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php if (isset($_SESSION['id_user'])) { ?>
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion d-print-none" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-anchor"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Pusat Informasi PPDAL</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>

                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->


                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Pedagang</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('kartu') ?>"><i class="fa fa-umbrella" aria-hidden="true"></i> Pedagang Pantai</a>
                            <a class="collapse-item" href="<?= base_url('transaksi_iuran') ?>">Daftar Transaksi Pedagang</a>
                            <hr>
                            <a class="collapse-item" href="<?= base_url('pedagang') ?>"><i class="fa fa-street-view" aria-hidden="true"></i> Pedagang Asongan</a>
                            <a class="collapse-item" href="<?= base_url('transaksi_iuran_pedagang') ?>">Daftar Transaksi Asongan</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa fa-fw fa-folder"></i>
                        <span>Transaksi</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" href="<?= base_url('transaksi_pemasukan') ?>"> <i class="fa fa-fw fa-arrow-down"></i> Transaksi Pemasukan</a>
                            <a class="collapse-item" href="<?= base_url('transaksi_pengeluaran') ?>"><i class="fa fa-fw fa-arrow-up"></i> Transaksi Pengeluaran</a>
                            <a class="collapse-item" href="<?= base_url('transaksi_transfer') ?>"><i class="fa fa-fw fa-reply"></i>Transfer Kas</a>

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
                        <i class="fas fa-fw fa-cogs"></i>
                        <span>Pengaturan</span>
                    </a>
                    <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('jenis_dagangan') ?>">Jenis Dagangan</a>
                            <a class="collapse-item" href="<?= base_url('wilayah') ?>">Data Wilayah</a>
                            <hr>
                            <a class="collapse-item" href="<?= base_url('jenis_dagangan/setting_iuran') ?>">Pengaturan Iuran</a>
                            <a class="collapse-item" href="<?= base_url('extra_charge') ?>">Pengaturan Penjamin</a>
                            <hr>
                            <a class="collapse-item" href="<?= base_url('akun') ?>">Data Akun</a>
                            <a class="collapse-item" href="<?= base_url('jenis_akun') ?>">Jenis Akun</a>

                            <hr>
                            <a class="collapse-item" href="<?= base_url('info_lembaga') ?>">Pengaturan Lembaga</a>

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
                        <i class="fas fa-fw fa-cogs"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseReport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('laporan/jurnal_umum') ?>">Jurnal Umum</a>
                            <a class="collapse-item" href="<?= base_url('laporan/buku_besar') ?>">Buku Besar</a>

                        </div>
                    </div>
                </li>



                <!-- Nav Item - Utilities Collapse Menu -->


                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->
        <?php } ?>