-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: p1
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `historial_logins`
--

DROP TABLE IF EXISTS `historial_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  `login_exitoso` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_logins`
--

LOCK TABLES `historial_logins` WRITE;
/*!40000 ALTER TABLE `historial_logins` DISABLE KEYS */;
INSERT INTO `historial_logins` VALUES (1,'aimar.perez@ite.es','2024-04-17 17:29:20','::1','1'),(2,'aimarpt71@gmail.com','2024-04-17 17:48:34','::1','1'),(3,'aimarpt71@gmail.com','2024-04-17 17:55:32','::1','1'),(4,'aimarpt71@gmail.com','2024-04-17 18:25:30','::1','1');
/*!40000 ALTER TABLE `historial_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traducciones`
--

DROP TABLE IF EXISTS `traducciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `traducciones` (
  `cod_traducciones` int(11) NOT NULL AUTO_INCREMENT,
  `correo_usuario` varchar(100) NOT NULL,
  `archivo` varchar(10000) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`cod_traducciones`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traducciones`
--

LOCK TABLES `traducciones` WRITE;
/*!40000 ALTER TABLE `traducciones` DISABLE KEYS */;
INSERT INTO `traducciones` VALUES (2,'','ticking_away.mp4','2024-04-17 18:16:21'),(3,'aimarpt71@gmail.com','output_661ff8040de89.mp3','2024-04-17 18:25:43');
/*!40000 ALTER TABLE `traducciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `correo` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `contrasenya` varchar(128) NOT NULL,
  PRIMARY KEY (`correo`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('aimar.perez@ite.es','Aimar','Pérez Toledo','a4f419d98bfa57f1a6f4a951b4e04f29'),('aimarpt71@gmail.com','Aimar','Pérez Toledo','e21cf62af68de68a5062c7cf2f06c3b5'),('santi.gimeno@gmail.com','Santi','Gimeno','81dc9bdb52d04dc20036dbd8313ed055');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-05 11:10:15
