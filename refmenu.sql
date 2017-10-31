-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 09:53 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `refmenu`
--
ALTER TABLE `refmenu`
  ADD PRIMARY KEY (`idmenu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `refmenu`
--
ALTER TABLE `refmenu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
