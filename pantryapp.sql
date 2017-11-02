-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 11:41 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pantryapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `savedrecipes`
--

CREATE TABLE `savedrecipes` (
  `savedRecipePK` int(11) NOT NULL,
  `savedRecipeId` int(11) NOT NULL,
  `timeAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savedrecipes`
--

INSERT INTO `savedrecipes` (`savedRecipePK`, `savedRecipeId`, `timeAdded`, `userID`) VALUES
(4, 931994, '2017-10-26 10:13:34', 1),
(5, 663825, '2017-10-26 10:13:34', 1),
(6, 932370, '2017-10-26 10:13:37', 1),
(7, 622594, '2017-10-27 11:09:38', 1),
(8, 557421, '2017-10-27 11:12:26', 4),
(9, 557356, '2017-10-27 11:12:27', 4),
(10, 622594, '2017-10-27 11:50:57', 4);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `profileImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userID`, `firstName`, `lastName`, `password`, `email`, `username`, `role`, `profileImage`) VALUES
(1, 'b', 'a', '$2y$10$fxXQY1vPthjfBwIg9pKRLe6AILHP3TjSovi3wjH0NIxVACDs0V1Qe', 'a', 'a', 'user', ''),
(2, 'b', 'b', '$2y$10$GXhsAP3whZ.J.qqbjQ6jaOvhwfwaZnigzolFBE8Nsm8BQLXgX9/fq', 'b', 'b', 'user', ''),
(4, 'z', 'z', '$2y$10$8ijibQjG66NA5fRqmMALduv2bXsxdIG.sm2q8REJY8brYwk2dv3Um', 'z', 'z', 'user', ''),
(5, 'Zachary', 'Cauchi', '$2y$10$qORqUcJLdKhFo.e6Il2xiOVichf.raVQeaajcINMczSVCRwidYMwe', 'Thatzacharycauchi@gmail.com', 'thatzachary', 'user', ''),
(18, 'Zachary', 'Samson', '$2y$10$COiplkS8TKAJptMwK1XPkuAMTWbcmkrFrBgG97K7JeYmL1WX61aAC', 'Sam@sam.com', 'Sam', 'user', '1509466450.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `savedrecipes`
--
ALTER TABLE `savedrecipes`
  ADD PRIMARY KEY (`savedRecipePK`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `savedrecipes`
--
ALTER TABLE `savedrecipes`
  MODIFY `savedRecipePK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `savedrecipes`
--
ALTER TABLE `savedrecipes`
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `userdetails` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
