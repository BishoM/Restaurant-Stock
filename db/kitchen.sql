-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 12:59 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `email`, `password`) VALUES
(1, 'Bisho Moise', 'shobi', 'bisho@gmail.com', '$2y$10$Kt1lcWbNgq4AOqadNxRXmOotg3xu58Sg4oR/Qo.99L/LP5QtGROiW'),
(2, 'UMURERWA Viviane', 'vixy', 'viviane@gmail.com', '$2y$10$cEmqdTfT9Y6WHO5CFdcPsOxpTI4XF/mJOoeym498vy1sY2gPAQZ7K'),
(3, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$dlTy.x8Tuwjfy5UJPrR0duHkqEH1.Px7r1dvXHEdtbR0FjuncvTlK');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(30) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_price` int(11) DEFAULT NULL,
  `pro_used` int(11) DEFAULT NULL,
  `pro_remain` int(11) NOT NULL,
  `req_quantity` int(11) DEFAULT NULL,
  `req_price` int(11) DEFAULT NULL,
  `req_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_quantity`, `pro_price`, `pro_used`, `pro_remain`, `req_quantity`, `req_price`, `req_status`) VALUES
(18, 'UMUCERI', 25, 21000, 0, 25, 15, NULL, 2),
(19, 'amateke', 65, 13000, 35, 30, 13, NULL, 2),
(20, 'ubunyobwa', 88, 78000, 32, 56, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `sto_id` int(11) NOT NULL,
  `sto_quantity` int(11) NOT NULL,
  `sto_price` int(11) DEFAULT NULL,
  `sto_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`sto_id`, `sto_quantity`, `sto_price`, `sto_date`, `pro_id`) VALUES
(1, 13, NULL, '2021-05-28 22:54:18', 19);

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `sto_id` int(11) NOT NULL,
  `used_product` int(11) NOT NULL,
  `remain_product` int(11) NOT NULL,
  `sto_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockout`
--

INSERT INTO `stockout` (`sto_id`, `used_product`, `remain_product`, `sto_date`, `pro_id`) VALUES
(1, 35, 30, '2021-05-28 22:37:56', 19),
(2, 32, 56, '2021-05-28 22:45:00', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`sto_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`sto_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `sto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `sto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stockin`
--
ALTER TABLE `stockin`
  ADD CONSTRAINT `stockin_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

--
-- Constraints for table `stockout`
--
ALTER TABLE `stockout`
  ADD CONSTRAINT `stockout_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
