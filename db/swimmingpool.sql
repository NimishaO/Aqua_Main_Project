-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 10:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swimmingpool`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE IF NOT EXISTS `tbl_equipment` (
  `e_id` int(5) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(20) NOT NULL,
  `e_price` int(10) NOT NULL,
  `e_img` varchar(200) NOT NULL,
  `e_qnty` int(10) NOT NULL,
  `e_status` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`e_id`, `e_name`, `e_price`, `e_img`, `e_qnty`, `e_status`) VALUES
(1, 'equipment11', 23400, 'equipment11.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `fb_id` int(5) NOT NULL AUTO_INCREMENT,
  `fb_reg_id` int(5) NOT NULL,
  `fb_subject` varchar(50) NOT NULL,
  `fb_content` varchar(50) NOT NULL,
  `fb_time` int(10) NOT NULL,
  `fb_status` char(1) NOT NULL,
  PRIMARY KEY (`fb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`fb_id`, `fb_reg_id`, `fb_subject`, `fb_content`, `fb_time`, `fb_status`) VALUES
(1, 1, 'sample fb1', 'sample content', 1622048021, 'a'),
(2, 1, 'sample fb2', 'sample content', 1622048044, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE IF NOT EXISTS `tbl_leave` (
  `leave_id` int(5) NOT NULL AUTO_INCREMENT,
  `leave_tr_id` int(5) NOT NULL,
  `leave_from` varchar(15) NOT NULL,
  `leave_to` varchar(15) NOT NULL,
  `leave_days` int(3) NOT NULL,
  `leave_reason` varchar(500) NOT NULL,
  `leave_status` char(1) NOT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`leave_id`, `leave_tr_id`, `leave_from`, `leave_to`, `leave_days`, `leave_reason`, `leave_status`) VALUES
(2, 1, '10/06/2021', '15/06/2021', 5, 'personal', 'p'),
(3, 1, '20/06/2021', '22/06/2021', 2, 'personal', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `login_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `u_type` varchar(20) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `email`, `password`, `u_type`, `status`) VALUES
(1, 'nim@gmail.com', 'nim@123', 'user', 1),
(2, 'divine@gmail.com', 'divine@123', 'user', 1),
(3, 'noel@gmail.com', 'noel@123', 'user', 1),
(5, 'jerry@gmail.com', 'jerry@123', 'trainer', 1),
(6, 'sarah@gmail.com', 'sarah@123', 'trainer', 1),
(7, 'admin123@gmail.com', 'Admin@123', 'admin', 1),
(9, 'nayana@gmail.com', 'nayana@123', 'user', 1),
(10, 'harry@gmail.com', 'Harry@123', 'user', 1),
(11, 'jose@gmail.com', 'jose@123', 'trainer', 1),
(12, 'kelvin@gmail.com', 'kelcin@123', 'trainer', 1),
(13, 'elena@gmail.com', 'elena@123', 'trainer', 1),
(14, 'anoopnair@gmail.com', 'qwerty', 'trainer', 1),
(15, 'manumon@gmail.com', 'Manu@123', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE IF NOT EXISTS `tbl_package` (
  `pkg_id` int(10) NOT NULL AUTO_INCREMENT,
  `pkg_name` varchar(50) NOT NULL,
  `pkg_amt` int(10) NOT NULL,
  `pkg_cap` int(50) NOT NULL,
  `pkg_durtn` varchar(50) NOT NULL,
  `pkg_age` varchar(50) NOT NULL,
  `pkg_descpt` varchar(70) NOT NULL,
  `pkg_trainer` int(10) DEFAULT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`pkg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`pkg_id`, `pkg_name`, `pkg_amt`, `pkg_cap`, `pkg_durtn`, `pkg_age`, `pkg_descpt`, `pkg_trainer`, `status`) VALUES
(1, 'Beginner', 800, 30, '6 Months', '15-25', 'Trainer Guidance + Lessons', NULL, 'A'),
(2, 'Advanced', 1500, 30, '6 Months', '20-30', 'Advanced classes + Trainer lessons', NULL, 'A'),
(3, 'Family', 1000, 5, '6 Months', '10-50', 'Guided classes + Trainer lessons', NULL, 'A'),
(4, 'sample package1', 2400, 12, '1 year', '20-59', 'sampledesc', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `reg_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `aadhar` varchar(40) DEFAULT NULL,
  `status` int(5) NOT NULL,
  `login_id` int(10) NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `login_id` (`login_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`reg_id`, `fname`, `lname`, `email`, `gender`, `address`, `phone`, `aadhar`, `status`, `login_id`) VALUES
(1, 'Nimisha', 'Odavel', 'nim@gmail.com', 'f', 'Odavel House ', '7561415201', NULL, 2, 1),
(2, 'Divine', 'Zac', 'divine@gmail.com', 'f', 'puthiyamattathil House', '7418529630', NULL, 1, 2),
(3, 'Noel', 'Odavel', 'noel@gmail.com', 'm', 'Odavel House ', '9847586231', NULL, 1, 3),
(4, 'nayana', 'odavel', 'nayana@gmail.com', 'f', 'asdhg h', '7894563210', NULL, 3, 9),
(5, 'harry', 'watt', 'harry@gmail.com', 'm', 'asdfgh h', '7896541253', NULL, 2, 10),
(6, 'manu', 'mon', 'manumon@gmail.com', 'm', 'sampleAddress', '9089786756', '3ca09447ae539dc3ec469509fe58b850.jpg', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sbitem`
--

CREATE TABLE IF NOT EXISTS `tbl_sbitem` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(15) NOT NULL,
  `item_amt` int(15) NOT NULL,
  `item_img` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_sbitem`
--

INSERT INTO `tbl_sbitem` (`item_id`, `item_name`, `item_amt`, `item_img`, `status`) VALUES
(1, 'Sandwich', 90, 'Sandwich.jpg', 'A'),
(2, 'Burger', 100, 'Burger.jpg', 'A'),
(3, 'coffee', 30, 'coffee.jpg', 'A'),
(4, 'Tea', 25, 'Tea.jpg', 'A'),
(5, 'Veg Sandwich', 80, 'Veg Sandwich.jpg', 'A'),
(6, 'Veg Burger', 85, 'Veg Burger.jpg', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `sch_id` int(5) NOT NULL AUTO_INCREMENT,
  `sch_tr_id` int(5) NOT NULL,
  `sch_from` varchar(10) NOT NULL,
  `sch_to` varchar(10) NOT NULL,
  `sch_days` varchar(100) NOT NULL,
  `sch_status` char(1) NOT NULL,
  PRIMARY KEY (`sch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`sch_id`, `sch_tr_id`, `sch_from`, `sch_to`, `sch_days`, `sch_status`) VALUES
(2, 1, '10 Am', '5 PM', 'monday,tuesday,wednesday,thursday', 'a'),
(3, 2, '10 Am', '5 PM', 'monday,tuesday,wednesday,thursday', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainer`
--

CREATE TABLE IF NOT EXISTS `tbl_trainer` (
  `t_fname` varchar(15) NOT NULL,
  `t_lname` varchar(15) NOT NULL,
  `t_img` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `t_gender` varchar(10) NOT NULL,
  `t_address` varchar(20) NOT NULL,
  `t_phone` varchar(12) NOT NULL,
  `t_quali` varchar(100) NOT NULL,
  `t_duty` varchar(20) DEFAULT NULL,
  `t_shift` varchar(20) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  `login_id` int(10) NOT NULL,
  `t_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_trainer`
--

INSERT INTO `tbl_trainer` (`t_fname`, `t_lname`, `t_img`, `email`, `t_gender`, `t_address`, `t_phone`, `t_quali`, `t_duty`, `t_shift`, `password`, `status`, `login_id`, `t_id`) VALUES
('Jerry', 'Thomas', '', 'jerry@gmail.com', 'm', 'lmnop', '7894561230', '0', '', 'Morning', 'jerry@123', 'A', 5, 1),
('Sarah', 'Varghese', '', 'sarah@gmail.com', 'f', 'efgh House', '7894561580', '0', '', '', 'sarah@123', 'A', 6, 2),
('Jose', 'Chacko', '0c70451f03e074f6eb23d66a84516d88.jpg', 'jose@gmail.com', 'm', 'yxcvbnm house', '784596321', '0', '', '', 'jose@123', 'A', 11, 3),
('anoop', 'nair', '4f1862da602bd76a1b9bd8790619ba74.jpg', 'anoopnair@gmail.com', 'm', 'Sample', '9089786756', 'a8ca78c0b0d3c56ac46011792901a7b1.jpg', 'duty1', 'morning', 'qwerty', 'A', 14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userpkg`
--

CREATE TABLE IF NOT EXISTS `tbl_userpkg` (
  `usr_pkg_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_pkg_user_id` int(10) NOT NULL,
  `usr_pkg_pkg_id` int(10) NOT NULL,
  `usr_pkg_amt` int(10) NOT NULL,
  `usr_pkg_trans_no` varchar(20) NOT NULL,
  `usr_pkg_cardno` varchar(16) NOT NULL,
  `usr_pkg_card_user` varchar(30) NOT NULL,
  `usr_pkg_date` int(10) NOT NULL,
  `usr_pkg_status` varchar(5) NOT NULL,
  PRIMARY KEY (`usr_pkg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_userpkg`
--

INSERT INTO `tbl_userpkg` (`usr_pkg_id`, `usr_pkg_user_id`, `usr_pkg_pkg_id`, `usr_pkg_amt`, `usr_pkg_trans_no`, `usr_pkg_cardno`, `usr_pkg_card_user`, `usr_pkg_date`, `usr_pkg_status`) VALUES
(1, 1, 1, 800, 'TR1622835709', '2147483647215542', 'Manoj Kumar', 1622835709, 'a'),
(2, 1, 1, 800, 'TR1622836081', '2147483647215542', 'Manoj Kumar', 1622836083, 'a'),
(3, 1, 1, 800, 'TR1622836117', '2147483647215542', 'Manoj Kumar', 1622836117, 'a'),
(4, 1, 1, 800, 'TR1622836303', '2147483647215542', 'Manoj Kumar', 1622836303, 'a'),
(5, 1, 1, 800, 'TR1622836352', '2147483647215542', 'Manoj Kumar', 1622836352, 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
