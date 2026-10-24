-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 12:58 PM
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
-- Database: `tourtravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmainpackage`
--

CREATE TABLE `addmainpackage` (
  `id` int(30) NOT NULL,
  `package_name` varchar(30) NOT NULL,
  `uploadfile` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addmainpackage`
--

INSERT INTO `addmainpackage` (`id`, `package_name`, `uploadfile`) VALUES
(4, 'Australia', 'Screenshot (3).png');

-- --------------------------------------------------------

--
-- Table structure for table `addpackages`
--

CREATE TABLE `addpackages` (
  `id` int(30) NOT NULL,
  `package_name` varchar(20) NOT NULL,
  `uploadfile` varchar(25) NOT NULL,
  `package_duration` varchar(35) NOT NULL,
  `package_price` int(20) NOT NULL,
  `package_type` varchar(25) NOT NULL,
  `package_location` varchar(30) NOT NULL,
  `package_details` varchar(30) NOT NULL,
  `package_features` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addpackages`
--

INSERT INTO `addpackages` (`id`, `package_name`, `uploadfile`, `package_duration`, `package_price`, `package_type`, `package_location`, `package_details`, `package_features`) VALUES
(3, 'melbourne', 'Screenshot (3).png', '4 days 2 nights', 25000, 'premium', 'Australia', 'breakfast', 'all service');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `name` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `number` int(20) NOT NULL,
  `messaage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`name`, `email`, `number`, `messaage`) VALUES
('', '', 0, ''),
('', '', 0, ''),
('', '', 0, ''),
('devdeep', 'devdeep@gmail.com', 2147483647, 'Nice website');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(20) NOT NULL,
  `uploadimg` varchar(25) NOT NULL,
  `name` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `mobileno` bigint(12) NOT NULL,
  `tourdate` date NOT NULL,
  `package_name` varchar(20) NOT NULL,
  `package_rate` int(10) NOT NULL,
  `package_duration` varchar(20) NOT NULL,
  `package_type` varchar(20) NOT NULL,
  `booking_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `uploadimg`, `name`, `emailid`, `mobileno`, `tourdate`, `package_name`, `package_rate`, `package_duration`, `package_type`, `booking_date`, `status`) VALUES
(1, 'Screenshot (2).png', 'devdeep', 'vatsaldarji777@gmail.com', 2147483647, '2024-10-10', 'jammu', 150000, '5 days 2 nights', 'premium', '0000-00-00 00:00:00', 'Approved'),
(2, 'Screenshot (2).png', 'vatsal', 'vatsaldarji777@gmail', 2147483647, '2024-10-17', 'jammu', 150000, '5 days 2 nights', 'premium', '0000-00-00 00:00:00', ''),
(3, 'Screenshot (3).png', 'Aesha', 'vatsaldarji777@gmail', 2147483647, '2024-10-17', 'Melbourne', 249999, '9 days 8 nights', 'Gold', '0000-00-00 00:00:00', 'Approved'),
(4, 'Screenshot (3).png', 'karm', 'vatsaldarji777@gmail', 12345678, '2024-10-10', 'melbourne', 25000, '4 days 2 nights', 'premium', '0000-00-00 00:00:00', 'Approved'),
(5, 'Screenshot (3).png', 'vatsal', 'vatsaldarji777@gmail', 2147483647, '2024-10-13', 'melbourne', 25000, '4 days 2 nights', 'premium', '0000-00-00 00:00:00', ''),
(6, 'Screenshot (3).png', 'vatsal', 'vatsaldarji777@gmail', 2147483647, '2024-10-13', 'melbourne', 25000, '4 days 2 nights', 'premium', '0000-00-00 00:00:00', ''),
(7, 'Screenshot (3).png', 'vatsal', 'vatsaldarji777@gmail', 2147483647, '2024-10-13', 'melbourne', 25000, '4 days 2 nights', 'premium', '0000-00-00 00:00:00', ''),
(8, 'Screenshot (3).png', 'vatsal', 'vatsaldarji777@gmail.com', 2147483647, '2024-10-13', 'melbourne', 25000, '4 days 2 nights', 'premium', '0000-00-00 00:00:00', ''),
(9, 'Screenshot (3).png', 'kiran', 'vatsal456@gmail.com', 1234567890, '2024-10-20', 'melbourne', 25000, '4 days 2 nights', 'premium', '0000-00-00 00:00:00', 'Pending'),
(10, 'Screenshot (3).png', 'yash', 'vatsal456@gmail.com', 2147483647, '2024-12-14', 'melbourne', 25000, '4 days 2 nights', 'premium', '0000-00-00 00:00:00', ''),
(11, 'Screenshot (3).png', 'Nirav', 'vatsal456@gmail.com', 2147483647, '2024-10-13', 'melbourne', 25000, '4 days 2 nights', 'premium', '2024-10-13 00:00:00', ''),
(12, 'Screenshot (3).png', 'Nirav', 'vatsal456@gmail.com', 8160923147, '2024-10-13', 'melbourne', 25000, '4 days 2 nights', 'premium', '2024-10-13 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `usersign`
--

CREATE TABLE `usersign` (
  `id` int(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` int(10) NOT NULL,
  `dated` date NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmpassword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersign`
--

INSERT INTO `usersign` (`id`, `email`, `mobile`, `dated`, `password`, `confirmpassword`) VALUES
(1, 'vatsaldarji777@gmail.com', 2147483647, '0000-00-00', '12345678', '12345678'),
(2, 'vatsal456@gmail.com', 1234567890, '0000-00-00', 'vatsal@94', 'vatsal@94');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmainpackage`
--
ALTER TABLE `addmainpackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addpackages`
--
ALTER TABLE `addpackages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersign`
--
ALTER TABLE `usersign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addmainpackage`
--
ALTER TABLE `addmainpackage`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `addpackages`
--
ALTER TABLE `addpackages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usersign`
--
ALTER TABLE `usersign`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
