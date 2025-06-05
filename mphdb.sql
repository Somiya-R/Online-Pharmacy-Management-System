-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Dec 28, 2023 at 09:04 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rcfdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `aID` int(11) NOT NULL,
  `aPass` varchar(255) NOT NULL,
  `aName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `aID`, `aPass`, `aName`) VALUES
(1, 1000, '123', 'Azeem');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cNIC` varchar(100) NOT NULL,
  `cName` varchar(255) NOT NULL,
  `cPass` varchar(255) NOT NULL,
  `cAddress` varchar(255) NOT NULL,
  `cEmail` varchar(255) NOT NULL,
  `cPhone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cNIC`, `cName`, `cPass`, `cAddress`, `cEmail`, `cPhone`) VALUES
('123456789v', 'Jhon', '123', 'Fisheries street', 'admin@example.com', 761234567),
('961524945v', 'Azeem', '1234', 'Batticaloa', 'azm@gmail.com', 771234567);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `iCode` varchar(255) NOT NULL,
  `iName` varchar(255) NOT NULL,
  `iType` varchar(255) NOT NULL,
  `iExp` date NOT NULL,
  `iPrice` int(11) NOT NULL,
  `iAmount` int(11) NOT NULL,
  `iCompany` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iCode`, `iName`, `iType`, `iExp`, `iPrice`, `iAmount`, `iCompany`) VALUES
('A1234', 'Panadol', 'Tablet', '2026-06-10', 35, 50, 'ABC pvt Ltd.'),
('A1235', 'One Alpha', 'Tablet', '2024-11-23', 120, 30, 'AZM pvt Ltd.');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mID` int(11) NOT NULL,
  `mName` varchar(255) NOT NULL,
  `mPass` varchar(255) NOT NULL,
  `mGender` varchar(25) NOT NULL,
  `mEmail` varchar(255) NOT NULL,
  `mPhone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mID`, `mName`, `mPass`, `mGender`, `mEmail`, `mPhone`) VALUES
(1111, 'Manager 01', '123', 'M', 'manager@gmail.com', 771234567);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `cNIC` varchar(255) NOT NULL,
  `pFile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`cNIC`, `pFile`) VALUES
('961524945v', 'frontpage.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cNIC`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iCode`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
