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
CREATE SCHEMA IF NOT EXISTS `portes-ouvertes` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema portes-ouvertes
-- -----------------------------------------------------
USE `portes-ouvertes` ;

-- -----------------------------------------------------
-- Table `portes-ouvertes`.`Points`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `portes-ouvertes`.`Points` ;

CREATE TABLE IF NOT EXISTS `portes-ouvertes`.`Points` (
  `idPoints` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `User_idUser` INT UNSIGNED NOT NULL,
  `missing_dot` MEDIUMINT UNSIGNED NULL DEFAULT 0,
  `same_color` MEDIUMINT UNSIGNED NULL DEFAULT 0,
  `endless_number` MEDIUMINT UNSIGNED NULL DEFAULT 0,
  `wanted` MEDIUMINT UNSIGNED NULL DEFAULT 0,
  `pattern` MEDIUMINT UNSIGNED NULL DEFAULT 0,
  `reaction` MEDIUMINT UNSIGNED NULL DEFAULT 0,
  `missing_color` MEDIUMINT UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY (`idPoints`, `User_idUser`),
  INDEX `fk_Points_User1_idx` (`User_idUser` ASC) VISIBLE,
  CONSTRAINT `fk_Points_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `portes-ouvertes`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portes-ouvertes`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `portes-ouvertes`.`User` ;

CREATE TABLE IF NOT EXISTS `portes-ouvertes`.`User` (
  `idUser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `date_naissance` DATE NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `Points_idPoints` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idUser`),
  INDEX `fk_User_Points_idx` (`Points_idPoints` ASC) VISIBLE,
  INDEX `User_unique` (`username` ASC, `date_naissance` ASC) VISIBLE,
  CONSTRAINT `fk_User_Points`
    FOREIGN KEY (`Points_idPoints`)
    REFERENCES `portes-ouvertes`.`Points` (`idPoints`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
