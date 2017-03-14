-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Okt 2015 pada 20.28
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_perusahaan_aan`
--
CREATE DATABASE IF NOT EXISTS `db_perusahaan_aan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_perusahaan_aan`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_level` enum('admin','manajer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `user_level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('admin3', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'manajer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `no_kendaraan` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `pemilik_kendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`no_kendaraan`, `jenis_kendaraan`, `pemilik_kendaraan`) VALUES
('AB 8090 DM', 'PUSO', 1),
('AD 8899 GK', 'Kijang', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilikkendaraan`
--

CREATE TABLE IF NOT EXISTS `pemilikkendaraan` (
  `id` int(11) NOT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `nama_pemilik` varchar(50) DEFAULT NULL,
  `alamat_pemilik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilikkendaraan`
--

INSERT INTO `pemilikkendaraan` (`id`, `no_identitas`, `nama_pemilik`, `alamat_pemilik`) VALUES
(1, '089960230592933', 'Sukimin', 'jl. makasan timur bengkulu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `alamat_perusahaan`) VALUES
(1, 'Kencana Putra', 'Kerumahan Sejahtera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE IF NOT EXISTS `sopir` (
  `id` int(11) NOT NULL,
  `noidentitas` varchar(50) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `alamat` varchar(50) NOT NULL DEFAULT '0',
  `no_kendaraan` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id`, `noidentitas`, `nama`, `alamat`, `no_kendaraan`) VALUES
(4, '8849934350', 'Tamamia', 'pasuruan', 'AD 8899 GK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tonase`
--

CREATE TABLE IF NOT EXISTS `tonase` (
  `id` int(11) NOT NULL,
  `perusahaan` int(11) NOT NULL,
  `tujuan` varchar(50) NOT NULL DEFAULT 'WINA',
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jenis_tarikan` enum('Jauh','Dekat') NOT NULL DEFAULT 'Dekat',
  `sopir` int(11) NOT NULL,
  `uangjalan` int(11) NOT NULL,
  `bruto` int(11) NOT NULL DEFAULT '0',
  `tarra` int(11) NOT NULL DEFAULT '0',
  `tonase` int(11) NOT NULL DEFAULT '0',
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tonase`
--

INSERT INTO `tonase` (`id`, `perusahaan`, `tujuan`, `tanggal`, `jenis_tarikan`, `sopir`, `uangjalan`, `bruto`, `tarra`, `tonase`, `keterangan`) VALUES
(1, 1, 'WINA', '2015-10-27 19:47:20', 'Dekat', 4, 54645, 15000, 100, 4564, 'uidueid'),
(2, 1, 'WINA', '2015-10-27 00:00:00', 'Dekat', 4, 54645, 24000, 2500, 4564, 'uidueid'),
(3, 1, 'WINA', '2015-10-04 00:00:00', 'Jauh', 4, 500, 2000, 1000, 500, '-'),
(4, 1, 'WINA', '2015-10-07 00:00:00', 'Jauh', 4, 234, 324, 2342, 234, 'aoeu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`,`user_level`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_kendaraan`), ADD KEY `FK_kendaraan_pemilikkendaraan` (`pemilik_kendaraan`);

--
-- Indexes for table `pemilikkendaraan`
--
ALTER TABLE `pemilikkendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_sopir_kendaraan` (`no_kendaraan`);

--
-- Indexes for table `tonase`
--
ALTER TABLE `tonase`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_Tonase_perusahaan` (`perusahaan`), ADD KEY `FK_Tonase_sopir` (`sopir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemilikkendaraan`
--
ALTER TABLE `pemilikkendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tonase`
--
ALTER TABLE `tonase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
ADD CONSTRAINT `FK_kendaraan_pemilikkendaraan` FOREIGN KEY (`pemilik_kendaraan`) REFERENCES `pemilikkendaraan` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sopir`
--
ALTER TABLE `sopir`
ADD CONSTRAINT `FK_sopir_kendaraan` FOREIGN KEY (`no_kendaraan`) REFERENCES `kendaraan` (`no_kendaraan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tonase`
--
ALTER TABLE `tonase`
ADD CONSTRAINT `FK_Tonase_perusahaan` FOREIGN KEY (`perusahaan`) REFERENCES `perusahaan` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `FK_Tonase_sopir` FOREIGN KEY (`sopir`) REFERENCES `sopir` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
