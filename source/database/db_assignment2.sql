-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2014 at 04:46 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_assignment2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `lookUpUser`(IN user_email varchar(255))
BEGIN
		SELECT * FROM user WHERE email=user_email;
	 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `add_editors`
--

CREATE TABLE IF NOT EXISTS `add_editors` (
  `group_owner` int(11) NOT NULL,
  `user_added` int(11) NOT NULL,
  `date_added` date DEFAULT NULL,
  PRIMARY KEY (`group_owner`,`user_added`),
  KEY `user_added` (`user_added`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_to_group`
--

CREATE TABLE IF NOT EXISTS `add_to_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `date_added` date DEFAULT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` blob,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments_on`
--

CREATE TABLE IF NOT EXISTS `comments_on` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `date_commented` date DEFAULT NULL,
  PRIMARY KEY (`post_id`,`user_id`,`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `creates`
--

CREATE TABLE IF NOT EXISTS `creates` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creates`
--

INSERT INTO `creates` (`post_id`, `user_id`, `date_created`) VALUES
(1, 3, '2014-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `create_content`
--

CREATE TABLE IF NOT EXISTS `create_content` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `gpost_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`user_id`,`group_id`,`gpost_id`),
  KEY `group_id` (`group_id`),
  KEY `gpost_id` (`gpost_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `create_group`
--

CREATE TABLE IF NOT EXISTS `create_group` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_of`
--

CREATE TABLE IF NOT EXISTS `friend_of` (
  `friend_owner` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`friend_owner`,`friend`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_of`
--

INSERT INTO `friend_of` (`friend_owner`, `friend`, `type`) VALUES
(3, 5, 'friend'),
(6, 3, 'friend');

-- --------------------------------------------------------

--
-- Table structure for table `group_post`
--

CREATE TABLE IF NOT EXISTS `group_post` (
  `gpost_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `g_post_type` varchar(255) DEFAULT NULL,
  `g_image_path` varchar(255) DEFAULT NULL,
  `text_body` blob,
  PRIMARY KEY (`gpost_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_type` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `text_body` blob,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_type`, `image_path`, `text_body`) VALUES
(1, 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `fname`, `lname`, `dob`, `profile_pic`) VALUES
(3, 'Shane', 'Campbell', '1970-01-01', '../images/profile_pics/SL381711_crop.jpg'),
(5, 'Warren', 'Clough', '1970-01-01', '../images/profile_pics/IMG_20140307_091259520.jpg'),
(6, 'Kenrick', 'Beckett', '1991-06-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `status`, `password`, `email`) VALUES
(3, 'active', 'a4TxbGfBrxO3Y', 'shanec132006@hotmail.com'),
(5, 'active', 'a4TxbGfBrxO3Y', 'clough.warren@gmail.com'),
(6, 'active', 'a4TxbGfBrxO3Y', 'kenrick1991@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_editors`
--
ALTER TABLE `add_editors`
  ADD CONSTRAINT `add_editors_ibfk_1` FOREIGN KEY (`group_owner`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `add_editors_ibfk_2` FOREIGN KEY (`user_added`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `add_to_group`
--
ALTER TABLE `add_to_group`
  ADD CONSTRAINT `add_to_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `add_to_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`group_id`) ON DELETE CASCADE;

--
-- Constraints for table `comments_on`
--
ALTER TABLE `comments_on`
  ADD CONSTRAINT `comments_on_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_on_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_on_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`) ON DELETE CASCADE;

--
-- Constraints for table `creates`
--
ALTER TABLE `creates`
  ADD CONSTRAINT `creates_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `creates_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `create_content`
--
ALTER TABLE `create_content`
  ADD CONSTRAINT `create_content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `create_content_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`group_id`),
  ADD CONSTRAINT `create_content_ibfk_3` FOREIGN KEY (`gpost_id`) REFERENCES `group_post` (`gpost_id`);

--
-- Constraints for table `create_group`
--
ALTER TABLE `create_group`
  ADD CONSTRAINT `create_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
