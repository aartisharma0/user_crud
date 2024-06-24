-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 12:03 AM
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
-- Database: `making_memories`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(9) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'admin@gmail.com', '123', 'active', '2023-07-23 15:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(9) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_contact` bigint(10) NOT NULL,
  `user_address` longtext NOT NULL,
  `photographer` text NOT NULL,
  `theme` varchar(250) NOT NULL,
  `price` int(9) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_name`, `user_email`, `user_contact`, `user_address`, `photographer`, `theme`, `price`, `time`, `date`, `status`, `created_at`) VALUES
(3, 'Janki', 'janki@gmail.com', 9876543218, 'Janki', 'harish@gmail.com', 'Destination Wedding', 400, '14:11:00', '2023-08-04', 'Rejected', '2023-07-28 20:42:03'),
(4, 'Janki', 'janki@gmail.com', 9876543218, 'Janki', 'harish@gmail.com', 'Destination Wedding', 400, '14:11:00', '2023-08-04', 'Completed', '2023-07-28 20:42:26'),
(5, 'Janki', 'janki@gmail.com', 9876543218, 'Janki', 'harish@gmail.com', 'Destination Wedding', 400, '14:11:00', '2023-08-04', 'Pending', '2023-07-28 20:42:32'),
(6, 'Janki', 'janki@gmail.com', 9876543218, 'Janki', 'harish@gmail.com', 'Destination Wedding', 400, '14:11:00', '2023-08-04', 'Pending', '2023-07-28 20:43:01'),
(7, 'Janki', 'janki@gmail.com', 9876543218, 'Janki', 'harish@gmail.com', 'Destination Wedding', 400, '14:11:00', '2023-08-04', 'Pending', '2023-07-28 20:43:38'),
(8, 'Aarti Sharma', 'aarti@gmail.com', 9876543219, 'Aarti Sharma', 'art@gmail.com', 'Old is Gold', 0, '03:22:00', '2023-07-29', 'Pending', '2023-07-28 21:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(9) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_image` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`, `status`, `created_at`) VALUES
(2, 'Pre-Wedding', '1421741019.project-5.jpg', 'active', '2023-07-23 16:12:04'),
(3, 'Adventure', '447669968.testimonial-4.jpg', 'active', '2023-07-26 18:05:00'),
(10, 'Wedding', '1593530925.project-1.jpg', 'active', '2023-07-28 15:37:23'),
(11, 'Potrait', '1344970673.service-4.jpg', 'active', '2023-07-28 15:37:45'),
(12, 'Black and White', '104180766.testimonial-4.jpg', 'active', '2023-07-28 15:38:26'),
(13, 'Macro Photograpgy', '2015327525.team-2.jpg', 'active', '2023-07-28 15:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(9) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `user_name`, `user_email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'Janki', 'admin@gmail.com', 'asfsdfs', 'dfsdfsd', 'active', '2023-07-28 21:11:07'),
(2, 'Janki', 'admin@gmail.com', 'Availability', 'Are you available for night shoot\r\n', 'active', '2023-07-28 21:11:50'),
(3, 'Janki', 'janki@gmail.com', 'Availability', 'Any Photographer available ', 'active', '2023-07-28 21:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE `photographer` (
  `id` int(9) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` longtext NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photographer`
--

INSERT INTO `photographer` (`id`, `name`, `email`, `password`, `contact`, `address`, `description`, `image`, `status`, `created_at`) VALUES
(20, 'Jassi', 'jass@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'India', 'Portrait Specialist', '598588714.hero-4.jpg', 'active', '2023-07-28 16:56:52'),
(21, 'Aarti Sharma', 'art@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543218, 'Jalandhar', 'Photography master in all fields', '1894533938.hero-3.jpg', 'active', '2023-07-28 17:46:10'),
(22, 'Harish', 'harish@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'Mumbai', 'Fashionist Specialist', '1527766760.team-2.jpg', 'active', '2023-07-28 17:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` longtext NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `contact`, `address`, `status`, `created_at`) VALUES
(1, 'Janki', 'janki@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543218, 'Jalandhar', 'active', '2023-07-28 06:28:02'),
(2, 'Aarti Sharma', 'aarti@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'Jaipur', 'active', '2023-07-28 21:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(9) NOT NULL,
  `photographer_email` varchar(250) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `tittle` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `price` int(9) NOT NULL,
  `image1` varchar(250) NOT NULL,
  `image2` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `photographer_email`, `category_name`, `tittle`, `description`, `price`, `image1`, `image2`, `status`, `created_at`) VALUES
(3, 'harish@gmail.com', 'Potrait', 'Portrait Photography  ', 'Natural light portraiture Portrait photography, or portraiture, is a type of photography aimed toward capturing the personality of a person or group of people by using effective lighting, backdrops, and poses. A portrait photograph may be artistic or clinical.', 300, '1008702362.project-2.jpg', '362375013.project-8.jpg', 'active', '2023-07-28 17:49:05'),
(4, 'harish@gmail.com', 'Wedding', 'Destination Wedding', 'Photography on Dream Land', 400, '936875252.about-1.jpg', '1932381646.project-1.jpg', 'active', '2023-07-28 17:51:46'),
(5, 'art@gmail.com', 'Macro Photograpgy', 'Macro Creature Shooting', 'Let Look the World in Depth', 1500, '1621524944.project-6.jpg', '1090927794.team-1.jpg', 'active', '2023-07-28 17:56:02'),
(6, 'art@gmail.com', 'Black and White', 'Old is Gold', 'Dream it Feel It', 25000, '557877571.project-2.jpg', '862236529.service-3.jpg', 'active', '2023-07-28 17:56:49'),
(7, 'art@gmail.com', 'Wedding', 'nsvdjav', 'nsvdjvdja', 10099, '635092955.about-2.jpg', '490372111.project-2.jpg', 'active', '2023-07-28 21:57:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photographer`
--
ALTER TABLE `photographer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photographer`
--
ALTER TABLE `photographer`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
