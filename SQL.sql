CREATE DATABASE  IF NOT EXISTS `dbencuesta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbencuesta`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: dbencuesta
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

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
-- Table structure for table `tbclientes`
--

DROP TABLE IF EXISTS `tbclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbclientes` (
  `idtbclientes` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`idtbclientes`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientes`
--

LOCK TABLES `tbclientes` WRITE;
/*!40000 ALTER TABLE `tbclientes` DISABLE KEYS */;
INSERT INTO `tbclientes` VALUES (1,'Abertis Autopistas Chile S.A.'),(2,'GESTORA DE AUTOPISTAS S.A.\r'),(3,'Operadora Autopista del Sol SPA \r'),(4,'OPERADORA AUTOPISTA LOS ANDES LTDA.\r'),(5,'Operadora Autopista Los Libertadores SPA \r'),(6,'OPERADORA DEL PACIFICO S.A \r'),(7,'SOC CONCESION AUTOPISTA DE LOS ANDES S.A.');
/*!40000 ALTER TABLE `tbclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbencuesta`
--

DROP TABLE IF EXISTS `tbencuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbencuesta` (
  `idtbencuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) NOT NULL,
  `question1` int(11) NOT NULL,
  `question2` int(11) NOT NULL,
  `question3` int(11) NOT NULL,
  `question4` int(11) NOT NULL,
  `question5` int(11) NOT NULL,
  `question6` int(11) NOT NULL,
  `comments` varchar(100) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtbencuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbencuesta`
--

LOCK TABLES `tbencuesta` WRITE;
/*!40000 ALTER TABLE `tbencuesta` DISABLE KEYS */;
INSERT INTO `tbencuesta` VALUES (1,1,1,2,3,4,5,7,NULL,'2016-04-04 15:58:25'),(2,2,7,5,3,5,3,7,NULL,'2016-04-04 15:58:45'),(3,1,1,1,1,1,1,1,NULL,'2016-04-04 15:59:31'),(4,1,1,3,7,3,1,7,NULL,'2016-04-04 17:08:48'),(5,2,5,4,3,4,6,5,NULL,'2016-04-04 17:11:12'),(6,1,3,1,7,4,6,5,NULL,'2016-04-05 15:17:02'),(7,1,5,3,4,3,4,3,NULL,'2016-04-25 23:29:07'),(8,2,3,4,3,3,3,2,NULL,'2016-04-25 23:29:40'),(9,1,0,0,0,0,0,0,NULL,'2016-05-10 14:35:24'),(10,3,0,0,0,0,0,0,NULL,'2016-05-10 22:42:46'),(11,4,0,0,0,0,0,0,NULL,'2016-05-10 22:43:00'),(12,3,0,0,0,0,0,0,NULL,'2016-05-10 22:43:04'),(13,3,0,0,0,0,0,0,NULL,'2016-05-10 22:45:22'),(14,4,0,0,0,0,0,0,NULL,'2016-05-10 22:46:24'),(15,1,0,0,0,0,0,0,NULL,'2016-05-10 22:46:26'),(16,3,0,0,0,0,0,0,NULL,'2016-05-10 22:46:29'),(17,2,1,2,2,2,3,7,NULL,'2016-05-10 23:48:23'),(18,6,7,6,6,7,7,6,NULL,'2017-01-06 12:15:15');
/*!40000 ALTER TABLE `tbencuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbusuarios` (
  `idtbusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `activo` int(11) DEFAULT '1' COMMENT '0: Inactivo\n1: Activo',
  PRIMARY KEY (`idtbusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuarios`
--

LOCK TABLES `tbusuarios` WRITE;
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` VALUES (1,'admin','admin',1);
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dbencuesta'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-12 13:19:33
CREATE DATABASE  IF NOT EXISTS `dbcomercial` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbcomercial`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: dbcomercial
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

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
-- Table structure for table `tbCalidadCliente`
--

DROP TABLE IF EXISTS `tbCalidadCliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbCalidadCliente` (
  `idtbCalidadCliente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT '2',
  PRIMARY KEY (`idtbCalidadCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbCalidadCliente`
--

LOCK TABLES `tbCalidadCliente` WRITE;
/*!40000 ALTER TABLE `tbCalidadCliente` DISABLE KEYS */;
INSERT INTO `tbCalidadCliente` VALUES (1,'Gold'),(2,'Silver'),(3,'Bronze');
/*!40000 ALTER TABLE `tbCalidadCliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbactividad`
--

DROP TABLE IF EXISTS `tbactividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbactividad` (
  `idtbactividad` int(11) NOT NULL AUTO_INCREMENT,
  `id_prospecto` varchar(45) DEFAULT NULL,
  `fecha_actividad` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_tipo_accion` varchar(45) NOT NULL,
  `id_objetivo` varchar(45) NOT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbactividad`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbactividad`
--

LOCK TABLES `tbactividad` WRITE;
/*!40000 ALTER TABLE `tbactividad` DISABLE KEYS */;
INSERT INTO `tbactividad` VALUES (1,'1','2016-10-11 13:18:20','0','','Creación de Prospecto.'),(2,'2','2016-10-11 13:18:38','0','','Creación de Prospecto.'),(3,'1','2016-10-11 13:26:46','1','1','Se le indica al cliente que se ha recibido su'),(4,'1','2016-10-12 17:34:41','0','','Información de prospecto actualizada'),(5,'1','2016-10-12 17:52:38','3','3','Se le envia cotización 2660. A la espera de r'),(6,'1','2016-10-14 16:52:51','0','','Información de prospecto actualizada'),(7,'1','2016-10-14 16:53:55','0','','Información de prospecto actualizada'),(8,'1','2016-10-14 16:54:29','1','4','Decide opcion SoundStation Duo. envia la OC.'),(9,'1','2016-10-17 13:47:31','0','','Información de prospecto actualizada'),(10,'2','2016-10-18 14:13:42','0','','Creación de Prospecto.'),(11,'2','2016-10-18 14:30:53','2','3','visita pautada entre el 19 - 21'),(12,'3','2016-10-18 14:47:16','0','','Creación de Prospecto.'),(13,'3','2016-10-18 14:47:54','3','4','Activación de ID, con promesa de Tres días pa'),(14,'4','2016-10-18 16:13:09','0','','Creación de Prospecto.'),(15,'5','2016-10-18 16:16:41','0','','Creación de Prospecto.'),(16,'5','2016-10-18 16:31:20','0','','Información de prospecto actualizada'),(17,'6','2016-10-18 19:30:44','0','','Creación de Prospecto.'),(18,'7','2016-10-18 19:43:04','0','','Creación de Prospecto.'),(19,'8','2016-10-18 19:49:27','0','','Creación de Prospecto.'),(20,'9','2016-10-19 11:34:41','0','','Creación de Prospecto.'),(21,'3','2016-10-19 17:13:56','3','4','verificación de estatus de compra '),(22,'2','2016-10-20 18:08:22','2','3','Entrega de propuesta Técnica. Tiempo de respu'),(23,'3','2016-10-20 18:09:56','2','4','Visita para verificar estatus de compra -  En'),(24,'10','2016-10-11 09:00:30','0','','Creación de Prospecto.'),(25,'10','2016-10-11 09:30:00','2','2','Reunión de presentación y toma de requerimien'),(26,'10','2016-10-13 15:00:48','2','4','Instalación Polycom Convene Demo'),(27,'10','2016-10-17 10:00:41','2','4','Se realiza demostración de funcionamiento.'),(28,'10','2016-10-20 19:50:43','3','4','solicitar feedback de la demostración'),(29,'11','2016-10-21 10:13:30','0','','Creación de Prospecto.'),(30,'7','2016-10-21 12:17:54','3','4','Solicitud de información de la sala '),(31,'12','2016-10-21 17:58:09','0','','Creación de Prospecto.'),(32,'13','2016-10-21 18:04:02','0','','Creación de Prospecto.'),(33,'14','2016-10-21 18:08:29','0','','Creación de Prospecto.'),(34,'15','2016-10-21 18:08:29','0','','Creación de Prospecto.'),(35,'16','2016-10-21 18:13:33','0','','Creación de Prospecto.'),(36,'17','2016-10-21 18:27:49','0','','Creación de Prospecto.'),(37,'4','2016-10-21 18:33:20','3','4','seguimiento de propuesta'),(38,'18','2016-10-21 18:33:22','0','','Creación de Prospecto.'),(39,'19','2016-10-21 18:33:42','0','','Creación de Prospecto.'),(40,'20','2016-10-21 18:40:45','0','','Creación de Prospecto.'),(41,'21','2016-10-21 18:43:48','0','','Creación de Prospecto.'),(42,'22','2016-10-21 18:55:10','0','','Creación de Prospecto.'),(43,'23','2016-10-21 19:07:49','0','','Creación de Prospecto.'),(44,'24','2016-10-21 19:13:39','0','','Creación de Prospecto.'),(45,'25','2016-10-21 19:21:45','0','','Creación de Prospecto.'),(46,'26','2016-10-21 19:25:35','0','','Creación de Prospecto.'),(47,'27','2016-10-21 19:29:26','0','','Creación de Prospecto.'),(48,'28','2016-10-24 10:47:56','0','','Creación de Prospecto.'),(49,'29','2016-10-24 10:49:29','0','','Creación de Prospecto.'),(50,'30','2016-10-24 10:50:57','0','','Creación de Prospecto.'),(51,'31','2016-10-24 10:55:13','0','','Creación de Prospecto.'),(52,'32','2016-10-24 10:56:51','0','','Creación de Prospecto.'),(53,'33','2016-10-24 12:13:32','0','','Creación de Prospecto.'),(54,'4','2016-10-24 13:35:00','1','4','Aclaratoria de dudas con respecto a los archi'),(55,'6','2016-10-24 13:36:28','1','1','saludar y ver como va la lic.'),(56,'7','2016-10-24 17:40:05','3','4','seguimiento de información '),(57,'34','2016-10-25 11:04:59','0','','Creación de Prospecto.'),(58,'3','2016-10-25 16:17:44','0','','Información de prospecto actualizada'),(59,'11','2016-10-25 16:23:44','2','3','presentación de propuesta'),(60,'2','2016-10-26 12:12:11','2','1','saludar y aclarar dudas'),(61,'2','2016-10-26 17:48:40','3','4','Recepción de Planimetria, y presupuesto en ad'),(62,'7','2016-10-26 17:49:37','3','4','Recepción de datos de la sala'),(63,'8','2016-10-26 17:51:14','1','4','preguntar por cotizaciones entregadas. respue'),(64,'5','2016-10-26 17:52:31','3','4','En pausa por accidente medico de la persona q'),(65,'35','2016-10-27 16:48:39','0','','Creación de Prospecto.'),(66,'36','2016-10-27 16:57:21','0','','Creación de Prospecto.'),(67,'37','2016-10-27 17:02:59','0','','Creación de Prospecto.'),(68,'38','2016-10-27 17:09:13','0','','Creación de Prospecto.'),(69,'39','2016-10-27 17:31:26','0','','Creación de Prospecto.'),(70,'40','2016-10-27 17:39:25','0','','Creación de Prospecto.'),(71,'40','2016-10-27 17:39:58','2','2','Entrega de Catalogo de la empresa '),(72,'4','2016-10-27 17:59:19','1','4','aclaratoria de dudas\n'),(73,'10','2016-11-02 16:30:21','0','','Información de prospecto actualizada'),(74,'41','2016-11-02 16:35:23','0','','Creación de Prospecto.'),(75,'42','2016-11-02 16:39:02','0','','Creación de Prospecto.'),(76,'42','2016-11-02 16:39:48','0','','Información de prospecto actualizada'),(77,'42','2016-11-02 16:40:49','0','','Información de prospecto actualizada'),(78,'43','2016-11-03 18:45:52','0','','Creación de Prospecto.'),(79,'44','2016-11-03 18:53:35','0','','Creación de Prospecto.'),(80,'45','2016-11-03 19:05:30','0','','Creación de Prospecto.'),(81,'46','2016-11-03 19:10:40','0','','Creación de Prospecto.'),(82,'32','2016-11-04 18:58:31','0','','Información de prospecto actualizada'),(83,'32','2016-11-04 18:58:50','0','','Información de prospecto actualizada'),(84,'32','2016-11-04 19:00:34','0','','Información de prospecto actualizada'),(85,'45','2016-11-04 19:03:26','0','','Información de prospecto actualizada'),(86,'46','2016-11-04 19:05:59','0','','Información de prospecto actualizada'),(87,'47','2016-11-04 19:08:16','0','','Creación de Prospecto.'),(88,'18','2016-11-07 09:29:38','1','1','Proceso cerrado'),(89,'18','2016-11-07 09:29:53','0','','Información de prospecto actualizada'),(90,'33','2016-11-07 09:30:10','0','','Información de prospecto actualizada'),(91,'33','2016-11-07 09:31:34','0','','Información de prospecto actualizada'),(92,'33','2016-11-07 09:31:52','1','1','PROCESO CERRADO - OC 3683-189-CM16'),(93,'5','2016-11-07 13:43:41','1','1','Seguimiento de cotización '),(94,'2','2016-11-07 13:44:26','1','4','Seguimiento por cierre de cotización '),(95,'35','2016-11-08 11:16:53','0','','Información de prospecto actualizada'),(96,'35','2016-11-08 11:17:35','0','','Información de prospecto actualizada'),(97,'48','2016-11-08 11:19:35','0','','Creación de Prospecto.'),(98,'19','2016-11-08 11:22:13','2','4','Contacto: 07/11/16\nCliente informa que la cot'),(99,'19','2016-11-08 11:22:17','0','','Información de prospecto actualizada'),(100,'20','2016-11-08 11:22:46','2','4','Contacto: 07/11/16\nCliente informa que la cot'),(101,'20','2016-11-08 11:22:50','0','','Información de prospecto actualizada'),(102,'21','2016-11-08 11:23:09','2','4','Contacto: 07/11/16\nCliente informa que la cot'),(103,'21','2016-11-08 11:23:12','0','','Información de prospecto actualizada'),(104,'23','2016-11-08 12:21:54','1','4','Cliente informa que no tiene noticias aún del'),(105,'4','2016-11-08 18:23:07','3','3','Propuesta económica'),(106,'9','2016-11-09 12:21:51','0','','Información de prospecto actualizada'),(107,'9','2016-11-09 12:22:07','1','1','se adjudica solo 1 unidad'),(108,'25','2016-11-09 18:13:25','0','','Información de prospecto actualizada'),(109,'25','2016-11-09 18:15:18','1','1','PROYECTO CERRADO.'),(110,'25','2016-11-09 18:15:22','0','','Información de prospecto actualizada'),(111,'25','2016-11-09 18:17:00','0','','Información de prospecto actualizada'),(112,'25','2016-11-09 18:17:00','0','','Información de prospecto actualizada'),(113,'39','2016-11-09 18:21:00','1','4','Contacto: 08/11/16\nCliente informa que el pro'),(114,'39','2016-11-09 18:21:09','0','','Información de prospecto actualizada'),(115,'39','2016-11-09 18:21:09','0','','Información de prospecto actualizada'),(116,'36','2016-11-09 18:33:52','2','4','contacto: 09/11/16\nDemo para evaluar la VC po'),(117,'36','2016-11-09 18:33:55','0','','Información de prospecto actualizada'),(118,'26','2016-11-09 18:15:21','0','','Información de prospecto actualizada'),(119,'26','2016-11-09 18:17:18','0','','Información de prospecto actualizada'),(120,'49','2016-11-11 14:42:24','0','','Creación de Prospecto.'),(121,'31','2016-11-14 09:20:25','0','','Información de prospecto actualizada'),(122,'31','2016-11-14 09:20:53','0','','Información de prospecto actualizada'),(123,'31','2016-11-14 09:21:06','1','1','NEGOCIO CERRADO.'),(124,'25','2016-11-14 09:21:30','1','1','NEGOCIO CERRADO.'),(125,'2','2016-11-14 11:56:08','3','4','envío de Informe de Instalación '),(126,'50','2016-11-15 08:37:07','0','','Creación de Prospecto.'),(127,'51','2016-11-15 08:40:11','0','','Creación de Prospecto.'),(128,'4','2016-11-15 14:28:12','0','','Información de prospecto actualizada'),(129,'7','2016-11-15 14:28:36','2','4','Aclaratoria de dudas'),(130,'52','2016-11-15 17:46:41','0','','Creación de Prospecto.'),(131,'26','2016-11-15 17:46:58','0','','Información de prospecto actualizada'),(132,'53','2016-11-15 17:52:31','0','','Creación de Prospecto.'),(133,'54','2016-11-15 17:54:17','0','','Creación de Prospecto.'),(134,'55','2016-11-15 17:57:25','0','','Creación de Prospecto.'),(135,'49','2016-11-16 13:47:38','2','3','presentación de productos wepresent, jabra, e'),(136,'12','2016-11-16 17:50:27','2','1','Me informa que las cotizaciones aún están en '),(137,'34','2016-11-16 17:51:20','2','4','Cliente informa que la compra se quedará para'),(138,'22','2016-11-16 17:51:44','0','','Información de prospecto actualizada'),(139,'39','2016-11-16 17:56:30','1','1','Cliente informa que el proyecto está parado p'),(140,'36','2016-11-16 17:58:04','2','4','Demo realizada. Enviando los archivos solicit'),(141,'36','2016-11-16 18:02:14','2','4','Demo realizada.\nEnviando archivos solicitados'),(142,'36','2016-11-17 12:06:16','1','4','Me informa que ya están evaluando la propuest'),(143,'56','2016-11-17 12:38:59','0','','Creación de Prospecto.'),(144,'57','2016-11-17 16:13:23','0','','Creación de Prospecto.'),(145,'22','2016-11-18 16:32:50','0','','Información de prospecto actualizada'),(146,'22','2016-11-18 16:32:51','0','','Información de prospecto actualizada'),(147,'51','2016-11-21 09:57:29','2','3','18-11-2016 Se realiza visita a unidades de ne'),(148,'40','2016-11-21 11:04:26','1','3','POLYCOM Cambio de equipos'),(149,'38','2016-11-21 15:20:16','1','4','Cliente informa que van a comprar dos carros '),(150,'58','2016-11-21 15:55:01','0','','Creación de Prospecto.'),(151,'17','2016-11-22 15:15:31','2','4','Averiguar el estado para la compra del RPRM.'),(152,'17','2016-11-22 15:15:34','0','','Información de prospecto actualizada'),(153,'2','2016-11-23 09:47:35','2','4','están licitando con dos empresas más, obtendr'),(154,'49','2016-11-23 13:07:58','1','4','Seguimiento por equipo EVOKO '),(155,'35','2016-11-30 12:49:24','1','4','El cliente informa que el proyecto se queda p'),(156,'35','2016-11-30 12:50:00','1','4','El cliente informa que el proyecto se queda p'),(157,'48','2016-11-30 12:50:35','1','4','El cliente informa que el proyecto se queda p'),(158,'37','2016-11-30 12:51:50','1','4','Contacto: 22/11/16.\nEl cliente informa que no'),(159,'21','2016-11-30 12:52:49','1','4','El cliente informa que todaviá no hay autoriz'),(160,'20','2016-11-30 12:54:09','1','4','El cliente informa que todavía no hay autoriz'),(161,'19','2016-11-30 12:55:00','1','4','El cliente informa que todavía no hay autoriz'),(162,'17','2016-11-30 12:59:35','1','4','Prueba del equipo en 01/12/16.\nCotización env'),(163,'17','2016-11-30 12:59:47','0','','Información de prospecto actualizada'),(164,'47','2016-11-30 13:06:11','3','4','Contacto por wpp: 21/11/16.\nCliente informa q'),(165,'46','2016-11-30 13:06:27','0','','Información de prospecto actualizada'),(166,'46','2016-11-30 13:07:45','2','4','Cliente informa que este proyecto se queda (t'),(167,'46','2016-11-30 13:07:48','0','','Información de prospecto actualizada'),(168,'32','2016-11-30 13:08:42','3','1','Contacto por wpp: 21/11/16.\nCliente informa q'),(169,'58','2016-11-30 13:15:56','3','4','Correo enviado a Marcela Ferrada, encargada d'),(170,'38','2016-11-30 13:16:54','1','4','Cliente informa que la compra ya siendo reali'),(171,'56','2016-12-01 16:24:14','0','','Información de prospecto actualizada'),(172,'56','2016-12-01 16:24:26','1','1','PROYECTO CERRADO.'),(173,'56','2016-12-01 16:25:26','1','1','PROYECTO CERRADO.'),(174,'59','2016-12-05 13:32:02','0','','Creación de Prospecto.'),(175,'38','2016-12-12 12:48:11','0','','Información de prospecto actualizada'),(176,'38','2016-12-12 12:48:21','1','1','PROYECTO CERRADO.'),(177,'34','2016-12-13 10:13:55','0','','Información de prospecto actualizada'),(178,'58','2016-12-13 11:49:47','1','4','Informa que el proyecto queda para el próximo'),(179,'57','2016-12-13 15:57:40','0','','Información de prospecto actualizada'),(180,'57','2016-12-13 15:58:03','1','4','proyecto cerrado.-adjudicado'),(181,'57','2016-12-13 15:58:10','0','','Información de prospecto actualizada'),(182,'51','2016-12-13 15:59:11','1','1','Con el fin de participar en el proyecto de fi'),(183,'11','2016-12-13 16:01:13','3','4','se envía mail de seguimiento'),(184,'60','2016-12-14 16:50:57','0','','Creación de Prospecto.'),(185,'27','2016-12-14 16:51:23','0','','Información de prospecto actualizada'),(186,'27','2016-12-14 16:51:28','1','1','PROYECTO CERRADO.'),(187,'61','2016-12-15 19:20:12','0','','Creación de Prospecto.'),(188,'62','2016-12-15 19:24:33','0','','Creación de Prospecto.'),(189,'52','2016-12-20 17:08:35','0','','Información de prospecto actualizada'),(190,'52','2016-12-20 17:08:46','1','1','PROYECTO CERRADO.'),(191,'12','2016-12-20 17:24:40','1','4','Informa que aún espera la respuesta de Canadá'),(192,'19','2016-12-20 17:26:42','1','1','Cliente informa que no hay ninguna info de la'),(193,'1','2017-01-06 12:10:03','3','4','no me ha contestado'),(194,'63','2017-01-19 17:27:20','0','','Creación de Prospecto.'),(195,'63','2017-01-19 17:27:55','0','','Información de prospecto actualizada'),(196,'63','2017-01-19 17:29:59','2','3','propuesta recibida a la espera de respuesta');
/*!40000 ALTER TABLE `tbactividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbchangelog`
--

DROP TABLE IF EXISTS `tbchangelog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbchangelog` (
  `idtbchangelog` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(45) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtbchangelog`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbchangelog`
--

LOCK TABLES `tbchangelog` WRITE;
/*!40000 ALTER TABLE `tbchangelog` DISABLE KEYS */;
INSERT INTO `tbchangelog` VALUES (1,'2.0','Primer Release ','2016-10-13 23:19:32'),(2,'2.1','- Cambio a metodo POST para seguridad en la navegación\n- SweetAlert incorporado para mejoras graficas.\n- Mejoras masivas en el Look&Feel','2016-10-13 23:21:58'),(3,'2.3','- Manejo de sesiones. - minor fix Look&Feel. ','2016-10-21 12:37:38'),(4,'2.4',NULL,'2016-11-14 10:45:47'),(5,'2.5',NULL,'2016-12-20 00:40:14');
/*!40000 ALTER TABLE `tbchangelog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientes`
--

DROP TABLE IF EXISTS `tbclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbclientes` (
  `idtbclientes` int(11) NOT NULL AUTO_INCREMENT,
  `rut_cliente` varchar(45) NOT NULL,
  `descripcion` varchar(450) NOT NULL,
  `id_ejecutivo` varchar(45) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1' COMMENT '0: Inactivo\n1: Activo',
  `quality` int(11) DEFAULT '2' COMMENT '1: Gold\n2: Silver\n3: Bronze',
  PRIMARY KEY (`idtbclientes`)
) ENGINE=InnoDB AUTO_INCREMENT=458 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientes`
--

LOCK TABLES `tbclientes` WRITE;
/*!40000 ALTER TABLE `tbclientes` DISABLE KEYS */;
INSERT INTO `tbclientes` VALUES (1,'91806000','ABASTIBLE','2',1,2),(2,'61101021','ACADEMIA POLITECNICA MILITAR ','2',1,2),(3,'61930100','ACADEMIA POLITECNICA NAVAL ','3',1,2),(4,'98000000','ADMINISTRADORA DE FONDOS DE PENSIONES CAPITAL S.A. ','6',1,2),(5,'98001000','ADMINISTRADORA DE FONDOS DE PENSIONES CUPRUM S.A.','2',1,2),(6,'98000100','ADMINISTRADORA DE FONDOS DE PENSIONES HABITAT S.A.','2',1,2),(7,'98000400','ADMINISTRADORA DE FONDOS DE PENSIONES PROVIDA ','2',1,2),(8,'94272000','AES GENER','2',1,2),(9,'96900690','AGROFOODS CENTRAL VALLEY CHILE S.A.','2',1,2),(10,'96656430','ALBIA S.A','7',1,2),(11,'76154260','AMINCO S.A.','7',1,2),(12,'93920000','ANTOFAGASTA MINERALS ','7',1,2),(13,'79622910','ARIZTIA','2',1,2),(14,'61102021','ARMADA DE CHILE','2',1,2),(15,'78423860','ARMAS GESTION LIMITADA ','6',1,2),(16,'77497650','ARTECOLA CHILE S.A.','2',1,2),(17,'78923270','ASESORIAS E INVERSIONES AMERICAN EXPRESS CHILE LIMITADA','6',1,2),(18,'71156600','ASEXMA','2',1,2),(19,'76086318','ATEM ','7',1,2),(20,'97006000','BANCO BCI','7',1,2),(21,'97036000','BANCO SANTANDER','2',1,2),(22,'96935470','BARANDA Y COMPAÑIA ABOGADOS ','3',1,2),(23,'95207000','BECHTEL CHILE LIMITADA','6',1,2),(24,'78591370','BETHIA S A','2',1,2),(25,'60203000','BIBLIOTECA DEL CONGRESO NACIONAL ','6',1,2),(26,'70786100','BRADFORD SCHOOL','5',1,2),(27,'86431800','BRINKS CHILE','2',1,2),(28,'60202000','CAMARA DE DIPUTADOS ','3',1,2),(29,'93458000','CELULOSA ARAUCO Y CONSTITUCIÓN S.A.','2',1,2),(30,'93834000','CENCOSUD','2',1,2),(31,'61608700','CENTRAL DE ABASTECIMIENTO S.N.S.S - CENABAST ','6',1,2),(32,'65273020','CENTRO CLINICO MILITAR VALDIVIA ','2',1,2),(33,'96698350','CENTRO MEDICO SANTA CATALINA ','7',1,2),(34,'60706000','CENTRO NACIONAL PARA LA INNOVACIÓN Y FOMENTO ','7',1,2),(35,'96989120','CERVECERA CCU CHILE LTDA.','6',1,2),(36,'76424440','CHANNELS MEDIA S.A.','6',1,2),(37,'96606750','CLINICA ALEMANA DE TEMUCO','5',1,2),(38,'90753000','CLÍNICA SANTA MARÍA','2',1,2),(39,'61704000','CODELCO ANDINA','7',0,2),(40,'81592700','COLEGIO ALEMAN DE CONCEPCION','5',1,2),(41,'99551110','COLEGIO DUNALASTAIR VALLE NORTE SPA','5',1,2),(42,'61102019','COMANDANCIA EN JEFE DE LA ARMADA ','2',1,2),(43,'78469420','COMERCIAL E INDUSTRIAL ACCURATEK S A','2',1,2),(44,'76096477','COMERCIAL ONAK SYSTEMS LIMITADA ','3',1,2),(45,'61978810','COMISIÓN NACIONAL DE ACREDITACIÓN ','7',1,2),(46,'60915000','COMISIÓN NACIONAL DE INVESTIGACIÓN CIENTÍFICA Y TEC.','7',1,2),(47,'60718000','COMISIÓN NACIONAL DE RIEGO','7',1,2),(48,'59000710','COMPANIA MINERA BARRICK CHILE LIMITADA','6',1,2),(49,'96567040','COMPANIA MINERA TECK QUEBRADA BLANCA S.A.','7',1,2),(50,'70200200','COMPAÑÍA HIJAS DE LA CARIDAD ','7',1,2),(51,'77116500','COMPAÑÍA MINERA CASALE','7',1,2),(52,'94621000','COMPAÑÍA MINERA CERRO COLORADO LTDA.','2',1,2),(53,'78928380','COMPAÑÍA MINERA MANTOS DE ORO','6',1,2),(54,'78095890','COMPAÑÍA MINERA MARICUNGA','2',1,2),(55,'78512520','COMPAÑÍA MINERA XSTRATA LOMAS BAYAS','6',1,2),(56,'94637000','COMPAÑIA SIDERURGICA HUACHIPATO S.A. ','3',1,2),(57,'90160000','COMPAÑÍA SUDAMERICANA DE VAPORES (CSAV)','6',1,2),(58,'60919000','CONSEJO DE RECTORES DE LAS UNIVERSIDADES ','5',1,2),(59,'60901002','CONSEJO NACIONAL DE LA CULTURA Y LAS ARTES','6',1,2),(60,'60400000','CONTRALORIA GENERAL DE LA REPUBLICA ','6',1,2),(61,'60301001','CORPORACIÓN ADMINISTRATIVA DEL PODER JUDICIAL ','7',1,2),(62,'60706000','CORPORACIÓN DE FOMENTO DE LA PRODUCCIÓN','7',1,2),(63,'72368400','CORPORACION DE SALUD Y DESARROLLO SOCIAL ','3',1,2),(64,'70005730','CORPORACION EDUCACIONAL ALIANZA FRANCESA','7',1,2),(65,'71309800','CORPORACION MUNICIPAL DE EDUCACION ','2',1,2),(66,'70859400','CORPORACION MUNICIPAL DE VALPARAISO PARA EL DESARROLLO SOCIAL','2',1,2),(67,'61704000','CORPORACIÓN NACIONAL DEL COBRE DE CHILE','7',1,2),(68,'95358000','CRAIGHOUSE SCHOOL','5',1,2),(69,'61953200','CRS CORDILLERA','7',1,2),(70,'61975700','CRS MAIPU','2',1,2),(71,'61933400','CRS SALVADOR ALLENDE','2',1,2),(72,'80276200','DELOITTE AUDITORES Y CONSULTORES LTDA','6',1,2),(73,'69150601','DEPARTAMENTO DE SALUD HUALQUI ','7',1,2),(74,'94141000','DERCO S.A.','6',1,2),(75,'60905000','DIRECCIÓN DE BIBLIOTECAS ARCHIVOS Y MUSEOS ','6',1,2),(76,'61979960','DIRECCION DE EDUCACION DOCTRINA E HISTORIA DE CARABINEROS ','3',1,2),(77,'70020190','DIRECCIÓN DE PROMOCIÓN DE EXPORTACIONES (PROCHILE)','2',1,2),(78,'61104000','DIRECCIÓN GENERAL DE AERONÁUTICA CIVIL ','7',1,2),(79,'61004000','DIRECCIÓN GENERAL DE GENDARMERÍA DE CHILE ','7',1,2),(80,'61938500','DIRECCIÓN LOGISTICA DE CARABINEROS DE CHILE ','3',1,2),(81,'61004098','DIRECCION REGIONAL GENDARMERIA PUERTO MONTT. ','3',1,2),(82,'99597170','DOMINION SPA','2',1,2),(83,'61101045','EJERCITO DE CHILE','7',1,2),(84,'61101010','EJERCITO DE CHILE V DIVISION PUNTA ARENAS','7',1,2),(85,'61219000','EMPRESA DE TRANSPORTE DE PASAJEROS METRO S.A ','3',1,2),(86,'92580000','EMPRESA NACIONAL DE TELECOMUNICACIONES SA ','3',1,2),(87,'90266000','ENAEX S.A. ','3',1,2),(88,'96672640','ENTEL SERVICIOS EMPRESARIALES S.A. ','3',1,2),(89,'61004035','ESCUELA DE GENDARMERIA DE CHILE ','3',1,2),(90,'83198500','ESTABLECIMIENTOS EDUCACIONALES SAN GABRIEL S A','5',1,2),(91,'89900400','ESVAL S.A','2',1,2),(92,'76236142','EVENTECH SPA ','2',1,2),(93,'77424780','EWOS CHILE ALIMENTOS LIMITADA. ','3',1,2),(94,'78604410','EXPEDITORS CHILE TRANSPORTES INTERNACIONALES LIMITADA','6',1,2),(95,'90749000','FALABELLA','2',1,2),(96,'69500502','FAO REG. OFF. FOR LATIN AMERICA AND THE CARIBBEAN','6',1,2),(97,'81148200 ','FERROCARRIL DE ANTOFAGASTA A BOLIVIA ','7',1,2),(98,'96684580','FERROCARRIL DEL PACÍFICO S.A.','7',1,2),(99,'61216000','FERROCARRILES DEL ESTADO','2',1,2),(100,'61978830','FF 07 ALMIRANTE LYNCH ','3',1,2),(101,'60109000','FONDO DE SOLIDARIDAD E INVERSION SOCIAL ','3',1,2),(102,'61603000','FONDO NACIONAL DE SALUD ','6',1,2),(103,'77205750','FUENZALIDA Y WONG LTDA. ','3',1,2),(104,'81839900','FUND EDUCACIONAL SANTIAGO COLLEGE','5',1,2),(105,'72754700','FUNDACIÓN INSTITUTO PROFESIONAL DUOC UC ','6',1,2),(106,'71238300','FUNDACIÓN TELETON ','7',1,2),(107,'61004108','GENDARMERIA DE CHILE SERVICIO DE BIENESTAR ','7',1,2),(108,'76129094','GEOPARK FELL SPA ','3',1,2),(109,'92176000','GERDAU AZA','2',1,2),(110,'77305910','GMS PRODUCTOS GRÁFICOS LIMITADA ','3',1,2),(111,'76788080','GNL QUINTERO','2',1,2),(112,'72224100','GOBIERNO REGIONAL DE ANTOFAGASTA ','6',1,2),(113,'72235100','GOBIERNO REGIONAL V REGIÓN ','3',1,2),(114,'99513400','GRUPO CGE','2',1,2),(115,'79999850','HAROLDO FUENTEALBA ESPINOZA Y OTRO LTDA. ','3',1,2),(116,'78803490','HENKEL CHILE LIMITADA','2',1,2),(117,'61602260','HOSPITAL BASE OSORNO ','6',1,2),(118,'65075485','HOSPITAL CLINICO METROPOLITANO DE LA FLORIDA DOCTORA ELOISA ','7',1,2),(119,'61602222','HOSPITAL DE ANGOL ','7',1,2),(120,'61601000','HOSPITAL DEL SALVADOR (VALPARAÍSO)','7',1,2),(121,'61602232','HOSPITAL DOCTOR HERNÁN HENRÍQUEZ ARAVENA ','3',1,2),(122,'61608104','HOSPITAL DR. LUCIO CÓRDOVA','6',1,2),(123,'61602213','HOSPITAL INTERCULTURAL KALLVU LLANKA ','3',1,2),(124,'61958500','HOSPITAL PADRE ALBERTO HURTADO ','6',1,2),(125,'61607508','HOSPITAL RÍO BUENO ','7',1,2),(126,'61606608','HOSPITAL SAN MARTIN DE QUILLOTA ','2',1,2),(127,'69010100','ILUSTRE MUNICIPALIDAD DE ARICA','2',1,2),(128,'69240100','ILUSTRE MUNICIPALIDAD DE AYSEN ','2',1,2),(129,'69231100','ILUSTRE MUNICIPALIDAD DE CHAITEN ','2',1,2),(130,'69240200','ILUSTRE MUNICIPALIDAD DE CISNES ','2',1,2),(131,'69030200','ILUSTRE MUNICIPALIDAD DE COPIAPO ','7',1,2),(132,'69240300','ILUSTRE MUNICIPALIDAD DE COYHAIQUE ','2',1,2),(133,'69100100','ILUSTRE MUNICIPALIDAD DE CURICO','2',1,2),(134,'69073000','ILUSTRE MUNICIPALIDAD DE EL MONTE ','7',1,2),(135,'69254300','ILUSTRE MUNICIPALIDAD DE ESTACION CENTRAL','2',1,2),(136,'69190200','ILUSTRE MUNICIPALIDAD DE GALVARINO','7',1,2),(137,'69071900','ILUSTRE MUNICIPALIDAD DE ISLA DE MAIPO ','3',1,2),(138,'69072400','ILUSTRE MUNICIPALIDAD DE LA GRANJA ','7',1,2),(139,'69040100','ILUSTRE MUNICIPALIDAD DE LA SERENA','2',1,2),(140,'69201100','ILUSTRE MUNICIPALIDAD DE LAGO RANCO','2',1,2),(141,'69170300','ILUSTRE MUNICIPALIDAD DE LAJA ','7',1,2),(142,'69080800','ILUSTRE MUNICIPALIDAD DE LAS CABRAS','2',1,2),(143,'69130300','ILUSTRE MUNICIPALIDAD DE LINARES ','2',1,2),(144,'69060400','ILUSTRE MUNICIPALIDAD DE LLAY LLAY ','2',1,2),(145,'69255200','ILUSTRE MUNICIPALIDAD DE LO BARNECHEA','7',1,2),(146,'69254100','ILUSTRE MUNICIPALIDAD DE LO PRADO ','3',1,2),(147,'69200400','ILUSTRE MUNICIPALIDAD DE MARIQUINA ','6',1,2),(148,'69170701','ILUSTRE MUNICIPALIDAD DE NACIMIENTO DPTO COMUN ','2',1,2),(149,'69040700','ILUSTRE MUNICIPALIDAD DE OVALLE','2',1,2),(150,'69072600','ILUSTRE MUNICIPALIDAD DE PAINE ','7',1,2),(151,'69071300','ILUSTRE MUNICIPALIDAD DE QUILICURA SECPLAN','2',1,2),(152,'69060700','ILUSTRE MUNICIPALIDAD DE QUINTERO ','3',1,2),(153,'69100400','ILUSTRE MUNICIPALIDAD DE RAUCO ','2',1,2),(154,'69254800','ILUSTRE MUNICIPALIDAD DE RECOLETA ','7',1,2),(155,'69071200','ILUSTRE MUNICIPALIDAD DE RENCA','2',1,2),(156,'69081300','ILUSTRE MUNICIPALIDAD DE REQUINOA ','2',1,2),(157,'69190600','ILUSTRE MUNICIPALIDAD DE SAAVEDRA','6',1,2),(158,'69041400','ILUSTRE MUNICIPALIDAD DE SALAMANCA ','6',1,2),(159,'69252500','ILUSTRE MUNICIPALIDAD DE SAN PEDRO DE ATACAMA ','7',1,2),(160,'69070100','ILUSTRE MUNICIPALIDAD DE SANTIAGO ','4',1,2),(161,'69160700','ILUSTRE MUNICIPALIDAD DE TIRUA','6',1,2),(162,'69200100','ILUSTRE MUNICIPALIDAD DE VALDIVIA ','6',1,2),(163,'69255600','ILUSTRE MUNICIPALIDAD DE VITACURA','2',1,2),(164,'69070900','ILUSTRE MUNICIPALIDAD MAIPU','8',1,2),(165,'61955000','ILUSTRE MUNICIPALIDAD PADRE LAS CASAS','2',1,2),(166,'61307000','INSTITUTO DE DESARROLLO AGROPECUARIO','2',1,2),(167,'61605000','INSTITUTO DE SALUD PÚBLICA DE CHILE','2',1,2),(168,'61533000','INSTITUTO DE SEGURIDAD LABORAL ','7',1,2),(169,'61311000','INSTITUTO FORRESTAL (INFOR)','2',1,2),(170,'96689620','INSTITUTO HEBREO ','6',1,2),(171,'65028707','INSTITUTO NACIONAL DE DERECHOS HUMANOS ','6',1,2),(172,'60110000','INSTITUTO NACIONAL DE LA JUVENTUD (INJUV)','2',1,2),(173,'65999669','INSTITUTO NACIONAL DE PROPIEDAD INDUSTRIAL (INAPI)','2',1,2),(174,'79860950','INSTITUTO PROFESIONAL ARCOS','5',1,2),(175,'78205980','INSTITUTO PROFESIONAL LOS LEONES ','5',1,2),(176,'76092207','INTEGRACIÓN DE TECNOLOGÍAS ITQ LIMITADA ','3',1,2),(177,'79775550','IPCHILE','5',1,2),(178,'96522500','ISAPRE MÁSVIDA','2',1,2),(179,'70072600','JUNJI','2',1,2),(180,'96978000','KAPSCH TRAFFICCOM CHILE S.A. ','3',1,2),(181,'78833980','KEFA TECNOLOGIA','2',1,2),(182,'96843130','KOMATSU CUMMINS CHILE LTDA.','6',1,2),(183,'93135000','LABORATORIO BAGO DE CHILE S.A. ','2',1,2),(184,'76178737','LABORATORIO NEXTFARMA LIMITADA','2',1,2),(185,'91650000','LABORATORIO SAVAL','2',1,2),(186,'96944330','LABORATORIOS GARDEN HOUSE CHILE S A','2',1,2),(187,'89862200','LATAM AIRLINES GROUP S.A.','2',1,2),(188,'78114650','LECHNER Y COMPANIA LIMITADA','2',1,2),(189,'96874380','LOGISTICA LINSA S.A.','2',1,2),(190,'85272800','LUNDING MINING CORPORATION (MIN.CANDELARIA)','6',1,2),(191,'92730000','MAESTRANZA DIESEL S.A.','2',1,2),(192,'76179187','MARFOOD S.A. ','3',1,2),(193,'96802690','MASISA S.A ','7',1,2),(194,'76318798','MBA LAZARD CHILE','7',1,2),(195,'59057230','MCKINSEY & COMPANY','2',1,2),(196,'77880830','MEJILLONES AMERICA ','7',1,2),(197,'59043540','MERCK CHILE','2',1,2),(198,'94405000','MERRILL LYNCH ','2',1,2),(199,'80993900','MERRILL LYNCH CORREDORES DE BOLSA SPA ','3',1,2),(200,'99289000','METLIFE','2',1,2),(201,'94099000','MICROSYSTEM','5',1,2),(202,'76727040','MINERA CENTINELA ','3',1,2),(203,'96508670','MINERA MERIDIAN','2',1,2),(204,'91840000','MINERA MICHILLA','2',1,2),(205,'86542100','MINERA SPENCE','2',1,2),(206,'85758600','MINERA ZALDÍVAR','2',1,2),(207,'76821240','MINERALES DEL SUR','2',1,2),(208,'61301000','MINISTERIO DE AGRICULTURA','2',1,2),(209,'61402000','MINISTERIO DE BIENES NACIONALES ','6',1,2),(210,'61011000','MINISTERIO DE DEFENSA','2',1,2),(211,'61202000','MINISTERIO DE OBRAS PUBLICAS','2',1,2),(212,'60601000','MINISTERIO DE RELACIONES EXTERIORES ','6',1,2),(213,'60501000','MINISTERIO DEL INTERIOR Y SEGURIDAD PÚBLICA ','6',1,2),(214,'61935400','MINISTERIO PUBLICO','2',1,2),(215,'76080192','MOLCOM TELECOMUNICACIONES LTDA.','7',1,2),(216,'83693800','MONSANTO CHILE S.A. ','2',1,2),(217,'83150900','MULTITIENDAS CORONA S.A.','7',1,2),(218,'78933990','NETSECURE INFORMATICA LIMITADA','7',1,2),(219,'76184070','OSTER DE CHILE COMERCIALIZADORA LTDA . ','3',1,2),(220,'78040120','OUTOTEC CHILE SA','2',1,2),(221,'96510970','PANELES ARAUCO, S.A.','2',1,2),(222,'76017019','MALL PLAZA S.A. ','7',1,2),(223,'81698900','PONTIFICIA UNIVERSIDAD CATOLICA DE CHILE','5',1,2),(224,'81669200','PONTIFICIA UNIVERSIDAD CATOLICA DE VALPARAISO','5',1,2),(225,'78018570','PROCORP','5',1,2),(226,'86731200','QUINTEC CHILE S.A.','7',1,2),(227,'82431300','REDLAND SCHOOL SA Y CIA COMANDITA POR ACCIONES','5',1,2),(228,'85208700','RENTAEQUIPOS LEASING S.A. ','3',1,2),(229,'99501870','RENTAPACK','2',1,2),(230,'77878040','REPRESENTACIONES AEROTECH LTDA. ','7',1,2),(231,'79968900','RYC','6',1,2),(232,'96786880','SACYR CHILE S.A.','6',1,2),(233,'76125157','SACYR OPERACION Y SERVICIOS S.A.','6',1,2),(234,'61308000','SAG','5',1,2),(235,'85937800','SAINT PAUL S SCHOOL SOCIEDAD LIMITADA','5',1,2),(236,'78833980','SALGADO Y COMPAÑIA LTDA. ','3',1,2),(237,'91502000','SALINAS Y FABRE','2',1,2),(238,'96677260','SALMOFOOD SA','7',1,2),(239,'61973900','SANIDAD EJERCITO DE CHILE COSALE ','7',1,2),(240,'96549050','SEGUROS DE VIDA SURA S.A. ','6',1,2),(241,'61601000','SEREMI DE SALUD ANTOFAGASTA','6',1,2),(242,'61601000','SEREMI DE SALUD ARICA Y PARINACOTA','3',1,2),(243,'61601000','SEREMI DE SALUD ATACAMA','2',1,2),(244,'61601000','SEREMI DE SALUD BIO BIO','3',1,2),(245,'61606402','SEREMI DE SALUD COQUIMBO ','6',1,2),(246,'61601000 ','SEREMI DE SALUD DE AYSEN','7',1,2),(247,'61601000','SEREMI DE SALUD DE LA ARAUCANIA','3',1,2),(248,'61601000','SEREMI DE SALUD DE LOS LAGOS','3',1,2),(249,'61601000','SEREMI DE SALUD DE LOS RIOS','3',1,2),(250,'61601000','SEREMI DE SALUD MAGALLANES','3',1,2),(251,'61601000','SEREMI DE SALUD MAULE','2',1,2),(252,'61601000','SEREMI DE SALUD METROPOLITANO','3',1,2),(253,'61601000','SEREMI DE SALUD OHIGGINS','2',1,2),(254,'61601000','SEREMI DE SALUD TARAPACA','7',1,2),(255,'61601000','SEREMI DE SALUD VALPARAISO','2',1,2),(256,'82174900','SERVICIO DE COOPERACION TECNICA ','2',1,2),(257,'72443600','SERVICIO DE EVALUACIÓN AMBIENTAL ','6',1,2),(258,'61002000','SERVICIO DE REGISTRO CIVIL E IDENTIFICACION ','7',1,2),(259,'61606700','SERVICIO DE SALUD ACONCAGUA ','7',1,2),(260,'61606200','SERVICIO DE SALUD ANTOFAGASTA','6',1,2),(261,'61606201','SERVICIO DE SALUD ANTOFAGASTA (HOSPITAL DE ANTOFAGASTA)','6',1,2),(262,'61606202','SERVICIO DE SALUD ANTOFAGASTA (HOSPITAL DE CALAMA)','6',1,2),(263,'61955100','SERVICIO DE SALUD ARAUCANIA NORTE ','7',1,2),(264,'61607400','SERVICIO DE SALUD ARAUCANIA SUR','2',1,2),(265,'61954500','SERVICIO DE SALUD ARAUCO ','6',1,2),(266,'61606300','SERVICIO DE SALUD ATACAMA ','2',1,2),(267,'61607800','SERVICIO DE SALUD AYSEN','3',1,2),(268,'61607300','SERVICIO DE SALUD BIO BIO ','2',1,2),(269,'61979210','SERVICIO DE SALUD CHILOE','3',1,2),(270,'61606400','SERVICIO DE SALUD COQUIMBO','6',1,2),(271,'61606000','SERVICIO DE SALUD DE ARICA ','3',1,2),(272,'61607100','SERVICIO DE SALUD DE CONCEPCIÓN ','3',1,2),(273,'61607700','SERVICIO DE SALUD DEL RELONCAVÍ ','2',1,2),(274,'61606100','SERVICIO DE SALUD IQUIQUE','2',1,2),(275,'61606800','SERVICIO DE SALUD LIBERTADOR BDO OHIGGINS','3',1,2),(276,'61607900','SERVICIO DE SALUD MAGALLANES ','7',1,2),(277,'61606900','SERVICIO DE SALUD MAULE ','6',1,2),(278,'61608600','SERVICIO DE SALUD METROPOLITANO CENTRAL','7',1,2),(279,'61608000','SERVICIO DE SALUD METROPOLITANO NORTE','2',1,2),(280,'61608200','SERVICIO DE SALUD METROPOLITANO OCCIDENTE ','2',1,2),(281,'61608101','SERVICIO DE SALUD METROPOLITANO SUR','6',1,2),(282,'61608101','SERVICIO DE SALUD METROPOLITANO SUR (HOSPITAL BARROS LUCO-TRUDEAU)','3',1,2),(283,'61608500','SERVICIO DE SALUD METROPOLITANO SUR ORIENTE  ','7',1,2),(284,'61607000','SERVICIO DE SALUD ÑUBLE ','6',1,2),(285,'61608406','SERVICIO DE SALUD ORIENTE','6',1,2),(286,'61607600','SERVICIO DE SALUD OSORNO ','7',1,2),(287,'61607200','SERVICIO DE SALUD TALCAHUANO','7',1,2),(288,'61607500','SERVICIO DE SALUD VALDIVIA ','6',1,2),(289,'61606500','SERVICIO DE SALUD VALPARAÍSO SAN ANTONIO ','6',1,2),(290,'61606609','SERVICIO DE SALUD VINA DEL MAR QUILLOTA ','6',1,2),(291,'61702000','SERVICIO NACIONAL DE GEOLOGÍA Y MINERÍA ','6',1,2),(292,'72576700','SERVICIO NACIONAL DE LA DISCAPACIDAD (SENADIS)','2',1,2),(293,'60107000','SERVICIO NACIONAL DE LA MUJER (SERNAM)','2',1,2),(294,'60704000','SERVICIO NACIONAL DE TURISMO (SERNATUR)','2',1,2),(295,'61961000','SERVICIO NACIONAL DEL ADULTO MAYOR','6',1,2),(296,'76250123','SERVICIOS DE TELECOMUNICACIONES NETRIUM TELECOM LIMITADA','2',1,2),(297,'96777170','SKRENTAL','7',1,2),(298,'76213076','SOCIEDAD CONCESIONARIA RUTA DEL ALGARROBO S.A.','6',1,2),(299,'76172397','SOCIEDAD CONCESIONARIA RUTAS DEL DESIERTO S.A.','6',1,2),(300,'76317736','SOCIEDAD CONCESIONARIA SALUD SIGLO XXI S.A','6',1,2),(301,'76172387','SOCIEDAD CONCESIONARIA VALLES DEL BIO BIO S.A.','6',1,2),(302,'78092750','SOCIEDAD EDUCACIONAL SAINT JOHNS SCHOOL COMPANIA LIMITADA','5',1,2),(303,'81414100','SOCIEDAD INSTITUTO ALEMÁN DE VALDIVIA ','3',1,2),(304,'76541630','SOCIEDAD PUNTA DE LOBOS','2',1,2),(305,'76056178','SOPORTE Y GESTION EN INFORMATICA LTDA','6',1,2),(306,'79947100','SOQUIMICH','2',1,2),(307,'76047102','SUATRANS CHILE, S.A.','2',1,2),(308,'60515000','SUBSECRETARIA DE DESARROLLO REGIONAL Y ADMINISTRATIVO (SUBDERE)','2',1,2),(309,'61701000','SUBSECRETARIA DE MINERÍA','2',1,2),(310,'60719000','SUBSECRETARIA DE PESCA ','3',1,2),(311,'61975700','SUBSECRETARÍA DE REDES ASISTENCIALES ','6',1,2),(312,'61601000','SUBSECRETARIA DE SALUD PUBLICA ','6',1,2),(313,'61979930','SUBSECRETARÍA DEL MEDIO AMBIENTE ','3',1,2),(314,'60901000','SUBSECRETARIA DEL MINISTERIO DE EDUCACION PUBLICA','2',1,2),(315,'61801000','SUBSECRETARIA DEL MINISTERIO DE LA VIVIENDA Y URBANISMO','7',1,2),(316,'60101000','SUBSECRETARÍA GENERAL DE GOBIERNO (SEGEGOB)','2',1,2),(317,'96995150','SURA DATA CHILE','6',1,2),(318,'76130712','SYNAPSIS SOLUCIONES Y SERVICIOS IT LTDA. ','2',1,2),(319,'76385060','TATA CONSULTANCY SERVICES CHILE S.A.','2',1,2),(320,'76072701','TECNOFARMA','2',1,2),(321,'76071387','TECNOVISUAL LTDA. ','3',1,2),(322,'96574420','TEGA ACOTEC S.A. ','3',1,2),(323,'90805000','THE GRANGE SCHOOL','5',1,2),(324,'71299600','THE MACKAY SCHOOL','5',1,2),(325,'96791290','THE MAYFLOWER SCHOOL','5',1,2),(326,'99509360','THE WESSEX SCHOOL','5',1,2),(327,'76335319','TOTAL NUEVAS ENERGÍAS CHILE SPA ','3',1,2),(328,'76300290','TRANSACTION LINE CHILE S.A. ','3',1,2),(329,'96689310','TRANSBANK ','6',1,2),(330,'77219710','TREBULCO SCHOOL','5',1,2),(331,'76037893','ULTIMAMILLA REDES CHILE LIMITADA','5',1,2),(332,'69500501','UNESCO ','6',1,2),(333,'78042900','UNIVERSAL MUSIC SA ','3',1,2),(334,'71543200','UNIVERSIDAD ADOLFO IBAÑEZ','5',1,2),(335,'73923400','UNIVERSIDAD ALBERTO HURTADO','5',1,2),(336,'71540100','UNIVERSIDAD ANDRES BELLO ','5',1,2),(337,'71733500','UNIVERSIDAD ARCIS ','5',1,2),(338,'70777500','UNIVERSIDAD ARTURO PRAT','8',1,2),(339,'81380500','UNIVERSIDAD AUSTRAL','5',1,2),(340,'71633300','UNIVERSIDAD AUTONOMA DE CHILE','5',1,2),(341,'81518400','UNIVERSIDAD CATOLICA  DEL NORTE','5',1,2),(342,'71918700','UNIVERSIDAD CATOLICA DE TEMUCO','5',1,2),(343,'71918300','UNIVERSIDAD CATOLICA DEL MAULE','5',1,2),(344,'71912200','UNIVERSIDAD CATOLICA SILVA HENRIQUEZ','5',1,2),(345,'70995200','UNIVERSIDAD CENTRAL','5',1,2),(346,'71639300','UNIVERSIDAD DE ACONCAGUA','5',1,2),(347,'70791800','UNIVERSIDAD DE ANTOFAGASTA ','8',1,2),(348,'71236700','UNIVERSIDAD DE ATACAMA','5',1,2),(349,'60910000','UNIVERSIDAD DE CHILE','5',1,2),(350,'60910000','UNIVERSIDAD DE CHILE (DECANATO - FACULTAD DE FILOSOFÍA Y HUMANIDADES)','5',1,2),(351,'60910000','UNIVERSIDAD DE CHILE (FACULTAD DE ECONOMIA Y NEGOCIOS)','2',1,2),(352,'60910000','UNIVERSIDAD DE CHILE (FCFM DEPARTAMENTO DE INGENIERIA ELECTRICA)','5',1,2),(353,'60910000','UNIVERSIDAD DE CHILE (VEX ARCHIVO CENTRAL)','5',1,2),(354,'81494400','UNIVERSIDAD DE CONCEPCION','3',1,2),(355,'87912900','UNIVERSIDAD DE LA FRONTERA','8',1,2),(356,'71915800','UNIVERSIDAD DE LA SANTISIMA CONCEPCION','5',1,2),(357,'70783100','UNIVERSIDAD DE LA SERENA','8',1,2),(358,'71614000','UNIVERSIDAD DE LOS ANDES','5',1,2),(359,'70772100','UNIVERSIDAD DE LOS LAGOS','5',1,2),(360,'71133700','UNIVERSIDAD DE MAGALLANES','8',1,2),(361,'60911000','UNIVERSIDAD DE SANTIAGO DE CHILE ','8',1,2),(362,'70885500','UNIVERSIDAD DE TALCA','8',1,2),(363,'70770800','UNIVERSIDAD DE TARAPACA','8',1,2),(364,'60921000','UNIVERSIDAD DE VALPARAISO','8',1,2),(366,'60911006','UNIVERSIDAD DEL BIO-BIO','5',1,2),(367,'60911006','UNIVERSIDAD DEL BIO-BIO (VICERRECTORIA DE ECONOMIA)','2',1,2),(368,'71644300','UNIVERSIDAD DEL DESARROLLO','5',1,2),(369,'71704700','UNIVERSIDAD DEL PACIFICO','5',1,2),(370,'70990700','UNIVERSIDAD DIEGO PORTALES ','5',1,2),(371,'70771500','UNIVERSIDAD GABRIELA MISTRAL ','5',1,2),(372,'71500500','UNIVERSIDAD MAYOR','5',1,2),(373,'70754700','UNIVERSIDAD PLAYA ANCHA','8',1,2),(374,'71631900','UNIVERSIDAD SAN SEBASTIAN','5',1,2),(375,'71551500','UNIVERSIDAD SANTO TOMAS','5',1,2),(376,'81668700','UNIVERSIDAD TECNICA FEDERICO SANTA MARIA VALPARAISO','5',1,2),(377,'72012000','UNIVERSIDAD TECNOLÓGICA DE CHILE INACAP','6',1,2),(378,'71618900','UNIVERSIDAD UCINF','5',1,2),(379,'71629400','UNIVERSIDAD VIÑA DEL MAR','5',1,2),(380,'70729100','UTEM','5',1,2),(381,'76058647','VERISURE CHILE SPA ','3',1,2),(382,'90227000','VIÑA CONCHA Y TORO','2',1,2),(383,'86326300','VIÑA CONO SUR','2',1,2),(384,'91041000','VIÑA SAN PEDRO TARAPACÁ','2',1,2),(385,'86547900','VIÑA SANTA RITA','2',1,2),(386,'96512200','VIÑEDOS EMILIANA  SA','2',1,2),(387,'96677260','VITAPRO ','7',1,2),(388,'76284920','VOLVO CHILE SPA','6',1,2),(389,'12873312','XIMENA LORETO OSORIO SOTO ','3',1,2),(390,'88325800','XSTRATA COPPER CHILE','2',1,2),(391,'60505101','XV ZONA DE CARABINEROS ARICA Y PARINACOTA ','7',1,2),(392,'80326500','OXIQUIM S.A.','2',1,2),(393,'76644010','INVERSIONES Y SERVICIOS DENTALES S.A.','3',1,2),(394,'61608107','SERVICIO DE SALUD SUR HOSPITAL SANATORIO EL PINO','3',1,2),(395,'61980530','UNIVERSIDAD DE OHIGGINS','2',1,2),(396,'69120200','ILUSTRE MUNICIPALIDAD DE EMPEDRADO','2',1,2),(397,'60905000','MUSEO NACIONAL DE HISTORIA NATURAL','2',1,2),(398,'61608604','SERV SALUD METROPOLITANO CENTRAL HOSPITAL CLINICO SAN BORJA ARRIARAN','2',1,2),(399,'72221800','SEREMI DE REGION DE LOS LAGOS ','2',1,2),(400,'60505000','CARABINEROS DE CHILE (PREFECTURA DE LA INFANCIA)','2',1,2),(401,'96789280','ILUSTRE MUNICIPALIDAD DE MEJILLONES ','2',1,2),(402,'76009911','VOITH','6',1,2),(403,'96616770','KIBERNUM','7',1,2),(404,'76804710','COINTER','7',1,2),(405,'76545608','WEBER-STEPHEN CHILE','6',1,2),(406,'65620850','CONSEJO REGIONAL DE CULTURA REGION AYSEN','8',1,2),(407,'61972500','CONSEJO REGIONAL DE LA CULTURA Y LAS ARTES DE MAGALLANES ','8',1,2),(408,'70300000','FUNDACION CHILE','8',1,2),(409,'69040400','I MUNICIPALIDAD DE ANDACOLLO','8',1,2),(410,'69180100','I MUNICIPALIDAD DE ANGOL','8',1,2),(411,'69160100','I MUNICIPALIDAD DE ARAUCO','8',1,2),(412,'69181100','I MUNICIPALIDAD DE LONQUIMAY','8',1,2),(413,'69180300','I MUNICIPALIDAD DE LOS SAUCES','8',1,2),(414,'69041500','I MUNICIPALIDAD DE LOS VILOS','8',1,2),(415,'69180800','I MUNICIPALIDAD DE LUMACO','8',1,2),(416,'69220500','I MUNICIPALIDAD DE MAULLIN','8',1,2),(417,'69072900','I MUNICIPALIDAD DE MELIPILLA','8',1,2),(418,'69040800','I MUNICIPALIDAD DE MONTEPATRIA','8',1,2),(419,'69080500','I MUNICIPALIDAD DE MOSTAZAL','8',1,2),(420,'69080100','I MUNICIPALIDAD DE RANCAGUA','8',1,2),(421,'69190400','I MUNICIPALIDAD DE NUEVA IMPERIAL','8',1,2),(422,'69081400','I MUNICIPALIDAD DE OLIVAR','8',1,2),(423,'69261400','I MUNICIPALIDAD DE PADRE HURTADO','8',1,2),(424,'69231300','I MUNICIPALIDAD DE PALENA','8',1,2),(425,'69091000','I MUNICIPALIDAD DE PALMILLA','8',1,2),(426,'69050300','I MUNICIPALIDAD DE PAPUDO','8',1,2),(427,'69252700','I MUNICIPALIDAD DE PELLUHUE (SALUD)','8',1,2),(428,'69254000','I MUNICIPALIDAD DE PENALOLEN','8',1,2),(429,'69091500','I MUNICIPALIDAD DE PERALILLO','8',1,2),(430,'69190300','I MUNICIPALIDAD DE PERQUENCO','8',1,2),(431,'69050500','I MUNICIPALIDAD DE PETORCA','8',1,2),(432,'69010400','I MUNICIPALIDAD DE PICA','8',1,2),(433,'69091200','I MUNICIPALIDAD DE PICHILEMU','8',1,2),(434,'69141000','I MUNICIPALIDAD DE PINTO','8',1,2),(435,'69191300','I MUNICIPALIDAD DE PITRUFQUEN','8',1,2),(436,'69140200','I MUNICIPALIDAD DE PORTEZUELO','8',1,2),(437,'69070300','I MUNICIPALIDAD DE PROVIDENCIA','8',1,2),(438,'69060800','I MUNICIPALIDAD DE PUCHUNCAVI','8',1,2),(439,'69072100','I MUNICIPALIDAD DE PUENTE ALTO','8',1,2),(440,'69220100','I MUNICIPALIDAD DE PUERTO MONTT','8',1,2),(441,'69220200','I MUNICIPALIDAD DE PUERTO VARAS','8',1,2),(442,'69090800','I MUNICIPALIDAD DE PUMANQUE','8',1,2),(443,'69230800','I MUNICIPALIDAD DE PUQUELDON','8',1,2),(444,'69180200','I MUNICIPALIDAD DE PUREN','8',1,2),(445,'69210500','I MUNICIPALIDAD DE PURRANQUE','8',1,2),(446,'61308000','SERVICIO AGRICOLA Y GANADERO ','8',1,2),(447,'61308000','SAG - Bio Bio','8',1,2),(448,'61308000','SAG - Los Lagos','8',1,2),(449,'61308000','SAG - Maule','8',1,2),(450,'61923000','SERPLAC III Región','8',1,2),(451,'60103006','SERPLAC IV REGION','8',1,2),(452,'60103007','SERPLAC VIII Región','8',1,2),(453,'60103003','SERPLAC XII Región','8',1,2),(454,'60701000','SUBSECRETARIA DE ECONOMIA Y EMPRESAS DE MENOR TAMANO','8',1,2),(455,'61979830','SUBSECRETARIA DE ENERGIA ','8',1,2),(456,'61980140','SUBSECRETARIA DE PREVENSION DEL DELITO ','8',1,2),(457,'60910047','UNIVERSIDAD METROPOLITANA DE CIENCIAS DE LA EDUCACION','8',1,2);
/*!40000 ALTER TABLE `tbclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcontactos`
--

DROP TABLE IF EXISTS `tbcontactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcontactos` (
  `idtbcontactos` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(45) NOT NULL,
  `nombre_contacto` varchar(45) DEFAULT NULL,
  `cargo_contacto` varchar(45) DEFAULT NULL,
  `correo_contacto` varchar(45) DEFAULT NULL,
  `telefono_contacto` varchar(45) DEFAULT NULL,
  `id_ejecutivo` varchar(45) DEFAULT NULL,
  `activo` int(11) DEFAULT '1' COMMENT '0:\n1:Activo',
  PRIMARY KEY (`idtbcontactos`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcontactos`
--

LOCK TABLES `tbcontactos` WRITE;
/*!40000 ALTER TABLE `tbcontactos` DISABLE KEYS */;
INSERT INTO `tbcontactos` VALUES (1,'327','Ana Maria Gomez','Office Manager','ana-maria.gomez@total-chile.com',' 56975482067','3',1),(2,'272','Marcial Saez','Depto. Recursos Fisicos','msaez@ssconcepcion.cl','56942657989','3',1),(3,'272','Cristian Carrasco','Unidad Soporte y Desarrollo','cristiancarrasco@ssconcepcion.cl','56-41-268 8410','3',1),(4,'272','Solange Aedo','Enc. Instalaciones','solange.aedo.s@gmail.com','56977809633','3',1),(5,'354','Felipe Parada','Profesor Instructor','felipeparada@udec.cl','56-412207448','3',1),(6,'269','Javier Medina','Jefe Depto Informatica','javier.medina@redsalud.gov.cl','56-65-327800','3',1),(7,'354','Esperanza Perez','Secre Unidad de Telemedicina','esperanza@udec.cl','56-412207448','3',1),(8,'354','Angelica Avendaño','Directora Telemedicina UdeC','aavenda@udec.cl','56-412207448','3',1),(9,'327','Alex Guzman','Business Technology','alex.guzman@sunpower.com','56977600688','3',1),(10,'327','Antoine Liane','Project Development Manager','Antoine.Liane@sunpower.com','5692322590','3',1),(11,'126','DAVID HEVIA ','ADM. CONTRATOS CLINICOS Y SUPERVISOR DE BODEG','david.hevia@redsalud.gov.cl','332298037','2',1),(12,'216','CARLOS MEDEL ','IT INFRASTRUCTURE COORDINATOR','carlos.medel@monsanto.cl','222002388','2',1),(13,'216','REINIERO CABRERA','ASISTENTE ADMINISTRATIVO','reiniero.cabrera@monsanto.com','228310420 ANEXO 2603','2',1),(14,'351','DANIEL ALVIAL','ADMINISTRATIVO ABASTECIMIENTO','dalvial@unegocios.cl','229772093','2',1),(15,'65','JUANA FARIAS MADRID','ASISTENTE ADQUISICIONES','juana.farias@codeduc.cl','225712585','2',1),(16,'92','ALEJANDRO TORRES JARA ','GERENTE COMERCIAL','atorres@eventech.cl','228541462','2',1),(17,'12','Milton Carvajal ','Ingeniero de Desarrollo ','cmmcarvajal@mlp.com','227984319','7',1),(18,'283','Sergio Salgado Niechi','Administrador Público','ssalgado@ssmso.cl','25762552-25762550.','7',1),(19,'50','Patricia Altamirano Riquelme','Secretaria Administración y Finanzas','escuelalamilagrosa@gmail.com','612283250','7',1),(20,'51','Alejandro Ojeda ','Informática','aojeda@barrick.com','225697451','7',1),(21,'10','Jaime Palma','Jefe de Informática','jaime.palma@albia.cl','999999999','7',1),(22,'19','Marcela Vasquez','Supervisora de Compras','mvasquez@atem.cl','990000000','7',1),(23,'33','Eliecer Peña','Informatica','eliecerp@stacatalinasalud.cl','99999999','7',1),(24,'34','José Gómez Toledo','Ejecutivo Informático','josegomez@cifes.gob.cl','990000000','7',1),(25,'45','Christopher Maripangue','Área Redes de Informática','cmaripangue@cnachile.cl',' 56 2 26201121','7',1),(26,'46','Rocío Rivera','Informàtica','rrivera@conicyt.cl',' 56224354320','7',1),(27,'47','Diego Saez','Informática','diego.saez@cnr.gob.cl','224693417','7',1),(28,'47','Claudio Clambor','Informática','claudio.clambor@cnr.gob.cl','224693417','7',1),(29,'64','Enrique Guzmán','Jefe de Informática','enrique.guzman@lafase.cl','99000000','7',1),(30,'62','Michael Martínez Zuñiga','Compradores','michaelmartinez@corfo.cl',' 56226318337','7',1),(31,'67','Hector Romero','Gerente Informática','HRomero@codelco.cl',' 56996790618','7',1),(32,'36','Ivan Medina','Ejecutivo','imedina@channelsmedia.cl','9999999999','6',1),(33,'59','Eduardo Aguirre','Encargado de Informatica','eduardo.aguirre@cultura.gob.cl','32-2326099','6',1),(34,'60','Ronald Perez','Jefe de Unidad','rperezo@contraloria.cl','24021257','6',1),(35,'60','Ronald Perez','Jefe de Unidad','rperezo@contraloria.cl','24021257','6',1),(36,'72','Santiago Pinto','Adnistrador de Comunicaciones','sspinto@deloitte.com','92502130','6',1),(37,'67','Neira Quinchahual Luis','gerente Informátiva','LNeira@codelco.cl','22200000','7',1),(38,'105','Jorge Ramirez','Jefe CETECOM','joyanedel@duoc.cl','23540921','6',1),(39,'75','Luis Curiqueo','Jefe de Redes y Operaciones','luis.curiqueo@dibam.cl','85968139','6',1),(40,'67','Dias Boadilla Ricardo Hernan','Gerente Informatica','rdiaz010@codelco.cl','22200000','7',1),(41,'79','Ana Opazo ','Gerente de Compras','ana.opazo@gendarmeria.cl','22200000','7',1),(42,'83','Claudio Reyes','Teniente Coronel','claudio.reyes@ejercito.cl','981887179','7',1),(43,'97','Alice Rojas','Encargado de Soporte y Mantenimiento de Siste','alice.rojas@fcab.cl','562206569','7',1),(44,'120','Nelson Lemus','Jefe Informática','nelson.lemus@redsalud.gov.cl','56-32-2577256','7',1),(45,'120','Patricia Alvarez Gomez','Gerente de Compras','patricia.alvarezgo@redsalud.gov.cl','56-32-2577256','7',1),(46,'119','Rene Manuel Lopetegui','Director Hospital','renemanuel.lopetegui@gmail.com','222000000','7',1),(47,'273','FABIOLA JARAMILLO','DIRECTORA SERVICIO DE SALUD RECONCAVÍ','SERVICIO@SERVICIO.CL','12345678','2',1),(48,'164','MIGUEL STRUARDO OCHOA','ABASTECIMIENTO','mstuardoo@maipu.cl','56-2-24028467','2',1),(49,'264','PAMELA MEDINA','Jefe Subdepartamento de Adquisición de Equipo','pamela.medina@redsalud.gov.cl','56 45 2 556 338 ','2',1),(50,'266','JULIO QUEZADA','JEFE DE ADQUISICIONES','JULIO.QUEZADA@REDSALUD.GOV.CL','56 52 2465917','2',1),(51,'11','Pedro Perez','Asistente de Ventas ','aminco@amincochile.cl','562 28977782','7',1),(52,'138','CAROLINA ZAPATA CARTER','gte ventas','czapata@mlagranja.cl','25503812','7',1),(53,'141','ALEX EDGARDO ORTIZ VALLEJOS','Informatica','aortiz@munilaja.cl','43-2524642','7',1),(54,'267','Carlos Cofre Ovalle','Jefe Subdpto. Abastecimiento','carlos.cofre@saludaysen.cl','56-672261456','3',1),(55,'267','Alejandro Marchant R.','Encargado de Redes','alejandro.marchant@saludaysen.cl','56-9-89216973','3',1),(56,'86','Ruben Iturra Herrera','Subgerencia de Explotación de Servicios','RIturra@entel.cl','56 2 2360 6589','3',1),(57,'275','Luis Reyes Gonzalez','Asesor Unidad Formulación de Proyectos Depart','luis.reyes@saludohiggins.cl','56 72 2337903','3',1),(58,'121','Gabriel Contreras Escobar','Abastecimiento General','gabriel.contrerase@redsalud.gov.cl','56-45 558729','3',1),(59,'272','Jorge Heusser Larenas','Adquisiciones','jlheusser@ssconcepcion.cl','56-41-3270185','3',1),(60,'393','Ricardo Gallardo','Gerente General','gallardo@avancee.cl','000000000','3',1),(61,'393','Andrea Schmohl','Gerente Comercial','schmohl@avancee.cl','000000000','3',1),(62,'394','Nora Galvez','Directora CRS','norac.galvez@redsalud.gov.cl','56 2 25767522','3',1),(63,'392','ANDRES CARVAJAL','ANALISTA DE GESTIÓN TI','andres.carvajal@oxiquim.cl','56 2 247882 62','2',1),(64,'23','Ximena Stipinovic','Encargada','xstipino@bechtel.com','99999999','6',1),(65,'74','Ingrid Fredes Mella','Soporte Usuarios VIP','ingridfredes@derco.cl','56589429','6',1),(66,'94','Sandra Sobarzo','Encargada','sandra.sobarzo@expeditors.com','2 2482 2041','6',1),(67,'377','Christian Norris','Jefe Video Conferencia','cnorris@inacap.cl','997395867','6',1),(68,'377','Jose Luis Alvarado','Jefe de Video Conferencia','jlalvarado@inacap.cl','998184663','6',1),(69,'231','Luis Oyarzun','Ejecutivo de Cuentas','loyarzun@ryc.clq',' 59019111','6',1),(70,'317','Juan Landeros','Analista Senior de Telefonia','juan.landeros@sura.cl','968447454 ','6',1),(71,'317','Gonzalo Muñoz','Jefe de Ingenieria de Sistemas y Comunicacion','gonzalo.munoz@sura.cl','9 8548  2693 ','6',1),(72,'332','Luis Pino ','Encargado de Informatica','l.pino@unesco.org','22472 4633','6',1),(73,'388','Jacqueline Leiva','IT Support Services','jacqueline.leiva@volvo.com','223406249','6',1),(74,'388','Jacqueline Leiva','IT Support Services','jacqueline.leiva@volvo.com','223406249','6',1),(75,'75','Maximo Ovalle','Jefe Unidad de Gestión de Servicios Tecnológi','maximo.ovalle@dibam.cl','223605455','6',1),(76,'75','Maximo Ovalle','Jefe Unidad de Gestión de Servicios Tecnológi','maximo.ovalle@dibam.cl','223605455','6',1),(77,'245','Emilio Aguirre','Encargado Sub Unidad de Desarrollo y Sistemas','emilio.aguirre@redsalud.gov.cl','989205798','6',1),(78,'257','Eduardo Rozas','Encargado de Soporte Informatico','eduardo.rozas@sea.gob.cl','966740595','6',1),(79,'261','Vanessa Escobar','Enfermera','vanessa.escobarr@redsalud.gov.cl','969185838','6',1),(80,'262','Vanessa Escobar','Enfermera','vanessa.escobarr@redsalud.gov.cl','969185838','6',1),(81,'168','Claudio Araya','Departamento de Tecnologias','carayas@isl.gob.cl','2200099999','7',1),(82,'194','Gustavo Franco','sistemas','gfranco@mba-lazard.com','999222000','7',1),(83,'284','Rodigo Escobar','Biomedico','rodrigo.escobar.p@redsalud.gob.cl','985702733','6',1),(84,'295','Mauricio Marin','Jefe de Tecnologia','mmarin@senama.gov.cl','994362651','6',1),(85,'196','Omar Zurita','Jefe de TI','omar.zurita@mejillonesamerica.cl','79766155','7',1),(86,'291','Patricio Chocano','Soporte Tecnico','patricio.chocano@sernageomin.cl','22482 5800	','6',1),(87,'215','Fernando Molina','Director','fernando.molina@molcom.cl','9999999999','7',1),(88,'218','Eduardo Zagal','Regional Operation Manager','ezagal@netsecure.cl','99999999','7',1),(89,'218','Jorge Hernandez','Soporte TIC','jhernandez@netsecure.cl','999999922','7',1),(90,'226','Jorge Arce',' Account manager','jarcec@quintec.cl','9999922222','7',1),(91,'286','Luis Mella','informatico','luis.mella@redsalud.gov.cl','999929292929','7',1),(92,'297','Jaime Catalan','Ing de sistemas','jaime.catalan@skrental.com','999922222','7',1),(93,'387','Alex Gómez','Ing sistema','agomez@vitapro.cl','99992222','7',1),(94,'14','CLAUDIO MOLINA PAEZ','ADMINISTRADOR','ADMINPUNTAOSAS@BIENESTARARMADA.CL','9 42962548','2',1),(95,'179','ANDRES DIAZ','ABASTECIMIENTO (ARAUCANIA)','ADIAZ@JUNJI.CL','56-45-2991336','2',1),(96,'377','Italo Barrientos','ARL Talca','ibarrientos@inacap.cl','990739319','6',1),(97,'135','HECTOR SARAVIA','ASISTENTE','HPSARAVIA@GMAIL.COM','227780198','2',1),(98,'246','Arturo Ordenes','ENCARGADO  TIC','aarturo.ordenes@redsalud.gov.cl','(67)2 261117','7',1),(99,'260','Vanessa Escobar','Enfermera','vanessa.escobarr@redsalud.gov.cl','969185838','6',1),(100,'107','Ana Opazo ','Analista','ana.opazo@gendarmeria.cl','99922222','7',1),(101,'158','Fernando Chavez ','Analista','fchavez@salamanca.cl','2222299999','7',1),(102,'263','Ana Varela ','Gestion de Proyectos ','ana.varela@araucanianorte.cl','999922222','7',1),(103,'263','Maria T Lineros',' Encargada Dpto Informatica','mariat.lineros@araucanianorte.cl','99992222','7',1),(104,'263','Rodrigo Riffo ','Compradores ','rodrigo.riffo@araucanianorte.cl','99992222','7',1),(105,'276','Francisco Javier Aguilar Ruiz','Jefe Doctor','francisco.aguilar@redsalud.gov.cl','612293071','7',1),(106,'276','Pamela Ortega Oyarzún ','Analista','pamela.ortega@redsalud.gov.cl','612293181','7',1),(107,'278','Miguel Prati Poblette','Administrador','miguel.patri@redsalud.gov.cl','225746944','7',1),(108,'142','RICARDO MEZA','COORDINADOR TI','INFORMATICA@LASCABRASMUNICIPALIDAD.CL','997003226','2',1),(109,'140','JORGE SOFFIA ','JEFE SECPLAC','planificacion@lagoranco.cl','63 2491212 ','2',1),(110,'75','Mauricio Riquelme','Jefe Oficina Gestión de Proyectos','mauricio.riquelme@dibam.cl','954105486','6',1),(111,'405','Bruno Trejeda','Administrador de Negocio Operacional','btejada@weberstephen.com','9 93233724','6',1),(112,'193','Mario Medina','Gerente de area','mario.medina@masisa.com','223506059','7',1),(113,'403','Gonzalo Vargas','Jefe de TI','gonzalo.vargas@kibernum.com','223693756','7',1),(114,'222','José Purcel','Gerente de Infraestructura','jose.purcell@mallplaza.com','993190541','7',1),(115,'182','Christian Gallardo','Ingeniero de Compras','christian.gallardo@kcl.cl',' 2 2365 3016','6',1),(116,'182','Carolina Carcamo','Ingeniero de Compras','carolina.carcamo@kcl.cl','99886 7558','6',1),(117,'402','Juan Carlos Lopez','Procurement Senior Buyer  VHSC','juan.lopez@voith.com',' 990819808','6',1),(118,'265','Alvaro Marin','Tecnologo en Informática Biomedica','alvaromarin.ssa@gmail.com','(41) 2724310','6',1),(119,'158','Erick Rojas','Profesional de Informática','erojas@salamanca.cl','(53)2448626','6',1),(120,'394','Axel Torrejon','Encargado Informatica','axel.torrejon@redsalud.gov.cl','56 9 9536 7456','3',1),(121,'406','Jorge Peña ','jefe logistico ','jorge.pena@cultiura.gob.cl','67- 2214840','8',1),(122,'407','Sandra Voisier Caballeria','Jefe consejo de cultura','sandra.voisier@cultura.gob.cl','61-2614455','8',1),(123,'20','Oscar Catalán Fernandez','Jefe de Informatica','yaguilera@touchmedia.cl','226927000','7',1),(124,'20','Mauricio Donoso','Asistente Administración ','mauricio.donoso@bci.cl','223835156','7',1),(125,'408','Raul Vasuqez','Jefe área ','rvasquez@fundacionchile.cl','2222400429','8',1),(126,'409','Loreto Castillo Rojas','adquisiciones ','lorettocr22@gmail.com','51-2337900','8',1),(127,'410','Wiordi Ramirez Contreras','encargada de compras ','wiordi.ramirez@educangol.cl','45-2657820','8',1),(128,'407','Rossana Alvares','supervisora ','rossana.alvares@cultura.gob.cl','61-2614455','8',1),(129,'411','Maria Graciela','gerente de recursos','anam.caceres@educangol.cl','45-2712375','8',1),(130,'412','Natalia Espinoza','jefa de adquisiciones','adquisiciones@mloquimay.cl','452712375','8',1),(131,'413','carolina lopez','directora','clopez@munilossqauces.cl','452655718','8',1),(132,'414','Ibannia Carbajal','supervisora','ibanniacarbajal@hotmail.com','532353084','8',1),(133,'415','Viviana Contreras','adquisiciones ','yamileth_vivi@hotmail.com','452656020','8',1),(134,'416','Luz Saldivia','adquisiciones ','alejjandrass@hotmail.com','654822500','8',1),(135,'416','ChistiannSilova','jefe adquisicionesa ','csilvacardenas@gmail.com','652482541','8',1),(136,'417','Francisco Sandoval','adquisiciones  ','fransando@hotmail.com','228185147','8',1),(137,'418','Francisco Barrios','jefe de operasciones ','franciscobarrios@montepatria.net','53711058','8',1),(138,'419','Natalia Gatica','jefa de adquisiciones','adquisiciones2@saludmostazal.cl','722491917','8',1),(139,'421','Milena Gonzales','daquisicion','mgonzales@nuevaimperial.cl','452683146','8',1),(140,'422','Valdo Cerpa','informatico','secplan@muniolivar.clk','22391480','8',1),(141,'423','Luis Gonzalez','jefe muni','lgonzales@mph.cl','24306078','8',1),(142,'424','Daniel Barrera','jefe área ','palenadaem@gmail.com','264741220','8',1),(143,'425','Anbdro Lizana','jefe de área ','ssaludfinanzapalmilla@gmail.com','722930161','8',1),(144,'425','jorge cortez','administrador','jcortezt@gmail.com','722822286','8',1),(145,'396','ROBERTO CANCINO MEZA','compras ','chilecompraeduca@empedrado.cl','56-71-2527779','2',1),(146,'401','Yertty Olivares Olivares','Abastecimiento','yolivares@mejillones.cl','56-55-2557310','2',1),(147,'397','Angelica López Mendoza','abastecimiento','angelica.lopez@mnhn.cl','56-02-26804622','2',1),(148,'351','Pablo Contreras Martinez ','Administrativo de Adquisiciones','pacontrerasm@u.uchile.cl','229787196 ','2',1),(149,'260','Marcelo Manquez','Jefe de Informática','marcelo.manquez@redsalud.gov.cl','  56 55 2655 340','6',1),(150,'281','Franco Martinez','Asistente de Compra','franco.martinez@redsalud.gob.cl',' 56 9 71023483','6',1),(151,'288','Alex Lorca','Jefe de Unidad','alex.lorca@redsalud.gov.cl',' 56 9 44033172','6',1),(152,'288','Alex Lorca','Jefe de Unidad','alex.lorca@redsalud.gov.cl',' 56 9 44033172','6',1),(153,'288','Rodolfo Rosas','Jefe de Unidad','rodolfo.rosas@redsalud.gob.cl',' 56 9 42492084','6',1),(154,'171','Pedro Arrau','Encargado Tecnologías de la Información','parrau@indh.cl',' 56228878856 ','6',1),(155,'281','Marcela Ferrada','Ingeniera Civil Biomédica','marcela.ferrada@redsalud.gov.cl',' 56 (2) 576 3897','6',1),(156,'213','Rodrigo Bastias','Asesor de Informatica','rbatias@interior.cl','2 24863628','6',1),(157,'270','Sebastian Ugarte','Jefe de Tecnologia','sebastian.ugarte@redsalud.gob.cl','51 2333798 ','6',1),(158,'102','Marco Ibacache','Jefe de TI','mibacache@fonasa.gov.cl','99999999','6',1),(159,'15','Cristian Montero','Analista de Tecnologia','cmontero@empresasarmas.cl','9999999999','6',1),(160,'17','Alejandra Rojas','Asistente de Compras','alejandra.hojas@aexp.com','9999999999','6',1),(161,'35','Alvaro CasaNova','Analista de Compras','acasanova@ccu.cl','999999999','6',1),(162,'96','Ulises Astudillo','Analista de Tecnologia','ulises.astudillo@fao.org','999999999','6',1),(163,'124','Mauricio Reyes','Analista de Tecnologia','mauricio.reyes@redsalud.gov.cl','99999999','6',1),(164,'157','Herson Vallejos','Analista de Compras','adquisiciones2@municipiodesaavedra.cl','999999999','6',1),(165,'161','Olga Ibacate','Analista de Compra','olgaibacache@munitirua.com','56-41-2445828','6',1),(166,'162','Alex Lorca','????????????','alex.lorca@redsalud.gov.cl',' 56 9 44033172','6',1);
/*!40000 ALTER TABLE `tbcontactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbejecutivos`
--

DROP TABLE IF EXISTS `tbejecutivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbejecutivos` (
  `idtbejecutivos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ejecutivo` varchar(45) DEFAULT NULL,
  `activo` int(11) DEFAULT '1' COMMENT '0:\n1: Activo',
  `correo_ejecutivo` varchar(45) DEFAULT NULL,
  `img_url_ejecutivo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idtbejecutivos`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbejecutivos`
--

LOCK TABLES `tbejecutivos` WRITE;
/*!40000 ALTER TABLE `tbejecutivos` DISABLE KEYS */;
INSERT INTO `tbejecutivos` VALUES (1,'Carol Noches',1,'carol.noches@touchmedia.cl',NULL),(2,'Jose Manuel Mora',1,'jmmora@touchmedia.cl','https://lh4.googleusercontent.com/-TZCa5W3SP2I/AAAAAAAAAAI/AAAAAAAAAAc/zoVoI_-Qbv4/photo.jpg?sz=150'),(3,'Marcelo Ramírez',1,'mramirez@touchmedia.cl','https://lh5.googleusercontent.com/-j83oBbIn1Wc/AAAAAAAAAAI/AAAAAAAAAb8/tSvx2FEvlM0/photo.jpg?sz=150'),(4,'Nicole Villa',1,'nvilla@touchmedia.cl',NULL),(5,'Paola Ramírez',1,'paola.ramirez@touchmedia.cl',NULL),(6,'Juliana Blanco',1,'jblanco@touchmedia.cl','https://lh5.googleusercontent.com/-sCSmsQKbdU8/AAAAAAAAAAI/AAAAAAAAABo/ZGaBOllCc_I/photo.jpg?sz=150'),(7,'Yecenia Aguilera',1,'yaguilera@touchmedia.cl','https://lh6.googleusercontent.com/-Q4V2KTL_Tb4/AAAAAAAAAAI/AAAAAAAAACU/7hYCfBfNk9M/photo.jpg?sz=150'),(8,'Bruno Castagneto',1,'bcastagneto@touchmedia.cl','https://lh3.googleusercontent.com/-5DMb4yT8slw/AAAAAAAAAAI/AAAAAAAAAAo/sxGM5R4_YlY/photo.jpg?sz=150');
/*!40000 ALTER TABLE `tbejecutivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbempresas`
--

DROP TABLE IF EXISTS `tbempresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbempresas` (
  `idtbempresas` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `sigla` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbempresas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbempresas`
--

LOCK TABLES `tbempresas` WRITE;
/*!40000 ALTER TABLE `tbempresas` DISABLE KEYS */;
INSERT INTO `tbempresas` VALUES (1,'TouchMedia','TMC'),(2,'MediaLogistics','ML');
/*!40000 ALTER TABLE `tbempresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbestadoprospecto`
--

DROP TABLE IF EXISTS `tbestadoprospecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbestadoprospecto` (
  `idtbestadoprospecto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbestadoprospecto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbestadoprospecto`
--

LOCK TABLES `tbestadoprospecto` WRITE;
/*!40000 ALTER TABLE `tbestadoprospecto` DISABLE KEYS */;
INSERT INTO `tbestadoprospecto` VALUES (1,'Activo'),(2,'En Proceso'),(3,'Stand By'),(4,'Cerrado'),(5,'Descartado');
/*!40000 ALTER TABLE `tbestadoprospecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbmoneda`
--

DROP TABLE IF EXISTS `tbmoneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbmoneda` (
  `idtbmoneda` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbmoneda`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbmoneda`
--

LOCK TABLES `tbmoneda` WRITE;
/*!40000 ALTER TABLE `tbmoneda` DISABLE KEYS */;
INSERT INTO `tbmoneda` VALUES (1,'CLP'),(2,'USD'),(3,'UF');
/*!40000 ALTER TABLE `tbmoneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbojetivos`
--

DROP TABLE IF EXISTS `tbojetivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbojetivos` (
  `idtbojetivos` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbojetivos`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbojetivos`
--

LOCK TABLES `tbojetivos` WRITE;
/*!40000 ALTER TABLE `tbojetivos` DISABLE KEYS */;
INSERT INTO `tbojetivos` VALUES (1,'Saludar'),(2,'Presentar Empresa'),(3,'Presentar Propuesta'),(4,'Seguimiento');
/*!40000 ALTER TABLE `tbojetivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbprospectos`
--

DROP TABLE IF EXISTS `tbprospectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbprospectos` (
  `idtbprospectos` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(45) NOT NULL,
  `id_contacto` varchar(45) NOT NULL,
  `id_ejecutivo` varchar(45) NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `nombre_prospecto` varchar(45) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `porcent_cierre` varchar(45) DEFAULT '50',
  `fecha_esp_cierre` datetime DEFAULT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `cotizacion` varchar(45) DEFAULT NULL,
  `id_moneda` varchar(45) DEFAULT NULL,
  `monto` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT '1',
  `nota_venta` varchar(45) DEFAULT NULL,
  `motivo` varchar(500) DEFAULT NULL,
  `convenio_marco` varchar(45) DEFAULT '0',
  `id_empresa` varchar(45) DEFAULT '1',
  PRIMARY KEY (`idtbprospectos`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbprospectos`
--

LOCK TABLES `tbprospectos` WRITE;
/*!40000 ALTER TABLE `tbprospectos` DISABLE KEYS */;
INSERT INTO `tbprospectos` VALUES (1,'327','1','3','2016-10-11 13:18:20','Sala de Directorio SunPower','Adquisición microfono adicional a HDX6000 a traves de un IP 7000.\nSoundStation Duo','100','2016-11-30 00:00:00',NULL,'2660','2','730','1',NULL,NULL,'0','1'),(2,'45','25','7','2016-10-18 14:13:42','Instalación de cámaras de Seguridad','Instalación de 15 cámaras de Seguridad incluye servicio de mantenimiento por tres años','90','2016-11-07 00:00:00',NULL,'2644','2','12,943.63','1',NULL,NULL,'0','1'),(3,'283','18','7','2016-10-18 14:47:16','Carro Sar B','2 carros de telemedicina','100','2016-10-25 00:00:00',NULL,'2601','2','41,857.48','1',NULL,NULL,'0','1'),(4,'67','31','7','2016-10-18 16:13:09','Licitación','Servicio de Integración para Comunicaciones Unificadas','0','2016-10-26 00:00:00',NULL,'1001','2','45000','1',NULL,NULL,'0','1'),(5,'67','37','7','2016-10-18 16:16:41','Licitación','Group 500 5 equipos','90','2016-10-20 00:00:00',NULL,'2665','1','33,474.70','1',NULL,NULL,'0','1'),(6,'67','40','7','2016-10-18 19:30:44','Días Ricardo ','Licitación Group 500 ','','2016-10-25 00:00:00',NULL,'2663','2','6694.94','1',NULL,NULL,'0','1'),(7,'83','42','7','2016-10-18 19:43:04','Claudio Reyes','existe la necesidad de implementar mejoras a la sala de reuniones del Jefe del Estado Mayor General del Ejército. Lo anterior en base al actual equipamiento tecnológico que fue instalado por su empresa hace años atrás. En concreto, se desea actualizar y mejorar la tecnología en relación con el control multimedia de la sala, implementar nuevas funcionalidades como grabación de audio y transcripción a documento digital y explorar otras opciones de tecnologías disponibles que pudieran ser incorpora','','2016-11-29 00:00:00',NULL,'','1','','1',NULL,NULL,'0','1'),(8,'97','43','7','2016-10-18 19:49:26','Alice Rojas','Polycom EagleEye Director\nServicio de Instalación','','2016-10-31 00:00:00',NULL,'2508','2','12435.50','1',NULL,NULL,'0','1'),(9,'273','47','2','2016-10-19 11:34:41','LICITACION ID-1761-59-LQ16 CARROS DE TELEMEDI','2 Carros básicos de telemedicina.\n','100','2016-10-17 00:00:00',NULL,'57','1','16.399.538','1',NULL,NULL,'0','1'),(10,'394','62','3','2016-10-20 20:47:30','Proyecto TeleOftalmología ','Polycom Convene, para el box de atención.\n[Proyecto]\nAuditorio: Pantallas, instalación Pizarra SMART, amplificación.','50','2016-12-30 00:00:00',NULL,'','2','','1',NULL,NULL,'0','1'),(11,'392','63','2','2016-10-21 10:13:30','PROPUESTA SISTEMA DE VIDEOCONFERENCIA OXIQUIM','PROPUESTA DE RECAMBIO DEL SISTEMA DE VIDEOCONFERENCIA ACTUAL.','50','2016-11-15 00:00:00',NULL,'PROPUESTA ','2','58.525','1',NULL,NULL,'0','1'),(12,'72','36','6','2016-10-21 17:58:09','Premier Polycom 3 HDX 8000 (TPX)','Contacto con Santiago Pinto en 12 de Octubre de 2016 que informa que la cotización está en la oficina en Canadá para aprobación.','80','2016-11-07 00:00:00',NULL,'2566','2','4440','1',NULL,NULL,'0','1'),(13,'377','68','6','2016-10-21 18:04:02','Renovación de Equipos de VC para 2017','2575: USD 87.459\n2576: USD 218.406\nPropuestas para evaluación. Respuesta para 2017.\nDos cotizaciones enviadas por el tema de precio \n(cotización 2576- opcional).','15','2017-01-31 00:00:00',NULL,'2575/2576','2','305.865','1',NULL,NULL,'0','1'),(14,'377','68','6','2016-10-21 18:08:29','Licencias Clariti 2017','Proyecto Licencias Clariti para INACAP 2017.\nProyecto en evaluación.','15','2017-01-31 00:00:00',NULL,'2611','2','124.458','1',NULL,NULL,'0','1'),(16,'377','96','6','2016-10-21 18:13:33','Equipo Group 310 con Cámara 4X','Contacto en 12 de Octubre de 2016 y me informa que van a comprar el equipo pero para el próximo mes.','80','2016-11-30 00:00:00',NULL,'2639','2','4.944','1',NULL,NULL,'0','1'),(17,'317','70','6','2016-10-21 18:27:49','Real Presence Resource Manager','Intentando contacto desde 11 de Octubre de 2016 con el cliente pero no contesta para la confirmación de compra del equipo y retirada del equipo demo.','70','2016-11-03 00:00:00',NULL,'2520','2','6286','1',NULL,NULL,'0','1'),(18,'135','97','2','2016-10-21 18:33:22','COTIZACION ','1 SOUNDSTATION DUO ','100','2016-10-25 00:00:00',NULL,'68','2','712.5','1',NULL,NULL,'0','1'),(19,'332','72','6','2016-10-21 18:33:42','Proyecto de Infraestructura para Sala de Reun','Cotización enviada a Canadá para evaluación.','50','2016-12-15 00:00:00',NULL,'2571','2','6.400','1',NULL,NULL,'0','1'),(20,'332','72','6','2016-10-21 18:40:45','Proyector   Telón ','Propuesta enviada para Canadá para evaluación.','50','2016-12-15 00:00:00',NULL,'2547','2','1.093','1',NULL,NULL,'0','1'),(21,'332','72','6','2016-10-21 18:43:48','2 Switch Summit X440-48p.','Propuesta enviada a Canadá para evaluación.','50','2016-12-15 00:00:00',NULL,'2649','2','5.720','1',NULL,NULL,'0','1'),(22,'94','66','6','2016-10-21 18:55:10','Equipos Router','Cliente que hizo la solicitud de la cotización está de Vacaciones.','5','2016-11-03 00:00:00',NULL,'2684','2','4.385','1',NULL,NULL,'0','1'),(23,'59','33','6','2016-10-21 19:07:49','RMX   Premier','Cliente informa que el proyecto es para el próximo año.','50','2017-01-31 00:00:00',NULL,'2461','2','95.303','1',NULL,NULL,'0','1'),(24,'59','33','6','2016-10-21 19:13:39','Proyecto VC Group 500','Cliente informa que proyecto es para el próximo año.','50','2017-01-31 00:00:00',NULL,'2463','2','7.111','1',NULL,NULL,'0','1'),(25,'60','34','6','2016-10-21 19:21:45','Licencias WireCast','PROYECTO CERRADO.','100','2016-11-13 00:00:00',NULL,'2588','2','6.300','1',NULL,NULL,'0','1'),(26,'60','34','6','2016-10-21 19:25:35','5 Monitores Profesionales Samsung','Cliente informa que no está seguro de la compra.','90','2016-12-15 00:00:00',NULL,'2546','2','5.925','1',NULL,NULL,'0','1'),(27,'75','39','6','2016-10-21 19:29:26','Premier para 3 equipos Group 700','PROYECTO CERRADO.','100','2016-11-30 00:00:00',NULL,'2505','2','5.880','1',NULL,NULL,'0','1'),(28,'260','99','6','2016-10-24 10:47:56','Maleta Telemedicina','Evaluando para Q4','40','2016-12-21 00:00:00',NULL,'2408','2','31.503','1',NULL,NULL,'0','1'),(29,'260','99','6','2016-10-24 10:49:29','Carro de Telemedicina SAR A','Evaluando para Q4','40','2016-12-21 00:00:00',NULL,'2409','2','12.173','1',NULL,NULL,'0','1'),(30,'260','99','6','2016-10-24 10:50:57','Toten de Autoconsulta','Evaluación para Q4.','40','2016-12-21 00:00:00',NULL,'2187','2','4.690','1',NULL,NULL,'0','1'),(31,'257','78','6','2016-10-24 10:55:12','Group 310   Licencia RPD 5 users','NEGOCIO CERRADO.','100','2016-11-14 00:00:00',NULL,'2657','2','5.544','1',NULL,NULL,'0','1'),(32,'295','84','6','2016-10-24 10:56:51','Evoko Manager','Contacto: 04/11/16.\nProyecto para Noviembre o Diciembre. Esperando que salga la plata que ya está solicitada.\nSon 3 equipos EVOKO LISO.\nEl proyecto va a salir si o si para ese año. \nCotización actualizada.\n','85','2016-12-01 00:00:00',NULL,'2662','2','6000','1',NULL,NULL,'0','1'),(33,'142','108','2','2016-10-24 12:13:32','EQUIPOS DESKTOP Y AIO','2 equipos desktop hp\n1 AIO hp','100','2016-10-28 00:00:00',NULL,'69','2','1625','1',NULL,NULL,'0','1'),(34,'75','110','6','2016-10-25 11:04:59','Connect Pro','Cliente evaluando.','5','2016-11-13 00:00:00',NULL,'2688','2','821','1',NULL,NULL,'0','1'),(35,'405','111','6','2016-10-27 16:48:39','Monitores Profesionales Samsung','Cliente está evaluando cuantos pantallas son y cual modelo a comprar. \n','60','2016-11-22 00:00:00',NULL,'2695/2696/2697','2','1238','1',NULL,NULL,'0','1'),(36,'182','115','6','2016-10-27 16:57:21','Proyecto Video Conferencia ','Tres opciones de cotización:\nVenta/Arriendo/Arriendo (Nube).\nLa mejor opción para el cliente es la opción 3 (Nube).\nPrecio Mensual.','70','2017-01-31 00:00:00',NULL,'2634/2635/2636','3','5232.5','1',NULL,NULL,'0','1'),(37,'402','117','6','2016-10-27 17:02:59','3 equipos Group 310','Esperando respuesta de Brasil por el tema.','50','2016-11-16 00:00:00',NULL,'2426','2','18768','1',NULL,NULL,'0','1'),(38,'265','118','6','2016-10-27 17:09:13','Proyecto de Carro Sar A Fijo','PROYECTO CERRADO.','100','2016-11-07 00:00:00',NULL,'2676','2','10126','1',NULL,NULL,'0','1'),(39,'158','119','6','2016-10-27 17:31:26','Carro Sar C   25 Licencia RPD','Proyecto para Licitación. Plata retenida.','30','2016-11-07 00:00:00',NULL,'2371','2','25648','1',NULL,NULL,'0','1'),(40,'193','112','7','2016-10-27 17:39:25','Touch Control POLYCOM ','Cotizaciones varias','','2016-12-07 00:00:00',NULL,'2608','1','2,180.00','1',NULL,NULL,'0','1'),(41,'394','120','3','2016-11-02 16:35:23','Auditorio Archivo CRS','Implementación de VC en Sala a traves de opción móvil.\nSe baraja opcion de carro con ruedas y mueble rack.','50','1969-12-31 00:00:00',NULL,'','2','','1',NULL,NULL,'0','1'),(42,'394','120','3','2016-11-02 16:39:02','Arriendo Servidor ','Servidor en modalidad de arriendo con opción de compra a 36 meses.\n\nServidor marca IBM , DELL o HP\nProcesador mínimo :  Intel Xeon E5-2407v2 2.40GHz,\nMemoria:  32GB RAM\nDisco estado sólido:  4x240GB SSD SATA internos (RAID 10)\nFuente de poder dual (redundante)\nDisco interno para respaldos: 2 x 240GB o superior\n\n1 WINDOWS SERVER ESTANDAR  2012 R2\n5 CAL WINDOW SERVER 2012 R2  (5 usuarios)\n1 MICROSOFT SQL 2014 ESTANDAR \n5 CAL SQL 2014 (5 usuarios)','50','2016-12-31 00:00:00',NULL,'','2','','1',NULL,NULL,'0','1'),(43,'377','67','6','2016-11-03 18:45:52','Cursos Polycom','Cliente informa que el valor del curso es muy caro. Que se sobra el presupuesta, lo van a hacer.','5','2016-12-15 00:00:00',NULL,'670','2','6123','1',NULL,NULL,'0','1'),(44,'245','77','6','2016-11-03 18:53:35','Arriendo de Computadores por 3 años','Cliente estaba evaluando para el Q4.\n2 Equipo Equipo HP All in One Intel Core i7 16GB RAM-3TB DD-4GB TV 27\"\nValor: 3072.60 USD por equipo.\nPrecio total del arriendo o 36 cuotas de 170.70 USD.','10','2016-12-07 00:00:00',NULL,'6 ML','2','6145.20','1',NULL,NULL,'0','1'),(45,'295','84','6','2016-11-03 19:05:30','Pistolas lectoras de QR','Contacto: 04/11/16.\nCliente informa que está buscando otro proveedor.\nVoy a buscar la información del nuevo proveedor y el precio.','5','2016-12-05 00:00:00',NULL,'?','2','?','1',NULL,NULL,'0','1'),(46,'295','84','6','2016-11-03 19:10:40','VBPP 7301 Senama','Contacto: 04/11/16\nCliente solicitó el reenvío de la cotización y lo van evaluar para el presupuesto de fin de año.\n\n','5','2016-12-15 00:00:00',NULL,'2538','2','10835','1',NULL,NULL,'0','1'),(47,'295','84','6','2016-11-04 19:08:16','2 Carros Móvil para Computadoras','Contacto;: 04/11/16.\nCliente solicita la cotización actualizada para averiguar la compra para el fin de año.','60','2016-12-15 00:00:00',NULL,'2378','2','2806','1',NULL,NULL,'0','1'),(48,'405','111','6','2016-11-08 11:19:35','Proyecto Audio Visual','Cotización enviada en 07/11/16. Cliente evaluando.','50','2016-11-22 00:00:00',NULL,'2707','2','7852','1',NULL,NULL,'0','1'),(49,'20','124','7','2016-11-11 14:42:24','Productos Evoko y WePresent','Productos Evoko y Wepresent','','2016-12-05 00:00:00',NULL,'2734','2','50000','1',NULL,NULL,'0','1'),(50,'216','12','2','2016-11-15 08:37:07','PROYECTO DE ADECUACIÓN SALAS  MONSANTO MELIPI','Reunión Jueves 17 de Noviembre 2016 a las 10:00 Hrs. Acompaña Julio Fernandez.','10','2016-11-17 00:00:00',NULL,'','1','','1',NULL,NULL,'0','1'),(51,'351','14','2','2016-11-15 08:40:11','PROYECTO FIN DE AÑO','VISITA A TERRENO VIERNES 11 DE NOVIEMBRE 2016 A LAS 11.00 HRS.  SE APROVECHO DE RETIRAR HUELLERO CON PROBLEMAS.','10','2016-12-30 00:00:00',NULL,'','1','','1',NULL,NULL,'0','1'),(52,'60','34','6','2016-11-15 17:46:41','Proyectores Epson 8000 Lumenes','PROYECTO CERRADO.','100','2016-11-30 00:00:00',NULL,'2716','2','31.782','1',NULL,NULL,'0','1'),(53,'60','34','6','2016-11-15 17:52:31','Proyecto Group 310','No quiere recambio de la HDX.\nEn cambio hizo una solicitud de cotizaciones de Group 310.  ','50','2016-11-30 00:00:00',NULL,'2755','2','5053','1',NULL,NULL,'0','1'),(54,'60','34','6','2016-11-15 17:54:17','Proyecto Group 500','No quiere el recambio de HDX.\nEn cambio hizo una solicitud de cotizaciones de Group 500.','50','2016-11-30 00:00:00',NULL,'2756','2','6910','1',NULL,NULL,'0','1'),(55,'60','34','6','2016-11-15 17:57:25','Licencias Calidad de Imagen 1080p','Esperando la demo para saber se va a funcionar y después averiguar ctos equipos son.','70','2016-11-30 00:00:00',NULL,'2754','2','?','1',NULL,NULL,'0','1'),(56,'260','149','6','2016-11-17 12:38:59','Proyecto Carros de Telemedicina','PROYECTO CERRADO.','100','2016-12-07 00:00:00',NULL,'2745','2','11122','1',NULL,NULL,'0','1'),(57,'216','12','2','2016-11-17 16:13:23','propuesta comercial ','Visita realizada el día jueves 17 de Noviembre','100','2016-11-30 00:00:00',NULL,'propuesta comercial','1','2500000','1',NULL,NULL,'0','1'),(58,'281','150','6','2016-11-21 15:55:01','Carro y Monitor','Cliente informa que el SSMS necesita de los productos pero está cotizando por otros lados.','20','2016-12-26 00:00:00',NULL,'2771','2','2389','1',NULL,NULL,'0','1'),(59,'60','34','6','2016-12-05 13:32:02','Licencias PRO Media Suite','Esperando ID para la compra de todos los equipos juntos.','80','2016-12-16 00:00:00',NULL,'2317','2','13610','1',NULL,NULL,'0','1'),(60,'213','156','6','2016-12-14 16:50:57','Equipos de Video Conferencia','Cotizado Group 500  Licencias Multipunto  Liciencas RPD 25 users.','95','2016-12-16 00:00:00',NULL,'2836','2','8270','1',NULL,NULL,'0','1'),(61,'317','70','6','2016-12-15 19:20:12','Licencias para RMX 5 HD','Enviada 3 opciones al cliente:\n5HD: 30.435\n10HD: 55.787\n15HD: 79.000','40','2016-12-30 00:00:00',NULL,'2846','2','30435','1',NULL,NULL,'0','1'),(62,'317','70','6','2016-12-15 19:24:33','Call Manager   Licencias Cluster','Integración con Cisco y Integración con Colombia','30','2016-12-30 00:00:00',NULL,'2819','2','14355','1',NULL,NULL,'0','1'),(63,'272','59','3','2017-01-19 17:27:20','nombre testing','detalle testing','50','2017-02-28 00:00:00',NULL,'1235','2','25000','1',NULL,NULL,'0','1');
/*!40000 ALTER TABLE `tbprospectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtipoaccion`
--

DROP TABLE IF EXISTS `tbtipoaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbtipoaccion` (
  `idtbtipoaccion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbtipoaccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtipoaccion`
--

LOCK TABLES `tbtipoaccion` WRITE;
/*!40000 ALTER TABLE `tbtipoaccion` DISABLE KEYS */;
INSERT INTO `tbtipoaccion` VALUES (1,'Llamado'),(2,'Visita'),(3,'Correo');
/*!40000 ALTER TABLE `tbtipoaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbusuarios` (
  `idtbusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `activo` varchar(45) DEFAULT '1' COMMENT '0: Inactivo\n1: Activo',
  `id_ejecutivo` varchar(45) NOT NULL,
  `perfil` varchar(45) DEFAULT '1' COMMENT '1: Ejecutivo\n2: Admin',
  PRIMARY KEY (`idtbusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuarios`
--

LOCK TABLES `tbusuarios` WRITE;
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` VALUES (1,'mramirez','Mart3liux.','1','3','1'),(2,'jblanco','jblanco2016','1','6','1'),(3,'jmmora','jmmora2016','1','2','1'),(4,'yaguilera','yaguilera2016','1','7','1'),(5,'cnoches','cnoches2016','1','1','1'),(6,'nvilla','nvilla2016','1','4','1'),(7,'bcastagneto','bcastagneto2016','1','8','1'),(8,'emelgarejo','admin','1','','2');
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dbcomercial'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-12 13:19:33
CREATE DATABASE  IF NOT EXISTS `dbclientes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbclientes`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: dbclientes
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

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
-- Table structure for table `tbclientes`
--

DROP TABLE IF EXISTS `tbclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbclientes` (
  `idtbclientes` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(45) NOT NULL,
  `descripcion` varchar(450) NOT NULL,
  `id_ejecutivo` varchar(45) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1' COMMENT '0: Inactivo\n1: Activo',
  PRIMARY KEY (`idtbclientes`)
) ENGINE=InnoDB AUTO_INCREMENT=405 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientes`
--

LOCK TABLES `tbclientes` WRITE;
/*!40000 ALTER TABLE `tbclientes` DISABLE KEYS */;
INSERT INTO `tbclientes` VALUES (1,'91806000','ABASTIBLE','2',1),(2,'61101021','ACADEMIA POLITECNICA MILITAR ','4',1),(3,'61930100','ACADEMIA POLITECNICA NAVAL ','3',1),(4,'98000000 ','ADMINISTRADORA DE FONDOS DE PENSIONES CAPITAL S.A. ','4',1),(5,'98001000','ADMINISTRADORA DE FONDOS DE PENSIONES CUPRUM S.A.','2',1),(6,'98000100','ADMINISTRADORA DE FONDOS DE PENSIONES HABITAT S.A.','2',1),(7,'98000400','ADMINISTRADORA DE FONDOS DE PENSIONES PROVIDA ','2',1),(8,'94272000','AES GENER','2',1),(9,'96900690','AGROFOODS CENTRAL VALLEY CHILE S.A.','2',1),(10,'96656430','ALBIA S.A','1',1),(11,'76154260','AMINCO S.A.','1',1),(12,'93920000','ANTOFAGASTA MINERALS ','1',1),(13,'79622910','ARIZTIA','2',1),(14,'61102021','ARMADA DE CHILE','2',1),(15,'78423860','ARMAS GESTION LIMITADA ','1',1),(16,'77497650','ARTECOLA CHILE S.A.','2',1),(17,'78923270','ASESORIAS E INVERSIONES AMERICAN EXPRESS CHILE LIMITADA','1',1),(18,'71156600','ASEXMA','2',1),(19,'76086318','ATEM ','1',1),(20,'97006000','BANCO BCI','1',1),(21,'97036000','BANCO SANTANDER','2',1),(22,'96935470','BARANDA Y COMPAÑIA ABOGADOS ','3',1),(23,'95207000','BECHTEL CHILE LIMITADA','1',1),(24,'78591370','BETHIA S A','2',1),(25,'60203000','BIBLIOTECA DEL CONGRESO NACIONAL ','4',1),(26,'70786100','BRADFORD SCHOOL','5',1),(27,'86431800','BRINKS CHILE','2',1),(28,'60202000','CAMARA DE DIPUTADOS ','3',1),(29,'93458000','CELULOSA ARAUCO Y CONSTITUCIÓN S.A.','2',1),(30,'93834000','CENCOSUD','2',1),(31,'61608700','CENTRAL DE ABASTECIMIENTO S.N.S.S - CENABAST ','1',1),(32,'65273020','CENTRO CLINICO MILITAR VALDIVIA ','4',1),(33,'96698350','CENTRO MEDICO SANTA CATALINA ','1',1),(34,'60706000','CENTRO NACIONAL PARA LA INNOVACIÓN Y FOMENTO ','1',1),(35,'96989120','CERVECERA CCU CHILE LTDA.','1',1),(36,'76424440','CHANNELS MEDIA S.A.','1',1),(37,'96606750','CLINICA ALEMANA DE TEMUCO','5',1),(38,'90753000','CLÍNICA SANTA MARÍA','2',1),(39,'61704000','CODELCO ANDINA','1',1),(40,'81592700','COLEGIO ALEMAN DE CONCEPCION','5',1),(41,'99551110','COLEGIO DUNALASTAIR VALLE NORTE SPA','5',1),(42,'61102019','COMANDANCIA EN JEFE DE LA ARMADA ','2',1),(43,'78469420','COMERCIAL E INDUSTRIAL ACCURATEK S A','2',1),(44,'76096477','COMERCIAL ONAK SYSTEMS LIMITADA ','3',1),(45,'61978810','COMISIÓN NACIONAL DE ACREDITACIÓN ','1',1),(46,'60915000','COMISIÓN NACIONAL DE INVESTIGACIÓN CIENTÍFICA Y TEC.','1',1),(47,'60718000','COMISIÓN NACIONAL DE RIEGO','1',1),(48,'59000710','COMPANIA MINERA BARRICK CHILE LIMITADA','1',1),(49,'96567040','COMPANIA MINERA TECK QUEBRADA BLANCA S.A.','1',1),(50,'70200200','COMPAÑÍA HIJAS DE LA CARIDAD ','1',1),(51,'77116500','COMPAÑÍA MINERA CASALE','1',1),(52,'94621000','COMPAÑÍA MINERA CERRO COLORADO LTDA.','2',1),(53,'78928380','COMPAÑÍA MINERA MANTOS DE ORO','1',1),(54,'78095890','COMPAÑÍA MINERA MARICUNGA','2',1),(55,'78512520','COMPAÑÍA MINERA XSTRATA LOMAS BAYAS','1',1),(56,'94637000','COMPAÑIA SIDERURGICA HUACHIPATO S.A. ','3',1),(57,'90160000','COMPAÑÍA SUDAMERICANA DE VAPORES (CSAV)','1',1),(58,'60919000','CONSEJO DE RECTORES DE LAS UNIVERSIDADES ','4',1),(59,'60901002','CONSEJO NACIONAL DE LA CULTURA Y LAS ARTES','1',1),(60,'60400000','CONTRALORIA GENERAL DE LA REPUBLICA ','1',1),(61,'60301001','CORPORACIÓN ADMINISTRATIVA DEL PODER JUDICIAL ','4',1),(62,'60706000 ','CORPORACIÃ“N DE FOMENTO DE LA PRODUCCIÃ“N','3',0),(63,'72368400','CORPORACION DE SALUD Y DESARROLLO SOCIAL ','3',1),(64,'70005730','CORPORACION EDUCACIONAL ALIANZA FRANCESA','1',1),(65,'71309800','CORPORACION MUNICIPAL DE EDUCACION ','4',1),(66,'70859400','CORPORACION MUNICIPAL DE VALPARAISO PARA EL DESARROLLO SOCIAL','4',1),(67,'61704000','CORPORACIÓN NACIONAL DEL COBRE DE CHILE','1',1),(68,'95358000','CRAIGHOUSE SCHOOL','5',1),(69,'61953200','CRS CORDILLERA','1',1),(70,'61975700','CRS MAIPU','2',1),(71,'61933400','CRS SALVADOR ALLENDE','3',1),(72,'80276200','DELOITTE AUDITORES Y CONSULTORES LTDA','1',1),(73,'69150601','DEPARTAMENTO DE SALUD HUALQUI ','1',1),(74,'94141000','DERCO S.A.','1',1),(75,'60905000','DIRECCIÓN DE BIBLIOTECAS ARCHIVOS Y MUSEOS ','1',1),(76,'61979960','DIRECCION DE EDUCACION DOCTRINA E HISTORIA DE CARABINEROS ','4',1),(77,'70020190','DIRECCIÓN DE PROMOCIÓN DE EXPORTACIONES (PROCHILE)','2',1),(78,'61104000','DIRECCIÓN GENERAL DE AERONÁUTICA CIVIL ','1',1),(79,'61004000','DIRECCIÓN GENERAL DE GENDARMERÍA DE CHILE ','1',1),(80,'61938500','DIRECCIÓN LOGISTICA DE CARABINEROS DE CHILE ','4',1),(81,'61004098','DIRECCION REGIONAL GENDARMERIA PUERTO MONTT. ','3',1),(82,'99597170','DOMINION SPA','2',1),(83,'61101045','EJERCITO DE CHILE','1',1),(84,'61101010','EJERCITO DE CHILE V DIVISION PUNTA ARENAS','1',1),(85,'61219000','EMPRESA DE TRANSPORTE DE PASAJEROS METRO S.A ','3',1),(86,'92580000','EMPRESA NACIONAL DE TELECOMUNICACIONES SA ','3',1),(87,'90266000','ENAEX S.A. ','3',1),(88,'96672640','ENTEL SERVICIOS EMPRESARIALES S.A. ','3',1),(89,'61004035','ESCUELA DE GENDARMERIA DE CHILE ','3',1),(90,'83198500','ESTABLECIMIENTOS EDUCACIONALES SAN GABRIEL S A','5',1),(91,'89900400','ESVAL S.A','2',1),(92,'76236142','EVENTECH SPA ','2',1),(93,'77424780','EWOS CHILE ALIMENTOS LIMITADA. ','3',1),(94,'78604410','EXPEDITORS CHILE TRANSPORTES INTERNACIONALES LIMITADA','1',1),(95,'90749000','FALABELLA','2',1),(96,'69500502','FAO REG. OFF. FOR LATIN AMERICA AND THE CARIBBEAN','1',1),(97,'81148200','FERROCARRIL DE ANTOFAGASTA A BOLIVIA ','3',1),(98,'96684580','FERROCARRIL DEL PACÍFICO S.A.','1',1),(99,'61216000','FERROCARRILES DEL ESTADO','2',1),(100,'61978830','FF 07 ALMIRANTE LYNCH ','4',1),(101,'60109000','FONDO DE SOLIDARIDAD E INVERSION SOCIAL ','3',1),(102,'61603000','FONDO NACIONAL DE SALUD ','1',1),(103,'77205750','FUENZALIDA Y WONG LTDA. ','3',1),(104,'81839900','FUND EDUCACIONAL SANTIAGO COLLEGE','5',1),(105,'72754700','FUNDACIÓN INSTITUTO PROFESIONAL DUOC UC ','1',1),(106,'71238300','FUNDACIÓN TELETON ','1',1),(107,'61004108','GENDARMERIA DE CHILE SERVICIO DE BIENESTAR ','4',1),(108,'76129094','GEOPARK FELL SPA ','3',1),(109,'92176000','GERDAU AZA','2',1),(110,'77305910','GMS PRODUCTOS GRÁFICOS LIMITADA ','3',1),(111,'76788080','GNL QUINTERO','2',1),(112,'72224100','GOBIERNO REGIONAL DE ANTOFAGASTA ','1',1),(113,'72235100','GOBIERNO REGIONAL V REGIÓN ','3',1),(114,'99513400','GRUPO CGE','2',1),(115,'79999850','HAROLDO FUENTEALBA ESPINOZA Y OTRO LTDA. ','3',1),(116,'78803490','HENKEL CHILE LIMITADA','2',1),(117,'61602260','HOSPITAL BASE OSORNO ','1',1),(118,'65075485','HOSPITAL CLINICO METROPOLITANO DE LA FLORIDA DOCTORA ELOISA ','4',1),(119,'61602222','HOSPITAL DE ANGOL ','1',1),(120,'61601000','HOSPITAL DEL SALVADOR (VALPARAÍSO)','1',1),(121,'61602232','HOSPITAL DOCTOR HERNÁN HENRÍQUEZ ARAVENA ','3',1),(122,'61608104','HOSPITAL DR. LUCIO CÓRDOVA','1',1),(123,'61602213','HOSPITAL INTERCULTURAL KALLVU LLANKA ','3',1),(124,'61958500','HOSPITAL PADRE ALBERTO HURTADO ','1',1),(125,'61607508','HOSPITAL RÍO BUENO ','1',1),(126,'61606608','HOSPITAL SAN MARTIN DE QUILLOTA ','2',1),(127,'69010100','ILUSTRE MUNICIPALIDAD DE ARICA','2',1),(128,'69240100','ILUSTRE MUNICIPALIDAD DE AYSEN ','4',1),(129,'69231100','ILUSTRE MUNICIPALIDAD DE CHAITEN ','4',1),(130,'69240200','ILUSTRE MUNICIPALIDAD DE CISNES ','4',1),(131,'69030200','ILUSTRE MUNICIPALIDAD DE COPIAPO ','4',1),(132,'69240300      ','ILUSTRE MUNICIPALIDAD DE COYHAIQUE ','4',1),(133,'69100100','ILUSTRE MUNICIPALIDAD DE CURICO','2',1),(134,'69073000','ILUSTRE MUNICIPALIDAD DE EL MONTE ','4',1),(135,'69254300','ILUSTRE MUNICIPALIDAD DE ESTACION CENTRAL','2',1),(136,'69190200','ILUSTRE MUNICIPALIDAD DE GALVARINO','1',1),(137,'69071900','ILUSTRE MUNICIPALIDAD DE ISLA DE MAIPO ','3',1),(138,'69072400','ILUSTRE MUNICIPALIDAD DE LA GRANJA ','4',1),(139,'69040100','ILUSTRE MUNICIPALIDAD DE LA SERENA','2',1),(140,'69201100','ILUSTRE MUNICIPALIDAD DE LAGO RANCO','2',1),(141,'69170300','ILUSTRE MUNICIPALIDAD DE LAJA ','4',1),(142,'69080800','ILUSTRE MUNICIPALIDAD DE LAS CABRAS','2',1),(143,'69130300','ILUSTRE MUNICIPALIDAD DE LINARES ','4',1),(144,'69060400','ILUSTRE MUNICIPALIDAD DE LLAY LLAY ','4',1),(145,'69255200','ILUSTRE MUNICIPALIDAD DE LO BARNECHEA','1',1),(146,'69254100','ILUSTRE MUNICIPALIDAD DE LO PRADO ','3',1),(147,'69200400','ILUSTRE MUNICIPALIDAD DE MARIQUINA ','4',1),(148,'69170701','ILUSTRE MUNICIPALIDAD DE NACIMIENTO DPTO COMUN ','4',1),(149,'69040700','ILUSTRE MUNICIPALIDAD DE OVALLE','2',1),(150,'69072600','ILUSTRE MUNICIPALIDAD DE PAINE ','4',1),(151,'69071300','ILUSTRE MUNICIPALIDAD DE QUILICURA SECPLAN','2',1),(152,'69060700','ILUSTRE MUNICIPALIDAD DE QUINTERO ','4',1),(153,'69100400','ILUSTRE MUNICIPALIDAD DE RAUCO ','4',1),(154,'69254800','ILUSTRE MUNICIPALIDAD DE RECOLETA ','4',1),(155,'69071200','ILUSTRE MUNICIPALIDAD DE RENCA','2',1),(156,'69081300','ILUSTRE MUNICIPALIDAD DE REQUINOA ','4',1),(157,'69190600','ILUSTRE MUNICIPALIDAD DE SAAVEDRA','1',1),(158,'69041400','ILUSTRE MUNICIPALIDAD DE SALAMANCA ','1',1),(159,'69252500','ILUSTRE MUNICIPALIDAD DE SAN PEDRO DE ATACAMA ','4',1),(160,'69070100','ILUSTRE MUNICIPALIDAD DE SANTIAGO ','4',1),(161,'69160700','ILUSTRE MUNICIPALIDAD DE TIRUA','1',1),(162,'69200100','ILUSTRE MUNICIPALIDAD DE VALDIVIA ','4',1),(163,'69255600','ILUSTRE MUNICIPALIDAD DE VITACURA','2',1),(164,'69070900','ILUSTRE MUNICIPALIDAD MAIPU','2',1),(165,'61955000','ILUSTRE MUNICIPALIDAD PADRE LAS CASAS','2',1),(166,'61307000','INSTITUTO DE DESARROLLO AGROPECUARIO','2',1),(167,'61605000','INSTITUTO DE SALUD PÚBLICA DE CHILE','4',1),(168,'61533000','INSTITUTO DE SEGURIDAD LABORAL ','1',1),(169,'61311000','INSTITUTO FORRESTAL (INFOR)','2',1),(170,'96689620','INSTITUTO HEBREO ','1',1),(171,'65028707','INSTITUTO NACIONAL DE DERECHOS HUMANOS ','1',1),(172,'60110000','INSTITUTO NACIONAL DE LA JUVENTUD (INJUV)','2',1),(173,'65999669','INSTITUTO NACIONAL DE PROPIEDAD INDUSTRIAL (INAPI)','2',1),(174,'79860950','INSTITUTO PROFESIONAL ARCOS','5',1),(175,'78205980','INSTITUTO PROFESIONAL LOS LEONES ','5',1),(176,'76092207','INTEGRACIÓN DE TECNOLOGÍAS ITQ LIMITADA ','3',1),(177,'79775550','IPCHILE','5',1),(178,'96522500','ISAPRE MÁSVIDA','2',1),(179,'70072600','JUNJI','2',1),(180,'96978000','KAPSCH TRAFFICCOM CHILE S.A. ','3',1),(181,'78833980','KEFA TECNOLOGIA','2',1),(182,'96843130','KOMATSU CUMMINS CHILE LTDA.','5',1),(183,'93135000','LABORATORIO BAGO DE CHILE S.A. ','2',1),(184,'76178737','LABORATORIO NEXTFARMA LIMITADA','2',1),(185,'91650000','LABORATORIO SAVAL','2',1),(186,'96944330','LABORATORIOS GARDEN HOUSE CHILE S A','2',1),(187,'89862200','LATAM AIRLINES GROUP S.A.','1',1),(188,'78114650','LECHNER Y COMPANIA LIMITADA','2',1),(189,'96874380','LOGISTICA LINSA S.A.','2',1),(190,'85272800','LUNDING MINING CORPORATION (MIN.CANDELARIA)','1',1),(191,'92730000','MAESTRANZA DIESEL S.A.','2',1),(192,'76179187','MARFOOD S.A. ','3',1),(193,'96802690','MASISA S.A ','3',1),(194,'76318798','MBA LAZARD CHILE','1',1),(195,'59057230','MCKINSEY & COMPANY','2',1),(196,'77880830','MEJILLONES AMERICA ','1',1),(197,'59043540','MERCK CHILE','2',1),(198,'94405000','MERRILL LYNCH ','2',1),(199,'80993900','MERRILL LYNCH CORREDORES DE BOLSA SPA ','3',1),(200,'99289000','METLIFE','2',1),(201,'94099000','MICROSYSTEM','5',1),(202,'76727040','MINERA CENTINELA ','3',1),(203,'96508670','MINERA MERIDIAN','2',1),(204,'91840000','MINERA MICHILLA','2',1),(205,'86542100','MINERA SPENCE','2',1),(206,'85758600','MINERA ZALDÍVAR','2',1),(207,'\" \n76821240\"','MINERALES DEL SUR','2',1),(208,'61301000','MINISTERIO DE AGRICULTURA','2',1),(209,'61402000','MINISTERIO DE BIENES NACIONALES ','1',1),(210,'61011000','MINISTERIO DE DEFENSA','2',1),(211,'61202000','MINISTERIO DE OBRAS PUBLICAS','2',1),(212,'60601000','MINISTERIO DE RELACIONES EXTERIORES ','1',1),(213,'60501000','MINISTERIO DEL INTERIOR Y SEGURIDAD PÚBLICA ','1',1),(214,'61935400','MINISTERIO PUBLICO','2',1),(215,'76080192','MOLCOM TELECOMUNICACIONES LTDA.','1',1),(216,'83693800','MONSANTO CHILE S.A. ','2',1),(217,'83150900','MULTITIENDAS CORONA S.A.','1',1),(218,'78933990','NETSECURE INFORMATICA LIMITADA','1',1),(219,'76184070','OSTER DE CHILE COMERCIALIZADORA LTDA . ','3',1),(220,'78040120','OUTOTEC CHILE SA','2',1),(221,'96510970','PANELES ARAUCO, S.A.','2',1),(222,'76017019','PLAZA S.A. ','3',1),(223,'81698900','PONTIFICIA UNIVERSIDAD CATOLICA DE CHILE','5',1),(224,'81669200','PONTIFICIA UNIVERSIDAD CATOLICA DE VALPARAISO','5',1),(225,'78018570','PROCORP','5',1),(226,'86731200','QUINTEC CHILE S.A.','1',1),(227,'82431300','REDLAND SCHOOL SA Y CIA COMANDITA POR ACCIONES','5',1),(228,'85208700','RENTAEQUIPOS LEASING S.A. ','3',1),(229,'99501870','RENTAPACK','2',1),(230,'77878040','REPRESENTACIONES AEROTECH LTDA. ','4',1),(231,'79968900','RYC','1',1),(232,'96786880','SACYR CHILE S.A.','1',1),(233,'76125157','SACYR OPERACION Y SERVICIOS S.A.','1',1),(234,'61308000','SAG','5',1),(235,'85937800','SAINT PAUL S SCHOOL SOCIEDAD LIMITADA','5',1),(236,'78833980','SALGADO Y COMPAÑIA LTDA. ','3',1),(237,'91502000','SALINAS Y FABRE','2',1),(238,'96677260','SALMOFOOD SA','1',1),(239,'61973900','SANIDAD EJERCITO DE CHILE COSALE ','1',1),(240,'96549050','SEGUROS DE VIDA SURA S.A. ','1',1),(241,'61601000','SEREMI DE SALUD ANTOFAGASTA','1',1),(242,'61601000','SEREMI DE SALUD ARICA Y PARINACOTA','3',1),(243,'61601000','SEREMI DE SALUD ATACAMA','2',1),(244,'61601000','SEREMI DE SALUD BIO BIO','4',1),(245,'61606402','SEREMI DE SALUD COQUIMBO ','1',1),(246,'61601000','SEREMI DE SALUD DE AYSEN','4',1),(247,'61601000','SEREMI DE SALUD DE LA ARAUCANIA','4',1),(248,'61601000','SEREMI DE SALUD DE LOS LAGOS','4',1),(249,'61601000','SEREMI DE SALUD DE LOS RIOS','3',1),(250,'61601000','SEREMI DE SALUD MAGALLANES','3',1),(251,'61601000','SEREMI DE SALUD MAULE','2',1),(252,'61601000','SEREMI DE SALUD METROPOLITANO','3',1),(253,'61601000','SEREMI DE SALUD OHIGGINS','2',1),(254,'61601000','SEREMI DE SALUD TARAPACA','1',1),(255,'61601000','SEREMI DE SALUD VALPARAISO','2',1),(256,'82174900','SERVICIO DE COOPERACION TECNICA ','4',1),(257,'72443600','SERVICIO DE EVALUACIÓN AMBIENTAL ','1',1),(258,'72443600','SERVICIO DE EVALUACIÓN AMBIENTAL ','1',1),(259,'61002000','SERVICIO DE REGISTRO CIVIL E IDENTIFICACION ','4',1),(260,'61606700','SERVICIO DE SALUD ACONCAGUA ','4',1),(261,'61606200','SERVICIO DE SALUD ANTOFAGASTA','1',1),(262,'61606201','SERVICIO DE SALUD ANTOFAGASTA (HOSPITAL DE ANTOFAGASTA)','1',1),(263,'61606202','SERVICIO DE SALUD ANTOFAGASTA (HOSPITAL DE CALAMA)','1',1),(264,'61955100','SERVICIO DE SALUD ARAUCANIA NORTE ','1',1),(265,'61607400','SERVICIO DE SALUD ARAUCANIA SUR','4',1),(266,'61954500','SERVICIO DE SALUD ARAUCO ','3',1),(267,'61606300','SERVICIO DE SALUD ATACAMA ','2',1),(268,'61607800','SERVICIO DE SALUD AYSEN','3',1),(269,'61607300','SERVICIO DE SALUD BIO BIO ','1',1),(270,'61979210','SERVICIO DE SALUD CHILOE','3',1),(271,'61606400','SERVICIO DE SALUD COQUIMBO','1',1),(272,'61606000','SERVICIO DE SALUD DE ARICA ','3',1),(273,'61607100','SERVICIO DE SALUD DE CONCEPCIÓN ','1',1),(274,'61607700','SERVICIO DE SALUD DEL RELONCAVÍ ','2',1),(275,'61606100','SERVICIO DE SALUD IQUIQUE','2',1),(276,'61606800','SERVICIO DE SALUD LIBERTADOR BDO OHIGGINS','1',1),(277,'61607900','SERVICIO DE SALUD MAGALLANES ','1',1),(278,'61606900','SERVICIO DE SALUD MAULE ','1',1),(279,'61608600','SERVICIO DE SALUD METROPOLITANO CENTRAL','4',1),(280,'61608000','SERVICIO DE SALUD METROPOLITANO NORTE','4',1),(281,'61608200','SERVICIO DE SALUD METROPOLITANO OCCIDENTE ','1',1),(282,'61608101','SERVICIO DE SALUD METROPOLITANO SUR','1',1),(283,'61608101','SERVICIO DE SALUD METROPOLITANO SUR (HOSPITAL BARROS LUCO-TRUDEAU)','1',1),(284,'61608500','SERVICIO DE SALUD METROPOLITANO SUR ORIENTE  ','1',1),(285,'61607000','SERVICIO DE SALUD ÑUBLE ','1',1),(286,'61608406','SERVICIO DE SALUD ORIENTE','3',1),(287,'61607600','SERVICIO DE SALUD OSORNO ','1',1),(288,'61607200','SERVICIO DE SALUD TALCAHUANO','4',1),(289,'61607500','SERVICIO DE SALUD VALDIVIA ','1',1),(290,'61606500','SERVICIO DE SALUD VALPARAÍSO SAN ANTONIO ','3',1),(291,'61606609','SERVICIO DE SALUD VINA DEL MAR QUILLOTA ','4',1),(292,'61702000','SERVICIO NACIONAL DE GEOLOGÍA Y MINERÍA ','1',1),(293,'72576700','SERVICIO NACIONAL DE LA DISCAPACIDAD (SENADIS)','2',1),(294,'60107000','SERVICIO NACIONAL DE LA MUJER (SERNAM)','2',1),(295,'60704000','SERVICIO NACIONAL DE TURISMO (SERNATUR)','2',1),(296,'61961000','SERVICIO NACIONAL DEL ADULTO MAYOR','1',1),(297,'76250123','SERVICIOS DE TELECOMUNICACIONES NETRIUM TELECOM LIMITADA','2',1),(298,'96777170','SKRENTAL','1',1),(299,'76213076','SOCIEDAD CONCESIONARIA RUTA DEL ALGARROBO S.A.','1',1),(300,'76172397','SOCIEDAD CONCESIONARIA RUTAS DEL DESIERTO S.A.','1',1),(301,'76317736','SOCIEDAD CONCESIONARIA SALUD SIGLO XXI S.A','1',1),(302,'76172387','SOCIEDAD CONCESIONARIA VALLES DEL BIO BIO S.A.','1',1),(303,'78092750','SOCIEDAD EDUCACIONAL SAINT JOHNS SCHOOL COMPANIA LIMITADA','5',1),(304,'81414100','SOCIEDAD INSTITUTO ALEMÁN DE VALDIVIA ','3',1),(305,'76541630','SOCIEDAD PUNTA DE LOBOS','2',1),(306,'76056178','SOPORTE Y GESTION EN INFORMATICA LTDA','1',1),(307,'79947100','SOQUIMICH','2',1),(308,'76047102','SUATRANS CHILE, S.A.','2',1),(309,'60515000','SUBSECRETARIA DE DESARROLLO REGIONAL Y ADMINISTRATIVO (SUBDERE)','2',1),(310,'61701000','SUBSECRETARIA DE MINERÍA','2',1),(311,'60719000','SUBSECRETARIA DE PESCA ','3',1),(312,'61975700','SUBSECRETARÍA DE REDES ASISTENCIALES ','1',1),(313,'61601000','SUBSECRETARIA DE SALUD PUBLICA ','1',1),(314,'61979930','SUBSECRETARÍA DEL MEDIO AMBIENTE ','3',1),(315,'60901000','SUBSECRETARIA DEL MINISTERIO DE EDUCACION PUBLICA','2',1),(316,'61801000','SUBSECRETARIA DEL MINISTERIO DE LA VIVIENDA Y URBANISMO','1',1),(317,'60101000','SUBSECRETARÍA GENERAL DE GOBIERNO (SEGEGOB)','2',1),(318,'96995150','SURA DATA CHILE','1',1),(319,'76130712','SYNAPSIS SOLUCIONES Y SERVICIOS IT LTDA. ','2',1),(320,'76385060','TATA CONSULTANCY SERVICES CHILE S.A.','2',1),(321,'76072701','TECNOFARMA','2',1),(322,'76071387','TECNOVISUAL LTDA. ','3',1),(323,'96574420','TEGA ACOTEC S.A. ','3',1),(324,'90805000','THE GRANGE SCHOOL','5',1),(325,'71299600','THE MACKAY SCHOOL','5',1),(326,'96791290','THE MAYFLOWER SCHOOL','5',1),(327,'99509360','THE WESSEX SCHOOL','5',1),(328,'76335319','TOTAL NUEVAS ENERGÍAS CHILE SPA ','3',1),(329,'76300290','TRANSACTION LINE CHILE S.A. ','3',1),(330,'96689310','TRANSBANK ','1',1),(331,'77219710','TREBULCO SCHOOL','5',1),(332,'76037893','ULTIMAMILLA REDES CHILE LIMITADA','5',1),(333,'69500501','UNESCO ','1',1),(334,'78042900','UNIVERSAL MUSIC SA ','3',1),(335,'71543200','UNIVERSIDAD ADOLFO IBAÑEZ','5',1),(336,'73923400','UNIVERSIDAD ALBERTO HURTADO','5',1),(337,'71540100','UNIVERSIDAD ANDRES BELLO ','5',1),(338,'71733500','UNIVERSIDAD ARCIS ','5',1),(339,'70777500','UNIVERSIDAD ARTURO PRAT','5',1),(340,'81380500','UNIVERSIDAD AUSTRAL','5',1),(341,'71633300','UNIVERSIDAD AUTONOMA DE CHILE','5',1),(342,'81518400','UNIVERSIDAD CATOLICA  DEL NORTE','5',1),(343,'71918700','UNIVERSIDAD CATOLICA DE TEMUCO','5',1),(344,'71918300','UNIVERSIDAD CATOLICA DEL MAULE','5',1),(345,'71912200','UNIVERSIDAD CATOLICA SILVA HENRIQUEZ','5',1),(346,'70995200','UNIVERSIDAD CENTRAL','5',1),(347,'71639300','UNIVERSIDAD DE ACONCAGUA','5',1),(348,'70791800','UNIVERSIDAD DE ANTOFAGASTA ','5',1),(349,'71236700','UNIVERSIDAD DE ATACAMA','5',1),(350,'60910000','UNIVERSIDAD DE CHILE','5',1),(351,'60910000','\"UNIVERSIDAD DE CHILE (DECANATO - FACULTAD DE FILOSOFÍA Y\nHUMANIDADES)\"','4',1),(352,'60910000','UNIVERSIDAD DE CHILE (FACULTAD DE ECONOMIA Y NEGOCIOS)','2',1),(353,'60910000','UNIVERSIDAD DE CHILE (FCFM DEPARTAMENTO DE INGENIERIA ELECTRICA)','4',1),(354,'60910000','UNIVERSIDAD DE CHILE (VEX ARCHIVO CENTRAL)','4',1),(355,'81494400','UNIVERSIDAD DE CONCEPCION','5',1),(356,'87912900','UNIVERSIDAD DE LA FRONTERA','5',1),(357,'71915800','UNIVERSIDAD DE LA SANTISIMA CONCEPCION','5',1),(358,'70783100','UNIVERSIDAD DE LA SERENA','5',1),(359,'71614000','UNIVERSIDAD DE LOS ANDES','5',1),(360,'70772100','UNIVERSIDAD DE LOS LAGOS','5',1),(361,'71133700','UNIVERSIDAD DE MAGALLANES','5',1),(362,'60911000','UNIVERSIDAD DE SANTIAGO DE CHILE ','5',1),(363,'70885500','UNIVERSIDAD DE TALCA','5',1),(364,'70770800','UNIVERSIDAD DE TARAPACA','2',1),(365,'60921000','UNIVERSIDAD DE VALPARAISO','5',1),(366,'60921000','UNIVERSIDAD DE VALPARAÍSO ','4',1),(367,'60911006','UNIVERSIDAD DEL BIO-BIO','5',1),(368,'60911006','UNIVERSIDAD DEL BIO-BIO (VICERRECTORIA DE ECONOMIA)','2',1),(369,'71644300','UNIVERSIDAD DEL DESARROLLO','5',1),(370,'71704700','UNIVERSIDAD DEL PACIFICO','5',1),(371,'70990700','UNIVERSIDAD DIEGO PORTALES ','5',1),(372,'70771500','UNIVERSIDAD GABRIELA MISTRAL ','5',1),(373,'71500500','UNIVERSIDAD MAYOR','5',1),(374,'70754700','UNIVERSIDAD PLAYA ANCHA','5',1),(375,'71631900','UNIVERSIDAD SAN SEBASTIAN','5',1),(376,'71551500','UNIVERSIDAD SANTO TOMAS','5',1),(377,'81668700','UNIVERSIDAD TECNICA FEDERICO SANTA MARIA VALPARAISO','5',1),(378,'72012000','UNIVERSIDAD TECNOLÓGICA DE CHILE INACAP','1',1),(379,'71618900','UNIVERSIDAD UCINF','5',1),(380,'71629400','UNIVERSIDAD VIÑA DEL MAR','5',1),(381,'70729100','UTEM','5',1),(382,'76058647','VERISURE CHILE SPA ','3',1),(383,'90227000','VIÑA CONCHA Y TORO','2',1),(384,'86326300','VIÑA CONO SUR','2',1),(385,'91041000','VIÑA SAN PEDRO TARAPACÁ','2',1),(386,'86547900','VIÑA SANTA RITA','2',1),(387,'96512200','VIÑEDOS EMILIANA  SA','2',1),(388,'96677260','VITAPRO ','1',1),(389,'76284920','VOLVO CHILE SPA','1',1),(390,'12873312','XIMENA LORETO OSORIO SOTO ','3',1),(391,'88325800','XSTRATA COPPER CHILE','2',1),(392,'60505101','XV ZONA DE CARABINEROS ARICA Y PARINACOTA ','4',1),(394,'12345678','testing','3',1),(395,'12345678','testing cliente ','5',1),(396,'12345678         ','testing','3',0),(397,'1234567899','sxdrcftvgybhunjim','4',1),(398,'123456789','lpkijnuhbygvtfcrdx','2',1),(399,'239876545 ','razon social de prueba','3',1),(400,'12345678','zasxedrftgybgcrdx','1',1),(401,'12345678','iuytrefghj','1',1),(402,'12345678 ','testing :D','3',1),(403,'12345678','iytrsxcvbnmnbv','1',1),(404,'127895678 ','xD  xD  xD','3',1);
/*!40000 ALTER TABLE `tbclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbejecutivos`
--

DROP TABLE IF EXISTS `tbejecutivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbejecutivos` (
  `idtbejecutivos` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1' COMMENT '0: Inactivo\n1: Activo',
  PRIMARY KEY (`idtbejecutivos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbejecutivos`
--

LOCK TABLES `tbejecutivos` WRITE;
/*!40000 ALTER TABLE `tbejecutivos` DISABLE KEYS */;
INSERT INTO `tbejecutivos` VALUES (1,'Carol Noches',1),(2,'Jose Manuel Mora',1),(3,'Marcelo Ramirez',1),(4,'Nicol Villa',1),(5,'Paola Ramirez',1);
/*!40000 ALTER TABLE `tbejecutivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbusuarios` (
  `idtbusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `activo` int(11) DEFAULT '1' COMMENT '0: Inactivo\n1: Activo',
  PRIMARY KEY (`idtbusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuarios`
--

LOCK TABLES `tbusuarios` WRITE;
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` VALUES (1,'erwin','admin',1);
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dbclientes'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-12 13:19:33
