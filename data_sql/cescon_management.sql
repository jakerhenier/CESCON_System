-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 06:50 PM
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
(8, 'IBCP Center Church', 'This is the center branch for all churches in Davao City district.', 'Tionko Avenue, Davao City.', 'Davao City', '2018-12-10 16:00:00');

--
-- Triggers `branch`
--
DELIMITER $$
CREATE TRIGGER `after_branch_delete` AFTER DELETE ON `branch` FOR EACH ROW BEGIN 
	INSERT INTO branch_delete_logs (branch_id, name, address, district, date_established, date_deleted)
    VALUES (OLD.branch_id, OLD.name, OLD.address, OLD.district, OLD.date_established, NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_branch_update` AFTER UPDATE ON `branch` FOR EACH ROW BEGIN
	INSERT INTO branch_edit_logs (branch_id, old_name, old_description, old_address, old_district, old_date_established, date_edited)
    VALUES (OLD.branch_id, OLD.name, OLD.description, OLD.address, OLD.district, OLD.date_established, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `branch_delete_logs`
--

CREATE TABLE `branch_delete_logs` (
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `district` varchar(191) DEFAULT NULL,
  `date_established` timestamp NULL DEFAULT NULL,
  `deleted_by_user` int(11) DEFAULT NULL,
  `date_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch_edit_logs`
--

CREATE TABLE `branch_edit_logs` (
  `branch_id` int(11) DEFAULT NULL,
  `old_name` varchar(191) DEFAULT NULL,
  `old_description` varchar(191) DEFAULT NULL,
  `old_address` varchar(191) DEFAULT NULL,
  `old_district` varchar(191) DEFAULT NULL,
  `old_date_established` timestamp NULL DEFAULT NULL,
  `edited_by_user` int(11) DEFAULT NULL,
  `date_edited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 'National Youth Camp 2018', 'Catalunan Pequeno, Davao City', '2018-12-25 16:00:00', '', 499, 8);

--
-- Triggers `event`
--
DELIMITER $$
CREATE TRIGGER `after_event_delete` AFTER DELETE ON `event` FOR EACH ROW BEGIN
	INSERT INTO event_delete_logs (event_id, title, location, event_date, managed_by_branch, date_deleted)
    VALUES (OLD.event_id, OLD.title, OLD.location, OLD.date, OLD.branch_id, NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_event_update` AFTER UPDATE ON `event` FOR EACH ROW BEGIN
	INSERT INTO event_edit_logs (event_id, old_title, old_location, old_date, old_details, old_rate, managed_by_branch, date_edited)
    VALUES (OLD.event_id, OLD.title, OLD.location, OLD.date, OLD.details, OLD.rate, OLD.branch_id, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event_delete_logs`
--

CREATE TABLE `event_delete_logs` (
  `event_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `location` varchar(191) NOT NULL,
  `event_date` timestamp NULL DEFAULT NULL,
  `managed_by_branch` int(11) NOT NULL,
  `deleted_by_user` int(11) DEFAULT NULL,
  `date_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_edit_logs`
--

CREATE TABLE `event_edit_logs` (
  `event_id` int(11) DEFAULT NULL,
  `old_title` varchar(191) DEFAULT NULL,
  `old_location` varchar(191) DEFAULT NULL,
  `old_date` timestamp NULL DEFAULT NULL,
  `old_details` varchar(191) DEFAULT NULL,
  `old_rate` double DEFAULT NULL,
  `managed_by_branch` int(11) DEFAULT NULL,
  `edited_by_user` int(11) DEFAULT NULL,
  `date_edited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `DOB` timestamp NULL DEFAULT NULL,
  `sex` varchar(191) DEFAULT NULL,
  `contact_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `allergies` varchar(191) DEFAULT NULL,
  `church_name` varchar(191) DEFAULT NULL,
  `church_address` varchar(191) DEFAULT NULL,
  `church_district` varchar(191) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `pastor_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `last_name`, `first_name`, `DOB`, `sex`, `contact_number`, `email`, `allergies`, `church_name`, `church_address`, `church_district`, `branch_id`, `pastor_number`) VALUES
(3, 'Rezane', 'Warren', '1999-12-08 16:00:00', 'Male', '9667591163', 'justatest@gmail.com', 'Chicken ', 'IBCP Center Church', 'Tionko Avenue, Davao City', 'Davao City', 8, 1),
(4, 'Lendio', 'Jake', '1998-12-31 16:00:00', 'Male', '9667591163', 'justatest@gmail.com', '', 'IBCP Center Church', 'Tionko Avenue, Davao City', 'Davao City', 8, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `members_view`
-- (See below for the actual view)
--
CREATE TABLE `members_view` (
`member_id` int(11)
,`member_name` varchar(384)
,`sex` varchar(191)
,`dob` timestamp
,`allergies` varchar(191)
,`church_name` varchar(191)
,`church_address` varchar(191)
,`church_district` varchar(191)
,`pastor_name` varchar(384)
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
(1, 'Not listed', '', ''),
(6, 'Penano', 'Daniel', '9667591163');

--
-- Triggers `pastor`
--
DELIMITER $$
CREATE TRIGGER `after_pastor_delete` AFTER DELETE ON `pastor` FOR EACH ROW BEGIN
	INSERT INTO pastor_delete_logs (pastor_number, last_name, first_name, contact_number, date_deleted)
    VALUES (OLD.pastor_number, OLD.last_name, OLD.first_name, OLD.contact_number, NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_pastor_update` AFTER UPDATE ON `pastor` FOR EACH ROW BEGIN
	INSERT into pastor_edit_logs (pastor_number, old_last_name, old_first_name, old_contact_number, date_edited)
    VALUES (OLD.pastor_number, OLD.last_name, OLD.first_name, OLD.contact_number, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pastor_delete_logs`
--

CREATE TABLE `pastor_delete_logs` (
  `pastor_number` int(11) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `contact_number` varchar(191) DEFAULT NULL,
  `deleted_by_user` int(11) DEFAULT NULL,
  `date_deleted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pastor_edit_logs`
--

CREATE TABLE `pastor_edit_logs` (
  `pastor_number` int(11) DEFAULT NULL,
  `old_last_name` varchar(191) DEFAULT NULL,
  `old_first_name` varchar(191) DEFAULT NULL,
  `old_contact_number` varchar(191) DEFAULT NULL,
  `edit_by_user` int(11) DEFAULT NULL,
  `date_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `staff_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `event_id`, `last_name`, `first_name`, `staff_number`) VALUES
(3, 6, 'Rezane', 'Warren', 1),
(4, 6, 'Lendio', 'Jake', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `contact_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `pastor_number` int(11) NOT NULL,
  `date_reserved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(191) NOT NULL DEFAULT 'Reserved',
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `first_name`, `last_name`, `contact_number`, `email`, `pastor_number`, `date_reserved`, `status`, `event_id`) VALUES
(3, 'Warren', 'Rezane', '', '', 6, '2018-12-15 16:38:01', 'Registered', 6),
(4, 'Jake', 'Lendio', '', '', 1, '2018-12-15 16:38:03', 'Registered', 6);

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
(1, 'Rezane', 'Warren', '09667591163', 'warshock10', 'dUJTM3FsZWtkQzF5TC9TR21LeTJJUT09', 1, 8);

-- --------------------------------------------------------

--
-- Structure for view `members_view`
--
DROP TABLE IF EXISTS `members_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `members_view`  AS  select `member`.`member_id` AS `member_id`,concat(`member`.`last_name`,', ',`member`.`first_name`) AS `member_name`,`member`.`sex` AS `sex`,`member`.`DOB` AS `dob`,`member`.`allergies` AS `allergies`,`member`.`church_name` AS `church_name`,`member`.`church_address` AS `church_address`,`member`.`church_district` AS `church_district`,concat(`pastor`.`last_name`,', ',`pastor`.`first_name`) AS `pastor_name`,`member`.`contact_number` AS `contact_number`,`member`.`email` AS `email` from (`member` join `pastor` on((`member`.`pastor_number` = `pastor`.`pastor_number`))) ;

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
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `pastor_number` (`pastor_number`);

--
-- Indexes for table `pastor`
--
ALTER TABLE `pastor`
  ADD PRIMARY KEY (`pastor_number`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `staff_number` (`staff_number`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `pastor_number` (`pastor_number`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_number`),
  ADD KEY `branch_id` (`branch_id`);

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pastor`
--
ALTER TABLE `pastor`
  MODIFY `pastor_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`pastor_number`) REFERENCES `pastor` (`pastor_number`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`staff_number`) REFERENCES `staff` (`staff_number`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`pastor_number`) REFERENCES `pastor` (`pastor_number`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`pastor_number`) REFERENCES `pastor` (`pastor_number`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
