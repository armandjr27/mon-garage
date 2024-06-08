-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2024 at 01:18 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mon_garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom`, `description`) VALUES
(1, 'Electrique', 'Voiture 100% électrique.'),
(2, 'Hybride', 'Voiture roulant avec hydrogène, diesel et électricité.'),
(3, 'Familial', 'Voiture pour toutes la famille.'),
(4, 'Sport', 'Voiture de course sur piste et sur terrain battue.'),
(5, 'Karenjy', 'Voiture vita malagasy.'),
(6, 'Concept Car', 'Prototype de voiture pas encore dans la marché public.');

-- --------------------------------------------------------

--
-- Table structure for table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures` (
  `id_voiture` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `couleur` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_categorie` int NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_voiture`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voitures`
--

INSERT INTO `voitures` (`id_voiture`, `marque`, `numero`, `couleur`, `image`, `id_categorie`, `date_creation`) VALUES
(1, 'Kia', '45684 TAZ', 'Whitesmoke', 'Hydrangeas.jpg', 4, '2024-05-25 15:08:41'),
(2, 'Hyundai', '7812 TAB', 'Golden', 'Lighthouse.jpg', 1, '2024-05-25 15:09:56'),
(3, 'BMW', '1234 ABC', 'Noire et Blanc', 'Chrysanthemum.jpg', 2, '2024-05-25 15:32:29'),
(5, 'see', '2258pd', 'Whitesmoke', 'FB_IMG_1533818325349.jpg', 1, '2024-05-25 14:04:56'),
(6, 'Bana', '45684 TA', 'Whitesmoke', 'Jellyfish.jpg', 4, '2024-05-25 15:32:43'),
(7, 'Banana', '1234 ABC', 'Golden', 'Desert.jpg', 5, '2024-05-25 15:31:57'),
(8, 'Hyundai', '1234 AB', 'Rouge', 'FB_IMG_1533818325349.jpg', 5, '2024-05-28 20:55:10'),
(9, 'Kia', '45684 TAZ', 'Whitesmoke', 'Hydrangeas.jpg', 4, '2024-05-25 15:08:41'),
(10, 'Hyundai', '7812 TAB', 'Golden', 'Lighthouse.jpg', 1, '2024-05-25 15:09:56'),
(11, 'BMW', '1234 ABC', 'Noire et Blanc', 'Chrysanthemum.jpg', 2, '2024-05-25 15:32:29'),
(12, 'see', '2258pd', 'Whitesmoke', 'FB_IMG_1533818325349.jpg', 1, '2024-05-25 14:04:56'),
(13, 'Bana', '45684 TA', 'Whitesmoke', 'Jellyfish.jpg', 4, '2024-05-25 15:32:43'),
(14, 'Banana', '1234 ABC', 'Golden', 'Desert.jpg', 5, '2024-05-25 15:31:57'),
(15, 'Hyundai', '1234 AB', 'Rouge', 'FB_IMG_1533818325349.jpg', 5, '2024-05-28 20:55:10'),
(16, 'Kia', '45684 TAZ', 'Whitesmoke', 'Hydrangeas.jpg', 4, '2024-05-25 15:08:41'),
(17, 'Hyundai', '7812 TAB', 'Golden', 'Lighthouse.jpg', 1, '2024-05-25 15:09:56'),
(18, 'BMW', '1234 ABC', 'Noire et Blanc', 'Chrysanthemum.jpg', 2, '2024-05-25 15:32:29'),
(19, 'see', '2258pd', 'Whitesmoke', 'FB_IMG_1533818325349.jpg', 1, '2024-05-25 14:04:56'),
(20, 'Bana', '45684 TA', 'Whitesmoke', 'Jellyfish.jpg', 4, '2024-05-25 15:32:43'),
(21, 'Banana', '1234 ABC', 'Golden', 'Desert.jpg', 5, '2024-05-25 15:31:57'),
(22, 'Hyundai', '1234 AB', 'Rouge', 'FB_IMG_1533818325349.jpg', 5, '2024-05-28 20:55:10'),
(23, 'Kia', '45684 TAZ', 'Whitesmoke', 'Hydrangeas.jpg', 4, '2024-05-25 15:08:41'),
(24, 'Hyundai', '7812 TAB', 'Golden', 'Lighthouse.jpg', 1, '2024-05-25 15:09:56'),
(25, 'BMW', '1234 ABC', 'Noire et Blanc', 'Chrysanthemum.jpg', 2, '2024-05-25 15:32:29'),
(26, 'see', '2258pd', 'Whitesmoke', 'FB_IMG_1533818325349.jpg', 1, '2024-05-25 14:04:56'),
(27, 'Bana', '45684 TA', 'Whitesmoke', 'Jellyfish.jpg', 4, '2024-05-25 15:32:43'),
(28, 'Banana', '1234 ABC', 'Golden', 'Desert.jpg', 5, '2024-05-25 15:31:57'),
(29, 'Hyundai', '1234 AB', 'Rouge', 'FB_IMG_1533818325349.jpg', 5, '2024-05-28 20:55:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
