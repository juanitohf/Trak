-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2014 at 03:18 PM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `juanhf_Trak`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `GroupId` int(11) DEFAULT NULL,
  `Item_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Days` int(11) NOT NULL,
  `Cart_Status_Id` int(11) NOT NULL,
  `ConfirmInstructor_Date` date DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  PRIMARY KEY (`Cart_Id`),
  KEY `fk_cart` (`Item_Id`),
  KEY `fk_cart_1` (`User_Id`),
  KEY `Cart_Status_Id` (`Cart_Status_Id`),
  KEY `GroupId` (`GroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Cart_Status`
--

CREATE TABLE IF NOT EXISTS `Cart_Status` (
  `Cart_Status_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Description_Status_Cart` varchar(50) NOT NULL,
  PRIMARY KEY (`Cart_Status_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `Category_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Description` varchar(100) NOT NULL,
  PRIMARY KEY (`Category_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_Id`, `Category_Description`) VALUES
(0, '--- None ---'),
(1, 'Earth and Space'),
(2, 'Environments'),
(3, 'Physics of Sound'),
(4, 'Physics'),
(5, 'Chemistry'),
(6, 'New Category1'),
(7, 'Electronic'),
(9, 'New Category');

-- --------------------------------------------------------

--
-- Table structure for table `grants`
--

CREATE TABLE IF NOT EXISTS `grants` (
  `Grant_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Grant_name` varchar(100) NOT NULL,
  `Grant_email` varchar(100) NOT NULL,
  `Grant_phone` char(12) NOT NULL,
  PRIMARY KEY (`Grant_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `grants`
--

INSERT INTO `grants` (`Grant_Id`, `Grant_name`, `Grant_email`, `Grant_phone`) VALUES
(0, '- - None - -', '', ''),
(1, 'Grant 1', 'grant@gmailGrant.com', '2155191520');

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE IF NOT EXISTS `Groups` (
  `GroupId` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Description` varchar(100) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`GroupId`, `Group_Description`, `Start_Date`, `End_Date`) VALUES
(1, 'Juan Group', '2014-07-17', '2014-12-17'),
(2, 'Group2', '2014-03-06', '2014-10-08'),
(3, 'Juan_Group2', '2014-06-29', '2014-07-09'),
(4, 'Gryp_juan2', '2014-06-29', '2014-06-29'),
(5, 'new Group', '2014-07-16', '2014-12-15'),
(6, 'TestingGroup', '2014-07-27', '2014-09-18'),
(7, 'newGroupddddd', '2014-08-24', '2014-08-19'),
(8, 'kuku', '2014-08-27', '2014-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

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
  `Grp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Item_Id`),
  UNIQUE KEY `Reference` (`Reference`),
  KEY `fk_items` (`ItemType_Id`),
  KEY `fk_items_1` (`Subcategory_id`),
  KEY `fk_items_2` (`Category_Id`),
  KEY `fk_items_3` (`Grant_Id`),
  KEY `Vendor_Id` (`Vendor_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 DELAY_KEY_WRITE=1 AUTO_INCREMENT=699 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_Id`, `Item_description`, `Reference`, `Imagen`, `Initial_Quantity`, `Stock_Quantity`, `Lessons_item`, `Date`, `Expiration_date`, `Price`, `Grant_Id`, `Vendor_Id`, `Category_Id`, `Subcategory_id`, `ItemType_Id`, `Building`, `Cabine`, `Room`, `Department`, `Location_Description`, `Grp`) VALUES
(1, 'Black Strap', 'Item_101', 'Item_101.png', 4, 1, 'Electricity,Physics of Sound,Craft work,Chemical Reactions', '0000-00-00', '0000-00-00', '0.00', 0, 0, 1, 1, 1, 'Barton Hall', '1', '', '', '', 1),
(2, 'Flashlight w/o battery (black color)', 'Item_102', 'Item_102.png', 3, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '1', '', '', '', 1),
(3, 'Flashlight w/o battery (blue color)', 'Item_103', 'Item_103.png', 3, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '1', '', '', '', 1),
(4, 'Yellow Polycotton Fabric', 'Item_104', 'Item_104.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '1', '', '', '', 1),
(5, 'Rod Set', 'Item_105', 'Item_105.png', 8, 7, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '1', '', '', '', 1),
(6, 'Red Clay', 'Item_106', 'Item_106.png', 1, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '1', '', '', '', 1),
(7, 'Moon Tray', 'Item_107', 'Item_107.png', 7, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 1, 'Barton Hall', '2', '', '', '', 1),
(8, 'Tone Generator', 'Item_108', 'Item_108.png', 4, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(9, 'Kalimba Sticks (5pack)', 'Item_109', 'Item_109.png', 24, 24, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(10, 'Tuning Forks', 'Item_110', 'Item_110.png', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(11, 'Wooden Sticks', 'Item_111', 'Item_111.png', 8, 7, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(12, 'String w/ Wooden Cylinder', 'Item_112', 'Item_112.png', 1, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(13, 'Large Wooden Blocks', 'Item_113', 'Item_113.png', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(14, 'Small Wooden Blocks (for Kalimba)', 'Item_114', 'Item_114.png', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(15, 'Small Globe', 'Item_115', 'Item_115.png', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(16, 'Yellow Foam Blocks (for flash lights holder)', 'Item_116', 'Item_116.png', 3, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(17, 'Gray Foam Blocks', 'Item_117', 'Item_117.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(18, 'Small Styrofoam Ball', 'Item_118', 'Item_118.png', 21, 21, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(19, 'Small Half Black Styrofoam Ball', 'Item_119', 'Item_119.png', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(20, 'White Medium Styrofoam Ball', 'Item_120', 'Item_120.png', 35, 37, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(21, 'Blow Up Globe', 'Item_121', 'Item_121.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '2', '', '', '', 1),
(22, 'Test Object Kit', 'Item_122', 'Item_122.png', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '16', '', '', '', 1),
(23, 'Physics Kit Holder', 'Item_123', 'Item_123.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(24, 'Cell Holder', 'Item_124', 'Item_124.png', 36, 36, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '3', '', '', '', 1),
(25, 'Set Of Magnetic', 'Item_125', 'Item_125.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(26, 'Chem Kit Holder', 'Item_126', 'Item_126.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(27, 'Atomic Sheets', 'Item_127', 'Item_127.png', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(28, 'Well Tray', 'Item_128', 'Item_128.png', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(29, 'NaHCO3 Vial', 'Item_129', 'Item_129.png', 31, 31, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(30, 'Vial Holder', 'Item_130', 'Item_130.png', 15, 14, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(31, 'Flex Tubing 10cm', 'Item_131', 'Item_131.png', 79, 79, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(32, 'Flex Tubing 45 cm', 'Item_132', 'Item_132.png', 56, 56, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(33, 'Recording Dot Stickers', 'Item_133', 'Item_133.png', 1000, 1000, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(34, 'Pipe 7.5cm', 'Item_134', 'Item_134.png', 14, 14, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(35, 'stopper w/ 2 pipes', 'Item_135', 'Item_135.png', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '4', '', '', '', 1),
(36, 'black foam sheet', 'Item_136', 'Item_136.png', 16, 16, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '6', '', '', '', 1),
(37, 'blue foam sheet', 'Item_137', 'Item_137.png', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '6', '', '', '', 1),
(38, 'Earthquake take', 'Item_138', 'Item_138.png', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '6', '', '', '', 1),
(39, 'plant food', 'Item_139', 'Item_139.png', 17, 17, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '7', '', '', '', 1),
(40, 'fertilizer', 'Item_140', 'Item_140.png', 0, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(41, 'nutrient powder', 'Item_141', 'Item_141.png', 0, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(42, 'rye seed', 'Item_142', 'Item_142.png', 45, 45, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '8', '', '', '', 1),
(43, 'fiber glass screen', 'Item_143', 'Item_143.png', 220, 220, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C', '', '', '', 1),
(44, 'Planter rings 34 pack', 'Item_144', 'Item_144.png', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '9', '', '', '', 1),
(45, 'Planter Label (Large T)', 'Item_145', 'Item_145.png', 25, 25, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '9', '', '', '', 1),
(46, 'Planter Label', 'Item_146', 'Item_146.png', 180, 180, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '9', '', '', '', 1),
(47, 'Bulb Holder', 'Item_147', 'Item_147.png', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '11', '', '', '', 1),
(48, 'Flashlight Bulb', 'Item_148', 'Item_148.png', 33, 33, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '11', '', '', '', 1),
(49, 'Sprinkler Heads', 'Item_149', 'Item_149.png', 24, 24, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '12', '', '', '', 1),
(50, 'Tweezers', 'Item_150', 'Item_150.png', 98, 98, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '13', '', '', '', 1),
(51, 'Wooden Mallet', 'Item_151', 'Item_151.png', 14, 14, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '14', '', '', '', 1),
(52, 'Velcro Spool', 'Item_152', 'Item_152.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '15', '', '', '', 1),
(53, 'Velcro Strips', 'Item_153', 'Item_153.png', 0, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '15', '', '', '', 1),
(54, 'Velcro Fasteners', 'Item_154', 'Item_154.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '15', '', '', '', 1),
(55, 'White Porcelain Streak Plate', 'Item_155', 'Item_155.png', 60, 60, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '16', '', '', '', 1),
(56, 'Black Porcelain Streak Plate', 'Item_156', 'Item_156.png', 60, 60, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '16', '', '', '', 1),
(57, 'Shiny Nails (3)', 'Item_157', 'Item_157.png', 31, 31, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '16', '', '', '', 1),
(58, 'Sidewalk Chalk', 'Item_158', 'Item_158.png', 87, 87, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '17', '', '', '', 1),
(59, 'Crayola Chalk', 'Item_159', 'Item_159.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '17', '', '', '', 1),
(60, 'Red Kidney Beans', 'Item_160', 'Item_160.png', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '19', '', '', '', 1),
(61, 'Lima Beans', 'Item_161', 'Item_161.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(62, 'Bush Beans', 'Item_162', 'Item_162.png', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '20', '', '', '', 1),
(63, 'Plastic Propeller', 'Item_163', 'Item_163.png', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '21', '', '', '', 1),
(64, 'Electric Motor', 'Item_164', 'Item_164.png', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '22', '', '', '', 1),
(65, 'Whiffle Balls', 'Item_165', 'Item_165.png', 18, 18, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(66, 'Steel Strips for Telegraph', 'Item_166', 'Item_166.png', 39, 39, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '23', '', '', '', 1),
(67, 'Medicine Dropper', 'Item_167', 'Item_167.png', 25, 25, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '24', '', '', '', 1),
(68, 'Baster', 'Item_168', 'Item_168.png', 7, 7, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '24', '', '', '', 1),
(69, 'Field Corn Seed', 'Item_169', 'Item_169.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '25', '', '', '', 1),
(70, 'Barley', 'Item_170', 'Item_170.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '26', '', '', '', 1),
(71, 'Dried Honey Bees', 'Item_171', 'Item_171.png', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '27', '', '', '', 1),
(72, 'Magnet Bar', 'Item_172', 'Item_172.png', 48, 48, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '28', '', '', '', 1),
(73, 'Cord 1m', 'Item_173', 'Item_173.png', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '29', '', '', '', 1),
(74, 'Magnet ring', 'Item_174', 'Item_174.png', 33, 33, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '28', '', '', '', 1),
(75, 'magnet square', 'Item_175', 'Item_175.png', 53, 53, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '28', '', '', '', 1),
(76, 'rope long', 'Item_176', 'Item_176.png', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '29', '', '', '', 1),
(77, 'rope short', 'Item_177', 'Item_177.png', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '29', '', '', '', 1),
(78, 'thread ball (big)', 'Item_178', 'Item_178.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '29', '', '', '', 1),
(79, 'thread ball (small)', 'Item_179', 'Item_179.png', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '29', '', '', '', 1),
(80, 'thread cylinder', 'Item_180', 'Item_180.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '29', '', '', '', 1),
(81, 'thread spool', 'Item_181', 'Item_181.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '29', '', '', '', 1),
(82, 'dried cat food package', 'Item_182', 'Item_182.png', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '32', '', '', '', 1),
(83, 'Yellow Green Leaf Seeds ', 'Item_183', 'Item_183.png', 200, 200, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '26', '', '', '', 1),
(84, 'golf tees', 'Item_184', 'Item_184.png', 40, 40, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '32', '', '', '', 1),
(85, 'hydroponic planet holder', 'Item_185', 'Item_185.png', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '32', '', '', '', 1),
(86, 'rivets w/rubber washers', 'Item_186', 'Item_186.png', 30, 30, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '30', '', '', '', 1),
(87, 'stethoscopes', 'Item_187', 'Item_187.png', 18, 18, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '34', '', '', '', 1),
(88, 'test tube cleaners', 'Item_188', 'Item_188.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '31', '', '', '', 1),
(89, 'washers large', 'Item_189', 'Item_189.png', 220, 220, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '35', '', '', '', 1),
(90, 'xylophone set', 'Item_190', 'Item_190.png', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '33', '', '', '', 1),
(91, '150 ml flask', 'Item_191', 'Item_191.png', 0, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(92, '500 ml volumetric flasks', 'Item_192', 'Item_192.png', 0, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(93, 'alfalfa seed packs', 'Item_193', 'Item_193.png', 18, 18, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '42', '', '', '', 1),
(94, 'balloon pump', 'Item_194', 'Item_194.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '48', '', '', '', 1),
(95, 'basalt (Labeled 8)', 'Item_195', 'Item_195.png', 62, 62, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '37', '', '', '', 1),
(96, 'biotite (Labeled R)', 'Item_196', 'Item_196.png', 21, 21, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '54', '', '', '', 1),
(97, 'black balloon pack', 'Item_197', 'Item_197.png', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(98, 'calcite (Labeled D)', 'Item_198', 'Item_198.png', 46, 46, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '52', '', '', '', 1),
(99, 'coffee filters', 'Item_199', 'Item_199.png', 1500, 1500, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '39', '', '', '', 1),
(100, 'conglomerate (Labeled 3)', 'Item_200', 'Item_200.png', 60, 60, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '36', '', '', '', 1),
(101, 'copper sulfate squares', 'Item_201', 'Item_201.png', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '44', '', '', '', 1),
(102, 'feldspar (Labeled A)', 'Item_202', 'Item_202.png', 48, 48, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '52', '', '', '', 1),
(103, 'filter paper pack', 'Item_203', 'Item_203.png', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '47', '', '', '', 1),
(104, 'fluorite (Labeled E)', 'Item_204', 'Item_204.png', 47, 47, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '52', '', '', '', 1),
(105, 'galena (Labeled C)', 'Item_205', 'Item_205.png', 50, 50, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '52', '', '', '', 1),
(106, 'Gneiss (Labeled 2)', 'Item_206', 'Item_206.png', 65, 65, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '36', '', '', '', 1),
(107, 'Granite (Labeled 1)', 'Item_207', 'Item_207.png', 62, 62, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '36', '', '', '', 1),
(108, 'Graphite (Labeled F)', 'Item_208', 'Item_208.png', 47, 47, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '52', '', '', '', 1),
(109, 'Gypsum (Labeled H)', 'Item_209', 'Item_209.png', 47, 47, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '53', '', '', '', 1),
(110, 'Gypsum (Labeled O)', 'Item_210', 'Item_210.png', 49, 49, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '54', '', '', '', 1),
(111, 'Gypsum (Labeled S)', 'Item_211', 'Item_211.png', 50, 50, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '54', '', '', '', 1),
(112, 'Half Pot Set', 'Item_212', 'Item_212.png', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '43', '', '', '', 1),
(113, 'Halite (Labeled M)', 'Item_213', 'Item_213.png', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '54', '', '', '', 1),
(114, 'Hematite (Labeled G)', 'Item_214', 'Item_214.png', 46, 46, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '53', '', '', '', 1),
(115, 'Hematite (Labeled Q)', 'Item_215', 'Item_215.png', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '54', '', '', '', 1),
(116, 'Instant Yeast', 'Item_216', 'Item_216.png', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '40', '', '', '', 1),
(117, 'Limestone (Labeled 4)', 'Item_217', 'Item_217.png', 57, 57, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '36', '', '', '', 1),
(118, 'Magnet on a Post', 'Item_218', 'Item_218.png', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '45', '', '', '', 1),
(119, 'Magnetite (Labeled I)', 'Item_219', 'Item_219.png', 49, 49, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '53', '', '', '', 1),
(120, 'Marble (Labeled 11)', 'Item_220', 'Item_220.png', 76, 76, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '38', '', '', '', 1),
(121, 'Microscopic slide', 'Item_221', 'Item_221.png', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '47', '', '', '', 1),
(122, 'Microscope slide cover slip', 'Item_222', 'Item_222.png', 300, 300, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '47', '', '', '', 1),
(123, 'Muscovite (Labeled J)', 'Item_223', 'Item_223.png', 45, 45, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '53', '', '', '', 1),
(124, 'Mustard Seed (Large)', 'Item_224', 'Item_224.png', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '41', '', '', '', 1),
(125, 'Mustard Seed (Small)', 'Item_225', 'Item_225.png', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '41', '', '', '', 1),
(126, 'Obsidian (Labeled 7)', 'Item_226', 'Item_226.png', 78, 78, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '37', '', '', '', 1),
(127, 'Balloons', 'Item_227', 'Item_227.png', 70, 70, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '48', '', '', '', 1),
(128, 'Pumice (Labeled 9)', 'Item_228', 'Item_228.png', 60, 60, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '38', '', '', '', 1),
(129, 'Quartz (Labeled B)', 'Item_229', 'Item_229.png', 42, 42, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '52', '', '', '', 1),
(130, 'Quartz (Labeled P)', 'Item_230', 'Item_230.png', 18, 18, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '54', '', '', '', 1),
(131, 'Red and yellow wire spools', 'Item_231', 'Item_231.png', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '51', '', '', '', 1),
(132, 'Yarn 30cm ', 'Item_232', 'Item_232.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '29', '', '', '', 1),
(133, 'Tuning Fork Set', 'Item_233', 'Item_233.png', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '49', '', '', '', 1),
(134, 'Sandstone (Labeled 6)', 'Item_234', 'Item_234.png', 62, 62, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '37', '', '', '', 1),
(135, 'Pre-made rock bags (with rocks P,Q,R)', 'Item_235', 'Item_235.png', 14, 14, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '55', '', '', '', 1),
(136, 'schist (Labeled 12)', 'Item_236', 'Item_236.png', 61, 61, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '38', '', '', '', 1),
(137, 'shale (Labeled 5)', 'Item_237', 'Item_237.png', 63, 63, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '37', '', '', '', 1),
(138, 'slate (Labeled 10)', 'Item_238', 'Item_238.png', 61, 61, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '38', '', '', '', 1),
(139, 'sponge', 'Item_239', 'Item_239.png', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '50', '', '', '', 1),
(140, 'Sulfur (Labeled K) (Warning)', 'Item_240', 'Item_240.png', 48, 48, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '53', '', '', '', 1),
(141, 'Talc (Labeled L)', 'Item_241', 'Item_241.png', 47, 47, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '53', '', '', '', 1),
(142, 'Telegraph Line Set', 'Item_242', 'Item_242.png', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '46', '', '', '', 1),
(143, 'Tuning Fork 512C', 'Item_243', 'Item_243.png', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '49', '', '', '', 1),
(144, 'Tuning Fork 640C', 'Item_244', 'Item_244.png', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '49', '', '', '', 1),
(145, 'Tuning Fork 256C', 'Item_245', 'Item_245.png', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '49', '', '', '', 1),
(146, 'Miscroscope Cover Glass ', 'Item_246', 'Item_246.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '27', '', '', '', 1),
(147, 'Water Mats ', 'Item_247', 'Item_247.png', 18, 18, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '44', '', '', '', 1),
(148, 'Wicks ', 'Item_248', 'Item_248.png', 720, 720, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '44', '', '', '', 1),
(149, 'Volumetric Flasks', 'Item_249', 'Item_249.png', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '40', '', '', '', 1),
(150, 'Red and yellow pre-cut wire pieces', 'Item_250', '', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '51', '', '', '', 1),
(151, 'Fishing wire ', 'Item_251', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '51', '', '', '', 1),
(152, 'Crayons (6pk)', 'Item_252', '', 24, 24, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '58', '', '', '', 1),
(153, 'Crayons (24pk)', 'Item_253', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '58', '', '', '', 1),
(154, 'Crayons (64pk)', 'Item_254', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '58', '', '', '', 1),
(155, 'Washable markers', 'Item_255', '', 250, 250, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '59', '', '', '', 1),
(156, 'Thermometers', 'Item_256', '', 117, 117, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '61', '', '', '', 1),
(157, 'Rubber bands (regular)', 'Item_257', '', 200, 200, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '63', '', '', '', 1),
(158, 'Rubber bands (jumbo - 7in)', 'Item_258', '', 55, 55, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '63', '', '', '', 1),
(159, 'Measuring tape (100cm)', 'Item_259', '', 93, 93, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '62', '', '', '', 1),
(160, 'Plastic drinking straws', 'Item_260', '', 500, 500, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '64', '', '', '', 1),
(161, 'Jumbo plastic drinking straws', 'Item_261', '', 50, 50, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '64', '', '', '', 1),
(162, 'Flexible plastic drinking straws', 'Item_262', '', 300, 300, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '64', '', '', '', 1),
(163, 'Flashlight with bulb', 'Item_263', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '65', '', '', '', 1),
(164, 'Flashlight without bulb', 'Item_264', '', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '65', '', '', '', 1),
(165, 'Small pen flashlight', 'Item_265', '', 25, 25, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '65', '', '', '', 1),
(166, 'Glue ', 'Item_266', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '66', '', '', '', 1),
(167, 'Glue sticks', 'Item_267', '', 38, 38, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '66', '', '', '', 1),
(168, 'Perment markers', 'Item_268', '', 55, 55, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '67', '', '', '', 1),
(169, 'Dry erase markers ', 'Item_269', '', 120, 120, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '67, M1', 'Store Room, Middle Room', '', '', 1),
(170, 'Stopwatch', 'Item_270', '', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '69', '', '', '', 1),
(171, 'Scotch tape', 'Item_271', '', 50, 50, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '68', '', '', '', 1),
(172, 'Plastic droppers', 'Item_272', '', 96, 96, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '70', '', '', '', 1),
(173, 'Measuring cups (1-25ml)', 'Item_273', '', 19, 19, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '71', '', '', '', 1),
(174, 'Measuring spoons (0.5 ml)', 'Item_274', '', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '71', '', '', '', 1),
(175, 'Measuring spoons (2ml)', 'Item_275', '', 24, 24, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '71', '', '', '', 1),
(176, 'Measuring spoons (5ml)', 'Item_276', '', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '71', '', '', '', 1),
(177, 'Q-tips', 'Item_277', '', 1200, 1200, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '72', '', '', '', 1),
(178, 'Popsickle sticks (large)', 'Item_278', '', 300, 300, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '73', '', '', '', 1),
(179, 'Skewers', 'Item_279', '', 220, 220, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '73', '', '', '', 1),
(180, 'Ice pack', 'Item_280', '', 25, 25, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '74', '', '', '', 1),
(181, 'Rubber stoppers (large)', 'Item_281', '', 38, 38, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '75', '', '', '', 1),
(182, 'Rubber stoppers (medium)', 'Item_282', '', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '75', '', '', '', 1),
(183, 'Rubber stoppers (small)', 'Item_283', '', 42, 42, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '75', '', '', '', 1),
(184, 'Wooden stoppers', 'Item_284', '', 59, 59, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '75', '', '', '', 1),
(185, 'Magnifying glass', 'Item_285', '', 340, 340, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '76', '', '', '', 1),
(186, 'Syringe (60ml)', 'Item_286', '', 52, 52, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '77', '', '', '', 1),
(187, 'Syringe (35ml)', 'Item_287', '', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '77', '', '', '', 1),
(188, 'Syringe (20ml)', 'Item_288', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '77', '', '', '', 1),
(189, 'Graduated cylinder', 'Item_289', '', 61, 61, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '78', '', '', '', 1),
(190, 'Erlenmeyer flask (500ml)', 'Item_290', '', 14, 14, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '79', '', '', '', 1),
(191, 'Erlenmeyer flask (300ml)', 'Item_291', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '79', '', '', '', 1),
(192, 'Erlenmeyer flask (200ml)', 'Item_292', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '79', '', '', '', 1),
(193, 'Plastic tube', 'Item_293', '', 16, 16, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '80', '', '', '', 1),
(194, 'Clear capped plastic bottle (2oz)', 'Item_294', '', 18, 18, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '80', '', '', '', 1),
(195, 'Clear pump plastic bottle (2oz)', 'Item_295', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '80', '', '', '', 1),
(196, 'Clear squeeze plastic bottle (2oz)', 'Item_296', '', 7, 7, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '80', '', '', '', 1),
(197, 'Round bottom flask ', 'Item_297', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '80', '', '', '', 1),
(198, 'Colored pencil (12 pack)', 'Item_298', '', 16, 16, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '81', '', '', '', 1),
(199, 'Colored pencil (15 pack)', 'Item_299', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '81', '', '', '', 1),
(200, 'Wooden pencil', 'Item_300', '', 75, 75, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '81', '', '', '', 1),
(201, 'Black china markers', 'Item_301', '', 24, 24, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '81', '', '', '', 1),
(202, ' 12inch ruler (plastic)', 'Item_302', '', 132, 132, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '82', '', '', '', 1),
(203, '12inch ruler (wooden)', 'Item_303', '', 46, 46, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '82', '', '', '', 1),
(204, 'Protractor', 'Item_304', '', 21, 21, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '82', '', '', '', 1),
(205, 'Masking tape', 'Item_305', '', 13, 13, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '83', '', '', '', 1),
(206, 'Duck tape', 'Item_306', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '83', '', '', '', 1),
(207, 'Packaging tape', 'Item_307', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '83', '', '', '', 1),
(208, 'Electrical tape', 'Item_308', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '83', '', '', '', 1),
(209, 'Scientific calculator', 'Item_309', '', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '84', '', '', '', 1),
(210, 'Magnetic compass', 'Item_310', '', 32, 32, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '85', '', '', '', 1),
(211, 'Math compass', 'Item_311', '', 26, 26, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '85', '', '', '', 1),
(212, 'Plastic spoon', 'Item_312', '', 45, 45, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '86', '', '', '', 1),
(213, 'Cotton balls', 'Item_313', '', 250, 250, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '87', '', '', '', 1),
(214, 'Popsickle sticks ', 'Item_314', '', 1250, 1250, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '88', '', '', '', 1),
(215, 'Popsickle stick squares (2cm)', 'Item_315', '', 140, 140, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '88', '', '', '', 1),
(216, 'D-batteries', 'Item_316', '', 113, 113, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '89', '', '', '', 1),
(217, '9V batteries', 'Item_317', '', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '89', '', '', '', 1),
(218, 'PH strips', 'Item_318', '', 34, 34, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '90', '', '', '', 1),
(219, 'Toothpicks', 'Item_319', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '91', '', '', '', 1),
(220, 'Ace brand hot and cold compress', 'Item_320', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '92', '', '', '', 1),
(221, 'Ace brand cold compress', 'Item_321', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '92', '', '', '', 1),
(222, 'Clear  plastic bottle (5oz)', 'Item_322', '', 18, 18, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '93', '', '', '', 1),
(223, 'Clear plastic bottle dropper ', 'Item_323', '', 32, 32, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '93', '', '', '', 1),
(224, 'Graduated cylinder base', 'Item_324', '', 55, 55, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '94', '', '', '', 1),
(225, 'Glass beaker (250ml)', 'Item_325', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '95', '', '', '', 1),
(226, 'Glass beaker (150ml)', 'Item_326', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '95', '', '', '', 1),
(227, 'Glass beaker (100ml)', 'Item_327', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '95', '', '', '', 1),
(228, 'Glass beaker (50ml)', 'Item_328', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '95', '', '', '', 1),
(229, 'Glass stirring rods', 'Item_329', '', 60, 60, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '95', '', '', '', 1),
(230, 'Plastic beaker (1000ml)', 'Item_330', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '96', '', '', '', 1),
(231, 'Plastic beaker (800ml)', 'Item_331', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '96', '', '', '', 1),
(232, 'Plastic beaker (250ml)', 'Item_332', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '96', '', '', '', 1),
(233, 'Foam mountain set ', 'Item_333', '', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '97', '', '', '', 1),
(234, 'Cardboard paper towel roll', 'Item_334', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '98', '', '', '', 1),
(235, 'Cardboard toilet paper roll', 'Item_335', '', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '98', '', '', '', 1),
(236, 'Paper cup (6-9oz)', 'Item_336', '', 800, 800, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '98', '', '', '', 1),
(237, 'Paper cup (3oz)', 'Item_337', '', 150, 150, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '98', '', '', '', 1),
(238, 'Paper cup (1oz)', 'Item_338', '', 200, 200, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '98', '', '', '', 1),
(239, 'Styrofoam cup (6-9oz)', 'Item_339', '', 160, 160, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '98', '', '', '', 1),
(240, 'Clear plastic cup (6-9oz)', 'Item_340', '', 220, 220, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '98', '', '', '', 1),
(241, 'Pre-cut 2L bottle', 'Item_341', '', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '99', '', '', '', 1),
(242, 'Empty soda can (12oz)', 'Item_342', '', 7, 7, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '99', '', '', '', 1),
(243, 'Empty plastic bottle (2L)', 'Item_343', '', 19, 19, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '100', '', '', '', 1),
(244, 'Empty plastic bottle (16-20oz)', 'Item_344', '', 11, 11, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '100', '', '', '', 1),
(245, 'Empty glass bottle (16-18oz)', 'Item_345', '', 35, 35, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '101', '', '', '', 1),
(246, 'Empty glass bottle (12oz)', 'Item_346', '', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '101', '', '', '', 1),
(247, 'Styrofoam quad planters ', 'Item_347', '', 200, 200, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '102', '', '', '', 1),
(248, 'Egg carton', 'Item_348', '', 38, 38, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '103', '', '', '', 1),
(249, 'Mini dry erase board', 'Item_349', '', 39, 39, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '104', '', '', '', 1),
(250, 'Gravel ', 'Item_350', '', 36, 36, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '105, 106', '', '', '', 1),
(251, 'Flipper set', 'Item_351', '', 16, 16, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '107', '', '', '', 1),
(252, 'Ring stand', 'Item_352', '', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '108', '', '', '', 1),
(253, 'Sand', 'Item_353', '', 13, 13, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '109', '', '', '', 1),
(254, 'Sand and dirt mixed', 'Item_354', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '111', '', '', '', 1),
(255, 'Jump ropes', 'Item_355', '', 30, 30, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '17A', '', '', '', 1),
(256, 'Bungee cord', 'Item_356', '', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '17B', '', '', '', 1),
(257, 'Putty knife (4inch)', 'Item_357', '', 64, 64, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '17C', '', '', '', 1),
(258, 'Borax', 'Item_358', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(259, 'Baking soda ', 'Item_359', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(260, 'Epsom salt', 'Item_360', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(261, 'Flour', 'Item_361', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(262, 'Sugar', 'Item_362', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(263, 'Salt', 'Item_363', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(264, 'Corn starch', 'Item_364', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(265, 'Kosher salt', 'Item_365', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(266, 'Baking powder', 'Item_366', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(267, 'Crab paste', 'Item_367', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '121', '', '', '', 1),
(268, 'Bromothymol Blue 0.04%', 'Item_368', '', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(269, 'Methylene Blue 0.1%', 'Item_369', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(270, 'Methylene Blue 0.5%', 'Item_370', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(271, 'Bromothymol Blue Indicator 0.04%', 'Item_371', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(272, 'RIT red liquid dye', 'Item_372', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(273, 'RIT black liquid dye', 'Item_373', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(274, 'Food color (4 colors per pack)', 'Item_374', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(275, 'Red litmus paper', 'Item_375', '', 75, 75, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(276, 'Blue litmus paper', 'Item_376', '', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(277, 'Hydrochloric acid ', 'Item_377', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(278, 'Sodium sulfite calibration solution', 'Item_378', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(279, 'Potassium chloride filling solution', 'Item_379', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(280, 'pH Buffer Capsules ', 'Item_380', '', 7, 7, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(281, 'pH Color Key Buffer Preservative', 'Item_381', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(282, 'Orion application solution - pH 5 buffer', 'Item_382', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(283, 'Hydrogen peroxide ', 'Item_383', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(284, 'Rubbing alcohol ', 'Item_384', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(285, 'pH sensor storage solution', 'Item_385', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(286, 'Immersion oil', 'Item_386', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(287, 'Vinegar', 'Item_387', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(288, 'Vegetable oil', 'Item_388', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(289, 'Liquid sweetner', 'Item_389', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(290, 'Antiseptic (Listerine)', 'Item_390', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(291, 'Upper cylinder lubricant/ injector cleaner', 'Item_391', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(292, 'Krazy glue', 'Item_392', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(293, 'Water gel', 'Item_393', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(294, 'Dish soap', 'Item_394', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '122', '', '', '', 1),
(295, 'Sodium hydroxide', 'Item_395', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(296, 'Sucrose', 'Item_396', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(297, 'Asprin ', 'Item_397', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(298, 'Ammonium chloride', 'Item_398', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(299, 'Magnesium chloride', 'Item_399', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(300, 'Potassium hydroxide ', 'Item_400', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(301, 'Ammonium acetate', 'Item_401', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(302, 'Calcium carbonate', 'Item_402', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(303, 'Cupric chloride', 'Item_403', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(304, 'Calcium hydroxide', 'Item_404', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(305, 'Sodium chloride', 'Item_405', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(306, 'Iron fillings coarse', 'Item_406', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(307, 'Hand cleaner', 'Item_407', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(308, 'Bismuth subsalicylate (Pepto-Bismol)', 'Item_408', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(309, 'Steel wool pads', 'Item_409', '', 25, 25, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(310, 'Copper wire', 'Item_410', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(311, 'Gulf Wax ', 'Item_411', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(312, 'Antacid Tablets (Alka-Seltzer) ', 'Item_412', '', 107, 107, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(313, 'Antacid Tablets (Tums)', 'Item_413', '', 192, 192, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(314, 'Lactase Enzyme Digestive Supplement (Dairy Relief) ', 'Item_414', '', 240, 240, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(315, 'Asprin ', 'Item_415', '', 50, 50, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(316, 'Mini bubbles ', 'Item_416', '', 17, 17, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(317, 'Aluminum coil', 'Item_417', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '123', '', '', '', 1),
(318, 'Sandpaper', 'Item_418', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '124', '', '', '', 1),
(319, 'Distilled water ', 'Item_419', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '124', '', '', '', 1),
(320, 'Bleach', 'Item_420', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '124', '', '', '', 1),
(321, 'Expo dry erase board cleaner', 'Item_421', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '124', '', '', '', 1),
(322, 'Pitchers ', 'Item_422', '', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '126', '', '', '', 1),
(323, 'Cardboard trays', 'Item_423', '', 150, 150, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '126', '', '', '', 1),
(324, 'Heat lamp lightbulb (250 watts)', 'Item_424', '', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '127', '', '', '', 1),
(325, 'Lightbulb (60 watts)', 'Item_425', '', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '127', '', '', '', 1),
(326, 'Flood lightbulb (15 watts)', 'Item_426', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '127', '', '', '', 1),
(327, 'Heat lamp ', 'Item_427', '', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '128,129', '', '', '', 1),
(328, 'Sprouting kit', 'Item_428', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '130', '', '', '', 1),
(329, 'Styrofoam cylinder', 'Item_429', '', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '130', '', '', '', 1),
(330, 'Electric kettle', 'Item_430', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '130', '', '', '', 1),
(331, 'Digital pocket scale', 'Item_431', '', 7, 7, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C8', '', '', '', 1),
(332, 'Tripod magnifier', 'Item_432', '', 28, 28, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C8', '', '', '', 1),
(333, 'CBL 2 (Texas Instrument)', 'Item_433', '', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C8', '', '', '', 1),
(334, 'Multimeter wires', 'Item_434', '', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C8', '', '', '', 1),
(335, 'Photogate (Vernier)', 'Item_435', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C8', '', '', '', 1),
(336, 'Slinky (small)', 'Item_436', '', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C9', '', '', '', 1),
(337, 'Slinky (large)', 'Item_437', '', 20, 20, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C9', '', '', '', 1),
(338, 'Ping pong balls', 'Item_438', '', 13, 13, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C9', '', '', '', 1),
(339, 'Balls (tennis ball size)', 'Item_439', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C9', '', '', '', 1);
INSERT INTO `items` (`Item_Id`, `Item_description`, `Reference`, `Imagen`, `Initial_Quantity`, `Stock_Quantity`, `Lessons_item`, `Date`, `Expiration_date`, `Price`, `Grant_Id`, `Vendor_Id`, `Category_Id`, `Subcategory_id`, `ItemType_Id`, `Building`, `Cabine`, `Room`, `Department`, `Location_Description`, `Grp`) VALUES
(340, 'Silly putty ', 'Item_440', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C9', '', '', '', 1),
(341, 'Spinners (Math)', 'Item_441', '', 115, 115, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C9', '', '', '', 1),
(342, 'Raisins', 'Item_442', '', 132, 132, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C9', '', '', '', 1),
(343, 'Balance beam', 'Item_443', '', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C10', '', '', '', 1),
(344, 'Balance beam shape weights', 'Item_444', '', 11, 11, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C10', '', '', '', 1),
(345, 'Photo cards', 'Item_445', '', 20, 20, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C10', '', '', '', 1),
(346, 'Toy cars/trucks', 'Item_446', '', 21, 21, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(347, 'Foam shapes', 'Item_447', '', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(348, 'Stickers', 'Item_448', '', 500, 500, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(349, 'Pompom balls', 'Item_449', '', 300, 300, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(350, 'Pipe cleaners', 'Item_450', '', 150, 150, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(351, 'Dice', 'Item_451', '', 143, 143, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(352, 'Play money', 'Item_452', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(353, 'Poker Chips', 'Item_453', '', 200, 200, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(354, 'Marbles', 'Item_454', '', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(355, 'Beads', 'Item_455', '', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C11', '', '', '', 1),
(356, 'Lego kit', 'Item_456', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C12', '', '', '', 1),
(357, 'K''nex kit', 'Item_457', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C12', '', '', '', 1),
(358, 'Lego blocks', 'Item_458', '', 300, 300, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C12', '', '', '', 1),
(359, 'Platform scale (small)', 'Item_459', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C13', '', '', '', 1),
(360, 'Platform scale (large)', 'Item_460', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C13', '', '', '', 1),
(361, 'Balance with steel masses', 'Item_461', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C13', '', '', '', 1),
(362, 'Origami kit', 'Item_462', '', 30, 30, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C13', '', '', '', 1),
(363, 'Geoboard', 'Item_463', '', 17, 17, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C13', '', '', '', 1),
(364, '24 Game Primer (Add/Sunstract)', 'Item_464', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C14', '', '', '', 1),
(365, '24 Game Primer (Multiple/Divide) ', 'Item_465', '', 480, 480, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C14', '', '', '', 1),
(366, '24 Game Primer (Double Digits)', 'Item_466', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C14', '', '', '', 1),
(367, '24 Game Primer (Factors/Multiplers)', 'Item_467', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C14', '', '', '', 1),
(368, '24 Game Primer (Single Digits)', 'Item_468', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C14', '', '', '', 1),
(369, '24 Game Primer (Variables - Single/Double Digits)', 'Item_469', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C14', '', '', '', 1),
(370, 'Algeblock sets', 'Item_470', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(371, 'Overhead calculator (TI-15)', 'Item_471', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(372, 'Base ten starter set', 'Item_472', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(373, 'Foam base ten set', 'Item_473', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(374, 'Bucket balance', 'Item_474', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(375, 'Pan balance', 'Item_475', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(376, 'Algebra balance', 'Item_476', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(377, 'Unit cubes ', 'Item_477', '', 3000, 3000, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(378, 'The Proofs of Pythagoras', 'Item_478', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(379, 'Pizza Fraction Fun', 'Item_479', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(380, 'Big money kit', 'Item_480', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(381, 'Bingo (Addition)', 'Item_481', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(382, 'Bingo (Subtraction)', 'Item_482', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(383, 'Bingo (Multiplication)', 'Item_483', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(384, 'Bingo (Numbers)', 'Item_484', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(385, 'Partner Games', 'Item_485', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(386, 'The Art and Science of Spirals', 'Item_486', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C15', '', '', '', 1),
(387, 'Stream tray', 'Item_487', '', 16, 16, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C5', '', '', '', 1),
(388, 'Bucket in black', 'Item_488', '', 36, 36, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C1', '', '', '', 1),
(389, 'Bucket in white', 'Item_489', '', 24, 24, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C4', '', '', '', 1),
(390, 'Funnel', 'Item_490', '', 20, 20, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C4', '', '', '', 1),
(391, 'Plastic Basin', 'Item_491', '', 29, 29, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C7', '', '', '', 1),
(392, 'Carbon Filters ', 'Item_492', '', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'A', '', '', '', 1),
(393, 'Aquarium Filtration System', 'Item_493', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'A', '', '', '', 1),
(394, 'Aquarium Heater', 'Item_494', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'A', '', '', '', 1),
(395, 'Aquarium Hand Net (3inch)', 'Item_495', '', 22, 22, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'B', '', '', '', 1),
(396, 'Aquarium Hand Net (5inch)', 'Item_496', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'B', '', '', '', 1),
(397, 'Water Conditioner', 'Item_497', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'B', '', '', '', 1),
(398, 'Goldfish Flakes', 'Item_498', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'B', '', '', '', 1),
(399, 'Brine Shrimp Eggs', 'Item_499', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C', '', '', '', 1),
(400, 'Bearing Balls (small)', 'Item_500', '', 650, 650, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C', '', '', '', 1),
(401, 'Bearing Balls (medium)', 'Item_501', '', 94, 94, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C', '', '', '', 1),
(402, 'Bearings Balls (large)', 'Item_502', '', 19, 19, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C', '', '', '', 1),
(403, 'Fiberglass Screens (4"x4")', 'Item_503', '', 220, 220, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C', '', '', '', 1),
(404, 'Oven Mit', 'Item_504', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'E', '', '', '', 1),
(405, 'Garden gloves', 'Item_505', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'E', '', '', '', 1),
(406, 'Paver Sand', 'Item_506', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'G', '', '', '', 1),
(407, 'Marine Sand', 'Item_507', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'G', '', '', '', 1),
(408, 'Clay', 'Item_508', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'H', '', '', '', 1),
(409, 'Dough (Crayola)', 'Item_509', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'H', '', '', '', 1),
(410, 'Plant Food', 'Item_510', '', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'H', '', '', '', 1),
(411, 'Standard Plant Seed', 'Item_511', '', 150, 150, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'H', '', '', '', 1),
(412, 'Rosette-Dwarf Plant Seed', 'Item_512', '', 200, 200, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'H', '', '', '', 1),
(413, 'AstroPlants Seed', 'Item_513', '', 50, 50, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'H', '', '', '', 1),
(414, 'Marigold Seeds', 'Item_514', '', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'H', '', '', '', 1),
(415, 'Potting Soil ', 'Item_515', '', 18, 18, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'H, I', '', '', '', 1),
(416, 'Cactus Soil', 'Item_516', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'I', '', '', '', 1),
(417, 'Bubble Wrap', 'Item_517', '', 175, 175, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'L', '', '', '', 1),
(418, 'Paper Towle Rolls', 'Item_518', '', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M', '', '', '', 1),
(419, 'Mess Mats', 'Item_519', '', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M', '', '', '', 1),
(420, 'Saftey Goggles (Adult)', 'Item_520', '', 107, 107, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'N', '', '', '', 1),
(421, 'Saftey Goggles (Child)', 'Item_521', '', 31, 31, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'N', '', '', '', 1),
(422, 'Saftey Glasses', 'Item_522', '', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'N', '', '', '', 1),
(423, 'Gallon Size (Ziploc) Bags', 'Item_523', '', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'O', '', '', '', 1),
(424, 'Quart Size (Ziploc) Bags', 'Item_524', '', 150, 150, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'O', '', '', '', 1),
(425, 'Sandwich Size (Ziploc) Bags', 'Item_525', '', 400, 400, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'O', '', '', '', 1),
(426, 'Garbage Bags', 'Item_526', '', 50, 50, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'O', '', '', '', 1),
(427, 'Aluminum Foil Roll (12" x 75'') ', 'Item_527', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'O', '', '', '', 1),
(428, 'Aluminum Foil Sheets (14"x10.5")', 'Item_528', '', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'O', '', '', '', 1),
(429, 'Wax Paper Roll  (12"x75'')', 'Item_529', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'O', '', '', '', 1),
(430, 'Plastic Wrap Roll (12"x200'')', 'Item_530', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'O', '', '', '', 1),
(431, ' Gloves (S)', 'Item_531', '', 2100, 2100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'S', '', '', '', 1),
(432, 'Gloves (M)', 'Item_532', '', 850, 850, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'S', '', '', '', 1),
(433, 'Gloves (L)', 'Item_533', '', 300, 300, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'S', '', '', '', 1),
(434, 'Gloves (XL)', 'Item_534', '', 260, 260, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'S', '', '', '', 1),
(435, 'Polyethylene Gloves (S)', 'Item_535', '', 1200, 1200, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'S', '', '', '', 1),
(436, 'Construction Paper (20"x18")', 'Item_536', '', 700, 700, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'T', '', '', '', 1),
(437, 'Patty (Origami) Paper (6"x6")', 'Item_537', '', 750, 750, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'T', '', '', '', 1),
(438, 'Patty (Origami) Paper (5.5"x5.5")', 'Item_538', '', 800, 800, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'T', '', '', '', 1),
(439, 'Chart Paper (26.5"x32")', 'Item_539', '', 300, 300, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'U', '', '', '', 1),
(440, 'Tabletop Easel Pad (20"x23")', 'Item_540', '', 100, 100, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'U', '', '', '', 1),
(441, 'Packing Peanuts', 'Item_541', '', 400, 400, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'V', '', '', '', 1),
(442, 'Dull Nails (3")', 'Item_542', '', 70, 70, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '16', '', '', '', 1),
(443, 'Shiny Nails (2")', 'Item_543', '', 20, 20, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '16', '', '', '', 1),
(444, 'Sealed Paper Clip Containers ', 'Item_544', '', 17, 17, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'V', '', '', '', 1),
(445, 'Wood meter ruler (1m)', 'Item_545', '', 17, 17, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '112C', '', '', '', 1),
(446, 'Wooden half-meter ruler (0.5m)', 'Item_546', '', 16, 16, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '112C', '', '', '', 1),
(447, 'Wooden Ramp (1m long)', 'Item_547', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '112C', '', '', '', 1),
(448, 'Microscope', 'Item_548', '', 18, 18, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '112A', '', '', '', 1),
(449, 'Straight Bore Buret', 'Item_549', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '112C', '', '', '', 1),
(450, 'Math/Physics Demo Tool Set', 'Item_550', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '112C', '', '', '', 1),
(451, 'Test Tube Rack w. 12 Tubes', 'Item_551', '', 24, 24, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '112C', '', '', '', 1),
(452, 'Hot Plate', 'Item_552', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '112B', '', '', '', 1),
(453, 'Extension Cord', 'Item_553', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '115', '', '', '', 1),
(454, 'Power Strip', 'Item_554', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '115', '', '', '', 1),
(455, 'Video Splitter', 'Item_555', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '116', '', '', '', 1),
(456, 'Styrofoam Cooler', 'Item_556', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '117', '', '', '', 1),
(457, 'Laptop Bags', 'Item_557', '', 80, 80, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '120', '', '', '', 1),
(458, 'Blank Tri-fold', 'Item_558', '', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '120', '', '', '', 1),
(459, 'Temperature probe', 'Item_559', '', 34, 34, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M6', 'Middle Room', '', '', 1),
(460, 'Temperature probe (Wide-Range)', 'Item_560', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M6', 'Middle Room', '', '', 1),
(461, 'Microphone (Vernier)', 'Item_561', '', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M6', 'Middle Room', '', '', 1),
(462, 'Electrode Support (Vernier)', 'Item_562', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(463, 'Blood Pressure Sensor', 'Item_563', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M6', 'Middle Room', '', '', 1),
(464, 'SpectroVis Optical Fiber', 'Item_564', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M6', 'Middle Room', '', '', 1),
(465, 'O2 gas sensor', 'Item_565', '', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M6', 'Middle Room', '', '', 1),
(466, 'Lab Quest (Vernier)', 'Item_566', '', 15, 15, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M6', 'Middle Room', '', '', 1),
(467, 'Lab Quest Charging Station ', 'Item_567', '', 3, 3, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M6', 'Middle Room', '', '', 1),
(468, 'Gas pressure sensor', 'Item_568', '', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(469, 'Tris-Compatible Flat pH Sensor', 'Item_569', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(470, 'Light sensor', 'Item_570', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(471, 'Conductivity Probe', 'Item_571', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(472, 'Dual-Range Froce Range', 'Item_572', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(473, 'Soil Moisture Sensor', 'Item_573', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(474, 'Motion Detector Clamp', 'Item_574', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(475, 'Digital Radiation Monitor', 'Item_575', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(476, 'CO2 gas sensor', 'Item_576', '', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(477, 'Dissolved oxygen probe', 'Item_577', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(478, 'Ammonium Ion-Selective Electrode', 'Item_578', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(479, 'Nitrate Ion-Selective Electrode', 'Item_579', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(480, 'Chloride Ion-Selective Electrode', 'Item_580', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(481, 'Calcium Ion-Selective Electrode', 'Item_581', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(482, 'SpectroVis Plus', 'Item_582', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M5', 'Middle Room', '', '', 1),
(483, 'Motion Detector (Vernier)', 'Item_583', '', 8, 8, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M4', 'Middle Room', '', '', 1),
(484, 'Motion Detector CBR2 (Texas Instruments)', 'Item_584', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M4', '', '', '', 1),
(485, 'Go!Link', 'Item_585', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M4', '', '', '', 1),
(486, 'Sound Level Meter', 'Item_586', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M4', '', '', '', 1),
(487, 'pH Sensor (Vernier)', 'Item_587', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M4', '', '', '', 1),
(488, 'UVA and UVB sensor', 'Item_588', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M4', '', '', '', 1),
(489, 'Rotatory Motion Accessory Kit', 'Item_589', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(490, 'Super Pulley Photogate Attachment (Vernier)', 'Item_590', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C8', '', '', '', 1),
(491, 'Poolcare DPD Test Kit', 'Item_591', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M4', '', '', '', 1),
(492, 'Highlighter', 'Item_592', '', 25, 25, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M1', '', '', '', 1),
(493, 'Construction paper (8.5x11in)', 'Item_593', '', 1000, 1000, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M4', '', '', '', 1),
(494, 'Manilla Folders', 'Item_594', '', 150, 150, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M7', '', '', '', 1),
(495, 'Name tags', 'Item_595', '', 0, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(496, 'Small post-it note (1 7/8 inches x 1 7/8 inches)', 'Item_596', '', 92, 92, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M1', '', '', '', 1),
(497, 'Medium post-it note (3 inches x 3 inches)', 'Item_597', '', 16, 16, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M1', '', '', '', 1),
(498, 'Big post-it note', 'Item_598', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M1', '', '', '', 1),
(499, 'Index Cards', 'Item_599', '', 3000, 3000, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M1', '', '', '', 1),
(500, 'Colored indexed card', 'Item_600', '', 1600, 1600, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M1', '', '', '', 1),
(501, 'Paper clips', 'Item_601', '', 300, 300, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M1', '', '', '', 1),
(502, 'Graphing paper', 'Item_602', '', 600, 600, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M3', '', '', '', 1),
(503, 'Correction Tape', 'Item_603', '', 6, 6, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M1', '', '', '', 1),
(504, 'Paper Fasteners', 'Item_604', '', 400, 400, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M1', '', '', '', 1),
(505, 'Hand Sanitizer (2oz)', 'Item_605', '', 16, 16, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M2', '', '', '', 1),
(506, 'Loose Leaf Ruled Paper (8x10.5in) ', 'Item_606', '', 2160, 2160, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M3', '', '', '', 1),
(507, 'Blank White Paper (8.5x11in)', 'Item_607', '', 1000, 1000, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M4', '', '', '', 1),
(508, 'Camera recorder (old model)', 'Item_608', '', 9, 9, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M7', '', '', '', 1),
(509, 'Camera recorder (new model)', 'Item_609', '', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M8', '', '', '', 1),
(510, 'Camera battery', 'Item_610', '', 41, 41, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M11', '', '', '', 1),
(511, 'Camera battery charger (old model)', 'Item_611', '', 7, 7, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(512, 'Camera battery charger (new model)', 'Item_612', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(513, 'Camera Chords', 'Item_613', '', 12, 12, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(514, 'Microphone (Wireless)', 'Item_614', '', 17, 17, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M7, F', '', '', '', 1),
(515, 'Tripod (long)', 'Item_615', '', 14, 14, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M7', '', '', '', 1),
(516, 'Tripod (short)', 'Item_616', '', 13, 13, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M7', '', '', '', 1),
(517, 'Hard drive (100GB)', 'Item_617', '', 0, 0, 'Electricity', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(518, 'Hard drive (500GB)', 'Item_618', '', 0, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(519, 'Hard drive (1TB)', 'Item_619', '', 0, 0, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', '', '', '', '', 1),
(520, 'Hard drive (2TB)', 'Item_620', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(521, 'Hard drive (3TB)', 'Item_621', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(522, 'Ipad Air', 'Item_622', '', 26, 26, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M12', '', '', '', 1),
(523, 'AAA battery', 'Item_623', '', 25, 25, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M11', '', '', '', 1),
(524, 'AA battery', 'Item_624', '', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M11', '', '', '', 1),
(525, 'battery tester', 'Item_625', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M11', '', '', '', 1),
(526, 'Projector', 'Item_626', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(527, 'Olymbus voice recorder', 'Item_627', '', 4, 4, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(528, 'Headphone', 'Item_628', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(529, 'AA/AAA Battery Charger (Holds 4 batteries)', 'Item_629', '', 5, 5, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(530, 'AA/AAA Battery Charger (Holds 12 batteries)', 'Item_630', '', 2, 2, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(531, 'HDMI Cable', 'Item_631', '', 20, 20, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(532, 'RCA Cable (Red, Yellow, White)', 'Item_632', '', 10, 10, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'M9', '', '', '', 1),
(533, 'Binder', 'Item_633', '', 32, 32, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'C16', '', '', '', 1),
(534, 'Algebra with Pazzazz ', 'Item_634', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(535, 'Holt Algebra I Teachers Edition', 'Item_635', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(538, 'Discovering Algebra Teachers Edition', 'Item_638', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(539, 'Discovering Algebra Vol I', 'Item_639', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(540, 'Discovering Algebra Vol II', 'Item_640', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(541, 'Geometry', 'Item_641', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(542, 'PA Holt Math Workbook Grade 9', 'Item_642', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(543, 'PA Holt Math Workbook Grade 10', 'Item_643', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(544, 'PA Holt Math Workbook Grade 11', 'Item_644', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(545, 'Sir Cumference', 'Item_645', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(546, 'Algebra Structure and Method', 'Item_646', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(547, 'Math Connections', 'Item_647', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(548, 'Contemporary Math in Context', 'Item_648', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(549, 'Building Formulas Teachers Guide', 'Item_649', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(550, 'Building Formulas Workbook', 'Item_650', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(551, 'Graphing Equations Teachers Guide', 'Item_651', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(552, 'Graphing Equations Workbook', 'Item_652', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(553, 'Going the Distance Teachers Guide', 'Item_653', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(554, 'Going the Distance Workbook', 'Item_654', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(555, 'Patterns and Figures Teachers Guide', 'Item_655', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(556, 'Patterns and Figures Workbook', 'Item_656', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(557, 'Picturing Numbers Teachers Guide', 'Item_657', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(558, 'Picturing Numbers Workbook', 'Item_658', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(559, 'Dealing with Data Teachers Guide', 'Item_659', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(560, 'Dealing with Data Workbook', 'Item_660', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(561, 'Reallotment Teachers Guide', 'Item_661', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(562, 'Reallotment Workbook', 'Item_662', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(563, 'Operations Teachers Guide', 'Item_663', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(564, 'Operations Workbook', 'Item_664', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(565, 'Patterns and Symbols Teachers Guide', 'Item_665', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(566, 'Patterns and Symbols Workbook', 'Item_666', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(567, 'Comparing Quanties Teachers Guide', 'Item_667', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(568, 'Comparing Quanties Workbook', 'Item_668', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(569, 'More or Less Teachers Guide', 'Item_669', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(570, 'More or Less Workbook', 'Item_670', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(571, 'Statistics & Environment Teachers Guide', 'Item_671', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(572, 'Statistics & the Environment Workbook', 'Item_672', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(573, 'Ratios and Rates Teachers Guide', 'Item_673', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(574, 'Ratios and Rates Workbook', 'Item_674', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(575, 'Ups and Downs Teachers Guide', 'Item_675', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(576, 'Ups and Downs Workbook', 'Item_676', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(577, 'Fraction Times Workbook', 'Item_677', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(578, 'Fraction Times Teachers Guide', 'Item_678', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(579, 'Models Counting Workbook', 'Item_679', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(580, 'Models Counting Teachers Guide', 'Item_680', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(581, 'Teacher Implication Guide', 'Item_681', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(582, 'Number Tools Workbook', 'Item_682', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(583, 'Number Tools Teacher Guides', 'Item_683', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(584, 'Algebra Tools Workbook', 'Item_684', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(585, 'Algebra Tools Teacher Guide', 'Item_685', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(586, 'Algebra Rules Workbook', 'Item_686', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(587, 'Algebra Rules Teacher Guides', 'Item_687', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(588, 'Reviewing Mathematics', 'Item_688', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(589, 'Integrated Algebra 1', 'Item_689', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(590, 'Teachers Guide to Games', 'Item_690', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(591, 'Grade 6', 'Item_691', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(592, 'Grade 7', 'Item_692', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(593, 'Grade 8', 'Item_693', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(594, 'Grade 3: Philadelphia Procedural ', 'Item_694', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(595, 'Grade 4: Philadelphia Procedural ', 'Item_695', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(596, 'Grade 5: Philadelphia Procedural', 'Item_696', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(597, 'Philadelphia Algebra 8 Workbook 1', 'Item_697', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(598, 'Philadelphia Algebra 8 Workbook 2', 'Item_698', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(599, 'Hands on Science and Math', 'Item_699', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(600, 'Social Studies - World History', 'Item_700', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(601, 'Grade K Science', 'Item_701', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(602, 'Grade 1 Science', 'Item_702', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(603, 'Grade 2 Science', 'Item_703', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(604, 'Grade 3 Science', 'Item_704', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(605, 'Coordinating Documents K-2', 'Item_705', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(606, 'Grade 3 Math', 'Item_706', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(607, 'Grade 4 Math', 'Item_707', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(608, 'Grade 4 Science', 'Item_708', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(609, 'Grade 5 Science', 'Item_709', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(610, 'Grade 5 Math', 'Item_710', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(611, 'Grade 6 Science', 'Item_711', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(612, 'Grade 6 Math', 'Item_712', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(613, 'Coordinating Documents 6-8', 'Item_713', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(614, 'Grade 7 Science', 'Item_714', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(615, 'Grade 7 Math', 'Item_715', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(616, 'Grade 8 Science', 'Item_716', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(617, 'Grade 8 Math', 'Item_717', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(618, 'Grade 9 Math Book 1', 'Item_718', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(619, 'Grade 9 Math Book 2', 'Item_719', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(620, 'Grade 10 Biology Curriculum Resources', 'Item_720', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(621, 'Grade 10 Biology Standards', 'Item_721', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(622, 'Grade 11 Algebra 2', 'Item_722', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(623, 'Algebra Blocks Manual', 'Item_723', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(624, 'Grade 11 Chemistry Curriculum Resources', 'Item_724', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(625, 'Grade 11 Chemistry Standards', 'Item_725', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(626, 'Common Core Math Standards', 'Item_726', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(627, 'Cells,Heredity,Classification Teacher', 'Item_727', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(628, 'Cells,Heredity,Classification Student', 'Item_728', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(629, 'Cells,Heredity,Classification Chpt Resource', 'Item_729', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(630, 'Biology with Vernier ', 'Item_730', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(631, 'BioTechnology Lab Manual', 'Item_731', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(632, 'Investigating Environ. Science Inquiry', 'Item_732', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(633, 'Holt Chemistry Teachers Edition ', 'Item_733', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(634, 'Chemistry with Vernier', 'Item_734', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(635, 'Active Chemistry Vol I Teachers ', 'Item_735', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(636, 'Active Chemistry Vol II Teachers ', 'Item_736', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(637, 'Active Chemistry Vol III Teachers ', 'Item_737', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(638, 'Chemistry the Central Science', 'Item_738', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(639, 'Active Physics I Workbook', 'Item_739', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(640, 'Physics Algebra and Trig', 'Item_740', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(641, 'Physics Concepts and Connections', 'Item_741', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(642, 'Physlet Physics', 'Item_742', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(643, 'Natural Approach to Chemistry', 'Item_743', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(644, 'Our Universe', 'Item_744', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(645, 'Physics With Vernier', 'Item_745', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(646, 'Physics a Window on our World', 'Item_746', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(647, 'Physics a World View', 'Item_747', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(648, 'Bees Student Mag', 'Item_748', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(649, 'Holt Astronomy Teachers Edition', 'Item_749', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(650, 'Holt Astronomy Student Edition', 'Item_750', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(651, 'Astronomy ', 'Item_751', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(652, 'The Dynamic Universe', 'Item_752', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(653, 'Earth Student Mag', 'Item_753', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(654, 'Ecology Student Mag', 'Item_754', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(655, 'Holt Forces, Motion, Energy Teacher', 'Item_755', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(656, 'Holt Forces, Motion, Energy Student', 'Item_756', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(657, 'Holt Inside the Earth Teachers', 'Item_757', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(658, 'Holt Inside the Earth Student', 'Item_758', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(659, 'Holt Introduction to Matter Teacher', 'Item_759', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(660, 'Holt Introduction to Matter Student', 'Item_760', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(661, 'Holt Introduction to Matter Resource', 'Item_761', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(662, 'Lab Demo Guide', 'Item_762', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(663, 'Holt Sound and Light Teacher', 'Item_763', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(664, 'Holt Sound and Light Student', 'Item_764', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(665, 'Rocks Student Mag', 'Item_765', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(666, 'Universe ', 'Item_766', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(667, 'Universe Origin and Eveloution', 'Item_767', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(668, 'Vernier Water Quality', 'Item_768', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(669, 'Holt Weather and Climate Teacher', 'Item_769', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(670, 'Holt Weather and Climate Student', 'Item_770', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(671, 'Vernier Enviroments', 'Item_771', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(672, 'Vernier Middle School Science', 'Item_772', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(673, 'Algebra Blocks DVD Vol I', 'Item_773', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(674, 'Algebra Blocks DVD Vol II', 'Item_774', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1);
INSERT INTO `items` (`Item_Id`, `Item_description`, `Reference`, `Imagen`, `Initial_Quantity`, `Stock_Quantity`, `Lessons_item`, `Date`, `Expiration_date`, `Price`, `Grant_Id`, `Vendor_Id`, `Category_Id`, `Subcategory_id`, `ItemType_Id`, `Building`, `Cabine`, `Room`, `Department`, `Location_Description`, `Grp`) VALUES
(675, 'Atoms and Molecules DVD', 'Item_775', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(676, 'BioDiversity DVD', 'Item_776', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(677, 'Enviroments DVD', 'Item_777', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(678, 'Electricity and Magnetism DVD', 'Item_778', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(679, 'Neuroscience DVD', 'Item_779', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(680, 'Physics of Sound DVD', 'Item_780', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(681, 'Solar Energy DVD', 'Item_781', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(682, 'Structures of Life DVD', 'Item_782', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(683, 'Variables DVD', 'Item_783', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(684, 'Rocks and Minerals Teachers Guide', 'Item_784', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(685, 'Rocks and Minerals Student Mag', 'Item_785', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(686, 'Rocks and Minerals Student Invest', 'Item_786', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(687, 'Land and Water Teacher Guides', 'Item_787', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(688, 'Land and Water Student Mag', 'Item_788', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(689, 'Land and Water Student Invest', 'Item_789', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(690, 'Earth in Space Teacher Guide', 'Item_790', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(691, 'Earth in Space Student Workbook', 'Item_791', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(692, 'Issues and Earth Science Earth in Space', 'Item_792', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(693, 'Issues Earth Science Weather Teacher', 'Item_793', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(694, 'Earth Science Weather Student', 'Item_794', '', 1, 1, '', '0000-00-00', '0000-00-00', '0.00', 0, 0, 0, 0, 2, 'Barton Hall', 'Middle Room', '', '', '', 1),
(696, 'Ipad Mini white33', 'Item_796', 'Item_796.jpg', 1, 1, 'Electricity,Ecosystems', '2014-07-16', '0000-00-00', '390.00', 0, 0, 7, 14, 2, 'Barton Hall', '', '2', 'Tuteach', '', 0),
(698, 'ItemLast', 'Item_797', '1969-chevrolet-camaro-3691.jpg', 1, 1, 'Electricity', '0000-00-00', '0000-00-00', '333.00', 1, 2, 1, 1, 1, 'Building', '', 'room', 'Department', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemType`
--

CREATE TABLE IF NOT EXISTS `itemType` (
  `ItemType_Id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemType_description` varchar(100) NOT NULL,
  PRIMARY KEY (`ItemType_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `itemType`
--

INSERT INTO `itemType` (`ItemType_Id`, `ItemType_description`) VALUES
(1, 'Disposable'),
(2, 'No-Disposable'),
(3, 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `Item_Report`
--

CREATE TABLE IF NOT EXISTS `Item_Report` (
  `Item_Report_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Report` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Item_Id` int(11) NOT NULL,
  PRIMARY KEY (`Item_Report_Id`),
  KEY `items_Id` (`Item_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Item_Report`
--

INSERT INTO `Item_Report` (`Item_Report_Id`, `Report`, `Item_Id`) VALUES
(1, 'This is my first report', 1),
(2, 'This is my report', 28),
(3, 'This is my new report', 8),
(4, 'This Item have report because I am testing it', 1),
(5, 'This is the new marker to prove the program', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `Lesson_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Lesson_description` varchar(100) NOT NULL,
  PRIMARY KEY (`Lesson_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `MemberShips`
--

CREATE TABLE IF NOT EXISTS `MemberShips` (
  `MemberShips_Id` int(11) NOT NULL AUTO_INCREMENT,
  `GroupId` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  PRIMARY KEY (`MemberShips_Id`),
  KEY `fk_MemberShips_Groups1_idx` (`GroupId`),
  KEY `fk_MemberShips_users1_idx` (`User_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=299 ;

--
-- Dumping data for table `MemberShips`
--

INSERT INTO `MemberShips` (`MemberShips_Id`, `GroupId`, `User_Id`) VALUES
(149, 3, 126),
(148, 3, 72),
(298, 1, 126),
(297, 1, 72),
(296, 1, 22),
(177, 2, 72),
(176, 2, 49),
(175, 2, 47),
(174, 2, 22),
(173, 2, 13),
(172, 2, 12),
(171, 2, 7),
(295, 1, 18),
(294, 1, 15),
(147, 3, 14),
(146, 3, 11),
(145, 3, 9),
(144, 3, 7),
(135, 4, 10),
(134, 4, 72),
(133, 4, 70),
(132, 4, 9),
(131, 4, 7),
(130, 4, 6),
(293, 1, 7),
(143, 3, 6),
(178, 2, 126),
(200, 5, 6),
(201, 5, 12),
(202, 5, 16),
(203, 5, 35),
(204, 5, 39),
(205, 5, 51),
(206, 5, 126),
(228, 6, 6),
(229, 6, 11),
(230, 6, 18),
(231, 6, 25),
(232, 6, 28),
(233, 6, 10),
(234, 6, 126),
(292, 1, 6),
(277, 7, 126),
(276, 7, 11),
(275, 7, 9),
(274, 7, 7),
(273, 7, 6),
(269, 8, 6),
(270, 8, 7),
(271, 8, 12),
(272, 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
  `MessageId` int(11) NOT NULL AUTO_INCREMENT,
  `Message` varchar(512) NOT NULL,
  `Message_Date` date NOT NULL,
  `User_Id` int(11) NOT NULL,
  PRIMARY KEY (`MessageId`),
  KEY `fk_Messages_users1_idx` (`User_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resetPass`
--

CREATE TABLE IF NOT EXISTS `resetPass` (
  `resetPass_Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Acode` int(15) NOT NULL,
  `dateTime` datetime NOT NULL,
  PRIMARY KEY (`resetPass_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `resetPass`
--

INSERT INTO `resetPass` (`resetPass_Id`, `email`, `Acode`, `dateTime`) VALUES
(1, 'juanitohf@gmail.com', 2082924824, '2014-09-03 08:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `Subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `Subcategory_description` varchar(100) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  PRIMARY KEY (`Subcategory_id`),
  KEY `fk_subcategories` (`Category_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`Subcategory_id`, `Subcategory_description`, `Category_Id`) VALUES
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
(14, 'Ipad', 7);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_status`
--

CREATE TABLE IF NOT EXISTS `transaction_status` (
  `Transaction_Status_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Transaction_Description` varchar(50) NOT NULL,
  PRIMARY KEY (`Transaction_Status_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transaction_status`
--

INSERT INTO `transaction_status` (`Transaction_Status_Id`, `Transaction_Description`) VALUES
(1, 'Item In'),
(2, 'Item Out');

-- --------------------------------------------------------

--
-- Table structure for table `transition`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `transition`
--

INSERT INTO `transition` (`transition_Id`, `User_Id`, `GroupId`, `Start_Date`, `Start_End`, `Time_Transaction`, `Item_Id`, `Quantity`, `Transaction_Status_Id`, `Stuff_Confirmation_Id`) VALUES
(1, 72, 1, '2014-06-15', '2014-06-16', '14:58:05', 2, 1, 1, 72),
(2, 72, 1, '2014-06-15', '2014-06-16', '14:58:05', 9, 1, 1, 72),
(38, 72, 1, '2014-07-06', '2014-07-07', '18:00:00', 4, 1, 1, 72),
(39, 72, 1, '2014-07-06', '2014-07-07', '18:00:00', 3, 1, 1, 72),
(40, 72, 1, '2014-07-06', '2014-07-07', '18:00:00', 1, 1, 1, 72),
(41, 72, 1, '2014-07-06', '2014-07-07', '18:00:00', 6, 1, 1, 72),
(42, 126, 1, '2014-07-06', '2014-07-07', '18:00:00', 13, 1, 1, 72),
(43, 126, 1, '2014-07-06', '2014-07-07', '18:00:00', 2, 1, 1, 72),
(44, 126, 1, '2014-07-06', '2014-07-07', '18:00:00', 1, 3, 1, 72),
(45, 72, 3, '2014-07-06', '2014-07-07', '18:00:00', 6, 1, 1, 72),
(46, 72, 3, '2014-07-06', '2014-07-08', '18:00:00', 6, 1, 1, 72),
(47, 72, 3, '2014-07-06', '2014-07-07', '18:00:00', 1, 1, 1, 72),
(48, 72, 3, '2014-07-06', '2014-07-07', '18:00:00', 3, 1, 1, 72),
(49, 72, 3, '2014-07-06', '2014-07-07', '18:00:00', 6, 1, 1, 72),
(50, 72, 3, '2014-07-06', '2014-07-07', '18:00:00', 1, 1, 1, 72),
(51, 72, 3, '2014-07-06', '2014-07-07', '18:00:00', 1, 2, 1, 72),
(52, 72, 3, '2014-07-06', '2014-07-07', '18:00:00', 3, 3, 1, 72),
(53, 72, 3, '2014-07-06', '2014-07-07', '18:00:00', 20, 3, 1, 72),
(54, 72, 3, '2014-07-06', '2014-07-07', '18:00:00', 23, 3, 1, 72),
(55, 72, 3, '2014-07-07', '2014-07-08', '18:00:00', 1, 1, 1, 72),
(56, 72, 3, '2014-07-07', '2014-07-09', '18:00:00', 2, 1, 1, 72),
(57, 72, 3, '2014-07-07', '2014-07-08', '18:00:00', 4, 1, 1, 72),
(58, 72, 3, '2014-07-07', '2014-07-09', '18:00:00', 6, 1, 1, 72),
(59, 72, 1, '2014-07-12', '2014-07-13', '18:00:00', 1, 1, 1, 72),
(60, 72, 1, '2014-07-12', '2014-07-13', '18:00:00', 3, 1, 1, 72),
(61, 72, 1, '2014-07-12', '2014-07-13', '18:00:00', 4, 1, 1, 72),
(62, 72, 1, '2014-07-12', '2014-07-13', '18:00:00', 2, 1, 1, 72),
(63, 72, 1, '2014-07-12', '2014-07-14', '18:00:00', 4, 1, 1, 72),
(64, 72, 1, '2014-07-12', '2014-07-13', '18:00:00', 7, 1, 1, 72),
(65, 72, 1, '2014-07-12', '2014-07-14', '18:00:00', 9, 3, 1, 72),
(66, 72, 1, '2014-07-12', '2014-07-13', '18:00:00', 3, 1, 1, 72),
(67, 72, 1, '2014-07-12', '2014-07-13', '18:00:00', 9, 1, 1, 72),
(68, 72, 1, '2014-07-12', '2014-07-13', '18:00:00', 7, 1, 1, 72),
(69, 126, 1, '2014-07-15', '2014-07-16', '18:00:00', 1, 1, 1, 72),
(70, 126, 1, '2014-07-15', '2014-07-16', '18:00:00', 4, 1, 1, 72),
(71, 126, 1, '2014-07-15', '2014-07-16', '18:00:00', 8, 1, 1, 72),
(72, 72, 2, '2014-07-16', '2014-07-18', '18:00:00', 1, 2, 1, 72),
(73, 72, 2, '2014-07-16', '2014-07-18', '18:00:00', 5, 2, 1, 72),
(74, 72, 2, '2014-07-16', '2014-07-17', '18:00:00', 9, 2, 1, 72),
(75, 72, 1, '2014-07-16', '2014-07-19', '18:00:00', 696, 1, 1, 72),
(76, 72, 1, '2014-07-16', '2014-07-17', '18:00:00', 696, 1, 1, 72),
(77, 72, 1, '2014-07-16', '2014-07-18', '18:00:00', 696, 1, 1, 72),
(78, 72, 1, '2014-07-16', '2014-07-17', '18:00:00', 696, 1, 1, 72),
(79, 72, 1, '2014-07-17', '2014-07-18', '18:00:00', 3, 1, 1, 72),
(80, 72, 1, '2014-07-17', '2014-07-18', '18:00:00', 5, 1, 1, 72),
(81, 72, 1, '2014-07-17', '2014-07-18', '18:00:00', 1, 1, 1, 72),
(82, 126, 1, '2014-07-27', '2014-07-28', '18:00:00', 1, 1, 1, 72),
(83, 126, 1, '2014-07-27', '2014-07-28', '18:00:00', 4, 1, 1, 72),
(84, 126, 1, '2014-07-27', '2014-07-28', '18:00:00', 8, 1, 1, 72),
(85, 72, 1, '2014-07-27', '2014-07-28', '18:00:00', 1, 1, 1, 72),
(86, 72, 1, '2014-07-27', '2014-07-28', '18:00:00', 3, 1, 1, 72),
(87, 126, 1, '2014-07-29', '2014-07-30', '18:00:00', 2, 1, 1, 72),
(88, 126, 1, '2014-07-29', '2014-07-30', '18:00:00', 4, 1, 1, 72),
(89, 72, 1, '2014-07-29', '2014-07-30', '18:00:00', 1, 1, 1, 72),
(90, 72, 1, '2014-07-29', '2014-07-30', '18:00:00', 3, 1, 2, 72),
(91, 72, 1, '2014-07-29', '2014-07-30', '18:00:00', 5, 1, 1, 72),
(92, 72, 1, '2014-10-08', '2014-10-09', '18:00:00', 1, 1, 1, 72);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Name`, `MidleName`, `Last`, `Password`, `Temple_Id`, `Image`, `Email`, `Cellphone`, `Address1`, `Address2`, `City`, `State`, `Zip`, `HomePhone`, `WorkPhone`, `Website`, `User_Type_Id`, `Permitions`) VALUES
(6, 'Bhavika', '', 'Patel', 'f582b4a872b8a15d21c07ffaa893fb69', 915091658, '', 'bhavika07patel@gmail.com', '267 632 5029', '', '', '', '', '', '', '', '', 5, '111111111'),
(7, 'Lan ', '', 'Nguyen', 'f47f6efc118a42e549b30e9ca53d6302', 910101070, '', 'tua15375@temple.edu', '', '', '', '', '', '', '', '', '', 5, '111111111'),
(9, 'Bryan', '', 'Berman', '798814df0eada1985de2869d4783eefc', 914434548, '', 'tud15310@temple.edu', '', '', '', '', '', '', '', '', '', 1, '0'),
(10, 'Douglas ', '', 'Baird', '6aaf1f0b4a91acc3ae95983b69bda548', 910214978, '', 'dbaird@temple.edu', '2677369678', '', '', '', '', '', '', '', '', 3, '111111111'),
(11, 'Chase ', '', 'Pierson', '6cbd58580d88fc33eb0ff2688dd9070c', 913051674, '', 'tuc59217@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(12, 'Alexander', '', 'Corle', '7c998329a8df6fa41f5ca232acd2818c', 912536987, '', 'tuc10150@temple.edu', '', '', '', '', '', '', '', '', '', 1, '0'),
(13, 'LaTasia', '', 'Simmons', '3a9ae704a13fd88d3b1cce2b052258e9', 912884314, '', 'tuc45425@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(14, 'Joe', '', 'Campbell', '6be2cc573d4579f371dc8b0b7348980b', 914973608, '', 'tue65161@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(15, 'Emily', '', 'Wetzel', '226f04be9f4bc08cb6bef37b3394fdda', 914460344, '', 'tud14042@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(16, 'Tykee', '', 'James', '098c049af4ba456b071810ebc051a295', 914997213, '', 'tykee.james@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(17, 'Leah', '', 'Rosenbloom', 'ef1a0d5089e3e672855323e33630ee15', 915042583, '', 'tue86724@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(18, 'GAELAN', '', 'TRACY', '6a03d34d216ea7a19b2c197d7a612e6d', 914477580, '', 'tud23766@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(19, 'Donna ', '', 'Griffis', 'f76ae092fe01ebd87b16024fe5e11f74', 912603408, '', 'tuc16673@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(20, 'Charles', '', 'Dao', '288bb0d6b9d584869b40186ba09c0df1', 914944522, '', 'tue41429@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(21, 'colette', '', 'weaver', 'b227222ae486292d98ce019f4256b86b', 912592000, '', 'tuc15585@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(22, 'Gabe', '', 'Pronesti', 'cfe70a27279645c1d08f210448e30f7f', 914174612, '', 'tue53444@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(23, 'Kimberly', '', 'Davis', 'f0419fcabb92281d21b632b164a561e3', 912896241, '', 'kimberly.davis@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(24, 'Amanda', '', 'Schantz', '3261ac333726c67d6cee1d20f7e590e0', 914193861, '', 'tud08384@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(25, 'William', '', 'Lamborn', 'bd4cdb340331e4ced6e7da26c661363d', 914938481, '', 'tue44050@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(26, 'Calvin', '', 'Wang', 'df7e23ab42b9b1653e5c2616b9baae65', 914888852, '', 'tud52704@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(28, 'Julie', '', 'Premo', '2762b458ec0900475b6b51c312914001', 914262590, '', 'tud13014@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(29, 'Sarah', '', 'Munson', '155250134b0d152681cfad65f71175e8', 912813374, '', 'tuc37684@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(30, 'Elizabeth', '', 'Weissmam', '170e7a8097edbaef6b9fc1f2a2a87127', 2147483647, '', 'tue82542@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(31, 'Brian', '', 'Cooper', '84fd99ea33746b9937f0d9a0de365033', 912536976, '', 'btcooper27@gmail.com', 'coopah27', '', '', '', '', '', '', '', '', 1, '010010010'),
(32, 'Daniel', '', 'Essex', '8a1e3c1eb70d957911588f238bbc0ea6', 914272732, '', 'tud05909@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(33, 'Herb', '', 'Green', '7e83bd46a4c99655041fc543f7890ab3', 900615061, '', 'herbgreen@temple.edu', 'herbra', '', '', '', '', '', '', '', '', 1, '010010010'),
(34, 'Patricia', '', 'Anderson', '9d0abed308693167265adbb05cc8501f', 908292285, '', 'AndersonTeha@gmail.com', '2156924382', '', '', '', '', '', '', '', '', 1, '111111111'),
(35, 'katherine', '', 'jimenez', 'ba23f779995c38e0cb5de746a7c2bcf9', 912921203, '', 'katherine.jimenez@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(36, 'Victoria', '', 'Runnells', 'bef0ef09886d2a7b8cc842b947402d24', 913091032, '', 'runnells@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(37, 'Jaleesa ', '', 'Mason', '1c549c40f0d9875f4905a40018ad2653', 2147483647, '', 'Jaleesamason20@yahoo.com', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(38, 'Varlee', '', 'Kamara', '9725f9f86f5d9c8af80ee4991819e64f', 915123056, '', 'tuf25153@temple.edu', '7042089179', '', '', '', '', '', '', '', '', 1, '010010010'),
(39, 'Aron', '', 'Cowen', '5d9f71b71b207b9e665820c0dce67bdb', 914927497, '', 'tuf23949@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(40, 'John', '', 'Clark', 'daab4f353a1f0821bce0403d2d997af8', 914995396, '', 'tue98609@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(41, 'Laine', '', 'Murphy', '805ebc5ae2bbbc30a7a148a5054850ff', 915084658, '', 'tuf05110@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(42, 'Stephen', '', 'Tromley', 'cf123a7b0b750c82d53ca746686cdcab', 915115846, '', 'tuf23151@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(43, 'Elliot', '', 'Bickel', 'd8ae5776067290c4712fa454006c8ec6', 915027790, '', 'tue90004@temple.edu', '215-356-4033', '', '', '', '', '', '', '', '', 1, '010010010'),
(44, 'Michael', '', 'Erickson', '4b745820cf2f1553b1bfe6473d780d9f', 915023507, '', 'tue81051@temple.edu', '', '', '', '', '', '', '', '', '', 1, '010010010'),
(45, 'Collin', '', 'Vito', '94919dd300af36f2a57c4375ee872c6b', 914997303, '', 'tue66534@temple.edu', '6107371026', '', '', '', '', '', '', '', '', 1, '010010010'),
(46, 'Debbie', '', 'Barkley', 'dcb1fc3b103eddbc3f1f2f36242212bb', 914436042, '', 'tud15287@temple.edu', '2672109771', '', '', '', '', '', '', '', '', 1, '010010010'),
(47, 'BRITTANY', '', 'BAGGIO', '449ebf01fa46988deef70820f5857f4e', 912862062, '', 'TUD17527@TEMPLE.EDU', '2673154803', '', '', '', '', '', '', '', '', 1, '010010010'),
(48, 'Dana', '', 'Russell', '112737ad2964c60da1e492f2feb79632', 0, '', 'dana.russell@temple.edu', '2154356556', '', '', '', '', '', '', '', '', 1, '010010010'),
(49, 'Jacob', '', 'Smith', 'f8b8a5d5119f47f302a372f2cfa59ac8', 915006341, '', 'tue74461@temple.edu', '4848897573', '', '', '', '', '', '', '', '', 1, '010010010'),
(50, 'Tyler', '', 'Wolfe', '4a500867d65a0462e08ff8f3175a6204', 914241390, '', 'tuf00863@temple.edu', '267-424-1160', '', '', '', '', '', '', '', '', 1, '010010010'),
(51, 'Vanessa', '', 'Torres', 'f7c287c2ea025a0d4bad03d7d87fa2cb', 914948625, '', 'tue48354@temple.edu', '215-667-7040', '', '', '', '', '', '', '', '', 1, '010010010'),
(52, 'Brandon', '', 'Shillady', '18e5800d2bc00cc19bf6c1afe2639355', 915008280, '', 'tue91955@temple.edu', '484-663-3819', '', '', '', '', '', '', '', '', 1, '010010010'),
(53, 'Benjamin', '', 'Griffith', '6e20019798644437aa7f2d5c6059f7f0', 915067694, '', 'tue96305@temple.edu', '484-326-4456', '', '', '', '', '', '', '', '', 1, '010010010'),
(54, 'Misha', '', 'Memon', 'd507bab42978a30fb9e6cfefbe088c3e', 912833849, '', 'tuc39805@temple.edu', '2679022817', '', '', '', '', '', '', '', '', 1, '010010010'),
(55, 'Samantha ', '', 'Polgar', '73520b13e7625c7039debf98453a9030', 914959349, '', 'tue66274@temple.edu', '2676149424', '', '', '', '', '', '', '', '', 1, '010010010'),
(70, 'Justin     ', 'Yuan', 'Shi', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'JustinShi.jpg', 'shi@temple.edu', '999-999-9999', '1801 N. Broad Street', '', 'Philadelphia', 'PA', '19122', '999-999-9999', '999-999-9999', 'http://www.temple.edu/cis/directory/tenure/shi.htm', 5, '111111111'),
(72, 'Juan', '', 'Huertas Fernandez', 'c96214f9d650f416c745b3cf0ae40fe8', 915049363, 'juanPerfil.png', 'tue89164@temple.edu', '2673487342', '1801 N Broad Street', '', 'Philadelpia', 'PA', '19122', '2155191520', '2155191520', 'www.web-huertas.com', 5, '111111111'),
(112, 'Collin', 'Patrick', 'McCann', 'dfb3cc8bb1fd75ff384af031b8c03a59', 914220612, '914220612.png', 'collin.mccann@temple.edu', '4848240684', '', '', '', '', '', '', '', '', 1, '00000000'),
(126, 'juanitohf', '', 'Huertas', 'c96214f9d650f416c745b3cf0ae40fe8', 999999999, '999999999.png', 'juanitohf@gmail.com', '2673487342', '', '', '', '', '', '', '', '', 3, '111111111'),
(130, 'student!', '', 'StudentLast', '81dc9bdb52d04dc20036dbd8313ed055', 998877665, '1969-chevrolet-camaro-3691.jpg', 'student@temple.edu', '', '', '', '', '', '', '', '', '', 1, '111111111');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `User_Type_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Description` varchar(50) NOT NULL,
  PRIMARY KEY (`User_Type_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`User_Type_Id`, `User_Description`) VALUES
(1, 'Student'),
(2, 'Staff'),
(3, 'Instructor'),
(4, 'Faculty'),
(5, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `Vendor_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Vendor_name` varchar(50) NOT NULL,
  `Vendor_email` varchar(50) DEFAULT NULL,
  `Vendor_phone` char(12) DEFAULT NULL,
  `Vendor_web` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Vendor_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`Vendor_Id`, `Vendor_name`, `Vendor_email`, `Vendor_phone`, `Vendor_web`) VALUES
(0, ' - - None - -', '', '', ''),
(2, 'Vendors', 'Vendor@gmailVendor.com', '2212222222', 'www.vendor.com');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`Visitor_Id`, `User_Id`, `Date`, `TimeStart`, `TimeEnd`, `TimeOnStudio`, `Id_Status_Visitor`) VALUES
(1, 72, '2014-08-05', '18:17:00', '18:27:00', '0 hours  10 min', 0),
(2, 72, '2014-08-05', '18:32:00', '18:33:00', '0 hours  1 min', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
