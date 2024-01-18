-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 10:34 AM
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
  `jam` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `nis`, `tanggal`, `jam`) VALUES
(1, 0, '0000-00-00', '0000-00-00 00:00:00'),
(2, 0, '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `izinsiswa`
--

CREATE TABLE `izinsiswa` (
  `id` int(11) NOT NULL,
  `nis` int(25) NOT NULL,
  `nama_siswa` varchar(20) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alasan` text NOT NULL,
  `bukti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izinsiswa`
--

INSERT INTO `izinsiswa` (`id`, `nis`, `nama_siswa`, `kelas`, `jurusan`, `jenis_kelamin`, `alasan`, `bukti`) VALUES
(1, 2110809, 'AFRISKA PUTRI APRILI', 'XII', 'TAV', 'P', 'Sakit', '');

-- --------------------------------------------------------

--
-- Table structure for table `loginguru`
--

CREATE TABLE `loginguru` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginguru`
--

INSERT INTO `loginguru` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Guru', 'guru', '101010');

-- --------------------------------------------------------

--
-- Table structure for table `loginsiswa`
--

CREATE TABLE `loginsiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginsiswa`
--

INSERT INTO `loginsiswa` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Siswa1', 'siswa1', '101010');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama_siswa` varchar(35) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `kelas`, `jurusan`, `jenis_kelamin`) VALUES
(1, 2110809, 'AFRISKA PUTRI APRILIANA', 'XII', 'TAV', 'P'),
(6, 2110816, 'DEVITA AGUSTINA', 'XII', 'TAV', 'P'),
(7, 2110815, 'DEVINA ELISABETH', 'XII', 'TAV', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `created_date`) VALUES
(1, 'Admin', 'admin', '101010', 'admin', '2024-01-18'),
(2, 'AFRISKA PUTRI APRILIANA', '2110809', '101010', 'siswa', '2024-01-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izinsiswa`
--
ALTER TABLE `izinsiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginguru`
--
ALTER TABLE `loginguru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginsiswa`
--
ALTER TABLE `loginsiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `izinsiswa`
--
ALTER TABLE `izinsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginguru`
--
ALTER TABLE `loginguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginsiswa`
--
ALTER TABLE `loginsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
