-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2019 at 12:09 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
CREATE TABLE IF NOT EXISTS `organisation` (
  `org_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `org_name` tinytext NOT NULL,
  `org_type` tinytext NOT NULL,
  `start_date` date DEFAULT NULL,
  `licence_no` tinyint(250) NOT NULL,
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`org_id`, `org_name`, `org_type`, `start_date`, `licence_no`) VALUES
(1, 'Employer 1', 'Bingo', '2019-01-31', 2),
(2, 'Employer 1', 'Bingo', '2019-01-31', 2),
(3, 'employer 2', 'taxi firm', NULL, 8),
(4, 'escalla', 'training', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `role_type` tinytext NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_type`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'User'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `first_name` tinytext NOT NULL,
  `last_name` tinytext NOT NULL,
  `org_id_fk` smallint(6) NOT NULL,
  `role_id_fk` tinyint(2) NOT NULL DEFAULT '1',
  `user_password` varchar(50) NOT NULL,
  `salt` bigint(30) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  UNIQUE KEY `"primary"` (`user_id`),
  KEY `orgid` (`org_id_fk`) USING BTREE,
  KEY `roleid` (`role_id_fk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `org_id_fk`, `role_id_fk`, `user_password`, `salt`, `is_deleted`, `timestamp`, `email`) VALUES
(1, 'bhghjjj', 'jhkjhkjhk', 1, 2, 'nkj', 1, 0, NULL, 'nkj@hotmail.com'),
(2, 'Carl', 'Lamb', 1, 1, '08a4415e9d594ff960030b921d42b91e', NULL, 0, NULL, 'rr@hotmail.com'),
(3, 'me', 'me', 1, 1, 'ab86a1e1ef70dff97959067b723c5c24', NULL, 0, NULL, 'me@hotmail.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `video_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `video_name` tinytext NOT NULL,
  `video_location` varchar(100) CHARACTER SET swe7 NOT NULL,
  `meta_id_fk` tinyint(6) NOT NULL,
  PRIMARY KEY (`video_id`),
  KEY `metaid` (`meta_id_fk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `video_name`, `video_location`, `meta_id_fk`) VALUES
(20, 'MS PowerPoint', 'https://vimeo.com/312116112', 3),
(39, 'Uploading files in OneDrive', 'https://vimeo.com/312116129', 1),
(40, 'Working with files and folders', 'https://vimeo.com/312116112', 1),
(41, 'Exploring OneDrive', 'https://vimeo.com/312116094', 1),
(42, 'Microsoft Office 365 tasks', 'https://vimeo.com/242749625', 1),
(43, 'How to switch views in Excel online', 'https://vimeo.com/262979700', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_meta`
--

DROP TABLE IF EXISTS `video_meta`;
CREATE TABLE IF NOT EXISTS `video_meta` (
  `meta_id` tinyint(6) NOT NULL AUTO_INCREMENT,
  `meta_name` varchar(20) NOT NULL,
  `video_descript` tinytext NOT NULL,
  PRIMARY KEY (`meta_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_meta`
--

INSERT INTO `video_meta` (`meta_id`, `meta_name`, `video_descript`) VALUES
(1, '2', 'MS Teams'),
(3, '236', 'OneDrive'),
(5, '237', 'Downloading from OneDrive');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id_fk`) REFERENCES `roles` (`role_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`org_id_fk`) REFERENCES `organisation` (`org_id`) ON UPDATE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`meta_id_fk`) REFERENCES `video_meta` (`meta_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
