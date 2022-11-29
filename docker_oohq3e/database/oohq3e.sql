-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: oohq3e
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `meret` varchar(35) DEFAULT NULL,
  `datum` varchar(35) DEFAULT NULL,
  `kategoria` varchar(40) DEFAULT NULL,
  `alkoto` varchar(60) DEFAULT NULL,
  `img` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (1,'Norden Mountain','29 x 42','2021 január 22.','olaj pasztell','Bagoly Gábor','img/gallery/Norden_Mountain/1373239354Norden_mountain_gaboly_2021_01_22.jpg'),(2,'Norden Lake','42 x 29','2020 február 21.','olaj pasztell','Bagoly Gábor','img/gallery/Norden_Lake/106671550norden_lake_oil_pastel.jpg'),(3,'Hyperion','29 x 42','2019 november 8.','olaj pasztell','Bagoly Gábor','img/gallery/Hyperion/1950382590hyperion_oil_pastel.jpg'),(4,'Forest','42 x 29','2018 június 1.','olaj pasztell','Bagoly Gábor','img/gallery/Forest/768710956forest_oil_pastel.jpg'),(5,'Icy Lake','29 x 42','2020 augusztus 27.','olaj pasztell','Bagoly Gábor','img/gallery/Icy_Lake/95381369icy_lake_oil_pastel.jpg'),(6,'Steampunk Eye','42 x 29','2019 április 26.','olaj pasztell','Bagoly Gábor','img/gallery/Steampunk_Eye/1783561083cp_eye_oil_pastel.jpg'),(7,'Hug','21 x 29','2017 április 17.','ceruza','Bagoly Gábor','img/gallery/Hug/965995295devil_survivor_pencil.jpg'),(8,'Tunnel','29 x 42','2018 április 13.','olaj pasztell','Bagoly Gábor','img/gallery/Tunnel/500502493tunnel_oil_pastel.jpg'),(9,'Teemochu','10 x 15','2017 december 16.','polymer clay','Bagoly Gábor','img/gallery/Teemochu/438741168teemochu_polymer_clay.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET latin2 DEFAULT NULL,
  `link` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Your Profile',1),(2,'All Profiles',2),(3,'Gallery',3),(4,'Add To Gallery',4),(5,'Remove from Gallery',5),(6,'Search',6),(7,'Modify',7);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(40) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `passwd` varchar(32) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `authority` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@email.hu','21232f297a57a5a743894a0e4a801fc3','img/users/admin/841635994adminimg.png','admin'),(2,'mod','mod@email.hu','ad148a3ca8bd0ef3b48c52454c493ec5','img/users/mod/1328290228maxresdefault.jpg','mod'),(3,'user','user@emal.hu','ee11cbb19052e40b07aac0ca060c23ee','img/users/user/12568236user.png','user'),(4,'user2','user2@email.hu','7e58d63b60197ceb55a1c487989a3720','img/users/user2/1460559854user2.png','user'),(5,'user3','user3@email.hu','92877af70a45fd6a2ed7fe81e1236b78','img/users/user3/1746155084user3.png','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-10 16:29:54
