-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: banco_coleta
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `id_Administrador` int(11) NOT NULL,
  `fk_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Administrador`,`fk_usuario`),
  KEY `fk_Administrador_Usuario1_idx` (`fk_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calculadora`
--

DROP TABLE IF EXISTS `calculadora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calculadora` (
  `idCalculadora` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `fk_pedido` int(11) NOT NULL,
  PRIMARY KEY (`idCalculadora`,`fk_pedido`),
  KEY `fk_Calculadora_PedidoColeta1_idx` (`fk_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calculadora`
--

LOCK TABLES `calculadora` WRITE;
/*!40000 ALTER TABLE `calculadora` DISABLE KEYS */;
/*!40000 ALTER TABLE `calculadora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_Cliente` int(11) NOT NULL,
  `Pontos` int(11) DEFAULT NULL,
  `fk_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Cliente`,`fk_usuario`),
  KEY `fk_Cliente_Usuario_idx` (`fk_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coletor`
--

DROP TABLE IF EXISTS `coletor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coletor` (
  `id_Coletor` int(11) NOT NULL,
  `Descricao` varchar(500) DEFAULT NULL,
  `fk_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Coletor`,`fk_usuario`),
  KEY `fk_Coletor_Usuario1_idx` (`fk_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coletor`
--

LOCK TABLES `coletor` WRITE;
/*!40000 ALTER TABLE `coletor` DISABLE KEYS */;
/*!40000 ALTER TABLE `coletor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coletor_pedido`
--

DROP TABLE IF EXISTS `coletor_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coletor_pedido` (
  `id_Coletor_Pedido` int(11) NOT NULL,
  `fk_Coletor` int(11) NOT NULL,
  `fk_PedidoColeta` int(11) NOT NULL,
  PRIMARY KEY (`id_Coletor_Pedido`),
  KEY `fk_Coletor_has_PedidoColeta_PedidoColeta1_idx` (`fk_PedidoColeta`),
  KEY `fk_Coletor_has_PedidoColeta_Coletor1_idx` (`fk_Coletor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coletor_pedido`
--

LOCK TABLES `coletor_pedido` WRITE;
/*!40000 ALTER TABLE `coletor_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `coletor_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `CEP` varchar(45) DEFAULT NULL,
  `Cidade` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Bairro` varchar(45) DEFAULT NULL,
  `Logradouro` varchar(45) DEFAULT NULL,
  `Numero` varchar(45) DEFAULT NULL,
  `Complemento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEndereco`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'38500-000','Monte Carmelo','MG','Cidade Jardim','Rua das Alamandas','666','Perto da casa das iscas');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidocoleta`
--

DROP TABLE IF EXISTS `pedidocoleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidocoleta` (
  `id_PedidoColeta` int(11) NOT NULL,
  `midia` varchar(45) DEFAULT NULL,
  `qnt_plastico` varchar(10) DEFAULT NULL,
  `qnt_vidro` varchar(10) DEFAULT NULL,
  `qnt_aluminio` varchar(10) DEFAULT NULL,
  `qnt_papel` varchar(10) DEFAULT NULL,
  `fk_cliente` varchar(50) NOT NULL,
  `fk_pontocoleta` int(11) NOT NULL,
  PRIMARY KEY (`id_PedidoColeta`,`fk_cliente`,`fk_pontocoleta`),
  KEY `fk_PedidoColeta_Cliente1_idx` (`fk_cliente`),
  KEY `fk_PedidoColeta_PontoColeta` (`fk_pontocoleta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidocoleta`
--

LOCK TABLES `pedidocoleta` WRITE;
/*!40000 ALTER TABLE `pedidocoleta` DISABLE KEYS */;
INSERT INTO `pedidocoleta` VALUES (99654,'C:fotos-reciclo/nomeImg.jpg','10kg','1kg','2kg','0kg','tereza@teste.com',0),(10690,'C:fotos-reciclo/nomeImg.jpg','10kg','1kg','12kg','10kg','tereza@teste.com',2),(91827,'C:fotos-reciclo/nomeImg.jpg','1','1','1','1','tereza@teste.com',2);
/*!40000 ALTER TABLE `pedidocoleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pontocoleta`
--

DROP TABLE IF EXISTS `pontocoleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pontocoleta` (
  `idPontoColeta` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `horario_funcionamento` varchar(100) DEFAULT NULL,
  `info_contato` varchar(45) DEFAULT NULL,
  `Endereco_idEndereco` int(11) NOT NULL,
  `fk_PontoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idPontoColeta`,`Endereco_idEndereco`,`fk_PontoUsuario`),
  KEY `fk_PontoColeta_Endereco1_idx` (`Endereco_idEndereco`),
  KEY `fk_PontoColeta_Usuario` (`fk_PontoUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pontocoleta`
--

LOCK TABLES `pontocoleta` WRITE;
/*!40000 ALTER TABLE `pontocoleta` DISABLE KEYS */;
INSERT INTO `pontocoleta` VALUES (2,'teste','normal','alternado','orelhão',1,'higor@teste.com'),(43034,'Novo','PapelÃ£o','11hrs','OrelhÃ£o',1,'higor@teste.com');
/*!40000 ALTER TABLE `pontocoleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` varchar(45) NOT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `CNPJ` varchar(14) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `Telefone` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `Endereco_idEndereco` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`Endereco_idEndereco`),
  KEY `fk_Usuario_Endereco1_idx` (`Endereco_idEndereco`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('higor@teste.com',NULL,NULL,'1998-10-17',NULL,'123456',3,1),('tereza@teste.com','1','1','1999-05-20','1','123456',1,1);
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

-- Dump completed on 2022-07-27 10:08:36
