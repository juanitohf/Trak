CREATE TABLE IF NOT EXISTS `Cart_Status` (
  `Cart_Status_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Description_Status_Cart` varchar(50) NOT NULL,
  PRIMARY KEY (`Cart_Status_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `categories` (
  `Category_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Description` varchar(100) NOT NULL,
  PRIMARY KEY (`Category_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;

INSERT INTO `categories` (`Category_Id`, `Category_Description`) VALUES
(0, '--- None ---'),
(1, 'Earth and Space'),
(2, 'Environments'),
(3, 'Physics of Sound'),
(4, 'Physics'),
(5, 'Chemistry'),
(6, 'Electronic');



CREATE TABLE IF NOT EXISTS `grants` (
  `Grant_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Grant_name` varchar(100) NOT NULL,
  `Grant_email` varchar(100) NOT NULL,
  `Grant_phone` char(12) NOT NULL,
  PRIMARY KEY (`Grant_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;

--
-- Dumping data for table `grants`
--

INSERT INTO `grants` (`Grant_Id`, `Grant_name`, `Grant_email`, `Grant_phone`) VALUES
(0, '- - None - -', '', '');



CREATE TABLE IF NOT EXISTS `Groups` (
  `GroupId` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Description` varchar(100) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `itemType` (
  `ItemType_Id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemType_description` varchar(100) NOT NULL,
  PRIMARY KEY (`ItemType_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


INSERT INTO `itemType` (`ItemType_Id`, `ItemType_description`) VALUES
(1, 'Disposable'),
(2, 'No-Disposable'),
(3, 'Live');



CREATE TABLE IF NOT EXISTS `lessons` (
  `Lesson_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Lesson_description` varchar(100) NOT NULL,
  PRIMARY KEY (`Lesson_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`Lesson_Id`, `Lesson_description`) VALUES
(1, 'Electricity'),
(2, 'Draft work'),
(3, 'Eart & Space'),
(4, 'Physics of Sound'),
(5, 'Craft work'),
(6, 'Rocks and Minerals'),
(7, 'Chemical Reactions'),
(8, 'Earthquake'),
(9, 'Ecosystems');



CREATE TABLE IF NOT EXISTS `Messages` (
  `MessageId` int(11) NOT NULL AUTO_INCREMENT,
  `Message` varchar(512) NOT NULL,
  `Message_Date` date NOT NULL,
  `User_Id` int(11) NOT NULL,
  PRIMARY KEY (`MessageId`),
  KEY `fk_Messages_users1_idx` (`User_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `resetPass` (
  `resetPass_Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Acode` int(15) NOT NULL,
  `dateTime` datetime NOT NULL,
  PRIMARY KEY (`resetPass_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;




CREATE TABLE IF NOT EXISTS `subcategories` (
  `Subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `Subcategory_description` varchar(100) NOT NULL,
  `Category_id` int(11) NOT NULL,
  PRIMARY KEY (`Subcategory_id`),
  KEY `fk_subcategories` (`Category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`Subcategory_id`, `Subcategory_description`, `Category_id`) VALUES
(0, '--- None ---', 0),
(1, 'Electricity', 1),
(2, 'Soil', 2),
(3, 'Sound', 3),
(4, 'Sound', 4),
(5, 'Earth', 1),
(6, 'Magnetism', 4),
(7, 'Atoms', 5),
(8, 'Chemical reactions', 5),
(9, 'Earthquake', 1),
(10, 'Plants', 2),
(11, 'Electricity', 4),
(12, 'Moon lesson', 1),
(13, 'Calculator', 6);



CREATE TABLE IF NOT EXISTS `vendors` (
  `Vendor_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Vendor_name` varchar(50) NOT NULL,
  `Vendor_email` varchar(50) DEFAULT NULL,
  `Vendor_phone` char(12) DEFAULT NULL,
  `Vendor_web` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Vendor_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`Vendor_Id`, `Vendor_name`, `Vendor_email`, `Vendor_phone`, `Vendor_web`) VALUES
(0, ' - - None - -', '', '', '');




CREATE TABLE IF NOT EXISTS `items` (
  `Item_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Item_description` varchar(100) DEFAULT NULL,
  `Reference` varchar(15) DEFAULT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Initial_Quantity` int(11) DEFAULT NULL,
  `Stock_Quantity` int(11) DEFAULT NULL,
  `Lessons_item` varchar(500) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Expiration_date` date DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Grant_Id` int(11) DEFAULT NULL,
  `Vendor_Id` int(11) DEFAULT NULL,
  `Category_Id` int(11) DEFAULT NULL,
  `Subcategory_id` int(11) DEFAULT NULL,
  `ItemType_Id` int(11) DEFAULT NULL,
  `Building` varchar(50) DEFAULT NULL,
  `Cabine` varchar(50) DEFAULT NULL,
  `Room` varchar(50) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Location_Description` varchar(100) DEFAULT NULL,
  `item_report` varchar(512) DEFAULT NULL,
  `Grp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Item_Id`),
  UNIQUE KEY `Reference` (`Reference`),
  KEY `fk_items` (`ItemType_Id`),
  KEY `fk_items_1` (`Subcategory_id`),
  KEY `fk_items_2` (`Category_Id`),
  KEY `fk_items_3` (`Grant_Id`),
  KEY `Vendor_Id` (`Vendor_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 DELAY_KEY_WRITE=1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `transaction_status`
--

CREATE TABLE IF NOT EXISTS `transaction_status` (
  `Transaction_Status_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Transaction_Description` varchar(50) NOT NULL,
  PRIMARY KEY (`Transaction_Status_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transaction_status`
--

INSERT INTO `transaction_status` (`Transaction_Status_Id`, `Transaction_Description`) VALUES
(1, 'Item In'),
(2, 'Item Out');



CREATE TABLE IF NOT EXISTS `users` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `MidleName` varchar(50) NOT NULL,
  `Last` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Temple_Id` int(9) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Cellphone` char(12) NOT NULL,
  `Address1` varchar(50) NOT NULL,
  `Address2` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Zip` char(10) NOT NULL,
  `HomePhone` char(12) NOT NULL,
  `WorkPhone` char(12) NOT NULL,
  `Website` varchar(50) NOT NULL,
  `User_Type_Id` int(11) NOT NULL,
  `Permitions` char(11) NOT NULL,
  PRIMARY KEY (`User_Id`),
  KEY `User_Type_Id` (`User_Type_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;



CREATE TABLE IF NOT EXISTS `user_type` (
  `User_Type_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Description` varchar(50) NOT NULL,
  PRIMARY KEY (`User_Type_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`User_Type_Id`, `User_Description`) VALUES
(1, 'Student'),
(2, 'Staff'),
(3, 'Instructor'),
(4, 'Faculty'),
(5, 'Administrator');



CREATE TABLE IF NOT EXISTS `visitors` (
  `Visitor_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `TimeStart` time NOT NULL,
  `TimeEnd` time NOT NULL,
  `TimeOnStudio` varchar(20) NOT NULL,
  `Id_Status_Visitor` int(11) NOT NULL,
  PRIMARY KEY (`Visitor_Id`),
  KEY `User_Id` (`User_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `transition` (
  `transition_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) DEFAULT NULL,
  `GroupId` int(11) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `Start_End` date DEFAULT NULL,
  `Time_Transaction` time DEFAULT NULL,
  `Item_Id` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Transaction_Status_Id` int(11) DEFAULT NULL,
  `Stuff_Confirmation_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`transition_Id`),
  KEY `User_Id` (`User_Id`),
  KEY `Item_Id` (`Item_Id`),
  KEY `Transaction_Status_Id` (`Transaction_Status_Id`),
  KEY `GroupId` (`GroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `MemberShips` (
  `MemberShips_Id` int(11) NOT NULL AUTO_INCREMENT,
  `GroupId` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  PRIMARY KEY (`MemberShips_Id`),
  KEY `fk_MemberShips_Groups1_idx` (`GroupId`),
  KEY `fk_MemberShips_users1_idx` (`User_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `GroupId` int(11) DEFAULT NULL,
  `Item_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Days` int(11) NOT NULL,
  `Cart_Status_Id` int(11) NOT NULL,
  `pickUP_Date` date DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  PRIMARY KEY (`Cart_Id`),
  KEY `fk_cart` (`Item_Id`),
  KEY `fk_cart_1` (`User_Id`),
  KEY `Cart_Status_Id` (`Cart_Status_Id`),
  KEY `GroupId` (`GroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
