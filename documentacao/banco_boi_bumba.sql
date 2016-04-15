SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `event_cow`.`tipo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `event_cow`.`tipo` (
  `idtipo` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`idtipo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event_cow`.`elemento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `event_cow`.`elemento` (
  `idelemento` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `tempo` INT NULL ,
  `descricao` TEXT NULL ,
  `tipo_idtipo` INT NOT NULL ,
  PRIMARY KEY (`idelemento`) ,
  INDEX `fk_elemento_tipo_idx` (`tipo_idtipo` ASC) ,
  CONSTRAINT `fk_elemento_tipo`
    FOREIGN KEY (`tipo_idtipo` )
    REFERENCES `event_cow`.`tipo` (`idtipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event_cow`.`parte`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `event_cow`.`parte` (
  `idparte` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`idparte`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event_cow`.`parte_contem_elemento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `event_cow`.`parte_contem_elemento` (
  `elemento_idelemento` INT NOT NULL ,
  `parte_idparte` INT NOT NULL ,
  `ocorreu` BINARY NULL ,
  PRIMARY KEY (`elemento_idelemento`, `parte_idparte`) ,
  INDEX `fk_elemento_has_parte_parte1_idx` (`parte_idparte` ASC) ,
  INDEX `fk_elemento_has_parte_elemento1_idx` (`elemento_idelemento` ASC) ,
  CONSTRAINT `fk_elemento_has_parte_elemento1`
    FOREIGN KEY (`elemento_idelemento` )
    REFERENCES `event_cow`.`elemento` (`idelemento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_elemento_has_parte_parte1`
    FOREIGN KEY (`parte_idparte` )
    REFERENCES `event_cow`.`parte` (`idparte` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event_cow`.`apresentacao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `event_cow`.`apresentacao` (
  `idapresentacao` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `data_hora_inicio` DATETIME NULL ,
  `data_hora_fim` DATETIME NULL ,
  PRIMARY KEY (`idapresentacao`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event_cow`.`roteiro`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `event_cow`.`roteiro` (
  `idroteiro` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `apresentacao_idapresentacao` INT NOT NULL ,
  PRIMARY KEY (`idroteiro`) ,
  INDEX `fk_roteiro_apresentacao1_idx` (`apresentacao_idapresentacao` ASC) ,
  CONSTRAINT `fk_roteiro_apresentacao1`
    FOREIGN KEY (`apresentacao_idapresentacao` )
    REFERENCES `event_cow`.`apresentacao` (`idapresentacao` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event_cow`.`parte_compoem_roteiro`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `event_cow`.`parte_compoem_roteiro` (
  `parte_idparte` INT NOT NULL ,
  `roteiro_idroteiro` INT NOT NULL ,
  PRIMARY KEY (`parte_idparte`, `roteiro_idroteiro`) ,
  INDEX `fk_parte_has_roteiro_roteiro1_idx` (`roteiro_idroteiro` ASC) ,
  INDEX `fk_parte_has_roteiro_parte1_idx` (`parte_idparte` ASC) ,
  CONSTRAINT `fk_parte_has_roteiro_parte1`
    FOREIGN KEY (`parte_idparte` )
    REFERENCES `event_cow`.`parte` (`idparte` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_parte_has_roteiro_roteiro1`
    FOREIGN KEY (`roteiro_idroteiro` )
    REFERENCES `event_cow`.`roteiro` (`idroteiro` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
