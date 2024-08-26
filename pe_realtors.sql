-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 07:03 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pe_realtors`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `admin_user_role_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `show_password` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(500) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address1` varchar(500) NOT NULL,
  `address2` varchar(500) DEFAULT NULL,
  `address3` varchar(500) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `alt_mobile_no` varchar(50) DEFAULT NULL,
  `fax_no` varchar(50) DEFAULT NULL,
  `data_view` int(11) NOT NULL DEFAULT 0,
  `approval_access` int(11) NOT NULL DEFAULT 0,
  `user_image` varchar(250) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_loginip` varchar(100) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `admin_user_role_id`, `designation_id`, `name`, `password`, `show_password`, `email`, `username`, `country_id`, `state_id`, `city_id`, `address1`, `address2`, `address3`, `pincode`, `mobile_no`, `alt_mobile_no`, `fax_no`, `data_view`, `approval_access`, `user_image`, `last_login`, `last_loginip`, `joining_date`, `termination_date`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 1, 1, 'Krishna', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ramkumarsgurav@gmail.com', 'admin', 1, 1, 1, 'Tumkuru', '', '', '560069', '9886551433', '', '', 0, 0, NULL, '2024-08-21 13:23:29', '::1', '2023-03-02', '1970-01-01', 1, '2024-08-01 00:00:00', 0, '2024-08-21 16:27:39', 1, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_file`
--

CREATE TABLE `admin_user_file` (
  `id` int(11) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_role`
--

CREATE TABLE `admin_user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user_role`
--

INSERT INTO `admin_user_role` (`id`, `name`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'Super User', 1, '2024-08-02 12:10:11', 1, '2024-08-21 16:25:59', 1, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `au_pwd_reset_token`
--

CREATE TABLE `au_pwd_reset_token` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `used` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `au_pwd_reset_token`
--

INSERT INTO `au_pwd_reset_token` (`id`, `email`, `token`, `admin_user_id`, `used`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'ramkumarsgurav@gmail.com', '59GEUGRBVBQ5', 1, 0, 1, '2024-08-20 15:51:43', NULL, NULL, NULL, '0', NULL, NULL),
(2, 'ramkumarsgurav@gmail.com', '8R4KWA8VN2Z4', 1, 0, 1, '2024-08-20 15:53:15', NULL, NULL, NULL, '0', NULL, NULL),
(3, 'ramkumarsgurav@gmail.com', 'PZDDXHG7R7H1', 1, 1, 1, '2024-08-20 15:56:16', NULL, '2024-08-20 15:59:49', NULL, '0', NULL, NULL),
(4, 'ramkumarsgurav@gmail.com', 'BAJZ89S7AR17', 1, 0, 1, '2024-08-20 15:58:30', NULL, NULL, NULL, '0', NULL, NULL),
(5, 'ramkumarsgurav@gmail.com', 'G22KASFKIB2T', 1, 1, 1, '2024-08-20 16:00:33', NULL, '2024-08-20 16:03:42', NULL, '0', NULL, NULL),
(6, 'ramkumarsgurav@gmail.com', 'Y888PYZY52HM', 1, 0, 1, '2024-08-20 16:02:24', NULL, NULL, NULL, '0', NULL, NULL),
(7, 'ramkumarsgurav@gmail.com', 'KCPUTHF9XS6H', 1, 0, 1, '2024-08-20 16:02:35', NULL, NULL, NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bhk_type`
--

CREATE TABLE `bhk_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bhk_type`
--

INSERT INTO `bhk_type` (`id`, `name`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, '1-RK', 1, '2024-08-06 12:36:58', 1, '2024-08-09 10:54:20', 1, 0, NULL, NULL),
(2, '1-BHK', 1, '2024-08-06 12:38:37', 1, '2024-08-06 12:59:44', 1, 0, NULL, NULL),
(3, '2-BHK', 1, '2024-08-09 10:51:06', 1, NULL, NULL, 0, NULL, NULL),
(4, '3-BHK', 1, '2024-08-09 10:51:12', 1, NULL, NULL, 0, NULL, NULL),
(5, '4-BHK', 1, '2024-08-09 10:51:21', 1, NULL, NULL, 0, NULL, NULL),
(6, '5-BHK', 1, '2024-08-09 10:51:29', 1, NULL, NULL, 0, NULL, NULL),
(7, '6-BHK', 1, '2024-08-09 10:51:45', 1, '2024-08-21 16:26:59', 1, 0, NULL, NULL),
(8, 'All', 1, '2024-08-09 10:53:46', 1, NULL, NULL, 0, NULL, NULL),
(9, 'Others', 1, '2024-08-20 12:48:20', 1, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_code` varchar(255) DEFAULT NULL,
  `is_display` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country_id`, `state_id`, `name`, `city_code`, `is_display`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted_by`, `is_deleted`, `is_deleted_on`) VALUES
(1, 1, 1, 'Bengaluru', '', 1, 1, '2024-08-09 12:08:25', 1, NULL, NULL, NULL, '0', NULL),
(2, 1, 1, 'Mysore', '', 1, 1, '2024-08-09 12:08:31', 1, '2024-08-21 16:26:21', 1, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL,
  `company_unique_name` varchar(1200) NOT NULL,
  `company_name` varchar(1200) NOT NULL,
  `company_email` varchar(500) DEFAULT NULL,
  `company_website` varchar(500) DEFAULT NULL,
  `letterhead_header_image` varchar(255) DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(250) NOT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address1` varchar(500) NOT NULL,
  `address2` varchar(500) DEFAULT NULL,
  `address3` varchar(500) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `alt_mobile_no` varchar(50) DEFAULT NULL,
  `gst_no` varchar(15) DEFAULT NULL,
  `user_image` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `company_unique_name`, `company_name`, `company_email`, `company_website`, `letterhead_header_image`, `name`, `email`, `logo`, `country_id`, `state_id`, `city_id`, `address1`, `address2`, `address3`, `pincode`, `mobile_no`, `alt_mobile_no`, `gst_no`, `user_image`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted_by`, `is_deleted`, `is_deleted_on`) VALUES
(1, 'Pe Realtors', 'Pe Realtors', 'pe@perealtors.com', 'www.perealtors.in', 'letterhead_header_image_1.jpg', 'Krishna', 'pe@perealtors.com', 'logo_1.png', 1, 1, 1, 'Bengaluru', '', '', '502101', '9666364912', '', '0000000000000', NULL, 1, '2024-08-11 15:17:21', 1, '2024-08-21 16:27:54', 1, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `dial_code` varchar(255) NOT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `short_name`, `dial_code`, `country_code`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted_by`, `is_deleted`, `is_deleted_on`) VALUES
(1, 'India', 'IN', '0', '91', 1, '2022-11-21 20:26:13', 1, '2024-08-03 15:40:24', 1, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'Product Manager', 1, '2024-08-02 17:33:18', 1, '2024-08-09 12:12:24', NULL, '0', NULL, NULL),
(5, 'Store Manager', 1, '2024-08-05 18:04:22', 1, '2024-08-21 16:26:30', 1, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_log`
--

CREATE TABLE `email_log` (
  `id` int(11) NOT NULL,
  `subject` text DEFAULT NULL,
  `template` longtext DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `response` longtext DEFAULT NULL,
  `error_info` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_log`
--

INSERT INTO `email_log` (`id`, `subject`, `template`, `to`, `response`, `error_info`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'New Inquiry From www.perealtors.com', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<title>http://localhost/xampp/MARS/pe_realtors/</title>\r\n<style type=\"text/css\">\r\na {\r\n	color:#000;\r\n	text-decoration:none;\r\n}\r\n</style>\r\n</head>\r\n\r\n<body style=\"margin:0\">\r\n<table width=\"586\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td align=\"center\" valign=\"middle\" style=\"border:3px solid #008dc7;\"><table width=\"580\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td align=\"center\" style=\"background-color:#f0f0f0; padding:10px 10px 0 10px;\"><div align=\"left\" style=\"width:20%; float:left; margin:0;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/\" target=\"_blank\"></a></div></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:14px; color:#000; text-align:center; vertical-align:middle; padding:5px 0; font-weight:bold;\">New Enquiry From Pe Realtors </td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#9edbf7; font-family:verdana; font-size:11px; color:#333; padding:5px 0; text-align:center; vertical-align:middle; font-weight:bold;\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:11px; color:#000; text-align:justify; vertical-align:top; padding:0 10px; line-height:18px;\"><p>Dear Customer,</p>\r\n        <p>You have recieved a new enquiry. Please check the details as follows:</p>\r\n        <p></p>\r\n         <p><strong>Date</strong> : Mon 19th Aug, 2024 07:28 pm</p>        \r\n         <p><strong>Name</strong> : ramkumar gurav</p>        \r\n         <p><strong>Contact No</strong> : 8549065626</p>\r\n         <p><strong>Email Address</strong> : ramkumarsgurav@gmail.com</p>\r\n         <p><strong>Service</strong> : Property Document related</p>\r\n         <p><strong>Message</strong> : asdfasdfasdf</p>\r\n         <p><strong>Is  Consent </strong> : 1</p>\r\n         <p><strong>IP Address</strong> : ::1</p>\r\n         <p><strong>Page URL</strong> : <a href=\"http://localhost/xampp/MARS/pe_realtors/contact-us\" target=\"_blank\">contact-us</a></p>\r\n        \r\n         <p></p>\r\n       \r\n          \r\n          <p>Thanks &amp; Regards,<br />\r\n          <strong>Pe Realtors</strong></p></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#333; height:3px;\"></td>\r\n      </tr>\r\n    \r\n    \r\n    </table></td>\r\n  </tr>\r\n</table>\r\n</body>\r\n</html>\r\n', 'ramkumarsgurav@gmail.com', NULL, '', 1, '2024-08-19 19:28:29', NULL, NULL, NULL, 0, NULL, NULL),
(2, 'New Inquiry From www.perealtors.com', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<title>http://localhost/xampp/MARS/pe_realtors/</title>\r\n<style type=\"text/css\">\r\na {\r\n	color:#000;\r\n	text-decoration:none;\r\n}\r\n</style>\r\n</head>\r\n\r\n<body style=\"margin:0\">\r\n<table width=\"586\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td align=\"center\" valign=\"middle\" style=\"border:3px solid #008dc7;\"><table width=\"580\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td align=\"center\" style=\"background-color:#f0f0f0; padding:10px 10px 0 10px;\"><div align=\"left\" style=\"width:20%; float:left; margin:0;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/\" target=\"_blank\"></a></div></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:14px; color:#000; text-align:center; vertical-align:middle; padding:5px 0; font-weight:bold;\">New Enquiry From Pe Realtors </td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#9edbf7; font-family:verdana; font-size:11px; color:#333; padding:5px 0; text-align:center; vertical-align:middle; font-weight:bold;\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:11px; color:#000; text-align:justify; vertical-align:top; padding:0 10px; line-height:18px;\"><p>Dear Customer,</p>\r\n        <p>You have recieved a new enquiry. Please check the details as follows:</p>\r\n        <p></p>\r\n         <p><strong>Date</strong> : Mon 19th Aug, 2024 07:32 pm</p>        \r\n         <p><strong>Name</strong> : ramkumar gurav</p>        \r\n         <p><strong>Contact No</strong> : 8549065626</p>\r\n         <p><strong>Email Address</strong> : ramkumarsgurav@gmail.com</p>\r\n         <p><strong>Service</strong> : Property Document related</p>\r\n         <p><strong>Message</strong> : asdfasdfasdf</p>\r\n         <p><strong>IP Address</strong> : ::1</p>\r\n         <p><strong>Page URL</strong> : <a href=\"http://localhost/xampp/MARS/pe_realtors/contact-us\" target=\"_blank\">contact-us</a></p>\r\n        \r\n         <p></p>\r\n       \r\n          \r\n          <p>Thanks &amp; Regards,<br />\r\n          <strong>Pe Realtors</strong></p></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#333; height:3px;\"></td>\r\n      </tr>\r\n    \r\n    \r\n    </table></td>\r\n  </tr>\r\n</table>\r\n</body>\r\n</html>\r\n', 'abhishek.khandelwal82@gmail.com', NULL, '', 1, '2024-08-19 19:32:52', NULL, NULL, NULL, 0, NULL, NULL),
(3, 'New Inquiry From www.perealtors.com', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<title>http://localhost/xampp/MARS/pe_realtors/</title>\r\n<style type=\"text/css\">\r\na {\r\n	color:#000;\r\n	text-decoration:none;\r\n}\r\n</style>\r\n</head>\r\n\r\n<body style=\"margin:0\">\r\n<table width=\"586\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td align=\"center\" valign=\"middle\" style=\"border:3px solid #008dc7;\"><table width=\"580\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td align=\"center\" style=\"background-color:#f0f0f0; padding:10px 10px 0 10px;\"><div align=\"left\" style=\"width:20%; float:left; margin:0;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/\" target=\"_blank\"></a></div></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:14px; color:#000; text-align:center; vertical-align:middle; padding:5px 0; font-weight:bold;\">New Enquiry From Pe Realtors </td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#9edbf7; font-family:verdana; font-size:11px; color:#333; padding:5px 0; text-align:center; vertical-align:middle; font-weight:bold;\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:11px; color:#000; text-align:justify; vertical-align:top; padding:0 10px; line-height:18px;\"><p>Dear Customer,</p>\r\n        <p>You have recieved a new enquiry. Please check the details as follows:</p>\r\n        <p></p>\r\n         <p><strong>Date</strong> : Mon 19th Aug, 2024 07:35 pm</p>        \r\n         <p><strong>Name</strong> : ramkumar gurav</p>        \r\n         <p><strong>Contact No</strong> : 8549065626</p>\r\n         <p><strong>Email Address</strong> : ramkumarsgurav@gmail.com</p>\r\n         <p><strong>Service</strong> : Property Document related</p>\r\n         <p><strong>Message</strong> : asdfasdfasdf</p>\r\n         <p><strong>IP Address</strong> : ::1</p>\r\n         <p><strong>Page URL</strong> : <a href=\"http://localhost/xampp/MARS/pe_realtors/contact-us\" target=\"_blank\">contact-us</a></p>\r\n        \r\n         <p></p>\r\n       \r\n          \r\n          <p>Thanks &amp; Regards,<br />\r\n          <strong>Pe Realtors</strong></p></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#333; height:3px;\"></td>\r\n      </tr>\r\n    \r\n    \r\n    </table></td>\r\n  </tr>\r\n</table>\r\n</body>\r\n</html>\r\n', 'abhishek.khandelwal82@gmail.com', NULL, '', 1, '2024-08-19 19:35:03', NULL, NULL, NULL, 0, NULL, NULL),
(4, 'New Inquiry From www.perealtors.com', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<title>http://localhost/xampp/MARS/pe_realtors/</title>\r\n<style type=\"text/css\">\r\na {\r\n	color:#000;\r\n	text-decoration:none;\r\n}\r\n</style>\r\n</head>\r\n\r\n<body style=\"margin:0\">\r\n<table width=\"586\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td align=\"center\" valign=\"middle\" style=\"border:3px solid #008dc7;\"><table width=\"580\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td align=\"center\" style=\"background-color:#f0f0f0; padding:10px 10px 0 10px;\"><div align=\"left\" style=\"width:20%; float:left; margin:0;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/\" target=\"_blank\"></a></div></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:14px; color:#000; text-align:center; vertical-align:middle; padding:5px 0; font-weight:bold;\">New Enquiry From Pe Realtors </td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#9edbf7; font-family:verdana; font-size:11px; color:#333; padding:5px 0; text-align:center; vertical-align:middle; font-weight:bold;\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:11px; color:#000; text-align:justify; vertical-align:top; padding:0 10px; line-height:18px;\"><p>Dear Customer,</p>\r\n        <p>You have recieved a new enquiry. Please check the details as follows:</p>\r\n        <p></p>\r\n         <p><strong>Date</strong> : Mon 19th Aug, 2024 07:35 pm</p>        \r\n         <p><strong>Name</strong> : ramkumar gurav</p>        \r\n         <p><strong>Contact No</strong> : 8549065626</p>\r\n         <p><strong>Email Address</strong> : ramkumarsgurav@gmail.com</p>\r\n         <p><strong>Service</strong> : Property Document related</p>\r\n         <p><strong>Message</strong> : asdfasdfasdf</p>\r\n         <p><strong>IP Address</strong> : ::1</p>\r\n         <p><strong>Page URL</strong> : <a href=\"http://localhost/xampp/MARS/pe_realtors/contact-us\" target=\"_blank\">contact-us</a></p>\r\n        \r\n         <p></p>\r\n       \r\n          \r\n          <p>Thanks &amp; Regards,<br />\r\n          <strong>Pe Realtors</strong></p></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#333; height:3px;\"></td>\r\n      </tr>\r\n    \r\n    \r\n    </table></td>\r\n  </tr>\r\n</table>\r\n</body>\r\n</html>\r\n', 'abhishek.khandelwal82@gmail.com', NULL, '', 1, '2024-08-19 19:35:32', NULL, NULL, NULL, 0, NULL, NULL),
(5, 'New Inquiry From www.perealtors.com', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<title>http://localhost/xampp/MARS/pe_realtors/</title>\r\n<style type=\"text/css\">\r\na {\r\n	color:#000;\r\n	text-decoration:none;\r\n}\r\n</style>\r\n</head>\r\n\r\n<body style=\"margin:0\">\r\n<table width=\"586\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td align=\"center\" valign=\"middle\" style=\"border:3px solid #008dc7;\"><table width=\"580\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td align=\"center\" style=\"background-color:#f0f0f0; padding:10px 10px 0 10px;\"><div align=\"left\" style=\"width:20%; float:left; margin:0;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/\" target=\"_blank\"></a></div></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:14px; color:#000; text-align:center; vertical-align:middle; padding:5px 0; font-weight:bold;\">New Enquiry From Pe Realtors </td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#9edbf7; font-family:verdana; font-size:11px; color:#333; padding:5px 0; text-align:center; vertical-align:middle; font-weight:bold;\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"font-family:verdana; font-size:11px; color:#000; text-align:justify; vertical-align:top; padding:0 10px; line-height:18px;\"><p>Dear Customer,</p>\r\n        <p>You have recieved a new enquiry. Please check the details as follows:</p>\r\n        <p></p>\r\n         <p><strong>Date</strong> : Mon 19th Aug, 2024 07:45 pm</p>        \r\n         <p><strong>Name</strong> : sham gurav</p>        \r\n         <p><strong>Contact No</strong> : 8549065626</p>\r\n         <p><strong>Email Address</strong> : ramkumarsgurav@gmail.com</p>\r\n         <p><strong>Service</strong> : Selling a property</p>\r\n         <p><strong>Message</strong> : asdfasdfasdf</p>\r\n         <p><strong>IP Address</strong> : ::1</p>\r\n         <p><strong>Page URL</strong> : <a href=\"http://localhost/xampp/MARS/pe_realtors/\" target=\"_blank\"></a></p>\r\n        \r\n         <p></p>\r\n       \r\n          \r\n          <p>Thanks &amp; Regards,<br />\r\n          <strong>Pe Realtors</strong></p></td>\r\n      </tr>\r\n      <tr>\r\n        <td style=\"background-color:#333; height:3px;\"></td>\r\n      </tr>\r\n    \r\n    \r\n    </table></td>\r\n  </tr>\r\n</table>\r\n</body>\r\n</html>\r\n', 'abhishek.khandelwal82@gmail.com', NULL, '', 1, '2024-08-19 19:45:04', NULL, NULL, NULL, 0, NULL, NULL),
(6, 'User Forgot Password on Pe Realtors', '<html>\r\n\r\n	<head>\r\n	<title>\"Forgot Password for your\"</title>\r\n	</head>\r\n	<body style=\"width:100%; font-family:Arial; font-size:13px; line-height:22px; background:#fff;  position:relative;color:#555555; margin:0px; padding:0px;\">\r\n	  	<div style=\"margin:0 auto; width:600px;\">\r\n<div style=\"background-color: #5f9116;; width:594px; float:left; padding:0px 3px 3px 3px; border:#5f9116 3px solid;\" >\r\n	<div style=\"padding:27px; width:540px; border-bottom:#5f9116 3px solid;\">\r\n    	<a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/\" target=\"_blank\" style=\"font-size:13px; color:#839ecd;text-decoration:none; text-align:center;\">\r\n    	<img src=\"http://localhost/xampp/MARS/pe_realtors/secureRegions//admin/images/email-logo.png\" alt=\"\" /></a>\r\n\r\n    </div>\r\n    <div style=\"background:#fff; padding:44px 34px; width:526px; float:left;\">\r\n    <h1 style=\"color:#d95451; font-size:24px; font-family:Arial; font-weight:normal; margin-bottom:20px;\">Reset Password Link</h1>\r\n    <p style=\"margin-bottom:20px;\">\r\nIf you want to reset your password, click here the following link</p>\r\n <p style=\"margin-bottom:10px;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/admin_reset_password/8R4KWA8VN2Z4\">Reset Password</a></p>\r\n    </div>\r\n</div>\r\n</div>\r\n\r\n	</body>\r\n	</html>\r\n', 'ramkumarsgurav@gmail.com', NULL, '', 1, '2024-08-20 15:53:15', NULL, NULL, NULL, 0, NULL, NULL),
(7, 'User Forgot Password on Pe Realtors', '<html>\r\n\r\n	<head>\r\n	<title>\"Forgot Password for your\"</title>\r\n	</head>\r\n	<body style=\"width:100%; font-family:Arial; font-size:13px; line-height:22px; background:#fff;  position:relative;color:#555555; margin:0px; padding:0px;\">\r\n	  	<div style=\"margin:0 auto; width:600px;\">\r\n<div style=\"background-color: #5f9116;; width:594px; float:left; padding:0px 3px 3px 3px; border:#5f9116 3px solid;\" >\r\n	<div style=\"padding:27px; width:540px; border-bottom:#5f9116 3px solid;\">\r\n    	<a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/\" target=\"_blank\" style=\"font-size:13px; color:#839ecd;text-decoration:none; text-align:center;\">\r\n    	<img src=\"http://localhost/xampp/MARS/pe_realtors/secureRegions//admin/images/email-logo.png\" alt=\"\" /></a>\r\n\r\n    </div>\r\n    <div style=\"background:#fff; padding:44px 34px; width:526px; float:left;\">\r\n    <h1 style=\"color:#d95451; font-size:24px; font-family:Arial; font-weight:normal; margin-bottom:20px;\">Reset Password Link</h1>\r\n    <p style=\"margin-bottom:20px;\">\r\nIf you want to reset your password, click here the following link</p>\r\n <p style=\"margin-bottom:10px;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/reset-password/PZDDXHG7R7H1\">Reset Password</a></p>\r\n    </div>\r\n</div>\r\n</div>\r\n\r\n	</body>\r\n	</html>\r\n', 'ramkumarsgurav@gmail.com', NULL, '', 1, '2024-08-20 15:56:16', NULL, NULL, NULL, 0, NULL, NULL),
(8, 'User Forgot Password on Pe Realtors', '<html>\r\n\r\n	<head>\r\n	<title>\"Forgot Password for your\"</title>\r\n	</head>\r\n	<body style=\"width:100%; font-family:Arial; font-size:13px; line-height:22px; background:#fff;  position:relative;color:#555555; margin:0px; padding:0px;\">\r\n	  	<div style=\"margin:0 auto; width:600px;\">\r\n<div style=\"background-color: #5f9116;; width:594px; float:left; padding:0px 3px 3px 3px; border:#5f9116 3px solid;\" >\r\n	<div style=\"padding:27px; width:540px; border-bottom:#5f9116 3px solid;\">\r\n    	<a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/\" target=\"_blank\" style=\"font-size:13px; color:#839ecd;text-decoration:none; text-align:center;\">\r\n    	<img src=\"http://localhost/xampp/MARS/pe_realtors/secureRegions//admin/images/email-logo.png\" alt=\"\" /></a>\r\n\r\n    </div>\r\n    <div style=\"background:#fff; padding:44px 34px; width:526px; float:left;\">\r\n    <h1 style=\"color:#d95451; font-size:24px; font-family:Arial; font-weight:normal; margin-bottom:20px;\">Reset Password Link</h1>\r\n    <p style=\"margin-bottom:20px;\">\r\nIf you want to reset your password, click here the following link</p>\r\n <p style=\"margin-bottom:10px;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/Login/reset-password/BAJZ89S7AR17\">Reset Password</a></p>\r\n    </div>\r\n</div>\r\n</div>\r\n\r\n	</body>\r\n	</html>\r\n', 'ramkumarsgurav@gmail.com', NULL, '', 1, '2024-08-20 15:58:30', NULL, NULL, NULL, 0, NULL, NULL),
(9, 'User Forgot Password on Pe Realtors', '<html>\r\n\r\n	<head>\r\n	<title>\"Forgot Password for your\"</title>\r\n	</head>\r\n	<body style=\"width:100%; font-family:Arial; font-size:13px; line-height:22px; background:#fff;  position:relative;color:#555555; margin:0px; padding:0px;\">\r\n	  	<div style=\"margin:0 auto; width:600px;\">\r\n<div style=\"background-color: #5f9116;; width:594px; float:left; padding:0px 3px 3px 3px; border:#5f9116 3px solid;\" >\r\n	<div style=\"padding:27px; width:540px; border-bottom:#5f9116 3px solid;\">\r\n    	<a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/\" target=\"_blank\" style=\"font-size:13px; color:#839ecd;text-decoration:none; text-align:center;\">\r\n    	<img src=\"http://localhost/xampp/MARS/pe_realtors/secureRegions//admin/images/email-logo.png\" alt=\"\" /></a>\r\n\r\n    </div>\r\n    <div style=\"background:#fff; padding:44px 34px; width:526px; float:left;\">\r\n    <h1 style=\"color:#d95451; font-size:24px; font-family:Arial; font-weight:normal; margin-bottom:20px;\">Reset Password Link</h1>\r\n    <p style=\"margin-bottom:20px;\">\r\nIf you want to reset your password, click here the following link</p>\r\n <p style=\"margin-bottom:10px;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/Login/reset-password/G22KASFKIB2T\">Reset Password</a></p>\r\n    </div>\r\n</div>\r\n</div>\r\n\r\n	</body>\r\n	</html>\r\n', 'ramkumarsgurav@gmail.com', NULL, '', 1, '2024-08-20 16:00:33', NULL, NULL, NULL, 0, NULL, NULL),
(10, 'User Forgot Password on Pe Realtors', '<html>\r\n\r\n	<head>\r\n	<title>\"Forgot Password for your\"</title>\r\n	</head>\r\n	<body style=\"width:100%; font-family:Arial; font-size:13px; line-height:22px; background:#fff;  position:relative;color:#555555; margin:0px; padding:0px;\">\r\n	  	<div style=\"margin:0 auto; width:600px;\">\r\n<div style=\"background-color: #5f9116;; width:594px; float:left; padding:0px 3px 3px 3px; border:#5f9116 3px solid;\" >\r\n	<div style=\"padding:27px; width:540px; border-bottom:#5f9116 3px solid;\">\r\n    	<a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/\" target=\"_blank\" style=\"font-size:13px; color:#839ecd;text-decoration:none; text-align:center;\">\r\n    	<img src=\"http://localhost/xampp/MARS/pe_realtors/secureRegions//admin/images/email-logo.png\" alt=\"\" /></a>\r\n\r\n    </div>\r\n    <div style=\"background:#fff; padding:44px 34px; width:526px; float:left;\">\r\n    <h1 style=\"color:#d95451; font-size:24px; font-family:Arial; font-weight:normal; margin-bottom:20px;\">Reset Password Link</h1>\r\n    <p style=\"margin-bottom:20px;\">\r\nIf you want to reset your password, click here the following link</p>\r\n <p style=\"margin-bottom:10px;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/Login/reset-password/Y888PYZY52HM\">Reset Password</a></p>\r\n    </div>\r\n</div>\r\n</div>\r\n\r\n	</body>\r\n	</html>\r\n', 'ramkumarsgurav@gmail.com', NULL, '', 1, '2024-08-20 16:02:24', NULL, NULL, NULL, 0, NULL, NULL),
(11, 'User Forgot Password on Pe Realtors', '<html>\r\n\r\n	<head>\r\n	<title>\"Forgot Password for your\"</title>\r\n	</head>\r\n	<body style=\"width:100%; font-family:Arial; font-size:13px; line-height:22px; background:#fff;  position:relative;color:#555555; margin:0px; padding:0px;\">\r\n	  	<div style=\"margin:0 auto; width:600px;\">\r\n<div style=\"background-color: #5f9116;; width:594px; float:left; padding:0px 3px 3px 3px; border:#5f9116 3px solid;\" >\r\n	<div style=\"padding:27px; width:540px; border-bottom:#5f9116 3px solid;\">\r\n    	<a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/\" target=\"_blank\" style=\"font-size:13px; color:#839ecd;text-decoration:none; text-align:center;\">\r\n    	<img src=\"http://localhost/xampp/MARS/pe_realtors/secureRegions//admin/images/email-logo.png\" alt=\"\" /></a>\r\n\r\n    </div>\r\n    <div style=\"background:#fff; padding:44px 34px; width:526px; float:left;\">\r\n    <h1 style=\"color:#d95451; font-size:24px; font-family:Arial; font-weight:normal; margin-bottom:20px;\">Reset Password Link</h1>\r\n    <p style=\"margin-bottom:20px;\">\r\nIf you want to reset your password, click here the following link</p>\r\n <p style=\"margin-bottom:10px;\"><a href=\"http://localhost/xampp/MARS/pe_realtors/secureRegions/Login/reset-password/KCPUTHF9XS6H\">Reset Password</a></p>\r\n    </div>\r\n</div>\r\n</div>\r\n\r\n	</body>\r\n	</html>\r\n', 'ramkumarsgurav@gmail.com', NULL, '', 1, '2024-08-20 16:02:35', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `service` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_consent` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `contactno`, `email`, `service`, `message`, `is_consent`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'Ramkumar gurav', '1236547891', 'ram@gmail.com', 'Selling a property', 'asdfasdfasf', 1, 1, '2024-08-19 18:22:28', NULL, '2024-08-19 18:58:30', 1, 0, NULL, NULL),
(2, 'ramkumar gurav', '8549065626', 'ramkumarsgurav@gmail.com', 'Property Document related', 'asdfasdfasdf', 1, 1, '2024-08-19 19:28:29', NULL, NULL, NULL, 0, NULL, NULL),
(3, 'ramkumar gurav', '8549065626', 'ramkumarsgurav@gmail.com', 'Property Document related', 'asdfasdfasdf', 1, 1, '2024-08-19 19:32:52', NULL, NULL, NULL, 0, NULL, NULL),
(4, 'ramkumar gurav', '8549065626', 'ramkumarsgurav@gmail.com', 'Property Document related', 'asdfasdfasdf', 1, 1, '2024-08-19 19:35:03', NULL, NULL, NULL, 0, NULL, NULL),
(5, 'ramkumar gurav', '8549065626', 'ramkumarsgurav@gmail.com', 'Property Document related', 'asdfasdfasdf', 1, 1, '2024-08-19 19:35:32', NULL, NULL, NULL, 0, NULL, NULL),
(6, 'sham gurav', '8549065626', 'ramkumarsgurav@gmail.com', 'Selling a property', 'asdfasdfasdf', 1, 1, '2024-08-19 19:45:04', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facing_type`
--

CREATE TABLE `facing_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facing_type`
--

INSERT INTO `facing_type` (`id`, `name`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'North', 1, '2024-08-06 12:46:40', NULL, NULL, NULL, 0, NULL, NULL),
(2, 'East', 1, '2024-08-06 12:46:40', NULL, NULL, NULL, 0, NULL, NULL),
(3, 'South', 1, '2024-08-06 12:46:40', NULL, NULL, NULL, 0, NULL, NULL),
(4, 'West', 1, '2024-08-06 12:46:40', NULL, NULL, NULL, 0, NULL, NULL),
(5, 'South-East', 1, '2024-08-06 12:46:40', NULL, NULL, NULL, 0, NULL, NULL),
(6, 'South-West', 1, '2024-08-06 12:46:41', NULL, NULL, NULL, 0, NULL, NULL),
(7, 'North-West', 1, '2024-08-06 12:46:41', NULL, NULL, NULL, 0, NULL, NULL),
(8, 'North-East', 1, '2024-08-06 12:47:38', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gated_community_type`
--

CREATE TABLE `gated_community_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gated_community_type`
--

INSERT INTO `gated_community_type` (`id`, `name`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'Basic Apartment - Basic Amenities', 1, '2024-08-06 13:01:18', 1, NULL, NULL, 0, NULL, NULL),
(2, 'Premium Apartment - All Amenities', 1, '2024-08-06 13:01:31', 1, NULL, NULL, 0, NULL, NULL),
(3, 'Gated Community Villa', 1, '2024-08-06 13:01:38', 1, '2024-08-21 16:26:51', 1, 0, NULL, NULL),
(4, 'Others', 1, '2024-08-20 12:44:39', 1, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `join_au_cp_aur`
--

CREATE TABLE `join_au_cp_aur` (
  `id` int(11) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `admin_user_role_id` int(11) NOT NULL,
  `company_profile_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `join_au_cp_aur`
--

INSERT INTO `join_au_cp_aur` (`id`, `admin_user_id`, `admin_user_role_id`, `company_profile_id`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(2, 1, 1, 1, 1, '2024-08-21 16:27:39', NULL, NULL, NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `is_display` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `pincode`, `country_id`, `state_id`, `city_id`, `is_display`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'BLR-Bannerghatta Road', '560060', 1, 1, 1, 1, 1, '2024-08-06 15:06:19', 1, '2024-08-17 16:11:13', 1, 0, NULL, NULL),
(4, 'BLR-Jayanagar', '', 1, 1, 1, 1, 1, '2024-08-09 12:10:06', 1, NULL, NULL, 0, NULL, NULL),
(5, 'BLR-JP Nagar', '', 1, 1, 1, 1, 1, '2024-08-09 12:10:18', 1, NULL, NULL, 0, NULL, NULL),
(6, 'BLR-Rajarajeshwari Nagar', '', 1, 1, 1, 1, 1, '2024-08-09 12:10:43', 1, NULL, NULL, 0, NULL, NULL),
(7, 'BLR-Nagarbhavi', '560060', 1, 1, 1, 1, 1, '2024-08-09 12:11:09', 1, '2024-08-21 16:27:18', 1, 0, NULL, NULL),
(8, 'BLR-Kengari', '560060', 1, 1, 1, 1, 1, '2024-08-09 12:11:20', 1, '2024-08-17 16:10:43', 1, 0, NULL, NULL),
(9, 'BLR-Jeevan Bheema Nagar', '560060', 1, 1, 1, 1, 1, '2024-08-09 12:11:37', 1, '2024-08-19 11:05:24', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `main_menu_name` varchar(255) NOT NULL,
  `is_master` int(11) NOT NULL,
  `parent_module_id` int(11) NOT NULL,
  `class_name` varchar(500) DEFAULT NULL,
  `function_name` varchar(500) DEFAULT NULL,
  `count_function_name` varchar(200) DEFAULT NULL,
  `is_company_profile_id` int(11) NOT NULL DEFAULT 0 COMMENT 'count according to company_profile_id 1=yes , 0=no',
  `direct_db_count` int(11) DEFAULT NULL,
  `table_name` varchar(500) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `is_display` int(11) NOT NULL,
  `icon` varchar(500) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`, `main_menu_name`, `is_master`, `parent_module_id`, `class_name`, `function_name`, `count_function_name`, `is_company_profile_id`, `direct_db_count`, `table_name`, `position`, `is_display`, `icon`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'Role Manager', 'Masters', 1, 0, 'master/Admin-user-role-module', 'list', '', 0, 1, 'admin_user_role', 101, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-05 17:58:53', NULL, '0', NULL, NULL),
(2, 'Country', 'Masters', 1, 0, 'master/Country-module', 'list', '', 0, 1, 'country', 102, 0, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-05 19:02:01', NULL, '0', NULL, NULL),
(3, 'State', 'Masters', 1, 0, 'master/State-module', 'list', '', 0, 1, 'state', 103, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-05 17:58:56', NULL, '0', NULL, NULL),
(4, 'City', 'Masters', 1, 0, 'master/City-module', 'list', '', 0, 1, 'city', 104, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-05 17:58:59', NULL, '0', NULL, NULL),
(5, 'Designation', 'Masters', 1, 0, 'master/Designation-module', 'list', '', 0, 1, 'designation', 105, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-05 17:59:00', NULL, '0', NULL, NULL),
(6, 'Employee', 'Human Resource', 2, 0, 'human_resource/Admin-user-module', 'list', '', 0, 1, 'admin_user', 201, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-05 18:15:35', NULL, '0', NULL, NULL),
(7, 'Company Profile', 'Company Profile', 3, 0, 'company_profile/Company-profile-module', 'list', '', 0, 1, 'company_profile', 301, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-05 17:59:03', NULL, '0', NULL, NULL),
(8, 'Department', 'Masters', 1, 0, 'master/Department-module', 'list', '', 0, 1, 'department', 106, 0, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-05 19:01:56', NULL, '0', NULL, NULL),
(9, 'Location', 'Masters', 1, 0, 'master/Location-module', 'list', '', 0, 1, 'location', 107, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-05 17:59:04', NULL, '0', NULL, NULL),
(10, 'Property Sub Type', 'Masters', 1, 0, 'master/Property-sub-type-module', 'list', '', 0, 1, 'property_sub_type', 107, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-06 12:10:55', NULL, '0', NULL, NULL),
(11, 'BHK Type', 'Masters', 1, 0, 'master/Bhk-type-module', 'list', '', 0, 1, 'bhk_type', 107, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-06 12:10:55', NULL, '0', NULL, NULL),
(12, 'Gated Community Type', 'Masters', 1, 0, 'master/Gated-community-type-module', 'list', '', 0, 1, 'gated_community_type', 107, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-06 12:53:05', NULL, '0', NULL, NULL),
(13, 'Property Age', 'Masters', 1, 0, 'master/Property-age-module', 'list', '', 0, 1, 'property_age', 107, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-06 12:53:05', NULL, '0', NULL, NULL),
(14, 'Property', 'Catalog', 4, 0, 'catalog/Property-module', 'list', '', 0, 1, 'property', 401, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-07 10:52:40', NULL, '0', NULL, NULL),
(15, 'Enquiry', 'Enquiry', 5, 0, 'enquiry/Enquiry-module', 'list', '', 0, 1, 'enquiry', 501, 1, NULL, 1, '2024-08-02 12:02:43', 1, '2024-08-19 18:08:35', NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module_permission`
--

CREATE TABLE `module_permission` (
  `id` bigint(20) NOT NULL,
  `module_id` int(11) NOT NULL,
  `admin_user_role_id` int(11) NOT NULL,
  `view_module` tinyint(4) NOT NULL,
  `add_module` tinyint(4) NOT NULL,
  `update_module` tinyint(4) NOT NULL,
  `delete_module` tinyint(4) NOT NULL,
  `approval_module` tinyint(4) NOT NULL DEFAULT 0,
  `import_data` tinyint(4) NOT NULL,
  `export_data` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_permission`
--

INSERT INTO `module_permission` (`id`, `module_id`, `admin_user_role_id`, `view_module`, `add_module`, `update_module`, `delete_module`, `approval_module`, `import_data`, `export_data`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(67, 15, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(66, 14, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(65, 13, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(64, 12, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(63, 11, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(62, 10, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(61, 9, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(60, 8, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(59, 7, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(58, 6, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(57, 5, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(56, 4, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(55, 3, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(54, 2, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL),
(53, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2024-08-21 16:25:59', NULL, NULL, NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `sl_no` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `property_type_id` int(11) NOT NULL,
  `property_sub_type_id` int(11) DEFAULT NULL,
  `property_custom_id` varchar(255) DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `property_age_id` int(11) NOT NULL,
  `bhk_type_id` int(11) DEFAULT NULL,
  `plot_facing_type_id` int(11) DEFAULT NULL,
  `door_facing_type_id` int(11) DEFAULT NULL,
  `plot_dimension_sqft` varchar(255) DEFAULT NULL,
  `built_up_area` varchar(255) DEFAULT NULL,
  `in_acres` varchar(255) DEFAULT NULL,
  `in_guntas` varchar(255) DEFAULT NULL,
  `gated_community_type_id` int(11) DEFAULT NULL,
  `sale_type` tinyint(4) NOT NULL COMMENT '1 for rent,2 for lease ,3 for sale',
  `sale_duration_type` tinyint(4) NOT NULL COMMENT '1 for monthly,2 for yearly,3 for Permanent sale',
  `sale_amount` decimal(15,2) NOT NULL,
  `is_negotiable` tinyint(4) NOT NULL,
  `is_display` tinyint(4) NOT NULL,
  `youtube_link` text DEFAULT NULL,
  `description` longtext NOT NULL,
  `other_details` longtext NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `cover_image_title` varchar(255) NOT NULL,
  `cover_image_alt_title` varchar(255) NOT NULL,
  `slug_url` text NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `sl_no`, `name`, `property_type_id`, `property_sub_type_id`, `property_custom_id`, `reference_no`, `state_id`, `city_id`, `location_id`, `property_age_id`, `bhk_type_id`, `plot_facing_type_id`, `door_facing_type_id`, `plot_dimension_sqft`, `built_up_area`, `in_acres`, `in_guntas`, `gated_community_type_id`, `sale_type`, `sale_duration_type`, `sale_amount`, `is_negotiable`, `is_display`, `youtube_link`, `description`, `other_details`, `cover_image`, `cover_image_title`, `cover_image_alt_title`, `slug_url`, `meta_keyword`, `meta_description`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(7, 7, 'Real House Luxury Villa', 1, 1, 'PER-Prop-000007', 'asdf', 1, 1, 1, 1, 2, 1, 1, '0', '1450', '', '', 0, 1, 1, '250000000.00', 1, 1, '', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_7.png', 'zxcv', 'sdf', 'house-blr-vijayanagara', '3-BHK Independent House at BLR-Vijayanagar', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 1, '2024-08-08 16:20:17', 1, '2024-08-19 17:31:49', 1, 0, NULL, NULL),
(8, 8, 'Property-2', 6, 5, 'PER-Prop-000008', '', 1, 1, 7, 4, 0, 2, 0, '4000', '1150', '', '', 0, 3, 3, '1195000.00', 1, 1, 'asdfasdf', 'Commercial Site for Sale  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_8.png', 'sadf', 'sadf', 'sdaf', 'asdf', 'asdf', 1, '2024-08-09 15:45:38', 1, '2024-08-19 17:35:39', 1, 0, NULL, NULL),
(9, 9, 'Property-3', 2, 4, 'PER-Prop-000009', '', 1, 1, 5, 4, 0, 0, 3, '4000', '1150', '', '', 0, 1, 1, '95000.00', 1, 1, '', 'Commercial Space for Rent at JP Nagar  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_9.png', 'sadf', 'asdf', 'asdf', 'asdf', 'asdf', 1, '2024-08-09 15:48:00', 1, '2024-08-19 11:17:52', 1, 0, NULL, NULL),
(10, 10, 'Property-4', 7, 6, 'PER-Prop-000010', 'asdf', 1, 1, 8, 4, 0, 2, 3, '4000', '1500', '', '', 0, 3, 3, '95000.00', 1, 0, 'asdf', 'Commercial Buildign for Sale | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_10.png', 'asdf', 'asdf', 'asdf', 'sadf', 'asdf', 1, '2024-08-09 15:49:53', 1, '2024-08-09 15:53:50', 1, 0, NULL, NULL),
(11, 11, 'Rent Residential Property-1', 1, 1, 'PER-Prop-000011', '', 1, 1, 1, 1, 2, 1, 1, '', '1450', '', '', 0, 1, 1, '25000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_11.jpg', 'Rent Residential Property-1', 'Rent Residential Property-1', '3-bhk-independent-house-at-blr-vijayanagar-east-facing-door-i-north-facing-site-3-attached-bathrooms-covered-car-parking-30-sq-ft-road-width-prefered-vegitarians-10-years-old-property', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 1, '2024-08-20 12:43:07', 1, '2024-08-20 12:43:07', NULL, 0, NULL, NULL),
(12, 12, 'Rent Residential Property-2', 1, 2, 'PER-Prop-000012', '', 1, 1, 4, 3, 3, 0, 2, '', '1520', '', '', 1, 1, 1, '35000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_12.jpg', 'Rent Residential Property-2', 'Rent Residential Property-2', '3-bhk-independent-house-at-blr-vijayanagar-east-facing-door-i-north-facing-site-3-attached-bathrooms-covered-car-parking-30-sq-ft-road-width-prefered-vegitarians-10-years-old-property', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 1, '2024-08-20 12:54:09', 1, '2024-08-20 12:54:09', NULL, 0, NULL, NULL),
(13, 13, 'Rent Residential Property-3', 1, 3, 'PER-Prop-000013', '', 1, 1, 5, 4, 4, 3, 3, '', '1300', '', '', 0, 1, 1, '42000.00', 1, 1, '', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_13.jpg', 'Rent Residential Property-3', 'Rent Residential Property-3', 'rent-residential-property-3-3-bhk-independent-house-at-blr-vijayanagar-east-facing-door-i-north-facing-site-3-attached-bathrooms-covered-car-parking-30-sq-ft-road-width-prefered-vegitarians-10-years-old-property', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', '3-BHK Independent House at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 1, '2024-08-20 12:58:55', 1, '2024-08-20 12:58:55', NULL, 0, NULL, NULL),
(14, 14, 'Sale Residential Site Property-1', 5, 0, 'PER-Prop-000014', '', 1, 1, 6, 4, 0, 3, 0, '1200', '', '', '', 0, 3, 3, '1000000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', '30x40 Site for Sale at BLR-Vijayanagar | East Facing Door I | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_14.jpg', 'Sale Residential Site Property-1', 'Sale Residential Site Property-1', '30x40-site-for-sale-at-blr-vijayanagar-east-facing-door-i-3-attached-bathrooms-covered-car-parking-30-sq-ft-road-width-10-years-old-property', '30x40 Site for Sale at BLR-Vijayanagar | East Facing Door I | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  |  10 Years Old Property', '30x40 Site for Sale at BLR-Vijayanagar | East Facing Door I | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  |  10 Years Old Property', 1, '2024-08-20 13:23:59', 1, '2024-08-20 13:23:59', NULL, 0, NULL, NULL),
(15, 15, 'Sale Residential Flat Property-1', 3, 0, 'PER-Prop-000015', '', 1, 1, 6, 4, 4, 3, 3, '', '1300', '', '', 2, 3, 3, '4200000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', '3-BHK Flat for Sale at BLR-Vijayanagar | East Facing Door I | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_15.jpg', 'Sale Residential Flat Property-1', 'Sale Residential Flat Property-1', 'sale-residential-flat-3-bhk-flat-for-sale-at-blr-vijayanagar-east-facing-door-i-3-attached-bathrooms-covered-car-parking-30-sq-ft-road-width-10-years-old-property', '3-BHK Flat for Sale at BLR-Vijayanagar | East Facing Door I | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  |  10 Years Old Property', '3-BHK Flat for Sale at BLR-Vijayanagar | East Facing Door I | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  |  10 Years Old Property', 1, '2024-08-20 13:44:11', 1, '2024-08-20 13:44:12', NULL, 0, NULL, NULL),
(16, 16, 'Sale Residential House Property-1', 4, 0, 'PER-Prop-000016', '', 1, 1, 6, 4, 4, 3, 3, '1200', '1300', '', '', 0, 3, 3, '12000000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', '3-BHK House for Sale at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_16.jpg', 'Sale Residential House Property-1', 'Sale Residential House Property-1', '3-bhk-house-for-sale-at-blr-vijayanagar-east-facing-door-i-north-facing-site-4-attached-bathrooms-covered-car-parking-30-sq-ft-road-width-prefered-vegitarians-10-years-old-property', '3-BHK House for Sale at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', '3-BHK House for Sale at BLR-Vijayanagar | East Facing Door I | North Facing Site | 3 attached Bathrooms | Covered Car Parking  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 1, '2024-08-20 13:49:35', 1, '2024-08-20 13:49:35', NULL, 0, NULL, NULL),
(17, 17, 'Rent Commercial Property-1', 2, 4, 'PER-Prop-000017', '', 1, 1, 5, 4, 0, 0, 3, '4000', '1150', '', '', 0, 1, 1, '95000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', 'Commercial Space for Rent at JP Nagar  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_17.jpg', 'Rent Commercial Property-1', 'Rent Commercial Property-1', 'commercial-space-for-rent-at-jp-nagar-30-sq-ft-road-width-prefered-vegitarians-10-years-old-property', 'Commercial Space for Rent at JP Nagar  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Commercial Space for Rent at JP Nagar  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 1, '2024-08-20 14:52:52', 1, '2024-08-20 14:52:52', NULL, 0, NULL, NULL),
(18, 18, 'Sale Commercial Site Property-1', 6, 0, 'PER-Prop-000018', '', 1, 1, 7, 4, 0, 2, 0, '4000', '', '', '', 0, 3, 3, '195000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', 'Commercial Site for Sale  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_18.jpg', 'Sale Commercial Site Property-1', 'Sale Commercial Site Property-1', 'commercial-site-for-sale-30-sq-ft-road-width-prefered-vegitarians-10-years-old-property', 'Commercial Site for Sale  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Commercial Site for Sale  | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 1, '2024-08-20 14:57:26', 1, '2024-08-20 16:37:03', 1, 0, NULL, NULL),
(19, 19, 'Sale Commercial Building Property-1', 7, 6, 'PER-Prop-000019', '', 1, 1, 8, 4, 0, 3, 3, '4000', '1150', '', '', 0, 1, 1, '95000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', 'Commercial Buildign for Sale | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_19.jpg', 'Sale Commercial Building Property-1', 'Sale Commercial Building Property-1', 'commercial-buildign-for-sale-30-sq-ft-road-width-prefered-vegitarians-10-years-old-property', 'Commercial Buildign for Sale | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 'Commercial Buildign for Sale | 30 sq ft Road Width  | Prefered Vegitarians  |  10 Years Old Property', 1, '2024-08-20 15:03:29', 1, '2024-08-20 15:27:29', 1, 0, NULL, NULL),
(20, 20, 'Sale Agriculture Property-1', 8, 0, 'PER-Prop-000020', '', 1, 1, 9, 0, 0, 0, 0, '', '', '1.5', '45', 0, 3, 3, '10500000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', '4 acers agriculature land for sale', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_20.png', 'Sale Agriculture Property-1', 'Sale Agriculture Property-1', '4-acers-agriculature-land-for-sale', '4 acers agriculature land for sale', '4 acers agriculature land for sale', 1, '2024-08-20 15:06:55', 1, '2024-08-21 17:04:14', 1, 0, NULL, NULL),
(21, 21, 'New Project-1', 9, 0, 'PER-Prop-000021', '', 1, 1, 8, 0, 0, 0, 0, '', '', '', '', 0, 3, 3, '10500000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', 'Premium Buildign is 2 BHK brand neww in', 'Close to IIMB arear |  Close to nearby schools', 'cover_image_21.png', 'New Project-1', 'New Project-1', 'premium-buildign-is-2-bhk-brand-neww-in', 'Premium Buildign is 2 BHK brand neww in', 'Premium Buildign is 2 BHK brand neww in', 1, '2024-08-20 15:09:41', 1, '2024-08-20 15:38:03', 1, 0, NULL, NULL),
(22, 22, 'Residential Project Banashankari', 9, 0, 'PER-Prop-000022', '', 1, 1, 8, 0, 0, 0, 0, '', '', '', '', 0, 3, 3, '10500000.00', 1, 1, 'https://www.youtube.com/watch?v=YkxrbxoqHDw', 'safd', 'asdf', 'cover_image_22.jpg', 'sadf', 'asdf', 'text2', 'asdf', 'asdf', 1, '2024-08-21 12:44:41', 1, '2024-08-21 12:46:54', 1, 0, NULL, NULL),
(23, 23, 'Rent Residential property 4 Hi How are you', 2, 4, 'PER-Prop-000023', '', 1, 1, 9, 1, 0, 0, 1, '123', '1243', '', '', 0, 1, 1, '10500000.00', 1, 1, '', 'asdf', 'asdf', 'cover_image_23.png', 'sadf', 'sdaf', 'text', 'asdf', 'dfsaf', 1, '2024-08-21 12:45:41', 1, '2024-08-21 13:48:57', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_age`
--

CREATE TABLE `property_age` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_age`
--

INSERT INTO `property_age` (`id`, `name`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'Less than 1 Year', 1, '2024-08-06 13:09:18', 1, NULL, NULL, 0, NULL, NULL),
(2, '1-To-5 Years', 1, '2024-08-06 13:09:25', 1, NULL, NULL, 0, NULL, NULL),
(3, '5-To-10 Years', 1, '2024-08-06 13:09:34', 1, NULL, NULL, 0, NULL, NULL),
(4, '10-To-15 Years', 1, '2024-08-06 13:09:43', 1, NULL, NULL, 0, NULL, NULL),
(5, '15-To-20 Years', 1, '2024-08-06 13:09:51', 1, '2024-08-21 16:26:43', 1, 0, NULL, NULL),
(6, 'More than 20 Years', 1, '2024-08-06 13:10:01', 1, '2024-08-06 13:10:58', 1, 0, NULL, NULL),
(7, 'Others', 1, '2024-08-20 12:48:35', 1, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_gallery_image`
--

CREATE TABLE `property_gallery_image` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `file_title` varchar(255) DEFAULT NULL,
  `file_alt_title` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `position` int(11) DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_gallery_image`
--

INSERT INTO `property_gallery_image` (`id`, `property_id`, `file_title`, `file_alt_title`, `file_name`, `position`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 7, 'asd title', 'asdf alt title', 'property_gallery_image_1.png', 2, 1, '2024-08-08 19:44:08', 1, '2024-08-19 17:31:36', NULL, 0, NULL, NULL),
(2, 7, 'qwer', 'qwerqwer', 'property_gallery_image_2.png', 1, 1, '2024-08-08 19:44:08', 1, '2024-08-19 17:31:36', NULL, 0, NULL, NULL),
(3, 11, 'Rent Residential Property-1', 'Rent Residential Property-1', 'property_gallery_image_3.jpg', 1, 1, '2024-08-20 12:43:07', 1, '2024-08-20 12:43:07', NULL, 0, NULL, NULL),
(4, 11, 'Rent Residential Property-1', 'Rent Residential Property-1', 'property_gallery_image_4.jpg', 1, 1, '2024-08-20 12:43:07', 1, '2024-08-20 12:43:07', NULL, 0, NULL, NULL),
(5, 11, 'Rent Residential Property-1', 'Rent Residential Property-1', 'property_gallery_image_5.jpg', 1, 1, '2024-08-20 12:43:07', 1, '2024-08-20 12:43:07', NULL, 0, NULL, NULL),
(6, 12, 'Rent Residential Property-2', 'Rent Residential Property-2', 'property_gallery_image_6.jpg', 1, 1, '2024-08-20 12:54:09', 1, '2024-08-20 12:54:09', NULL, 0, NULL, NULL),
(7, 12, 'Rent Residential Property-2', 'Rent Residential Property-2', 'property_gallery_image_7.jpg', 1, 1, '2024-08-20 12:54:09', 1, '2024-08-20 12:54:09', NULL, 0, NULL, NULL),
(8, 12, 'Rent Residential Property-2', 'Rent Residential Property-2', 'property_gallery_image_8.jpg', 1, 1, '2024-08-20 12:54:09', 1, '2024-08-20 12:54:09', NULL, 0, NULL, NULL),
(9, 13, 'Rent Residential Property-3', 'Rent Residential Property-3', 'property_gallery_image_9.jpg', 1, 1, '2024-08-20 12:58:55', 1, '2024-08-20 12:58:55', NULL, 0, NULL, NULL),
(10, 13, 'Rent Residential Property-3', 'Rent Residential Property-3', 'property_gallery_image_10.jpg', 1, 1, '2024-08-20 12:58:55', 1, '2024-08-20 12:58:55', NULL, 0, NULL, NULL),
(11, 13, 'Rent Residential Property-3', 'Rent Residential Property-3', 'property_gallery_image_11.jpg', 1, 1, '2024-08-20 12:58:55', 1, '2024-08-20 12:58:55', NULL, 0, NULL, NULL),
(12, 14, 'Sale Residential Site Property-1', 'Sale Residential Site Property-1', 'property_gallery_image_12.jpg', 2, 1, '2024-08-20 13:23:59', 1, '2024-08-20 13:55:56', NULL, 0, NULL, NULL),
(13, 14, 'Sale Residential Site Property-1', 'Sale Residential Site Property-1', 'property_gallery_image_13.jpg', 1, 1, '2024-08-20 13:23:59', 1, '2024-08-20 13:23:59', NULL, 0, NULL, NULL),
(14, 14, 'Sale Residential Site Property-1', 'Sale Residential Site Property-1', 'property_gallery_image_14.png', 3, 1, '2024-08-20 13:23:59', 1, '2024-08-20 13:55:56', NULL, 0, NULL, NULL),
(15, 15, 'Sale Residential Flat Property-1', 'Sale Residential Flat Property-1', 'property_gallery_image_15.jpg', 1, 1, '2024-08-20 13:44:12', 1, '2024-08-20 13:44:12', NULL, 0, NULL, NULL),
(16, 15, 'Sale Residential Flat Property-1', 'Sale Residential Flat Property-1', 'property_gallery_image_16.jpg', 1, 1, '2024-08-20 13:44:12', 1, '2024-08-20 13:44:12', NULL, 0, NULL, NULL),
(17, 15, 'Sale Residential Flat Property-1', 'Sale Residential Flat Property-1', 'property_gallery_image_17.jpg', 1, 1, '2024-08-20 13:44:12', 1, '2024-08-20 13:44:12', NULL, 0, NULL, NULL),
(18, 16, 'Sale Residential House Property-1', 'Sale Residential House Property-1', 'property_gallery_image_18.jpg', 1, 1, '2024-08-20 13:49:35', 1, '2024-08-20 13:49:35', NULL, 0, NULL, NULL),
(19, 16, 'Sale Residential House Property-1', 'Sale Residential House Property-1', 'property_gallery_image_19.jpg', 1, 1, '2024-08-20 13:49:35', 1, '2024-08-20 13:49:35', NULL, 0, NULL, NULL),
(20, 16, 'Sale Residential House Property-1', 'Sale Residential House Property-1', 'property_gallery_image_20.jpg', 1, 1, '2024-08-20 13:49:35', 1, '2024-08-20 13:49:35', NULL, 0, NULL, NULL),
(21, 17, 'Rent Commercial Property-1', 'Rent Commercial Property-1', 'property_gallery_image_21.jpg', 1, 1, '2024-08-20 14:52:52', 1, '2024-08-20 14:52:52', NULL, 0, NULL, NULL),
(22, 17, 'Rent Commercial Property-1', 'Rent Commercial Property-1', 'property_gallery_image_22.jpg', 1, 1, '2024-08-20 14:52:52', 1, '2024-08-20 14:52:52', NULL, 0, NULL, NULL),
(23, 17, 'Rent Commercial Property-1', 'Rent Commercial Property-1', 'property_gallery_image_23.jpg', 1, 1, '2024-08-20 14:52:52', 1, '2024-08-20 14:52:52', NULL, 0, NULL, NULL),
(24, 18, 'Sale Commercial Site Property-1', 'Sale Commercial Site Property-1', 'property_gallery_image_24.jpg', 2, 1, '2024-08-20 14:57:26', 1, '2024-08-20 14:57:45', NULL, 0, NULL, NULL),
(25, 18, 'Sale Commercial Site Property-1', 'Sale Commercial Site Property-1', 'property_gallery_image_25.jpg', 3, 1, '2024-08-20 14:57:27', 1, '2024-08-20 14:57:45', NULL, 0, NULL, NULL),
(26, 18, 'Sale Commercial Site Property-1', 'Sale Commercial Site Property-1', 'property_gallery_image_26.jpg', 1, 1, '2024-08-20 14:57:27', 1, '2024-08-20 14:57:27', NULL, 0, NULL, NULL),
(27, 19, 'Sale Commercial Building Property-1', 'Sale Commercial Building Property-1', 'property_gallery_image_27.jpg', 1, 1, '2024-08-20 15:03:29', 1, '2024-08-20 15:03:29', NULL, 0, NULL, NULL),
(28, 19, 'Sale Commercial Building Property-1', 'Sale Commercial Building Property-1', 'property_gallery_image_28.jpg', 1, 1, '2024-08-20 15:03:29', 1, '2024-08-20 15:03:29', NULL, 0, NULL, NULL),
(29, 19, 'Sale Commercial Building Property-1', 'Sale Commercial Building Property-1', 'property_gallery_image_29.jpg', 1, 1, '2024-08-20 15:03:29', 1, '2024-08-20 15:03:29', NULL, 0, NULL, NULL),
(30, 20, 'Sale Agriculture Property-1', 'Sale Agriculture Property-1', 'property_gallery_image_30.png', 1, 1, '2024-08-20 15:06:55', 1, '2024-08-20 15:06:55', NULL, 0, NULL, NULL),
(31, 20, 'Sale Agriculture Property-1', 'Sale Agriculture Property-1', 'property_gallery_image_31.png', 1, 1, '2024-08-20 15:06:55', 1, '2024-08-20 15:06:55', NULL, 0, NULL, NULL),
(32, 21, 'New Project-1', 'New Project-1', 'property_gallery_image_32.png', 1, 1, '2024-08-20 15:09:41', 1, '2024-08-20 15:09:41', NULL, 0, NULL, NULL),
(33, 21, 'New Project-1', 'New Project-1', 'property_gallery_image_33.png', 1, 1, '2024-08-20 15:09:41', 1, '2024-08-20 15:09:41', NULL, 0, NULL, NULL),
(34, 19, 'Sale Commercial Building Property-1', 'Sale Commercial Building Property-1', 'property_gallery_image_34.png', 1, 1, '2024-08-20 15:27:29', 1, '2024-08-20 15:27:29', NULL, 0, NULL, NULL),
(35, 21, '	New Project-1', '	New Project-1', 'property_gallery_image_35.png', 1, 1, '2024-08-20 15:38:03', 1, '2024-08-20 15:38:03', NULL, 0, NULL, NULL),
(36, 20, 'asdf', 'asdf', 'property_gallery_image_36.png', 1, 1, '2024-08-21 17:01:40', 1, '2024-08-21 17:01:40', NULL, 0, NULL, NULL),
(37, 20, 'safd', 'sdaf', 'property_gallery_image_37.jpeg', 1, 1, '2024-08-21 17:04:14', 1, '2024-08-21 17:04:15', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_sub_type`
--

CREATE TABLE `property_sub_type` (
  `id` int(11) NOT NULL,
  `property_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_sub_type`
--

INSERT INTO `property_sub_type` (`id`, `property_type_id`, `name`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 1, 'Independent House', 1, '2024-08-09 12:16:42', 1, NULL, NULL, 0, NULL, NULL),
(2, 1, 'Flat', 1, '2024-08-09 12:17:06', 1, NULL, NULL, 0, NULL, NULL),
(3, 1, 'Builder/Owner\'s Floor', 1, '2024-08-09 12:17:10', 1, NULL, NULL, 0, NULL, NULL),
(4, 2, 'Commercial Space for office Purpose (Furnished)', 1, '2024-08-09 12:20:12', 1, '2024-08-21 16:27:09', 1, 0, NULL, NULL),
(5, 6, 'Commercial Space for office Purpose (Furnished)', 1, '2024-08-09 12:20:35', 1, NULL, NULL, 0, NULL, NULL),
(6, 7, 'Commercial Space for office Purpose (Furnished)', 1, '2024-08-09 12:20:57', 1, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `name`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 'Rent_Residential', 1, '2024-08-06 11:26:01', NULL, '2024-08-06 11:33:31', NULL, 0, NULL, NULL),
(2, 'Rent_Commercial', 1, '2024-08-06 11:33:21', NULL, NULL, NULL, 0, NULL, NULL),
(3, 'Sale_Residential Flat', 1, '2024-08-06 11:33:21', NULL, NULL, NULL, 0, NULL, NULL),
(4, 'Sale_Residential House', 1, '2024-08-06 11:33:21', NULL, NULL, NULL, 0, NULL, NULL),
(5, 'Sale_Residential Site', 1, '2024-08-06 11:33:21', NULL, NULL, NULL, 0, NULL, NULL),
(6, 'Sale_Commercial Site', 1, '2024-08-06 11:33:21', NULL, NULL, NULL, 0, NULL, NULL),
(7, 'Sale_Commercial Building', 1, '2024-08-06 11:33:21', NULL, NULL, NULL, 0, NULL, NULL),
(8, 'Sale_Agriculture', 1, '2024-08-06 11:33:21', NULL, NULL, NULL, 0, NULL, NULL),
(9, 'New Projects', 1, '2024-08-06 11:33:21', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_code` varchar(255) DEFAULT NULL,
  `is_display` int(11) NOT NULL DEFAULT 1,
  `province_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT '0',
  `is_deleted_on` datetime DEFAULT NULL,
  `is_deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `name`, `state_code`, `is_display`, `province_code`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `is_deleted`, `is_deleted_on`, `is_deleted_by`) VALUES
(1, 1, 'Karnataka', '29', 1, NULL, 1, '2024-08-09 12:00:25', 1, '2024-08-19 10:56:58', 1, '0', NULL, NULL),
(2, 1, 'Tamilnadu', '23', 1, NULL, 1, '2024-08-19 15:38:57', 1, '2024-08-21 16:26:12', 1, '0', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_file`
--
ALTER TABLE `admin_user_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_role`
--
ALTER TABLE `admin_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `au_pwd_reset_token`
--
ALTER TABLE `au_pwd_reset_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhk_type`
--
ALTER TABLE `bhk_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_log`
--
ALTER TABLE `email_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facing_type`
--
ALTER TABLE `facing_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `gated_community_type`
--
ALTER TABLE `gated_community_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `join_au_cp_aur`
--
ALTER TABLE `join_au_cp_aur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permission`
--
ALTER TABLE `module_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_age`
--
ALTER TABLE `property_age`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `property_gallery_image`
--
ALTER TABLE `property_gallery_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_sub_type`
--
ALTER TABLE `property_sub_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_user_file`
--
ALTER TABLE `admin_user_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admin_user_role`
--
ALTER TABLE `admin_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `au_pwd_reset_token`
--
ALTER TABLE `au_pwd_reset_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bhk_type`
--
ALTER TABLE `bhk_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_log`
--
ALTER TABLE `email_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facing_type`
--
ALTER TABLE `facing_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gated_community_type`
--
ALTER TABLE `gated_community_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `join_au_cp_aur`
--
ALTER TABLE `join_au_cp_aur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `module_permission`
--
ALTER TABLE `module_permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `property_age`
--
ALTER TABLE `property_age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_gallery_image`
--
ALTER TABLE `property_gallery_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `property_sub_type`
--
ALTER TABLE `property_sub_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
