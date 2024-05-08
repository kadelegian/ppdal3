-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2024 pada 00.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `generate_iuran` (IN `start_date` DATE, IN `end_date` DATE, IN `id_jenis` INT)   BEGIN
    DECLARE cur_date DATE;
    DECLARE month_year VARCHAR(10);
    DECLARE session_id VARCHAR(32);
    DECLARE temp_table_name VARCHAR(50);
   
    -- Generate a unique session ID using the connection ID
    SELECT CONCAT('temp_', CONNECTION_ID()) INTO session_id;

    SET temp_table_name = CONCAT('month_year_list_with_rule_', session_id);

    SET @create_table_query = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS ', temp_table_name, ' (
        periode DATE,
        nearest_rule_date DATE,
        iuran INT
    )');
    PREPARE create_table_stmt FROM @create_table_query;
    EXECUTE create_table_stmt;
    DEALLOCATE PREPARE create_table_stmt;

    SET cur_date = start_date;

    WHILE cur_date <= end_date DO
        SET month_year = cur_date;
        
       SET @nearest_rule_date_query = CONCAT('SELECT periode, iuran INTO @nearest_rule_date, @iuran FROM setting_iuran WHERE periode <= ? AND id_jenis_dagangan = ? order by id desc limit 1');
PREPARE nearest_rule_date_stmt FROM @nearest_rule_date_query;
EXECUTE nearest_rule_date_stmt USING cur_date, id_jenis;
        DEALLOCATE PREPARE nearest_rule_date_stmt;
        
        SET @insert_query = CONCAT('INSERT INTO ', temp_table_name, ' (periode, nearest_rule_date, iuran) VALUES (?, @nearest_rule_date, @iuran)');
        PREPARE insert_stmt FROM @insert_query;
        EXECUTE insert_stmt USING month_year;
        DEALLOCATE PREPARE insert_stmt;
 
        SET cur_date = DATE_ADD(cur_date, INTERVAL 1 MONTH);
    END WHILE;

    SET @select_query = CONCAT('SELECT * FROM ', temp_table_name);
    PREPARE select_stmt FROM @select_query;
    EXECUTE select_stmt;
    DEALLOCATE PREPARE select_stmt;
    
    -- Drop the temporary table
    SET @drop_table_query = CONCAT('DROP TEMPORARY TABLE IF EXISTS ', temp_table_name);
    PREPARE drop_table_stmt FROM @drop_table_query;
    EXECUTE drop_table_stmt;
    DEALLOCATE PREPARE drop_table_stmt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama_akun` varchar(200) NOT NULL,
  `alias` varchar(100) NOT NULL DEFAULT '',
  `keterangan` text NOT NULL,
  `nomor_rekening` varchar(50) NOT NULL,
  `creator` int(11) NOT NULL DEFAULT 0,
  `bank` tinyint(1) NOT NULL DEFAULT 0,
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama_akun`, `alias`, `keterangan`, `nomor_rekening`, `creator`, `bank`, `aktif`) VALUES
(0, 'Cash Drawer', 'CASH', '', '1462045080', 1, 1, 1),
(2, 'petty cash', '', 'uang operasional yang dialokasikan oleh bendahara', '', 0, 0, 1),
(3, 'Rekening BCA', 'BCA', '', '1462045080', 1, 1, 1),
(4, 'Rekening BNI', 'BNI', '', '20303303030', 1, 1, 1);

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
(39, '2020-04-01', 28, 250000, 0, 0),
(40, '2020-05-01', 28, 250000, 0, 0),
(41, '2020-06-01', 28, 250000, 0, 0),
(42, '2020-07-01', 28, 250000, 0, 0),
(43, '2020-08-01', 28, 250000, 0, 0),
(44, '2020-09-01', 28, 250000, 0, 0),
(45, '2020-10-01', 28, 250000, 0, 0),
(46, '2020-11-01', 28, 250000, 0, 0),
(47, '2020-12-01', 28, 250000, 0, 0),
(48, '2021-01-01', 28, 250000, 0, 0),
(49, '2021-02-01', 28, 250000, 0, 0),
(50, '2021-03-01', 28, 250000, 0, 0),
(76, '2024-01-01', 31, 225000, 200000, 0),
(77, '2024-02-01', 31, 225000, 200000, 0),
(78, '2024-03-01', 32, 225000, 200000, 0),
(79, '2024-04-01', 33, 225000, 200000, 0),
(80, '2024-05-01', 34, 225000, 200000, 0),
(81, '2024-06-01', 35, 225000, 200000, 0),
(82, '2024-07-01', 36, 225000, 200000, 0),
(83, '2024-08-01', 37, 225000, 200000, 0),
(84, '2024-09-01', 37, 225000, 200000, 0),
(85, '2020-04-01', 38, 250000, 0, 0),
(86, '2020-05-01', 38, 250000, 0, 0),
(87, '2020-06-01', 38, 250000, 0, 0),
(88, '2020-07-01', 39, 250000, 0, 0),
(89, '2020-08-01', 40, 250000, 0, 0),
(90, '2020-09-01', 41, 250000, 0, 0),
(91, '2020-10-01', 41, 250000, 0, 0),
(92, '2020-11-01', 41, 250000, 0, 0),
(93, '2020-12-01', 41, 250000, 0, 0),
(94, '2021-01-01', 42, 250000, 0, 0),
(95, '2021-02-01', 42, 250000, 0, 0),
(96, '2021-03-01', 42, 250000, 0, 0);

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
-- Struktur dari tabel `info_lembaga`
--

CREATE TABLE `info_lembaga` (
  `id` int(11) NOT NULL,
  `nama_lembaga` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `info_lembaga`
--

INSERT INTO `info_lembaga` (`id`, `nama_lembaga`, `alamat`, `kecamatan`, `kabupaten`, `telp`) VALUES
(1, 'PENGURUS PANTAI DESA ADAT LEGIAN', 'Jl. Padma (Pinggir Pantai)', 'Kuta', 'Badung Mangupura', '0361-4756933');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_akun` int(11) NOT NULL,
  `debet` bigint(11) UNSIGNED NOT NULL,
  `kredit` bigint(11) UNSIGNED NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_transaksi` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `kode` int(11) NOT NULL DEFAULT 0 COMMENT '1000 cek point posisi saldo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id`, `tanggal`, `id_akun`, `debet`, `kredit`, `keterangan`, `id_user`, `id_transaksi`, `kode`) VALUES
(14, '2024-04-18 00:00:00', 0, 850000, 0, 'Iuran AsonganFeb 2024 LONTONG 2380/ST/TT/2024', 1, 31, 0),
(15, '2024-04-18 00:00:00', 0, 425000, 0, 'Asongan Iuran Periode Mar, 2024 LONTONG 2380/ST/TT/2024', 1, 32, 0),
(16, '2024-04-18 00:00:00', 0, 425000, 0, 'Asongan Iuran Periode Apr, 2024 LONTONG 2380/ST/TT/2024', 1, 33, 0),
(17, '2024-04-18 00:00:00', 0, 425000, 0, 'Asongan Iuran Periode May, 2024 LONTONG 2380/ST/TT/2024', 1, 34, 0),
(18, '2024-04-18 00:00:00', 0, 425000, 0, 'Asongan Iuran Periode Jun, 2024 LONTONG 2380/ST/TT/2024', 1, 35, 0),
(19, '2024-04-18 00:00:00', 0, 425000, 0, 'Asongan Iuran Periode Jul, 2024 LONTONG 2380/ST/TT/2024', 1, 36, 0),
(20, '2024-04-18 00:00:00', 0, 850000, 0, 'Asongan Iuran Periode Aug, 2024 - Sep, 2024 LONTONG 2380/ST/TT/2024', 1, 37, 0),
(21, '2024-04-18 00:00:00', 0, 750000, 0, 'Terima Iuran LONTONG - 0618/IX-100/SK/2024', 1, 38, 0),
(22, '2024-04-18 00:00:00', 0, 250000, 0, 'Terima Iuran LONTONG - 0618/IX-100/SK/2024', 1, 39, 0),
(23, '2024-04-18 00:00:00', 0, 250000, 0, 'Terima Iuran LONTONG - 0618/IX-100/SK/2024', 1, 40, 0),
(24, '2024-04-18 00:00:00', 3, 1000000, 0, 'Iuran Pedagang LONTONG - 0618/IX-100/SK/2024', 1, 41, 0),
(25, '2024-04-18 00:00:00', 0, 750000, 0, 'Iuran Pedagang Periode Iuran Periode Jan, 2021 - Mar, 2021 LONTONG - 0618/IX-100/SK/2024', 1, 42, 0);

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
-- Struktur dari tabel `periode_laporan`
--

CREATE TABLE `periode_laporan` (
  `id` int(11) NOT NULL,
  `periode` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_extra_charge`
--

CREATE TABLE `setting_extra_charge` (
  `id` int(11) NOT NULL,
  `periode` date NOT NULL,
  `id_pedagang` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_iuran`
--

CREATE TABLE `setting_iuran` (
  `id` int(11) NOT NULL,
  `id_jenis_dagangan` int(11) NOT NULL,
  `periode` date NOT NULL,
  `iuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting_iuran`
--

INSERT INTO `setting_iuran` (`id`, `id_jenis_dagangan`, `periode`, `iuran`) VALUES
(129, 1, '2020-01-01', 100000),
(130, 2, '2020-01-01', 100000),
(131, 3, '2020-01-01', 150000),
(132, 11, '2020-01-01', 100000),
(133, 12, '2020-01-01', 1000000),
(134, 13, '2020-01-01', 150000),
(135, 14, '2020-01-01', 100000),
(136, 15, '2020-01-01', 100000),
(137, 16, '2020-01-01', 100000),
(138, 17, '2020-01-01', 100000),
(139, 18, '2020-01-01', 100000),
(140, 19, '2020-01-01', 100000),
(141, 20, '2020-01-01', 150000),
(142, 21, '2020-01-01', 100000),
(143, 22, '2020-01-01', 100000),
(144, 1, '2022-01-01', 200000),
(145, 2, '2022-01-01', 200000),
(146, 3, '2022-01-01', 200000),
(147, 11, '2022-01-01', 200000),
(148, 12, '2022-01-01', 2000000),
(149, 13, '2022-01-01', 200000),
(150, 14, '2022-01-01', 200000),
(151, 15, '2022-01-01', 200000),
(152, 16, '2022-01-01', 200000),
(153, 17, '2022-01-01', 200000),
(154, 18, '2022-01-01', 200000),
(155, 19, '2022-01-01', 200000),
(156, 20, '2022-01-01', 200000),
(157, 21, '2022-01-01', 200000),
(158, 22, '2022-01-01', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_iuran_asongan`
--

CREATE TABLE `setting_iuran_asongan` (
  `id` int(11) NOT NULL,
  `iuran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting_iuran_asongan`
--

INSERT INTO `setting_iuran_asongan` (`id`, `iuran`, `tanggal`, `user_id`) VALUES
(1, 225000, '2024-04-10', 1),
(2, 300000, '2024-04-10', 1),
(3, 225000, '2024-04-11', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_iuran`
--

CREATE TABLE `transaksi_iuran` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `ke_akun` int(11) NOT NULL DEFAULT 0 COMMENT '0=cash,selain itu id akun bank'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_iuran`
--

INSERT INTO `transaksi_iuran` (`id_transaksi`, `id_kartu`, `tanggal_transaksi`, `id_user`, `status`, `ke_akun`) VALUES
(31, 2380, '2024-04-18 00:00:00', 1, 1, 0),
(32, 2380, '2024-04-18 00:00:00', 1, 1, 0),
(33, 2380, '2024-04-18 00:00:00', 1, 1, 0),
(34, 2380, '2024-04-18 00:00:00', 1, 1, 0),
(35, 2380, '2024-04-18 00:00:00', 1, 1, 0),
(36, 2380, '2024-04-18 11:54:12', 1, 1, 0),
(37, 2380, '2024-04-18 12:38:16', 1, 1, 0),
(38, 618, '2024-04-18 00:00:00', 1, 1, 0),
(39, 618, '2024-04-18 00:00:00', 1, 1, 0),
(40, 618, '2024-04-18 01:52:39', 1, 1, 0),
(41, 618, '2024-04-18 01:54:28', 1, 1, 3),
(42, 618, '2024-04-18 02:04:17', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_extra_charge`
--

CREATE TABLE `t_extra_charge` (
  `id` int(11) NOT NULL,
  `keterangan_charge` varchar(100) NOT NULL,
  `extra_charge` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_extra_charge`
--

INSERT INTO `t_extra_charge` (`id`, `keterangan_charge`, `extra_charge`) VALUES
(2, 'BANJAR', 200000),
(3, 'BANJAR', 150000),
(4, 'LANSIA', -225000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenis_dagangan`
--

CREATE TABLE `t_jenis_dagangan` (
  `id` int(11) NOT NULL,
  `nama_dagangan` varchar(200) NOT NULL,
  `prefix_dagangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jenis_dagangan`
--

INSERT INTO `t_jenis_dagangan` (`id`, `nama_dagangan`, `prefix_dagangan`) VALUES
(1, 'SEWA SKI', 'SK'),
(2, 'SEWA PAYUNG', 'SP'),
(3, 'MINUMAN', 'MN'),
(11, 'MAKANAN', 'MK'),
(12, 'WARUNG', 'WR'),
(13, 'ICE CREAM', 'IC'),
(14, 'JASA', 'JS'),
(15, 'JUAL BUAH', 'BH'),
(16, 'JUAL DUPA', 'DP'),
(17, 'JAGUNG', 'JG'),
(18, 'LUMPIA', 'LP'),
(19, 'SNACK', 'SN'),
(20, 'ROKOK', 'RK'),
(21, 'SOUVENIR', 'SV'),
(22, 'TATOO', 'TT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kartu`
--

CREATE TABLE `t_kartu` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pemilik` varchar(200) NOT NULL,
  `nomor_kartu` varchar(100) NOT NULL,
  `alamat_kartu` varchar(200) NOT NULL,
  `nomor_telp` varchar(20) NOT NULL,
  `join_date` date NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_jenis_dagangan` int(11) NOT NULL,
  `id_blok` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_kartu`
--

INSERT INTO `t_kartu` (`id`, `nama_pemilik`, `nomor_kartu`, `alamat_kartu`, `nomor_telp`, `join_date`, `id_wilayah`, `id_jenis_dagangan`, `id_blok`, `aktif`) VALUES
(100, 'I Wayan Sudiarjaya', '0100/I-01/MK/2024', 'Jl. Legian No. 493', '089528447159', '2024-04-01', 4, 11, 1, 1),
(101, 'I Wayan Astra Wisnawa', '0101/I-01/MN/2024', 'Jl. Legian Gg. Nakula No. 481 Link. Legian Kaja', '089528447159', '2024-04-01', 4, 3, 1, 1),
(102, 'Imam Nawawi', '', 'Jl. Raya Legian No. 470', '0811111', '2024-04-01', 4, 2, 2, 1),
(103, 'I Nyoman Budiamba', '', 'Jl. Legian Laja No. 473, Link. Legian Kaja', '08123818800', '2024-04-01', 4, 1, 2, 1),
(104, 'I Wayan Sudiarta', '', 'Jl. Raya No. 481', '0811111', '2024-04-01', 4, 3, 3, 1),
(105, 'I Wayan Muda Yasa', '', 'Jl. Legian No. 483 Link. Br. Legian Kaja', '081999044700', '2024-04-01', 4, 2, 3, 1),
(106, 'Komang Tri Saputra', '', 'Jl. Legian Kaja 483 Link. Legian Kaja', '081339724006', '2024-04-01', 4, 1, 3, 1),
(107, 'I Ketut Sukarja ', '', 'Jl. Legian No. 449, L. Kaja', '0811111', '2024-04-01', 4, 11, 4, 1),
(108, 'I Ketut Susila Darma', '', 'Link. Legian Kaja', '0811111', '2024-04-01', 4, 2, 4, 1),
(109, 'Ni Luh Putri Wahyuni', '', 'Jl. Padma Utara, L. Kaja', '0811111', '2024-04-01', 4, 3, 5, 1),
(110, 'I Wayan Sutarsa', '', 'Jl. Arjuna No. 611 Legian Kaja', '0811111', '2024-04-01', 4, 2, 5, 1),
(111, 'I Nyoman Yasa', '', 'Jl. Arjuna Gg. Eddy\'s Cottage', '081936063666', '2024-04-01', 4, 1, 5, 1),
(112, 'I Komang Sastrawan', '', 'Br. Legian Kaja', '085237479579', '2024-04-01', 4, 11, 6, 1),
(113, 'I Wayan Dika Adhi Rahasta', '', 'Jl. Arjuna Gg. Kebyar No. 5', '0811111', '2024-04-01', 4, 3, 6, 1),
(114, 'I Wayan Adi Indrawan', '', 'Jl. Arjuna Gg. Eddy\'s Cottage, Legian Kaja', '0811111', '2024-04-01', 4, 2, 6, 1),
(115, 'I Made Puja', '', 'Jl. Raya Legian No. 490, Legian Kaja', '0811111', '2024-04-01', 4, 1, 6, 1),
(116, 'I Wayan Muda Artana', '', 'Jl. Campuhan II No. 7,  Legian Kaja', '0811111', '2024-04-01', 4, 3, 7, 1),
(117, 'I Nyoman Suweta', '', 'Br. Legian Kaja', '082145975608', '2024-04-01', 4, 2, 7, 1),
(118, 'I Wayan Agus Eka Wahyudi', '', 'Jl. Raya Legian No. 468', '0811111', '2024-04-01', 4, 1, 7, 1),
(119, 'I Ketut Sathya Darma Putra', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 3, 8, 1),
(120, 'I Wayan Pio Ambara Prasetia', '', 'Jl. Raya Legian No. 490, Legian Kaja', '085944289066', '2024-04-01', 4, 2, 8, 1),
(121, 'I Nyoman Budiasa', '', 'Jl. Legian Kaja', '0811111', '2024-04-01', 4, 1, 8, 1),
(122, 'I Wayan Ardy Purnamantara', '', 'Jl. Raya Legian No. 456', '0811111', '2024-04-01', 4, 3, 9, 1),
(123, 'I Kadek Sariada', '', 'Jl. Raya Legian Kaja', '0811111', '2024-04-01', 4, 2, 9, 1),
(124, 'I Made Kerta Raharja', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 1, 9, 1),
(125, 'I Made Artha', '', 'Jl. Arjuna Legian Kaja', '0811111', '2024-04-01', 4, 3, 10, 1),
(126, 'I Ketut Samapta', '', 'Jl. Werkudara No. 516', '0811111', '2024-04-01', 4, 1, 10, 1),
(127, 'I Wayan Sutarga', '', 'Jl. Legian No. 489', '0811111', '2024-04-01', 4, 2, 10, 1),
(128, 'I Nyoman Tirtanadi ', '', 'Br. Legian Kaja ', '0811111', '2024-04-01', 4, 3, 11, 1),
(129, 'I Made Regig Maryusa', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 2, 11, 1),
(130, 'I Made Budiarta', '', 'Jl. Werkudara No. 522', '0811111', '2024-04-01', 4, 1, 11, 1),
(131, 'I Komang Artha', '', 'Jl. Arjuna No. 3Y, L. Kaja', '0811111', '2024-04-01', 4, 2, 12, 1),
(132, 'I Wayan Sudena', '', 'Jl. Nakula No. 6, Link. Legian Kaja', '08123810427', '2024-04-01', 4, 11, 13, 1),
(133, 'I Wayan Dodik Widnyana', '', 'Jl. Nakula No. 08, Legian Kaja', '08123972800', '2024-04-01', 4, 3, 13, 1),
(134, 'I Kadek Bayu Winarbawa', '', 'Jl. Nakula No. 08, Legian Kaja', '08123972800', '2024-04-01', 4, 2, 13, 1),
(135, 'I Made Adhi Fransciska', '', 'Jl. Legian Kaja No. 448', '087862494777', '2024-04-01', 4, 3, 14, 1),
(136, 'I Wayan Mudita', '', 'Jl. Werkudara No. 522 Link. Legian Kaja', '0811393360', '2024-04-01', 4, 2, 14, 1),
(137, 'I Wayan Sueta ', '', 'Jl. Werkudara gg. Arjuna No. 530, Legian Kaja', '0811111', '2024-04-01', 4, 3, 15, 1),
(138, 'I Made Suardana, S.T.', '', 'Jl. Padma Utara, Link. Legian Kaja', '0811111', '2024-04-01', 4, 2, 15, 1),
(139, 'I Made Maika Widia Putra', '', 'Jl. Werkudara No. 517, Legian Kaja', '0811111', '2024-04-01', 4, 1, 15, 1),
(140, 'I Wayan Budiarta', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 11, 16, 1),
(141, 'I Ketut Artika', '', 'Lingk. Legian Kaja', '87772488350', '2024-04-01', 4, 3, 16, 1),
(142, 'I Ketut Sukarja', '', 'Jl. Nakula No. 26 A, Legian Kerja', '08179740694', '2024-04-01', 4, 2, 16, 1),
(143, 'I Wayan Lido Setiawan', '', 'Jl. Legian Kaja Kaja no. 479, Legian Kaja', '081338626375', '2024-04-01', 4, 1, 16, 1),
(144, 'I Wayan Budiantara', '', 'Jl. Raya Legian Kaja', '08123832498', '2024-04-01', 4, 3, 17, 1),
(145, 'I Wayan Suparta', '', 'Jl. Raya Legian No. 477, Legian Kaja', '08113880551', '2024-04-01', 4, 2, 17, 1),
(146, 'I Komang Satria Warla Putra, SE.', '', 'Jl. Arjuna 24, L. Kaja', '087860978824', '2024-04-01', 4, 1, 17, 1),
(147, 'I Nengah Sarnada', '', 'Jl. Legian Kaja No. 477', 'Sewa Payung', '2024-04-01', 4, 2, 18, 1),
(148, 'Ni Nyoman Asih', '', 'Jl. Legian No. 469 A', '0361764943', '2024-04-01', 4, 11, 19, 1),
(149, ' I Ketut Suanda', '', 'Jl. Bhisma No. 6, Legian Kaja', '081236881130', '2024-04-01', 4, 2, 19, 1),
(150, 'I Wayan Brata', '', 'Br. Legian Kaja ', '081805582509', '2024-04-01', 4, 1, 19, 1),
(151, 'I Nyoman Aryana', '', 'Br. Legian Kaja ', '081236437799', '2024-04-01', 4, 2, 20, 1),
(152, 'I Ketut Juliadi Pramana Putra', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 3, 21, 1),
(153, 'I Wayan Muda Suyasa', '', 'Jl. Werkudara No. 518', '0811111', '2024-04-01', 4, 2, 21, 1),
(154, 'A.A. Made Putra, Ssn', '', 'Br. Legian Kaja', '085857491266', '2024-04-01', 4, 3, 22, 1),
(155, 'I Gusti Ketut Anom, S.sn.', '', 'Jl. Legian No. 471', '081547646004', '2024-04-01', 4, 2, 22, 1),
(156, 'I Wayan Peri Ariawan', '', 'Lingk. Legian Kaja', '0811111', '2024-04-01', 4, 11, 23, 1),
(157, 'I Made Adi Santika', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 3, 23, 1),
(158, 'I Made Musnawan', '', 'Jl. Legian No. 487, L. Kaja', '0811111', '2024-04-01', 4, 2, 23, 1),
(159, 'I Made Arjana', '', 'Br. Legian Kaja', '081337869855', '2024-04-01', 4, 2, 24, 1),
(160, 'I Made Mandra', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 11, 25, 1),
(161, 'I Wayan Eka Aryawan', '', 'Br. Legian Kaja', '081337869855', '2024-04-01', 4, 3, 25, 1),
(162, 'I Made Winangun Arta', '', 'Jl. Raya Legian No. 477 Link. Legian Kaja', 'Sewa Payung', '2024-04-01', 4, 2, 25, 1),
(163, 'I Nyoman Merta', '', 'Br. Legian Kaja', '081236122020', '2024-04-01', 4, 11, 26, 1),
(164, 'I Wayan Sudiarta ', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 2, 26, 1),
(165, 'I Nyoman Werta', '', 'Br. Legian Kaja', 'Sewa Payung', '2024-04-01', 4, 2, 27, 1),
(166, 'I Nyoman Suardika', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 1, 27, 1),
(167, 'I Ketut Artawan S,E.', '', 'Br. Legian Kaja', '081338735846', '2024-04-01', 4, 3, 28, 1),
(168, 'I Nengah Darmawan', '', 'Br. Legian Kaja No. 485', '082146450141', '2024-04-01', 4, 2, 28, 1),
(169, 'I Wayan Prilion Anggarista,S.T', '', 'Jl. Arjuna No. 45 Link. Legian Kaja', '081236388309', '2024-04-01', 4, 11, 29, 1),
(170, 'I Wayan Agus Swiyoga', '', 'Jl. Arjuna No. 45 Link. Legian Kaja', '087861777711', '2024-04-01', 4, 3, 29, 1),
(171, 'Ni Nengah Sutiari', '', 'Jl. Arjuna Br. Legian Kaja', '085339984178', '2024-04-01', 4, 2, 29, 1),
(172, 'A.A. Putu Adi Suryadi ', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 11, 30, 1),
(173, 'I Gusti Ketut Oka Wardana', '', 'Jl. Nakula No. 69, L. Kaja', '0811111', '2024-04-01', 4, 3, 30, 1),
(174, 'A.A. Made Ngurah Aditya', '', 'Jl. Eka Laweya No. 9, Legian Kaja', '0811111', '2024-04-01', 4, 2, 30, 1),
(175, 'I Wayan Bayu Ardika', '', 'Jl. Raya Legian No. 504, Legian Kaja', '08123954834', '2024-04-01', 4, 1, 30, 1),
(176, 'I Made Wira Adi Sanjaya', '', 'Br. Legian Kaja', '081917372983', '2024-04-01', 4, 11, 31, 1),
(177, 'I Nyoman Sujendra', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 3, 31, 1),
(178, 'I Made Sudana', '', 'Jl. Raya Legian Kaja', 'Sewa Payung', '2024-04-01', 4, 2, 31, 1),
(179, 'I Ketut Adiarta ', '', 'Br. Legian Kaja', '087846053625', '2024-04-01', 4, 11, 32, 1),
(180, 'I Made Sudana B.W.', '', 'Jl. Legian Kaja No. 455', '0811111', '2024-04-01', 4, 3, 32, 1),
(181, 'I Nyoman Sudarsana', '', 'Jl. Legian Kaja', '0811111', '2024-04-01', 4, 2, 32, 1),
(182, 'I Gede Made Sulaksana Putra', '', 'Jl. Legian No. 536 Link. Br. Legian Kaja', '087860161487', '2024-04-01', 4, 3, 33, 1),
(183, 'Putu Albania Swastika Mika', '', 'Jl. Legian No. 536 Link. Br. Legian Kaja', '085933549743', '2024-04-01', 4, 2, 33, 1),
(184, 'I Nyoman Antara', '', 'Jl. Werkudara No. 538', '081338213744', '2024-04-01', 4, 11, 33, 1),
(185, 'I Putu Aditya Rizky Permana', '', 'Jl. Legian No. 433 Br. L. Tgh', '082145164400', '2024-04-01', 4, 11, 34, 1),
(186, 'I Komang Anom Budiasa', '', 'Jl. Werkudara Gg. Arjuna No. 7 Link Legfian Kaja', '0811111', '2024-04-01', 4, 3, 34, 1),
(187, 'I Kadek Adi Mulyasa', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 2, 34, 1),
(188, 'I Nyoman Suparwata', '', 'Br. Legian Kaja', '089516966251', '2024-04-01', 4, 1, 34, 1),
(189, 'I Made Agus Susila Dharma', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 3, 35, 1),
(190, 'I Wayan Merdana', '', 'Jl. Bhisma No. 89 X', '0811111', '2024-04-01', 4, 2, 35, 1),
(191, 'I Made Bagiada, S.E.', '', 'Br. Legian Kaja', '08123842300', '2024-04-01', 4, 3, 36, 1),
(192, 'I Wayan Budayasa', '', 'Jl. Legian No. 472 Legian Kaja', '081353636991', '2024-04-01', 4, 2, 36, 1),
(193, 'I Made Sudika', '', 'Br. Legian Kaja', '081805441456', '2024-04-01', 4, 3, 37, 1),
(194, 'I Wayan Karmana', '', 'Jl. Legian Kaja Gg. Purnama 457 E', '081805456797', '2024-04-01', 4, 2, 37, 1),
(195, 'I Wayan Ariska Purnama Putra', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 11, 38, 1),
(196, 'I Nengah Astawa', '', 'Jl. Legian No. 449, L. Kaja', '0811385905', '2024-04-01', 4, 3, 38, 1),
(197, 'I Wayan Riski Damawan', '', 'Jl. Werkudara No. 534, Legian Kaja', '08563743788', '2024-04-01', 4, 2, 38, 1),
(198, 'I Nyoman Winarta', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 3, 39, 1),
(199, 'I Made Merta', '', 'Jl. Lebak Bena Gg. Senen No. 2', '087860026633', '2024-04-01', 4, 11, 39, 1),
(200, 'I Nyoman Suwirta', '', 'Br. Legian Kaja', '08123859666', '2024-04-01', 4, 2, 39, 1),
(201, 'I Putu Suryadi', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 11, 40, 1),
(202, 'I Kadek Kusumayasa', '', 'Jl. Legian No. 477, L. Kaja', '081916639119', '2024-04-01', 4, 3, 40, 1),
(203, 'I Kadek Sumertha', '', 'Jl. Legian Kaja No. 475 D', '0811111', '2024-04-01', 4, 2, 40, 1),
(204, 'I Wayan Agus Parwata, Amd. Par', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 3, 41, 1),
(205, 'I Wayan Mardana, S.H.', '', 'Jl. Legian Kaja, No. 467', '0811111', '2024-04-01', 4, 2, 41, 1),
(206, 'I Wayan Suanda', '', 'Br. Legian Kaja', '081933118489', '2024-04-01', 4, 3, 42, 1),
(207, 'I Komang Pramana Sanjaya', '', 'Jl. Legian Kaja Kaja No. 475 E', '0811111', '2024-04-01', 4, 2, 42, 1),
(208, 'I Ketut Mertajaya', '', 'Jl. Legian Gg. Purnama 457 G', '082147597662', '2024-04-01', 4, 1, 43, 1),
(209, 'I Nyoman Budiana', '', 'Br. Legian Kaja', '081239239595', '2024-04-01', 4, 11, 43, 1),
(210, 'I Wayan Suwitra', '', 'Br. Legian Kaja 490', '081916198178', '2024-04-01', 4, 3, 43, 1),
(211, 'I Kadek Adi Saputra', '', 'Jl. Werkudara No. 532', '081338631166', '2024-04-01', 4, 2, 43, 1),
(212, 'I Wayan Agi Budi Astawan', '', 'Br. Legian Kaja', '081999932730', '2024-04-01', 4, 3, 44, 1),
(213, 'I Nyoman Enteg', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 2, 44, 1),
(214, 'I Nengah Heriyasa', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 4, 1, 44, 1),
(215, 'I Made Putra Darma Yasa', '', 'Jl. Nakula Link. Br. Legian Kaja', '081246194585', '2024-04-01', 5, 3, 1, 1),
(216, 'I Nengah Sadi', '', 'Jl. Nakula Link. Br. Legian Kaja', '081246194587', '2024-04-01', 5, 2, 1, 1),
(217, 'I Wayan Difo Agustina', '', 'Jl. Legian Kaja No. 448, Link Legian Kaja', '08533542456', '2024-04-01', 5, 3, 3, 1),
(218, 'I Made Sada', '', 'Jl.Legian Kaja No. 448, Legian', '081999530833', '2024-04-01', 5, 2, 3, 1),
(219, 'I Ketut Nardi', '', 'Jl. Raya Legian No. 474, Legian Kaja', '0811111', '2024-04-01', 5, 1, 3, 1),
(220, 'I Made Iwa Pratama', '', 'Jl. Arjuna No. 4X Link. Legian Kaja', '08786066567', '2024-04-01', 5, 11, 4, 1),
(221, 'A.A. Ngr. Sudarsana', '', 'Jl. Legian No. 484', '0811111', '2024-04-01', 5, 3, 4, 1),
(222, 'I Wayan Sugianta', '', 'Jl.Legian Kaja No. 475, Legian Kaja', '08123931647', '2024-04-01', 5, 3, 5, 1),
(223, 'I Wayan Hartawan', '', 'Jl. Raya Legian Kaja No. 479', '08164712923', '2024-04-01', 5, 2, 5, 1),
(224, 'I Nyoman Mudiana', '', 'Br. Tegal Suci, Br. Tianyar Kubu, Karangasem', '081338681071', '2024-04-01', 5, 1, 5, 1),
(225, 'I Ketut Yasa', '', 'Link. Legian Kaja, Legian', '', '2024-04-01', 5, 11, 6, 1),
(226, 'I Gede Valja Palguna', '', 'Jl. Raya Legian Kaja No. 442', '081916686620', '2024-04-01', 5, 3, 6, 1),
(227, 'I Ketut Sentanu', '', 'Jl. Raya Legian No. 455, Link Legian Kaja', '081999775881', '2024-04-01', 5, 2, 6, 1),
(228, 'I Ketut Wisata', '', 'Jl. Arjuna No. 89 Legian Kaja', '082145412090', '2024-04-01', 5, 3, 8, 1),
(229, 'I Nyoman Rudita', '', 'Jl. Nakula Gg. Baik Baik Link. Legian Kaja', '081338425624', '2024-04-01', 5, 2, 8, 1),
(230, 'I Nengah Sugita ', '', 'Jl. Legian No. 488 Legian Kaja', '081238440066', '2024-04-01', 5, 1, 8, 1),
(231, 'I Wayan Ada', '', 'Br. Legian Kelod', '081337956915', '2024-04-01', 5, 3, 9, 1),
(232, 'I Wayan Sugiana', '', 'Gg. Mulih No. 475 B, L. Kaja', '0811111', '2024-04-01', 5, 2, 9, 1),
(233, 'I Wayan Suata', '', 'Jl. Raya Legian Gg. Purnama II, Legian Kaja', '087760101103', '2024-04-01', 5, 3, 10, 1),
(234, 'I Nyoman Retha Aryana', '', 'Link. Legian Kaja, Legian', '081236011770', '2024-04-01', 5, 2, 10, 1),
(235, 'I Ketut Sudira', '', 'Jl. Werkudara No. 533, Legian Kaja', '087760101102', '2024-04-01', 5, 1, 10, 1),
(236, 'I Nengah Duarsa', '', 'Br. Legian Kaja ', '08113804377', '2024-04-01', 5, 3, 11, 1),
(237, 'Ni Putu Sri Wahyuni', '', 'Jl. Legian Kaja No. 472', '08123681485', '2024-04-01', 5, 2, 11, 1),
(238, 'I Nyoman Budiartha', '', 'Jl. Gn. Gede I Kelapa Gading No. 3 Pds', '081337507750', '2024-04-01', 5, 1, 11, 1),
(239, 'I Wayan Andiana', '', 'Jl. Legian Kaja Gg. Nakula No. 481, Legian', '087859680068', '2024-04-01', 5, 11, 13, 1),
(240, 'Chresna Satyavadini', '', 'Jl. Legian Kaja No. 490, Legian', '081933026936', '2024-04-01', 5, 3, 13, 1),
(241, 'I Wayan Gita Pranata', '', 'Jl. Legian Kaja No. 456, Legian', '081338336878', '2024-04-01', 5, 2, 13, 1),
(242, 'I Nengah Suastha', '', 'Jl. Gn. Sari V No. 21 A, Dps', '081337354401', '2024-04-01', 5, 3, 14, 1),
(243, 'I Nyoman Arsana', '', 'Jl. Legian No. 452, Legian Kaja', '0811111', '2024-04-01', 5, 2, 14, 1),
(244, 'I Wayan Madiarta', '', 'Jl. Legian Kaja', '0895416244222', '2024-04-01', 5, 11, 15, 1),
(245, 'I Ketut Suardika', '', 'Jl. Legian Gg. XXI Legian Kaja', '0811111', '2024-04-01', 5, 3, 15, 1),
(246, 'I Made Budayasa', '', 'Jl. Legian No. 453, Legian Kaja', '081338450280', '2024-04-01', 5, 2, 15, 1),
(247, 'I Wayan Marayasa ', '', 'Lingk. Legian Kaja', '081339944853', '2024-04-01', 5, 11, 16, 1),
(248, 'I Nengah Sudiarsa', '', 'Jl. Raya Legian No. 469', '0811111', '2024-04-01', 5, 3, 16, 1),
(249, 'Kadek Surya Wirawan', '', 'Jl. Legian Kaja No. 469 C', '081236331934', '2024-04-01', 5, 2, 16, 1),
(250, 'I Gede Martana', '', 'Lingk. Legian Kaja', '085792177064', '2024-04-01', 5, 1, 16, 1),
(251, 'I Nengah Suarta', '', 'Link. Legian Kaja, Legian', '0817565040', '2024-04-01', 5, 11, 17, 1),
(252, 'I Ketut Suryada', '', 'Link. Legian Kaja, Legian', '0811111', '2024-04-01', 5, 3, 17, 1),
(253, 'I Made Budiartana', '', 'Link. Legian Kaja, Legian', '0811111', '2024-04-01', 5, 2, 17, 1),
(254, 'I Wayan Yuliada', '', 'Jl. Legian No. 501 Lingk. Legian Kaja', '081260205078', '2024-04-01', 5, 1, 17, 1),
(255, 'I Made Susendra', '', 'Lingk. Legian Kaja', '087896405445', '2024-04-01', 5, 11, 19, 1),
(256, 'I Wayan Sukanadi, S.E.', '', 'Jl. Legian Kaja No. 465', '0811111', '2024-04-01', 5, 3, 19, 1),
(257, 'I Made Kacung', '', 'Jl. Legian Kaja Gg. Purnama II, Link. Legian Kaja', '0811111', '2024-04-01', 5, 2, 19, 1),
(258, 'Ni Luh Astini', '', 'Jl. Legian Kaja Gg. Purnama I', '081916377210', '2024-04-01', 5, 1, 19, 1),
(259, 'Yusak Ngurah Diatmika Djagera', '', 'Jalan Padma Utara Legian Kaja', '081337253720', '2024-04-01', 5, 11, 20, 1),
(260, 'Mahariawan Wijaya', '', 'Dalung Permai/ Br. Legian Kaja', '081338978672', '2024-04-01', 5, 3, 20, 1),
(261, 'I Wayan Wilantara Prayuda', '', 'Jl. Legian Kaja No. 490, Legian', '081338978672', '2024-04-01', 5, 2, 20, 1),
(262, 'I Gede Budi Pradnyana', '', 'Jl. Werkudara No. 477', '0811111', '2024-04-01', 5, 3, 21, 1),
(263, 'I Wayan Kariyana', '', 'Jl. Legian Kaja No. 438, Legian Kaja', '081999362009', '2024-04-01', 5, 2, 21, 1),
(264, 'I Made Kurniawan', '', 'Jl. Werkudara No. 532, L. Kaja', '081236276334', '2024-04-01', 5, 1, 21, 1),
(265, 'I Komang Gede Arcaya', '', 'Jl. Legian 450 Br. Legian Kaja', '087851337228', '2024-04-01', 5, 3, 22, 1),
(266, 'I Wayan Puspa', '', 'Jl. Legian Kaja 490, Link. Legian Kaja', '081223456279', '2024-04-01', 5, 1, 22, 1),
(267, 'I Putu Waisnawa', '', 'Jl. Legian Kaja No. 455', '087846053625', '2024-04-01', 5, 3, 23, 1),
(268, 'A.A. Pt. Gd. Wiranata', '', 'Br. Jabapura, Pds Kelod, Denpasar Barat', '081916156375', '2024-04-01', 5, 2, 23, 1),
(269, 'I Kadek Ardana', '', 'Jl. Werkudara No. 461, Legian Kaja', '0811111', '2024-04-01', 5, 11, 24, 1),
(270, 'Ni Ketut Armini', '', 'Jl. Legian No. 481, Legian Kaja', '08133917988', '2024-04-01', 5, 3, 24, 1),
(271, 'I Ketut Nuada', '', 'Jl. Legian No. 481, Legian Kaja', '08133917988', '2024-04-01', 5, 2, 24, 1),
(272, 'I Ketut Suweca', '', 'Jl. Raya Legian No. 446', '081916739440', '2024-04-01', 5, 1, 24, 1),
(273, 'I Komang Bayangkara', '', 'Jl. Raya Legian No. 489, Link Legian Kaja', '0811111', '2024-04-01', 5, 3, 25, 1),
(274, 'I Wayan Parwata', '', 'Jl. Nakula Gg. Baik Baik No. 7 C Link. Legian Kaja', '0811111', '2024-04-01', 5, 2, 25, 1),
(275, 'I Gede Budayasa BW', '', 'Jl. Raya Legian Gg. Purnama, Legian Kaja', '0811111', '2024-04-01', 5, 1, 25, 1),
(276, 'A.A. Ngr. Bayu Suryanatha ', '', 'Jl. Legian No. 484, Legian Kaja', '0811111', '2024-04-01', 5, 11, 26, 1),
(277, 'A.A. Made Mantra, SIP. ', '', 'Jl. Bhisma, L. Kaja', '0811111', '2024-04-01', 5, 3, 26, 1),
(278, 'I Ketut Sudana', '', 'Br. Legian Kaja ', '085237412160', '2024-04-01', 5, 2, 26, 1),
(279, 'I Nyoman Wiryawan', '', 'Lingk. Legian Kaja', '081558278243', '2024-04-01', 5, 11, 27, 1),
(280, 'I Ketut Buda', '', 'Lingk. Legian Kaja', '08123608294', '2024-04-01', 5, 3, 27, 1),
(281, 'I Made Sudiantara', '', 'Lingk. Legian Kaja', '081238301156', '2024-04-01', 5, 2, 27, 1),
(282, 'Ni Ketut Lastini', '', 'Br. Legian Kaja ', '085237412160', '2024-04-01', 5, 2, 28, 1),
(283, 'I Made Rai Siswanta', '', 'Br. Legian Kaja ', '085237412160', '2024-04-01', 5, 1, 28, 1),
(284, 'I Wayan Suartana', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 5, 3, 29, 1),
(285, 'I Putu Sanjaya', '', 'Jl. Raya Legian No. 457 C, Legian Kaja', '085237412160', '2024-04-01', 5, 2, 29, 1),
(286, 'I Ketut Putra Adi Surya', '', 'Lingk. Legian Kaja', '081338811329', '2024-04-01', 6, 11, 1, 1),
(287, 'I Made Widana Yasa', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 6, 3, 1, 1),
(288, 'I Wayan Agam Agastya', '', 'Jl. Raya Legian 448 Legian Kaja', '0811111', '2024-04-01', 6, 2, 1, 1),
(289, 'I Made Yasa', '', 'Jl. Legian Kaja No. 446', '0811111', '2024-04-01', 6, 1, 1, 1),
(290, 'I Wayan Budayasa Setiawan', '', 'Br.  Legian Kaja', '0811111', '2024-04-01', 6, 3, 2, 1),
(291, 'I Ketut Gede Ambara', '', 'Jl. Legian No. 450', '0811111', '2024-04-01', 6, 2, 2, 1),
(292, 'I Wayan Yodek Arimbawa', '', 'Jl. Bisma 480, Legian Kaja', '0811111', '2024-04-01', 6, 3, 3, 1),
(293, 'I Nyoman Amidnata', '', 'Jl. Bisma 480, Legian Kaja', '0811111', '2024-04-01', 6, 2, 3, 1),
(294, 'A.A. Ketut Adi Wira Negara', '', 'Jl. Legian No. 427, Link Legian Tengah', '0811111', '2024-04-01', 6, 11, 4, 1),
(295, 'A.A. Made Raka Ardana', '', 'Jl. Legian No. 446', '0811111', '2024-04-01', 6, 3, 4, 1),
(296, 'A.A. Made Octa Wiratma', '', 'Jl. Legian No. 427, Link Legian Tengah', '0811111', '2024-04-01', 6, 2, 4, 1),
(297, 'A.A. Adi Sueca', '', 'Jl. Three Brothers Utara 21', '0811111', '2024-04-01', 6, 1, 4, 1),
(298, 'I Nyoman Putra Yasa', '', 'Jl. Legian Kaja No. 459', '0811111', '2024-04-01', 6, 11, 6, 1),
(299, 'I Putu Hary Wijaya', '', 'Jl. Legian No. 446', '0811111', '2024-04-01', 6, 3, 6, 1),
(300, 'A.A. Putu Rai Mayun', '', 'Jl. Legian Kaja, No. 471', '0811111', '2024-04-01', 6, 2, 6, 1),
(301, 'I Wayan Rana ', '', 'Jl. Legian Kaja No. 458', '081236475601', '2024-04-01', 6, 3, 7, 1),
(302, 'I Ketut Suartha ', '', 'Br. Legian Kaja', '081337361331', '2024-04-01', 6, 2, 7, 1),
(303, 'I Ketut Yasa', '', 'Jl. Legian Gg. Purnama II', '081337361331', '2024-04-01', 6, 1, 7, 1),
(304, 'I Wayan Mayun (Belum Buka)', '', 'Jl. Arjuna No. 28, L. Kaja', '0811111', '2024-04-01', 6, 11, 8, 1),
(305, 'I Wayan Riasa ', '', 'Jl. Werkudara No. 526, Legian Kaja', '081936193637', '2024-04-01', 6, 3, 8, 1),
(306, 'I Wayan Sulendra', '', 'Jl. Raya Legian Gg. XXI No. 453 Legian Kaja', '081999323324', '2024-04-01', 6, 2, 8, 1),
(307, 'I Komang Mardona', '', 'Jl. Werkudara No. 526, Legian Kaja', '081936193637', '2024-04-01', 6, 1, 8, 1),
(308, 'I Wayan Antara', '', 'Jl. Legian Gg. Arjuna No. 1', '085333308686', '2024-04-01', 6, 3, 9, 1),
(309, 'I Wayan Arnata', '', 'Br. Legian Tengah', '087861836812', '2024-04-01', 6, 2, 9, 1),
(310, 'I Ketut Merta Yadnya', '', 'Jl. Legian gg. Sahadewa No. 3 Lingk. Legian Tengah', '087860991737', '2024-04-01', 6, 1, 9, 1),
(311, 'I Gede Wahyu Darmika', '', 'Br. Legian Kaja Gg. Purnama 457 D', '0811392443', '2024-04-01', 6, 3, 10, 1),
(312, 'Ni Made Sarini', '', 'Br. Legian Kaja Gg. Purnama 457 D', '0811111', '2024-04-01', 6, 2, 10, 1),
(313, 'I Wayan Adnyana', '', 'Jl. Legian Gg. Arjuna', '081338756545', '2024-04-01', 6, 1, 10, 1),
(314, 'I Ketut Alit Juni Artha', '', 'Jl. Legian No. 457 B, Legian Kaja', '081999075443', '2024-04-01', 6, 3, 11, 1),
(315, 'I Made Artha Yasa BW', '', 'Jl. Legian No. 457 B, Legian Kaja', '081999100033', '2024-04-01', 6, 2, 11, 1),
(316, 'I Made Suparta', '', 'Jl. Legian No. 438 Legian Kaja', '085953891166', '2024-04-01', 6, 1, 11, 1),
(317, 'A.A. Made Adi', '', 'Jl. Raya Legian Link. Legian Kaja', '081558054157', '2024-04-01', 6, 11, 12, 1),
(318, 'A.A. Made Duriana Jaya Lantara ', '', 'Jl. Raya Seminyak Gg. Goa No. 1, Link Legian Kaja', '081999886577', '2024-04-01', 6, 3, 12, 1),
(319, 'A.A. Putu Oka Hartawan', '', 'Jl. Legian 462 Link. Legian Kaja', '087860825676', '2024-04-01', 6, 2, 12, 1),
(320, 'Anak Agung Made Agung', '', 'Jl. Raya Seminyak Gg. Goa No. 2. Link Legian Kaja', '085335355553', '2024-04-01', 6, 1, 12, 1),
(321, 'I Wayan Darma Putra', '', 'Jl. Raya Legian No. 494 Link. Legian Kaja', '0811111', '2024-04-01', 6, 11, 13, 1),
(322, 'I Made Darma Yasa', '', 'Jl. Legian No. 494 L. Kaja', '081999197426', '2024-04-01', 6, 3, 13, 1),
(323, 'Made Ayu Eliati', '', 'Jl. Padma Utara No. 5, Legian Tengah', '081337302411', '2024-04-01', 6, 2, 13, 1),
(324, 'I Kadek Didik Wibawa', '', 'Jl. Legian Gg. Kresna No. 1', '081337302411', '2024-04-01', 6, 1, 13, 1),
(325, 'I Wayan Juri ', '', 'Jl. Legian Kaja No. 444, Legian Kaja', '0811111', '2024-04-01', 7, 3, 1, 1),
(326, 'I KadekDodi Putrawan', '', 'Jl. Legian Kaja No. 492, Legian Kaja', '0811111', '2024-04-01', 7, 2, 1, 1),
(327, 'Anak Agung Ngurah Setiadi, S.E.', '', 'Jl. Legian No. 423 Link Legian Tengah', '085237045976', '2024-04-01', 7, 11, 2, 1),
(328, 'A.A. Ngurah Bagus Cahyadi', '', 'Jl. Legian No. 423 Link Legian Tengah', '0811111', '2024-04-01', 7, 3, 2, 1),
(329, 'I Nyoman Juniada', '', 'Jl. Legian  Gg. Gita Semara No. 1', '0811111', '2024-04-01', 7, 2, 2, 1),
(330, 'Anak Agung Ngurah Junaedi', '', 'Jl. Legian No. 423 Link Legian Tengah', '0811111', '2024-04-01', 7, 1, 2, 1),
(331, 'I Nyoman Sukada ', '', 'Jl. Legian II Gg. IX No. 1, Link Legian Tengah', '0811111', '2024-04-01', 7, 3, 3, 1),
(332, 'I Ketut Adi Pariasa', '', 'Jl. Legian Tengah No. 433', '0811111', '2024-04-01', 7, 3, 5, 1),
(333, 'I Wayan Suweca', '', 'Jl. Legian Tengah Gg. Panca No. 11, Legian Tengah', '0811111', '2024-04-01', 7, 2, 5, 1),
(334, 'I Ketut Gede Hendrawan', '', 'Jl. Legian Legian Gg. Panca No.02, Link. Legian Tengah', '081999436524', '2024-04-01', 7, 1, 5, 1),
(335, 'I Wayan SutaWijaya', '', 'Lingk. Legian Tengah', '8123948707', '2024-04-01', 7, 11, 6, 1),
(336, 'A.A. Made Agung Dwi Anggreni, S.Kom.', '', 'Jl. Legian No. 437, Legian', '081238707510', '2024-04-01', 7, 3, 6, 1),
(337, 'I Wayan Widarsa', '', 'Lebak Bena Gg. Senen', '081999388482', '2024-04-01', 7, 2, 6, 1),
(338, 'Wayan Agus Erika', '', 'Lingk. Legian Tengah', '081246868168', '2024-04-01', 7, 11, 7, 1),
(339, 'I Nyoman Suarnata', '', 'Jl. Padma Utara Gg. Abdi No. 9 Legian Tengah', '081936083546', '2024-04-01', 7, 3, 7, 1),
(340, 'I Nyoman Sudarka, S.S.', '', 'Br. Legian Tengah', '0811111', '2024-04-01', 7, 2, 7, 1),
(341, 'I Wayan Swetha', '', 'Link. Legian Tengah ', '0811111', '2024-04-01', 7, 3, 8, 1),
(342, 'I Komang Ariawan', '', 'Jl. Padma Timur No. 2 Legian Kelod', '0811111', '2024-04-01', 7, 2, 8, 1),
(343, 'I Nyoman Mudayasa', '', 'Jl. Sriwijaya Gg. Dharma Kerti Link Legian Kelod', '081933112174', '2024-04-01', 7, 1, 8, 1),
(344, 'I Made Parila', '', 'Lingk. Legian Tengah', '81236017671', '2024-04-01', 7, 3, 9, 1),
(345, 'Irfan', '', 'Jl. Patih Jelantik No. 227Link. Legian Kelod', '0811111', '2024-04-01', 7, 2, 9, 1),
(346, 'I Nengah Budayasa', '', 'Jl. Padma Timur Gg. Beji No. 7B', '0811111', '2024-04-01', 7, 3, 10, 1),
(347, 'I Nengah Sunarta', '', 'Lingk. Legian Tengah', '08123626901', '2024-04-01', 7, 2, 10, 1),
(348, 'I Wayan Sukanadi', '', 'Br. Legian Kelod Gg. Panti No. 6', '087860011758', '2024-04-01', 7, 3, 11, 1),
(349, 'I Wayan Adi Yasa', '', 'Br. Legian Kelod Gg. Panti No. 6', '087860011758', '2024-04-01', 7, 2, 11, 1),
(350, 'A.A. Putu Gede Sutamba', '', 'Legian Tengah 435', '0811111', '2024-04-01', 8, 11, 1, 1),
(351, 'I Ketut Sudiarta ', '', 'Link. Legian Tengah', '082147003583', '2024-04-01', 8, 3, 1, 1),
(352, 'I Wayan Merta', '', 'Lingk. Legian Tengah', '08174752700', '2024-04-01', 8, 2, 1, 1),
(353, 'I Wayan Wira Adi Putra', '', 'Jl. Raya Legian No. 416, Link. Legian Tengah', '081805337776', '2024-04-01', 8, 11, 2, 1),
(354, 'I Nengah Karwija', '', 'Jl. Padma Utara Gg. I No. 05, Link. Legian Tengah', '0811111', '2024-04-01', 8, 3, 2, 1),
(355, 'I Wayan Hendra Sumarjana, S.T', '', 'JL. Padma Utara Gg. I No. 3', '82145322359', '2024-04-01', 8, 2, 2, 1),
(356, 'I Nyoman Yasa', '', 'Lingk. Legian Tengah', '0811399259', '2024-04-01', 8, 3, 3, 1),
(357, 'I Ketut Witarsa', '', 'Lingk. Legian Tengah', '081338488731', '2024-04-01', 8, 2, 3, 1),
(358, 'I Nyoman Wirawan', '', 'Lingk. Legian Tengah', '0811111', '2024-04-01', 8, 1, 3, 1),
(359, 'A.A. Ketut Suaja', '', 'Jl. Legian 435, Lingk. Legian Tengah', '081805371543', '2024-04-01', 8, 11, 4, 1),
(360, 'A.A. Putu Bagus Karnawan', '', 'Br. Legian Tengah', '0811111', '2024-04-01', 8, 3, 4, 1),
(361, 'Anak Agung Oka Wirama, SH.', '', 'Br. Legian Tengah', '0811111', '2024-04-01', 8, 2, 4, 1),
(362, 'I Gusti Agung Gede Juliartha', '', 'Lingk. Legian Tengah', '081999775556', '2024-04-01', 8, 3, 5, 1),
(363, 'I Wayan Martha Anggadi Putra', '', 'Link. Legian Tengah', '0811111', '2024-04-01', 8, 3, 6, 1),
(364, 'I Made Arianta', '', 'Jl. Legian Gg. Arjuna No. 1', '082266217878', '2024-04-01', 8, 2, 6, 1),
(365, 'I Ketut Sukada', '', 'Jl. Legian 409, Lingk. Legian Tengah', '08123959509', '2024-04-01', 8, 3, 7, 1),
(366, 'A.A. Made Manik Jayadi', '', 'Lingk. Legian Tengah', '087861836810', '2024-04-01', 8, 2, 7, 1),
(367, 'A.A. Made Oka Suyadnya', '', 'Jl. Padma, Legian Tengah', '081239921645', '2024-04-01', 8, 1, 7, 1),
(368, 'I Made Mahesa Wahyuda', '', 'Jl. Padma No. 1 Lingk. Legian Tengah', '085738063409', '2024-04-01', 8, 3, 8, 1),
(369, 'I Wayan Sukadana', '', 'Lingk. Legian Tengah', '081246667774', '2024-04-01', 8, 2, 8, 1),
(370, 'I Wayan Dedy Susila', '', 'Jl. Padma Timur, Lingk. Legian Tengah', '081935188101', '2024-04-01', 8, 1, 8, 1),
(371, 'A.A. Ketut Adi Putra', '', 'Jl. Padma No. 51, L. Tgh', '081237595932', '2024-04-01', 8, 11, 9, 1),
(372, 'I Wayan Angga Prawira', '', 'Br. Legian Tengah No.430 Gg. Panca No. 1', '0811111', '2024-04-01', 8, 3, 9, 1),
(373, 'I Gusti Ketut Rai Yogi', '', 'Jl. Legian 420, Lingk. Legian Tengah', '081246906950', '2024-04-01', 8, 2, 9, 1),
(374, 'I Gusti Made Raka Yasa', '', 'Lingk. Legian Tengah', '0811111', '2024-04-01', 8, 11, 10, 1),
(375, 'I Gusti Ketut Bagus Merta', '', 'Br. Legian Tengah', '0811111', '2024-04-01', 8, 3, 10, 1),
(376, 'I Nyoman Suwija', '', 'Lingk. Legian Tengah', '0811111', '2024-04-01', 8, 2, 10, 1),
(377, 'Drs. I Gusti Gede Suanda, M.Par.', '', 'Lingk. Legian Tengah', '0811111', '2024-04-01', 8, 11, 11, 1),
(378, 'I Wayan Sunadi', '', 'Lingk. Legian Tengah', '0811111', '2024-04-01', 8, 3, 11, 1),
(379, 'I Wayan Sumber', '', 'Lingk. Legian Tengah', '081238300900', '2024-04-01', 8, 1, 11, 1),
(380, 'I Kade Adi Sumariasa, SE.', '', 'Lingk. Legian Tengah', '0811111', '2024-04-01', 8, 11, 12, 1),
(381, 'I Gusti Made Agung Atmaja', '', 'Lingk. Legian Tengah', '0811111', '2024-04-01', 8, 3, 12, 1),
(382, 'I Nengah Buda Astawa', '', 'Lingk. Legian Tengah', '0811111', '2024-04-01', 8, 2, 12, 1),
(383, 'I Made Wibawa', '', 'Jl. Sahadewa Gg. VII No. 9, Link. Legian Kelod', '0811111', '2024-04-01', 8, 3, 13, 1),
(384, 'I Wayan Darsana', '', 'Jl. Legian No. 436', '085737021444', '2024-04-01', 8, 2, 13, 1),
(385, 'I Made Suandita', '', 'Jl. Lebak Bena Link. Legian Kelod', '0811111', '2024-04-01', 8, 1, 13, 1),
(386, 'I Made Nova Antara', '', 'Jl. Legian Gg. Anggrek No. 7, Br. Legian Kelod', '0811111', '2024-04-01', 8, 3, 14, 1),
(387, 'I Nyoman Agus Adnya Winaya', '', 'Jl. Padma Legian Tengah', '087861772168', '2024-04-01', 8, 2, 14, 1),
(388, 'A.A. Made Mahendra', '', 'Jl. Padma No. 51', '085338460053', '2024-04-01', 8, 3, 15, 1),
(389, 'I Komang Tris Narmada', '', 'Jl. Legian Raya Legian Gg. Anggrek 5, Legian Kelod', '08236653422', '2024-04-01', 8, 2, 15, 1),
(390, 'I Wayan Sukarja', '', 'Link. Legian Tengah', '0811111', '2024-04-01', 8, 11, 16, 1),
(391, 'I Nengah Kasim', '', 'Link. Legian Tengah', '0811111', '2024-04-01', 8, 3, 16, 1),
(392, 'I Nyoman Sumastra', '', 'Jl. Legian Gg. Githa Semara No. 02, L. Tgh', '081933001812', '2024-04-01', 8, 3, 17, 1),
(393, 'I Nengah Astawa', '', 'Jl. Legian Gg. Githa Semara No. 02, L. Tgh', '081237296233', '2024-04-01', 8, 1, 18, 1),
(394, 'I Kadek Ardiana', '', 'Jl. Legian Gg. Panti No. 4, Legian Kelod', '087830948129', '2024-04-01', 8, 3, 18, 1),
(395, 'I Made Suarthana', '', 'Br. Pekandelan Link. Legian Tengah', '081298535872', '2024-04-01', 8, 2, 18, 1),
(396, 'I Wayan Sumita', '', 'Link. Legian Tengah', '081999388782', '2024-04-01', 8, 3, 19, 1),
(397, 'I Wayan Wirtawan', '', 'Link. Legian Tengah', '081237302646', '2024-04-01', 8, 2, 19, 1),
(398, 'A.A. Ketut Setiawan', '', 'Jl. Raya Legian No. 435, Legian Tengah', '0811111', '2024-04-01', 8, 1, 19, 1),
(399, 'A.A. Putu Oka Wirawan, S.E.', '', 'Legian Tengah 435', '0811111', '2024-04-01', 8, 11, 20, 1),
(400, 'I Nengah Darga', '', 'Jl. Legian Tengah No. 433, L. Tgh', '0811111', '2024-04-01', 8, 3, 20, 1),
(401, 'I Nyoman Sukandi', '', 'Jl. Padma Utara Gg. Abdi No. 14, Link Legian Tengah', '', '2024-04-01', 8, 2, 20, 1),
(402, 'I Wayan Octa Bagaskara Artana', '', 'Jl. Legian Gg. Cempaka No. 4, Br. Legian Kelod', '081999280424', '2024-04-01', 8, 3, 21, 1),
(403, 'I Ketut Armita', '', 'Jl. Legian Kelod Gg. Anggrek No. 4, Link. Legian Kelod', '0811111', '2024-04-01', 8, 2, 21, 1),
(404, 'Ni Luh Nadi Risnawati', '', 'Link. Legian Tengah', '0811111', '2024-04-01', 8, 1, 21, 1),
(405, 'I Wayan Candra Adi Putra', '', 'Link. Legian Tengah', '0895351423234', '2024-04-01', 8, 3, 22, 1),
(406, 'I Wayan Metra', '', 'Jl. Legian Kelod Gg. Anggrek No. 4, Link. Legian Kelod', '081999280424', '2024-04-01', 8, 2, 22, 1),
(407, 'I Wayan Arnata ', '', 'Jl. Legian Gg. Anggrek No. 5, legian Kelod', '08123990038', '2024-04-01', 8, 1, 22, 1),
(408, 'Ni Made Sriyati', '', 'Jl. Padma Timur Gg. Buntu No. 3', '087860648405', '2024-04-01', 9, 3, 1, 1),
(409, 'I Made Adhi Andika', '', 'Jl. Padma Timur Gg. Beji No. 4', '081338799736', '2024-04-01', 9, 2, 1, 1),
(410, 'I Ketut Sudama', '', 'Jl. Legian gg. Anggrek No. 3A', '082145371434', '2024-04-01', 9, 3, 2, 1),
(411, 'I Wayan Agus Diantara', '', 'Jl. Batu Pageh No. 2', '0811111', '2024-04-01', 9, 2, 2, 1),
(412, 'I Nyoman Satria Mukti', '', 'Jl. Raya Legian No. 463', '0811111', '2024-04-01', 9, 1, 2, 1),
(413, 'Anak Agung Putu Rama', '', 'Jl. Legian Tengah', '0811111', '2024-04-01', 9, 3, 3, 1),
(414, 'I Wayan Adi', '', 'Jl. Legian Gg. Cempaka 387 No. 6, Legian Kelod', '087761664231', '2024-04-01', 9, 2, 3, 1),
(415, 'I Nyoman Adi', '', 'Jl. Legian Gg. Sadewa No. 3, Legian Tengah', '081936247879', '2024-04-01', 9, 3, 4, 1),
(416, 'I Made Dana', '', 'Jl. Batu Pageh Gg. Melati No. 5, Legian Kelod', '087862811318', '2024-04-01', 9, 2, 4, 1),
(417, 'I Made Artana', '', 'Jl. Padma Utara Gg. I No. 1 Legian Tengah', '081339349336', '2024-04-01', 9, 1, 4, 1),
(418, 'I Wayan Margi', '', 'Jl. Padma Timur No. 01, Legian Kelod', '081999079898', '2024-04-01', 9, 3, 5, 1),
(419, 'I Made Sudiantara', '', 'Jl. Batu Pageh Gg. Melati No. 1, Legian Kelod', '0811111', '2024-04-01', 9, 2, 5, 1),
(420, 'Agus Gede Adi Wirawan ', '', 'Jl. Raya Legian Gg. Arjuna, Legian Tengah', '081338771653', '2024-04-01', 9, 3, 6, 1),
(421, 'Drs. I Wayan Dapet', '', 'Jl. Sahadewa Gg. V No. 02, Legian Kelod', '081916341404', '2024-04-01', 9, 2, 6, 1),
(422, 'I Gusti Ngurah Gunadi', '', 'Jl. Raya Legian No. 439, legian Tengah', '0811111', '2024-04-01', 9, 11, 7, 1),
(423, 'Drs. I Gusti Putu Putra Jaya', '', 'Jl. Raya Legian No. 439, legian Tengah', '0811111', '2024-04-01', 9, 3, 7, 1),
(424, 'I Ketut Suamba', '', 'Jl. Raya Legian No. 409, Link. 409', '081339666808', '2024-04-01', 9, 3, 8, 1),
(425, 'I Kadek Cita Kumara', '', 'Br. Legian Tengah', '', '2024-04-01', 9, 2, 8, 1),
(426, 'I Wayan Selamet Sudiarta', '', 'Jl. Legian Gg. Anggrek, Legian Kelod', '081805670919', '2024-04-01', 9, 1, 8, 1),
(427, 'I Wayan Suanayasa', '', 'Jl. Sahadewa Gg. VIII No. 9, Legian Kelod', '085737111529', '2024-04-01', 9, 3, 9, 1),
(428, 'I Made Anggaresha Permana, S.E. ', '', 'Br. Legian Kelod', '0811111', '2024-04-01', 9, 2, 9, 1),
(429, 'I Kadek Sudarsana Darma Putra', '', 'Jl. Patih Jelantik, L. Kld', '0811111', '2024-04-01', 9, 3, 10, 1),
(430, 'I Wayan Okky Sanjaya', '', 'Jl. Padma Legian Kelod', '0811111', '2024-04-01', 9, 2, 10, 1),
(431, 'I Putu Surya Prabawa', '', 'Jl. Legian No. 390 Link. Legian Kelod', '0811111', '2024-04-01', 9, 1, 10, 1),
(432, 'I Wayan Wardana', '', 'Jl. Padma Timur No. 02, Link Legian Kelod ', '087760043385', '2024-04-01', 9, 3, 11, 1),
(433, 'I Made Stiven Kurniawan', '', 'Jl. Legian Gg. Anggrek, Legian Kelod', '', '2024-04-01', 9, 2, 11, 1),
(434, 'I Wayan Subada', '', 'Jl. P. Talang Gg. Ratna Sari', '081238060673', '2024-04-01', 9, 3, 12, 1),
(435, 'Ni Nyoman Partini', '', 'Jl. Legian Gg. Panti No. 02 Link. Legian Kelod', '082247136686', '2024-04-01', 9, 2, 12, 1),
(436, 'I Ketut Darmita', '', 'Jl. Sahadewa I, Nomor 2, Legian Kelod', '081238233385', '2024-04-01', 9, 3, 13, 1),
(437, 'Noviardi Tafsiri', '', 'Jl. Sahadewa Gg. I/ 2 Legian Kelod', '081238233385', '2024-04-01', 9, 2, 13, 1),
(438, 'I Nengah Madia', '', 'Jl. Sahadewa I, Nomor 2, Legian Kelod', '081337547050', '2024-04-01', 9, 1, 13, 1),
(439, 'I Nyoman Sutarsa', '', 'Jl. Batu Pageh Gg. Melati No. 4, Legian Kelod', '082266666169', '2024-04-01', 9, 12, 14, 1),
(440, 'I Nyoman Suparta ', '', 'Jl. Legian Gg. Anggrek, Legian Kelod', '081805670919', '2024-04-01', 9, 12, 15, 1),
(441, 'I Wayan Wirya', '', 'Link. Legian Tengah', '0811111', '2024-04-01', 9, 12, 16, 1),
(442, 'A.A. Ngr. Ade Dwipayana', '', 'Jl. Raya Legian No. 424', '0811111', '2024-04-01', 9, 12, 17, 1),
(443, 'I Nyoman Suwija', '', 'Jl. Legian Tengah No. 433, L. Tgh', '0811111', '2024-04-01', 9, 12, 18, 1),
(444, 'Agus Gede Ariwijaya', '', 'Jl. Padma Timur, L. Kelod', '', '2024-04-01', 10, 11, 1, 1),
(445, 'Ni Putu Indrayani', '', 'Jl. Melasti Link Legian Kelod ', '081353324925', '2024-04-01', 10, 2, 1, 1),
(446, 'I Dewa Putu Awantara', '', 'Link. Legian Kelod ', '081338811 774', '2024-04-01', 10, 11, 2, 1),
(447, 'A.A. Made Adi Kusuma Dewi', '', 'Link. Banjar Legian Tengah', '0811111', '2024-04-01', 10, 3, 2, 1),
(448, 'I Made Nondra', '', 'Jl. Sahadewa Legian Kld', '0811111', '2024-04-01', 10, 2, 2, 1),
(449, 'I Wayan Sudiarsana', '', 'Jl. Sriwijaya Gg. Kayu Manis II No. 4', '085339446070', '2024-04-01', 10, 3, 3, 1),
(450, 'I Nyoman Putra', '', 'Br. Legian Kelod', '081339719709', '2024-04-01', 10, 2, 3, 1),
(451, 'I Nyoman Sugiana', '', 'Legian', '0811111', '2024-04-01', 10, 3, 4, 1),
(452, 'I Wayan Warsa', '', 'Jl. Sriwijaya Gg. KayumanisII-1', '0811111', '2024-04-01', 10, 2, 4, 1),
(453, 'I Nyoman Jovi Sutisna Rena', '', 'Br. Legian Kelod', '081259509582', '2024-04-01', 10, 3, 5, 1),
(454, 'I Made Suandra', '', 'Jl. Sahadewa Gg. 2 No. 1 L. Kelod ', '0811111', '2024-04-01', 10, 2, 5, 1),
(455, 'Ni Luh Irma Surphaningsih', '', 'Jl. Pandawa No. 168, Dewi Sri, Lingk. Legian Kelod', '081338770076', '2024-04-01', 10, 1, 5, 1),
(456, 'I Wayan Kariana', '', 'Jl. Raya Legian Kelod', '085857488478', '2024-04-01', 10, 3, 6, 1),
(457, 'I Nyoman Sukadana, S.E.', '', 'Jl. Bunut Sari No. 18 Link. L. Kelod', '085792233664', '2024-04-01', 10, 2, 6, 1),
(458, 'Ni Ketut Ernawati ', '', 'Jl. Legian No. 404, L. Kelod', '0818563800', '2024-04-01', 10, 3, 7, 1),
(459, 'I Wayan Kondra, S.H.', '', 'Jl. Patih Jelantik, Legian ', '0811111', '2024-04-01', 10, 2, 7, 1),
(460, 'I Komang Karyana Antara', '', 'Jl. Legian No. 381', '', '2024-04-01', 10, 1, 7, 1),
(461, 'I Wayan Adi Winata', '', 'Br. Legian Kelod', '0811111', '2024-04-01', 10, 3, 8, 1),
(462, 'I Made Gunawan Eka Putra', '', 'Br. Legian Kelod', '81337231515', '2024-04-01', 10, 2, 8, 1),
(463, 'I Made Romi', '', 'Jl. Bunut Sari No. 8, L. Kelod', '081353588882', '2024-04-01', 10, 3, 9, 1),
(464, 'I Nengah Bendi', '', 'Jl. Legian Kelod Gg. Anggrek No.3B', '081236833812', '2024-04-01', 10, 2, 9, 1),
(465, 'I Wayan Dendi', '', 'Jl. Majapahit Gg.Nusa Indah No. 3A', '0811111', '2024-04-01', 10, 1, 9, 1),
(466, 'I Nengah Taksiana', '', 'Jl. Sahadewa Gg. VII No. 2, Link. Legian Kelod', '081337488811', '2024-04-01', 10, 3, 10, 1),
(467, 'I Made Sarmada', '', 'Jl. Legian Kelod', '081916450294', '2024-04-01', 10, 2, 10, 1),
(468, 'I Nyoman Sukanadi', '', 'Jl. Bunut Sari Gg. Janji Inn', '081999041588', '2024-04-01', 10, 3, 11, 1),
(469, 'I Wayan Monday', '', 'Jl. Melasti, Legian Kelod', '081805585965', '2024-04-01', 10, 2, 11, 1),
(470, 'I Wayan Yunata Eka Mahendra', '', 'Jl. Sahadewa No. 17 L. Kelod', '081805424050', '2024-04-01', 10, 1, 11, 1),
(471, 'I Made Adi Sukarsana', '', 'Lingk. Legian Kelod', '081805631693', '2024-04-01', 10, 3, 12, 1),
(472, 'I Ketut Subamia', '', 'Jl. Legian Gg. Panti No. 5B', '0817340324', '2024-04-01', 10, 2, 12, 1),
(473, 'I Putu Krisna Shistama', '', 'Jl. Batu Pageh No. 2 Br. L. Kelod', '0811111', '2024-04-01', 10, 1, 12, 1),
(474, 'I Nyoman Tanu', '', 'Jl. Legian Gg. Panti No 2', '081338551100', '2024-04-01', 10, 3, 13, 1),
(475, 'I Nengah Astawa', '', 'Jl. Legian No. 404, L. Kelod', '0811111', '2024-04-01', 10, 2, 13, 1),
(476, 'I Nengah Surya Dharma', '', 'Jl. Legian Kelod Gg. Anggrek No. 1', '081239379997', '2024-04-01', 10, 3, 14, 1),
(477, 'I Wayan Mendra', '', 'Jl. Sahadewa Gg. VII No. 1/ 7B', '081338582245', '2024-04-01', 10, 2, 14, 1),
(478, 'I Wayan Toni Indrawan', '', 'Jl. Sahadewa No. 15/ II L. Kelod', '0811111', '2024-04-01', 10, 1, 14, 1),
(479, 'I Wayan Suartika', '', 'Br. Legian Kelod', '081338563697', '2024-04-01', 10, 11, 15, 1),
(480, 'I Wayan Suka Winata', '', 'Jl. Raya Legian Gg. 5 No. 5, L. Kelod', '0811111', '2024-04-01', 10, 3, 15, 1),
(481, 'I Nengah Surna', '', 'Jl. Sriwijaya Gg. Kayumanis', '0811111', '2024-04-01', 10, 2, 15, 1),
(482, 'I Komang Artaguna', '', 'Jl. Sriwijaya Gg. Lestari No. 2B', '081934388122', '2024-04-01', 10, 3, 16, 1),
(483, 'I Wayan Cola Haryawan', '', 'Br. Legian Kelod', '081916526396', '2024-04-01', 10, 2, 16, 1),
(484, 'I Wayan Sudra', '', 'Jl. Legian No. 379, L. Kelod', '081805616278', '2024-04-01', 10, 3, 17, 1),
(485, 'I Made Hendra Adi Suputra', '', 'Jl. Mataram Gg. Gadung No. 3', '087337373333', '2024-04-01', 10, 2, 17, 1),
(486, 'I Nyoman Sudiana', '', 'Jl. Legian Gg. Legian Indah No. 3B', '081338766674', '2024-04-01', 10, 3, 18, 1),
(487, 'I Nyoman Warta', '', 'Jl. Legian Gg. Legian Indah No. 3', '0811111', '2024-04-01', 10, 2, 18, 1),
(488, 'I Ketut Lantara', '', 'Jl. Lebak Bena L. Kelod', '0811111', '2024-04-01', 10, 1, 18, 1),
(489, 'I Nyoman Mertayasa', '', 'Jl. Patih Jelantik, No. 55 L. Kelod', '082339004900', '2024-04-01', 10, 11, 19, 1),
(490, 'I Ketut Karda', '', 'Jl. Melasti Lebak Bene, L. Kelod', '087855490600', '2024-04-01', 10, 3, 19, 1),
(491, 'I Ketut Sudira', '', 'Br. Legian Kelod', '0811111', '2024-04-01', 10, 11, 20, 1),
(492, 'I Ketut Yasa', '', 'Jl. Patih Jelantik, L. Kelod', '085739213930', '2024-04-01', 10, 3, 20, 1),
(493, 'I Ketut Widiana', '', 'Jl. Legian Gg. Panti', '0811111', '2024-04-01', 10, 2, 20, 1),
(494, 'I Wayan Sudira', '', 'Jl. Sahadewa Gg. Dawan', '087854602155', '2024-04-01', 10, 0, 21, 1),
(495, 'I Wayan Sendra', '', 'Jl. Sahadewa Gg. Jatayu No. 9', '087800670932', '2024-04-01', 10, 2, 21, 1),
(496, 'I Wayan Sunadi', '', 'Jl. Legian Gg. Panti No. 7 B', '08123986875', '2024-04-01', 10, 3, 22, 1),
(497, 'I Made Sudana, SE.', '', 'Jl. Legian No. 396 L.Kelod ', '0811111', '2024-04-01', 10, 2, 22, 1),
(498, 'I Kadek Sutama', '', 'Jl. Lebak Bena, L. Kelod', '08123971801', '2024-04-01', 10, 1, 22, 1),
(499, 'Putu Roosevelt Goenamantha', '', 'Br. Legian Kelod', '0811111', '2024-04-01', 10, 11, 23, 1),
(500, 'I Wayan Adus', '', 'Jl. Lebak Bena', '081237474477', '2024-04-01', 10, 3, 23, 1),
(501, 'I Ketut Suparta', '', 'Br. Legian Kelod', '081337762903', '2024-04-01', 10, 2, 23, 1),
(502, 'A.A. Made Agung Ardana Parasu, S.T.', '', 'Jl. Legian No. 422', '081280676665', '2024-04-01', 10, 11, 24, 1),
(503, 'A.A. Ngurah Biron ', '', 'Jl. Three Brothers, L. Tgh', '081805613463', '2024-04-01', 10, 3, 24, 1),
(504, 'I Wayan Sukarja', '', 'Jl. Yudistira, Gg. Lange 8', '082146678730', '2024-04-01', 10, 2, 24, 1),
(505, 'Kadek Surya Satya Dana', '', 'Jl. Sahadewa 05, Br. Legian Kelod', '0811111', '2024-04-01', 10, 11, 25, 1),
(506, 'I Made Sunarta', '', 'Jl. Legian Gg. Legian Indah 1', '085237065512', '2024-04-01', 10, 2, 25, 1),
(507, 'I Made Ardiana', '', 'Jl. Sahadewa Gg. Dawan No. 9', '08123900850', '2024-04-01', 10, 1, 25, 1),
(508, 'I Wayan Aditya Dana', '', 'Jl. Mataram Gg. Gadung No. 10', '087860983938', '2024-04-01', 10, 3, 26, 1),
(509, 'I Nyoman Sarjana', '', 'Jl. Padma Timur No 3, L. Kelod ', '0811386589', '2024-04-01', 10, 2, 26, 1),
(510, 'I Made Bayu Suwendra', '', 'Br. Legian Kelod', '082190513554', '2024-04-01', 11, 3, 1, 1),
(511, 'I Wayan Wedra', '', 'Jl. Melasti Legian Kelod', '0811111', '2024-04-01', 11, 11, 2, 1),
(512, 'I Wayan  Sutapa, S.P.', '', 'Jl. Sriwijaya Gg. Lestari No. 5', '081338671524', '2024-04-01', 11, 3, 2, 1),
(513, 'I Wayan Berata', '', 'Jl. Majapahit Gg.Nusa Indah No.3A', '0811111', '2024-04-01', 11, 2, 2, 1),
(514, 'I Nyoman Karta ', '', 'Jl. Patih Jelantik, L. Kelod', '081805412759', '2024-04-01', 11, 1, 2, 1),
(515, 'I Komang Agus Surya Wardana', '', 'Jl. Sriwijaya Gg. Lestari No. 1', '087709356373', '2024-04-01', 11, 0, 3, 1),
(516, 'I Nyoman Dartu', '', 'Br. Legian Kelod ', '081703536112', '2024-04-01', 11, 2, 3, 1),
(517, 'I Wayan Widarma Putra Pramana', '', 'Jl. Bunut Sari. Jempiring No. 3', '085738355646', '2024-04-01', 11, 3, 4, 1),
(518, 'I Putu Pingky Andrea', '', 'Jl. Legian Gg. Anggrek No. 2 L. Kelod', '08174734511', '2024-04-01', 11, 2, 4, 1),
(519, 'I Nengah Warsana', '', 'Br. Legian Tengah', '0811111', '2024-04-01', 11, 1, 4, 1),
(520, 'I Putu Putra Adi S.S.', '', 'Jl. Legian Gg. Panti No. 7, L. Kelod ', '0817569065', '2024-04-01', 11, 11, 5, 1),
(521, 'I Komang Restuyasa', '', 'Jl. Sahadewa V No. 3 L. Kld.', '0817569065', '2024-04-01', 11, 3, 5, 1),
(522, 'Ni Ketut Sudiani', '', 'Jl. Legian Gg. Uluwatu', '0817569065', '2024-04-01', 11, 2, 5, 1),
(523, 'I Nyoman Sudarta', '', 'Jl. Lebak Bene. L. Kelod', '087855490600', '2024-04-01', 11, 3, 6, 1),
(524, 'I Wayan Sulendra ', '', 'Jl. Lebak Bena L. Kelod', '0811111', '2024-04-01', 11, 2, 6, 1),
(525, 'I Nengah Sumarta', '', 'Jl. Bunut Sari Sari, Gg. Pura Uluwatu', '081338332067', '2024-04-01', 11, 1, 6, 1),
(526, 'I Wayan Darmayasa', '', 'Jl. Yudhistira Gg. Puring No. 3 L. Kld', '087860154559', '2024-04-01', 11, 3, 7, 1),
(527, 'I Nyoman Suarta', '', 'Jl. Legian Gg. Sarinadi No. 2 L. kld', '0811111', '2024-04-01', 11, 2, 7, 1),
(528, 'I Made Putra Suarsana', '', 'Lingk. Legian Kelod', '085857788062', '2024-04-01', 11, 1, 7, 1),
(529, 'I Nengah Joni Artana', '', 'Br. Legian Kelod', '0811111', '2024-04-01', 11, 11, 8, 1),
(530, 'I Wayan Miasa', '', 'Jl. Yudhistira Gg. Puring No. 4', '0811111', '2024-04-01', 11, 3, 8, 1),
(531, 'I Made Patra Wardana ', '', 'Jl. Mataram Gg. Lestari No. 6', '0811111', '2024-04-01', 11, 2, 8, 1),
(532, 'I Nyoman Tulus ', '', 'Jl. Sriwijaya Gg. Dharma Kerti', '0811111', '2024-04-01', 11, 3, 9, 1),
(533, 'I Nengah Mertayasa', '', 'Br. Legian Kelod', '0811111', '2024-04-01', 11, 2, 9, 1),
(534, 'I Nengah Wirata', '', 'Jl. Bunut Sari Gg. Janji inn No.3', '0811111', '2024-04-01', 11, 1, 9, 1),
(535, 'I Made Adi Wiratama', '', 'Jl. Bunut Sari Gg. Sandat No. 1 Legian Kelod', '081246737332', '2024-04-01', 11, 3, 9, 1),
(536, 'I Ketut Suderta', '', 'Jl. Melasti, Legian Kld. ', '0811111', '2024-04-01', 11, 2, 10, 1),
(537, 'I Nengah Dupa', '', 'Jl. Melasti, Legian Kld. ', '0811111', '2024-04-01', 11, 1, 10, 1),
(538, 'I Wayan Herry Pratama', '', 'Br. Legian Kelod', '', '2024-04-01', 11, 3, 10, 1),
(539, 'Wayan Surya Adhi', '', 'Jl. Legian Gg. Panti No. 5, L. kelod', '081353101335', '2024-04-01', 11, 2, 11, 1),
(540, 'I Nyoman Budiyasa', '', 'Jl. Padma Gg. Beji No.8', '08124662016', '2024-04-01', 11, 1, 11, 1),
(541, 'I Made Ardita', '', 'Jl. Yudistira Gg. Puring', '085792019586', '2024-04-01', 11, 11, 12, 1),
(542, 'I Ketut Sumarta', '', 'Jl. Sriwijaya Gg. Kayu Manis', '0811111', '2024-04-01', 11, 1, 12, 1),
(543, 'I Nyoman Rai Supartha (Belum Buka)', '', 'Jl. Bunut Sari Gg. Janji No. 2', '0811111', '2024-04-01', 11, 2, 12, 1),
(544, 'I Nyoman Adi Wiranata', '', 'Jl. Sriwijaya Gg. Kayu Manis, No. 2', '0811111', '2024-04-01', 11, 3, 13, 1),
(545, 'I Nengah Warsa', '', 'Jl. Sriwijaya Gg. Kayu Manis, No. 2', '0811111', '2024-04-01', 11, 2, 13, 1),
(546, 'I Kadek Ari Sanjaya', '', 'Jl. Legian 379, L. Kelod', '0811111', '2024-04-01', 11, 1, 13, 1),
(547, 'I Wayan Resta', '', 'Jl. Sriwijaya Gg. Lestari No. 1', '0811111', '2024-04-01', 11, 3, 14, 1),
(548, 'I Wayan Candra Satria', '', 'Jl. Legian Gg. Anggrek, L. Kld', '087860007502', '2024-04-01', 11, 2, 14, 1),
(549, 'I Made Candra Buana', '', 'Jl. Bunut Gg. Sekar Sari 2,L. Kelod', '08123835996', '2024-04-01', 11, 1, 14, 1),
(550, 'I Wayan Ganesha', '', 'Lingk. Legian Kelod', '0818354746', '2024-04-01', 11, 11, 15, 1),
(551, 'I Ketut Letos Asmara', '', 'Jl. Pura Batan Aa No. 05, L. kelod', '081339608899', '2024-04-01', 11, 3, 15, 1),
(552, 'I Ketut Sorna', '', 'Br.Legian Kelod', '0811111', '2024-04-01', 11, 2, 16, 1),
(553, 'I Made Alit Astika Wibawa', '', 'Jl. Legian Gg. Panti No. 7 B, Legian Kelod', '0811111', '2024-04-01', 11, 3, 16, 1),
(554, 'Komang Jon Mustiada', '', 'Jl. Uluwatu', '081916711101', '2024-04-01', 11, 2, 16, 1),
(555, 'I Ketut Mendra Ady', '', 'Lingk. Legian Kelod', '085935399333', '2024-04-01', 11, 1, 16, 1),
(556, 'I Gede Esha Putra Setiawan', '', 'Lingk. Legian Kelod', '081339134282', '2024-04-01', 11, 11, 17, 1),
(557, 'I Kadek Wowo Yosana', '', 'Br. Legian Kelod', '08786058660', '2024-04-01', 11, 3, 17, 1),
(558, 'I Wayan Duta, SH.', '', 'Lingk. Legian Kelod', '0811111', '2024-04-01', 11, 2, 17, 1),
(559, 'Kadek Sudiarta, SE.', '', 'Lingk. Legian Kelod', '08992064864', '2024-04-01', 11, 1, 17, 1),
(560, 'Ni Ketut Nadi Cici Andika', '', 'Br. Legian Kelod ', '0811111', '2024-04-01', 11, 11, 18, 1),
(561, 'I Nengah Suraja, S.E.', '', 'Jl. Sahadewa Legian Kelod', '0811111', '2024-04-01', 11, 3, 18, 1),
(562, 'I Made Widnyana Atmaja Pramana', '', 'Jl. Bunut Sari. Jempiring No. 3', '085101749532', '2024-04-01', 11, 2, 18, 1),
(563, 'I Made Rama Pradnyana Usadi', '', 'Jl. Bunut Sari Gg. Janji Inn No. 4', '0811111', '2024-04-01', 11, 1, 18, 1),
(564, 'I Nyoman Adi Wiarsa', '', 'Jl. Legian gg. Panti No. 02, L. Kelod', '08124666563', '2024-04-01', 11, 11, 19, 1),
(565, 'I Ketut Adi Strada', '', 'Br. Legian Kelod', '087861688788', '2024-04-01', 11, 3, 19, 1),
(566, 'I Wayan Agus Ambar Awan', '', 'Jl. Lebak Bene. Link Legian', '0811111', '2024-04-01', 11, 2, 19, 1),
(567, 'I Komang Haris Sanjaya', '', 'Jl. Raya Legian No. 3 L. Kelod', '081353300114', '2024-04-01', 11, 1, 19, 1),
(568, 'A.A. Ngr. Ketut Agung Wardana S.E.', '', 'Jl. Sahadewa No. 21, Legian Kelod', '081934373318', '2024-04-01', 11, 3, 20, 1),
(569, 'I Nyoman Darmada ', '', 'Jl. Sahadewa Gg. W, No. 3, Legian Kelod', '081237877301', '2024-04-01', 11, 2, 20, 1),
(570, 'I Nyoman Sumanata', '', 'Jl. Sahadewa Gg. 15, No. 4, Legian Kelod', '08179750310', '2024-04-01', 11, 1, 20, 1),
(571, 'I Kadek Citarsa', '', 'Jl. Bunut Sari No. 17, L. Kelod', '0811111', '2024-04-01', 12, 3, 1, 1),
(572, 'I Gede Muda Eka Pratama ', '', 'Jl. Raya Legian Gg. Panti No. 8', '0811111', '2024-04-01', 12, 2, 1, 1),
(573, 'I Nyoman Nantara', '', 'Jl. Bunut Sari No. 17, L. Kelod', '0811111', '2024-04-01', 12, 1, 1, 1),
(574, 'I Wayan Sukrayasa', '', 'Jl. Bunut Sari No. 8, L. Kelod', '082247512446', '2024-04-01', 12, 11, 2, 1),
(575, 'I Wayan Sutrisnayasa', '', 'Jl. Bunut Sari Gg Sandat No. 1, L. Kelod', '081805402234', '2024-04-01', 12, 3, 3, 1),
(576, 'I Ketut Pariasa', '', 'Jl. Mataram, Gg. Gadung', '08124662016', '2024-04-01', 12, 3, 3, 1),
(577, 'I Made Rai Sucipta', '', 'Br. Legian Kelod Gg.Adus No.3', '082147218030', '2024-04-01', 12, 2, 3, 1),
(578, 'I Made Suwitra', '', 'Jl. Camplung Mas Gg.Adus No.3', '0811111', '2024-04-01', 12, 1, 3, 1),
(579, 'I Wayan Janji', '', 'Gg. Janji Inn, L. Kelod', '0811111', '2024-04-01', 12, 11, 4, 1);
INSERT INTO `t_kartu` (`id`, `nama_pemilik`, `nomor_kartu`, `alamat_kartu`, `nomor_telp`, `join_date`, `id_wilayah`, `id_jenis_dagangan`, `id_blok`, `aktif`) VALUES
(580, 'I Ketut Mustika', '', 'Jl. Legian 387 No. 1, L. Kelod', '085935098305', '2024-04-01', 12, 1, 4, 1),
(581, 'I Nyoman Agus Setiawan', '', 'Jl. Legian Gg. Panti No. 2', '082146406635', '2024-04-01', 12, 3, 5, 1),
(582, 'I Nyoman Selamet', '', 'Jl. Sahadewa Gg.IX No.13 A', '081916136395', '2024-04-01', 12, 2, 5, 1),
(583, 'I Nyoman Putra', '', 'Jl. Sriwijaya Gg. Lestari No. 8', '0811111', '2024-04-01', 12, 3, 6, 1),
(584, 'I Wayan Sudiasa', '', 'Jl. Sriwijaya Gg. Lestari No. 7', '0811111', '2024-04-01', 12, 2, 6, 1),
(585, 'I Made Wira Atmaja', '', 'Jl. Lebak Bena L. Kelod', '0811111', '2024-04-01', 12, 3, 7, 1),
(586, 'I Nyoman Bayu Yogi Suparta', '', 'Jl. Sriwijaya Gg. Kayu Manis', '0815587933', '2024-04-01', 12, 1, 6, 1),
(587, 'I Nyoman Kariana Artana ', '', 'Br. Legian Kelod', '0811111', '2024-04-01', 12, 2, 7, 1),
(588, 'I Made Yasa Mulyadhi', '', 'Jl. Lebak Bene L. Kelod', '081237463110', '2024-04-01', 12, 3, 8, 1),
(589, 'Ni Wayan Sulatri', '', 'Jl. Legian No. 396, L. Kelod', '0811111', '2024-04-01', 12, 2, 8, 1),
(590, 'I Wayan Yoga Sanjaya', '', 'Jl. Lebak Bene L. Kelod', '087861783321', '2024-04-01', 12, 1, 8, 1),
(591, 'I Made Tirta', '', 'Jl. Sriwijaya Gg. Lestari ', '0811111', '2024-04-01', 12, 11, 9, 1),
(592, 'I Kadek Pardita ', '', 'Jl. Legian No. 436', '081916134660', '2024-04-01', 12, 3, 9, 1),
(593, 'I Ketut Herman', '', 'Br. Legian Kelod', '087860183908', '2024-04-01', 12, 2, 9, 1),
(594, 'I Nyoman Parta Adi', '', 'Jl. Legian No. 396, L. Kelod', '085738995566', '2024-04-01', 12, 1, 9, 1),
(595, 'I Wayan Suartana', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 12, 11, 10, 1),
(596, 'I Kadek Astawa', '', 'Br. Legian Kaja', '0811111', '2024-04-01', 12, 3, 10, 1),
(597, 'I Ketut Toniyasa', '', 'Jl. Legian Gg. Panca L. Kld', '087861783321', '2024-04-01', 12, 2, 10, 1),
(598, 'I Nyoman Nyampet', '', 'Jl. Batu Pageh No. 2, L. Kelod', '0811111', '2024-04-01', 12, 1, 10, 1),
(599, 'I Wayan Uchi Artana', '', 'Jl. Raya Legian Kelod', '087862193073', '2024-04-01', 12, 11, 11, 1),
(600, 'I Kadek Sudarta', '', 'Jl. Legian Kelod', '0811111', '2024-04-01', 12, 3, 11, 1),
(601, 'I Wayan Gede Jayasya Arthama', '', 'Jl. Legian No. 436', '081916134660', '2024-04-01', 12, 2, 11, 1),
(602, 'Ni Nyoman Sulasih', '', 'Jl. Sriwijaya Gg.Lestari No.9', '0811111', '2024-04-01', 12, 11, 12, 1),
(603, 'I Kadek Dwi Apriliana Esa P.', '', 'Jl. Batu Pageh Gg. Lestari No. 3', '087761375973', '2024-04-01', 12, 3, 12, 1),
(604, 'I Nyoman Windu', '', 'Jl. Sriwijaya Gg. Lestari No. 9', '85935194322', '2024-04-01', 12, 2, 12, 1),
(605, 'I Putu Adi Purwa Sedana', '', 'Jl. Sriwijaya Gg. Lestari No. 9', '081805680074', '2024-04-01', 12, 1, 12, 1),
(606, 'I Ketut Suardana', '', 'Lingk. Legian Kelod', '081338370990', '2024-04-01', 12, 3, 13, 1),
(607, 'I Nyoman Dandra', '', 'Jl. Sri Kresna, Lingk. Legian Kelod', '081338999566', '2024-04-01', 12, 2, 13, 1),
(608, ' I Ketut Suarna', '', 'Jl. Lebak Bena, L. Kelod', '0811111', '2024-04-01', 12, 3, 14, 1),
(609, 'I Nyoman Sudi Darmadi', '', 'JL. Legian Gg. Panti No. 3', '0818352327', '2024-04-01', 12, 2, 14, 1),
(610, 'I Wayan Ariasa', '', 'Jl. Legian Gg. Indah No. 01, L. Kelod', '085238194523', '2024-04-01', 12, 1, 14, 1),
(611, 'I wayan Lloyd Gunawan', '', 'Jl. Sahadewa Gg. Dawan', '0811111', '2024-04-01', 12, 11, 15, 1),
(612, 'Kadek Adi William', '', 'Jl. Sahadewa', '081805631771', '2024-04-01', 12, 3, 15, 1),
(613, 'I Wayan Satria Prayuda', '', 'Lingk. Legian Kelod', '081916220321', '2024-04-01', 12, 2, 15, 1),
(614, 'I Wayan Bawa', '', 'Jl. Legian Tengah 430', '0811111', '2024-04-01', 12, 11, 16, 1),
(615, 'I Ketut Sumarna, S.E.', '', 'Jl. Melasti L.Kelod', '087761407414', '2024-04-01', 12, 3, 16, 1),
(616, 'I Kadek Chandra Sudhayasa', '', 'Jl. Melasti L. Kelod', '087761407414', '2024-04-01', 12, 2, 16, 1),
(617, 'I Wayan Darmawan', '', 'Jl. Lebak Bena, L. Kelod', '085857134446', '2024-04-01', 12, 1, 16, 1),
(618, 'LONTONG', '0618/IX-100/SK/2024', 'Legian', '08111111', '2020-04-01', 12, 1, 100, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pedagang`
--

CREATE TABLE `t_pedagang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `nama_pedagang` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `join_date` date NOT NULL,
  `id_jenis_dagangan` int(11) NOT NULL DEFAULT 0,
  `id_extra_charge` int(10) UNSIGNED NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_pedagang`
--

INSERT INTO `t_pedagang` (`id`, `nomor`, `id_wilayah`, `nama_pedagang`, `no_hp`, `join_date`, `id_jenis_dagangan`, `id_extra_charge`, `aktif`) VALUES
(2000, '', 4, 'Muhamad Tohri', '087761830049', '2024-04-01', 13, 3, 1),
(2001, '', 4, 'Eko Prasetyo', '081239059520', '2024-04-01', 13, 3, 1),
(2002, '', 4, 'Abdul Safei', '085828134520', '2024-04-01', 13, 3, 1),
(2003, '', 4, 'Siswanto', '083115693856', '2024-04-01', 13, 3, 1),
(2004, '', 4, 'Ni Luh Cening Ratna ', '0811111', '2024-04-01', 14, 3, 1),
(2005, '', 4, 'Ni Nyoman Rani', '0811111', '2024-04-01', 14, 3, 1),
(2006, '', 4, 'Ni Ketut Rupini', '085797332917', '2024-04-01', 14, 3, 1),
(2007, '', 4, 'Ni Luh Ayu Astiti', '085868500378', '2024-04-01', 14, 3, 1),
(2008, '', 4, 'Ni Ketut Asih', '087795273670', '2024-04-01', 14, 3, 1),
(2009, '', 4, 'Ni Made Sukaluih', '087866741263', '2024-04-01', 14, 3, 1),
(2010, '', 4, 'Ni Wayan Werni', '087860240585', '2024-04-01', 14, 3, 1),
(2011, '', 4, 'Ni Luh Putu Siti Ariani', '085237881106', '2024-04-01', 14, 3, 1),
(2012, '', 4, 'Ni Nyoman Lusin', '081339064515', '2024-04-01', 14, 3, 1),
(2013, '', 4, 'Ni Ketut Saplug ', '0811111', '2024-04-01', 14, 4, 1),
(2014, '', 4, 'Ni Nengah Kiper', '0811111', '2024-04-01', 14, 4, 1),
(2015, '', 4, 'Ni Wayan Nyoki', '0811111', '2024-04-01', 14, 4, 1),
(2016, '', 4, 'Ni Wayan Patra', '0811111', '2024-04-01', 14, 4, 1),
(2017, '', 4, 'Ni Nengah Rangin', '0811111', '2024-04-01', 14, 4, 1),
(2018, '', 4, 'Ni Made Srinadi', '0811111', '2024-04-01', 14, 4, 1),
(2019, '', 4, 'Ni Nengah Catri ', '0811111', '2024-04-01', 14, 4, 1),
(2020, '', 4, 'Ni Made Wini', '081907447365', '2024-04-01', 15, 3, 1),
(2021, '', 4, 'Ni Nyoman Redani', '08179726809', '2024-04-01', 15, 3, 1),
(2022, '', 4, 'Ni Wayan Sukanti', '087862126438', '2024-04-01', 15, 3, 1),
(2023, '', 4, 'Ni Nengah Wadri', '085858862551', '2024-04-01', 15, 3, 1),
(2024, '', 4, 'I Nyoman Sutawa', '085337034201', '2024-04-01', 16, 3, 1),
(2025, '', 4, 'Ni Wayan Aget', '081937605393', '2024-04-01', 18, 3, 1),
(2026, '', 4, 'I Made Ageng', '081237802285', '2024-04-01', 18, 3, 1),
(2027, '', 4, 'Khaerul Anwar', '081999412787', '2024-04-01', 20, 3, 1),
(2028, '', 4, 'Moh. Abdul Aziz', '083139043810', '2024-04-01', 19, 3, 1),
(2029, '', 4, 'Ahmad Safei', '087753417489', '2024-04-01', 21, 3, 1),
(2030, '', 4, 'Darussalam', '081337814666', '2024-04-01', 21, 3, 1),
(2031, '', 4, 'NI Nengah Areni', '085338289833', '2024-04-01', 21, 3, 1),
(2032, '', 4, 'Ni Made Purniati', '081805600867', '2024-04-01', 21, 3, 1),
(2033, '', 4, 'Ni Luh Karning', '087861629464', '2024-04-01', 21, 3, 1),
(2034, '', 4, 'Ni Made Astuti', '081999416722', '2024-04-01', 21, 3, 1),
(2035, '', 4, 'Agus Amin', '085333284246', '2024-04-01', 21, 3, 1),
(2036, '', 4, 'Nawar', '087860575653', '2024-04-01', 21, 3, 1),
(2037, '', 4, 'Rasuli', '081999056678', '2024-04-01', 21, 3, 1),
(2038, '', 4, 'Rizal ', '085775646932', '2024-04-01', 21, 3, 1),
(2039, '', 4, 'Sahabuddin', '081238915054', '2024-04-01', 21, 3, 1),
(2040, '', 4, 'Saleh', '085204303605', '2024-04-01', 21, 3, 1),
(2041, '', 4, 'Arif Suhadi', '085338011150', '2024-04-01', 21, 3, 1),
(2042, '', 4, 'Jailani', '085748772416', '2024-04-01', 21, 3, 1),
(2043, '', 4, 'Mahmudi', '087861644841', '2024-04-01', 21, 3, 1),
(2044, '', 4, 'Mujemal', '081936165233', '2024-04-01', 21, 3, 1),
(2045, '', 4, 'Firka', '0811111', '2024-04-01', 21, 3, 1),
(2046, '', 4, 'I Nengah Wijana', '085857608030', '2024-04-01', 21, 3, 1),
(2047, '', 4, 'Rachman Yuni Achadi', '081338768695', '2024-04-01', 21, 3, 1),
(2048, '', 4, 'I Wayan Tarma', '082147541400', '2024-04-01', 21, 3, 1),
(2049, '', 4, 'Junaidi', '081337569166', '2024-04-01', 21, 3, 1),
(2050, '', 4, 'Darwin', '085237272596', '2024-04-01', 21, 3, 1),
(2051, '', 4, 'Ni Wayan Wartini', '087861902138', '2024-04-01', 21, 3, 1),
(2052, '', 4, 'Matrasul', '08179753096', '2024-04-01', 21, 3, 1),
(2053, '', 4, 'I Nengah Subandri', '081338426291', '2024-04-01', 21, 3, 1),
(2054, '', 4, 'Ni Ketut Rioni', '082146215400', '2024-04-01', 21, 3, 1),
(2055, '', 4, 'Nyoman Supar', '087843936962', '2024-04-01', 21, 3, 1),
(2056, '', 4, 'Subairi', '081353259850', '2024-04-01', 21, 3, 1),
(2057, '', 4, 'Basri', '081999917234', '2024-04-01', 21, 3, 1),
(2058, '', 4, 'Irham', '087861306751', '2024-04-01', 21, 3, 1),
(2059, '', 4, 'Ni Ketut Carem', '085926438562', '2024-04-01', 21, 3, 1),
(2060, '', 4, 'Saiful Rizal', '082341637154', '2024-04-01', 21, 3, 1),
(2061, '', 4, 'Saprin Ade', '081803681104', '2024-04-01', 21, 3, 1),
(2062, '', 4, 'Muhammad', '87716951458', '2024-04-01', 21, 3, 1),
(2063, '', 4, 'Ni Luh Suartini', '0811111', '2024-04-01', 21, 3, 1),
(2064, '', 4, 'I Ketut Berata', '081239653962', '2024-04-01', 21, 3, 1),
(2065, '', 4, 'Luh De Ita Purnamaningsih', '082146150646', '2024-04-01', 21, 3, 1),
(2066, '', 4, 'Ni Kadek Ditayani', '087855182824', '2024-04-01', 21, 3, 1),
(2067, '', 4, 'Ni Kadek Martini', '081936529033', '2024-04-01', 21, 3, 1),
(2068, '', 4, 'Ni Nengah Wartiyasih', '089675835888', '2024-04-01', 21, 3, 1),
(2069, '', 4, 'Ni Nyoman Wardani', '082237129653', '2024-04-01', 21, 3, 1),
(2070, '', 4, 'Ni Wayan Dapet', '089675836888', '2024-04-01', 21, 3, 1),
(2071, '', 4, 'Ni Wayan Yasmini', '087862811035', '2024-04-01', 21, 3, 1),
(2072, '', 4, 'Ni Gusti Made Erni', '085737069452', '2024-04-01', 21, 3, 1),
(2073, '', 4, 'I Wayan Budayana', '085738768921', '2024-04-01', 21, 3, 1),
(2074, '', 4, 'Ali Mufi', '089340615427', '2024-04-01', 21, 3, 1),
(2075, '', 4, 'Radiansyah', '082341209810', '2024-04-01', 21, 3, 1),
(2076, '', 4, 'Sainul Rasid', '0881037889303', '2024-04-01', 21, 3, 1),
(2077, '', 4, 'Ketut Gumbreg ', '081936072352', '2024-04-01', 21, 3, 1),
(2078, '', 4, 'Wasit', '081357575616', '2024-04-01', 21, 3, 1),
(2079, '', 4, 'Hamdan', '081997966480', '2024-04-01', 21, 3, 1),
(2080, '', 4, 'Supriadi ', '087716305329', '2024-04-01', 21, 3, 1),
(2081, '', 4, 'Ni Wayan Kantim', '087797871072', '2024-04-01', 21, 3, 1),
(2082, '', 4, 'I Nengah Yarmawa', '087872338429', '2024-04-01', 22, 3, 1),
(2083, '', 4, 'Misgianto', '083856223100', '2024-04-01', 21, 3, 1),
(2084, '', 5, 'I Ketut Tegteg', '0811111', '2024-04-01', 16, 3, 1),
(2085, '', 5, 'Ni Made Roti', '087761316469', '2024-04-01', 14, 3, 1),
(2086, '', 5, 'Ni Nyoman Sampir', '087860174234', '2024-04-01', 14, 3, 1),
(2087, '', 5, 'Ni Wayan Sepiani', '081237799544', '2024-04-01', 14, 3, 1),
(2088, '', 5, 'Ni Ketut Martini', '085792932557', '2024-04-01', 14, 3, 1),
(2089, '', 5, 'Ni Kadek Suartini', '085737069815', '2024-04-01', 14, 3, 1),
(2090, '', 5, 'Ni Nyoman Watis', '087816389854', '2024-04-01', 14, 3, 1),
(2091, '', 5, 'Ni Putu Sucitra Wati', '081999671387', '2024-04-01', 14, 3, 1),
(2092, '', 5, 'Ni Nyoman Dami', '0811111', '2024-04-01', 14, 4, 1),
(2093, '', 5, 'Najhan', '087755502443', '2024-04-01', 20, 3, 1),
(2094, '', 5, 'Arwi', '081237079643', '2024-04-01', 21, 3, 1),
(2095, '', 5, 'I Wayan Gede Pandita Satia Resi', '87852453008', '2024-04-01', 21, 3, 1),
(2096, '', 5, 'Sahri', '082144087393', '2024-04-01', 21, 3, 1),
(2097, '', 5, 'H. Mohamad Munip', '081338656752', '2024-04-01', 21, 3, 1),
(2098, '', 5, 'Agus Suryadi', '081917702772', '2024-04-01', 21, 3, 1),
(2099, '', 5, 'I Ketut Mertana', '08124694107', '2024-04-01', 21, 3, 1),
(2100, '', 5, 'Gek Ratih', '', '2024-04-01', 21, 3, 1),
(2101, '', 5, 'Ni Made Mulyani', '08990175665', '2024-04-01', 21, 3, 1),
(2102, '', 5, 'Ni Nyoman Sekariniasih', '081339154339', '2024-04-01', 21, 3, 1),
(2103, '', 5, 'Abd Rahman', '081338531734', '2024-04-01', 21, 3, 1),
(2104, '', 5, 'Dul Kadar', '087857054551', '2024-04-01', 21, 3, 1),
(2105, '', 5, 'Asmuni Arif', '081999451576', '2024-04-01', 21, 3, 1),
(2106, '', 5, 'Ridwan Syakur', '08124627578', '2024-04-01', 21, 3, 1),
(2107, '', 5, 'I Wayan Sumeda', '081338650884', '2024-04-01', 21, 3, 1),
(2108, '', 5, 'I Made Arsa', '0817356852', '2024-04-01', 21, 3, 1),
(2109, '', 5, 'Kadek Padmiwati', '0811111', '2024-04-01', 21, 3, 1),
(2110, '', 5, 'I Ketut Mastra', '0811111', '2024-04-01', 21, 3, 1),
(2111, '', 5, 'I Made Suningkat', '085737406029', '2024-04-01', 21, 3, 1),
(2112, '', 5, 'I Ketut Subagia', '081`79751296', '2024-04-01', 21, 3, 1),
(2113, '', 5, 'I Nyoman Mantra Jaya', '0895800015717', '2024-04-01', 21, 3, 1),
(2114, '', 5, 'Ni Wayan Suini', '087860043384', '2024-04-01', 21, 3, 1),
(2115, '', 5, 'Ni Luh Suastini', '08563900398', '2024-04-01', 21, 3, 1),
(2116, '', 5, 'I Ketut Sawan', '081337492571', '2024-04-01', 21, 3, 1),
(2117, '', 5, 'Ni Wayan Muliastini', '081338925774', '2024-04-01', 21, 3, 1),
(2118, '', 5, 'Ni Wayan Wartini', '082144212950', '2024-04-01', 21, 3, 1),
(2119, '', 5, 'Ni Nengah Sri Mundel', '081337496227', '2024-04-01', 21, 3, 1),
(2120, '', 5, 'Ni Nengah Santri', '081953356407', '2024-04-01', 21, 3, 1),
(2121, '', 5, 'Ridwan', '087861457358', '2024-04-01', 21, 3, 1),
(2122, '', 5, 'Ni Nengah Pulin', '081945159284', '2024-04-01', 21, 3, 1),
(2123, '', 5, 'Akmaluddin Syam', '087837726020', '2024-04-01', 21, 3, 1),
(2124, '', 5, 'Ni Made Resik', '082144719331', '2024-04-01', 21, 3, 1),
(2125, '', 5, 'Ni Nyoman Suarti', '082147603664', '2024-04-01', 21, 3, 1),
(2126, '', 5, 'Ni Nyoman Sarni', '081999560439', '2024-04-01', 21, 3, 1),
(2127, '', 5, 'Ni Ketut Listrik', '087863977234', '2024-04-01', 21, 3, 1),
(2128, '', 5, 'Ni Wayan Pulen', '087750592000', '2024-04-01', 21, 3, 1),
(2129, '', 5, 'Ni Nyoman Sadiasih', '085940716046', '2024-04-01', 21, 3, 1),
(2130, '', 5, 'Fauzi', '085923476991', '2024-04-01', 21, 3, 1),
(2131, '', 5, 'Ni Luh Mardiasih', '087754303390', '2024-04-01', 21, 3, 1),
(2132, '', 5, 'Hizzurrahman', '083105274299', '2024-04-01', 21, 3, 1),
(2133, '', 5, 'I Made Sudianti', '0811111', '2024-04-01', 21, 3, 1),
(2134, '', 5, 'Kamrin', '087750456355', '2024-04-01', 21, 3, 1),
(2135, '', 5, 'Ahmadun', '082146832242', '2024-04-01', 21, 3, 1),
(2136, '', 5, 'Herman', '085935067422', '2024-04-01', 21, 3, 1),
(2137, '', 5, 'Anthoni', '081353208224', '2024-04-01', 21, 3, 1),
(2138, '', 5, 'Ahmad Danafiyah', '081239906541', '2024-04-01', 21, 3, 1),
(2139, '', 5, 'Pahmi Syam', '087763411609', '2024-04-01', 21, 3, 1),
(2140, '', 5, 'Ni Wayan Senter', '081338743759', '2024-04-01', 21, 3, 1),
(2141, '', 5, 'Ni Nyoman Ayu Martini ', '081999282163', '2024-04-01', 21, 3, 1),
(2142, '', 5, 'Suhaili', '087753417489', '2024-04-01', 21, 3, 1),
(2143, '', 5, 'I Made Senama Putra', '081558922369', '2024-04-01', 22, 3, 1),
(2144, '', 5, 'I Putu Sinar Bawa', '085935325952', '2024-04-01', 22, 3, 1),
(2145, '', 5, 'I Ketut Wirajaya', '087859633085', '2024-04-01', 22, 3, 1),
(2146, '', 5, 'I Ketut Kariasa', '0811111', '2024-04-01', 22, 3, 1),
(2147, '', 5, 'I Nengah Wawuh', '081238440066', '2024-04-01', 22, 3, 1),
(2148, '', 5, 'Sufriadi', '0811111', '2024-04-01', 22, 3, 1),
(2149, '', 5, 'I Made Regeg', '085792563822', '2024-04-01', 22, 3, 1),
(2150, '', 5, 'Ni Wayan Sukerti', '081236864442', '2024-04-01', 14, 4, 1),
(2151, '', 5, 'Amnah', '0811111', '2024-04-01', 21, 3, 1),
(2152, '', 6, 'Ni Ketut Murning', '081246268121', '2024-04-01', 14, 3, 1),
(2153, '', 6, 'Ni Ketut Kariasih', '081558174585', '2024-04-01', 14, 3, 1),
(2154, '', 6, 'Ni Nengah Arni', '081916413501', '2024-04-01', 14, 3, 1),
(2155, '', 6, 'Ni Nyoman Maba', '081337290522', '2024-04-01', 14, 3, 1),
(2156, '', 6, 'Ni Wayan Budiasih', '081337913770', '2024-04-01', 14, 3, 1),
(2157, '', 6, 'Ni Nyoman Resmiati', '087861186602', '2024-04-01', 14, 3, 1),
(2158, '', 6, 'Ni Nengah Werti', '0811111', '2024-04-01', 14, 3, 1),
(2159, '', 6, 'Basuni', '081703336417', '2024-04-01', 21, 3, 1),
(2160, '', 6, 'Ni Made Riok', '082147531145', '2024-04-01', 21, 3, 1),
(2161, '', 6, 'Ahmad Sa\'rani', '0815935361254', '2024-04-01', 21, 3, 1),
(2162, '', 6, 'Muhammad', '088757986469', '2024-04-01', 21, 3, 1),
(2163, '', 6, 'Edi Hartono', '085333896125', '2024-04-01', 21, 3, 1),
(2164, '', 6, 'Rasyik', '081353954783', '2024-04-01', 21, 3, 1),
(2165, '', 6, 'Lukman Ardiansah', '0811111', '2024-04-01', 21, 3, 1),
(2166, '', 6, 'I Nyoman Asta', '085237638063', '2024-04-01', 21, 3, 1),
(2167, '', 6, 'Fathorrasit', '081338077308', '2024-04-01', 21, 3, 1),
(2168, '', 6, 'Ikhsan', '081237555450', '2024-04-01', 21, 3, 1),
(2169, '', 6, 'Ni Nyoman Remini', '082144788147', '2024-04-01', 21, 3, 1),
(2170, '', 6, 'Ni Ketut Sumiati', '087864529351', '2024-04-01', 21, 3, 1),
(2171, '', 6, 'Ni Wayan Asrini', '085333022547', '2024-04-01', 21, 3, 1),
(2172, '', 6, 'Ni Denik Sumiati, SE.', '081337152495', '2024-04-01', 21, 3, 1),
(2173, '', 6, 'I Wayan Supadi', '087730259579', '2024-04-01', 21, 3, 1),
(2174, '', 6, 'Ni Ketut Ayu Noviantari', '085792546603', '2024-04-01', 21, 3, 1),
(2175, '', 6, 'I Wayan Kariasa ', '081999581773', '2024-04-01', 21, 3, 1),
(2176, '', 6, 'I Wayan Matra', '082145926197', '2024-04-01', 21, 3, 1),
(2177, '', 6, 'Ni Nyoman Pidri ', '083119971766', '2024-04-01', 21, 3, 1),
(2178, '', 6, 'I Wayan Pakta ', '087752418966', '2024-04-01', 21, 3, 1),
(2179, '', 6, 'Junaidi ', '08179794339', '2024-04-01', 21, 3, 1),
(2180, '', 4, 'I Wayan Tarma', '082147541400', '2024-04-01', 21, 3, 1),
(2181, '', 6, 'Siti Sarah', '0811111', '2024-04-01', 21, 3, 1),
(2182, '', 6, 'Ni Ketut Mariani', '085847151936', '2024-04-01', 14, 3, 1),
(2183, '', 6, 'I Made Darmayasa', '0811111', '2024-04-01', 22, 3, 1),
(2184, '', 7, 'Ni Luh Santini', '081232612363', '2024-04-01', 14, 3, 1),
(2185, '', 7, 'Ni Wayan Bunteriani', '087841882811', '2024-04-01', 14, 3, 1),
(2186, '', 7, 'Ni Made Tarum ', '085942951542', '2024-04-01', 14, 3, 1),
(2187, '', 7, 'Hety Damaris', '082119430822', '2024-04-01', 19, 3, 1),
(2188, '', 7, 'Moh. Jufri', '081805462134', '2024-04-01', 21, 3, 1),
(2189, '', 7, 'Ni luh Koni', '0811111', '2024-04-01', 21, 3, 1),
(2190, '', 7, 'Hamdan', '081999918010', '2024-04-01', 21, 3, 1),
(2191, '', 7, 'I Wayan Dabdab', '087860174234', '2024-04-01', 21, 3, 1),
(2192, '', 7, 'Ni Nengah Mudiasih', '081338447510', '2024-04-01', 21, 3, 1),
(2193, '', 7, 'Sulhani', '081934354779', '2024-04-01', 21, 3, 1),
(2194, '', 7, 'Ehsanuddin', '081939727954', '2024-04-01', 21, 3, 1),
(2195, '', 7, 'I Kadek Ari Setiawan', '08123674236', '2024-04-01', 21, 3, 1),
(2196, '', 7, 'Ni Wayan Astiti', '081338340186', '2024-04-01', 21, 3, 1),
(2197, '', 7, 'Siti Aminah', '081353870321', '2024-04-01', 21, 3, 1),
(2198, '', 7, 'I Wayan Gunawan', '081939431834', '2024-04-01', 22, 3, 1),
(2199, '', 7, 'I Nyoman Rastama', '081338515367', '2024-04-01', 22, 3, 1),
(2200, '', 8, 'Ni Nengah Resmini', '085931227028', '2024-04-01', 14, 3, 1),
(2201, '', 8, 'Ni Made Lotri', '081333338270', '2024-04-01', 14, 3, 1),
(2202, '', 8, 'Ni Nyoman Sadru', '085954174065', '2024-04-01', 14, 3, 1),
(2203, '', 8, 'Ni Nyoman Resi', '087840525523', '2024-04-01', 14, 3, 1),
(2204, '', 8, 'Ni Luh Masiniasih', '085739077325', '2024-04-01', 14, 3, 1),
(2205, '', 8, 'Ni Luh Noviani', '085853008675', '2024-04-01', 18, 3, 1),
(2206, '', 8, 'Muhammad Lazim', '0811111', '2024-04-01', 21, 3, 1),
(2207, '', 8, 'Paid Supriyadi', '0811111', '2024-04-01', 21, 3, 1),
(2208, '', 8, 'Muhammad Saleh', '081338077335', '2024-04-01', 21, 3, 1),
(2209, '', 8, 'I Made Mardiana', '0811111', '2024-04-01', 21, 3, 1),
(2210, '', 8, 'Ni Ketut Manis', '0811111', '2024-04-01', 21, 3, 1),
(2211, '', 8, 'Ni Wayan Sulastri', '081999421717', '2024-04-01', 21, 3, 1),
(2212, '', 8, 'I Nyoman Santep', '0811111', '2024-04-01', 21, 3, 1),
(2213, '', 8, 'Amin Kusairi', '0811111', '2024-04-01', 21, 3, 1),
(2214, '', 8, 'Ali Wafa', '087749023939', '2024-04-01', 21, 3, 1),
(2215, '', 8, 'Muhdani', '0811111', '2024-04-01', 21, 3, 1),
(2216, '', 8, 'Wahid Maulana', '085339665863', '2024-04-01', 21, 3, 1),
(2217, '', 8, 'Bambang Legianto', '0811111', '2024-04-01', 21, 3, 1),
(2218, '', 8, 'H. Muhamad', '08635508438', '2024-04-01', 21, 3, 1),
(2219, '', 8, 'Moh. Sae', '0811111', '2024-04-01', 21, 3, 1),
(2220, '', 8, 'Ridwan', '081338673254', '2024-04-01', 21, 3, 1),
(2221, '', 8, 'Baidillah', '085958589409', '2024-04-01', 21, 3, 1),
(2222, '', 8, 'Supriyanto', '087862011675', '2024-04-01', 21, 3, 1),
(2223, '', 8, 'Peripin', '0811111', '2024-04-01', 21, 3, 1),
(2224, '', 8, 'I Nengah Sukara', '081338437914', '2024-04-01', 21, 3, 1),
(2225, '', 8, 'Ni Ketut Wiardani', '087762021518', '2024-04-01', 21, 3, 1),
(2226, '', 8, 'Ni Ketut Rumini', '087722876500', '2024-04-01', 21, 3, 1),
(2227, '', 8, 'Ni Ketut Suastining', '081239463007', '2024-04-01', 21, 3, 1),
(2228, '', 8, 'Ni Kadek Ardiasih ', '087785533152', '2024-04-01', 21, 3, 1),
(2229, '', 8, 'I Made Samba', '0811111', '2024-04-01', 21, 3, 1),
(2230, '', 8, 'I Made Ribeng', '08337992334', '2024-04-01', 21, 3, 1),
(2231, '', 9, 'Ni Nyoman Muriati', '081237034139', '2024-04-01', 14, 3, 1),
(2232, '', 9, 'Ni Nengah Nandri', '085792010113', '2024-04-01', 14, 3, 1),
(2233, '', 9, 'Ni Luh Ariasih', '085904145688', '2024-04-01', 14, 3, 1),
(2234, '', 9, 'Ni Ketut Rejeki', '087811508120', '2024-04-01', 14, 3, 1),
(2235, '', 9, 'Ni Luh Putu Sulasmi', '087860008028', '2024-04-01', 14, 3, 1),
(2236, '', 9, 'Ni Nengah Sriani', '087811153020', '2024-04-01', 14, 3, 1),
(2237, '', 9, 'Ni Made Sukerti', '082145820480', '2024-04-01', 14, 3, 1),
(2238, '', 9, 'Ni Nyoman Bentet ', '081237716907', '2024-04-01', 14, 3, 1),
(2239, '', 9, 'Ni Nengah Sini Asih', '087865027286', '2024-04-01', 14, 3, 1),
(2240, '', 9, 'Ni Ketut Suerni ', '081938095664', '2024-04-01', 14, 4, 1),
(2241, '', 9, 'Ni Made Sari', '0811111', '2024-04-01', 14, 4, 1),
(2242, '', 9, 'Ni Wayan Sorta', '0811111', '2024-04-01', 14, 4, 1),
(2243, '', 9, 'Mu\'Awwan', '081999745306', '2024-04-01', 22, 3, 1),
(2244, '', 9, 'I Wayan Wiranata', '081933167784', '2024-04-01', 21, 3, 1),
(2245, '', 9, 'Ni Wayan Sunadi', '082322837211', '2024-04-01', 21, 3, 1),
(2246, '', 9, 'I Made Ariawan', '085868500378', '2024-04-01', 21, 3, 1),
(2247, '', 9, 'Ahmad', '081353076870', '2024-04-01', 21, 3, 1),
(2248, '', 9, 'Risa\'ie ', '087811897078', '2024-04-01', 21, 3, 1),
(2249, '', 9, 'Ni Nengah Rempini ', '085933881358', '2024-04-01', 21, 3, 1),
(2250, '', 9, 'I Nyoman Ciri', '085333767029', '2024-04-01', 21, 3, 1),
(2251, '', 9, 'H. Jatim', '082341451137', '2024-04-01', 21, 3, 1),
(2252, '', 9, 'Ni Komang Suartini', '08789111083', '2024-04-01', 21, 3, 1),
(2253, '', 9, 'Ni Ketut Ritiani ', '081934633891', '2024-04-01', 21, 3, 1),
(2254, '', 9, 'Ni Luh Wangi', '081938756209', '2024-04-01', 21, 3, 1),
(2255, '', 9, 'I Komang Sarjana', '081338764800', '2024-04-01', 21, 3, 1),
(2256, '', 9, 'I Nengah Kadeana', '081558935783', '2024-04-01', 22, 3, 1),
(2257, '', 9, 'Sariani', '081935197415', '2024-04-01', 17, 3, 1),
(2258, '', 10, 'Drs. I Nyoman Warta', '0811111', '2024-04-01', 13, 3, 1),
(2259, '', 10, 'Ni Luh Asih', '087750030103', '2024-04-01', 14, 3, 1),
(2260, '', 10, 'Ni Wayan Sadri', '081337255008', '2024-04-01', 14, 3, 1),
(2261, '', 10, 'Ni Nyoman Nurani', '081252986681', '2024-04-01', 14, 3, 1),
(2262, '', 10, 'Ni Nengah Sri Mupu', '085737022659', '2024-04-01', 14, 3, 1),
(2263, '', 10, 'Ni Nyoman Cemped ', '08814704743', '2024-04-01', 14, 3, 1),
(2264, '', 10, 'Ni Wayan Sukermi', '085959612453', '2024-04-01', 14, 3, 1),
(2265, '', 10, 'Ni Luh Suparmini', '085958588028', '2024-04-01', 14, 3, 1),
(2266, '', 10, 'Ni Nyoman Rantini', '082146380318', '2024-04-01', 14, 3, 1),
(2267, '', 10, 'Ni Nengah Sunarti ', '08124283244', '2024-04-01', 14, 3, 1),
(2268, '', 10, 'Ni Made Astini', '085238137167', '2024-04-01', 14, 3, 1),
(2269, '', 10, 'Ni Made Meni', '0811111', '2024-04-01', 14, 3, 1),
(2270, '', 10, 'Ni Kadek Mariani', '081547511570', '2024-04-01', 14, 3, 1),
(2271, '', 10, 'Ni Made Rusminiati', '0811111', '2024-04-01', 14, 3, 1),
(2272, '', 10, 'Jro Made Suari', '085237043944', '2024-04-01', 14, 3, 1),
(2273, '', 10, 'Ni Nyoman Sumarni', '0817350587', '2024-04-01', 14, 3, 1),
(2274, '', 10, 'Ni Ketut Weski', '085954071424', '2024-04-01', 14, 3, 1),
(2275, '', 10, 'Ni Nyoman Suparmi', '081337024503', '2024-04-01', 14, 4, 1),
(2276, '', 10, 'Ni Ketut Ringun', '081999397490', '2024-04-01', 14, 4, 1),
(2277, '', 10, 'Ni Nengah Rundi', '085959612453', '2024-04-01', 14, 4, 1),
(2278, '', 10, 'Ni Nengah Meni', '081237655571', '2024-04-01', 14, 4, 1),
(2279, '', 10, 'Ni Wayan Werti', '0811111', '2024-04-01', 14, 4, 1),
(2280, '', 10, 'HJ Subdha Raihani', '087712526035', '2024-04-01', 19, 3, 1),
(2281, '', 10, 'Ni Luh Sika', '081917370914', '2024-04-01', 19, 3, 1),
(2282, '', 10, 'I Ketut Suridi', '087883982850', '2024-04-01', 21, 3, 1),
(2283, '', 10, 'Sahari', '085954218250', '2024-04-01', 21, 3, 1),
(2284, '', 10, 'Al Hasum', '083114182945', '2024-04-01', 21, 3, 1),
(2285, '', 10, 'I Made Sutrisna', '0811111', '2024-04-01', 21, 3, 1),
(2286, '', 10, 'Suderman', '082147848595', '2024-04-01', 21, 3, 1),
(2287, '', 10, 'Ni Nyoman Wangi', '081805619762', '2024-04-01', 21, 4, 1),
(2288, '', 10, 'Ni Ketut Rapiyani', '085854114285', '2024-04-01', 21, 3, 1),
(2289, '', 10, 'Ni Nyoman Nardi', '081916402692', '2024-04-01', 21, 3, 1),
(2290, '', 10, 'Ni Nyoman Ganti', '081999222987', '2024-04-01', 21, 3, 1),
(2291, '', 10, 'Ni Nyoman Triani, S.Pd.', '087755654201', '2024-04-01', 21, 3, 1),
(2292, '', 10, 'I Putu Indrawan ', '087875540055', '2024-04-01', 21, 3, 1),
(2293, '', 10, 'I Wayan Rendana', '087760354594', '2024-04-01', 21, 3, 1),
(2294, '', 10, 'I Nengah Gasek', '087754704187', '2024-04-01', 21, 3, 1),
(2295, '', 10, 'I Nengah Keted', '085337813228', '2024-04-01', 21, 3, 1),
(2296, '', 10, 'As Adi', '08179759729', '2024-04-01', 21, 3, 1),
(2297, '', 10, 'Moh. Rafik', '081338284495', '2024-04-01', 21, 3, 1),
(2298, '', 10, 'Zaini', '081527670065', '2024-04-01', 21, 3, 1),
(2299, '', 10, 'Rusdi Yadi', '081239287839', '2024-04-01', 21, 3, 1),
(2300, '', 10, 'Ahmad Busairi ', '087862043354', '2024-04-01', 21, 3, 1),
(2301, '', 10, 'Murahmat', '081237215187', '2024-04-01', 21, 3, 1),
(2302, '', 10, 'I Wayan Sunada', '081337032983', '2024-04-01', 21, 3, 1),
(2303, '', 10, 'I Nengah Surawan', '085204555505', '2024-04-01', 21, 3, 1),
(2304, '', 10, 'Seinudden', '081916406544', '2024-04-01', 21, 3, 1),
(2305, '', 10, 'Ach. Samsuri', '085205891499', '2024-04-01', 21, 3, 1),
(2306, '', 10, 'Abel Fauzi', '081338170089', '2024-04-01', 21, 3, 1),
(2307, '', 10, 'Sainul', '0811111', '2024-04-01', 21, 3, 1),
(2308, '', 10, 'Rian Handika', '0811111', '2024-04-01', 21, 3, 1),
(2309, '', 10, 'I Ketut Swastawa', '082146148368', '2024-04-01', 21, 3, 1),
(2310, '', 10, 'Ni Wayan Ardiasih ', '081547536019', '2024-04-01', 21, 3, 1),
(2311, '', 10, 'Ni Nengah Jati ', '087754704187', '2024-04-01', 21, 3, 1),
(2312, '', 10, 'Ni Wayan Mudin', '0811111', '2024-04-01', 21, 3, 1),
(2313, '', 10, 'I Nengah Darma', '0811111', '2024-04-01', 21, 3, 1),
(2314, '', 10, 'Ni Nengah Rencani', '081936208511', '2024-04-01', 21, 3, 1),
(2315, '', 10, 'Ni Nyoman Masri', '083114383370', '2024-04-01', 21, 3, 1),
(2316, '', 10, 'Ni Wayan Remasih', '081995115400', '2024-04-01', 21, 3, 1),
(2317, '', 10, 'Ainul Alim', '087750711420', '2024-04-01', 21, 3, 1),
(2318, '', 10, 'Ni Wayan Sadir', '082146148368', '2024-04-01', 21, 3, 1),
(2319, '', 10, 'Sabri', '081936140403', '2024-04-01', 21, 3, 1),
(2320, '', 10, 'Abdur Rahman', '0811111', '2024-04-01', 21, 3, 1),
(2321, '', 10, 'Jauhari', '081805422559', '2024-04-01', 21, 3, 1),
(2322, '', 10, 'I Nyoman Sumarna', '0811111', '2024-04-01', 21, 3, 1),
(2323, '', 10, 'I Nengah Tirta', '081246977044', '2024-04-01', 21, 3, 1),
(2324, '', 10, 'I Wayan Sukun', '08124662679', '2024-04-01', 21, 3, 1),
(2325, '', 10, 'Musyarrafa ', '0811111', '2024-04-01', 21, 3, 1),
(2326, '', 10, 'Ruliandi', '087548762128', '2024-04-01', 21, 3, 1),
(2327, '', 10, 'Ni Wayan Suati ', '082339004900', '2024-04-01', 21, 4, 1),
(2328, '', 10, 'I Wayan Satu', '081338485087', '2024-04-01', 22, 3, 1),
(2329, '', 10, 'I Nengah Ardana', '081338542491', '2024-04-01', 22, 3, 1),
(2330, '', 10, 'I Ketut Resep', '081805210981', '2024-04-01', 22, 3, 1),
(2331, '', 10, 'I Nengah Carman Yasa', '083114383332', '2024-04-01', 22, 3, 1),
(2332, '', 10, 'I Nengah Arsa', '0881038482410', '2024-04-01', 22, 3, 1),
(2333, '', 12, 'I Wayan Mudita', '081999880770', '2024-04-01', 15, 3, 1),
(2334, '', 11, 'I Wayan Pada', '085237300992', '2024-04-01', 13, 3, 1),
(2335, '', 11, 'Ni Ketut Sinten', '082144101800', '2024-04-01', 14, 3, 1),
(2336, '', 11, 'Ni Ketut Sedem', '081936172059', '2024-04-01', 14, 3, 1),
(2337, '', 11, 'Ni Nengah Lasi', '0811111', '2024-04-01', 14, 4, 1),
(2338, '', 11, 'Ni Ketut Rupeg', '087861582534\'', '2024-04-01', 14, 4, 1),
(2339, '', 11, 'Ni Wayan Suriati', '087862282757', '2024-04-01', 14, 4, 1),
(2340, '', 11, 'Ni Wayan Bersih', '0811111', '2024-04-01', 14, 4, 1),
(2341, '', 11, 'Ni Nyoman Catri', '0811111', '2024-04-01', 14, 4, 1),
(2342, '', 11, 'Ni Nyoman Suwini', '085969011430', '2024-04-01', 14, 4, 1),
(2343, '', 11, 'Andika Kristi Dewantari', '089530274775', '2024-04-01', 19, 3, 1),
(2344, '', 11, 'I Nyoman Sution', '085237005342', '2024-04-01', 21, 3, 1),
(2345, '', 11, 'Samhari', '081933110469', '2024-04-01', 21, 3, 1),
(2346, '', 11, 'Bihari', '081933060600', '2024-04-01', 21, 3, 1),
(2347, '', 11, 'Saiku Fernanda', '081805421367', '2024-04-01', 21, 3, 1),
(2348, '', 11, 'I Made Kembar', '081238129010', '2024-04-01', 21, 3, 1),
(2349, '', 11, 'Ahmad Zainuri ', '081797987779', '2024-04-01', 21, 3, 1),
(2350, '', 11, 'I Nengah Wiku', '087761449041', '2024-04-01', 21, 3, 1),
(2351, '', 11, 'Didik Haryono', '081999276277', '2024-04-01', 21, 3, 1),
(2352, '', 11, 'Ni Ketut Ciri', '0811111', '2024-04-01', 21, 3, 1),
(2353, '', 11, 'Ni Nyoman Seroni ', '081239890038', '2024-04-01', 21, 3, 1),
(2354, '', 11, 'Ni Ketut Sandat', '087763010659', '2024-04-01', 21, 3, 1),
(2355, '', 11, 'Ni Ketut Rentet', '087726024605', '2024-04-01', 21, 3, 1),
(2356, '', 11, 'Muhdani ', '082340554755', '2024-04-01', 21, 3, 1),
(2357, '', 11, 'Moh. Saleh ', '0811111', '2024-04-01', 21, 3, 1),
(2358, '', 11, 'Suriyanto', '0811111', '2024-04-01', 21, 3, 1),
(2359, '', 11, 'Supriadi ', '08155779789', '2024-04-01', 21, 3, 1),
(2360, '', 11, 'I Kadek Adnyana Putra', '081916532181', '2024-04-01', 22, 3, 1),
(2361, '', 11, 'I Kadek Warna Jaya', '085923492462', '2024-04-01', 22, 3, 1),
(2362, '', 11, 'I Nengah Kertana', '082145698769', '2024-04-01', 22, 3, 1),
(2363, '', 12, 'Frangki Setiawan', '081235682699', '2024-04-01', 13, 3, 1),
(2364, '', 12, 'Joko Agustino', '0811111', '2024-04-01', 13, 3, 1),
(2365, '', 12, 'Jumadi', '0811111', '2024-04-01', 13, 3, 1),
(2366, '', 12, 'Hajjah Baiq Resti', '087862193073', '2024-04-01', 17, 3, 1),
(2367, '', 12, 'Ni Made Tenis', '085792115251', '2024-04-01', 14, 3, 1),
(2368, '', 12, 'Ni Nengah Biji', '087732188161', '2024-04-01', 14, 3, 1),
(2369, '', 12, 'Ni Wayan Manis', '087704537524', '2024-04-01', 14, 3, 1),
(2370, '', 12, 'Ni Ketut Angkri', '087861834139', '2024-04-01', 14, 3, 1),
(2371, '', 11, 'Ni Ketut Darsih', '081239881945', '2024-04-01', 14, 4, 1),
(2372, '', 12, 'Ni Komang Sinta', '087759900531', '2024-04-01', 18, 3, 1),
(2373, '', 12, 'I Ketut Dana', '087702914662', '2024-04-01', 18, 3, 1),
(2374, '', 12, 'I Wayan Darma', '081999028211', '2024-04-01', 18, 3, 1),
(2375, '', 12, 'Ni Wayan Budiani', '08174753717', '2024-04-01', 21, 3, 1),
(2376, '', 12, 'I Nengah Rumisi ', '085954950152', '2024-04-01', 21, 3, 1),
(2377, '', 12, 'Sahri Adi ', '0811111', '2024-04-01', 21, 3, 1),
(2378, '', 12, 'Ni Made Manis', '083119083859', '2024-04-01', 21, 3, 1),
(2379, '', 12, 'I Komang Darma Putra', '081933108787', '2024-04-01', 22, 3, 1),
(2380, '2380/ST/TT/2024', 12, 'LONTONG', '081199', '2024-01-01', 22, 2, 1);

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
(4, 'BLUE OCEAN', 'B0', 1),
(5, 'JAYAKARTA', 'JK', 2),
(6, 'NIKSOMA', 'NK', 3),
(7, 'MELASTI', 'ML', 4),
(8, 'BALI PADMA', 'BP', 5),
(9, 'BALI MANDIRA', 'BM', 6),
(10, 'LEGIAN BEACH', 'LB', 7),
(11, 'PULLMAN', 'PM', 8),
(12, 'STONE', 'ST', 9);

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
(1, 'administrator', '$2y$10$Ajl3Ut9gxroez2rPXIhv6OuK/BTIVcG70b6/ZwLygq.y1JPlIvzQa', 'admin@admin.com', 1268889823, 1, 'Admin', 2),
(2, 'kade', '$2y$10$wLzfV5yNCrD2Fy0w1jF6e.x9.Oz127/9miroPcM2lNPXreWOZkHP.', 'naklegian@gmail.com', 1701785036, 1, 'Made', 1),
(3, 'arjana', '$2y$10$h4ucR83CTC6SnrrcDeuxtuBHzJxYXr6/Mk8VqKZAQkD5VszM13tKq', 'arjana@mtkbali.com', 1705238471, 1, 'Arjana Made', 0),
(4, 'admin', '$2y$10$mYAzgBZN2u2p50SsUqqHg.kR1v0ClPVbLI9OMKtEDeg2NTa1l/OM2', 'admin@ppdal.com', 1705575074, 1, 'Admin Kantor', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `info_lembaga`
--
ALTER TABLE `info_lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periode_laporan`
--
ALTER TABLE `periode_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_extra_charge`
--
ALTER TABLE `setting_extra_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_iuran`
--
ALTER TABLE `setting_iuran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_iuran_asongan`
--
ALTER TABLE `setting_iuran_asongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_iuran`
--
ALTER TABLE `transaksi_iuran`
  ADD PRIMARY KEY (`id_transaksi`);

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
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi_iuran`
--
ALTER TABLE `detail_transaksi_iuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `info_lembaga`
--
ALTER TABLE `info_lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `periode_laporan`
--
ALTER TABLE `periode_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting_extra_charge`
--
ALTER TABLE `setting_extra_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting_iuran`
--
ALTER TABLE `setting_iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT untuk tabel `setting_iuran_asongan`
--
ALTER TABLE `setting_iuran_asongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi_iuran`
--
ALTER TABLE `transaksi_iuran`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `t_extra_charge`
--
ALTER TABLE `t_extra_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_jenis_dagangan`
--
ALTER TABLE `t_jenis_dagangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `t_kartu`
--
ALTER TABLE `t_kartu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=619;

--
-- AUTO_INCREMENT untuk tabel `t_pedagang`
--
ALTER TABLE `t_pedagang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2381;

--
-- AUTO_INCREMENT untuk tabel `t_wilayah`
--
ALTER TABLE `t_wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
