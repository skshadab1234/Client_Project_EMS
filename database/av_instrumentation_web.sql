-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 06:09 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `av_instrumentation_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_image` varchar(255) NOT NULL,
  `emp_sign_upload` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_martial_status` varchar(255) NOT NULL,
  `emp_date_of_joining` date NOT NULL,
  `emp_date_of_leaving` date NOT NULL,
  `location_site` varchar(255) NOT NULL,
  `pf_no_uan_no` varchar(255) NOT NULL,
  `esic_no` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `present_pincode` int(11) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `permanent_pincode` int(20) NOT NULL,
  `mn_no_1` varchar(255) NOT NULL,
  `mb_no_2` varchar(255) NOT NULL,
  `emp_adhar_no` varchar(255) NOT NULL,
  `emp_election_id_no` varchar(255) NOT NULL,
  `emp_passport_no` varchar(255) NOT NULL,
  `emp_pan_no` varchar(255) NOT NULL,
  `emp_name_of_bank_account_holder` varchar(255) NOT NULL,
  `emp_bank_account_no` varchar(255) NOT NULL,
  `emp_bank_ifsc_code` varchar(20) NOT NULL,
  `emp_father_name` varchar(255) NOT NULL,
  `emp_father_dob` date NOT NULL,
  `emp_father_age` int(10) NOT NULL,
  `emp_mother_name` varchar(255) NOT NULL,
  `emp_mother_dob` date NOT NULL,
  `emp_mother_age` int(10) NOT NULL,
  `emp_wife_name` varchar(255) NOT NULL,
  `emp_wife_dob` date NOT NULL,
  `emp_wife_age` int(10) NOT NULL,
  `emp_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_image`, `emp_sign_upload`, `emp_name`, `emp_dob`, `emp_martial_status`, `emp_date_of_joining`, `emp_date_of_leaving`, `location_site`, `pf_no_uan_no`, `esic_no`, `present_address`, `present_pincode`, `permanent_address`, `permanent_pincode`, `mn_no_1`, `mb_no_2`, `emp_adhar_no`, `emp_election_id_no`, `emp_passport_no`, `emp_pan_no`, `emp_name_of_bank_account_holder`, `emp_bank_account_no`, `emp_bank_ifsc_code`, `emp_father_name`, `emp_father_dob`, `emp_father_age`, `emp_mother_name`, `emp_mother_dob`, `emp_mother_age`, `emp_wife_name`, `emp_wife_dob`, `emp_wife_age`, `emp_status`) VALUES
(1, '392433077_1.jpg', '874389156_AdyshevMM-signature.png', 'SHADAB Alam', '2000-04-30', 'married', '2021-01-20', '2021-11-15', 'mumbai', 'MAHB0000000001221213232', '3100000011A2SASASAS2', 'Sayeed Manzil, Room no 104,\r\nKasua, Mumbra', 400612, 'Sayeed Manzil, Room no 104,\r\nKasua, Mumbra', 400612, '9168754858', '9168754858', '916875485812', 'M2KLM01234', 'J21K821', 'HDIPS12345', 'SHADABALAM JAMAL AHMED KHAN', '68033277585', 'MAHB00001401', 'JAMAL AHMED', '1975-11-20', 55, 'JASIMUNNISA', '1977-04-25', 53, 'XYZABC', '2002-12-21', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_child_details`
--

CREATE TABLE `employee_child_details` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `emp_child_name` varchar(255) NOT NULL,
  `emp_child_dob` date NOT NULL,
  `emp_child_age` int(11) NOT NULL,
  `emp_child_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_child_details`
--

INSERT INTO `employee_child_details` (`id`, `employee_id`, `emp_child_name`, `emp_child_dob`, `emp_child_age`, `emp_child_status`) VALUES
(1, 1, 'Sohail', '2020-12-21', 1, 1),
(2, 1, 'Sahil', '2018-12-21', 2, 1),
(3, 1, 'XYZ', '2019-11-30', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture_link` varchar(255) NOT NULL,
  `user_dob` date DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `picture_link`, `user_dob`, `status`, `added_on`) VALUES
(1, 'Khan1', 'Shadab', 'shadab@gmail.com', '$2y$10$H0MfF5eIwvAw0VpCF/ruTe/O9BgWwpLAieDi4k4uD3hp3JNfA4mea', 'media/546905dse20128484.jpeg', '1990-03-04', 1, '2020-12-29 02:00:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_child_details`
--
ALTER TABLE `employee_child_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_child_details`
--
ALTER TABLE `employee_child_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
