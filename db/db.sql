/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.6.32-78.1 : Database - miste872_prod
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`miste872_prod` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `miste872_prod`;

/*Table structure for table `tbl_cart` */

DROP TABLE IF EXISTS `tbl_cart`;

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Carts',
  `id_session` varchar(255) NOT NULL,
  `id_produto` int(11) NOT NULL COMMENT 'Produtos',
  `id_cidade` int(11) DEFAULT NULL COMMENT 'Cidades',
  `qtde` decimal(6,0) NOT NULL,
  `valor_unitario` decimal(6,2) NOT NULL,
  `situacao` char(1) NOT NULL COMMENT 'a - aberto / f - fechado',
  PRIMARY KEY (`id_cart`),
  KEY `id_produto` (`id_produto`),
  KEY `id_cidade` (`id_cidade`),
  CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`),
  CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`id_cidade`) REFERENCES `tbl_cidade` (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COMMENT='Cadastro dos itens do pedido para salgado';

/*Data for the table `tbl_cart` */

insert  into `tbl_cart`(`id_cart`,`id_session`,`id_produto`,`id_cidade`,`qtde`,`valor_unitario`,`situacao`) values (2,'acde5a6d0cc18603d0e10944035bd344',1,1,'1','3.00','a'),(3,'f3bfcab7f89b6f1d84656631ddd8190e',1,1,'1','3.00','a'),(4,'538220f35cd5c6276647c9a8613ebfb0',1,1,'1','3.00','d'),(5,'e1e010c3ecf30011e0f62ab905f7e151',2,1,'1','3.00','d'),(6,'e1e010c3ecf30011e0f62ab905f7e151',3,1,'1','3.00','d'),(7,'f11955ee6f1ac865a09435ff7a41d4fc',5,1,'5','3.00','d'),(8,'efc6a0bb480d9a004815bda96ac6c9c5',1,1,'1','3.00','d'),(9,'a14a980faf54842daedb77d169daf3fa',3,1,'6','3.00','d'),(10,'c9986bc065c6f5ba2d627dc8f4bd18fa',1,1,'2','3.00','d'),(11,'1dd5ac53a9beecdbbbfea92e6ba29e42',1,1,'1','3.00','d'),(12,'1dd5ac53a9beecdbbbfea92e6ba29e42',2,1,'4','3.00','d'),(13,'0954a636d08975922c178ce60993bcf5',4,1,'4','3.00','d'),(14,'9b60600235cefe2872aa60c7ad347595',4,1,'3','3.00','d'),(15,'1ea3e24e37e57ef0944fe75644d41a8b',1,1,'1','3.00','d'),(16,'0d0d584784a1aa52fd998c632b45a5a6',1,1,'2','3.00','d'),(17,'a7c1e498f84f30bdfc95e13afe71345b',1,1,'2','3.00','a'),(18,'f97acdff33289d9464ad8efc9d005451',13,1,'1','0.45','d'),(19,'f97acdff33289d9464ad8efc9d005451',14,1,'1','0.45','d'),(20,'f97acdff33289d9464ad8efc9d005451',15,1,'1','0.45','d'),(21,'6c642b10744cc8f81aaff99287fb5cb6',1,1,'1','3.00','a'),(22,'6c642b10744cc8f81aaff99287fb5cb6',19,1,'2','0.40','a'),(23,'0800fda89f5a028f311003132f9bea39',19,1,'1','0.40','a'),(24,'c22185d7db018cadd16a6eb1bef0aa81',37,1,'1','45.00','a'),(25,'e7c0c36ccdec09594328e4a108524129',17,1,'6','0.45','a'),(26,'e7c0c36ccdec09594328e4a108524129',18,1,'4','0.45','a'),(27,'e7c0c36ccdec09594328e4a108524129',15,1,'6','0.45','a'),(28,'e7c0c36ccdec09594328e4a108524129',16,1,'6','0.45','a'),(29,'d054b1510ef052aa9d7b903cd2dcc70e',18,1,'30','0.45','a'),(30,'290558e8355be25edcab2c0ae0405321',15,1,'40','0.45','d'),(31,'290558e8355be25edcab2c0ae0405321',16,1,'5','0.45','d'),(32,'290558e8355be25edcab2c0ae0405321',17,1,'5','0.45','d'),(38,'8e196d7f76ceb7bd3b3537564947a8dd',13,1,'10','0.45','a'),(40,'78ae0768917db80bef61c8d3a69c529f',16,1,'4','0.45','a'),(41,'78ae0768917db80bef61c8d3a69c529f',15,1,'3','0.45','a'),(42,'78ae0768917db80bef61c8d3a69c529f',17,1,'3','0.45','a'),(43,'ec59250713d2515b1d8fb8a9b6758d14',17,1,'15','0.45','a'),(44,'ec59250713d2515b1d8fb8a9b6758d14',17,1,'10','0.45','a'),(45,'ec59250713d2515b1d8fb8a9b6758d14',15,1,'5','0.45','a'),(46,'ec59250713d2515b1d8fb8a9b6758d14',14,1,'5','0.45','a'),(47,'ec59250713d2515b1d8fb8a9b6758d14',13,1,'10','0.45','a'),(48,'ec59250713d2515b1d8fb8a9b6758d14',16,1,'15','0.45','a'),(49,'ec59250713d2515b1d8fb8a9b6758d14',18,1,'10','0.45','a'),(50,'c9d032c6f322074e8de516bd96454e85',13,1,'15','0.45','d'),(51,'c9d032c6f322074e8de516bd96454e85',14,1,'20','0.45','d'),(52,'c9d032c6f322074e8de516bd96454e85',15,1,'15','0.45','d'),(53,'c9d032c6f322074e8de516bd96454e85',18,1,'10','0.45','d'),(54,'c9d032c6f322074e8de516bd96454e85',17,1,'10','0.45','d'),(55,'162964263c419f5f5a22eb47f4a01c08',19,1,'10','0.40','d'),(56,'162964263c419f5f5a22eb47f4a01c08',20,1,'10','0.40','d'),(57,'162964263c419f5f5a22eb47f4a01c08',21,1,'10','0.40','d'),(58,'162964263c419f5f5a22eb47f4a01c08',22,1,'10','0.40','d'),(59,'162964263c419f5f5a22eb47f4a01c08',23,1,'10','0.40','d'),(60,'162964263c419f5f5a22eb47f4a01c08',24,1,'10','0.40','d'),(62,'345cbc0368ea0b2663fbb6633685d792',13,1,'1','0.45','d'),(65,'26836642e8926faa75c6746bf28f7961',13,1,'1','0.45','a'),(78,'4035ce78ec0aec37a0f2b9a644f9dc53',13,1,'1','0.45','d'),(79,'0171bb1c3535f006ec4458588db610a3',13,1,'1','0.45','d'),(80,'ab15bc775d3aba7a0d528388e679d480',13,1,'1','0.45','d'),(81,'51051a00bef8c8db4cdcdebd61b23859',13,1,'1','0.45','a'),(82,'ef557c6564ec07457b60802a0ed218ba',13,1,'1','0.45','d'),(83,'2c31b1d70db414f479909bf4a4443c0c',13,1,'1','0.45','a'),(84,'0546b0964941fc22f77d0d3718a03b6c',13,NULL,'3','0.45','d'),(85,'33e70b291d71f3f00edeb83cbf0a96a5',13,1,'2','0.45','d'),(105,'d95e2f8276b13968fd24077e21640946',22,NULL,'25','0.40','d'),(106,'d95e2f8276b13968fd24077e21640946',23,NULL,'25','0.40','d'),(107,'d95e2f8276b13968fd24077e21640946',21,NULL,'25','0.40','d'),(108,'d95e2f8276b13968fd24077e21640946',20,NULL,'25','0.40','d'),(109,'1fb0290b6b192da9dc8236fd3d985ca6',14,NULL,'25','0.45','d'),(110,'1fb0290b6b192da9dc8236fd3d985ca6',13,NULL,'25','0.45','d'),(111,'1fb0290b6b192da9dc8236fd3d985ca6',15,NULL,'25','0.45','d'),(112,'1fb0290b6b192da9dc8236fd3d985ca6',18,NULL,'25','0.45','d'),(118,'45a96bda37f155e908947985a247c25f',21,NULL,'20','0.40','a'),(119,'45a96bda37f155e908947985a247c25f',20,NULL,'20','0.40','a'),(120,'45a96bda37f155e908947985a247c25f',22,NULL,'20','0.40','a'),(121,'45a96bda37f155e908947985a247c25f',23,NULL,'20','0.40','a'),(122,'45a96bda37f155e908947985a247c25f',24,NULL,'20','0.40','a'),(123,'d19e3bb53037764ef5f68150a5da8f49',20,NULL,'15','0.40','a'),(124,'d19e3bb53037764ef5f68150a5da8f49',21,NULL,'15','0.40','a'),(125,'d19e3bb53037764ef5f68150a5da8f49',22,NULL,'15','0.40','a'),(126,'d19e3bb53037764ef5f68150a5da8f49',23,NULL,'15','0.40','a'),(128,'2df911bcc3766dadd1ba30f56c00c4af',13,NULL,'10','0.45','a'),(129,'2df911bcc3766dadd1ba30f56c00c4af',14,NULL,'10','0.45','a');

/*Table structure for table `tbl_categoria_produto` */

DROP TABLE IF EXISTS `tbl_categoria_produto`;

CREATE TABLE `tbl_categoria_produto` (
  `id_categoria_produto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'CategoriasProduto',
  `nome` varchar(250) NOT NULL,
  `situacao` char(1) NOT NULL COMMENT 'a - ativo / d - desativado',
  PRIMARY KEY (`id_categoria_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Cadastro de Categorias do Produto';

/*Data for the table `tbl_categoria_produto` */

insert  into `tbl_categoria_produto`(`id_categoria_produto`,`nome`,`situacao`) values (1,'Salgados Fritos','d'),(2,'Salgados sem Fritar','d'),(3,'Mini Salgados Fritos','a'),(4,'Mini Salgados Congelado','a'),(5,'Refrigerantes','d'),(6,'Sucos','d'),(7,'Doces','d'),(8,'Combo de Mini Salgado','d'),(9,'Mister Combo Festa','d');

/*Table structure for table `tbl_cidade` */

DROP TABLE IF EXISTS `tbl_cidade`;

CREATE TABLE `tbl_cidade` (
  `id_cidade` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Cidades',
  `nome` varchar(150) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Cadastro de Cidades';

/*Data for the table `tbl_cidade` */

insert  into `tbl_cidade`(`id_cidade`,`nome`,`uf`,`link`) values (1,'Ribeirão Preto','SP','ribeirao_preto'),(2,'Pontal','SP','pontal');

/*Table structure for table `tbl_cliente` */

DROP TABLE IF EXISTS `tbl_cliente`;

CREATE TABLE `tbl_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clientes',
  `nome` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `situacao` char(1) DEFAULT NULL COMMENT 'a - ativo / d - desativado',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='Cadastro de Cliente';

/*Data for the table `tbl_cliente` */

insert  into `tbl_cliente`(`id_cliente`,`nome`,`email`,`telefone`,`endereco`,`situacao`) values (1,'Matheus Mello','matheusnarciso@hotmail.com','016991838523','Av. Plinio de Castro Prado Nro 33','a'),(2,'rogerio machado','engrmachado@gmail.com','16 99159 4444','guilherme venturelli','a'),(3,'MATHEUS DE MELLO','matheus.gnu@gmail.com','16991838523','Av. Plínio Castro Prado 431, Apto 33','a'),(4,'Joaozinho','joao@zinho.com.br','000000000000','Av. Plínio Castro Prado 431, Apto 33','a'),(5,'markito','teste@tes.com','000000000','teste','a'),(6,'MATHEUS DE MELLO','matheusteste@gmail.com','16991838523','Av. Plínio Castro Prado 431, Apto 33','a'),(7,'MATHEUS DE MELLO','tese@gmail.com','16991838523','Av. Plínio Castro Prado 431, Apto 33','a'),(8,'teste','girls@gmail.com','111111111111','Av. Plínio Castro Prado 431','a'),(9,'joaquim teste','matheus.mello@painelfiscal.com.br','00000000','teste','a'),(10,'Fernanda Lujan Torolio gonzalez','ferlujangom@hotmail.com','11988775176','Av do café 1149 bl B ap 103','a'),(11,'Juliana Roberta Verissimo','julianarverissimo@gmail.com','16992155377','Rua Monte Santo, 324','a'),(12,'ANA CAROLINA TASCHETI','taschetty@hotmail.com','16 99247-4154','macario da silva ribeiro 99','a'),(13,'Carol','carolynebrito3@gmail.com','16 99161-2326','Rua Paraguaçu Paulista 137','a');

/*Table structure for table `tbl_error_log_db` */

DROP TABLE IF EXISTS `tbl_error_log_db`;

CREATE TABLE `tbl_error_log_db` (
  `id_error_log_db` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Error_logs_db',
  `error` varchar(2000) NOT NULL,
  `QUERY` varchar(500) NOT NULL,
  `class` varchar(150) NOT NULL,
  `dt_erro` datetime NOT NULL,
  PRIMARY KEY (`id_error_log_db`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de log para erros na consulta da database';

/*Data for the table `tbl_error_log_db` */

/*Table structure for table `tbl_estoque` */

DROP TABLE IF EXISTS `tbl_estoque`;

CREATE TABLE `tbl_estoque` (
  `id_estoque` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Estoques',
  `id_loja` int(11) NOT NULL COMMENT 'Lojas',
  `id_produto` int(11) NOT NULL COMMENT 'Produtos',
  `qtde_total` decimal(6,0) NOT NULL,
  PRIMARY KEY (`id_estoque`),
  KEY `id_loja` (`id_loja`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `tbl_estoque_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `tbl_loja` (`id_loja`),
  CONSTRAINT `tbl_estoque_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de movimentação de produto';

/*Data for the table `tbl_estoque` */

/*Table structure for table `tbl_evento` */

DROP TABLE IF EXISTS `tbl_evento`;

CREATE TABLE `tbl_evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Eventos',
  `id_cliente` int(11) NOT NULL COMMENT 'Clientes',
  `id_pedido` int(11) NOT NULL COMMENT 'Pedidos',
  `data_evento` date NOT NULL,
  `end_evento` varchar(250) NOT NULL,
  `hora_evento` varchar(15) NOT NULL,
  `cel_evento` varchar(30) NOT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_pedido` (`id_pedido`),
  CONSTRAINT `tbl_evento_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`),
  CONSTRAINT `tbl_evento_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Evento';

/*Data for the table `tbl_evento` */

/*Table structure for table `tbl_ficha_kerdex` */

DROP TABLE IF EXISTS `tbl_ficha_kerdex`;

CREATE TABLE `tbl_ficha_kerdex` (
  `id_ficha_kerdex` int(11) NOT NULL AUTO_INCREMENT COMMENT 'FichaKerdexs',
  `id_loja` int(11) NOT NULL COMMENT 'Lojas',
  `id_produto` int(11) NOT NULL COMMENT 'Produtos',
  `movimento` char(2) NOT NULL COMMENT 'e-entrada / s-saida',
  `qtde` decimal(6,0) NOT NULL,
  `data_movimento` date NOT NULL,
  PRIMARY KEY (`id_ficha_kerdex`),
  KEY `id_loja` (`id_loja`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `tbl_ficha_kerdex_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `tbl_loja` (`id_loja`),
  CONSTRAINT `tbl_ficha_kerdex_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de movimentação de produto';

/*Data for the table `tbl_ficha_kerdex` */

/*Table structure for table `tbl_item_pedido` */

DROP TABLE IF EXISTS `tbl_item_pedido`;

CREATE TABLE `tbl_item_pedido` (
  `id_item_pedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ItensPedido',
  `id_pedido` int(11) NOT NULL COMMENT 'Pedidos',
  `id_produto` int(11) NOT NULL COMMENT 'Produtos',
  `qtde` decimal(6,0) NOT NULL,
  `valor_unitario` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id_item_pedido`),
  KEY `id_pedido` (`id_pedido`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `tbl_item_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedido` (`id_pedido`),
  CONSTRAINT `tbl_item_pedido_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='Cadastro dos itens do pedido para salgado';

/*Data for the table `tbl_item_pedido` */

insert  into `tbl_item_pedido`(`id_item_pedido`,`id_pedido`,`id_produto`,`qtde`,`valor_unitario`) values (21,15,15,'40','0.45'),(22,15,16,'5','0.45'),(23,15,17,'5','0.45'),(24,16,13,'15','0.45'),(25,16,14,'20','0.45'),(26,16,15,'15','0.45'),(27,16,17,'10','0.45'),(28,16,18,'10','0.45'),(31,17,19,'10','0.40'),(32,17,20,'10','0.40'),(33,17,21,'10','0.40'),(34,17,22,'10','0.40'),(35,17,23,'10','0.40'),(36,17,24,'10','0.40'),(45,25,20,'25','0.40'),(46,25,21,'25','0.40'),(47,25,22,'25','0.40'),(48,25,23,'25','0.40'),(52,26,13,'25','0.45'),(53,26,14,'25','0.45'),(54,26,15,'25','0.45'),(55,26,18,'25','0.45');

/*Table structure for table `tbl_loja` */

DROP TABLE IF EXISTS `tbl_loja`;

CREATE TABLE `tbl_loja` (
  `id_loja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Lojas',
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id_loja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de cadastro das lojas filiais';

/*Data for the table `tbl_loja` */

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Menus',
  `nome` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `situacao` char(1) NOT NULL COMMENT 'a - ativo / d - desativado',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cadastro da Barra de Menu';

/*Data for the table `tbl_menu` */

/*Table structure for table `tbl_newsletter` */

DROP TABLE IF EXISTS `tbl_newsletter`;

CREATE TABLE `tbl_newsletter` (
  `id_newsletter` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Newsletters',
  `email` varchar(255) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `data_criacao` date NOT NULL,
  `data_atualizacao` date NOT NULL,
  PRIMARY KEY (`id_newsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Newslatter';

/*Data for the table `tbl_newsletter` */

/*Table structure for table `tbl_pagina_principal` */

DROP TABLE IF EXISTS `tbl_pagina_principal`;

CREATE TABLE `tbl_pagina_principal` (
  `id_pagina_principal` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Pagina_principals',
  `titulo` varchar(250) NOT NULL,
  `sub_titulo` varchar(250) NOT NULL,
  `capa_principal` varchar(150) NOT NULL,
  `capa1` varchar(150) DEFAULT NULL,
  `capa2` varchar(150) DEFAULT NULL,
  `capa3` varchar(150) DEFAULT NULL,
  `capa4` varchar(150) DEFAULT NULL,
  `situacao` char(1) NOT NULL COMMENT 'a - ativo / d - desativado',
  PRIMARY KEY (`id_pagina_principal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cadastro da Pagina Principal';

/*Data for the table `tbl_pagina_principal` */

/*Table structure for table `tbl_pedido` */

DROP TABLE IF EXISTS `tbl_pedido`;

CREATE TABLE `tbl_pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Pedidos',
  `id_cliente` int(11) NOT NULL COMMENT 'Clientes',
  `id_cidade` int(11) NOT NULL COMMENT 'Cidades',
  `data_pedido` datetime NOT NULL,
  `hora_pedido` time DEFAULT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `taxa_entrega` decimal(6,2) DEFAULT NULL,
  `hora_entrega` varchar(10) DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `valor_total` decimal(6,2) DEFAULT NULL,
  `situacao` char(1) NOT NULL COMMENT 's - solicitado / v - visualizado / p - produzindo / t - saiu entrega / e - entregue',
  `festa` char(1) NOT NULL COMMENT 's - sim / n - não',
  `forma_pgto` char(2) DEFAULT NULL COMMENT 'd - dinheiro / cd - cartao debito / cc - cartao crédito',
  PRIMARY KEY (`id_pedido`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_cidade` (`id_cidade`),
  CONSTRAINT `tbl_pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`),
  CONSTRAINT `tbl_pedido_ibfk_2` FOREIGN KEY (`id_cidade`) REFERENCES `tbl_cidade` (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='Cadastro de Pedido do Salgado';

/*Data for the table `tbl_pedido` */

insert  into `tbl_pedido`(`id_pedido`,`id_cliente`,`id_cidade`,`data_pedido`,`hora_pedido`,`valor`,`taxa_entrega`,`hora_entrega`,`data_entrega`,`valor_total`,`situacao`,`festa`,`forma_pgto`) values (15,10,1,'2017-11-04 00:00:00','00:00:00','22.50','5.00',NULL,NULL,'25.50','e','n',NULL),(16,11,1,'2017-11-09 00:00:00',NULL,'31.50','5.00',NULL,NULL,'34.50','e','n',NULL),(17,12,1,'2017-11-09 00:00:00',NULL,'24.00','5.00',NULL,NULL,'27.00','e','n',NULL),(25,13,1,'2017-11-29 15:57:57',NULL,'40.00','3.00','13:30h','2017-12-01','43.00','s','n','d'),(26,11,1,'2018-01-11 08:28:24',NULL,'45.00','3.00','19:30h','2018-01-13','48.00','s','n','d');

/*Table structure for table `tbl_produto` */

DROP TABLE IF EXISTS `tbl_produto`;

CREATE TABLE `tbl_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Produtos',
  `nome` varchar(255) NOT NULL,
  `id_categoria_produto` int(11) NOT NULL COMMENT 'CategoriasProduto',
  `situacao` char(1) NOT NULL COMMENT 'a - ativo / d - desativado',
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_categoria_produto` (`id_categoria_produto`),
  CONSTRAINT `tbl_produto_ibfk_1` FOREIGN KEY (`id_categoria_produto`) REFERENCES `tbl_categoria_produto` (`id_categoria_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='Cadastro de Produto';

/*Data for the table `tbl_produto` */

insert  into `tbl_produto`(`id_produto`,`nome`,`id_categoria_produto`,`situacao`,`imagem`) values (1,'Croquete Frito',1,'a','1.png'),(2,'Bolinho de Carne Frito',1,'a','2.png'),(3,'Coxinha Frito',1,'a','3.png'),(4,'Enroladinho Frito',1,'a','4.png'),(5,'Salsicha Frito',1,'a','5.png'),(6,'Kibe Frito',1,'a','6.png'),(7,'Croquete sem Fritar',2,'a','7.png'),(8,'Bolinho de Carne sem Fritar',2,'a','8.png'),(9,'Coxinha sem Fritar',2,'a','9.png'),(10,'Enroladinho sem Fritar',2,'a','10.png'),(11,'Salsicha sem Fritar',2,'a','11.png'),(12,'Kibe sem Fritar',2,'a','12.png'),(13,'Mini Croquete Frito',3,'a','mini_cro.png'),(14,'Mini Bolinho de Carne Frito',3,'a','mini_bol.png'),(15,'Mini Coxinha Frito',3,'a','mini_cox.png'),(16,'Mini Enroladinho Frito',3,'a','mini_enr.png'),(17,'Mini Salsicha Frito',3,'a','mini_sal.png'),(18,'Mini Kibe Frito',3,'a','mini_kib.png'),(19,'Mini Croquete sem Fritar',4,'a','mini_cro_sem.png'),(20,'Mini Bolinho de Carne sem Fritar',4,'a','mini_bol_sem.png'),(21,'Coxinha sem Fritar',4,'a','mini_cox_sem.png'),(22,'Mini Enroladinho sem Fritar',4,'a','mini_enr_sem.png'),(23,'Mini Salsicha sem Fritar',4,'a','mini_sal_sem.png'),(24,'Mini Kibe sem Fritar',4,'a','mini_kib_sem.png'),(25,'Coca Cola Lata',5,'a','25.png'),(26,'Coca Cola 600ML',5,'a','26.png'),(27,'Coca Cola 2L',5,'a','27.png'),(28,'Fanta Lata',5,'a','28.png'),(29,'Fanta 600ML',5,'a','29.png'),(30,'Fanta 2L',5,'a','30.png'),(31,'Guaraná Antartica Lata',5,'a','31.png'),(32,'Guaraná Antartica 600ML',5,'a','32.png'),(33,'Guaraná Antartica 2L',5,'a','33.png'),(34,'Suco Laranja 300ML',6,'a','34.png'),(35,'Suco Laranja 500ML',6,'a','35.png'),(36,'Suco Laranja 1L',6,'a','36.png'),(37,'10 Croquete <br>10 Enroladinho <br>10 Salsocha <br>10 Bolinho <br>10 Coxinha',8,'a','caixa.png'),(38,'Mini Salgados <br>20 Coxinha <br> 20 Enroladinho <br> 20 Bolinho de carne <br>20 Croquete <br> 20 Kibe<br> 2 Coca Cola 2Lts',9,'a','caixa.png');

/*Table structure for table `tbl_submenu` */

DROP TABLE IF EXISTS `tbl_submenu`;

CREATE TABLE `tbl_submenu` (
  `id_submenu` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Submenus',
  `id_menu` int(11) NOT NULL COMMENT 'Menus',
  `nome` varchar(250) NOT NULL,
  `link` varchar(100) NOT NULL,
  `situacao` char(1) NOT NULL COMMENT 'a - ativo / d - desativado',
  PRIMARY KEY (`id_submenu`),
  KEY `id_menu` (`id_menu`),
  CONSTRAINT `tbl_submenu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cadastro do Submenu';

/*Data for the table `tbl_submenu` */

/*Table structure for table `tbl_submenu_foto` */

DROP TABLE IF EXISTS `tbl_submenu_foto`;

CREATE TABLE `tbl_submenu_foto` (
  `id_submenu_foto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Submenu_fotos',
  `id_submenu` int(11) DEFAULT NULL COMMENT 'Submenus',
  `id_menu` int(11) DEFAULT NULL COMMENT 'menus',
  `titulo` varchar(250) NOT NULL,
  `sub_titulo` varchar(250) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `situacao` char(1) NOT NULL COMMENT 'a - ativo / d - desativado',
  PRIMARY KEY (`id_submenu_foto`),
  KEY `id_menu` (`id_menu`),
  KEY `id_submenu` (`id_submenu`),
  CONSTRAINT `tbl_submenu_foto_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id_menu`),
  CONSTRAINT `tbl_submenu_foto_ibfk_2` FOREIGN KEY (`id_submenu`) REFERENCES `tbl_submenu` (`id_submenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cadastro de fotos';

/*Data for the table `tbl_submenu_foto` */

/*Table structure for table `tbl_tipo` */

DROP TABLE IF EXISTS `tbl_tipo`;

CREATE TABLE `tbl_tipo` (
  `campo` varchar(50) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabelas de Tipo';

/*Data for the table `tbl_tipo` */

insert  into `tbl_tipo`(`campo`,`tipo`,`descricao`) values ('forma_pgto','d','Dinheiro'),('forma_pgto','cd','Cartão de Débito'),('forma_pgto','cc','Cartão de Crédito'),('hora_entrega','13:30h','13:30h'),('hora_entrega','19:30h','19:30h');

/*Table structure for table `tbl_valor_produto` */

DROP TABLE IF EXISTS `tbl_valor_produto`;

CREATE TABLE `tbl_valor_produto` (
  `id_valor_produto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ValoresProduto',
  `id_produto` int(11) NOT NULL COMMENT 'Produtos',
  `data_atualizacao` date NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id_valor_produto`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `tbl_valor_produto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='Cadastro de Valores do Produto';

/*Data for the table `tbl_valor_produto` */

insert  into `tbl_valor_produto`(`id_valor_produto`,`id_produto`,`data_atualizacao`,`preco`) values (1,1,'2017-09-01','3.00'),(2,2,'2017-09-01','3.00'),(3,3,'2017-09-01','3.00'),(4,4,'2017-09-01','3.00'),(5,5,'2017-09-01','3.00'),(6,6,'2017-09-01','3.00'),(7,7,'2017-09-01','2.25'),(8,8,'2017-09-01','2.25'),(9,9,'2017-09-01','2.25'),(10,10,'2017-09-01','2.25'),(11,11,'2017-09-01','2.25'),(12,12,'2017-09-01','2.25'),(13,13,'2017-09-01','0.45'),(14,14,'2017-09-01','0.45'),(15,15,'2017-09-01','0.45'),(16,16,'2017-09-01','0.45'),(17,17,'2017-09-01','0.45'),(18,18,'2017-09-01','0.45'),(19,19,'2017-09-01','0.40'),(20,20,'2017-09-01','0.40'),(21,21,'2017-09-01','0.40'),(22,22,'2017-09-01','0.40'),(23,23,'2017-09-01','0.40'),(24,24,'2017-09-01','0.40'),(25,25,'2017-09-01','0.00'),(26,26,'2017-09-01','0.00'),(27,27,'2017-09-01','0.00'),(28,28,'2017-09-01','0.00'),(29,29,'2017-09-01','0.00'),(30,30,'2017-09-01','0.00'),(31,31,'2017-09-01','0.00'),(32,32,'2017-09-01','0.00'),(33,33,'2017-09-01','0.00'),(34,34,'2017-09-01','3.00'),(35,35,'2017-09-01','5.00'),(36,36,'2017-09-01','10.00'),(37,37,'2017-09-01','45.00'),(38,38,'2017-08-09','90.00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
