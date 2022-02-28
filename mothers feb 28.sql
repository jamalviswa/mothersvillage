-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 05:58 AM
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
(16, 12, 'Block A', 'Active', '2022-02-26 11:55:38', NULL),
(17, 12, 'Block B', 'Active', '2022-02-26 11:55:47', NULL),
(18, 12, 'Block C', 'Active', '2022-02-26 11:56:36', NULL),
(19, 12, 'Block D', 'Active', '2022-02-26 11:56:53', NULL),
(20, 12, 'Block E', 'Active', '2022-02-26 11:57:03', NULL);

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
  `altphone_code` varchar(255) DEFAULT NULL,
  `altphone` varchar(255) DEFAULT NULL,
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

INSERT INTO `customers` (`customer_id`, `application_number`, `date_of_application`, `applicant_name`, `fathers_name`, `co_applicant_name`, `age`, `gender`, `phone_code`, `phone`, `altphone_code`, `altphone`, `email`, `occupation`, `experience`, `income`, `permanent_address`, `present_address`, `photo`, `created_date`, `modified_date`, `status`) VALUES
(17, 'MV1003', '25-02-2022', 'winson', 'dass', 'Dass', 12, 'Male', '+91', '8428937025', '+91', '5654548454', 'as@gmail.com', 'cooli', 2, '100220', 'madurai', 'madurai', '6218ccac48985.jpg', '2022-02-25 12:33:48', NULL, 'Active'),
(18, 'MV1001', '24-02-2022', 'niveditha', 'nivy', 'nivy', 23, 'Female', '+91', '8748747474', '+91', NULL, 'testtesttest@gmail.com', NULL, NULL, NULL, NULL, NULL, '6218cdbfeda3e.png', '2022-02-25 18:08:23', NULL, 'Active'),
(16, 'MV1002', '25-02-2022', 'jamal', 'jamal ahamed', 'ahamed', 22, 'Male', '+91', '8428937026', '+91', '8428937026', 'jamal@gmail.com', 'private', 2, '10000', 'coimbatore', 'coimbatore', '6218a59b1da2e.jpg', '2022-02-25 09:47:07', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `date_of_application` varchar(255) DEFAULT NULL,
  `applicant_name` varchar(255) DEFAULT NULL,
  `co_applicant_name` varchar(255) DEFAULT NULL,
  `aadhar_number` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `phone_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `coapp_phone_code` varchar(255) DEFAULT NULL,
  `coapp_phone` varchar(255) DEFAULT NULL,
  `phase` int(11) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `flattype` int(11) DEFAULT NULL,
  `flatnumber` int(11) DEFAULT NULL,
  `facing` varchar(255) DEFAULT NULL,
  `salable_area` varchar(255) DEFAULT NULL,
  `plinth_area` varchar(255) DEFAULT NULL,
  `uds_area` varchar(255) DEFAULT NULL,
  `comn_area` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(12, 16, 'mani', '20', 'employee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active'),
(13, 16, 'kani', '22', 'student', 'mIS', '4th std', NULL, NULL, NULL, NULL, NULL, 'Active'),
(14, 16, NULL, NULL, NULL, NULL, NULL, 'kala', '20', 'children', NULL, NULL, 'Active'),
(15, 16, NULL, NULL, NULL, NULL, NULL, 'mala', '12', 'student', 'others', '5th std', 'Active'),
(16, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active'),
(17, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active'),
(18, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active'),
(19, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `flatnumbers`
--

CREATE TABLE `flatnumbers` (
  `flatnumber_id` int(11) NOT NULL,
  `phase` int(11) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `flattype` int(11) DEFAULT NULL,
  `flatnumber` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flatnumbers`
--

INSERT INTO `flatnumbers` (`flatnumber_id`, `phase`, `block`, `floor`, `flattype`, `flatnumber`, `status`, `created_date`, `modified_date`) VALUES
(373, 12, 16, 18, 15, '110', 'Active', '2022-02-26 15:32:46', NULL),
(374, 12, 16, 18, 15, '111', 'Active', '2022-02-26 15:32:59', NULL),
(375, 12, 16, 18, 16, '101', 'Active', '2022-02-26 15:33:16', NULL),
(376, 12, 16, 18, 16, '102', 'Active', '2022-02-26 15:33:28', NULL),
(377, 12, 16, 18, 16, '103', 'Active', '2022-02-26 15:33:40', NULL),
(378, 12, 16, 18, 16, '104', 'Active', '2022-02-26 15:33:58', NULL),
(379, 12, 16, 18, 18, '105', 'Active', '2022-02-26 15:35:30', NULL),
(380, 12, 16, 18, 18, '114', 'Active', '2022-02-26 15:35:44', NULL),
(381, 12, 16, 18, 16, '108', 'Active', '2022-02-26 15:36:17', NULL),
(382, 12, 16, 18, 16, '109', 'Active', '2022-02-26 15:36:30', NULL),
(383, 12, 16, 18, 16, '113', 'Active', '2022-02-26 15:37:08', NULL),
(384, 12, 16, 18, 16, '112', 'Active', '2022-02-26 15:38:04', NULL),
(385, 12, 16, 18, 16, '118', 'Active', '2022-02-26 15:38:19', '2022-02-26 15:38:40'),
(386, 12, 16, 18, 16, '117', 'Active', '2022-02-26 15:38:33', NULL),
(387, 12, 16, 18, 16, '119', 'Active', '2022-02-26 15:38:51', NULL),
(388, 12, 16, 18, 17, '120', 'Active', '2022-02-26 15:39:04', NULL),
(389, 12, 16, 19, 19, '210', 'Active', '2022-02-26 15:42:38', NULL),
(390, 12, 16, 19, 19, '211', 'Active', '2022-02-26 15:42:50', NULL),
(391, 12, 16, 19, 22, '205', 'Active', '2022-02-26 15:43:07', NULL),
(392, 12, 16, 19, 22, '216', 'Active', '2022-02-26 15:43:21', NULL),
(393, 12, 16, 19, 21, '220', 'Active', '2022-02-26 15:44:08', NULL),
(394, 12, 16, 19, 20, '201', 'Active', '2022-02-26 15:44:46', NULL),
(395, 12, 16, 19, 20, '202', 'Active', '2022-02-26 15:45:22', NULL),
(396, 12, 16, 19, 20, '204', 'Active', '2022-02-26 15:45:39', '2022-02-26 15:46:02'),
(397, 12, 16, 19, 20, '203', 'Active', '2022-02-26 15:45:54', NULL),
(398, 12, 16, 19, 20, '208', 'Active', '2022-02-26 15:46:22', NULL),
(399, 12, 16, 19, 20, '209', 'Active', '2022-02-26 15:46:38', NULL),
(400, 12, 16, 19, 20, '212', 'Active', '2022-02-26 15:47:00', NULL),
(401, 12, 16, 19, 20, '213', 'Active', '2022-02-26 15:47:11', NULL),
(402, 12, 16, 19, 20, '217', 'Active', '2022-02-26 15:47:26', NULL),
(403, 12, 16, 19, 20, '218', 'Active', '2022-02-26 15:47:36', NULL),
(404, 12, 16, 19, 20, '219', 'Active', '2022-02-26 15:47:53', NULL),
(405, 12, 16, 20, 23, '310', 'Active', '2022-02-26 15:48:21', NULL),
(406, 12, 16, 20, 23, '311', 'Active', '2022-02-26 15:48:34', NULL),
(407, 12, 16, 21, 27, '410', 'Active', '2022-02-26 15:48:49', NULL),
(408, 12, 16, 21, 27, '411', 'Active', '2022-02-26 15:49:40', '2022-02-26 15:50:34'),
(409, 12, 16, 22, 33, '520', 'Active', '2022-02-26 15:49:58', '2022-02-26 15:51:12'),
(410, 12, 16, 22, 31, '510', 'Active', '2022-02-26 15:50:10', NULL),
(411, 12, 16, 22, 31, '511', 'Active', '2022-02-26 15:50:21', NULL),
(412, 12, 16, 20, 25, '320', 'Active', '2022-02-26 15:53:12', NULL),
(413, 12, 16, 21, 29, '420', 'Active', '2022-02-26 15:53:58', NULL),
(414, 12, 16, 20, 26, '306', 'Active', '2022-02-26 15:54:49', NULL),
(415, 12, 16, 20, 26, '316', 'Active', '2022-02-26 15:55:04', NULL),
(416, 12, 16, 21, 30, '406', 'Active', '2022-02-26 15:55:29', NULL),
(417, 12, 16, 22, 34, '506', 'Active', '2022-02-26 15:55:40', '2022-02-26 15:56:08'),
(418, 12, 16, 21, 30, '416', 'Active', '2022-02-26 15:55:51', NULL),
(419, 12, 16, 22, 34, '516', 'Active', '2022-02-26 15:56:20', NULL),
(420, 12, 16, 20, 24, '301', 'Active', '2022-02-26 15:56:48', NULL),
(421, 12, 16, 20, 24, '302', 'Active', '2022-02-26 15:57:00', NULL),
(422, 12, 16, 20, 24, '303', 'Active', '2022-02-26 15:57:11', NULL),
(423, 12, 16, 20, 24, '304', 'Active', '2022-02-26 15:57:26', NULL),
(424, 12, 16, 20, 24, '308', 'Active', '2022-02-26 15:57:46', NULL),
(425, 12, 16, 20, 24, '309', 'Active', '2022-02-26 15:57:59', NULL),
(426, 12, 16, 20, 24, '312', 'Active', '2022-02-26 15:58:12', NULL),
(427, 12, 16, 20, 24, '313', 'Active', '2022-02-26 15:58:25', NULL),
(428, 12, 16, 20, 24, '317', 'Active', '2022-02-26 15:58:47', NULL),
(429, 12, 16, 20, 24, '318', 'Active', '2022-02-26 15:59:01', NULL),
(430, 12, 16, 20, 24, '319', 'Active', '2022-02-26 15:59:16', NULL),
(431, 12, 16, 21, 28, '401', 'Active', '2022-02-26 15:59:38', NULL),
(432, 12, 16, 21, 28, '402', 'Active', '2022-02-26 15:59:51', NULL),
(433, 12, 16, 21, 28, '403', 'Active', '2022-02-26 16:00:09', NULL),
(434, 12, 16, 21, 28, '405', 'Active', '2022-02-26 16:00:26', NULL),
(435, 12, 16, 21, 28, '408', 'Active', '2022-02-26 16:00:41', NULL),
(436, 12, 16, 21, 28, '409', 'Active', '2022-02-26 16:00:55', NULL),
(437, 12, 16, 21, 28, '412', 'Active', '2022-02-26 16:01:09', NULL),
(438, 12, 16, 21, 28, '414', 'Active', '2022-02-26 16:01:23', NULL),
(439, 12, 16, 21, 28, '417', 'Active', '2022-02-26 16:01:36', NULL),
(440, 12, 16, 21, 28, '418', 'Active', '2022-02-26 16:01:59', NULL),
(441, 12, 16, 21, 28, '419', 'Active', '2022-02-26 16:02:14', NULL),
(442, 12, 16, 22, 32, '501', 'Active', '2022-02-26 16:02:38', NULL),
(443, 12, 16, 22, 32, '502', 'Active', '2022-02-26 16:02:49', NULL),
(444, 12, 16, 22, 32, '504', 'Active', '2022-02-26 16:03:06', NULL),
(445, 12, 16, 22, 32, '505', 'Active', '2022-02-26 16:03:20', NULL),
(446, 12, 16, 22, 32, '508', 'Active', '2022-02-26 16:03:39', NULL),
(447, 12, 16, 22, 32, '509', 'Active', '2022-02-26 16:03:54', NULL),
(448, 12, 16, 22, 32, '513', 'Active', '2022-02-26 16:04:11', NULL),
(449, 12, 16, 22, 32, '514', 'Active', '2022-02-26 16:04:25', NULL),
(450, 12, 16, 22, 32, '517', 'Active', '2022-02-26 16:04:42', NULL),
(451, 12, 16, 22, 32, '518', 'Active', '2022-02-26 16:04:55', NULL),
(452, 12, 16, 22, 32, '519', 'Active', '2022-02-26 16:05:08', NULL),
(453, 12, 20, 38, 105, '101', 'Active', '2022-02-26 16:06:03', NULL),
(454, 12, 20, 38, 106, '114', 'Active', '2022-02-26 16:06:34', NULL),
(455, 12, 20, 38, 109, '108', 'Active', '2022-02-26 16:06:56', NULL),
(456, 12, 20, 38, 108, '106', 'Active', '2022-02-26 16:07:15', NULL),
(457, 12, 20, 38, 108, '110', 'Active', '2022-02-26 16:07:28', NULL),
(458, 12, 20, 38, 108, '109', 'Active', '2022-02-26 16:07:43', NULL),
(459, 12, 20, 38, 107, '102', 'Active', '2022-02-26 16:08:19', NULL),
(460, 12, 20, 38, 107, '103', 'Active', '2022-02-26 16:08:33', NULL),
(461, 12, 20, 38, 107, '104', 'Active', '2022-02-26 16:08:45', NULL),
(462, 12, 20, 38, 107, '105', 'Active', '2022-02-26 16:08:58', NULL),
(463, 12, 20, 38, 107, '111', 'Active', '2022-02-26 16:09:26', NULL),
(464, 12, 20, 38, 107, '112', 'Active', '2022-02-26 16:09:41', NULL),
(465, 12, 20, 38, 107, '113', 'Active', '2022-02-26 16:09:53', NULL),
(466, 12, 20, 39, 112, '202', 'Active', '2022-02-26 16:10:17', NULL),
(467, 12, 20, 39, 112, '203', 'Active', '2022-02-26 16:10:32', NULL),
(468, 12, 20, 39, 112, '204', 'Active', '2022-02-26 16:10:48', NULL),
(469, 12, 20, 39, 112, '205', 'Active', '2022-02-26 16:11:02', NULL),
(470, 12, 20, 39, 112, '211', 'Active', '2022-02-26 16:12:45', NULL),
(471, 12, 20, 39, 112, '212', 'Active', '2022-02-26 16:13:03', NULL),
(472, 12, 20, 39, 112, '213', 'Active', '2022-02-26 16:13:17', NULL),
(473, 12, 20, 39, 110, '201', 'Active', '2022-02-26 16:13:34', NULL),
(474, 12, 20, 39, 111, '214', 'Active', '2022-02-26 16:13:48', NULL),
(475, 12, 20, 39, 114, '208', 'Active', '2022-02-26 16:14:09', NULL),
(476, 12, 20, 39, 113, '207', 'Active', '2022-02-26 16:14:42', NULL),
(477, 12, 20, 39, 113, '209', 'Active', '2022-02-26 16:15:00', NULL),
(478, 12, 20, 39, 113, '210', 'Active', '2022-02-26 16:15:15', NULL),
(479, 12, 20, 40, 115, '301', 'Active', '2022-02-26 16:15:47', NULL),
(480, 12, 20, 40, 116, '314', 'Active', '2022-02-26 16:16:11', NULL),
(481, 12, 20, 40, 117, '302', 'Active', '2022-02-26 16:16:24', NULL),
(482, 12, 20, 40, 117, '303', 'Active', '2022-02-26 16:16:39', NULL),
(483, 12, 20, 40, 117, '304', 'Active', '2022-02-26 16:16:54', NULL),
(484, 12, 20, 40, 117, '306', 'Active', '2022-02-26 16:17:07', NULL),
(485, 12, 20, 40, 117, '311', 'Active', '2022-02-26 16:17:19', NULL),
(486, 12, 20, 40, 117, '312', 'Active', '2022-02-26 16:17:35', NULL),
(487, 12, 20, 40, 117, '313', 'Active', '2022-02-26 16:17:51', NULL),
(488, 12, 20, 40, 118, '307', 'Active', '2022-02-26 16:18:25', NULL),
(489, 12, 20, 40, 118, '309', 'Active', '2022-02-26 16:18:37', NULL),
(490, 12, 20, 40, 118, '310', 'Active', '2022-02-26 16:18:56', NULL),
(491, 12, 20, 40, 119, '308', 'Active', '2022-02-26 16:19:14', NULL),
(492, 12, 20, 41, 124, '408', 'Active', '2022-02-26 16:20:21', NULL),
(493, 12, 20, 41, 123, '407', 'Active', '2022-02-26 16:20:39', NULL),
(494, 12, 20, 41, 123, '409', 'Active', '2022-02-26 16:20:55', NULL),
(495, 12, 20, 41, 123, '410', 'Active', '2022-02-26 16:21:58', NULL),
(496, 12, 20, 41, 120, '401', 'Active', '2022-02-26 16:22:26', NULL),
(497, 12, 20, 41, 121, '415', 'Active', '2022-02-26 16:22:44', NULL),
(498, 12, 20, 41, 122, '402', 'Active', '2022-02-26 16:22:59', NULL),
(499, 12, 20, 41, 122, '403', 'Active', '2022-02-26 16:23:13', NULL),
(500, 12, 20, 41, 122, '405', 'Active', '2022-02-26 16:23:26', NULL),
(501, 12, 20, 41, 122, '406', 'Active', '2022-02-26 16:23:39', NULL),
(502, 12, 20, 41, 122, '411', 'Active', '2022-02-26 16:23:51', NULL),
(503, 12, 20, 41, 122, '412', 'Active', '2022-02-26 16:24:04', NULL),
(504, 12, 20, 41, 122, '414', 'Active', '2022-02-26 16:24:23', NULL),
(505, 12, 20, 42, 125, '501', 'Active', '2022-02-26 16:24:54', NULL),
(506, 12, 20, 42, 126, '515', 'Active', '2022-02-26 16:25:08', NULL),
(507, 12, 20, 42, 127, '502', 'Active', '2022-02-26 16:25:21', NULL),
(508, 12, 20, 42, 127, '504', 'Active', '2022-02-26 16:26:16', NULL),
(509, 12, 20, 42, 127, '505', 'Active', '2022-02-26 16:26:28', NULL),
(510, 12, 20, 42, 127, '506', 'Active', '2022-02-26 16:26:40', NULL),
(511, 12, 20, 42, 127, '511', 'Active', '2022-02-26 16:26:54', NULL),
(512, 12, 20, 42, 127, '513', 'Active', '2022-02-26 16:27:08', NULL),
(513, 12, 20, 42, 127, '514', 'Active', '2022-02-26 16:27:20', NULL),
(514, 12, 20, 42, 128, '507', 'Active', '2022-02-26 16:27:55', NULL),
(515, 12, 20, 42, 128, '509', 'Active', '2022-02-26 16:28:06', NULL),
(516, 12, 20, 42, 128, '510', 'Active', '2022-02-26 16:28:19', NULL),
(517, 12, 20, 42, 129, '508', 'Active', '2022-02-26 16:28:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flattypes`
--

CREATE TABLE `flattypes` (
  `flattype_id` int(11) NOT NULL,
  `phase` int(11) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `flattype` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flattypes`
--

INSERT INTO `flattypes` (`flattype_id`, `phase`, `block`, `floor`, `flattype`, `status`, `created_date`, `modified_date`) VALUES
(15, 12, 16, 18, '1 BHK', 'Active', '2022-02-26 12:57:21', NULL),
(16, 12, 16, 18, '2 BHK', 'Active', '2022-02-26 12:58:12', NULL),
(17, 12, 16, 18, '2 BHK P', 'Active', '2022-02-26 12:58:38', NULL),
(18, 12, 16, 18, '3 BHK', 'Active', '2022-02-26 12:58:53', NULL),
(19, 12, 16, 19, '1 BHK', 'Active', '2022-02-26 12:59:53', NULL),
(20, 12, 16, 19, '2 BHK', 'Active', '2022-02-26 13:00:07', NULL),
(21, 12, 16, 19, '2 BHK P', 'Active', '2022-02-26 13:00:23', NULL),
(22, 12, 16, 19, '3 BHK', 'Active', '2022-02-26 13:00:34', NULL),
(23, 12, 16, 20, '1 BHK', 'Active', '2022-02-26 13:00:50', NULL),
(24, 12, 16, 20, '2 BHK', 'Active', '2022-02-26 13:01:03', NULL),
(25, 12, 16, 20, '2 BHK P', 'Active', '2022-02-26 13:01:18', NULL),
(26, 12, 16, 20, '3 BHK', 'Active', '2022-02-26 13:01:40', NULL),
(27, 12, 16, 21, '1 BHK', 'Active', '2022-02-26 13:02:01', NULL),
(28, 12, 16, 21, '2 BHK', 'Active', '2022-02-26 13:02:16', NULL),
(29, 12, 16, 21, '2 BHK P', 'Active', '2022-02-26 13:02:35', NULL),
(30, 12, 16, 21, '3 BHK', 'Active', '2022-02-26 13:02:51', NULL),
(31, 12, 16, 22, '1 BHK', 'Active', '2022-02-26 13:03:12', NULL),
(32, 12, 16, 22, '2 BHK', 'Active', '2022-02-26 13:03:23', NULL),
(33, 12, 16, 22, '2 BHK P', 'Active', '2022-02-26 13:03:38', NULL),
(34, 12, 16, 22, '3 BHK', 'Active', '2022-02-26 13:03:55', NULL),
(35, 12, 17, 23, '1 BHK', 'Active', '2022-02-26 13:05:06', NULL),
(36, 12, 17, 23, '2 BHK', 'Active', '2022-02-26 13:05:18', NULL),
(37, 12, 17, 23, '2 BHK P', 'Active', '2022-02-26 13:05:33', NULL),
(38, 12, 17, 23, '3 BHK', 'Active', '2022-02-26 13:05:50', NULL),
(39, 12, 17, 24, '1 BHK', 'Active', '2022-02-26 13:06:02', NULL),
(40, 12, 17, 24, '2 BHK', 'Active', '2022-02-26 13:06:16', NULL),
(41, 12, 17, 24, '2 BHK P', 'Active', '2022-02-26 13:06:34', NULL),
(42, 12, 17, 24, '3 BHK', 'Active', '2022-02-26 13:06:47', NULL),
(43, 12, 17, 25, '1 BHK', 'Active', '2022-02-26 13:07:51', NULL),
(44, 12, 17, 25, '2 BHK', 'Active', '2022-02-26 13:08:02', NULL),
(45, 12, 17, 25, '2 BHK P', 'Active', '2022-02-26 13:08:14', NULL),
(46, 12, 17, 25, '3 BHK', 'Active', '2022-02-26 13:08:29', NULL),
(47, 12, 17, 26, '1 BHK', 'Active', '2022-02-26 13:08:48', NULL),
(48, 12, 17, 26, '2 BHK', 'Active', '2022-02-26 13:09:59', NULL),
(49, 12, 17, 26, '2 BHK P', 'Active', '2022-02-26 13:10:12', NULL),
(50, 12, 17, 26, '3 BHK', 'Active', '2022-02-26 13:10:24', NULL),
(51, 12, 17, 27, '1 BHK', 'Active', '2022-02-26 13:10:39', NULL),
(52, 12, 17, 27, '2 BHK', 'Active', '2022-02-26 13:10:51', NULL),
(53, 12, 17, 27, '2 BHK P', 'Active', '2022-02-26 13:11:03', NULL),
(54, 12, 17, 27, '3 BHK', 'Active', '2022-02-26 13:11:23', NULL),
(55, 12, 18, 28, '2 BHK', 'Active', '2022-02-26 13:13:43', NULL),
(56, 12, 18, 28, '2 BHK P', 'Active', '2022-02-26 13:13:56', NULL),
(57, 12, 18, 28, '2 BHK SP', 'Active', '2022-02-26 13:14:12', NULL),
(58, 12, 18, 28, '3 BHK', 'Active', '2022-02-26 13:14:25', NULL),
(59, 12, 18, 28, '3 BHK P', 'Active', '2022-02-26 13:14:40', NULL),
(60, 12, 18, 29, '2 BHK', 'Active', '2022-02-26 13:15:06', NULL),
(61, 12, 18, 29, '2 BHK P', 'Active', '2022-02-26 13:15:17', NULL),
(62, 12, 18, 29, '2 BHK SP', 'Active', '2022-02-26 13:15:30', NULL),
(63, 12, 18, 29, '3 BHK', 'Active', '2022-02-26 13:15:44', NULL),
(64, 12, 18, 29, '3 BHK P', 'Active', '2022-02-26 13:15:57', NULL),
(65, 12, 18, 30, '2 BHK', 'Active', '2022-02-26 13:16:15', NULL),
(66, 12, 18, 30, '2 BHK P', 'Active', '2022-02-26 13:16:27', NULL),
(67, 12, 18, 30, '2 BHK SP', 'Active', '2022-02-26 13:16:45', NULL),
(68, 12, 18, 30, '3 BHK', 'Active', '2022-02-26 13:16:56', NULL),
(69, 12, 18, 30, '3 BHK P', 'Active', '2022-02-26 13:17:08', NULL),
(70, 12, 18, 31, '2 BHK', 'Active', '2022-02-26 13:17:26', NULL),
(71, 12, 18, 31, '2 BHK P', 'Active', '2022-02-26 13:17:40', NULL),
(72, 12, 18, 31, '2 BHK SP', 'Active', '2022-02-26 13:17:54', NULL),
(73, 12, 18, 31, '3 BHK', 'Active', '2022-02-26 13:18:08', NULL),
(74, 12, 18, 31, '3 BHK P', 'Active', '2022-02-26 13:18:29', NULL),
(75, 12, 18, 32, '2 BHK', 'Active', '2022-02-26 13:19:39', NULL),
(76, 12, 18, 32, '2 BHK P', 'Active', '2022-02-26 14:42:31', NULL),
(77, 12, 18, 32, '2 BHK SP', 'Active', '2022-02-26 14:44:00', NULL),
(78, 12, 18, 32, '3 BHK', 'Active', '2022-02-26 14:44:17', NULL),
(79, 12, 18, 32, '3 BHK P', 'Active', '2022-02-26 14:44:30', NULL),
(80, 12, 19, 33, '2 BHK', 'Active', '2022-02-26 14:45:20', NULL),
(81, 12, 19, 33, '2 BHK P', 'Active', '2022-02-26 14:45:42', NULL),
(82, 12, 19, 33, '2 BHK SP', 'Active', '2022-02-26 14:45:59', NULL),
(83, 12, 19, 33, '3 BHK', 'Active', '2022-02-26 14:46:12', NULL),
(84, 12, 19, 33, '3 BHK P', 'Active', '2022-02-26 14:46:24', NULL),
(85, 12, 19, 34, '2 BHK', 'Active', '2022-02-26 14:46:42', NULL),
(86, 12, 19, 34, '2 BHK P', 'Active', '2022-02-26 14:46:57', NULL),
(87, 12, 19, 34, '2 BHK SP', 'Active', '2022-02-26 14:47:08', NULL),
(88, 12, 19, 34, '3 BHK', 'Active', '2022-02-26 14:47:20', NULL),
(89, 12, 19, 34, '3 BHK P', 'Active', '2022-02-26 14:47:31', NULL),
(90, 12, 19, 35, '2 BHK', 'Active', '2022-02-26 14:47:43', NULL),
(91, 12, 19, 35, '2 BHK P', 'Active', '2022-02-26 14:47:54', NULL),
(92, 12, 19, 35, '2 BHK SP', 'Active', '2022-02-26 14:48:06', NULL),
(93, 12, 19, 35, '3 BHK', 'Active', '2022-02-26 14:48:20', NULL),
(94, 12, 19, 35, '3 BHK P', 'Active', '2022-02-26 14:48:35', NULL),
(95, 12, 19, 36, '2 BHK', 'Active', '2022-02-26 14:48:48', NULL),
(96, 12, 19, 36, '2 BHK P', 'Active', '2022-02-26 14:48:58', NULL),
(97, 12, 19, 36, '2 BHK SP', 'Active', '2022-02-26 14:49:10', NULL),
(98, 12, 19, 36, '3 BHK', 'Active', '2022-02-26 14:49:19', NULL),
(99, 12, 19, 36, '3 BHK P', 'Active', '2022-02-26 14:49:33', NULL),
(100, 12, 19, 37, '2 BHK', 'Active', '2022-02-26 14:49:48', NULL),
(101, 12, 19, 37, '2 BHK P', 'Active', '2022-02-26 14:50:05', NULL),
(102, 12, 19, 37, '2 BHK SP', 'Active', '2022-02-26 14:50:18', NULL),
(103, 12, 19, 37, '3 BHK', 'Active', '2022-02-26 14:50:29', NULL),
(104, 12, 19, 37, '3 BHK P', 'Active', '2022-02-26 14:50:43', NULL),
(105, 12, 20, 38, '2 BHK', 'Active', '2022-02-26 14:52:10', NULL),
(106, 12, 20, 38, '2 BHK P', 'Active', '2022-02-26 14:52:25', NULL),
(107, 12, 20, 38, '2 BHK SP', 'Active', '2022-02-26 14:52:38', NULL),
(108, 12, 20, 38, '3 BHK', 'Active', '2022-02-26 14:52:50', NULL),
(109, 12, 20, 38, '3 BHK P', 'Active', '2022-02-26 14:53:01', NULL),
(110, 12, 20, 39, '2 BHK', 'Active', '2022-02-26 14:53:15', NULL),
(111, 12, 20, 39, '2 BHK P', 'Active', '2022-02-26 14:53:26', NULL),
(112, 12, 20, 39, '2 BHK SP', 'Active', '2022-02-26 14:53:36', NULL),
(113, 12, 20, 39, '3 BHK', 'Active', '2022-02-26 14:53:46', NULL),
(114, 12, 20, 39, '3 BHK P', 'Active', '2022-02-26 14:53:56', NULL),
(115, 12, 20, 40, '2 BHK', 'Active', '2022-02-26 14:54:16', NULL),
(116, 12, 20, 40, '2 BHK P', 'Active', '2022-02-26 14:54:31', NULL),
(117, 12, 20, 40, '2 BHK SP', 'Active', '2022-02-26 14:54:43', NULL),
(118, 12, 20, 40, '3 BHK', 'Active', '2022-02-26 14:55:02', NULL),
(119, 12, 20, 40, '3 BHK P', 'Active', '2022-02-26 14:55:13', NULL),
(120, 12, 20, 41, '2 BHK', 'Active', '2022-02-26 14:55:24', NULL),
(121, 12, 20, 41, '2 BHK P', 'Active', '2022-02-26 14:55:36', NULL),
(122, 12, 20, 41, '2 BHK SP', 'Active', '2022-02-26 14:55:51', NULL),
(123, 12, 20, 41, '3 BHK', 'Active', '2022-02-26 14:56:02', NULL),
(124, 12, 20, 41, '3 BHK P', 'Active', '2022-02-26 14:56:15', NULL),
(125, 12, 20, 42, '2 BHK', 'Active', '2022-02-26 14:56:41', NULL),
(126, 12, 20, 42, '2 BHK P', 'Active', '2022-02-26 14:56:52', NULL),
(127, 12, 20, 42, '2 BHK SP', 'Active', '2022-02-26 14:57:02', NULL),
(128, 12, 20, 42, '3 BHK', 'Active', '2022-02-26 14:57:15', '2022-02-26 14:57:23'),
(129, 12, 20, 42, '3 BHK P', 'Active', '2022-02-26 14:57:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `floor_id` int(11) NOT NULL,
  `phase` int(11) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `floor_name` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`floor_id`, `phase`, `block`, `floor_name`, `status`, `created_date`, `modified_date`) VALUES
(18, 12, 16, 'First Floor', 'Active', '2022-02-26 11:58:48', NULL),
(19, 12, 16, 'Second Floor', 'Active', '2022-02-26 11:59:59', '2022-02-26 12:00:20'),
(20, 12, 16, 'Third Floor', 'Active', '2022-02-26 12:03:21', '2022-02-26 12:05:19'),
(21, 12, 16, 'Fourth FLoor', 'Active', '2022-02-26 12:05:52', NULL),
(22, 12, 16, 'Fifth Floor', 'Active', '2022-02-26 12:06:02', NULL),
(23, 12, 17, 'First Floor', 'Active', '2022-02-26 12:06:20', NULL),
(24, 12, 17, 'Second Floor', 'Active', '2022-02-26 12:06:34', NULL),
(25, 12, 17, 'Third Floor', 'Active', '2022-02-26 12:06:46', NULL),
(26, 12, 17, 'Fourth Floor', 'Active', '2022-02-26 12:06:57', NULL),
(27, 12, 17, 'Fifth Floor', 'Active', '2022-02-26 12:07:08', NULL),
(28, 12, 18, 'First Floor', 'Active', '2022-02-26 12:07:27', NULL),
(29, 12, 18, 'Second Floor', 'Active', '2022-02-26 12:07:50', NULL),
(30, 12, 18, 'Third Floor', 'Active', '2022-02-26 12:08:00', NULL),
(31, 12, 18, 'Fourth Floor', 'Active', '2022-02-26 12:08:11', NULL),
(32, 12, 18, 'Fifth Floor', 'Active', '2022-02-26 12:08:22', NULL),
(33, 12, 19, 'First Floor', 'Active', '2022-02-26 12:08:42', NULL),
(34, 12, 19, 'Second Floor', 'Active', '2022-02-26 12:08:55', NULL),
(35, 12, 19, 'Third Floor', 'Active', '2022-02-26 12:09:09', NULL),
(36, 12, 19, 'Fourth Floor', 'Active', '2022-02-26 12:09:23', NULL),
(37, 12, 19, 'Fifth Floor', 'Active', '2022-02-26 12:09:35', NULL),
(38, 12, 20, 'First Floor', 'Active', '2022-02-26 12:09:54', NULL),
(39, 12, 20, 'Second Floor', 'Active', '2022-02-26 12:10:05', NULL),
(40, 12, 20, 'Third Floor', 'Active', '2022-02-26 12:10:34', NULL),
(41, 12, 20, 'Fourth Floor', 'Active', '2022-02-26 12:10:45', NULL),
(42, 12, 20, 'Fifth Floor', 'Active', '2022-02-26 12:10:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `appln_number` varchar(255) DEFAULT NULL,
  `appln_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `fund_date` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `bank_date` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('Active','Trash') DEFAULT 'Active'
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
(12, 'Phase 1', 'Active', '2022-02-26 11:51:23', '2022-02-26 11:51:47');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `flatnumbers`
--
ALTER TABLE `flatnumbers`
  MODIFY `flatnumber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;

--
-- AUTO_INCREMENT for table `flattypes`
--
ALTER TABLE `flattypes`
  MODIFY `flattype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `phase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
