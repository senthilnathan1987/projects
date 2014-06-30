-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2013 at 09:54 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `fname`, `lname`, `email`, `password`) VALUES
(10, 'msnjsk', 'xzczxc', 'zxcxz', 'msnjsk@gmail.com', '0aa1ea9a5a04b78d4581dd6d17742627'),
(11, 'raj', 'rajesh', 'prabhu', 'raj@gmail.com', '65a1223dae83b8092c4edba0823a793c');

-- --------------------------------------------------------

--
-- Table structure for table `users_basic_info`
--

CREATE TABLE IF NOT EXISTS `users_basic_info` (
  `basic_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `birth_month` int(11) DEFAULT NULL,
  `birth_day` int(11) DEFAULT NULL,
  `birth_year` int(11) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `register_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`basic_id`),
  KEY `fk_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users_basic_info`
--

INSERT INTO `users_basic_info` (`basic_id`, `user_id`, `birth_month`, `birth_day`, `birth_year`, `gender`, `register_date`) VALUES
(9, 10, 2, 1, 1988, 'male', 'August 16, 2013, 4:14 pm'),
(10, 11, 1, 1, 1988, 'male', 'August 17, 2013, 9:36 am');

-- --------------------------------------------------------

--
-- Table structure for table `users_friends`
--

CREATE TABLE IF NOT EXISTS `users_friends` (
  `tbl_fid` int(11) NOT NULL AUTO_INCREMENT,
  `friend_id` int(11) DEFAULT NULL,
  `friend_status` int(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbl_fid`),
  KEY `uf_fk_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users_friends`
--

INSERT INTO `users_friends` (`tbl_fid`, `friend_id`, `friend_status`, `user_id`) VALUES
(7, 10, 1, 11),
(8, 11, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users_posts`
--

CREATE TABLE IF NOT EXISTS `users_posts` (
  `up_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_description` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`up_id`),
  KEY `up_fk_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_education`
--

CREATE TABLE IF NOT EXISTS `work_education` (
  `we_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `school` varchar(45) DEFAULT NULL,
  `high_school` varchar(45) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`we_id`),
  KEY `we_fk_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `work_education`
--

INSERT INTO `work_education` (`we_id`, `user_id`, `school`, `high_school`, `company`) VALUES
(2, NULL, '0', '0', '0'),
(4, 10, '0', '0', '0'),
(5, 11, '0', '0', '0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_basic_info`
--
ALTER TABLE `users_basic_info`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_friends`
--
ALTER TABLE `users_friends`
  ADD CONSTRAINT `uf_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_posts`
--
ALTER TABLE `users_posts`
  ADD CONSTRAINT `up_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `work_education`
--
ALTER TABLE `work_education`
  ADD CONSTRAINT `we_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
