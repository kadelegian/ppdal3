-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2024 pada 10.38
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi_iuran`
--

CREATE TABLE `detail_transaksi_iuran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode` date NOT NULL,
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `iuran` bigint(20) UNSIGNED NOT NULL,
  `charge` bigint(20) UNSIGNED NOT NULL,
  `diskon` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi_iuran`
--

INSERT INTO `detail_transaksi_iuran` (`id`, `periode`, `id_transaksi`, `iuran`, `charge`, `diskon`) VALUES
(12, '2023-11-01', 9, 150000, 200000, 100000),
(13, '2023-12-01', 9, 150000, 200000, 100000),
(14, '2024-01-01', 9, 150000, 200000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_masuk`
--

CREATE TABLE `kas_masuk` (
  `id` int(10) UNSIGNED NOT NULL,
  `keterangan_kas` text NOT NULL,
  `nominal_kas` bigint(20) UNSIGNED NOT NULL,
  `tanggal_kas` date NOT NULL,
  `kode` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `queue_nomor`
--

CREATE TABLE `queue_nomor` (
  `no` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `queue_nomor`
--

INSERT INTO `queue_nomor` (`no`, `id_user`, `waktu`) VALUES
(1, 4, '2024-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_iuran`
--

CREATE TABLE `transaksi_iuran` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `nomor_transaksi` int(11) NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `id_pedagang` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_iuran`
--

INSERT INTO `transaksi_iuran` (`id_transaksi`, `nomor_transaksi`, `id_kartu`, `id_pedagang`, `tanggal_transaksi`, `id_user`) VALUES
(9, 1, 2, 15, '2024-01-18', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_diskon`
--

CREATE TABLE `t_diskon` (
  `id` int(11) NOT NULL,
  `keterangan_diskon` varchar(100) NOT NULL,
  `nominal_diskon` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_diskon`
--

INSERT INTO `t_diskon` (`id`, `keterangan_diskon`, `nominal_diskon`) VALUES
(1, 'diskon pedagang', 100000),
(2, 'DISKON ASONGAN', 50000),
(4, 'Tidak Ada Diskon', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_extra_charge`
--

CREATE TABLE `t_extra_charge` (
  `id` int(11) NOT NULL,
  `keterangan_charge` varchar(100) NOT NULL,
  `extra_charge` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_extra_charge`
--

INSERT INTO `t_extra_charge` (`id`, `keterangan_charge`, `extra_charge`) VALUES
(1, 'PENJAMIN KANTOR', 100000),
(2, 'PENJAMIN JAWA', 150000),
(3, 'PENJAMIN LOKAL', 200000),
(4, 'Tidak Ada', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenis_dagangan`
--

CREATE TABLE `t_jenis_dagangan` (
  `id` int(11) NOT NULL,
  `nama_dagangan` varchar(200) NOT NULL,
  `prefix_dagangan` varchar(10) NOT NULL,
  `iuran` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jenis_dagangan`
--

INSERT INTO `t_jenis_dagangan` (`id`, `nama_dagangan`, `prefix_dagangan`, `iuran`) VALUES
(1, 'PAYUNG', 'PYG', 150000),
(2, 'KURSI', 'KRS', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenis_kas_masuk`
--

CREATE TABLE `t_jenis_kas_masuk` (
  `id` int(11) NOT NULL,
  `jenis_kas_masuk` varchar(200) NOT NULL,
  `prefix` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kartu`
--

CREATE TABLE `t_kartu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pedagang` int(11) NOT NULL,
  `nama_pemilik` varchar(200) NOT NULL,
  `nomor_kartu` int(11) NOT NULL,
  `alamat_kartu` varchar(200) NOT NULL,
  `nomor_telp` varchar(20) NOT NULL,
  `id_tipe_kartu` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_jenis_dagangan` int(11) NOT NULL,
  `hash` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_kartu`
--

INSERT INTO `t_kartu` (`id`, `id_pedagang`, `nama_pemilik`, `nomor_kartu`, `alamat_kartu`, `nomor_telp`, `id_tipe_kartu`, `join_date`, `id_wilayah`, `id_jenis_dagangan`, `hash`, `nik`) VALUES
(2, 15, 'swandewi', 24, 'legian', '93939', 3, '2023-11-01', 2, 1, '123', ''),
(3, 15, 'HENDRA', 1, 'LEGIAN', '0828283', 3, '2023-12-01', 2, 2, '0', ''),
(4, 16, 'VVIP', 123456, 'legian', '09899', 3, '2023-11-01', 2, 2, '123', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pedagang`
--

CREATE TABLE `t_pedagang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pedagang` varchar(100) NOT NULL,
  `alamat_pedagang` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `join_date` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `charge_pedagang` bigint(20) UNSIGNED NOT NULL,
  `diskon_pedagang` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_pedagang`
--

INSERT INTO `t_pedagang` (`id`, `nama_pedagang`, `alamat_pedagang`, `no_hp`, `join_date`, `nik`, `charge_pedagang`, `diskon_pedagang`) VALUES
(1, 'Made', 'legian kaja', '0828228282', '0000-00-00', '', 0, 0),
(2, 'arjana', 'legian tengah', '33948598938', '0000-00-00', '', 0, 0),
(3, 'wiwi', 'legian tengah', '235423', '0000-00-00', '', 0, 0),
(5, 'aljkksjksd', 'legian', '23453', '0000-00-00', '', 0, 0),
(6, 'ksjdkjslkjd', 'legian', '8595959', '0000-00-00', '', 0, 0),
(7, 'kdjkjdl', 'LKFJLKJGLS\'', '094404', '0000-00-00', '', 0, 0),
(8, 'LLFLFK', 'LFGKFGOG', '494949', '0000-00-00', '', 0, 0),
(9, 'JDFJDJ', 'JFJFJQ', '9949', '0000-00-00', '', 0, 0),
(10, 'KDKDKDK', 'KFGKFKG', '393939', '0000-00-00', '', 0, 0),
(11, 'FKFKFK', 'KGKGKGO', '9494949', '0000-00-00', '', 0, 0),
(12, 'JFJFJFJ', 'JGJGJGJ', '93939', '0000-00-00', '', 0, 0),
(14, 'dagang', 'alamat', '3335455', '0000-00-00', '', 0, 0),
(15, 'komang', 'legian', '0811111113453', '2023-11-01', '', 0, 25000),
(16, 'Pedagang VIP', 'legian', '084949', '2023-12-01', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tipe_kartu`
--

CREATE TABLE `t_tipe_kartu` (
  `id` int(11) NOT NULL,
  `tipe_kartu` varchar(100) NOT NULL,
  `id_extra_charge` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_tipe_kartu`
--

INSERT INTO `t_tipe_kartu` (`id`, `tipe_kartu`, `id_extra_charge`, `id_diskon`) VALUES
(1, 'VIP', 4, 4),
(2, 'ASONGAN', 2, 4),
(3, 'PEDAGANG PANTAI', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wilayah`
--

CREATE TABLE `t_wilayah` (
  `id` int(11) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `prefix_wilayah` varchar(10) NOT NULL,
  `nomor_wilayah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_wilayah`
--

INSERT INTO `t_wilayah` (`id`, `wilayah`, `prefix_wilayah`, `nomor_wilayah`) VALUES
(1, 'PADMA', 'PDM', 1),
(2, 'PADMA UTARA', 'PDM-UT', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT 1,
  `full_name` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_on`, `active`, `full_name`, `role`) VALUES
(1, 'administrator', '$2y$10$Ajl3Ut9gxroez2rPXIhv6OuK/BTIVcG70b6/ZwLygq.y1JPlIvzQa', 'admin@admin.com', 1268889823, 1, 'Admin', 1),
(2, 'kade', '$2y$10$wLzfV5yNCrD2Fy0w1jF6e.x9.Oz127/9miroPcM2lNPXreWOZkHP.', 'naklegian@gmail.com', 1701785036, 1, 'Made', 1),
(3, 'arjana', '$2y$10$h4ucR83CTC6SnrrcDeuxtuBHzJxYXr6/Mk8VqKZAQkD5VszM13tKq', 'arjana@mtkbali.com', 1705238471, 1, 'Arjana Made', 0),
(4, 'admin', '$2y$10$mYAzgBZN2u2p50SsUqqHg.kR1v0ClPVbLI9OMKtEDeg2NTa1l/OM2', 'admin@ppdal.com', 1705575074, 1, 'Admin Kantor', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi_iuran`
--
ALTER TABLE `detail_transaksi_iuran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas_masuk`
--
ALTER TABLE `kas_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `queue_nomor`
--
ALTER TABLE `queue_nomor`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `transaksi_iuran`
--
ALTER TABLE `transaksi_iuran`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `t_diskon`
--
ALTER TABLE `t_diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_extra_charge`
--
ALTER TABLE `t_extra_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_jenis_dagangan`
--
ALTER TABLE `t_jenis_dagangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_jenis_kas_masuk`
--
ALTER TABLE `t_jenis_kas_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_kartu`
--
ALTER TABLE `t_kartu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_pedagang`
--
ALTER TABLE `t_pedagang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_tipe_kartu`
--
ALTER TABLE `t_tipe_kartu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_wilayah`
--
ALTER TABLE `t_wilayah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi_iuran`
--
ALTER TABLE `detail_transaksi_iuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kas_masuk`
--
ALTER TABLE `kas_masuk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `queue_nomor`
--
ALTER TABLE `queue_nomor`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi_iuran`
--
ALTER TABLE `transaksi_iuran`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_diskon`
--
ALTER TABLE `t_diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_extra_charge`
--
ALTER TABLE `t_extra_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_jenis_dagangan`
--
ALTER TABLE `t_jenis_dagangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_jenis_kas_masuk`
--
ALTER TABLE `t_jenis_kas_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_kartu`
--
ALTER TABLE `t_kartu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_pedagang`
--
ALTER TABLE `t_pedagang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `t_tipe_kartu`
--
ALTER TABLE `t_tipe_kartu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_wilayah`
--
ALTER TABLE `t_wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
