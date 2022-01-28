-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: social
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `social`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `social` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `social`;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL,
  `userID` int NOT NULL,
  `postID` int NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_post_userID` (`userID`),
  KEY `FK_postID` (`postID`),
  CONSTRAINT `FK_post_userID` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_postID` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'hhhhh','2022-01-27',24,18,'2022-01-27','2022-01-27'),(2,'hhhhh','2022-01-27',24,14,'2022-01-27','2022-01-27');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `body` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL,
  `userID` int NOT NULL,
  `type` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'Other',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_userID` (`userID`),
  CONSTRAINT `FK_userID` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'Hello World','2022-01-22',1,'Other','My New Post',NULL,NULL),(2,'Welcome to Egypt','2022-01-22',1,'Other','My New Post',NULL,NULL),(3,'Welcome in my page','2022-01-23',1,'Other',NULL,'2022-01-23','2022-01-23'),(4,'I Love You','2022-01-23',1,'Politics','Politics','2022-01-23','2022-01-23'),(5,'I Love You','2022-01-23',1,'Politics','Politics','2022-01-23','2022-01-23'),(6,'I Love You','2022-01-23',1,'Politics','Politics','2022-01-23','2022-01-23'),(7,'Welcome Every Body','2022-01-23',1,'Social','My Post','2022-01-23','2022-01-23'),(8,'Hellooooooooooooooooooooo','2022-01-23',1,'Novels','Hello','2022-01-23','2022-01-23'),(9,'Hellooooooooooooooooooooo','2022-01-23',1,'Novels','Hello','2022-01-23','2022-01-23'),(10,'Hellooooooooooooooooooooo','2022-01-23',1,'Novels','Hello','2022-01-23','2022-01-23'),(11,'Hellooooooooooooooooooooo','2022-01-23',1,'Novels','Hello','2022-01-23','2022-01-23'),(12,'Hellooooooooooooooooooooo','2022-01-23',1,'Novels','Hello','2022-01-23','2022-01-23'),(13,'Hellooooooooooooooooooooo','2022-01-23',1,'Novels','Hello','2022-01-23','2022-01-23'),(14,'Hellooooooooooooooooooooo','2022-01-23',1,'Novels','Hello','2022-01-23','2022-01-23'),(18,'ssssss','2022-01-26',8,'Economy','DDDDD','2022-01-26','2022-01-26');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rate` (
  `userID` int NOT NULL,
  `postID` int NOT NULL,
  `rate` tinyint NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`userID`,`postID`,`rate`),
  KEY `FK_rate_postID` (`postID`),
  KEY `userID` (`userID`) USING BTREE,
  CONSTRAINT `FK_rate_postID` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_rate_userID` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_userID_rate` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rate`
--

LOCK TABLES `rate` WRITE;
/*!40000 ALTER TABLE `rate` DISABLE KEYS */;
INSERT INTO `rate` VALUES (1,14,1,'2022-01-28','2022-01-28'),(1,18,0,'2022-01-28','2022-01-28');
/*!40000 ALTER TABLE `rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `userImage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `groupID` tinyint NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'ahmed','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','01143469626','ahmed42081download.jpg',0,'2022-01-22','2022-01-26',NULL),(8,'ahmedYahia','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','01143469626','ahmedYahia75543download (2).jpg',0,'2022-01-26','2022-01-26','2022-01-26'),(9,'ahmed322','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','01234567891111',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(10,'ahmed4444','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','012345671111',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(11,'ahmed55','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','01234567891111',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(12,'ahmed111','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','012345671111',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(13,'ahmed222','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','012345671111',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(14,'ahmed454','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','3132323132',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(15,'ahmed3434','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','3424324323',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(16,'ahmed32432','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','3424324324',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(17,'ahme32432','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','3424324324',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(18,'ahme2432','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','3424324324',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(19,'ahme24321','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','3424324324',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(20,'ahme243215','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','3424324324',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(21,'ahmed34','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','01234567890',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(22,'ahmed3443','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','01234567890',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(23,'ahmed34435','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','01234567890',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(24,'ahmed344763','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','01234567890',NULL,0,'2022-01-27','2022-01-27','2022-01-27'),(25,'ahmed7777','f7c3bc1d808e04732adf679965ccc34ca7ae3441','ahmedahmadahmid73@gmail.com','012345671111',NULL,0,'2022-01-27','2022-01-27','2022-01-27');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-28 19:08:54
