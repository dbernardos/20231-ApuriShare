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
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade` (
  `codigo` int(6) NOT NULL AUTO_INCREMENT,
  `respostaThink` varchar(1000) NOT NULL,
  `respostaPair` varchar(1000) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (2,'deddddd','');
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
  `arquivo` varchar(100) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `qntUsers` int(3) NOT NULL,
  `statusSala` enum('criada','think','pair','share') NOT NULL DEFAULT 'criada',
  `tempoThink` time DEFAULT NULL,
  `tempoPair` time DEFAULT NULL,
  `horaInicioThink` datetime DEFAULT NULL,
  `horaInicioPair` datetime DEFAULT NULL,
  PRIMARY KEY (`chaveAcesso`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (1,'java e javascript sao iguais?','nao',NULL,'java',12,'','00:05:00','00:05:00',NULL,NULL),(7,'Fale o que você sabe sobre SQL','sdvv',NULL,'banco de dados',4,'criada','00:05:00','00:05:00',NULL,NULL),(8,'hdxh','hdxhdxhrt',NULL,'programação',6,'criada','00:05:00','00:05:00',NULL,NULL),(9,'dddd','dddd',NULL,'filosofia',2,'criada','04:04:00','04:04:00',NULL,NULL),(10,'atividade teste','comentario teste',NULL,'programação',2,'','00:05:00','00:05:00',NULL,NULL),(11,'atividade teste','comentario teste',NULL,'programação',2,'criada','00:05:00','00:05:00',NULL,NULL),(18,'Resolver a equação do sengundo grau: 4x2+3x+1','equação',NULL,'matematica',4,'criada','00:05:00','00:05:00',NULL,NULL),(19,'plantas','musgos',NULL,'biologia',4,'criada','00:05:00','00:05:00',NULL,NULL),(28,'plnatas','pinheiro',NULL,'biologia',4,'criada','00:05:00','00:05:00',NULL,NULL),(29,'plnatas','fotossíntese',NULL,'biologia',4,'criada','00:05:00','00:05:00',NULL,NULL),(30,'primeira guerra','importante',NULL,'historia',4,'criada','00:05:00','00:05:00',NULL,NULL),(31,'sss','sss',NULL,'dsdsdd',4,'criada','12:22:00','12:22:00',NULL,NULL),(32,'ddd','dd',NULL,'dddd',4,'criada','12:12:00','12:21:00',NULL,NULL),(33,'ddd','dd',NULL,'dddd',4,'criada','12:12:00','12:21:00',NULL,NULL),(34,'ddd','dd',NULL,'dddd',4,'criada','12:12:00','12:21:00',NULL,NULL),(35,'ddd','dd',NULL,'dddd',4,'criada','12:12:00','12:21:00',NULL,NULL),(36,'eee','eee',NULL,'eeee',6,'criada','02:02:00','02:02:00',NULL,NULL),(37,'eee','eee',NULL,'aaaa',6,'','02:02:00','02:02:00',NULL,NULL);
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
  PRIMARY KEY (`id_sala_usuario`),
  KEY `fk_sala` (`fk_sala`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `sala_usuario_ibfk_1` FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`chaveAcesso`),
  CONSTRAINT `sala_usuario_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala_usuario`
--

LOCK TABLES `sala_usuario` WRITE;
/*!40000 ALTER TABLE `sala_usuario` DISABLE KEYS */;
INSERT INTO `sala_usuario` VALUES (1,1,'raque.lis'),(2,11,'raque.lis'),(3,10,'italo.ramos'),(4,7,'raque.lis'),(5,8,'raque.lis'),(6,9,'raque.lis'),(7,18,'raque.lis'),(8,19,'raque.lis'),(11,28,'italo.ramos'),(12,29,'italo.ramos'),(13,30,'italo.ramos'),(15,32,'italo.ramos'),(16,33,'italo.ramos'),(17,34,'italo.ramos'),(18,35,'italo.ramos'),(19,36,'italo.ramos'),(20,37,'italo.ramos');
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
INSERT INTO `usuario` VALUES ('italo.ramos','Italo Ramos','6598'),('portuga.2004','Rafael Portugal','2004'),('raque.lis','Raquel da Silva','1020');
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

-- Dump completed on 2023-09-20 18:09:40
