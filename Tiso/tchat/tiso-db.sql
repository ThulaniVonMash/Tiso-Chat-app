-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 05:20 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tiso-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(64) DEFAULT NULL,
  `message` text,
  `post_time` datetime DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `chat_id`, `user_id`, `user_name`, `message`, `post_time`) VALUES
(35, 1, 1, '	CRITS', 'Hi', '2017-11-16 12:15:30'),
(36, 1, 1, '	CRITS', 'What is happening', '2017-11-16 12:20:13'),
(37, 1, 1, '	CRITS', 'sdfsd', '2017-11-16 12:23:23'),
(38, 1, 1, '	CRITS', 'sdfsdf', '2017-11-16 12:23:26'),
(39, 1, 1, '	CRITS', 'sdfsdf', '2017-11-16 12:23:31'),
(40, 1, 1, '	CRITS', 'sdfsdfsdf', '2017-11-16 12:23:35'),
(41, 1, 1, '	CRITS', 'sdfsdfsdfs', '2017-11-16 12:23:38'),
(42, 1, 1, '	CRITS', 'sdfsfsfdsdf', '2017-11-16 12:23:41'),
(43, 1, 1, '	CRITS', 'sdfsdfsdf', '2017-11-16 12:23:47'),
(44, 1, 1, '	CRITS', 'sdfsdfsd', '2017-11-16 12:23:50'),
(45, 1, 1, '	CRITS', 'sdfsdfsdf', '2017-11-16 12:23:56'),
(46, 1, 1, '	CRITS', 'sdfsdf', '2017-11-16 12:24:00'),
(47, 1, 1, '	CRITS			', 'Hello Dear', '2017-11-16 13:26:37'),
(48, 1, 1, '	Mpho			', 'Mpho here', '2017-11-16 13:47:43'),
(49, 1, 1, '	Mpho			', 'What is good', '2017-11-16 13:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(4, 'Mpho', 'critsa86@gmail.com', 'd790f0e7721581ed25c97eef3f5e9021', '2017-11-02 14:42:47'),
(5, 'Mpho2', 'Mpho@gmail.com', '9f6290f4436e5a2351f12e03b6433c3c', '2017-11-09 14:29:43'),
(15, 'Apple', 'sdfdsf@gmail.com', '2671eb6e9150cf9b53eb39752a1fb21c', '2017-11-16 14:26:48'),
(17, 'Ben', 'sdfdsf@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-11-16 15:22:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
