-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2016 at 12:00 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amusement_park`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `GuestID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `gender` char(1) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `phoneNumber` char(12) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `emailAddress` varchar(256) DEFAULT NULL,
  `loginPwd` varchar(256) DEFAULT NULL,
  `accountBalance` int(11) DEFAULT NULL,
  `firstVisit` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestID`, `name`, `gender`, `birthDate`, `phoneNumber`, `address`, `emailAddress`, `loginPwd`, `accountBalance`, `firstVisit`) VALUES
(1, 'Bob', 'M', '2005-01-27', '111-222-3333', '123 Main Street NW', 'Bob@hotmail.com', '123', 1240, 'Roller Coaster'),
(2, 'Jen', 'F', '2000-12-12', '604-123-1234', '123 Cambie Street', 'Jen@hotmail.com', 'JenPassword', 123, 'Merry Go Round'),
(3, 'Joe', 'M', '0000-00-00', '123-321-4321', '123 Happy Avenue', '', 'JoePassword', 12312321, '3'),
(7, 'Yup', 'F', '2016-06-16', '123-123-6543', '123 Granville Island', 'Yup@yahoo.ca', '12345', 123456, '1'),
(8, 'Apple', 'F', '2016-06-09', '000-999-9999', '123 Rainbow Road', 'Apple@mango.com', '111', 10101, '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`GuestID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `GuestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
