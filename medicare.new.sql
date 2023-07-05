-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 03:44 PM
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
-- Database: `medicare`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `full_name` varchar(125) NOT NULL,
  `gender` char(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_no` varchar(125) NOT NULL,
  `residential_address` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `next_of_kin_name` varchar(255) NOT NULL,
  `next_of_kin_no` varchar(125) NOT NULL,
  `existing_medical_conditions` varchar(255) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `blood_group` char(10) DEFAULT NULL,
  `genotype` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `full_name` varchar(125) NOT NULL,
  `gender` char(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `staff_password` varchar(125) NOT NULL,
  `phone_no` varchar(125) NOT NULL,
  `position` varchar(125) NOT NULL,
  `unit` varchar(125) NOT NULL,
  `specialty` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_id`, `full_name`, `gender`, `date_of_birth`, `email_address`, `staff_password`, `phone_no`, `position`, `unit`, `specialty`) VALUES
(1, '64a5691cec267', 'Gabriel jessica', 'female', '2002-03-27', 'admin@medicare.com', 'admin', '09058345722', 'receptionist', 'opd', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
