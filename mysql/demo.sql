-- stafftable create
CREATE TABLE IF NOT EXISTS `staffAccnt` (
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `StaffID` int(8) NOT NULL  PRIMARY KEY,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Qualification`  varchar(20) NOT NULL,
  `expertise` varchar(20) NOT NULL,
  `PhoneNum`  varchar(15) NOT NULL,
  `Address1`  varchar(30),
  `Address2`  varchar(30),
  `Region`  varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Student create
CREATE TABLE IF NOT EXISTS `StudentAccnt` (
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `StudentID` int(6) NOT NULL  PRIMARY KEY,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `DOB` varchar(15),
  `PhoneNum`  varchar(15),
  `Address1`  varchar(30),
  `Address2`  varchar(30),
  `Region`  varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;