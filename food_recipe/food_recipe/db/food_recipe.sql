-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 08:59 PM
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
-- Database: `food_recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_image` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`, `status`, `created_at`) VALUES
(3, 'salad', '1638443410image (1).png', 'ACTIVE', '2023-08-10 06:49:04'),
(4, 'Italian', '844251808sr9.jpg', 'ACTIVE', '2023-08-10 07:09:33'),
(5, 'Japnees', '446378632bg4.jpg', 'ACTIVE', '2023-08-10 11:14:02'),
(6, 'Indian', '11962990141.jpg', 'ACTIVE', '2023-08-10 16:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(9) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `recipe` varchar(250) NOT NULL,
  `comment` longtext NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_email`, `recipe`, `comment`, `status`, `created_at`) VALUES
(1, 'aarti@gmail.com', '3', 'Very Easily Expalined', 'active', '2023-08-10 10:05:01'),
(2, 'aarti@gmail.com', '2', 'I love Pasta', 'active', '2023-08-10 10:24:22'),
(3, 'aarti@gmail.com', '2', 'Pasta ka Vasta', 'active', '2023-08-10 10:25:21'),
(4, 'poo@gmail.com', '5', 'Why Sushi named as sushi\r\n', 'active', '2023-08-10 18:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE `create_account` (
  `id` int(9) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(9) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`id`, `user_name`, `user_email`, `password`, `contact`, `city`, `state`, `pincode`, `status`, `created_at`) VALUES
(1, 'Aarti Sharma', 'aarti@gmail.com', '123', 9876543219, 'jalandhar', 'punjab', 144027, 'active', '2023-08-10 07:49:22'),
(2, 'Pooja Sharma', 'poo@gmail.com', '202cb962ac59075b964b07152d234b70', 9876543219, 'Hoshiarpur', 'Punjab', 144027, 'active', '2023-08-10 18:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(9) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, '', '', '', 'Is ther any recipe available in spaning category', 'active', '2023-08-10 08:35:42'),
(2, 'Pooja Sharma', 'poo@gmail.com', 'Dairy', 'Do We Print Books or Dairies on these Recipeies', 'active', '2023-08-10 18:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'actice',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'actice', '2023-08-10 06:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(15) NOT NULL,
  `category` varchar(50) NOT NULL,
  `recipe_name` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `time` varchar(50) NOT NULL,
  `serving` int(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `category`, `recipe_name`, `type`, `description`, `time`, `serving`, `image`, `link`, `status`, `created_at`) VALUES
(1, 'pizza', 'Pizza', 'veg', 'Start with a solid pizza dough recipe. Make the dough.  Proof the dough. Prepare the sauce and toppings. . Shape the dough. Bake the pizza.  Cool the pizza.', '20 minutes', 2, '807252439pizza-7.jpg', 'https://youtu.be/EKntQhwBxYs', 'ACTIVE', '2023-08-10 06:53:54'),
(2, 'Italian', 'Pasta', 'Vegitarian', 'For the masala base, the ingredients are your basic ones – spring onions, tomatoes, ginger-garlic paste, veggies and spice powders like turmeric, cumin, coriander, black pepper, red chili powder and garam masala powder.I also add veggies like carrots, green peas and capsicum or bell peppers in this Masala Pasta. These add a special texture, crunch as well as enhance the nutritional quotient of the dish overall.  This Masala Pasta recipe gives a yummy pasta dish with Indian flavors and makes for a good brunch, snack or a light dinner. While serving, you can garnish it with some coriander leaves, vegetarian parmesan cheese or grated cheddar cheese.You can also pack it in your kid’s tiffin box and be assured that the tiffin box is definitely going to come back empty!How to make Masala Pasta RecipeCook Pasta1. Heat 4 cups water along with ½ teaspoon salt till it comes to a boil.2. When the water comes to a boil, add 100 grams penne pasta.3. Cook the pasta without any lid on medium to high heat.4. Cook till the pasta becomes al dente. You can also cook it more, if you want.5. Baki App Bana Lo', '30 min', 2, '1009487439sr1.jpg', 'https://youtu.be/t4-hG_WcrF0', 'ACTIVE', '2023-08-10 07:26:50'),
(3, 'salad', 'Mexical Salad', 'Vegitarian', 'This delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to make', '15 min', 2, '1769644784bg6.jpg', 'https://youtu.be/nzNQ5lTmg1Q', 'ACTIVE', '2023-08-10 09:20:01'),
(4, 'Italian', 'Pizza', 'Non-Vegitarian', 'This delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to makeThis delicious Everyday Mexican Salad recipe is quick and easy to make.', '30 min', 4, '2091040010about.png', 'https://youtu.be/Qv8ACfz7sB0', '', '2023-08-10 10:46:37'),
(5, 'Japnees', 'Sushi', 'Vegitarian', 'Sushi rolls can be filled with any ingredients you choose. Try smoked salmon instead of imitation crabmeat. Serve with teriyaki sauce and wasabi.Sushi rolls can be filled with any ingredients you choose. Try smoked salmon instead of imitation crabmeat. Serve with teriyaki sauce and wasabi.Sushi rolls can be filled with any ingredients you choose. Try smoked salmon instead of imitation crabmeat. Serve with teriyaki sauce and wasabi.Sushi rolls can be filled with any ingredients you choose. Try smoked salmon instead of imitation crabmeat. Serve with teriyaki sauce and wasabi.', '30 min', 2, '903796138bg2.jpg', 'https://youtu.be/2EfqyRzdfps', '', '2023-08-10 11:21:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_account`
--
ALTER TABLE `create_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user_email`(50));

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `create_account`
--
ALTER TABLE `create_account`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
