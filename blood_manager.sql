-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 01:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `approved_donation_request`
--

CREATE TABLE `approved_donation_request` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` int(11) NOT NULL,
  `patient_gender` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `Blood group` varchar(40) NOT NULL,
  `Trasportation fee` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approved_donation_request`
--

INSERT INTO `approved_donation_request` (`id`, `email`, `contact`, `patient_gender`, `location`, `Blood group`, `Trasportation fee`) VALUES
(15, 'raf@gmail.com', 14563345, 'male', 'mohakhali', 'A+', 'included'),
(16, 'nidhi@gmail.sadat', 15674456, 'female', 'wireless', 'A+', 'included'),
(18, 'shanto@gmail.com', 15665564, 'male', 'Kurmitola Hospital, Dhaka', 'AB-', 'not_included'),
(19, 'maisha@outlook.com', 1766796788, 'female', 'Mohakhali General Hospital, Dhaka ', 'O+', 'included'),
(20, 'Bloodbankreq@email.com', 165768768, 'male', 'Square auditorium', 'A+', 'included');

-- --------------------------------------------------------

--
-- Table structure for table `approved_event`
--

CREATE TABLE `approved_event` (
  `id` int(11) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `org_name` varchar(40) NOT NULL,
  `event_name` varchar(40) NOT NULL,
  `contact` int(11) NOT NULL,
  `location` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approved_event`
--

INSERT INTO `approved_event` (`id`, `reg_no`, `org_name`, `event_name`, `contact`, `location`, `date`, `time`) VALUES
(15, 34, 'Square Hospital', 'Blood Campaign', 15678667, 'Square auditorium', '2023-12-26', '10:49:00'),
(17, 454545, 'Lifeline Blood Bank', 'Free blood test campaign', 15476556, 'Banani club, Dhaka', '2024-01-15', '11:00:00'),
(19, 121212, 'Brac Blood Bank', 'Brac healthy life campaign', 13578567, 'Brac center auditorim, Dhaka', '2024-02-21', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE `bloodbank` (
  `Name` varchar(40) NOT NULL,
  `Regnum` int(15) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Contact` int(14) NOT NULL,
  `event_organized` int(11) NOT NULL,
  `blood_bags` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`Name`, `Regnum`, `Password`, `Address`, `Contact`, `event_organized`, `blood_bags`) VALUES
('Square Hospital', 34, 'as', 'Dhaka, bangladesh', 1675675, 3, 2),
('Brac Blood Bank', 121212, 'brac', 'Police plaza, Dhaka', 1575566, 3, 6),
('Shondhani Blood Bank', 323232, 'shondhani', 'Mohakhali, Dhaka', 16856788, 2, 4),
('Lifeline Blood Bank', 454545, 'lifeline', 'Banani, Dhaka', 14732778, 2, 3),
('Impulse Blood Bank', 656565, 'impulse', 'Naria, Dhaka', 16578967, 3, 6),
('National Hospital', 676767, 'national', 'Gulshan 2, Dhaka', 15588767, 0, 7);

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
-- Table structure for table `donation_requests`
--

CREATE TABLE `donation_requests` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` int(11) NOT NULL,
  `patient_gender` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `Blood group` varchar(40) NOT NULL,
  `Trasportation fee` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_requests`
--

INSERT INTO `donation_requests` (`id`, `email`, `contact`, `patient_gender`, `location`, `Blood group`, `Trasportation fee`) VALUES
(17, 'ahmed@yahoo.com', 1775898667, 'female', 'Care hospital', 'B+', 'included');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `reg_no` varchar(45) NOT NULL,
  `Orgname` varchar(30) NOT NULL,
  `event_name` varchar(40) NOT NULL,
  `Contact no.` int(14) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `reg_no`, `Orgname`, `event_name`, `Contact no.`, `Location`, `Date`, `Time`) VALUES
(16, '34', 'Square Hospital', 'HIV awareness campaign', 14355756, 'Square auditorium', '2024-01-02', '16:00:00'),
(18, '454545', 'Lifeline Blood Bank', 'Blood for humanity', 1667867, 'Banani public park, Dhaka', '2024-02-06', '10:00:00');

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
  `Times donated` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Email`, `Password`, `Name`, `Address`, `Age`, `Phone`, `dob`, `NID`, `Bloodgroup`, `Times donated`) VALUES
('ahmed@yahoo.com', 'ahmed', 'Reshad Ahmed', 'Uttara, Dhaka', 41, 17434675, '1982-05-11', 69342356, 'O+', 0),
('maisha@outlook.com', 'maisha', 'Maisha Hossain', 'Nikunja 2, Dhaka North', 23, 1568556, '2000-05-23', 978434657, 'O+', 0),
('Nidhi@gmail.com', 'asdf', 'Nidhi', 'Barisal,Bangladesh', 15, 173645433, '2007-04-28', 23234435, 'B+', 4),
('raf@gmail.com', '098', 'Rafiat', 'Mirpur,Dhaka', 23, 7890, '2023-12-05', 9876, 'A+', 3),
('shanto@gmail.com', 'shanto', 'Eamin Shanto', 'Merul Badda, Dhaka', 26, 1676436, '1997-03-13', 694543235, 'AB+', 0),
('testing@gmail.com', 'testpass1', 'Test Member', 'Test location', 22, 1845869, '2023-12-18', 2147483647, 'AB+', 2);

-- --------------------------------------------------------

--
-- Table structure for table `varification_req`
--

CREATE TABLE `varification_req` (
  `code` int(11) NOT NULL,
  `sent_by` varchar(40) NOT NULL,
  `sent_to` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `varification_req`
--

INSERT INTO `varification_req` (`code`, `sent_by`, `sent_to`) VALUES
(21, 'Nidhi@gmail.com', 'shanto@gmail.com'),
(22, 'ahmed@yahoo.com', 'maisha@outlook.com'),
(23, '121212', 'raf@gmail.com'),
(24, 'Nidhi@gmail.com', 'Bloodbankreq@email.com'),
(25, 'Nidhi@gmail.com', '121212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `approved_donation_request`
--
ALTER TABLE `approved_donation_request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `NID` (`NID`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `varification_req`
--
ALTER TABLE `varification_req`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation_requests`
--
ALTER TABLE `donation_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `varification_req`
--
ALTER TABLE `varification_req`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood donation`
--
ALTER TABLE `blood donation`
  ADD CONSTRAINT `blood donation_ibfk_1` FOREIGN KEY (`Dmail`) REFERENCES `member` (`Email`),
  ADD CONSTRAINT `blood donation_ibfk_2` FOREIGN KEY (`Rmail`) REFERENCES `member` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
