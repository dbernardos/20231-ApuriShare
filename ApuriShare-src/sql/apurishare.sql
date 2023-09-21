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
  `fk_situacao` int(6) NOT NULL DEFAULT 1,
  `tempoThink` time DEFAULT NULL,
  `tempoPair` time DEFAULT NULL,
  `horaInicioThink` time DEFAULT NULL,
  `horaInicioPair` time DEFAULT NULL,
  PRIMARY KEY (`chaveAcesso`),
  KEY `const_sala_situacao` (`fk_situacao`),
  CONSTRAINT `const_sala_situacao` FOREIGN KEY (`fk_situacao`) REFERENCES `situacao` (`idSituacao`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (1,'java e javascript sao iguais?','nao',NULL,'Programação Java',12,1,'00:05:00','00:05:00',NULL,NULL),(7,'Fale o que você sabe sobre SQL','sdvv',NULL,'Banco de Dados',4,1,'00:05:00','00:05:00',NULL,NULL),(8,'hdxh','hdxhdxhrt',NULL,'Programação C',6,1,'00:05:00','00:05:00',NULL,NULL),(9,'dddd','dddd',NULL,'Filosofia',2,1,'04:04:00','04:04:00',NULL,NULL),(10,'atividade teste','comentario teste',NULL,'Programação C',2,1,'00:05:00','00:05:00',NULL,NULL),(11,'atividade teste','comentario teste',NULL,'Programação C',2,1,'00:05:00','00:05:00',NULL,NULL),(18,'Resolver a equação do sengundo grau: 4x2+3x+1','equação',NULL,'Matematica',4,1,'00:05:00','00:05:00',NULL,NULL),(19,'plantas','musgos',NULL,'Biologia',4,1,'00:05:00','00:05:00',NULL,NULL),(28,'plnatas','pinheiro',NULL,'Biologia',4,1,'00:05:00','00:05:00',NULL,NULL),(29,'plnatas','fotossíntese',NULL,'Biologia',4,1,'00:05:00','00:05:00',NULL,NULL),(30,'primeira guerra','importante',NULL,'Historia',4,1,'00:05:00','00:05:00',NULL,NULL),(31,'sss','sss',NULL,'Empreendedorismo',4,1,'12:22:00','12:22:00',NULL,NULL),(32,'ddd','dd',NULL,'Meio Ambiente',4,1,'12:12:00','12:21:00',NULL,NULL),(33,'ddd','dd',NULL,'Comunicação Oral',4,1,'12:12:00','12:21:00',NULL,NULL),(34,'ddd','dd',NULL,'Programação Mobile',4,3,'12:12:00','12:21:00',NULL,NULL),(35,'ddd','dd',NULL,'Web 1',4,3,'12:12:00','12:21:00',NULL,NULL),(36,'eee','eee',NULL,'Web 2',6,3,'02:02:00','02:02:00','07:11:48','07:11:50'),(37,'eee','eee',NULL,'Estrutura de Dados',6,3,'02:02:00','02:02:00','00:00:00','07:14:19'),(38,'Você está desenvolvendo um programa de controle de acesso a um sistema. O programa solicita ao usuário que insira seu nome de usuário e senha. Você deve implementar a lógica para verificar se o usuário tem permissão de acesso.\r\n\r\nExistem três níveis de acesso:\r\n\r\nNível 1: Acesso total.\r\nNível 2: Acesso parcial.\r\nNível 3: Sem acesso.\r\nVocê deve seguir as seguintes regras para determinar o nível de acesso:\r\n\r\nSe o nome de usuário for \"admin\" e a senha for \"admin123\", o usuário tem acesso total (Nível 1).\r\nSe o nome de usuário for \"gerente\" e a senha for \"gerente123\", o usuário tem acesso parcial (Nível 2).\r\nPara qualquer outro nome de usuário e senha, o acesso é negado (Nível 3).\r\nImplemente o código em C que solicita o nome de usuário e a senha ao usuário e, em seguida, utiliza estruturas if-else para determinar o nível de acesso com base nas regras acima. Em seguida, exiba uma mensagem adequada ao nível de acesso obtido.\r\n\r\nLembre-se de validar tanto o nome de usuário quanto a senha an','Não vai ser fácil!!!',NULL,'Programação C',10,1,'00:20:00','00:20:00',NULL,NULL);
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
  `tipoUsuario` enum('criador','participante') NOT NULL DEFAULT 'participante',
  PRIMARY KEY (`id_sala_usuario`),
  KEY `fk_sala` (`fk_sala`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `sala_usuario_ibfk_1` FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`chaveAcesso`),
  CONSTRAINT `sala_usuario_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala_usuario`
--

LOCK TABLES `sala_usuario` WRITE;
/*!40000 ALTER TABLE `sala_usuario` DISABLE KEYS */;
INSERT INTO `sala_usuario` VALUES (1,1,'raque.lis','criador'),(2,11,'raque.lis','criador'),(3,10,'italo.ramos','criador'),(4,7,'raque.lis','criador'),(5,8,'raque.lis','criador'),(6,9,'raque.lis','criador'),(7,18,'raque.lis','criador'),(8,19,'raque.lis','criador'),(11,28,'italo.ramos','criador'),(12,29,'italo.ramos','criador'),(13,30,'italo.ramos','criador'),(15,32,'italo.ramos','criador'),(16,33,'italo.ramos','criador'),(17,34,'italo.ramos','criador'),(18,35,'italo.ramos','criador'),(19,36,'italo.ramos','criador'),(20,37,'italo.ramos','criador'),(21,38,'italo.ramos','criador');
/*!40000 ALTER TABLE `sala_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `situacao`
--

DROP TABLE IF EXISTS `situacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `situacao` (
  `idSituacao` int(6) NOT NULL,
  `statusSituacao` varchar(100) NOT NULL,
  `descricaoSituacao` varchar(200) NOT NULL,
  PRIMARY KEY (`idSituacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `situacao`
--

LOCK TABLES `situacao` WRITE;
/*!40000 ALTER TABLE `situacao` DISABLE KEYS */;
INSERT INTO `situacao` VALUES (1,'Sala Criada','Iniciar Atividade Individual'),(2,'Atividade Individual','Iniciar Atividade em Pares'),(3,'Atividade em Pares','Compartilhar Atividades');
/*!40000 ALTER TABLE `situacao` ENABLE KEYS */;
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

-- Dump completed on 2023-09-21 13:08:56
