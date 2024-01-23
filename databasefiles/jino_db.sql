-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 07:29 PM
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
-- Database: `jino_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`ID`, `Title`, `Description`, `UserID`) VALUES
(21, 'Code for today', 'da', 13),
(24, 'Code for today', 'd,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;vd,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;d,l;wa,dla;\r\n', 13),
(28, 'Code for today', 'fmawkfmawkfmawkfmawkfmawkfmawk\r\nfmawkfmawkfmawkfmawkfmawkfmawk\r\n\r\nfmawkfmawkfmawk\r\nfmawkfmawkfmawkfmawkfmawkfmawkfmawkfmawk\r\nfmawkfmawkfmawkfmawkfmawkfmawkfmawkfmawkfmawkfmawk\r\nfmawkfmawkfmawkfmawkfmawkfmawk', 12),
(29, 'Code for today', 'j', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(12, 'Rogel Gerodiaz', 'gerodiazrogel0@gmail.com', 'rogelgerodiaz', '$2y$10$Il5ZcT7VInW9i/7AzE5Mbeb8N82MGm4fUv.owd8b6p21t96Q4zSdy'),
(13, 'Jino Barrantes', 'jinobarrantes@gmail.com', 'jinobarrantes', '$2y$10$AKU5aEuiS0D782TBKG.jo.SznkpZpz/KZ9YKbtALrykOjf12ClgUK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
