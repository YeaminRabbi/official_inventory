-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 12:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `official_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'rabbi', 'rabbi@gmail.com', '123', '2021-07-17 06:56:58'),
(2, 'mehnaz', 'mehnaz@gmail.com', '123', '2021-07-17 06:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `choose_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `master_category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `master_category_name`, `created_at`) VALUES
(6, 'Windows 10', 'SOFTWARE', '2021-07-17 07:30:40'),
(7, 'Windows 7', 'SOFTWARE', '2021-07-17 07:30:45'),
(8, 'Pencil', 'STATIONARY', '2021-07-17 07:30:50'),
(9, 'Tissue', 'STATIONARY', '2021-07-17 07:30:55'),
(10, 'Chair', 'FURNITURE', '2021-07-17 07:31:00'),
(11, 'Table Desk', 'FURNITURE', '2021-07-17 07:31:05'),
(12, 'Iron Slayer', 'HARDWARE', '2021-07-17 07:31:11'),
(13, 'White Marker', 'STATIONARY', '2021-07-17 07:31:18'),
(15, 'Computer', 'ELECTRONICS', '2021-07-18 15:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `division_name`, `created_at`) VALUES
(1, 'CSE', '2021-07-18 15:56:00'),
(2, 'EEE', '2021-07-18 15:56:00'),
(3, 'DEPT', '2021-07-18 15:58:52'),
(4, 'ELectic', '2021-07-18 15:58:56'),
(5, 'Magical', '2021-07-18 15:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `quantity`, `category_id`, `created_at`) VALUES
(1, 'RFL chair (plastic)', -4, 10, '2021-07-17 08:11:14'),
(2, 'Windows Pro Version 10 (Activated)', 30, 6, '2021-07-17 08:11:35'),
(4, 'Monitor', -3, 15, '2021-07-18 15:22:49'),
(5, 'Mouse', 30, 15, '2021-07-18 15:22:55'),
(6, 'Keyboard', -20, 15, '2021-07-18 15:23:05'),
(7, 'Wifi Router', 0, 15, '2021-07-18 15:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_order_list`
--

CREATE TABLE `requisition_order_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_contact` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisition_order_list`
--

INSERT INTO `requisition_order_list` (`id`, `user_id`, `order_name`, `order_contact`, `created_at`, `status`) VALUES
(12, 2, 'Rabbi', '01768002727', '2021-07-21 21:03:29', 0),
(13, 2, 'Jelly ', '1425', '2021-07-21 21:17:53', 1),
(14, 2, 'Rabbi', '01768002727', '2021-07-21 21:18:45', 1),
(15, 2, 'Pajji', '546', '2021-07-21 21:21:16', 1),
(16, 3, 'Yousuf', '0154624814', '2021-07-22 10:08:22', 0),
(17, 1, 'Helly', '01768002727', '2021-07-22 10:10:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_order_product_list`
--

CREATE TABLE `requisition_order_product_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisition_order_product_list`
--

INSERT INTO `requisition_order_product_list` (`id`, `product_name`, `category_name`, `order_id`, `quantity`) VALUES
(8, 'Windows Pro Version 10 (Activated)', 'Windows 10', 12, 100),
(9, 'Monitor', 'Computer', 12, 2),
(10, 'Keyboard', 'Computer', 12, 3),
(11, 'Wifi Router', 'Computer', 12, 1),
(12, 'Monitor', 'Computer', 13, 9),
(13, 'Keyboard', 'Computer', 13, 20),
(14, 'RFL chair (plastic)', 'Chair', 14, 5),
(15, 'RFL chair (plastic)', 'Chair', 15, 5),
(16, 'Monitor', 'Computer', 16, 4),
(17, 'Mouse', 'Computer', 16, 5),
(18, 'Keyboard', 'Computer', 16, 30),
(19, 'Wifi Router', 'Computer', 16, 10),
(20, 'RFL chair (plastic)', 'Chair', 16, 4),
(21, 'Windows Pro Version 10 (Activated)', 'Windows 10', 16, 10),
(22, 'Mouse', 'Computer', 17, 9),
(23, 'Windows Pro Version 10 (Activated)', 'Windows 10', 17, 10);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `created_at`) VALUES
(1, 'Mohammadpur Preparatory School', '2021-07-17 09:14:43'),
(2, 'BAF Shaheen College', '2021-07-17 09:14:43'),
(3, 'Milstone', '2021-07-18 15:37:58'),
(4, 'Kakoli School', '2021-07-18 15:39:17'),
(5, 'VNC', '2021-07-18 15:39:19'),
(6, 'DRMC', '2021-07-18 15:41:46'),
(7, 'Preparatory', '2021-07-18 15:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `school_division` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `official_id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_id` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `contact`, `password`, `user_type`, `school_division`, `status`, `official_id`, `designation`, `created_id`) VALUES
(1, 'Helly', 'hlas@gmail.com', '01768002727', '123', 'TEACHER', '1', 1, 111745, 'Professor', '2021-07-17 09:39:41'),
(2, 'Rabbi', 'rabbi@gmail.com', '01768002727', '123', 'OFFICIAL', '1', 1, 1425, 'Manager XX', '2021-07-17 09:40:13'),
(3, 'Yousuf', 'yousuf@gmail.com', '0154624814', '123', 'OFFICIAL', '1', 1, 12356478, 'CEO', '2021-07-18 07:38:41'),
(4, 'Bejji', 'bejji@gmail.com', '123', '123', 'OFFICIAL', '4', 1, 11171248, 'Web Developer', '2021-07-21 20:10:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_order_list`
--
ALTER TABLE `requisition_order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_order_product_list`
--
ALTER TABLE `requisition_order_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requisition_order_list`
--
ALTER TABLE `requisition_order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requisition_order_product_list`
--
ALTER TABLE `requisition_order_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
