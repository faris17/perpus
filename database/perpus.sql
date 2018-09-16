-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 01:17 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(3) NOT NULL,
  `kodebuku` varchar(10) DEFAULT NULL,
  `namabuku` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlahbuku` int(5) DEFAULT NULL,
  `stok` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `kodebuku`, `namabuku`, `tahun`, `jumlahbuku`, `stok`) VALUES
(2, '2312', 'Portologi', 2018, 5, 5),
(3, '4312', 'Sosiologi', 2001, 4, 4),
(4, '4312', 'Sosiologi', 0000, 4, 4),
(5, '4312', 'Sosiologi', 0000, 4, 4),
(6, '4312', 'Sosiologi', 0000, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `iddenda` int(3) NOT NULL,
  `lamadenda` int(2) DEFAULT NULL,
  `nominal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `idpeminjam` int(3) NOT NULL,
  `kodepeminjam` varchar(10) DEFAULT NULL,
  `namapeminjam` varchar(100) DEFAULT NULL,
  `gender` enum('pria','wanita') DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(12) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `idpetugas` int(3) NOT NULL,
  `namapetugas` varchar(50) DEFAULT NULL,
  `alamat` text,
  `gender` enum('pria','wanita') DEFAULT NULL,
  `nomorhp` varchar(12) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`idpetugas`, `namapetugas`, `alamat`, `gender`, `nomorhp`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'pria', '123456', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `transaksipeminjaman`
--

CREATE TABLE `transaksipeminjaman` (
  `idtransaksipeminjaman` int(3) NOT NULL,
  `tanggalpeminjaman` date DEFAULT NULL,
  `tanggalpemulangan` date DEFAULT NULL,
  `keterangan` text,
  `lamapinjaman` int(3) DEFAULT NULL,
  `peminjam_idpeminjam` int(3) NOT NULL,
  `buku_idbuku` int(3) NOT NULL,
  `petugas_idpetugas` int(3) NOT NULL,
  `jumlahpinjaman` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `transaksipeminjaman`
--
DELIMITER $$
CREATE TRIGGER `transaksipeminjaman_AFTER_INSERT` AFTER INSERT ON `transaksipeminjaman` FOR EACH ROW BEGIN
	UPDATE buku set buku.stok = buku.stok+new.jumlahpinjaman WHERE buku.idbuku = new.buku_idbuku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksipengembalian`
--

CREATE TABLE `transaksipengembalian` (
  `idtransaksipengembalian` int(3) NOT NULL,
  `tanggalkembali` date DEFAULT NULL,
  `denda` varchar(12) DEFAULT NULL,
  `petugas_idpetugas` int(3) NOT NULL,
  `peminjam_idpeminjam` int(3) NOT NULL,
  `buku_idbuku` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`iddenda`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`idpeminjam`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idpetugas`);

--
-- Indexes for table `transaksipeminjaman`
--
ALTER TABLE `transaksipeminjaman`
  ADD PRIMARY KEY (`idtransaksipeminjaman`),
  ADD KEY `fk_transaksipeminjaman_peminjam_idx` (`peminjam_idpeminjam`),
  ADD KEY `fk_transaksipeminjaman_buku1_idx` (`buku_idbuku`),
  ADD KEY `fk_transaksipeminjaman_petugas1_idx` (`petugas_idpetugas`);

--
-- Indexes for table `transaksipengembalian`
--
ALTER TABLE `transaksipengembalian`
  ADD PRIMARY KEY (`idtransaksipengembalian`),
  ADD KEY `fk_transaksipengembalian_petugas1_idx` (`petugas_idpetugas`),
  ADD KEY `fk_transaksipengembalian_peminjam1_idx` (`peminjam_idpeminjam`),
  ADD KEY `fk_transaksipengembalian_buku1_idx` (`buku_idbuku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idbuku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `iddenda` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `idpeminjam` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `idpetugas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksipeminjaman`
--
ALTER TABLE `transaksipeminjaman`
  MODIFY `idtransaksipeminjaman` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksipengembalian`
--
ALTER TABLE `transaksipengembalian`
  MODIFY `idtransaksipengembalian` int(3) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksipeminjaman`
--
ALTER TABLE `transaksipeminjaman`
  ADD CONSTRAINT `fk_transaksipeminjaman_buku1` FOREIGN KEY (`buku_idbuku`) REFERENCES `buku` (`idbuku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksipeminjaman_peminjam` FOREIGN KEY (`peminjam_idpeminjam`) REFERENCES `peminjam` (`idpeminjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksipeminjaman_petugas1` FOREIGN KEY (`petugas_idpetugas`) REFERENCES `petugas` (`idpetugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksipengembalian`
--
ALTER TABLE `transaksipengembalian`
  ADD CONSTRAINT `fk_transaksipengembalian_buku1` FOREIGN KEY (`buku_idbuku`) REFERENCES `buku` (`idbuku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksipengembalian_peminjam1` FOREIGN KEY (`peminjam_idpeminjam`) REFERENCES `peminjam` (`idpeminjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksipengembalian_petugas1` FOREIGN KEY (`petugas_idpetugas`) REFERENCES `petugas` (`idpetugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
