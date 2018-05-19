ALTER TABLE `miste872_prod`.`tbl_categoria_produto`   
  ADD COLUMN `cssClass` VARCHAR(150) NOT NULL AFTER `situacao`;

UPDATE tbl_cidade SET link = 'ribeirao-preto' WHERE id_cidade = 1


ALTER TABLE `miste872_prod`.`tbl_cliente`   
  ADD COLUMN `senha` VARCHAR(64) NOT NULL AFTER `email`;

ALTER TABLE `miste872_prod`.`tbl_pedido`   
  ADD COLUMN `forma_entrega` CHAR(1) NOT NULL  COMMENT 'r - retirar / e - entregar' AFTER `valor`;

ALTER TABLE `miste872_prod`.`tbl_pedido`   
  DROP COLUMN `hora_pedido`;