-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2013 at 05:39 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fabry_v13`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contacts_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`,`contacts_id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_appointments_contacts1_idx` (`contacts_id`),
  KEY `fk_appointments_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `contacts_id`, `users_id`, `description`, `date`) VALUES
(1, 38, 13, '', '2013-12-26 00:00:00'),
(2, 36, 4, 'ss', '2013-12-14 00:00:00'),
(3, 39, 22, '', '2013-12-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bowels`
--

CREATE TABLE `bowels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `count` tinyint(4) NOT NULL,
  `comment` varchar(90) DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_bowels_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bowels`
--

INSERT INTO `bowels` (`id`, `date`, `count`, `comment`, `users_id`) VALUES
(1, '2013-12-12', 1, '', 13);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `allDay` tinyint(1) NOT NULL DEFAULT '0',
  `repeat` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  KEY `fk_calendar_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`id`, `title`, `start`, `end`, `allDay`, `repeat`, `users_id`) VALUES
(1, 'a', '2013-12-12 13:00:00', '2013-12-12 17:00:00', 0, 0, 13),
(2, 'try', '2013-12-14 00:00:00', '2013-12-14 01:00:00', 0, 0, 4),
(3, 's', '2013-12-04 00:00:00', '2013-12-25 00:00:00', 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `centerName` varchar(55) NOT NULL,
  `doctor` varchar(80) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `address` varchar(60) NOT NULL,
  `suburb` varchar(30) NOT NULL,
  `postal` varchar(15) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(90) NOT NULL,
  `isOfficial` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `users_id`, `centerName`, `doctor`, `department`, `address`, `suburb`, `postal`, `state`, `country`, `phone`, `fax`, `email`, `isOfficial`) VALUES
(2, 7, 'ROYAL MELBOURNE HOSPITAL', 'Dr Kathy Nicholls', 'Department of Nephrology', '300 Grattan St', 'Parkville', '3050', 'VIC', 'Australia', '61393427143', '+61 3 9347 1420', 'kathy.nicholls@mh.org.au', 0),
(30, 12, 'Royal Adelaide Hospital', 'Dr Ian Chapman', 'Associate Professor', 'North Terrace', 'Adelaide', '5000', 'SA', 'Australia', '+61882224162', '+61882233870', 'ian.chapman@adelaide.edu.au', 1),
(31, 12, 'Royal Brisbane & Women''s Hospital', 'Dr Charles Denaro', 'Department of Internal Medicine & Aged C', 'Cnr Butterfield St and Bowen Bridge Rd', 'Herston', '4006', 'QLD', 'Australia', '+61736367678', '+61882233870', 'c.denaro@uq.edu.au', 1),
(32, 12, 'Royal Melbourne Hospital', 'Dr Kathy Nicholls', 'Department of Nephrology', '300 Grattan St', 'Parkville', '3050', 'VIC', 'Australia', '+61393427143', '+61393471420', 'kathy.nicholls@mh.org.au', 1),
(33, 12, 'Royal Perth Hospital', 'Professor Jack Goldblatt', 'Genetics Services of WA', '197 Wellington St', 'Perth CBD', '6000', 'WA', 'Australia', '+61893401525', '+61893401678', 'Jack.Goldblatt@health.wa.gov.au', 1),
(34, 12, 'Westmead Hospital', 'Professor David Sillence', 'Department of Medical Genetics', 'Hawkesbury Rd', 'Westmead', '2145', 'NSW', 'Australia', '+61298453215', '+61298453204', 'DavidS@chw.edu.au', 1),
(35, 12, 'Starship Children''s Hospital', 'Dr Callum Wilson', 'Metabolic Physician', '2 Park Road', 'Grafton', '1023', 'Auckland', 'New Zealand', '+6493074949 Ext6295', '', 'callumw@adhb.govt.nz', 1),
(36, 12, 'Wellington Hospital', 'Dr Esko Wiltshire', 'Department of Paediatrics', 'Riddiford St', 'Newtown', '6021', 'Wellington', 'New Zealand', '+6443855999', '', 'Esko@wnmeds.ac.nz', 1),
(38, 13, '', 'member', '', 'address', 'suburb', '', '', 'au', '0415', '', 'wlin33@student.monash.edu', 0),
(39, 22, '', 'doc', '', 'address', 'suburb', '', '', 'country', '01010101', '', 'who@whowhowho.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `allDay` tinyint(1) NOT NULL,
  `send_status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start`, `end`, `allDay`, `send_status`) VALUES
(2, 'TESTING V1', 'TESTING TESTING', '2013-12-12 00:00:00', '2013-12-12 00:00:00', 0, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `durationMinute` enum('none','0-15','15-30','30-60','>60') NOT NULL DEFAULT 'none',
  `exercise_type` varchar(60) NOT NULL,
  `comment` varchar(90) DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_exercises_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `date`, `durationMinute`, `exercise_type`, `comment`, `users_id`) VALUES
(2, '2013-12-08', '>60', '', '', 13),
(3, '2013-12-12', '30-60', 'v', '', 13),
(4, '2013-12-19', '>60', 'kjikj', 'ijij', 13);

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `events_id` int(11) NOT NULL,
  `response_status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`events_id`,`users_id`),
  KEY `fk_users_has_events_users1_idx` (`users_id`),
  KEY `fk_users_has_events_events1_idx` (`events_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `users_id`, `events_id`, `response_status`) VALUES
(1, 2, 1, 'No Respond'),
(2, 4, 1, 'No Respond'),
(3, 12, 1, 'No Respond'),
(4, 13, 1, 'Attend'),
(5, 14, 1, 'No Respond'),
(6, 15, 1, 'No Respond'),
(7, 2, 2, 'No Respond'),
(8, 4, 2, 'Attend'),
(9, 12, 2, 'No Respond'),
(10, 13, 2, 'No Respond'),
(11, 20, 2, 'No Respond'),
(12, 2, 3, 'No Respond'),
(13, 4, 3, 'No Respond'),
(14, 12, 3, 'No Respond'),
(15, 13, 3, 'No Respond'),
(16, 20, 3, 'No Respond'),
(17, 21, 2, 'Attend');

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicationName` varchar(70) NOT NULL,
  `strengthEachPill` varchar(10) NOT NULL,
  `doseEachTime` varchar(10) NOT NULL,
  `frequency` enum('Daily','Every second day','Weekly','Fortnightly') NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `repeatTimes` int(11) NOT NULL,
  `start` datetime NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_medications_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`id`, `medicationName`, `strengthEachPill`, `doseEachTime`, `frequency`, `users_id`, `repeatTimes`, `start`) VALUES
(14, 'AB04', '600/mg', '[1,3]', 'Weekly', 11, 2, '2013-12-10 00:00:00'),
(15, 'AB05', '500/mg', '[1,2]', 'Every second day', 11, 3, '2013-12-24 00:00:00'),
(16, 'SHAUN', '55', 'GGG', 'Every second day', 13, 2, '2013-12-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(60) NOT NULL,
  `news_description` text NOT NULL,
  `send_status` varchar(45) NOT NULL,
  `pdf_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_description`, `send_status`, `pdf_name`) VALUES
(9, 'test', 'testTHIS IS NEW ONE', 'true', 'info/files/Team_71_build_2_deliverable_V2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `painmedis`
--

CREATE TABLE `painmedis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pains_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `medications_id` int(11) NOT NULL,
  `medi_select_status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`pains_id`,`users_id`,`medications_id`),
  KEY `fk_pains_has_medications_medications1_idx` (`medications_id`),
  KEY `fk_pains_has_medications_pains1_idx` (`pains_id`,`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `painmedis`
--

INSERT INTO `painmedis` (`id`, `pains_id`, `users_id`, `medications_id`, `medi_select_status`) VALUES
(4, 10, 11, 14, 'Y'),
(5, 11, 11, 14, 'Y'),
(6, 11, 11, 15, 'Y'),
(7, 12, 13, 16, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pains`
--

CREATE TABLE `pains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `painLevel` int(11) NOT NULL,
  `medication` tinyint(1) NOT NULL,
  `illness` varchar(70) DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_pains_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pains`
--

INSERT INTO `pains` (`id`, `date`, `painLevel`, `medication`, `illness`, `users_id`) VALUES
(10, '2013-12-10', 4, 1, 'Cold', 11),
(11, '2013-12-12', 5, 1, 'Running Nose', 11),
(12, '2013-12-13', 2, 1, 'RR', 13);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `title`, `content`) VALUES
(1, 'Free Invitation Template', 'Dear :\r\nThis is an invitation to ask you to attend a free service'),
(2, 'Agent Template', 'Dear Customer:\r\nThis is a event concerned about the money investment of our special service ');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filesize` int(11) NOT NULL DEFAULT '0',
  `filemime` int(45) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` enum('admin','member','deactive','super') NOT NULL DEFAULT 'member',
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(90) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dateOfDiagnosis` date DEFAULT NULL,
  `doctor` varchar(80) DEFAULT NULL,
  `hospital` varchar(50) DEFAULT NULL,
  `treatment` enum('yes','no') NOT NULL,
  `treatmentType` enum('fabrazyme','replagal','amigal') DEFAULT NULL,
  `membershipType` enum('normal','Family / Individual (Australia) - $20','Family / Individual (Overseas) - $26','Organisation (Australia) - $40','Organisation (Overseas) - $46') NOT NULL,
  `dob` date DEFAULT NULL,
  `fabryStatus` enum('Male','Female','Child','Doctor','Researcher','Other') NOT NULL,
  `address` varchar(60) NOT NULL,
  `suburb` varchar(30) NOT NULL,
  `postal` varchar(15) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `lastLogin` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `firstName`, `lastName`, `email`, `phone`, `dateOfDiagnosis`, `doctor`, `hospital`, `treatment`, `treatmentType`, `membershipType`, `dob`, `fabryStatus`, `address`, `suburb`, `postal`, `state`, `country`, `lastLogin`) VALUES
(2, 'super', '509e8ad509cd64506961e02a5d36359b883c2001', 'super', 'super', 'super', 'super@super.com', '+0411111111', '2013-10-05', '', '', 'yes', NULL, 'Family / Individual (Australia) - $20', '2013-10-05', 'Male', 'super', 'super', '', 'super', 'super', '2013-12-10'),
(4, 'shaun', 'f7935d20b096ef9ec57e1165476542dcd4cebd0e', 'member', 'shaun', 'shaun', 'wlin33@student.monash.edu', '123123', '2013-10-05', '', '', 'yes', NULL, 'Family / Individual (Australia) - $20', '2013-10-05', 'Male', 'sdfsdf', 'wsdf', '', 'sdf', 'sdfsdfsdf', '2013-12-16'),
(12, 'admin', '401c7f240363db8580b058f5b152013f943a9cc9', 'admin', 'g', 'b', 'hello@hhhhhhhhh.org', '0411111111', '2013-12-10', '', '', 'no', NULL, 'Family / Individual (Australia) - $20', '2013-12-10', 'Female', 'g', 'b', '', '', 'Australia', '2013-12-16'),
(13, 'member', '6b6eae05744078410150542bbb4f8d2672826957', 'member', 'm', 'm', 'mm@mmmmmmm.org', '0411111111', '2013-12-10', '', '', 'no', NULL, 'Family / Individual (Australia) - $20', '2013-12-10', 'Other', 'm', 'm', '', '', 'Australia', '2013-12-14'),
(20, '1234', 'bc2ede50555d5dbc221f130840049f81ab5e36af', 'member', 's', 's', 'asdf@sadf.com', '1', '2013-12-12', '', '', 'no', NULL, 'Family / Individual (Overseas) - $26', '2013-12-12', 'Male', 's', 's', 'a', '', 'a', '0000-00-00'),
(22, 'who', 'bc2ede50555d5dbc221f130840049f81ab5e36af', 'member', 'who', 'who', 'who@who.com', '111', '2013-12-16', '', '', 'no', NULL, 'Family / Individual (Australia) - $20', '2013-12-16', 'Male', 'who', 'who', '123', '', 'who', '2013-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `subscription_status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
