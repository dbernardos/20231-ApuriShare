-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: apurishare
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Current Database: `apurishare`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `apurishare` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `apurishare`;

--
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade` (
  `codigo` int(6) NOT NULL,
  `respostaThink` varchar(1000) NOT NULL,
  `respostaPair` varchar(1000) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sala` (
  `chaveAcesso` int(6) NOT NULL AUTO_INCREMENT,
  `atividade` varchar(1000) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `qntUsers` int(3) NOT NULL,
  `tempoThink` time DEFAULT NULL,
  `tempoPair` time DEFAULT NULL,
  PRIMARY KEY (`chaveAcesso`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (1,'java e javascript sao iguais?','nao','java',12,'00:00:02','00:00:02'),(5,'','','',4,'00:02:00','00:02:00'),(7,'dsgdfgb','sdvv','rgdv',3,'00:02:00','00:02:00'),(8,'hdxh','hdxhdxhrt','frbhrsd',6,'00:02:00','00:02:00'),(9,'dddd','dddd','rgdv',2,'04:04:00','04:04:00'),(10,'atividade teste','comentario teste','SalaTeste',2,'03:08:00','01:08:00'),(11,'atividade teste','comentario teste','SalaTeste',2,'03:08:00','01:08:00');
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala_usuario`
--

DROP TABLE IF EXISTS `sala_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sala_usuario` (
  `id_sala_usuario` int(6) NOT NULL AUTO_INCREMENT,
  `fk_sala` int(6) NOT NULL,
  `fk_usuario` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sala_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala_usuario`
--

LOCK TABLES `sala_usuario` WRITE;
/*!40000 ALTER TABLE `sala_usuario` DISABLE KEYS */;
INSERT INTO `sala_usuario` VALUES (1,1,'italo.ramos'),(2,5,'italo.ramos'),(3,7,'italo.ramos'),(4,8,'portuga.2004'),(5,9,'portuga.2004'),(6,10,'portuga.2004'),(11,11,'portuga.2004');
/*!40000 ALTER TABLE `sala_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `nickname` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(250) NOT NULL,
  PRIMARY KEY (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('italo.ramos','Italo Ramos','6598'),('portuga.2004','Rafael Portugal','2004');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-18  0:56:34
