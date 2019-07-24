-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 07:33 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbjtc_iklan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nm_lengkap` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `unit_kerja` varchar(128) NOT NULL,
  `departemen` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` enum('Admin','Pegawai') NOT NULL,
  `user_aktif` int(1) NOT NULL,
  `tgl_buat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nm_lengkap`, `email`, `unit_kerja`, `departemen`, `image`, `no_telp`, `password`, `role_id`, `user_aktif`, `tgl_buat`) VALUES
(4, 'Boby James Hari Sel', 'bj.harisel@gmail.com', 'Cabang JTC', 'IT', 'default.jpg', '(0822)-81351399', '$2y$10$rcAYHVLvhIwGabepbCcv5.vOFhimYQOKKzhdvijEmdNRe.8CSvbY2', 'Admin', 1, '24-04-2019'),
(5, 'Rahmat', 'rahmat@gmail.com', 'Kantor Pusat', 'Finance', 'default.jpg', '(0822)-81351399', '$2y$10$bgaxg/UI48jtjBAPMN82KOqg1s4XZBdIk36Fj89Z8sAlr.eyUXjKW', 'Pegawai', 1, '24-04-2019');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_tujuan`
--

CREATE TABLE `daftar_tujuan` (
  `daftar_tujuan_id` int(11) NOT NULL,
  `tujuan_id` int(11) DEFAULT NULL,
  `jalan_id` int(11) DEFAULT NULL,
  `status` enum('lolos','daftar','tidak lolos') DEFAULT 'daftar',
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_tujuan`
--

INSERT INTO `daftar_tujuan` (`daftar_tujuan_id`, `tujuan_id`, `jalan_id`, `status`, `total`) VALUES
(3, 2, 5, 'daftar', 0),
(5, 1, 6, 'lolos', 2.4208259924895),
(6, 1, 13, 'lolos', 0),
(7, 4, 5, 'lolos', 3.8091954685133),
(8, 4, 6, 'tidak lolos', 0),
(9, 4, 13, 'tidak lolos', 0),
(10, 2, 7, 'daftar', 0),
(11, 3, 7, 'lolos', 4.9681856950858),
(12, 3, 5, 'lolos', 0),
(13, 3, 9, 'lolos', 0),
(14, 2, 9, 'daftar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_tujuan_nilai`
--

CREATE TABLE `daftar_tujuan_nilai` (
  `daftar_tujuan_nilai_id` int(11) NOT NULL,
  `daftar_tujuan_id` int(11) DEFAULT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_tujuan_nilai`
--

INSERT INTO `daftar_tujuan_nilai` (`daftar_tujuan_nilai_id`, `daftar_tujuan_id`, `kriteria_id`, `nilai_id`) VALUES
(1, 3, 1, 6),
(2, 3, 2, 10),
(3, 3, 3, 13),
(4, 3, 4, 17),
(5, 3, 5, 20),
(11, 5, 1, 6),
(12, 5, 2, 9),
(13, 5, 3, 14),
(14, 5, 4, 18),
(15, 5, 5, 21),
(26, 6, 1, 7),
(27, 6, 2, 11),
(28, 6, 3, 15),
(29, 6, 4, 18),
(30, 6, 5, 22),
(31, 7, 1, 6),
(32, 7, 2, 8),
(33, 7, 3, 12),
(34, 7, 4, 17),
(35, 7, 5, 21),
(36, 8, 1, 7),
(37, 8, 2, 9),
(38, 8, 3, 13),
(39, 8, 4, 18),
(40, 8, 5, 23),
(41, 9, 1, 6),
(42, 9, 2, 10),
(43, 9, 3, 15),
(44, 9, 4, 19),
(45, 9, 5, 22),
(46, 10, 1, 6),
(47, 10, 2, 10),
(48, 10, 3, 13),
(49, 10, 4, 18),
(50, 10, 5, 21),
(51, 11, 1, 5),
(52, 11, 2, 8),
(53, 11, 3, 12),
(54, 11, 4, 16),
(55, 11, 5, 20),
(56, 12, 1, 6),
(57, 12, 2, 9),
(58, 12, 3, 14),
(59, 12, 4, 17),
(60, 12, 5, 21),
(61, 13, 1, 6),
(62, 13, 2, 9),
(63, 13, 3, 14),
(64, 13, 4, 17),
(65, 13, 5, 22),
(66, 14, 1, 5),
(67, 14, 2, 10),
(68, 14, 3, 15),
(69, 14, 4, 16),
(70, 14, 5, 21);

-- --------------------------------------------------------

--
-- Table structure for table `jalan`
--

CREATE TABLE `jalan` (
  `id_jalan` int(11) NOT NULL,
  `namajalan` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `namajalan`, `keterangan`) VALUES
(5, 'JAKARTA CIKAMPEK', 'Panjang Jalur 100 KM'),
(6, 'JAGORAWI', 'Panjang Jalur 70 KM'),
(7, 'PURBALEUNYI', 'Panjang Jalur 60 KM'),
(8, 'JAKARTA TANGERANG', 'Panjang Jalur 80 KM'),
(9, 'PALIKANCI', 'Panjang Jalur 45 KM'),
(10, 'SEMARANG', 'Panjang Jalur 35 KM'),
(11, 'BALMERA', 'Panjang Jalur 60 KM'),
(13, 'SURABAYA GEMPOL', 'Panjang Jalur 130 KM'),
(14, 'Jagorawi', 'Bogor Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `jembatan`
--

CREATE TABLE `jembatan` (
  `id_jembatan` int(11) NOT NULL,
  `namajembatan` varchar(32) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jembatan`
--

INSERT INTO `jembatan` (`id_jembatan`, `namajembatan`, `keterangan`) VALUES
(0, 'jembatan gantungan', 'jembatan gantung tiga');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_iklan`
--

CREATE TABLE `jenis_iklan` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `ukuran_max` varchar(50) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_iklan`
--

INSERT INTO `jenis_iklan` (`id_jenis`, `nama_jenis`, `id_tipe`, `ukuran`, `ukuran_max`, `harga`) VALUES
(3, 'VIDEO TRON', 0, '1', '20', 6500000),
(4, 'BALIHO', 0, '1', '21', 3000000),
(5, 'BILLBOARD', 0, '1', '22', 5000000),
(6, 'SPANDUK', 0, '1', '24', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `koordinatjalan`
--

CREATE TABLE `koordinatjalan` (
  `id_koordinatjalan` int(11) NOT NULL,
  `id_jalan` int(11) DEFAULT NULL,
  `latitude` varchar(24) DEFAULT NULL,
  `longitude` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koordinatjalan`
--

INSERT INTO `koordinatjalan` (`id_koordinatjalan`, `id_jalan`, `latitude`, `longitude`) VALUES
(22, 1, '-6.809238024763568', '110.84383249282837'),
(23, 1, '-6.81247657422648', '110.85366010665894'),
(24, 1, '-6.803954028719589', '110.85705041885376');

-- --------------------------------------------------------

--
-- Table structure for table `koordinatjembatan`
--

CREATE TABLE `koordinatjembatan` (
  `id_koordinatjembatan` int(11) NOT NULL,
  `id_jembatan` int(11) DEFAULT NULL,
  `latitude` varchar(24) DEFAULT NULL,
  `longitude` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koordinatjembatan`
--

INSERT INTO `koordinatjembatan` (`id_koordinatjembatan`, `id_jembatan`, `latitude`, `longitude`) VALUES
(3, 1, '-6.798225372656344', '110.92573642730713');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `nama_kriteria`) VALUES
(1, 'Volume Kendaraan'),
(2, 'Harga Iklan Per Ruas'),
(3, 'Iklan Terdahulu'),
(4, 'apa si'),
(5, 'apajaalah');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `kriteria_nilai_id` int(11) NOT NULL,
  `tujuan_id` int(11) DEFAULT NULL,
  `kriteria_id_dari` int(11) DEFAULT NULL,
  `kriteria_id_tujuan` int(11) DEFAULT NULL,
  `nilai` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`kriteria_nilai_id`, `tujuan_id`, `kriteria_id_dari`, `kriteria_id_tujuan`, `nilai`) VALUES
(51, 1, 1, 2, 2),
(52, 1, 1, 3, 1),
(53, 1, 1, 4, 1),
(54, 1, 1, 5, 1),
(55, 1, 2, 3, 1),
(56, 1, 2, 4, 1),
(57, 1, 2, 5, 1),
(58, 1, 3, 4, 1),
(59, 1, 3, 5, 1),
(60, 1, 4, 5, 1),
(61, 3, 1, 2, 2),
(62, 3, 1, 3, 2),
(63, 3, 1, 4, 3),
(64, 3, 1, 5, 3),
(65, 3, 2, 3, 8),
(66, 3, 2, 4, 8),
(67, 3, 2, 5, 8),
(68, 3, 3, 4, 2),
(69, 3, 3, 5, 4),
(70, 3, 4, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kategori`
--

CREATE TABLE `nilai_kategori` (
  `nilai_id` int(11) NOT NULL,
  `nama_nilai` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kategori`
--

INSERT INTO `nilai_kategori` (`nilai_id`, `nama_nilai`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` int(11) NOT NULL,
  `beasiswa_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `status` enum('daftar','lolos','tidak lolos') NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`peserta_id`, `beasiswa_id`, `siswa_id`, `status`, `total`) VALUES
(2, 3, 3, 'lolos', 3.9012057519557),
(3, 3, 4, 'lolos', 0),
(4, 3, 5, 'lolos', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peserta_nilai`
--

CREATE TABLE `peserta_nilai` (
  `peserta_nilai_id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta_nilai`
--

INSERT INTO `peserta_nilai` (`peserta_nilai_id`, `peserta_id`, `kriteria_id`, `nilai_id`) VALUES
(11, 2, 1, 1),
(12, 2, 2, 8),
(13, 2, 3, 15),
(14, 2, 4, 16),
(15, 2, 5, 21),
(16, 3, 1, 5),
(17, 3, 2, 8),
(18, 3, 3, 12),
(19, 3, 4, 17),
(20, 3, 5, 23),
(21, 4, 1, 5),
(22, 4, 2, 10),
(23, 4, 3, 15),
(24, 4, 4, 17),
(25, 4, 5, 23);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `subkriteria_id` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `tipe` enum('teks','nilai') NOT NULL,
  `nilai_minimum` double DEFAULT NULL,
  `nilai_maksimum` double DEFAULT NULL,
  `op_min` varchar(4) DEFAULT NULL,
  `op_max` varchar(4) DEFAULT NULL,
  `nilai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`subkriteria_id`, `nama_subkriteria`, `kriteria_id`, `tipe`, `nilai_minimum`, `nilai_maksimum`, `op_min`, `op_max`, `nilai_id`) VALUES
(5, '< 70 <= 87', 1, 'nilai', 70, 87, '<', '<=', 2),
(6, '< 65 <= 80', 1, 'nilai', 65, 80, '<', '<=', 2),
(7, '<= 70 < 70', 1, 'nilai', 70, 70, '<=', '<', 4),
(8, 'Nasional', 2, 'teks', NULL, NULL, NULL, NULL, 1),
(9, 'Provinsi / Kota', 2, 'teks', NULL, NULL, NULL, NULL, 2),
(10, 'Sekolah', 2, 'teks', NULL, NULL, NULL, NULL, 3),
(11, 'Tidak Ada', 2, 'teks', NULL, NULL, NULL, NULL, 4),
(12, 'Nasional', 3, 'teks', NULL, NULL, NULL, NULL, 1),
(13, 'Provinsi / Kota', 3, 'teks', NULL, NULL, NULL, NULL, 2),
(14, 'Sekolah', 3, 'teks', NULL, NULL, NULL, NULL, 3),
(15, 'Tidak Ada', 3, 'teks', NULL, NULL, NULL, NULL, 4),
(16, '<= 1500000 < 1500000', 4, 'nilai', 1500000, 1500000, '<=', '<', 1),
(17, '< 1500000 <= 2500000', 4, 'nilai', 1500000, 2500000, '<', '<=', 2),
(18, '< 2500000 <= 3500000', 4, 'nilai', 2500000, 3500000, '<', '<=', 3),
(19, '=> 3500000 > 3500000', 4, 'nilai', 3500000, 3500000, '=>', '>', 4),
(20, '= 4  4', 5, 'nilai', 4, 4, '=', NULL, 1),
(21, '> 4  > 4', 5, 'nilai', 4, 4, '>', '>', 2),
(22, '= 3 = 3', 5, 'nilai', 3, 3, '=', '=', 3),
(23, '<= 2 <= 2', 5, 'nilai', 2, 2, '<=', '<=', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_hasil`
--

CREATE TABLE `subkriteria_hasil` (
  `subkriteria_hasil_id` int(11) NOT NULL,
  `tujuan_id` int(11) NOT NULL,
  `subkriteria_id` int(11) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_hasil`
--

INSERT INTO `subkriteria_hasil` (`subkriteria_hasil_id`, `tujuan_id`, `subkriteria_id`, `prioritas`) VALUES
(1, 3, 16, 1),
(2, 3, 17, 0.4374641970593851),
(3, 3, 18, 0.2969257208325377),
(4, 3, 19, 0.17700973839984724),
(5, 3, 1, 1),
(6, 3, 5, 1),
(7, 3, 6, 1),
(8, 3, 7, 1),
(9, 3, 8, 1),
(10, 3, 9, 0.5470829068577276),
(11, 3, 10, 0.34416581371545546),
(12, 3, 11, 0.18039918116683726),
(13, 3, 12, 1),
(14, 3, 13, 0.7291810048176187),
(15, 3, 14, 0.571662078458362),
(16, 3, 15, 0.41354094975911904),
(17, 3, 20, 0.9681856950858089),
(18, 3, 21, 1),
(19, 3, 22, 0.5186392928527122),
(20, 3, 23, 0.3852716417396099),
(21, 1, 5, 1),
(22, 1, 6, 0.7034718269778031),
(23, 1, 7, 0.24985771200910645),
(24, 1, 8, 1),
(25, 1, 9, 0.5683323828821724),
(26, 1, 10, 0.307333438489632),
(27, 1, 11, 0.17046543795576158),
(28, 1, 12, 1),
(29, 1, 13, 0.4094738651994498),
(30, 1, 14, 0.24853851444291605),
(31, 1, 15, 0.1834594222833562),
(32, 1, 16, 1),
(33, 1, 17, 0.773028887596977),
(34, 1, 18, 0.5370466892528517),
(35, 1, 19, 0.30171601547621435),
(36, 1, 20, 1),
(37, 1, 21, 0.3634365789337608),
(38, 1, 22, 0.5022493407104814),
(39, 1, 23, 0.25179688711929266),
(40, 4, 5, 1),
(41, 4, 6, 0.6359223300970873),
(42, 4, 7, 0.40291262135922323),
(43, 4, 8, 1),
(44, 4, 9, 1),
(45, 4, 10, 1),
(46, 4, 11, 1),
(47, 4, 12, 1),
(48, 4, 13, 0.646543330087634),
(49, 4, 14, 0.4625121713729309),
(50, 4, 15, 0.2901655306718598),
(51, 4, 16, 1),
(52, 4, 17, 0.780110411321048),
(53, 4, 18, 0.4924189409843714),
(54, 4, 19, 0.47686805069590227),
(55, 4, 20, 1),
(56, 4, 21, 0.3931627270951358),
(57, 4, 22, 0.2196132057042391),
(58, 4, 23, 0.1406915413166634);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_nilai`
--

CREATE TABLE `subkriteria_nilai` (
  `subkriteria_nilai_id` int(11) NOT NULL,
  `tujuan_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `subkriteria_id_dari` int(11) NOT NULL,
  `subkriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_nilai`
--

INSERT INTO `subkriteria_nilai` (`subkriteria_nilai_id`, `tujuan_id`, `kriteria_id`, `subkriteria_id_dari`, `subkriteria_id_tujuan`, `nilai`) VALUES
(139, 1, 1, 5, 6, 2),
(140, 1, 1, 5, 7, 3),
(141, 1, 1, 6, 7, 4),
(148, 1, 2, 8, 9, 3),
(149, 1, 2, 8, 10, 3),
(150, 1, 2, 8, 11, 4),
(151, 1, 2, 9, 10, 2),
(152, 1, 2, 9, 11, 5),
(153, 1, 2, 10, 11, 2),
(160, 1, 3, 12, 13, 4),
(161, 1, 3, 12, 14, 4),
(162, 1, 3, 12, 15, 4),
(163, 1, 3, 13, 14, 3),
(164, 1, 3, 13, 15, 2),
(165, 1, 3, 14, 15, 2),
(166, 1, 4, 16, 17, 3),
(167, 1, 4, 16, 18, 2),
(168, 1, 4, 16, 19, 2),
(169, 1, 4, 17, 18, 5),
(170, 1, 4, 17, 19, 2),
(171, 1, 4, 18, 19, 4),
(172, 1, 5, 20, 21, 4),
(173, 1, 5, 20, 22, 3),
(174, 1, 5, 20, 23, 2),
(175, 1, 5, 21, 22, 1),
(176, 1, 5, 21, 23, 2),
(177, 1, 5, 22, 23, 4),
(178, 4, 1, 5, 6, 2),
(179, 4, 1, 5, 7, 2),
(180, 4, 1, 6, 7, 2),
(181, 4, 2, 8, 9, 1),
(182, 4, 2, 8, 10, 1),
(183, 4, 2, 8, 11, 1),
(184, 4, 2, 9, 10, 1),
(185, 4, 2, 9, 11, 1),
(186, 4, 2, 10, 11, 1),
(187, 4, 3, 12, 13, 2),
(188, 4, 3, 12, 14, 2),
(189, 4, 3, 12, 15, 3),
(190, 4, 3, 13, 14, 2),
(191, 4, 3, 13, 15, 2),
(192, 4, 3, 14, 15, 2),
(193, 4, 4, 16, 17, 3),
(194, 4, 4, 16, 18, 1),
(195, 4, 4, 16, 19, 2),
(196, 4, 4, 17, 18, 5),
(197, 4, 4, 17, 19, 1),
(198, 4, 4, 18, 19, 1),
(199, 4, 5, 20, 21, 5),
(200, 4, 5, 20, 22, 4),
(201, 4, 5, 20, 23, 5),
(202, 4, 5, 21, 22, 3),
(203, 4, 5, 21, 23, 3),
(204, 4, 5, 22, 23, 2),
(208, 3, 2, 8, 9, 2),
(209, 3, 2, 8, 10, 4),
(210, 3, 2, 8, 11, 4),
(211, 3, 2, 9, 10, 2),
(212, 3, 2, 9, 11, 3),
(213, 3, 2, 10, 11, 3),
(214, 3, 3, 12, 13, 3),
(215, 3, 3, 12, 14, 2),
(216, 3, 3, 12, 15, 1),
(217, 3, 3, 13, 14, 2),
(218, 3, 3, 13, 15, 3),
(219, 3, 3, 14, 15, 3),
(220, 3, 4, 16, 17, 4),
(221, 3, 4, 16, 18, 3),
(222, 3, 4, 16, 19, 4),
(223, 3, 4, 17, 18, 2),
(224, 3, 4, 17, 19, 3),
(225, 3, 4, 18, 19, 2),
(226, 3, 5, 20, 21, 3),
(227, 3, 5, 20, 22, 2),
(228, 3, 5, 20, 23, 1),
(229, 3, 5, 21, 22, 6),
(230, 3, 5, 21, 23, 4),
(231, 3, 5, 22, 23, 4),
(232, 3, 1, 5, 6, 1),
(233, 3, 1, 5, 7, 1),
(234, 3, 1, 6, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `submit_iklan`
--

CREATE TABLE `submit_iklan` (
  `row_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipe_iklan` int(11) NOT NULL,
  `jenis_iklan` int(11) NOT NULL,
  `luas` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `kordinat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `lama_iklan` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tgl_aktif` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submit_iklan`
--

INSERT INTO `submit_iklan` (`row_id`, `email`, `tipe_iklan`, `jenis_iklan`, `luas`, `lokasi`, `kordinat`, `foto`, `proposal`, `tgl_pengajuan`, `lama_iklan`, `biaya`, `status`, `tgl_aktif`, `tgl_jatuh_tempo`) VALUES
(2, 'diana_sg@gmail.com', 1, 3, 50, '12345', '12345', '', 'Contoh_Kasus.docx', '2019-06-18', 3, 975000000, 'Aktif', '2019-06-18', '2019-07-18'),
(4, 'diana_sg@gmail.com', 3, 3, 5, '100', '12', '', 'contoh_proposal.docx', '2019-06-24', 6, 195000000, 'Aktif', '2019-06-24', '2019-12-23'),
(5, 'diana_sg@gmail.com', 4, 5, 4, '131', '12', '', 'contoh_proposal1.docx', '2019-06-24', 2, 40000000, 'Tidak Akti', '2019-06-27', '2019-06-28'),
(6, 'diana_sg@gmail.com', 2, 5, 50, '100', '12313', '', 'Contoh_Kasus1.docx', '2019-07-02', 6, 1500000000, 'Aktif', '2019-07-02', '2019-12-02'),
(7, 'diana_sg@gmail.com', 1, 3, 12, '12', '123213123123', '', 'Web_Report_Rev_02.doc', '2019-07-24', 36, 0, '', '0000-00-00', '0000-00-00'),
(8, 'diana_sg@gmail.com', 1, 3, 2, '50', '1123123123123', '', 'Web_Report_Rev_021.doc', '2019-07-24', 1, 13000000, '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_iklan`
--

CREATE TABLE `tipe_iklan` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_iklan`
--

INSERT INTO `tipe_iklan` (`id_tipe`, `nama_tipe`) VALUES
(1, 'Produk'),
(2, 'Event'),
(3, 'Brand'),
(4, 'Properti'),
(5, 'Pengumuman');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kuota` int(11) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `judul`, `keterangan`, `kuota`, `tahun`) VALUES
(1, 'Penentuan Lokasi Terbaik', 'Ruas Terbaik Untuk Iklan di Jalan TOL', 5, 2019),
(2, 'tes tujuan', 'tes tes tes', 4, 2019),
(3, 'Testing', 'Tessssss', 20, 2020),
(4, 'Iklan ban', 'iklan ban', 1, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `nm_organisasi` varchar(128) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_aktif` int(1) NOT NULL,
  `tgl_buat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `nm_organisasi`, `no_telp`, `password`, `role_id`, `user_aktif`, `tgl_buat`) VALUES
(6, 'Diana Satima Gistivani', 'diana_sg@gmail.com', '', 'Politeknik Pos Indonesia', '(0822)-12344321', '$2y$10$vfRP2XVnEkFgXeFklKrlWuNHjNwc5Drtak9MYYk.QQAuPEQXQp5RK', 3, 1, '17-03-2019'),
(9, 'Indah Rahmawati', 'indah@gmail.com', 'default.jpg', 'Cakra Mahkota PT', '(0822)-12344311', '$2y$10$NRAMFqOKcBViYVfTBSCFdeomDIOF.hGX2x.TtEKhadvyomZ0Hui9W', 3, 1, '1556113916');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Mentor'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `tgl_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `tgl_buat`) VALUES
(1, 'bj.harisel@gmail.com', 'cmFuZG9tX2J5dGVz', 1553970668);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_tujuan`
--
ALTER TABLE `daftar_tujuan`
  ADD PRIMARY KEY (`daftar_tujuan_id`);

--
-- Indexes for table `daftar_tujuan_nilai`
--
ALTER TABLE `daftar_tujuan_nilai`
  ADD PRIMARY KEY (`daftar_tujuan_nilai_id`);

--
-- Indexes for table `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id_jalan`);

--
-- Indexes for table `jembatan`
--
ALTER TABLE `jembatan`
  ADD PRIMARY KEY (`id_jembatan`);

--
-- Indexes for table `jenis_iklan`
--
ALTER TABLE `jenis_iklan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `koordinatjalan`
--
ALTER TABLE `koordinatjalan`
  ADD PRIMARY KEY (`id_koordinatjalan`);

--
-- Indexes for table `koordinatjembatan`
--
ALTER TABLE `koordinatjembatan`
  ADD PRIMARY KEY (`id_koordinatjembatan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  ADD PRIMARY KEY (`kriteria_nilai_id`);

--
-- Indexes for table `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indexes for table `peserta_nilai`
--
ALTER TABLE `peserta_nilai`
  ADD PRIMARY KEY (`peserta_nilai_id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`subkriteria_id`);

--
-- Indexes for table `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  ADD PRIMARY KEY (`subkriteria_hasil_id`);

--
-- Indexes for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  ADD PRIMARY KEY (`subkriteria_nilai_id`);

--
-- Indexes for table `submit_iklan`
--
ALTER TABLE `submit_iklan`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `tipe_iklan`
--
ALTER TABLE `tipe_iklan`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftar_tujuan`
--
ALTER TABLE `daftar_tujuan`
  MODIFY `daftar_tujuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `daftar_tujuan_nilai`
--
ALTER TABLE `daftar_tujuan_nilai`
  MODIFY `daftar_tujuan_nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jenis_iklan`
--
ALTER TABLE `jenis_iklan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `kriteria_nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `peserta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta_nilai`
--
ALTER TABLE `peserta_nilai`
  MODIFY `peserta_nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `subkriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  MODIFY `subkriteria_hasil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  MODIFY `subkriteria_nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `submit_iklan`
--
ALTER TABLE `submit_iklan`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tipe_iklan`
--
ALTER TABLE `tipe_iklan`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
