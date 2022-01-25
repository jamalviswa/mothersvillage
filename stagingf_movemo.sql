-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2022 at 06:18 AM
-- Server version: 5.7.37
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stagingf_movemo`
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
  `profile` varchar(255) NOT NULL,
  `status` enum('Active','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`admin_id`, `adminname`, `username`, `email`, `password`, `profile`, `status`) VALUES
(1, 'Admin', 'admin', 'testuserlt1@gmail.com', '0192023a7bbd73250516f069df18b500', '5f312db0219bd.png', 'Active');

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('Active','Inactive','Trash') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `created_date`, `status`) VALUES
(1, 'walking', 'walk', '2021-07-10 05:39:26', 'Trash'),
(2, 'Category 2', 'Lorem ipsum is a placeholder text', '2021-07-10 05:47:51', 'Trash'),
(3, 'fgh', 'fgh', '2021-07-10 05:48:54', 'Trash'),
(4, 'jogging', 'jog', '2021-07-17 11:35:28', 'Active'),
(5, 'swimming', 'swim module', '2021-07-21 02:53:40', 'Active'),
(6, 'Running', 'Run', '2021-07-21 03:28:06', 'Active'),
(7, 'cycling', 'cycling module', '2021-08-09 12:44:34', 'Active'),
(8, 'Streching', 'Bend , strech', '2021-08-13 12:10:42', 'Trash');

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
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pack` enum('Free','Premium') DEFAULT NULL,
  `num_cards` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_date` int(11) NOT NULL,
  `status` enum('Active','Inactive','Trash') DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `category`, `name`, `pack`, `num_cards`, `price`, `duration`, `created_date`, `status`) VALUES
(20, 5, 'Pack X', 'Premium', 2, 20, '1 Month', 2021, 'Inactive'),
(19, 5, 'Butterfly pack', 'Premium', 2, 24, '1 Month', 2021, 'Active'),
(7, 4, 'Package S', 'Premium', 4, 600, '1 Month', 2021, 'Active'),
(8, 4, 'Steady Jog', 'Premium', 6, 600, '1 Month', 2021, 'Active'),
(11, 5, 'BEGINNER SWIM PACK', 'Free', 50, 0, '1 Year', 2021, 'Active'),
(12, 6, 'Beginner Run', 'Premium', 25, 5, '1 Year', 2021, 'Active'),
(21, 4, 'Beginner Run', 'Premium', 2, 50, '1 Month', 2021, 'Active'),
(22, 5, 'pack s', 'Premium', 2, 20, '1 Month', 2021, 'Active');

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
-- Indexes for table `cardtypes`
--
ALTER TABLE `cardtypes`
  ADD PRIMARY KEY (`cardtype_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cardtypes`
--
ALTER TABLE `cardtypes`
  MODIFY `cardtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
