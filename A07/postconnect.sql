-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 09:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `addressID` int(11) NOT NULL,
  `cityID` int(11) NOT NULL,
  `provinceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`addressID`, `cityID`, `provinceID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 1, 1),
(6, 5, 4),
(7, 5, 4),
(8, 7, 6),
(9, 7, 6),
(10, 8, 7),
(11, 9, 1),
(12, 9, 1),
(13, 9, 1),
(14, 9, 1),
(15, 9, 1),
(16, 7, 6),
(17, 10, 8),
(18, 10, 8),
(19, 10, 8),
(20, 10, 8),
(21, 10, 8),
(22, 10, 8),
(23, 10, 8),
(24, 10, 8),
(36, 11, 1),
(37, 11, 1),
(38, 4, 3),
(39, 7, 10),
(40, 7, 6),
(41, 2, 2),
(42, 7, 6),
(43, 7, 6),
(44, 7, 11),
(45, 8, 7),
(46, 9, 1),
(47, 5, 4),
(48, 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityID` int(15) NOT NULL,
  `cityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityID`, `cityName`) VALUES
(1, 'Makati City'),
(2, 'Calamba City'),
(3, 'Lipa City'),
(4, 'Talisay'),
(5, 'Iloilo City'),
(6, 'Iloilo City'),
(7, 'Cebu City'),
(8, 'Davao City'),
(9, 'Quezon City'),
(10, 'Bacolod City'),
(11, 'Taguig City'),
(12, 'Zamboanga City'),
(13, 'General Santos City');

-- --------------------------------------------------------

--
-- Table structure for table `closefriends`
--

CREATE TABLE `closefriends` (
  `closeFriendID` int(15) NOT NULL,
  `ownerID` int(15) NOT NULL,
  `userID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(15) NOT NULL,
  `dateTime` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `userID` int(15) NOT NULL,
  `postID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friendID` int(15) NOT NULL,
  `requesterID` int(15) NOT NULL,
  `requesteeID` int(15) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gcmembers`
--

CREATE TABLE `gcmembers` (
  `gcMemberID` int(15) NOT NULL,
  `gcID` int(15) NOT NULL,
  `userID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupchats`
--

CREATE TABLE `groupchats` (
  `gcID` int(15) NOT NULL,
  `adminID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(15) NOT NULL,
  `senderID` int(15) NOT NULL,
  `receiverID` int(15) NOT NULL,
  `gcID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `content` varchar(50) NOT NULL,
  `dateTime` varchar(50) NOT NULL,
  `privacy` varchar(50) NOT NULL,
  `isDeleted` varchar(50) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `cityID` int(15) NOT NULL,
  `provinceID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `provinceID` int(15) NOT NULL,
  `provinceName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`provinceID`, `provinceName`) VALUES
(1, 'Metro Manila'),
(2, 'Laguna'),
(3, 'Batangas'),
(4, 'Iloilo'),
(5, 'Iloilo'),
(6, 'Cebu'),
(7, 'Davao del Sur'),
(8, 'Negros Occidental'),
(9, 'Zamboanga del Sur'),
(11, ' Cebu'),
(12, ' South Cotabato');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `reactionID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `postID` int(15) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `commentID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userInfoID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `addressID` int(15) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `birthDate` varchar(50) NOT NULL,
  `contactNumber` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userInfoID`, `userID`, `addressID`, `lastName`, `firstName`, `birthDate`, `contactNumber`) VALUES
(5, 5, 2, 'Davis', 'Emma', '2000-02-14', '0952-456-7890'),
(7, 7, 1, 'Martinez', 'Oliver', '1999-09-29', '0917-567-8901'),
(46, 26, 36, 'Mendoza', 'Angelica ', '1996-06-21', '0914-639-8725'),
(48, 28, 38, 'Suarez', 'Denise Gabrielle', '2004-08-03', '0985-215-6523'),
(54, 34, 44, 'Torres', ' Alexa Marie', '1989-12-07', '0917-654-7890'),
(55, 35, 45, ' Cruz', 'Nathaniel', '2012-11-16', '0928-345-8765'),
(57, 37, 47, ' Rivera', 'Kristine Anne', '2024-11-20', '0906-123-4567');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(15) NOT NULL,
  `messageID` int(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `messageID`, `username`, `email`, `password`) VALUES
(1, 0, 'ethancarter', 'ethancarter@email.com', 'ethancarter123'),
(2, 0, 'avajohnson', 'avajohnson@email.com', 'avajohnson123'),
(3, 0, 'miathompson', 'miathompson@email.com', 'miathompson123'),
(4, 0, 'emilyjohnson', 'emilyjohnson@email.com', 'emily123'),
(5, 0, 'emz14', 'emmadavis@email.com', 'emmadavis123'),
(6, 0, 'avagarcia', 'avagarcia@email.com', 'avagarcia123'),
(7, 0, 'itsmeoliver', 'olivermartinez@email.com', 'olivermartinez123'),
(8, 0, 'sophiabrown', 'sophiabrown@email.com', 'sophiabrown123'),
(9, 0, 'noahwilson', 'noahwilson@email.com', 'noahwilson123'),
(26, 0, 'itsmeangel', 'angelicamendoza@email.com', 'angel123'),
(28, 0, 'dgms', 'sdenisegabrielle@email.com', 'postconnect123'),
(30, 0, 'andreadump', 'andreadump@email.com', 'andreadump123'),
(31, 0, 'itsmejadieruu', 'austinebernardo8104@gmail.com', 'anlaki123'),
(32, 0, 'carlmendez', 'carlmendez@email.com', 'carlmendez123'),
(33, 0, 'marsantos', 'mariasantos@gmail.com', 'maria123'),
(34, 0, 'alexatorres123', 'alexamarie.torres@gmail.com', ' alexatorres123'),
(35, 0, 'nathaniel16', 'nathan.cruz09@yahoo.com', 'natecruz09'),
(36, 0, ' bianca.mendoza23', 'bmae.mendoza23@gmail.com', ' bianca.mendoza23'),
(37, 0, 'kristine.rivz17', 'kristine.rivz17@gmail.com', 'kristine.rivz17'),
(38, 0, 'danielgonz91', 'dan.gonzales91@protonmail.com', 'danielgonz91');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `closefriends`
--
ALTER TABLE `closefriends`
  ADD PRIMARY KEY (`closeFriendID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friendID`);

--
-- Indexes for table `gcmembers`
--
ALTER TABLE `gcmembers`
  ADD PRIMARY KEY (`gcMemberID`);

--
-- Indexes for table `groupchats`
--
ALTER TABLE `groupchats`
  ADD PRIMARY KEY (`gcID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`provinceID`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`reactionID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userInfoID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `closefriends`
--
ALTER TABLE `closefriends`
  MODIFY `closeFriendID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friendID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gcmembers`
--
ALTER TABLE `gcmembers`
  MODIFY `gcMemberID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupchats`
--
ALTER TABLE `groupchats`
  MODIFY `gcID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `provinceID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `reactionID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userInfoID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
