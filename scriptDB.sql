-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema blog_bx
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blog_bx
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog_bx` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `blog_bx` ;

-- -----------------------------------------------------
-- Table `blog_bx`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_bx`.`rol` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog_bx`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_bx`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `correo` VARCHAR(255) NOT NULL,
  `fechaNacimiento` DATE NULL DEFAULT NULL,
  `contrasena` VARCHAR(255) NOT NULL,
  `rol_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_rol1_idx` (`rol_id` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_rol1`
    FOREIGN KEY (`rol_id`)
    REFERENCES `blog_bx`.`rol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `blog_bx`.`anuncio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_bx`.`anuncio` (
  `idanuncio` INT NOT NULL AUTO_INCREMENT,
  `title_anuncio` VARCHAR(45) NOT NULL,
  `img_anuncio` VARCHAR(45) NOT NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`idanuncio`),
  INDEX `fk_anuncio_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_anuncio_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `blog_bx`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog_bx`.`entrada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_bx`.`entrada` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo_entrada` VARCHAR(255) NOT NULL,
  `contenido_entrada` TEXT NOT NULL,
  `fecha_entrada` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` INT NOT NULL,
  `anuncio_idanuncio` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `usuario_id` (`usuario_id` ASC) VISIBLE,
  INDEX `fk_entrada_anuncio1_idx` (`anuncio_idanuncio` ASC) VISIBLE,
  CONSTRAINT `entrada_ibfk_1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `blog_bx`.`usuario` (`id`),
  CONSTRAINT `fk_entrada_anuncio1`
    FOREIGN KEY (`anuncio_idanuncio`)
    REFERENCES `blog_bx`.`anuncio` (`idanuncio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `blog_bx`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_bx`.`comentario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contenido` TEXT NOT NULL,
  `entrada_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `fecha_comentario` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `usuario_id` (`usuario_id` ASC) VISIBLE,
  INDEX `entrada_id` (`entrada_id` ASC) VISIBLE,
  CONSTRAINT `comentario_ibfk_1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `blog_bx`.`usuario` (`id`),
  CONSTRAINT `comentario_ibfk_2`
    FOREIGN KEY (`entrada_id`)
    REFERENCES `blog_bx`.`entrada` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
