-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jan 2018 pada 08.18
-- Versi Server: 10.1.21-MariaDB
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
-- Struktur dari tabel `refakses`
--

DROP TABLE IF EXISTS `refakses`;
CREATE TABLE `refakses` (
  `level` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `refbehavior`
--

DROP TABLE IF EXISTS `refbehavior`;
CREATE TABLE `refbehavior` (
  `idbhv` int(11) NOT NULL,
  `nmbhv` varchar(100) NOT NULL,
  `point` smallint(6) NOT NULL DEFAULT '1',
  `target` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `refbehavior`
--

INSERT INTO `refbehavior` (`idbhv`, `nmbhv`, `point`, `target`) VALUES
(1, 'Keberadaan', 1, 80),
(2, 'Integritas', 1, 80),
(3, 'Inisiatif', 1, 80),
(4, 'Kehandalan', 1, 80),
(5, 'Kepatuhan', 1, 80),
(6, 'Kerjasama', 1, 80),
(7, 'Sikap perilaku', 1, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `refgrplayan`
--

DROP TABLE IF EXISTS `refgrplayan`;
CREATE TABLE `refgrplayan` (
  `idgrp` int(11) NOT NULL,
  `grouplayan` varchar(150) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `refgrplayan`
--

INSERT INTO `refgrplayan` (`idgrp`, `grouplayan`, `point`) VALUES
(1, 'khusus I', 2),
(2, 'KHUSUS II', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `refjabatan`
--

DROP TABLE IF EXISTS `refjabatan`;
CREATE TABLE `refjabatan` (
  `idjabatan` int(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `refjabatan`
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
-- Struktur dari tabel `refkualitas`
--

DROP TABLE IF EXISTS `refkualitas`;
CREATE TABLE `refkualitas` (
  `idqly` int(11) NOT NULL,
  `nmqly` varchar(100) NOT NULL,
  `point` float NOT NULL,
  `target` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `refkualitas`
--

INSERT INTO `refkualitas` (`idqly`, `nmqly`, `point`, `target`) VALUES
(2, 'Data Referensi Kualitas', 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `refkuantitas`
--

DROP TABLE IF EXISTS `refkuantitas`;
CREATE TABLE `refkuantitas` (
  `idqty` int(11) NOT NULL,
  `nmqty` varchar(500) NOT NULL,
  `idsatker` smallint(3) NOT NULL,
  `point` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reflayanan`
--

DROP TABLE IF EXISTS `reflayanan`;
CREATE TABLE `reflayanan` (
  `idlayan` int(11) NOT NULL,
  `idgrp` int(11) NOT NULL,
  `nmlayan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `refmenu`
--

DROP TABLE IF EXISTS `refmenu`;
CREATE TABLE `refmenu` (
  `idmenu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `sub` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `urutan` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `refmenu`
--

INSERT INTO `refmenu` (`idmenu`, `menu`, `link`, `icon`, `sub`, `active`, `urutan`) VALUES
(1, 'Nilai Kuantitas (dr)', '', 'fa fa-cubes', 0, 1, 1),
(2, 'Nilai Kualitas', 'kualitas', 'fa fa-thumbs-o-up', 0, 1, 3),
(3, 'Kelengkapan Dok.', 'kualitas/dokrm', '', 2, 0, 4),
(4, 'Kepatuhan FORNAS', 'kualitas/fornas', '', 2, 0, 5),
(5, 'Nilai Perilaku', 'behavior', 'fa fa-heart-o', 0, 1, 6),
(6, 'Kalkulasi', 'kalkulasi', 'fa fa-calculator', 0, 1, 7),
(7, 'Data Referensi', '', 'fa fa-file-text-o', 0, 1, 8),
(8, 'Setting', '', 'fa fa-cogs', 0, 1, 9),
(9, 'Kelola User', 'user', '', 8, 1, 10),
(10, 'Ref. Data Pegawai', 'pegawai', '', 8, 1, 11),
(11, 'Ref. Group Layanan', 'grplayan', '', 7, 1, 12),
(12, 'Ref. Layanan', 'reflayan', '', 7, 1, 13),
(13, 'Target per Pegawai', 'target', '', 8, 1, 14),
(14, 'Upload Data', 'kuantitas', '', 1, 1, 15),
(15, 'Rekap Data', 'kuantitas/rekap', '', 1, 1, 16),
(16, 'Kalkulasi IKI', 'hitung/iki', '', 6, 0, 17),
(17, 'Remunerasi', 'hitung/remun', '', 6, 0, 18),
(18, 'Nilai Kuantitas (non dr)', 'kuantitas', 'fa fa-cubes', 0, 0, 2),
(21, 'Ref. Kualitas', 'refkualitas', '', 7, 1, 13),
(22, 'Ref. Satker', 'refsatker', '', 7, 1, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `refpegawai`
--

DROP TABLE IF EXISTS `refpegawai`;
CREATE TABLE `refpegawai` (
  `idpeg` int(4) NOT NULL,
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
-- Dumping data untuk tabel `refpegawai`
--

INSERT INTO `refpegawai` (`idpeg`, `nip`, `nama`, `jk`, `alamat`, `tempatlhr`, `tgllhr`, `idjabatan`, `dokter`) VALUES
(1, '342536', 'kampret', 'L', 'solo', 'solo', '1970-08-27', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `refsatker`
--

DROP TABLE IF EXISTS `refsatker`;
CREATE TABLE `refsatker` (
  `idsat` smallint(3) NOT NULL,
  `nmsatker` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reftiki`
--

DROP TABLE IF EXISTS `reftiki`;
CREATE TABLE `reftiki` (
  `idiki` int(11) NOT NULL,
  `bawah` float NOT NULL,
  `atas` float NOT NULL,
  `iki` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `refuser`
--

DROP TABLE IF EXISTS `refuser`;
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
-- Dumping data untuk tabel `refuser`
--

INSERT INTO `refuser` (`iduser`, `username`, `password`, `realname`, `email`, `idsat`, `level`, `active`) VALUES
(1, 'admin', '2ff4f43c3a5eb50b52bb2b70863aaad4e5a89cac', 'Administrator', '-', 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbobot`
--

DROP TABLE IF EXISTS `tbobot`;
CREATE TABLE `tbobot` (
  `id` smallint(6) NOT NULL,
  `jnsnilai` smallint(2) NOT NULL,
  `berlaku` date NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tidjp`
--

DROP TABLE IF EXISTS `tidjp`;
CREATE TABLE `tidjp` (
  `idjp` int(11) NOT NULL,
  `nmjp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tidxk1`
--

DROP TABLE IF EXISTS `tidxk1`;
CREATE TABLE `tidxk1` (
  `idxk1` int(11) NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tidxk1`
--

INSERT INTO `tidxk1` (`idxk1`, `dari`, `sampai`, `created`) VALUES
(1, '2017-08-01', '2017-08-31', '2017-12-11 02:34:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tidxk2`
--

DROP TABLE IF EXISTS `tidxk2`;
CREATE TABLE `tidxk2` (
  `idxk2` int(11) NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tidxk2`
--

INSERT INTO `tidxk2` (`idxk2`, `dari`, `sampai`, `created`) VALUES
(1, '2017-08-01', '2017-08-31', '2017-12-13 06:50:18'),
(3, '2018-12-01', '2018-12-31', '2018-01-25 07:38:07'),
(7, '2018-01-01', '2018-01-31', '2018-01-25 09:16:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tidxk3`
--

DROP TABLE IF EXISTS `tidxk3`;
CREATE TABLE `tidxk3` (
  `idxk3` int(11) NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tidxk3`
--

INSERT INTO `tidxk3` (`idxk3`, `dari`, `sampai`, `created`) VALUES
(1, '2018-01-01', '2018-01-31', '2018-01-26 04:24:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tresult`
--

DROP TABLE IF EXISTS `tresult`;
CREATE TABLE `tresult` (
  `idresult` int(11) NOT NULL,
  `idjp` int(11) NOT NULL,
  `idpeg` int(11) NOT NULL,
  `idxk1` int(11) NOT NULL,
  `idxk2` int(11) NOT NULL,
  `idxk3` int(11) NOT NULL,
  `rppoin` float NOT NULL,
  `respoin` float NOT NULL,
  `resiki` float NOT NULL,
  `resjp` float NOT NULL,
  `tgl` datetime NOT NULL,
  `ket` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trkpbehavior`
--

DROP TABLE IF EXISTS `trkpbehavior`;
CREATE TABLE `trkpbehavior` (
  `idrkpbhv` int(11) NOT NULL,
  `idbhv` int(11) NOT NULL,
  `idxk3` int(11) NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `idpeg` int(11) NOT NULL,
  `capaian` float NOT NULL,
  `point` float NOT NULL,
  `jml` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trkpbehavior`
--

INSERT INTO `trkpbehavior` (`idrkpbhv`, `idbhv`, `idxk3`, `dari`, `sampai`, `idpeg`, `capaian`, `point`, `jml`) VALUES
(1, 1, 1, '2018-01-01', '2018-01-31', 1, 23, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trkpkualitas`
--

DROP TABLE IF EXISTS `trkpkualitas`;
CREATE TABLE `trkpkualitas` (
  `idrkpqly` int(11) NOT NULL,
  `idqly` int(11) NOT NULL,
  `idxk2` int(11) NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `idpeg` int(6) NOT NULL,
  `capaian` double NOT NULL,
  `point` float NOT NULL,
  `jml` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `trkpkualitas`
--

INSERT INTO `trkpkualitas` (`idrkpqly`, `idqly`, `idxk2`, `dari`, `sampai`, `idpeg`, `capaian`, `point`, `jml`) VALUES
(1, 1, 1, '2017-08-01', '2017-08-31', 1, 100, 0, 0),
(5, 2, 7, '2018-01-01', '2018-01-31', 1, 22, 0, 0);

--
-- Trigger `trkpkualitas`
--
DROP TRIGGER IF EXISTS `del_tidxk2`;
DELIMITER $$
CREATE TRIGGER `del_tidxk2` AFTER DELETE ON `trkpkualitas` FOR EACH ROW BEGIN
SET @idxk2 = OLD.idxk2;
SET @row = (SELECT COUNT(*) FROM trkpkualitas WHERE idxk2=@idxk2);
IF (!@row) THEN
	DELETE FROM tidxk2 WHERE tidxk2.idxk2=@idxk2;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trkptindakan`
--

DROP TABLE IF EXISTS `trkptindakan`;
CREATE TABLE `trkptindakan` (
  `id` int(11) NOT NULL,
  `idxk1` int(11) NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `idgrplayan` int(11) NOT NULL,
  `grplayan` varchar(100) NOT NULL,
  `idpeg` int(100) NOT NULL,
  `point` int(11) NOT NULL,
  `capaian` int(11) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `trkptindakan`
--

INSERT INTO `trkptindakan` (`id`, `idxk1`, `dari`, `sampai`, `idgrplayan`, `grplayan`, `idpeg`, `point`, `capaian`, `jml`) VALUES
(37, 4, '2017-08-01', '2017-08-31', 1, 'gfg', 1, 2, 1, 2),
(38, 4, '2017-08-01', '2017-08-31', 1, 'fgfg', 1, 2, 4, 8),
(39, 4, '2017-08-01', '2017-08-31', 1, 'abd', 1, 2, 1, 2),
(41, 4, '2017-08-01', '2017-08-31', 1, 'gfr', 1, 2, 1, 2),
(42, 1, '2017-08-01', '2017-08-31', 1, 'gfg', 1, 2, 1, 2),
(43, 1, '2017-08-01', '2017-08-31', 1, 'fgfg', 1, 2, 4, 8),
(44, 1, '2017-08-01', '2017-08-31', 1, 'abd', 1, 2, 1, 2),
(46, 1, '2017-08-01', '2017-08-31', 1, 'gfr', 1, 2, 1, 2);

--
-- Trigger `trkptindakan`
--
DROP TRIGGER IF EXISTS `del_tidxk1`;
DELIMITER $$
CREATE TRIGGER `del_tidxk1` AFTER DELETE ON `trkptindakan` FOR EACH ROW BEGIN
SET @idxk1 = OLD.idxk1;
SET @row = (SELECT COUNT(*) FROM trkptindakan WHERE idxk1=@idxk1);
IF (!@row) THEN
	DELETE FROM tidxk1 WHERE tidxk1.idxk1=@idxk1;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trppoin`
--

DROP TABLE IF EXISTS `trppoin`;
CREATE TABLE `trppoin` (
  `tglberlaku` date NOT NULL,
  `rupiah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttarget`
--

DROP TABLE IF EXISTS `ttarget`;
CREATE TABLE `ttarget` (
  `id` int(11) NOT NULL,
  `idpeg` int(4) NOT NULL,
  `idgrp` int(11) NOT NULL,
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttargetqtydr`
--

DROP TABLE IF EXISTS `ttargetqtydr`;
CREATE TABLE `ttargetqtydr` (
  `id` int(11) NOT NULL,
  `idpeg` int(5) NOT NULL,
  `idgrp` int(11) NOT NULL,
  `target` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttindakan`
--

DROP TABLE IF EXISTS `ttindakan`;
CREATE TABLE `ttindakan` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `norm` varchar(8) NOT NULL,
  `nmpasien` varchar(150) NOT NULL,
  `crbayar` varchar(50) NOT NULL,
  `tipelayan` varchar(50) NOT NULL,
  `layanan` varchar(200) NOT NULL,
  `idgrplayan` int(11) NOT NULL,
  `grplayan` varchar(150) NOT NULL,
  `iddokter` smallint(6) NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `updlog` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ttindakan`
--

INSERT INTO `ttindakan` (`id`, `tgl`, `norm`, `nmpasien`, `crbayar`, `tipelayan`, `layanan`, `idgrplayan`, `grplayan`, `iddokter`, `dokter`, `updlog`) VALUES
(119, '2017-08-15', '308075', 'JOKO SUDARSONO, TN', 'JKN-NON PBI', 'REGULER', 'Pemeriksaan Dokter Spesialis', 1, 'abd', 1, 'dr. Hitaputra Agung Wardhana, Sp.B', '2017-11-16 06:29:09'),
(120, '2017-08-31', '135560', 'YOHANES SUTOPO, SPD', 'JKN-NON PBI', 'REGULER', 'Pemeriksaan Dokter Spesialis', 1, 'dsfd', 1, 'dr. Hitaputra Agung Wardhana, Sp.B', '2017-11-16 06:29:09'),
(121, '2017-08-21', '307463', 'WARNO SUMARTO, TN', 'JKN-PBI', 'REGULER', 'Pemeriksaan Dokter Spesialis', 1, 'gfr', 1, 'dr. Hitaputra Agung Wardhana, Sp.B', '2017-11-16 06:29:09'),
(122, '2017-08-08', '304744', 'DIKI DESMAWAN, SDR', 'JKN-PBI', 'REGULER', 'Pemeriksaan Dokter Spesialis', 1, 'gfg', 1, 'dr. Hitaputra Agung Wardhana, Sp.B', '2017-11-16 06:29:10'),
(123, '2017-08-22', '308075', 'JOKO SUDARSONO, TN', 'JKN-NON PBI', 'REGULER', 'Pemeriksaan Dokter Spesialis', 1, 'fgfg', 1, 'dr. Hitaputra Agung Wardhana, Sp.B', '2017-11-16 06:29:10'),
(124, '2017-08-14', '304363', 'HADI PRAYITNO R BP', 'JKN-PBI', 'REGULER', 'Pemeriksaan Dokter Spesialis', 1, 'fgfg', 1, 'dr. Hitaputra Agung Wardhana, Sp.B', '2017-11-16 06:29:10'),
(125, '2017-08-18', '291460', 'RUSMINI BINTI TUKIMIN. NY', 'JKN-NON PBI', 'REGULER', 'Pemeriksaan Dokter Spesialis', 1, 'fgfg', 1, 'dr. Hitaputra Agung Wardhana, Sp.B', '2017-11-16 06:29:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `refbehavior`
--
ALTER TABLE `refbehavior`
  ADD PRIMARY KEY (`idbhv`);

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
-- Indexes for table `refkualitas`
--
ALTER TABLE `refkualitas`
  ADD PRIMARY KEY (`idqly`);

--
-- Indexes for table `refkuantitas`
--
ALTER TABLE `refkuantitas`
  ADD PRIMARY KEY (`idqty`);

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
-- Indexes for table `refpegawai`
--
ALTER TABLE `refpegawai`
  ADD KEY `idpeg` (`idpeg`);

--
-- Indexes for table `refsatker`
--
ALTER TABLE `refsatker`
  ADD PRIMARY KEY (`idsat`);

--
-- Indexes for table `reftiki`
--
ALTER TABLE `reftiki`
  ADD PRIMARY KEY (`idiki`);

--
-- Indexes for table `refuser`
--
ALTER TABLE `refuser`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tbobot`
--
ALTER TABLE `tbobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tidjp`
--
ALTER TABLE `tidjp`
  ADD PRIMARY KEY (`idjp`);

--
-- Indexes for table `tidxk1`
--
ALTER TABLE `tidxk1`
  ADD PRIMARY KEY (`idxk1`),
  ADD UNIQUE KEY `dari` (`dari`,`sampai`);

--
-- Indexes for table `tidxk2`
--
ALTER TABLE `tidxk2`
  ADD PRIMARY KEY (`idxk2`),
  ADD UNIQUE KEY `dari` (`dari`,`sampai`);

--
-- Indexes for table `tidxk3`
--
ALTER TABLE `tidxk3`
  ADD PRIMARY KEY (`idxk3`),
  ADD UNIQUE KEY `dari` (`dari`,`sampai`);

--
-- Indexes for table `tresult`
--
ALTER TABLE `tresult`
  ADD PRIMARY KEY (`idresult`);

--
-- Indexes for table `trkpbehavior`
--
ALTER TABLE `trkpbehavior`
  ADD PRIMARY KEY (`idrkpbhv`),
  ADD UNIQUE KEY `idbhv` (`idbhv`,`idxk3`,`idpeg`);

--
-- Indexes for table `trkpkualitas`
--
ALTER TABLE `trkpkualitas`
  ADD PRIMARY KEY (`idrkpqly`),
  ADD UNIQUE KEY `idkw` (`idqly`,`idxk2`,`idpeg`);

--
-- Indexes for table `trkptindakan`
--
ALTER TABLE `trkptindakan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dari` (`idxk1`,`idgrplayan`,`grplayan`,`idpeg`) USING BTREE;

--
-- Indexes for table `trppoin`
--
ALTER TABLE `trppoin`
  ADD PRIMARY KEY (`tglberlaku`);

--
-- Indexes for table `ttarget`
--
ALTER TABLE `ttarget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttargetqtydr`
--
ALTER TABLE `ttargetqtydr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttindakan`
--
ALTER TABLE `ttindakan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tgl` (`tgl`,`norm`,`layanan`,`iddokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `refbehavior`
--
ALTER TABLE `refbehavior`
  MODIFY `idbhv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `refgrplayan`
--
ALTER TABLE `refgrplayan`
  MODIFY `idgrp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `refjabatan`
--
ALTER TABLE `refjabatan`
  MODIFY `idjabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `refkualitas`
--
ALTER TABLE `refkualitas`
  MODIFY `idqly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `refkuantitas`
--
ALTER TABLE `refkuantitas`
  MODIFY `idqty` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reflayanan`
--
ALTER TABLE `reflayanan`
  MODIFY `idlayan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `refmenu`
--
ALTER TABLE `refmenu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `refpegawai`
--
ALTER TABLE `refpegawai`
  MODIFY `idpeg` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `refsatker`
--
ALTER TABLE `refsatker`
  MODIFY `idsat` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `refuser`
--
ALTER TABLE `refuser`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbobot`
--
ALTER TABLE `tbobot`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tidjp`
--
ALTER TABLE `tidjp`
  MODIFY `idjp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tidxk1`
--
ALTER TABLE `tidxk1`
  MODIFY `idxk1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tidxk2`
--
ALTER TABLE `tidxk2`
  MODIFY `idxk2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tidxk3`
--
ALTER TABLE `tidxk3`
  MODIFY `idxk3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tresult`
--
ALTER TABLE `tresult`
  MODIFY `idresult` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trkpbehavior`
--
ALTER TABLE `trkpbehavior`
  MODIFY `idrkpbhv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trkpkualitas`
--
ALTER TABLE `trkpkualitas`
  MODIFY `idrkpqly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trkptindakan`
--
ALTER TABLE `trkptindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `ttarget`
--
ALTER TABLE `ttarget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ttargetqtydr`
--
ALTER TABLE `ttargetqtydr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ttindakan`
--
ALTER TABLE `ttindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
