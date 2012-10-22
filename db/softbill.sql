-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2012 at 12:40 PM
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
  `acc_no` int(15) NOT NULL,
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
(9, 1, 14, 0.00, 0.00, 0.00),
(10, 2, 15, 0.00, 0.00, 0.00),
(11, 3, 16, 0.00, 0.00, 0.00),
(12, 4, 17, 0.00, 0.00, 0.00);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Dumping data for table `aging_analysis`
--

INSERT INTO `aging_analysis` (`aging_id`, `aging_date`, `inv_id`, `cust_id`, `aging_debit`) VALUES
(140, '2012-01-01', 139, 14, 159.99),
(141, '2012-01-01', 140, 15, 7360.00),
(142, '2012-01-01', 141, 16, -1000.00),
(143, '2012-01-01', 142, 17, 6000.00),
(144, '2012-02-01', 143, 14, 819.98),
(145, '2012-02-01', 144, 15, 11500.00),
(146, '2012-02-01', 145, 16, 5000.00),
(147, '2012-02-01', 146, 17, 12000.00),
(148, '2012-03-01', 147, 14, 1479.97),
(149, '2012-03-01', 148, 15, 19320.00),
(150, '2012-03-01', 149, 16, 0.00),
(151, '2012-03-01', 150, 17, 18000.00),
(152, '2012-04-01', 151, 14, 2139.96),
(153, '2012-04-01', 152, 15, 25070.00),
(154, '2012-04-01', 153, 16, 8400.00),
(155, '2012-04-01', 154, 17, 24000.00),
(156, '2012-05-01', 155, 14, 2799.95),
(157, '2012-05-01', 156, 15, 25070.00),
(158, '2012-05-01', 157, 16, 23100.00),
(159, '2012-05-01', 158, 17, 30000.00),
(160, '2012-06-01', 159, 14, 3459.94),
(161, '2012-06-01', 160, 15, 36110.00),
(162, '2012-06-01', 161, 16, 40800.00),
(163, '2012-06-01', 162, 17, 36000.00);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
(9, 1, 'Khadija Hamis', 4, '0713 576 872', '736583 Dar', 'Ubungo', 'UB/MSW', 'UB/MSW/893U', 'Ubungo Msewe', 'Dar es Salaam', 1),
(10, 1, 'Samweli Kiangio', 8, '0786 346 512', '8723 Dar', 'Kijitonyama', 'KND/KJN', 'KND/KJN/982', 'Kijitonyama', 'Dar es Salaam', 2),
(11, 2, 'Kampala University', 2323, '0713 576 873', '732 Dar', 'Mbagala', 'TMK/KJN', 'TMK/KJN/982', 'Mbagala', 'Dar es Salaam', 1),
(12, 6, 'Sai Bodi', 1, '0786 346 892', '7365 Dar', 'Ubungo', 'UB/MSW', 'UB/MSW/899U', 'Ubungo Msewe', 'Dar es Salaam', 3);

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
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`appln_id`),
  KEY `service_nature_id` (`service_nature_id`),
  KEY `appnt_id` (`appnt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appln_id`, `appln_no`, `appln_date`, `appln_type`, `surveyed_date`, `engeneer_appr`, `approved_date`, `inspected_by`, `premise_nature`, `service_nature_id`, `appnt_id`, `status`) VALUES
(2, 2, '2012-08-07', 'Clean water', '2012-08-09', 'Yes', '2012-08-17', 'Mkumbo', 'Residential', 2, 2, 'Paid'),
(3, 3, '2012-08-19', 'Clean water', '2012-08-01', 'Yes', '2012-07-03', 'Mkumbo', 'Residential', 3, 3, ''),
(4, 4, '2012-08-21', 'Clean water', '2012-06-18', 'Yes', '2012-06-28', 'Mkumbo', 'Residential', 3, 4, ''),
(5, 5, '2012-08-21', 'Clean water', '2012-04-17', 'Yes', '2012-05-14', 'Mkumbo', 'Institution', 1, 5, 'Processed'),
(6, 6, '2012-08-21', 'Clean water', '2012-06-20', 'Yes', '2012-06-11', 'Juma Shabaani', 'Business', 5, 6, ''),
(7, 7, '2012-08-21', 'Sewer', '2011-10-17', 'Yes', '2011-11-24', 'Juma Shabaani', 'Residential', 6, 7, ''),
(8, 8, '2012-08-29', 'Clean water', '2012-08-21', 'Yes', '2012-08-28', 'Juma Shabaani', 'Residential', 2, 8, ''),
(9, 9, '2012-09-27', 'Clean water', '2012-09-11', 'Yes', '2012-09-20', 'Mashaka Kitundu', 'Residential', 3, 9, ''),
(10, 10, '2012-10-06', '', '2012-06-11', 'Yes', '2012-07-18', 'Mwamundela John', 'Residential', 3, 10, 'Paid'),
(11, 11, '2012-10-06', '', '2012-04-03', 'Yes', '2012-06-12', 'Mwamundela John', 'Institution', 1, 11, 'Not Paid'),
(12, 12, '2012-10-08', '', '2012-04-09', 'Yes', '2012-05-17', 'Mwamundela John', 'Business', 8, 12, 'Not Paid');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `appnt_payment`
--

INSERT INTO `appnt_payment` (`appntp_id`, `rec_id`, `trans_id`, `appnt_id`) VALUES
(1, 1, 1651, 9),
(2, 2, 1652, 7),
(3, 3, 1653, 5),
(4, 25, 1815, 2),
(5, 26, 1816, 10),
(6, 30, 1844, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`cheq_id`, `cheq_no`, `bank`, `rec_id`) VALUES
(1, 'Q89898E', 'CRDB', 1),
(2, '76545', 'NMB', 26),
(3, '4444444', 'NBC', 29),
(4, '55', 'CRDB', 30);

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
  `cust_open_balance` decimal(15,2) NOT NULL,
  PRIMARY KEY (`custp_id`),
  KEY `rec_id` (`rec_id`),
  KEY `cust_id` (`cust_id`),
  KEY `trans_id` (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cust_payment`
--

INSERT INTO `cust_payment` (`custp_id`, `rec_id`, `trans_id`, `cust_id`, `cust_open_balance`) VALUES
(1, 27, 1821, 16, -1500.00),
(2, 28, 1822, 14, 0.00),
(3, 29, 1831, 16, -1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_no` int(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`inv_id`, `inv_no`, `inv_type`, `invoicing_date`, `created_date`, `cust_id`, `acc_id`, `trans_id`, `water_cost`, `sewer_cost`, `service_charge`) VALUES
(139, 1, 'Actual', '2012-01-01', '2012-10-10 00:21:02', 14, 9, 1817, 0.00, 659.99, 0.00),
(140, 2, 'Actual', '2012-01-01', '2012-10-10 00:21:02', 15, 10, 1818, 7360.00, 0.00, 600.00),
(141, 3, 'Actual', '2012-01-01', '2012-10-10 00:21:02', 16, 11, 1819, 6000.00, 0.00, 300.00),
(142, 4, 'Estimate', '2012-01-01', '2012-10-10 00:21:02', 17, 12, 1820, 6000.00, 0.00, 600.00),
(143, 5, 'Actual', '2012-02-01', '2012-10-10 00:41:47', 14, 9, 1823, 0.00, 659.99, 0.00),
(144, 6, 'Actual', '2012-02-01', '2012-10-10 00:41:47', 15, 10, 1824, 4140.00, 0.00, 600.00),
(145, 7, 'Actual', '2012-02-01', '2012-10-10 00:41:47', 16, 11, 1825, 6000.00, 0.00, 300.00),
(146, 8, 'Estimate', '2012-02-01', '2012-10-10 00:41:47', 17, 12, 1826, 6000.00, 0.00, 600.00),
(147, 9, 'Actual', '2012-03-01', '2012-10-10 00:47:58', 14, 9, 1827, 0.00, 659.99, 0.00),
(148, 10, 'Actual', '2012-03-01', '2012-10-10 00:47:58', 15, 10, 1828, 7820.00, 0.00, 600.00),
(149, 11, 'Actual', '2012-03-01', '2012-10-10 00:47:58', 16, 11, 1829, 3000.00, 0.00, 300.00),
(150, 12, 'Estimate', '2012-03-01', '2012-10-10 00:47:59', 17, 12, 1830, 6000.00, 0.00, 600.00),
(151, 13, 'Actual', '2012-04-01', '2012-10-10 09:31:07', 14, 9, 1832, 0.00, 659.99, 0.00),
(152, 14, 'Actual', '2012-04-01', '2012-10-10 09:31:07', 15, 10, 1833, 5750.00, 0.00, 600.00),
(153, 15, 'Actual', '2012-04-01', '2012-10-10 09:31:07', 16, 11, 1834, 8400.00, 0.00, 300.00),
(154, 16, 'Estimate', '2012-04-01', '2012-10-10 09:31:08', 17, 12, 1835, 6000.00, 0.00, 600.00),
(155, 17, 'Actual', '2012-05-01', '2012-10-10 09:45:17', 14, 9, 1836, 0.00, 659.99, 0.00),
(156, 18, 'Actual', '2012-05-01', '2012-10-10 09:45:17', 15, 10, 1837, 0.00, 0.00, 600.00),
(157, 19, 'Actual', '2012-05-01', '2012-10-10 09:45:17', 16, 11, 1838, 14700.00, 0.00, 300.00),
(158, 20, 'Estimate', '2012-05-01', '2012-10-10 09:45:17', 17, 12, 1839, 6000.00, 0.00, 600.00),
(159, 21, 'Actual', '2012-06-01', '2012-10-10 11:22:53', 14, 9, 1840, 0.00, 659.99, 0.00),
(160, 22, 'Actual', '2012-06-01', '2012-10-10 11:22:53', 15, 10, 1841, 11040.00, 0.00, 600.00),
(161, 23, 'Actual', '2012-06-01', '2012-10-10 11:22:53', 16, 11, 1842, 17700.00, 0.00, 300.00),
(162, 24, 'Estimate', '2012-06-01', '2012-10-10 11:22:53', 17, 12, 1843, 6000.00, 0.00, 600.00);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `invoice_reading`
--

INSERT INTO `invoice_reading` (`inv_read_id`, `mred_id`, `inv_id`) VALUES
(23, 625, 140),
(24, 626, 141),
(25, 627, 144),
(26, 628, 145),
(27, 629, 148),
(28, 630, 149),
(29, 631, 152),
(30, 632, 153),
(31, 633, 156),
(32, 634, 157),
(33, 635, 160),
(34, 636, 161);

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

CREATE TABLE IF NOT EXISTS `meter` (
  `met_id` int(11) NOT NULL AUTO_INCREMENT,
  `met_number` varchar(255) NOT NULL,
  `met_type` enum('Tameng','Metscant') NOT NULL,
  `met_size` varchar(255) NOT NULL,
  `met_status_id` int(11) NOT NULL,
  `no_digits` int(11) NOT NULL,
  `initial_reading` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `availability` varchar(255) NOT NULL DEFAULT 'AVAILABLE',
  `remarks` text NOT NULL,
  PRIMARY KEY (`met_id`),
  KEY `met_status_id` (`met_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`met_id`, `met_number`, `met_type`, `met_size`, `met_status_id`, `no_digits`, `initial_reading`, `added_date`, `availability`, `remarks`) VALUES
(1, '32422', 'Metscant', '0', 1, 8, 0, '2012-08-16', 'AVAILABLE', 'some'),
(2, '88yyy090', 'Metscant', '0', 0, 9, 0, '2012-08-16', 'AVAILABLE', 'k'),
(3, 'OD-20C899', 'Metscant', '1/3', 0, 10, 0, '2012-08-21', 'AVAILABLE', ''),
(4, 'OC-20A490', 'Tameng', '0', 0, 10, 0, '2012-08-21', 'ISSUED', ''),
(5, 'OA-600090', 'Tameng', '0', 0, 10, 0, '2012-08-21', 'AVAILABLE', ''),
(6, 'OC-205W90', 'Metscant', '0', 0, 10, 30, '2012-08-21', 'ISSUED', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=637 ;

--
-- Dumping data for table `meter_reading`
--

INSERT INTO `meter_reading` (`mred_id`, `billing_date`, `reading_date`, `entered_date`, `reading`, `consumption`, `met_id`, `cust_id`, `remarks`) VALUES
(625, '2012-01-01', '2012-02-01', '2012-10-10 00:18:43', 62, 32, 6, 15, ''),
(626, '2012-01-01', '2012-02-01', '2012-10-10 00:18:43', 20, 20, 4, 16, ''),
(627, '2012-02-01', '2012-03-01', '2012-10-10 00:40:17', 80, 18, 6, 15, ''),
(628, '2012-02-01', '2012-03-01', '2012-10-10 00:40:17', 40, 20, 4, 16, ''),
(629, '2012-03-01', '2012-04-01', '2012-10-10 00:45:56', 114, 34, 6, 15, ''),
(630, '2012-03-01', '2012-04-01', '2012-10-10 00:45:56', 50, 10, 4, 16, ''),
(631, '2012-04-01', '2012-05-01', '2012-10-10 00:52:01', 139, 25, 6, 15, ''),
(632, '2012-04-01', '2012-05-01', '2012-10-10 00:52:01', 78, 28, 4, 16, ''),
(633, '2012-05-01', '2012-06-01', '2012-10-10 09:43:06', 139, 0, 6, 15, ''),
(634, '2012-05-01', '2012-06-01', '2012-10-10 09:43:06', 127, 49, 4, 16, ''),
(635, '2012-06-01', '2012-07-01', '2012-10-10 11:22:21', 187, 48, 6, 15, ''),
(636, '2012-06-01', '2012-07-01', '2012-10-10 11:22:21', 186, 59, 4, 16, '');

-- --------------------------------------------------------

--
-- Table structure for table `meter_status`
--

CREATE TABLE IF NOT EXISTS `meter_status` (
  `met_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `met_status` varchar(255) NOT NULL,
  PRIMARY KEY (`met_status_id`),
  KEY `met_status_id` (`met_status_id`),
  KEY `met_status` (`met_status`),
  KEY `met_status_2` (`met_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `meter_status`
--

INSERT INTO `meter_status` (`met_status_id`, `met_status`) VALUES
(2, 'Damaged'),
(5, 'Dirty meter'),
(4, 'No meter/pipe'),
(3, 'Stoped_working'),
(1, 'working');

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
  `rec_no` int(11) NOT NULL,
  `rec_type` varchar(255) NOT NULL,
  `tran_id` int(11) NOT NULL,
  `payed_amount` decimal(15,2) NOT NULL,
  `amount_in_words` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `tran_id` (`tran_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`rec_id`, `rec_no`, `rec_type`, `tran_id`, `payed_amount`, `amount_in_words`, `user_id`) VALUES
(1, 1, 'Online', 1651, 7500.00, 'Seven thousand and five hundred shillings only', 1),
(2, 2, 'Online', 1652, 8000.00, 'Eight thousands', 1),
(3, 3, 'Online', 1653, 9000.00, 'Nine thousands', 1),
(4, 4, 'Online', 1794, 4000.00, 'Four thousands', 1),
(25, 25, 'Online', 1815, 5000.00, 'Five thousands', 1),
(26, 26, 'Online', 1816, 7000.00, 'Seven thousands only', 1),
(27, 27, 'Online', 1821, 7000.00, 'seven thousands', 1),
(28, 28, 'Online', 1822, 500.00, 'Five hundred shilings', 1),
(29, 29, 'Online', 1831, 8000.00, 'Eight thousand shillings only', 1),
(30, 30, 'Online', 1844, 777.00, 'afsjdklsf', 1);

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
(1, 'MBINGA URBAN WATER AUTHORITY', 'P.o.Box 245 Mbinga Ruvuma', '+25525254545', '+255-3-321065', 'info@mbuwsa.com', 'http://www.mbuwsa.com', 'authority_logo.jpg', 0.00, 0.00, '', 'portrait', 'Sasa unaweza kulipa bili yako kupitia');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1845 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `trans_date`, `description`) VALUES
(1651, '2012-09-27 18:01:43', 'Application fee'),
(1652, '2012-09-27 18:20:23', 'Application fee'),
(1653, '2012-09-29 14:58:39', 'Application fee'),
(1794, '2012-10-04 17:49:35', 'Application fee'),
(1815, '2012-10-04 18:22:52', 'Application fee'),
(1816, '2012-10-06 13:27:30', 'Application fee'),
(1817, '2012-10-10 00:21:02', 'Sewer Billing'),
(1818, '2012-10-10 00:21:02', 'Water Billing'),
(1819, '2012-10-10 00:21:02', 'Water Billing'),
(1820, '2012-10-10 00:21:02', 'Water Billing'),
(1821, '2012-10-10 00:28:54', 'Water Payment'),
(1822, '2012-10-10 00:39:21', 'Sewer Payment'),
(1823, '2012-10-10 00:41:47', 'Sewer Billing'),
(1824, '2012-10-10 00:41:47', 'Water Billing'),
(1825, '2012-10-10 00:41:47', 'Water Billing'),
(1826, '2012-10-10 00:41:47', 'Water Billing'),
(1827, '2012-10-10 00:47:58', 'Sewer Billing'),
(1828, '2012-10-10 00:47:58', 'Water Billing'),
(1829, '2012-10-10 00:47:58', 'Water Billing'),
(1830, '2012-10-10 00:47:59', 'Water Billing'),
(1831, '2012-10-10 00:50:05', 'Water Payment'),
(1832, '2012-10-10 09:31:07', 'Sewer Billing'),
(1833, '2012-10-10 09:31:07', 'Water Billing'),
(1834, '2012-10-10 09:31:07', 'Water Billing'),
(1835, '2012-10-10 09:31:08', 'Water Billing'),
(1836, '2012-10-10 09:45:17', 'Sewer Billing'),
(1837, '2012-10-10 09:45:17', 'Water Billing'),
(1838, '2012-10-10 09:45:17', 'Water Billing'),
(1839, '2012-10-10 09:45:17', 'Water Billing'),
(1840, '2012-10-10 11:22:53', 'Sewer Billing'),
(1841, '2012-10-10 11:22:53', 'Water Billing'),
(1842, '2012-10-10 11:22:53', 'Water Billing'),
(1843, '2012-10-10 11:22:53', 'Water Billing'),
(1844, '2012-10-18 16:12:48', 'Other Sewer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `usr_fname` varchar(255) NOT NULL,
  `usr_lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `usr_fname`, `usr_lname`, `email`, `username`, `password`, `role`, `status`) VALUES
(1, 'Admin', 'Admin', 'admin@localhost', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ROOT', 'ACTIVE'),
(2, 'user1', 'user1', 'user1@localhost.com', 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 'ROOT', 'BLOCKED'),
(3, 'user2', 'user2', 'user2@localhost.com', 'user2', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', 'ROOT', 'BLOCKED'),
(7, 'user30', 'user30', 'user3@localhost.com', 'user3', 'bff5c0d86f525bb86ade3e19bbe2cf8a23cbddfc', 'ROOT', 'ACTIVE'),
(8, 'user4', '', 'user4@localhost.com', 'user4', '06e6eef6adf2e5f54ea6c43c376d6d36605f810e', 'ROOT', 'BLOCKED'),
(9, 'user5', '', 'user5@localhost.com', 'user5', '7d112681b8dd80723871a87ff506286613fa9cf6', 'ROOT', 'BLOCKED'),
(10, 'user10', '', 'user10@localhost.com', 'user10', 'd089da97b9e447158a0466d15fe291f2c43b982e', 'ROOT', 'ACTIVE'),
(11, 'demo', '', 'demo@localhost.com', 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'ROOT', 'BLOCKED'),
(12, 'user11', '', 'user11@localhost.com', 'user11', '3d5cbfed48ce23d2f0dc0a0baa3ec2ee93867b2b', 'ROOT', 'ACTIVE'),
(13, 'user12', '', 'user12@localhost.com', 'user12', 'e45ed40f34005e1636649ab18bbd16ada02cb251', 'ROOT', 'BLOCKED'),
(14, 'user13', '', 'user13@localhost.com', 'user13', 'd6fa2beb1c302491b40f447d8784fc0bcce1ca8e', 'ROOT', 'ACTIVE'),
(15, 'cashier', '', 'cashier@localhost', 'cashier', 'a5b42198e3fb950b5ab0d0067cbe077a41da1245', 'CASHIER', 'ACTIVE'),
(16, 'gffhg', '', 'info@zanzibar.com', 'robbyl', '3421ecde2a5de6543b48460b867cf323b018bc22', 'CASHIER', 'BLOCKED'),
(17, '', 'Chahe', '', '', '', '', 'ACTIVE'),
(18, '', '', 'carringtonchahe@yahoo.com', 'carrington', '154197b685dd2b833f122e11370c090e90a39a8c', 'ROOT', 'ACTIVE'),
(20, '', '', 'carringtonchahe@yahoo.com', 'carringtonfau', '80b0225d8e1fe6c3fae611101ad0a16e7dd63f8b', 'ACCOUNTANT', 'ACTIVE'),
(61, 'Kimambo', 'Kimaro', 'kimaro@yahoo.com', 'kimambo', '053a8f17c2731d33f77e2626b0697fa9443d8e36', 'CASHIER', 'ACTIVE'),
(62, 'Manager', 'Manager', 'manager@localhost.com', 'manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', 'MANAGER', 'ACTIVE'),
(63, 'Data', 'Data', 'data@localhost.com', 'data', 'a17c9aaa61e80a1bf71d0d850af4e5baa9800bbd', 'DATA CLERK', 'ACTIVE'),
(64, 'Credit', 'Credit', 'credit@localhost.com', 'credit', '9cf5e7cd8fcf394934688710870f7642ee7eede5', 'CREDIT CONTROLLER', 'ACTIVE'),
(65, 'Billing', 'Billing', 'billing@localhost.com', 'billing', 'acd14c7a6c04c1dd6dc6c2d66d487a28667c0ad6', 'BILLING OFFICER', 'ACTIVE'),
(66, 'accountant', 'accountant', 'accountant@localhost.com', 'accountant', '4cd5edcd9aa8e3aed333a5dccda30a3b4a7eeeb7', 'ACCOUNTANT', 'ACTIVE'),
(67, 'connection', 'connection', 'connection@localhost.com', 'connection', '814605c64a5c1c3c2d3c2c332153f0e425e92653', 'CONNECTION OFFICER', 'ACTIVE');

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
-- Constraints for table `meter_status`
--
ALTER TABLE `meter_status`
  ADD CONSTRAINT `meter_status_ibfk_1` FOREIGN KEY (`met_status_id`) REFERENCES `meter` (`met_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
