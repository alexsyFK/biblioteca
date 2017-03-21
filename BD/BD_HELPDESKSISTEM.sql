
-- -----------------------------------------------------
-- Schema helpdesksistemdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `helpdesksistemdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `helpdesksistemdb` ;

-- -----------------------------------------------------
-- Table `helpdesksistemdb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesksistemdb`.`usuarios` (
  `matricula` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(100) NOT NULL COMMENT '',
  `email` VARCHAR(100) NOT NULL COMMENT '',
  `cargo` VARCHAR(50) NOT NULL COMMENT '',
  `senha` VARCHAR(255) NOT NULL COMMENT '',
  `sexo` VARCHAR(45) NOT NULL COMMENT '',
  `ativo` INT(1) NULL DEFAULT 1 COMMENT '',
  PRIMARY KEY (`matricula`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `helpdesksistemdb`.`chamados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `helpdesksistemdb`.`chamados` (
  `protocolo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome_equipamento` VARCHAR(100) NOT NULL COMMENT '',
  `codigo_equipamento` VARCHAR(45) NOT NULL COMMENT '',
  `setor` VARCHAR(100) NOT NULL COMMENT '',
  `status_chamado` VARCHAR(50) NOT NULL COMMENT '',
  `mat_solicitante` INT NOT NULL COMMENT '',
  `mat_atendente` INT NULL COMMENT '',
  `descricao` VARCHAR(255) NULL COMMENT '',
  `solucao_problema` VARCHAR(255) NULL COMMENT '',
  PRIMARY KEY (`protocolo`)  COMMENT '',
  INDEX `fk_chamados_usuarios_idx` (`mat_solicitante` ASC)  COMMENT '',
  CONSTRAINT `fk_chamados_usuarios`
    FOREIGN KEY (`mat_solicitante`)
    REFERENCES `helpdesksistemdb`.`usuarios` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = big5;


INSERT INTO usuarios(nome, email, cargo, senha, sexo) VALUES('admin', 'admin@admin', 'Supervisor', sha1('admin') , 'Masculino');


