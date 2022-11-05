-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.35-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_app_naya_01.barang
DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `idbarang` char(7) NOT NULL DEFAULT '',
  `namabarang` varchar(50) CHARACTER SET latin1 NOT NULL,
  `harga` varchar(20) CHARACTER SET latin1 NOT NULL,
  `stok` int(7) NOT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.barang: ~9 rows (approximately)
INSERT INTO `barang` (`idbarang`, `namabarang`, `harga`, `stok`) VALUES
	('003982', 'Oii ini barang', '2000', 164),
	('1001', 'kursi', 'Rp.1.000.000', 3),
	('1002', 'Lemari kayu kamar', 'Rp. 3.500.000', 6),
	('1003', 'n,,jvhjc', '10000', 5),
	('333', 'Crreator', '2000', 300),
	('3332', 'Oii ini barang', '50000', 600),
	('3332e43', 'Oii ini barang', '50000', 300),
	('404', 'Oii ini barang', '500000', 300),
	('randomi', 'Crreator', '50000', 300);

-- Dumping structure for table db_app_naya_01.keluar
DROP TABLE IF EXISTS `keluar`;
CREATE TABLE IF NOT EXISTS `keluar` (
  `id_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` char(7) NOT NULL DEFAULT '',
  `nama_barang` varchar(20) CHARACTER SET latin1 NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_keluar`),
  KEY `FK_keluar_barang` (`idbarang`),
  CONSTRAINT `FK_keluar_barang` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.keluar: ~0 rows (approximately)
INSERT INTO `keluar` (`id_keluar`, `idbarang`, `nama_barang`, `jumlah`, `harga`, `tanggal`) VALUES
	(4234234, '003982', 'Some nama barang', 200, '50000', '0000-00-00 00:00:00');

-- Dumping structure for table db_app_naya_01.login
DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.login: ~3 rows (approximately)
INSERT INTO `login` (`email`, `password`) VALUES
	('derankusen@gmail.com', '12345'),
	('jayakusen@gmail.com', '1212'),
	('sdenni@mail.com', '123123');

-- Dumping structure for table db_app_naya_01.masuk
DROP TABLE IF EXISTS `masuk`;
CREATE TABLE IF NOT EXISTS `masuk` (
  `id_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` char(7) NOT NULL DEFAULT '',
  `nama_barang` varchar(20) NOT NULL DEFAULT '0',
  `jumlah` int(11) NOT NULL,
  `harga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_masuk`),
  KEY `id_barang` (`idbarang`) USING BTREE,
  CONSTRAINT `FK_masuk_barang` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.masuk: ~6 rows (approximately)
INSERT INTO `masuk` (`id_masuk`, `idbarang`, `nama_barang`, `jumlah`, `harga`, `tanggal`) VALUES
	(34, '003982', 'Some nama barang', 3, '50000', '2022-01-22 00:00:00'),
	(35, '003982', 'Some nama barang', 3, '50000', '2022-01-22 01:01:01'),
	(44, '003982', 'Some nama barang', 10, '50000', '2022-10-22 18:01:01'),
	(333, '003982', 'Some nama barang', 10, '50000', '0000-00-00 00:00:00'),
	(1001, '333', 'Some nama barang', 10, '50000', '0000-00-00 00:00:00'),
	(34232, '003982', 'Some nama barang', 3, '50000', '2022-11-05 19:57:44'),
	(434234, '003982', 'Some nama barang', 10, '50000', '0000-00-00 00:00:00'),
	(1001343, '1003', 'fsdfsdf', 10, '50000', '0000-00-00 00:00:00'),
	(3123123, '003982', 'Some nama barang', 3, '50000', '0000-00-00 00:00:00'),
	(43423442, '003982', 'Some nama barang', 10, '50000', '0000-00-00 00:00:00'),
	(43423443, '003982', 'Some nama barang', 25, '50000', '0000-00-00 00:00:00');

-- Dumping structure for table db_app_naya_01.petugas
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(20) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `no_telp` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.petugas: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
