-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2014 at 07:53 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emerge`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_assets`
--

CREATE TABLE IF NOT EXISTS `active_assets` (
  `agency_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `help_log_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE IF NOT EXISTS `agencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_username` varchar(100) NOT NULL,
  `agency_password` text NOT NULL,
  `agency_name` varchar(100) NOT NULL,
  `agency_location` text NOT NULL,
  `agency_type` int(11) NOT NULL,
  `location_scope` varchar(100) NOT NULL,
  `agency_verified` int(11) NOT NULL,
  `agency_photo` text NOT NULL,
  `agency_location2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `agency_username`, `agency_password`, `agency_name`, `agency_location`, `agency_type`, `location_scope`, `agency_verified`, `agency_photo`, `agency_location2`) VALUES
(1, 'mmdc01', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'Makati Medical Center', '14.55891166804282', 0, '', 0, '', '121.01830154657364');

-- --------------------------------------------------------

--
-- Table structure for table `agency_types`
--

CREATE TABLE IF NOT EXISTS `agency_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `asset_manager`
--

CREATE TABLE IF NOT EXISTS `asset_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `asset` text NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `help_logs`
--

CREATE TABLE IF NOT EXISTS `help_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `response_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `help_requests`
--

CREATE TABLE IF NOT EXISTS `help_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_number` int(11) NOT NULL,
  `sender_location` text NOT NULL,
  `location_scope` text NOT NULL,
  `status` int(11) NOT NULL,
  `alternate_location` text NOT NULL,
  `sender_location2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messagein`
--

CREATE TABLE IF NOT EXISTS `messagein` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `SMSC` varchar(80) DEFAULT NULL,
  `MessageText` text,
  `MessageType` varchar(20) DEFAULT NULL,
  `MessagePDU` text,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '0' COMMENT '0=unreply, 1=replied',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `messagein`
--

INSERT INTO `messagein` (`Id`, `SendTime`, `ReceiveTime`, `MessageFrom`, `MessageTo`, `SMSC`, `MessageText`, `MessageType`, `MessagePDU`, `Gateway`, `UserId`, `Status`) VALUES
(1, '2014-05-10 00:06:28', '2014-05-10 00:06:36', '+639175056887', '+639159344468', '+639170000244', 'REG', 'sms.text', '0791361907002044040C9136195750867800004150010060822303D2E211', 'Emerge', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_username` varchar(255) NOT NULL,
  `secondary_username` varchar(255) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_middlename` varchar(100) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_mobile` varchar(100) NOT NULL,
  `user_password` text NOT NULL,
  `user_address` text NOT NULL,
  `user_mobile_verification_code` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `registration_type` int(11) NOT NULL,
  `user_photo` text NOT NULL,
  `user_address2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `primary_username`, `secondary_username`, `user_firstname`, `user_middlename`, `user_lastname`, `user_mobile`, `user_password`, `user_address`, `user_mobile_verification_code`, `user_status`, `registration_type`, `user_photo`, `user_address2`) VALUES
(2, '09466886843', 'rienier31', 'Rienier', 'Santos', 'Patron', '0', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', 0, 0, 0, '0', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
