-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2016 at 12:39 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atomicprojectb20`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE IF NOT EXISTS `birthday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `bday` date NOT NULL,
  `trash_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `name`, `bday`, `trash_at`) VALUES
(4, 'Sumon', '2016-06-30', '1467126140'),
(6, 'Sumon', '2016-06-19', '1467126141'),
(7, 'Matin', '0000-00-00', NULL),
(8, 'Matin', '2016-06-15', '1467126141'),
(10, 'SUMON', '1989-08-26', NULL),
(11, 'Sumon', '2016-06-09', NULL),
(12, 'Sumon', '2016-06-22', NULL),
(14, 'Abul Hasem', '0000-00-00', NULL),
(15, 'Abul Hasem', '1989-08-26', NULL),
(16, 'kazi', '2016-06-09', NULL),
(17, 'Nazrul', '2016-06-15', NULL),
(18, 'Rabindra Nath', '2016-06-08', NULL),
(19, 'Tagore', '2016-04-13', NULL),
(20, 'Rabindra Nath tagore', '2016-06-28', NULL),
(21, 'Kazi Nazrul', '2016-06-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `trash_at` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `trash_at`) VALUES
(38, 'C sharp', NULL),
(39, 'javascript', NULL),
(42, 'Cobol', NULL),
(46, 'Primitive Javascript', '1467147891'),
(47, 'Advance PHP', NULL),
(48, 'Beginners Guide to Git', '1466116807'),
(49, 'Java', '1467147894'),
(50, 'jQuery', NULL),
(51, 'PHP', NULL),
(52, 'C#', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `trash_at` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `city`, `trash_at`) VALUES
(2, 'Sumon', 'Chittagong', NULL),
(3, 'Mina', 'Rajshahi', NULL),
(4, 'Raju', 'Sylhet', NULL),
(5, 'Matin', 'Barishal', NULL),
(6, 'Raju', 'Comilla', NULL),
(7, 'Mina', 'Jessore', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `trash_at` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `trash_at`) VALUES
(11, 'masud@gmail.com', NULL),
(12, 'sumonasbgc@gmail.com', '1466347654'),
(13, 'sumonssbgc@gmail.com', NULL),
(14, 'raju4jan@gmail.com', NULL),
(15, 'ingle@yahoo.com', NULL),
(16, 'amrin@hotmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `trash_at` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `gender`, `trash_at`) VALUES
(1, 'Sumon', 'Male', NULL),
(2, 'Matin', 'Male', NULL),
(3, 'Mina', 'Female', NULL),
(6, 'Mina', 'Female', '1467142304'),
(8, 'Sumon', 'Male', '1467142253'),
(9, 'Sumon', 'Male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

CREATE TABLE IF NOT EXISTS `hobby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `trash_at` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `hobby`
--

INSERT INTO `hobby` (`id`, `name`, `hobby`, `trash_at`) VALUES
(8, 'sajal', 'Playing,Reading,Swimming', NULL),
(9, 'Sujon', 'Coding,Reading,Gardening', NULL),
(10, 'Abul kalam', 'Playing,Swimming,Chatting', NULL),
(12, 'Shirin', 'Playing,Reading,Gardening', NULL),
(15, 'Matin', 'Playing,Gardening,Swimming,Chatting', NULL),
(16, 'Sumon', 'Coding,Reading,Gardening', NULL),
(17, 'Mina', 'Playing,Coding,Reading,Gardening', NULL),
(18, 'Raju', 'Playing,Coding,Gardening', NULL),
(19, 'Matin', 'Playing,Coding,Reading', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `trash_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `image`, `trash_at`) VALUES
(5, 'Sumon', '1466694846amitabh.jpg', '1466694888'),
(8, 'Mina', '1467150677car.png', '1466624120'),
(9, 'Raju', '1467150662moduse3.png', '1466624122'),
(11, 'Sumon', '1466610297template2.png', NULL),
(12, 'Sumon', '1466622756Screenshot_1.png', NULL),
(14, 'Sumon', '1466622844Screenshot_1.png', NULL),
(15, 'Matin', '146715205010537105_10203476608289950_8401503355302973064_n.jpg', NULL),
(16, 'Matin', '1467150642serach.png', '1466624127'),
(17, 'Sumon', '1466623988background.jpg', NULL),
(18, 'Sumon', '1467150622moduse2.png', '1466626040'),
(20, 'Sumon', '1466626147amitabh.jpg', '1467152078'),
(21, 'Matin', '146662621512669710_937422066377108_1194346913426469077_n.jpg', NULL),
(22, 'Sumon', '1467150602car.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `regulation`
--

CREATE TABLE IF NOT EXISTS `regulation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rules` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE IF NOT EXISTS `summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `summary` text NOT NULL,
  `trash_at` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`id`, `name`, `summary`, `trash_at`) VALUES
(1, 'Matin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.', NULL),
(2, 'Matin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.', NULL),
(3, 'Sumon', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.', NULL),
(7, 'Raju', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.', NULL),
(8, 'Sumon', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.', NULL),
(9, 'Mina', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.', NULL),
(12, 'Matin', 'Lorem \r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
