-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 09:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babycare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'active', '2023-08-08 07:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(9) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `nanny_email` varchar(100) NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `parent_email`, `nanny_email`, `datefrom`, `dateto`, `status`, `created_at`) VALUES
(4, 'raj@gmail.com', 'janki@gmail.com', '2023-08-10', '2023-09-10', 'Completed', '2023-08-10 02:10:09'),
(5, 'raj@gmail.com', 'aman@gmail.com', '2023-08-11', '2023-08-17', 'Approved', '2023-08-10 05:41:45'),
(6, 'raj@gmail.com', 'aarti@gmail.com', '2023-08-01', '2023-08-23', 'Accepted', '2023-08-10 06:16:04'),
(7, 'raj@gmail.com', 'aarti@gmail.com', '2023-08-03', '2023-08-22', 'Rejected', '2023-08-10 06:18:17'),
(8, 'raj@gmail.com', 'aarti@gmail.com', '2023-08-03', '2023-08-02', 'Accepted', '2023-08-10 06:20:36'),
(9, 'raj@gmail.com', 'aarti@gmail.com', '2023-08-01', '2023-08-18', 'Pending', '2023-08-10 06:26:20'),
(10, 'ls@gmail.com', 'pooja@gmail.com', '2023-08-18', '2023-08-31', 'Rejected', '2023-08-10 06:35:14'),
(11, 'ls@gmail.com', 'pooja@gmail.com', '2023-08-19', '2023-08-30', 'Accepted', '2023-08-10 06:35:58'),
(12, 'raj@gmail.com', 'aarti@gmail.com', '2023-08-03', '2023-08-01', 'Pending', '2023-08-10 19:23:28'),
(13, 'raj@gmail.com', 'pooja@gmail.com', '2023-08-11', '2023-08-09', 'Pending', '2023-08-10 19:29:05'),
(14, 'raj@gmail.com', 'aarti@gmail.com', '2023-08-04', '2023-07-31', 'Pending', '2023-08-10 19:30:34'),
(15, 'raj@gmail.com', 'aarti@gmail.com', '2023-08-04', '2023-08-24', 'Pending', '2023-08-10 19:35:06'),
(16, 'raj@gmail.com', 'aarti@gmail.com', '2023-08-11', '2023-08-17', 'Pending', '2023-08-10 19:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'Raj', 'raj@gmail.com', 'Availability', 'Message testing\r\n', '', '2023-08-09 20:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `nanny`
--

CREATE TABLE `nanny` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` longtext NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(250) NOT NULL,
  `adharcard_id` bigint(12) NOT NULL,
  `pan_id` varchar(10) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nanny`
--

INSERT INTO `nanny` (`id`, `name`, `email`, `password`, `contact`, `address`, `dob`, `gender`, `adharcard_id`, `pan_id`, `qualification`, `image`, `status`, `created_at`) VALUES
(1, 'Aarti Sharma', 'aarti@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'Jalandhar, India', '2023-08-11', 'Female', 123546789012, '1234567890', 'B.sc Home Science', '1307365344.104180766.testimonial-4.jpg', 'active', '2023-08-09 14:51:58'),
(3, 'Janki ', 'janki@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543210, 'Mumbai, India', '2023-08-01', 'Female', 123456789008, '1235467889', 'Diploma In Home Science', '423618783.testimonial-1.jpg', 'active', '2023-08-10 01:17:41'),
(4, 'Aman Preet Kaur', 'aman@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'Jalandhar, Punjab', '2023-08-05', 'Female', 123456789011, '1234567889', 'B.sc Nursing', '691893312.team-1.jpg', 'active', '2023-08-10 01:33:19'),
(5, 'jyuyfu', 'as@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'jbfsdkf', '2023-08-04', 'Female', 123456789012, '1234567890', 'jkskdjkda', '2080323081.194049109.1344970673.service-4.jpg', 'active', '2023-08-10 05:52:28'),
(7, 'Pooja kumari', 'pooja@gmail.com', '202cb962ac59075b964b07152d234b70', 6435345343, 'jalandhar', '2023-08-24', 'Female', 786786786877, 'MADER8787H', 'ba', '243016596.194049109.1344970673.service-4.jpg', 'active', '2023-08-10 06:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` longtext NOT NULL,
  `gender` varchar(250) NOT NULL,
  `adharcard_id` bigint(12) NOT NULL,
  `pan_id` bigint(10) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `name`, `email`, `password`, `contact`, `address`, `gender`, `adharcard_id`, `pan_id`, `status`, `created_at`) VALUES
(1, 'Raj', 'raj@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'india', 'Female', 123456789012, 1234567890, 'active', '2023-08-09 19:48:30'),
(2, 'LS', 'ls@gmail.com', '202cb962ac59075b964b07152d234b70', 8768789789, 'jalandhar', 'Male', 878789987888, 0, 'active', '2023-08-10 06:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nanny`
--
ALTER TABLE `nanny`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nanny`
--
ALTER TABLE `nanny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
