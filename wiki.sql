-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 09:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `announces`
--

CREATE TABLE `announces` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announces`
--

INSERT INTO `announces` (`id`, `titre`, `description`, `date`, `active`, `userID`, `categoryID`, `image`) VALUES
(1, 'DOLMI', 'abdelmajid dolmi meihleur joeur dans 2000', '2022-11-17 16:59:45', 1, 2, NULL, 'assets/img/dolmi.jpg'),
(19, 'Quran', 'maroc est 1,628,050 des gens qui portent Quran ', '2024-01-14 15:06:23', 1, 60, 60, 'assets/img/maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(20, 'sport'),
(21, 'culture');

-- --------------------------------------------------------

--
-- Table structure for table `tages`
--

CREATE TABLE `tages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tages`
--

INSERT INTO `tages` (`id`, `name`) VALUES
(9, 'casablanca'),
(10, 'youssoufia'),
(11, 'tanger'),
(12, 'rabat'),
(13, 'safi'),
(14, 'dakhla'),
(15, 'khemissat');

-- --------------------------------------------------------

--
-- Table structure for table `tages_wiki`
--

CREATE TABLE `tages_wiki` (
  `id` int(11) NOT NULL,
  `wiki_id` int(11) DEFAULT NULL,
  `tage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(5, 'hafida', 'ddd@mdm.com', '$2y$10$CnYaASBH29XU8HEe4ah0VOhXd/l.k1Pq5cHRvbXcEcKOrzrpGhsRa', 'admin'),
(14, 'zouhair', 'zouz7229@gmail.com', '$2y$10$b4e/PFtty66Bxy1JiOfJxeGE4jcxUv9uhu4IV..FWPJJSzA85gmnS', 'auteur'),
(16, 'q', 'q', '$2y$10$HQDEcmYzq4xAH4jxKbh7IeQ0u1fkXJUCi4Vml5D1AL5OP1VmlpVK6', 'auteur'),
(17, 'khalid', 'Khalid@gmail.com', '$2y$10$R/od.HFvD1lVtHmY2qyoH.gN5725r/fG5sJhi9S0lNCpQ/yUm39Qe', 'auteur'),
(18, 'az', 'az', '$2y$10$J8Cxl/dKi4pVghN14vkIcetuDg4cw.0AeUkpKi3lZxQWmPKLUTIpy', 'auteur'),
(19, 'ae', 'ae', '$2y$10$xl.xvsiV9ViP1mEEnI/D2Odj5bCEqh2TkK.PZJIkEltFplVOpuaZu', 'auteur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announces`
--
ALTER TABLE `announces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_announces` (`userID`),
  ADD KEY `fk_categorie_announces` (`categoryID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tages`
--
ALTER TABLE `tages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tages_wiki`
--
ALTER TABLE `tages_wiki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wiki_id` (`wiki_id`),
  ADD KEY `fk_table2_table` (`tage_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announces`
--
ALTER TABLE `announces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tages`
--
ALTER TABLE `tages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tages_wiki`
--
ALTER TABLE `tages_wiki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tages_wiki`
--
ALTER TABLE `tages_wiki`
  ADD CONSTRAINT `fk_table2_table` FOREIGN KEY (`tage_id`) REFERENCES `tages` (`id`),
  ADD CONSTRAINT `tages_user_ibfk_1` FOREIGN KEY (`wiki_id`) REFERENCES `announces` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
