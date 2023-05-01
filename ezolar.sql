-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 01:26 PM
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
-- Database: `ezolar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(6) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`) VALUES
(30, 'Sachini Muthugala');

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `contractorID` int(6) NOT NULL,
  `name` varchar(45) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `profilePhoto` varchar(256) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`contractorID`, `name`, `nic`, `profilePhoto`, `bio`) VALUES
(23, 'Contractor Mashie', '200077303041', NULL, 'Hello Im the Best Contractor');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_telno`
--

CREATE TABLE `contractor_telno` (
  `contractorID` int(6) NOT NULL,
  `telNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(6) NOT NULL,
  `name` varchar(45) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` longtext DEFAULT NULL,
  `profilePhoto` varchar(256) DEFAULT 'defaultimg.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `name`, `nic`, `mobile`, `address`, `profilePhoto`) VALUES
(1, 'Amashi Abeywickrama', '200077303041', 718712178, 'Puhulyaya, Ambalantota', 'mee.jpeg'),
(2, 'Dinuk Silva', '111111111V', 114786955, '', NULL),
(4, 'Senuri Jagoda', '200077303041', 114786955, '', NULL),
(5, 'Danodya Supun', '200077303041', 114786955, 'Ambalantota', NULL),
(7, 'habc Wickramasinghe', '200077303041', 718712178, '', NULL),
(8, 'Kimuthu Wickramasinghe', '200077303041', 114786955, '', NULL),
(9, 'Dinushan Vimukthi', '111111111V', 718843999, '', NULL),
(12, 'Pabasara Wickramasinghe', '111111111V', 718712178, '', NULL),
(13, 'Mashi Sandami', '200077303041', 718712178, '', NULL),
(14, 'Senuri Silva', '200077303041', 718712178, '', NULL),
(16, 'Senuri Wickramasinghe', '200077303041', 718712178, '', NULL),
(17, 'Senurika Silva', '200077303041', 718712178, '', NULL),
(18, 'Senuri Wickramasinghe', '200077303041', 718712178, '', NULL),
(19, 'Kimuthu Silva', '200077303041', 718712178, '', NULL),
(21, 'Senuri Wickramasinghe', '200077303041', 718712178, '', NULL),
(22, 'Senuri ib', '200077303041', 718712178, '', NULL),
(23, 'Contractor Mashie', '200077303041', 718717878, NULL, 'Screenshot_20221029_100549.png'),
(24, 'wikum Wickramasinghe', '200077303045', 718712179, '', NULL),
(25, 'Senuri Silva', '200077304041', 718712188, '', NULL),
(26, 'Senuri Jagoda', '200077303041', 718712188, '', NULL),
(27, 'bee bumble', '123456789012', 123456789, '', NULL),
(28, 'Chathurasinghe Wickramanayaka', '199908751235', 776688990, '', NULL),
(29, 'Chatura Wickramasinghe', '199928976789', 778890899, '', NULL),
(34, 'Danodya Supun', '200077307841', 718712188, 'Wadduwa, Kalutara', NULL),
(37, 'Senuri Gune', '200077303041', 718712178, 'insert hometown', 'defaultimg.png'),
(38, 'Nethu Dahan', '200077303041', 718712178, 'Ambalantota', 'defaultimg.png');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(6) NOT NULL,
  `name` varchar(45) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `profilePhoto` varchar(256) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `name`, `nic`, `gender`, `profilePhoto`, `bio`, `type`) VALUES
(2, 'Dinuk De Silva', '200034561234', 'Male', NULL, 'Hi', 'Salesperson'),
(23, 'Mashie Abeywickrama', '200077303041', 'Female', 'plus.png', 'Hello nice to meet you', 'Contractor'),
(30, 'Sachini Muthugala', '200077343041', 'Female', NULL, 'Hello I\'m eZolar Admin ', 'Admin'),
(31, 'Senuri Silva', '200077303045', 'female', '', '', 'engineer'),
(32, 'Pabasara abey', '199985912227', 'female', '', '', 'engineer'),
(33, 'sachini sales', '200077303022', 'Female', NULL, ' ', 'Salesperson'),
(35, 'Senuritry hagodaaa', '200077312345', 'male', '', '', 'Salesperson');

-- --------------------------------------------------------

--
-- Table structure for table `employee_telno`
--

CREATE TABLE `employee_telno` (
  `Employee_empID` int(6) NOT NULL,
  `telno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_telno`
--

INSERT INTO `employee_telno` (`Employee_empID`, `telno`) VALUES
(35, '0718712122'),
(30, '0718712178'),
(32, '0718712199'),
(23, '0718717878'),
(33, '0718719999'),
(31, '0771234567'),
(2, '0775678907');

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE `engineer` (
  `EngineerID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `engineer`
--

INSERT INTO `engineer` (`EngineerID`) VALUES
(31);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiryID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `Salesperson_Employee_empID` int(11) DEFAULT NULL,
  `topic` mediumtext NOT NULL,
  `type` varchar(15) NOT NULL,
  `Project_projectID` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_message`
--

CREATE TABLE `inquiry_message` (
  `Inquiry_inquiryID` int(11) NOT NULL,
  `messageID` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issueID` int(11) NOT NULL,
  `Project_projectID` varchar(6) NOT NULL,
  `topic` mediumtext NOT NULL,
  `message` longtext NOT NULL,
  `userId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modifiedpackage`
--

CREATE TABLE `modifiedpackage` (
  `projectID` varchar(6) NOT NULL,
  `basePackageID` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modifiedpackage_extra`
--

CREATE TABLE `modifiedpackage_extra` (
  `projectID` varchar(6) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modifiedpackage_product`
--

CREATE TABLE `modifiedpackage_product` (
  `projectID` varchar(6) NOT NULL,
  `productID` varchar(6) NOT NULL,
  `productQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` varchar(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `budgetRange` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `name`, `type`, `budgetRange`) VALUES
('nh1422', 'pack11', 'Industrial', '300000 - 400000'),
('nh1452', 'pack01', 'Industrial', '200000 - 5000000'),
('pav124', 'Package 2', 'Res', '200000 - 500000');

-- --------------------------------------------------------

--
-- Table structure for table `package_product`
--

CREATE TABLE `package_product` (
  `Package_packageID` varchar(6) NOT NULL,
  `Product_productID` varchar(6) NOT NULL,
  `productQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_product`
--

INSERT INTO `package_product` (`Package_packageID`, `Product_productID`, `productQuantity`) VALUES
('nh1422', 'abc123', 2),
('nh1422', 'abc567', 4),
('nh1422', 'ISL001', 5),
('nh1422', 'sa1233', 1),
('nh1452', 'abc123', 8);

-- --------------------------------------------------------

--
-- Table structure for table `paymentreceipt`
--

CREATE TABLE `paymentreceipt` (
  `receiptID` int(6) NOT NULL,
  `receiptPurpose` mediumtext NOT NULL,
  `isVerified` tinyint(4) NOT NULL DEFAULT 0,
  `scan` varchar(256) NOT NULL,
  `Project_projectID` varchar(6) NOT NULL,
  `uploadedTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentreceipt`
--

INSERT INTO `paymentreceipt` (`receiptID`, `receiptPurpose`, `isVerified`, `scan`, `Project_projectID`, `uploadedTime`) VALUES
(5, 'Inspection', 1, '1.png', 'P00004', '2023-04-19 14:20:38'),
(7, 'Inspection', 0, '1.png', 'P00005', '2023-04-19 14:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` varchar(6) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `cost`, `manufacturer`, `quantity`) VALUES
('abc123', 'REC TP 72 Series 345 Wp Solar Panel', 24000, 'REC Twin Peak', 0),
('abc567', 'Test 13', 20000, 'Test', 0),
('ISL001', 'Solis Inverter 2 Kw', 96000, 'Solis', 0),
('sa1233', 'abcghd', 1200, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` varchar(6) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'Inspection Pending',
  `siteAddress` longtext DEFAULT NULL,
  `Salesperson_Employee_empID` int(6) DEFAULT NULL,
  `Package_packageID` varchar(6) DEFAULT NULL,
  `customerID` int(6) DEFAULT NULL,
  `contactNo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `status`, `siteAddress`, `Salesperson_Employee_empID`, `Package_packageID`, `customerID`, `contactNo`) VALUES
('P00004', 'B0', 'okkaie', 2, NULL, 1, '0718712178'),
('P00005', 'A0', 'okkaie123', NULL, NULL, 1, '0718712178');

-- --------------------------------------------------------

--
-- Table structure for table `projectcontractor`
--

CREATE TABLE `projectcontractor` (
  `Project_projectID` varchar(6) NOT NULL,
  `Contractor_contractorID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projectengineer`
--

CREATE TABLE `projectengineer` (
  `Project_projectID` varchar(6) NOT NULL,
  `Engineer_empID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE `salesperson` (
  `Employee_empID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`Employee_empID`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `scheduleitem`
--

CREATE TABLE `scheduleitem` (
  `scheduleID` int(6) NOT NULL,
  `Project_projectID` varchar(6) NOT NULL,
  `type` varchar(45) NOT NULL,
  `date` datetime DEFAULT NULL,
  `isConfirmed` tinyint(4) NOT NULL DEFAULT 0,
  `isCompleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheduleitem`
--

INSERT INTO `scheduleitem` (`scheduleID`, `Project_projectID`, `type`, `date`, `isConfirmed`, `isCompleted`) VALUES
(3, 'P00004', 'Inspection', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `scheduleitem_assignedcontr`
--

CREATE TABLE `scheduleitem_assignedcontr` (
  `Scheduleitem_scheduleID` int(6) NOT NULL,
  `contractorID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scheduleitem_assignedemp`
--

CREATE TABLE `scheduleitem_assignedemp` (
  `ScheduleItem_scheduleID` int(6) NOT NULL,
  `UserID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scheduleitem_requestdates`
--

CREATE TABLE `scheduleitem_requestdates` (
  `Scheduleitem_scheduleID` int(6) NOT NULL,
  `requested_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheduleitem_requestdates`
--

INSERT INTO `scheduleitem_requestdates` (`Scheduleitem_scheduleID`, `requested_date`) VALUES
(3, '04/03/2023'),
(3, '04/12/2023'),
(3, '04/21/2023');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockID` varchar(6) NOT NULL,
  `arrivalDate` datetime DEFAULT NULL,
  `Storekeeper_Employee_empID` int(6) NOT NULL,
  `stockType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `arrivalDate`, `Storekeeper_Employee_empID`, `stockType`) VALUES
('000001', '2023-02-10 08:47:31', 2, 'Arrival');

-- --------------------------------------------------------

--
-- Table structure for table `stock_product`
--

CREATE TABLE `stock_product` (
  `Stock_stockID` varchar(6) NOT NULL,
  `Product_productID` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storekeeper`
--

CREATE TABLE `storekeeper` (
  `Employee_empID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `storekeeper`
--

INSERT INTO `storekeeper` (`Employee_empID`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(15) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `type`) VALUES
(1, 'abc@gmail.com', '$2y$10$d/jzycKf6P1sj5tQVghvz..QccYz0b4fva2AZXc4MkFE2VXmS/JjK', 'Customer'),
(2, 'dinuk@gmail.com', '$2y$10$VWdTrg9SI0xfATuafIE2pOOVpfhlhWP.xDN7bQT2YNdgBd1zzL2km', 'Storekeeper'),
(4, 'amaabey56@gmail.com', '$2y$10$IqwC6Yy4m8NiDB9dXMNbXOI6ccAmXnPAz5BO5lxWNSfb85wXQANW2', 'Customer'),
(5, 'mashi123@gmail.com', '$2y$10$i7QjWSZpBHLyp7Q2yVz9Z.63tSu06fG19MRifxzcQuL3RohBKYzmK', 'Customer'),
(7, 'senuri.rotaract3220@gmail.com', '$2y$10$FsPceuh60vSNeKkCHLauiOYXy6MJJF7rCKwSJ1KmqO41AWqwwR00G', 'Customer'),
(8, 'ab@gmail.com', '$2y$10$/o1kHEx44SFiw4uOpCBq2O/msm2WtFepJb1Wx3v3jDEb3.X58KZeG', 'Customer'),
(9, 'dinu@gmail.com', '$2y$10$kZnFqRb5Kt5V7c4ZybhzKuqVaxbJ7bIRTC9AxEGycQpdF.ZwilKVS', 'Customer'),
(12, 'abcd@gmail.com', '$2y$10$Z8U2GhM/TrehtEF3s1qT/OxJigMJmNyS6wkNLNnwKRCsj2JXddBeS', 'Customer'),
(13, 'sandami@gmail.com', '$2y$10$Ty5UGRS6QmGEJLcTkDkIHOeqJM8W5PnzVby3FNNy2uocTSGG9Hd5a', 'Customer'),
(14, 'senuri@gmail.com', '$2y$10$rMo9ihdsmKPBkBbZECfylOYT6zHUJaNuyPMX2vMKPD7WaZELYVyg2', 'Customer'),
(16, 'abcde@gmail.com', '$2y$10$V.7/2cgXv.No328Mek1fDOGJfvIu.SkW9xKMjhWp34oqVx2VEjG0y', 'Customer'),
(17, 'senuabc@gmail.com', '$2y$10$iRgY38UpnXCV7Fs/NaNe/Or6xQ3lyry174BQdeKx3ZL4Mg./OdDOq', 'Customer'),
(18, 'abcdef@gmail.com', '$2y$10$kjvew.hRz3a9mdyEsIPZCufSKSVKv9BS.BKElinCJ8Y9M7T9z1QPq', 'Customer'),
(19, 'kimuthu.rotaract3220@gmail.com', '$2y$10$Cgs2whul/LPursDDcQN8t.kHlE6pYtKND2hfzXkAHHnR0vTZYgMLC', 'Customer'),
(21, 'aaabc@gmail.com', '$2y$10$5jCCamRcX4CD2kzQzQnVXeEN79t2wmjBQ5qT2l3leoFzScuwXYhpK', 'Customer'),
(22, 'ib@gmail.com', '$2y$10$cA/G3y6cco/YpRrYD1pHOuX/Cw3mYHcw/KXtxNxbUKbwTsgmQJ2jq', 'Customer'),
(23, 'contractor@gmail.com', '$2y$10$sM0mgAmFM6mVkab99Cy9I.WLKo8nx3VhJ3ppR37mL/fqozqzhKSU2', 'Contractor'),
(24, 'wikum.rotaract3220@gmail.com', '$2y$10$yrz6KELWAlYlVAwp11DQr.hKJAcShWDD1o3LiWu/JsSMJDjPOO9nG', 'Customer'),
(25, 'aa@gmail.com', '$2y$10$a88DZLC2K2MMb3Bgg5ZG1udROO/zazi/.5yJzPLib4UqWQmhI6oVm', 'Customer'),
(26, 'senu@gmail.com', '$2y$10$FRuSVCK3PY51oSh8O8tTMunDKR/MUsWQcUIrKcYlb1elG33Zqv252', 'Customer'),
(27, '123bumblebee@gmail.com', '$2y$10$sGSMhxMs9DJLWwICpxvSs.TREf6gmvvHwXHyd3it1QZ5hTQzrsINu', 'Customer'),
(28, 'chathura1@gmail.com', '$2y$10$6dqRaz14uUlM9//q913AyOnOF4gdKcSTjRw2YU45yovgzXEX8LGh6', 'Customer'),
(29, 's@gmail.com', '$2y$10$rUyKL5hD8dDmFNiRTTv6le4gh.8.aAecmOl9SQKnqQ7nEjmMuDoSe', 'Salesperson'),
(30, 'admin@gmail.com', '$2y$10$uipQyK4iJdUZCYymf842hOOIRw0v27UBCtCxaZcQNm6KkQqtR3RZ6', 'Admin'),
(31, 'test1@gmail.com', '$2y$10$Y/dgJClvZJhYBwmVnWkBGuOUraByawzpgp41s1Gb.zHvcMjkBcna6', 'Engineer'),
(32, 'test2@gmail.com', '$2y$10$mjvvw35.qqyUtxjXrNVsBujh5GADclas4Z8ZnlKxDl7tbYbHLZ3Ty', 'engineer'),
(33, 'sp@gmail.com', '$2y$10$lnaprG2X7No88t1pv7tqLOlTV9FJxM0SBcln2z.cWoUk81cHLelP2', 'Salesperson'),
(34, 'danodya_s@yahoomail.com', '$2y$10$Jm3wgkbJct2t4i53im0GjOGaTLP06aIrJPyU8QhvVQtCwYPbfk1ye', 'Customer'),
(35, 'hrgo@gmail.com', '$2y$10$kNF6OX9P5uaGbXsFUTnGHur99.JKHunT0Dh3RRgymtXHh6lsL99tC', 'salesperson'),
(36, 'sgner@gmail.com', '$2y$10$TV4SC/hRWCxCu6AnoLD6/.P/akI4y28onUBuxEfIc1yLfbnxf1Bka', 'Customer'),
(37, 'sengu@gmail.com', '$2y$10$LA.DNTK44q6okJovltFwMeQl5IKLuL4Tlb1CNEFzesz.BkNUAwniC', 'Customer'),
(38, 'nethu@gmail.com', '$2y$10$wXOhO0DbMwIczQMuLkr27ez6tNgkhiYHADakKmPvqmHAOTi.VV.A.', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `warranty`
--

CREATE TABLE `warranty` (
  `Project_projectID` varchar(6) NOT NULL,
  `startDate` datetime NOT NULL,
  `duration` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`contractorID`);

--
-- Indexes for table `contractor_telno`
--
ALTER TABLE `contractor_telno`
  ADD PRIMARY KEY (`contractorID`,`telNum`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- Indexes for table `employee_telno`
--
ALTER TABLE `employee_telno`
  ADD PRIMARY KEY (`Employee_empID`),
  ADD UNIQUE KEY `telno_UNIQUE` (`telno`);

--
-- Indexes for table `engineer`
--
ALTER TABLE `engineer`
  ADD PRIMARY KEY (`EngineerID`),
  ADD KEY `fk_Engineer_Employee1_idx` (`EngineerID`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiryID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `Salesperson_Employee_empID` (`Salesperson_Employee_empID`),
  ADD KEY `Project_projectID` (`Project_projectID`);

--
-- Indexes for table `inquiry_message`
--
ALTER TABLE `inquiry_message`
  ADD PRIMARY KEY (`Inquiry_inquiryID`,`messageID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issueID`,`Project_projectID`),
  ADD KEY `fk_Issue_Project1_idx` (`Project_projectID`),
  ADD KEY `engineer_idx` (`userId`);

--
-- Indexes for table `modifiedpackage`
--
ALTER TABLE `modifiedpackage`
  ADD PRIMARY KEY (`projectID`),
  ADD KEY `basePackageID` (`basePackageID`);

--
-- Indexes for table `modifiedpackage_extra`
--
ALTER TABLE `modifiedpackage_extra`
  ADD PRIMARY KEY (`projectID`,`description`);

--
-- Indexes for table `modifiedpackage_product`
--
ALTER TABLE `modifiedpackage_product`
  ADD PRIMARY KEY (`projectID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `package_product`
--
ALTER TABLE `package_product`
  ADD PRIMARY KEY (`Package_packageID`,`Product_productID`),
  ADD KEY `fk_Package_Product_Product1_idx` (`Product_productID`);

--
-- Indexes for table `paymentreceipt`
--
ALTER TABLE `paymentreceipt`
  ADD PRIMARY KEY (`receiptID`,`Project_projectID`),
  ADD KEY `fk_PaymentReceipt_Project1_idx` (`Project_projectID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`),
  ADD KEY `fk_Project_Salesperson1_idx` (`Salesperson_Employee_empID`),
  ADD KEY `fk_Project_Package1_idx` (`Package_packageID`),
  ADD KEY `fk_project_customer1` (`customerID`);

--
-- Indexes for table `projectcontractor`
--
ALTER TABLE `projectcontractor`
  ADD PRIMARY KEY (`Project_projectID`,`Contractor_contractorID`),
  ADD KEY `fk_ProjectContractor_Contractor1_idx` (`Contractor_contractorID`);

--
-- Indexes for table `projectengineer`
--
ALTER TABLE `projectengineer`
  ADD PRIMARY KEY (`Project_projectID`,`Engineer_empID`),
  ADD KEY `fk_ProjectEngineer_Engineer1_idx` (`Engineer_empID`);

--
-- Indexes for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD PRIMARY KEY (`Employee_empID`);

--
-- Indexes for table `scheduleitem`
--
ALTER TABLE `scheduleitem`
  ADD PRIMARY KEY (`scheduleID`,`Project_projectID`),
  ADD KEY `fk_ScheduleItem_Project1_idx` (`Project_projectID`);

--
-- Indexes for table `scheduleitem_assignedcontr`
--
ALTER TABLE `scheduleitem_assignedcontr`
  ADD PRIMARY KEY (`Scheduleitem_scheduleID`,`contractorID`),
  ADD KEY `scheduleitem_assignedcontr_ibfk_3` (`contractorID`);

--
-- Indexes for table `scheduleitem_assignedemp`
--
ALTER TABLE `scheduleitem_assignedemp`
  ADD PRIMARY KEY (`ScheduleItem_scheduleID`,`UserID`),
  ADD KEY `EngineerID_idx` (`UserID`);

--
-- Indexes for table `scheduleitem_requestdates`
--
ALTER TABLE `scheduleitem_requestdates`
  ADD PRIMARY KEY (`Scheduleitem_scheduleID`,`requested_date`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockID`),
  ADD KEY `fk_Stock_Storekeeper1_idx` (`Storekeeper_Employee_empID`);

--
-- Indexes for table `stock_product`
--
ALTER TABLE `stock_product`
  ADD PRIMARY KEY (`Stock_stockID`,`Product_productID`),
  ADD KEY `fk_Stock_Product_Product1_idx` (`Product_productID`);

--
-- Indexes for table `storekeeper`
--
ALTER TABLE `storekeeper`
  ADD PRIMARY KEY (`Employee_empID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`Project_projectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentreceipt`
--
ALTER TABLE `paymentreceipt`
  MODIFY `receiptID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `scheduleitem`
--
ALTER TABLE `scheduleitem`
  MODIFY `scheduleID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user` FOREIGN KEY (`adminID`) REFERENCES `user` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `contractor`
--
ALTER TABLE `contractor`
  ADD CONSTRAINT `fk_contractor_employee` FOREIGN KEY (`contractorID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contractor_telno`
--
ALTER TABLE `contractor_telno`
  ADD CONSTRAINT `fk_contractor` FOREIGN KEY (`contractorID`) REFERENCES `contractor` (`contractorID`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk.Customer_User` FOREIGN KEY (`customerID`) REFERENCES `user` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_user` FOREIGN KEY (`empID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_telno`
--
ALTER TABLE `employee_telno`
  ADD CONSTRAINT `fk_employee` FOREIGN KEY (`Employee_empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE;

--
-- Constraints for table `engineer`
--
ALTER TABLE `engineer`
  ADD CONSTRAINT `fk_Engineer_Employee1_idx	` FOREIGN KEY (`EngineerID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE;

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `inquiry_ibfk_2` FOREIGN KEY (`Salesperson_Employee_empID`) REFERENCES `salesperson` (`Employee_empID`),
  ADD CONSTRAINT `inquiry_ibfk_3` FOREIGN KEY (`Project_projectID`) REFERENCES `project` (`projectID`);

--
-- Constraints for table `inquiry_message`
--
ALTER TABLE `inquiry_message`
  ADD CONSTRAINT `inquiry_message_ibfk_1` FOREIGN KEY (`Inquiry_inquiryID`) REFERENCES `inquiry` (`inquiryID`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `engineer_idx` FOREIGN KEY (`userId`) REFERENCES `engineer` (`EngineerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Issue_Project1` FOREIGN KEY (`Project_projectID`) REFERENCES `project` (`projectID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `modifiedpackage`
--
ALTER TABLE `modifiedpackage`
  ADD CONSTRAINT `modifiedpackage_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `project` (`projectID`),
  ADD CONSTRAINT `modifiedpackage_ibfk_2` FOREIGN KEY (`basePackageID`) REFERENCES `package` (`packageID`);

--
-- Constraints for table `modifiedpackage_extra`
--
ALTER TABLE `modifiedpackage_extra`
  ADD CONSTRAINT `modifiedpackage_extra_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `modifiedpackage` (`projectID`) ON DELETE CASCADE;

--
-- Constraints for table `modifiedpackage_product`
--
ALTER TABLE `modifiedpackage_product`
  ADD CONSTRAINT `modifiedpackage_product_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `modifiedpackage` (`projectID`) ON DELETE CASCADE,
  ADD CONSTRAINT `modifiedpackage_product_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `package_product`
--
ALTER TABLE `package_product`
  ADD CONSTRAINT `fk_Package_Product_Package1` FOREIGN KEY (`Package_packageID`) REFERENCES `package` (`packageID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Package_Product_Product1` FOREIGN KEY (`Product_productID`) REFERENCES `product` (`productID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paymentreceipt`
--
ALTER TABLE `paymentreceipt`
  ADD CONSTRAINT `fk_PaymentReceipt_Project1` FOREIGN KEY (`Project_projectID`) REFERENCES `project` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_Project_Package1` FOREIGN KEY (`Package_packageID`) REFERENCES `package` (`packageID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Project_Salesperson1` FOREIGN KEY (`Salesperson_Employee_empID`) REFERENCES `salesperson` (`Employee_empID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_project_customer1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE;

--
-- Constraints for table `projectcontractor`
--
ALTER TABLE `projectcontractor`
  ADD CONSTRAINT `fk_ProjectContractor_Contractor1_idx` FOREIGN KEY (`Contractor_contractorID`) REFERENCES `contractor` (`contractorID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ProjectContractor_Project1` FOREIGN KEY (`Project_projectID`) REFERENCES `project` (`projectID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projectengineer`
--
ALTER TABLE `projectengineer`
  ADD CONSTRAINT `fk_ProjectEngineer_Engineer1_idx` FOREIGN KEY (`Engineer_empID`) REFERENCES `engineer` (`EngineerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ProjectEngineer_Project1` FOREIGN KEY (`Project_projectID`) REFERENCES `project` (`projectID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD CONSTRAINT `fk_salesperson_employee` FOREIGN KEY (`Employee_empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE;

--
-- Constraints for table `scheduleitem`
--
ALTER TABLE `scheduleitem`
  ADD CONSTRAINT `fk_ScheduleItem_Project1` FOREIGN KEY (`Project_projectID`) REFERENCES `project` (`projectID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scheduleitem_assignedcontr`
--
ALTER TABLE `scheduleitem_assignedcontr`
  ADD CONSTRAINT `fk_contracctor_scheduleID` FOREIGN KEY (`Scheduleitem_scheduleID`) REFERENCES `scheduleitem` (`scheduleID`) ON DELETE CASCADE,
  ADD CONSTRAINT `scheduleitem_assignedcontr_ibfk_3` FOREIGN KEY (`contractorID`) REFERENCES `contractor` (`contractorID`) ON DELETE CASCADE;

--
-- Constraints for table `scheduleitem_assignedemp`
--
ALTER TABLE `scheduleitem_assignedemp`
  ADD CONSTRAINT `EngineerID_idx` FOREIGN KEY (`UserID`) REFERENCES `engineer` (`EngineerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ScheduleItem_AssignedEmp_ScheduleItem1` FOREIGN KEY (`ScheduleItem_scheduleID`) REFERENCES `scheduleitem` (`scheduleID`) ON DELETE CASCADE;

--
-- Constraints for table `scheduleitem_requestdates`
--
ALTER TABLE `scheduleitem_requestdates`
  ADD CONSTRAINT `scheduleitem_requestdates_ibfk_1` FOREIGN KEY (`Scheduleitem_scheduleID`) REFERENCES `scheduleitem` (`scheduleID`) ON DELETE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_storekeeper` FOREIGN KEY (`Storekeeper_Employee_empID`) REFERENCES `storekeeper` (`Employee_empID`) ON DELETE CASCADE;

--
-- Constraints for table `stock_product`
--
ALTER TABLE `stock_product`
  ADD CONSTRAINT `fk_Stock_Product_Product1` FOREIGN KEY (`Product_productID`) REFERENCES `product` (`productID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Stock_Product_Stock1` FOREIGN KEY (`Stock_stockID`) REFERENCES `stock` (`stockID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `storekeeper`
--
ALTER TABLE `storekeeper`
  ADD CONSTRAINT `fk_storekeeper_employee` FOREIGN KEY (`Employee_empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE;

--
-- Constraints for table `warranty`
--
ALTER TABLE `warranty`
  ADD CONSTRAINT `fk_Warranty_Project1` FOREIGN KEY (`Project_projectID`) REFERENCES `project` (`projectID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
