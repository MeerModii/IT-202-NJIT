-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Oct 20, 2023 at 10:45 PM
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
-- Table structure for table `nuts`
--

CREATE TABLE IF NOT EXISTS `nuts` (
`nutID` int(11) NOT NULL,
  `nutCategoryID` int(11) NOT NULL,
  `nutCode` varchar(10) NOT NULL,
  `nutName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `nuts`
--

INSERT INTO `nuts` (`nutID`, `nutCategoryID`, `nutCode`, `nutName`, `description`, `price`, `dateAdded`) VALUES
(1, 1, '101', 'Almonds', 'Grown in California', 5.00, '2023-10-19 00:24:51'),
(2, 1, '102', 'Walnuts', 'Grown in China', 6.00, '2023-10-19 00:24:51'),
(3, 1, '103', 'Cashews', 'Grown in Brazil', 4.00, '2023-10-19 00:24:51'),
(4, 2, '104', 'Peanut1', 'Grown in California', 1.00, '2023-10-19 00:24:51'),
(5, 2, '105', 'Peanut2', 'Grown in China', 8.00, '2023-10-19 00:24:51'),
(6, 2, '106', 'Peanut3', 'Grown in Brazil', 3.00, '2023-10-19 00:24:51'),
(7, 3, '107', 'Seed1', 'Grown in California', 9.00, '2023-10-19 00:24:51'),
(8, 3, '108', 'Seed2', 'Grown in China', 2.00, '2023-10-19 00:24:51'),
(9, 3, '109', 'Seed3', 'Grown in Brazil', 3.00, '2023-10-19 00:24:51'),
(10, 4, '110', 'Macadamia1', 'Grown in California', 5.00, '2023-10-19 00:24:51'),
(11, 4, '111', 'Macadamia2', 'Grown in China', 0.99, '2023-10-19 00:24:51'),
(12, 4, '112', 'Macadamia3', 'Grown in Brazil', 1.00, '2023-10-19 00:24:51'),
(13, 5, '113', 'Pistachio1', 'Grown in California', 9.00, '2023-10-19 00:24:51'),
(14, 5, '114', 'Pistachio2', 'Grown in China', 0.99, '2023-10-19 00:24:51'),
(15, 5, '115', 'Pistachio3', 'Grown in Brazil', 8.00, '2023-10-19 00:24:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nuts`
--
ALTER TABLE `nuts`
 ADD PRIMARY KEY (`nutID`), ADD UNIQUE KEY `nutCode` (`nutCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nuts`
--
ALTER TABLE `nuts`
MODIFY `nutID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
