-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 08, 2024 at 08:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `klantid` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefoon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`klantid`, `naam`, `email`, `telefoon`) VALUES
(1, 'marouane', 'eljaghnounimarouane@gmail.com', '943287t6284'),
(2, 'zarzour', '48', '666'),
(5, 'mohamed', 'MOHAMED@GMAIL.COM', '06777777777'),
(6, 'fadili', 'ya390bi@gmail.com', '9'),
(7, 'moha', 'MOHAMED@GMAIL.COM', 'aghyor');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `productid` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `prijs` decimal(10,2) DEFAULT NULL,
  `beschrijving` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`productid`, `naam`, `prijs`, `beschrijving`) VALUES
(9, 'marouane', '1000.00', 'p'),
(10, 'zarzour', '99999999.99', 'snel (48km)');

-- --------------------------------------------------------

--
-- Table structure for table `rekeningen`
--

CREATE TABLE `rekeningen` (
  `rekeningid` int(45) NOT NULL,
  `reserveringid` int(45) DEFAULT NULL,
  `productid` int(45) DEFAULT NULL,
  `omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekeningen`
--

INSERT INTO `rekeningen` (`rekeningid`, `reserveringid`, `productid`, `omschrijving`) VALUES
(1, 6, 9, '1'),
(2, 7, 10, 'goede kwaliteit ');

-- --------------------------------------------------------

--
-- Table structure for table `reservering`
--

CREATE TABLE `reservering` (
  `reserveringid` int(45) NOT NULL,
  `begindatum` datetime DEFAULT NULL,
  `einddatum` datetime DEFAULT NULL,
  `klantid` int(45) DEFAULT NULL,
  `tafelid` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservering`
--

INSERT INTO `reservering` (`reserveringid`, `begindatum`, `einddatum`, `klantid`, `tafelid`) VALUES
(6, '2024-03-09 00:00:00', '2024-03-16 00:00:00', 2, 2),
(7, '2024-03-10 00:00:00', '2024-03-17 00:00:00', 6, 2),
(8, '2024-03-10 00:00:00', '2024-03-31 00:00:00', 6, 2),
(9, '2024-03-07 00:00:00', '2024-04-12 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `tafelid` int(45) NOT NULL,
  `tafelnummer` int(45) DEFAULT NULL,
  `stoelen` int(45) DEFAULT NULL,
  `grootte` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`tafelid`, `tafelnummer`, `stoelen`, `grootte`) VALUES
(1, 3, 6, 'large'),
(2, 13, 12, 'xx large'),
(3, 7, 20, 'xxxxxlarge'),
(4, 99, 20, 'xxxxxlarge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantid`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `rekeningen`
--
ALTER TABLE `rekeningen`
  ADD PRIMARY KEY (`rekeningid`),
  ADD KEY `rekeningen_ibfk_2` (`productid`),
  ADD KEY `rekeningen_ibfk_3` (`reserveringid`);

--
-- Indexes for table `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`reserveringid`),
  ADD KEY `reservering_ibfk_1` (`klantid`),
  ADD KEY `reservering_ibfk_2` (`tafelid`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`tafelid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rekeningen`
--
ALTER TABLE `rekeningen`
  MODIFY `rekeningid` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservering`
--
ALTER TABLE `reservering`
  MODIFY `reserveringid` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `tafelid` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekeningen`
--
ALTER TABLE `rekeningen`
  ADD CONSTRAINT `rekeningen_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `producten` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekeningen_ibfk_3` FOREIGN KEY (`reserveringid`) REFERENCES `reservering` (`reserveringid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservering`
--
ALTER TABLE `reservering`
  ADD CONSTRAINT `reservering_ibfk_1` FOREIGN KEY (`klantid`) REFERENCES `klanten` (`klantid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservering_ibfk_2` FOREIGN KEY (`tafelid`) REFERENCES `restaurant` (`tafelid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
