-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 fév. 2025 à 15:16
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `compte_utilisateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'membre',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(6, 'Jean Marie Le Pen', '$2y$10$RRCEWuWZzcaC01K4NmoEzuacO/CnMX5PFo3fC/gL/bRkxsL0FuWTS', 'jeanneausecour@rn.fr', 'membre'),
(4, 'Francois Bayroux', '$2y$10$Q8aGBP.CZp7GnrO166j3vOCDVhbw4S05NJsFf1QEBYxzTAcvJoawG', 'liliancarriere@gmail.com', 'membre'),
(3, 'Mr Bah', '$2y$10$1Ddu17wuXGDzT.m3RANMDubCQqkGAlnahU/3Z3f2ngNPhmfzMJQ4i', 'bastien.gononlyon@gmail.com', 'membre'),
(8, 'Elon Musk', '$2y$10$kXzLbPcEUWjiqQ4q9tzpN.69oWUp1qW88trjHmL0Gyn8WyXOiFOQC', 'gemPahleinwar@kkk.us', 'membre'),
(9, 'othmane83', '$2y$10$rzUHubgGvKXtDbvQE0k3juy7LutU57kdJhUQYhrA1pV26U.MByYLe', 'elbertalothmane0@gmail.com', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
