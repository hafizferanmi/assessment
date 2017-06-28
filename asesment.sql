-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 12:36 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `asesment`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `lecturer` text NOT NULL,
  `assignment` text NOT NULL,
  `time` text NOT NULL,
  `coursecode` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `lecturer`, `assignment`, `time`, `coursecode`) VALUES
(2, 'Omidiji', 'wijlijijtoyijoihello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to behello world is the first program as they would like to be', '01:48:29am', 'csc303'),
(3, 'Akintayo', 'Web Technology', '08:39:07am', 'csc309'),
(4, 'akintayo', 'Supply all needed information and try again later\r\n\r\nThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application', '02:12:44pm', 'csc301'),
(5, 'Akintayo', 'guyig', '04:02:25pm', 'csc301');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `lecid` int(20) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`lecid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lecid`, `username`, `password`, `name`, `email`) VALUES
(1, 'Akintayo', 'hafiz', 'Prof Akintayo', ''),
(2, 'ade', 'ade', 'Dr ade', 'ade@gmail');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `studentid` smallint(200) NOT NULL AUTO_INCREMENT,
  `matricno` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `part` int(1) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentid`, `matricno`, `password`, `name`, `part`, `email`) VALUES
(1, 'csc/2013/149', 'hafiz', 'hafizfedreanmi', 3, 'hafia@gmail.com'),
(2, 'csc/2012/112', 'aas', 'haif', 1, 'ha@gmail.com'),
(3, 'csc/2013/111', 'as', 'dhdh', 3, 'FF@gmail'),
(4, 'csc/2013/223', 'pass', 'helllllllo', 2, 'heei@gmail.com'),
(8, 'csc/2013/001', 'haf', 'hello world', 3, 'hafizfer@outlook.com'),
(9, 'csc/2014/112', 'ada', 'akintayo', 3, 'ffa@gmail.com'),
(10, 'csc/2013/052', 'asa', 'sunday', 3, 'sun@gmail.com'),
(11, 'csc/2013/088', 'kagawa', 'Siyanbola Oladipo', 3, 'oladipo@gmail.com'),
(12, 'CSC/2013/090', 'RASH', 'RASHY', 3, 'RASH@YYYYY'),
(13, 'csc/2013/150', 'qwertyuiop', 'Ishola Tosin', 3, 'gffccffcftuy@ssds'),
(14, 'csc/2013/138', 'hello', 'hello', 3, 'hello@gg.com');

-- --------------------------------------------------------

--
-- Table structure for table `submitted`
--

CREATE TABLE IF NOT EXISTS `submitted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lecturer` text NOT NULL,
  `matricno` text NOT NULL,
  `content` text NOT NULL,
  `coursecode` text NOT NULL,
  `score` int(11) NOT NULL,
  `time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`id`, `lecturer`, `matricno`, `content`, `coursecode`, `score`, `time`) VALUES
(4, 'Akintayo', 'csc/2013/112', '•	Do not use pliers to do another tool’s job.  \r\n•	Never try to use pliers beyond their ability\r\n•	Do not expose pliers to excessive heat\r\n•	Always cut at right angles, not side to side\r\n•	Be sure the type of pliers match the application.  \r\n•	Always protect your eyes before cutting wire or metal. \r\n•	Do not use pliers on live electrical circuits\r\n•	Oil pliers to maintain life and value.  \r\n', 'csc301', 7, '11:39pm'),
(5, 'Akintayo', 'csc/2013/001', 'if (empty($_POST[$name])) {\r\n			$result = 0;\r\n\r\n		}\r\n		else{\r\n			$result = $_POST[$name];\r\n			$query = ''UPDATE Submitted SET score = :result WHERE id = :id'';\r\n			$query = $conn -&gt; prepare($query);\r\n			$query -&gt; bindParam('':id'', $id);\r\n			$query -&gt; execute();\r\n			\r\n		}', 'csc301', 12, '10:19:10am'),
(6, 'Akintayo', 'csc/2013/052', 'and with deep sense of commitment and service. Such people will not have as their concern the enjoyment to trifle benefits of their position but guided by a sound and sincere thirst to secure the interest of the masses, deal with maturity determination and foresight on national development which accompanies all other national issues. We no longer want such a leader who does not care to know about what happens to its school learners and graduate, a leader who does not care whether workers are paid or not, a leader who does not care about style of governance of his aides , we now need leaders who are able to look beyond the selfish and', 'csc301', 8, '12:38:22pm'),
(7, 'Akeem', 'csc/2013/088', 'ffffffffffffffffffffffffff\r\njj\r\nu', 'csc317', 12, '03:21:44am'),
(8, 'Akande', 'CSC/2013/090', 'GHSFTHFTTTTTTHTTTTTFTTTHTTTTTTTDFSS', 'csc301', 0, '11:50:29am'),
(9, 'Akintayo', 'csc/2013/088', 'his is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the behis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationst and feel free to talk this is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationo the admin of the site if at all there is any problem encountered in the usage of this application', 'csc301', 0, '12:00:18pm'),
(10, 'Akintayo', 'csc/2013/088', 'his is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best andhis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application', 'csc301', 0, '12:01:11pm'),
(11, 'Akande', 'csc/2013/150', 'hjvdtwerytuuytvfdrecg76t8cresev sdgfiyhv8765er', 'csc303', 0, '12:04:19pm'),
(12, 'Akintayo', 'csc/2013/149', 'This is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application', 'csc309', 11, '04:20:47pm'),
(13, 'Akintayo', 'csc/2013/149', 'This is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application', 'csc309', 15, '04:21:45pm'),
(14, 'Akintayo', 'csc/2013/149', 'This is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application', 'csc309', 23, '04:22:00pm'),
(15, 'Akintayo', 'csc/2013/149', 'This is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application', 'csc301', 7, '07:30:00pm'),
(16, 'Omidiji', 'csc/2013/149', 'This is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application', 'csc305', 6, '03:16:51am'),
(17, 'ade', 'csc/2013/149', 'This is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this applicationThis is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application', 'csc301', 0, '04:08:02am');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
