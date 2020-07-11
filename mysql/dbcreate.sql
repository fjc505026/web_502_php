
--user table
CREATE TABLE `jfan6`.`user` (
        `user_id` INT(10) NOT NULL AUTO_INCREMENT ,
        `username` VARCHAR(20) NOT NULL ,
        `password` VARCHAR(20) NOT NULL ,
        `gender` VARCHAR(5) NOT NULL ,
        `DOB` DATE NOT NULL ,
        `fname` VARCHAR(50) NOT NULL ,
        `lname` VARCHAR(50) NOT NULL ,
        `email` VARCHAR(50) NOT NULL ,
        `phonenum` INT(20) NOT NULL ,
        `student_id` INT(10) NOT NULL ,
        `staff_id` INT(10) NOT NULL ,
        `address_id` INT(10) NOT NULL ,
            PRIMARY KEY (`user_id`), UNIQUE (`username`)
) ENGINE = InnoDB;

--student table
CREATE TABLE `jfan6`.`student` (
    `student_id` INT(10) NOT NULL ,
    `start_date` DATE NOT NULL ,
    `expire_date` INT(20) NOT NULL
    ) ENGINE = InnoDB;

--staff table
CREATE TABLE `jfan6`.`staff` (
    `staff_id` INT(10) NOT NULL ,
    `expertise` VARCHAR(20) NOT NULL ,
    `qualification` VARCHAR(20) NOT NULL ,
        PRIMARY KEY (`staff_id`)
        ) ENGINE = InnoDB;

ALTER TABLE `staff` ADD `role` VARCHAR(20) NOT NULL AFTER `staff_id`;
--address table
CREATE TABLE `jfan6`.`address` (
    `address_id` INT(10) NOT NULL ,
    `address_detail1` VARCHAR(128) NOT NULL ,
    `address_detail2` VARCHAR(128) NOT NULL ,
    `city` VARCHAR(64) NOT NULL ,
    `state` VARCHAR(64) NOT NULL ,
    `country` VARCHAR(64) NOT NULL ,
    `postcode` INT(10) NOT NULL ,
        PRIMARY KEY (`address_id`)
    ) ENGINE = InnoDB;

-- Table structure for table `units`
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `unit_code` varchar(128) NOT NULL UNIQUE,
  `unit_name` varchar(128) NOT NULL,
  `lecturer` varchar(128) NOT NULL,
  `semester` varchar(128) NOT NULL,
  `deleted` INT(1) NOT NULL           --Modified
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table `units`
INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `lecturer`, `semester`) VALUES
(1, 'KIT101', 'Programming Fundamentals', 'James Montgomery', 'Semester 1'),
(2, 'KIT202', 'Secure Web Programming', 'Soonja Yeom', 'Semester 1'),
(3, 'KIT102', 'Introduction to Data Science', 'Son Tran', 'Semester 2'),
(4, 'KIT112', 'CyberSecurity and Ethical Hacking', 'Mira Park', 'Semester 2'),
(5, 'KIT606', 'Data Analytics', 'Saurabh Garg', 'Spring'),
(6, 'KIT326', 'eForensics', 'Tony Gray', 'Semester 2'),
(7, 'KIT710', 'eLogistics', 'Sonia Sadeghian Esfahani', 'Semester 1'),
(8, 'KIT406', 'Embedded Systems', 'Byeong Kang', 'Semester 2');

-- Dumping data for table `units`
INSERT INTO `address` (`address_id`, `address_detail1`) VALUES
(5, '1234 main st'),
(6, '1234 main st'),
(7, '1234 main st'),
(8, '1234 main st'),
(9, '1234 main st');

ALTER TABLE discipline
ADD FOREIGN KEY (unit_id) REFERENCES units(id);

ALTER TABLE student
ADD FOREIGN KEY (discipline_id) REFERENCES discipline(disc_id);


CREATE TABLE `jfan6`.`study` (
    `student_id` INT(10) NOT NULL ,
    `act_id` INT(10) NOT NULL ,
    	PRIMARY KEY (`student_id`,`act_id` ),
    	FOREIGN KEY (`student_id`) REFERENCES student(student_id),
    	FOREIGN KEY (`act_id`) REFERENCES activity(activity_id)

    ) ENGINE = InnoDB;



CREATE TABLE `jfan6`.`teach` (
    `staff_id` INT(10) NOT NULL ,
    `act_id` INT(10) NOT NULL ,
        PRIMARY KEY (`staff_id`,`act_id` ),
        FOREIGN KEY (`staff_id`) REFERENCES staff(staff_id),
        FOREIGN KEY (`act_id`) REFERENCES activity(activity_id)

) ENGINE = InnoDB;

--Pandora campus
INSERT INTO `activity` (`type`, `day`, `start_time`, `end_time`,`unit_id`,`location_id`) VALUES
('lecture', 'Monday',   '9:00', '10:00', 1,1),   --1
('lecture', 'Tuesday',  '10:00','11:00', 2,2),
('lecture', 'Wenseday', '9:00', '10:00', 3,7),
('lecture', 'Thursday', '13:00','15:00', 4,8),
('lecture', 'Friday',   '14:00','15:00', 5,2),
('lecture', 'Monday',   '11:00', '12:00', 6,7),
('lecture', 'Tuesday',  '14:00', '15:00', 7,1),
('lecture', 'Wenseday', '14:00', '15:00', 8,1);  --8

INSERT INTO `activity` (`type`, `day`, `start_time`, `end_time`,`unit_id`,`location_id`) VALUES
('tutorial', 'Monday',   '13:00', '14:00', 1,5),   --9
('tutorial', 'Tuesday',   '9:00', '10:00', 1,6),
('tutorial', 'Tuesday',  '15:00','16:00', 2,6),
('tutorial', 'Tuesday',  '16:00','17:00', 2,6),
('tutorial', 'Wenseday', '11:00', '12:00', 3,5),
('tutorial', 'Thursday', '14:00','16:00', 4,6),
('tutorial', 'Friday',   '9:00','10:00', 5,3),
('tutorial', 'Monday',   '16:00', '17:00', 6,2),
('tutorial', 'Tuesday',  '9:00', '10:00', 7,3),
('tutorial', 'Wenseday', '10:00', '11:00', 8,2);  --8

INSERT INTO `activity` (`type`, `day`, `start_time`, `end_time`,`unit_id`,`location_id`,`period`) VALUES
('tutorial', 'Tuesday',  '16:00','17:00', 2,6,'Semester 1'),
('tutorial', 'Wenseday', '12:00', '13:00', 3,5,'Semester 1'),
('tutorial', 'Thursday', '15:00','17:00', 4,6,'Semester 1'),
('tutorial', 'Friday',   '11:00','12:00', 5,3,'Semester 1'); -21
('tutorial', 'Tuesday',   '11:00','12:00', 6,2,'Semester 1'),
('tutorial', 'Thursday',   '11:00','12:00', 7,3,'Semester 1'),
('tutorial', 'Monday',   '11:00','12:00', 8,1,'Semester 1');


INSERT INTO `location` (`room_name`, `capacity`,`campus`)  VALUES
('BAR1','40','Pandora'),    --1   le
('BAR2','40','Pandora'),    --2
('BBR1','30','Pandora'),
('BBR2','30','Pandora'),
('BCR1','20','Pandora'),   --5
('BCR2','20','Pandora'),    --6
('BDR1','40','Pandora'),    --7
('BDR2','40','Pandora'),    --8
('BAR1','40','Rivendell'), --9
('BAR2','40','Rivendell'),
('BBR1','30','Rivendell'),
('BBR2','30','Rivendell'),
('BCR1','20','Rivendell'),
('BCR2','20','Rivendell'),
('BDR1','40','Rivendell'),
('BDR2','40','Rivendell'),
('BAR1','40','Neverland'), --17
('BAR2','40','Neverland'),
('BBR1','30','Neverland'),
('BBR2','30','Neverland'),
('BCR1','20','Neverland'),
('BCR2','20','Neverland'),
('BDR1','40','Neverland'),
('BDR2','40','Neverland');  --24


SELECT act.activity_id ,u.unit_code,u.unit_name,u.lecturer,u.semester,loc.campus
        FROM activity act
        JOIN location loc
        ON   act.location_id=loc.location_id
        JOIN units u
        ON    act.unit_id=u.id
        WHERE act.type='lecture';

INSERT INTO `jfan6`.`teach` (`staff_id`, `act_id`)
VALUES ('99999999', '3'),
        ('11111222', '8'),
        ('33338888', '9'),
        ('77778888', '11'),
        ('56788765', '12'),
        ('88888888', '13'),
        ('98761234', '14'),
        ('33338888', '15'),
        ('88888888', '16'),
        ('99999999', '17'),

        ('11112222', '18'),
        ('22223333', '19'),
        ('55556666', '20'),
        ('99998888', '21'),
        ('87654321', '22'),
        ('88884444', '23'),
        ('12345678', '24'),


