-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2013 at 05:54 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fabryDB`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `centerName` varchar(55) NOT NULL,
  `doctor` varchar(80) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `address` varchar(60) NOT NULL,
  `suburb` varchar(30) NOT NULL,
  `postal` varchar(15) DEFAULT NULL,
  `state` varchar(45) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `isOfficial` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_contacts_users_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `suburb` varchar(30) NOT NULL,
  `postal` varchar(15) DEFAULT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventsusers`
--

CREATE TABLE `eventsusers` (
  `eventsid` int(11) NOT NULL,
  `usersid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`eventsid`,`usersid`),
  KEY `fk_eventsusers_users1_idx` (`usersid`),
  KEY `fk_eventsusers_events1_idx` (`eventsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `durationMinute` enum('none','0-15','15-30','30-60','>60') NOT NULL DEFAULT 'none',
  `comment` varchar(90) DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_exercises_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicationName` varchar(70) NOT NULL,
  `strengthEachPill` varchar(10) NOT NULL,
  `doseEachTime` varchar(10) NOT NULL,
  `frequency` varchar(90) NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_medications_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pains`
--

CREATE TABLE `pains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `painLevel` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `medication` varchar(70) DEFAULT NULL,
  `illness` varchar(70) DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_pains_users1_idx` (`users_id`)
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
  `membershipType` enum('Family / Individual (Australia) - $20','Family / Individual (Overseas) - $26','Organisation (Australia) - $40','Organisation (Overseas) - $46') NOT NULL,
  `dob` date DEFAULT NULL,
  `fabryStatus` enum('Male','Female','Child','Doctor','Researcher','Other') NOT NULL,
  `address` varchar(60) NOT NULL,
  `suburb` varchar(30) NOT NULL,
  `postal` varchar(15) DEFAULT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `firstName`, `lastName`, `email`, `phone`, `dateOfDiagnosis`, `doctor`, `hospital`, `treatment`, `treatmentType`, `membershipType`, `dob`, `fabryStatus`, `address`, `suburb`, `postal`, `state`, `country`) VALUES
(2, 'super', '509e8ad509cd64506961e02a5d36359b883c2001', 'super', 'super', 'super', 'super@super.com', '+0411111111', '2013-10-05', '', '', 'yes', NULL, 'Family / Individual (Australia) - $20', '2013-10-05', 'Male', 'super', 'super', '', 'super', 'super'),
(3, 'admin', '1808564269ae9adf51a7a883d9fa3e3915af0426', 'admin', 'admin', 'admin', 'admin@admin.com', '+0411111111', '2013-10-05', '', '', 'yes', NULL, 'Family / Individual (Australia) - $20', '2013-10-05', 'Male', 'admin', 'admin', '', 'admin', 'admin'),
(4, 'shaun', '394f2b9ac78aac1e74fc0f2989606194abd00ece', 'member', 'shaun', 'shaun', 'wlin33@student.monash.edu', '123123', '2013-10-05', '', '', 'yes', NULL, 'Family / Individual (Australia) - $20', '2013-10-05', 'Male', 'sdfsdf', 'wsdf', '', 'sdf', 'sdfsdfsdf'),
(7, 'member', '6b6eae05744078410150542bbb4f8d2672826957', 'member', 'member111', 'member', 'member@member.com', '123123', '2013-10-14', '', '', 'yes', NULL, 'Family / Individual (Australia) - $20', '2013-10-14', 'Male', 'sdfsdf', 'wsdf', '', 'sdf', 'sdfsdfsdf');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bowels`
--
ALTER TABLE `bowels`
  ADD CONSTRAINT `fk_bowels_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_contacts_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `eventsusers`
--
ALTER TABLE `eventsusers`
  ADD CONSTRAINT `fk_eventsusers_events1` FOREIGN KEY (`eventsid`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eventsusers_users1` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `fk_exercises_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medications`
--
ALTER TABLE `medications`
  ADD CONSTRAINT `fk_medications_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pains`
--
ALTER TABLE `pains`
  ADD CONSTRAINT `fk_pains_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
