-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.19 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projeto2
CREATE DATABASE IF NOT EXISTS `projeto2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projeto2`;

-- Copiando estrutura para tabela projeto2.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `CPF` varchar(60) NOT NULL,
  `Endereco` varchar(60) DEFAULT NULL,
  `Telefone` varchar(20) NOT NULL,
  `Desc_cliente` varchar(120) NOT NULL,
  `Ativo` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projeto2.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`ID`, `email`, `senha`, `Nome`, `CPF`, `Endereco`, `Telefone`, `Desc_cliente`, `Ativo`) VALUES
	(1, 'cristiantfreitas@gmail.com', '7bb0bb352ffb2f5245f25149889a0c76', 'Cristian Freitas', '46081530809', 'R. vista Bela', '39115225', 'Arroz e bom', 1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto2.moderadores
CREATE TABLE IF NOT EXISTS `moderadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projeto2.moderadores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `moderadores` DISABLE KEYS */;
INSERT INTO `moderadores` (`id`, `email`, `senha`, `nome`, `ativo`) VALUES
	(1, 'cristiantfreitas@gmail.com', '7bb0bb352ffb2f5245f25149889a0c76', 'Cristian', 1);
/*!40000 ALTER TABLE `moderadores` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto2.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `preco` double NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `descricao` varchar(1000) DEFAULT NULL,
  `imagem` varchar(60),
  `altura` int(4),
  `largura` int(4),
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projeto2.produtos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nome`, `categoria`, `preco`, `ativo`, `descricao`, `imagem`,`altura`, `largura` ) VALUES
                        (0, 'Teclado Multilaser Warrior', '3', 200, 1, 'Teclado gamer Multilaser Warrior preto tc508','multilaser_warrior_preto.png', 220, 420),
                        (1, 'Headphone pulse bluetooth', '2', 150, 1, 'Headphone pulse bluetooth preto ph150','pulse_ph150_preto.jpg',220, 120 ),
                        (2, 'Dell Inspiron 15 5000','1', 1949, 1, 'Dell Inspiron 15 5000 5566 Intel Core i3-6006U 2.0 GHz 4096 MB 500 GB', 'Dell_inspirion_15_5000.jpg', 220, 120)
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
