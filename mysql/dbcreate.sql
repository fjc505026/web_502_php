
--user table
CREATE TABLE `jfan6`.`user` (
        `user_id` INT(10) NOT NULL AUTO_INCREMENT , 
        `username` INT(20) NOT NULL ,
        `password` INT(20) NOT NULL ,
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


