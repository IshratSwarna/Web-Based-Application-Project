-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 03:16 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`name`, `password`) VALUES
('admin1', 'ad123');

-- --------------------------------------------------------

--
-- Table structure for table `eventstable`
--

CREATE TABLE `eventstable` (
  `eid` int(11) NOT NULL,
  `ename` varchar(500) NOT NULL,
  `edate` date NOT NULL,
  `edes` varchar(3500) NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventstable`
--

INSERT INTO `eventstable` (`eid`, `ename`, `edate`, `edes`, `image1`, `image2`, `image3`) VALUES
(4, '5th Convocation of RUET', '2019-12-01', 'The fifth convocation of Rajshahi University of Engineering and Technology (RUET) was held successfully on December 1, 2019.  President and Chancellor of RUET M Abdul Hamid kindly consented to grace the occasion, added the release quoting Professor Selim Hossain, Registrar-in-Charge.  The graduates who obtained B.Sc, M.SC, M. Phil and Ph.D from 2009-10 to 2014-15 academic years from RUET can take part in the convocation.  The interested students completed their respective online registration through visiting the www.ruet.ac.bd website by October 20 with payment of Taka 4,500 per student as registration fee. The vice-chancellor also said that various sub-committees were working relentlessly to complete the convocation successfully and preparations to their end have already been completed...', '6462351578362605.jpg', '8982691578362605.jpg', '3636771578362605.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `eventstable`
--
ALTER TABLE `eventstable`
  ADD PRIMARY KEY (`eid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventstable`
--
ALTER TABLE `eventstable`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
