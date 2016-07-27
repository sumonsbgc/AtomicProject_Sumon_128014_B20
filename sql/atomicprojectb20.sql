-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2016 at 04:30 AM
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
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `bday` date NOT NULL,
  `trash_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `name`, `email`, `description`, `bday`, `trash_at`) VALUES
(16, 'kazi', 'raju4jan@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-06-09', NULL),
(17, 'Nazrul', 'Nazrul@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-06-15', NULL),
(18, 'Rabindra Nath', 'sumonsbgc@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-06-08', NULL),
(19, 'Tagore', 'ingle@yahoo.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-04-13', NULL),
(20, 'Rabindra Nath tagore', 'amrin@hotmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-06-28', NULL),
(21, 'Kazi Nazrul', '', '', '2016-06-21', NULL),
(22, 'ssss', '', '', '2016-06-13', NULL),
(23, 'Abul Hasem', '', '', '1989-08-26', NULL),
(24, 'Ashu', '', '', '1989-08-26', NULL),
(25, 'Sumon', '', '', '2016-07-21', NULL),
(26, 'Sumon', '', '', '2016-07-13', NULL),
(27, 'Sumon', 'raju4jan@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-07-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `trash_at` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `email`, `description`, `trash_at`) VALUES
(39, 'javascript', '', '', NULL),
(42, 'Cobol', '', '', NULL),
(47, 'Advance PHP', '', '', NULL),
(50, 'jQuery', '', '', NULL),
(51, 'PHP', '', '', NULL),
(52, 'C#', '', '', NULL),
(53, 'C#', '', '', NULL),
(54, 'jQuery', '', '', NULL),
(55, 'jQuery', 'ingle@yahoo.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(55) NOT NULL,
  `trash_at` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `email`, `description`, `city`, `trash_at`) VALUES
(2, 'Sumon', 'sumonsbgc@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Dhaka', NULL),
(3, 'Mina', 'ingle@yahoo.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Rajshahi', NULL),
(4, 'Raju', 'raju4jan@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Sylhet', NULL),
(5, 'Matin', 'amrin@hotmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Barishal', NULL),
(6, 'Raju', 'raju4jan@gmail.com', '<p><span style="color: #4b4f56; font-family: helvetica, arial, sans-serif;"><span style="font-size: 12px; line-height: 15.36px; white-space: pre-wrap; background-color: #f1f0f0;"><strong>Lorem</strong> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat upidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></span></p>', 'Comilla', NULL),
(7, 'Mina', 'Nazrul@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Dinajpur', NULL),
(8, 'Matin', '', '', 'Dinajpur', '1468200874'),
(9, 'Sumon', 'sumonsbgc@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Dinajpur', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `trash_at` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `name`, `email`, `description`, `trash_at`) VALUES
(11, '', 'masud@gmail.com', '', NULL),
(12, '', 'sumonasbgc@gmail.com', '', '1466347654'),
(13, '', 'sumonssbgc@gmail.com', '', NULL),
(14, '', 'raju4jan@gmail.com', '', NULL),
(15, '', 'ingle@yahoo.com', '', NULL),
(16, '', 'amrin@hotmail.com', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `trash_at` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `email`, `description`, `gender`, `trash_at`) VALUES
(1, 'Sumon', '', '', 'Male', NULL),
(2, 'Matin', '', '', 'Male', NULL),
(3, 'Mina', '', '', 'Female', NULL),
(6, 'Mina', '', '', 'Female', NULL),
(8, 'Sumon', '', '', 'Male', NULL),
(9, 'Sumon', '', '', 'Male', NULL),
(10, 'Raju', '', '', 'Male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

CREATE TABLE IF NOT EXISTS `hobby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `trash_at` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `hobby`
--

INSERT INTO `hobby` (`id`, `name`, `email`, `description`, `hobby`, `trash_at`) VALUES
(8, 'sajal', '', '', 'Playing,Reading,Swimming', NULL),
(9, 'Sujon', '', '', 'Coding,Reading,Gardening', NULL),
(15, 'Matin', '', '', 'Playing,Gardening,Swimming,Chatting', NULL),
(16, 'Sumon', '', '', 'Coding,Reading,Gardening', NULL),
(18, 'Raju', '', '', 'Playing,Coding,Gardening', NULL),
(19, 'matin', '', '', 'Playing,Reading', NULL),
(20, 'Sumon', 'sumonsbgc@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Playing,Coding,Reading,Swimming', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `trash_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `email`, `description`, `image`, `trash_at`) VALUES
(26, 'Sumon', '', '', '1467236460background.jpg', NULL),
(30, 'Matin', '', '', '146723655412715807_572854886206809_7205380423760243324_n.jpg', NULL),
(33, 'Matin', '', '', '146809949210537105_10203476608289950_8401503355302973064_n.jpg', NULL),
(34, 'Raju', '', '', '1468099563Laptop coffee cup agenda_HD.jpg', NULL),
(35, 'SUMON', '', '', '146809958412715807_572854886206809_7205380423760243324_n.jpg', NULL),
(36, 'Mina', '', '', '146809960212669710_937422066377108_1194346913426469077_n.jpg', NULL),
(37, 'SUMON', '', '', '1468099692amitabh.jpg', NULL),
(38, 'Matin', '', '', '1468099702HOME.jpg', NULL),
(39, 'Sumon', '', '', '14680997231262305832699.jpg', NULL),
(40, 'Sumon', '', '', '14680997361262305834107.jpg', NULL);

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
  `email` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `trash_at` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`id`, `name`, `email`, `summary`, `trash_at`) VALUES
(1, 'Matin', 'matin@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.</p>', '1468749699'),
(2, 'Matin', 'ingle@yahoo.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.</p>', NULL),
(3, 'Sumon', 'Nazrul@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.</p>', NULL),
(7, 'Raju', 'amrin@hotmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.</p>', NULL),
(8, 'Sumon', 'sumonsbgc@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.</p>', NULL),
(9, 'Mina', 'Nazrul@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor dolorum, eligendi ipsam quaerat reiciendis sit velit. Delectus enim ipsum quis quo similique? Asperiores dignissimos ducimus ipsa nobis quam quod.</p>', NULL),
(12, 'Matin', 'sumonsbgc@gmail.com', '<p>Lorem consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL),
(13, 'Sumon', 'raju4jan@gmail.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
