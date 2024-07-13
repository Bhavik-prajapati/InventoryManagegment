-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2024 at 09:34 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`id`, `user_id`, `email`, `user_type`, `activity_timestamp`, `activity_details`) VALUES
(178, 24, 'user001', 'Outward', '2024-07-13 21:33:09', 'entered outward record'),
(177, 24, 'user001', 'Process', '2024-07-13 21:32:47', 'entered process outward record'),
(176, 24, 'user001', 'Outward', '2024-07-13 21:31:57', 'entered outward record'),
(175, 24, 'user001', 'Outward', '2024-07-13 21:24:04', 'entered outward record'),
(174, 24, 'user001', 'Process', '2024-07-13 16:54:16', 'entered process outward record'),
(173, 24, 'user001', 'Process', '2024-07-13 16:18:33', 'entered process outward record'),
(172, 24, 'user001', 'Process', '2024-07-13 15:42:34', 'logged in'),
(171, 24, 'user001', 'Inward', '2024-07-13 12:42:12', 'entered inward record'),
(170, 24, 'user001', 'Inward', '2024-07-13 12:39:29', 'logged in'),
(169, 24, 'user001', 'Process', '2024-07-12 16:48:41', 'entered process inward record'),
(168, 24, 'user001', 'Process', '2024-07-12 16:41:52', 'entered process inward record'),
(167, 24, 'user001', 'Process', '2024-07-12 16:41:44', 'entered process inward record'),
(166, 24, 'user001', 'Process', '2024-07-12 16:41:41', 'entered process inward record'),
(165, 24, 'user001', 'Process', '2024-07-12 16:41:29', 'entered process inward record'),
(164, 24, 'user001', 'Process', '2024-07-12 16:38:32', 'entered process inward record'),
(163, 24, 'user001', 'Process', '2024-07-12 16:34:35', 'entered process inward record'),
(162, 24, 'user001', 'Inward', '2024-07-12 16:30:31', 'logged in'),
(161, 24, 'user001', 'Inward', '2024-07-12 11:34:52', 'entered inward record'),
(160, 24, 'user001', 'Inward', '2024-07-12 11:33:57', 'entered inward record'),
(159, 24, 'user001', 'Inward', '2024-07-12 11:32:08', 'entered inward record'),
(158, 24, 'user001', 'Inward', '2024-07-12 11:30:06', 'entered inward record'),
(157, 24, 'user001', 'Inward', '2024-07-12 11:28:06', 'entered inward record'),
(156, 24, 'user001', 'Inward', '2024-07-12 11:21:06', 'entered inward record'),
(155, 24, 'user001', 'Inward', '2024-07-12 09:14:40', 'logged in'),
(154, 24, 'user001', 'Inward', '2024-07-12 07:29:29', 'entered inward record'),
(153, 24, 'user001', 'Inward', '2024-07-12 06:53:58', 'logged in'),
(152, 24, 'user001', 'Inward', '2024-07-12 06:53:47', 'logged in'),
(151, 24, 'user001', 'Inward', '2024-07-11 16:26:29', 'entered inward record'),
(150, 24, 'user001', 'Inward', '2024-07-11 15:52:29', 'logged in'),
(149, 24, 'user001', 'Inward', '2024-07-11 12:55:41', 'logged in'),
(148, 24, 'user001', 'Outward', '2024-07-10 19:28:43', 'entered outward record'),
(147, 24, 'user001', 'Outward', '2024-07-10 19:28:13', 'entered outward record'),
(146, 24, 'user001', 'Outward', '2024-07-10 19:27:36', 'entered outward record'),
(145, 24, 'user001', 'Outward', '2024-07-10 19:26:08', 'entered outward record'),
(144, 24, 'user001', 'Outward', '2024-07-10 19:25:35', 'entered outward record'),
(143, 24, 'user001', 'Outward', '2024-07-10 19:22:59', 'entered outward record'),
(142, 24, 'user001', 'Process', '2024-07-10 19:15:50', 'entered process outward record'),
(141, 24, 'user001', 'Process', '2024-07-10 19:14:09', 'entered process inward record'),
(140, 24, 'user001', 'Process', '2024-07-10 19:13:19', 'entered process outward record'),
(139, 24, 'user001', 'Process', '2024-07-10 19:08:04', 'logged in'),
(138, 24, 'user001', 'Outward', '2024-07-10 17:43:55', 'entered outward record'),
(137, 24, 'user001', 'Process', '2024-07-10 17:43:03', 'entered process outward record'),
(136, 24, 'user001', 'Process', '2024-07-10 17:41:14', 'entered process inward record'),
(135, 24, 'user001', 'Inward', '2024-07-10 17:40:18', 'entered inward record'),
(134, 24, 'user001', 'Inward', '2024-07-10 17:39:18', 'logged in'),
(133, 24, 'user001', 'Process', '2024-07-10 16:20:19', 'logged in'),
(132, 24, 'user001', 'Inward', '2024-07-10 16:08:26', 'logged in');

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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inward_master`
--

INSERT INTO `inward_master` (`id`, `place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`, `lot_no`) VALUES
(36, 'asd', 'asdasd', 'Amchur Powder', 'asd', '234', '42', '234', '234', '234', '234', '234', 'Dipesh Patel', 'Dipesh Patel', '234', '2024-07-11', '234', '234', NULL),
(35, 'demo', 'demo', 'AjinoMoto (MSG)', 'demo', '200', '2000', '25', '2200', '2200', '2200', '2200', 'Dipesh Patel', 'Dipesh Patel', 'PURITY-99.49%', '2024-07-10', 'demo', 'demo', NULL),
(37, 'sdf', 'test user 0', 'Ajwain Seeds', 'sdff', '232', '1222', '221', '12311', '12311', '12311', '12311', 'Kaushal Patel', 'Kaushal Patel', 'asd', '2024-07-12', 'asd', 'asd', 'RM/2024/07/12/2'),
(38, 'asd', 'test user 0', 'AjinoMoto (MSG)', 'AS', '12', '123', '123', '123', '132', '123', '123', 'Dipesh Patel', 'Dipesh Patel', '123', '2024-07-12', '123', '123', 'RM/2024/07/12/3'),
(39, 'sf', 'test user 0', 'Amchur Powder', 'sa', '123', '123', '132', '21', '21', '21', '21', 'Kaushal Patel', 'Kaushal Patel', 'asd', '2024-07-12', '21we', 'safda', 'RM/2024/07/12/4'),
(40, 'sad', 'test user 1', 'Anardana Powder', 'lklkjkljlk', '890890', '0998908', '9898', '9897', '9878', '787', '878', 'Dipesh Patel', 'Rajesh Suthar', 'ghuihui', '2024-07-12', 'lkjkh', 'uihui', 'RM/2024/07/12/5'),
(41, '.k', 'test user 1', 'Chili Round Whole', ',mn', '09', '8908', '989', '798', '78', '786', '786', 'Rajesh Suthar', 'Rajesh Suthar', '97', '2024-07-12', '6760908', '97', 'RM/2024/07/12/6'),
(42, 'kjk', 'test user 1', 'Javantri (Mace) Pwd', 'hj', '786876', '8676', '768', '6876', '86', '87678', '686', 'Dipesh Patel', 'Dipesh Patel', '687', '2024-07-12', '8768', '67', 'RM/2024/07/12/7'),
(43, 'sdfsd', 'test user 0', 'Kalonji', 'sdf', '987', '9878', '7787', '786', '867', '67', '676', 'Kaushal Patel', 'Dipesh Patel', '786', '2024-07-12', '67878', '6786', 'RM/2024/07/12/8'),
(44, '1', '2', 'Citric Acid', '3', '4', '5', '6', '7', '8', '9', '0', 'Kaushal Patel', 'Kaushal Patel', 'e', '2024-07-13', 'q', 'w', 'RM/2024/07/13/9');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inward_master_v2`
--

INSERT INTO `inward_master_v2` (`id`, `place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `main_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`, `lot_no`) VALUES
(17, 'demo', 'demo', 'AjinoMoto (MSG)', 'demo', '200', '1000', '2000', '25', '2200', '2200', '2200', '2200', 'Dipesh Patel', 'Dipesh Patel', 'PURITY-99.49%', '2024-07-10', 'demo', 'demo', NULL),
(18, 'asd', 'asdasd', 'Amchur Powder', 'asd', '234', '42', '42', '234', '234', '234', '234', '234', 'Dipesh Patel', 'Dipesh Patel', '234', '2024-07-11', '234', '234', NULL),
(19, 'kjk', 'test user 1', 'Javantri (Mace) Pwd', 'hj', '786876', '8676', '8676', '768', '6876', '86', '87678', '686', 'Dipesh Patel', 'Dipesh Patel', '687', '2024-07-12', '8768', '67', 'RM/2024/07/12/7'),
(20, 'sdfsd', 'test user 0', 'Kalonji', 'sdf', '987', '6000', '9878', '7787', '786', '867', '67', '676', 'Kaushal Patel', 'Dipesh Patel', '786', '2024-07-12', '67878', '6786', 'RM/2024/07/12/8'),
(21, '1', '2', 'Citric Acid', '3', '4', '5', '5', '6', '7', '8', '9', '0', 'Kaushal Patel', 'Kaushal Patel', 'e', '2024-07-13', 'q', 'w', 'RM/2024/07/13/9');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outward_master`
--

INSERT INTO `outward_master` (`id`, `date`, `product`, `quality`, `buyer_name`, `vehicle_number`, `container_number`, `quantity_per_kg`, `supervisor_name`, `gate_person_name`, `remarks`, `place`, `bags_quantity`, `weighbridge_weight`, `invoice_bridge_weight`, `invoice`) VALUES
(6, '2024-07-11', 'AjinoMoto (MSG)6', 'asd', 'asd', 'asd', 'asd', '2', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL),
(5, '2024-07-11', 'AjinoMoto (MSG)6', 'asdasd', 'asdasd', 'asd', 'asd', '1', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL),
(4, '2024-07-10', 'AjinoMoto (MSG)', 'demo', 'demo', 'demo', 'demo', '100', 'demo', 'demo', 'demo', NULL, NULL, NULL, NULL, NULL),
(7, '2024-07-11', '', 'asd', 'asd', 'asd', 'asd', '2', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL),
(8, '2024-07-11', 'AjinoMoto (MSG)', 'asd', 'asd', 'asd', 'asd', '234', '324', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL),
(9, '2024-07-11', 'AjinoMoto (MSG)1', 'asd', 'asd', 'asd', 'asd', '2', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL),
(10, '2024-07-11', 'AjinoMoto (MSG)', '1', '2', '3', '4', '5', '6', '7', '8', NULL, NULL, NULL, NULL, NULL),
(11, '2024-07-14', 'Kalonji', '2', '4', '5', '6', '7', '8', '9', '==', '1', '3', '0', '-', '='),
(12, '2024-07-14', 'Kalonji', 'ss', 'ff', 'gg', 'hh', '44545', 'Binoy Prajapati', 'Meet Patel', '345345', 'aa', 'dd', 'dfgdfg345345', '345345', '345345'),
(13, '2024-07-14', 'Kalonji', 'asdasd', 'asd', 'asd', 'asd', '2345', 'Rajesh Suthar', 'Rajesh Suthar', '234', 'asdasd', 'asdasd', '234', '234', '234');

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
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_master`
--

INSERT INTO `process_master` (`id`, `place`, `process_name`, `foreign_buyer_name`, `product_name`, `weight_quality`, `total_kg`, `remarks`, `date`, `supplier_name`, `lot_no`) VALUES
(40, 'asd', 'asd', 'asd', 'Kalonji', 'asd', '', 'asdaswd', '2024-07-12', 'test user 0', 'RM/2024/07/12/8'),
(42, '', '', '', '', '', '', '', '2024-07-12', '', ''),
(43, '', '', '', '', '', '', '', '2024-07-12', '', ''),
(44, '', '', '', '', '', '', '', '2024-07-12', '', '');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_name_master`
--

DROP TABLE IF EXISTS `supplier_name_master`;
CREATE TABLE IF NOT EXISTS `supplier_name_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_name_master`
--

INSERT INTO `supplier_name_master` (`id`, `name`) VALUES
(1, 'test user 0'),
(2, 'test user 1');

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
