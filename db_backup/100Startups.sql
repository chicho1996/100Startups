-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2016 at 12:12 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `100Startups`
--
CREATE DATABASE IF NOT EXISTS `100Startups` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `100Startups`;

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE IF NOT EXISTS `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `IP` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `phone`, `code`, `status`, `IP`, `date`) VALUES
(1, 551721521, 3777, 1, '192.168.0.107', '2016-05-11 12:00:04'),
(2, 551721521, 7198, 1, '192.168.0.107', '2016-05-11 12:01:01'),
(3, 551721521, 1325, 1, '192.168.0.107', '2016-05-11 12:02:39'),
(4, 551721521, 1879, 1, '192.168.0.107', '2016-05-11 12:04:01'),
(5, 551721521, 5019, 1, '192.168.0.107', '2016-05-11 12:05:06'),
(6, 551721521, 8054, 1, '127.0.0.1', '2016-05-12 10:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `founders`
--

CREATE TABLE IF NOT EXISTS `founders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `founders`
--

INSERT INTO `founders` (`id`, `firstname`, `lastname`, `age`, `user_id`) VALUES
(1, 'Tornike', 'Shavidze', 20, 1),
(2, 'tornike', 'tornike', 29, 2),
(3, 'tornike', 'tornike', 29, 3),
(4, 'tornike', 'tornike', 29, 4),
(5, 'dasdad', 'dasdasd2', 22, 5),
(6, 'dasdsa', 'dadsasd', 20, 6),
(7, 'დასდსად', 'დასდად', 20, 7),
(8, 'dasdad', 'dasdsa', 20, 8),
(9, 'tornike', 'shavidze', 3123123, 9),
(10, '312313', '2313123', 213123, 10),
(11, '3123123123', '3123123', 3413123, 11),
(12, '312312321', '312313', 3123213, 12),
(13, '312312321', '312313', 3123213, 13),
(14, '312312321', '312313', 3123213, 14),
(15, '312312321', '312313', 3123213, 15),
(16, '312312321', '312313', 3123213, 16),
(17, '312312321', '312313', 3123213, 17),
(18, '312312321', '312313', 3123213, 18),
(19, '312312321', '312313', 3123213, 19),
(20, '312312321', '312313', 3123213, 20),
(21, '312312321', '312313', 3123213, 21),
(22, '312312321', '312313', 3123213, 22),
(23, '312312321', '312313', 3123213, 23),
(24, '312312321', '312313', 3123213, 24),
(25, '312312321', '312313', 3123213, 25),
(26, '312312321', '312313', 3123213, 26),
(27, '312312321', '312313', 3123213, 27),
(28, '312312321', '312313', 3123213, 28),
(29, '312312321', '312313', 3123213, 29),
(30, '312312321', '312313', 3123213, 30),
(31, '312312321', '312313', 3123213, 31),
(32, '312312321', '312313', 3123213, 32),
(33, '312312321', '312313', 3123213, 33),
(34, '312312321', '312313', 3123213, 34),
(35, '312312321', '312313', 3123213, 35),
(36, '312312321', '312313', 3123213, 36),
(37, '312312321', '312313', 3123213, 37),
(38, '312312321', '312313', 3123213, 38),
(39, '312312321', '312313', 3123213, 39),
(40, '312312321', '312313', 3123213, 40),
(41, '3123123', '312313', 20, 41),
(42, '3123123', '312313', 20, 42),
(43, '3123123', '312313', 20, 43),
(44, '3123123', '312313', 20, 44),
(45, '3123123', '312313', 20, 45),
(46, '313123', '312312', 213312, 46),
(47, '313123', '312312', 213312, 47),
(48, '313123', '312312', 213312, 48),
(49, '313123', '312312', 213312, 49),
(50, '313123', '312312', 213312, 50),
(51, '313123', '312312', 213312, 51),
(52, '313123', '312312', 213312, 52),
(53, '313123', '312312', 213312, 53),
(54, '313123', '312312', 213312, 54),
(55, '313123', '312312', 213312, 55),
(56, '313123', '312312', 213312, 56),
(57, '313123', '312312', 213312, 57),
(58, '313123', '312312', 213312, 58),
(59, '313123', '312312', 213312, 59),
(60, '313123', '312312', 213312, 60),
(61, '313123', '312312', 213312, 61),
(62, '313123', '312312', 213312, 62),
(63, '313123', '312312', 213312, 63),
(64, '313123', '312312', 213312, 64),
(65, '313123', '312312', 213312, 65),
(66, '31231231', '312312312', 313212, 66),
(67, '31231231', '312312312', 313212, 67),
(68, '31231231', '312312312', 313212, 68),
(69, '31231231', '312312312', 313212, 69),
(70, '31231231', '312312312', 313212, 70),
(71, '31231231', '312312312', 313212, 71),
(72, '31231231', '312312312', 313212, 72),
(73, '31231231', '312312312', 313212, 73),
(74, '31231231', '312312312', 313212, 74),
(75, '31231231', '312312312', 313212, 75),
(76, '31231231', '312312312', 313212, 76),
(77, '31231231', '312312312', 313212, 77),
(78, '31231231', '312312312', 313212, 78),
(79, '31231231', '312312312', 313212, 79),
(80, '31231231', '312312312', 313212, 80),
(81, '31231231', '312312312', 313212, 81),
(82, '31231231', '312312312', 313212, 82),
(83, '31231231', '312312312', 313212, 83),
(84, '31231231', '312312312', 313212, 84),
(85, '31231231', '312312312', 313212, 85),
(86, '31231231', '312312312', 313212, 86),
(87, '31231231', '312312312', 313212, 87),
(88, '31231231', '312312312', 313212, 88),
(89, '31231231', '312312312', 313212, 89),
(90, '31231231', '312312312', 313212, 90),
(91, '31231231', '312312312', 313212, 91),
(92, '31231231', '312312312', 313212, 92),
(93, '31231231', '312312312', 313212, 93),
(94, '31231231', '312312312', 313212, 94),
(95, '31231231', '312312312', 313212, 95),
(96, '31231231', '312312312', 313212, 96),
(97, '31231231', '312312312', 313212, 97),
(98, '31231231', '312312312', 313212, 98),
(99, '31231231', '312312312', 313212, 99),
(100, '31231231', '312312312', 313212, 100),
(101, '31231231', '312312312', 313212, 101),
(102, '312313123', '312313', 312313, 102),
(103, '3123213123', '312313', 312313, 103),
(104, '3123213', '312313', 3123123, 104),
(105, '312313', '3123213', 31231, 105),
(106, '3123123', '3123213', 312313, 106),
(107, '3123213', '312321', 213123, 107),
(108, 'dasdasd', 'dasda', 20, 1),
(109, 'dasdsadas', 'dasda', 20, 2),
(110, 'dasdsadas', 'dasda', 20, 3),
(111, 'dasdadsadas', 'dasdasd', 213213, 4),
(112, 'dasdadd', 'dasdasd', 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `members` int(11) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `capital` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `IP` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `year`, `city`, `members`, `industry`, `desc`, `email`, `logo`, `capital`, `status`, `IP`, `date`) VALUES
(1, 'dasdadasdasd', 2010, 'dasdsadasd', 2147483647, '3123123213', '31231321321313123213131', 'dasdasd@aaa.com', '', 213123213, 1, '192.168.0.107', '2016-05-11 12:01:12'),
(2, 'dasdasd', 2010, 'dasdadasd', 3213123, 'dasdasdadasd', '321312321321312321321321321', 'aaa@aaa.com', '', 2147483647, 1, '192.168.0.107', '2016-05-11 12:02:49'),
(3, 'dasdasd', 2010, 'dasdadasd', 3213123, 'dasdasdadasd', '321312321321312321321321321', 'aaa@aaa.com', '', 2147483647, 1, '192.168.0.107', '2016-05-11 12:04:10'),
(4, 'dadasdasd', 2010, 'dasdasdasdsadas', 2147483647, '3213123123213', '3123123123213213213213123213', 'sadasd@aa.com', '14629683126-30-12_Git1.jpg', 213231, 1, '192.168.0.107', '2016-05-11 12:05:12'),
(5, 'dadsad', 2010, 'dasdadsad', 2147483647, 'dasdadasd', '321313dadasdsad', 'dadsda@aa.com', '1463050591bensimon-actu-tennis.jpg', 321312, 1, '127.0.0.1', '2016-05-12 10:56:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
