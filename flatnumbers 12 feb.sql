-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 09:39 AM
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
(82, 9, 8, 11, 9, '501', 'Active', '2022-02-09 09:15:41', NULL),
(83, 9, 9, 7, 8, '109', 'Active', '2022-02-10 12:48:33', NULL),
(84, 9, 9, 7, 8, '110', 'Active', '2022-02-10 12:48:51', NULL),
(85, 9, 9, 8, 8, '209', 'Active', '2022-02-10 12:49:36', NULL),
(86, 9, 9, 9, 8, '309', 'Active', '2022-02-10 12:49:54', NULL),
(87, 9, 9, 9, 8, '310', 'Active', '2022-02-10 12:50:11', NULL),
(88, 9, 9, 10, 8, '409', 'Active', '2022-02-10 12:50:51', NULL),
(89, 9, 9, 10, 8, '410', 'Active', '2022-02-10 12:51:33', NULL),
(90, 9, 9, 11, 8, '509', 'Active', '2022-02-10 12:51:47', NULL),
(91, 9, 9, 11, 8, '510', 'Active', '2022-02-10 12:52:04', NULL),
(92, 9, 9, 7, 9, '101', 'Active', '2022-02-10 12:52:27', NULL),
(93, 9, 9, 7, 9, '104', 'Active', '2022-02-10 12:52:41', NULL),
(94, 9, 9, 7, 9, '102', 'Active', '2022-02-10 12:52:54', NULL),
(95, 9, 9, 7, 9, '103', 'Active', '2022-02-10 12:53:09', NULL),
(96, 9, 9, 7, 9, '106', 'Active', '2022-02-10 12:53:28', NULL),
(97, 9, 9, 7, 9, '108', 'Active', '2022-02-10 12:53:42', NULL),
(98, 9, 9, 7, 9, '117', 'Active', '2022-02-10 12:53:57', NULL),
(99, 9, 9, 7, 9, '115', 'Active', '2022-02-10 12:54:12', NULL),
(100, 9, 9, 7, 9, '114', 'Active', '2022-02-10 12:54:27', NULL),
(101, 9, 9, 7, 9, '112', 'Active', '2022-02-10 12:54:39', NULL),
(102, 9, 9, 7, 9, '111', 'Active', '2022-02-10 12:54:56', NULL),
(103, 9, 9, 8, 9, '201', 'Active', '2022-02-10 12:55:11', NULL),
(104, 9, 9, 8, 9, '202', 'Active', '2022-02-10 12:55:27', NULL),
(105, 9, 9, 8, 9, '203', 'Active', '2022-02-10 12:55:43', NULL),
(106, 9, 9, 8, 9, '204', 'Active', '2022-02-10 12:56:00', NULL),
(107, 9, 9, 8, 9, '207', 'Active', '2022-02-10 12:56:14', NULL),
(108, 9, 9, 8, 9, '208', 'Active', '2022-02-10 12:56:29', NULL),
(109, 9, 9, 8, 9, '212', 'Active', '2022-02-10 12:56:45', NULL),
(110, 9, 9, 8, 9, '214', 'Active', '2022-02-10 12:57:02', NULL),
(111, 9, 9, 8, 9, '216', 'Active', '2022-02-10 12:57:16', NULL),
(112, 9, 9, 8, 9, '217', 'Active', '2022-02-10 12:57:31', NULL),
(113, 9, 9, 9, 9, '301', 'Active', '2022-02-10 12:57:49', NULL),
(114, 9, 9, 9, 9, '302', 'Active', '2022-02-10 12:58:02', NULL),
(115, 9, 9, 9, 9, '303', 'Active', '2022-02-10 12:58:19', NULL),
(116, 9, 9, 9, 9, '304', 'Active', '2022-02-10 12:58:33', NULL),
(117, 9, 9, 9, 9, '307', 'Active', '2022-02-10 12:58:50', NULL),
(118, 9, 9, 9, 9, '308', 'Active', '2022-02-10 12:59:05', NULL),
(119, 9, 9, 9, 9, '311', 'Active', '2022-02-10 12:59:20', NULL),
(120, 9, 9, 9, 9, '312', 'Active', '2022-02-10 12:59:35', NULL),
(121, 9, 9, 9, 9, '315', 'Active', '2022-02-10 12:59:53', NULL),
(122, 9, 9, 9, 9, '316', 'Active', '2022-02-10 13:00:11', NULL),
(123, 9, 9, 9, 9, '317', 'Active', '2022-02-10 13:00:26', NULL),
(124, 9, 9, 10, 9, '401', 'Active', '2022-02-10 13:00:42', NULL),
(125, 9, 9, 10, 9, '402', 'Active', '2022-02-10 13:00:59', NULL),
(126, 9, 9, 10, 9, '403', 'Active', '2022-02-10 13:01:17', NULL),
(127, 9, 9, 10, 9, '405', 'Active', '2022-02-10 13:01:30', NULL),
(128, 9, 9, 10, 9, '407', 'Active', '2022-02-10 13:01:46', NULL),
(129, 9, 9, 10, 9, '408', 'Active', '2022-02-10 13:02:11', NULL),
(130, 9, 9, 10, 9, '411', 'Active', '2022-02-10 13:02:26', NULL),
(131, 9, 9, 10, 9, '412', 'Active', '2022-02-10 13:02:42', NULL),
(132, 9, 9, 10, 9, '415', 'Active', '2022-02-10 13:03:01', NULL),
(133, 9, 9, 10, 9, '416', 'Active', '2022-02-10 13:03:42', NULL),
(134, 9, 9, 10, 9, '417', 'Active', '2022-02-10 13:04:05', NULL),
(135, 9, 9, 11, 9, '501', 'Active', '2022-02-10 13:04:25', NULL),
(136, 9, 9, 11, 9, '502', 'Active', '2022-02-10 13:04:41', NULL),
(137, 9, 9, 11, 9, '504', 'Active', '2022-02-10 13:04:57', NULL),
(138, 9, 9, 11, 9, '505', 'Active', '2022-02-10 13:05:12', NULL),
(139, 9, 9, 11, 9, '507', 'Active', '2022-02-10 13:05:40', NULL),
(140, 9, 9, 11, 9, '511', 'Active', '2022-02-10 13:06:03', NULL),
(141, 9, 9, 11, 9, '515', 'Active', '2022-02-10 13:06:23', NULL),
(142, 9, 9, 11, 9, '516', 'Active', '2022-02-10 13:06:45', NULL),
(143, 9, 9, 11, 9, '517', 'Active', '2022-02-10 13:07:01', NULL),
(144, 9, 9, 7, 10, '118', 'Active', '2022-02-10 13:07:31', NULL),
(145, 9, 9, 8, 10, '218', 'Active', '2022-02-10 13:07:49', NULL),
(146, 9, 9, 9, 10, '318', 'Active', '2022-02-10 13:08:04', NULL),
(147, 9, 9, 10, 10, '418', 'Active', '2022-02-10 13:08:23', NULL),
(148, 9, 9, 11, 10, '518', 'Active', '2022-02-10 13:08:43', NULL),
(149, 9, 9, 7, 12, '105', 'Active', '2022-02-10 13:09:24', NULL),
(150, 9, 9, 7, 12, '113', 'Active', '2022-02-10 13:11:12', NULL),
(151, 9, 9, 8, 12, '205', 'Active', '2022-02-10 13:11:28', NULL),
(152, 9, 9, 8, 12, '213', 'Active', '2022-02-10 13:11:47', NULL),
(153, 9, 9, 9, 12, '306', 'Active', '2022-02-10 13:12:10', NULL),
(154, 9, 9, 9, 12, '313', 'Active', '2022-02-10 13:12:26', NULL),
(155, 9, 9, 10, 12, '406', 'Active', '2022-02-10 13:12:45', NULL),
(156, 9, 9, 10, 12, '414', 'Active', '2022-02-10 13:13:03', NULL),
(157, 9, 9, 11, 12, '506', 'Active', '2022-02-10 13:13:27', NULL),
(158, 9, 9, 11, 12, '514', 'Active', '2022-02-10 13:13:45', NULL),
(159, 9, 10, 7, 9, '101', 'Active', '2022-02-10 13:15:05', NULL),
(160, 9, 10, 8, 9, '201', 'Active', '2022-02-10 13:15:25', NULL),
(161, 9, 10, 9, 9, '301', 'Active', '2022-02-10 13:15:44', NULL),
(162, 9, 10, 10, 9, '401', 'Active', '2022-02-10 13:16:03', NULL),
(163, 9, 10, 11, 9, '501', 'Active', '2022-02-10 13:16:22', NULL),
(164, 9, 10, 7, 10, '115', 'Active', '2022-02-10 13:17:05', NULL),
(165, 9, 10, 8, 10, '216', 'Active', '2022-02-10 13:17:25', NULL),
(166, 9, 10, 9, 10, '316', 'Active', '2022-02-10 13:17:44', NULL),
(167, 9, 10, 10, 10, '416', 'Active', '2022-02-10 13:18:04', NULL),
(168, 9, 10, 11, 10, '516', 'Active', '2022-02-10 13:19:21', NULL),
(169, 9, 10, 7, 13, '108', 'Active', '2022-02-10 13:20:34', NULL),
(170, 9, 10, 8, 13, '208', 'Active', '2022-02-10 13:20:50', NULL),
(171, 9, 10, 9, 13, '308', 'Active', '2022-02-10 13:21:09', NULL),
(172, 9, 10, 10, 13, '408', 'Active', '2022-02-10 13:21:42', NULL),
(173, 9, 10, 11, 13, '508', 'Active', '2022-02-10 13:22:08', NULL),
(174, 9, 10, 7, 12, '106', 'Active', '2022-02-10 13:22:39', NULL),
(175, 9, 10, 7, 12, '110', 'Active', '2022-02-10 13:23:03', NULL),
(176, 9, 10, 7, 12, '109', 'Active', '2022-02-10 13:23:41', NULL),
(177, 9, 10, 8, 12, '207', 'Active', '2022-02-10 13:24:04', NULL),
(178, 9, 10, 8, 12, '210', 'Active', '2022-02-10 13:24:20', NULL),
(179, 9, 10, 8, 12, '209', 'Active', '2022-02-10 13:24:39', NULL),
(180, 9, 10, 9, 12, '307', 'Active', '2022-02-10 13:24:56', NULL),
(181, 9, 10, 9, 12, '310', 'Active', '2022-02-10 13:25:19', NULL),
(182, 9, 10, 9, 12, '309', 'Active', '2022-02-10 13:25:36', NULL),
(183, 9, 10, 10, 12, '407', 'Active', '2022-02-10 13:26:10', NULL),
(184, 9, 10, 10, 12, '409', 'Active', '2022-02-10 13:26:53', NULL),
(185, 9, 10, 10, 12, '410', 'Active', '2022-02-10 13:27:32', NULL),
(186, 9, 10, 11, 12, '507', 'Active', '2022-02-10 13:27:52', NULL),
(187, 9, 10, 11, 12, '509', 'Active', '2022-02-10 13:28:10', NULL),
(188, 9, 10, 11, 12, '510', 'Active', '2022-02-10 13:28:27', NULL),
(189, 9, 10, 7, 11, '102', 'Active', '2022-02-10 13:30:07', NULL),
(190, 9, 10, 7, 11, '103', 'Active', '2022-02-10 13:30:27', NULL),
(191, 9, 10, 7, 11, '104', 'Active', '2022-02-10 13:31:25', NULL),
(192, 9, 10, 7, 11, '105', 'Active', '2022-02-10 13:31:47', NULL),
(193, 9, 10, 7, 11, '114', 'Active', '2022-02-10 13:39:13', NULL),
(194, 9, 10, 7, 11, '113', 'Active', '2022-02-10 13:39:26', NULL),
(195, 9, 10, 7, 11, '112', 'Active', '2022-02-10 13:39:48', NULL),
(196, 9, 10, 7, 11, '111', 'Active', '2022-02-10 13:40:01', NULL),
(197, 9, 10, 8, 11, '202', 'Active', '2022-02-10 13:40:15', NULL),
(198, 9, 10, 8, 11, '203', 'Active', '2022-02-10 13:40:28', NULL),
(199, 9, 10, 8, 11, '204', 'Active', '2022-02-10 13:40:43', NULL),
(200, 9, 10, 8, 11, '205', 'Active', '2022-02-10 13:41:00', NULL),
(201, 9, 10, 8, 11, '214', 'Active', '2022-02-10 13:41:16', NULL),
(202, 9, 10, 8, 11, '213', 'Active', '2022-02-10 13:41:30', NULL),
(203, 9, 10, 8, 11, '212', 'Active', '2022-02-10 13:41:46', NULL),
(204, 9, 10, 8, 11, '211', 'Active', '2022-02-10 13:42:02', NULL),
(205, 9, 10, 9, 11, '302', 'Active', '2022-02-10 13:42:26', NULL),
(206, 9, 10, 9, 11, '303', 'Active', '2022-02-10 13:42:39', NULL),
(207, 9, 10, 9, 11, '304', 'Active', '2022-02-10 13:42:54', NULL),
(208, 9, 10, 9, 11, '306', 'Active', '2022-02-10 13:43:11', NULL),
(209, 9, 10, 9, 11, '315', 'Active', '2022-02-10 13:43:29', NULL),
(210, 9, 10, 9, 11, '313', 'Active', '2022-02-10 13:43:47', NULL),
(211, 9, 10, 9, 11, '312', 'Active', '2022-02-10 13:44:03', NULL),
(212, 9, 10, 9, 11, '311', 'Active', '2022-02-10 13:44:17', NULL),
(213, 9, 10, 10, 11, '402', 'Active', '2022-02-10 13:44:30', NULL),
(214, 9, 10, 10, 11, '403', 'Active', '2022-02-10 13:44:46', NULL),
(215, 9, 10, 10, 11, '405', 'Active', '2022-02-10 13:45:02', NULL),
(216, 9, 10, 10, 11, '406', 'Active', '2022-02-10 13:45:16', NULL),
(217, 9, 10, 10, 11, '415', 'Active', '2022-02-10 13:45:31', NULL),
(218, 9, 10, 10, 11, '414', 'Active', '2022-02-10 13:45:47', NULL),
(219, 9, 10, 10, 11, '412', 'Active', '2022-02-10 13:46:01', NULL),
(220, 9, 10, 10, 11, '411', 'Active', '2022-02-10 13:46:15', NULL),
(221, 9, 10, 11, 11, '502', 'Active', '2022-02-10 13:46:32', NULL),
(222, 9, 10, 11, 11, '504', 'Active', '2022-02-10 13:46:47', NULL),
(223, 9, 10, 11, 11, '505', 'Active', '2022-02-10 13:47:05', NULL),
(224, 9, 10, 11, 11, '506', 'Active', '2022-02-10 13:47:19', NULL),
(225, 9, 10, 11, 11, '515', 'Active', '2022-02-10 13:47:33', NULL),
(226, 9, 10, 11, 11, '514', 'Active', '2022-02-10 13:47:46', NULL),
(227, 9, 10, 11, 11, '513', 'Active', '2022-02-10 13:48:05', NULL),
(228, 9, 10, 11, 11, '511', 'Active', '2022-02-10 13:48:24', NULL),
(229, 9, 11, 7, 9, '101', 'Active', '2022-02-10 13:49:15', NULL),
(230, 9, 11, 8, 9, '201', 'Active', '2022-02-10 13:49:55', NULL),
(231, 9, 11, 9, 9, '301', 'Active', '2022-02-10 13:50:10', NULL),
(232, 9, 11, 10, 9, '401', 'Active', '2022-02-10 13:50:26', NULL),
(233, 9, 11, 11, 9, '501', 'Active', '2022-02-10 13:50:42', NULL),
(234, 9, 11, 7, 10, '115', 'Active', '2022-02-10 13:51:06', NULL),
(235, 9, 11, 8, 10, '216', 'Active', '2022-02-10 13:51:22', NULL),
(236, 9, 11, 9, 10, '316', 'Active', '2022-02-10 13:51:36', NULL),
(237, 9, 11, 10, 10, '416', 'Active', '2022-02-10 13:51:54', NULL),
(238, 9, 11, 11, 10, '516', 'Active', '2022-02-10 13:52:10', NULL),
(239, 9, 11, 7, 11, '102', 'Active', '2022-02-10 13:52:37', NULL),
(240, 9, 11, 7, 11, '103', 'Active', '2022-02-10 13:52:55', NULL),
(241, 9, 11, 7, 11, '104', 'Active', '2022-02-10 13:53:17', NULL),
(242, 9, 11, 7, 11, '105', 'Active', '2022-02-10 13:53:35', NULL),
(243, 9, 11, 7, 11, '111', 'Active', '2022-02-10 13:53:50', NULL),
(244, 9, 11, 7, 11, '112', 'Active', '2022-02-10 13:54:06', NULL),
(245, 9, 11, 7, 11, '113', 'Active', '2022-02-10 13:54:21', NULL),
(246, 9, 11, 7, 11, '114', 'Active', '2022-02-10 13:54:35', NULL),
(247, 9, 11, 8, 11, '202', 'Active', '2022-02-10 13:54:51', NULL),
(248, 9, 11, 8, 11, '203', 'Active', '2022-02-10 13:55:03', NULL),
(249, 9, 11, 8, 11, '204', 'Active', '2022-02-10 13:55:16', NULL),
(250, 9, 11, 7, 11, '205', 'Active', '2022-02-10 13:55:32', NULL),
(251, 9, 11, 8, 11, '214', 'Active', '2022-02-10 13:55:54', NULL),
(253, 9, 11, 8, 11, '212', 'Active', '2022-02-10 13:56:25', NULL),
(254, 9, 11, 8, 11, '211', 'Active', '2022-02-10 13:56:39', NULL),
(255, 9, 11, 9, 11, '302', 'Active', '2022-02-10 13:56:57', NULL),
(256, 9, 11, 9, 11, '303', 'Active', '2022-02-10 13:57:12', NULL),
(257, 9, 11, 9, 11, '304', 'Active', '2022-02-10 13:57:30', NULL),
(258, 9, 11, 9, 11, '306', 'Active', '2022-02-10 13:57:52', NULL),
(259, 9, 11, 9, 11, '315', 'Active', '2022-02-10 13:58:53', NULL),
(260, 9, 11, 9, 11, '313', 'Active', '2022-02-10 13:59:07', NULL),
(261, 9, 11, 9, 11, '312', 'Active', '2022-02-10 13:59:24', NULL),
(262, 9, 11, 9, 11, '311', 'Active', '2022-02-10 13:59:37', NULL),
(263, 9, 11, 10, 11, '402', 'Active', '2022-02-10 14:00:15', NULL),
(264, 9, 11, 10, 11, '403', 'Active', '2022-02-10 14:00:35', NULL),
(265, 9, 11, 10, 11, '405', 'Active', '2022-02-10 14:00:59', NULL),
(266, 9, 11, 10, 11, '406', 'Active', '2022-02-10 14:01:14', NULL),
(267, 9, 11, 10, 11, '415', 'Active', '2022-02-10 14:01:29', NULL),
(268, 9, 11, 10, 11, '414', 'Active', '2022-02-10 14:01:43', NULL),
(269, 9, 11, 10, 11, '412', 'Active', '2022-02-10 14:02:09', NULL),
(270, 9, 11, 10, 11, '411', 'Active', '2022-02-10 14:02:23', NULL),
(271, 9, 11, 11, 11, '502', 'Active', '2022-02-10 14:02:56', NULL),
(272, 9, 11, 11, 11, '504', 'Active', '2022-02-10 14:03:10', NULL),
(273, 9, 11, 11, 11, '505', 'Active', '2022-02-10 14:03:28', NULL),
(274, 9, 11, 11, 11, '506', 'Active', '2022-02-10 14:03:43', NULL),
(275, 9, 11, 11, 11, '515', 'Active', '2022-02-10 14:04:00', NULL),
(276, 9, 11, 11, 11, '514', 'Active', '2022-02-10 14:04:19', NULL),
(277, 9, 11, 11, 11, '513', 'Active', '2022-02-10 14:04:40', NULL),
(278, 9, 11, 11, 11, '511', 'Active', '2022-02-10 14:04:57', NULL),
(279, 9, 11, 7, 12, '106', 'Active', '2022-02-10 14:05:40', NULL),
(280, 9, 11, 7, 12, '110', 'Active', '2022-02-10 14:05:53', NULL),
(281, 9, 11, 7, 12, '109', 'Active', '2022-02-10 14:06:11', NULL),
(282, 9, 11, 8, 12, '207', 'Active', '2022-02-10 14:06:25', NULL),
(283, 9, 11, 8, 12, '210', 'Active', '2022-02-10 14:06:41', NULL),
(284, 9, 11, 8, 12, '209', 'Active', '2022-02-10 14:06:58', NULL),
(285, 9, 11, 9, 12, '307', 'Active', '2022-02-10 14:07:12', NULL),
(286, 9, 11, 9, 12, '310', 'Active', '2022-02-10 14:07:28', NULL),
(287, 9, 11, 9, 12, '309', 'Active', '2022-02-10 14:07:43', NULL),
(288, 9, 11, 10, 12, '407', 'Active', '2022-02-10 14:07:57', NULL),
(289, 9, 11, 10, 12, '410', 'Active', '2022-02-10 14:08:15', NULL),
(290, 9, 11, 10, 12, '409', 'Active', '2022-02-10 14:08:29', NULL),
(291, 9, 11, 11, 12, '507', 'Active', '2022-02-10 14:08:44', NULL),
(292, 9, 11, 11, 12, '510', 'Active', '2022-02-10 14:08:58', NULL),
(293, 9, 11, 11, 12, '509', 'Active', '2022-02-10 14:09:11', NULL),
(294, 9, 11, 7, 13, '108', 'Active', '2022-02-10 14:09:44', NULL),
(295, 9, 11, 8, 13, '208', 'Active', '2022-02-10 14:10:00', NULL),
(296, 9, 11, 9, 13, '308', 'Active', '2022-02-10 14:10:18', NULL),
(297, 9, 11, 10, 13, '408', 'Active', '2022-02-10 14:10:34', NULL),
(298, 9, 11, 11, 13, '508', 'Active', '2022-02-10 14:10:48', NULL),
(299, 9, 12, 7, 8, '101', 'Active', '2022-02-10 14:11:21', NULL),
(300, 9, 12, 8, 9, '201', 'Active', '2022-02-10 14:11:40', NULL),
(301, 9, 12, 9, 9, '301', 'Active', '2022-02-10 14:11:57', NULL),
(302, 9, 12, 10, 9, '401', 'Active', '2022-02-10 14:12:11', NULL),
(303, 9, 12, 11, 9, '501', 'Active', '2022-02-10 14:12:27', NULL),
(304, 9, 12, 7, 10, '114', 'Active', '2022-02-10 14:13:31', NULL),
(305, 9, 12, 8, 10, '214', 'Active', '2022-02-10 14:13:56', NULL),
(306, 9, 12, 9, 10, '314', 'Active', '2022-02-10 14:14:12', NULL),
(307, 9, 12, 10, 10, '415', 'Active', '2022-02-10 14:14:29', NULL),
(308, 9, 12, 11, 10, '515', 'Active', '2022-02-10 14:14:44', NULL),
(309, 9, 12, 7, 13, '108', 'Active', '2022-02-10 14:15:11', NULL),
(310, 9, 12, 8, 13, '208', 'Active', '2022-02-10 14:15:28', NULL),
(311, 9, 12, 9, 13, '308', 'Active', '2022-02-10 14:15:47', NULL),
(312, 9, 12, 10, 13, '408', 'Active', '2022-02-10 14:16:04', NULL),
(313, 9, 12, 11, 13, '508', 'Active', '2022-02-10 14:16:18', NULL),
(314, 9, 12, 7, 11, '102', 'Active', '2022-02-10 14:16:38', NULL),
(315, 9, 12, 7, 11, '103', 'Active', '2022-02-10 14:16:59', NULL),
(316, 9, 12, 7, 11, '104', 'Active', '2022-02-10 14:17:18', NULL),
(317, 9, 12, 7, 11, '105', 'Active', '2022-02-10 14:17:32', NULL),
(318, 9, 12, 7, 11, '113', 'Active', '2022-02-10 14:17:52', NULL),
(319, 9, 12, 7, 11, '112', 'Active', '2022-02-10 14:18:10', NULL),
(320, 9, 12, 7, 11, '111', 'Active', '2022-02-10 14:18:31', NULL),
(321, 9, 12, 8, 11, '202', 'Active', '2022-02-10 14:18:48', NULL),
(322, 9, 12, 8, 11, '203', 'Active', '2022-02-10 14:19:02', NULL),
(323, 9, 12, 8, 11, '204', 'Active', '2022-02-10 14:19:16', NULL),
(325, 9, 11, 8, 11, '213', 'Active', '2022-02-10 14:19:47', NULL),
(326, 9, 12, 8, 11, '212', 'Active', '2022-02-10 14:21:01', NULL),
(327, 9, 12, 8, 11, '211', 'Active', '2022-02-10 14:21:16', NULL),
(328, 9, 12, 9, 11, '302', 'Active', '2022-02-10 14:21:35', NULL),
(329, 9, 12, 9, 11, '303', 'Active', '2022-02-10 14:21:52', NULL),
(330, 9, 12, 9, 11, '304', 'Active', '2022-02-10 14:22:06', NULL),
(331, 9, 12, 9, 11, '306', 'Active', '2022-02-10 14:22:22', NULL),
(332, 9, 12, 9, 11, '313', 'Active', '2022-02-10 14:22:44', NULL),
(333, 9, 12, 9, 11, '312', 'Active', '2022-02-10 14:22:57', NULL),
(334, 9, 12, 9, 11, '311', 'Active', '2022-02-10 14:23:14', NULL),
(335, 9, 12, 10, 11, '402', 'Active', '2022-02-10 14:23:27', NULL),
(336, 9, 12, 10, 11, '403', 'Active', '2022-02-10 14:23:43', NULL),
(337, 9, 12, 10, 11, '405', 'Active', '2022-02-10 14:24:01', NULL),
(338, 9, 12, 10, 11, '406', 'Active', '2022-02-10 14:24:21', NULL),
(339, 9, 12, 10, 11, '414', 'Active', '2022-02-10 14:24:40', NULL),
(340, 9, 12, 10, 11, '412', 'Active', '2022-02-10 14:24:55', NULL),
(341, 9, 12, 10, 11, '411', 'Active', '2022-02-10 14:25:15', NULL),
(342, 9, 12, 11, 11, '502', 'Active', '2022-02-10 14:25:34', NULL),
(343, 9, 12, 11, 11, '504', 'Active', '2022-02-10 14:25:48', NULL),
(344, 9, 12, 11, 11, '505', 'Active', '2022-02-10 14:26:24', NULL),
(345, 9, 12, 11, 11, '506', 'Active', '2022-02-10 14:26:40', NULL),
(346, 9, 12, 11, 11, '514', 'Active', '2022-02-10 14:26:53', NULL),
(347, 9, 12, 11, 11, '513', 'Active', '2022-02-10 14:27:10', NULL),
(348, 9, 12, 11, 11, '511', 'Active', '2022-02-10 14:27:28', NULL),
(349, 9, 12, 7, 12, '106', 'Active', '2022-02-10 14:27:58', NULL),
(350, 9, 12, 7, 12, '110', 'Active', '2022-02-10 14:28:12', NULL),
(351, 9, 12, 7, 12, '109', 'Active', '2022-02-10 14:28:26', NULL),
(352, 9, 12, 8, 12, '207', 'Active', '2022-02-10 14:28:39', NULL),
(353, 9, 12, 8, 12, '210', 'Active', '2022-02-10 14:28:53', NULL),
(354, 9, 12, 8, 12, '209', 'Active', '2022-02-10 14:29:14', NULL),
(355, 9, 12, 9, 12, '307', 'Active', '2022-02-10 14:29:33', NULL),
(356, 9, 12, 9, 12, '309', 'Active', '2022-02-10 14:29:49', NULL),
(357, 9, 12, 9, 12, '310', 'Active', '2022-02-10 14:30:13', NULL),
(358, 9, 12, 10, 12, '407', 'Active', '2022-02-10 14:30:35', NULL),
(359, 9, 12, 10, 12, '409', 'Active', '2022-02-10 14:30:52', NULL),
(360, 9, 12, 10, 12, '410', 'Active', '2022-02-10 14:31:07', NULL),
(361, 9, 12, 11, 12, '507', 'Active', '2022-02-10 14:31:26', NULL),
(362, 9, 12, 11, 12, '509', 'Active', '2022-02-10 14:31:40', NULL),
(363, 9, 12, 11, 12, '510', 'Active', '2022-02-10 14:31:57', NULL),
(364, 9, 9, 8, 8, '210', 'Active', '2022-02-10 14:41:31', NULL),
(365, 9, 9, 8, 9, '211', 'Active', '2022-02-10 14:41:54', NULL),
(367, 9, 9, 11, 9, '513', 'Active', '2022-02-10 14:42:31', NULL),
(368, 9, 9, 11, 9, '508', 'Active', '2022-02-11 05:00:46', NULL),
(369, 9, 12, 8, 11, '205', 'Active', '2022-02-11 05:10:34', NULL),
(370, 9, 12, 8, 11, '213', 'Active', '2022-02-11 05:15:43', NULL);

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
  MODIFY `flatnumber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
