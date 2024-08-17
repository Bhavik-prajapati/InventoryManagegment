-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2024 at 05:39 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_master`
--

DROP TABLE IF EXISTS `activity_master`;
CREATE TABLE IF NOT EXISTS `activity_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `activity_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `activity_details` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=255 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`id`, `user_id`, `email`, `user_type`, `activity_timestamp`, `activity_details`) VALUES
(202, 25, 'kaushal', 'Inward', '2024-07-14 16:04:51', 'logged in'),
(203, 24, 'user001', 'Inward', '2024-08-13 16:46:19', 'entered inward record'),
(204, 24, 'user001', 'Process', '2024-08-13 19:30:52', 'entered process inward record'),
(205, 24, 'user001', 'Inward', '2024-08-13 19:31:58', 'entered inward record'),
(206, 25, 'user001', 'Inward', '2024-08-14 06:18:47', 'logged in'),
(207, 25, 'user001', 'Inward', '2024-08-14 07:50:14', 'entered inward record'),
(208, 25, 'user001', 'Process', '2024-08-14 07:50:46', 'entered process inward record'),
(209, 25, 'user001', 'Process', '2024-08-14 07:50:46', 'entered process inward record'),
(210, 25, 'user001', 'Inward', '2024-08-14 07:53:38', 'entered inward record'),
(211, 25, 'user001', 'Inward', '2024-08-14 07:54:19', 'entered inward record'),
(212, 25, 'user001', 'Process', '2024-08-14 07:54:55', 'entered process inward record'),
(213, 25, 'user001', 'Process', '2024-08-14 07:54:55', 'entered process inward record'),
(214, 25, 'user001', 'Process', '2024-08-14 08:26:30', 'entered process inward record'),
(215, 25, 'user001', 'Process', '2024-08-14 08:26:30', 'entered process inward record'),
(216, 25, 'user001', 'Inward', '2024-08-14 09:24:59', 'entered inward record'),
(217, 25, 'user001', 'Process', '2024-08-14 09:26:35', 'entered process inward record'),
(218, 25, 'user001', 'Process', '2024-08-14 09:26:35', 'entered process inward record'),
(219, 25, 'user001', 'Process', '2024-08-14 09:37:30', 'entered process inward record'),
(220, 25, 'user001', 'Process', '2024-08-14 09:37:30', 'entered process inward record'),
(221, 25, 'user001', 'Process', '2024-08-14 10:22:53', 'logged in'),
(222, 25, 'user001', 'Process', '2024-08-15 16:08:56', 'logged in'),
(223, 25, 'user001', 'Process', '2024-08-15 16:38:30', 'entered process inward record'),
(224, 25, 'user001', 'Process', '2024-08-15 16:38:30', 'entered process inward record'),
(225, 25, 'user001', 'Inward', '2024-08-15 17:02:46', 'entered inward record'),
(226, 25, 'user001', 'Inward', '2024-08-15 17:07:22', 'entered inward record'),
(227, 25, 'user001', 'Inward', '2024-08-15 17:14:14', 'entered inward record'),
(228, 25, 'user001', 'Inward', '2024-08-15 17:14:14', 'entered inward record'),
(229, 25, 'user001', 'Outward', '2024-08-16 03:34:50', 'logged in'),
(230, 25, 'user001', 'Inward', '2024-08-16 05:47:14', 'logged in'),
(231, 25, 'user001', 'Inward', '2024-08-16 08:58:06', 'logged in'),
(232, 25, 'user001', 'Inward', '2024-08-16 10:16:37', 'entered inward record'),
(233, 25, 'user001', 'Inward', '2024-08-16 10:16:37', 'entered inward record'),
(234, 25, 'user001', 'Inward', '2024-08-16 10:21:16', 'entered inward record'),
(235, 25, 'user001', 'Inward', '2024-08-16 10:21:16', 'entered inward record'),
(236, 25, 'user001', 'Outward', '2024-08-16 10:52:17', 'logged in'),
(237, 25, 'user001', 'Outward', '2024-08-16 11:14:05', 'entered outward record'),
(238, 25, 'user001', 'Outward', '2024-08-16 11:14:05', 'entered outward record'),
(239, 25, 'user001', 'Outward', '2024-08-16 11:29:31', 'entered outward record'),
(240, 25, 'user001', 'Outward', '2024-08-16 11:29:31', 'entered outward record'),
(241, 25, 'user001', 'Outward', '2024-08-16 11:30:36', 'entered outward record'),
(242, 25, 'user001', 'Outward', '2024-08-16 11:30:36', 'entered outward record'),
(243, 25, 'user001', 'Outward', '2024-08-16 11:32:29', 'entered outward record'),
(244, 25, 'user001', 'Outward', '2024-08-16 11:32:29', 'entered outward record'),
(245, 25, 'user001', 'Outward', '2024-08-16 11:35:54', 'entered outward record'),
(246, 25, 'user001', 'Outward', '2024-08-16 11:35:54', 'entered outward record'),
(247, 25, 'user001', 'Outward', '2024-08-16 11:37:26', 'entered outward record'),
(248, 25, 'user001', 'Outward', '2024-08-16 11:37:26', 'entered outward record'),
(249, 25, 'user001', 'Inward', '2024-08-16 12:05:11', 'logged in'),
(250, 25, 'user001', 'Inward', '2024-08-17 06:55:01', 'logged in'),
(251, 25, 'user001', 'Inward', '2024-08-17 06:58:03', 'logged in'),
(252, 25, 'user001', 'Inward', '2024-08-17 06:58:46', 'entered inward record'),
(253, 25, 'user001', 'Inward', '2024-08-17 06:58:46', 'entered inward record'),
(254, 25, 'user001', 'Process', '2024-08-17 16:34:27', 'logged in');

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

DROP TABLE IF EXISTS `admin_master`;
CREATE TABLE IF NOT EXISTS `admin_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET latin1 COLLATE latin1_bin,
  `password` text CHARACTER SET latin1 COLLATE latin1_bin,
  `date` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `username`, `password`, `date`) VALUES
(1, 'admin', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inward_master`
--

DROP TABLE IF EXISTS `inward_master`;
CREATE TABLE IF NOT EXISTS `inward_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` text,
  `supplier_name` text,
  `product_name` text,
  `quality` text,
  `bags` text,
  `total_kg` text,
  `rate` text,
  `om_exim_weighbridge_weight` text,
  `other_weighbridge_weight` text,
  `weight_as_per_average_bag_weight` text,
  `bill_weight` text,
  `weight_supervisor_name` text,
  `quality_supervisor_name` text,
  `remarks` text,
  `date` text,
  `vehicle_no` text NOT NULL,
  `container_no` text NOT NULL,
  `lot_no` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inward_master`
--

INSERT INTO `inward_master` (`id`, `place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`, `lot_no`) VALUES
(49, 'himmatnagar', 'dsfgdfg', 'iouyiugijkuhjkhjkl', 'dfg', '456', '456', '456', '6456', '456456', '456456', '456456', 'Dipesh Patel', 'Dipesh Patel', 'PURITY-99.49%', '2024-08-13', '1000', 'demo', 'RM/2024/08/13/1'),
(50, '123123', '123123', 'iouyiugijkuhjkhjkl', '123123123', '123123', '123123', '123123', '123123', '123123', '123123', '234234', 'Kaushal Patel', 'Dipesh Patel', '312', '2024-08-14', '234', '132', 'RM/2024/08/14/2'),
(51, 'asdasd', 'asdasd', '111', 'asdasd', '222', '22233', '21', '1212', '123', '321', '123', 'Jignesh Patel', 'Rajesh Suthar', '123', '2024-08-14', '123', '123', 'RM/2024/08/14/3'),
(52, 'himmatnagar', 'test user 0', 'product001', 'demo', '5', '500', '10', '100', '100', '100', '100', 'Dipesh Patel', 'Dipesh Patel', 'PURITY-99.49%', '2024-08-14', 'demo', '234', 'RM/2024/08/14/4'),
(53, 'demo', 'demo00', 'product002', 'quality 001', '54', '5000', '100', '500', '500', '500', '400', 'Kaushal Patel', 'Kaushal Patel', 'PURITY-99%', '2024-08-14', 'demo44', '444', 'RM/2024/08/14/5'),
(54, 'himmatnagar', 'hello', 'product001', 'asdasd', '12', '500', '25', '500', '500', '500', '500', 'Dipesh Patel', 'Dipesh Patel', 'PURITY-99.49%', '2024-08-14', 'qweqwe', '234', 'RM/2024/08/14/6'),
(55, 'temp', 'temp', NULL, 'temp', '222', '222', '222', '222', '222', '222', '222', 'Rajesh Suthar', 'Rajesh Suthar', '222', '2024-08-15', '222', '222', 'RM/2024/08/15/7'),
(56, 'temp2', 'temp2', 'product 004', 'temp2', '5', '6', '7', '8', '9', '10', '11', 'Kaushal Patel', 'Kaushal Patel', 'PURITY-99.49%', '2024-08-15', 'qweqwe', '234', 'RM/2024/08/15/8'),
(57, 'asdasd', 'asd', 'product 004', 'asd', '5', '6', '7', '8', '9', '10', '11', 'Dipesh Patel', 'Dipesh Patel', 'PURITY-99.49%', '2024-08-15', '234', 'qweqwe', 'RM/2024/08/15/9'),
(58, 'asdasd', 'asd', 'product001', 'asd', '5', '6', '7', '8', '9', '10', '11', 'Dipesh Patel', 'Dipesh Patel', 'PURITY-99.49%', '2024-08-15', '234', 'qweqwe', 'RM/2024/08/15/9'),
(59, 'hkjhjk', 'jkh', 'product001', 'hjkh', '5', NULL, '54', '54', '54', '545', '45', 'Kaushal Patel', 'Dipesh Patel', '45', '2024-08-16', '45', '45', 'RM/2024/08/16/11'),
(60, 'hkjhjk', 'jkh', 'product002', 'hjkh', '5', NULL, '54', '54', '54', '545', '45', 'Kaushal Patel', 'Dipesh Patel', '45', '2024-08-16', '45', '45', 'RM/2024/08/16/11'),
(61, 'lkdjgklehl', '78897', 'product001', '786', '786', '10000000', '767', '567', '567', '567', '567', 'Kaushal Patel', 'Dipesh Patel', '76', '2024-08-16', '567', '76', 'RM/2024/08/16/13'),
(62, 'lkdjgklehl', '78897', 'product002', '786', '786', '200000000', '767', '567', '567', '567', '567', 'Kaushal Patel', 'Dipesh Patel', '76', '2024-08-16', '567', '76', 'RM/2024/08/16/13'),
(63, 'jikoljkljikl', 'jklj', 'product001', '89089', '889', '10000', '8797', '897', '897', '897', '897', 'Kaushal Patel', 'Dipesh Patel', '90', '2024-08-17', '979', '989', 'RM/2024/08/17/15'),
(64, 'jikoljkljikl', 'jklj', 'product002', '89089', '889', '20000', '8797', '897', '897', '897', '897', 'Kaushal Patel', 'Dipesh Patel', '90', '2024-08-17', '979', '989', 'RM/2024/08/17/15');

-- --------------------------------------------------------

--
-- Table structure for table `inward_master_v2`
--

DROP TABLE IF EXISTS `inward_master_v2`;
CREATE TABLE IF NOT EXISTS `inward_master_v2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` text,
  `supplier_name` text,
  `product_name` text,
  `quality` text,
  `bags` text,
  `total_kg` text,
  `main_kg` text,
  `rate` text,
  `om_exim_weighbridge_weight` text,
  `other_weighbridge_weight` text,
  `weight_as_per_average_bag_weight` text,
  `bill_weight` text,
  `weight_supervisor_name` text,
  `quality_supervisor_name` text,
  `remarks` text,
  `date` text,
  `vehicle_no` text NOT NULL,
  `container_no` text NOT NULL,
  `lot_no` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inward_master_v2`
--

INSERT INTO `inward_master_v2` (`id`, `place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `main_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`, `lot_no`) VALUES
(36, 'hkjhjk', 'jkh', 'product001', 'hjkh', '5', NULL, NULL, '54', '54', '54', '545', '45', 'Kaushal Patel', 'Dipesh Patel', '45', '2024-08-16', '45', '45', 'RM/2024/08/16/11'),
(37, 'hkjhjk', 'jkh', 'product002', 'hjkh', '5', NULL, NULL, '54', '54', '54', '545', '45', 'Kaushal Patel', 'Dipesh Patel', '45', '2024-08-16', '45', '45', 'RM/2024/08/16/11'),
(40, 'jikoljkljikl', 'jklj', 'product001', '89089', '889', '10000', '10000', '8797', '897', '897', '897', '897', 'Kaushal Patel', 'Dipesh Patel', '90', '2024-08-17', '979', '989', 'RM/2024/08/17/15'),
(41, 'jikoljkljikl', 'jklj', 'product002', '89089', '889', '20000', '20000', '8797', '897', '897', '897', '897', 'Kaushal Patel', 'Dipesh Patel', '90', '2024-08-17', '979', '989', 'RM/2024/08/17/15');

-- --------------------------------------------------------

--
-- Table structure for table `outward_lot_master`
--

DROP TABLE IF EXISTS `outward_lot_master`;
CREATE TABLE IF NOT EXISTS `outward_lot_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lot_no` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outward_lot_master`
--

INSERT INTO `outward_lot_master` (`id`, `lot_no`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `outward_master`
--

DROP TABLE IF EXISTS `outward_master`;
CREATE TABLE IF NOT EXISTS `outward_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text,
  `product` text,
  `quality` text,
  `totalkg` text,
  `buyer_name` text,
  `vehicle_number` text,
  `container_number` text,
  `quantity_per_kg` text,
  `supervisor_name` text,
  `gate_person_name` text,
  `remarks` text,
  `place` text,
  `bags_quantity` text,
  `weighbridge_weight` text,
  `invoice_bridge_weight` text,
  `invoice` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outward_master`
--

INSERT INTO `outward_master` (`id`, `date`, `product`, `quality`, `totalkg`, `buyer_name`, `vehicle_number`, `container_number`, `quantity_per_kg`, `supervisor_name`, `gate_person_name`, `remarks`, `place`, `bags_quantity`, `weighbridge_weight`, `invoice_bridge_weight`, `invoice`) VALUES
(16, '2024-08-16', 'product002', '97', '890', '8789', '798', '798', '8798', 'Dipesh Patel', 'Dipesh Patel', '79', '9898', '9879', '987', '98779', '798'),
(17, '2024-08-16', 'product001', '97', '554454545545445', '8789', '798', '798', '8798', 'Dipesh Patel', 'Dipesh Patel', '79', '9898', '9879', '987', '98779', '798'),
(18, '2024-08-16', 'product002', 'uih8y8h', '100', 'y78', 'y8', '89u', '9899', 'Jignesh Patel', 'Rajesh Suthar', '90k', 'jooopoipoo', '8y78', 'jk09kj099', 'k90k', '09k'),
(19, '2024-08-16', 'product001', 'uih8y8h', '200', 'y78', 'y8', '89u', '9899', 'Jignesh Patel', 'Rajesh Suthar', '90k', 'jooopoipoo', '8y78', 'jk09kj099', 'k90k', '09k'),
(20, '2024-08-16', 'product002', '9j89', '98j9', '89j', '98j89', 'j89', '9', 'Jignesh Patel', 'Kaushal Patel', '98j98', 'ij9j89j98', 'j89j', 'j89', 'j89j', '89j'),
(21, '2024-08-16', 'product002', '9j89', 'j98j', '89j', '98j89', 'j89', '9', 'Jignesh Patel', 'Kaushal Patel', '98j98', 'ij9j89j98', 'j89j', 'j89', 'j89j', '89j'),
(22, '2024-08-16', 'product001', 'k;', ';l', 'lj', 'lkj', 'k', '22', 'Kaushal Patel', 'Jignesh Patel', 'hkh', ';lkl;', 'k;lk', 'hkh', 'kj', 'hk'),
(23, '2024-08-16', 'product002', 'k;', 'w2', 'lj', 'lkj', 'k', '22', 'Kaushal Patel', 'Jignesh Patel', 'hkh', ';lkl;', 'k;lk', 'hkh', 'kj', 'hk'),
(24, '2024-08-16', 'product 004', '0989090', '098890890', '908', '998', '789', '78', 'Dipesh Patel', 'Jignesh Patel', '9889', 'lkjlkjlkjo', '09808', '98798', '798', '798'),
(25, '2024-08-16', 'product 004', '0989090', '098908900', '908', '998', '789', '78', 'Dipesh Patel', 'Jignesh Patel', '9889', 'lkjlkjlkjo', '09808', '98798', '798', '798'),
(26, '2024-08-16', 'product001', 'asdasd', '555', 'asd', 'demo', '4', '908908', 'Dipesh Patel', 'Jignesh Patel', '90809', 'himmatnagar', '3', '09890890', '89', '898'),
(27, '2024-08-16', 'product001', 'asdasd', '555', 'asd', 'demo', '4', '908908', 'Dipesh Patel', 'Jignesh Patel', '90809', 'himmatnagar', '3', '09890890', '89', '898');

-- --------------------------------------------------------

--
-- Table structure for table `process_master`
--

DROP TABLE IF EXISTS `process_master`;
CREATE TABLE IF NOT EXISTS `process_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` text,
  `process_name` text,
  `foreign_buyer_name` text,
  `product_name` text,
  `weight_quality` text,
  `total_kg` text,
  `remarks` text,
  `date` text,
  `supplier_name` text,
  `lot_no` text,
  `final_product` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_master`
--

INSERT INTO `process_master` (`id`, `place`, `process_name`, `foreign_buyer_name`, `product_name`, `weight_quality`, `total_kg`, `remarks`, `date`, `supplier_name`, `lot_no`, `final_product`) VALUES
(56, 'himmatnagar', 'dfgdfg', 'dfgdfg', 'product001', 'dfgdfg', '100', 'asdasdasdasdasdasdasd', '2024-08-14', 'test user 0', '', 'iouyiugijkuhjkhjkl'),
(57, 'himmatnagar', 'dfgdfg', 'dfgdfg', 'product002', 'sdfsdfdsfdsf', '350', 'asdasdasdasdasdasdasd', '2024-08-14', 'demo00', '', 'iouyiugijkuhjkhjkl'),
(58, '345sdf', 'sdfsdf', 'sdfsdf', 'product002', '100', '140', 'PURITY-99.49%', '2024-08-14', 'demo00', '', 'iouyiugijkuhjkhjkl'),
(59, '345sdf', 'sdfsdf', 'sdfsdf', 'product001', 'dfgdfg', '100', 'PURITY-99.49%', '2024-08-14', 'hello', '', 'iouyiugijkuhjkhjkl'),
(60, 'himmatnagar', 'demo', 'demo', 'product002', 'demo', '1000', 'PURITY-99.49%', '2024-08-14', 'demo00', '', 'product001'),
(61, 'himmatnagar', 'demo', 'demo', 'product001', 'demo', '200', 'PURITY-99.49%', '2024-08-14', 'test user 0', '', 'product001'),
(62, 'aaa', 'aaa', 'aaa', 'product002', '111111', '10', 'PURITY-99.49%', '2024-08-15', 'demo00', '', 'product 003'),
(63, 'aaa', 'aaa', 'aaa', 'product001', '22222', '20', 'PURITY-99.49%', '2024-08-15', 'test user 0', '', 'product 003');

-- --------------------------------------------------------

--
-- Table structure for table `process_outward_master`
--

DROP TABLE IF EXISTS `process_outward_master`;
CREATE TABLE IF NOT EXISTS `process_outward_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text,
  `product_name` text,
  `quality` text,
  `one_no` text,
  `two_no` text,
  `three_no` text,
  `waste_product_weight` text,
  `remarks` text,
  `available_quantity` text,
  `supplier_name` text,
  `lot_no` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_name_master`
--

DROP TABLE IF EXISTS `supplier_name_master`;
CREATE TABLE IF NOT EXISTS `supplier_name_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_name_master`
--

INSERT INTO `supplier_name_master` (`id`, `name`) VALUES
(4, 'product 003'),
(5, 'product 004'),
(6, 'product001'),
(7, 'product002');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

DROP TABLE IF EXISTS `user_master`;
CREATE TABLE IF NOT EXISTS `user_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` text,
  `username` text,
  `password` text,
  `date` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `role`, `username`, `password`, `date`) VALUES
(25, '', 'user001', 'user001', '2024-08-14 11:48:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
