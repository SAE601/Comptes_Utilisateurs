-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2025 at 03:06 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compte_utilisateur`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(6, 'Jean Marie Le Pen', '$2y$10$RRCEWuWZzcaC01K4NmoEzuacO/CnMX5PFo3fC/gL/bRkxsL0FuWTS', 'jeanneausecour@rn.fr'),
(4, 'Francois Bayroux', '$2y$10$Q8aGBP.CZp7GnrO166j3vOCDVhbw4S05NJsFf1QEBYxzTAcvJoawG', 'liliancarriere@gmail.com'),
(3, 'Mr Bah', '$2y$10$1Ddu17wuXGDzT.m3RANMDubCQqkGAlnahU/3Z3f2ngNPhmfzMJQ4i', 'bastien.gononlyon@gmail.com'),
(8, 'Elon Musk', '$2y$10$kXzLbPcEUWjiqQ4q9tzpN.69oWUp1qW88trjHmL0Gyn8WyXOiFOQC', 'gemPahleinwar@kkk.us');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
