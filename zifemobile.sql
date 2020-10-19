-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 12:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zifemobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorizedusers`
--

CREATE TABLE `authorizedusers` (
  `id` int(11) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `emailAddress` varchar(25) NOT NULL,
  `phoneNum` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  `vkey` varchar(45) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `subscribed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorizedusers`
--

INSERT INTO `authorizedusers` (`id`, `userName`, `emailAddress`, `phoneNum`, `password`, `vkey`, `verified`, `subscribed`) VALUES
(1, 'Me', 'cszitwer@gmail.com', '3473702228', '2222', '82c2b858f5191dd2b0a3b6ca537c431b', 1, 0),
(2, 'Moshe Aaron Zitwer', 'moshezitwer@gmail.com', '3475630543', '9876', '0046cbbbf68b44fa0940ccae88e7ed33', 1, 0),
(3, 'Rivka', 'rzitwer@gmail.com', '7186277689', '1234', '58a1ebc4dc5522deaac55fca367b6a4a', 1, 0),
(99, 'Penina', 'peninaziegler@gmail.com', '3476794842', 'penina', 'd34913a456e98ae6cf38b341b4c0156e', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `customerID` int(11) NOT NULL,
  `phoneID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`customerID`, `phoneID`, `quantity`) VALUES
(1, 7, 1),
(1, 8, 1),
(1, 9, 2),
(2, 2, 1),
(2, 3, 1),
(3, 2, 1),
(3, 9, 1),
(3, 11, 4),
(99, 2, 1),
(99, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `phoneName` varchar(25) NOT NULL,
  `phoneType` varchar(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `inStock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `phoneName`, `phoneType`, `image`, `cost`, `inStock`) VALUES
(1, 'Kyocera Kona', 'Flip', 'ZifeMobilePhones/Kyocera%20Kona.png', '50', 50),
(2, 'Samsung Convoy Flip', 'Flip', 'ZifeMobilePhones/Samsung%20Convoy%20Flip.png', '50', 50),
(3, 'Samsung M370', 'Flip', 'ZifeMobilePhones/Samsung%20M370.png', '50', 50),
(4, 'LG Exalt VN360', 'Flip', 'ZifeMobilePhones/LG%20Exalt%20VN360.png', '50', 50),
(5, 'Coolpad Snap', 'Flip', 'ZifeMobilePhones/Coolpad%20Snap.png', '50', 50),
(6, 'LG Cosmos 2', 'Slider', 'ZifeMobilePhones/LG%20Cosmos%202.png', '60', 50),
(7, 'LG Cosmos 3', 'Slider', 'ZifeMobilePhones/LG%20Cosmos%203.png', '60', 50),
(8, 'LG Rumor 2', 'Slider', 'ZifeMobilePhones/LG%20Rumor%202.png', '60', 50),
(9, 'Samsung M570', 'Slider', 'ZifeMobilePhones/Samsung%20M570%20Restore.png', '60', 50),
(10, 'Samsung M575 Restore', 'Slider', 'ZifeMobilePhones/Samsung%20M575%20Restore.png', '60', 50),
(11, 'Samsung Seek M350', 'Slider', 'ZifeMobilePhones/Samsung%20Seek%20M350.png', '60', 50),
(12, 'Sanyo Innuendo', 'Slider', 'ZifeMobilePhones/Sanyo%20Innuendo.png', '60', 50),
(13, 'Sanyo Juno', 'Slider', 'ZifeMobilePhones/Sanyo%20Juno.png', '60', 50),
(14, 'Samsung Convoy 2', 'Flip', 'ZifeMobilePhones/Samsung%20Convoy%202.png', '50', 50),
(15, 'Rumor Reflex', 'Slider', 'ZifeMobilePhones/Rumor%20Reflex.png', '60', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorizedusers`
--
ALTER TABLE `authorizedusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`customerID`,`phoneID`),
  ADD KEY `phoneID` (`phoneID`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phoneName` (`phoneName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorizedusers`
--
ALTER TABLE `authorizedusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `authorizedusers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`phoneID`) REFERENCES `phones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
