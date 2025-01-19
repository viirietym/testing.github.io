-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 19, 2025 at 01:52 PM
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
-- Database: `stbjobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationform`
--

CREATE TABLE `applicationform` (
  `applicationFormID` int(8) NOT NULL,
  `employeeResume` varchar(300) NOT NULL,
  `firstAnswer` varchar(3000) NOT NULL,
  `secondAnswer` varchar(3000) NOT NULL,
  `isAccepted` tinyint(1) NOT NULL,
  `sentDate` datetime NOT NULL DEFAULT current_timestamp(),
  `userID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `helpID` int(8) NOT NULL,
  `shortDescription` varchar(100) NOT NULL,
  `longDescription` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobdetail`
--

CREATE TABLE `jobdetail` (
  `jobDetailID` int(10) NOT NULL,
  `jobLocation` varchar(300) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `salaryRate` varchar(50) NOT NULL,
  `experienceLevel` varchar(50) NOT NULL,
  `jobIndustry` varchar(50) NOT NULL,
  `fullDescription` varchar(3000) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `jobSkillsDescription` varchar(1000) NOT NULL,
  `letterID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE `letter` (
  `letterID` int(8) NOT NULL,
  `letterContent` varchar(2000) NOT NULL,
  `userID` int(8) NOT NULL,
  `isRead` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolioID` int(8) NOT NULL,
  `projectImage` varchar(300) NOT NULL,
  `projectTitle` varchar(300) NOT NULL,
  `userInfoID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolioID`, `projectImage`, `projectTitle`, `userInfoID`) VALUES
(1, '678bbb1ed4324_PUPFlight.png', 'FlyQuest', 6),
(2, '678bbd0904de9_test.png', 'Slime', 7),
(3, '678bbd0905884_regio_vectorposter.png', 'Blue', 7),
(4, '678bbf1f468e2_RZbrand.png', 'Brand', 8),
(5, '678bbf1f472cc_regio_character.png', 'Sprite', 8),
(6, '678bd07f8a168_RZbrand.png', 'Brand', 9),
(7, '678cc9c40a6e7_Screenshot_2025-01-18_015930-removebg-preview.png', 'Testing', 10),
(8, '678cc9c40b2fd_Screenshot_2025-01-18_024621-removebg-preview.png', 'Branding Test', 10),
(9, '678ccbbc2cdc0_Private_Mask.png', 'test', 11),
(10, '678cd2633790f_On My Way.jpg', 'Clouds', 13),
(11, '678cd263388e0_Call of the Night.jpg', 'Blue', 13),
(12, '678cd263395f8_Walk through the Night.jpg', 'Park', 13);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(8) NOT NULL,
  `datePosted` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `userID` int(8) NOT NULL,
  `jobDetailID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(8) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(8) NOT NULL,
  `userInfoID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `username`, `email`, `password`, `role`, `userInfoID`) VALUES
(16, 'Mark', 'Ilawod', 'markWod', 'markWod@gmail.com', '1234', 'user', 6),
(17, 'Roland', 'Regio', 'rightontrack', 'regioroland011@gmail.com', '2366', 'user', 7),
(18, 'Louis', 'Santos', 'Louisito', 'luoisito1234@gmail.com', '1234', 'user', 8),
(19, 'Bryan', 'Reaño', 'brycode', 'brycode@gmail.com', '1234', 'user', 9),
(20, 'Jojo', 'Malabanan', 'JojoMan', 'JojoMan@gmail.com', '1234', 'user', 10),
(21, 'Rejoice', 'Rabino', 'rej0202@gmail.com', 'rej@gmail.com', '1234', 'user', 11),
(23, 'Stephen', 'Galarrita', 'jsnot', 'jsnot@gmail.com', '1234', 'user', 13),
(24, 'Mark', 'Ilawod', 'markWod', 'markWod@gmail.com', '1234', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userInfoID` int(8) NOT NULL,
  `userProfileImage` varchar(300) NOT NULL,
  `userBio` varchar(300) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `userDescription` varchar(3000) NOT NULL,
  `contactDetails` varchar(3000) NOT NULL,
  `educationalDetails` varchar(3000) NOT NULL,
  `employmentHistoryDetails` varchar(3000) DEFAULT NULL,
  `certificationDetails` varchar(3000) DEFAULT NULL,
  `skillDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userInfoID`, `userProfileImage`, `userBio`, `jobTitle`, `userDescription`, `contactDetails`, `educationalDetails`, `employmentHistoryDetails`, `certificationDetails`, `skillDescription`) VALUES
(6, '678bbb12f35a4_test.png', 'An american', 'QA', 'A 3rd year NSTP Harvard Student', '983432123', 'Harvard University 2022-2026', 'None', 'NC2', 'QA lang'),
(7, '678bbcdcc8c3a_Pup 1 crop.jpg', 'I am a Filipino', 'WEB DEVELOPER | QA', 'A 3rd Year BSIT Student', '09668740452', 'PUPSTC 2022-2026', '', '', 'Back End and Front End Capable'),
(8, '678bbeff3b3de_20230509_162035.jpg', 'I am pinoy', 'Web developer', 'A 3rd Year BSIT Student', '09999999999', 'PUPSTC 2022-2026', 'NA', '', 'Back End Front End Capable'),
(9, '678bd06d26593_test.png', 'I am a Filipino', 'Web Developer', 'A 3rd BSIT Student', '09668740452', 'PUPSTC 2022-2026', '', '', 'Back End\r\nFront End'),
(10, '678cc99aa1b11_Private_Mask.png', 'I am Pinoy bruh', 'Web Developer | Dev Ops', 'I am a 3rd Year BSIT Student', '09090909909', 'PUPSTC 2022-2026\r\n', '', '', 'Back And Front \r\nBehind And Ahead'),
(11, '678ccba6ed138_Find_Issue.png', 'I am pinoy kasi', 'Web Developer ', 'I am a 3rd Year BSIT Student', '090909111', 'PUPSTC', '', '', 'Back to Back\r\nFront to Front'),
(13, '678cd22ca9589_Lights up.jpg', 'I am pinoy bruh', 'Web Developer', 'A 3rd Year BSIT Student', '0909090909092', 'PUPSTC 22-26', '', '', 'Back to Front');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationform`
--
ALTER TABLE `applicationform`
  ADD PRIMARY KEY (`applicationFormID`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`helpID`);

--
-- Indexes for table `jobdetail`
--
ALTER TABLE `jobdetail`
  ADD PRIMARY KEY (`jobDetailID`);

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`letterID`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userInfoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicationform`
--
ALTER TABLE `applicationform`
  MODIFY `applicationFormID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `helpID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobdetail`
--
ALTER TABLE `jobdetail`
  MODIFY `jobDetailID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `letterID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userInfoID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
