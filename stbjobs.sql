-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 17, 2025 at 03:24 AM
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
  `sentDate` datetime NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(8) NOT NULL,
  `datePosted` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
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
(15, 'Louis', 'Santos', 'Louisito', 'luoisito1234@gmail.com', '$2y$10$jOZ3ajwfI1/4VFi5eSsGWuvAI3DiIly7IrY0Jfnsf.c', 'user', 5);

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
(5, '', '', '', '', '', '', NULL, NULL, '');

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
  MODIFY `portfolioID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userInfoID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
