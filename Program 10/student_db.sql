-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 11:46 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--
CREATE DATABASE IF NOT EXISTS `student_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `student_db`;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(30) NOT NULL,
  `stu_mobile` varchar(15) NOT NULL,
  `stu_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `stu_id`, `stu_name`, `stu_mobile`, `stu_email`) VALUES
(1, 53073, 'Santhosh K', '9876756431', 'santhoshkcse4@gmail.com'),
(5, 99145, 'Mahesh', '9875656567', 'mahesh@gmail.com'),
(11, 33944, 'THYAGARAJAN M', '9876765644', 'kuttpri2305@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stu_id` (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
