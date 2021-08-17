-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 10:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `current_balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `current_balance`) VALUES
(1, 'Pratik', 'pratik@gmail.com', 2520),
(2, 'Juhi', 'juhi@gmail.com', 480),
(3, 'Ronak', 'ronak@gmail.com', 3000),
(4, 'Manas', 'manas@gmail.com', 4000),
(5, 'Ankita', 'ankita@gmail.com', 4000),
(6, 'Chetan', 'chetan@gmail.com', 2000),
(7, 'Ram', 'ram@gmail.com', 700)
(8, 'Dev', 'dev@gmail.com', 6000)
(9, 'Shiva', 'shiva@gmail.com', 7000)
(10, 'Pakhi', 'pakhi@gmail.com', 4000)

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `from_cust_id` int(11) NOT NULL,
  `to_cust_id` int(11) NOT NULL,
  `transfer_amt` float NOT NULL,
  `transfer_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `from_cust_id`, `to_cust_id`, `transfer_amt`, `transfer_date`) VALUES
(1, 2, 1, 200, '0000-00-00 00:00:00'),
(2, 2, 1, 200, '0000-00-00 00:00:00'),
(3, 3, 1, 200, '0000-00-00 00:00:00'),
(4, 2, 1, 500, '0000-00-00 00:00:00'),
(5, 2, 1, 500, '0000-00-00 00:00:00'),
(6, 4, 3, 500, '0000-00-00 00:00:00'),
(7, 2, 1, 500, '0000-00-00 00:00:00'),
(8, 1, 2, 500, '0000-00-00 00:00:00'),
(9, 2, 3, 20, '0000-00-00 00:00:00'),
(10, 4, 3, 500, '0000-00-00 00:00:00'),
(11, 4, 3, 500, '0000-00-00 00:00:00'),
(12, 2, 1, 20, '0000-00-00 00:00:00'),
(13, 2, 1, 500, '0000-00-00 00:00:00'),
(14, 1, 2, 50000, '0000-00-00 00:00:00'),
(15, 1, 3, 500000, '0000-00-00 00:00:00'),
(16, 1, 4, 500000, '0000-00-00 00:00:00'),
(17, 2, 1, 500000, '0000-00-00 00:00:00'),
(18, 2, 1, 1000, '0000-00-00 00:00:00'),
(19, 2, 1, 500, '0000-00-00 00:00:00'),
(20, 2, 1, 20, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
