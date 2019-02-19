-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema cchilderDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cchilderDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cchilderDB` DEFAULT CHARACTER SET latin1 ;
USE `cchilderDB` ;

-- -----------------------------------------------------
-- Table `cchilderDB`.`Publisher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`Publisher` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`Publisher` (
  `Publisher_ID` INT(11) NOT NULL,
  `Publisher_name` VARCHAR(50) NULL DEFAULT NULL,
  `Publisher_img` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Holds URL of omg',
  PRIMARY KEY (`Publisher_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`Character`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`Character` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`Character` (
  `Character_ID` INT(11) NOT NULL,
  `Character_realName` VARCHAR(50) NULL DEFAULT NULL,
  `Character_name` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Holds alias of character (usually superhero name)',
  `Character_img` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Holds URL of omg',
  `Character_briefDesc` VARCHAR(500) NULL DEFAULT NULL,
  `Character_desc` VARCHAR(1000) NULL DEFAULT NULL,
  `Character_origin` VARCHAR(1000) NULL DEFAULT NULL,
  `Publisher_Publishe_ID` INT(11) NOT NULL,
  PRIMARY KEY (`Character_ID`, `Publisher_Publishe_ID`),
  CONSTRAINT `fk_Character_Publisher1`
    FOREIGN KEY (`Publisher_Publishe_ID`)
    REFERENCES `cchilderDB`.`Publisher` (`Publisher_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`Team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`Team` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`Team` (
  `Team_ID` INT(11) NOT NULL,
  `Team_name` VARCHAR(50) NULL DEFAULT NULL,
  `Team_briefDesc` VARCHAR(500) NULL DEFAULT NULL,
  `Team_desc` VARCHAR(1000) NULL DEFAULT NULL,
  `Team_img` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Holds URL of img',
  PRIMARY KEY (`Team_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`Character_has_Team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`Character_has_Team` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`Character_has_Team` (
  `Character_Character_ID` INT(11) NOT NULL,
  `Team_Team_ID` INT(11) NOT NULL,
  PRIMARY KEY (`Character_Character_ID`, `Team_Team_ID`),
  CONSTRAINT `fk_Character_has_Team_Character1`
    FOREIGN KEY (`Character_Character_ID`)
    REFERENCES `cchilderDB`.`Character` (`Character_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Character_has_Team_Team1`
    FOREIGN KEY (`Team_Team_ID`)
    REFERENCES `cchilderDB`.`Team` (`Team_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`ComicIssue`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`ComicIssue` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`ComicIssue` (
  `ComicIssue_ID` INT(11) NOT NULL,
  `ComicIssue_title` VARCHAR(50) NULL DEFAULT NULL,
  `ComicIssue_desc` VARCHAR(1000) NULL DEFAULT NULL,
  `ComicIssue_releaseDate` DATE NULL DEFAULT NULL,
  `ComicIssue_issueNumber` INT(11) NULL DEFAULT NULL COMMENT 'Issue Number in volume',
  `ComicIssue_img` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Holds URL for img',
  `ComicIssue_breifDesc` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`ComicIssue_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`ComicIssue_has_Character`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`ComicIssue_has_Character` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`ComicIssue_has_Character` (
  `ComicIssue_ComicIssue_ID` INT(11) NOT NULL,
  `Character_Character_ID` INT(11) NOT NULL,
  `Character_Publisher_Publishe_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ComicIssue_ComicIssue_ID`, `Character_Character_ID`, `Character_Publisher_Publishe_ID`),
  CONSTRAINT `fk_ComicIssue_has_Character_Character1`
    FOREIGN KEY (`Character_Character_ID` , `Character_Publisher_Publishe_ID`)
    REFERENCES `cchilderDB`.`Character` (`Character_ID` , `Publisher_Publishe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComicIssue_has_Character_ComicIssue1`
    FOREIGN KEY (`ComicIssue_ComicIssue_ID`)
    REFERENCES `cchilderDB`.`ComicIssue` (`ComicIssue_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`StoryArc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`StoryArc` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`StoryArc` (
  `StoryArc_ID` INT(11) NOT NULL,
  `StoryArc_name` VARCHAR(50) NULL DEFAULT NULL,
  `StoryArc_img` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Holds URL of omg',
  `StoryArc_briefDesc` VARCHAR(500) NULL DEFAULT NULL,
  `StoryArc_desc` VARCHAR(1000) NULL DEFAULT NULL,
  PRIMARY KEY (`StoryArc_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`ComicIssue_has_StoryArc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`ComicIssue_has_StoryArc` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`ComicIssue_has_StoryArc` (
  `ComicIssue_ComicIssue_ID` INT(11) NOT NULL,
  `StoryArc_StoryArc_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ComicIssue_ComicIssue_ID`, `StoryArc_StoryArc_ID`),
  CONSTRAINT `fk_ComicIssue_has_StoryArc_ComicIssue1`
    FOREIGN KEY (`ComicIssue_ComicIssue_ID`)
    REFERENCES `cchilderDB`.`ComicIssue` (`ComicIssue_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComicIssue_has_StoryArc_StoryArc1`
    FOREIGN KEY (`StoryArc_StoryArc_ID`)
    REFERENCES `cchilderDB`.`StoryArc` (`StoryArc_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`ComicIssue_has_Team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`ComicIssue_has_Team` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`ComicIssue_has_Team` (
  `ComicIssue_ComicIssue_ID` INT(11) NOT NULL,
  `Team_Team_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ComicIssue_ComicIssue_ID`, `Team_Team_ID`),
  CONSTRAINT `fk_ComicIssue_has_Team_ComicIssue1`
    FOREIGN KEY (`ComicIssue_ComicIssue_ID`)
    REFERENCES `cchilderDB`.`ComicIssue` (`ComicIssue_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComicIssue_has_Team_Team1`
    FOREIGN KEY (`Team_Team_ID`)
    REFERENCES `cchilderDB`.`Team` (`Team_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`ComicVolume_has_Character`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`ComicVolume_has_Character` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`ComicVolume_has_Character` (
  `ComicVolume_ComicVolume_ID` INT(11) NOT NULL,
  `ComicVolume_Publisher_Publishe_ID` INT(11) NOT NULL,
  `Character_Character_ID` INT(11) NOT NULL,
  `Character_Publisher_Publishe_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ComicVolume_ComicVolume_ID`, `ComicVolume_Publisher_Publishe_ID`, `Character_Character_ID`, `Character_Publisher_Publishe_ID`),
  CONSTRAINT `fk_ComicVolume_has_Character_Character1`
    FOREIGN KEY (`Character_Character_ID` , `Character_Publisher_Publishe_ID`)
    REFERENCES `cchilderDB`.`Character` (`Character_ID` , `Publisher_Publishe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComicVolume_has_Character_ComicVolume1`
    FOREIGN KEY (`ComicVolume_ComicVolume_ID` , `ComicVolume_Publisher_Publishe_ID`)
    REFERENCES `cchilderDB`.`ComicVolume` (`ComicVolume_ID` , `Publisher_Publishe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`ComicVolume_has_ComicIssue`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`ComicVolume_has_ComicIssue` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`ComicVolume_has_ComicIssue` (
  `ComicVolume_ComicVolume_ID` INT(11) NOT NULL,
  `ComicIssue_ComicIssue_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ComicVolume_ComicVolume_ID`, `ComicIssue_ComicIssue_ID`),
  CONSTRAINT `fk_ComicVolume_has_ComicIssue_ComicIssue1`
    FOREIGN KEY (`ComicIssue_ComicIssue_ID`)
    REFERENCES `cchilderDB`.`ComicIssue` (`ComicIssue_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComicVolume_has_ComicIssue_ComicVolume1`
    FOREIGN KEY (`ComicVolume_ComicVolume_ID`)
    REFERENCES `cchilderDB`.`ComicVolume` (`ComicVolume_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`ComicVolume_has_StoryArc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`ComicVolume_has_StoryArc` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`ComicVolume_has_StoryArc` (
  `ComicVolume_ComicVolume_ID` INT(11) NOT NULL,
  `ComicVolume_Publisher_Publishe_ID` INT(11) NOT NULL,
  `StoryArc_StoryArc_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ComicVolume_ComicVolume_ID`, `ComicVolume_Publisher_Publishe_ID`, `StoryArc_StoryArc_ID`),
  CONSTRAINT `fk_ComicVolume_has_StoryArc_ComicVolume1`
    FOREIGN KEY (`ComicVolume_ComicVolume_ID` , `ComicVolume_Publisher_Publishe_ID`)
    REFERENCES `cchilderDB`.`ComicVolume` (`ComicVolume_ID` , `Publisher_Publishe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComicVolume_has_StoryArc_StoryArc1`
    FOREIGN KEY (`StoryArc_StoryArc_ID`)
    REFERENCES `cchilderDB`.`StoryArc` (`StoryArc_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`ComicVolume_has_Team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`ComicVolume_has_Team` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`ComicVolume_has_Team` (
  `ComicVolume_ComicVolume_ID` INT(11) NOT NULL,
  `ComicVolume_Publisher_Publishe_ID` INT(11) NOT NULL,
  `Team_Team_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ComicVolume_ComicVolume_ID`, `ComicVolume_Publisher_Publishe_ID`, `Team_Team_ID`),
  CONSTRAINT `fk_ComicVolume_has_Team_ComicVolume1`
    FOREIGN KEY (`ComicVolume_ComicVolume_ID` , `ComicVolume_Publisher_Publishe_ID`)
    REFERENCES `cchilderDB`.`ComicVolume` (`ComicVolume_ID` , `Publisher_Publishe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComicVolume_has_Team_Team1`
    FOREIGN KEY (`Team_Team_ID`)
    REFERENCES `cchilderDB`.`Team` (`Team_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`Creator`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`Creator` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`Creator` (
  `Creator_ID` INT(11) NOT NULL,
  `Creator_name` VARCHAR(50) NULL DEFAULT NULL,
  `Creator_img` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Holds URL of omg',
  `Creator_briefDesc` VARCHAR(500) NULL DEFAULT NULL,
  `Creator_desc` VARCHAR(1000) NULL DEFAULT NULL,
  PRIMARY KEY (`Creator_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`Creator_has_ComicIssue`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`Creator_has_ComicIssue` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`Creator_has_ComicIssue` (
  `Creator_Creator_ID` INT(11) NOT NULL,
  `ComicIssue_ComicIssue_ID` INT(11) NOT NULL,
  PRIMARY KEY (`Creator_Creator_ID`, `ComicIssue_ComicIssue_ID`),
  CONSTRAINT `fk_Creator_has_ComicIssue_ComicIssue1`
    FOREIGN KEY (`ComicIssue_ComicIssue_ID`)
    REFERENCES `cchilderDB`.`ComicIssue` (`ComicIssue_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Creator_has_ComicIssue_Creator1`
    FOREIGN KEY (`Creator_Creator_ID`)
    REFERENCES `cchilderDB`.`Creator` (`Creator_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`Creator_has_ComicVolume`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`Creator_has_ComicVolume` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`Creator_has_ComicVolume` (
  `Creator_Creator_ID` INT(11) NOT NULL,
  `ComicVolume_ComicVolume_ID` INT(11) NOT NULL,
  PRIMARY KEY (`Creator_Creator_ID`, `ComicVolume_ComicVolume_ID`),
  CONSTRAINT `fk_Creator_has_ComicVolume_ComicVolume1`
    FOREIGN KEY (`ComicVolume_ComicVolume_ID`)
    REFERENCES `cchilderDB`.`ComicVolume` (`ComicVolume_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Creator_has_ComicVolume_Creator1`
    FOREIGN KEY (`Creator_Creator_ID`)
    REFERENCES `cchilderDB`.`Creator` (`Creator_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`Power`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`Power` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`Power` (
  `Power_ID` INT(11) NOT NULL,
  `Power_name` VARCHAR(50) NULL DEFAULT NULL,
  `Power_desc` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`Power_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`Power_has_Character`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`Power_has_Character` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`Power_has_Character` (
  `Power_Power_ID` INT(11) NOT NULL,
  `Character_Character_ID` INT(11) NOT NULL,
  PRIMARY KEY (`Power_Power_ID`, `Character_Character_ID`),
  CONSTRAINT `fk_Power_has_Character_Character1`
    FOREIGN KEY (`Character_Character_ID`)
    REFERENCES `cchilderDB`.`Character` (`Character_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Power_has_Character_Power1`
    FOREIGN KEY (`Power_Power_ID`)
    REFERENCES `cchilderDB`.`Power` (`Power_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`User` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`User` (
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `ComicVolume_ComicVolume_ID` INT(11) NOT NULL,
  `ComicVolume_Publisher_Publishe_ID` INT(11) NOT NULL,
  PRIMARY KEY (`email`, `ComicVolume_ComicVolume_ID`, `ComicVolume_Publisher_Publishe_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`User_has_ComicIssue`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`User_has_ComicIssue` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`User_has_ComicIssue` (
  `User_ComicVolume_ComicVolume_ID` INT(11) NOT NULL,
  `User_ComicVolume_Publisher_Publishe_ID` INT(11) NOT NULL,
  `ComicIssue_ComicIssue_ID` INT(11) NOT NULL,
  PRIMARY KEY (`User_ComicVolume_ComicVolume_ID`, `User_ComicVolume_Publisher_Publishe_ID`, `ComicIssue_ComicIssue_ID`),
  CONSTRAINT `fk_User_has_ComicIssue_ComicIssue1`
    FOREIGN KEY (`ComicIssue_ComicIssue_ID`)
    REFERENCES `cchilderDB`.`ComicIssue` (`ComicIssue_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_ComicIssue_User1`
    FOREIGN KEY (`User_ComicVolume_ComicVolume_ID` , `User_ComicVolume_Publisher_Publishe_ID`)
    REFERENCES `cchilderDB`.`User` (`ComicVolume_ComicVolume_ID` , `ComicVolume_Publisher_Publishe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cchilderDB`.`User_has_ComicVolume`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cchilderDB`.`User_has_ComicVolume` ;

CREATE TABLE IF NOT EXISTS `cchilderDB`.`User_has_ComicVolume` (
  `User_ComicVolume_ComicVolume_ID` INT(11) NOT NULL,
  `User_ComicVolume_Publisher_Publishe_ID` INT(11) NOT NULL,
  `ComicVolume_ComicVolume_ID` INT(11) NOT NULL,
  `ComicVolume_Publisher_Publishe_ID` INT(11) NOT NULL,
  PRIMARY KEY (`User_ComicVolume_ComicVolume_ID`, `User_ComicVolume_Publisher_Publishe_ID`, `ComicVolume_ComicVolume_ID`, `ComicVolume_Publisher_Publishe_ID`),
  CONSTRAINT `fk_User_has_ComicVolume_ComicVolume1`
    FOREIGN KEY (`ComicVolume_ComicVolume_ID` , `ComicVolume_Publisher_Publishe_ID`)
    REFERENCES `cchilderDB`.`ComicVolume` (`ComicVolume_ID` , `Publisher_Publishe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_ComicVolume_User1`
    FOREIGN KEY (`User_ComicVolume_ComicVolume_ID` , `User_ComicVolume_Publisher_Publishe_ID`)
    REFERENCES `cchilderDB`.`User` (`ComicVolume_ComicVolume_ID` , `ComicVolume_Publisher_Publishe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
