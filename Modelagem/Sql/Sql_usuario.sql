-- MySQL Workbench Synchronization
-- Generated: 2015-11-17 10:38
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Marcelo

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `sch` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `sch`.`Usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(100) NOT NULL COMMENT '',
  `senha` VARCHAR(255) NOT NULL COMMENT '',
  `salt` VARCHAR(255) NOT NULL COMMENT '',
  `email` VARCHAR(100) NOT NULL COMMENT '',
  `dtaInc` TIMESTAMP NOT NULL COMMENT '',
  `dtaValSenha` DATE NOT NULL COMMENT '',
  `status` INT(1) NOT NULL COMMENT '1 - Ativo ;\n2- Inativo ;',
  PRIMARY KEY (`idUsuario`)  COMMENT '',
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC)  COMMENT '',
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;