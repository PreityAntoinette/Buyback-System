-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2026 at 10:49 PM
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
-- Database: `buyback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `brand`, `model`) VALUES
(1, 'Apple', 'Iphone 12'),
(2, 'Apple', 'Iphone 13'),
(3, 'Apple', 'Iphone 14'),
(4, 'Apple', 'Iphone 15');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_iphone`
--

CREATE TABLE `mobile_iphone` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `storage` varchar(20) NOT NULL,
  `condition` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobile_iphone`
--

INSERT INTO `mobile_iphone` (`id`, `brand`, `model`, `storage`, `condition`, `price`) VALUES
(1, 'Apple', 'iPhone 11', '128GB', 'Flawless', 15523.00),
(2, 'Apple', 'iPhone 11', '128GB', 'Excellent', 1800.00),
(3, 'Apple', 'iPhone 11', '256GB', 'Flawless', 2000.00),
(4, 'Apple', 'iPhone 11', '256GB', 'Excellent', 1900.00),
(5, 'Apple', 'iPhone 11 Pro', '128GB', 'Flawless', 2100.00),
(6, 'Apple', 'iPhone 12', '128GB', 'Excellent', 2000.00),
(7, 'Apple', 'iPhone 12', '256GB', 'Flawless', 2300.00),
(8, 'Apple', 'iPhone 12', '256GB', 'Excellent', 2200.00),
(9, 'Apple', 'iPhone 11', '128GB', 'As New', 2000.00),
(10, 'Apple', 'iPhone 11', '256GB', 'As New', 2200.00),
(11, 'Apple', 'iPhone 11', '512GB', 'As New', 2400.00),
(12, 'Apple', 'iPhone 12', '128GB', 'As New', 2100.00),
(13, 'Apple', 'iPhone 12', '256GB', 'As New', 2300.00),
(14, 'Apple', 'iPhone 12', '512GB', 'As New', 2500.00),
(15, 'Apple', 'iPhone 11', '128GB', 'Good', 1500.00),
(16, 'Apple', 'iPhone 11', '256GB', 'Good', 1600.00),
(17, 'Apple', 'iPhone 11', '512GB', 'Good', 1800.00),
(18, 'Apple', 'iPhone 12', '128GB', 'Good', 1700.00),
(19, 'Apple', 'iPhone 12', '256GB', 'Good', 1900.00),
(20, 'Apple', 'iPhone 12', '512GB', 'Good', 2100.00),
(21, 'Apple', 'Iphone 13', '128gb', 'As New', 1200.00),
(22, 'Apple', 'Iphone 13', '128gb', 'Flawless', 1300.00),
(23, 'Apple', 'Iphone 13', '128gb', 'Excellent', 1200.00),
(24, 'Apple', 'Iphone 13', '128gb', 'Good', 1500.00),
(25, 'Apple', 'Iphone 13', '128gb', 'As New', 1200.00),
(26, 'Apple', 'Iphone 13', '128gb', 'Flawless', 1300.00),
(27, 'Apple', 'Iphone 13', '128gb', 'Excellent', 1200.00),
(28, 'Apple', 'Iphone 13', '128gb', 'Good', 1500.00),
(29, 'Apple', 'Iphone 13', '128gb', 'As New', 1500.00),
(30, 'Apple', 'Iphone 13', '128gb', 'Flawless', 1200.00),
(31, 'Apple', 'Iphone 13', '128gb', 'Excellent', 1150.00),
(32, 'Apple', 'Iphone 13', '128gb', 'Good', 1000.00),
(33, 'Apple', 'Iphone 13', '256GB', 'As New', 1000.00),
(34, 'Apple', 'Iphone 13', '256GB', 'Flawless', 1000.00),
(35, 'Apple', 'Iphone 13', '256GB', 'Excellent', 1500.00),
(36, 'Apple', 'Iphone 13', '256GB', 'Good', 1500.00),
(37, 'Apple', 'Iphone 13', '1TB', 'As New', 100.00),
(38, 'Apple', 'Iphone 13', '1TB', 'Flawless', 100.00),
(39, 'Apple', 'Iphone 13', '1TB', 'Excellent', 100.00),
(40, 'Apple', 'Iphone 13', '1TB', 'Good', 100.00),
(41, 'Apple', 'Iphone 14', '128GB', 'As New', 100.00),
(42, 'Apple', 'Iphone 14', '128GB', 'Flawless', 100.00),
(43, 'Apple', 'Iphone 14', '128GB', 'Excellent', 100.00),
(44, 'Apple', 'Iphone 14', '128GB', 'Good', 100.00),
(45, 'Apple', 'Iphone 14', '256GB', 'As New', 100.00),
(46, 'Apple', 'Iphone 14', '256GB', 'Flawless', 100.00),
(47, 'Apple', 'Iphone 14', '256GB', 'Excellent', 100.00),
(48, 'Apple', 'Iphone 14', '256GB', 'Good', 100.00),
(49, 'Apple', 'Iphone 14', '1TB', 'As New', 130.00),
(50, 'Apple', 'Iphone 14', '1TB', 'Flawless', 120.00),
(51, 'Apple', 'Iphone 14', '1TB', 'Excellent', 130.00),
(52, 'Apple', 'Iphone 14', '1TB', 'Good', 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `device_id` int(11) DEFAULT NULL,
  `storage` varchar(20) DEFAULT NULL,
  `condition_type` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `device_id`, `storage`, `condition_type`, `price`) VALUES
(1, 1, '128gb', 'good', 1200),
(2, 1, '128gb', 'good', 1200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_iphone`
--
ALTER TABLE `mobile_iphone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_id` (`device_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mobile_iphone`
--
ALTER TABLE `mobile_iphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
