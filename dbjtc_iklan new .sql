-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 05:31 PM
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
  `status` enum('lolos','daftar') DEFAULT 'daftar',
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_tujuan`
--

INSERT INTO `daftar_tujuan` (`daftar_tujuan_id`, `tujuan_id`, `jalan_id`, `status`, `total`) VALUES
(3, 2, 5, 'daftar', 0),
(5, 1, 6, 'daftar', 0),
(6, 1, 13, 'daftar', 0);

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
(30, 6, 5, 22);

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
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_iklan`
--

INSERT INTO `jenis_iklan` (`id_jenis`, `nama_jenis`, `id_tipe`, `ukuran`, `harga`) VALUES
(3, 'VIDEO TRON', 0, '1', 6500000),
(4, 'BALIHO', 0, '1', 3000000),
(5, 'BILLBOARD', 0, '1', 5000000),
(6, 'SPANDUK', 0, '1', 2000000);

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
(21, 1, 1, 2, 3),
(22, 1, 1, 3, 2),
(23, 1, 1, 4, 1),
(24, 1, 1, 5, 4),
(25, 1, 2, 3, 2),
(26, 1, 2, 4, 2),
(27, 1, 2, 5, 6),
(28, 1, 3, 4, 4),
(29, 1, 3, 5, 2),
(30, 1, 4, 5, 9);

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
  `beasiswa_id` int(11) NOT NULL,
  `subkriteria_id` int(11) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_hasil`
--

INSERT INTO `subkriteria_hasil` (`subkriteria_hasil_id`, `beasiswa_id`, `subkriteria_id`, `prioritas`) VALUES
(1, 3, 16, 1),
(2, 3, 17, 0.6088913020841081),
(3, 3, 18, 0.2782827306130342),
(4, 3, 19, 0.20898353242193896),
(5, 3, 1, 1),
(6, 3, 5, 0.4652226971611079),
(7, 3, 6, 0.20150479274158797),
(8, 3, 7, 0.1264838604896141),
(9, 3, 8, 1),
(10, 3, 9, 0.5949526134405514),
(11, 3, 10, 0.34577828834003443),
(12, 3, 11, 0.20602383687535897),
(13, 3, 12, 1),
(14, 3, 13, 0.4301845987904696),
(15, 3, 14, 0.25758657541918056),
(16, 3, 15, 0.15612791814736754),
(17, 3, 20, 1),
(18, 3, 21, 0.7450778338083753),
(19, 3, 22, 0.2948147336110502),
(20, 3, 23, 0.16278228458671345);

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
(142, 1, 2, 8, 9, 3),
(143, 1, 2, 8, 10, 3),
(144, 1, 2, 8, 11, 4),
(145, 1, 2, 9, 10, 2),
(146, 1, 2, 9, 11, 5),
(147, 1, 2, 10, 11, 2);

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
(6, 'diana_sg@gmail.com', 2, 5, 50, '100', '12313', '', 'Contoh_Kasus1.docx', '2019-07-02', 6, 1500000000, 'Aktif', '2019-07-02', '2019-12-02');

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
(3, 'Testing', 'Tessssss', 20, 2020);

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
(6, 'Diana Satima Gistivani', 'diana_sg@gmail.com', 'default.jpg', 'Subur Makmur CV', '(0822)-12344321', '$2y$10$TR.02QDlDhl8NqRXuL98reSsfaNTd8m5nTIugwj6SyV4i.1Ft5r/u', 3, 1, '17-03-2019'),
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
  MODIFY `daftar_tujuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daftar_tujuan_nilai`
--
ALTER TABLE `daftar_tujuan_nilai`
  MODIFY `daftar_tujuan_nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `kriteria_nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `subkriteria_hasil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  MODIFY `subkriteria_nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `submit_iklan`
--
ALTER TABLE `submit_iklan`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipe_iklan`
--
ALTER TABLE `tipe_iklan`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
