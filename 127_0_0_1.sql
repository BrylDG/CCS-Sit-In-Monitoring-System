-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 04:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activities`
--
CREATE DATABASE IF NOT EXISTS `activities` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `activities`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `idno` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `yearlevel` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `idno`, `lastname`, `firstname`, `middlename`, `course`, `yearlevel`, `email`, `username`, `password`, `reg_date`) VALUES
(4, '123', 'Amaro', 'Kobe', 'A', 'BSIT', 1, '0', 'kobe', '$2y$10$6NTM8j1UGp/FCkLL4AkLXOaLRG/c/OkqhBeqlKcqULx7loGzjJgJ6', '2025-01-31 02:45:28'),
(5, '321', 'Gorgonio', 'Bryl Darel', 'Mejeca', 'BSIT', 1, '0', 'bryl', '$2y$10$ePsgoce/cc489X1QMad.FOsoNuoLV2Kh4w4KPUX7l7tZDGupfqPGq', '2025-01-31 02:45:51'),
(6, '0321', 'Alesna', 'Christine Anne', 'Aguhar', 'BSIT', 3, '0', 'christine', '123', '2025-01-31 02:49:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
