-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`db_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`db_category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `mydb`.`db_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`db_product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `quantity` INT NOT NULL,
  `db_category_id` INT NOT NULL,
  PRIMARY KEY (`id`, `db_category_id`),
  INDEX `fk_db_product_db_category_idx` (`db_category_id` ASC) VISIBLE,
  CONSTRAINT `fk_db_product_db_category`
    FOREIGN KEY (`db_category_id`)
    REFERENCES `mydb`.`db_category` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `mydb`.`db_transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`db_transactions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `entry` INT NULL DEFAULT NULL,
  `sold` INT NULL DEFAULT NULL,
  `consume` INT NULL DEFAULT NULL,
  `loss` INT NULL DEFAULT NULL,
  `quantity` INT NOT NULL,
  `user` VARCHAR(45) NOT NULL,
  `date` DATE NOT NULL,
  `db_product_id` INT NOT NULL,
  `db_product_db_category_id` INT NOT NULL,
  PRIMARY KEY (`id`, `db_product_id`, `db_product_db_category_id`),
  INDEX `fk_db_transactions_db_product1_idx` (`db_product_id` ASC, `db_product_db_category_id` ASC) VISIBLE,
  CONSTRAINT `fk_db_transactions_db_product1`
    FOREIGN KEY (`db_product_id` , `db_product_db_category_id`)
    REFERENCES `mydb`.`db_product` (`id` , `db_category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf16;


-- -----------------------------------------------------
-- Table `mydb`.`db_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`db_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
