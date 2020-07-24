-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2020 at 07:58 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

DROP TABLE IF EXISTS `aboutus`;
CREATE TABLE IF NOT EXISTS `aboutus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(73) NOT NULL,
  `sub_title` varchar(73) NOT NULL,
  `description` text NOT NULL,
  `links` varchar(73) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `sub_title`, `description`, `links`) VALUES
(7, 'Mathematics', 'MA', 'Ipsum dolor sit amet, consectetur adipiscing elit. Morbi gravida quam ac ante rutrum, in mollis ligula mattis. Integer nulla nisi, ullamcorper et posuere vel', 'www.mautech.com'),
(5, 'Computer Science', 'CS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi gravida quam ac ante rutrum, in mollis ligula mattis. Integer nulla nisi, ullamcorper et posuere vel', 'www.mautech.com');

-- --------------------------------------------------------

--
-- Table structure for table `dept_category`
--

DROP TABLE IF EXISTS `dept_category`;
CREATE TABLE IF NOT EXISTS `dept_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(73) NOT NULL,
  `description` varchar(73) NOT NULL,
  `image` varchar(73) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_category`
--

INSERT INTO `dept_category` (`id`, `name`, `description`, `image`) VALUES
(5, 'Computer Science ', 'Department of Computer Scince', 'b571f02d5d70d97ef45036635d192c79.jpg'),
(4, 'Computer Science ', 'Description', 'appleii-system.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(73) NOT NULL,
  `designation` varchar(73) NOT NULL,
  `description` varchar(73) NOT NULL,
  `image` varchar(73) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `designation`, `description`, `image`) VALUES
(70, 'Sas', 'Economics', 'Lecturer', '376593_394126590642483_78265321_n.jpg'),
(71, 'Djm', 'Infotech', 'Lecturer', 'b571f02d5d70d97ef45036635d192c79.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `email` varchar(17) NOT NULL,
  `password` varchar(11) NOT NULL,
  `usertype` varchar(17) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'sas', 'sas@gmail.com', '123', ''),
(10, 'alj', 'alj@gmail.com', '123', 'admin'),
(11, 'gmj', 'gmj@gmail.com', '123', 'user'),
(13, '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
