-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2014 at 06:03 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stgcore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table list all the categories of the application. In th' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Enseignement'),
(2, 'Divertissement'),
(3, 'Relaxation'),
(4, 'tr'),
(5, 'terre'),
(6, 'Lsd'),
(7, 'Kwayer'),
(8, 'here'),
(9, 'Ecole2'),
(10, 'Ecole4'),
(11, 'Erole'),
(12, 'Erole'),
(13, 'Erole'),
(14, 'Erole'),
(15, 'Erole'),
(16, 'Erole'),
(17, 'Eroler'),
(18, 'Eroler2'),
(19, 'Eroler22');

-- --------------------------------------------------------

--
-- Table structure for table `field_study`
--

CREATE TABLE IF NOT EXISTS `field_study` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This is the name of all the field study entered by the admin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isocode` varchar(45) DEFAULT NULL COMMENT 'The ISO COde is or example FR-fr for French language and EN-en for English language ',
  `value` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This is the table which records the languages that must be s' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `isocode`, `value`) VALUES
(1, 'fr', 'Francais'),
(2, 'en', 'Anglais');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(11) DEFAULT NULL,
  `gender` enum('F','M') DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL COMMENT 'Studious start year.',
  `end_year` year(4) DEFAULT NULL COMMENT 'Studious end year.',
  `inter_student` enum('YES','NO') DEFAULT 'NO' COMMENT 'Whether his/she is an international student.',
  `school_id` int(11) DEFAULT NULL,
  `fieldstudy_id` int(11) DEFAULT NULL,
  `student_status` enum('PART','FULL') DEFAULT 'PART',
  `study_level` enum('1','2','3') DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `user_id` (`user_id`),
  KEY `school_id` (`school_id`),
  KEY `field_study_id` (`fieldstudy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='This table contains profile for every user.' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `age`, `gender`, `start_year`, `end_year`, `inter_student`, `school_id`, `fieldstudy_id`, `student_status`, `study_level`, `user_id`) VALUES
(1, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, 'PART', '1', 9),
(2, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, 'PART', '1', 10),
(3, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, 'PART', '1', 11),
(4, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, 'PART', '1', 12),
(5, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, 'PART', '1', 13),
(6, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, 'PART', '1', 14),
(7, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, 'PART', '1', 15),
(8, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, 'PART', '1', 16),
(9, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, 'PART', '1', 17);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isvisible` tinyint(1) DEFAULT '1',
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `CategoryId` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This tables records all the questions that have been entered' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `isvisible`, `category_id`) VALUES
(2, 1, 1),
(3, 1, 3),
(4, 1, 16),
(5, 1, 12),
(6, 1, 18),
(7, 1, 10),
(8, 1, 6),
(9, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This is the table role for a user. With this it is able to s' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table saves the list of all schools that have been save' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `pin` varchar(255) NOT NULL,
  `isbanned` tinyint(1) DEFAULT '0' COMMENT 'This column tells us if the use is banned or nor. By default his account is not banned.',
  `isactivated` tinyint(1) DEFAULT '0' COMMENT 'This tells us if the user has activated his account or not. By default all account are not activated till the user opens the mail and clicks on the link sent to him.',
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Here we must know the time the user was last connected to the system. This is useful in the future.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This is the user table of the database.' AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pin`, `isbanned`, `isactivated`, `last_login`) VALUES
(6, 'gabykant@yahoo.com', 'computer', 0, 0, '2014-10-21 21:03:54'),
(7, 'gabrielkwaye@gmail.com', '', 0, 0, '2014-10-21 21:04:03'),
(8, 'bedwine2@yahoo.fr', '', 0, 0, '2014-10-21 21:05:47'),
(9, 'ajchouansi@yahoo.fr', '', 0, 0, '2014-10-21 21:12:30'),
(10, 'g.kwaye@yahoo.de', '', 0, 0, '2014-10-28 09:56:56'),
(11, 'kwayegabriel@yahoo.fr', '', 0, 0, '2014-10-28 11:45:49'),
(12, 'gabykant2@yahoo.com', '', 0, 0, '2014-10-28 12:55:22'),
(13, 'kwayegabriel22@yahoo.fr', '', 0, 0, '2014-10-28 13:04:38'),
(14, 'gabrielkwaye2@gmail.com', '', 0, 0, '2014-10-28 13:06:55'),
(15, 'gabykant3@yahoo.com', '', 0, 0, '2014-10-28 13:10:39'),
(16, 'gabykant6@yahoo.com', 'kk', 0, 0, '2014-10-28 13:15:39'),
(17, 'gabrielkwaye5@gmail.com', 'n', 0, 0, '2014-10-28 13:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `userId` (`user_id`),
  KEY `roleId` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This is the 1.n relationship between Entities. A simple user';

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(15, 2),
(16, 2),
(17, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `field_study_id` FOREIGN KEY (`fieldstudy_id`) REFERENCES `field_study` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `school_id` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `CategoryId` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `roleId` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userId` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/* Add on 06.11.2014 */

CREATE  TABLE IF NOT EXISTS `stgcore`.`Question_Lang` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `question_id` INT NULL ,
  `lang_id` INT NULL ,
  `label` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_id_question` (`question_id` ASC) ,
  INDEX `fk_id_lang` (`lang_id` ASC) ,
  CONSTRAINT `fk_id_question`
    FOREIGN KEY (`question_id` )
    REFERENCES `stgcore`.`Question` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_lang`
    FOREIGN KEY (`lang_id` )
    REFERENCES `stgcore`.`Lang` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'This table is the 2:n relationship. A question is in two lan' /* comment truncated */ 

CREATE  TABLE IF NOT EXISTS `stgcore`.`Evaluation` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `value_input` INT NULL ,
  `user_id` INT NOT NULL ,
  `question_id` INT NOT NULL ,
  `eval_date` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_id_user` (`user_id` ASC) ,
  INDEX `fk_id_question_eval` (`question_id` ASC) ,
  CONSTRAINT `fk_id_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `stgcore`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_question_eval`
    FOREIGN KEY (`question_id` )
    REFERENCES `stgcore`.`Question` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'This contains the response of all the users.' ;

CREATE  TABLE IF NOT EXISTS `stgcore`.`Indice` (
  `id` INT NOT NULL ,
  `lang_id` INT NULL ,
  `name` VARCHAR(255) NULL ,
  INDEX `fk_id_indice_lang` (`lang_id` ASC) ,
  CONSTRAINT `fk_id_indice_lang`
    FOREIGN KEY (`lang_id` )
    REFERENCES `stgcore`.`Lang` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

START TRANSACTION;
USE `stgcore`;
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (1, 1, 'Très insatisfait');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (1, 2, 'Very unsatisfied');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (2, 1, 'Insatisfait');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (2, 2, 'Unsatisfied');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (3, 1, 'Neutre');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (3, 2, 'Neutral');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (4, 1, 'Satisfait');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (4, 2, 'Satisfied');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (5, 1, 'Très satisfait');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (5, 2, 'Very satisfied');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (6, 1, 'Non applicable');
INSERT INTO `stgcore`.`Indice` (`id`, `lang_id`, `name`) VALUES (6, 2, 'Not applicable');

COMMIT;

CREATE  TABLE IF NOT EXISTS `stgcore`.`Status` (
  `user_id` INT NOT NULL ,
  `question_id` INT NULL ,
  PRIMARY KEY (`user_id`) ,
  INDEX `fk_id_status_user` (`user_id` ASC) ,
  INDEX `fk_id_status_question` (`question_id` ASC) ,
  CONSTRAINT `fk_id_status_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `stgcore`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_status_question`
    FOREIGN KEY (`question_id` )
    REFERENCES `stgcore`.`Question` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'Here we save the current question for each user. When the us' /* comment truncated */ ;