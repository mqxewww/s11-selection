-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Dec 29, 2021 at 06:12 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `grid` (
  `id` int(11) NOT NULL,
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
  `comment` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grid`
--

INSERT INTO `grid` (`id`, `number`, `name`, `firstname`, `diploma`, `work`, `absence`, `attitude`, `study`, `ppview`, `proview`, `coverletter`, `comment`, `mark`) VALUES
(2, '#001', 'NOIZET', 'Maxence', 8, 1, 0, 0, 0, 2, 2, 1, 'Hello its me', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `grid`
--
ALTER TABLE `grid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grid`
--
ALTER TABLE `grid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
