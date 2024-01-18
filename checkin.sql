-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 11:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opticheck`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `nis`, `tanggal`, `jam`) VALUES
(1, 0, '2024-01-18', '00:00:00'),
(2, 0, '0000-00-00', '00:00:00'),
(3, 11, '0000-00-00', '04:44:56'),
(4, 1222, '2024-01-19', '05:24:01'),
(5, 1222, '2024-01-19', '05:24:01'),
(6, 1222, '2024-01-19', '05:24:01'),
(7, 789456, '2024-01-19', '05:29:56'),
(8, 789456, '2024-01-19', '05:29:56'),
(9, 789456, '2024-01-19', '05:29:56'),
(10, 789456, '2024-01-19', '05:29:56'),
(11, 789456, '2024-01-19', '05:29:56'),
(12, 789456, '2024-01-19', '05:29:56'),
(13, 789456, '2024-01-19', '05:29:56'),
(14, 789456, '2024-01-19', '05:29:56'),
(15, 30303, '2024-01-19', '05:55:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
