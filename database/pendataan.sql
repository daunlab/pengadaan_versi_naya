-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 12:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` char(7) NOT NULL DEFAULT '',
  `namabarang` varchar(50) CHARACTER SET latin1 NOT NULL,
  `harga` varchar(20) CHARACTER SET latin1 NOT NULL,
  `stok` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `harga`, `stok`) VALUES
('1001', 'kursi', 'Rp.1.000.000', 3),
('1002', 'Lemari kayu kamar', 'Rp. 3.500.000', 6),
('1003', 'n,,jvhjc', '10000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) CHARACTER SET latin1 NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id_keluar`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `tanggal`) VALUES
(1021, 1001, 'kursi', 1, 'Rp.1.000.000', '2022-03-19 17:00:00'),
(1022, 1002, 'Lemari', 3, 'Rp. 3000,000', '2022-11-29 17:00:00'),
(1023, 1003, 'kayu biasa', 50, 'RP. 10.000.000', '2022-05-29 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`) VALUES
('derankusen@gmail.com', '12345'),
('jayakusen@gmail.com', '1212'),
('sdenni@mail.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id_masuk` int(11) NOT NULL,
  `nama_barang` varchar(20) CHARACTER SET latin1 NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `stok` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id_masuk`, `nama_barang`, `jumlah`, `harga`, `tanggal`, `stok`) VALUES
(111, 'Kayu jati', 80, 'Rp. 15.000.000', '2021-12-31 17:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(20) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `no_telp` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
