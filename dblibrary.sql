-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 11:47 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblibrary`
--
CREATE DATABASE IF NOT EXISTS `dblibrary` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dblibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `tblaudit`
--

CREATE TABLE `tblaudit` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `actiontaken` varchar(255) NOT NULL,
  `actiondate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `cid` int(3) NOT NULL,
  `ccode` varchar(6) NOT NULL,
  `cname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`cid`, `ccode`, `cname`) VALUES
(74, 'BSIT', 'Bachelor of Science in Information Technology'),
(75, 'BSCS', 'Bachelor of Science in Computer Science'),
(76, 'BSIS', 'Bachelor of Science in Information Systems');

-- --------------------------------------------------------

--
-- Table structure for table `tblmajor`
--

CREATE TABLE `tblmajor` (
  `mid` int(3) NOT NULL,
  `mcode` varchar(8) NOT NULL,
  `mname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmajor`
--

INSERT INTO `tblmajor` (`mid`, `mcode`, `mname`) VALUES
(40, 'GENERAL', 'General'),
(41, 'WMA', 'Web and Mobile Application'),
(42, 'NA', 'Network Administration'),
(43, 'TSM', 'Technical Service Management'),
(44, 'BA', 'Business Analytics');

-- --------------------------------------------------------

--
-- Table structure for table `tblsearch`
--

CREATE TABLE `tblsearch` (
  `id` int(11) NOT NULL,
  `thesisid` int(11) NOT NULL,
  `logdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblthesis`
--

CREATE TABLE `tblthesis` (
  `tid` int(11) NOT NULL,
  `tcno` varchar(15) NOT NULL,
  `tcname` varchar(255) NOT NULL,
  `meta_tcname` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `meta_Author` varchar(255) NOT NULL,
  `Course` int(3) NOT NULL,
  `Major` int(3) NOT NULL,
  `TYear` int(4) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `meta_tags` varchar(255) NOT NULL,
  `adminApproval` varchar(8) NOT NULL,
  `creator_uid` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_modify` date NOT NULL,
  `tcontent` text CHARACTER SET latin5 NOT NULL,
  `Note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `uid` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`uid`, `firstname`, `lastname`, `username`, `password`, `role`) VALUES
(1, 'SUPERADMIN', 'SUPERADMIN', 'SUPERADMIN', '', ''),
(2, 'Admin', 'Admin', 'admin', '$2y$10$9/FSxDDUJwNQeIFK1WOeuesnaQQ2y/y7rliuEwETpI/LEAkGnC3mq', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaudit`
--
ALTER TABLE `tblaudit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblmajor`
--
ALTER TABLE `tblmajor`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tblsearch`
--
ALTER TABLE `tblsearch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblthesis`
--
ALTER TABLE `tblthesis`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaudit`
--
ALTER TABLE `tblaudit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `cid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tblmajor`
--
ALTER TABLE `tblmajor`
  MODIFY `mid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblsearch`
--
ALTER TABLE `tblsearch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblthesis`
--
ALTER TABLE `tblthesis`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
