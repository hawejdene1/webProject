<?php


class Connection
{
private static $_dbname = "webproject";
private static $_user = "root";
private static $_pwd = "";
private static $_host = "localhost";
private static $_bdd = null;
private function __construct()
{
try {
self::$_bdd = new PDO("mysql:host=" . self::$_host . ";dbname="
.self::$_dbname . ";charset=utf8", self::$_user, self::$_pwd,
array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));

self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
die('Erreur : ' . $e->getMessage());
}
}
public static function getInstance()
{
if (!self::$_bdd){
new Connection();
$req=self::$_bdd->query("-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2018 at 10:01 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pass`) VALUES
('root', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `cin` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `line` varchar(50) NOT NULL,
  `station` varchar(50) NOT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE IF NOT EXISTS `computer` (
  `id` varchar(50) NOT NULL,
  `line` varchar(50) NOT NULL,
  `station` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machinerequest`
--

CREATE TABLE IF NOT EXISTS `machinerequest` (
  `machineID` varchar(50) NOT NULL,
  `cin` varchar(11) NOT NULL,
  `time` bigint(25) NOT NULL,
  PRIMARY KEY (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE IF NOT EXISTS `stations` (
  `name` varchar(50) NOT NULL,
  `linename` varchar(50) NOT NULL,
  `dist` int(11) NOT NULL,
  `pricecat1` int(11) NOT NULL,
  `pricecat2` int(11) NOT NULL,
  `pricecat3` int(11) NOT NULL,
  PRIMARY KEY (`name`,`linename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL,
  `payee` tinyint(1) NOT NULL,
  `nomStationDepart` varchar(255) NOT NULL,
  `dateEntree` datetime DEFAULT NULL,
  `nomLigne` varchar(11) NOT NULL,
  `dateSortie` datetime DEFAULT NULL,
  `nomStationArrivee` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
");
return (self::$_bdd);
}return (self::$_bdd);
}
}