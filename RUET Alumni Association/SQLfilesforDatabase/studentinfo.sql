-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 03:29 AM
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
-- Database: `studentinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentregistration`
--

CREATE TABLE `studentregistration` (
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentregistration`
--

INSERT INTO `studentregistration` (`email`, `password`) VALUES
('ishrat32@gmail.com', 's11234'),
('methela24@gmail.com', 's61234'),
('methela25@gmail.com', 'ammu'),
('morsheda16@gmail.com', 's41234'),
('sonia41@gmail.com', 's31234'),
('tamim23@gmail.com', 's212345');

-- --------------------------------------------------------

--
-- Table structure for table `studentsprofile`
--

CREATE TABLE `studentsprofile` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `bgroup` varchar(20) NOT NULL,
  `series` int(11) NOT NULL,
  `dept` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `dog` date NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsprofile`
--

INSERT INTO `studentsprofile` (`id`, `first_name`, `last_name`, `mail`, `password`, `phone`, `bgroup`, `series`, `dept`, `dob`, `dog`, `image`) VALUES
(1, 'Ishrat Jahan', 'Swarna', 'ishrat32@gmail.com', 's11234', '01875196901', 'O+ve', 16, 'CSE', '1998-07-19', '2021-01-03', '2299831576830537.jpg'),
(2, 'Tamim', 'Ahmed', 'tamim23@gmail.com', 's212345', '01673678286', 'B+ve', 12, 'CSE', '1993-01-08', '2016-02-01', '4859391577010180.png'),
(3, 'Sonia', 'Rahman', 'sonia41@gmail.com', 's31234', '07198765432', 'O+ve', 13, 'CSE', '1994-05-02', '2017-02-02', '8898591577011830.png'),
(4, 'Morsheda', 'Jeba', 'morsheda16@gmail.com', 's41234', '01987654321', 'B+ve', 13, 'EEE', '1994-09-06', '2017-02-07', '6044131577344138.jpg'),
(5, 'Zannatul', 'Methela', 'methela24@gmail.com', 's61234', '01632834455', 'A+ve', 12, 'CSE', '1999-01-04', '2017-01-01', '2938611577736775.jpg'),
(6, 'methela', 'zannat', 'methela25@gmail.com', 'ammu', '01521102571', 'a+ve', 11, 'cse', '1996-04-01', '2011-02-03', '6007231578257704.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `studentwork`
--

CREATE TABLE `studentwork` (
  `work_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `position` varchar(300) DEFAULT NULL,
  `comp` varchar(250) DEFAULT NULL,
  `remark` varchar(350) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `faculty` varchar(250) DEFAULT NULL,
  `room` varchar(250) DEFAULT NULL,
  `floor` varchar(250) DEFAULT NULL,
  `building` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentwork`
--

INSERT INTO `studentwork` (`work_id`, `id`, `position`, `comp`, `remark`, `doj`, `faculty`, `room`, `floor`, `building`) VALUES
(11, 1, 'xyz', 'comp1', '', '2018-01-02', '', '', '', ''),
(12, 2, 'Lecturer', '', '', '2017-01-01', 'ECE', 'CSE 213', '2nd', 'CSE'),
(13, 3, 'Lecturer', '', '', '2019-03-02', 'ECE', 'CSE 215', '2nd', 'CSE'),
(14, 4, 'Lecturer', '', 'Leave for higher study', '2018-09-01', 'ECE', 'EEE 314', '3rd', 'EEE'),
(15, 5, 'Lecturer', '', 'Leave for higher study', '2018-01-02', 'ECE', 'CSE 214', '2nd', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `teachertable`
--

CREATE TABLE `teachertable` (
  `tid` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `fname` varchar(250) DEFAULT NULL,
  `lname` varchar(250) DEFAULT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `faculty` varchar(250) DEFAULT NULL,
  `mbl_no` varchar(250) DEFAULT NULL,
  `room` varchar(250) DEFAULT NULL,
  `floor` varchar(250) DEFAULT NULL,
  `building` varchar(250) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `remark` varchar(250) DEFAULT NULL,
  `images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachertable`
--

INSERT INTO `teachertable` (`tid`, `id`, `work_id`, `fname`, `lname`, `designation`, `faculty`, `mbl_no`, `room`, `floor`, `building`, `doj`, `remark`, `images`) VALUES
(16, 3, 13, 'Sonia', 'Rahman', 'Lecturer', 'ECE', '07198765432', 'CSE 215', '2nd', 'CSE', '2019-03-02', '', '8898591577011830.png'),
(17, 4, 14, 'Morsheda', 'Jeba', 'Lecturer', 'ECE', '01987654321', 'EEE 314', '3rd', 'EEE', '2018-09-01', 'Leave for higher study', '6044131577344138.jpg'),
(18, 5, 15, 'Zannatul', 'Methela', 'Lecturer', 'ECE', '01632834455', 'CSE 214', '2nd', 'CSE', '2018-01-02', 'Leave for higher study', '2938611577736775.jpg'),
(19, 2, 12, 'Tamim', 'Ahmed', 'Lecturer', 'ECE', '01673678286', 'CSE 213', '2nd', 'CSE', '2017-01-01', '', '4859391577010180.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentregistration`
--
ALTER TABLE `studentregistration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `studentsprofile`
--
ALTER TABLE `studentsprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentwork`
--
ALTER TABLE `studentwork`
  ADD PRIMARY KEY (`work_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `teachertable`
--
ALTER TABLE `teachertable`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `id` (`id`),
  ADD KEY `work_id` (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentsprofile`
--
ALTER TABLE `studentsprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studentwork`
--
ALTER TABLE `studentwork`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teachertable`
--
ALTER TABLE `teachertable`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentwork`
--
ALTER TABLE `studentwork`
  ADD CONSTRAINT `studentwork_ibfk_1` FOREIGN KEY (`id`) REFERENCES `studentsprofile` (`id`);

--
-- Constraints for table `teachertable`
--
ALTER TABLE `teachertable`
  ADD CONSTRAINT `teachertable_ibfk_1` FOREIGN KEY (`id`) REFERENCES `studentsprofile` (`id`),
  ADD CONSTRAINT `teachertable_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `studentwork` (`work_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
