-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 02, 2022 at 05:46 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selection`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `login`, `password`, `type`) VALUES
(1, 'admin', '$2y$10$IkVHzBNKohobDE0q7.vFDeMXOefrfhmi.ABkhDYgd1TYMyRUA.8nq', 'admin'),
(2, 'secr', '$2y$10$2xW.hlVqAPtbFLg7ugYBielqdePwWpAnubRFDklslLIrQ.nlQykAi', 'secretary'),
(3, 'teacher', '$2y$10$a6gZz88SgtkqyxcSlWn5e.viyWqPAd.5HFPXcVzfQhwslv7LDXpq2', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `grid`
--

DROP TABLE IF EXISTS `grid`;
CREATE TABLE IF NOT EXISTS `grid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `diploma` int(11) NOT NULL,
  `work` int(11) NOT NULL,
  `absence` int(11) NOT NULL,
  `attitude` int(11) NOT NULL,
  `study` int(11) NOT NULL,
  `ppview` int(11) NOT NULL,
  `proview` int(11) NOT NULL,
  `coverletter` int(11) NOT NULL,
  `comment` text NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grid`
--

INSERT INTO `grid` (`id`, `number`, `name`, `firstname`, `diploma`, `work`, `absence`, `attitude`, `study`, `ppview`, `proview`, `coverletter`, `comment`, `mark`) VALUES
(2, '#001', 'NOIZET', 'Maxence', 8, 1, 0, 0, 0, 2, 2, 1, 'Owner', 14);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
