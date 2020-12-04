-- MariaDB dump 10.18  Distrib 10.4.16-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: PHP_Project
-- ------------------------------------------------------
-- Server version	10.4.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AD`
--

DROP TABLE IF EXISTS `AD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AD` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `SELLER_ID` varchar(50) NOT NULL,
  `DISP_NAME` varchar(80) NOT NULL,
  `BRAND` varchar(50) NOT NULL,
  `PROC` varchar(50) NOT NULL,
  `RAM` varchar(50) NOT NULL,
  `HDD` varchar(50) NOT NULL,
  `GFX` varchar(50) NOT NULL,
  `DISP` varchar(50) NOT NULL,
  `SOLD` tinyint(1) NOT NULL DEFAULT 0,
  `PRICE` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FKA` (`SELLER_ID`),
  KEY `FKAB` (`BRAND`),
  CONSTRAINT `FKA` FOREIGN KEY (`SELLER_ID`) REFERENCES `USER` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKAB` FOREIGN KEY (`BRAND`) REFERENCES `BRANDS` (`BRAND`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AD`
--

LOCK TABLES `AD` WRITE;
/*!40000 ALTER TABLE `AD` DISABLE KEYS */;
INSERT INTO `AD` VALUES (42,'j@g.com','Exclusive Offer: Apple MacBook Air 13.3\" SpaceGray','Apple','intel i5 10th gen','16GB','256GB SSD','Intel UHD 620','13.3\" FHD IPS',0,30000.00),(44,'jako@g.com','Acer Predator Helios 300 Core i7 10th Gen with Windows Home','Acer','Intel Core i7 10th Gen','16GB','256GB SSD + 1TB HDD','6GB NVIDIA Geforce RTX 2060',' Full HD LED Backlit ComfyView TFT LCD',1,40000.00),(45,'jako@g.com','Asus VivoBook 14 Core i5 10th Gen (14 inch, Slate Grey, 1.50 kg)','Acer','Intel Core i5 10th Gen','8GB','256GB SSD + 1TB HDD',' Intel Integrated UHD','Full HD LED Backlit Anti-glare',0,25000.00),(46,'jako@g.com','Lenovo Ideapad S540 Core i5 10th Gen 15.6 inch, Mineral Grey, 1.8 kg','Lenovo','Intel Core i5 10th Gen','8GB','256GB SSD + 1TB HDD',' NVIDIA Geforce RTX MX250','Full HD LED Backlit Anti-glare IPS',0,35000.00),(51,'jako@g.com','hp Pavillion i5 10th Gen Laptop','hp','intel i5 10th gen','8GB','256GB SSD','Intel Integrated UHD 620','15.6 inch FHD IPS',0,34000.00),(52,'jako@g.com','Lenovo Legion Ryzen 7 Gaming Laptop','Lenovo','Ryzen 7','16GB','512GB SSD + 1TB SSD','Nvidia GTX 1060Ti','15.6 inch FHD IPS',0,65000.00),(54,'abi@g.com','Acer Swift 3 THin & Lightweight Laptop','Acer','Intel i5 8250','8GB','256GB SSD','Nvidia GeForce MX150','15.6 inch FHD IPS',1,45000.00);
/*!40000 ALTER TABLE `AD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BRANDS`
--

DROP TABLE IF EXISTS `BRANDS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BRANDS` (
  `BRAND` varchar(50) NOT NULL,
  PRIMARY KEY (`BRAND`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BRANDS`
--

LOCK TABLES `BRANDS` WRITE;
/*!40000 ALTER TABLE `BRANDS` DISABLE KEYS */;
INSERT INTO `BRANDS` VALUES ('Acer'),('Apple'),('ASUS'),('DELL'),('honor'),('hp'),('Lenovo'),('MI'),('MSI');
/*!40000 ALTER TABLE `BRANDS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOGIN`
--

DROP TABLE IF EXISTS `LOGIN`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LOGIN` (
  `EMAIL` varchar(50) NOT NULL,
  `PWD` varchar(256) NOT NULL,
  PRIMARY KEY (`EMAIL`),
  CONSTRAINT `FKL` FOREIGN KEY (`EMAIL`) REFERENCES `USER` (`EMAIL`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOGIN`
--

LOCK TABLES `LOGIN` WRITE;
/*!40000 ALTER TABLE `LOGIN` DISABLE KEYS */;
INSERT INTO `LOGIN` VALUES ('abi@g.com','123456'),('j@g.com','123456'),('jako@g.com','1234566'),('jpk@g.com','123456'),('ramanan@g.com','123456');
/*!40000 ALTER TABLE `LOGIN` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QUERIES`
--

DROP TABLE IF EXISTS `QUERIES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QUERIES` (
  `QID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` bigint(20) NOT NULL,
  `QSTN` varchar(256) NOT NULL,
  `ANS` varchar(256) NOT NULL,
  PRIMARY KEY (`QID`),
  UNIQUE KEY `ID` (`ID`,`QSTN`),
  CONSTRAINT `FKQ` FOREIGN KEY (`ID`) REFERENCES `AD` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QUERIES`
--

LOCK TABLES `QUERIES` WRITE;
/*!40000 ALTER TABLE `QUERIES` DISABLE KEYS */;
INSERT INTO `QUERIES` VALUES (2,44,'Does this have a Ethernet Port?','Yes'),(3,44,'Does this  Laptop has Fingerprint reader','No.This Laptop has no Fingerprint reader'),(4,45,'Does this have a dedicated GPU?','No. This comes with Intel Integrated Graphics'),(5,45,'Does this comes with NvMe SSD?','Yes'),(6,45,'Is the display IPS?','No it is anitiglare and provide good viewing angles'),(8,42,'Is this Laptop having dedicated Graphics?','No'),(9,44,'Is this laptop good for media production?','Yes it is'),(11,42,'Is this original','NA');
/*!40000 ALTER TABLE `QUERIES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `SALES`
--

DROP TABLE IF EXISTS `SALES`;
/*!50001 DROP VIEW IF EXISTS `SALES`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `SALES` (
  `ID` tinyint NOT NULL,
  `SELLER_ID` tinyint NOT NULL,
  `DISP_NAME` tinyint NOT NULL,
  `BRAND` tinyint NOT NULL,
  `PRICE` tinyint NOT NULL,
  `BUYER` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `SESSION_USERS`
--

DROP TABLE IF EXISTS `SESSION_USERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SESSION_USERS` (
  `EMAIL` varchar(50) NOT NULL,
  PRIMARY KEY (`EMAIL`),
  CONSTRAINT `SESSION_USER` FOREIGN KEY (`EMAIL`) REFERENCES `USER` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SESSION_USERS`
--

LOCK TABLES `SESSION_USERS` WRITE;
/*!40000 ALTER TABLE `SESSION_USERS` DISABLE KEYS */;
INSERT INTO `SESSION_USERS` VALUES ('jako@g.com');
/*!40000 ALTER TABLE `SESSION_USERS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SOLD`
--

DROP TABLE IF EXISTS `SOLD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SOLD` (
  `ID` bigint(20) NOT NULL,
  `BUYER` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FKS` (`BUYER`),
  CONSTRAINT `FKS` FOREIGN KEY (`BUYER`) REFERENCES `USER` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKS1` FOREIGN KEY (`ID`) REFERENCES `AD` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SOLD`
--

LOCK TABLES `SOLD` WRITE;
/*!40000 ALTER TABLE `SOLD` DISABLE KEYS */;
INSERT INTO `SOLD` VALUES (44,'abi@g.com'),(54,'j@g.com');
/*!40000 ALTER TABLE `SOLD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `NAME` varchar(50) NOT NULL,
  `MOB` bigint(10) NOT NULL,
  `ADD1` varchar(50) NOT NULL,
  `ADD2` varchar(50) NOT NULL,
  `ADD3` varchar(50) NOT NULL,
  `STATE` varchar(50) NOT NULL,
  `PIN` int(6) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  PRIMARY KEY (`EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES ('Abi',9876543217,'B1','STREET','KKD','Kerala',876543,'abi@g.com'),('JOHN',9961278479,'BUILDING NO 1','STREET','District','Karnataka',544338,'j@g.com'),('JANG0',9876543210,'House','Street','Malappuram','Kerala',678543,'jako@g.com'),('DAVID',64454322,'WEWRWQ','445677','5333','Kerala',343434,'jpk@g.com'),('Ramanan',1234567890,'WEWRWQ','STREET','KKD','TamilNadu',222222,'ramanan@g.com');
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `USERVIEW`
--

DROP TABLE IF EXISTS `USERVIEW`;
/*!50001 DROP VIEW IF EXISTS `USERVIEW`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `USERVIEW` (
  `EMAIL` tinyint NOT NULL,
  `ID` tinyint NOT NULL,
  `SELLER_ID` tinyint NOT NULL,
  `DISP_NAME` tinyint NOT NULL,
  `BRAND` tinyint NOT NULL,
  `PROC` tinyint NOT NULL,
  `RAM` tinyint NOT NULL,
  `HDD` tinyint NOT NULL,
  `GFX` tinyint NOT NULL,
  `DISP` tinyint NOT NULL,
  `SOLD` tinyint NOT NULL,
  `PRICE` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `SALES`
--

/*!50001 DROP TABLE IF EXISTS `SALES`*/;
/*!50001 DROP VIEW IF EXISTS `SALES`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `SALES` AS select `A`.`ID` AS `ID`,`A`.`SELLER_ID` AS `SELLER_ID`,`A`.`DISP_NAME` AS `DISP_NAME`,`A`.`BRAND` AS `BRAND`,`A`.`PRICE` AS `PRICE`,`S`.`BUYER` AS `BUYER` from (`AD` `A` join `SOLD` `S` on(`A`.`ID` = `S`.`ID`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `USERVIEW`
--

/*!50001 DROP TABLE IF EXISTS `USERVIEW`*/;
/*!50001 DROP VIEW IF EXISTS `USERVIEW`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `USERVIEW` AS (select `U`.`EMAIL` AS `EMAIL`,`A`.`ID` AS `ID`,`A`.`SELLER_ID` AS `SELLER_ID`,`A`.`DISP_NAME` AS `DISP_NAME`,`A`.`BRAND` AS `BRAND`,`A`.`PROC` AS `PROC`,`A`.`RAM` AS `RAM`,`A`.`HDD` AS `HDD`,`A`.`GFX` AS `GFX`,`A`.`DISP` AS `DISP`,`A`.`SOLD` AS `SOLD`,`A`.`PRICE` AS `PRICE` from (`USER` `U` join `AD` `A`) where `U`.`EMAIL` <> `A`.`SELLER_ID` and `A`.`SOLD` = 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-05  0:47:28
