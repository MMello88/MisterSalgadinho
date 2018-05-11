ALTER TABLE `miste872_prod`.`tbl_categoria_produto`   
  ADD COLUMN `cssClass` VARCHAR(150) NOT NULL AFTER `situacao`;

UPDATE tbl_cidade SET link = 'ribeirao-preto' WHERE id_cidade = 1