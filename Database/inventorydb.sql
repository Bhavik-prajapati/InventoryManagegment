-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2024 at 04:52 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`id`, `user_id`, `email`, `user_type`, `activity_timestamp`, `activity_details`) VALUES
(202, 24, 'user001', 'Outward', '2024-07-19 18:36:51', 'entered outward record'),
(200, 24, 'user001', 'Inward', '2024-07-18 20:40:00', 'entered inward record'),
(201, 24, 'user001', 'Process', '2024-07-19 18:36:29', 'logged in'),
(199, 24, 'user001', 'Inward', '2024-07-18 16:08:12', 'logged in'),
(198, 24, 'user001', 'Process', '2024-07-18 12:21:41', 'entered process outward record'),
(197, 24, 'user001', 'Process', '2024-07-18 12:21:10', 'entered process inward record'),
(196, 24, 'user001', 'Outward', '2024-07-18 11:47:00', 'entered outward record'),
(195, 24, 'user001', 'Process', '2024-07-18 11:45:42', 'entered process outward record'),
(194, 24, 'user001', 'Process', '2024-07-18 11:41:23', 'entered process inward record'),
(192, 24, 'user001', 'Inward', '2024-07-18 11:18:22', 'entered inward record'),
(193, 24, 'user001', 'Process', '2024-07-18 11:40:11', 'entered process inward record'),
(191, 24, 'user001', 'Inward', '2024-07-18 11:17:49', 'entered inward record'),
(189, 24, 'user001', 'Inward', '2024-07-14 10:02:54', 'logged in'),
(190, 24, 'user001', 'Inward', '2024-07-18 11:10:48', 'logged in'),
(188, 24, 'user001', 'Inward', '2024-07-14 06:42:00', 'entered inward record'),
(187, 24, 'user001', 'Process', '2024-07-14 06:41:29', 'entered process inward record'),
(186, 24, 'user001', 'Inward', '2024-07-14 06:40:59', 'entered inward record'),
(185, 24, 'user001', 'Outward', '2024-07-14 06:40:06', 'entered outward record'),
(184, 24, 'user001', 'Process', '2024-07-14 06:39:28', 'entered process outward record'),
(183, 24, 'user001', 'Process', '2024-07-14 06:32:04', 'entered process inward record'),
(182, 24, 'user001', 'Process', '2024-07-14 06:27:58', 'entered process outward record'),
(181, 24, 'user001', 'Process', '2024-07-14 06:27:29', 'entered process inward record'),
(180, 24, 'user001', 'Inward', '2024-07-14 06:24:58', 'entered inward record'),
(179, 24, 'user001', 'Inward', '2024-07-14 06:23:09', 'logged in');

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

DROP TABLE IF EXISTS `admin_master`;
CREATE TABLE IF NOT EXISTS `admin_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
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
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inward_master`
--

INSERT INTO `inward_master` (`id`, `place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`, `lot_no`) VALUES
(48, 'asdasd', 'hello 1', 'Ajwain Seeds', 'asdasd', '100', '2000', '2000', '2000', '2000', '2000', '2000', 'Jignesh Patel', 'Jignesh Patel', 'huih', '2024-07-18', 'shhihui', 'iuhihui', 'RM/2024/07/18/1'),
(50, 'asdasd', 'asdasd', 'product', 'asdasd', '234', '2342', '234', '234', '234', '234', '234', 'Dipesh Patel', 'Jignesh Patel', '234', '2024-07-19', '234', '234', 'RM/2024/07/18/3'),
(49, 'asddkasjk', 'hello 2', 'Ajwain Seeds', '100', '1000', '1000', '1000', '1000', '1000', '1000', '1000', 'Kaushal Patel', 'Kaushal Patel', '100', '2024-07-18', '1000', '100', 'RM/2024/07/18/2');

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inward_master_v2`
--

INSERT INTO `inward_master_v2` (`id`, `place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `main_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`, `lot_no`) VALUES
(27, 'asdasd', 'asdasd', 'product', 'asdasd', '234', '2342', '2342', '234', '234', '234', '234', '234', 'Dipesh Patel', 'Jignesh Patel', '234', '2024-07-19', '234', '234', 'RM/2024/07/18/3'),
(26, 'asddkasjk', 'hello 2', 'Ajwain Seeds', '100', '1000', '1000', '1000', '1000', '1000', '1000', '1000', '1000', 'Kaushal Patel', 'Kaushal Patel', '100', '2024-07-18', '1000', '100', 'RM/2024/07/18/2'),
(25, 'asdasd', 'hello 1', 'Ajwain Seeds', 'asdasd', '100', '1500', '2000', '2000', '2000', '2000', '2000', '2000', 'Jignesh Patel', 'Jignesh Patel', 'huih', '2024-07-18', 'shhihui', 'iuhihui', 'RM/2024/07/18/1');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outward_master`
--

INSERT INTO `outward_master` (`id`, `date`, `product`, `quality`, `buyer_name`, `vehicle_number`, `container_number`, `quantity_per_kg`, `supervisor_name`, `gate_person_name`, `remarks`, `place`, `bags_quantity`, `weighbridge_weight`, `invoice_bridge_weight`, `invoice`) VALUES
(16, '2024-07-20', 'Ajwain Seeds', 'asd', 'asd', 'asd', 'asd', '324', 'Kaushal Patel', 'Kaushal Patel', 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd'),
(15, '2024-07-18', 'Ajwain Seeds', 'werlkwmerlk`kwlet`', 'lrgkll', 'elfmglk', 'lkfgmkl', '234', 'Kaushal Patel', 'Rajesh Suthar', 'sdf', 'himmatnagar', 'lekrmmlk', 'zxcs', 'sdfsdf', 'sdf');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_master`
--

INSERT INTO `process_master` (`id`, `place`, `process_name`, `foreign_buyer_name`, `product_name`, `weight_quality`, `total_kg`, `remarks`, `date`, `supplier_name`, `lot_no`) VALUES
(49, 'ksdhjksdfh', 'hskdjksd', 'lkdjklsdf', '', 'ddjflskjfkl', '100', 'sdfsf', '2024-07-18', 'hello 1', 'RM/2024/07/18/1');

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
  `place` text,
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `role`, `username`, `password`, `date`) VALUES
(24, '', 'user001', 'user001', '2024-07-10 15:49:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
