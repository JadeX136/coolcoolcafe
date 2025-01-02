-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2024 at 09:34 PM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coolcool_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `coolcool_admin`
--

CREATE TABLE `coolcool_admin` (
  `admin_id` int(2) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `posted` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coolcool_admin`
--

INSERT INTO `coolcool_admin` (`admin_id`, `username`, `password`, `name`, `posted`, `post_date`) VALUES
(1, 'root', 'd94230acf65ba1f6913fb56a06002674', 'Pichit Naksanit', 'root', '');

-- --------------------------------------------------------

--
-- Table structure for table `coolcool_customer`
--

CREATE TABLE `coolcool_customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `posted` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coolcool_customer`
--

INSERT INTO `coolcool_customer` (`customer_id`, `username`, `password`, `name`, `email`, `phonenumber`, `posted`, `post_date`, `level`) VALUES
(1, 'root', 'd94230acf65ba1f6913fb56a06002674', 'Pichit Naksanit', 'p_22108@outlook.com', '0969359224', 'root', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coolcool_menu`
--

CREATE TABLE `coolcool_menu` (
  `product_id` int(2) NOT NULL,
  `nameTH` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `posted` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `update_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `formtype` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coolcool_menu`
--

INSERT INTO `coolcool_menu` (`product_id`, `nameTH`, `nameEN`, `type`, `price`, `posted`, `post_date`, `update_date`, `formtype`, `status`) VALUES
(1, 'ชาไทย', 'Thai Tea', 'Tea', '45', 'root', '1715405272', '1715405272', 'tea_v', ''),
(2, 'ชาเขียว', 'Green Tea', 'Tea', '45', 'root', '1715407853', '1715407853', 'tea_v', ''),
(3, 'เอสเปรสโซ', 'Espresso', 'Coffee', '70', 'root', '1725676339', '1725676339', 'coffee_milk_v', ''),
(4, 'อเมริกาโน่', 'Americano', 'Coffee', '65', 'root', '1727485628 ', '1727485628 ', 'black_coffee_v', ''),
(5, 'ลาเต้', 'Late', 'Coffee', '70', 'root', '1727486199', '1727486199', 'coffee_milk_v', ''),
(6, 'อเมริกาโน่ยูซุ', 'Americano Yuzu', 'Coffee', '75', 'root', '1727486199', '1727486199', 'black_coffee_v', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coolcool_admin`
--
ALTER TABLE `coolcool_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `coolcool_customer`
--
ALTER TABLE `coolcool_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `coolcool_menu`
--
ALTER TABLE `coolcool_menu`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coolcool_admin`
--
ALTER TABLE `coolcool_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coolcool_customer`
--
ALTER TABLE `coolcool_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coolcool_menu`
--
ALTER TABLE `coolcool_menu`
  MODIFY `product_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
