-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 07:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinpasin`
--

-- --------------------------------------------------------

--
-- Table structure for table `asrama`
--

CREATE TABLE `asrama` (
  `mahasiswaId` int(11) NOT NULL,
  `nameMahasiswa` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nim` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `tanggalMasuk` date DEFAULT NULL,
  `tanggalKeluar` date DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asrama`
--

INSERT INTO `asrama` (`mahasiswaId`, `nameMahasiswa`, `email`, `nim`, `jurusan`, `noTelp`, `tanggalMasuk`, `tanggalKeluar`, `bukti_pembayaran`) VALUES
(12, 'Sesar', 'sesar@gmail.com', '123456789', 'Sistem Informasi', '081233345567', '2023-06-01', '2023-06-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asramaconfirmed`
--

CREATE TABLE `asramaconfirmed` (
  `conMahaId` int(11) NOT NULL,
  `conNamaMaha` varchar(255) NOT NULL,
  `conNim` varchar(255) NOT NULL,
  `conEmail` varchar(255) DEFAULT NULL,
  `conJurusan` varchar(255) NOT NULL,
  `conNoTelp` varchar(255) NOT NULL,
  `contglmasuk` date NOT NULL,
  `contglkeluar` date NOT NULL,
  `conKamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asramaconfirmed`
--

INSERT INTO `asramaconfirmed` (`conMahaId`, `conNamaMaha`, `conNim`, `conEmail`, `conJurusan`, `conNoTelp`, `contglmasuk`, `contglkeluar`, `conKamar`) VALUES
(1, 'Ibnu Khalis ', '2041720159', 'ibnukhalisr@gmail.com', 'Teknik informatika', '082278497646', '2023-06-21', '2023-06-29', '405'),
(2, 'Yunika Putri Oktavia', '2041720238', 'yunika@gmail.com', 'Sistem Informasi', '083173302699', '2023-06-04', '2023-06-30', '401'),
(4, 'Yudha', '2041720100', 'yudah@gmail.com', 'Kelautan', '082278497646', '2023-06-24', '2023-06-29', '402');

-- --------------------------------------------------------

--
-- Table structure for table `kamarasrama`
--

CREATE TABLE `kamarasrama` (
  `jumlahKamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamarasrama`
--

INSERT INTO `kamarasrama` (`jumlahKamar`) VALUES
(9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(3, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asrama`
--
ALTER TABLE `asrama`
  ADD PRIMARY KEY (`mahasiswaId`);

--
-- Indexes for table `asramaconfirmed`
--
ALTER TABLE `asramaconfirmed`
  ADD PRIMARY KEY (`conMahaId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asrama`
--
ALTER TABLE `asrama`
  MODIFY `mahasiswaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `asramaconfirmed`
--
ALTER TABLE `asramaconfirmed`
  MODIFY `conMahaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
