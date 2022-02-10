-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 01:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `name`, `short_code`, `description`, `image`, `icon`, `created_date`, `status`) VALUES
(1, 'Activity 1', 'ACT', 'hello', '6111033e87cf6.jpg', '6111033e8963f.jpg', '2021-08-09 10:28:14', 'Trash'),
(2, 'Swimming', 'SWM', 'Practice swimming underwater', '6111130844e4c.jpg', '61111308459b8.png', '2021-08-09 11:35:36', 'Active'),
(3, 'Run', 'RUN', 'You must do the thing you think you cannot do...', '6111144a49a42.jpg', '6111144a4a4bf.png', '2021-08-09 11:40:58', 'Active'),
(4, 'Cycle', 'CYL', 'A bicycle ride around the world begins with a single pedal stroke', '61111ac09bfd2.jpg', '611114ca28539.png', '2021-08-09 11:43:06', 'Active'),
(5, 'Calistenics', 'CAL', 'Calisthenics are exercises that don\'t rely on anything but a person\'s own body weight.', '61111d063b692.jpg', '61111d063c133.jpg', '2021-08-09 12:18:14', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `admin_id` int(11) NOT NULL,
  `adminname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_text` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`admin_id`, `adminname`, `username`, `email`, `password`, `password_text`, `profile`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Admin', 'admin', 'testuserlt1@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '61f3925846fab.jpg', 'Active', '2022-01-25 12:31:23', '2022-01-25 12:31:23'),
(2, 'Subadmin', 'viswatech', 'test@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '61f38e84ec021.jpg', 'Active', '2022-01-25 12:31:41', '2022-01-25 12:31:41'),
(3, 'Subadmin', 'jamal', 'test12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '6200e4787b130.jpg', 'Trash', '2022-02-07 09:20:56', NULL),
(4, 'Subadmin', 'Google', 'goog@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '6202605d024ea.jpg', 'Trash', '2022-02-08 12:21:49', NULL),
(5, 'Subadmin', 'nivy', 'nivy@gmail.com', '1551a67bfd7d9d27d7a6c499fb047041', 'nivy12', '6203716c46767.png', 'Trash', '2022-02-09 07:46:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `block_id` int(11) NOT NULL,
  `phase_id` int(11) DEFAULT NULL,
  `block_name` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`block_id`, `phase_id`, `block_name`, `status`, `created_date`, `modified_date`) VALUES
(8, 9, 'BLOCK A', 'Active', '2022-02-08 09:56:00', NULL),
(9, 9, 'BLOCK B', 'Active', '2022-02-08 09:56:31', NULL),
(10, 9, 'BLOCK C', 'Active', '2022-02-08 09:56:41', NULL),
(11, 9, 'BLOCK D', 'Active', '2022-02-08 09:56:50', NULL),
(12, 9, 'BLOCK E', 'Active', '2022-02-08 09:57:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cardtypes`
--

CREATE TABLE `cardtypes` (
  `cardtype_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardtypes`
--

INSERT INTO `cardtypes` (`cardtype_id`, `type`, `created_date`, `status`) VALUES
(1, 'Main', '2021-08-10 10:23:27', 'Active'),
(2, 'Drill', '2021-08-10 10:23:45', 'Active'),
(3, 'Play', '2021-08-10 10:23:45', 'Active'),
(4, 'Stch', '2021-08-10 10:24:22', 'Active'),
(5, 'Intr', '2021-08-10 10:24:22', 'Active'),
(6, 'Teac', '2021-08-10 10:24:56', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_code`, `country_name`, `image`, `status`) VALUES
(1, '+93', 'Afghanistan (‫افغانستان‬‎)', 'flag-400.png', 'Trash'),
(2, '+93', 'Afghanistan (‫افغانستان‬‎)', '6204a71c9a6b6.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `date_of_application` varchar(255) DEFAULT NULL,
  `applicant_name` varchar(255) NOT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `co_applicant_name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` enum('Active','Inactive','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `application_number`, `date_of_application`, `applicant_name`, `fathers_name`, `co_applicant_name`, `age`, `gender`, `phone_code`, `phone`, `email`, `occupation`, `experience`, `income`, `permanent_address`, `present_address`, `photo`, `created_date`, `modified_date`, `status`) VALUES
(14, '1001', '09-02-2022', 'jamal', 'meeran', NULL, 25, 'Male', '+91', '9996663330', 'test@gmail.com', 'IT department', 2, '25000', NULL, NULL, '6204ff50f17b6.png', '2022-02-10 12:04:32', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` int(11) NOT NULL,
  `pack` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `pack`, `discount`, `validity`, `status`, `created_date`, `modified_date`) VALUES
(1, 7, 65, '0000-00-00', 'Trash', '2021-07-29 06:39:01', NULL),
(2, 7, 65, '0000-00-00', 'Trash', '2021-07-29 06:39:14', NULL),
(3, 7, 65, '0000-00-00', 'Trash', '2021-07-29 06:40:07', NULL),
(4, 8, 68, '0000-00-00', 'Trash', '2021-07-29 06:43:47', NULL),
(5, 11, 55, '0000-00-00', 'Trash', '2021-07-29 06:46:07', NULL),
(6, 12, 100, '20-07-2021', 'Active', '2021-07-29 06:49:36', NULL),
(7, 8, 50, '21-07-2021', 'Active', '2021-07-29 06:51:51', NULL),
(8, 11, 85, '14-01-1970', 'Inactive', '2021-07-29 06:57:09', '2021-07-29 07:31:33'),
(9, 7, 65, '20-07-2021', 'Active', '2021-07-29 07:02:18', NULL),
(10, 7, 98, '13-07-2021', 'Active', '2021-07-29 07:02:42', NULL),
(11, 7, 10, '06-08-2021', 'Active', '2021-07-29 09:42:35', NULL),
(12, 19, 10, '18-08-2021', 'Active', '2021-08-07 12:57:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `family_details`
--

CREATE TABLE `family_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `son_name` varchar(255) DEFAULT NULL,
  `son_age` varchar(255) DEFAULT NULL,
  `son_profession` varchar(255) DEFAULT NULL,
  `son_school` varchar(255) DEFAULT NULL,
  `son_class` varchar(255) DEFAULT NULL,
  `daughter_name` varchar(255) DEFAULT NULL,
  `daughter_age` varchar(255) DEFAULT NULL,
  `daughter_profession` varchar(255) DEFAULT NULL,
  `daughter_school` varchar(255) DEFAULT NULL,
  `daughter_class` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_details`
--

INSERT INTO `family_details` (`id`, `customer_id`, `son_name`, `son_age`, `son_profession`, `son_school`, `son_class`, `daughter_name`, `daughter_age`, `daughter_profession`, `daughter_school`, `daughter_class`, `status`) VALUES
(6, 14, 'johnson', '12', 'Student', 'MIS', '4th std', NULL, NULL, NULL, NULL, NULL, 'Active'),
(7, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active'),
(8, 14, NULL, NULL, NULL, NULL, NULL, 'malli', '5', 'Children', NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `flatnumbers`
--

CREATE TABLE `flatnumbers` (
  `flatnumber_id` int(11) NOT NULL,
  `phase_id` int(11) DEFAULT NULL,
  `block_id` int(11) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `flattype_id` int(11) DEFAULT NULL,
  `flatnumber` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flatnumbers`
--

INSERT INTO `flatnumbers` (`flatnumber_id`, `phase_id`, `block_id`, `floor_id`, `flattype_id`, `flatnumber`, `status`, `created_date`, `modified_date`) VALUES
(3, 9, 8, 7, 9, '101', 'Active', '2022-02-08 10:18:28', '2022-02-08 10:26:35'),
(4, 9, 8, 7, 8, '110', 'Active', '2022-02-08 10:26:58', NULL),
(5, 9, 8, 7, 8, '111', 'Active', '2022-02-08 10:27:12', NULL),
(6, 9, 8, 7, 10, '120', 'Active', '2022-02-08 10:27:31', NULL),
(7, 9, 8, 7, 12, '105', 'Active', '2022-02-08 10:28:08', NULL),
(8, 9, 8, 7, 12, '114', 'Active', '2022-02-08 10:28:23', NULL),
(9, 9, 8, 7, 9, '102', 'Active', '2022-02-08 10:28:46', NULL),
(10, 9, 8, 7, 9, '103', 'Active', '2022-02-08 10:29:07', NULL),
(11, 9, 8, 7, 9, '104', 'Active', '2022-02-08 10:29:51', NULL),
(12, 9, 8, 7, 9, '108', 'Active', '2022-02-08 10:30:17', NULL),
(13, 9, 8, 7, 9, '109', 'Active', '2022-02-08 10:30:46', NULL),
(14, 9, 8, 7, 9, '119', 'Active', '2022-02-08 10:32:17', NULL),
(15, 9, 8, 7, 9, '118', 'Active', '2022-02-08 10:32:28', NULL),
(16, 9, 8, 7, 9, '117', 'Active', '2022-02-08 10:32:36', NULL),
(17, 9, 8, 7, 9, '113', 'Active', '2022-02-08 10:32:47', '2022-02-08 10:35:21'),
(18, 9, 8, 7, 9, '112', 'Active', '2022-02-08 10:32:55', NULL),
(19, 9, 8, 8, 8, '210', 'Active', '2022-02-08 11:44:49', NULL),
(20, 9, 8, 8, 8, '211', 'Active', '2022-02-08 11:45:02', NULL),
(21, 9, 8, 8, 10, '220', 'Active', '2022-02-08 11:45:29', '2022-02-08 11:47:14'),
(22, 9, 8, 8, 12, '205', 'Active', '2022-02-08 11:46:18', NULL),
(23, 9, 8, 8, 12, '216', 'Active', '2022-02-08 11:46:31', NULL),
(24, 9, 8, 8, 9, '212', 'Active', '2022-02-08 11:49:09', NULL),
(25, 9, 8, 8, 9, '213', 'Active', '2022-02-08 11:49:20', NULL),
(26, 9, 8, 8, 9, '217', 'Active', '2022-02-08 11:49:29', NULL),
(27, 9, 8, 8, 9, '218', 'Active', '2022-02-08 11:49:45', NULL),
(28, 9, 8, 8, 9, '219', 'Active', '2022-02-08 11:49:55', NULL),
(29, 9, 8, 8, 9, '209', 'Active', '2022-02-08 11:50:04', NULL),
(30, 9, 8, 8, 9, '208', 'Active', '2022-02-08 11:50:19', NULL),
(31, 9, 8, 8, 9, '204', 'Active', '2022-02-08 11:50:27', NULL),
(32, 9, 8, 8, 9, '203', 'Active', '2022-02-08 11:50:35', NULL),
(33, 9, 8, 8, 9, '202', 'Active', '2022-02-08 11:50:46', NULL),
(34, 9, 8, 8, 9, '201', 'Active', '2022-02-08 11:50:55', NULL),
(35, 9, 8, 9, 10, '320', 'Active', '2022-02-08 11:54:15', NULL),
(36, 9, 8, 10, 10, '420', 'Active', '2022-02-08 11:54:34', NULL),
(37, 9, 8, 11, 10, '520', 'Active', '2022-02-08 11:54:49', NULL),
(38, 9, 8, 11, 8, '511', 'Active', '2022-02-08 11:55:46', NULL),
(39, 9, 8, 11, 8, '510', 'Active', '2022-02-08 11:55:59', NULL),
(40, 9, 8, 10, 8, '411', 'Active', '2022-02-08 11:56:12', NULL),
(41, 9, 8, 10, 8, '410', 'Active', '2022-02-08 11:56:32', NULL),
(42, 9, 8, 9, 8, '311', 'Active', '2022-02-08 11:56:44', NULL),
(43, 9, 8, 9, 8, '310', 'Active', '2022-02-08 11:56:52', NULL),
(44, 9, 8, 9, 12, '306', 'Active', '2022-02-08 11:57:51', '2022-02-09 14:37:58'),
(45, 9, 8, 9, 12, '316', 'Active', '2022-02-08 11:58:08', NULL),
(46, 9, 8, 10, 12, '406', 'Active', '2022-02-08 11:58:23', NULL),
(47, 9, 8, 10, 12, '416', 'Active', '2022-02-08 11:59:01', NULL),
(48, 9, 8, 11, 12, '506', 'Active', '2022-02-08 11:59:22', NULL),
(49, 9, 8, 11, 12, '516', 'Active', '2022-02-08 11:59:35', NULL),
(50, 9, 8, 9, 9, '301', 'Active', '2022-02-09 08:51:53', NULL),
(51, 9, 8, 9, 9, '302', 'Active', '2022-02-09 08:52:53', NULL),
(52, 9, 8, 9, 9, '303', 'Active', '2022-02-09 08:53:15', NULL),
(53, 9, 8, 9, 9, '304', 'Active', '2022-02-09 08:54:22', NULL),
(54, 9, 8, 9, 9, '308', 'Active', '2022-02-09 08:54:51', NULL),
(55, 9, 8, 9, 9, '309', 'Active', '2022-02-09 08:54:58', NULL),
(56, 9, 8, 9, 9, '312', 'Active', '2022-02-09 08:55:06', NULL),
(57, 9, 8, 9, 9, '313', 'Active', '2022-02-09 08:56:22', NULL),
(58, 9, 8, 9, 9, '317', 'Active', '2022-02-09 08:56:34', NULL),
(59, 9, 8, 9, 9, '318', 'Active', '2022-02-09 08:56:46', NULL),
(60, 9, 8, 9, 9, '319', 'Active', '2022-02-09 08:56:54', NULL),
(61, 9, 8, 10, 9, '419', 'Active', '2022-02-09 09:00:22', NULL),
(62, 9, 8, 10, 9, '418', 'Active', '2022-02-09 09:00:32', NULL),
(63, 9, 8, 10, 9, '417', 'Active', '2022-02-09 09:00:42', NULL),
(64, 9, 8, 10, 9, '414', 'Active', '2022-02-09 09:03:52', NULL),
(65, 9, 8, 10, 9, '412', 'Active', '2022-02-09 09:04:00', NULL),
(66, 9, 8, 10, 9, '409', 'Active', '2022-02-09 09:04:09', NULL),
(67, 9, 8, 10, 9, '408', 'Active', '2022-02-09 09:04:18', NULL),
(68, 9, 8, 10, 9, '405', 'Active', '2022-02-09 09:04:26', NULL),
(69, 9, 8, 10, 9, '403', 'Active', '2022-02-09 09:04:34', NULL),
(70, 9, 8, 10, 9, '402', 'Active', '2022-02-09 09:04:43', NULL),
(71, 9, 8, 10, 9, '401', 'Active', '2022-02-09 09:04:52', NULL),
(72, 9, 8, 11, 9, '519', 'Active', '2022-02-09 09:09:21', NULL),
(73, 9, 8, 11, 9, '518', 'Active', '2022-02-09 09:10:41', NULL),
(74, 9, 8, 11, 9, '517', 'Active', '2022-02-09 09:10:52', NULL),
(75, 9, 8, 11, 9, '514', 'Active', '2022-02-09 09:14:29', NULL),
(76, 9, 8, 11, 9, '513', 'Active', '2022-02-09 09:14:37', NULL),
(77, 9, 8, 11, 9, '509', 'Active', '2022-02-09 09:14:46', NULL),
(78, 9, 8, 11, 9, '508', 'Active', '2022-02-09 09:14:54', NULL),
(79, 9, 8, 11, 9, '505', 'Active', '2022-02-09 09:15:02', NULL),
(80, 9, 8, 11, 9, '504', 'Active', '2022-02-09 09:15:21', NULL),
(81, 9, 8, 11, 9, '502', 'Active', '2022-02-09 09:15:31', NULL),
(82, 9, 8, 11, 9, '501', 'Active', '2022-02-09 09:15:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flattypes`
--

CREATE TABLE `flattypes` (
  `flattype_id` int(11) NOT NULL,
  `flattype_name` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flattypes`
--

INSERT INTO `flattypes` (`flattype_id`, `flattype_name`, `status`, `created_date`, `modified_date`) VALUES
(8, '1 BHK', 'Active', '2022-02-08 09:58:28', NULL),
(9, '2 BHK', 'Active', '2022-02-08 09:58:36', NULL),
(10, '2 BHK P', 'Active', '2022-02-08 09:58:48', NULL),
(11, '2 BHK SP', 'Active', '2022-02-08 09:59:00', NULL),
(12, '3 BHK', 'Active', '2022-02-08 09:59:11', NULL),
(13, '3BHK P', 'Active', '2022-02-08 09:59:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `floor_id` int(11) NOT NULL,
  `floor_name` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`floor_id`, `floor_name`, `status`, `created_date`, `modified_date`) VALUES
(7, 'FIRST FLOOR', 'Active', '2022-02-08 09:57:31', NULL),
(8, 'SECOND FLOOR', 'Active', '2022-02-08 09:57:42', NULL),
(9, 'THIRD FLOOR', 'Active', '2022-02-08 09:57:51', NULL),
(10, 'FOURTH FLOOR', 'Active', '2022-02-08 09:58:00', NULL),
(11, 'FIFTH FLOOR', 'Active', '2022-02-08 09:58:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laps`
--

CREATE TABLE `laps` (
  `lap_id` int(11) NOT NULL,
  `intensity` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laps`
--

INSERT INTO `laps` (`lap_id`, `intensity`, `short_code`, `status`, `created_date`) VALUES
(1, 'Green Easy', 'EG', 'Active', '2021-08-10 09:56:15'),
(2, 'Blue Moderate', 'MB', 'Active', '2021-08-10 09:57:12'),
(3, 'Red Race/Sprint', 'SR', 'Active', '2021-08-10 09:57:44'),
(4, 'White Nothing Nil', 'NW', 'Active', '2021-08-10 09:58:20'),
(5, 'Timer Logo Rest', 'TX', 'Active', '2021-08-10 09:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `maincards`
--

CREATE TABLE `maincards` (
  `maincard_id` int(11) NOT NULL,
  `intensity` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maincards`
--

INSERT INTO `maincards` (`maincard_id`, `intensity`, `short_code`, `colors`, `created_date`, `status`) VALUES
(1, 'easy green', 'EG', NULL, '2021-08-10 10:58:58', 'Active'),
(2, 'moderate blue', 'MB', NULL, '2021-08-10 10:58:58', 'Active'),
(3, 'race sprint red', 'SR', NULL, '2021-08-10 11:00:00', 'Active'),
(4, 'no intensity', 'XO', NULL, '2021-08-10 11:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `modifiers`
--

CREATE TABLE `modifiers` (
  `modifier_id` int(11) NOT NULL,
  `modifier` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modifier_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modifiers`
--

INSERT INTO `modifiers` (`modifier_id`, `modifier`, `image`, `status`, `created_date`, `modifier_date`) VALUES
(1, 'jacket', '611f6db9670be.png', 'Trash', '2021-08-20 07:35:10', '2021-08-20 08:54:17'),
(2, 'Swim', '611f6aa0d696c.png', 'Trash', '2021-08-20 08:41:04', NULL),
(3, 'Swimming Ring', '611f6e148b629.png', 'Active', '2021-08-20 08:55:48', NULL),
(4, 'Swimming Towel', '611f6e3b26a76.png', 'Active', '2021-08-20 08:56:27', NULL),
(5, 'Swimming Nose Clips', '611f6e6b35889.png', 'Active', '2021-08-20 08:57:15', '2021-08-28 10:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pack` enum('Free','Premium') DEFAULT NULL,
  `num_cards` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_date` int(11) NOT NULL,
  `status` enum('Active','Inactive','Trash') DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `phase_id` int(11) NOT NULL,
  `phase_name` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`phase_id`, `phase_name`, `status`, `created_date`, `modified_date`) VALUES
(9, 'PHASE 1', 'Active', '2022-02-08 09:55:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `terms_conditions` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `max_workoutfreeusers` int(11) DEFAULT NULL,
  `max_workoutpremiumusers` int(11) DEFAULT NULL,
  `monthly_description` double DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `targetedareas`
--

CREATE TABLE `targetedareas` (
  `target_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `targetedareas`
--

INSERT INTO `targetedareas` (`target_id`, `name`, `short_code`, `description`, `created_date`, `status`) VALUES
(1, 'target 1', 'TGM', 'hai user', '2021-08-09 05:03:01', 'Trash'),
(2, 'swimming', 'SMW', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2021-08-09 05:39:30', 'Trash'),
(3, 'swimming', 'swm', 'hai', '2021-08-09 06:01:31', 'Trash'),
(4, 'jumping', 'jmp', 'hello', '2021-08-09 06:01:49', 'Trash'),
(5, 'running', 'Run', 'hai', '2021-08-09 09:42:32', 'Trash'),
(6, 'upper body', 'Ub', 'hello', '2021-08-09 09:44:11', 'Trash'),
(7, 'lower body', 'LB', 'hello', '2021-08-09 09:46:35', 'Active'),
(8, 'Upper Body', 'UB', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2021-08-09 09:48:05', 'Active'),
(9, 'Legs', 'LEG', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2021-08-09 09:50:01', 'Active'),
(10, 'Arms', 'AM', 'it to make a type specimen book', '2021-08-09 09:56:58', 'Trash');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `template_id` int(11) NOT NULL,
  `activity` int(11) DEFAULT NULL,
  `targeted_area` int(11) DEFAULT NULL,
  `cardtype` int(11) DEFAULT NULL,
  `maincard` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `package_count` varchar(255) NOT NULL,
  `mobile_type` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('Active','Inactive','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `mobile`, `email`, `user_type`, `package_count`, `mobile_type`, `created_date`, `status`) VALUES
(1, 'John', '9856585858', 'testuserlt2@gmail.com', 'Free User', '2', 'Android', '2021-08-21 17:12:26', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `cardtypes`
--
ALTER TABLE `cardtypes`
  ADD PRIMARY KEY (`cardtype_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `family_details`
--
ALTER TABLE `family_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flatnumbers`
--
ALTER TABLE `flatnumbers`
  ADD PRIMARY KEY (`flatnumber_id`);

--
-- Indexes for table `flattypes`
--
ALTER TABLE `flattypes`
  ADD PRIMARY KEY (`flattype_id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`floor_id`);

--
-- Indexes for table `laps`
--
ALTER TABLE `laps`
  ADD PRIMARY KEY (`lap_id`);

--
-- Indexes for table `maincards`
--
ALTER TABLE `maincards`
  ADD PRIMARY KEY (`maincard_id`);

--
-- Indexes for table `modifiers`
--
ALTER TABLE `modifiers`
  ADD PRIMARY KEY (`modifier_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`phase_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targetedareas`
--
ALTER TABLE `targetedareas`
  ADD PRIMARY KEY (`target_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cardtypes`
--
ALTER TABLE `cardtypes`
  MODIFY `cardtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `flatnumbers`
--
ALTER TABLE `flatnumbers`
  MODIFY `flatnumber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `flattypes`
--
ALTER TABLE `flattypes`
  MODIFY `flattype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `laps`
--
ALTER TABLE `laps`
  MODIFY `lap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maincards`
--
ALTER TABLE `maincards`
  MODIFY `maincard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modifiers`
--
ALTER TABLE `modifiers`
  MODIFY `modifier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `phase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `targetedareas`
--
ALTER TABLE `targetedareas`
  MODIFY `target_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
