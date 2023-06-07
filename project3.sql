-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 09:14 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project3`
--

-- --------------------------------------------------------

--
-- Table structure for table `aanmelding`
--

CREATE TABLE `aanmelding` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `tijd` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aanmelding`
--

INSERT INTO `aanmelding` (`id`, `naam`, `email`, `datum`, `tijd`) VALUES
(40, 'test test', 'test@gmail.com', '2023-05-11', '9-15');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `available_dates`
--

CREATE TABLE `available_dates` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_dates`
--

INSERT INTO `available_dates` (`id`, `date`) VALUES
(1, '2023-05-13'),
(2, '2023-06-01'),
(3, '2023-05-18'),
(4, '2023-05-03'),
(5, '2023-05-10'),
(6, '2023-05-27'),
(7, '2023-05-03'),
(8, '2023-05-01'),
(9, '2023-05-12'),
(10, '2023-05-11'),
(11, '2023-05-11'),
(12, '2023-05-11'),
(13, '2023-06-08'),
(14, '2023-06-08'),
(15, '2023-06-08'),
(16, '2023-06-08'),
(17, '2023-06-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aanmelding`
--
ALTER TABLE `aanmelding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_dates`
--
ALTER TABLE `available_dates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aanmelding`
--
ALTER TABLE `aanmelding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_dates`
--
ALTER TABLE `available_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
