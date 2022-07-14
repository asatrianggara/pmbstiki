-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 04:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmbstiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` varchar(32) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `slug` varchar(128) NOT NULL,
  `content` text DEFAULT NULL,
  `draft` enum('true','false') NOT NULL DEFAULT 'true',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` varchar(32) NOT NULL,
  `id` varchar(32) NOT NULL,
  `ijazah` varchar(64) NOT NULL,
  `skhun` varchar(64) NOT NULL,
  `draft` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id`, `ijazah`, `skhun`, `draft`) VALUES
('	 62cd95983645s6.28374677', '62cd72aaa45256.49313852', '62cd72aaa4525649313852-ijazah.png', '', 'false'),
('62cd9599872a56.16273645', '62cd953a57a315.96429206', '', '', ''),
('62ce9bf2f2c1f2.18928392', '62ce9bf2f2bd40.75199349', '62ce9bf2f2bd4075199349-ijazah.jpg', '62ce9bf2f2bd4075199349-skhun.png', 'false'),
('62cee86761c760.82100545', '62cee86761c4a1.89504689', '62cee86761c4a189504689-ijazah.png', '62cee86761c4a189504689-skhun.jpeg', 'true'),
('62ceeaa0d3abd4.26745709', '62ceeaa0d3a8b2.63448830', '', '', 'true'),
('62ceebffcd7b35.29330173', '62ceebffcd7870.14151825', '62ceebffcd787014151825-ijazah.jpg', '62ceebffcd787014151825-skhun.jpg', 'false'),
('62cf61b0667320.80503910', '62cf61b0667059.60068747', '', '', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `datadiri`
--

CREATE TABLE `datadiri` (
  `id_datadiri` varchar(32) NOT NULL,
  `id` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `asal_sekolah` varchar(32) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `draft` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datadiri`
--

INSERT INTO `datadiri` (`id_datadiri`, `id`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `asal_sekolah`, `no_telp`, `draft`) VALUES
('62cd72aaa454e6.94518097', '62cd72aaa45256.49313852', 'Permata Biru Blok P 132', 'Malang', '2022-07-12 00:00:00', 'SMKN 4 Band', '085156251342', 'false'),
('62cd953a57ac57.24012686', '62cd953a57a315.96429206', 'Jalan jalan', 'Malang', '2022-07-01 00:00:00', 'SMKN 5 MALANG', '0851562282', 'false'),
('62ce9bf2f2c182.23065237', '62ce9bf2f2bd40.75199349', 'Lamongan', 'Lamongan', '2022-07-13 00:00:00', 'Madrasah', '0987678767', 'false'),
('62cee86761c713.61599240', '62cee86761c4a1.89504689', 'Peru', 'Bali', '2022-07-14 00:00:00', 'SMKN 2 BALI', '086273645322', 'false'),
('62ceeaa0d3ab79.05076634', '62ceeaa0d3a8b2.63448830', '', '', '0000-00-00 00:00:00', '', '', 'true'),
('62ceebffcd7ad6.95088715', '62ceebffcd7870.14151825', '', '', '0000-00-00 00:00:00', '', '', 'true'),
('62cf61b06672c7.65030401', '62cf61b0667059.60068747', '', '', '0000-00-00 00:00:00', '', '', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `password_updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `avatar`, `created_at`, `last_login`, `password_updated_at`, `level`) VALUES
('62cd72aaa45256.49313852', 'Adjie', 'aji@mail.com', 'zaenab123', '$2y$10$oqSDRNJzN8zx/1CYILbkT.Zn2.FuUXkFTwYwqWZodnA7BEfOq2Q6i', NULL, '2022-07-12 13:10:02', '2022-07-13 19:56:10', '2022-07-12 20:10:02', 1),
('62cd953a57a315.96429206', 'Reza Rahadian', 'reza@mail.com', 'reza1234', '$2y$10$TKtj9Bqx0CrJOwMwdGnqEuP0r8mm.OxdYSOGgeTypVfRjj968NeBG', '62cd953a57a31596429206.jpg', '2022-07-12 15:37:30', '2022-07-13 19:13:25', '2022-07-12 22:37:30', 1),
('62ce9bf2f2bd40.75199349', 'Yoga', 'yoga@mail.com', 'yoga123', '$2y$10$Exf8xZw6f2hOd9/kJfWXo.WMakA9o.6/LUL1CJ.Eje/pLlEYNVdV.', '62ce9bf2f2bd4075199349.png', '2022-07-13 10:18:27', '2022-07-13 10:51:11', '2022-07-13 17:18:27', 1),
('62cee86761c4a1.89504689', 'Anggora', 'anggara@mail.com', 'anggara123', '$2y$10$8YiFXFJJlrxgN8zoisL7GOThq5tqKMuFLIFHCK7adCJl9Ntl1QuXm', NULL, '2022-07-13 15:44:39', '2022-07-13 10:52:24', '2022-07-13 22:44:39', 1),
('62ceeaa0d3a8b2.63448830', 'Miya', 'miya@mail.com', 'miya123', '$2y$10$YcHEFdw/JKxn4F/SRLLTA.OXigLMjx/bDzCLd0g7O8ZReBUNr3CaS', NULL, '2022-07-13 15:54:08', '2022-07-13 19:14:20', '2022-07-13 22:54:08', 1),
('62ceebffcd7870.14151825', 'Zilong', 'zilong@mail.com', 'zilon123', '$2y$10$JYakTXD1jme4JLMIPgWbTOiUHN7gulMxL35UWjV.EF3iSFdR3GlCC', NULL, '2022-07-13 15:59:59', '2022-07-13 11:00:02', '2022-07-13 22:59:59', 1),
('62cf61b0667059.60068747', 'STAFF', 'staf@mail.com', 'staff123', '$2y$10$CZ835z/4/wE3Th7RbHujgu8MLoFiWZodqrFcELWGzZp4/I.mL79N6', NULL, '2022-07-14 00:22:08', '2022-07-13 19:22:13', '2022-07-14 07:22:08', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `datadiri`
--
ALTER TABLE `datadiri`
  ADD PRIMARY KEY (`id_datadiri`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
