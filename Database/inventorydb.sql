-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2024 at 01:01 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

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
(24, '', 'user001', 'user001', '2024-07-09 15:47:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
