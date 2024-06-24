-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 05:47 AM
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
-- Database: `student_resolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'active', '2023-08-03 15:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(9) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `dept_name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `subject` varchar(250) NOT NULL,
  `attach_image` varchar(250) NOT NULL,
  `anonymous` varchar(250) NOT NULL,
  `any_info` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  `hod` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complaint_type`, `dept_name`, `description`, `subject`, `attach_image`, `anonymous`, `any_info`, `user`, `hod`, `status`, `created_at`) VALUES
(1, 'Infrastructure Related', 'Mathematics', 'All Desk are not in their proper states as they are Damage.', 'Class Room Desks', '1132649270.blog_6.jpg', 'No', 'Kindly Change the class room material as soon as possible', 'aarti@gmail.com', 'sachin@gmail.com', 'Completed', '2023-08-06 13:17:59'),
(2, 'Teacher Related', 'Computer Science and Applications', 'Simran Mam being rude in class for no reason and not trying to complete syllabus as well', 'Teacher being rude for no reason', '134898519.avatar-03.jpg', 'Yes', 'Kindly Change the teacher as she also have not much knowleadge about subject', 'aarti@gmail.com', 'suman@gmail.com', 'Completed', '2023-08-06 13:20:28'),
(3, 'Student Related', 'Mathematics', 'Student Disturb lectures in between classes.', 'Student Disturb ', '72009011.blog_5.jpg', 'Yes', 'Kindly atleast warn them or take any serious action', 'harish@gmail.com', 'sachin@gmail.com', 'Completed', '2023-08-06 18:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(9) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `logo`, `status`, `created_at`) VALUES
(5, 'Computer Science and Applications', '619475298.download.jpg', 'active', '2023-08-05 07:34:59'),
(6, 'Fashion', '1453019480.blog_5.jpg', 'active', '2023-08-05 08:29:26'),
(7, 'Mathematics', '1548549539.about_02.jpg', 'active', '2023-08-05 08:29:44'),
(8, 'Chemistry', '1167770852.banner.jpg', 'active', '2023-08-05 08:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'Aarti Sharma', 'aarti@gmail.com', 'dvsfgdfg', 'fddfgdfgfd', 'active', '2023-08-06 13:13:21'),
(2, 'Aarti Sharma', 'aarti@gmail.com', 'dvsfgdfg', 'fddfgdfgfd', 'active', '2023-08-06 13:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `id` int(9) NOT NULL,
  `dept_name` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`id`, `dept_name`, `name`, `email`, `password`, `contact`, `description`, `image`, `status`, `created_at`) VALUES
(1, 'Computer Science and Applications', 'Suman Khurana', 'suman@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543218, '20 Year Experience in IT Field and Teaching', '1460059010.avatar-02.jpg', 'active', '2023-08-05 08:22:45'),
(5, 'Mathematics', 'Sachin Sehdev', 'sachin@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543218, 'Gold Medalist in PHD ', '933780191.avatar-01.jpg', 'active', '2023-08-05 08:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `rollno` int(9) NOT NULL,
  `dept_name` varchar(250) NOT NULL,
  `course` varchar(100) NOT NULL,
  `semester` int(9) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `unique_id` int(9) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `contact`, `father_name`, `rollno`, `dept_name`, `course`, `semester`, `gender`, `unique_id`, `status`, `created_at`) VALUES
(1, 'Aarti Sharma', 'aarti@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'Piara Ram', 225528, 'Computer Science and Applications', 'B.sc(IT)', 1, 'Female', 364129637, 'active', '2023-08-06 09:25:37'),
(3, 'Bhawna ', 'bhawna@gmail.com', '202cb962ac59075b964b07152d234b70', 1234567890, 'Surinder', 225532, 'Computer Science and Applications', 'B.sc(IT)', 4, 'Female', 1544183795, 'active', '2023-08-06 09:46:20'),
(6, 'Sujata', 'sujata@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'Sahil', 3456, 'Fashion', 'B.sc', 3, 'Female', 1557550996, 'active', '2023-08-06 18:37:36'),
(8, 'Harish Sharma', 'harish@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543217, 'Ram', 357842, 'Mathematics', 'b.sc in Vedic Maths', 5, 'Male', 261270293, 'active', '2023-08-06 18:39:54');

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
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dept_name` (`dept_name`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dept_name` (`dept_name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
