-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 07:06 AM
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
(3, 'Subadmin', 'jamal', 'test12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '6200e4787b130.jpg', 'Active', '2022-02-07 09:20:56', NULL);

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
(1, 2, 'Block A', 'Active', '2022-02-03 10:36:01', NULL),
(3, 2, 'Block B', 'Active', '2022-02-04 11:12:24', NULL),
(4, 2, 'Block C', 'Active', '2022-02-04 11:12:34', NULL),
(5, 2, 'Block D', 'Active', '2022-02-04 11:12:51', NULL),
(6, 2, 'Block E', 'Active', '2022-02-04 11:13:03', NULL);

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
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` enum('Active','Inactive','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `daughter_name` varchar(255) DEFAULT NULL,
  `daughter_age` varchar(255) DEFAULT NULL,
  `daughter_profession` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_details`
--

INSERT INTO `family_details` (`id`, `customer_id`, `son_name`, `son_age`, `son_profession`, `daughter_name`, `daughter_age`, `daughter_profession`, `status`) VALUES
(1, 12, 'kani', '22', 'Employee', NULL, NULL, NULL, 'Active'),
(2, 12, 'mani', '12', 'Student', NULL, NULL, NULL, 'Active'),
(3, 12, NULL, NULL, NULL, 'nimi', '25', 'Employee', 'Active'),
(4, 13, 's', 'sds', 'Employee', NULL, NULL, NULL, 'Active'),
(5, 13, NULL, NULL, NULL, 'sd', 'sd', 'Student', 'Active');

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
(1, '1 BHK', 'Active', '2022-02-04 11:05:47', '2022-02-04 11:06:00'),
(2, '2 BHK', 'Active', '2022-02-04 11:06:09', NULL),
(3, '2 BHK P', 'Active', '2022-02-04 11:06:24', '2022-02-04 11:06:34'),
(4, '2 BHK SP', 'Active', '2022-02-04 11:06:45', NULL),
(5, '3 BHK', 'Active', '2022-02-04 11:06:58', NULL),
(6, '3 BHK P', 'Active', '2022-02-04 11:07:07', NULL);

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
(1, 'First Floor', 'Active', '2022-02-04 07:07:25', NULL),
(2, 'Second Floor', 'Active', '2022-02-04 07:07:41', '2022-02-04 07:33:13'),
(3, 'Third Floor', 'Active', '2022-02-04 07:33:02', NULL),
(4, 'Fourth Floor', 'Active', '2022-02-04 07:33:24', NULL),
(5, 'Fifth Floor', 'Active', '2022-02-04 07:33:43', NULL);

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
(2, 'Phase 1', 'Active', '2022-02-02 12:00:54', NULL);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cardtypes`
--
ALTER TABLE `cardtypes`
  MODIFY `cardtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `flatnumbers`
--
ALTER TABLE `flatnumbers`
  MODIFY `flatnumber_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flattypes`
--
ALTER TABLE `flattypes`
  MODIFY `flattype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `phase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
