-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 03:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Name`, `Password`) VALUES
('mohammadaronno@gmail.com', 'Aronno Rahman', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE `bloodbank` (
  `Name` varchar(40) NOT NULL,
  `Regnum` int(15) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Contact` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`Name`, `Regnum`, `Password`, `Address`, `Contact`) VALUES
('New', 45454, '4545455', 'dhaka, bangladesh', 45654645),
('Another bb', 3243243, '4545435df', 'dhaka, bangladesh', 454645645),
('Square', 3446677, 'dfhdfgg', 'dhaka, bangladesh', 455643),
('San Andreas', 12532533, 'blooadfd', 'Rockstar North', 13345766),
('Rockstar games', 20132025, 'gtaVI', 'Rockstar North', 18573854),
('Rockstar games', 23434436, 'fgdrgthd', 'Test location', 454543),
('Nikon BB', 24355075, 'prime is b', 'Japan', 2147483647),
('Another BBank', 34623454, '36ggje', 'Test location', 45457774);

-- --------------------------------------------------------

--
-- Table structure for table `blood donation`
--

CREATE TABLE `blood donation` (
  `Dmail` varchar(40) NOT NULL,
  `Blood group` varchar(4) NOT NULL,
  `Rmail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `Dname` varchar(40) NOT NULL,
  `Demail` varchar(40) NOT NULL,
  `Did` varchar(10) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Name` varchar(45) NOT NULL,
  `Eventnum` int(11) NOT NULL,
  `Orgname` varchar(30) NOT NULL,
  `Contact no.` int(14) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Email` varchar(40) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Phone` int(14) NOT NULL,
  `dob` date NOT NULL,
  `NID` int(15) NOT NULL,
  `Bloodgroup` varchar(4) NOT NULL,
  `Times donated` int(3) NOT NULL,
  `Priority point` int(4) NOT NULL,
  `Latest donation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Email`, `Password`, `Name`, `Address`, `Age`, `Phone`, `dob`, `NID`, `Bloodgroup`, `Times donated`, `Priority point`, `Latest donation`) VALUES
('farzia@gmail.com', 'farzia', 'Farzia', 'dhaka, bangladesh', 21, 345476578, '2023-12-22', 454657677, 'A+', 0, 0, '0000-00-00'),
('mohammadaronno@gmail.com', 'sdssds', 'sdsdad', 'sadsadsa', 0, 2147483647, '2023-12-09', 0, '', 0, 0, '0000-00-00'),
('Nidhi@gmail.com', 'asdf', 'Nidhi', 'Barisal,Bangladesh', 15, 173645433, '2007-04-28', 23234435, 'B+', 0, 0, '0000-00-00'),
('testing@gmail.com', 'testpass1', 'Test ID', 'Test location', 22, 184586958, '2023-12-18', 2147483647, 'AB+', 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Eventnum` int(11) NOT NULL,
  `adminmail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(8) NOT NULL,
  `Memail` varchar(40) NOT NULL,
  `bbreg` int(10) NOT NULL,
  `Reqtime` time NOT NULL,
  `Amount` int(3) NOT NULL,
  `Bgroup` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD PRIMARY KEY (`Regnum`),
  ADD UNIQUE KEY `Contact no.` (`Contact`);

--
-- Indexes for table `blood donation`
--
ALTER TABLE `blood donation`
  ADD PRIMARY KEY (`Dmail`,`Rmail`),
  ADD UNIQUE KEY `Email` (`Dmail`),
  ADD UNIQUE KEY `rbbreg` (`Rmail`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`Did`),
  ADD UNIQUE KEY `Dname` (`Dname`),
  ADD UNIQUE KEY `Demail` (`Demail`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Eventnum`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `NID` (`NID`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD UNIQUE KEY `Eventnum` (`Eventnum`,`adminmail`),
  ADD KEY `adminmail` (`adminmail`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD UNIQUE KEY `Memail` (`Memail`),
  ADD UNIQUE KEY `bbreg` (`bbreg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Eventnum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Eventnum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood donation`
--
ALTER TABLE `blood donation`
  ADD CONSTRAINT `blood donation_ibfk_1` FOREIGN KEY (`Dmail`) REFERENCES `member` (`Email`),
  ADD CONSTRAINT `blood donation_ibfk_2` FOREIGN KEY (`Rmail`) REFERENCES `member` (`Email`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`adminmail`) REFERENCES `admin` (`Email`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`Eventnum`) REFERENCES `event` (`Eventnum`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`Memail`) REFERENCES `member` (`Email`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`bbreg`) REFERENCES `bloodbank` (`Regnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
