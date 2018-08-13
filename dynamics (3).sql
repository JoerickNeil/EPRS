-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 12:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynamics`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `appID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `CityID` int(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Middlename` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Nickname` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Municipality` varchar(50) NOT NULL,
  `Postal` int(50) NOT NULL,
  `Image` varchar(50) DEFAULT NULL,
  `Birthdate` date NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Resume` varchar(50) DEFAULT NULL,
  `Dateadded` date DEFAULT NULL,
  `Datemodified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`appID`, `userID`, `CityID`, `Firstname`, `Middlename`, `Lastname`, `Nickname`, `Street`, `Municipality`, `Postal`, `Image`, `Birthdate`, `Gender`, `Status`, `Resume`, `Dateadded`, `Datemodified`) VALUES
(10, 2, 41, 'Tobias', 'Rosaldes', 'Tobias', 'Jrclori', '351 Wayan St. Mandaluyong City', 'French', 5550, NULL, '2018-03-21', 'Male', 'Unavailable', NULL, '2018-03-22', NULL),
(26, 57, 2, 'Profile', 'Test', 'SSS', 'Michael', '351 Wayan St. Mandaluyong City', 'Manila', 5550, NULL, '2018-07-04', 'Male', 'Active', NULL, '2018-07-04', NULL),
(27, 67, 1, 'Karl', 'Aniag', 'Adrian', 'Cardo', '351 Bicutan Luminag City', 'Manila', 5550, NULL, '2010-01-05', 'Male', 'Unavailable', NULL, '2018-07-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_reqs`
--

CREATE TABLE `applicant_reqs` (
  `ReqID` int(50) NOT NULL,
  `appID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `refno` int(50) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dateadded` date NOT NULL,
  `datemodified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `applyID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `jobID` int(50) NOT NULL,
  `appID` int(50) NOT NULL,
  `dateapplied` date NOT NULL,
  `dateapprove` date DEFAULT NULL,
  `datereject` date DEFAULT NULL,
  `datecancel` date DEFAULT NULL,
  `remarks` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`applyID`, `userID`, `jobID`, `appID`, `dateapplied`, `dateapprove`, `datereject`, `datecancel`, `remarks`, `status`) VALUES
(1, 67, 2, 27, '2018-07-24', '2018-08-06', NULL, NULL, '', 'Shortlisted');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `clientID` int(50) NOT NULL,
  `jobID` int(50) NOT NULL,
  `appID` int(50) NOT NULL,
  `Remarks` varchar(50) NOT NULL,
  `terminationdate` date DEFAULT NULL,
  `renewaldate` date DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `dateadded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignID`, `userID`, `clientID`, `jobID`, `appID`, `Remarks`, `terminationdate`, `renewaldate`, `status`, `dateadded`) VALUES
(1, 41, 1, 1, 27, 'ok', NULL, NULL, 'Active', '2018-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `category`) VALUES
(1, 'Sales'),
(2, 'Electronics'),
(3, 'Business'),
(4, 'Financial Services');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityID` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `regionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityID`, `name`, `regionID`) VALUES
(1, 'Antipolo City', 1),
(2, 'Caloocan City', 1),
(3, 'Las Piñas City', 1),
(4, 'Makati City', 1),
(5, 'Malabon City', 1),
(6, 'Mandaluyong City', 1),
(7, 'Manila', 1),
(8, 'Marikina City', 1),
(9, 'Muntinlupa City', 1),
(10, 'Navotas City', 1),
(11, 'Paranaque City', 1),
(12, 'Pasay City', 1),
(13, 'Pasig City', 1),
(14, 'Pateros City', 1),
(15, 'Quezon City', 1),
(16, 'Rizal', 1),
(17, 'San Juan City', 1),
(18, 'Taguig', 1),
(19, 'Valenzuela City', 1),
(20, 'Abra', 2),
(21, 'Apayao', 2),
(22, 'Baguio', 2),
(23, 'Benguet', 2),
(24, 'Ifugao', 2),
(25, 'Kalinga', 2),
(26, 'Mountain Province', 2),
(27, 'Ilocos Norte', 3),
(28, 'Ilocos Sur', 3),
(29, 'La Union', 3),
(30, 'Pangasinan', 3),
(31, 'Batanes', 4),
(32, 'Cagayan', 4),
(33, 'Isabela', 4),
(34, 'Nueva Vizcaya', 4),
(35, 'Quirino', 4),
(36, 'Aurora', 5),
(37, 'Bataan', 5),
(38, 'Bulacan', 5),
(39, 'Nueva Ecija', 5),
(40, 'Pampanga', 5),
(41, 'Tarlac', 5),
(42, 'Zambales', 5),
(43, 'Batangas', 6),
(44, 'Cavite', 6),
(45, 'Laguna', 6),
(46, 'Quezon', 6),
(47, 'Rizal', 6),
(48, 'Tagaytay', 6),
(49, 'Marinduque', 7),
(50, 'Occidental Mindoro', 7),
(51, 'Oriental Mindoro', 7),
(52, 'Palawan', 7),
(53, 'Albay', 8),
(54, 'Camarines Norte', 8),
(55, 'Camaerines Sur', 8),
(56, 'Catanduanes', 8),
(57, 'Masbate', 8),
(58, 'Sorsogon', 8),
(59, 'Aklan', 9),
(60, 'Antique', 9),
(61, 'Boracay', 9),
(62, 'Capiz', 9),
(63, 'Guimaras', 9),
(64, 'Iloilo', 9),
(65, 'Negros Occidental', 9),
(66, 'Bohol', 10),
(67, 'Cebu', 10),
(68, 'Negros Oriental', 10),
(69, 'Siquijor', 10),
(70, 'Biliran', 11),
(71, 'Eastern Samar', 11),
(72, 'Leyte', 11),
(73, 'Northern Samar', 11),
(74, 'Samar', 11),
(75, 'Southern Leyte', 11),
(76, 'Zamboanga Del Norte', 12),
(77, 'Zamboanga Del Sur', 12),
(78, 'Zamboanga Sibugay', 12),
(79, 'Bukidnon', 13),
(80, 'Cagayan De Oro', 13),
(81, 'Camiguin', 13),
(82, 'Iligan City', 13),
(83, 'Lanao Del Norte', 13),
(84, 'Misamis Occidental', 13),
(85, 'Misamis Oriental', 13),
(86, 'Compostela Valley', 14),
(87, 'Davao Del Norte', 14),
(88, 'Davao Del Sur', 14),
(89, 'Davao Oriental', 14),
(90, 'Northen Cotabato', 15),
(91, 'Sarangani', 15),
(92, 'South Cotabato', 15),
(93, 'Sultan Kudarat', 15),
(94, 'Agusan del Norte', 16),
(95, 'Agusan del Sur', 16),
(96, 'Surigao del Norte', 16),
(97, 'Surigao del Sur', 16),
(98, 'Basilan', 17),
(99, 'Lanao del Sur', 17),
(100, 'Maguindanao', 17),
(101, 'Sulu', 17),
(102, 'Tawi-tawi', 17),
(103, 'name', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ClientID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `cityID` int(50) NOT NULL,
  `postal` char(11) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `landline` char(11) NOT NULL,
  `mobile` char(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `dateadded` date NOT NULL,
  `datemodified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `userID`, `cityID`, `postal`, `contactperson`, `landline`, `mobile`, `email`, `website`, `logo`, `latitude`, `longitude`, `status`, `dateadded`, `datemodified`) VALUES
(1, 39, 20, '5550', 'Mr.Penaa', '5357351', '09265636996', 'Colone@yahoo.com', 'Colone.com', NULL, NULL, NULL, 'Active (Clients)', '2018-05-17', NULL),
(2, 66, 2, '5550', 'Mr.canister', '5357351', '09265636996', 'dan@yahoo.com', 'Dan.com.ph', 'NULL', NULL, '0.000000', 'Active', '2018-07-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Middlename` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `userID`, `Firstname`, `Lastname`, `Middlename`, `email`, `image`) VALUES
(1, 40, 'Alfredo', 'Namedz', 'Namesxc', 'AlfredName@yahoo.com', NULL),
(2, 65, 'kol', 'mol', 'tol', 'p@yahoo.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_reqs`
--

CREATE TABLE `employee_reqs` (
  `reqID` int(50) NOT NULL,
  `assignID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `refno` int(50) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dateadded` date NOT NULL,
  `datemodified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `evalnoID` int(50) NOT NULL,
  `assignmentID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `feedback` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `dateadded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobID` int(50) NOT NULL,
  `ClientID` int(50) NOT NULL,
  `catID` int(50) NOT NULL,
  `cityID` int(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `requirements` varchar(500) NOT NULL,
  `startprice` int(50) NOT NULL,
  `endprice` int(50) NOT NULL,
  `datestarted` date NOT NULL,
  `duedate` date NOT NULL,
  `contractdate` date DEFAULT NULL,
  `totalslots` int(50) NOT NULL,
  `available` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dateadded` date NOT NULL,
  `datemodified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobID`, `ClientID`, `catID`, `cityID`, `code`, `title`, `description`, `requirements`, `startprice`, `endprice`, `datestarted`, `duedate`, `contractdate`, `totalslots`, `available`, `status`, `dateadded`, `datemodified`) VALUES
(1, 1, 3, 1, 'AC1234', 'Sales', '<p>hire as a clerk</p>', '<p>need resume</p>', 10000, 20000, '2018-07-05', '2018-07-06', NULL, 9, 10, 'Archived', '2018-07-06', '2018-07-06'),
(2, 2, 3, 20, 'AC34TY9', 'Business', '<p>Marketing</p>', '<p>SSS</p>', 5000, 10000, '2018-07-05', '2018-07-06', NULL, 16, 20, 'Active', '2018-07-06', NULL),
(3, 1, 2, 43, '3CFER56', 'Electric Business', '<p>Helpfull</p>', '<p>SSS</p>', 4000, 10000, '2018-07-05', '2018-07-07', NULL, 20, 20, 'Active', '2018-07-06', NULL),
(4, 1, 3, 64, '456QP', 'Looking for new experience people', '<p>A friendly Job</p>', '<p>SSS</p>', 5500, 10000, '2018-07-24', '2018-08-02', NULL, 20, 20, 'Active', '2018-07-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `logtype` varchar(50) NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `userID`, `logtype`, `timestamp`) VALUES
(30, 1, 'Login', '2018-03-16'),
(31, 1, 'Login', '2018-03-16'),
(32, 1, 'Login', '2018-03-22'),
(33, 1, 'Login', '2018-05-17'),
(34, 1, 'Login', '2018-05-23'),
(35, 1, 'Login', '2018-05-23'),
(36, 1, 'Login', '2018-05-23'),
(37, 41, 'Login', '2018-05-24'),
(38, 41, 'Login', '2018-05-24'),
(39, 41, 'Login', '2018-05-24'),
(40, 1, 'Login', '2018-05-24'),
(41, 1, 'Login', '2018-05-30'),
(42, 1, 'Login', '2018-05-30'),
(43, 1, 'Login', '2018-07-04'),
(44, 1, 'Login', '2018-07-06'),
(45, 1, 'Login', '2018-07-06'),
(46, 41, 'Login', '2018-07-06'),
(47, 41, 'Login', '2018-07-06'),
(48, 1, 'Login', '2018-07-06'),
(49, 1, 'Login', '2018-07-06'),
(50, 1, 'Login', '2018-07-06'),
(51, 1, 'Login', '2018-07-06'),
(52, 1, 'Login', '2018-07-06'),
(53, 1, 'Login', '2018-07-06'),
(54, 1, 'Login', '2018-07-06'),
(55, 1, 'Added record to shortlist', '2018-07-06'),
(56, 1, 'Login', '2018-07-06'),
(57, 1, 'Login', '2018-07-06'),
(58, 1, 'Login', '2018-07-06'),
(59, 1, 'Login', '2018-07-06'),
(60, 1, 'Added record to shortlist', '2018-07-06'),
(61, 1, 'Login', '2018-07-06'),
(62, 1, 'Login', '2018-07-06'),
(63, 1, 'Login', '2018-07-06'),
(64, 1, 'Login', '2018-07-06'),
(65, 1, 'Login', '2018-07-24'),
(66, 1, 'Login', '2018-07-24'),
(67, 1, 'Login', '2018-07-24'),
(68, 1, 'Added record to shortlist', '2018-07-24'),
(69, 1, 'Login', '2018-07-24'),
(70, 1, 'Login', '2018-08-06'),
(71, 1, 'Added record to shortlist', '2018-08-06'),
(72, 67, 'Login', '2018-08-13'),
(73, 67, 'Login', '2018-08-13'),
(74, 1, 'Login', '2018-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `regionID` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`regionID`, `name`) VALUES
(1, 'NCR'),
(2, 'CAR'),
(3, 'Region 01'),
(4, 'Region 02'),
(5, 'Region 03'),
(6, 'Region 04A'),
(7, 'Region 04B'),
(8, 'Region 05'),
(9, 'Region 06'),
(10, 'Region 07'),
(11, 'Region 08'),
(12, 'Region 09'),
(13, 'Region 10'),
(14, 'Region 11'),
(15, 'Region 12'),
(16, 'Region 13'),
(17, 'ARMM'),
(18, 'name');

-- --------------------------------------------------------

--
-- Table structure for table `requirementsjob`
--

CREATE TABLE `requirementsjob` (
  `RJID` int(50) NOT NULL,
  `appID` int(50) NOT NULL,
  `SSS_status` int(50) NOT NULL,
  `SSS_file` int(50) NOT NULL,
  `SSS_timestamp` date NOT NULL,
  `NBI_status` int(50) NOT NULL,
  `NBI_file` int(50) NOT NULL,
  `NBI_timestamp` date NOT NULL,
  `pagibig_status` int(50) NOT NULL,
  `pagibig_file` int(50) NOT NULL,
  `pagibig_timestamp` date NOT NULL,
  `philhealth` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedID` int(50) NOT NULL,
  `recordID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `TimeID` int(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dateadded` date NOT NULL,
  `datemodified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedID`, `recordID`, `userID`, `TimeID`, `remarks`, `status`, `dateadded`, `datemodified`) VALUES
(5, 1, 41, 2, 'Where it go', 'Active', '2018-08-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shortlist`
--

CREATE TABLE `shortlist` (
  `recordID` int(50) NOT NULL,
  `applyID` int(50) NOT NULL,
  `appID` int(50) NOT NULL,
  `dateadded` date DEFAULT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortlist`
--

INSERT INTO `shortlist` (`recordID`, `applyID`, `appID`, `dateadded`, `remarks`) VALUES
(1, 1, 27, '2018-07-24', 'Wala na Finish Na'),
(2, 1, 27, '2018-08-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `TimeID` int(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`TimeID`, `Time`) VALUES
(1, '9:10pm - 10:20pm'),
(2, '10:30pm - 11:20pm'),
(3, '2:40pm - 4:50pm'),
(4, '8:30pm - 10:40pm');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeID` int(11) NOT NULL,
  `userType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `userType`) VALUES
(1, 'Administrator'),
(2, 'Clients'),
(3, 'Applicants'),
(4, 'Employee'),
(5, 'SuperAdministrator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dateadded` datetime NOT NULL,
  `datemodified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `typeID`, `Name`, `email`, `password`, `status`, `dateadded`, `datemodified`) VALUES
(1, 1, 'Steeve', 'Steeve@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-02-05 17:02:12', '2018-05-23 12:55:04'),
(2, 3, 'Tobias', 'Tobias@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-03-22 23:30:56', NULL),
(39, 2, 'Colone', 'Colone@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-05-17 18:54:33', NULL),
(40, 4, 'Alfredo', 'AlfredName@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-05-17 18:55:51', NULL),
(41, 5, 'Fly', 'Fly@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-05-23 12:54:46', NULL),
(57, 3, 'Mike', 'Mike@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-07-04 18:41:26', NULL),
(59, 1, 'Pots', 'pots@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-07-05 22:26:57', NULL),
(64, 5, 'Worek', 'Work@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-07-05 22:55:41', NULL),
(65, 4, 'mike', 'potato@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-07-06 00:12:11', NULL),
(66, 2, 'Dan', 'dan@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-07-06 01:35:14', NULL),
(67, 3, 'Karl', 'jrcloriclori@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-07-24 12:38:37', NULL),
(68, 1, 'Hot', 'Hot@yahoo.com', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861', 'Active', '2018-07-24 13:34:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`appID`),
  ADD KEY `usedID` (`userID`),
  ADD KEY `CityID` (`CityID`);

--
-- Indexes for table `applicant_reqs`
--
ALTER TABLE `applicant_reqs`
  ADD PRIMARY KEY (`ReqID`),
  ADD KEY `appID` (`appID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applyID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `jobID` (`jobID`),
  ADD KEY `appID` (`appID`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `clienID` (`clientID`),
  ADD KEY `jobID` (`jobID`),
  ADD KEY `appID` (`appID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ClientID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `cityID` (`cityID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `employee_reqs`
--
ALTER TABLE `employee_reqs`
  ADD PRIMARY KEY (`reqID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `assignments to employee_reqs` (`assignID`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`evalnoID`),
  ADD KEY `assignmentID` (`assignmentID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobID`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `clientID` (`ClientID`),
  ADD KEY `catID` (`catID`),
  ADD KEY `Cities to jobs` (`cityID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`regionID`);

--
-- Indexes for table `requirementsjob`
--
ALTER TABLE `requirementsjob`
  ADD PRIMARY KEY (`RJID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedID`),
  ADD KEY `recordID` (`recordID`),
  ADD KEY `TimeID` (`TimeID`);

--
-- Indexes for table `shortlist`
--
ALTER TABLE `shortlist`
  ADD PRIMARY KEY (`recordID`),
  ADD KEY `applyID` (`applyID`),
  ADD KEY `appID` (`appID`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`TimeID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `typeID` (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `appID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `applicant_reqs`
--
ALTER TABLE `applicant_reqs`
  MODIFY `ReqID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `applyID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_reqs`
--
ALTER TABLE `employee_reqs`
  MODIFY `reqID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `evalnoID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `regionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `requirementsjob`
--
ALTER TABLE `requirementsjob`
  MODIFY `RJID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shortlist`
--
ALTER TABLE `shortlist`
  MODIFY `recordID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `TimeID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant_reqs`
--
ALTER TABLE `applicant_reqs`
  ADD CONSTRAINT `Applicants to applicant_requirements` FOREIGN KEY (`appID`) REFERENCES `applicants` (`appID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users to Applicant_requirements` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `users to logs` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
