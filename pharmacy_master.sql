-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 08:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `City` varchar(60) NOT NULL,
  `Zip` int(5) NOT NULL,
  `NameOnCard` varchar(60) NOT NULL,
  `CreditCardNumber` int(20) NOT NULL,
  `ExpMonth` varchar(15) NOT NULL,
  `ExpYear` int(4) NOT NULL,
  `CVV` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `user_id`, `Address`, `City`, `Zip`, `NameOnCard`, `CreditCardNumber`, `ExpMonth`, `ExpYear`, `CVV`) VALUES
(2, 7, '', '', 0, '', 0, '', 0, 0),
(3, 7, '', '', 0, '', 0, '', 0, 0),
(4, 7, '', '', 0, '', 0, '', 0, 0),
(5, 7, '', '', 0, '', 0, '', 0, 0),
(6, 7, '', '', 0, '', 0, '', 0, 0),
(7, 7, '', '', 0, '', 0, '', 0, 0),
(8, 7, '', '', 0, '', 0, '', 0, 0),
(9, 7, '', '', 0, '', 0, '', 0, 0),
(10, 7, '', '', 0, '', 0, '', 0, 0),
(11, 7, '', '', 0, '', 0, '', 0, 0),
(12, 7, '', '', 0, '', 0, '', 0, 0),
(13, 7, '', '', 0, '', 0, '', 0, 0),
(14, 7, '', '', 0, '', 0, '', 0, 0),
(15, 7, '', '', 0, '', 0, '', 0, 0),
(16, 7, '', '', 0, '', 0, '', 0, 0),
(17, 7, '', '', 0, '', 0, '', 0, 0),
(18, 7, '', '', 0, '', 0, '', 0, 0),
(19, 7, '', '', 0, '', 0, '', 0, 0),
(20, 7, '', '', 0, '', 0, '', 0, 0),
(21, 7, '', '', 0, '', 0, '', 0, 0),
(22, 7, '', '', 0, '', 0, '', 0, 0),
(23, 7, '', '', 0, '', 0, '', 0, 0),
(24, 7, '', '', 0, '', 0, '', 0, 0),
(25, 7, '', '', 0, '', 0, '', 0, 0),
(26, 7, '', '', 0, '', 0, '', 0, 0),
(27, 7, '', '', 0, '', 0, '', 0, 0),
(28, 7, '', '', 0, '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `image`) VALUES
(1, 'Tablets', 'public\\images\\tablets.png'),
(2, 'Capsules', 'public\\images\\Capsules.jpg'),
(3, 'Liquids', 'public\\images\\Liquids.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `product_price` int(11) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `product_id`, `user_id`, `status_id`, `billing_id`, `quantity`, `product_price`, `created-at`, `updated_at`) VALUES
(1, 1, 7, 2, 28, 1, 20, '2019-01-13 19:53:04', '2019-01-13 19:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `role_id`, `permission`) VALUES
(1, 1, 'mmkn_yfsha5_el_website');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `Product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `product_name`, `product_image`, `quantity`, `price`, `Product_description`) VALUES
(1, 1, 'Panadol', 'public\\images\\panadol.jpg', 100, 20, 'Soda3'),
(2, 1, 'augmentin', 'public\\images\\augmentin.jpg', 100, 20, 'Emask');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `displayName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `displayName`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'moderator', 'Pharmacist'),
(3, 'Normal User', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusId` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusId`, `code`, `status_name`) VALUES
(1, 1, 'Completed'),
(2, 2, 'Pending'),
(3, 3, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `avatar` varchar(64) NOT NULL DEFAULT 'public\\images\\default.png',
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `code`, `name`, `email`, `password`, `gender_id`, `avatar`, `role_id`, `created_at`) VALUES
(1, 1, 'mohamed', 'zahaby@gmail.com', '$2y$10$33Qp5c5nVtguSqrMaU9LKei.JaZcZdbZAoRwOyL8spJcjClTcZB5K', 1, 'public\\images\\default.png', 3, '2019-01-13 15:44:19'),
(2, 0, 'wessam', 'wessam@gmail.com', '$2y$10$IxevR5p9jlBRoKsdlVo4melY5kLLTW/riLydWu1.RDR0u1V4ahQOK', 1, 'public\\images\\default.png', 3, '2019-01-07 00:15:38'),
(6, 0, 'ahmed', 'aaaaaaaa@kk.com', '$2y$10$KLOdB7eXcoFt6T82o3ger.epQrG9xgsOGJDesjoYePkCI7.GKNnJm', 1, 'public\\images\\default.png', 3, '2019-01-07 17:42:47'),
(7, 0, 'farida', 'farida@gmail.com', '$2y$10$33Qp5c5nVtguSqrMaU9LKei.JaZcZdbZAoRwOyL8spJcjClTcZB5K', 2, 'public\\images\\default.png', 3, '2019-01-13 14:38:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`product_id`),
  ADD KEY `userId` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `billing_id` (`billing_id`) USING BTREE;

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleId` (`role_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissionId` (`permission_id`),
  ADD KEY `roleID` (`role_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `productId` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`statusId`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`),
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
