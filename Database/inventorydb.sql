-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2024 at 04:41 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`id`, `user_id`, `email`, `user_type`, `activity_timestamp`, `activity_details`) VALUES
(2, 17, 'tarak@gmail.com', 'Inward', '2024-06-22 12:32:21', 'User logged in'),
(3, 17, 'tarak@gmail.com', 'Inward', '2024-06-22 12:33:50', 'User logged in'),
(4, 1, 'demo001@gmail.com', 'Inward', '2024-06-22 15:13:00', 'User logged in'),
(5, 2, 'demo002@gmail.com', 'Process', '2024-06-22 15:16:14', 'User logged in'),
(6, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 10:56:14', 'logged in'),
(7, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 10:58:57', 'logged in'),
(8, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:08:13', 'logged in'),
(9, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:09:13', 'logged in'),
(10, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:09:46', 'logged in'),
(11, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:10:23', 'logged in'),
(12, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:12:52', 'logged in'),
(13, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:13:37', 'logged in'),
(14, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:14:05', 'logged in'),
(15, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:14:09', 'logged in'),
(16, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:15:19', 'logged in'),
(17, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:15:24', 'logged in'),
(18, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:18:15', 'logged in'),
(19, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:23:10', 'logged in'),
(20, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:24:23', 'logged in'),
(21, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:24:34', 'logged in'),
(22, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:24:46', 'logged in'),
(23, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:26:03', 'logged in'),
(24, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:28:12', 'logged in'),
(25, 1, 'demo001@gmail.com', 'Inward', '2024-06-23 11:29:04', 'logged in'),
(26, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 09:12:24', 'logged in'),
(27, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 09:12:28', 'logged in'),
(28, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 09:12:33', 'logged in'),
(29, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 09:12:41', 'logged in'),
(30, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 09:12:45', 'logged in'),
(31, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 09:54:36', 'logged in'),
(32, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 15:35:33', 'logged in'),
(33, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 20:33:35', 'entered inward item'),
(34, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 20:36:58', 'entered inward item'),
(35, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 20:37:06', 'entered inward item'),
(36, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 20:37:22', 'entered inward item'),
(37, 1, 'demo001@gmail.com', 'Inward', '2024-06-24 20:37:37', 'entered inward item'),
(38, 1, 'demo001@gmail.com', 'Inward', '2024-06-25 13:48:57', 'logged in'),
(39, 2, 'demo002@gmail.com', 'Process', '2024-06-25 13:53:09', 'logged in'),
(40, 1, 'demo001@gmail.com', 'Inward', '2024-06-25 16:33:54', 'logged in'),
(41, 2, 'demo002@gmail.com', 'Process', '2024-06-25 16:34:01', 'logged in'),
(42, 1, 'demo001@gmail.com', 'Inward', '2024-06-25 18:08:24', 'logged in'),
(43, 1, 'demo001@gmail.com', 'Inward', '2024-06-25 18:11:55', 'entered inward item'),
(44, 2, 'demo002@gmail.com', 'Process', '2024-06-26 12:55:42', 'logged in'),
(45, 2, 'demo002@gmail.com', 'Process', '2024-06-26 12:59:26', 'entered process item'),
(46, 2, 'demo002@gmail.com', 'Process', '2024-06-26 13:02:37', 'entered process item'),
(47, 1, 'demo001@gmail.com', 'Inward', '2024-06-26 15:37:08', 'logged in'),
(48, 1, 'demo001@gmail.com', 'Inward', '2024-06-26 15:42:30', 'entered inward item'),
(49, 2, 'demo002@gmail.com', 'Process', '2024-06-26 15:44:36', 'logged in'),
(50, 2, 'demo002@gmail.com', 'Process', '2024-06-26 15:49:59', 'entered process item'),
(51, 1, 'demo001@gmail.com', 'Inward', '2024-06-26 16:15:24', 'entered inward item'),
(52, 2, 'demo002@gmail.com', 'Process', '2024-06-26 19:03:49', 'logged in'),
(53, 2, 'demo002@gmail.com', 'Process', '2024-06-26 20:13:40', 'logged in'),
(54, 2, 'demo002@gmail.com', 'Process', '2024-06-26 20:26:39', 'logged in'),
(55, 2, 'demo002@gmail.com', 'Process', '2024-06-26 20:27:51', 'entered process item'),
(56, 2, 'demo002@gmail.com', 'Process', '2024-06-26 20:28:39', 'entered process item'),
(57, 2, 'demo002@gmail.com', 'Process', '2024-06-26 20:32:36', 'entered process item'),
(58, 1, 'demo001@gmail.com', 'Inward', '2024-06-27 04:03:18', 'logged in'),
(59, 2, 'demo002@gmail.com', 'Process', '2024-06-27 04:11:58', 'logged in');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `username`, `password`, `date`) VALUES
(1, 'admin', 'admin', 'date');

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
  `each_bag_weight` text,
  `rate` text,
  `om_exim_weighbridge_weight` text,
  `other_weighbridge_weight` text,
  `weight_as_per_average_bag_weight` text,
  `bill_weight` text,
  `weight_supervisor_name` text,
  `quality_supervisor_name` text,
  `remarks` text,
  `date` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
  `each_bag_weight` text,
  `rate` text,
  `om_exim_weighbridge_weight` text,
  `other_weighbridge_weight` text,
  `weight_as_per_average_bag_weight` text,
  `bill_weight` text,
  `weight_supervisor_name` text,
  `quality_supervisor_name` text,
  `remarks` text,
  `date` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outward_master`
--

DROP TABLE IF EXISTS `outward_master`;
CREATE TABLE IF NOT EXISTS `outward_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` text,
  `foreign_buyer_name` text,
  `product_name` text,
  `quality` text,
  `bags_quantity` text,
  `each_bag_weight` text,
  `weighbridge_weight` text,
  `invoice_weight` text,
  `remarks` text,
  `date` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `bags_quantity` text,
  `each_bag_weight` text,
  `remarks` text,
  `date` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `role`, `username`, `password`, `date`) VALUES
(1, 'Inward', 'demo001@gmail.com', 'demo001@gmail.com', '2024-06-20 16:26:31'),
(2, 'Process', 'demo002@gmail.com', 'demo002@gmail.com', '2024-06-20 16:26:43'),
(3, 'Outward', 'hello', 'hello@gmail.com', '2024-06-23 07:17:54'),
(5, 'Process', 'userprocess', 'pass12342', '2024-06-26 15:36:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
