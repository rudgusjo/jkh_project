-- MySQL dump 10.16  Distrib 10.1.19-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.19-MariaDB

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
-- Table structure for table `cartlist`
--

DROP TABLE IF EXISTS `cartlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartlist` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(30) NOT NULL,
  `productnum` int(11) NOT NULL,
  `productcount` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartlist`
--

LOCK TABLES `cartlist` WRITE;
/*!40000 ALTER TABLE `cartlist` DISABLE KEYS */;
INSERT INTO `cartlist` VALUES (10,'test',13,1),(14,'test',9,1);
/*!40000 ALTER TABLE `cartlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `freeboard`
--

DROP TABLE IF EXISTS `freeboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freeboard` (
  `board_id` int(11) NOT NULL AUTO_INCREMENT,
  `board_title` varchar(100) NOT NULL,
  `board_writer` char(30) NOT NULL,
  `board_date` date NOT NULL,
  `board_viewCount` int(11) NOT NULL,
  `board_content` varchar(500) NOT NULL,
  PRIMARY KEY (`board_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freeboard`
--

LOCK TABLES `freeboard` WRITE;
/*!40000 ALTER TABLE `freeboard` DISABLE KEYS */;
INSERT INTO `freeboard` VALUES (30,'a','test','2016-12-12',0,'b'),
(31,'b','test','2016-12-12',0,'b'),
(32,'c','test','2016-12-12',0,'c'),
(33,'d','test','2016-12-12',1,'d'),
(34,'e','test','2016-12-14',53,'e');
/*!40000 ALTER TABLE `freeboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderlist`
--

DROP TABLE IF EXISTS `orderlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderlist` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `user_id` char(30) NOT NULL,
  `productnum` int(11) NOT NULL,
  `productcount` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderlist`
--

LOCK TABLES `orderlist` WRITE;
/*!40000 ALTER TABLE `orderlist` DISABLE KEYS */;
INSERT INTO `orderlist` VALUES (17,'2016-12-13','test',8,3),(18,'2016-12-13','test',9,1),(19,'2016-12-13','test',9,1),(20,'2016-12-13','test',8,1),(21,'2016-12-13','test',8,1),(22,'2016-12-14','test',13,1),(23,'2016-12-14','test',13,1),(24,'2016-12-14','test',13,1),(25,'2016-12-14','test',11,1),(26,'2016-12-14','test',9,1);
/*!40000 ALTER TABLE `orderlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `productnum` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(60) NOT NULL,
  `productseller` varchar(40) NOT NULL,
  `productcategory` varchar(40) NOT NULL,
  `productprice` int(11) NOT NULL,
  `delivery_price` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `productexplain` varchar(200) NOT NULL,
  `productcount` int(11) NOT NULL,
  `p_detail_title` varchar(60) NOT NULL,
  `p_disprice` int(11) NOT NULL,
  PRIMARY KEY (`productnum`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (8,'ì˜†ë‹¨ì¶” ë¼ì¿¤ì•¼ìƒíŒ¨ë”©','JKH','outer',50000,1000,500,'ì¶”ìš´ ë‚ ì”¨ì—ë„ ë„ë•ì—†ëŠ” ì•¼ìƒ*_*\r\në¡±~í•œ ê¸°ìž¥ê°ìœ¼ë¡œ ë”ìš± ë”°ëœ»í•´ìš”!',100,'ì˜†ë‹¨ì¶” ë¼ì¿¤ì•¼ìƒíŒ¨ë”©',47500),
(9,'ëˆˆì†¡ì´ í›„ë“œí¼ì•¼ìƒ','JKH','outer',50000,1000,500,'íƒˆë¶€ì°© ê°€ëŠ¥í•œ í•˜~ì–€ í›„ë“œí¼ ì„¸ì ¤ì˜ˆâ™¥â™¥â™¥\r\nì•ˆê° ì „ì²´ ì–‘í„¸ë¡œ ìµœê°• ë”°ëœ»í•œ ì•„ì´ : )',100,'ëˆˆì†¡ì´ í›„ë“œí¼ì•¼ìƒ',47500),(11,'ì‹¬í”Œì¹´ë¼ ë‚˜ê·¸ëž‘ì½”íŠ¸','JKH','outer',100000,1000,1000,'â˜…ì•ˆê°ëˆ„ë¹”â˜…ë§ ê·¸ëŒ€ë¡œ ì‹¬í”Œí•œ-!\r\në² ì´ì§í•œ-! ë‚˜ê·¸ëž‘ì½”íŠ¸ : )',100,'ì‹¬í”Œì¹´ë¼ ë‚˜ê·¸ëž‘ì½”íŠ¸',90000),(12,'ì–‘ê¸°ëª¨í›„ë“œì§‘ì—…','JKH','outer',40000,1000,400,'ì–‘ê¸°ëª¨ ë¬´ì§€ í›„ë“œì§‘ì—…*_*\r\nì˜¤ë²„í•ì— í€„ë¦¬í‹° ì¢‹ì•„ìš”-!!!!!!',100,'í—ˆê·¸ ì–‘ê¸°ëª¨í›„ë“œì§‘ì—…',36000),(13,'í•‘í¬í¼ ë¡±ì•¼ìƒ','JKH','outer',50000,1000,500,'ëŸ¬ë¸”ë¦¬í•œ í•‘ê¾¸í•‘ê¾¸â™¥0â™¥ í¼!\r\ní¼ë„ ì™„ì „ í’ì„±í•´ìš” : )',100,'í•‘í¬í¼ ë¡±ì•¼ìƒ',49500);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` char(50) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `productnum` int(11) NOT NULL,
  `imagekind` char(15) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,'outer_1.gif',270,340,8,'main'),(2,'outer_1_1.gif',1000,1970,8,'sub'),(3,'outer_1_2.gif',1000,1599,8,'sub'),(4,'outer_2.gif',270,340,9,'main'),(5,'outer_2_1.gif',1000,1282,9,'sub'),(6,'outer_2_2.gif',1000,1620,9,'sub'),(7,'outer_2.gif',270,340,10,'main'),(8,'outer_2_1.gif',1000,1282,10,'sub'),(9,'outer_2_2.gif',1000,1620,10,'sub'),(10,'outer_4.gif',270,340,10,'main'),(11,'outer_4_1.gif',1000,1282,10,'sub'),(12,'outer_4_2.gif',1000,1359,10,'sub'),(13,'outer_5.gif',270,340,11,'main'),(14,'outer_5_1.gif',1000,1580,11,'sub'),(15,'outer_5_2.gif',1000,1359,11,'sub'),(16,'outer_6.gif',270,340,12,'main'),(17,'outer_6_1.gif',1000,1590,12,'sub'),(18,'outer_6_2.gif',1000,1359,12,'sub'),(19,'outer_7.gif',270,340,13,'main'),(20,'outer_7_1.gif',1000,1282,13,'sub'),(21,'outer_7_2.gif',1000,1620,13,'sub');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploadfile`
--

DROP TABLE IF EXISTS `uploadfile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploadfile` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` char(70) NOT NULL,
  `board_id` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploadfile`
--

LOCK TABLES `uploadfile` WRITE;
/*!40000 ALTER TABLE `uploadfile` DISABLE KEYS */;
INSERT INTO `uploadfile` VALUES (22,'outer_1_2.gif',25),(23,'outer_1.gif',26),(24,'outer_1.gif',27),(25,'outer_1_1.gif',27),(26,'outer_1_2.gif',27),(27,'.PNG',28),(28,'outer_1 (1).gif',29),(29,'outer_1_2 (2).gif',30),(30,'outer_1_1.gif',31),(31,'outer_1_1.gif',32),(32,'outer_1_1 (1).gif',33),(33,'',34),(34,'',35),(35,'',36),(36,'outer_2.gif',34),(37,'outer_3.gif',34),(38,'outer_4.gif',34),(39,'outer_5.gif',34),(40,'outer_6.gif',34),(41,'outer_7.gif',34);
/*!40000 ALTER TABLE `uploadfile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userinfo` (
  `user_id` char(30) NOT NULL,
  `user_name` char(30) NOT NULL,
  `user_nick` char(30) NOT NULL,
  `user_pass` char(35) NOT NULL,
  `user_add` char(100) NOT NULL,
  `user_hp` char(30) NOT NULL,
  `user_point` int(11) NOT NULL,
  `user_delivery` char(100) NOT NULL,
  `user_email` char(100) NOT NULL,
  `user_level` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userinfo`
--
LOCK TABLES `userinfo` WRITE;
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
INSERT INTO `userinfo` VALUES ('admin','tester','majamaja','1234','busan','01045373074',5000500,'busan','rudgus_jo@naver.com',9),('test','ì¡°ê²½í˜„','í…ŒìŠ¤í„°','1234','ë¶€ì‚°','01045373074',3000,'ë¶€ì‚°','rudgus_jonaver.com',1);
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-15 23:36:55
