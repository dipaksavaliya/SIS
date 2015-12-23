-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2015 at 08:48 AM
-- Server version: 5.6.25
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `mail_id` int(10) NOT NULL AUTO_INCREMENT,
  `sender_name` text NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `sender_subject` text NOT NULL,
  `sender_message` text NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`mail_id`, `sender_name`, `sender_email`, `sender_subject`, `sender_message`) VALUES
(2, 'Keyur Ramoliya', 'ramoliyak@live.com', 'service', 'This is General customer service mail.'),
(5, 'Dipak Savaliya', 'dipak241@yahoo.com', 'product', 'Product Support.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_name`, `user_password`) VALUES
('admin', 'keyur'),
('dipak', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `s_data`
--

CREATE TABLE IF NOT EXISTS `s_data` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_first` text NOT NULL,
  `s_last` text NOT NULL,
  `s_college` text NOT NULL,
  `s_enrollment` bigint(14) NOT NULL,
  `s_gender` text NOT NULL,
  `s_year` varchar(10) NOT NULL,
  `s_branch` text NOT NULL,
  `s_marks` varchar(10) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `s_data`
--

INSERT INTO `s_data` (`s_id`, `s_first`, `s_last`, `s_college`, `s_enrollment`, `s_gender`, `s_year`, `s_branch`, `s_marks`) VALUES
(1, 'Keyur', 'Ramoliya', 'Sarvajanik College Of Engineering and Technology', 120420116001, 'Male', '3rd Year', 'Information Techology', '9.9'),
(2, 'Dipak', 'Savaliya', 'Sarvajanik College Of Engineering and Technology', 120420116007, 'Male', '3rd Year', 'Information Techology', '9.8'),
(5, 'Ami', 'Bhalala', 'Sarvajanik College Of Engineering and Technology', 120420116005, 'Female', '3rd Year', 'Information Techology', '9.8'),
(22, 'Yash', 'Makavana', 'Sarvajanik College Of Engineering and Technology', 120420116024, 'Male', '3rd Year', 'Information Techology', '9.6'),
(23, 'Sweta', 'Sojitra', 'Sarvajanik College Of Engineering and Technology', 120420116014, 'Female', '3rd Year', 'Information Techology', '9.5'),
(25, 'Dimpal', 'Gabani', 'Sarvajanik College of Engineering and Technology', 120420116002, 'Female', '3rd Year', 'Information Techology', '9.4'),
(26, 'Priyanka', 'Navadiya', 'Sarvajanik College of Engineering & Technology', 120420116003, 'Female', '3rd Year', 'Information Techology', '9.3'),
(27, 'Milan', 'Patel', 'Sarvajanik College of Engineering & Technology', 120420116031, 'Male', '3rd Year', 'Information Techology', '9.2'),
(28, 'Radhika', 'Lukhi', 'Sarvajanik College of Engineering & Technology', 120420116029, 'Female', '3rd Year', 'Information Techology', '9.1'),
(29, 'Hetal', 'Patel', 'Sarvajanik College of Engineering & Technology', 120420116004, 'Female', '3rd Year', 'Information Techology', '9.0'),
(30, 'Binny', 'Bekawala', 'Sarvajanik College of Engineering & Technology', 120420116006, 'Female', '3rd Year', 'Information Techology', '8.9'),
(31, 'Akshar', 'Vastarpara', 'Sarvajanik College of Engineering & Technology', 120420116008, 'Male', '3rd Year', 'Information Techology', '8.7'),
(32, 'Viraj', 'Shah', 'Sarvajanik College of Engineering & Technology', 120420116009, 'Male', '3rd Year', 'Information Techology', '8.7'),
(33, 'Nirav', 'Bagadiya', 'Sarvajanik College of Engineering & Technology', 120420116017, 'Male', '3rd Year', 'Information Techology', '8.6'),
(34, 'Shailesh', 'Yadav', 'Sarvajanik College of Engineering & Technology', 120420116010, 'Male', '3rd Year', 'Information Techology', '8.5'),
(35, 'Ranish', 'Patel', 'Sarvajanik College of Engineering & Technology', 120420116046, 'Male', '3rd Year', 'Information Techology', '8.4'),
(36, 'Chirag', 'Savaliya', 'SCET', 120420116000, 'Male', '4th Year', 'Information Techology', '10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE IF NOT EXISTS `teacher_login` (
  `user_id` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`user_id`, `user_pass`) VALUES
('teacher', 'teacher'),
('chirag', 'chirag'),
('sdipak', 'sdipak');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` bigint(14) NOT NULL,
  `user_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_pass`) VALUES
(120420116001, '120420116001'),
(120420116002, '120420116002'),
(120420116007, '120420116007'),
(120420116008, '120420116008');
