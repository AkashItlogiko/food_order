-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2024 at 07:02 AM
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
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(85, 'Akash', 'akash', '827ccb0eea8a706c4c34a16891f84e7b'),
(86, 'Sage Lester', 'qosatiz', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(31, 'Pizza', 'Food_Category_403.Array', 'Yes', 'Yes'),
(33, 'Burger', 'Food_Category_139.Array', 'Yes', 'Yes'),
(36, 'Momo', 'Food_Category_751.Array', 'Yes', 'Yes'),
(43, 'Pizza Pu', 'Food_Category_785.Array', 'Yes', 'Yes'),
(44, 'Sed quas sed dolore ', 'Food_Category_569.Array', 'Yes', 'Yes'),
(45, 'Spicy Pizza', 'Food_Category_161.Array', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(156) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(12, 'Best Burger', 'Burger with Hum Pineapple and lots of cheese.', 4, 'Food-Name-6898.jpg', 33, 'Yes', 'Yes'),
(13, 'Dumplings Specials', 'Chicken Dumpling with herbs from mountains', 10, 'Food-Name-6672.jpg', 36, 'Yes', 'Yes'),
(14, 'Smoky BBQ Pizza', 'Best Firewood Pizza In Tows', 8, 'Food-Name-7558.jpg', 31, 'Yes', 'Yes'),
(15, 'Sadeko Momo', 'The momo sadeko recipe is definitely a must-try .', 6, 'Food-Name-2625.jpg', 36, 'Yes', 'Yes'),
(16, 'Italian Pizza', 'Pizza, dish of Italian origin consisting of a flattened disk of bread dough topped with some combination of olive oil.', 10, 'Food-Name-8498.jpg', 31, 'Yes', 'Yes'),
(17, 'Naga Burger', 'it was really spicy 🔥🤤 the amount of chicken is also good over all it was really yummy!', 9, 'Food-Name-4398.jpg', 33, 'Yes', 'Yes'),
(26, 'Corporis optio dolo', 'Aspernatur eum vel r', 1, 'Food-Name-6863.jpg', 31, 'Yes', 'Yes'),
(27, 'Sunt consequuntur vo', 'Dolores tempor conse', 2, 'Food-Name-4624.jpg', 36, 'Yes', 'Yes'),
(29, 'Laborum Quas duis e', 'Dolore qui aut digni', 4, 'Food-Name-4134.webp', 31, 'Yes', 'Yes'),
(30, 'Quis aliquam volupta', 'Et laboriosam aut e', 5, 'Food-Name-1348.jpg', 33, 'Yes', 'Yes'),
(31, 'Spicy Pizza', 'Beatae nisi adipisci', 9, 'Food-Name-5947.jpg', 31, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Italian Pizza', 10, 1, 10, '2024-04-21 06:55:37', 'Delivered', 'Xavier Baird', '+1 (696) 165-5642', 'rexizus@mailinator.com', 'Id enim inventore v'),
(2, 'Italian Pizza', 10, 1, 10, '2024-04-20 13:48:51', 'Delivered', 'Sharon Swanson', '+1 (638) 386-7359', 'decuva@mailinator.com', 'Quis et beatae est a'),
(3, 'Naga Burger', 9, 4, 36, '2024-04-20 12:10:58', 'Delivered', 'Abigail Kerr', '+1 (126) 878-2376', 'cacitapuf@mailinator.com', 'Voluptatem incididun'),
(4, 'Naga Burger', 9, 2, 18, '2024-04-20 12:10:25', 'On Delivery', 'Ginger Woodard', '+1', 'baxixoba@mailinator.com', 'Laboris ducimus vol'),
(8, 'Smoky BBQ Pizza', 8, 1, 8, '2024-04-22 04:47:03', 'Cancelled', 'Marsden Johns', '+1 (717) 957-9656', 'xasizi@mailinator.com', 'Adipisci sit tempor'),
(9, 'Naga Burger', 9, 2, 18, '2024-04-21 06:56:47', 'Delivered', 'Mollie Kennedy', '+1 (526) 101-7302', 'nuvaweku@mailinator.com', 'Ab repudiandae dolor'),
(10, 'Best Burger', 5, 1, 5, '2024-04-21 08:52:37', 'Delivered', 'Zenia Taylor', '+1 (842) 475-2417', 'ziqavysi@mailinator.com', 'Consectetur eiusmod '),
(11, 'Best Burger', 5, 1, 5, '2024-04-22 04:46:48', 'On Delivery', 'Willow Riggs', '+1 (288) 253-6956', 'goxe@mailinator.com', 'Ut modi voluptate qu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
