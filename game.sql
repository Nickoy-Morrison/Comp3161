-- MySQL dump 10.11
--
-- to install this database, from a terminal, type:
-- mysql -u USERNAME -p -h SERVERNAME game < game.sql
--
-- Host: localhost    Database: game
-- ------------------------------------------------------
-- Server version   5.0.45-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS game;
CREATE DATABASE game;
USE game;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` char(45) NOT NULL default '',
  `lastname` char(45) NOT NULL default '',
  `address` char(45) NOT NULL default '',
  `contactnumber`char(45) NOT NULL default '',
  `email` char(45) NOT NULL default '',
  `appointment` char(45) NOT NULL default '',
  `acunittype` char(45) NOT NULL default '',
  `unitservice` char(45) NOT NULL default '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--
LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` char(45) NOT NULL default '',
  `lastname` char(45) NOT NULL default '',
  `age` int(11) NOT NULL default '0',
  `address` char(45) NOT NULL default '',
  `username` char(45) NOT NULL,
  `password` char(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `password_UNIQUE` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--
LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` char(45) NOT NULL default '',
  `lastname` char(45) NOT NULL default '',
  `username` char(45) NOT NULL,
  `password` char(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `password_UNIQUE` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--
LOCK TABLES `admin` WRITE;
INSERT INTO `admin` VALUES (1,'nickOY', 'morrisON','Asdmin1', 'life2020');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `idtable1` int(11) NOT NULL AUTO_INCREMENT,
  `followupdate` varchar(45) DEFAULT NULL,
  `bill` float(20) NOT NULL default '0.00',
   `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`idtable1`,`customer_id`),
  KEY `fk_billing_customer_idx` (`customer_id`),
  CONSTRAINT `fk_billing_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
   
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Dumping data for table `bill` 
--
LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill`  ENABLE KEYS */;
UNLOCK TABLES;


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-28 15:09:07
