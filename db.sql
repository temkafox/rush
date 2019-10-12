-- MySQL dump 10.13  Distrib 8.0.16, for osx10.12 (x86_64)
--
-- Host: localhost    Database: OnlineShop
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AuthUsers`
--

DROP TABLE IF EXISTS `AuthUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `AuthUsers` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user_log` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `passwd` varbinary(30) NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `reg_date` timestamp NOT NULL,
  `root_r` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthUsers`
--

LOCK TABLES `AuthUsers` WRITE;
/*!40000 ALTER TABLE `AuthUsers` DISABLE KEYS */;
INSERT INTO `AuthUsers` VALUES (1,'root','','',_binary 'goodpass','root@localhost','2019-05-06 11:32:45','root'),(2,'123','123','123',_binary '123456','123@123.ru','2019-10-12 10:34:37',NULL),(3,'123','123','123',_binary '123456','123@123.ru','2019-10-12 11:44:34',NULL);
/*!40000 ALTER TABLE `AuthUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Checkout`
--

DROP TABLE IF EXISTS `Checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Checkout` (
  `user_log` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prodn` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user_log`,`prodn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Checkout`
--

LOCK TABLES `Checkout` WRITE;
/*!40000 ALTER TABLE `Checkout` DISABLE KEYS */;
/*!40000 ALTER TABLE `Checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Products` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `prodn` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(7) NOT NULL,
  `tags` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `categ` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `popul` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products`
--

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` VALUES (1,'New Balance 540',10990,10,'sneakers','male','/img/shoes.jpg',NULL),(2,'New Balance 760',10200,4,'sneakers','male','/img/shoes2.jpg',NULL),(3,'New Balance 780',10300,3,'sneakers','male','/img/shoes3.jpg',NULL),(4,'New Balance 800',10400,1,'sneakers','male','/img/shoes4.jpg',NULL);
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-12 15:57:46
