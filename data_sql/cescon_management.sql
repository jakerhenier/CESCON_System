-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 05:36 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cescon_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `district` varchar(191) NOT NULL,
  `date_established` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `name`, `description`, `address`, `district`, `date_established`) VALUES
(8, 'IBCP Mulig', 'Warren is lit!', 'Mulig Toril, Davao City', 'Davao City', '2018-12-10 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `location` varchar(191) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `details` varchar(191) NOT NULL,
  `rate` double NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `title`, `location`, `date`, `details`, `rate`, `branch_id`) VALUES
(1, 'National Youth Camp 2018', 'Km. 4 Hilltop Bajada Davao City', '2018-12-09 16:00:00', 'National Youth Camp 2018', 500, 8);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `DOB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sex` varchar(6) NOT NULL,
  `contact_number` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `allergies` varchar(191) DEFAULT NULL,
  `church_name` varchar(191) NOT NULL,
  `church_address` varchar(191) NOT NULL,
  `church_district` varchar(191) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `pastor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `last_name`, `first_name`, `DOB`, `sex`, `contact_number`, `email`, `allergies`, `church_name`, `church_address`, `church_district`, `branch_id`, `pastor_id`) VALUES
(3, 'Rezane', 'Warren', '1999-01-19 16:00:00', 'Male', '9667591163', 'warzkie123@gmail.com', 'Chicken ', 'IBCP Center Church', 'Tionko Avenue, Davao City', 'Davao City', 8, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `members_view`
-- (See below for the actual view)
--
CREATE TABLE `members_view` (
`member_id` int(11)
,`member_name` varchar(383)
,`sex` varchar(6)
,`dob` timestamp
,`allergies` varchar(191)
,`church_name` varchar(191)
,`church_address` varchar(191)
,`church_district` varchar(191)
,`pastor_name` varchar(383)
,`contact_number` varchar(191)
,`email` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `pastor`
--

CREATE TABLE `pastor` (
  `pastor_number` int(11) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `contact_number` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pastor`
--

INSERT INTO `pastor` (`pastor_number`, `last_name`, `first_name`, `contact_number`) VALUES
(3, 'Penano', 'Daniel Dale', '9667591163'),
(4, 'Deliverio', 'Tito', '9078215066');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `event_id` int(11) NOT NULL,
  `staff_number` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `member_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_number` int(11) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `contact_number` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `access_level` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_number`, `last_name`, `first_name`, `contact_number`, `username`, `password`, `access_level`, `branch_id`) VALUES
(3, 'Rezane', 'Warren', '9667591163', 'warshock10', 'dUJTM3FsZWtkQzF5TC9TR21LeTJJUT09', 1, 8),
(7, 'Barnido', 'Ruel', '9667591163', 'barnido', 'SE9teDgyZlRqWVByeVgxaVcyaGNRdz09', 1, 8);

-- --------------------------------------------------------

--
-- Structure for view `members_view`
--
DROP TABLE IF EXISTS `members_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `members_view`  AS  select `member`.`member_id` AS `member_id`,concat(`member`.`first_name`,' ',`member`.`last_name`) AS `member_name`,`member`.`sex` AS `sex`,`member`.`DOB` AS `dob`,`member`.`allergies` AS `allergies`,`member`.`church_name` AS `church_name`,`member`.`church_address` AS `church_address`,`member`.`church_district` AS `church_district`,concat(`pastor`.`first_name`,' ',`pastor`.`last_name`) AS `pastor_name`,`member`.`contact_number` AS `contact_number`,`member`.`email` AS `email` from (`member` join `pastor` on((`member`.`pastor_id` = `pastor`.`pastor_number`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `pastor`
--
ALTER TABLE `pastor`
  ADD PRIMARY KEY (`pastor_number`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pastor`
--
ALTER TABLE `pastor`
  MODIFY `pastor_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
