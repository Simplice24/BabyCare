-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 08:18 PM
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
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `babysitter_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `booking_id`, `babysitter_id`, `created_at`, `updated_at`) VALUES
(1, 18, 8, 1688558871, 1688558871);

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
('Babysitter', '10', 1687394618),
('Babysitter', '11', 1687487555),
('Babysitter', '12', 1687487650),
('Babysitter', '6', 1685618304),
('Babysitter', '8', 1686183400),
('Babysitter', '9', 1687393468),
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
('create_role', 2, 'Create  role permission', NULL, NULL, 1688530076, 1688530076),
('Delete_favorites', 2, 'Delete favorites permission', NULL, NULL, 1685930810, 1685930810),
('Delete_user', 2, 'Delete user permission', NULL, NULL, 1686190008, 1686190008),
('Parent', 1, 'Parent Role', NULL, NULL, 1685616201, 1685616201),
('Update_availability', 2, 'Update Availability Permission', NULL, NULL, 1685616201, 1685616201),
('Update_favorites', 2, 'Update favorites permission', NULL, NULL, 1685930782, 1685930782),
('update_role', 2, 'Update role permissions', NULL, NULL, 1688530056, 1688530056),
('View_bookings', 2, 'View Bookings Permission', NULL, NULL, 1685616201, 1685616201),
('View_favorites', 2, 'View favorites permission', NULL, NULL, 1685930794, 1685930794),
('view_roles', 2, 'View roles permission', NULL, NULL, 1688530020, 1688530020);

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
('Admin', 'create_role'),
('Admin', 'Delete_user'),
('Admin', 'update_role'),
('Admin', 'View_availability'),
('Admin', 'View_bookings'),
('Admin', 'View_cancellation'),
('Admin', 'View_favorites'),
('Admin', 'view_roles'),
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
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `starting_time` time DEFAULT NULL,
  `ending_time` time NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `user_id`, `date`, `starting_time`, `ending_time`, `created_at`, `updated_at`) VALUES
(6, 10, '2023-06-15', '16:51:00', '17:51:00', 1686549973, 1686549973),
(7, 8, '2023-06-15', '16:51:00', '17:51:00', 1686549973, 1686549973);

-- --------------------------------------------------------

--
-- Table structure for table `babysitter`
--

CREATE TABLE `babysitter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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
  `service` varchar(225) NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `babysitter_age_range`, `languages_spoken`, `gender`, `number_of_babysitters`, `date`, `service`, `starting_time`, `ending_time`, `status`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, '18-23', 'French', 'Male', 2, '2023-05-30', 'Overnight care', '08:00:00', '11:00:00', 0, 'nsimplice0@gmail.com', '+250723438222', 'MUHANGA', 1685412352, 1685412352),
(2, '20-28', 'French', 'Female', 1, '2023-05-30', 'Weekend care', '07:00:00', '00:00:00', 0, 'honore.kimenyi@gmail.com', '+250782576633', 'KIGALI', 1685415945, 1685415945),
(3, '20-30', 'Kinyarwanda', 'Male', 1, '2023-05-31', 'Daytime care\r\n', '10:00:00', '00:00:00', 0, 'honore.kimenyi@gmail.com', '+250782576633', 'KIGALI', 1685527532, 1685527532),
(4, '18-20', 'French', 'Female', 3, '2023-05-31', 'Daytime care', '00:26:00', '13:27:00', 0, 'nsimplice0@gmail.com', '+250782576633', 'KIGALI', 1685527524, 1685527524),
(5, '18-21', 'English', 'Male', 1, '2023-05-31', 'Weekend care', '00:27:00', '00:27:00', 0, 'toptech@gmail.com', '0782040963', 'NYAGATARE', 1685527524, 1685527524),
(12, '20-28', 'English', 'Male', 1, '2023-06-06', 'Overnight care', '11:19:00', '00:19:00', 0, 'nsimplice0@gmail.com', '+250782576633', 'KIGALI', 1686042403, 1686042403),
(13, '20-30', 'French', 'Male', 2, '2023-06-07', 'Daytime care', '16:15:00', '17:15:00', 0, 'honore.kimenyi@gmail.com', '+250782576633', 'KIGALI', 1686190017, 1686190017),
(18, '20-28', 'English', 'Female', 1, '2023-06-15', 'Daytime care', '16:51:00', '17:51:00', 1, 'elissamunanira@gmail.com', '234568765', 'KIGALI', 1686708402, 1686708402);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `names`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KIMENYI Honore', 'honore.kimenyi@gmail.com', 'We need more options as services', 1, 1686971170, 1686971170),
(2, 'KIMENYI Honore', 'honore.kimenyi@gmail.com', 'I\'m happy for the Overnight care, this real helped me.', 1, 1686971199, 1686971199),
(3, 'NIYONZIMA Simplice', 'nsimplice0@gmail.com', 'Feedback carousel displaying,  ', 1, 1686971206, 1686971206),
(4, 'MUNANIRA Elissa', 'munanira64@gmail.com', 'Testing for testimonial display', 1, 1686971172, 1686971172),
(5, 'MUPENZI Espoir', 'muespoire@gmail.com', 'Testing for the third Carousel ', 1, 1686971165, 1686971165),
(6, 'NYANGEZI Yussuf', 'yussufny@gmail.com', 'Testing for the third carousel and also responsive of testimonial card when message is bigger,\r\nTesting for the third carousel and also responsive of testimonial card when message is bigger,\r\nTesting for the third carousel and also responsive of testimonial card when message is bigger,', 0, 1686971199, 1686971199),
(7, 'NIYONZIMA Simplice', 'nsimplice0@gmail.com', 'dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud', 1, 1686971187, 1686971187),
(9, 'KIMENYI Honore', 'nsimplice0@gmail.com', 'ertyuikmnbvcxdhj', 0, 1687154782, 1687154782),
(10, 'NIYONZIMA Simplice', 'nsimplice0@gmail.com', 'Testing validation rules', 0, 1687154810, 1687154810);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(4) NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'Ikinyarwanda'),
(2, 'English'),
(3, 'French'),
(4, 'Spanish');

-- --------------------------------------------------------

--
-- Table structure for table `languages_babysitter`
--

CREATE TABLE `languages_babysitter` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `babysitter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages_babysitter`
--

INSERT INTO `languages_babysitter` (`id`, `language_id`, `babysitter_id`) VALUES
(9, 1, 10),
(10, 2, 10),
(11, 1, 2),
(12, 2, 2),
(13, 3, 2),
(14, 1, 8),
(15, 2, 8);

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Daytime care', 'This type of service involves providing care for children during the day while parents or guardians are at work. The provider may offer activities and educational opportunities for the children, as well as meals and snacks.', 1686794780, 1686794780),
(3, 'Overnight care', 'Some parents or guardians may need overnight care for their children due to work obligations or other reasons. A home babysitting business may offer overnight care services that include bedtime routines, sleeping arrangements, and supervision throughout the night.', 1686794775, 1686794775),
(4, '  After-school care', 'Many parents or guardians need care for their children after school while they finish work or other obligations. A home babysitting business may offer after-school care services that include homework help, snacks, and activities.', 1686794789, 1686794789),
(5, 'Weekend care', 'Some parents or guardians may need care for their children on weekends due to work or other commitments. A home babysitting business may offer weekend care services that include activities, meals, and supervision.', 1686794812, 1686794812),
(6, 'Specialized care', 'Some children may have special needs or medical conditions that require specialized care. A home babysitting business may offer specialized care services that cater to the specific needs of each child.', 1686794779, 1686794779);

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
  `birthdate` date DEFAULT NULL,
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

INSERT INTO `user` (`id`, `fullname`, `username`, `profile`, `email`, `birthdate`, `password_hash`, `role`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Simplice NIYONZIMA', 'Simplice', 'profiles/userImage.jpg', 'nsimplice0@gmail.com', NULL, '$2y$13$b5IH4UTzpOqDsFaeel6xPeUPrFpCJWmgn0ZNSuwfc/o294O11OQOO', 'Admin', 'ZlmZDykq-UBUF5mHJg9jufR21lSQfTu5', 10, 1684994737, 1684994737),
(2, 'James Gosling', 'Gosling', 'profiles/userImage.jpg', 'jamesgosling01@gmail.com', '1989-06-21', '$2y$13$Mtc1PJf//UFg1oBw5qCVsOdHHQp865MEIaWbzMrhHIzWmBGHdkuwe', 'Babysitter', 'pOAQbbei8S_SgregfR3qoyBJPS6BB86W', 10, 1685329530, 1685329530),
(3, 'KIMENYI Honore', 'Honore', 'profiles/userImage.jpg', 'honore.kimenyi@gmail.com', NULL, '$2y$13$1jSWl4/VLMK8fRrmQbR1xe0Ad7JvTe0Dqa4YuyT8hduMnzJCtfZR.', 'Parent', 'x3iiUCuQLGDhs2ntPBu20WQi91L9uY33', 10, 1685329529, 1685329529),
(8, 'NIYITANGA Aime', 'Aime', 'profiles/userImage.jpg', 'niyitangaaime0@gmail.com', '2000-05-12', '$2y$13$Sc9IXuuPDxbzHdcaAmVMe.J6p5qrpSWBaSUnZ.BwJyTXTEvb4DboW', 'Babysitter', 'gNp2V7Me6QwT__gaiOt3Tx_kTBJm2VC8', 10, 1686189999, 1686189999),
(10, 'Elissa Munanira', 'Munanira', 'profiles/userImage.jpg', 'munanira64@gmail.com', '2000-05-12', '$2y$13$RQ6zDuq6cVmzpfRTi61L0.sdDM1rZU7T8wLkrwNRDao7xZppN22xO', 'Babysitter', 'k5Fk-P1iPBS3kR5aTZhVPwnmTI60WiM-', 10, 1687399597, 1687399597),
(11, 'NIYEYIMANA  Aime Thierry', 'Thierry', 'profiles/userImage.jpg', 'aimethierry@gmail.com', '2001-03-11', '$2y$13$W6z9ecZoJ3aMGZEKJa9Al.JtRoshSxsVApdCrka3grg1m.R9Vw1dC', 'Babysitter', 'x5lONy7rgxs-nqNwxqrl9H3A91f4-yHE', 11, 1687493194, 1687493194),
(12, 'MUPENZI Espoir', 'Espoir', 'profiles/userImage.jpg', 'muespoir@gmail.com', '1999-02-12', '$2y$13$94brLfa9n27E9oNj5F8GcOmiL7i6fI5qf2fwWw0jLe969wE1P8Cj.', 'Babysitter', 'vF6EPLAmVl_WP_VI2pZtDp2EhJJV7H6F', 10, 1687493169, 1687493169);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `babysitter_id` (`babysitter_id`);

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
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages_babysitter`
--
ALTER TABLE `languages_babysitter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `babysitter_id` (`babysitter_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `babysitter`
--
ALTER TABLE `babysitter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages_babysitter`
--
ALTER TABLE `languages_babysitter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`babysitter_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `babysitter`
--
ALTER TABLE `babysitter`
  ADD CONSTRAINT `babysitter_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `languages_babysitter`
--
ALTER TABLE `languages_babysitter`
  ADD CONSTRAINT `languages_babysitter_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `languages_babysitter_ibfk_2` FOREIGN KEY (`babysitter_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
