-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 12:46 PM
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
-- Database: `tokohijab`
--

-- --------------------------------------------------------

--
-- Table structure for table `hijab`
--

CREATE TABLE `hijab` (
  `id` int(50) NOT NULL,
  `nama_pembeli` varchar(200) NOT NULL,
  `jenis_hijab` varchar(200) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `edit_file` tinyint(1) NOT NULL,
  `hapus_file` tinyint(1) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hijab`
--

INSERT INTO `hijab` (`id`, `nama_pembeli`, `jenis_hijab`, `harga`, `stok`, `edit_file`, `hapus_file`, `file`) VALUES
(17, 'tia', 'Pashmina', '15000', '10', 0, 0, ''),
(18, 'tiara', 'Pashmina', '15000', '10', 0, 0, ''),
(19, 'aji', 'Pashmina', '15000', '15', 0, 0, ''),
(20, 'hersa', 'bergo', '20000', '45', 0, 0, ''),
(21, 'TIRAM', 'bergo', '25000', '20', 0, 0, ''),
(22, 'tiara', 'bergo', '45000', '10', 0, 0, ''),
(23, 'tiara', 'bergo', '45000', '10', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hijab`
--
ALTER TABLE `hijab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hijab`
--
ALTER TABLE `hijab`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
