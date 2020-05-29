-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 07:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(16, 16, 'imtiazali4090@gmail.com', '$2y$10$rPjd3YkOM5XdR657H51n8ukxsbW5JgKgzPh8COXJT1PknfRYysE5W', 'user'),
(17, 17, 'imtiaz@gmail.com', '$2y$10$1Pxa82TiFcdDRNy2uGCay.QPRyTwd3bDC92ko9guURzSmNWIRwTDe', 'doctor');

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
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_inventory`
--
ALTER TABLE `medicine_inventory`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `validation`
--
ALTER TABLE `validation`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
