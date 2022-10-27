-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_sinistros
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.31-MariaDB

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
-- Table structure for table `tb_addresses`
--

DROP TABLE IF EXISTS `tb_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_addresses` (
  `idaddress` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `desaddress` varchar(128) NOT NULL,
  `desnumber` varchar(16) NOT NULL,
  `descomplement` varchar(32) DEFAULT NULL,
  `descity` varchar(32) NOT NULL,
  `desstate` varchar(32) NOT NULL,
  `descountry` varchar(32) NOT NULL,
  `deszipcode` char(8) NOT NULL,
  `desdistrict` varchar(32) NOT NULL,
  `desdelivery` varchar(25) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idaddress`),
  KEY `fk_addresses_persons_idx` (`idperson`),
  CONSTRAINT `fk_addresses_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_addresses`
--

LOCK TABLES `tb_addresses` WRITE;
/*!40000 ALTER TABLE `tb_addresses` DISABLE KEYS */;
INSERT INTO `tb_addresses` VALUES (17,1,'Rua Beija-Flôr','310','45','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','','2018-09-03 03:22:55'),(18,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','','2018-09-03 03:27:06'),(19,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','','2018-09-04 02:02:18'),(20,1,'Rua Beija-FlÃ´r','','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','','2018-09-07 22:30:03'),(21,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','','2018-09-14 02:37:38'),(22,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','','2018-09-27 20:28:44'),(23,0,'0','0','0','0','0','0','0','0','0','2018-09-27 20:45:40'),(24,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','28/04/2018','2018-09-27 20:46:42'),(25,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','2018-10-04','2018-10-04 00:47:09'),(26,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','2018-10-11','2018-10-04 02:05:54'),(27,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','2018-10-11','2018-10-04 02:10:53'),(28,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','2018-10-23','2018-10-12 18:52:27'),(29,1,'Rua Beija-FlÃ´r','310','','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','2018-10-20','2018-10-12 22:31:57'),(30,1,'Rua Beija-FlÃ´r','310','310','Jandira','SP','Brasil','06624155','Jardim Nossa Senhora de FÃ¡tima','2018-10-26','2018-10-12 23:07:42'),(31,1,'Rua Armando JosÃ© AraÃºjo','310','','Jandira','SP','Brasil','06624150','Jardim Nossa Senhora de FÃ¡tima','2018-10-19','2018-10-12 23:10:00');
/*!40000 ALTER TABLE `tb_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_carts`
--

DROP TABLE IF EXISTS `tb_carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_carts` (
  `idcart` int(11) NOT NULL AUTO_INCREMENT,
  `dessessionid` varchar(64) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `deszipcode` char(8) DEFAULT NULL,
  `vlfreight` decimal(10,2) DEFAULT NULL,
  `nrdays` int(11) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcart`),
  KEY `FK_carts_users_idx` (`iduser`),
  CONSTRAINT `fk_carts_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carts`
--

LOCK TABLES `tb_carts` WRITE;
/*!40000 ALTER TABLE `tb_carts` DISABLE KEYS */;
INSERT INTO `tb_carts` VALUES (1,'n5nrktct7h0fhl7qjnq05dm0av',1,NULL,NULL,NULL,'2018-08-04 22:13:47'),(2,'ioq04qnn0ntm88aav43hmlvjhf',NULL,NULL,NULL,NULL,'2018-08-05 18:52:07'),(3,'nunu338uc6itpp1vrcestnfa8f',NULL,NULL,40.00,1,'2018-08-11 16:11:50'),(4,'suanggh606cccudo00tfeectcp',NULL,NULL,40.00,1,'2018-08-11 21:56:00'),(5,'8tjod511aaf13u7r7o7c0kq6at',NULL,NULL,0.00,0,'2018-08-11 21:59:41'),(6,'89624q80mq42su1thb52s1v504',NULL,NULL,36.60,1,'2018-08-13 22:55:02'),(7,'o1o6oimhhck67p4pvf2cvhmpua',NULL,NULL,NULL,NULL,'2018-08-13 23:03:10'),(8,'4oo5vps4l3qistvmkr4r6v5no4',NULL,NULL,32.40,1,'2018-08-15 01:06:36'),(9,'avkp4svj494r2eus9i7lgf2t8j',NULL,NULL,32.40,1,'2018-08-15 01:14:56'),(10,'upemid5pkjn8kr103vu5s2vkll',NULL,NULL,NULL,NULL,'2018-08-16 23:15:36'),(11,'pllu6g9tfd0garhprp3085cjni',1,NULL,36.60,1,'2018-08-19 18:50:09'),(12,'pgvp70iedtrs0inetnfaf8u84h',NULL,NULL,32.40,1,'2018-08-20 23:42:06'),(13,'5q4j4d028joqt840k1358ghoe2',NULL,NULL,32.40,1,'2018-08-24 23:30:54'),(14,'f7h1a59b4lrpl9dp1g3kamt33a',NULL,NULL,32.40,1,'2018-08-26 17:55:31'),(15,'ekp4um91he5t9edahclv4v6sj1',NULL,NULL,NULL,NULL,'2018-08-26 18:30:58'),(16,'9bj1pkdvv8q89b8gsk9ci6rcbd',NULL,NULL,32.40,1,'2018-08-26 18:32:22'),(17,'kpphvhb5hb50b09ktgm65mvile',NULL,'0560601',0.00,0,'2018-08-31 23:41:37'),(18,'racftn674v8k902m9qqh3qgi2g',NULL,'06624150',39.35,1,'2018-09-01 19:10:35'),(19,'sklsfgfbqcdvuvqptha9f842iq',NULL,'06624155',0.00,0,'2018-09-02 17:18:17'),(20,'2m8qn0hhmn1pv0lr51g3g31g1a',NULL,NULL,NULL,NULL,'2018-09-02 17:20:18'),(21,'u3ghb769ujm8bbl24c0ad6gli8',NULL,'06624155',51.85,1,'2018-09-04 01:42:58'),(22,'2eapjp1qqssre7scrbpuelubcd',1,'06624155',34.85,1,'2018-09-07 22:26:24'),(23,'fda273p77da3pig8islq2fe47m',NULL,NULL,NULL,NULL,'2018-09-10 01:08:56'),(24,'9k0p3m88qg0d1ba37msrvv3tbe',NULL,NULL,NULL,NULL,'2018-09-12 23:44:55'),(25,'u65mgnmh1a0ihi54rrcvo9bp46',NULL,'06624155',71.85,1,'2018-09-14 02:32:08'),(26,'8ndr85qf816fbp28ld0hrtb1ij',NULL,NULL,NULL,NULL,'2018-09-16 00:14:57'),(27,'sgggt7k747k71vdftqt77et0a0',NULL,'06624155',34.85,1,'2018-10-04 00:46:21'),(28,'beu9mn8ieddq6lvm23cmkb98te',NULL,'06624155',36.48,1,'2018-10-04 02:08:50'),(29,'0bpb6456efiqch1vhn4qr2dk7c',NULL,NULL,NULL,NULL,'2018-10-12 18:47:03'),(30,'akl3dbmrucgn6c3ll4cb0r73t7',NULL,'06624150',125.78,1,'2018-10-12 18:51:32'),(31,'n6bkib6lhunogko76l0rp6a83m',NULL,NULL,NULL,NULL,'2018-10-13 16:11:30');
/*!40000 ALTER TABLE `tb_carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cartsproducts`
--

DROP TABLE IF EXISTS `tb_cartsproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cartsproducts` (
  `idcartproduct` int(11) NOT NULL AUTO_INCREMENT,
  `idcart` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `dtremoved` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcartproduct`),
  KEY `FK_cartsproducts_carts_idx` (`idcart`),
  KEY `FK_cartsproducts_products_idx` (`idproduct`),
  CONSTRAINT `fk_cartsproducts_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cartsproducts_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=377 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cartsproducts`
--

LOCK TABLES `tb_cartsproducts` WRITE;
/*!40000 ALTER TABLE `tb_cartsproducts` DISABLE KEYS */;
INSERT INTO `tb_cartsproducts` VALUES (1,2,18,'2018-08-05 15:55:42','2018-08-05 18:52:07'),(2,2,17,'0000-00-00 00:00:00','2018-08-05 18:54:30'),(3,2,17,'2018-08-05 16:15:06','2018-08-05 19:12:58'),(4,2,17,'2018-08-05 16:15:11','2018-08-05 19:13:10'),(5,2,17,'2018-08-05 16:15:14','2018-08-05 19:13:16'),(6,2,17,'2018-08-05 16:15:53','2018-08-05 19:13:19'),(7,2,17,'2018-08-05 16:16:21','2018-08-05 19:13:30'),(8,2,17,'2018-08-05 16:16:22','2018-08-05 19:13:56'),(9,2,17,'2018-08-05 16:16:29','2018-08-05 19:14:00'),(10,2,17,'2018-08-05 16:27:02','2018-08-05 19:14:00'),(11,2,17,'2018-08-05 16:27:02','2018-08-05 19:14:03'),(12,2,17,'2018-08-05 16:27:02','2018-08-05 19:14:10'),(13,2,17,'2018-08-05 16:27:02','2018-08-05 19:14:10'),(14,2,17,'2018-08-05 16:27:02','2018-08-05 19:14:10'),(15,2,17,'2018-08-05 16:27:02','2018-08-05 19:15:17'),(16,2,17,'2018-08-05 16:27:02','2018-08-05 19:16:04'),(17,2,17,'2018-08-05 16:27:02','2018-08-05 19:16:16'),(18,2,17,'2018-08-05 16:27:02','2018-08-05 19:16:33'),(19,2,17,'2018-08-05 16:27:02','2018-08-05 19:16:33'),(20,2,17,'2018-08-05 16:27:02','2018-08-05 19:26:02'),(21,2,17,'2018-08-05 16:27:02','2018-08-05 19:26:11'),(22,2,17,'2018-08-05 16:27:02','2018-08-05 19:26:16'),(23,2,17,'2018-08-05 16:27:02','2018-08-05 19:26:20'),(24,2,17,'2018-08-05 16:27:02','2018-08-05 19:26:24'),(25,2,17,'2018-08-05 16:27:02','2018-08-05 19:26:43'),(26,2,17,'2018-08-05 16:27:02','2018-08-05 19:26:47'),(27,2,17,'2018-08-05 16:27:02','2018-08-05 19:26:51'),(28,2,18,'2018-08-05 16:34:59','2018-08-05 19:27:44'),(29,2,18,'2018-08-05 16:34:59','2018-08-05 19:34:48'),(30,2,18,'2018-08-05 16:34:59','2018-08-05 19:34:48'),(31,2,18,'2018-08-05 16:34:59','2018-08-05 19:34:48'),(32,2,18,'2018-08-05 16:34:59','2018-08-05 19:34:48'),(33,2,18,'2018-08-05 16:34:59','2018-08-05 19:34:48'),(34,2,18,'2018-08-05 16:36:24','2018-08-05 19:35:12'),(35,2,18,'2018-08-05 16:36:24','2018-08-05 19:35:13'),(36,2,18,'2018-08-05 16:36:24','2018-08-05 19:35:13'),(37,2,18,'2018-08-05 16:36:24','2018-08-05 19:35:13'),(38,2,18,'2018-08-05 16:36:24','2018-08-05 19:35:13'),(39,2,18,'2018-08-05 16:36:24','2018-08-05 19:35:13'),(40,2,18,'2018-08-05 16:36:24','2018-08-05 19:35:13'),(41,2,18,'2018-08-05 16:36:24','2018-08-05 19:35:13'),(42,2,18,'2018-08-05 16:36:24','2018-08-05 19:35:28'),(43,3,18,'2018-08-11 13:12:03','2018-08-11 16:11:50'),(44,3,18,'2018-08-11 16:05:21','2018-08-11 16:12:00'),(45,3,18,'2018-08-11 17:07:02','2018-08-11 16:12:36'),(46,3,16,'2018-08-11 13:17:24','2018-08-11 16:16:53'),(47,3,18,'2018-08-11 17:07:03','2018-08-11 18:27:10'),(48,3,18,'2018-08-11 17:07:33','2018-08-11 19:05:13'),(49,3,18,'2018-08-11 17:07:33','2018-08-11 19:05:18'),(50,3,18,'2018-08-11 17:07:34','2018-08-11 20:06:53'),(51,3,18,'2018-08-11 17:07:34','2018-08-11 20:06:56'),(52,3,18,'2018-08-11 17:07:34','2018-08-11 20:06:57'),(53,3,18,'2018-08-11 17:07:34','2018-08-11 20:06:58'),(54,3,18,'2018-08-11 17:07:34','2018-08-11 20:06:58'),(55,3,18,'2018-08-11 17:07:34','2018-08-11 20:06:59'),(56,3,18,'2018-08-11 17:07:34','2018-08-11 20:06:59'),(57,3,18,'2018-08-11 17:07:35','2018-08-11 20:06:59'),(58,3,18,'2018-08-11 17:07:35','2018-08-11 20:06:59'),(59,3,18,'2018-08-11 17:07:35','2018-08-11 20:06:59'),(60,3,18,'2018-08-11 17:07:35','2018-08-11 20:06:59'),(61,3,18,'2018-08-11 17:07:36','2018-08-11 20:07:00'),(62,3,18,'2018-08-11 17:07:36','2018-08-11 20:07:00'),(63,3,18,'2018-08-11 17:07:45','2018-08-11 20:07:00'),(64,3,18,'2018-08-11 17:07:45','2018-08-11 20:07:00'),(65,3,18,'2018-08-11 17:14:45','2018-08-11 20:07:00'),(66,3,18,'2018-08-11 17:15:18','2018-08-11 20:07:00'),(67,3,18,'2018-08-11 17:15:22','2018-08-11 20:07:00'),(68,3,18,'2018-08-11 17:16:54','2018-08-11 20:07:00'),(69,3,18,'2018-08-11 17:16:54','2018-08-11 20:07:05'),(70,3,18,'2018-08-11 17:16:54','2018-08-11 20:07:07'),(71,3,18,'2018-08-11 17:16:54','2018-08-11 20:14:37'),(72,3,18,'2018-08-11 17:16:54','2018-08-11 20:14:42'),(73,3,18,'2018-08-11 17:16:54','2018-08-11 20:15:25'),(74,3,17,'2018-08-11 17:20:34','2018-08-11 20:17:19'),(75,3,17,'2018-08-11 17:20:39','2018-08-11 20:17:23'),(76,3,17,'2018-08-11 17:20:45','2018-08-11 20:17:28'),(77,3,17,'2018-08-11 18:54:08','2018-08-11 20:17:36'),(78,3,17,'2018-08-11 18:54:08','2018-08-11 20:18:55'),(79,3,18,'2018-08-11 17:20:30','2018-08-11 20:19:35'),(80,3,17,'2018-08-11 18:54:08','2018-08-11 20:48:27'),(81,3,17,'2018-08-11 18:54:08','2018-08-11 20:54:35'),(82,3,18,NULL,'2018-08-11 21:54:00'),(83,3,18,NULL,'2018-08-11 21:54:20'),(84,3,18,NULL,'2018-08-11 21:54:26'),(85,3,18,NULL,'2018-08-11 21:54:41'),(86,3,18,NULL,'2018-08-11 21:55:42'),(87,4,18,NULL,'2018-08-11 21:56:28'),(88,4,18,NULL,'2018-08-11 21:56:31'),(89,4,18,NULL,'2018-08-11 21:56:31'),(90,5,18,NULL,'2018-08-11 21:59:41'),(91,5,18,NULL,'2018-08-11 22:15:47'),(92,5,18,NULL,'2018-08-11 22:16:06'),(93,5,18,NULL,'2018-08-11 22:16:12'),(94,5,18,NULL,'2018-08-11 22:16:45'),(95,5,18,NULL,'2018-08-11 22:16:50'),(96,6,15,'2018-08-13 20:03:33','2018-08-13 22:55:03'),(97,6,15,'2018-08-13 20:03:33','2018-08-13 22:56:18'),(98,6,15,'2018-08-13 20:03:33','2018-08-13 22:56:23'),(99,6,15,'2018-08-13 20:03:33','2018-08-13 22:56:29'),(100,6,18,'2018-08-13 20:01:24','2018-08-13 22:57:28'),(101,6,18,'2018-08-13 20:01:24','2018-08-13 22:57:28'),(102,6,18,'2018-08-13 20:01:24','2018-08-13 22:57:28'),(103,6,18,'2018-08-13 20:01:25','2018-08-13 22:57:28'),(104,6,18,'2018-08-13 20:01:25','2018-08-13 22:57:28'),(105,6,18,'2018-08-13 20:01:25','2018-08-13 22:57:28'),(106,6,18,'2018-08-13 20:01:25','2018-08-13 22:57:28'),(107,6,18,'2018-08-13 20:01:25','2018-08-13 22:57:28'),(108,6,18,'2018-08-13 20:01:25','2018-08-13 22:57:28'),(109,6,18,'2018-08-13 20:01:25','2018-08-13 22:57:28'),(110,6,18,'2018-08-13 20:01:25','2018-08-13 22:57:28'),(111,6,18,'2018-08-13 20:01:26','2018-08-13 22:57:28'),(112,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:28'),(113,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:28'),(114,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:28'),(115,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:28'),(116,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(117,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(118,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(119,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(120,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(121,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(122,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(123,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(124,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(125,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(126,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(127,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(128,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(129,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(130,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(131,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(132,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(133,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:29'),(134,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(135,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(136,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(137,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(138,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(139,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(140,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(141,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(142,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(143,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(144,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(145,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(146,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(147,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(148,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(149,6,18,'2018-08-13 20:01:34','2018-08-13 22:57:30'),(150,6,18,'2018-08-13 20:01:34','2018-08-13 23:01:21'),(151,6,18,NULL,'2018-08-13 23:03:43'),(152,6,18,NULL,'2018-08-13 23:04:07'),(153,6,18,NULL,'2018-08-13 23:04:24'),(154,6,18,NULL,'2018-08-13 23:04:30'),(155,6,18,NULL,'2018-08-13 23:04:36'),(156,8,18,NULL,'2018-08-15 01:06:36'),(157,9,18,NULL,'2018-08-15 01:18:22'),(158,10,15,NULL,'2018-08-16 23:19:06'),(159,10,15,NULL,'2018-08-16 23:19:15'),(160,10,17,NULL,'2018-08-17 16:35:56'),(161,10,18,NULL,'2018-08-17 23:38:45'),(162,11,18,'2018-08-19 16:20:28','2018-08-19 19:20:18'),(163,11,18,'2018-08-19 16:31:14','2018-08-19 19:30:49'),(164,11,18,'2018-08-19 16:54:15','2018-08-19 19:53:04'),(165,11,19,'2018-08-19 16:54:17','2018-08-19 19:53:44'),(166,11,18,'2018-08-19 16:55:54','2018-08-19 19:55:08'),(167,11,18,'2018-08-19 16:56:32','2018-08-19 19:56:02'),(168,11,17,'2018-08-19 16:58:04','2018-08-19 19:56:43'),(169,11,18,NULL,'2018-08-19 19:58:28'),(170,11,18,NULL,'2018-08-19 20:04:26'),(171,11,19,NULL,'2018-08-19 22:05:15'),(172,12,18,'2018-08-20 21:30:46','2018-08-21 00:25:27'),(173,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:08'),(174,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:10'),(175,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:11'),(176,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:13'),(177,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:14'),(178,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:15'),(179,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:17'),(180,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:19'),(181,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:21'),(182,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:23'),(183,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:24'),(184,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:26'),(185,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:28'),(186,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:31'),(187,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:35'),(188,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:37'),(189,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:38'),(190,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:39'),(191,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:39'),(192,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:39'),(193,12,18,'2018-08-20 21:30:46','2018-08-21 00:30:40'),(194,13,18,'2018-08-24 20:31:01','2018-08-24 23:30:54'),(195,13,18,'2018-08-24 21:55:27','2018-08-24 23:32:05'),(196,13,18,'2018-08-24 21:55:27','2018-08-25 00:53:56'),(197,13,18,'2018-08-24 21:55:27','2018-08-25 00:54:00'),(198,13,18,'2018-08-24 21:55:27','2018-08-25 00:54:06'),(199,13,18,'2018-08-24 21:56:22','2018-08-25 00:55:43'),(200,13,17,'2018-08-24 21:56:03','2018-08-25 00:55:55'),(201,13,18,NULL,'2018-08-25 00:56:30'),(202,13,18,NULL,'2018-08-25 00:56:35'),(203,13,18,NULL,'2018-08-25 00:56:37'),(204,13,18,NULL,'2018-08-25 00:56:38'),(205,13,18,NULL,'2018-08-25 00:56:39'),(206,13,18,NULL,'2018-08-25 00:56:40'),(207,13,18,NULL,'2018-08-25 00:56:40'),(208,13,18,NULL,'2018-08-25 00:56:40'),(209,13,18,NULL,'2018-08-25 00:56:41'),(210,13,18,NULL,'2018-08-25 00:56:42'),(211,13,18,NULL,'2018-08-25 00:56:42'),(212,13,18,NULL,'2018-08-25 00:56:42'),(213,13,18,NULL,'2018-08-25 00:56:42'),(214,14,18,'2018-08-26 16:31:01','2018-08-26 17:55:31'),(215,15,18,NULL,'2018-08-26 18:30:58'),(216,15,17,NULL,'2018-08-26 18:31:07'),(217,14,18,'2018-08-26 16:31:01','2018-08-26 18:31:32'),(218,16,18,NULL,'2018-08-26 18:32:22'),(219,14,18,'2018-08-26 16:31:01','2018-08-26 18:58:53'),(220,14,18,'2018-08-26 16:31:01','2018-08-26 19:11:02'),(221,14,18,'2018-08-26 16:31:01','2018-08-26 19:11:04'),(222,14,18,'2018-08-26 16:31:01','2018-08-26 19:11:05'),(223,14,18,'2018-08-26 16:31:01','2018-08-26 19:11:06'),(224,14,18,'2018-08-26 16:31:01','2018-08-26 19:11:07'),(225,14,18,'2018-08-26 16:31:01','2018-08-26 19:11:07'),(226,14,18,'2018-08-26 16:31:01','2018-08-26 19:11:08'),(227,14,18,'2018-08-26 16:31:01','2018-08-26 19:11:08'),(228,14,17,NULL,'2018-08-26 19:30:48'),(229,17,17,'2018-08-31 22:15:16','2018-08-31 23:42:22'),(230,17,18,NULL,'2018-09-01 01:17:19'),(231,17,18,NULL,'2018-09-01 01:24:18'),(232,17,18,NULL,'2018-09-01 01:24:21'),(233,17,18,NULL,'2018-09-01 01:24:22'),(234,17,18,NULL,'2018-09-01 01:24:23'),(235,17,18,NULL,'2018-09-01 01:24:24'),(236,17,18,NULL,'2018-09-01 01:24:24'),(237,17,18,NULL,'2018-09-01 01:24:25'),(238,17,18,NULL,'2018-09-01 01:24:26'),(239,17,18,NULL,'2018-09-01 01:24:26'),(240,17,18,NULL,'2018-09-01 01:24:27'),(241,17,18,NULL,'2018-09-01 01:24:31'),(242,17,15,NULL,'2018-09-01 01:30:43'),(243,17,15,NULL,'2018-09-01 01:30:50'),(244,17,15,NULL,'2018-09-01 01:30:51'),(245,17,15,NULL,'2018-09-01 01:30:51'),(246,17,15,NULL,'2018-09-01 01:30:56'),(247,17,15,NULL,'2018-09-01 01:30:58'),(248,17,15,NULL,'2018-09-01 01:30:59'),(249,17,15,NULL,'2018-09-01 01:30:59'),(250,17,15,NULL,'2018-09-01 01:30:59'),(251,18,18,'2018-09-01 16:14:37','2018-09-01 19:10:35'),(252,18,18,'2018-09-01 16:14:37','2018-09-01 19:11:50'),(253,18,18,'2018-09-01 16:14:37','2018-09-01 19:11:53'),(254,18,18,'2018-09-01 16:14:37','2018-09-01 19:11:57'),(255,18,18,'2018-09-01 16:14:37','2018-09-01 19:11:58'),(256,18,18,'2018-09-01 16:14:37','2018-09-01 19:12:00'),(257,18,18,'2018-09-01 16:14:37','2018-09-01 19:12:01'),(258,18,18,'2018-09-01 16:14:37','2018-09-01 19:12:01'),(259,18,18,'2018-09-01 16:14:37','2018-09-01 19:12:02'),(260,18,18,'2018-09-01 16:14:37','2018-09-01 19:12:02'),(261,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:18'),(262,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:19'),(263,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:20'),(264,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:21'),(265,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:22'),(266,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:22'),(267,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:22'),(268,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:22'),(269,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:22'),(270,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:23'),(271,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:23'),(272,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:23'),(273,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:23'),(274,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:23'),(275,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:23'),(276,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:23'),(277,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:23'),(278,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:23'),(279,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:24'),(280,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:24'),(281,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:24'),(282,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:24'),(283,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:24'),(284,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:24'),(285,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:24'),(286,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:24'),(287,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:24'),(288,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:25'),(289,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:25'),(290,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:25'),(291,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:25'),(292,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:25'),(293,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:26'),(294,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:27'),(295,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:27'),(296,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:27'),(297,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:28'),(298,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:28'),(299,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:28'),(300,18,17,'2018-09-01 16:14:34','2018-09-01 19:13:28'),(301,18,17,NULL,'2018-09-01 20:22:22'),(302,18,18,NULL,'2018-09-01 20:31:49'),(303,19,18,'2018-09-02 15:05:03','2018-09-02 17:18:17'),(304,20,17,NULL,'2018-09-02 17:20:18'),(305,19,18,'2018-09-02 15:05:03','2018-09-02 17:32:49'),(306,19,18,'2018-09-02 15:05:03','2018-09-02 17:35:46'),(307,19,16,'2018-09-02 16:11:41','2018-09-02 17:41:01'),(308,19,17,'2018-09-02 14:47:52','2018-09-02 17:45:43'),(309,19,17,'2018-09-02 14:47:52','2018-09-02 17:47:20'),(310,19,18,'2018-09-02 15:05:03','2018-09-02 17:47:38'),(311,19,18,'2018-09-02 15:05:03','2018-09-02 17:57:56'),(312,19,17,'2018-09-03 00:26:49','2018-09-02 18:04:58'),(313,19,18,NULL,'2018-09-02 19:05:07'),(314,19,17,'2018-09-03 00:26:49','2018-09-02 19:05:12'),(315,19,18,NULL,'2018-09-03 03:28:32'),(316,19,18,NULL,'2018-09-03 03:28:35'),(317,19,18,NULL,'2018-09-03 03:28:39'),(318,19,18,NULL,'2018-09-03 03:28:43'),(319,19,18,NULL,'2018-09-03 03:28:44'),(320,19,18,NULL,'2018-09-03 03:28:48'),(321,19,18,NULL,'2018-09-03 03:28:50'),(322,19,18,NULL,'2018-09-03 03:28:52'),(323,19,18,NULL,'2018-09-03 03:28:55'),(324,19,18,NULL,'2018-09-03 03:28:56'),(325,19,18,NULL,'2018-09-03 03:28:58'),(326,19,18,NULL,'2018-09-03 03:29:00'),(327,19,18,NULL,'2018-09-03 03:29:01'),(328,19,18,NULL,'2018-09-03 03:29:03'),(329,19,18,NULL,'2018-09-03 03:29:05'),(330,21,18,NULL,'2018-09-04 01:48:54'),(331,21,18,NULL,'2018-09-04 01:49:08'),(332,21,18,NULL,'2018-09-04 01:49:10'),(333,21,18,NULL,'2018-09-04 01:49:11'),(334,21,18,NULL,'2018-09-04 01:49:12'),(335,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:32'),(336,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:37'),(337,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:38'),(338,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:39'),(339,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:39'),(340,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:40'),(341,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:40'),(342,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:41'),(343,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:42'),(344,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:42'),(345,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:42'),(346,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:43'),(347,22,15,'2018-09-07 20:15:31','2018-09-07 22:29:43'),(348,22,15,'2018-09-07 20:15:31','2018-09-07 23:08:59'),(349,22,15,'2018-09-07 20:15:31','2018-09-07 23:09:07'),(350,22,17,NULL,'2018-09-07 23:15:25'),(351,25,18,NULL,'2018-09-14 02:37:17'),(352,25,18,NULL,'2018-09-14 02:37:19'),(353,25,18,NULL,'2018-09-14 02:37:21'),(354,25,18,NULL,'2018-09-14 02:37:21'),(355,25,18,NULL,'2018-09-14 02:37:22'),(356,25,18,NULL,'2018-09-14 02:37:22'),(357,25,18,NULL,'2018-09-14 02:37:22'),(358,26,18,NULL,'2018-09-16 00:15:02'),(359,26,18,NULL,'2018-09-16 00:20:41'),(360,26,18,NULL,'2018-09-16 00:20:46'),(361,27,18,NULL,'2018-10-04 00:46:25'),(362,28,18,'2018-10-03 23:10:16','2018-10-04 02:08:57'),(363,28,20,NULL,'2018-10-04 02:10:22'),(364,29,20,NULL,'2018-10-12 18:47:06'),(365,30,19,NULL,'2018-10-12 18:51:51'),(366,30,20,NULL,'2018-10-12 22:31:22'),(367,30,17,NULL,'2018-10-12 22:33:44'),(368,30,19,NULL,'2018-10-12 22:33:58'),(369,30,19,NULL,'2018-10-12 22:34:01'),(370,30,19,NULL,'2018-10-12 22:34:09'),(371,30,19,NULL,'2018-10-12 22:34:21'),(372,30,19,NULL,'2018-10-12 22:34:25'),(373,30,19,NULL,'2018-10-12 22:34:33'),(374,30,19,NULL,'2018-10-12 22:34:39'),(375,30,19,NULL,'2018-10-12 22:34:49'),(376,30,20,NULL,'2018-10-12 23:08:57');
/*!40000 ALTER TABLE `tb_cartsproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categories` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `descategory` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categories`
--

LOCK TABLES `tb_categories` WRITE;
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT INTO `tb_categories` VALUES (3,'Bolos','2018-06-09 23:53:49'),(4,'Doces','2018-06-10 00:15:09'),(5,'Salgados','2018-06-10 00:15:17');
/*!40000 ALTER TABLE `tb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_orders`
--

DROP TABLE IF EXISTS `tb_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_orders` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `idcart` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `idaddress` int(11) NOT NULL,
  `vltotal` decimal(10,2) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idorder`),
  KEY `FK_orders_users_idx` (`iduser`),
  KEY `fk_orders_ordersstatus_idx` (`idstatus`),
  KEY `fk_orders_carts_idx` (`idcart`),
  KEY `fk_orders_addresses_idx` (`idaddress`),
  CONSTRAINT `fk_orders_addresses` FOREIGN KEY (`idaddress`) REFERENCES `tb_addresses` (`idaddress`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_ordersstatus` FOREIGN KEY (`idstatus`) REFERENCES `tb_ordersstatus` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_orders`
--

LOCK TABLES `tb_orders` WRITE;
/*!40000 ALTER TABLE `tb_orders` DISABLE KEYS */;
INSERT INTO `tb_orders` VALUES (3,19,1,3,17,4.50,'2018-09-03 03:22:57'),(4,19,1,1,18,1.50,'2018-09-03 03:27:08'),(5,22,1,1,22,1.50,'2018-09-27 20:28:47'),(6,22,1,1,24,1.50,'2018-09-27 20:46:44'),(7,27,1,3,25,1.50,'2018-10-04 00:47:10'),(8,27,1,3,26,1.50,'2017-10-04 02:05:54'),(9,28,1,3,27,100.00,'2018-10-04 02:10:54'),(10,30,1,3,28,1.50,'2018-10-12 18:52:27'),(11,30,1,3,29,101.50,'2018-10-12 22:31:58'),(12,30,1,3,30,115.00,'2018-10-12 23:07:51'),(13,30,1,3,31,215.00,'2018-10-12 23:10:04');
/*!40000 ALTER TABLE `tb_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_orderspagseguro`
--

DROP TABLE IF EXISTS `tb_orderspagseguro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_orderspagseguro` (
  `idorder` int(11) NOT NULL,
  `descode` varchar(36) NOT NULL,
  `vlgrossamount` decimal(10,2) NOT NULL,
  `vldiscountamount` decimal(10,2) NOT NULL,
  `vlfeeamount` decimal(10,2) NOT NULL,
  `vlnetamount` decimal(10,2) NOT NULL,
  `vlextraamount` decimal(10,2) NOT NULL,
  `despaymentlink` varchar(256) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idorder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_orderspagseguro`
--

LOCK TABLES `tb_orderspagseguro` WRITE;
/*!40000 ALTER TABLE `tb_orderspagseguro` DISABLE KEYS */;
INSERT INTO `tb_orderspagseguro` VALUES (10,'19DCB6B8-EBFC-4774-8208-4D10A21422B1',1.50,0.00,0.47,1.03,0.00,'','2018-10-12 18:53:08'),(11,'01D4280C-D4CA-41F9-B37A-5B421C9E180B',101.50,0.00,5.46,96.04,0.00,'','2018-10-12 22:32:28'),(12,'4C020E4A-E59B-4CF1-8C05-563C9B3862DF',115.00,0.00,20.43,94.57,0.00,'','2018-10-12 23:08:33'),(13,'75536402-AAEE-4921-93B3-E294E7082857',215.00,0.00,37.85,177.15,0.00,'','2018-10-12 23:10:34');
/*!40000 ALTER TABLE `tb_orderspagseguro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ordersstatus`
--

DROP TABLE IF EXISTS `tb_ordersstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ordersstatus` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `desstatus` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ordersstatus`
--

LOCK TABLES `tb_ordersstatus` WRITE;
/*!40000 ALTER TABLE `tb_ordersstatus` DISABLE KEYS */;
INSERT INTO `tb_ordersstatus` VALUES (1,'Em Aberto','2017-03-13 03:00:00'),(2,'Aguardando Pagamento','2017-03-13 03:00:00'),(3,'Pago','2017-03-13 03:00:00'),(4,'Entregue','2017-03-13 03:00:00');
/*!40000 ALTER TABLE `tb_ordersstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_persons`
--

DROP TABLE IF EXISTS `tb_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_persons` (
  `idperson` int(11) NOT NULL AUTO_INCREMENT,
  `desperson` varchar(64) NOT NULL,
  `desemail` varchar(128) DEFAULT NULL,
  `nrphone` bigint(20) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (1,'Administrador Teste','admin@sandbox.pagseguro.com.br',2147483647,'2017-03-01 03:00:00'),(7,'Suporte','suporte@casadedonabrasilina.com.br',1112345678,'2017-03-15 16:10:27'),(9,'Fernando','fernando@sandbox.pagseguro.com.br',42062433,'2018-10-13 16:54:00'),(11,'Joao Sampaio','joao@sandbox.pagseguro.com.br',42062433,'2018-10-13 16:57:53'),(12,'Beatriz','beatriz@sandbox.pagseguro.com.br',1154653465561,'2018-10-13 16:59:59'),(13,'Anderson','anderson@sandbox.pagseguro.com.br',11956887456,'2018-10-13 17:00:38'),(14,'Marcos','marcos@sandbox.pagseguro.com.br',42062433,'2018-10-13 17:13:55');
/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_products`
--

DROP TABLE IF EXISTS `tb_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_products` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `desproduct` varchar(64) NOT NULL,
  `vlprice` decimal(10,2) NOT NULL,
  `vlfilling` varchar(150) NOT NULL,
  `vlweight` decimal(10,2) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_products`
--

LOCK TABLES `tb_products` WRITE;
/*!40000 ALTER TABLE `tb_products` DISABLE KEYS */;
INSERT INTO `tb_products` VALUES (15,'Doce Thor',1.50,'',2.00,'doce-thor','2018-07-08 16:43:01'),(16,'Doce Escudo CapitÃ£o AmÃ©rica',1.50,'',2.00,'doce_escudo_capitao_america','2018-07-08 17:21:40'),(17,'Doce Concha Diamante',1.50,'',2.00,'doce_concha_diamante','2018-07-08 17:22:09'),(18,'Doce Capacete do Homem de Ferro',1.50,'',2.00,'Doce_Capacete_do_Homem_de_Ferro','2018-07-08 17:22:29'),(19,'Bolo  BÃ­blia Aberta',1.50,'Bolo de Chocolate com recheio de Morango',2.00,'bolo-biblia','2018-07-08 17:24:58'),(20,'Bolo Branca de Neve',100.00,'',2.00,'bolo branca de neve','2018-10-04 02:10:11');
/*!40000 ALTER TABLE `tb_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_productscategories`
--

DROP TABLE IF EXISTS `tb_productscategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_productscategories` (
  `idcategory` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  PRIMARY KEY (`idcategory`,`idproduct`),
  KEY `fk_productscategories_products_idx` (`idproduct`),
  CONSTRAINT `fk_productscategories_categories` FOREIGN KEY (`idcategory`) REFERENCES `tb_categories` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productscategories_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_productscategories`
--

LOCK TABLES `tb_productscategories` WRITE;
/*!40000 ALTER TABLE `tb_productscategories` DISABLE KEYS */;
INSERT INTO `tb_productscategories` VALUES (3,15),(3,19),(4,15),(4,16),(4,17),(4,18);
/*!40000 ALTER TABLE `tb_productscategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `deslogin` varchar(64) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint(4) NOT NULL DEFAULT '0',
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`),
  KEY `FK_users_persons_idx` (`idperson`),
  CONSTRAINT `fk_users_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (1,1,'admin','$2y$12$YlooCyNvyTji8bPRcrfNfOKnVMmZA9ViM2A3IpFjmrpIbp5ovNmga',1,'2017-03-13 03:00:00'),(7,7,'suporte','$2y$12$l/2uJSgmJQeeymjuIbQ3CurS4yJeZ5tshUNLNkscfqm8FGmgJ3nd2',1,'2017-03-15 16:10:27'),(9,9,'fernando sampaio','$2y$12$u/.rcfz23o324ohF9YQfguAU4lrzjr/EfL7pkQutjEqc2G/yrSWwi',0,'2018-10-13 16:54:00'),(11,11,'joao','$2y$12$.j9CzrCjRi8uH9LQCo.Bpetye5CUIVnqTBUK..zhPWs6YuqBw3s52',0,'2018-10-13 16:57:53'),(12,12,'beatriz','$2y$12$KzNq5iDbFCOPjsyD.AZkVusM/X5cUR/liXFV/001IyBzJfoVVK3xS',0,'2018-10-13 16:59:59'),(13,13,'anderson','$2y$12$ALnmwPqP1PClm6D.844cjeUhEnMLJsRz7H4wFJf7pgsMwHy8AoqI.',0,'2018-10-13 17:00:38'),(14,14,'marcos','$2y$12$ZJQ10j22fnejNjzY0.yYGOInJS4fPApd1hL/b6LIO1v8qWIeXuClu',0,'2018-10-13 17:13:55');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userslogs`
--

DROP TABLE IF EXISTS `tb_userslogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_userslogs` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `deslog` varchar(128) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `desuseragent` varchar(128) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idlog`),
  KEY `fk_userslogs_users_idx` (`iduser`),
  CONSTRAINT `fk_userslogs_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userslogs`
--

LOCK TABLES `tb_userslogs` WRITE;
/*!40000 ALTER TABLE `tb_userslogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_userslogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userspasswordsrecoveries`
--

DROP TABLE IF EXISTS `tb_userspasswordsrecoveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_userspasswordsrecoveries` (
  `idrecovery` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idrecovery`),
  KEY `fk_userspasswordsrecoveries_users_idx` (`iduser`),
  CONSTRAINT `fk_userspasswordsrecoveries_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
INSERT INTO `tb_userspasswordsrecoveries` VALUES (1,7,'127.0.0.1',NULL,'2017-03-15 16:10:59'),(2,7,'127.0.0.1','2017-03-15 13:33:45','2017-03-15 16:11:18'),(3,7,'127.0.0.1','2017-03-15 13:37:35','2017-03-15 16:37:12');
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_sinistros'
--

--
-- Dumping routines for database 'db_sinistros'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_addresses_save` */;
ALTER DATABASE `db_sinistros` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addresses_save`(
pidaddress int(11), 
pidperson int(11),
pdesaddress varchar(128),
pdesnumber varchar(16),
pdescomplement varchar(32),
pdescity varchar(32),
pdesstate varchar(32),
pdescountry varchar(32),
pdeszipcode char(8),
pdesdistrict varchar(32),
pdesdelivery varchar(32)
)
BEGIN
 
    IF pidaddress > 0 THEN
		
		UPDATE tb_addresses
        SET
	    idperson = pidperson,
            desaddress = pdesaddress,
            desnumber = pdesnumber,
            descomplement = pdescomplement,
            descity = pdescity,
            desstate = pdesstate,
            descountry = pdescountry,
            deszipcode = pdeszipcode, 
            desdistrict = pdesdistrict,
            desdelivery = pdesdelivery
		WHERE idaddress = pidaddress;
        
    ELSE
		
	INSERT INTO tb_addresses (idperson, desaddress, desnumber, descomplement, descity, desstate, descountry, deszipcode, desdistrict, desdelivery)
        VALUES(pidperson, pdesaddress, pdesnumber, pdescomplement, pdescity, pdesstate, pdescountry, pdeszipcode, pdesdistrict, pdesdelivery);
        
        SET pidaddress = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_addresses WHERE idaddress = pidaddress;
 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `db_sinistros` CHARACTER SET utf8 COLLATE utf8_general_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_carts_save` */;
ALTER DATABASE `db_sinistros` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_carts_save`(
pidcart INT,
pdessessionid VARCHAR(64),
piduser INT,
pdeszipcode CHAR(8),
pvlfreight DECIMAL(10,2),
pnrdays INT
)
BEGIN

    IF pidcart > 0 THEN
        
        UPDATE tb_carts
        SET
            dessessionid = pdessessionid,
            iduser = piduser,
            deszipcode = pdeszipcode,
            vlfreight = pvlfreight,
            nrdays = pnrdays
        WHERE idcart = pidcart;
        
    ELSE
        
        INSERT INTO tb_carts (dessessionid, iduser, deszipcode, vlfreight, nrdays)
        VALUES(pdessessionid, piduser, pdeszipcode, pvlfreight, pnrdays);
        
        SET pidcart = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_carts WHERE idcart = pidcart;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `db_sinistros` CHARACTER SET utf8 COLLATE utf8_general_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_categories_save` */;
ALTER DATABASE `db_sinistros` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categories_save`(
pidcategory INT,
pdescategory VARCHAR(64)
)
BEGIN
	
	IF pidcategory > 0 THEN
		
		UPDATE tb_categories
        SET descategory = pdescategory
        WHERE idcategory = pidcategory;
        
    ELSE
		
		INSERT INTO tb_categories (descategory) VALUES(pdescategory);
        
        SET pidcategory = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_categories WHERE idcategory = pidcategory;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `db_sinistros` CHARACTER SET utf8 COLLATE utf8_general_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_orderspagseguro_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orderspagseguro_save`(
pidorder int, 
pdescode varchar(36), 
pvlgrossamount decimal(10,2), 
pvldiscountamount decimal(10,2), 
pvlfeeamount decimal(10,2), 
pvlnetamount decimal(10,2), 
pvlextraamount decimal(10,2),
pdespaymentlink varchar(256)
)
BEGIN
	
    DELETE FROM tb_orderspagseguro WHERE idorder = pidorder;
    
    INSERT INTO tb_orderspagseguro (idorder, descode, vlgrossamount, vldiscountamount, vlfeeamount, vlnetamount, vlextraamount, despaymentlink)
	VALUES(pidorder, pdescode, pvlgrossamount, pvldiscountamount, pvlfeeamount, pvlnetamount, pvlextraamount, pdespaymentlink);
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_orders_save` */;
ALTER DATABASE `db_sinistros` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orders_save`(
pidorder INT,
pidcart int(11),
piduser int(11),
pidstatus int(11),
pidaddress int(11),
pvltotal decimal(10,2)
)
BEGIN
	
	IF pidorder > 0 THEN
		
		UPDATE tb_orders
        SET
			idcart = pidcart,
            iduser = piduser,
            idstatus = pidstatus,
            idaddress = pidaddress,
            vltotal = pvltotal
		WHERE idorder = pidorder;
        
    ELSE
    
		INSERT INTO tb_orders (idcart, iduser, idstatus, idaddress, vltotal)
        VALUES(pidcart, piduser, pidstatus, pidaddress, pvltotal);
		
		SET pidorder = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * 
    FROM tb_orders a
    INNER JOIN tb_ordersstatus b USING(idstatus)
    INNER JOIN tb_carts c USING(idcart)
    INNER JOIN tb_users d ON d.iduser = a.iduser
    INNER JOIN tb_addresses e USING(idaddress)
    WHERE idorder = pidorder;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `db_sinistros` CHARACTER SET utf8 COLLATE utf8_general_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_products_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_products_save`(IN `pidproduct` INT(11), IN `pdesproduct` VARCHAR(64), IN `pvlprice` DECIMAL(10,2), IN `pvlfilling` VARCHAR(150), IN `pvlweight` DECIMAL(10,2), IN `pdesurl` VARCHAR(128))
BEGIN

	

	IF pidproduct > 0 THEN

		

		UPDATE tb_products

        SET 

			desproduct = pdesproduct,

            vlprice = pvlprice,

            vlfilling = pvlfilling,

            vlweight = pvlweight,

            desurl = pdesurl

        WHERE idproduct = pidproduct;

        

    ELSE

		

		INSERT INTO tb_products (desproduct, vlprice, vlfilling, vlweight, desurl) 

        VALUES(pdesproduct, pvlprice, pvlfilling, pvlweight, pdesurl);

        

        SET pidproduct = LAST_INSERT_ID();

        

    END IF;

    

    SELECT * FROM tb_products WHERE idproduct = pidproduct;

    

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_userspasswordsrecoveries_create` */;
ALTER DATABASE `db_sinistros` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create`(`piduser` INT, `pdesip` VARCHAR(45))
BEGIN
	
	INSERT INTO tb_userspasswordsrecoveries (iduser, desip)
    VALUES(piduser, pdesip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `db_sinistros` CHARACTER SET utf8 COLLATE utf8_general_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usersupdate_save` */;
ALTER DATABASE `db_sinistros` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save`(`piduser` INT, `pdesperson` VARCHAR(64), `pdeslogin` VARCHAR(64), `pdespassword` VARCHAR(256), `pdesemail` VARCHAR(128), `pnrphone` BIGINT, `pinadmin` TINYINT)
BEGIN
	
    DECLARE vidperson INT;
    
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
		desperson = pdesperson,
        desemail = pdesemail,
        nrphone = pnrphone
	WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
		deslogin = pdeslogin,
        despassword = pdespassword,
        inadmin = pinadmin
	WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `db_sinistros` CHARACTER SET utf8 COLLATE utf8_general_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete`(
piduser INT
)
BEGIN
    
    DECLARE vidperson INT;
    
    SET FOREIGN_KEY_CHECKS = 0;
	
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
	
    DELETE FROM tb_addresses WHERE idperson = vidperson;
    DELETE FROM tb_addresses WHERE idaddress IN(SELECT idaddress FROM tb_orders WHERE iduser = piduser);
	DELETE FROM tb_persons WHERE idperson = vidperson;
    
    DELETE FROM tb_userslogs WHERE iduser = piduser;
    DELETE FROM tb_userspasswordsrecoveries WHERE iduser = piduser;
    DELETE FROM tb_orders WHERE iduser = piduser;
    DELETE FROM tb_cartsproducts WHERE idcart IN(SELECT idcart FROM tb_carts WHERE iduser = piduser);
    DELETE FROM tb_carts WHERE iduser = piduser;
    DELETE FROM tb_users WHERE iduser = piduser;
    
    SET FOREIGN_KEY_CHECKS = 1;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_save` */;
ALTER DATABASE `db_sinistros` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(`pdesperson` VARCHAR(64), `pdeslogin` VARCHAR(64), `pdespassword` VARCHAR(256), `pdesemail` VARCHAR(128), `pnrphone` BIGINT, `pinadmin` TINYINT)
BEGIN
	
    DECLARE vidperson INT;
    
	INSERT INTO tb_persons (desperson, desemail, nrphone)
    VALUES(pdesperson, pdesemail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, deslogin, despassword, inadmin)
    VALUES(vidperson, pdeslogin, pdespassword, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `db_sinistros` CHARACTER SET utf8 COLLATE utf8_general_ci ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-13 18:40:50
