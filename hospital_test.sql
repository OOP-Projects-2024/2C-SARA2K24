-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 01:42 PM
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
-- Database: `hospital_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountstable`
--

CREATE TABLE `accountstable` (
  `userID` varchar(15) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `isdeleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountstable`
--

INSERT INTO `accountstable` (`userID`, `username`, `password`, `token`, `isdeleted`) VALUES
('1234', 'kevinmwa', 'meowmeow', NULL, 0),
('1246', 'awitsayo', '$2y$10$YWMyNWU1YTQzODFlNGEzYelNK0aM1BIWaehOsUUBbk.pMLbLMAJt6', 'YTI4OWRlNWVkYTMxNzMwMGViMWM4NmE2NjIzNjRhOTVkYTA5M2I0MmVkODUxZTlhNzZiZTI3YmMyMzJkODM3ZQ==', 0),
('3456', 'kevinmeow', 'meowmeow1', NULL, 0),
('3582', 'wewew', '$2y$10$MGIzNDJkMzAwYmI1YTQyOO.7IMndzDYsJTLJvCoL8iPYzrwapIM26', NULL, 0),
('5555', 'sanpedro', '$2y$10$MTFkMGQ3Y2NmYmRmYjgxNOQfEzY8/p7R6XnUz0SEEkuSB0ShKNaZ6', 'MmQ1MGUwNTAxZDk2NDZiNWZmNTQzNTgwZDA0OWJiZWNkZWUxNzgzNThmZjgzZmUyM2M4OWUyMjM4Zjk4YjIxNw==', 0),
('7896', 'lapuk1', '$2y$10$NTljZjFjMGUwYmViNTYzMO9lZfJOLr8uPJzKDX4dH9QkQgkc2iJm2', 'Y2I4ZDE0ZmUxZTlmZjk2NmYyM2JmYzUyZDBiOTRmMWFkMWFiZmRhMzRiNjRjNzU1MWQ1YzM0NTY4MzRmMjE2ZQ==', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttable`
--

CREATE TABLE `appointmenttable` (
  `appointmentID` varchar(200) NOT NULL,
  `doctorID` varchar(200) DEFAULT NULL,
  `patientID` varchar(200) DEFAULT NULL,
  `appointmentdate` date DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointmenttable`
--

INSERT INTO `appointmenttable` (`appointmentID`, `doctorID`, `patientID`, `appointmentdate`, `isdeleted`) VALUES
('1', '444', '7535', '2024-12-13', 0),
('12', '203', '1542', '2024-12-25', 0),
('13', '777', '1221', '2024-12-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `billingtable`
--

CREATE TABLE `billingtable` (
  `billID` varchar(200) NOT NULL,
  `patientID` varchar(200) NOT NULL,
  `appointmentID` varchar(200) NOT NULL,
  `totalcharge` varchar(200) NOT NULL,
  `amountpaid` varchar(200) NOT NULL,
  `servicedate` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billingtable`
--

INSERT INTO `billingtable` (`billID`, `patientID`, `appointmentID`, `totalcharge`, `amountpaid`, `servicedate`, `status`, `isdeleted`) VALUES
('10001', '1245', '456-789', '45000', '35000', '2021-12-06', 'partially paid', 0),
('20002', '1235', '789-456', '5000', '5000', '2024-11-12', 'fully paid', 0),
('30003', '2145', '789-417', '500', '500', '2024-12-11', 'Fully Paid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctortable`
--

CREATE TABLE `doctortable` (
  `doctorID` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `licensenumber` varchar(200) NOT NULL,
  `workinghours` varchar(200) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctortable`
--

INSERT INTO `doctortable` (`doctorID`, `fname`, `lname`, `specialization`, `contactnumber`, `licensenumber`, `workinghours`, `isdeleted`) VALUES
('111', 'Deymond', 'Iguodala', 'Neurology', '09464536822', '12-45645-23', '7am - 4pm', 0),
('128', 'jerald', 'Skibiddy', 'Pediatrics', '09436959125', '13-48642-96', '4am - 4pm', 0),
('159', 'kian', 'Skibiddy', 'Pediatrics', '09479491255', '13-48642-96', '9am - 6pm', 0),
('222', 'Robinson', 'Ancheta', 'Pediatrics', '09487471255', '13-48642-96', '9am - 6pm', 0),
('333', 'Julia', 'Ecolango', 'Neurosurgeon', '09951867383', '51-64645-24', '6pm - 5am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patienttable`
--

CREATE TABLE `patienttable` (
  `patientID` varchar(30) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `contactnumber` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `medicalhistory` varchar(200) NOT NULL,
  `age` int(200) NOT NULL,
  `emergencycontact` varchar(200) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patienttable`
--

INSERT INTO `patienttable` (`patientID`, `fname`, `lname`, `mname`, `birthday`, `contactnumber`, `address`, `gender`, `medicalhistory`, `age`, `emergencycontact`, `isdeleted`) VALUES
('1234', 'Kevin', 'Dulay', 'Bakunawa', '2004-08-13', '09999464885', 'Cathingco St. Zambales', 'Male', 'Asthma', 20, '09966521242', 0),
('2356', 'Manny', 'Medina', 'Pipen', '2003-08-13', '09741852963', 'Orani, Bataan', 'Male', 'Dialysis', 21, '09987654123', 1),
('2589', 'Niel', 'Generao', 'Nibungco', '2006-07-15', '09810348702', 'Calapacuan, Zambales', 'male', 'Allergies', 18, '09813195187', 0),
('3456', 'Janine', 'Sweezer', 'romanban', '2003-08-11', '09487239725', 'calapcuan', 'male', 'asthma', 21, '09462235226', 1),
('4785', 'RJ', 'Hererra', 'balintawak', '0200-12-12', '09487135491', 'Sta. rita olongapo', 'Male', 'Cancer stg9', 24, '09461488541', 1),
('7704', 'senku', 'senpai', 'shikigami', '2005-08-13', '09995117885', 'Misuri US', 'Male', 'Pneumonia', 19, '09999861242', 0),
('7895', 'krenz', 'Ocampo', 'Fordan', '2004-04-18', '09142548702', 'San Marcelino, Zambales', 'male', 'Skin Diseas', 20, '09898562187', 0),
('7896', 'Louei', 'Lagman', 'De Guzman', '2000-09-01', '09472359765', 'San Marcelino', 'male', 'Heart Disease', 25, '09613497516', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountstable`
--
ALTER TABLE `accountstable`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `patiendID` (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `appointmenttable`
--
ALTER TABLE `appointmenttable`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Indexes for table `billingtable`
--
ALTER TABLE `billingtable`
  ADD PRIMARY KEY (`billID`);

--
-- Indexes for table `doctortable`
--
ALTER TABLE `doctortable`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `patienttable`
--
ALTER TABLE `patienttable`
  ADD PRIMARY KEY (`patientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
