-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 06:13 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userID`, `firstName`, `lastName`, `password`, `email`, `username`, `role`) VALUES
(3, 'bob', 'brown', '$2y$10$loy5f05nqN8aM8UDrJ99dO7l9jcjdqnbt1vv5wwGB22bpCuQPJbPi', 'bob@brown.com', 'bob', 'user'),
(5, 'zachary3', 'cauchi', '$2y$10$ufRcY9fLz1Qdw58zVASkE.dnDG60uY4R.no6d3iuGQGDmNpBx3i4e', 'zacharycauchi@mail.com', 'zachary4', 'user'),
(7, 'adminFirstName', 'adminLastName', '$2y$10$5CABif1ygNjl2qXGtZS3CuGnrHVj8GnzbKefsDAgAZMT/.IcYri7i', 'admin@admin.com', 'admin', 'admin'),
(8, 'a', 'a', '$2y$10$lc05QJmYrM2ay.StM/szEuiULkLHp8TdTmSgE3LSlywIHWTiBJBHu', 'a', 'a', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
