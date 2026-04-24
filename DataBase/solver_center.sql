-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2026 at 09:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solver_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_ad` int(8) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Sex` enum('L','P') NOT NULL DEFAULT 'L',
  `No_hp` varchar(12) DEFAULT NULL,
  `noj` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_ad`, `Nama`, `Sex`, `No_hp`, `noj`) VALUES
(3, 'amoeh', 'L', '085318385846', '100');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `noj` varchar(8) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`noj`, `jabatan`) VALUES
('10', 'Solver'),
('100', 'Admin'),
('1000', 'Promotor');

-- --------------------------------------------------------

--
-- Table structure for table `promotor`
--

CREATE TABLE `promotor` (
  `Id_Pro` int(8) NOT NULL,
  `Nama_p` varchar(25) NOT NULL,
  `Sex` enum('L','P') NOT NULL DEFAULT 'L',
  `No_hp` varchar(12) DEFAULT NULL,
  `noj` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotor`
--

INSERT INTO `promotor` (`Id_Pro`, `Nama_p`, `Sex`, `No_hp`, `noj`) VALUES
(2, 'Adi', 'L', '082258705675', '1000'),
(3, 'Wida', 'P', '089765453334', '1000'),
(4, 'Yudi', 'L', '089765453334', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `solvee`
--

CREATE TABLE `solvee` (
  `Id_S` int(8) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Sex` enum('L','P') DEFAULT 'L',
  `No_hp` varchar(12) NOT NULL,
  `Alamat` varchar(32) DEFAULT NULL,
  `TTL` varchar(25) DEFAULT NULL,
  `No_Masalah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solvee`
--

INSERT INTO `solvee` (`Id_S`, `Nama`, `Sex`, `No_hp`, `Alamat`, `TTL`, `No_Masalah`) VALUES
(13, 'Adi', 'L', '082258705675', 'Desa parapatan Majalengka', 'Majalengka 20-09-1994', 2),
(14, 'Rian', 'L', '098776345229', 'Bekasi', 'Bekasi 9-07-1998', 3);

-- --------------------------------------------------------

--
-- Table structure for table `solver`
--

CREATE TABLE `solver` (
  `Id_Sol` int(8) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Sex` enum('L','P') DEFAULT 'L',
  `No_Masalah` int(12) NOT NULL,
  `No_hp` varchar(12) NOT NULL,
  `noj` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solver`
--

INSERT INTO `solver` (`Id_Sol`, `Nama`, `Sex`, `No_Masalah`, `No_hp`, `noj`) VALUES
(2, 'Muhadi', 'L', 2, '08999800889', '10'),
(3, 'Yanti', 'P', 4, '089978667890', '10'),
(4, 'Maya', 'P', 1, '082234789093', '10'),
(6, 'Andri', 'L', 5, '08298009876', '10'),
(7, 'Dea', 'P', 3, '098222346778', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masalah`
--

CREATE TABLE `tb_masalah` (
  `No_Masalah` int(12) NOT NULL,
  `Masalah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masalah`
--

INSERT INTO `tb_masalah` (`No_Masalah`, `Masalah`) VALUES
(1, 'Politik'),
(2, 'sosial'),
(3, 'Kurang PD'),
(4, 'Ekonomi'),
(5, 'Keluarga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `Id_user` int(4) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`Id_user`, `Username`, `Password`) VALUES
(1, 'amoeh', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_ad`),
  ADD KEY `noj` (`noj`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`noj`);

--
-- Indexes for table `promotor`
--
ALTER TABLE `promotor`
  ADD PRIMARY KEY (`Id_Pro`),
  ADD KEY `noj` (`noj`);

--
-- Indexes for table `solvee`
--
ALTER TABLE `solvee`
  ADD PRIMARY KEY (`Id_S`),
  ADD UNIQUE KEY `Permasalahan` (`No_Masalah`);

--
-- Indexes for table `solver`
--
ALTER TABLE `solver`
  ADD PRIMARY KEY (`Id_Sol`),
  ADD UNIQUE KEY `No_Masalah` (`No_Masalah`),
  ADD KEY `noj` (`noj`);

--
-- Indexes for table `tb_masalah`
--
ALTER TABLE `tb_masalah`
  ADD PRIMARY KEY (`No_Masalah`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_ad` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promotor`
--
ALTER TABLE `promotor`
  MODIFY `Id_Pro` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `solvee`
--
ALTER TABLE `solvee`
  MODIFY `Id_S` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `solver`
--
ALTER TABLE `solver`
  MODIFY `Id_Sol` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `Id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`noj`) REFERENCES `pegawai` (`noj`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `promotor`
--
ALTER TABLE `promotor`
  ADD CONSTRAINT `promotor_ibfk_1` FOREIGN KEY (`noj`) REFERENCES `pegawai` (`noj`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `solver`
--
ALTER TABLE `solver`
  ADD CONSTRAINT `solver_ibfk_2` FOREIGN KEY (`noj`) REFERENCES `pegawai` (`noj`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
