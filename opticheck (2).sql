-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 11:42 PM
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
  `id_siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `id_siswa`, `tanggal`, `jam`) VALUES
(21, 2110822, '2024-01-25', '07:24:57'),
(22, 2110835, '2024-01-25', '07:27:26'),
(23, 2110813, '2024-01-25', '07:27:36'),
(24, 2110839, '2024-01-25', '07:27:46'),
(25, 2110811, '2024-01-25', '07:27:49'),
(26, 2110836, '2024-01-25', '07:30:38'),
(27, 2110840, '2024-01-25', '07:30:46'),
(28, 2111074, '2024-01-25', '07:30:50'),
(29, 2110820, '2024-01-25', '07:32:18'),
(30, 2110810, '2024-01-25', '07:32:23'),
(31, 2110821, '2024-01-25', '07:32:27'),
(32, 2110838, '2024-01-25', '07:33:26'),
(33, 2110829, '2024-01-25', '07:38:36'),
(34, 2110819, '2024-01-25', '07:40:36'),
(35, 2110827, '2024-01-25', '07:42:20'),
(36, 2110815, '2024-01-25', '07:42:46'),
(37, 2110832, '2024-01-25', '07:46:33'),
(38, 2110823, '2024-01-25', '07:48:44'),
(39, 2311292, '2024-01-25', '12:04:17'),
(40, 2110826, '2024-01-25', '12:04:57'),
(41, 2110817, '2024-01-25', '12:05:04'),
(42, 2110830, '2024-01-25', '12:05:57'),
(43, 112233, '2024-01-25', '22:59:37'),
(44, 22222, '2024-01-25', '23:02:21'),
(45, 112233, '2024-01-26', '05:39:36'),
(56, 55, '2024-01-30', '06:29:57'),
(57, 55, '2024-01-31', '04:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `id_siswa`, `tanggal`, `jam`) VALUES
(20, 2110822, '2024-01-25', '11:55:39'),
(21, 2110810, '2024-01-25', '11:55:48'),
(22, 2110839, '2024-01-25', '11:56:23'),
(23, 2110836, '2024-01-25', '11:56:54'),
(24, 2110835, '2024-01-25', '11:57:20'),
(25, 2111074, '2024-01-25', '11:57:32'),
(26, 2110821, '2024-01-25', '11:57:49'),
(27, 2110841, '2024-01-25', '11:58:53'),
(28, 2110832, '2024-01-25', '11:59:12'),
(29, 2110833, '2024-01-25', '11:59:20'),
(30, 2110813, '2024-01-25', '11:59:42'),
(31, 2110812, '2024-01-25', '11:59:55'),
(32, 2110840, '2024-01-25', '12:01:29'),
(33, 2110838, '2024-01-25', '12:01:37'),
(34, 2110823, '2024-01-25', '12:02:35'),
(35, 2110829, '2024-01-25', '12:02:41'),
(36, 2110827, '2024-01-25', '12:03:14'),
(37, 2311292, '2024-01-25', '12:04:09'),
(38, 2110815, '2024-01-25', '12:04:28'),
(39, 2110811, '2024-01-25', '12:04:37'),
(40, 2110820, '2024-01-25', '12:04:40'),
(41, 2110826, '2024-01-25', '12:04:48'),
(42, 2110817, '2024-01-25', '12:05:19'),
(43, 2110830, '2024-01-25', '12:06:06'),
(44, 2110819, '2024-01-25', '12:06:46'),
(45, 22222, '2024-01-25', '23:03:08'),
(46, 112233, '2024-01-25', '23:04:32'),
(47, 112233, '2024-01-26', '05:39:49'),
(48, 55, '2024-01-30', '06:37:06'),
(49, 55, '2024-01-31', '05:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `izinsiswa`
--

CREATE TABLE `izinsiswa` (
  `id` int(11) NOT NULL,
  `nis` int(25) NOT NULL,
  `nama_siswa` varchar(35) NOT NULL,
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
(5, 2311292, 'NAIM AGUS', 'XII', 'TAV', 'L', 'asdasd', ''),
(6, 112233, 'Siswa1', 'XII', 'TAV', 'L', 'sakit', 'akreditasi-A.png');

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
(18, 2311292, 'NAIM AGUS FADLIYANSYAH', 'XII', 'TAV', 'L'),
(19, 2110843, 'YUSIKA ASTUTI', 'XII', 'TAV', 'P'),
(20, 2110841, 'TATIA NUR RAHMAWATI', 'XII', 'TAV', 'P'),
(21, 2110840, 'SITI MAISAROH', 'XII', 'TAV', 'P'),
(22, 21108254, 'KINANTHI PURBAWISESA', 'XII', 'TAV', 'P'),
(23, 2110824, 'INDRIA ARINI PUTRI', 'XII', 'TAV', 'P'),
(24, 2110823, 'IMAM CHOIRODIN', 'XII', 'TAV', 'L'),
(25, 2110822, 'FITRIA ASTUTI', 'XII', 'TAV', 'P'),
(26, 2110821, 'FITRI INDRIYANI', 'XII', 'TAV', 'P'),
(27, 2110839, 'SISKA WULANDARI', 'XII', 'TAV', 'P'),
(28, 2110836, 'RETNA SETYAWATI', 'XII', 'TAV', 'P'),
(29, 2110835, 'RAFAELLA MESYA WIJAYA', 'XII', 'TAV', 'P'),
(30, 2111074, 'PARIDA WIDYA MEILINA', 'XII', 'TAV', 'P'),
(31, 2110833, 'NURI DWI ANJANI', 'XII', 'TAV', 'P'),
(32, 2110832, 'NIMAS AYU PRATIWI', 'XII', 'TAV', 'P'),
(33, 2110828, 'MUHAMMAD AGUS WIJANARKO', 'XII', 'TAV', 'L'),
(34, 2110827, 'MUHAMAD NURDIN', 'XII', 'TAV', 'L'),
(35, 2110830, 'MOH ARIF FAUZI', 'XII', 'TAV', 'L'),
(36, 2110826, 'MARSYEL YANUAR NITIANGGORO', 'XII', 'TAV', 'L'),
(37, 2110829, 'M ALFAN SETIO AJI', 'XII', 'TAV', 'L'),
(38, 2110820, 'FARA KIKI WIJAYANTI', 'XII', 'TAV', 'P'),
(39, 2110819, 'ERTA DEWA SAPUTRA', 'XII', 'TAV', 'L'),
(40, 2110817, 'DIDIK EKA PRASETYA', 'XII', 'TAV', 'L'),
(41, 2111076, 'DIAN HANDAYANI', 'XII', 'TAV', 'P'),
(42, 2110816, 'DEVITA AGUSTINA', 'XII', 'TAV', 'P'),
(43, 2110815, 'DEVINA ELISABETH', 'XII', 'TAV', 'P'),
(44, 2110814, 'CINDI OLIVIA ASTUTIK', 'XII', 'TAV', 'P'),
(45, 2110813, 'APRILLIA TRI ASTUTIK', 'XII', 'TAV', 'P'),
(46, 2110812, 'ANGGUN SEPTA KRISTIYANTI', 'XII', 'TAV', 'P'),
(47, 2110811, 'ANGGUN NOVITA SARI', 'XII', 'TAV', 'P'),
(48, 2110810, 'ALFIATUR ROHMANIAH', 'XII', 'TAV', 'P'),
(49, 2110809, 'AFRISKA PUTRI APRILIANA', 'XI', 'TAV', 'P'),
(50, 2110838, 'SISKA NUR ANGGRAHENI', 'XII', 'TAV', 'P'),
(52, 2110812, 'ANGGUN', 'XII', 'TAV', 'P'),
(55, 112233, 'Siswa1', 'XII', 'TAV', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `created_date`) VALUES
(1, 'Admin Opticheck', 'admin', '101010', 'admin', '2024-01-18'),
(6, 'Guru', '112233', '112233', 'guru', '2024-01-24'),
(10, 'NAIM AGUS FADLIYANSYAH', '2311292', '2311292', 'siswa', '2024-01-24'),
(11, 'YUSIKA ASTUTI', '2110843', '2110843', 'siswa', '2024-01-24'),
(12, 'TATIA NUR RAHMAWATI', '2110841', '2110841', 'siswa', '2024-01-24'),
(13, 'SITI MUSAIROH', '2110840', '2110840', 'siswa', '2024-01-24'),
(14, 'KINANTHI PURBAWISESA', '21108254', '21108254', 'siswa', '2024-01-24'),
(15, 'INDRIA ARINI PUTRI', '2110824', '2110824', 'siswa', '2024-01-24'),
(16, 'IMAM CHOIRODIN', '2110823', '2110823', 'siswa', '2024-01-24'),
(17, 'FITRIA ASTUTI', '2110822', '2110822', 'siswa', '2024-01-24'),
(18, 'FITRI INDRIYANI', '2110821', '2110821', 'siswa', '2024-01-24'),
(19, 'SISKA WULANDARI', '2110839', '2110839', 'siswa', '2024-01-24'),
(20, 'SISKA NUR ANGGRAHENI', '2110838', '2110838', 'siswa', '2024-01-24'),
(21, 'RETNA SETYAWATI', '2110836', '2110836', 'siswa', '2024-01-24'),
(22, 'RAFAELLA MESYA WIJAYA', '2110835', '2110835', 'siswa', '2024-01-24'),
(23, 'PARIDA WIDYA MEILINA', '2111074', '2111074', 'siswa', '2024-01-24'),
(24, 'NUR DWI ANJANI', '2110833', '2110833', 'siswa', '2024-01-24'),
(25, 'NIMAS AYU PRATIWI', '2110832', '2110832', 'siswa', '2024-01-24'),
(26, 'MUHAMMAD AGUS WIJANARKO', '2110828', '2110828', 'siswa', '2024-01-24'),
(27, 'MUHAMAD NURDIN', '2110827', '2110827', 'siswa', '2024-01-24'),
(28, 'MOH ARIF FAUZI', '2110830', '2110830', 'siswa', '2024-01-24'),
(29, 'MARSYEL YANUAR NITIANGGORO', '2110826', '2110826', 'siswa', '2024-01-24'),
(30, 'M ALFAN SETIO AJI', '2110829', '2110829', 'siswa', '2024-01-24'),
(31, 'FARA KIKI WIJAYANTI', '2110820', '2110820', 'siswa', '2024-01-24'),
(32, 'ERTA DEWA SAPUTRA', '2110819', '2110819', 'siswa', '2024-01-24'),
(33, 'DIDIK EKA PRASETYA', '2110817', '2110817', 'siswa', '2024-01-24'),
(34, 'DIAN HANDAYANI', '2111076', '2111076', 'siswa', '2024-01-24'),
(35, 'DEVITA AGUSTINA', '2110816', '2110816', 'siswa', '2024-01-24'),
(36, 'DEVIA ELISABETH', '2110815', '2110815', 'siswa', '2024-01-24'),
(37, 'CINDI OLIVIA ASTUTIK', '2110814', '2110814', 'siswa', '2024-01-24'),
(38, 'APRILLIA TRI ASTUTIK', '2110813', '2110813', 'siswa', '2024-01-24'),
(39, 'ANGGUN NOVITA SARI', '2110811', '2110811', 'siswa', '2024-01-24'),
(40, 'ALFIATUR ROHMANIAH', '2110810', '2110810', 'siswa', '2024-01-24'),
(41, 'AFRISKA PUTRI APRILIANA', '2110809', '2110809', 'siswa', '2024-01-24'),
(43, 'ANGGUN', '2110812', '2110812', 'siswa', '2024-01-25'),
(45, 'Siswa1', '112233', '112233', 'siswa', '2024-01-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izinsiswa`
--
ALTER TABLE `izinsiswa`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `izinsiswa`
--
ALTER TABLE `izinsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
