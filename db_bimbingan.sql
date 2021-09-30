-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 02:14 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bimbingan_new`
--
CREATE DATABASE IF NOT EXISTS `db_bimbingan_new` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_bimbingan_new`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_antrian`
--

CREATE TABLE `tbl_antrian` (
  `id_antrian` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `antrian` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_antrian`
--

INSERT INTO `tbl_antrian` (`id_antrian`, `tanggal`, `antrian`, `status`) VALUES
(34, '2020-02-04', '14001', 1),
(35, '2020-02-04', '13001', 0),
(37, '2020-02-05', '14002', 0),
(38, '2020-02-05', '13002', 0),
(39, '2020-02-05', '14003', 0),
(41, '2020-02-05', '14005', 0),
(42, '2020-02-05', '13003', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubungi`
--

CREATE TABLE `tbl_hubungi` (
  `id_hubungi` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hubungi`
--

INSERT INTO `tbl_hubungi` (`id_hubungi`, `nama`, `email`, `pesan`) VALUES
(1, 'sdfa', 'asdf@adf.com', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `tgl_pertama` date DEFAULT NULL,
  `tgl_terakhir` date DEFAULT NULL,
  `jam_pertama` time DEFAULT NULL,
  `jam_terakhir` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_dosen`, `tgl_pertama`, `tgl_terakhir`, `jam_pertama`, `jam_terakhir`) VALUES
(10, 14, '2020-02-05', '2020-02-08', '07:30:00', '12:00:00'),
(11, 14, '2020-02-04', '2020-02-10', '13:00:00', '15:00:00'),
(12, 13, '2020-02-05', '2020-02-08', '08:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_daftar` int(11) NOT NULL,
  `id_antrian` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `tanggal_besuk` varchar(255) DEFAULT NULL,
  `topik_bimbingan` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_daftar`, `id_antrian`, `nama`, `nim`, `tanggal_besuk`, `topik_bimbingan`, `id_user`) VALUES
(11, 34, 'asdf', '342', '2020-02-04', 'BAB 2', 14),
(12, 35, 'tutik', '322234', '2020-02-04', 'BAB 3', 13),
(14, 37, 'sri sulastri', '14.0504.0038', '2020-02-05', 'BAB 1', 14),
(15, 38, 'Sari', '14.0504.0020', '2020-02-05', 'topik_bimbingan', 13),
(16, 39, 'sarimin', '14.0504.0018', '2020-02-05', 'BAB 4', 14),
(18, 41, 'asdf', '14.0504.0016', '2020-02-05', 'BAB 3', 14),
(19, 42, 'Satrio', '13.0000.0010', '2020-02-05', 'BAB 1', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `akses` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nip`, `username`, `password`, `nama`, `akses`) VALUES
(13, '', 'ghofir', 'ghofir', 'muhamad ghofir', 'Admin'),
(14, '', 'entus', 'entus', 'entus rahman', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indexes for table `tbl_hubungi`
--
ALTER TABLE `tbl_hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `tbl_pendaftaran_ibfk_1` (`id_antrian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_hubungi`
--
ALTER TABLE `tbl_hubungi`
  MODIFY `id_hubungi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_1` FOREIGN KEY (`id_antrian`) REFERENCES `tbl_antrian` (`id_antrian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
