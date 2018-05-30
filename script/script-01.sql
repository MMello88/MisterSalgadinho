ALTER TABLE `miste872_prod`.`tbl_categoria_produto`   
  ADD COLUMN `cssClass` VARCHAR(150) NOT NULL AFTER `situacao`;

UPDATE tbl_cidade SET link = 'ribeirao-preto' WHERE id_cidade = 1


ALTER TABLE `miste872_prod`.`tbl_cliente`   
  ADD COLUMN `senha` VARCHAR(64) NOT NULL AFTER `email`;

ALTER TABLE `miste872_prod`.`tbl_pedido`   
  ADD COLUMN `forma_entrega` CHAR(1) NOT NULL  COMMENT 'r - retirar / e - entregar' AFTER `valor`;

ALTER TABLE `miste872_prod`.`tbl_pedido`   
  DROP COLUMN `hora_pedido`;

ALTER TABLE `miste872_prod`.`tbl_pedido`   
  DROP COLUMN `festa`;

ALTER TABLE `miste872_prod`.`tbl_pedido`   
  ADD COLUMN `end_entrega` VARCHAR(50) NULL  COMMENT 'Usar este endereço quando informado, senão usar a do cadastro.' AFTER `forma_pgto`;

ALTER TABLE `miste872_prod`.`tbl_cliente`   
  ADD COLUMN `numero` VARCHAR(10) NOT NULL AFTER `endereco`,
  ADD COLUMN `bairro` VARCHAR(150) NOT NULL AFTER `numero`,
  ADD COLUMN `complemento` VARCHAR(100) NULL AFTER `bairro`;

ALTER TABLE `miste872_prod`.`tbl_pedido`   
  CHANGE `situacao` `situacao` CHAR(1) CHARSET utf8 COLLATE utf8_general_ci NOT NULL  COMMENT 's - solicitado / v - visualizado / p - produzindo / t - saiu entrega / e - entregue'  AFTER `id_cidade`,
  CHANGE `data_pedido` `data_pedido` DATETIME NOT NULL  AFTER `situacao`,
  CHANGE `valor_total` `valor_total` DECIMAL(6,2) NULL  AFTER `valor`,
  CHANGE `forma_pgto` `forma_pgto` CHAR(2) CHARSET utf8 COLLATE utf8_general_ci NULL  COMMENT 'd - dinheiro / cd - cartao debito / cc - cartao crédito'  AFTER `valor_total`,
  CHANGE `forma_entrega` `forma_entrega` CHAR(1) CHARSET utf8 COLLATE utf8_general_ci NOT NULL  COMMENT 'r - retirar / e - entregar'  AFTER `forma_pgto`,
  CHANGE `data_entrega` `data_entrega` DATE NULL  AFTER `taxa_entrega`,
  CHANGE `hora_entrega` `hora_entrega` VARCHAR(10) CHARSET utf8 COLLATE utf8_general_ci NULL  AFTER `data_entrega`,
  CHANGE `end_entrega` `end_entrega` VARCHAR(250) CHARSET utf8 COLLATE utf8_general_ci NULL  COMMENT 'Usar este endereço quando informado, senão usar a do cadastro.'  AFTER `hora_entrega`,
  ADD COLUMN `num_entrega` VARCHAR(10) NULL AFTER `end_entrega`,
  ADD COLUMN `bairro_entrega` VARCHAR(150) NULL AFTER `num_entrega`,
  ADD COLUMN `comp_entrega` VARCHAR(100) NULL AFTER `bairro_entrega`;

ALTER TABLE `miste872_prod`.`tbl_cliente`   
  ADD COLUMN `tipo` CHAR(1) NULL  COMMENT 'c - cliente / r - revendedor / p - representante' AFTER `situacao`;

ALTER TABLE `miste872_prod`.`tbl_cliente`   
  ADD COLUMN `ganho_unitario` DECIMAL(2,2) NULL  COMMENT 'Somente revendedor e representando vai ter este campo habilitado' AFTER `tipo`;

ALTER TABLE `miste872_prod`.`tbl_cart`   
  ADD COLUMN `desconto` CHAR(1) DEFAULT '0'   NULL  COMMENT 'marca q ganhou desconto' AFTER `situacao`;

ALTER TABLE `miste872_prod`.`tbl_cart`   
  CHANGE `desconto` `cod_promo` CHAR(1) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '0'   NULL  COMMENT 'usou cod promo 1 - true / 0 - false';

CREATE TABLE `miste872_prod`.`tbl_representante_cliente`(  
  `id_representante_cliente` INT NOT NULL,
  `id_cliente_represent` INT NOT NULL,
  `id_cliente_cliente` INT NOT NULL,
  PRIMARY KEY (`id_representante_cliente`),
  UNIQUE INDEX `UK_CLIENTE` (`id_cliente_cliente`),
  CONSTRAINT `fk_cliente_representante` FOREIGN KEY (`id_cliente_represent`) REFERENCES `miste872_prod`.`tbl_cliente`(`id_cliente`),
  CONSTRAINT `fk_cliente_cliente` FOREIGN KEY (`id_cliente_cliente`) REFERENCES `miste872_prod`.`tbl_cliente`(`id_cliente`)
) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `miste872_prod`.`tbl_cliente`   
  ADD COLUMN `cpf_cnpj` VARCHAR(14) NULL  COMMENT 'cpf ou cnpj' AFTER `ganho_unitario`;

ALTER TABLE `miste872_prod`.`tbl_cliente`   
  ADD COLUMN `hash` VARCHAR(255) NULL  COMMENT 'id criptografado' AFTER `cpf_cnpj`,
  ADD COLUMN `ativo` CHAR(1) DEFAULT '0'   NULL  COMMENT '1 - true / 0 false' AFTER `hash`;

ALTER TABLE `miste872_prod`.`tbl_cliente`   
  CHANGE `tipo` `tipo` CHAR(1) CHARSET utf8 COLLATE utf8_general_ci NULL  COMMENT 'c - cliente / r - revendedor / s - representante / p - parceiro';

ALTER TABLE `miste872_prod`.`tbl_representante_cliente`   
  CHANGE `id_representante_cliente` `id_representante_cliente` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `miste872_prod`.`tbl_pedido`   
  ADD COLUMN `data_pagamento` DATE NULL  COMMENT 'data do dia do pagamento' AFTER `comp_entrega`;

CREATE TABLE `miste872_prod`.`tbl_representante_recebimento`(  
  `id_representante_recebimento` INT NOT NULL AUTO_INCREMENT,
  `id_cliente_represent` INT NOT NULL,
  `id_pedido` INT NOT NULL,
  `data_pgto_pedido` DATE NOT NULL,
  `valor_receber` DECIMAL(7,2) NOT NULL,
  `recebido` CHAR(1) NOT NULL COMMENT 's - sim / n - não - s/n foi recebido pelo cliente',
  `situacao_pedido` CHAR(1) NOT NULL COMMENT 'a - aberto / f - finalizado',
  PRIMARY KEY (`id_representante_recebimento`)
) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `miste872_prod`.`tbl_representante_recebimento`   
  CHANGE `valor_receber` `valor_receber` DECIMAL(7,4) NOT NULL;