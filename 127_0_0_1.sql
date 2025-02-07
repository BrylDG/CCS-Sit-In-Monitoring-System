-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 04:45 AM
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
-- Database: `sitinmanagementsystem`
--
CREATE DATABASE IF NOT EXISTS `sitinmanagementsystem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sitinmanagementsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idNo` int(11) NOT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `middleName` char(1) DEFAULT NULL,
  `course` varchar(10) DEFAULT NULL,
  `yearLevel` int(11) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idNo`, `lastName`, `firstName`, `middleName`, `course`, `yearLevel`, `emailAddress`, `username`, `password`) VALUES
(41703, 'Alesna', 'Christine Anne', 'A', 'BSIT', 3, 'christine@gmail.com', 'christine', '$2y$10$m0GQgF5m6p0Xca9nFLxRle008Dj59sSzEtGIS.O2.yfzavWtd/uj2'),
(123154, 'Mejeca', 'Darel', 'M', 'BSCS', 2, 'darel@gmail.com', 'darel', '$2y$10$63LNp3XmqRlCd5HMrOpPFubIedkfYkvM459niGWHAJLyDCAZo8nIG'),
(456123, 'Sullano', 'Jerson', 'S', 'BSIT', 3, 'jerson@gmail.com', 'jerson', '$2y$10$8NgKtY1qAObEGJunl7SUAOAOaBz8U2q7iCmbLlfqDTx5ap6U1ju3u'),
(12345678, 'Alferez', 'Clifford', 'A', 'BSIT', 3, 'clifford@gmail.com', 'clifford', '$2y$10$GHgAbcQB9RZRjmeSUR/sCe66gcyQ7ceIxOKPp3YkBUb5Glt.WLenO'),
(13212312, 'Nabua', 'Harold', 'M', 'BSCS', 1, 'harold@gmail.com', 'harold', '$2y$10$YCd8n70RuGv8HuAYwfxiCepzKKQndI3l2Y7AXP4.Wv1CV2BXz25MS'),
(20949194, 'Gorgonio', 'Bryl Darel', 'M', 'BSIT', 3, 'brylgorgonio@gmail.com', 'bryl', '$2y$10$FJzl6vJMLk1J3sqr6/478eWt.VQ94fCwPxlihbT/f7MHKPpQOmJxu'),
(78945612, 'Amaro', 'Kobe', 'A', 'BSIT', 3, 'kobe@gmail.com', 'kobe', '$2y$10$otWf.3uSW1dQzKseG1bDCefGvkjYw4X3THemC2I3Wd0BerH69MIa2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
