-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2019 pada 03.56
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `dbjtc_iklan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_lengkap` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `unit_kerja` varchar(128) NOT NULL,
  `departemen` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` enum('Admin','Pegawai') NOT NULL,
  `user_aktif` int(1) NOT NULL,
  `tgl_buat` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nm_lengkap`, `email`, `unit_kerja`, `departemen`, `image`, `no_telp`, `password`, `role_id`, `user_aktif`, `tgl_buat`) VALUES
(4, 'Boby James Hari Sel', 'bj.harisel@gmail.com', 'Cabang JTC', 'IT', 'default.jpg', '(0822)-81351399', '$2y$10$rcAYHVLvhIwGabepbCcv5.vOFhimYQOKKzhdvijEmdNRe.8CSvbY2', 'Admin', 1, '24-04-2019'),
(5, 'Rahmat', 'rahmat@gmail.com', 'Kantor Pusat', 'Finance', 'default.jpg', '(0822)-81351399', '$2y$10$bgaxg/UI48jtjBAPMN82KOqg1s4XZBdIk36Fj89Z8sAlr.eyUXjKW', 'Pegawai', 1, '24-04-2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalan`
--

CREATE TABLE IF NOT EXISTS `jalan` (
  `id_jalan` int(11) NOT NULL AUTO_INCREMENT,
  `namajalan` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jalan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `namajalan`, `keterangan`) VALUES
(5, 'JAKARTA CIKAMPEK', 'Panjang Jalur 100 KM'),
(6, 'JAGORAWI', 'Panjang Jalur 70 KM'),
(7, 'PURBALEUNYI', 'Panjang Jalur 60 KM'),
(8, 'JAKARTA TANGERANG', 'Panjang Jalur 80 KM'),
(9, 'PALIKANCI', 'Panjang Jalur 45 KM'),
(10, 'SEMARANG', 'Panjang Jalur 35 KM'),
(11, 'BALMERA', 'Panjang Jalur 60 KM'),
(13, 'SURABAYA GEMPOL', 'Panjang Jalur 130 KM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jembatan`
--

CREATE TABLE IF NOT EXISTS `jembatan` (
  `id_jembatan` int(11) NOT NULL,
  `namajembatan` varchar(32) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_jembatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jembatan`
--

INSERT INTO `jembatan` (`id_jembatan`, `namajembatan`, `keterangan`) VALUES
(0, 'jembatan gantungan', 'jembatan gantung tiga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_iklan`
--

CREATE TABLE IF NOT EXISTS `jenis_iklan` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `jenis_iklan`
--

INSERT INTO `jenis_iklan` (`id_jenis`, `nama_jenis`, `id_tipe`, `ukuran`, `harga`) VALUES
(3, 'VIDEO TRON', 0, '1', 6500000),
(4, 'BALIHO', 0, '1', 3000000),
(5, 'BILLBOARD', 0, '1', 5000000),
(6, 'SPANDUK', 0, '1', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `koordinatjalan`
--

CREATE TABLE IF NOT EXISTS `koordinatjalan` (
  `id_koordinatjalan` int(11) NOT NULL,
  `id_jalan` int(11) DEFAULT NULL,
  `latitude` varchar(24) DEFAULT NULL,
  `longitude` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id_koordinatjalan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `koordinatjalan`
--

INSERT INTO `koordinatjalan` (`id_koordinatjalan`, `id_jalan`, `latitude`, `longitude`) VALUES
(22, 1, '-6.809238024763568', '110.84383249282837'),
(23, 1, '-6.81247657422648', '110.85366010665894'),
(24, 1, '-6.803954028719589', '110.85705041885376');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koordinatjembatan`
--

CREATE TABLE IF NOT EXISTS `koordinatjembatan` (
  `id_koordinatjembatan` int(11) NOT NULL,
  `id_jembatan` int(11) DEFAULT NULL,
  `latitude` varchar(24) DEFAULT NULL,
  `longitude` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id_koordinatjembatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `koordinatjembatan`
--

INSERT INTO `koordinatjembatan` (`id_koordinatjembatan`, `id_jembatan`, `latitude`, `longitude`) VALUES
(3, 1, '-6.798225372656344', '110.92573642730713');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `kriteria_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(50) NOT NULL,
  PRIMARY KEY (`kriteria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `nama_kriteria`) VALUES
(1, 'Volume Kendaraan'),
(2, 'Harga Iklan Per Ruas'),
(3, 'Iklan Terdahulu'),
(4, 'apa si'),
(5, 'apajaalah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kategori`
--

CREATE TABLE IF NOT EXISTS `nilai_kategori` (
  `nilai_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_nilai` varchar(40) NOT NULL,
  PRIMARY KEY (`nilai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `nilai_kategori`
--

INSERT INTO `nilai_kategori` (`nilai_id`, `nama_nilai`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
  `peserta_id` int(11) NOT NULL AUTO_INCREMENT,
  `beasiswa_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `status` enum('daftar','lolos','tidak lolos') NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`peserta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`peserta_id`, `beasiswa_id`, `siswa_id`, `status`, `total`) VALUES
(2, 3, 3, 'lolos', 3.9012057519557),
(3, 3, 4, 'lolos', 0),
(4, 3, 5, 'lolos', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_nilai`
--

CREATE TABLE IF NOT EXISTS `peserta_nilai` (
  `peserta_nilai_id` int(11) NOT NULL AUTO_INCREMENT,
  `peserta_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai_id` int(11) NOT NULL,
  PRIMARY KEY (`peserta_nilai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `peserta_nilai`
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
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE IF NOT EXISTS `subkriteria` (
  `subkriteria_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(50) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `tipe` enum('teks','nilai') NOT NULL,
  `nilai_minimum` double DEFAULT NULL,
  `nilai_maksimum` double DEFAULT NULL,
  `op_min` varchar(4) DEFAULT NULL,
  `op_max` varchar(4) DEFAULT NULL,
  `nilai_id` int(11) NOT NULL,
  PRIMARY KEY (`subkriteria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`subkriteria_id`, `nama_subkriteria`, `kriteria_id`, `tipe`, `nilai_minimum`, `nilai_maksimum`, `op_min`, `op_max`, `nilai_id`) VALUES
(1, '> 90  90', 1, 'nilai', 90, 90, '>', NULL, 1),
(5, '< 80 <= 90', 1, 'nilai', 80, 90, '<', '<=', 2),
(6, '< 70 <= 80', 1, 'nilai', 70, 80, '<', '<=', 3),
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
-- Struktur dari tabel `subkriteria_hasil`
--

CREATE TABLE IF NOT EXISTS `subkriteria_hasil` (
  `subkriteria_hasil_id` int(11) NOT NULL AUTO_INCREMENT,
  `beasiswa_id` int(11) NOT NULL,
  `subkriteria_id` int(11) NOT NULL,
  `prioritas` double NOT NULL,
  PRIMARY KEY (`subkriteria_hasil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `subkriteria_hasil`
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
-- Struktur dari tabel `subkriteria_nilai`
--

CREATE TABLE IF NOT EXISTS `subkriteria_nilai` (
  `subkriteria_nilai_id` int(11) NOT NULL AUTO_INCREMENT,
  `beasiswa_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `subkriteria_id_dari` int(11) NOT NULL,
  `subkriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL,
  PRIMARY KEY (`subkriteria_nilai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data untuk tabel `subkriteria_nilai`
--

INSERT INTO `subkriteria_nilai` (`subkriteria_nilai_id`, `beasiswa_id`, `kriteria_id`, `subkriteria_id_dari`, `subkriteria_id_tujuan`, `nilai`) VALUES
(91, 3, 1, 1, 5, 3),
(92, 3, 1, 1, 6, 5),
(93, 3, 1, 1, 7, 6),
(94, 3, 1, 5, 6, 3),
(95, 3, 1, 5, 7, 4),
(96, 3, 1, 6, 7, 2),
(97, 3, 2, 8, 9, 2),
(98, 3, 2, 8, 10, 3),
(99, 3, 2, 8, 11, 4),
(100, 3, 2, 9, 10, 2),
(101, 3, 2, 9, 11, 3),
(102, 3, 2, 10, 11, 2),
(103, 3, 3, 12, 13, 3),
(104, 3, 3, 12, 14, 4),
(105, 3, 3, 12, 15, 5),
(106, 3, 3, 13, 14, 2),
(107, 3, 3, 13, 15, 3),
(108, 3, 3, 14, 15, 2),
(109, 3, 4, 16, 17, 2),
(110, 3, 4, 16, 18, 3),
(111, 3, 4, 16, 19, 5),
(112, 3, 4, 17, 18, 2),
(113, 3, 4, 17, 19, 4),
(114, 3, 4, 18, 19, 1),
(115, 3, 5, 20, 21, 2),
(116, 3, 5, 20, 22, 4),
(117, 3, 5, 20, 23, 4),
(118, 3, 5, 21, 22, 4),
(119, 3, 5, 21, 23, 5),
(120, 3, 5, 22, 23, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submit_iklan`
--

CREATE TABLE IF NOT EXISTS `submit_iklan` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `tgl_jatuh_tempo` date NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `submit_iklan`
--

INSERT INTO `submit_iklan` (`row_id`, `email`, `tipe_iklan`, `jenis_iklan`, `luas`, `lokasi`, `kordinat`, `foto`, `proposal`, `tgl_pengajuan`, `lama_iklan`, `biaya`, `status`, `tgl_aktif`, `tgl_jatuh_tempo`) VALUES
(2, 'diana_sg@gmail.com', 1, 3, 50, '12345', '12345', '', 'Contoh_Kasus.docx', '2019-06-18', 3, 975000000, 'Aktif', '2019-06-18', '2019-07-18'),
(4, 'diana_sg@gmail.com', 3, 3, 5, '100', '12', '', 'contoh_proposal.docx', '2019-06-24', 6, 195000000, 'Aktif', '2019-06-24', '2019-12-23'),
(5, 'diana_sg@gmail.com', 4, 5, 4, '131', '12', '', 'contoh_proposal1.docx', '2019-06-24', 2, 40000000, 'Tidak Akti', '2019-06-27', '2019-06-28'),
(6, 'diana_sg@gmail.com', 2, 5, 50, '100', '12313', '', 'Contoh_Kasus1.docx', '2019-07-02', 6, 1500000000, 'Aktif', '2019-07-02', '2019-12-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_iklan`
--

CREATE TABLE IF NOT EXISTS `tipe_iklan` (
  `id_tipe` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tipe_iklan`
--

INSERT INTO `tipe_iklan` (`id_tipe`, `nama_tipe`) VALUES
(1, 'Produk'),
(2, 'Event'),
(3, 'Brand'),
(4, 'Properti'),
(5, 'Pengumuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan`
--

CREATE TABLE IF NOT EXISTS `tujuan` (
  `id_tujuan` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tujuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `judul`, `keterangan`) VALUES
(1, 'Penentuan Lokasi Terbaik', 'Ruas Terbaik Untuk Iklan di Jalan TOL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `nm_organisasi` varchar(128) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_aktif` int(1) NOT NULL,
  `tgl_buat` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `nm_organisasi`, `no_telp`, `password`, `role_id`, `user_aktif`, `tgl_buat`) VALUES
(6, 'Diana Satima Gistivani', 'diana_sg@gmail.com', 'default.jpg', 'Subur Makmur CV', '(0822)-12344321', '$2y$10$TR.02QDlDhl8NqRXuL98reSsfaNTd8m5nTIugwj6SyV4i.1Ft5r/u', 3, 1, '17-03-2019'),
(9, 'Indah Rahmawati', 'indah@gmail.com', 'default.jpg', 'Cakra Mahkota PT', '(0822)-12344311', '$2y$10$NRAMFqOKcBViYVfTBSCFdeomDIOF.hGX2x.TtEKhadvyomZ0Hui9W', 3, 1, '1556113916');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Mentor'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `tgl_buat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `tgl_buat`) VALUES
(1, 'bj.harisel@gmail.com', 'cmFuZG9tX2J5dGVz', 1553970668);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
