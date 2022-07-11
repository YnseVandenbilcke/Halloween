-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 04, 2020 at 07:36 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Halloween`
--
CREATE DATABASE IF NOT EXISTS `Halloween` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Halloween`;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `ID` int(50) NOT NULL,
  `categorieNaam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID`, `categorieNaam`) VALUES
(1, 'rook'),
(2, 'masker'),
(3, 'pompoenen'),
(4, 'lampen'),
(5, 'skeletten'),
(6, 'schedels');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `Naam` varchar(50) NOT NULL,
  `Voornaam` varchar(50) NOT NULL,
  `geboortedatum` varchar(50) NOT NULL,
  `geslacht` varchar(1) NOT NULL,
  `paswoord` varchar(100) NOT NULL,
  `afbeelding` varchar(100) NOT NULL,
  `id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Naam`, `Voornaam`, `geboortedatum`, `geslacht`, `paswoord`, `afbeelding`, `id`) VALUES
('Proviste', 'Alain', '24/12/1944', 'm', '$2y$12$rEpdiReALA7OkZDzZ9Kuh.625BL0XyU7AKc9tSZTBU4JpfHFt6AZy', 'images/0.jpg', 2),
('Mentair', 'Rudi', '15/05/1999', 'm', '$2y$12$MDeiPxidmRvvlHwN7I1BUeTNzJgRlfTDYeX9ExmJjM1XgF6/DK6dm', 'images/1.jpg', 3),
('Schap', 'Greet', '08/11/1980', 'v', '$2y$12$dvqJZ0w6tTstE1rpigFvZuas4N2rV7.LIByUkAaOwTA17x3tAFKR6\r\n', 'images/2.jpg', 4),
('Laer', 'Marthe', '12/05/1968', 'v', '$2y$12$cVEHVITeknWPcyTVjiCUMOmN5/5rhY6gRffFp4qVpMcdg39Dfmylq\r\n', 'images/3.jpg', 5),
('Drooit', 'Ann', '19/02/1948', 'v', '$2y$12$PNxDXUXITSkJR/BKMS3NwuGhZVqXKqaNq9gaZerXulQxAi8aJ3f0u', 'images/4.jpg', 6),
('Zung', 'Sam', '16/10/1987', 'm', '$2y$12$1L6TMTiBrlxopCLVadheSeQwYoqVCcqiWsQMYWMOilDLttTEtkCxC', 'images/5.jpg', 7),
('Decrock', 'Odiel', '14/07/2000', 'm', '$2y$12$.qX4EZe./udShWkgDZiEA.ZH5AqYmFiIxnDlWYywcRmm8hdIwd08K\r\n', 'images/6.jpg', 8),
('Terieur', 'Alex', '18/02/1963', 'm', '$2y$12$xFCxAOFWhZ/2OLQeT.g9HuFsRjl4JIYCcQRas5sxXm1f.srEPf5Bi', 'images/7.jpg', 9),
('Daat', 'Candy', '20/07/1949', 'v', '$2y$12$AP8Ux3pQnaZS7owNVeRNa.9P0GSAkfTA5a1kvoN5zHlmRv8CS56bK', 'images/8.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `ID` int(255) NOT NULL,
  `titel` varchar(100) NOT NULL,
  `omschrijving` varchar(1000) NOT NULL,
  `kostprijs` varchar(100) NOT NULL,
  `afbeelding` varchar(100) NOT NULL,
  `catID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`ID`, `titel`, `omschrijving`, `kostprijs`, `afbeelding`, `catID`) VALUES
(1, 'Paarse rook', 'Deze rook is paars omdat ze niet geel is', '10', 'images/purplesmoke.jpg', 1),
(2, 'Masker', 'Eventjes een \'prank\' uithalen met je medestudenten? zet deze op!', '15', 'images/mask.jpg', 2),
(3, 'lampen', 'angstaanjagende lamp die je de stuipen op het lijf zal jagen!', '10', 'images/lamps.jpg', 4),
(5, 'Luster', 'Luster die je hoog aan het plafond moet hangen', '40', 'images/lights.jpg', 4),
(6, 'Schedel', 'Fantasie schedel die je kunt gebruiken om andere mensen de stuipen op het lijf te jagen', '38', 'images/skull.jpg', 6),
(7, 'skelet', 'schrikwekkend skelet \'fredje tskeletje\'', '56', 'images/skeleton.jpg', 5),
(8, 'Masker', 'Zwart masker, heeft niks met halloween te maken', '36', 'images/blackMask.jpg', 2),
(10, 'Skull', 'Deze speciale schedels groeien aan de bomen!', '49', 'images/skulls.jpg', 6),
(11, 'pompoen', 'pompoenen, zowel witte als oranje, koop snel', '4', 'images/pumpkins.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categorie` (`catID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `producten_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `categorie` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
