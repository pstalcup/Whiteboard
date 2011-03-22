-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2011 at 09:06 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `white_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `groupName` varchar(20) NOT NULL,
  `groupdescription` blob NOT NULL,
  `groupadmin` varchar(20) NOT NULL,
  PRIMARY KEY (`groupName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--


-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `memberKey` int(99) NOT NULL AUTO_INCREMENT,
  `userName` varchar(10) NOT NULL,
  `groupName` varchar(10) NOT NULL,
  PRIMARY KEY (`memberKey`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `groupName` (`groupName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `membership`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(20) NOT NULL,
  `value` blob NOT NULL,
  `author` varchar(20) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`key`, `time`, `title`, `value`, `author`) VALUES
(1, '2011-02-23 19:36:30', 'Mid Term Exam', 0x496d20667265616b696e67206f75742121, 'Thomas Jefferson');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userName` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `eMail` varchar(30) NOT NULL,
  `Bio` blob NOT NULL,
  `Avatar` varchar(25) NOT NULL,
  PRIMARY KEY (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userName`, `password`, `eMail`, `Bio`, `Avatar`) VALUES
('Dr.Pepper', 'password', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`groupName`) REFERENCES `group` (`groupname`),
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
