-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Mar 22, 2022 at 10:29 AM
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
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int NOT NULL,
  `billing_country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_address_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_address_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_state` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_postcode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `account_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ship_to_different_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_state` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_postcode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_comments` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_method` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `uid_session` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `billing_country`, `billing_first_name`, `billing_last_name`, `billing_company`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_state`, `billing_postcode`, `billing_email`, `billing_phone`, `account_password`, `ship_to_different_address`, `shipping_country`, `shipping_first_name`, `shipping_last_name`, `shipping_company`, `shipping_address_1`, `shipping_address_2`, `shipping_city`, `shipping_state`, `shipping_postcode`, `order_comments`, `shipping_method`, `payment_method`, `uid_session`) VALUES
(1, 'GB', 'DCS', 'FDASW', 'FEAW', 'FEW', 'WE', 'EWqare', 'few', 'ewqt', 'ewry', 'yrEW', 'greeeedg', '1', 'GB', 'FDSWE', 'FWES', 'FEWAS', 'FEW', 'FEWRhrae', 'FEWrgr', 'WERF', 'tfr', 'TEWTg', 'free_shipping', 'cheque', '0'),
(2, 'GB', 'DCS', 'FDASW', 'FEAW', 'FEW', 'WE', 'EWqare', 'few', 'ewqt', 'ewry', 'yrEW', 'greeeedg', '1', 'GB', 'FDSWE', 'FWES', 'FEWAS', 'FEW', 'FEWRhrae', 'FEWrgr', 'WERF', 'tfr', 'TEWTg', 'free_shipping', 'cheque', '0'),
(3, 'GB', 'bgf', '', '', '', '', '', '', '', '', '', '', '1', 'GB', '', '', '', '', '', '', '', '', '', 'free_shipping', 'bacs', '5'),
(4, 'GB', 'asdfghjkl', '', '', '', '', '', '', '', '', '', '', '1', 'GB', '', '', '', '', '', '', '', '', '', 'free_shipping', 'cheque', '5'),
(6, 'GB', 'aakash', 'vishu', 'cedcoss', 'lko', 'lko2', 'lko3', 'india', '201013', 'aakahs@hmial.com', '111', '123', '1', 'GB', '', '', '', '', '', '', '', '', '', 'free_shipping', 'cheque', '5'),
(7, 'GB', '11111', '', '', '', '', '', '', '', '', '', '', '1', 'GB', '', '', '', '', '', '', '', '', '', 'free_shipping', 'bacs', '5'),
(8, 'GB', '22222', '', '', '', '', '', '', '', '', '', '', '', 'GB', '22222', '', '', '', '', '', '', '', '', 'free_shipping', 'bacs', '5'),
(9, 'GB', 'aakash', 'asdfgh', 'asdfgh', 'asdfgh', 'asdf', 'sdf', 'dfg', 'htr', 'yb5t', 'bbb5r', 'drhtrrt', '', 'GB', 'aakash', 'asdfgh', 'asdfgh', 'asdfgh', 'asdf', 'sdf', 'dfg', 'htr', '', 'free_shipping', 'paypal', '5'),
(10, 'GB', 'bbb', 'bvbb', 'bb', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '0', 'GB', 'bbb', 'bvbb', 'bb', 'b', 'b', 'b', 'b', 'b', 'b', 'free_shipping', 'bacs', '5'),
(11, 'GB', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', 'a', 'a', 'a', 'a', '0', 'GB', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', 'a', 'a', 'free_shipping', 'cheque', '5'),
(12, 'GB', 'drtgfht', '', '', '', '', '', '', '', '', '', '', '0', 'GB', 'drtgfht', '', '', '', '', '', '', '', '', 'free_shipping', 'cheque', '10'),
(13, 'GB', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', '0', 'GB', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'ravinder', 'free_shipping', 'paypal', '5');

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
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

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
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
