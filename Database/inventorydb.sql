-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 05, 2024 at 04:30 PM
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

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `InsertAndUpdateProcess`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertAndUpdateProcess` (IN `p_place` TEXT, IN `p_process_name` TEXT, IN `p_foreign_buyer_name` TEXT, IN `p_product_name` TEXT, IN `p_weight_quality` TEXT, IN `p_bags_quantity` TEXT, IN `p_each_bag_weight` TEXT, IN `p_remarks` TEXT, IN `p_date` DATE)  BEGIN
    DECLARE v_bags_quantity INT;
    DECLARE v_each_bag_weight DECIMAL(10, 2);

    -- Insert into process_master
    INSERT INTO process_master (
        place,
        process_name,
        foreign_buyer_name,
        product_name,
        weight_quality,
        bags_quantity,
        each_bag_weight,
        remarks,
        date
    )
    VALUES (
        p_place,
        p_process_name,
        p_foreign_buyer_name,
        p_product_name,
        p_weight_quality,
        p_bags_quantity,
        p_each_bag_weight,
        p_remarks,
        p_date
    );

    -- Convert bags_quantity and each_bag_weight to numeric types
    SET v_bags_quantity = CAST(p_bags_quantity AS UNSIGNED);
    SET v_each_bag_weight = CAST(p_each_bag_weight AS DECIMAL(10, 2));

    -- Update inward_master
    UPDATE inward_master
    SET 
        bags = bags - v_bags_quantity,
        each_bag_weight = each_bag_weight - v_each_bag_weight
    WHERE
        place = p_place AND product_name = p_product_name;
END$$

DROP PROCEDURE IF EXISTS `UpdateInwardMaster`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateInwardMaster` (IN `p_place` TEXT, IN `p_product_name` TEXT, IN `p_bags_quantity` TEXT, IN `p_each_bag_weight` TEXT)  BEGIN
    DECLARE v_bags_quantity INT;
    DECLARE v_each_bag_weight DECIMAL(10, 2);

    SET v_bags_quantity = CAST(p_bags_quantity AS UNSIGNED);
    SET v_each_bag_weight = CAST(p_each_bag_weight AS DECIMAL(10, 2));

    UPDATE inward_master
    SET 
        bags = bags - v_bags_quantity,
        each_bag_weight = each_bag_weight - v_each_bag_weight
    WHERE
        place = p_place AND product_name = p_product_name;
END$$

DELIMITER ;

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
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`id`, `user_id`, `email`, `user_type`, `activity_timestamp`, `activity_details`) VALUES
(2, 17, 'tarak@gmail.com', 'Inward', '2024-06-22 12:32:21', 'logged in'),
(3, 17, 'tarak@gmail.com', 'Inward', '2024-06-22 12:33:50', 'logged in'),
(4, 17, 'tarak@gmail.com', 'Inward', '2024-06-22 12:45:55', 'logged in'),
(9, 21, 'testing@123gmail.com', 'Process', '2024-06-22 17:18:34', 'logged in'),
(8, 20, 'rahul@gmail.com', 'Process', '2024-06-22 17:11:46', 'logged in'),
(10, 22, 'inward@gmail.com', 'Inward', '2024-06-22 17:19:34', 'logged in'),
(11, 20, 'rahul@gmail.com', 'Process', '2024-06-23 04:44:17', 'logged in'),
(12, 20, 'rahul@gmail.com', 'Process', '2024-06-23 04:46:33', 'logged in'),
(13, 20, 'rahul@gmail.com', 'Process', '2024-06-23 05:01:58', 'logged in'),
(14, 12, 'test3@123', 'Outward', '2024-06-23 05:06:36', 'logged in'),
(15, 17, 'tarak@gmail.com', 'Inward', '2024-06-23 13:07:08', 'logged in'),
(16, 17, 'tarak@gmail.com', 'Inward', '2024-06-23 13:10:43', 'logged in'),
(17, 17, 'tarak@gmail.com', 'Inward', '2024-06-23 13:16:18', 'logged in'),
(18, 17, 'tarak@gmail.com', 'Inward', '2024-06-23 13:20:37', 'logged in'),
(19, 17, 'tarak@gmail.com', 'Inward', '2024-06-23 13:22:18', 'logged in'),
(20, 17, 'tarak@gmail.com', 'Inward', '2024-06-23 13:24:14', 'logged in'),
(21, 17, 'tarak@gmail.com', 'Inward', '2024-06-23 13:26:18', 'logged in'),
(22, 17, 'tarak@gmail.com', 'Inward', '2024-06-23 16:58:57', 'logged in'),
(23, 17, 'tarak@gmail.com', 'Inward', '2024-06-23 16:59:02', 'entered inward item'),
(24, 17, 'tarak@gmail.com', 'Inward', '2024-06-25 02:24:57', 'logged in'),
(25, 22, 'inward@gmail.com', 'Outward', '2024-06-25 02:28:51', 'logged in'),
(26, 17, 'tarak@gmail.com', 'Inward', '2024-06-25 16:33:06', 'logged in'),
(27, 20, 'rahul@gmail.com', 'Process', '2024-06-25 16:35:48', 'logged in'),
(28, 22, 'inward@gmail.com', 'Inward', '2024-06-26 15:20:45', 'logged in'),
(29, 22, 'inward@gmail.com', 'Inward', '2024-06-26 15:24:09', 'entered inward item'),
(30, 21, 'testing@123gmail.com', 'Process', '2024-06-26 15:24:59', 'logged in'),
(31, 21, 'testing@123gmail.com', 'Process', '2024-06-26 15:26:01', 'entered process item'),
(32, 22, 'inward@gmail.com', 'Inward', '2024-06-26 16:20:25', 'entered inward item'),
(33, 22, 'inward@gmail.com', 'Inward', '2024-06-26 17:08:45', 'entered inward item'),
(34, 17, 'tarak@gmail.com', 'Inward', '2024-06-27 15:45:14', 'logged in'),
(35, 17, 'tarak@gmail.com', 'Inward', '2024-06-27 15:47:35', 'logged in'),
(36, 20, 'rahul@gmail.com', 'Process', '2024-06-27 15:48:22', 'logged in'),
(37, 5, 'abcd@gmail.com', 'Inward', '2024-06-27 15:58:22', 'logged in'),
(38, 17, 'tarak@gmail.com', 'Inward', '2024-06-30 05:54:46', 'logged in'),
(39, 22, 'inward@gmail.com', 'Inward', '2024-06-30 05:56:39', 'logged in'),
(40, 22, 'inward@gmail.com', 'Inward', '2024-06-30 06:11:47', 'entered inward item'),
(41, 22, 'inward@gmail.com', 'Inward', '2024-06-30 06:14:37', 'entered inward item'),
(42, 22, 'inward@gmail.com', 'Inward', '2024-06-30 06:19:12', 'entered inward item'),
(43, 22, 'inward@gmail.com', 'Inward', '2024-06-30 07:28:24', 'logged in'),
(44, 1, 'demo001@gmail.com', 'Inward', '2024-07-03 15:58:40', 'entered inward item'),
(45, 1, 'demo001@gmail.com', 'Inward', '2024-07-03 16:59:55', 'entered inward item'),
(46, 1, 'demo001@gmail.com', 'Inward', '2024-07-03 17:01:18', 'entered inward item'),
(47, 5, 'demo001@gmail.com', 'Inward', '2024-07-04 09:01:58', 'logged in'),
(48, 5, 'demo001@gmail.com', 'Inward', '2024-07-04 09:02:01', 'entered inward item'),
(49, 5, 'demo001@gmail.com', 'Inward', '2024-07-04 09:04:06', 'entered inward item'),
(50, 5, 'demo001@gmail.com', 'Inward', '2024-07-04 09:05:50', 'entered inward item'),
(51, 5, 'demo001@gmail.com', 'Inward', '2024-07-04 13:05:50', 'logged in'),
(52, 5, 'demo001@gmail.com', 'Inward', '2024-07-04 15:01:57', 'logged in'),
(53, 5, 'demo001@gmail.com', 'Inward', '2024-07-04 15:56:31', 'logged in'),
(54, 22, 'demo002@gmail.com', 'Process', '2024-07-04 15:59:38', 'logged in'),
(55, 5, 'demo001@gmail.com', 'Inward', '2024-07-04 16:01:53', 'logged in'),
(56, 5, 'demo001@gmail.com', 'Inward', '2024-07-04 18:13:39', 'logged in'),
(57, 5, 'demo001@gmail.com', 'Inward', '2024-07-05 06:00:38', 'logged in'),
(58, 5, 'demo001@gmail.com', 'Inward', '2024-07-05 06:02:01', 'logged in'),
(59, 22, 'demo002@gmail.com', 'Process', '2024-07-05 10:13:41', 'logged in'),
(60, 22, 'admin', 'Process', '2024-07-05 11:24:48', 'entered process item'),
(61, 22, 'admin', 'Process', '2024-07-05 11:44:40', 'entered process item'),
(62, 22, 'admin', 'Process', '2024-07-05 11:44:41', 'entered process item'),
(63, 22, 'admin', 'Process', '2024-07-05 11:44:42', 'entered process item');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inward_master`
--

INSERT INTO `inward_master` (`id`, `place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`) VALUES
(17, 'gondal', 'labh exime', 'CURRY POWDER', 'split', '130', '2500', '21.33', '2600', '2630', '2500', '2600', 'ramesh bhai', 'ramesh bhai', 'PURITY 99.49%', '2024-06-26 16:20:25', '', '');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inward_master_v2`
--

INSERT INTO `inward_master_v2` (`id`, `place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`) VALUES
(1, 'gondal', 'labh exime', 'CURRY POWDER', 'split', '100', '2500', '21.33', '2600', '2630', '2500', '2600', 'ramesh bhai', 'ramesh bhai', 'PURITY 99.49%', '2024-06-26 16:20:25', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_master`
--

INSERT INTO `process_master` (`id`, `place`, `process_name`, `foreign_buyer_name`, `product_name`, `weight_quality`, `bags_quantity`, `each_bag_weight`, `remarks`, `date`) VALUES
(1, 'demo field value', 'demo field value', 'demo field value', 'demo field value', 'demo field value', 'demo field value', 'demo field value', 'demo field value', '2024-06-23 05:02:04'),
(2, 'Place A', 'Process X', 'Buyer X', 'Product 1', 'High', '10', '5.5', 'Remark X', '2024-06-03'),
(3, 'Place B', 'Process Y', 'Buyer Y', 'Product 2', 'Medium', '20', '3.2', 'Remark Y', '2024-06-03'),
(4, 'Place A', 'Process X', 'Buyer X', 'Product 1', 'High', '10', '5.5', 'Remark X', '2024-06-03'),
(5, 'Place B', 'Process Y', 'Buyer Y', 'Product 2', 'Medium', '20', '3.2', 'Remark Y', '2024-06-03'),
(6, 'Place A', 'Process X', 'Buyer X', 'Product 1', 'High', '10', '5.5', 'Remark X', '2024-06-03'),
(7, 'Place A', 'Process X', 'Buyer X', 'Product 1', 'High', '10', '5.5', 'Remark X', '2024-06-03'),
(8, 'Place A', 'Process X', 'Buyer X', 'Product 1', 'High', '10', '5.5', 'Remark X', '2024-06-03'),
(9, 'Place A', 'Process X', 'Buyer X', 'Product 1', 'High', '10', '5.5', 'Remark X', '2024-06-03'),
(10, 'Place A', 'Process X', 'Buyer X', 'Product 1', 'High', '10', '5.5', 'Remark X', '2024-06-03'),
(11, 'Place A', 'Process 00', 'Buyer X', 'Product 1', 'High', '10', '5.5', 'Remark X', '2024-06-03'),
(12, 'Place B', 'Process OO', 'Buyer Y', 'Product 2', 'Medium', '20', '3.2', 'Remark Y', '2024-06-03'),
(13, 'Place A', 'Process X', 'Buyer X', 'Product 1', 'High', '10', '5.5', 'Remark X', '2024-06-03'),
(14, 'factory 1', 'demo 1 ', 'kaka ji', 'CHILLI POWDER', '10', '10', '10', 'no', '2024-06-26 15:26:01'),
(15, '', '', '', '', '', '', '', '', '2024-07-05 11:24:48'),
(16, '', '', '', 'CURRY POWDER', '', '', '', '', '2024-07-05 11:44:40'),
(17, '', '', '', '', '', '', '', '', '2024-07-05 11:44:41'),
(18, '', '', '', '', '', '', '', '', '2024-07-05 11:44:42');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `role`, `username`, `password`, `date`) VALUES
(20, 'Process', 'rahul@gmail.com', 'rahul@gmail.com', '2024-06-22 17:11:17'),
(5, 'Inward', 'demo001@gmail.com', 'demo001@gmail.com', '2024-06-20 01:23:54'),
(6, 'Inward', 'abcd@gmail.com', '$2y$10$2Vai2Mg1.ixbgw8G5CyvXuZkTpoR1x952JQ1P4C5jcfZln8.l5Z4e', '2024-06-20 01:27:18'),
(7, 'Inward', 'abcd@gmail.com', '$2y$10$YpSjPvvrSFMPBgwAu.lVpetTTKoC0HUN8Bfl6ZeJTGL0syhIpQ/ra', '2024-06-20 01:27:27'),
(10, 'Inward', 'test1@123', '$2y$10$3w1qEewrB3bH42hzmbGfEObiQ.1DKyIBG0uaVpocwvChM8wkrHniy', '2024-06-20 02:27:57'),
(19, 'Process', 'test@gmail.com', 'test@gmail.com', '2024-06-22 17:02:12'),
(12, 'Outward', 'test3@123', 'test3@123', '2024-06-20 02:28:22'),
(13, 'Inward', 'rahul@123', '$2y$10$Gct7wG7uQFXxgn10iL0.0OkMY0U/vlpY3o7Pt9RPm7sSb6X5tDMcm', '2024-06-20 14:18:11'),
(14, 'Inward', 'inward1@gmail.com', '$2y$10$vJd1Or6VIUgtCiLywu/EKOfplqij.XUKrbuuyUVFeAGoXRlq55lZm', '2024-06-20 14:24:01'),
(15, 'Inward', 'bhavik@123', '$2y$10$k3ZsM.H2X7XexBUcaJsXzeT0cDm6L7BLtvERicfL3N1gmm4qEkvNu', '2024-06-20 14:24:49'),
(16, 'Outward', 'bhide@123', '$2y$10$LG/ICyJCmCgvFGVKELjkaOqLznTRvMRKfVMuIqFAc3gxygnahdYhG', '2024-06-21 02:07:53'),
(17, 'Inward', 'tarak@gmail.com', 'tarak@gmail.com', '2024-06-21 02:22:03'),
(18, 'Process', 'testuser@123', '$2y$10$gO0LUdVDmBn7FG8sOPq4Bep8yQ1P2KOlzRHJ44cbDqUyFoTQ6rDQ6', '2024-06-22 16:48:32'),
(21, 'Process', 'testing@123gmail.com', 'testing@123gmail.com', '2024-06-26 15:20:28'),
(22, 'Process', 'demo002@gmail.com', 'demo002@gmail.com', '2024-07-04 15:59:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
