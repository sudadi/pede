-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 05:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpayman`
--

-- --------------------------------------------------------

--
-- Table structure for table `refakses`
--

CREATE TABLE `refakses` (
  `level` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `refgrplayan`
--

CREATE TABLE `refgrplayan` (
  `idgrp` int(11) NOT NULL,
  `grouplayan` varchar(150) NOT NULL,
  `point` int(11) NOT NULL,
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `refjabatan`
--

CREATE TABLE `refjabatan` (
  `idjabatan` int(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `refjabatan`
--

INSERT INTO `refjabatan` (`idjabatan`, `jabatan`, `level`) VALUES
(1, 'Dokter Pendidik Klinis Utama (JFT)', ''),
(2, 'Direktur Keuangan', ''),
(3, 'Dokter Madya (JFT)', ''),
(4, 'Dokter Pendidik Klinis Madya (JFT)', ''),
(5, 'Direktur Umum, SDM, dan Pendidikan', ''),
(6, 'Kepala Bidang Pelayanan Medik', ''),
(7, 'Dokter Gigi Madya (JFT)', ''),
(8, 'Perawat Madya (JFT)', ''),
(9, 'Direktur Medik dan Keperawatan', ''),
(10, 'Apoteker Madya (JFT)', ''),
(11, 'Kepala Bagian Sumber Daya Manusia', ''),
(12, 'Kabag Perbendaharaan dan Mobilisasi Dana', ''),
(13, 'Kepala Bagian Umum', ''),
(14, 'Psikolog Klinis (JFU)', ''),
(15, 'Kabag Akuntansi', ''),
(16, 'Kepala Bagian Pendidikan dan Penelitian', ''),
(17, 'Perawat (JFU)', ''),
(18, 'Kepala Sub Bagian Tata Usaha dan Rumah Tangga', ''),
(19, 'Dokter Gigi (JFU)', ''),
(20, 'Auditor (JFU)', ''),
(21, 'Fisioterapis Madya (JFT)', ''),
(22, 'Kepala Seksi Pelayanan Medik Rawat Jalan', ''),
(23, 'Perencana (JFU)', ''),
(24, 'Pengevaluasi (JFU)', ''),
(25, 'Perawat Penyelia (JFT)', ''),
(26, 'Auditor Muda (JFT)', ''),
(27, 'Dokter Muda (JFT)', ''),
(28, 'Kepala Sub Bagian Akuntansi Manajemen dan Verifikasi', ''),
(29, 'Teknisi Elektromedis Penyelia (JFT)', ''),
(30, 'Penyusun Bahan Pemeriksaan (JFU)', ''),
(31, 'Pranata Laboratorium Kesehatan Penyelia (JFT)', ''),
(32, 'Perekam Medis Penyelia (JFT)', ''),
(33, 'Kepala Sub Bagian Mobilisasi Dana', ''),
(34, 'Fisioterapis Penyelia (JFT)', ''),
(35, 'Pengelola Pengadaan Barang /Jasa (JFU)', ''),
(36, 'Radiografer Penyelia (JFT)', ''),
(37, 'Kepala Sub Bagian Kepegawaian', ''),
(38, 'Perawat Muda (JFT)', ''),
(39, 'Kepala Sub Bagian Perencanaan dan Evaluasi', ''),
(40, 'Dokter Pendidik Klinis Muda (JFT)', ''),
(41, 'Pekerja Sosial Penyelia (JFT)', ''),
(42, 'Kepala Seksi Pelayanan Keperawatan Rawat Inap', ''),
(43, 'Pengolah Data (JFU)', ''),
(44, 'Kepala Subbagian Hukum, Organisasi dan Pemasaran', ''),
(45, 'Kasubbag Perbendaharaan', ''),
(46, 'Pustakawan (JFU)', ''),
(47, 'Pengadministrasi Umum (JFU)', ''),
(48, 'Fisioterapis Muda (JFT)', ''),
(49, 'Kepala Bidang Pelayanan Keperawatan', ''),
(50, 'Pranata Laboratorium Kesehatan Muda (JFT)', ''),
(51, 'Sanitarian Muda (JFT)', ''),
(52, 'Nutrisionis Muda (JFT)', ''),
(53, 'Ortotis Prostetis Penyelia (JFT)', ''),
(54, 'Kepala Seksi Pelayanan Rawat Inap', ''),
(55, 'Dokter (JFU)', ''),
(56, 'Sanitarian (JFU)', ''),
(57, 'Dokter Pertama (JFT)', ''),
(58, 'Analis Kepegawaian Penyelia (JFT)', ''),
(59, 'Kepala Seksi Pelayanan Keperawatan Rawat Jalan', ''),
(60, 'Sanitarian Penyelia (JFT)', ''),
(61, 'Nutrisionis Penyelia (JFT)', ''),
(62, 'Kepala Sub Bagian Pendidikan dan Pelatihan Kesehatan', ''),
(63, 'Bendahara (JFU)', ''),
(64, 'Radiografer Pelaksana Lanjutan (JFT)', ''),
(65, 'Penata Laporan Keuangan (JFU)', ''),
(66, 'Pranata Laboratorium Kesehatan Pelaksana Lanjutan (JFT)', ''),
(67, 'Kepala Sub Bagian Akuntansi Keuangan', ''),
(68, 'Kasubbag Penyusunan Anggaran', ''),
(69, 'Pranata Komputer (JFU)', ''),
(70, 'Analis Kepegawaian (JFU)', ''),
(71, 'Perawat Gigi Penyelia (JFT)', ''),
(72, 'Asisten Apoteker Penyelia (JFT)', ''),
(73, 'Perawat Pelaksana Lanjutan (JFT)', ''),
(74, 'Okupasi Terapis Penyelia (JFT)', ''),
(75, 'Teknisi Jaringan (Air, Listrik, Telp) (JFU)', ''),
(76, 'Pembantu Orang Sakit (JFU)', ''),
(77, 'Petugas Gudang (JFU)', ''),
(78, 'Pranata Hubungan Masyarakat Pelaksana Lanjutan (JFT)', ''),
(79, 'Binatu (JFU)', ''),
(80, 'Pranata Hubungan Masyarakat Pertama (JFT)', ''),
(81, 'Analis Kepegawaian Pelaksana Lanjutan (JFT)', ''),
(82, 'Pengadministrasi Keuangan (JFU)', ''),
(83, 'Bendahara Pembantu/PUM (JFU)', ''),
(84, 'Pengelola BMN (JFU)', ''),
(85, 'Perawat Pertama (JFT)', ''),
(86, 'Fisioterapis Pelaksana Lanjutan (JFT)', ''),
(87, 'Operator Mesin (Lift, Genset, Air) (JFU)', ''),
(88, 'Fisioterapis Pertama (JFT)', ''),
(89, 'Nutrisionis Pertama (JFT)', ''),
(90, 'Pembuat Daftar Gaji (JFU)', ''),
(91, 'Teknisi Elektromedis Pelaksana Lanjutan (JFT)', ''),
(92, 'Asisten Apoteker Pelaksana Lanjutan (JFT)', ''),
(93, 'Arsiparis (JFU)', ''),
(94, 'Juru Bayar/Kasir (JFU)', ''),
(95, 'Perekam Medis Pelaksana Lanjutan (JFT)', ''),
(96, 'Apoteker (JFU)', ''),
(97, 'Perawat Gigi Pelaksana Lanjutan (JFT)', ''),
(98, 'Perekam Medis Pertama (JFT)', ''),
(99, 'Teknisi Gigi Pelaksana Lanjutan (JFT)', ''),
(100, 'Pekerja Sosial Pertama (JFT)', ''),
(101, 'Pengemudi Ambulan (JFU)', ''),
(102, 'Teknisi Mesin (JFU)', ''),
(103, 'Okupasi Terapis Pelaksana Lanjutan (JFT)', ''),
(104, 'Verifikator Keuangan (JFU)', ''),
(105, 'Nutrisionis Pelaksana Lanjutan (JFT)', ''),
(106, 'Ortotis Prostetis Pelaksana Lanjutan (JFT)', ''),
(107, 'Pramu (JFU)', ''),
(108, 'Terapis Wicara Pelaksana Lanjutan (JFT)', ''),
(109, 'Perekam Medis Pelaksana (JFT)', ''),
(110, 'Ortotis Prostetis Pelaksana (JFT)', ''),
(111, 'Perawat Pelaksana (JFT)', ''),
(112, 'Fisioterapis Pelaksana (JFT)', ''),
(113, 'Pranata Laboratorium Kesehatan Pelaksana (JFT)', ''),
(114, 'Radiografer Pelaksana (JFT)', ''),
(115, 'Asisten Apoteker Pelaksana (JFT)', ''),
(116, 'Pengelola Anggaran (JFU)', ''),
(117, 'Analis LHP (JFU)', ''),
(118, 'Caraka (JFU)', ''),
(119, 'Perawat Gigi Pelaksana (JFT)', ''),
(120, 'Ortotik Prostetis Pemula (JFU)', ''),
(121, 'Perawat Pemula (JFU)', ''),
(122, 'Asisten Apoteker Pemula (JFU)', ''),
(123, 'Perekam Medis Pemula (JFU)', ''),
(124, 'Petugas Keamanan (JFU)', ''),
(125, 'Pranata Hubungan Masyarakat Pemula (JFU)', ''),
(126, 'Kepala Sub Bagian Pendidikan dan Penelitian Non Kesehatan', ''),
(127, 'Fisioterapis (JFU)', ''),
(128, 'Radiografer Pemula (JFU)', ''),
(129, 'Asisten Apoteker', '');

-- --------------------------------------------------------

--
-- Table structure for table `reflayanan`
--

CREATE TABLE `reflayanan` (
  `idlayan` varchar(100) NOT NULL,
  `idgrp` int(11) NOT NULL,
  `nmlayan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `refmenu`
--

CREATE TABLE `refmenu` (
  `idmenu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `sub` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refmenu`
--

INSERT INTO `refmenu` (`idmenu`, `menu`, `link`, `icon`, `sub`, `active`) VALUES
(1, 'Kuantitas Pelayanan', 'kuantitas', 'fa fa-file-text', 0, 1),
(2, 'Kualitas Pelayanan', '', '	\r\nfa fa-file-text', 0, 1),
(3, 'Kelengkapan Dok.', 'dokrm', 'fa fa-file-text', 2, 1),
(4, 'Kepatuhan FORNAS', 'fornas', 'fa fa-file-text', 2, 1),
(5, 'Perilaku', 'behavior', 'fa fa-file-text', 0, 1),
(6, 'Kalkulasi', 'kalkulasi', 'fa fa-file-text', 0, 1),
(7, 'Laporan', 'report', 'fa fa-file-text', 0, 1),
(8, 'Setting', '', '	\r\nfa fa-file-text', 0, 1),
(9, 'Kelola User', 'user', 'fa fa-user', 8, 1),
(10, 'Ref. Data Pegawai', 'pegawai', 'fa fa-users', 8, 1),
(11, 'Ref. Group Layanan', 'grouplayan', 'fa fa-users', 8, 1),
(12, 'Ref. Layanan', 'layanan', 'fa fa-user', 8, 1),
(13, 'Target per Pegawai', 'target', 'fa fa-user', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `refpegawai`
--

CREATE TABLE `refpegawai` (
  `idpeg` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `tempatlhr` varchar(100) NOT NULL,
  `tgllhr` date NOT NULL,
  `idjabatan` int(11) NOT NULL,
  `dokter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refpegawai`
--

INSERT INTO `refpegawai` (`idpeg`, `nip`, `nama`, `jk`, `alamat`, `tempatlhr`, `tgllhr`, `idjabatan`, `dokter`) VALUES
(1, '342536', 'kampret', 'L', 'solo', 'solo', '1970-08-27', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `refuser`
--

CREATE TABLE `refuser` (
  `iduser` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `realname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idsat` int(11) NOT NULL,
  `level` tinyint(2) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refuser`
--

INSERT INTO `refuser` (`iduser`, `username`, `password`, `realname`, `email`, `idsat`, `level`, `active`) VALUES
(1, 'admin', '2ff4f43c3a5eb50b52bb2b70863aaad4e5a89cac', 'Administrator', '-', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tlastresult`
--

CREATE TABLE `tlastresult` (
  `idlast` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `dokter` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `point` float NOT NULL,
  `iki` decimal(10,0) NOT NULL,
  `iku` int(11) NOT NULL,
  `jmllast` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tperform`
--

CREATE TABLE `tperform` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `norm` varchar(8) NOT NULL,
  `nmpasien` varchar(150) NOT NULL,
  `crbayar` varchar(50) NOT NULL,
  `tipelayan` varchar(50) NOT NULL,
  `layanan` varchar(200) NOT NULL,
  `idgrplayan` int(11) NOT NULL,
  `dokter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tperform`
--

INSERT INTO `tperform` (`id`, `tgl`, `norm`, `nmpasien`, `crbayar`, `tipelayan`, `layanan`, `idgrplayan`, `dokter`) VALUES
(29, '2017-09-26', '308777', 'kampret', 'JKN', 'reguler', 'pasang infus', 0, 'paijo'),
(30, '2017-09-09', '308777', 'kampret', 'JKN', 'reguler', 'pasang infus', 0, 'paijo');

-- --------------------------------------------------------

--
-- Table structure for table `tresbehav`
--

CREATE TABLE `tresbehav` (
  `idbehav` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `bln` int(11) NOT NULL,
  `thn` int(11) NOT NULL,
  `idpeg` int(6) NOT NULL,
  `capaian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tresbehav`
--

INSERT INTO `tresbehav` (`idbehav`, `tgl`, `bln`, `thn`, `idpeg`, `capaian`) VALUES
(1, '2017-09-27', 9, 2017, 1, 0.9),
(2, '2017-09-27', 9, 2017, 1, 20),
(3, '2017-09-28', 9, 2017, 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tresdokrm`
--

CREATE TABLE `tresdokrm` (
  `idrm` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `bln` int(11) NOT NULL,
  `thn` int(11) NOT NULL,
  `idpeg` int(6) NOT NULL,
  `capaian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tresdokrm`
--

INSERT INTO `tresdokrm` (`idrm`, `tgl`, `bln`, `thn`, `idpeg`, `capaian`) VALUES
(1, '2017-09-27', 9, 2017, 1, 0.9),
(2, '2017-09-27', 9, 2017, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tresfornas`
--

CREATE TABLE `tresfornas` (
  `idfornas` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `bln` int(11) NOT NULL,
  `thn` int(11) NOT NULL,
  `idpeg` int(6) NOT NULL,
  `capaian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tresfornas`
--

INSERT INTO `tresfornas` (`idfornas`, `tgl`, `bln`, `thn`, `idpeg`, `capaian`) VALUES
(1, '2017-09-27', 9, 2017, 1, 0.9),
(2, '2017-09-27', 9, 2017, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tresperform`
--

CREATE TABLE `tresperform` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `idgrp` int(11) NOT NULL,
  `idpeg` int(100) NOT NULL,
  `point` int(11) NOT NULL,
  `capaian` int(11) NOT NULL,
  `jmla` int(11) NOT NULL,
  `targeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `refgrplayan`
--
ALTER TABLE `refgrplayan`
  ADD PRIMARY KEY (`idgrp`);

--
-- Indexes for table `refjabatan`
--
ALTER TABLE `refjabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- Indexes for table `reflayanan`
--
ALTER TABLE `reflayanan`
  ADD PRIMARY KEY (`idlayan`);

--
-- Indexes for table `refmenu`
--
ALTER TABLE `refmenu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `refuser`
--
ALTER TABLE `refuser`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tperform`
--
ALTER TABLE `tperform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tresbehav`
--
ALTER TABLE `tresbehav`
  ADD PRIMARY KEY (`idbehav`);

--
-- Indexes for table `tresdokrm`
--
ALTER TABLE `tresdokrm`
  ADD PRIMARY KEY (`idrm`);

--
-- Indexes for table `tresfornas`
--
ALTER TABLE `tresfornas`
  ADD PRIMARY KEY (`idfornas`);

--
-- Indexes for table `tresperform`
--
ALTER TABLE `tresperform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `refgrplayan`
--
ALTER TABLE `refgrplayan`
  MODIFY `idgrp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `refjabatan`
--
ALTER TABLE `refjabatan`
  MODIFY `idjabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `refmenu`
--
ALTER TABLE `refmenu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `refuser`
--
ALTER TABLE `refuser`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tperform`
--
ALTER TABLE `tperform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tresbehav`
--
ALTER TABLE `tresbehav`
  MODIFY `idbehav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tresdokrm`
--
ALTER TABLE `tresdokrm`
  MODIFY `idrm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tresfornas`
--
ALTER TABLE `tresfornas`
  MODIFY `idfornas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
