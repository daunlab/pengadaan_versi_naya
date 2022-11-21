-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2022 at 12:26 PM
-- Server version: 5.7.40-log
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpendataan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'buah',
  `jenis` char(2) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'informasi barang dengan kode: JI = jadi atau MH = Mentah',
  `harga` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `stok` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

DROP TABLE IF EXISTS `keluar`;
CREATE TABLE `keluar` (
  `id` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '-',
  `id_pembeli` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '01',
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keluar_detail`
--

DROP TABLE IF EXISTS `keluar_detail`;
CREATE TABLE `keluar_detail` (
  `id` char(45) NOT NULL,
  `id_keluar` char(45) DEFAULT NULL,
  `id_barang` char(45) NOT NULL,
  `harga` int(10) UNSIGNED DEFAULT '0',
  `jumlah` smallint(5) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='merupakan tabel detail dari table keluar. dengan isi daftar barang yg keluar (jual)';

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

DROP TABLE IF EXISTS `masuk`;
CREATE TABLE `masuk` (
  `id` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '-',
  `id_suplier` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '01',
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `masuk_detail`
--

DROP TABLE IF EXISTS `masuk_detail`;
CREATE TABLE `masuk_detail` (
  `id` char(45) NOT NULL,
  `id_masuk` char(45) DEFAULT NULL,
  `id_barang` char(45) NOT NULL,
  `harga` int(10) UNSIGNED DEFAULT '0',
  `jumlah` smallint(5) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='merupakan tabel detail dari table keluar. dengan isi daftar barang yg keluar (jual)' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

DROP TABLE IF EXISTS `pembeli`;
CREATE TABLE `pembeli` (
  `id` char(45) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL,
  `gender` char(2) NOT NULL DEFAULT 'N' COMMENT 'L = laki2x, P = perempuan, N=tidak disebut',
  `alamat` text,
  `kontak` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `penyuplai`
--

DROP TABLE IF EXISTS `penyuplai`;
CREATE TABLE `penyuplai` (
  `id` char(45) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(150) DEFAULT NULL,
  `alamat` text,
  `kontak` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_barang`
--

DROP TABLE IF EXISTS `perubahan_barang`;
CREATE TABLE `perubahan_barang` (
  `id` char(45) NOT NULL DEFAULT '-',
  `keterangan` text,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_barang_jadi`
--

DROP TABLE IF EXISTS `perubahan_barang_jadi`;
CREATE TABLE `perubahan_barang_jadi` (
  `id` char(45) NOT NULL DEFAULT '-',
  `id_perubahan` char(25) DEFAULT NULL,
  `id_barang` char(20) DEFAULT NULL,
  `jumlah` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_barang_mentah`
--

DROP TABLE IF EXISTS `perubahan_barang_mentah`;
CREATE TABLE `perubahan_barang_mentah` (
  `id` char(45) NOT NULL DEFAULT '-',
  `id_perubahan` char(45) DEFAULT NULL,
  `id_barang` char(45) DEFAULT NULL,
  `jumlah` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_barang_petugas`
--

DROP TABLE IF EXISTS `perubahan_barang_petugas`;
CREATE TABLE `perubahan_barang_petugas` (
  `id` char(45) NOT NULL DEFAULT '-',
  `id_perubahan` char(45) DEFAULT NULL,
  `id_petugas` char(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `alamat` tinytext CHARACTER SET latin1 NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `gender` varchar(2) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK_keluar_pembeli` (`id_pembeli`);

--
-- Indexes for table `keluar_detail`
--
ALTER TABLE `keluar_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_keluar_detail_barang` (`id_barang`),
  ADD KEY `FK_keluar_detail_keluar` (`id_keluar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK_masuk_penyuplai` (`id_suplier`);

--
-- Indexes for table `masuk_detail`
--
ALTER TABLE `masuk_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_masuk_detail_barang` (`id_barang`),
  ADD KEY `FK_masuk_detail_masuk` (`id_masuk`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyuplai`
--
ALTER TABLE `penyuplai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perubahan_barang`
--
ALTER TABLE `perubahan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perubahan_barang_jadi`
--
ALTER TABLE `perubahan_barang_jadi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_perubahan_barang_jadi_perubahan_barang` (`id_perubahan`),
  ADD KEY `FK_perubahan_barang_jadi_barang` (`id_barang`);

--
-- Indexes for table `perubahan_barang_mentah`
--
ALTER TABLE `perubahan_barang_mentah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_perubahan_barang_mentah_perubahan_barang` (`id_perubahan`),
  ADD KEY `FK_perubahan_barang_mentah_barang` (`id_barang`);

--
-- Indexes for table `perubahan_barang_petugas`
--
ALTER TABLE `perubahan_barang_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_perubahan_barang_petugas_petugas` (`id_petugas`),
  ADD KEY `FK_perubahan_barang_petugas_perubahan_barang` (`id_perubahan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `FK_keluar_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keluar_detail`
--
ALTER TABLE `keluar_detail`
  ADD CONSTRAINT `FK_keluar_detail_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_keluar_detail_keluar` FOREIGN KEY (`id_keluar`) REFERENCES `keluar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `FK_masuk_penyuplai` FOREIGN KEY (`id_suplier`) REFERENCES `penyuplai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `masuk_detail`
--
ALTER TABLE `masuk_detail`
  ADD CONSTRAINT `FK_masuk_detail_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_masuk_detail_masuk` FOREIGN KEY (`id_masuk`) REFERENCES `masuk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perubahan_barang_jadi`
--
ALTER TABLE `perubahan_barang_jadi`
  ADD CONSTRAINT `FK_perubahan_barang_jadi_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_perubahan_barang_jadi_perubahan_barang` FOREIGN KEY (`id_perubahan`) REFERENCES `perubahan_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perubahan_barang_mentah`
--
ALTER TABLE `perubahan_barang_mentah`
  ADD CONSTRAINT `FK_perubahan_barang_mentah_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_perubahan_barang_mentah_perubahan_barang` FOREIGN KEY (`id_perubahan`) REFERENCES `perubahan_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perubahan_barang_petugas`
--
ALTER TABLE `perubahan_barang_petugas`
  ADD CONSTRAINT `FK_perubahan_barang_petugas_perubahan_barang` FOREIGN KEY (`id_perubahan`) REFERENCES `perubahan_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_perubahan_barang_petugas_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
