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
CREATE TABLE IF NOT EXISTS `barang` (
  `id` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'buah',
  `jenis` char(2) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'informasi barang dengan kode: JI = jadi atau MH = Mentah',
  `harga` int(10) unsigned NOT NULL DEFAULT '0',
  `stok` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.barang: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.keluar
CREATE TABLE IF NOT EXISTS `keluar` (
  `id` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '-',
  `id_pembeli` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '01',
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_keluar_pembeli` (`id_pembeli`),
  CONSTRAINT `FK_keluar_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.keluar: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.keluar_detail
CREATE TABLE IF NOT EXISTS `keluar_detail` (
  `id` char(45) NOT NULL,
  `id_keluar` char(45) DEFAULT NULL,
  `id_barang` char(45) NOT NULL,
  `harga` int(10) unsigned DEFAULT '0',
  `jumlah` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_keluar_detail_barang` (`id_barang`),
  KEY `FK_keluar_detail_keluar` (`id_keluar`),
  CONSTRAINT `FK_keluar_detail_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_keluar_detail_keluar` FOREIGN KEY (`id_keluar`) REFERENCES `keluar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='merupakan tabel detail dari table keluar. dengan isi daftar barang yg keluar (jual)';

-- Dumping data for table db_app_naya_01.keluar_detail: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.login
CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.login: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.masuk
CREATE TABLE IF NOT EXISTS `masuk` (
  `id` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '-',
  `id_suplier` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '01',
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_masuk_penyuplai` (`id_suplier`),
  CONSTRAINT `FK_masuk_penyuplai` FOREIGN KEY (`id_suplier`) REFERENCES `penyuplai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.masuk: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.masuk_detail
CREATE TABLE IF NOT EXISTS `masuk_detail` (
  `id` char(45) NOT NULL,
  `id_masuk` char(45) DEFAULT NULL,
  `id_barang` char(45) NOT NULL,
  `harga` int(10) unsigned DEFAULT '0',
  `jumlah` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_masuk_detail_barang` (`id_barang`),
  KEY `FK_masuk_detail_masuk` (`id_masuk`),
  CONSTRAINT `FK_masuk_detail_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_masuk_detail_masuk` FOREIGN KEY (`id_masuk`) REFERENCES `masuk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='merupakan tabel detail dari table keluar. dengan isi daftar barang yg keluar (jual)';

-- Dumping data for table db_app_naya_01.masuk_detail: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.pembeli
CREATE TABLE IF NOT EXISTS `pembeli` (
  `id` char(45) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL,
  `gender` char(2) NOT NULL DEFAULT 'N' COMMENT 'L = laki2x, P = perempuan, N=tidak disebut',
  `alamat` text,
  `kontak` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_app_naya_01.pembeli: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.penyuplai
CREATE TABLE IF NOT EXISTS `penyuplai` (
  `id` char(45) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(150) DEFAULT NULL,
  `alamat` text,
  `kontak` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_app_naya_01.penyuplai: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.perubahan_barang
CREATE TABLE IF NOT EXISTS `perubahan_barang` (
  `id` char(45) NOT NULL DEFAULT '-',
  `keterangan` text,
  `tanggal` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_app_naya_01.perubahan_barang: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.perubahan_barang_jadi
CREATE TABLE IF NOT EXISTS `perubahan_barang_jadi` (
  `id` char(45) NOT NULL DEFAULT '-',
  `id_perubahan` char(45) DEFAULT NULL,
  `id_barang` char(45) DEFAULT NULL,
  `jumlah` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_perubahan_barang_jadi_perubahan_barang` (`id_perubahan`),
  KEY `FK_perubahan_barang_jadi_barang` (`id_barang`),
  CONSTRAINT `FK_perubahan_barang_jadi_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_perubahan_barang_jadi_perubahan_barang` FOREIGN KEY (`id_perubahan`) REFERENCES `perubahan_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_app_naya_01.perubahan_barang_jadi: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.perubahan_barang_mentah
CREATE TABLE IF NOT EXISTS `perubahan_barang_mentah` (
  `id` char(45) NOT NULL DEFAULT '-',
  `id_perubahan` char(45) DEFAULT NULL,
  `id_barang` char(45) DEFAULT NULL,
  `jumlah` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_perubahan_barang_mentah_perubahan_barang` (`id_perubahan`),
  KEY `FK_perubahan_barang_mentah_barang` (`id_barang`),
  CONSTRAINT `FK_perubahan_barang_mentah_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_perubahan_barang_mentah_perubahan_barang` FOREIGN KEY (`id_perubahan`) REFERENCES `perubahan_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_app_naya_01.perubahan_barang_mentah: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.perubahan_barang_petugas
CREATE TABLE IF NOT EXISTS `perubahan_barang_petugas` (
  `id` char(45) NOT NULL DEFAULT '-',
  `id_perubahan` char(45) DEFAULT NULL,
  `id_petugas` char(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_perubahan_barang_petugas_petugas` (`id_petugas`),
  KEY `FK_perubahan_barang_petugas_perubahan_barang` (`id_perubahan`),
  CONSTRAINT `FK_perubahan_barang_petugas_perubahan_barang` FOREIGN KEY (`id_perubahan`) REFERENCES `perubahan_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_perubahan_barang_petugas_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_app_naya_01.perubahan_barang_petugas: ~0 rows (approximately)

-- Dumping structure for table db_app_naya_01.petugas
CREATE TABLE IF NOT EXISTS `petugas` (
  `id` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `alamat` tinytext CHARACTER SET latin1 NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `gender` varchar(2) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_app_naya_01.petugas: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
