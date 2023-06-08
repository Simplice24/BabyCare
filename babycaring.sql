-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 02:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babycaring`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1685618530),
('Babysitter', '6', 1685618304),
('Babysitter', '8', 1686183400),
('Parent', '7', 1685618530);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, 'Administrator', NULL, NULL, 1685616201, 1685616201),
('Babysitter', 1, 'Babysitter Role', NULL, NULL, 1685616201, 1685616201),
('Ban_user', 2, 'Ban User Permission', NULL, NULL, 1685616201, 1685616201),
('Create_availability', 2, 'Create Availability Permission', NULL, NULL, 1685616201, 1685616201),
('Delete_favorites', 2, 'Delete favorites permission', NULL, NULL, 1685930810, 1685930810),
('Delete_user', 2, 'Delete user permission', NULL, NULL, 1686190008, 1686190008),
('Parent', 1, 'Parent Role', NULL, NULL, 1685616201, 1685616201),
('Update_availability', 2, 'Update Availability Permission', NULL, NULL, 1685616201, 1685616201),
('Update_favorites', 2, 'Update favorites permission', NULL, NULL, 1685930782, 1685930782),
('View_bookings', 2, 'View Bookings Permission', NULL, NULL, 1685616201, 1685616201),
('View_favorites', 2, 'View favorites permission', NULL, NULL, 1685930794, 1685930794);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', 'Ban_user'),
('Admin', 'Delete_user'),
('Admin', 'View_availability'),
('Admin', 'View_bookings'),
('Admin', 'View_cancellation'),
('Admin', 'View_favorites'),
('Babysitter', 'Create_availability'),
('Babysitter', 'Update_availability'),
('Babysitter', 'View_bookings'),
('Babysitter', 'View_favorites'),
('Parent', 'View_bookings'),
('Parent', 'View_favorites');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `babysitter`
--

CREATE TABLE `babysitter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `ratings` decimal(3,2) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `babysitter_age_range` varchar(50) NOT NULL,
  `languages_spoken` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `number_of_babysitters` int(11) NOT NULL,
  `date` date NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `babysitter_age_range`, `languages_spoken`, `gender`, `number_of_babysitters`, `date`, `starting_time`, `ending_time`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, '18-23', 'French', 'Male', 2, '2023-05-30', '08:00:00', '11:00:00', 'nsimplice0@gmail.com', '+250723438222', 'MUHANGA', 1685412352, 1685412352),
(2, '20-28', 'French', 'Female', 1, '2023-05-30', '07:00:00', '00:00:00', 'honore.kimenyi@gmail.com', '+250782576633', 'KIGALI', 1685415945, 1685415945),
(3, '20-30', 'Kinyarwanda', 'Male', 1, '2023-05-31', '10:00:00', '00:00:00', 'honore.kimenyi@gmail.com', '+250782576633', 'KIGALI', 1685527532, 1685527532),
(4, '18-20', 'French', 'Female', 3, '2023-05-31', '00:26:00', '13:27:00', 'nsimplice0@gmail.com', '+250782576633', 'KIGALI', 1685527524, 1685527524),
(5, '18-21', 'English', 'Male', 1, '2023-05-31', '00:27:00', '00:27:00', 'toptech@gmail.com', '0782040963', 'NYAGATARE', 1685527524, 1685527524),
(12, '20-28', 'English', 'Male', 1, '2023-06-06', '11:19:00', '00:19:00', 'nsimplice0@gmail.com', '+250782576633', 'KIGALI', 1686042403, 1686042403),
(13, '20-30', 'French', 'Male', 2, '2023-06-07', '16:15:00', '17:15:00', 'honore.kimenyi@gmail.com', '+250782576633', 'KIGALI', 1686190017, 1686190017);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1685010710),
('m230525_102016_create_user_table', 1685010716),
('m230601_102655_create_rbac_tables', 1685615800),
('m230601_104140_rbac_init', 1685616202);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profile` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `profile`, `email`, `password_hash`, `role`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Simplice NIYONZIMA', 'Simplice', 'profiles/userImage.jpg', 'nsimplice0@gmail.com', '$2y$13$DGH6U/RPF1tUnRQ4c4UDeePp/0F9pzbPoLLwbV.SBIFs9Lpuw76mm', 'Admin', 'ZlmZDykq-UBUF5mHJg9jufR21lSQfTu5', 10, 1684994737, 1684994737),
(2, 'James Gosling', 'Gosling', 'profiles/userImage.jpg', 'jamesgosling01@gmail.com', '$2y$13$Mtc1PJf//UFg1oBw5qCVsOdHHQp865MEIaWbzMrhHIzWmBGHdkuwe', 'Babysitter', 'pOAQbbei8S_SgregfR3qoyBJPS6BB86W', 10, 1685329530, 1685329530),
(3, 'KIMENYI Honore', 'Honore', 'profiles/userImage.jpg', 'honore.kimenyi@gmail.com', '$2y$13$1jSWl4/VLMK8fRrmQbR1xe0Ad7JvTe0Dqa4YuyT8hduMnzJCtfZR.', 'Parent', 'x3iiUCuQLGDhs2ntPBu20WQi91L9uY33', 10, 1685329529, 1685329529),
(8, 'NIYITANGA Aime', 'Aime', 'profiles/userImage.jpg', 'niyitangaaime0@gmail.com', '$2y$13$Sc9IXuuPDxbzHdcaAmVMe.J6p5qrpSWBaSUnZ.BwJyTXTEvb4DboW', 'Babysitter', 'gNp2V7Me6QwT__gaiOt3Tx_kTBJm2VC8', 11, 1686189999, 1686189999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `babysitter`
--
ALTER TABLE `babysitter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `babysitter`
--
ALTER TABLE `babysitter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `babysitter`
--
ALTER TABLE `babysitter`
  ADD CONSTRAINT `babysitter_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
