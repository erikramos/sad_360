SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Table `cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cargo` (
  `ca_id` INT NOT NULL AUTO_INCREMENT,
  `ca_descricao` VARCHAR(100) NULL,
  `ca_atribuicoes` TEXT NULL,
  PRIMARY KEY (`ca_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `departamento` (
  `de_id` INT NOT NULL AUTO_INCREMENT,
  `de_nome` VARCHAR(100) NULL,
  PRIMARY KEY (`de_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `perfil` (
  `pe_id` INT NOT NULL AUTO_INCREMENT,
  `pe_descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`pe_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `us_id` INT NOT NULL AUTO_INCREMENT,
  `us_nome` VARCHAR(200) NULL,
  `us_login` VARCHAR(20) NULL,
  `us_senha` VARCHAR(32) NULL,
  `us_cargo` VARCHAR(200) NULL,
  `us_perfil` VARCHAR(50) NULL,
  `us_data_cadastro` DATETIME NULL,
  `ca_id` INT NOT NULL,
  `de_id` INT NOT NULL,
  `pe_id` INT NOT NULL,
  PRIMARY KEY (`us_id`, `ca_id`, `de_id`, `pe_id`),
  INDEX `fk_usuario_cargo1_idx` (`ca_id` ASC),
  INDEX `fk_usuario_departamento1_idx` (`de_id` ASC),
  INDEX `fk_usuario_perfil1_idx` (`pe_id` ASC),
  CONSTRAINT `fk_usuario_cargo1`
    FOREIGN KEY (`ca_id`)
    REFERENCES `cargo` (`ca_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_departamento1`
    FOREIGN KEY (`de_id`)
    REFERENCES `departamento` (`de_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_perfil1`
    FOREIGN KEY (`pe_id`)
    REFERENCES `perfil` (`pe_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `av_id` INT NOT NULL AUTO_INCREMENT,
  `av_titulo` VARCHAR(100) NULL,
  `av_descricao` TEXT NULL,
  `av_data_cadastro` DATETIME NULL,
  `us_id` INT NOT NULL,
  PRIMARY KEY (`av_id`, `us_id`),
  INDEX `fk_avaliacao_usuario_idx` (`us_id` ASC),
  CONSTRAINT `fk_avaliacao_usuario`
    FOREIGN KEY (`us_id`)
    REFERENCES `usuario` (`us_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `avaliacao_questao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `avaliacao_questao` (
  `aq_id` INT NOT NULL AUTO_INCREMENT,
  `aq_questao` TEXT NULL,
  `aq_data_cadastro` DATETIME NULL,
  `av_id` INT NOT NULL,
  PRIMARY KEY (`aq_id`, `av_id`),
  INDEX `fk_avaliacao_questao_avaliacao1_idx` (`av_id` ASC),
  CONSTRAINT `fk_avaliacao_questao_avaliacao1`
    FOREIGN KEY (`av_id`)
    REFERENCES `avaliacao` (`av_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `avaliacao_questao_resposta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `avaliacao_questao_resposta` (
  `aqr_id` INT NOT NULL AUTO_INCREMENT,
  `aqr_data_cadastro` DATETIME NULL,
  `aqr_resposta` TEXT NULL,
  `aq_id` INT NOT NULL,
  PRIMARY KEY (`aqr_id`, `aq_id`),
  INDEX `fk_avaliacao_questao_resposta_avaliacao_questao1_idx` (`aq_id` ASC),
  CONSTRAINT `fk_avaliacao_questao_resposta_avaliacao_questao1`
    FOREIGN KEY (`aq_id`)
    REFERENCES `avaliacao_questao` (`aq_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `avaliacao_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `avaliacao_usuario` (
  `avu_id` INT NOT NULL,
  `us_id` INT NOT NULL,
  `av_id` INT NOT NULL,
  PRIMARY KEY (`avu_id`, `us_id`, `av_id`),
  INDEX `fk_avaliacao_usuario_usuario1_idx` (`us_id` ASC),
  INDEX `fk_avaliacao_usuario_avaliacao1_idx` (`av_id` ASC),
  CONSTRAINT `fk_avaliacao_usuario_usuario1`
    FOREIGN KEY (`us_id`)
    REFERENCES `usuario` (`us_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_usuario_avaliacao1`
    FOREIGN KEY (`av_id`)
    REFERENCES `avaliacao` (`av_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `avaliacao_resposta_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `avaliacao_resposta_usuario` (
  `aru_id` INT NOT NULL AUTO_INCREMENT,
  `us_id` INT NOT NULL,
  `av_id` INT NOT NULL,
  `aq_id` INT NOT NULL,
  `aqr_id` INT NOT NULL,
  `aru_observacao` TEXT NULL,
  PRIMARY KEY (`aru_id`, `us_id`, `av_id`, `aq_id`, `aqr_id`),
  INDEX `fk_avaliacao_resposta_usuario_usuario1_idx` (`us_id` ASC),
  INDEX `fk_avaliacao_resposta_usuario_avaliacao1_idx` (`av_id` ASC),
  INDEX `fk_avaliacao_resposta_usuario_avaliacao_questao1_idx` (`aq_id` ASC),
  INDEX `fk_avaliacao_resposta_usuario_avaliacao_questao_resposta1_idx` (`aqr_id` ASC),
  CONSTRAINT `fk_avaliacao_resposta_usuario_usuario1`
    FOREIGN KEY (`us_id`)
    REFERENCES `usuario` (`us_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_resposta_usuario_avaliacao1`
    FOREIGN KEY (`av_id`)
    REFERENCES `avaliacao` (`av_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_resposta_usuario_avaliacao_questao1`
    FOREIGN KEY (`aq_id`)
    REFERENCES `avaliacao_questao` (`aq_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_resposta_usuario_avaliacao_questao_resposta1`
    FOREIGN KEY (`aqr_id`)
    REFERENCES `avaliacao_questao_resposta` (`aqr_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
