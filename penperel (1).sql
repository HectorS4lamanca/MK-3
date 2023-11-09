-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 07:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penperel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `kata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `kata`) VALUES
(2, '$2y$10$/5/GMWd7NiOJDkQy3wrue.q3IKCVooyMY1V8b6vXJmGOyG1GYifjG'),
(3, '$2y$10$/5/GMWd7NiOJDkQy3wrue.q3IKCVooyMY1V8b6vXJmGOyG1GYifjG');

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `idpelajar` int(11) NOT NULL,
  `warden` varchar(50) NOT NULL,
  `namapelajar` varchar(50) NOT NULL,
  `nokppelajar` varchar(12) NOT NULL,
  `kata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`idpelajar`, `warden`, `namapelajar`, `nokppelajar`, `kata`) VALUES
(4, 'fahmi', 'haziq', '011', '$2y$10$q79ffo7ShywEvrQWRkWTgee/AepJJiUPm5V/LJ91PxVJBUn6D15hi'),
(5, '', '', '', '$2y$10$GJwrTYTHlVudPn60rho4KOx3waTxhcmVg0i/THrb7FLtwqbb2zmsO'),
(6, '', '', '', '$2y$10$GJwrTYTHlVudPn60rho4KOx3waTxhcmVg0i/THrb7FLtwqbb2zmsO');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `idperalatan` int(11) NOT NULL,
  `pelajar` varchar(50) NOT NULL,
  `jenisperalatan` varchar(30) NOT NULL,
  `jenama` varchar(30) NOT NULL,
  `nosiri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`idperalatan`, `pelajar`, `jenisperalatan`, `jenama`, `nosiri`) VALUES
(2, 'Haziq', 'Printer', 'Apple', '001');

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `idwarden` int(11) NOT NULL,
  `namawarden` varchar(50) NOT NULL,
  `nokpwarden` varchar(12) NOT NULL,
  `kata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`idwarden`, `namawarden`, `nokpwarden`, `kata`) VALUES
(1, 'fahmi', '002', '$2y$10$/v0BuBUoNJDK5sez4VGHJuGwom8G4Iq9ciEPV7.4L5COXeGO5LLmG'),
(4, 'haikal', '0312', '$2y$10$FoSQJ7mE6mASS/tMQvIJieZVN9neMspsCDWJb8nzWzNJ7OMIz3JXG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`idpelajar`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`idperalatan`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`idwarden`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `idpelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `idperalatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warden`
--
ALTER TABLE `warden`
  MODIFY `idwarden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
