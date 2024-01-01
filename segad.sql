-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 02:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `segad`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`) VALUES
(28, 'بودي', 1026362111);

-- --------------------------------------------------------

--
-- Table structure for table `client_statement`
--

CREATE TABLE `client_statement` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `client_total` int(11) NOT NULL,
  `client_pieces` int(11) NOT NULL,
  `client_paid` int(11) NOT NULL,
  `client_residual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_statement`
--

INSERT INTO `client_statement` (`id`, `name`, `client_total`, `client_pieces`, `client_paid`, `client_residual`) VALUES
(32, 'بودي', 2490, 130, 2490, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `clause_name` varchar(255) NOT NULL,
  `color` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `clause_name`, `color`, `quantity`, `date`) VALUES
(32, '21', '#ff0000', 0, '2023-10-18'),
(33, '22', '#000000', 30, '2023-11-08'),
(34, '23', '#000000', 80, '2023-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `product` text NOT NULL,
  `price` int(11) NOT NULL,
  `pieces` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `residual` varchar(255) NOT NULL,
  `debt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `client_name`, `date`, `product`, `price`, `pieces`, `total`, `cost`, `paid`, `residual`, `debt`) VALUES
(110, 'بودي', '2023-10-17', '21, 22', 20, 20, '190', 10, 190, '0', '-'),
(111, 'بودي', '2023-10-04', '21, 22, 23', 120, 30, '1000', 200, 1000, '0', '-'),
(112, 'بودي', '2023-10-11', '21, 22', 20, 30, '200', 100, 200, '0', '-'),
(114, 'بودي', '2023-10-24', '21', 12, 20, '200', 40, 200, '0', '-'),
(115, 'بودي', '2023-10-17', '22', 30, 30, '900', 0, 900, '0', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `id` int(11) NOT NULL,
  `pay_value` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `client_statid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`id`, `pay_value`, `pay_date`, `client_statid`) VALUES
(27, 100, '2023-10-24', 114),
(28, 700, '2023-10-23', 115),
(29, 100, '2023-10-17', 115);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `name`) VALUES
(1, 'Owner'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `trader`
--

CREATE TABLE `trader` (
  `id` int(11) NOT NULL,
  `trader_name` varchar(255) NOT NULL,
  `trader_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trader`
--

INSERT INTO `trader` (`id`, `trader_name`, `trader_phone`) VALUES
(7, 'ahmed', 1026362111),
(8, 'الصعيدي', 10234567);

-- --------------------------------------------------------

--
-- Table structure for table `trader_invoice`
--

CREATE TABLE `trader_invoice` (
  `id` int(11) NOT NULL,
  `trader_name` varchar(255) NOT NULL,
  `total_trade` int(11) NOT NULL,
  `paid_trade` int(11) NOT NULL,
  `residual_trade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trader_invoice`
--

INSERT INTO `trader_invoice` (`id`, `trader_name`, `total_trade`, `paid_trade`, `residual_trade`) VALUES
(72, 'ahmed', 1000, 1000, 0),
(73, 'ahmed', 1000, 1000, 0),
(74, 'الصعيدي', 1000, 1000, 0),
(75, 'الصعيدي', 1000, 1000, 0),
(76, 'ahmed', 90, 90, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trader_total_bills`
--

CREATE TABLE `trader_total_bills` (
  `id` int(11) NOT NULL,
  `trader_name` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `residual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trader_total_bills`
--

INSERT INTO `trader_total_bills` (`id`, `trader_name`, `total`, `paid`, `residual`) VALUES
(23, 'ahmed', 2090, 2080, 10),
(24, 'الصعيدي', 2000, 1100, 900);

-- --------------------------------------------------------

--
-- Table structure for table `trader_total_pay`
--

CREATE TABLE `trader_total_pay` (
  `id` int(11) NOT NULL,
  `pay_value` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `trader_bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trader_total_pay`
--

INSERT INTO `trader_total_pay` (`id`, `pay_value`, `pay_date`, `trader_bill_id`) VALUES
(46, 500, '2023-10-16', 72),
(47, 500, '2023-10-16', 72),
(48, 250, '2023-10-03', 73),
(49, 250, '2023-10-20', 73),
(50, 900, '0000-00-00', 75),
(51, 100, '0000-00-00', 76);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `priv` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `priv`) VALUES
(1, 'khaled', 'khaled@gmail.com ', '123', 1),
(3, 'belal', 'belal@gmail.com', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_statement`
--
ALTER TABLE `client_statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trader`
--
ALTER TABLE `trader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trader_invoice`
--
ALTER TABLE `trader_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trader_total_bills`
--
ALTER TABLE `trader_total_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trader_total_pay`
--
ALTER TABLE `trader_total_pay`
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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `client_statement`
--
ALTER TABLE `client_statement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trader`
--
ALTER TABLE `trader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trader_invoice`
--
ALTER TABLE `trader_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `trader_total_bills`
--
ALTER TABLE `trader_total_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `trader_total_pay`
--
ALTER TABLE `trader_total_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
