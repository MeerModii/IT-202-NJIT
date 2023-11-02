-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 02, 2023 at 03:15 PM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mnm23`
--

-- --------------------------------------------------------

--
-- Table structure for table `nutCategory`
--

CREATE TABLE IF NOT EXISTS `nutCategory` (
`nutCategoryID` int(11) NOT NULL,
  `nutCategoryName` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nutCategory`
--

INSERT INTO `nutCategory` (`nutCategoryID`, `nutCategoryName`, `dateAdded`) VALUES
(1, 'TreeNut', '2023-10-18 23:39:45'),
(2, 'Peanut', '2023-10-18 23:39:45'),
(3, 'Seed', '2023-10-18 23:39:45'),
(4, 'Macadamia', '2023-10-18 23:39:45'),
(5, 'Pistachio', '2023-10-18 23:39:45'),
(6, 'Pine', '2023-10-18 23:39:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nutCategory`
--
ALTER TABLE `nutCategory`
 ADD PRIMARY KEY (`nutCategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nutCategory`
--
ALTER TABLE `nutCategory`
MODIFY `nutCategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
