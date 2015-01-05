-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: panyar
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'MinSan','1234');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Web Development'),(2,'Business Development'),(3,'English learning'),(4,'Science '),(5,'Graphic Design'),(6,'Computer Basic'),(7,'Video Editing'),(8,'Photographing');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `address` varchar(40) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'MinSan','Thit Sa','123','zan@gmail.com',''),(2,'xikang','Mha Road','123','xikang0@gmail.com',''),(3,'KMD','Min Nar Road','123','KMD@gmail.com','Best Traning Center In Myanmar '),(4,'MAD','Kin Ha Road','123','MAD@gmail.com',''),(5,'I-NET','That Pang Road','123','inet@gmail.com',''),(6,'IBCT','That Pang Road','123','IBCT@gmail.com','Best Services For Your Future'),(7,'G-Link','Greant Road','123','glink@gmail.com',''),(8,'Trion','Tida Min Road','123','Trion@gmail.com',''),(9,'MIT','Shwe Phy Pala Zar','123','MIT@gmail.com',''),(10,'Zan','Thit Sa','123','zan@gmail.com','');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `courseId` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `courseName` varchar(50) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `description` text,
  `note` text,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `fee` int(11) NOT NULL,
  `photo` varchar(80) NOT NULL,
  PRIMARY KEY (`courseId`),
  KEY `id` (`id`),
  KEY `categoryId` (`categoryId`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id`) REFERENCES `client` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  CONSTRAINT `course_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`)
  ON DELETE CASCADE
  ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (23,9,'IELTS',3,'','','09:30:00','11:00:00','2015-01-20','2015-03-20',3000,'image/english-is-fun.jpg'),(24,9,'Video Editing Advance',7,'','','13:00:00','15:30:00','2015-06-20','2015-06-20',1800000,'image/a-guide-to-video-editing-on-the-mac-1.jpg'),(25,9,'PHP Web Development',1,'','','10:30:00','12:00:00','2015-01-20','2015-06-20',20000,'image/webdevelopmentbanner.png'),(26,9,'Learning English For Kid ',3,'','','12:30:00','14:00:00','2015-06-20','2015-09-20',2000,'image/images.jpg'),(27,8,'Java Web Development ',1,'','','13:00:00','15:30:00','2015-03-20','2015-06-20',30000,'image/web-development-design.jpg'),(28,8,'Video Editing Basic',7,'','','12:30:00','15:30:00','2015-06-20','2015-10-20',120000,'image/Free-Video-Editing.jpg'),(29,8,'Advance PHP Web Development',1,'','','12:30:00','14:30:00','2015-01-21','2015-06-21',18000,'image/web-development.jpg'),(30,8,'Web Development With Django',1,'','','09:30:00','11:00:00','2015-09-05','2015-12-05',45000,'image/python-im-web-django-1-728.jpg'),(31,8,'Graphic Design With Adobe illustrator',7,'','','10:30:00','12:00:00','2015-01-21','2015-06-21',1800000,'image/670px-Become-a-Graphic-Designer-Step-02.jpg'),(32,8,'Graphic Design Advance',5,'','','10:30:00','12:00:00','2015-01-20','2015-06-20',2500000,'image/graphic_banner.jpg'),(33,6,'Web Development With ROR',1,'','','12:30:00','14:00:00','2015-01-20','2015-09-20',200000,'image/companies-using-ruby-on-rails.jpg'),(34,6,'Photography Basic',8,'','','12:30:00','14:30:00','2015-03-20','2015-06-20',205000,'image/o-TRAVEL-PHOTOGRAPHY-facebook.jpg'),(35,6,'Photography Advance',8,'','','12:30:00','14:30:00','2015-12-20','2015-12-20',1800000,'image/learn-how-to-take-better-pictures.jpg'),(36,6,'Microsoft Office',6,'','','09:30:00','12:00:00','2015-02-20','2015-06-20',1800000,'image/26_10_2013_14_03_00_mb3sh5bfavfmv3ln174qsfl591_77irhljis7.jpg'),(37,6,'Computer Basic',6,'','','10:30:00','12:00:00','2015-03-20','2015-06-20',1800000,'image/Hcom-Academy-Short-Course-Basic-Computer1-450x306.jpg'),(38,6,'Video Editing Advance',7,'','','12:30:00','14:30:00','2015-03-20','2015-06-20',1400000,'image/video.jpg'),(39,4,'IELTS',3,'','','09:30:00','12:00:00','2015-03-20','2015-06-20',1800000,'image/ielts-b.jpg'),(40,4,'English Four Skills',3,'','','12:30:00','14:30:00','2015-06-20','2015-06-20',1800000,'image/IELTS_OfficialTestCentre_logo.jpg');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL AUTO_INCREMENT,
  `paymentType` varchar(30) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `id` (`id`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `client` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (2,'Visa','1321341231',1),(3,'Visa','1231232412',1),(4,'Visa','123214142',1),(5,'paypal','1231141241241',10);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `id` int(11) NOT NULL DEFAULT '0',
  `joinDate` date NOT NULL DEFAULT '0000-00-00',
  `paymentExpireDate` date DEFAULT NULL,
  PRIMARY KEY (`id`,`joinDate`),
  CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id`) REFERENCES `client` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (1,'2014-12-02','2015-01-03'),(2,'2014-12-05','2015-01-16');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-03 12:17:18
