-- phpMyAdmin SQL Dump
-- version 5.0.0
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: [Tanggal dan waktu saat ini]
-- Server version: 8.0.27
-- PHP Version: 8.0.0
-- 
-- Database: `dispusip`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `agenda`
-- 

CREATE TABLE `agenda` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `hari` VARCHAR(100) NOT NULL,
  `judul` VARCHAR(255) NOT NULL,
  `keterangan` TEXT NOT NULL,
  `lokasi` VARCHAR(255) NOT NULL,
  `waktu` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table `agenda`
-- 

INSERT INTO `agenda` VALUES (4, 'Jum\'at, 19 Mei 2023', 'Rapat', 'FGD Reformasi Birokrasi Tematik dan Reformasi Birokrasi General untuk mengoptimalkan Cita Provinsi DKI Jakarta untuk Indonesia Tahun 2023', 'Ruang Pola Bappeda Provinsi DKI Jakarta', '07:30 - Selesai WIB');
INSERT INTO `agenda` VALUES (5, 'Jum\'at, 19 Mei 2023', 'Rapat', 'Undangan Pengukuhan PD IPI Provinsi DKI Jakarta', 'Aula PDS HB Jassin', '13:00 - 15:00 WIB');

-- --------------------------------------------------------

-- 
-- Table structure for table `berita`
-- 

CREATE TABLE `berita` (
  `idberita` INT(11) NOT NULL AUTO_INCREMENT,
  `judul` VARCHAR(255) NOT NULL,
  `isi` TEXT NOT NULL,
  PRIMARY KEY (`idberita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table `berita`
-- 

-- INSERT INTO `berita` VALUES (...); -- Tambahkan data jika diperlukan

-- --------------------------------------------------------

-- 
-- Table structure for table `gambar`
-- 

CREATE TABLE `gambar` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `judul` VARCHAR(255) NOT NULL,
  `gambar` VARCHAR(255) NOT NULL,
  `size` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table `gambar`
-- 

INSERT INTO `gambar` VALUES (33, '', '2023-01-02 (1).jpg', 317920);
INSERT INTO `gambar` VALUES (34, '', 'IMG20200206114808.jpg', 129918);

-- --------------------------------------------------------

-- 
-- Table structure for table `lowongan`
-- 

CREATE TABLE `lowongan` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `kategori` VARCHAR(255) NOT NULL,
  `perusahaan` VARCHAR(255) NOT NULL,
  `pekerjaan` VARCHAR(255) NOT NULL,
  `syarat` TEXT NOT NULL,
  `kontak` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table `lowongan`
-- 

INSERT INTO `lowongan` VALUES (20, '', 'Idul Fitri', 'Selamat Hari Raya Idul Fitri 1444 H " Mohon Maaf Lahir dan Batin', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `pengumuman`
-- 

CREATE TABLE `pengumuman` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `pengumuman` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table `pengumuman`
-- 

INSERT INTO `pengumuman` VALUES (1, 'Pengumuman');

-- --------------------------------------------------------

-- 
-- Table structure for table `video`
-- 

CREATE TABLE `video` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `judul` VARCHAR(255) NOT NULL,
  `video` VARCHAR(255) NOT NULL,
  `durasi` BIGINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table `video`
-- 

INSERT INTO `video` VALUES (14, 'undian', 'undian-31.flv', 31);
INSERT INTO `video` VALUES (15, 'peterpan', 'peterpan-268.flv', 268);
INSERT INTO `video` VALUES (13, 'ksa', 'ksa31.flv', 31);
INSERT INTO `video` VALUES (12, 'dep', 'dep.flv', 31);
INSERT INTO `video` VALUES (11, 'psmensos', 'psmensos.flv', 36);
INSERT INTO `video` VALUES (16, 'siagabencana', 'siagabencana-31.flv', 31);
INSERT INTO `video` VALUES (17, 'k3', 'k3-319.flv', 319);
INSERT INTO `video` VALUES (18, 'trans', 'trans.flv', 120);

-- --------------------------------------------------------

-- 
-- Table structure for table `warnabg`
-- 

CREATE TABLE `warnabg` (
  `id` INT(11) NOT NULL DEFAULT '0',
  `warna` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table `warnabg`
-- 

INSERT INTO `warnabg` VALUES (1, 'F3F3F3');
INSERT INTO `warnabg` VALUES (2, 'Default.jpg');
