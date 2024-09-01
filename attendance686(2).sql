-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2023 at 08:00 PM
-- Server version: 5.6.12
-- PHP Version: 5.4.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendance686`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `name` varchar(50) NOT NULL,
  `regno` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `hour1` tinyint(1) DEFAULT NULL,
  `hour2` tinyint(1) DEFAULT NULL,
  `hour3` tinyint(1) DEFAULT NULL,
  `hour4` tinyint(1) DEFAULT NULL,
  `hour5` tinyint(1) DEFAULT NULL,
  `classname1` varchar(50) DEFAULT NULL,
  `classname2` varchar(50) DEFAULT NULL,
  `classname3` varchar(50) DEFAULT NULL,
  `classname4` varchar(50) DEFAULT NULL,
  `classname5` varchar(50) DEFAULT NULL,
  `staffname1` varchar(30) DEFAULT NULL,
  `staffname2` varchar(30) DEFAULT NULL,
  `staffname3` varchar(30) DEFAULT NULL,
  `staffname4` varchar(30) DEFAULT NULL,
  `staffname5` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`name`, `regno`, `date`, `hour1`, `hour2`, `hour3`, `hour4`, `hour5`, `classname1`, `classname2`, `classname3`, `classname4`, `classname5`, `staffname1`, `staffname2`, `staffname3`, `staffname4`, `staffname5`) VALUES
('gokul A', '20211231401311', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('gomathi KS', '20211231401312', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('gomathi shankar S', '20211231401313', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('ibrahi Raman B', '20211231401315', '2023-09-27', 1, 1, 1, 0, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('kakkum perumal S', '20211231401317', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('kannam mydeen J', '20211231401314', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('janakyn M', '20211231401318', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('kavin kumar B', '20211231401319', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('kavia S', '20211231401320', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('magesh M', '20211231401321', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('meharunnisha M', '20211231401322', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('mohamed uvais A', '20211231401323', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('muppidathi P', '20211231401324', '2023-09-27', 0, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('muthumari M', '20211231401325', '2023-09-27', 1, 1, 1, 0, 0, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('mutthamilan G', '20211231401326', '2023-09-27', 1, 1, 1, 1, 1, 'machine learning', 'web technology', 'rdbms', 'mini project', 'mini project', 'jeya valli', 'kamala', 'mani mala', 'sasi bala', 'sasi bala'),
('gokul A', '20211231401311', '2023-09-28', 1, 1, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('gomathi KS', '20211231401312', '2023-09-28', 0, 1, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('gomathi shankar S', '20211231401313', '2023-09-28', 0, 1, 1, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('ibrahim mydeen J', '20211231401314', '2023-09-28', 0, 1, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('janaky Raman B', '20211231401315', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('kakkum perumal S', '20211231401317', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('kannan M', '20211231401318', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('kavin kumar B', '20211231401319', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('kavia S', '20211231401320', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('magesh M', '20211231401321', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('meharunnisha M', '20211231401322', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('mohamed uvais A', '20211231401323', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('muppidathi P', '20211231401324', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('muthumari M', '20211231401325', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('mutthamilan G', '20211231401326', '2023-09-28', 0, 0, 0, NULL, NULL, 'web technology', 'mini project', 'personality development', NULL, NULL, 'kamala', 'sasi bala', 'sasi bala', NULL, NULL),
('gokul', '202112131401213', '2023-09-29', 1, NULL, NULL, NULL, NULL, 'machine learning', NULL, NULL, NULL, NULL, 'sasi bala', NULL, NULL, NULL, NULL),
('bala subramanian u 	', '20211231401206', '2023-09-29', 1, NULL, NULL, NULL, NULL, 'machine learning', NULL, NULL, NULL, NULL, 'sasi bala', NULL, NULL, NULL, NULL),
('karan', '20211231401220', '2023-09-29', 0, NULL, NULL, NULL, NULL, 'machine learning', NULL, NULL, NULL, NULL, 'sasi bala', NULL, NULL, NULL, NULL),
('maharaja', '20211231401223', '2023-09-29', 0, NULL, NULL, NULL, NULL, 'machine learning', NULL, NULL, NULL, NULL, 'sasi bala', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `dept` varchar(30) NOT NULL,
  `year` int(3) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`dept`, `year`, `course`) VALUES
('B.C.A', 3, 'machine learning'),
('B.C.A', 3, 'mini project'),
('B.C.A', 3, 'personality development'),
('B.C.A', 3, 'e-commerce'),
('B.C.A', 3, 'rdbms'),
('B.A English', 3, 'basic english'),
('B.C.A', 3, 'web technology'),
('B.C.A', 1, 'python'),
('B.A English', 3, 'ADVANCED ENGLISH');

-- --------------------------------------------------------

--
-- Table structure for table `stafflogin`
--

CREATE TABLE IF NOT EXISTS `stafflogin` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `designation` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_u` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stafflogin`
--

INSERT INTO `stafflogin` (`id`, `name`, `username`, `password`, `designation`) VALUES
(1, 'jeya valli', 'jeyavalli@gmail.com', 'valli', 'hod'),
(2, 'sasi bala', 'sasibala@gmail.com', 'sasi', 'staff'),
(3, 'mani mala', 'manimala@gmail.com', 'mala', 'staff'),
(4, 'kamalam', 'kamala@gmail.com', 'kamala', 'staff'),
(5, 'bala', 'bala@gmail.com', 'bal', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE IF NOT EXISTS `studentinfo` (
  `name` varchar(30) NOT NULL,
  `regno` varchar(15) NOT NULL,
  `dept` varchar(25) NOT NULL,
  `year` int(3) NOT NULL,
  `batch` int(3) DEFAULT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`name`, `regno`, `dept`, `year`, `batch`) VALUES
('gokul', '202112131401213', 'B.C.A', 3, 1),
('bala subramanian u 	', '20211231401206', 'B.C.A', 3, 1),
('karan', '20211231401220', 'B.C.A', 3, 1),
('maharaja', '20211231401223', 'B.C.A', 3, 1),
('gokul A', '20211231401311', 'B.C.A', 3, 2),
('gomathi KS', '20211231401312', 'B.C.A', 3, 2),
('gomathi shankar S', '20211231401313', 'B.C.A', 3, 2),
('ibrahim mydeen J', '20211231401314', 'B.C.A', 3, 2),
('janaky Raman B', '20211231401315', 'B.C.A', 3, 2),
('kakkum perumal S', '20211231401317', 'B.C.A', 3, 2),
('kannan M', '20211231401318', 'B.C.A', 3, 2),
('kavin kumar B', '20211231401319', 'B.C.A', 3, 2),
('kavia S', '20211231401320', 'B.C.A', 3, 2),
('magesh M', '20211231401321', 'B.C.A', 3, 2),
('meharunnisha M', '20211231401322', 'B.C.A', 3, 2),
('mohamed uvais A', '20211231401323', 'B.C.A', 3, 2),
('muppidathi P', '20211231401324', 'B.C.A', 3, 2),
('muthumari M', '20211231401325', 'B.C.A', 3, 2),
('mutthamilan G', '20211231401326', 'B.C.A', 3, 2),
('gfh', '22', 'B.C.A', 1, 1);
