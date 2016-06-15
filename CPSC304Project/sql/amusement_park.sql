-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 08:27 PM
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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Gender` char(1) NOT NULL,
  `BirthDate` date DEFAULT NULL,
  `PhoneNumber` char(12) DEFAULT NULL,
  `Address` varchar(256) DEFAULT NULL,
  `LoginPwd` varchar(256) DEFAULT NULL,
  `Sin` int(11) DEFAULT NULL,
  `Wage` int(11) DEFAULT NULL,
  `DateStart` date DEFAULT NULL,
  `WorksAt` int(11) DEFAULT NULL,
  `ReportsTo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Name`, `Gender`, `BirthDate`, `PhoneNumber`, `Address`, `LoginPwd`, `Sin`, `Wage`, `DateStart`, `WorksAt`, `ReportsTo`) VALUES
(1, 'Sally', 'F', '1995-01-01', '604-213-2121', '123 Happy Drive', '1230', 123, 50, '2011-05-01', 3, 2),
(2, 'Tom', 'M', '1998-05-20', '778-770-7700', '75 Apple Lane', '4562', 321, 30, '2014-05-01', 4, 1),
(3, 'Jeff', 'M', '1997-12-12', '778-500-0000', '56 Auto Road', '7895', 231, 30, '2012-05-01', 2, 3),
(4, 'Irene', 'F', '1973-03-21', '778-210-4500', '45 Actual Street', '1902', 213, 10, '2006-05-01', 1, 2),
(5, 'DropTable', 'M', '2000-01-01', '604-123-4567', '35 Table Drive', '2222', 312, 10, '2016-05-01', 6, 1),
(8, 'Cynthia', 'F', '2016-06-25', '604-123-7890', '890 Pizza Street', '8235', 123, 10, '2016-06-03', 4, 1),
(9, 'Young', 'F', '2016-06-11', '778-300-4000', '123 Rainbow Road', '2344', 234, 10, '2016-06-25', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `GameID` int(11) NOT NULL,
  `GameName` varchar(256) NOT NULL,
  `Cost` int(11) NOT NULL,
  `GameType` varchar(256) NOT NULL,
  `FacilityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`GameID`, `GameName`, `Cost`, `GameType`, `FacilityID`) VALUES
(1, 'Packman', 3, 'BoardGame', 3),
(2, 'Xmen', 3, 'RolePlayingGame', 4),
(3, 'AngryBirds', 4, 'PartyGame', 2),
(4, 'Warcraft', 6, 'StradegyName', 1),
(5, 'Zootopia', 6, 'PartyGame', 5);

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
  `accountBalance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestID`, `name`, `gender`, `birthDate`, `phoneNumber`, `address`, `emailAddress`, `loginPwd`, `accountBalance`) VALUES
(1, 'Bob', 'M', '2005-01-13', '111-222-3333', '123 Main Street NW', 'Bob@hotmail.com', '123', 1240),
(2, 'Jen', 'F', '2000-12-12', '604-123-1234', '123 Cambie Street', 'Jen@hotmail.com', 'Jen', 3),
(3, 'Joe', 'M', '0000-00-00', '123-321-4321', '123 Happy Avenue', '', 'Joe', 12312321),
(4, 'Yup', 'F', '2016-06-16', '123-123-6543', '123 Granville Island', 'Yup@yahoo.ca', '109', 123456),
(5, 'Apple', 'F', '2016-06-09', '000-999-9999', '123 Rainbow Road', 'Apple@mango.com', 'A88', 10101),
(6, 'Gil', 'F', '2016-06-28', '123-909-2323', '123 Happy Ave', 'Gil.More@ubc.ca', '456', 1010);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `ManagerID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Gender` char(1) NOT NULL,
  `BirthDate` date NOT NULL,
  `PhoneNumber` char(12) NOT NULL,
  `Address` varchar(256) DEFAULT NULL,
  `Loginpwd` varchar(256) NOT NULL,
  `Sin` int(11) DEFAULT NULL,
  `Wage` int(11) DEFAULT NULL,
  `DateStart` date DEFAULT NULL,
  `NumberOfReports` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`ManagerID`, `Name`, `Gender`, `BirthDate`, `PhoneNumber`, `Address`, `Loginpwd`, `Sin`, `Wage`, `DateStart`, `NumberOfReports`) VALUES
(1, 'Sally', 'F', '1998-01-16', '604-213-3333', '123 Happy Drive', '1230', 123, 50, '2011-12-01', 3),
(2, 'Tom', 'M', '1998-05-20', '778-770-7700', '75 Apple Lane', '4895', 321, 30, '2014-05-01', 2),
(3, 'Jeff', 'M', '1997-12-12', '778-500-0000', '56 Auto Road', '4562', 231, 30, '2012-05-01', 4);

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

CREATE TABLE `plays` (
  `Playsdatetime` datetime NOT NULL,
  `Result` int(11) NOT NULL,
  `GuestID` int(11) NOT NULL,
  `GameID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plays`
--

INSERT INTO `plays` (`Playsdatetime`, `Result`, `GuestID`, `GameID`) VALUES
('2016-05-25 09:15:55', 3, 1, 1),
('2016-05-25 13:11:20', 100, 2, 5),
('2016-05-25 14:22:08', 6, 3, 2),
('2016-05-25 17:30:39', 56, 5, 4),
('2016-05-25 19:10:22', 77, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `FacilityID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `GPSLocation` char(30) DEFAULT NULL,
  `Park` char(20) DEFAULT NULL,
  `MinHeight` int(11) DEFAULT NULL,
  `Cost` int(11) DEFAULT NULL,
  `RideType` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`FacilityID`, `Name`, `Capacity`, `GPSLocation`, `Park`, `MinHeight`, `Cost`, `RideType`) VALUES
(1, 'Super Coaster', 50, '123.1134, 123.1134', 'A', 120, 10, 'Coaster'),
(2, 'Merry Go Down', 20, '123.1230, 123.1237', 'B', NULL, 5, 'Child'),
(3, 'Octopussy', 20, '123.1125, 123.1125', 'A', 100, 8, 'Thril'),
(4, 'Wet & Wild', 30, '123.1175, 123.1170', 'A', 120, 10, 'Log Flume'),
(5, 'Tiny Golf', 15, '123.1265, 123.1253', 'B', NULL, 5, 'Child'),
(6, 'Litte Dwarf Train', 70, '123.1920, 123.1005', 'B', 44, 34, 'Famliy');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `FacilityID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `GPSLocation` char(30) NOT NULL,
  `Park` varchar(11) NOT NULL,
  `StoreType` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`FacilityID`, `Name`, `Capacity`, `GPSLocation`, `Park`, `StoreType`) VALUES
(6, 'PhotoShop', 20, '123.1135, 123.1', 'A', 'Souvenir'),
(7, 'Burgers & Beers', 20, '123.1225, 123.1', 'B', 'Food'),
(8, 'Restroom', 10, '123.1235,123.12', 'B', 'Restroom'),
(9, 'Book Mart', 20, '123.1130, 123.1', 'A', 'Souvenir'),
(10, 'Fish and Chitz', 20, '123.1135, 123.1', 'A', 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `visited`
--

CREATE TABLE `visited` (
  `VisitedDatetime` datetime NOT NULL,
  `GuestID` int(11) NOT NULL,
  `FacilityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visited`
--

INSERT INTO `visited` (`VisitedDatetime`, `GuestID`, `FacilityID`) VALUES
('2016-05-24 17:27:49', 1, 6),
('2016-05-25 12:00:00', 1, 1),
('2016-05-25 13:30:15', 2, 2),
('2016-05-25 17:27:30', 4, 3),
('2016-05-25 17:27:35', 5, 3),
('2016-05-25 17:27:45', 6, 3),
('2016-05-25 17:27:46', 1, 2),
('2016-05-25 17:27:47', 1, 3),
('2016-05-25 17:27:48', 1, 4),
('2016-05-25 17:27:49', 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `WorksAt` (`WorksAt`),
  ADD KEY `ReportsTo` (`ReportsTo`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GameID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`GuestID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ManagerID`);

--
-- Indexes for table `plays`
--
ALTER TABLE `plays`
  ADD PRIMARY KEY (`Playsdatetime`,`GuestID`,`GameID`),
  ADD KEY `gamec` (`GameID`),
  ADD KEY `guestc` (`GuestID`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`FacilityID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`FacilityID`);

--
-- Indexes for table `visited`
--
ALTER TABLE `visited`
  ADD PRIMARY KEY (`VisitedDatetime`,`GuestID`,`FacilityID`),
  ADD KEY `GuestConstraint` (`GuestID`),
  ADD KEY `FacilityConstraint` (`FacilityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `GuestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `ManagerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `FacilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `ReportsToConstraint` FOREIGN KEY (`ReportsTo`) REFERENCES `manager` (`ManagerID`) ON DELETE SET NULL,
  ADD CONSTRAINT `WorksAtConstraint` FOREIGN KEY (`WorksAt`) REFERENCES `ride` (`FacilityID`) ON DELETE SET NULL;

--
-- Constraints for table `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `gamec` FOREIGN KEY (`GameID`) REFERENCES `game` (`GameID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guestc` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visited`
--
ALTER TABLE `visited`
  ADD CONSTRAINT `FacilityConstraint` FOREIGN KEY (`FacilityID`) REFERENCES `ride` (`FacilityID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `GuestConstraint` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
