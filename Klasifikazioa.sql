
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2015 at 11:04 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u275359965_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `Klasifikazioa`
--

CREATE TABLE IF NOT EXISTS `Klasifikazioa` (
  `Taldea` text COLLATE utf8_unicode_ci NOT NULL,
  `Kodea` int(11) NOT NULL AUTO_INCREMENT,
  `Puntuak` int(11) NOT NULL,
  PRIMARY KEY (`Kodea`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Klasifikazioa`
--

INSERT INTO `Klasifikazioa` (`Taldea`, `Kodea`, `Puntuak`) VALUES
('Tottenham Hotspur', 1, 0),
('Mirandes', 2, 0),
('Steaua Bucuresti', 3, 0),
('Bayern Munchen', 4, 0),
('Borussia Monchengladbach', 5, 0),
('Merseyside Red', 6, 0),
('Marguaparrena', 7, 0),
('Ehrenhofstadt', 8, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
