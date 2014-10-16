-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 16 okt 2014 kl 13:31
-- Serverversion: 5.6.12-log
-- PHP-version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `akamed`
--
CREATE DATABASE IF NOT EXISTS `akamed` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `akamed`;

-- --------------------------------------------------------

--
-- Tabellstruktur `favoriter`
--

CREATE TABLE IF NOT EXISTS `favoriter` (
  `Fid` int(11) NOT NULL AUTO_INCREMENT,
  `Aid` int(11) NOT NULL,
  `Rid` int(11) NOT NULL,
  PRIMARY KEY (`Fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `resa`
--

CREATE TABLE IF NOT EXISTS `resa` (
  `Rid` int(11) NOT NULL AUTO_INCREMENT,
  `startLat` text NOT NULL,
  `startLong` text NOT NULL,
  `endLat` text NOT NULL,
  `endLong` text NOT NULL,
  `datum` varchar(20) NOT NULL,
  `platser` int(11) NOT NULL,
  `beskrivning` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `till` varchar(30) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `fran` varchar(30) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `Aid` int(11) NOT NULL,
  PRIMARY KEY (`Rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumpning av Data i tabell `resa`
--

INSERT INTO `resa` (`Rid`, `startLat`, `startLong`, `endLat`, `endLong`, `datum`, `platser`, `beskrivning`, `till`, `fran`, `Aid`) VALUES
(90, '57.70863259999999', '11.974693500000058', '56.6743775', '12.858217200000013', '2014-10-15', 5, 'hej', 'Halmstad', 'Göteborg', 1),
(91, '57.3554934', '14.475631600000042', '57.70863259999999', '11.974693500000058', '2014-10-24', 5, 'Hejsan', 'Göteborg', 'Vrigstad', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Aid` int(11) NOT NULL AUTO_INCREMENT,
  `Fnamn` varchar(25) NOT NULL,
  `Enamn` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `tele` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`Aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`Aid`, `Fnamn`, `Enamn`, `Email`, `tele`, `password`) VALUES
(1, 'Test', 'Romhagen', 'test@mail.se', '07333333', 'password');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
