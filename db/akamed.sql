-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 13 okt 2014 kl 10:31
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `akamed`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `användare`
--

CREATE TABLE IF NOT EXISTS `användare` (
`Aid` int(11) NOT NULL,
  `Fnamn` varchar(25) NOT NULL,
  `Enamn` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `tele` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `favoriter`
--

CREATE TABLE IF NOT EXISTS `favoriter` (
`Fid` int(11) NOT NULL,
  `Aid` int(11) NOT NULL,
  `Rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `resa`
--

CREATE TABLE IF NOT EXISTS `resa` (
`Rid` int(11) NOT NULL,
  `startLat` text NOT NULL,
  `startLong` text NOT NULL,
  `endLat` text NOT NULL,
  `endLong` text NOT NULL,
  `datum` varchar(20) NOT NULL,
  `platser` int(11) NOT NULL,
  `beskrivning` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `användare`
--
ALTER TABLE `användare`
 ADD PRIMARY KEY (`Aid`);

--
-- Index för tabell `favoriter`
--
ALTER TABLE `favoriter`
 ADD PRIMARY KEY (`Fid`);

--
-- Index för tabell `resa`
--
ALTER TABLE `resa`
 ADD PRIMARY KEY (`Rid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `användare`
--
ALTER TABLE `användare`
MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `favoriter`
--
ALTER TABLE `favoriter`
MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `resa`
--
ALTER TABLE `resa`
MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
