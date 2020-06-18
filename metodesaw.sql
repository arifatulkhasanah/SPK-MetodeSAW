-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 06:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metodesaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(64) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`) VALUES
(2, 'Converse'),
(3, 'Skechers'),
(4, 'Vans');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(64) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
(1, 'Harga Sepatu'),
(3, 'Jenis Sepatu'),
(4, 'Kualitas Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id` int(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hargasepatu` int(64) NOT NULL,
  `jenissepatu` varchar(64) NOT NULL,
  `kualitassepatu` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `nama`, `hargasepatu`, `jenissepatu`, `kualitassepatu`) VALUES
(2, 'Converse', 600, 'Canvas Sneakers', 'Sangat Bagus'),
(3, 'Skechers', 300, 'Slip-on Sneakers', 'Bagus\r\n'),
(4, 'Vans', 450, 'Plimsolls Sneakers', 'Sangat Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_kriteria` int(64) NOT NULL,
  `1` varchar(255) NOT NULL,
  `2` varchar(255) NOT NULL,
  `3` varchar(255) NOT NULL,
  `4` varchar(255) NOT NULL,
  `5` varchar(255) NOT NULL,
  `atribut` enum('Cost','Benefit') NOT NULL,
  `bobot` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_kriteria`, `1`, `2`, `3`, `4`, `5`, `atribut`, `bobot`) VALUES
(1, '>100.000 dan < 250.000', '> 250.000 dan < 300.000', '> 300.000 dan < 450.000', '> 450.000 dan < 600.000', '> 600.000', 'Cost', 40),
(3, 'Authentic Sneakers', 'Plimsolls Sneakers', 'Slip-on Sneakers', 'Leather Sneakers', 'Canvas Sneakers', 'Benefit', 20),
(4, '-', 'Bagus', '-', 'Sangat Bagus', '-', 'Benefit', 40);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_normalisasi`
--

CREATE TABLE `nilai_normalisasi` (
  `id` int(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `hargasepatu` int(64) NOT NULL,
  `jenissepatu` int(64) NOT NULL,
  `kualitassepatu` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_normalisasi`
--

INSERT INTO `nilai_normalisasi` (`id`, `nama`, `hargasepatu`, `jenissepatu`, `kualitassepatu`) VALUES
(1, 'Converse', 5, 5, 4),
(2, 'Skechers', 2, 3, 2),
(3, 'Vans', 4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` int(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_normalisasi`
--
ALTER TABLE `nilai_normalisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_normalisasi`
--
ALTER TABLE `nilai_normalisasi`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
