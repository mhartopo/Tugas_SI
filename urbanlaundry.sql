-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2016 at 06:51 AM
-- Server version: 5.6.24-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `urbanlaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `laundry_pengerjaan`
--

CREATE TABLE IF NOT EXISTS `laundry_pengerjaan` (
`id_laundry` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `nama_customer` varchar(20) NOT NULL,
  `alamat_customer` varchar(50) NOT NULL,
  `no_telp_customer` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `parfum` varchar(15) NOT NULL,
  `softener` varchar(15) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `bayar` int(1) NOT NULL,
  `pick_up` int(1) NOT NULL,
  `delivery` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `laundry_selesai`
--

CREATE TABLE IF NOT EXISTS `laundry_selesai` (
  `id_laundry` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `nama_customer` varchar(20) NOT NULL,
  `alamat_customer` varchar(50) NOT NULL,
  `no_telp_customer` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `parfum` varchar(15) NOT NULL,
  `softener` varchar(15) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `bayar` int(1) NOT NULL,
  `pick_up` int(1) NOT NULL,
  `delivery` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`id_member` int(4) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(10) NOT NULL,
  `kuota` int(11) NOT NULL DEFAULT '120000',
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
`id_pengguna` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `peran` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE IF NOT EXISTS `servis` (
  `jenis` varchar(20) NOT NULL,
  `harga` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`jenis`, `harga`) VALUES
('Bedcover Double', 27500),
('Bedcover Single', 17500),
('Blazer/Jas/Gaun', 22500),
('Cuci Satuan', 10000),
('Ekonomis (kg)', 5000),
('Selimut Tebal', 20000),
('Selimut Tipis', 15000),
('Sepatu', 22500),
('Sprei Double', 17500),
('Sprei Single', 10000),
('Stelan Jas', 27500),
('Tas/Ransel', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `servis_pengerjaan`
--

CREATE TABLE IF NOT EXISTS `servis_pengerjaan` (
  `id_laundry` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `jumlah_cucian` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servis_pengerjaan`
--

INSERT INTO `servis_pengerjaan` (`id_laundry`, `jenis`, `jumlah_cucian`) VALUES
(6, 'Ekonomis (kg)', 2),
(15, 'Ekonomis (kg)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `servis_selesai`
--

CREATE TABLE IF NOT EXISTS `servis_selesai` (
  `id_laundry` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `jumlah_cucian` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laundry_pengerjaan`
--
ALTER TABLE `laundry_pengerjaan`
 ADD PRIMARY KEY (`id_laundry`), ADD UNIQUE KEY `id_member` (`id_member`);

--
-- Indexes for table `laundry_selesai`
--
ALTER TABLE `laundry_selesai`
 ADD PRIMARY KEY (`id_laundry`), ADD UNIQUE KEY `id_member` (`id_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`id_pengguna`), ADD UNIQUE KEY `username_idx` (`nama`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
 ADD PRIMARY KEY (`jenis`);

--
-- Indexes for table `servis_pengerjaan`
--
ALTER TABLE `servis_pengerjaan`
 ADD KEY `id_laundry` (`id_laundry`), ADD KEY `jenis` (`jenis`);

--
-- Indexes for table `servis_selesai`
--
ALTER TABLE `servis_selesai`
 ADD KEY `jenis` (`jenis`), ADD KEY `id_laundry` (`id_laundry`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laundry_pengerjaan`
--
ALTER TABLE `laundry_pengerjaan`
MODIFY `id_laundry` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id_member` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
MODIFY `id_pengguna` int(2) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `laundry_pengerjaan`
--
ALTER TABLE `laundry_pengerjaan`
ADD CONSTRAINT `laundry_pengerjaan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `laundry_selesai`
--
ALTER TABLE `laundry_selesai`
ADD CONSTRAINT `laundry_selesai_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `servis_selesai`
--
ALTER TABLE `servis_selesai`
ADD CONSTRAINT `servis_selesai_ibfk_1` FOREIGN KEY (`id_laundry`) REFERENCES `laundry_selesai` (`id_laundry`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `servis_selesai_ibfk_2` FOREIGN KEY (`jenis`) REFERENCES `servis` (`jenis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
