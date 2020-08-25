# jestor-tasks-app

Realizei a construção de um motor para o core da aplicação. 
Criei no motor os conceitos de rotas com dispatcher, URL amigável e o conceito de MVC (Model, View e Controller).
No motor também fiz o mapeamento das classes responsáveis pelo MVC.

## SCRIPT DE BANCO

```
CREATE DATABASE  IF NOT EXISTS `jestor_tasks` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `jestor_tasks`;
-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: jestor_tasks
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.13-MariaDB

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
-- Table structure for table `propriedade`
--

DROP TABLE IF EXISTS `propriedade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propriedade` (
  `IdPropriedade` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(150) NOT NULL,
  PRIMARY KEY (`IdPropriedade`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propriedade`
--

LOCK TABLES `propriedade` WRITE;
/*!40000 ALTER TABLE `propriedade` DISABLE KEYS */;
INSERT INTO `propriedade` VALUES (1,'Observação'),(2,'Dia de Folga'),(23,'Cor Favorita'),(26,'Mês'),(27,'Fruta'),(29,'Carro');
/*!40000 ALTER TABLE `propriedade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `IdTask` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Assunto` varchar(150) NOT NULL,
  `Descricao` longtext NOT NULL,
  `DataEntrega` date NOT NULL,
  PRIMARY KEY (`IdTask`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (9,'FRONT-END','Realizar a construção do FRONT','2023-08-25');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_propriedade`
--

DROP TABLE IF EXISTS `task_propriedade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_propriedade` (
  `IdTask` int(11) NOT NULL,
  `IdPropriedade` int(11) NOT NULL,
  `Valor` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`IdTask`,`IdPropriedade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_propriedade`
--

LOCK TABLES `task_propriedade` WRITE;
/*!40000 ALTER TABLE `task_propriedade` DISABLE KEYS */;
INSERT INTO `task_propriedade` VALUES (9,1,'N/A'),(9,2,'Segunda'),(9,23,'Amarelo'),(9,26,'Janeiro'),(9,27,'Abacaxi'),(9,29,'Ford');
/*!40000 ALTER TABLE `task_propriedade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `IdUser` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id do Usuário.',
  `Email` varchar(45) NOT NULL COMMENT 'E-mail do usuário.',
  `Password` varchar(150) NOT NULL COMMENT 'Senha do Usuário criptografado em MD5.',
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'diego@pop.com','1fd1ab249ed15da82fb5f6e157f5f93a'),(2,'antonio@globo.com','04e6ea84e93ee92936a807359cd2f81d');
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

-- Dump completed on 2020-08-25 11:23:54
```

## USUÁRIO E SENHA DA APLICAÇÃO
```
Email -> diego@pop.com
Senha -> jestor

ou

Email -> antonio@globo.com
Senha -> jestor2
```

## ALTERAR O ARQUIVO index.php DA RAÍZ DO PROJETO
``` 
//Nome da Aplicação
define ('APP_NAME', 'Jestor Tasks');
	
//URL da Aplicação
define ('APP_URL', 'http://localhost/app-tasks/');
```