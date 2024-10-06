-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 01:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kehadiran_ahli`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahli`
--

CREATE TABLE `ahli` (
  `nama` varchar(60) DEFAULT NULL,
  `nokp` varchar(12) NOT NULL,
  `id_kelas` varchar(10) DEFAULT NULL,
  `tahap` varchar(20) DEFAULT NULL,
  `katalaluan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ahli`
--

INSERT INTO `ahli` (`nama`, `nokp`, `id_kelas`, `tahap`, `katalaluan`) VALUES
('Yu Long', '060528076237', 'K19', 'Admin', '5eM'),
('Amin', '070110072269', 'K15', 'Ahli', '4dA'),
('Darshini', '070919071025', 'K13', 'Ahli', '3cM'),
('Fatimah', '080304074438', 'K12', 'Ahli', '1aJ'),
('Tan Feng', '080714078926', 'K12', 'Ahli', '2bF');

-- --------------------------------------------------------

--
-- Table structure for table `aktiviti`
--

CREATE TABLE `aktiviti` (
  `id_aktiviti` int(11) NOT NULL,
  `nama_aktiviti` text DEFAULT NULL,
  `tarikh_aktiviti` date DEFAULT NULL,
  `masa_mula` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktiviti`
--

INSERT INTO `aktiviti` (`id_aktiviti`, `nama_aktiviti`, `tarikh_aktiviti`, `masa_mula`) VALUES
(1, 'Aktiviti Biasa 1', '2020-01-06', '8:00 pagi'),
(2, 'Aktiviti Biasa 2', '2020-02-07', '8:00 pagi'),
(3, 'Aktiviti Biasa 3', '2020-03-08', '8:00 pagi'),
(4, 'First Aid Competition', '2020-04-18', '7:30 pagi'),
(8, 'Mock War', '2024-06-21', '7:00 pagi');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_aktiviti` int(11) NOT NULL,
  `nokp` varchar(12) NOT NULL,
  `masa_hadir` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_aktiviti`, `nokp`, `masa_hadir`) VALUES
(1, '060528076237', '08:00:00'),
(1, '070110072269', '07:50:00'),
(1, '070919071025', '08:06:00'),
(1, '080304074438', '07:56:00'),
(1, '080714078926', '08:01:00'),
(2, '060528076237', '08:02:00'),
(2, '070110072269', '08:03:00'),
(2, '070919071025', '07:55:00'),
(3, '060528076237', '08:04:00'),
(3, '070919071025', '07:59:00'),
(3, '080304074438', '08:00:00'),
(3, '080714078926', '07:57:00'),
(4, '060528076237', '20:05:58'),
(4, '070110072269', '20:05:58'),
(4, '070919071025', '20:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `ting` varchar(5) DEFAULT NULL,
  `nama_kelas` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `ting`, `nama_kelas`) VALUES
('K10', '3', 'Kuning'),
('K12', '3', 'Hijau'),
('K13', '4', 'Merah'),
('K15', '4', 'Biru'),
('K19', '5', 'Biru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahli`
--
ALTER TABLE `ahli`
  ADD PRIMARY KEY (`nokp`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `aktiviti`
--
ALTER TABLE `aktiviti`
  ADD PRIMARY KEY (`id_aktiviti`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_aktiviti`,`nokp`),
  ADD KEY `nokp` (`nokp`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktiviti`
--
ALTER TABLE `aktiviti`
  MODIFY `id_aktiviti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ahli`
--
ALTER TABLE `ahli`
  ADD CONSTRAINT `ahli_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`nokp`) REFERENCES `ahli` (`nokp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`id_aktiviti`) REFERENCES `aktiviti` (`id_aktiviti`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
