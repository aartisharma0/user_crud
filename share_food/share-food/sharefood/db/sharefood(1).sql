-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 01:44 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharefood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `donar_receiver`
--

CREATE TABLE `donar_receiver` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `isRegisterAsDonar` tinyint(1) NOT NULL DEFAULT 0,
  `isRegisterAsReceiver` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donar_receiver`
--

INSERT INTO `donar_receiver` (`id`, `name`, `email`, `password`, `gender`, `image`, `contact`, `address`, `status`, `isRegisterAsDonar`, `isRegisterAsReceiver`) VALUES
(1, 'Gaurav', 'gaurav@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '', 1234567890, 'Jalandhar', 1, 1, 0),
(2, 'Surbhi', 'surbhi@gmail.com', '202cb962ac59075b964b07152d234b70', 'female', '', 123123123, 'Jalandhar', 1, 0, 1),
(3, 'Donar Number2', 'donar2@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '', 1234567890, 'Jalandhar', 1, 1, 0),
(4, 'RavI NGO', 'ngo@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '', 123123123, 'Jalandhar', 1, 0, 1),
(6, 'Donar Reg', 'donar2@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '', 998877665, 'Jalandhar', 1, 1, 0),
(7, 'Requester', 'req@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '', 1342112313, 'Jalandhar', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donate_request`
--

CREATE TABLE `donate_request` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `qty` varchar(199) NOT NULL,
  `donarId` int(11) DEFAULT NULL,
  `donationDate` timestamp NULL DEFAULT NULL,
  `recieverId` int(11) DEFAULT NULL,
  `isDonateRequest` int(11) NOT NULL DEFAULT 0,
  `isRequest` int(11) NOT NULL DEFAULT 0,
  `requestDate` timestamp NULL DEFAULT NULL,
  `isPending` tinyint(4) NOT NULL DEFAULT 1,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate_request`
--

INSERT INTO `donate_request` (`id`, `categoryId`, `foodId`, `qty`, `donarId`, `donationDate`, `recieverId`, `isDonateRequest`, `isRequest`, `requestDate`, `isPending`, `createdAt`) VALUES
(1, 8, 8, '100 Packets', 1, '2023-03-23 12:22:28', 4, 1, 0, '2023-03-23 12:22:28', 0, '2023-03-23 12:22:28'),
(2, 1, 1, '20KG', 1, '2023-03-23 12:22:28', 2, 0, 1, '2023-03-23 12:22:28', 0, '2023-03-23 12:22:28'),
(3, 0, 1, '100KG', 1, '2023-03-30 18:30:00', 2, 1, 0, NULL, 0, '2023-03-24 03:48:35'),
(4, 0, 6, '100 person', NULL, NULL, 2, 0, 1, '2023-03-30 18:30:00', 1, '2023-03-24 11:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`id`, `name`, `image`, `created_at`) VALUES
(1, 'Raw Food', 'raw_food.jpg', '2023-03-18 07:59:17'),
(2, 'Cooked Food', 'cooked_food.jpg', '2023-03-18 07:59:57'),
(7, 'Chips Packets', '4585260Untitled.jpg', '2023-03-23 12:07:38'),
(8, 'Packed Cookies', '1218740Untitled.jpg', '2023-03-23 12:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `category`, `item_name`, `image`, `description`, `created_at`) VALUES
(1, 1, 'Wheat Flour', 'wheat_flour.jpg', 'description for the wheat flour', '2023-03-18 10:58:56'),
(2, 1, 'Mustard Oil', 'oil.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut libero vel odio aliquam ultricies. Aliquam tristique, ex nec imperdiet venenatis, arcu ex fermentum velit, ut auctor lorem risus sed', '2023-03-18 10:59:05'),
(3, 2, 'Fried Rice', 'fried_rice.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut libero vel odio aliquam ultricies. Aliquam tristique, ex nec imperdiet venenatis, arcu ex fermentum velit, ut auctor lorem risus sed', '2023-03-18 10:59:15'),
(6, 2, 'Dal', 'dal.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut libero vel odio aliquam ultricies. Aliquam tristique, ex nec imperdiet venenatis, arcu ex fermentum velit,', '2023-03-18 10:59:57'),
(8, 8, 'Parle G Biscuits', '1142316Untitled.jpg', 'Parle G Biscuits', '2023-03-23 12:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `name`, `image`, `city`, `phone`, `description`, `status`, `createdAt`) VALUES
(1, 'Save India', '', 'Jalandhar', 1231231231, 'Jalandhar Based COmpanye', '', '2023-03-23 13:16:55'),
(2, 'Save India', '', 'Jalandhar', 1231231231, 'Jalandhar Based COmpanye', '', '2023-03-23 13:17:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donar_receiver`
--
ALTER TABLE `donar_receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_request`
--
ALTER TABLE `donate_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donar_receiver`
--
ALTER TABLE `donar_receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donate_request`
--
ALTER TABLE `donate_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
