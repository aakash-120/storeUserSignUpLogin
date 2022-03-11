-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Mar 10, 2022 at 02:03 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Store`
--

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `product_id` int NOT NULL,
  `product_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_quantity` int NOT NULL,
  `product_category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_discount` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_tags` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_image`, `product_discount`, `product_tags`, `product_description`) VALUES
(18, 'alexa', 5000, 30, 'electronic', 'alexa.jpg', '5', 'speaker , assistant', 'great tool'),
(19, 'ac', 40000, 50, 'appliances', 'ac.jpg', '5', 'summer fan', 'ac'),
(20, 'earphone', 500, 70, 'electronics', 'earphone.jpeg', '1', 'sound, speaker', 'it is used for listen music'),
(21, 'iphone', 100000, 500, 'rtb', 'iphone13.jpg', '10', 'twb', 'tbrwf'),
(22, 'laptop', 800005, 150, 'electronics', 'laptop.jpg', '5', 'tv,cpu,', 'used in organisation'),
(23, 'keyboard', 3000, 1000, 'keyboarad', 'keyboard.jpeg', '100', 'vkhbre', 'jdfdv'),
(24, 'television', 60000, 500, 'fve', 'television.jpg', '20', 'bfg', 'fbd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `userName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `approved` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `password`, `type`, `approved`) VALUES
(5, 'aastha', 'aastha@gmail.com', '123', 'customer', '1'),
(6, 'shubham', 'shubham@gmail.com', '123', 'customer', '0'),
(10, 'ishika mittal', 'ishika@gmail.com', '123', 'customer', '1'),
(14, 'admin', 'admin@gmail.com', 'admin', 'admin', '1'),
(15, 'aditi', 'aditi@gmail.com', '123', 'customer', '0'),
(16, 'nishant', 'nishant@gmail.com', '123', 'customer', '0'),
(18, 'nishtha', 'nishtha@gmail.com', '123', 'customer', '1'),
(19, 'aman', 'aman@gmail.com', '213', 'customer', '0'),
(20, 'qqqq', 'qqqq@qq.com', 'qqq', 'customer', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
