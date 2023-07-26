-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 09:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms project`
--

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
  `userid` varchar(20) NOT NULL,
  `propid` int(11) NOT NULL,
  `dtype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`userid`, `propid`, `dtype`) VALUES
('K_101', 42316875, 'Sale'),
('K_101', 45263179, 'Rent'),
('K_102', 32457695, 'Sale'),
('K_28', 15698562, 'Rent'),
('K_28', 89634721, 'Sale'),
('Sha_194', 89641276, 'Rent');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propid` int(11) NOT NULL,
  `proptype` varchar(20) NOT NULL,
  `paddress` varchar(50) NOT NULL,
  `pcity` varchar(20) NOT NULL,
  `pstate` varchar(20) NOT NULL,
  `pcountry` varchar(20) NOT NULL,
  `ppin` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `propdesc` varchar(255) NOT NULL,
  `furnish` varchar(50) DEFAULT NULL,
  `floorspace` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propid`, `proptype`, `paddress`, `pcity`, `pstate`, `pcountry`, `ppin`, `price`, `propdesc`, `furnish`, `floorspace`) VALUES
(15698562, '1BHK', '19,4th cross,Vijayanagar', 'Bangalore', 'Karnataka', 'India', 560001, 18000, 'This is an apartment with water, electricity and many more facilities.', 'Semi Furnished', 0),
(32457695, '2BHK', '18,8th cross,JP nagar', 'Chennai', 'Tamil Nadu', 'India', 600002, 3600000, 'On Demand!', '', 1200),
(42316875, '1RK', '4th main,3rd cross, Aliabad', 'Hyderabad', 'Telangana', 'India', 500015, 1200000, 'Property for Sale and price is negotiable!', '', 900),
(45263179, '2BHK', '16,1st main, JP nagar', 'Bangalore', 'Karnataka', 'India', 560076, 16000, 'Apartment for Rent!', 'Non Furnished', 0),
(89634721, '2BHK', '16,1st main, Staff colony', 'Mumbai', 'Maharashtra', 'India', 400029, 4600000, 'This is great apartment with great neighborhood!', '', 2400),
(89641276, '2BHK', '14,6th cross,kslayout', 'Bangalore', 'Karnataka', 'India', 560078, 14000, 'This is a fully furnished apartment with all the facilities!', 'Fully Furnished', 0);

-- --------------------------------------------------------

--
-- Table structure for table `propimages`
--

CREATE TABLE `propimages` (
  `propid` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propimages`
--

INSERT INTO `propimages` (`propid`, `images`) VALUES
(15698562, '1.jpg'),
(15698562, 'bed-1-1.jpg'),
(15698562, 'kitchen-1-1.jpg'),
(15698562, 'liv-1-1.jpg'),
(32457695, '4.jpg'),
(32457695, 'bed-4-1.jpg'),
(32457695, 'bed-4-2.jpg'),
(32457695, 'kitchen-4-1.jpg'),
(32457695, 'liv-7-1.jpg'),
(42316875, 'bed-2-2-1660591646.jpg'),
(42316875, 'kitchen-3-1.jpg'),
(45263179, 'bed-5-2.jpg'),
(45263179, 'bed-6-1.jpg'),
(45263179, 'kitchen-6-1.jpg'),
(45263179, 'liv-5-1.jpg'),
(45263179, 'liv-7-2.jpg'),
(45263179, 'rowan-heuvel-bjej8BY1JYQ-unsplash.jpg'),
(89634721, '2.jpg'),
(89634721, 'bed-2-1.jpg'),
(89634721, 'bed-2-2.jpg'),
(89634721, 'kitchen-2-1.jpg'),
(89634721, 'liv-2-2.jpg'),
(89641276, '3.jpg'),
(89641276, 'bed-3-1.jpg'),
(89641276, 'kitchen-3-1-1660592190.jpg'),
(89641276, 'liv-2-2-1660592190.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phno` bigint(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `userid`, `email`, `password`, `phno`, `address`, `city`, `state`, `country`) VALUES
('Kausthub', 'K_101', 'kausthubAM@gmail.com', '12345', 9856123457, '16,4th Cross,KS layout', 'Bangalore', 'Karnataka', 'India'),
('Kaviraj Sh', 'K_102', 'kaviraj102@gmail.com', '123', 5648469885, '18,16thcross,JP nagar', 'Bangalore', 'Karnataka', 'India'),
('Kishore Aradhya', 'K_28', 'kishorearadhya28@gmail.com', '12345', 8951881946, 'No 13,3rd Cross,Vijaynagar', 'Bangarpet', 'Karnataka', 'India'),
('Sharan K M', 'shar_96', 'sharan96@gmail.com', '123', NULL, NULL, NULL, NULL, NULL),
('Shashank M R', 'Sha_194', 'shashank194@gmail.com', '123', 9448024384, '186,1st cross,rajkumar road', 'Chintamani', 'Karnataka', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `viewed`
--

CREATE TABLE `viewed` (
  `propid` int(11) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewed`
--

INSERT INTO `viewed` (`propid`, `userid`, `date_time`) VALUES
(15698562, 'K_102', '2022-08-16 01:11:09'),
(42316875, 'K_28', '2022-08-16 01:14:55'),
(15698562, 'K_101', '2022-08-16 01:20:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owns`
--
ALTER TABLE `owns`
  ADD PRIMARY KEY (`userid`,`propid`),
  ADD KEY `rent_ibfk_2` (`propid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propid`);

--
-- Indexes for table `propimages`
--
ALTER TABLE `propimages`
  ADD PRIMARY KEY (`propid`,`images`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `viewed`
--
ALTER TABLE `viewed`
  ADD PRIMARY KEY (`date_time`),
  ADD KEY `viewed_ibfk_1` (`propid`),
  ADD KEY `viewed_ibfk_2` (`userid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `owns`
--
ALTER TABLE `owns`
  ADD CONSTRAINT `owns_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE,
  ADD CONSTRAINT `owns_ibfk_2` FOREIGN KEY (`propid`) REFERENCES `property` (`propid`) ON DELETE CASCADE;

--
-- Constraints for table `propimages`
--
ALTER TABLE `propimages`
  ADD CONSTRAINT `propimages_ibfk_1` FOREIGN KEY (`propid`) REFERENCES `property` (`propid`) ON DELETE CASCADE;

--
-- Constraints for table `viewed`
--
ALTER TABLE `viewed`
  ADD CONSTRAINT `viewed_ibfk_1` FOREIGN KEY (`propid`) REFERENCES `property` (`propid`) ON DELETE CASCADE,
  ADD CONSTRAINT `viewed_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
