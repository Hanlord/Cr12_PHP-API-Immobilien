-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 09:48 PM
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
-- Database: `be16_cr12_lacasamia_wehan`
--
CREATE DATABASE IF NOT EXISTS `be16_cr12_lacasamia_wehan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be16_cr12_lacasamia_wehan`;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `address` varchar(50) NOT NULL,
  `latitude` decimal(10,5) DEFAULT NULL,
  `longitude` decimal(10,5) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `reduction` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `size`, `rooms`, `city`, `price`, `address`, `latitude`, `longitude`, `image`, `reduction`) VALUES
(1, 'Apartment in 1140', 89, 3, 'Vienna', '320000.00', 'kaisergasse 1', '48.21080', '16.33290', '62e3eaf2d8dad.jpg', 'yes'),
(2, 'Apartment in 1210', 113, 5, 'Vienna', '559000.00', 'Himmelsgasse 7', '48.26772', '16.43437', '62e3eb52243bf.jpg\r\n\r\n', 'yes'),
(3, 'Apartment in 1220', 115, 6, 'Vienna', '780000.00', 'Kaiserhof 1', '48.23578', '16.47657', '62e3ec8a48660.jpg\r\n\r\n', 'no'),
(4, 'Office in 1120', 123, 6, 'Vienna', '558000.00', 'Goldstrasse 1', '48.17240', '16.33369', '62e3ecba3cd4d.jpg\r\n\r\n', 'yes'),
(5, 'Office in 1120', 126, 6, 'Vienna', '570000.00', 'Silbergasse 1', '48.17910', '16.32090', '62e3ed07b2156.jpg\r\n\r\n', 'no'),
(6, 'Loft in 1120', 26, 3, 'Vienna', '158760.00', 'Josefgasse 1', '48.17767', '16.33832', '62e3ed62c0470.jpg\r\n\r\n', 'no'),
(7, 'Office in 1120', 43, 2, 'Vienna', '258760.00', 'Bürogasse 2', '48.18299', '16.34227', '62e3eda8498be.jpg\r\n\r\n', 'yes'),
(8, 'Apartment in 1210', 68, 4, 'Vienna', '299000.00', 'Donaugasse 5', '48.29205', '16.38974', '62e3edee82f39.jpg\r\n\r\n', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
