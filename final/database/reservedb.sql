-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2023 at 03:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservetb`
--

CREATE TABLE `reservetb` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Zip` int(5) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `Phone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `cardnum` int(20) NOT NULL,
  `request` varchar(100) NOT NULL,
  `room` varchar(16) DEFAULT NULL,
  `Numofpeople` varchar(16) DEFAULT NULL,
  `Tax` varchar(5) DEFAULT NULL,
  `Numofnights` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservetb`
--

INSERT INTO `reservetb` (`id`, `FirstName`, `LastName`, `Address`, `City`, `Zip`, `checkin`, `checkout`, `Phone`, `email`, `payment`, `cardnum`, `request`, `room`, `Numofpeople`, `Tax`, `Numofnights`) VALUES
(1, 'dude', 'man', '123 main street', 'whatever', 12345, '2023-12-05', '2023-12-07', 0, 'dude@gmail.com', NULL, 2147483647, 'dude, I want my MTV', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservetb`
--
ALTER TABLE `reservetb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservetb`
--
ALTER TABLE `reservetb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `reservetb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
