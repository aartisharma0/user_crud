-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 06:50 PM
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
-- Database: `note_reference`
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
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'active', '2023-07-29 08:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(9) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `logo`, `status`, `created_at`) VALUES
(1, 'B.Tech', '509547752.4.jpg', 'active', '2023-07-31 17:19:58'),
(6, 'MCA', '1268030639.3.jpg', 'active', '2023-08-02 15:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(9) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'Aarti', 'aarti@gmail.com', 'Previes year Quetion Paper', 'Do we Have previous Year quetion Papers?\r\n', 'active', '2023-08-02 01:26:25'),
(2, 'janki', 'janki@gmail.com', '123', 'abc', 'active', '2023-08-02 05:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(9) NOT NULL,
  `title` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `course` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `semester` int(9) NOT NULL,
  `description` longtext NOT NULL,
  `pdf` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `type`, `course`, `subject`, `semester`, `description`, `pdf`, `user_email`, `user_type`, `status`, `created_at`) VALUES
(12, 'B.Tech Syllabus 2023-2024', 'Syllabus', 'B.Tech', 'C', 1, 'Electronics is a scientific and engineering discipline that studies and applies the principles of physics to design, create, and operate devices that manipulate electrons and other charged particles. Electronics is a subfield of electrical engineering, but it differs from it in that it focuses on using active devices such as transistors, diodes, and integrated circuits to control and amplify the flow of electric current and to convert it from one form to another, such as from alternating current (AC) to direct current (DC) or from analog to digital.', '1178874812.2127868263.Project Report File.docx', 'admin@gmail.com', 'admin', 'active', '2023-08-02 15:52:17'),
(13, 'C++ Notes', 'Notes', 'B.Tech', 'C', 1, 'Electronics is a scientific and engineering discipline that studies and applies the principles of physics to design, create, and operate devices that manipulate electrons and other charged particles. Electronics is a subfield of electrical engineering, but it differs from it in that it focuses on using active devices such as transistors, diodes, and integrated circuits to control and amplify the flow of electric current and to convert it from one form to another, such as from alternating current (AC) to direct current (DC) or from analog to digital.', '1129983379.Project File - O7 Services (1).docx', 'admin@gmail.com', 'admin', 'active', '2023-08-02 15:53:27'),
(14, 'Previous Year Question Paper', 'Question Paper', 'B.Tech', 'C', 1, 'Electronics is a scientific and engineering discipline that studies and applies the principles of physics to design, create, and operate devices that manipulate electrons and other charged particles. Electronics is a subfield of electrical engineering, but it differs from it in that it focuses on using active devices such as transistors, diodes, and integrated circuits to control and amplify the flow of electric current and to convert it from one form to another, such as from alternating current (AC) to direct current (DC) or from analog to digital.', '1042462298.2127868263.Project Report File (2).docx', 'admin@gmail.com', 'admin', 'active', '2023-08-02 15:54:38'),
(15, 'vjdhasdjagdq', 'Question Paper', 'B.Tech', 'C', 2, 'C is a general-purpose C is a gene language created by Dennis Ritchie at the Bell Laboratories in 1972.C is a general-purpose programming language created by Dennis Ritchie at the Bell Laboratories in', '238358041.2127868263.Project Report File (2).docx', 'admin@gmail.com', 'admin', 'active', '2023-08-02 16:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(9) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `course_name`, `subject_name`, `logo`, `status`, `created_at`) VALUES
(5, 'B.Tech', 'C', '1491223878.6.jpg', 'active', '2023-08-02 15:49:37'),
(6, 'MCA', 'Data Structure and Algorithm', '1105022058.5.jpg', 'active', '2023-08-02 15:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `qualification`, `status`, `created_at`) VALUES
(1, 'hghc', 'chh@gmail.com', '9b04d152845ec0a378394003c96da594', 9876543217, 'fsferet', 'active', '2023-08-01 21:48:19'),
(3, 'Aarti', 'aarti@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543217, 'MCA', 'active', '2023-08-01 21:49:35'),
(4, 'janki', 'janki@gmail.com', '202cb962ac59075b964b07152d234b70', 8978977895, 'btech', 'active', '2023-08-02 05:01:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_name` (`course_name`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
