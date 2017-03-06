-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 05:37 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_tmss`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `F_name` varchar(200) NOT NULL,
  `M_name` varchar(200) NOT NULL,
  `L_name` varchar(200) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `DOB` date NOT NULL,
  `MS` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Contacts` varchar(20) NOT NULL,
  `bank_ac` int(30) NOT NULL,
  `date_applied` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `position_id` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `F_name`, `M_name`, `L_name`, `gender`, `DOB`, `MS`, `email`, `password`, `Contacts`, `bank_ac`, `date_applied`, `status`, `position_id`, `grade`) VALUES
(1, 'sujan', '', 'Ahmed', 'male', '1994-01-05', 'married', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1234567890', 0, '2015-04-13', 'Active', 1, '7'),
(2, 'Noor', 'Alam', 'Khan', 'male', '1994-12-02', 'single', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '', 0, '2015-04-14', 'Active', 1, '7'),
(3, 'Riadul', '', 'Islam', 'female', '1973-02-24', 'married', 'emp', '21232f297a57a5a743894a0e4a801fc3', '1234567890', 0, '2015-04-14', 'Active', 3, '9'),
(4, 'Ziaur ', '', 'Rahman', 'male', '1998-06-10', 'divorced', 'James@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '1234567890', 0, '2015-04-14', 'Active', 3, '9'),
(5, 'Toloar ', 'Hossain', 'Koyedi', 'male', '1963-03-05', 'single', 'agdumbagdumghora', 'e5f0f20b92f7022779015774e90ce917', '1234567890', 0, '2015-04-15', 'Active', 4, '9'),
(6, 'Alu', 'Potol', 'Kabab', 'female', '1994-07-10', 'married', 'maria@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '1234567890', 0, '2015-04-15', 'Active', 3, '23'),
(7, 'Chicken', '', 'Biriyani', 'female', '1995-05-12', 'single', 'Naomi@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '12345678900', 0, '2015-04-15', 'Active', 2, '25'),
(8, 'Abdul', 'Kader', 'Khan', 'male', '1978-06-14', 'single', 'james@sampe.com', 'e5f0f20b92f7022779015774e90ce917', '123456789', 0, '2015-02-24', 'In-active', 4, '22'),
(9, 'first', 'mid', 'last', 'male', '1965-04-08', 'married', 'rd', 'e5f0f20b92f7022779015774e90ce917', '3', 0, '2014-04-24', 'Active', 3, '3'),
(10, 'sdf', 'sdf', 'sdf', 'male', '1981-11-18', 'divorced', 'sdf', 'e5f0f20b92f7022779015774e90ce917', '234', 0, '2014-07-29', 'Active', 3, '5'),
(11, 'aaaa', 'aaaaaa', 'aaaa', 'male', '0000-00-00', 'married', 'aaaaa', 'e5f0f20b92f7022779015774e90ce917', '23', 0, '2014-07-29', 'Active', 3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `status`) VALUES
(1, 'GAPS', 'Active'),
(2, 'Tribal', 'In-active'),
(3, 'GODZ', 'Active'),
(4, 'Grimmiore', 'Active'),
(5, 'Tower Inn', 'Active'),
(6, 'Nike', 'Active'),
(7, 'Taylor', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`) VALUES
(1, 'Mens Clothing', 'Active'),
(2, 'Womens Clothing', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_address`, `customer_contact`) VALUES
(1, 'kane ', 'davao', 'sample@sample.com'),
(4, 'Mary ann Curtis', 'Makati', 'sample123@sample.com'),
(5, 'Gett', 'tagum', 'sample1234@sample.com'),
(6, 'Ezio', 'Italy', 'sample12@sample.com'),
(7, 'jerry', 'davao', '092123123'),
(8, 'Mario Auditore', 'Venince', '1234567889'),
(9, 'emilie rose', 'texas', '1234567889'),
(10, 'Miguel Gomez', 'Mexico', '123123123'),
(11, 'Lara Croft', 'USA', '2123123123'),
(12, 'sorayamato', 'japan', '123123123'),
(13, 'Froilan Villaester', 'Mintal, Davao City', '1234567890'),
(14, '', '', ''),
(15, 'demo', 'hgjhgjhgjhg', '');

-- --------------------------------------------------------

--
-- Table structure for table `ded_day`
--

CREATE TABLE `ded_day` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `ded_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ded_day`
--

INSERT INTO `ded_day` (`id`, `account_id`, `day`, `month`, `year`, `ded_amount`) VALUES
(294, 1, 1, 1, 2016, 1182),
(295, 2, 2, 1, 2016, 2363),
(296, 3, 3, 1, 2016, 1951),
(297, 4, 4, 1, 2016, 2601),
(298, 5, 5, 1, 2016, 3252),
(299, 8, 0, 1, 2016, 0),
(300, 9, 0, 1, 2016, 0),
(301, 10, 0, 1, 2016, 0),
(302, 11, 0, 1, 2016, 0),
(303, 1, 10, 2, 2016, 12631),
(304, 2, 0, 2, 2016, 0),
(305, 3, 0, 2, 2016, 0),
(306, 4, 0, 2, 2016, 0),
(307, 5, 0, 2, 2016, 0),
(308, 8, 0, 2, 2016, 0),
(309, 9, 0, 2, 2016, 0),
(310, 10, 0, 2, 2016, 0),
(311, 11, 0, 2, 2016, 0),
(312, 1, 1, 1, 2017, 1182),
(313, 2, 2, 1, 2017, 2363),
(314, 3, 3, 1, 2017, 1951),
(315, 4, 0, 1, 2017, 0),
(316, 5, 0, 1, 2017, 0),
(317, 8, 0, 1, 2017, 0),
(318, 9, 0, 1, 2017, 0),
(319, 10, 0, 1, 2017, 0),
(320, 11, 0, 1, 2017, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `payment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `date`, `customer_id`, `account_id`, `payment`) VALUES
(2, '2015-04-18', 1, 1, 'cash'),
(3, '2015-04-18', 4, 1, 'cash'),
(4, '2015-04-18', 5, 1, 'cash'),
(5, '2015-04-18', 6, 1, 'credit'),
(6, '2015-04-20', 7, 1, 'cash'),
(7, '2015-04-21', 8, 1, 'credit'),
(8, '2015-04-22', 9, 1, 'credit'),
(9, '2015-04-22', 10, 1, 'cash'),
(10, '2015-04-23', 11, 1, 'cash'),
(11, '2015-04-25', 12, 1, 'credit'),
(12, '2015-07-24', 13, 2, 'credit'),
(13, '2016-07-12', 14, 1, 'cash'),
(14, '2016-07-14', 15, 1, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 2, 3, 2, '120.00'),
(2, 2, 1, 1, '150.00'),
(3, 3, 3, 20, '120.00'),
(4, 4, 5, 1, '50.00'),
(5, 5, 3, 1, '120.00'),
(6, 6, 6, 1, '200.00'),
(7, 7, 2, 21, '120.00'),
(8, 7, 6, 13, '200.00'),
(9, 8, 2, 4, '120.00'),
(10, 9, 4, 3, '410.00'),
(11, 9, 3, 3, '120.00'),
(12, 10, 1, 1, '150.00'),
(13, 11, 3, 2, '120.00'),
(14, 11, 1, 3, '150.00'),
(15, 12, 1, 5, '150.00'),
(16, 12, 2, 6, '120.00'),
(17, 13, 1, 1, '150.00'),
(18, 13, 4, 1, '410.00'),
(19, 14, 3, 1, '120.00'),
(20, 14, 8, 2, '21.32');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `Pay` int(11) NOT NULL,
  `ded_days` int(11) NOT NULL,
  `otrate` int(11) NOT NULL,
  `othrs` int(11) NOT NULL,
  `allow` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `insurance` int(11) NOT NULL,
  `net_pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `account_id`, `date`, `Pay`, `ded_days`, `otrate`, `othrs`, `allow`, `advance`, `insurance`, `net_pay`) VALUES
(143, 1, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(144, 2, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(145, 3, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(146, 4, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(147, 5, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(148, 8, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(149, 9, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(150, 10, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(151, 11, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(152, 1, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(153, 2, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(154, 3, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(155, 4, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(156, 5, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(157, 8, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(158, 9, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(159, 10, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(160, 11, '2016-12-15', 0, 0, 0, 0, 0, 0, 0, 0),
(161, 1, '2016-12-17', 0, 0, 0, 0, 0, 0, 0, 0),
(162, 2, '2016-12-17', 0, 0, 0, 0, 0, 0, 0, 0),
(163, 3, '2016-12-17', 0, 0, 0, 0, 0, 0, 0, 0),
(164, 4, '2016-12-17', 0, 0, 0, 0, 0, 0, 0, 0),
(165, 8, '2016-12-17', 0, 0, 0, 0, 0, 0, 0, 0),
(166, 9, '2016-12-17', 0, 0, 0, 0, 0, 0, 0, 0),
(167, 10, '2016-12-17', 0, 0, 0, 0, 0, 0, 0, 0),
(168, 11, '2016-12-17', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pay_scale_14`
--

CREATE TABLE `pay_scale_14` (
  `grade` int(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `pay_scale` int(20) NOT NULL,
  `basic` int(20) NOT NULL,
  `hr` int(20) NOT NULL,
  `medical` int(20) NOT NULL,
  `conveyance` int(20) NOT NULL,
  `cpf` int(20) NOT NULL,
  `gia` int(20) NOT NULL,
  `bf` int(20) NOT NULL,
  `gross_total` int(20) NOT NULL,
  `ded_cpf_tmss` int(20) NOT NULL,
  `ded_cpf_self` int(20) NOT NULL,
  `ded_cpf_total` int(20) NOT NULL,
  `ded_gia_tmss` int(20) NOT NULL,
  `ded_gia_self` int(20) NOT NULL,
  `ded_gia_total` int(20) NOT NULL,
  `ded_bf_tmss` int(20) NOT NULL,
  `ded_bf_self` int(20) NOT NULL,
  `ded_bf_total` int(20) NOT NULL,
  `ded_total` int(20) NOT NULL,
  `net_pay` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_scale_14`
--

INSERT INTO `pay_scale_14` (`grade`, `designation`, `pay_scale`, `basic`, `hr`, `medical`, `conveyance`, `cpf`, `gia`, `bf`, `gross_total`, `ded_cpf_tmss`, `ded_cpf_self`, `ded_cpf_total`, `ded_gia_tmss`, `ded_gia_self`, `ded_gia_total`, `ded_bf_tmss`, `ded_bf_self`, `ded_bf_total`, `ded_total`, `net_pay`) VALUES
(1, 'ED', 121211, 74000, 70300, 22200, 7400, 7400, 740, 740, 175380, 7400, 3700, 11100, 740, 370, 1110, 740, 370, 1110, 13320, 169460),
(2, 'DED', 200000, 50000, 45000, 15000, 5000, 5000, 500, 500, 116000, 5000, 2500, 7500, 500, 250, 750, 500, 250, 750, 9000, 112000),
(3, 'D', 66500, 38000, 32300, 11400, 3800, 3800, 380, 380, 86260, 3800, 1900, 5700, 380, 190, 570, 380, 190, 570, 6840, 83220),
(4, 'JD', 48125, 27500, 22000, 8250, 2750, 2750, 275, 275, 61050, 2750, 1375, 4125, 275, 138, 413, 275, 138, 413, 4950, 58850),
(5, 'DD', 40250, 23000, 18400, 6900, 2300, 2300, 230, 230, 51060, 2300, 1150, 3450, 230, 115, 345, 230, 115, 345, 4140, 49220),
(6, 'SAD', 32375, 18500, 14800, 5550, 1850, 1850, 185, 185, 41070, 1850, 925, 2775, 185, 93, 278, 185, 93, 278, 3330, 39590),
(7, 'AD', 28875, 16500, 13200, 4950, 1650, 1650, 165, 165, 36630, 1650, 825, 2475, 165, 83, 248, 165, 83, 248, 2970, 35310),
(8, 'SZM', 20125, 11500, 5750, 3450, 1150, 1150, 115, 115, 22080, 1150, 575, 1725, 115, 58, 173, 115, 58, 173, 2070, 21160),
(9, 'ZM', 18375, 10500, 5250, 3150, 1050, 1050, 105, 105, 20160, 1050, 525, 1575, 105, 53, 158, 105, 53, 158, 1890, 19320),
(10, 'AZM', 16625, 9500, 4750, 2850, 950, 950, 95, 95, 18240, 950, 475, 1425, 95, 48, 143, 95, 48, 143, 1710, 17480),
(11, 'AM', 15400, 8800, 4400, 2640, 880, 880, 88, 88, 16896, 880, 440, 1320, 88, 44, 132, 88, 44, 132, 1584, 16192),
(12, 'AAM', 14700, 8400, 4200, 2520, 840, 840, 84, 84, 16128, 840, 420, 1260, 84, 42, 126, 84, 42, 126, 1512, 15456),
(13, 'DAM', 13825, 7900, 3950, 2370, 2370, 1580, 79, 79, 15168, 790, 395, 1185, 79, 40, 119, 79, 40, 119, 1422, -790),
(14, 'JAM', 13125, 7500, 3750, 2250, 2250, 1500, 75, 75, 14400, 750, 375, 1125, 75, 38, 113, 75, 38, 113, 1350, -750),
(15, 'SBM', 11900, 6800, 3400, 2040, 2040, 1360, 68, 68, 13056, 680, 340, 1020, 68, 34, 102, 68, 34, 102, 1224, -680),
(16, 'DSBM', 11200, 6400, 3200, 1920, 640, 640, 64, 64, 12288, 640, 320, 960, 64, 32, 96, 64, 32, 96, 1152, 11776),
(17, 'BM', 10500, 6000, 3000, 1800, 1800, 1200, 60, 60, 11520, 600, 300, 900, 60, 30, 90, 60, 30, 90, 1080, -600),
(18, 'ABM', 9800, 5600, 2800, 1680, 1680, 1120, 56, 56, 10752, 560, 280, 840, 56, 28, 84, 56, 28, 84, 1008, -560),
(19, 'SS', 8575, 4900, 2450, 1470, 1470, 980, 49, 49, 9408, 490, 245, 735, 49, 25, 74, 49, 25, 74, 882, -490),
(20, 'DSS', 8050, 4600, 2300, 1380, 1380, 920, 46, 46, 8832, 460, 230, 690, 46, 23, 69, 46, 23, 69, 828, -460),
(21, 'FS', 7700, 4400, 2200, 1320, 1320, 880, 44, 44, 8448, 440, 220, 660, 44, 22, 66, 44, 22, 66, 792, -440),
(22, 'AFS', 7000, 4000, 2000, 1200, 400, 400, 40, 40, 7680, 400, 200, 600, 40, 20, 60, 40, 20, 60, 720, 7360);

-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE `percentage` (
  `id` int(11) NOT NULL,
  `item` varchar(11) NOT NULL,
  `percent` double(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `percentage`
--

INSERT INTO `percentage` (`id`, `item`, `percent`) VALUES
(1, 'medical', 30),
(2, 'conveyance', 10),
(3, 'cpf', 10),
(4, 'gia', 1),
(5, 'bf', 1),
(6, 'ded_cpf_tms', 10),
(7, 'ded_cpf_sel', 5),
(8, 'ded_gia_tms', 1),
(9, 'ded_gia_sel', 1),
(10, 'ded_bf_tmss', 1),
(11, 'ded_bf_self', 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position`) VALUES
(1, 'Administrator'),
(2, 'Accounting'),
(3, 'Employee'),
(4, 'dotdot\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category_id`, `brand_id`, `Quantity`, `price`, `status`) VALUES
(1, 'Hoodie', 1, 2, 22, '150.00', 'Active'),
(2, 'Cargo Shorts', 1, 1, 54, '120.00', 'Active'),
(3, 'Skinny Jeans', 1, 1, 24, '120.00', 'Active'),
(4, 'Heavy Green Rock', 1, 1, 22, '410.00', 'Active'),
(5, 'High Heels 4inches', 2, 4, 15, '50.00', 'Active'),
(6, 'Kobe 2014', 1, 6, 21, '200.00', 'Active'),
(7, 'AProgrammer', 2, 3, 21, '21.00', 'Active'),
(8, 'A programmer', 1, 5, -1, '21.32', 'Active'),
(9, 'test', 1, 1, 0, '345555.00', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ded_day`
--
ALTER TABLE `ded_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_scale_14`
--
ALTER TABLE `pay_scale_14`
  ADD PRIMARY KEY (`grade`);

--
-- Indexes for table `percentage`
--
ALTER TABLE `percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ded_day`
--
ALTER TABLE `ded_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `pay_scale_14`
--
ALTER TABLE `pay_scale_14`
  MODIFY `grade` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
