-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 01:34 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flatnumbers`
--
ALTER TABLE `flatnumbers`
  ADD PRIMARY KEY (`flatnumber_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flatnumbers`
--
ALTER TABLE `flatnumbers`
  MODIFY `flatnumber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
