-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 07:26 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `net_worth_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assets`
--

CREATE TABLE `tbl_assets` (
  `assets_id` int(11) NOT NULL,
  `assets_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assets`
--

INSERT INTO `tbl_assets` (`assets_id`, `assets_name`) VALUES
(1, 'Cash'),
(2, 'Real Estate(market value)'),
(3, 'Automobile(present value)'),
(4, 'Treasury Bills'),
(5, 'Jewelry'),
(6, 'Retirement Accounts'),
(7, 'Social Security'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_liability`
--

CREATE TABLE `tbl_liability` (
  `liability_id` int(11) NOT NULL,
  `liability_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_liability`
--

INSERT INTO `tbl_liability` (`liability_id`, `liability_name`) VALUES
(1, 'Account Payable'),
(2, 'Auto Loan'),
(3, 'Credit Card Debt'),
(4, 'Consumer Loan'),
(5, 'Real Estate Mortgages'),
(6, 'Student Loan'),
(7, 'Unpaid Taxes'),
(8, 'Money Owned Other'),
(9, 'Other Liabilities');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_networth_items`
--

CREATE TABLE `tbl_networth_items` (
  `networth_id` int(11) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `networth_result` int(11) NOT NULL,
  `calt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_networth_items`
--

INSERT INTO `tbl_networth_items` (`networth_id`, `user_id`, `networth_result`, `calt_date`) VALUES
(1, '5d8a3d27d70f8', 0, '2019-09-24'),
(2, '5d8a3da8d167d', 0, '2019-09-24'),
(3, '5d8a3f723c5cf', 0, '2019-09-24'),
(4, '5d8a401a9972b', 0, '2019-09-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_networth_items`
--
ALTER TABLE `tbl_networth_items`
  ADD PRIMARY KEY (`networth_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_networth_items`
--
ALTER TABLE `tbl_networth_items`
  MODIFY `networth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
