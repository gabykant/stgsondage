SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `stgcore` ;
CREATE SCHEMA IF NOT EXISTS `stgcore` DEFAULT CHARACTER SET latin1 ;
USE `stgcore` ;

-- -----------------------------------------------------
-- Table `stgcore`.`User`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(255) NULL ,
  `isbanned` TINYINT(1)  NULL DEFAULT FALSE COMMENT 'This column tells us if the use is banned or nor. By default his account is not banned.' ,
  `isactivated` TINYINT(1)  NULL DEFAULT FALSE COMMENT 'This tells us if the user has activated his account or not. By default all account are not activated till the user opens the mail and clicks on the link sent to him.' ,
  `last_login` DATETIME NULL COMMENT 'Here we must know the time the user was last connected to the system. This is useful in the future.' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB
COMMENT = 'This is the user table of the database.' ;


-- -----------------------------------------------------
-- Table `stgcore`.`School`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`School` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB, 
COMMENT = 'This table saves the list of all schools that have been save' /* comment truncated */ ;


-- -----------------------------------------------------
-- Table `stgcore`.`Field_study`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`Field_study` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB, 
COMMENT = 'This is the name of all the field study entered by the admin' /* comment truncated */ ;


-- -----------------------------------------------------
-- Table `stgcore`.`Profile`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`Profile` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `age` INT NULL DEFAULT NULL ,
  `gender` ENUM('F','M') NULL DEFAULT NULL ,
  `start_year` YEAR NULL DEFAULT NULL COMMENT 'Studious start year.' ,
  `end_year` YEAR NULL DEFAULT NULL COMMENT 'Studious end year.' ,
  `inter_student` ENUM('YES','NO') NULL DEFAULT 'NO' COMMENT 'Whether his/she is an international student.' ,
  `school_id` INT NULL DEFAULT NULL ,
  `fieldstudy_id` INT NULL DEFAULT NULL ,
  `student_status` ENUM('PART','FULL') NULL DEFAULT 'PART' ,
  `study_level` ENUM('1','2','3') NULL DEFAULT 1 ,
  `user_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `user_id` (`user_id` ASC) ,
  INDEX `school_id` (`school_id` ASC) ,
  INDEX `field_study_id` (`fieldstudy_id` ASC) ,
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `stgcore`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `school_id`
    FOREIGN KEY (`school_id` )
    REFERENCES `stgcore`.`School` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `field_study_id`
    FOREIGN KEY (`fieldstudy_id` )
    REFERENCES `stgcore`.`Field_study` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8, 
COMMENT = 'This table contains profile for every user.' ;


-- -----------------------------------------------------
-- Table `stgcore`.`Role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`Role` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB, 
COMMENT = 'This is the table role for a user. With this it is able to s' /* comment truncated */ ;


-- -----------------------------------------------------
-- Table `stgcore`.`User_Role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`User_Role` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `role_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC) ,
  INDEX `userId` () ,
  INDEX `roleId` (`role_id` ASC, `user_id` ASC) ,
  CONSTRAINT `userId`
    FOREIGN KEY ()
    REFERENCES `stgcore`.`User` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `roleId`
    FOREIGN KEY (`role_id` , `user_id` )
    REFERENCES `stgcore`.`Role` (`id` , `id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'This is the 1.n relationship between Entities. A simple user' /* comment truncated */ ;


-- -----------------------------------------------------
-- Table `stgcore`.`Lang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`Lang` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `isocode` VARCHAR(45) NULL COMMENT 'The ISO COde is or example FR-fr for French language and EN-en for English language ' ,
  `value` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB, 
COMMENT = 'This is the table which records the languages that must be s' /* comment truncated */ ;


-- -----------------------------------------------------
-- Table `stgcore`.`Category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`Category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB, 
COMMENT = 'This table list all the categories of the application. In th' /* comment truncated */ ;


-- -----------------------------------------------------
-- Table `stgcore`.`Question`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`Question` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `isvisible` TINYINT(1)  NULL DEFAULT TRUE ,
  `category_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `CategoryId` (`category_id` ASC) ,
  CONSTRAINT `CategoryId`
    FOREIGN KEY (`category_id` )
    REFERENCES `stgcore`.`Category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'This tables records all the questions that have been entered' /* comment truncated */ ;


-- -----------------------------------------------------
-- Table `stgcore`.`Question_Lang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`Question_Lang` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `question_id` INT NULL ,
  `lang_id` INT NULL ,
  `label` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `questionId` () ,
  INDEX `langId` (`question_id` ASC, `lang_id` ASC) ,
  CONSTRAINT `questionId`
    FOREIGN KEY ()
    REFERENCES `stgcore`.`Question` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `langId`
    FOREIGN KEY (`question_id` , `lang_id` )
    REFERENCES `stgcore`.`Lang` (`id` , `id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'This table is the 2:n relationship. A question is in two lan' /* comment truncated */ ;


-- -----------------------------------------------------
-- Table `stgcore`.`Evaluation`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stgcore`.`Evaluation` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `value` INT NULL ,
  `user_id` INT NULL ,
  `question_id` INT NULL ,
  `eval_date` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `userId` () ,
  INDEX `questionId` (`question_id` ASC, `user_id` ASC) ,
  CONSTRAINT `userId`
    FOREIGN KEY ()
    REFERENCES `stgcore`.`User` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `questionId`
    FOREIGN KEY (`question_id` , `user_id` )
    REFERENCES `stgcore`.`Question` (`id` , `id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'This contains the response of all the users.' ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
