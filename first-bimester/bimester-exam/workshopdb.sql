DROP SCHEMA IF EXISTS `workshopsdb`;
CREATE SCHEMA `workshopsdb`;
USE `workshopsdb`;

CREATE TABLE IF NOT EXISTS `workshopsdb`.`instructor` (
  `idinstructor` VARCHAR(11) NOT NULL,
  `name` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `avatar_url` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `phone` VARCHAR(15) NULL,
  PRIMARY KEY (`idinstructor`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `workshopsdb`.`workshop`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `workshopsdb`.`workshop` (
  `idworkshop` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `avatar_url` VARCHAR(45) NULL,
  `places_offered` INT NULL,
  `start_date` DATE NULL,
  `end_date` DATE NULL,
  `start_time` VARCHAR(5) NULL,
  `end_time` VARCHAR(5) NULL,
  `duration` VARCHAR(45) NULL,
  `idinstructor` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`idworkshop`),
  CONSTRAINT `fk_workshop_instructor`
    FOREIGN KEY (`idinstructor`)
    REFERENCES `workshopsdb`.`instructor` (`idinstructor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `workshopsdb`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `workshopsdb`.`student` (
  `idstudent` VARCHAR(11) NOT NULL,
  `name` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `avatar_url` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `phone` VARCHAR(15) NULL,
  `registration_date` DATETIME NULL DEFAULT '2021-05-25 00:00:00',
  `update_date` DATETIME NULL DEFAULT '2021-05-25 00:00:00',
  PRIMARY KEY (`idstudent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `workshopsdb`.`workshop_student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `workshopsdb`.`workshop_student` (
  `idworkshop` INT NOT NULL,
  `idstudent` VARCHAR(11) NOT NULL,
  CONSTRAINT `fk_workshop_student_workshop1`
    FOREIGN KEY (`idworkshop`)
    REFERENCES `workshopsdb`.`workshop` (`idworkshop`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_workshop_student_student1`
    FOREIGN KEY (`idstudent`)
    REFERENCES `workshopsdb`.`student` (`idstudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

ALTER TABLE `workshopsdb`.`workshop_student` 
ADD PRIMARY KEY (`idworkshop`, `idstudent`);	
;

-- -----------------------------------------------------
-- INSERTS INSTRUCTOR`
-- -----------------------------------------------------

INSERT INTO `instructor` (`idinstructor`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1101020304', 'Luis Fernando', 'Álvarez Castillo', 'https://i.imgur.com/AvlTWWQ.jpg', 'lfalvarez@gmail.com', '0959240843');

INSERT INTO `instructor` (`idinstructor`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1102030405', 'Pablo Emilio', 'Ojeda Sarmiento', 'https://i.imgur.com/tWavckz.jpg', 'paojeda@gmail.com', '0986908280');

INSERT INTO `instructor` (`idinstructor`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1103040506', 'Emilio José', 'Peña Poma', 'https://i.imgur.com/N9kb5p5.jpg', 'papenia@gmail.com', '0994533202');


INSERT INTO `instructor` (`idinstructor`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1104050607', 'Maria Lourdes', 'Herrera Pieda', 'https://i.imgur.com/cRN8cWd.png', 'mlherrera@gmail.com', '0980108101');

INSERT INTO `instructor` (`idinstructor`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1105060708', 'Sebastián Andrés', 'Pérez Ortega', 'https://i.imgur.com/cJf3Ky3.jpg', 'saperez@gmail.com', '0967773371');

INSERT INTO `instructor` (`idinstructor`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1106070809', 'Karina Sofía', 'Delgado Martinez', 'https://i.imgur.com/yiH63Ow.jpg', 'ksdelgado@gmail.com', '0986579673');


-- -----------------------------------------------------
-- INSERTS WORKSHOPS`
-- -----------------------------------------------------

INSERT INTO `workshopsdb`.`workshop` (`name`, `avatar_url`, `places_offered`, `start_date`, `end_date`, `start_time`, `end_time`, `duration`, `idinstructor`) VALUES ('Computación', 'https://i.imgur.com/4Gjbxjt.jpg', '20', '2021-05-25', '2021-06-22', '14:00', '16:00', '4 semanas', '1102030405');

INSERT INTO `workshopsdb`.`workshop` (`name`, `avatar_url`, `places_offered`, `start_date`, `end_date`, `start_time`, `end_time`, `duration`, `idinstructor`) VALUES ('Mecánica', 'https://i.imgur.com/ZL75yHz.jpg', '25', '2021-05-25', '2021-07-06', '15:00', '17:00', '6 semanas', '1103040506');

INSERT INTO `workshopsdb`.`workshop` (`name`, `avatar_url`, `places_offered`, `start_date`, `end_date`, `start_time`, `end_time`, `duration`, `idinstructor`) VALUES ('Electricidad', 'https://i.imgur.com/BJosI15.jpg', '15', '2021-05-25', '2021-06-15', '17:00', '18:30', '3 semanas', '1105060708');

INSERT INTO `workshopsdb`.`workshop` (`name`, `avatar_url`, `places_offered`, `start_date`, `end_date`, `start_time`, `end_time`, `duration`, `idinstructor`) VALUES ('Redes', 'https://i.imgur.com/3pF3ymH.jpg', '20', '2021-05-25', '2021-06-22', '15:00', '17:00', '4 semanas', '1104050607');

INSERT INTO `workshopsdb`.`workshop` (`name`, `avatar_url`, `places_offered`, `start_date`, `end_date`, `start_time`, `end_time`, `duration`, `idinstructor`) VALUES ('Pintura', 'https://i.imgur.com/9pwCQVT.jpg', '15', '2021-05-25', '2021-07-06', '14:00', '15:30', '6 semanas', '1106070809');

INSERT INTO `workshopsdb`.`workshop` (`name`, `avatar_url`, `places_offered`, `start_date`, `end_date`, `start_time`, `end_time`, `duration`, `idinstructor`) VALUES ('Música', 'https://i.imgur.com/M1dMgrr.jpg', '20', '2021-05-25', '2021-06-29', '16:00', '18:00', '5 semanas', '1101020304');

-- -----------------------------------------------------
-- INSERTS STUDENTS`
-- -----------------------------------------------------

INSERT INTO `workshopsdb`.`student` (`idstudent`, `name`, `lastname`, `email`, `phone`) VALUES ('1109080706', 'Santiago Mateo', 'Encarnación Astudillo', 'smecarnacion@gmail.com', '0981976827');
INSERT INTO `workshopsdb`.`student` (`idstudent`, `name`, `lastname`, `email`, `phone`) VALUES ('1108070605', 'Anderson Matheo', 'Jimenez Ortega', 'amjimenez@gmail.com', '0999351127');
INSERT INTO `workshopsdb`.`student` (`idstudent`, `name`, `lastname`, `email`, `phone`) VALUES ('1107060504', 'Angel Santiago', 'Cajamarca Guarnizo', 'ascajamarca@gmail.com', '099443135');
INSERT INTO `workshopsdb`.`student` (`idstudent`, `name`, `lastname`, `email`, `phone`) VALUES ('1104999535', 'Carlos Xavier', 'Castillo Martinez', 'cxcastillo@gmail.com', '0939650879');
INSERT INTO `workshopsdb`.`student` (`idstudent`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1106050403', 'Carlos Homero', 'Juca Viteri', '', 'chjuca@gmail.com', '0997498206');
INSERT INTO `workshopsdb`.`student` (`idstudent`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1105040302', 'Gerson Moisés', 'Santos Salinas', '', 'gmsantos@gmail.com', '0932654829');
INSERT INTO `workshopsdb`.`student` (`idstudent`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1104030201', 'Carlos Leonardo', 'Troya Torres', '', 'cltroya@gmail.com', '0951848495');
INSERT INTO `workshopsdb`.`student` (`idstudent`, `name`, `lastname`, `avatar_url`, `email`, `phone`) VALUES ('1103020109', 'Renato Johao', 'Balcázar Jimenez', '', 'rjbalcazar@gmail.com', '0963787078');

-- -----------------------------------------------------
-- INSERTS WORKSHOP_STUDENT`
-- -----------------------------------------------------

INSERT INTO `workshopsdb`.`workshop_student` (`idworkshop`, `idstudent`) VALUES ('1', '1103020109');
INSERT INTO `workshopsdb`.`workshop_student` (`idworkshop`, `idstudent`) VALUES ('2', '1104030201');
INSERT INTO `workshopsdb`.`workshop_student` (`idworkshop`, `idstudent`) VALUES ('3', '1104999535');
INSERT INTO `workshopsdb`.`workshop_student` (`idworkshop`, `idstudent`) VALUES ('4', '1105040302');
INSERT INTO `workshopsdb`.`workshop_student` (`idworkshop`, `idstudent`) VALUES ('5', '1106050403');
INSERT INTO `workshopsdb`.`workshop_student` (`idworkshop`, `idstudent`) VALUES ('6', '1107060504');
INSERT INTO `workshopsdb`.`workshop_student` (`idworkshop`, `idstudent`) VALUES ('1', '1108070605');
INSERT INTO `workshopsdb`.`workshop_student` (`idworkshop`, `idstudent`) VALUES ('1', '1109080706');
