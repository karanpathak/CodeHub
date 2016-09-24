-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2016 at 04:15 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `commits`
--

CREATE TABLE IF NOT EXISTS `commits` (
  `username` varchar(50) NOT NULL,
  `repo_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `commit_id` int(11) NOT NULL,
  `comments` varchar(1024) NOT NULL,
  `commit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_repo`
--

CREATE TABLE IF NOT EXISTS `file_repo` (
  `username` varchar(50) NOT NULL,
  `file_id` int(11) NOT NULL,
  `repo_id` int(11) NOT NULL,
  `filename` int(11) NOT NULL,
  `file_date` date NOT NULL,
  `file_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fork_user`
--

CREATE TABLE IF NOT EXISTS `fork_user` (
  `fork_id` int(11) NOT NULL,
  `repo_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fork_user`
--

INSERT INTO `fork_user` (`fork_id`, `repo_id`, `username`) VALUES
(2, 1, 'karan');

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE IF NOT EXISTS `repository` (
  `repo_id` int(11) NOT NULL,
  `name` varchar(767) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `stars` int(11) NOT NULL,
  `forks` int(11) NOT NULL,
  `type` char(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repository`
--

INSERT INTO `repository` (`repo_id`, `name`, `description`, `stars`, `forks`, `type`) VALUES
(1, 'Speech-Recognition', 'This is a speech recogniotion', 3, 1, 'public'),
(2, 'E-commerce', 'This is an E-commerce for my in-house project', 2, 0, 'public'),
(3, 'Terminal', 'This is an terminal for my in-house project', 2, 0, 'private'),
(4, 'Pattern-Matching\r\n', 'This project is focussed on implementing text search in a paragraph.', 2, 1, 'public'),
(5, 'RTF-TO-HTML', 'This is project to convert the email RTF to HTML. ', 2, 1, 'private'),
(6, 'simple-captcha-solver', 'simple CAPTCHA solver in python ', 2, 2, 'private'),
(7, 'pygame_test', 'This is Test game in Pygame (Python''s package) ', 2, 0, 'public'),
(8, 'SPOJ-Codes', 'My SPOJ codes ', 2, 1, 'public'),
(9, 'Codechef-Codes', 'My Codechef codes ', 2, 0, 'public');

-- --------------------------------------------------------

--
-- Table structure for table `repo_user`
--

CREATE TABLE IF NOT EXISTS `repo_user` (
  `repo_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repo_user`
--

INSERT INTO `repo_user` (`repo_id`, `username`) VALUES
(1, 'karan'),
(2, 'karan');

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE IF NOT EXISTS `stars` (
  `repo_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`repo_id`, `username`) VALUES
(1, 'karan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `first_name`, `last_name`, `email`, `password`) VALUES
('aditya', 'aditya', 'negi', 'aditya@gmail.com', '4190ebe6fa98d124b88d0c554733a2e8'),
('amartya', 'amartya', 'sarkar', 'amartya@gmail.com', '93b4d3831d6bb06992af667fdc83ff2b'),
('karan', 'karan', 'pathak', 'karan@gmail.com', 'a55d19d741ece8090b2df39319e5f18d'),
('nilabh', 'nilabh', 'das', 'nilabh@gmail.com', 'db6d6757ef9bf8ef1f164579cafdd756'),
('rahul', 'rahul', 'anand', 'rahul@gmail.com', '1298815fd9e0a06860203eefd188c354'),
('vivek', 'vivek', 'sharma', 'vivek@gmail.com', '7bee2a15709aadc8dae5a1141dc7f355');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commits`
--
ALTER TABLE `commits`
  ADD PRIMARY KEY (`username`,`repo_id`,`file_id`),
  ADD UNIQUE KEY `commit_id` (`commit_id`);

--
-- Indexes for table `file_repo`
--
ALTER TABLE `file_repo`
  ADD PRIMARY KEY (`username`,`repo_id`,`filename`),
  ADD UNIQUE KEY `file_id` (`file_id`);

--
-- Indexes for table `fork_user`
--
ALTER TABLE `fork_user`
  ADD PRIMARY KEY (`repo_id`,`username`),
  ADD UNIQUE KEY `fork_id` (`fork_id`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`repo_id`,`name`);

--
-- Indexes for table `repo_user`
--
ALTER TABLE `repo_user`
  ADD PRIMARY KEY (`repo_id`,`username`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`repo_id`,`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commits`
--
ALTER TABLE `commits`
  MODIFY `commit_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_repo`
--
ALTER TABLE `file_repo`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fork_user`
--
ALTER TABLE `fork_user`
  MODIFY `fork_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `repo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
