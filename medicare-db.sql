-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 01:38 PM
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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `appointment_id` varchar(20) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_type` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `comment_for_doctor` varchar(255) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointment_id`, `patient_id`, `appointment_type`, `doctor_id`, `comment_for_doctor`, `appointment_date`, `appointment_time`) VALUES
(4, '64c418d1a40f7', 2, 'General Check-up', 3, '', '2023-07-31', '10:00:00'),
(14, '64c64844be010', 3, 'General Check-up', 4, '', '2023-07-31', '12:00:00'),
(15, '64c736d3267a5', 3, 'Ear, Nose and Throat Checkup', 9, '', '2023-07-31', '12:00:00'),
(16, '64c737b464ded', 3, 'General Check-up', 10, '', '2023-08-02', '10:00:00'),
(17, '64c773269ea40', 5, 'Orthopedics', 4, '', '2023-08-01', '09:00:00'),
(18, '64ca3967c2d86', 3, 'Obstetrics and Gynecology', 12, '', '2023-08-04', '14:30:00'),
(21, '64cb912e88c19', 5, 'General Check-up', 17, '', '2023-08-04', '13:30:00');

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

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_id`, `full_name`, `gender`, `date_of_birth`, `phone_no`, `residential_address`, `email_address`, `next_of_kin_name`, `next_of_kin_no`, `existing_medical_conditions`, `allergies`, `blood_group`, `genotype`) VALUES
(1, '64c3f2f1cb7c9', 'Chinedu Eze', 'Female', '2000-06-20', '09012223309', 'Epicaizo Lodge, Odenigwe. Nsukka', 'chinedu.eze@gmail.com', 'Nkechi Eze', '09011123300', 'Asthma, , ', '', '', 'AA'),
(2, '64c417a63ffda', 'Great Chinaza Ifeanyichukwu', 'Male', '2004-04-04', '09013706847', 'Outside School, First Gate. UNN', 'chinazagreat@gmail.com', 'Nkechi Ifeanyichukwu', '0803667789', 'Asthma, Arthritis, , ', '', 'B', 'AS'),
(3, '64c45acf767e0', 'Amazing Enyichi Agu', 'Male', '2002-03-14', '09013706847', 'God\'s Time Lodge, Obukpa, Ajuona', 'enyichiaagu@gmail.com', 'Paul Agu', '07034436749', 'Diabetics, , ', '', '', 'AA'),
(4, '64c5199da8f97', 'Victor Abraham', 'Male', '2010-11-11', '09011122233', 'Odenigwe', 'abrahamvictor@gmail.com', 'Peace', '08011188844', 'Staph Infection, ', '', 'B', 'SS'),
(5, '64c772e51ab6d', 'Kingsley Uwandu', 'Male', '1999-03-14', '09045454543', 'Ogwashi Nsukka', 'kingsleyuwandu@gmail.com', 'Stanley Uwandu', '08012234456', ', ', '', '', ''),
(6, '64c8eabf3744f', 'Chidinma Okonkwo', 'Female', '2003-02-20', '0802334112', 'God\'s Choice Lodge, Behind Flat. UNN.', 'chidinma@gmail.com', 'Mark Okonkwo', '0901223456', ', ', '', '', ''),
(9, '64ca797ca2d19', 'Chinemerem Nwafor', 'Male', '2003-02-12', '09088876537', 'Outside School Gate, UNN', 'chinemerem@gmail.com', 'Ndukwe Nwafor', '0902221213', ', ', '', 'O', 'AA'),
(13, '64ca869336ab7', 'Onyinyechi Okere', 'Female', '2012-02-12', '0902213343', '5 Onyebuchi Close, Opp Total Filling Station. Ogbor Hill', 'onyi@gmail.com', 'Rowland Okere', '0902234534', ', ', '', 'O', 'AA'),
(14, '64caa72ec8d23', 'Joshua Nweke', 'Male', '2000-02-01', '0901223456', 'Bayelsa', 'joshua.nweke@gmail.com', 'Casandra Nweke', '0802334567', ', ', '', '', 'AA'),
(18, '64caaf3d8bf20', 'Yuval Noah Harari', 'Male', '1985-12-19', '+45 524 613 6661', 'Hebrew University, Israel', 'yuvalharari@gmail.com', 'Avesh Backtar', '+45 725 672 7762', ', ', '', 'AB', 'AS'),
(21, '64cb8883e50a1', 'Jackie Robinson', 'Female', '2022-02-22', '09012223456', 'Onongaya Estate, Umudike. Abia State', 'jackie@gmail.com', 'Charles Robinson', '08012223478', ', ', '', 'O', 'AA'),
(22, '64cb8be7d6805', 'Goodness Okezie', 'Female', '2011-12-30', '09012778345', 'Behind Flat, UNN', 'goodnessokezie@gmail.com', 'Pascal Okezie', '09062524261', ', ', '', 'O', 'AA');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(125) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `recipient` int(11) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `patient_id`, `entry_date`, `payment_date`, `amount`, `reason`, `recipient`, `paid`) VALUES
(1, '64cb888415bd7', 21, '2023-08-03 11:59:16', NULL, 1000, 'Patient Registration', NULL, 1),
(2, '64cb8be7ec32f', 22, '2023-08-03 12:13:43', NULL, 1000, 'Patient Registration', NULL, 0);

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
(1, '64a5691cec267', 'Jessica Gabriel', 'Female', '2002-03-27', 'jessica@medicare.com', '$2y$10$01IMTmJxf9k5zNVTveIsrOcfjGrU8Jq/lVLQu0VZTxL5pUjEMo4TS', '+234901292233701', 'Receptionist', 'opd', NULL),
(2, '64c3a38f545ad', 'Amazing Enyichi Agu', 'Male', '2002-03-14', 'enyichi@medicare.com', '$2y$10$uE3dDbK1wC0Tye7BdvXIu.ByIJ8kqxkHAfZh4UqXrgK3UyfnoYlh6', '09013706847', 'Dashboard Administrator', 'management', ''),
(3, '64c3a493ad6bf', 'Eben Noah', 'Male', '1995-05-22', 'ebennoah@medicare.com', '$2y$10$IC5xIZ5ZwABvEOl9bSuifuxOR.KIeVximmWa2vAzNpZHOIukm4ltW', '09056482312', 'Doctor', 'physician', ''),
(4, '64c3a4e375170', 'Samuel Deborah', 'Female', '1993-12-12', 'sammiedebbie@medicare.com', '$2y$10$fazTGlX5yAujHacYriUHuubI9BAILU7wu0HArIKXS3FRwotJs5rTi', '07025612394', 'Doctor', 'physician', ''),
(5, '64c3a563a81dc', 'Adam Green', 'Male', '1996-06-19', 'adamgreenie@medicare.com', '$2y$10$.i4u0Cut7gM2dkZ/YaD7WOiu7KNaynMJsq0pNDej/w7nk9aJQy1iW', '08067812433', 'Doctor', 'physician', ''),
(6, '64c3a5c061133', 'Sarah James', 'Female', '1978-04-25', 'sarahjames@medicare.com', '$2y$10$HMGx.FzdK5RlrgxPRwY4EeQ8uwAUBHQ2Xe04qvmOl8JuNTjFmf3hG', '09058833723', 'Doctor', 'physician', ''),
(7, '64c3a63f7aced', 'Lannie Paul', 'Female', '1992-09-30', 'lanniepaul@medicare.com', '$2y$10$ORN8RP6Yb5//5RMZ7G7z8eQJ9VQVeFP3vJopsfAgOBxH/EawJ1f3a', '09053422857', 'Doctor', 'physician', ''),
(9, '64c3a6efd3480', 'Larry Daniel', 'Male', '1968-08-29', 'larrydanny@medicare.com', '$2y$10$IG.r6etNzSZAd1RkhU.WyeLJfE.TEAb1ePD0vsHE78MwHOLGPHbIC', '08015673425', 'Doctor', 'physician', ''),
(10, '64c3a776e6fb8', 'Scarlett Johnson', 'Female', '1992-05-05', 'scarlettej@medicare.com', '$2y$10$37Xiq80JkmrwjMHfMtiuGe8XYE4izIrQaFNQA9GuCPk2//tx7XQ46', '08034582413', 'Doctor', 'physician', ''),
(11, '64c3a7daf2f9c', 'Kevin Landor', 'Male', '1949-06-16', 'kevincilan@medicare.com', '$2y$10$5muLQnmxjkvrHrztsZTEp.kX0vDbD8F7.PpaEZ.uen2oN3yDgKVaK', '07084512346', 'Doctor', 'physician', ''),
(12, '64c3a82f309c3', 'Great Lawrence', 'Male', '1980-04-27', 'greatlawrence@medicare.com', '$2y$10$aYfPhfhiI5UCWC2t4eGDRuBRNU.cJ.JCMLJgC2JYb7WSQP.7UFSKm', '09057823513', 'Doctor', 'physician', ''),
(17, '64c45e15010f9', 'Francesca Eze', 'Female', '1989-06-17', 'francesca@medicare.com', '$2y$10$.VuomDlOIX3qL2Hdt.WFz.xQ3tJOcEAoCQPy4hUzHIGhvZjRUW4Oi', '08034436749', 'Doctor', 'physician', ''),
(19, '64c51872b0941', 'Kingsley Uwandu', 'Male', '2005-01-01', 'kingsley@medicare.com', '$2y$10$zMqNOi7Fxj8UxjTrtDnBWOdTmdneMFy4ar9J9GebYZTzHf.liBxEe', '08169625678', 'Pharmacy Intern', 'pharmacy', ''),
(21, '64c549cfe76f8', 'Victor Abraham', 'Male', '2005-01-08', 'victor@medicare.com', '$2y$10$zX4t2N5ybZPV8HWmHc16futQT2JcgO.n7BOYXsk0EHY452omQkFTy', '0901333221', 'Dashboard Administrator', 'management', ''),
(23, '64c61c71cd5db', 'Gloria Madubueze', 'Female', '2005-07-30', 'gloria@medicare.com', '$2y$10$CcIdkw/ls2cAuBXj/H8lSeIrumdRBzuMX81bheXryV.cSzcSEy9rS', '09012223345', 'Nurse', 'nursing', ''),
(33, '64c92fea8e785', 'Patricia Okoro', 'Female', '1999-06-12', 'patricia@medicare.com', '$2y$10$2pjmrwdXXL2G3kPByBcpxOH0pW16PGq5srru2ek02RCdG3U6V5Xnq', '0901332456', 'Nurse', 'nursing', ''),
(34, '64c92ff6173f3', '', '', '0000-00-00', '', '$2y$10$jmyZlHwdTLcgSO.IdorCGeJlkeWsbx.8v.N/LtlsF8g3RpmJ3ZLhS', '', '', '', ''),
(35, '64ca10042493e', 'Chinaza Ozioma', 'Female', '2000-12-14', 'chinaza@medicare.com', '$2y$10$0i.8CuSWW4CpopKl/V2UfubEO.s5ywfOtLfpx/x6m3Gg7BLFoezI.', '0701223445', 'Head Accountant', 'bursary', '');

-- --------------------------------------------------------

--
-- Table structure for table `vital_signs`
--

CREATE TABLE `vital_signs` (
  `ID` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `blood_pressure` varchar(20) NOT NULL,
  `pulse_rate` varchar(20) NOT NULL,
  `body_weight` varchar(20) NOT NULL,
  `body_temperature` varchar(20) NOT NULL,
  `urine_composition` varchar(255) DEFAULT NULL,
  `oxygen_saturation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipient` (`recipient`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `vital_signs`
--
ALTER TABLE `vital_signs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vital_signs`
--
ALTER TABLE `vital_signs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`recipient`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `vital_signs`
--
ALTER TABLE `vital_signs`
  ADD CONSTRAINT `vital_signs_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
