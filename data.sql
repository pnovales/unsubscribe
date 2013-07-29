-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2013 at 02:58 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datasample`
--
CREATE DATABASE IF NOT EXISTS `datasample` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `datasample`;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`) VALUES
(1, 'user1@gmail.com'),
(8, 'user2@gmail.com'),
(3, 'user3@gmail.com'),
(4, 'user4@gmail.com'),
(7, 'user2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE IF NOT EXISTS `states` (
  `idstate` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(20) NOT NULL,
  `idcountry` int(11) NOT NULL,
  PRIMARY KEY (`idstate`)
) ENGINE=MyISAM;

--
-- Dumping data for table `estado`
--

INSERT INTO `states` (`idstate`, `state`, `idcountry`) VALUES
(1, 'Habana', 1),
(2, 'Caracas', 2),
(3, 'Buenos Aires', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `idcountry` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(20) NOT NULL,
  PRIMARY KEY (`idcountry`)
) ENGINE=MyISAM;

--
-- Dumping data for table `pais`
--

INSERT INTO `countries` (`idcountry`, `country`) VALUES
(1, 'Cuba'),
(2, 'Venezuela'),
(3, 'Argentina');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE IF NOT EXISTS `costumer` (
  `idcostumer` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `addressprimary` text,
  `addresssecundary` text,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` int(6) DEFAULT NULL,
  `idcountry` int(11) NOT NULL,
  `idstate` int(11) NOT NULL,
  PRIMARY KEY (`idcostumer`)
) ENGINE=MyISAM;

--
-- Dumping data for table `persona`
--

INSERT INTO `costumer` (`idcostumer`, `name`, `lastname`, `addressprimary`, `addresssecundary`, `city`, `zipcode`, `idcountry`, `idstate`) VALUES
(5, 'Carlos', 'Alvarez', '14 Via X', '14 Via Y', 'Havana', 52630, 0, 0),
(6, 'Ramon', 'Perez', '34 G', '34 Y', 'Paseo Mercedes', 45369, 0, 0),
(7, 'Angel', 'Noval', '12 west', '12 east', 'Karabobo', 89532, 2, 2),
(8, 'Yosvany', 'Coll', 'florida', 'florida', 'Hialeah', 98742, 1, 1),
(10, 'Ana', 'Fdez', '23 cv', '65 gj', 'Guira', 25635, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phonenumber` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `phonenumber`) VALUES
(1, '5625625621'),
(2, '5625625622'),
(5, '5625625623'),
(4, '5625625624');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
