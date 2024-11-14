-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema portes-ouvertes
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `portes-ouvertes` ;

-- -----------------------------------------------------
-- Schema portes-ouvertes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `portes-ouvertes` DEFAULT CHARACTER SET utf8mb3 ;
USE `portes-ouvertes` ;

-- -----------------------------------------------------
-- Table `portes-ouvertes`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `portes-ouvertes`.`user` ;

CREATE TABLE IF NOT EXISTS `portes-ouvertes`.`user` (
  `idUser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `date_naissance` DATE NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE `User_unique` (`username` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `portes-ouvertes`.`points`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `portes-ouvertes`.`points` ;

CREATE TABLE IF NOT EXISTS `portes-ouvertes`.`points` (
  `idPoints` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_idUser` INT UNSIGNED NOT NULL,
  `missing_dot` MEDIUMINT UNSIGNED NULL DEFAULT '0',
  `same_color` MEDIUMINT UNSIGNED NULL DEFAULT '0',
  `endless_number` MEDIUMINT UNSIGNED NULL DEFAULT '0',
  `wanted` MEDIUMINT UNSIGNED NULL DEFAULT '0',
  `pattern` MEDIUMINT UNSIGNED NULL DEFAULT '0',
  `reaction` MEDIUMINT UNSIGNED NULL DEFAULT '0',
  `missing_color` MEDIUMINT UNSIGNED NULL DEFAULT '0',
  PRIMARY KEY (`idPoints`),
  INDEX `fk_points_user_idx` (`user_idUser` ASC) VISIBLE,
  CONSTRAINT `fk_points_user`
    FOREIGN KEY (`user_idUser`)
    REFERENCES `portes-ouvertes`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
