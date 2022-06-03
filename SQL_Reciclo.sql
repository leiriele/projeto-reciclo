CREATE SCHEMA IF NOT EXISTS `banco_coleta` DEFAULT CHARACTER SET utf8 ;
USE `banco_coleta` ;

-- -----------------------------------------------------
-- Table `banco_coleta`.`Endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_coleta`.`Endereco` (
  `idEndereco` INT NOT NULL,
  `CEP` VARCHAR(45) NULL,
  `Cidade` VARCHAR(45) NULL,
  `Estado` VARCHAR(45) NULL,
  `Bairro` VARCHAR(45) NULL,
  `Logradouro` VARCHAR(45) NULL,
  `Numero` VARCHAR(45) NULL,
  `Complemento` VARCHAR(45) NULL,
  PRIMARY KEY (`idEndereco`))



-- -----------------------------------------------------
-- Table `banco_coleta`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_coleta`.`Usuario` (
  `id_usuario` VARCHAR(45) NOT NULL,
  `CPF` VARCHAR(11) NULL,
  `CNPJ` VARCHAR(14) NULL,
  `data_nascimento` DATE NULL,
  `Telefone` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  `tipo_usuario` INT NULL,
  `Endereco_idEndereco` INT NOT NULL,
  PRIMARY KEY (`id_usuario`, `Endereco_idEndereco`),
  INDEX `fk_Usuario_Endereco1_idx` (`Endereco_idEndereco` ASC) ,
  CONSTRAINT `fk_Usuario_Endereco1`
    FOREIGN KEY (`Endereco_idEndereco`)
    REFERENCES `banco_coleta`.`Endereco` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `banco_coleta`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_coleta`.`Cliente` (
  `id_Cliente` INT NOT NULL,
  `Pontos` INT NULL,
  `fk_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_Cliente`, `fk_usuario`),
  INDEX `fk_Cliente_Usuario_idx` (`fk_usuario` ASC) ,
  CONSTRAINT `fk_Cliente_Usuario`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `banco_coleta`.`Usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `banco_coleta`.`Administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_coleta`.`Administrador` (
  `id_Administrador` INT NOT NULL,
  `fk_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_Administrador`, `fk_usuario`),
  INDEX `fk_Administrador_Usuario1_idx` (`fk_usuario` ASC) ,
  CONSTRAINT `fk_Administrador_Usuario1`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `banco_coleta`.`Usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `banco_coleta`.`Coletor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_coleta`.`Coletor` (
  `id_Coletor` INT NOT NULL,
  `Descricao` VARCHAR(500) NULL,
  `fk_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_Coletor`, `fk_usuario`),
  INDEX `fk_Coletor_Usuario1_idx` (`fk_usuario` ASC) ,
  CONSTRAINT `fk_Coletor_Usuario1`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `banco_coleta`.`Usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `banco_coleta`.`PedidoColeta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_coleta`.`PedidoColeta` (
  `id_PedidoColeta` INT NOT NULL,
  `midia` VARCHAR(45) NULL,
  `qnt_plastico` INT NULL,
  `qnt_vidro` INT NULL,
  `qnt_aluminio` INT NULL,
  `qnt_papel` INT NULL,
  `fk_cliente` INT NOT NULL,
  PRIMARY KEY (`id_PedidoColeta`, `fk_cliente`),
  INDEX `fk_PedidoColeta_Cliente1_idx` (`fk_cliente` ASC) ,
  CONSTRAINT `fk_PedidoColeta_Cliente1`
    FOREIGN KEY (`fk_cliente`)
    REFERENCES `banco_coleta`.`Cliente` (`id_Cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `banco_coleta`.`Calculadora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_coleta`.`Calculadora` (
  `idCalculadora` INT NOT NULL,
  `total` INT NULL,
  `fk_pedido` INT NOT NULL,
  PRIMARY KEY (`idCalculadora`, `fk_pedido`),
  INDEX `fk_Calculadora_PedidoColeta1_idx` (`fk_pedido` ASC) ,
  CONSTRAINT `fk_Calculadora_PedidoColeta1`
    FOREIGN KEY (`fk_pedido`)
    REFERENCES `banco_coleta`.`PedidoColeta` (`id_PedidoColeta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `banco_coleta`.`PontoColeta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_coleta`.`PontoColeta` (
  `idPontoColeta` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  `horario_funcionamento` VARCHAR(100) NULL,
  `info_contato` VARCHAR(45) NULL,
  `Endereco_idEndereco` INT NOT NULL,
  PRIMARY KEY (`idPontoColeta`, `Endereco_idEndereco`),
  INDEX `fk_PontoColeta_Endereco1_idx` (`Endereco_idEndereco` ASC) ,
  CONSTRAINT `fk_PontoColeta_Endereco1`
    FOREIGN KEY (`Endereco_idEndereco`)
    REFERENCES `banco_coleta`.`Endereco` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `banco_coleta`.`Coletor_Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_coleta`.`Coletor_Pedido` (
  `id_Coletor_Pedido` INT NOT NULL,
  `fk_Coletor` INT NOT NULL,
  `fk_PedidoColeta` INT NOT NULL,
  INDEX `fk_Coletor_has_PedidoColeta_PedidoColeta1_idx` (`fk_PedidoColeta` ASC) ,
  INDEX `fk_Coletor_has_PedidoColeta_Coletor1_idx` (`fk_Coletor` ASC) ,
  PRIMARY KEY (`id_Coletor_Pedido`),
  CONSTRAINT `fk_Coletor_has_PedidoColeta_Coletor1`
    FOREIGN KEY (`fk_Coletor`)
    REFERENCES `banco_coleta`.`Coletor` (`id_Coletor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Coletor_has_PedidoColeta_PedidoColeta1`
    FOREIGN KEY (`fk_PedidoColeta`)
    REFERENCES `banco_coleta`.`PedidoColeta` (`id_PedidoColeta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
