-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 02:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `contact_name` varchar(32) NOT NULL,
  `contact_email` varchar(32) NOT NULL,
  `contact_phone` varchar(15) NOT NULL,
  `contact_bg` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_bg`) VALUES
(3, 2, 'Myself', 'shatil4135@gmail.com', '1727546726', 'O+'),
(12, 3, 'Shatil', 'shatil4135@gmail.com', '01727546726', 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `user_id`, `image`, `description`) VALUES
(1, 2, 'demo 3.jpeg', 'DBCR'),
(2, 2, 'demo 1.png', 'Prescription');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `post` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `user_id`, `post`, `comment`) VALUES
(50, 3, 'Demo post by farhan', 'Demo reply'),
(52, 2, 'Demo Post', 'Demo Reply');

-- --------------------------------------------------------

--
-- Table structure for table `health_information`
--

CREATE TABLE `health_information` (
  `id` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `blood_group` varchar(32) NOT NULL,
  `height` int(32) NOT NULL,
  `weight` int(32) NOT NULL,
  `sugar_level` int(32) NOT NULL,
  `bp_high` int(32) NOT NULL,
  `bp_low` int(32) NOT NULL,
  `morning_med_time` time NOT NULL,
  `day_med_time` time NOT NULL,
  `night_med_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_information`
--

INSERT INTO `health_information` (`id`, `user_id`, `blood_group`, `height`, `weight`, `sugar_level`, `bp_high`, `bp_low`, `morning_med_time`, `day_med_time`, `night_med_time`) VALUES
(2, 2, 'A+', 150, 85, 2, 100, 80, '08:00:00', '13:00:00', '22:00:00'),
(6, 2, 'O+', 150, 85, 1, 180, 160, '08:00:00', '13:00:00', '22:00:00'),
(7, 3, 'A+', 160, 65, 1, 80, 60, '08:00:00', '13:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_inventory`
--

CREATE TABLE `medicine_inventory` (
  `id` int(128) NOT NULL,
  `user_id` int(32) NOT NULL,
  `med_name` varchar(32) NOT NULL,
  `count` int(32) NOT NULL,
  `price` int(32) NOT NULL,
  `morning` tinyint(32) NOT NULL,
  `day` tinyint(32) NOT NULL,
  `night` tinyint(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_inventory`
--

INSERT INTO `medicine_inventory` (`id`, `user_id`, `med_name`, `count`, `price`, `morning`, `day`, `night`) VALUES
(1, 2, 'Neotake', 15, 5, 1, 1, 0),
(3, 2, 'Napa', 22, 6, 1, 1, 1),
(4, 2, 'ABCD', 22, 3, 1, 0, 1),
(5, 3, 'Pain Killer', 4, 20, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_email`, `user_password`, `user_type`) VALUES
(2, 2, 'shatil4135@gmail.com', '$2y$10$1M8zd9fcwieJ/T4Ejg7SROrTaKatd2z/Z8DhM2hsKNgDa3jIg7p.a', 'user'),
(3, 3, 'fathan007@gmail.com', '$2y$10$OkTHwqdhrFPctCBFj.b1mOcaIpuqZoaNqrmj/C/mk0i4j2.P3m7ne', 'user'),
(8, 8, 'doctorA@gmail.com', '$2y$10$sXD3gHgBmAtJtvYWpJpGgePQTCW4.K2pDZTXFtWAZ32yhzAqj0cNy', 'doctor'),
(9, 9, 'demo@doctor.com', '$2y$10$Y1CuWKcZ7N/2VSfdw.wj4O8GEVwVC6QGtqxLnSu/FegdEMUrxjHC2', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `user_id` int(128) NOT NULL,
  `full_name` varchar(32) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_gender` varchar(32) NOT NULL,
  `user_bday` date NOT NULL,
  `user_type` varchar(32) NOT NULL,
  `license_no` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_id`, `full_name`, `user_email`, `user_password`, `user_gender`, `user_bday`, `user_type`, `license_no`) VALUES
(2, 'Moshiuzzaman Shatil', 'shatil4135@gmail.com', '$2y$10$1M8zd9fcwieJ/T4Ejg7SROrTaKatd2z/Z8DhM2hsKNgDa3jIg7p.a', 'male', '1997-02-26', 'user', NULL),
(3, 'Farhan', 'fathan007@gmail.com', '$2y$10$OkTHwqdhrFPctCBFj.b1mOcaIpuqZoaNqrmj/C/mk0i4j2.P3m7ne', 'male', '1996-09-28', 'user', NULL),
(8, 'Doctor A', 'doctorA@gmail.com', '$2y$10$sXD3gHgBmAtJtvYWpJpGgePQTCW4.K2pDZTXFtWAZ32yhzAqj0cNy', 'male', '2007-04-25', 'doctor', 9009),
(9, 'Doctor Demo', 'demo@doctor.com', '$2y$10$Y1CuWKcZ7N/2VSfdw.wj4O8GEVwVC6QGtqxLnSu/FegdEMUrxjHC2', 'male', '1991-11-29', 'doctor', 779898);

-- --------------------------------------------------------

--
-- Table structure for table `validation`
--

CREATE TABLE `validation` (
  `id` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `license_no` int(128) NOT NULL,
  `validation` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validation`
--

INSERT INTO `validation` (`id`, `user_id`, `user_email`, `user_name`, `license_no`, `validation`) VALUES
(5, 8, 'doctorA@gmail.com', 'Doctor A', 9009, 1),
(6, 9, 'demo@doctor.com', 'Doctor Demo', 779898, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_information`
--
ALTER TABLE `health_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_inventory`
--
ALTER TABLE `medicine_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`user_id`,`user_email`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`user_email`,`license_no`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`user_email`,`license_no`);

--
-- Indexes for table `validation`
--
ALTER TABLE `validation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `health_information`
--
ALTER TABLE `health_information`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicine_inventory`
--
ALTER TABLE `medicine_inventory`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `validation`
--
ALTER TABLE `validation`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
