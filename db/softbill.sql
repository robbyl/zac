-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2012 at 09:14 AM
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

CREATE TABLE IF NOT EXISTS `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_no` varchar(255) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `credit` decimal(15,2) NOT NULL,
  `debit` decimal(15,2) NOT NULL,
  `balance` decimal(15,2) NOT NULL,
  PRIMARY KEY (`acc_id`),
  UNIQUE KEY `acc_no` (`acc_no`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_no`, `cust_id`, `credit`, `debit`, `balance`) VALUES
(9, '6DAF003A67', 14, 0.00, 0.00, 0.00),
(10, '6DB2F8E661', 15, 0.00, 0.00, 0.00),
(11, '6E28E0BA50', 16, 0.00, 0.00, 0.00),
(12, '706E47B7B9', 17, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `aging_analysis`
--

CREATE TABLE IF NOT EXISTS `aging_analysis` (
  `aging_id` int(11) NOT NULL AUTO_INCREMENT,
  `aging_date` date NOT NULL,
  `inv_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `aging_debit` decimal(15,2) NOT NULL,
  PRIMARY KEY (`aging_id`),
  KEY `cust_id` (`cust_id`),
  KEY `inv_id` (`inv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `aging_analysis`
--

INSERT INTO `aging_analysis` (`aging_id`, `aging_date`, `inv_id`, `cust_id`, `aging_debit`) VALUES
(105, '2012-01-01', 105, 14, 659.99),
(106, '2012-01-01', 106, 15, 8280.00),
(107, '2012-01-01', 107, 16, 6600.00),
(108, '2012-01-01', 108, 17, 6000.00),
(110, '2012-02-01', 109, 14, 1319.98),
(111, '2012-02-01', 110, 15, 16560.00),
(112, '2012-02-01', 111, 16, 14100.00),
(113, '2012-02-01', 112, 17, 12000.00),
(114, '2012-03-01', 113, 14, 1979.97),
(115, '2012-03-01', 114, 15, 28520.00),
(116, '2012-03-01', 115, 16, 20700.00),
(117, '2012-03-01', 116, 17, 18000.00),
(118, '2012-04-01', 117, 14, 2639.96),
(119, '2012-04-01', 118, 15, 42780.00),
(120, '2012-04-01', 119, 16, 35100.00),
(121, '2012-04-01', 120, 17, 24000.00),
(122, '2012-05-01', 121, 14, 3299.95),
(123, '2012-05-01', 122, 15, 46920.00),
(124, '2012-05-01', 123, 16, 37800.00),
(125, '2012-05-01', 124, 17, 30000.00),
(126, '2012-06-01', 125, 14, 3959.94),
(127, '2012-06-01', 126, 15, 46920.00),
(128, '2012-06-01', 127, 16, 37800.00),
(129, '2012-06-01', 128, 17, 36000.00);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(8, 1, 'Warda Abdallah Said', 8, '0717 567 890', '672 Dar', 'Malapa', 'ILL/89', 'ILL/UOY/899', 'Buguruni', 'Dar es salaam', 1),
(9, 1, 'Khadija Hamis', 4, '0713 576 872', '736583 Dar', 'Ubungo', 'UB/MSW', 'UB/MSW/893U', 'Ubungo Msewe', 'Dar es Salaam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `appln_id` int(11) NOT NULL AUTO_INCREMENT,
  `appln_no` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appln_id`, `appln_no`, `appln_date`, `appln_type`, `surveyed_date`, `engeneer_appr`, `approved_date`, `inspected_by`, `premise_nature`, `service_nature_id`, `appnt_id`) VALUES
(2, 0, '2012-08-07', 'Clean water', '2012-08-09', 'Yes', '2012-08-17', 'Mkumbo', 'Residential', 2, 2),
(3, 0, '2012-08-19', 'Clean water', '2012-08-01', 'Yes', '2012-07-03', 'Mkumbo', 'Residential', 3, 3),
(4, 0, '2012-08-21', 'Clean water', '2012-06-18', 'Yes', '2012-06-28', 'Mkumbo', 'Residential', 3, 4),
(5, 0, '2012-08-21', 'Clean water', '2012-04-17', 'Yes', '2012-05-14', 'Mkumbo', 'Institution', 1, 5),
(6, 0, '2012-08-21', 'Clean water', '2012-06-20', 'Yes', '2012-06-11', 'Juma Shabaani', 'Business', 5, 6),
(7, 0, '2012-08-21', 'Sewer', '2011-10-17', 'Yes', '2011-11-24', 'Juma Shabaani', 'Residential', 6, 7),
(8, 0, '2012-08-29', 'Clean water', '2012-08-21', 'Yes', '2012-08-28', 'Juma Shabaani', 'Residential', 2, 8),
(9, 0, '2012-09-27', 'Clean water', '2012-09-11', 'Yes', '2012-09-20', 'Mashaka Kitundu', 'Residential', 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `appnt_payment`
--

CREATE TABLE IF NOT EXISTS `appnt_payment` (
  `appntp_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `appnt_id` int(11) NOT NULL,
  KEY `appntp_id` (`appntp_id`),
  KEY `rec_id` (`rec_id`),
  KEY `trans_id` (`trans_id`),
  KEY `appnt_id` (`appnt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `appnt_payment`
--

INSERT INTO `appnt_payment` (`appntp_id`, `rec_id`, `trans_id`, `appnt_id`) VALUES
(1, 1, 1651, 9),
(2, 2, 1652, 7),
(3, 3, 1653, 5);

-- --------------------------------------------------------

--
-- Table structure for table `appnt_type`
--

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
-- Table structure for table `cheque`
--

CREATE TABLE IF NOT EXISTS `cheque` (
  `cheq_id` int(11) NOT NULL AUTO_INCREMENT,
  `cheq_no` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `rec_id` int(11) NOT NULL,
  PRIMARY KEY (`cheq_id`),
  KEY `rec_id` (`rec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`cheq_id`, `cheq_no`, `bank`, `rec_id`) VALUES
(1, 'Q89898E', 'CRDB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_date` datetime NOT NULL,
  `appln_id` int(11) NOT NULL,
  `pay_center` int(11) NOT NULL,
  `ba_id` int(11) NOT NULL,
  `premise_status` varchar(255) NOT NULL,
  `cust_status` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `appnt_id` int(11) NOT NULL,
  PRIMARY KEY (`cust_id`),
  KEY `appln_id` (`appln_id`),
  KEY `pay_center` (`pay_center`),
  KEY `added_by` (`added_by`),
  KEY `appnt_id` (`appnt_id`),
  KEY `ba_id` (`ba_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `added_date`, `appln_id`, `pay_center`, `ba_id`, `premise_status`, `cust_status`, `added_by`, `appnt_id`) VALUES
(14, '2012-09-29 14:26:39', 7, 2, 3, 'Un metered', 'Connected', 1, 7),
(15, '2012-09-29 14:27:43', 9, 2, 1, 'Metered', 'Connected', 1, 9),
(16, '2012-09-29 14:59:10', 5, 2, 2, 'Metered', 'Connected', 1, 5),
(17, '2012-09-29 17:34:12', 3, 3, 1, 'Un metered', 'Connected', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cust_payment`
--

CREATE TABLE IF NOT EXISTS `cust_payment` (
  `custp_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  PRIMARY KEY (`custp_id`),
  KEY `rec_id` (`rec_id`),
  KEY `cust_id` (`cust_id`),
  KEY `trans_id` (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_no` varchar(255) NOT NULL,
  `inv_type` varchar(255) NOT NULL,
  `invoicing_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `cust_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `water_cost` decimal(15,2) NOT NULL,
  `sewer_cost` decimal(15,2) NOT NULL,
  `service_charge` decimal(15,2) NOT NULL,
  PRIMARY KEY (`inv_id`),
  KEY `cust_id` (`cust_id`),
  KEY `acc_id` (`acc_id`),
  KEY `trans_id` (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`inv_id`, `inv_no`, `inv_type`, `invoicing_date`, `created_date`, `cust_id`, `acc_id`, `trans_id`, `water_cost`, `sewer_cost`, `service_charge`) VALUES
(105, '1', 'Actual', '2012-01-01', '2012-09-30 12:51:36', 14, 9, 1760, 0.00, 659.99, 0.00),
(106, '2', 'Actual', '2012-01-01', '2012-09-30 12:51:37', 15, 10, 1761, 8280.00, 0.00, 600.00),
(107, '3', 'Actual', '2012-01-01', '2012-09-30 12:51:37', 16, 11, 1762, 6600.00, 0.00, 300.00),
(108, '4', 'Estimate', '2012-01-01', '2012-09-30 12:51:37', 17, 12, 1763, 6000.00, 0.00, 600.00),
(109, '5', 'Actual', '2012-02-01', '2012-09-30 13:25:14', 14, 9, 1764, 0.00, 659.99, 0.00),
(110, '6', 'Actual', '2012-02-01', '2012-09-30 13:25:14', 15, 10, 1765, 8280.00, 0.00, 600.00),
(111, '7', 'Actual', '2012-02-01', '2012-09-30 13:25:14', 16, 11, 1766, 7500.00, 0.00, 300.00),
(112, '8', 'Estimate', '2012-02-01', '2012-09-30 13:25:14', 17, 12, 1767, 6000.00, 0.00, 600.00),
(113, '9', 'Actual', '2012-03-01', '2012-10-01 00:51:41', 14, 9, 1768, 0.00, 659.99, 0.00),
(114, '10', 'Actual', '2012-03-01', '2012-10-01 00:51:41', 15, 10, 1769, 11960.00, 0.00, 600.00),
(115, '11', 'Actual', '2012-03-01', '2012-10-01 00:51:42', 16, 11, 1770, 6600.00, 0.00, 300.00),
(116, '12', 'Estimate', '2012-03-01', '2012-10-01 00:51:42', 17, 12, 1771, 6000.00, 0.00, 600.00),
(117, '10', 'Actual', '2012-04-01', '2012-10-01 00:54:21', 14, 9, 1772, 0.00, 659.99, 0.00),
(118, '11', 'Actual', '2012-04-01', '2012-10-01 00:54:21', 15, 10, 1773, 14260.00, 0.00, 600.00),
(119, '12', 'Actual', '2012-04-01', '2012-10-01 00:54:21', 16, 11, 1774, 14400.00, 0.00, 300.00),
(120, '13', 'Estimate', '2012-04-01', '2012-10-01 00:54:21', 17, 12, 1775, 6000.00, 0.00, 600.00),
(121, '10', 'Actual', '2012-05-01', '2012-10-01 00:56:02', 14, 9, 1776, 0.00, 659.99, 0.00),
(122, '11', 'Actual', '2012-05-01', '2012-10-01 00:56:02', 15, 10, 1777, 4140.00, 0.00, 600.00),
(123, '12', 'Actual', '2012-05-01', '2012-10-01 00:56:02', 16, 11, 1778, 2700.00, 0.00, 300.00),
(124, '13', 'Estimate', '2012-05-01', '2012-10-01 00:56:02', 17, 12, 1779, 6000.00, 0.00, 600.00),
(125, '10', 'Actual', '2012-06-01', '2012-10-01 00:58:03', 14, 9, 1780, 0.00, 659.99, 0.00),
(126, '11', 'Actual', '2012-06-01', '2012-10-01 00:58:03', 15, 10, 1781, 0.00, 0.00, 600.00),
(127, '12', 'Actual', '2012-06-01', '2012-10-01 00:58:04', 16, 11, 1782, 0.00, 0.00, 300.00),
(128, '13', 'Estimate', '2012-06-01', '2012-10-01 00:58:04', 17, 12, 1783, 6000.00, 0.00, 600.00);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_reading`
--

CREATE TABLE IF NOT EXISTS `invoice_reading` (
  `inv_read_id` int(11) NOT NULL AUTO_INCREMENT,
  `mred_id` int(11) NOT NULL,
  `inv_id` int(11) NOT NULL,
  PRIMARY KEY (`inv_read_id`),
  KEY `mred_id` (`mred_id`),
  KEY `inv_id` (`inv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `invoice_reading`
--

INSERT INTO `invoice_reading` (`inv_read_id`, `mred_id`, `inv_id`) VALUES
(9, 609, 106),
(10, 610, 107),
(11, 611, 110),
(12, 612, 111),
(13, 613, 114),
(14, 614, 115),
(15, 615, 118),
(16, 616, 119),
(17, 617, 122),
(18, 618, 123),
(19, 619, 126),
(20, 620, 127);

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

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
(1, '32422', 'Metscant', 0, '0', 8, 0, '2012-08-16', 'AVAILABLE', 'some'),
(2, '88yyy090', 'Metscant', 0, '0', 9, 0, '2012-08-16', 'AVAILABLE', 'k'),
(3, 'OD-20C899', 'Metscant', 0, '1/3', 10, 0, '2012-08-21', 'AVAILABLE', ''),
(4, 'OC-20A490', 'Tameng', 0, '0', 10, 0, '2012-08-21', 'ISSUED', ''),
(5, 'OA-600090', 'Tameng', 1, '0', 10, 0, '2012-08-21', 'AVAILABLE', ''),
(6, 'OC-205W90', 'Metscant', 1, '0', 10, 30, '2012-08-21', 'ISSUED', '');

-- --------------------------------------------------------

--
-- Table structure for table `meter_customer`
--

CREATE TABLE IF NOT EXISTS `meter_customer` (
  `mecu_id` int(11) NOT NULL AUTO_INCREMENT,
  `met_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  PRIMARY KEY (`mecu_id`),
  KEY `met_id` (`met_id`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `meter_customer`
--

INSERT INTO `meter_customer` (`mecu_id`, `met_id`, `cust_id`) VALUES
(4, 6, 15),
(5, 4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `meter_reading`
--

CREATE TABLE IF NOT EXISTS `meter_reading` (
  `mred_id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_date` date NOT NULL,
  `reading_date` date NOT NULL,
  `entered_date` datetime NOT NULL,
  `reading` int(11) NOT NULL,
  `consumption` int(11) NOT NULL,
  `met_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`mred_id`),
  KEY `met_id` (`met_id`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=621 ;

--
-- Dumping data for table `meter_reading`
--

INSERT INTO `meter_reading` (`mred_id`, `billing_date`, `reading_date`, `entered_date`, `reading`, `consumption`, `met_id`, `cust_id`, `remarks`) VALUES
(609, '2012-01-01', '2012-02-01', '2012-09-30 12:36:37', 66, 36, 6, 15, ''),
(610, '2012-01-01', '2012-02-01', '2012-09-30 12:36:37', 22, 22, 4, 16, ''),
(611, '2012-02-01', '2012-03-01', '2012-09-30 13:19:05', 102, 36, 6, 15, ''),
(612, '2012-02-01', '2012-03-01', '2012-09-30 13:19:05', 47, 25, 4, 16, ''),
(613, '2012-03-01', '2011-04-01', '2012-10-01 00:51:14', 154, 52, 6, 15, ''),
(614, '2012-03-01', '2011-04-01', '2012-10-01 00:51:14', 69, 22, 4, 16, ''),
(615, '2012-04-01', '2012-05-01', '2012-10-01 00:54:06', 216, 62, 6, 15, ''),
(616, '2012-04-01', '2012-05-01', '2012-10-01 00:54:06', 117, 48, 4, 16, ''),
(617, '2012-05-01', '2012-06-01', '2012-10-01 00:55:49', 234, 18, 6, 15, ''),
(618, '2012-05-01', '2012-06-01', '2012-10-01 00:55:49', 126, 9, 4, 16, ''),
(619, '2012-06-01', '2012-07-01', '2012-10-01 00:57:51', 234, 0, 6, 15, ''),
(620, '2012-06-01', '2012-07-01', '2012-10-01 00:57:51', 126, 0, 4, 16, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
  `paytype_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `amount_in_words` varchar(500) NOT NULL,
  PRIMARY KEY (`paytype_id`),
  KEY `paytype_id` (`paytype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pay_center`
--

CREATE TABLE IF NOT EXISTS `pay_center` (
  `pac_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_center` varchar(255) NOT NULL,
  PRIMARY KEY (`pac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pay_center`
--

INSERT INTO `pay_center` (`pac_id`, `pay_center`) VALUES
(1, 'Masasi'),
(2, 'Ubungo'),
(3, 'Kimara');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `tran_id` int(11) NOT NULL,
  `payed_amount` decimal(15,2) NOT NULL,
  `amount_in_words` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `tran_id` (`tran_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`rec_id`, `tran_id`, `payed_amount`, `amount_in_words`, `user_id`) VALUES
(1, 1651, 7500.00, 'Seven thousand and five hundred shillings only', 1),
(2, 1652, 8000.00, 'Eight thousands', 1),
(3, 1653, 9000.00, 'Nine thousands', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_nature`
--

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

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` datetime NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1784 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `trans_date`, `description`) VALUES
(1651, '2012-09-27 18:01:43', 'Application fee'),
(1652, '2012-09-27 18:20:23', 'Application fee'),
(1653, '2012-09-29 14:58:39', 'Application fee'),
(1760, '2012-09-30 12:51:36', 'Sewer Billing'),
(1761, '2012-09-30 12:51:37', 'Water Billing'),
(1762, '2012-09-30 12:51:37', 'Water Billing'),
(1763, '2012-09-30 12:51:37', 'Water Billing'),
(1764, '2012-09-30 13:25:14', 'Sewer Billing'),
(1765, '2012-09-30 13:25:14', 'Water Billing'),
(1766, '2012-09-30 13:25:14', 'Water Billing'),
(1767, '2012-09-30 13:25:14', 'Water Billing'),
(1768, '2012-10-01 00:51:41', 'Sewer Billing'),
(1769, '2012-10-01 00:51:41', 'Water Billing'),
(1770, '2012-10-01 00:51:42', 'Water Billing'),
(1771, '2012-10-01 00:51:42', 'Water Billing'),
(1772, '2012-10-01 00:54:21', 'Sewer Billing'),
(1773, '2012-10-01 00:54:21', 'Water Billing'),
(1774, '2012-10-01 00:54:21', 'Water Billing'),
(1775, '2012-10-01 00:54:21', 'Water Billing'),
(1776, '2012-10-01 00:56:02', 'Sewer Billing'),
(1777, '2012-10-01 00:56:02', 'Water Billing'),
(1778, '2012-10-01 00:56:02', 'Water Billing'),
(1779, '2012-10-01 00:56:02', 'Water Billing'),
(1780, '2012-10-01 00:58:03', 'Sewer Billing'),
(1781, '2012-10-01 00:58:03', 'Water Billing'),
(1782, '2012-10-01 00:58:03', 'Water Billing'),
(1783, '2012-10-01 00:58:04', 'Water Billing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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

CREATE TABLE IF NOT EXISTS `water_tariff` (
  `wt_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_nature_id` int(11) NOT NULL,
  `level` decimal(2,1) NOT NULL,
  `wt_from` int(11) NOT NULL,
  `wt_to` int(11) NOT NULL,
  `wt_rate` decimal(10,2) NOT NULL,
  `wt_flat_rate` decimal(10,2) NOT NULL,
  `service_charge` decimal(10,2) NOT NULL,
  KEY `wt_id` (`wt_id`),
  KEY `service_nature_id` (`service_nature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `water_tariff`
--

INSERT INTO `water_tariff` (`wt_id`, `service_nature_id`, `level`, `wt_from`, `wt_to`, `wt_rate`, `wt_flat_rate`, `service_charge`) VALUES
(1, 1, 3.0, 0, 60, 300.00, 8000.00, 300.00),
(2, 2, 1.3, 0, 30, 250.00, 7500.00, 500.00),
(3, 3, 1.2, 0, 40, 230.00, 6000.00, 600.00),
(4, 4, 1.1, 0, 20, 200.00, 4000.00, 700.00),
(5, 5, 2.0, 0, 10, 460.00, 14400.00, 800.00),
(6, 6, 4.0, 0, 50, 630.00, 1399.95, 900.00),
(7, 7, 6.0, 0, 80, 340.00, 8000.00, 1000.00),
(8, 8, 5.0, 0, 70, 400.00, 7000.00, 1500.00);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `aging_analysis`
--
ALTER TABLE `aging_analysis`
  ADD CONSTRAINT `aging_analysis_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aging_analysis_ibfk_2` FOREIGN KEY (`inv_id`) REFERENCES `invoice` (`inv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `appnt_payment`
--
ALTER TABLE `appnt_payment`
  ADD CONSTRAINT `appnt_payment_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `receipt` (`rec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appnt_payment_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `transaction` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appnt_payment_ibfk_3` FOREIGN KEY (`appnt_id`) REFERENCES `applicant` (`appnt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cheque`
--
ALTER TABLE `cheque`
  ADD CONSTRAINT `cheque_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `receipt` (`rec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`appln_id`) REFERENCES `application` (`appln_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`pay_center`) REFERENCES `pay_center` (`pac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_5` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_6` FOREIGN KEY (`appnt_id`) REFERENCES `applicant` (`appnt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_7` FOREIGN KEY (`ba_id`) REFERENCES `billing_area` (`ba_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cust_payment`
--
ALTER TABLE `cust_payment`
  ADD CONSTRAINT `cust_payment_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `receipt` (`rec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cust_payment_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `transaction` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cust_payment_ibfk_3` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`trans_id`) REFERENCES `transaction` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_reading`
--
ALTER TABLE `invoice_reading`
  ADD CONSTRAINT `invoice_reading_ibfk_1` FOREIGN KEY (`mred_id`) REFERENCES `meter_reading` (`mred_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_reading_ibfk_2` FOREIGN KEY (`inv_id`) REFERENCES `invoice` (`inv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meter_customer`
--
ALTER TABLE `meter_customer`
  ADD CONSTRAINT `meter_customer_ibfk_1` FOREIGN KEY (`met_id`) REFERENCES `meter` (`met_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meter_customer_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meter_reading`
--
ALTER TABLE `meter_reading`
  ADD CONSTRAINT `meter_reading_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`tran_id`) REFERENCES `transaction` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
