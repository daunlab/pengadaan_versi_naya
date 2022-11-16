-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.40-log - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table dbpendataan.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` char(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'buah',
  `jenis` char(2) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'informasi barang dengan kode: JI = jadi atau MH = Mentah',
  `harga` int(10) unsigned NOT NULL DEFAULT '0',
  `stok` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel dbpendataan.barang: ~3 rows (lebih kurang)
INSERT INTO `barang` (`id`, `nama`, `satuan`, `jenis`, `harga`, `stok`) VALUES
	('1001', 'Lemari', 'buah', 'Ba', 0, 10),
	('1003', 'Jendela', 'buah', 'Ba', 0, 8),
	('1004', 'kayu jati', 'buah', 'Ba', 0, 260);

-- membuang struktur untuk table dbpendataan.keluar
CREATE TABLE IF NOT EXISTS `keluar` (
  `id` char(25) CHARACTER SET latin1 NOT NULL DEFAULT '-',
  `id_pembeli` char(20) CHARACTER SET latin1 NOT NULL DEFAULT '01',
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_keluar_pembeli` (`id_pembeli`),
  CONSTRAINT `FK_keluar_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel dbpendataan.keluar: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.keluar_detail
CREATE TABLE IF NOT EXISTS `keluar_detail` (
  `id` char(45) NOT NULL,
  `id_keluar` char(25) DEFAULT NULL,
  `id_barang` char(20) NOT NULL,
  `harga` int(10) unsigned DEFAULT '0',
  `jumlah` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_keluar_detail_barang` (`id_barang`),
  KEY `FK_keluar_detail_keluar` (`id_keluar`),
  CONSTRAINT `FK_keluar_detail_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_keluar_detail_keluar` FOREIGN KEY (`id_keluar`) REFERENCES `keluar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='merupakan tabel detail dari table keluar. dengan isi daftar barang yg keluar (jual)';

-- Membuang data untuk tabel dbpendataan.keluar_detail: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.login
CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel dbpendataan.login: ~2 rows (lebih kurang)
INSERT INTO `login` (`email`, `password`) VALUES
	('derankusen@gmail.com', '12345'),
	('jayakusen@gmail.com', '1212');

-- membuang struktur untuk table dbpendataan.masuk
CREATE TABLE IF NOT EXISTS `masuk` (
  `id` char(25) CHARACTER SET latin1 NOT NULL DEFAULT '-',
  `id_suplier` char(20) CHARACTER SET latin1 NOT NULL DEFAULT '01',
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_masuk_penyuplai` (`id_suplier`),
  CONSTRAINT `FK_masuk_penyuplai` FOREIGN KEY (`id_suplier`) REFERENCES `penyuplai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel dbpendataan.masuk: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.masuk_detail
CREATE TABLE IF NOT EXISTS `masuk_detail` (
  `id` char(45) NOT NULL,
  `id_masuk` char(25) DEFAULT NULL,
  `id_barang` char(20) NOT NULL,
  `harga` int(10) unsigned DEFAULT '0',
  `jumlah` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_masuk_detail_barang` (`id_barang`),
  KEY `FK_masuk_detail_masuk` (`id_masuk`),
  CONSTRAINT `FK_masuk_detail_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_masuk_detail_masuk` FOREIGN KEY (`id_masuk`) REFERENCES `masuk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='merupakan tabel detail dari table keluar. dengan isi daftar barang yg keluar (jual)';

-- Membuang data untuk tabel dbpendataan.masuk_detail: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.pembeli
CREATE TABLE IF NOT EXISTS `pembeli` (
  `id` char(20) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL,
  `gender` char(2) NOT NULL DEFAULT 'N' COMMENT 'L = laki2x, P = perempuan, N=tidak disebut',
  `alamat` text,
  `kontak` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel dbpendataan.pembeli: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.penyuplai
CREATE TABLE IF NOT EXISTS `penyuplai` (
  `id` char(20) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(150) DEFAULT NULL,
  `alamat` text,
  `kontak` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel dbpendataan.penyuplai: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.perubahan_barang
CREATE TABLE IF NOT EXISTS `perubahan_barang` (
  `id` char(25) NOT NULL DEFAULT '-',
  `keterangan` text,
  `tanggal` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel dbpendataan.perubahan_barang: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.perubahan_barang_jadi
CREATE TABLE IF NOT EXISTS `perubahan_barang_jadi` (
  `id` char(45) NOT NULL DEFAULT '-',
  `id_perubahan` char(25) DEFAULT NULL,
  `id_barang` char(20) DEFAULT NULL,
  `jumlah` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_perubahan_barang_jadi_perubahan_barang` (`id_perubahan`),
  KEY `FK_perubahan_barang_jadi_barang` (`id_barang`),
  CONSTRAINT `FK_perubahan_barang_jadi_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_perubahan_barang_jadi_perubahan_barang` FOREIGN KEY (`id_perubahan`) REFERENCES `perubahan_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel dbpendataan.perubahan_barang_jadi: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.perubahan_barang_mentah
CREATE TABLE IF NOT EXISTS `perubahan_barang_mentah` (
  `id` char(45) NOT NULL DEFAULT '-',
  `id_perubahan` char(25) DEFAULT NULL,
  `id_barang` char(20) DEFAULT NULL,
  `jumlah` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_perubahan_barang_mentah_perubahan_barang` (`id_perubahan`),
  KEY `FK_perubahan_barang_mentah_barang` (`id_barang`),
  CONSTRAINT `FK_perubahan_barang_mentah_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_perubahan_barang_mentah_perubahan_barang` FOREIGN KEY (`id_perubahan`) REFERENCES `perubahan_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel dbpendataan.perubahan_barang_mentah: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.perubahan_barang_petugas
CREATE TABLE IF NOT EXISTS `perubahan_barang_petugas` (
  `id` char(45) NOT NULL DEFAULT '-',
  `id_perubahan` char(25) DEFAULT NULL,
  `id_petugas` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_perubahan_barang_petugas_petugas` (`id_petugas`),
  KEY `FK_perubahan_barang_petugas_perubahan_barang` (`id_perubahan`),
  CONSTRAINT `FK_perubahan_barang_petugas_perubahan_barang` FOREIGN KEY (`id_perubahan`) REFERENCES `perubahan_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_perubahan_barang_petugas_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel dbpendataan.perubahan_barang_petugas: ~0 rows (lebih kurang)

-- membuang struktur untuk table dbpendataan.petugas
CREATE TABLE IF NOT EXISTS `petugas` (
  `id` char(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `alamat` tinytext CHARACTER SET latin1 NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `gender` varchar(2) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel dbpendataan.petugas: ~0 rows (lebih kurang)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
