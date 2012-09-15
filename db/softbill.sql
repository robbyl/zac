-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2012 at 05:25 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `softbill`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_no` varchar(255) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`acc_id`),
  UNIQUE KEY `acc_no` (`acc_no`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_no`, `cust_id`, `credit`, `debit`, `balance`) VALUES
(1, 'FA3BF035C9', 2, 0.00, 0.00, 0.00),
(2, '0C5BE083DD', 4, 0.00, 0.00, 0.00),
(3, '362B770FF3', 5, 0.00, 0.00, 0.00),
(4, '362D03C319', 6, 0.00, 0.00, 0.00),
(5, '362E25752E', 7, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
CREATE TABLE IF NOT EXISTS `applicant` (
  `appnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `appnt_type_id` int(11) NOT NULL,
  `appnt_fullname` varchar(255) NOT NULL,
  `occupants` int(11) NOT NULL,
  `appnt_tel` varchar(255) NOT NULL,
  `appnt_post_addr` varchar(255) NOT NULL,
  `appnt_phy_addr` varchar(255) NOT NULL,
  `block_no` varchar(255) NOT NULL,
  `plot_no` varchar(255) NOT NULL,
  `living_area` varchar(255) NOT NULL,
  `living_town` varchar(255) NOT NULL,
  `ba_id` int(11) NOT NULL,
  PRIMARY KEY (`appnt_id`),
  KEY `appnt_type_id` (`appnt_type_id`),
  KEY `ba_id` (`ba_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`appnt_id`, `appnt_type_id`, `appnt_fullname`, `occupants`, `appnt_tel`, `appnt_post_addr`, `appnt_phy_addr`, `block_no`, `plot_no`, `living_area`, `living_town`, `ba_id`) VALUES
(2, 1, 'Mkala Kitundu', 9, '0713 789 564', '6789 Dar', 'Ubungo', 'MSW', 'UB/MSW/89', 'Ubungo', 'Dar es salaam', 1),
(3, 1, 'Robbin, Inc', 8, '0777 388 983', '545 Dar', 'Ubungo', 'MSW', 'UB/MSW/67', 'Ubungo', 'Dar es salaam', 1),
(4, 1, 'Mwajuma Shaaban', 6, '0713 448 981', '9883 Dar', 'Ubungo', 'MSW', 'UB/MSW/34', 'Ubungo', 'Dar es salaam', 3),
(5, 2, 'University of Dar es salaam (UDSM)', 15765, '22 453 233', '453 Dar', 'Ubungo', 'MSW', 'UB/MSW/2', 'Ubungo', 'Dar es salaam', 2),
(6, 3, 'Chechelu Mnyagatwa', 39, '0713 332 112', '789 Dar', 'Magomeni', 'MGM', 'MGM/USA/393', 'Magomeni', 'Dar es salaam', 2),
(7, 4, 'Chem & Cotex Ltd.', 1323, '22 545 322', '63353 Dar', 'Mwenge', 'MWN', 'MWN/MIK/892', 'Mwenge', 'Dar es salaam', 3),
(8, 1, 'Warda Abdallah Said', 8, '0717 567 890', '672 Dar', 'Malapa', 'ILL/89', 'ILL/UOY/899', 'Buguruni', 'Dar es salaam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `appln_id` int(11) NOT NULL AUTO_INCREMENT,
  `appln_date` date NOT NULL,
  `appln_type` varchar(255) NOT NULL,
  `surveyed_date` date NOT NULL,
  `engeneer_appr` enum('Yes','No') NOT NULL,
  `approved_date` date NOT NULL,
  `inspected_by` varchar(255) NOT NULL,
  `premise_nature` enum('Residential','Institution','Business') NOT NULL,
  `service_nature_id` int(11) NOT NULL,
  `appnt_id` int(11) NOT NULL,
  PRIMARY KEY (`appln_id`),
  KEY `service_nature_id` (`service_nature_id`),
  KEY `appnt_id` (`appnt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appln_id`, `appln_date`, `appln_type`, `surveyed_date`, `engeneer_appr`, `approved_date`, `inspected_by`, `premise_nature`, `service_nature_id`, `appnt_id`) VALUES
(2, '2012-08-07', 'Clean water', '2012-08-09', 'Yes', '2012-08-17', 'Mkumbo', 'Residential', 3, 2),
(3, '2012-08-19', 'Clean water', '2012-08-01', 'Yes', '2012-07-03', 'Mkumbo', 'Residential', 3, 3),
(4, '2012-08-21', 'Clean water', '2012-06-18', 'Yes', '2012-06-28', 'Mkumbo', 'Residential', 3, 4),
(5, '2012-08-21', 'Clean water', '2012-04-17', 'Yes', '2012-05-14', 'Mkumbo', 'Institution', 1, 5),
(6, '2012-08-21', 'Clean water', '2012-06-20', 'Yes', '2012-06-11', 'Juma Shabaani', 'Business', 5, 6),
(7, '2012-08-21', 'Sewer', '2011-10-17', 'Yes', '2011-11-24', 'Juma Shabaani', 'Residential', 6, 7),
(8, '2012-08-29', 'Clean water', '2012-08-21', 'Yes', '2012-08-28', 'Juma Shabaani', 'Residential', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `appnt_type`
--

DROP TABLE IF EXISTS `appnt_type`;
CREATE TABLE IF NOT EXISTS `appnt_type` (
  `appnt_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `appnt_types` varchar(255) NOT NULL,
  PRIMARY KEY (`appnt_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `appnt_type`
--

INSERT INTO `appnt_type` (`appnt_type_id`, `appnt_types`) VALUES
(1, 'Domestic'),
(2, 'Institution'),
(3, 'Commercial'),
(4, 'Industrial'),
(5, 'Public stand'),
(6, 'Kiosk');

-- --------------------------------------------------------

--
-- Table structure for table `billing_area`
--

DROP TABLE IF EXISTS `billing_area`;
CREATE TABLE IF NOT EXISTS `billing_area` (
  `ba_id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_areas` varchar(255) NOT NULL,
  PRIMARY KEY (`ba_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `billing_area`
--

INSERT INTO `billing_area` (`ba_id`, `billing_areas`) VALUES
(1, 'Migongo'),
(2, 'Mkuti'),
(3, 'Nyasa');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_date` datetime NOT NULL,
  `met_id` int(11) NOT NULL,
  `appln_id` int(11) NOT NULL,
  `pay_center` int(11) NOT NULL,
  `ba_id` int(11) NOT NULL,
  `premise_status` varchar(255) NOT NULL,
  `cust_status` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `appnt_id` int(11) NOT NULL,
  PRIMARY KEY (`cust_id`),
  KEY `met_id` (`met_id`),
  KEY `appln_id` (`appln_id`),
  KEY `pay_center` (`pay_center`),
  KEY `added_by` (`added_by`),
  KEY `appnt_id` (`appnt_id`),
  KEY `ba_id` (`ba_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `added_date`, `met_id`, `appln_id`, `pay_center`, `ba_id`, `premise_status`, `cust_status`, `added_by`, `appnt_id`) VALUES
(2, '2012-08-18 17:16:30', 1, 2, 1, 2, 'Metered', '', 1, 2),
(4, '2012-08-19 13:53:49', 2, 3, 1, 1, 'Metered', '', 1, 3),
(5, '2012-08-21 13:28:07', 6, 4, 1, 3, 'Metered', '', 1, 4),
(6, '2012-08-21 13:28:32', 5, 5, 1, 3, 'Metered', '', 1, 5),
(7, '2012-08-21 13:28:50', 3, 6, 1, 1, 'Metered', '', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_no` varchar(255) NOT NULL,
  `invoicing_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `cust_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`inv_id`),
  KEY `cust_id` (`cust_id`),
  KEY `acc_id` (`acc_id`),
  KEY `trans_id` (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`inv_id`, `inv_no`, `invoicing_date`, `created_date`, `cust_id`, `acc_id`, `trans_id`, `cost`) VALUES
(27, '89232AS', '2012-06-22', '2012-09-03 20:51:52', 2, 1, 24, 3600.00),
(28, '89232AS', '2012-06-22', '2012-09-03 20:51:52', 4, 2, 25, 4400.00),
(29, '89232AS', '2012-06-22', '2012-09-03 20:51:52', 5, 3, 26, 5400.00),
(30, '89232AS', '2012-06-22', '2012-09-03 20:51:52', 6, 4, 27, 5700.00),
(31, '89232AS', '2012-06-22', '2012-09-03 20:51:52', 7, 5, 28, 17480.00);

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

DROP TABLE IF EXISTS `meter`;
CREATE TABLE IF NOT EXISTS `meter` (
  `met_id` int(11) NOT NULL AUTO_INCREMENT,
  `met_number` varchar(255) NOT NULL,
  `met_type` enum('Tameng','Metscant') NOT NULL,
  `met_status_id` int(11) NOT NULL,
  `met_size` varchar(255) NOT NULL,
  `no_digits` int(11) NOT NULL,
  `initial_reading` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `availability` varchar(255) NOT NULL DEFAULT 'AVAILABLE',
  `remarks` text NOT NULL,
  PRIMARY KEY (`met_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`met_id`, `met_number`, `met_type`, `met_status_id`, `met_size`, `no_digits`, `initial_reading`, `added_date`, `availability`, `remarks`) VALUES
(1, '32422', 'Metscant', 0, '0', 8, 0, '2012-08-16', 'ISSUED', 'some'),
(2, '88yyy090', 'Metscant', 0, '0', 9, 0, '2012-08-16', 'ISSUED', 'k'),
(3, 'OD-20C899', 'Metscant', 0, '1/3', 10, 0, '2012-08-21', 'ISSUED', ''),
(4, 'OC-20A490', 'Tameng', 0, '0', 10, 0, '2012-08-21', 'AVAILABLE', ''),
(5, 'OA-600090', 'Tameng', 1, '0', 10, 0, '2012-08-21', 'ISSUED', ''),
(6, 'OC-205W90', 'Metscant', 1, '0', 10, 30, '2012-08-21', 'ISSUED', '');

-- --------------------------------------------------------

--
-- Table structure for table `meter_reading`
--

DROP TABLE IF EXISTS `meter_reading`;
CREATE TABLE IF NOT EXISTS `meter_reading` (
  `mred_id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_date` date NOT NULL,
  `reading_date` date NOT NULL,
  `entered_date` datetime NOT NULL,
  `reading` int(11) NOT NULL,
  `consumption` int(11) NOT NULL,
  `met_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`mred_id`),
  KEY `met_id` (`met_id`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=571 ;

--
-- Dumping data for table `meter_reading`
--

INSERT INTO `meter_reading` (`mred_id`, `billing_date`, `reading_date`, `entered_date`, `reading`, `consumption`, `met_id`, `cust_id`, `cost`, `remarks`) VALUES
(561, '2012-05-22', '2012-08-22', '2012-08-22 12:54:22', 28, 28, 1, 2, 0.00, ''),
(562, '2012-05-22', '2012-08-22', '2012-08-22 12:54:23', 33, 33, 2, 4, 0.00, ''),
(563, '2012-05-22', '2012-08-22', '2012-08-22 12:54:23', 51, 21, 6, 5, 0.00, ''),
(564, '2012-05-22', '2012-08-22', '2012-08-22 12:54:23', 20, 20, 5, 6, 0.00, ''),
(565, '2012-05-22', '2012-08-22', '2012-08-22 12:54:23', 28, 28, 3, 7, 0.00, ''),
(566, '2012-06-22', '2012-07-22', '2012-08-22 13:02:18', 46, 18, 1, 2, 0.00, ''),
(567, '2012-06-22', '2012-07-22', '2012-08-22 13:02:18', 55, 22, 2, 4, 0.00, ''),
(568, '2012-06-22', '2012-07-22', '2012-08-22 13:02:18', 78, 27, 6, 5, 0.00, ''),
(569, '2012-06-22', '2012-07-22', '2012-08-22 13:02:18', 39, 19, 5, 6, 0.00, ''),
(570, '2012-06-22', '2012-07-22', '2012-08-22 13:02:18', 66, 38, 3, 7, 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `pay_center`
--

DROP TABLE IF EXISTS `pay_center`;
CREATE TABLE IF NOT EXISTS `pay_center` (
  `pac_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_center` varchar(255) NOT NULL,
  PRIMARY KEY (`pac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pay_center`
--

INSERT INTO `pay_center` (`pac_id`, `pay_center`) VALUES
(1, 'Masasi');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `tran_id` int(11) NOT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `tran_id` (`tran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_nature`
--

DROP TABLE IF EXISTS `service_nature`;
CREATE TABLE IF NOT EXISTS `service_nature` (
  `service_nature_id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `appnt_type_id` int(11) NOT NULL,
  PRIMARY KEY (`service_nature_id`),
  KEY `appnt_type_id` (`appnt_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `service_nature`
--

INSERT INTO `service_nature` (`service_nature_id`, `service`, `appnt_type_id`) VALUES
(1, 'Institution', 2),
(2, 'Domestic low', 1),
(3, 'Domestic medium', 1),
(4, 'Domestic high', 1),
(5, 'Commercial', 3),
(6, 'Industrial', 4),
(7, 'PSP', 5),
(8, 'Kiosk', 6);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `set_id` int(10) NOT NULL AUTO_INCREMENT,
  `aut_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `parking_fee` decimal(10,2) NOT NULL,
  `landing_fee` decimal(10,2) NOT NULL,
  `page_size` varchar(255) NOT NULL,
  `page_orientation` varchar(255) NOT NULL,
  `terms_conds` text NOT NULL,
  PRIMARY KEY (`set_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_id`, `aut_name`, `address`, `phone`, `fax`, `email`, `url`, `logo`, `parking_fee`, `landing_fee`, `page_size`, `page_orientation`, `terms_conds`) VALUES
(1, 'MBINGA URBAN WATER AUTHORITY', 'P.o.Box 245 Mbinga Ruvuma', '+25525254545', '+255-3-321065', 'info@mbuwsa.com', 'http://www.mbuwsa.com', 'authority_logo.png', 0.00, 0.00, '', 'portrait', '');

-- --------------------------------------------------------

--
-- Table structure for table `sewer_tariff`
--

DROP TABLE IF EXISTS `sewer_tariff`;
CREATE TABLE IF NOT EXISTS `sewer_tariff` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_nature_id` int(11) NOT NULL,
  `s_flat_rate` decimal(10,2) NOT NULL,
  KEY `st_id` (`st_id`),
  KEY `service_nature_id` (`service_nature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sewer_tariff`
--

INSERT INTO `sewer_tariff` (`st_id`, `service_nature_id`, `s_flat_rate`) VALUES
(1, 1, 660.00),
(2, 2, 659.97),
(3, 3, 660.00),
(4, 4, 660.00),
(5, 5, 660.00),
(6, 6, 659.99),
(7, 7, 660.00),
(8, 8, 660.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` datetime NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `trans_date`, `description`) VALUES
(24, '2012-09-03 20:51:52', 'Water Billing'),
(25, '2012-09-03 20:51:52', 'Water Billing'),
(26, '2012-09-03 20:51:52', 'Water Billing'),
(27, '2012-09-03 20:51:52', 'Water Billing'),
(28, '2012-09-03 20:51:52', 'Water Billing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_full_name`, `email`, `username`, `password`, `role`, `status`) VALUES
(1, 'Admin Admin', 'admin@localhost', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ROOT', 'ACTIVE'),
(2, 'user1', 'user1@localhost.com', 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 'ROOT', 'BLOCKED'),
(3, 'user2', 'user2@localhost.com', 'user2', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', 'ROOT', 'BLOCKED'),
(7, 'user30', 'user3@localhost.com', 'user3', 'bff5c0d86f525bb86ade3e19bbe2cf8a23cbddfc', 'ROOT', 'ACTIVE'),
(8, 'user4', 'user4@localhost.com', 'user4', '06e6eef6adf2e5f54ea6c43c376d6d36605f810e', 'ROOT', 'BLOCKED'),
(9, 'user5', 'user5@localhost.com', 'user5', '7d112681b8dd80723871a87ff506286613fa9cf6', 'ROOT', 'BLOCKED'),
(10, 'user10', 'user10@localhost.com', 'user10', 'd089da97b9e447158a0466d15fe291f2c43b982e', 'ROOT', 'ACTIVE'),
(11, 'demo', 'demo@localhost.com', 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'ROOT', 'BLOCKED'),
(12, 'user11', 'user11@localhost.com', 'user11', '3d5cbfed48ce23d2f0dc0a0baa3ec2ee93867b2b', 'ROOT', 'ACTIVE'),
(13, 'user12', 'user12@localhost.com', 'user12', 'e45ed40f34005e1636649ab18bbd16ada02cb251', 'ROOT', 'BLOCKED'),
(14, 'user13', 'user13@localhost.com', 'user13', 'd6fa2beb1c302491b40f447d8784fc0bcce1ca8e', 'ROOT', 'ACTIVE'),
(15, 'cashier', 'cashier@localhost', 'cashier', 'a5b42198e3fb950b5ab0d0067cbe077a41da1245', 'CASHIER', 'BLOCKED'),
(16, 'gffhg', 'info@zanzibar.com', 'robbyl', '3421ecde2a5de6543b48460b867cf323b018bc22', 'CASHIER', 'BLOCKED');

-- --------------------------------------------------------

--
-- Table structure for table `water_tariff`
--

DROP TABLE IF EXISTS `water_tariff`;
CREATE TABLE IF NOT EXISTS `water_tariff` (
  `wt_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_nature_id` int(11) NOT NULL,
  `wt_from` int(11) NOT NULL,
  `wt_to` int(11) NOT NULL,
  `wt_rate` decimal(10,2) NOT NULL,
  `wt_flat_rate` decimal(10,2) NOT NULL,
  KEY `wt_id` (`wt_id`),
  KEY `service_nature_id` (`service_nature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `water_tariff`
--

INSERT INTO `water_tariff` (`wt_id`, `service_nature_id`, `wt_from`, `wt_to`, `wt_rate`, `wt_flat_rate`) VALUES
(1, 1, 0, 60, 300.00, 8000.00),
(2, 2, 0, 30, 200.00, 7500.00),
(3, 3, 0, 40, 200.00, 6000.00),
(4, 4, 0, 20, 200.00, 4000.00),
(5, 5, 0, 10, 460.00, 14400.00),
(6, 6, 0, 50, 630.00, 1399.95),
(7, 7, 0, 80, 340.00, 8000.00),
(8, 8, 0, 70, 400.00, 7000.00);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`appnt_type_id`) REFERENCES `appnt_type` (`appnt_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_ibfk_2` FOREIGN KEY (`ba_id`) REFERENCES `billing_area` (`ba_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`service_nature_id`) REFERENCES `service_nature` (`service_nature_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`appnt_id`) REFERENCES `applicant` (`appnt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`met_id`) REFERENCES `meter` (`met_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`appln_id`) REFERENCES `application` (`appln_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`pay_center`) REFERENCES `pay_center` (`pac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_5` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_6` FOREIGN KEY (`appnt_id`) REFERENCES `applicant` (`appnt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_7` FOREIGN KEY (`ba_id`) REFERENCES `billing_area` (`ba_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`trans_id`) REFERENCES `transaction` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meter_reading`
--
ALTER TABLE `meter_reading`
  ADD CONSTRAINT `meter_reading_ibfk_1` FOREIGN KEY (`met_id`) REFERENCES `meter` (`met_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meter_reading_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`tran_id`) REFERENCES `transaction` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_nature`
--
ALTER TABLE `service_nature`
  ADD CONSTRAINT `service_nature_ibfk_1` FOREIGN KEY (`appnt_type_id`) REFERENCES `appnt_type` (`appnt_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sewer_tariff`
--
ALTER TABLE `sewer_tariff`
  ADD CONSTRAINT `sewer_tariff_ibfk_1` FOREIGN KEY (`service_nature_id`) REFERENCES `service_nature` (`service_nature_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `water_tariff`
--
ALTER TABLE `water_tariff`
  ADD CONSTRAINT `water_tariff_ibfk_1` FOREIGN KEY (`service_nature_id`) REFERENCES `service_nature` (`service_nature_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
