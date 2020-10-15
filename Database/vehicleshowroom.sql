-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2014 at 12:09 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vehicleshowroom`
--
CREATE DATABASE IF NOT EXISTS `vehicleshowroom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vehicleshowroom`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(10) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `contactnumber` varchar(25) NOT NULL,
  `createdat` date NOT NULL,
  `lastlogin` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`adminid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `username`, `password`, `contactnumber`, `createdat`, `lastlogin`, `status`) VALUES
(1, 'heena prajna', 'admin', 'technology', '987456321', '2013-12-16', '0000-00-00 00:00:00', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `custid` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `emailid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `createdat` date NOT NULL,
  `lastlogin` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`custid`),
  UNIQUE KEY `emailid` (`emailid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `fname`, `lname`, `contactno`, `emailid`, `password`, `address`, `city`, `state`, `country`, `pincode`, `gender`, `createdat`, `lastlogin`, `status`) VALUES
(50, 'dheeraj', 'bhat', '9844778050', 'dbhat11642@gmail.com', 'dheerajdbhat', '8th main,kerala', 'trivandrum', 'Kerala', 'India', '678990', 'Male', '2014-03-19', '2014-03-20 11:25:29', 'Enabled'),
(51, 'prajna', 'ap', '9987744552', 'prajna@gmail.com', '1234567890', 'sakleshpura,\r\nhassan', 'hassan', 'Karnataka', 'India', '58945', 'Female', '2014-03-19', '2014-03-20 09:50:41', 'Enabled'),
(52, 'sanchi', 'raj', '7789778977', 'sanchi@gmail.com', '777777777', 'ramanahalli,\r\nchikmagalore', 'chikmagalore', 'Karnataka', 'India', '587941', 'Female', '2014-03-20', '2014-03-20 07:45:11', 'Enabled'),
(53, 'DHEERAJ', 'BHAT', '9844778057', 'dbhat1164@gmail.com', 'DHEERAJDBHAT1164', '8TH MAIN,APPT,GANDHINAGAR,', 'CHENNAI', 'Karnataka', 'India', '560040', 'Male', '0000-00-00', '2014-03-24 11:36:13', ''),
(54, 'Salman', 'Khan', '8798798744', 'salman@gmail.com', '000000000', 'gorgav street,\r\nMumbai', 'Mumbai', 'Maharastra', 'India', '587489', 'Male', '2014-03-20', '2014-03-20 05:00:19', 'Enabled'),
(55, 'Gayatri', 'Rao', '9874123650', 'gay@gmail.com', '123456789', 'taj road,\r\nudupi', 'udupi', 'Karnataka', 'India', '745874', 'Female', '2014-03-21', '2014-03-23 07:36:58', 'Enabled'),
(56, 'DAYANA', 'GUPTA', '9874521360', 'daya@gmail.com', '987321654', 'k.k road,\r\nMumbai', 'Mumbai', 'Maharastra', 'India', '654789', 'Female', '2014-03-22', '2014-03-22 07:05:06', 'Enabled'),
(57, 'Heena', 'Sheikh', '7894561230', 'heena@gmail.com', '789789789', 'ramanahalii\r\nchikmagalure', 'chikmagure', 'Karnataka', 'India', '577101', 'Female', '2014-03-24', '2014-03-24 06:00:51', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE IF NOT EXISTS `dealer` (
  `dealerid` int(10) NOT NULL AUTO_INCREMENT,
  `adminid` int(10) NOT NULL,
  `companyname` varchar(25) NOT NULL,
  `imgid` int(10) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `contactnumber` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `createdat` date NOT NULL,
  `lastlogin` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`dealerid`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dealerid`, `adminid`, `companyname`, `imgid`, `fname`, `lname`, `username`, `password`, `contactnumber`, `address`, `createdat`, `lastlogin`, `status`) VALUES
(29, 1, 'Maruti Suzuki', 48, 'hudshons', 'kings', 'marutidealer', '987654321', '9874563210', 'Bangalore', '2014-03-06', '2014-03-24 11:40:19', 'Enabled'),
(30, 1, 'Hyundai Motor Company', 50, 'Chung ', 'Ju-yung', 'hyundaidealer', '456456456', '7895486213', 'Seoul, \r\nSouth Korea', '2014-03-11', '0000-00-00 00:00:00', 'Enabled'),
(32, 1, 'Volkswagen', 52, 'Ferdinand ', 'Porsche', 'VolksDealer', '789789789', '9517538426', 'Wolfsburg,\r\nGermany', '2014-03-11', '0000-00-00 00:00:00', 'Enabled'),
(33, 1, 'Chevrolet', 53, 'Louis', 'Joseph', 'chevroletdealer', '159753159', '8889997744', 'India', '2014-03-11', '0000-00-00 00:00:00', 'Enabled'),
(34, 1, 'Audi', 95, 'August', 'Horch', 'audidealer', '12121212121212', '8741415412', 'Bavaria, Germany', '2014-03-21', '0000-00-00 00:00:00', 'Enabled'),
(35, 1, 'Mercedes-Benz', 96, 'Karl', 'Benz', 'BenzDealer', '585858585858', '748236985', 'Stuttgart,\r\nGermany', '2014-03-21', '0000-00-00 00:00:00', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `imgid` int(10) NOT NULL AUTO_INCREMENT,
  `imagename` varchar(25) NOT NULL,
  `vehid` int(10) NOT NULL,
  `imagepath` varchar(100) NOT NULL,
  `defaultimg` int(1) NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=261 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgid`, `imagename`, `vehid`, `imagepath`, `defaultimg`) VALUES
(40, '', 0, '841download.jpg', 0),
(41, '', 0, '22895download (3).jpg', 0),
(42, '', 0, '32061download (3).jpg', 0),
(43, '', 0, '26458download (3).jpg', 0),
(44, '', 0, '7784download (2).jpg', 0),
(45, '', 0, '13270download (3).jpg', 0),
(46, '', 0, '0download (1).jpg', 0),
(47, '', 0, '7974download (1).jpg', 0),
(48, '', 0, '30253download.jpg', 0),
(49, '', 0, '16816download (3).jpg', 0),
(50, '', 0, '4827Hyundai_Motor_Company_logo.svg.png', 0),
(51, '', 0, '2438150px-Tata_logo.svg.png', 0),
(52, '', 0, '29058180px-Volkswagen_logo_2012.svg.png', 0),
(53, '', 0, '12549Chevypnglogo.png', 0),
(54, '', 0, '31848150px-Suzuki_Motor_Corporation_logo.svg.png', 0),
(55, '13772hyndaiequsthCAGMLBEO', 1, '13772hyndaiequsthCAGMLBEO.jpg', 0),
(56, '16405hyndaii3.png', 1, '16405hyndaii3.png', 0),
(57, '28057Tata-Nano-Car-Dealer', 2, '28057Tata-Nano-Car-Dealers-Gujarat.jpg', 0),
(58, '8696Chevrolet-Camaro.jpg', 3, '8696Chevrolet-Camaro.jpg', 0),
(59, '9201chevrolet-02.jpg', 4, '9201chevrolet-02.jpg', 0),
(61, '30029hyndai.jpg', 6, '30029hyndai.jpg', 0),
(62, '9562Chevrolet-Camaro.jpg', 7, '9562Chevrolet-Camaro.jpg', 0),
(63, '3176chevrolet-02.jpg', 0, '3176chevrolet-02.jpg', 0),
(64, '31051chevrolet-02.jpg', 8, '31051chevrolet-02.jpg', 0),
(66, '241482012_Volkswagen_Pass', 10, '241482012_Volkswagen_Passat_--_NHTSA_2.jpg', 0),
(71, '4194chevrolet-spark-pictu', 11, '4194chevrolet-spark-pictures-046.jpg', 0),
(72, '384102-Phantom_Black (1).', 0, '384102-Phantom_Black (1).jpg', 0),
(73, '2499803-Pure_White.jpg', 0, '2499803-Pure_White.jpg', 0),
(74, '2250304-Silky_Beige.jpg', 0, '2250304-Silky_Beige.jpg', 0),
(75, '3266007-Twilight_Blue.jpg', 0, '3266007-Twilight_Blue.jpg', 0),
(76, '671708-Wine_red.jpg', 0, '671708-Wine_red.jpg', 0),
(77, '29234hyundai-i20-silky-be', 0, '29234hyundai-i20-silky-beige.jpg', 0),
(78, '212302-Phantom_Black (1).', 0, '212302-Phantom_Black (1).jpg', 0),
(79, '464803-Pure_White.jpg', 0, '464803-Pure_White.jpg', 0),
(80, '697704-Silky_Beige.jpg', 0, '697704-Silky_Beige.jpg', 0),
(81, '637407-Twilight_Blue.jpg', 0, '637407-Twilight_Blue.jpg', 0),
(82, '2410308-Wine_red.jpg', 0, '2410308-Wine_red.jpg', 0),
(83, '10452hyundai-i20-silky-be', 0, '10452hyundai-i20-silky-beige.jpg', 0),
(84, '1707202-Phantom_Black.jpg', 12, '1707202-Phantom_Black.jpg', 0),
(85, '1360903-Pure_White.jpg', 12, '1360903-Pure_White.jpg', 0),
(86, '2065404-Silky_Beige.jpg', 12, '2065404-Silky_Beige.jpg', 0),
(87, '366307-Twilight_Blue.jpg', 12, '366307-Twilight_Blue.jpg', 0),
(88, '2300408-Wine_red.jpg', 12, '2300408-Wine_red.jpg', 0),
(89, '31461hyundai-grand-i10-pi', 12, '31461hyundai-grand-i10-pictures-046.jpg', 0),
(90, '18874hyundai-i20-silky-be', 12, '18874hyundai-i20-silky-beige.jpg', 0),
(91, '13944hyundai-xcent-pictur', 13, '13944hyundai-xcent-pictures-046.jpg', 0),
(92, '208842012_Volkswagen_Pass', 14, '208842012_Volkswagen_Passat_--_NHTSA_2.jpg', 0),
(93, '1712308-Wine_red.jpg', 15, '1712308-Wine_red.jpg', 0),
(95, '', 0, '20474audi-logo_100x75.jpg', 0),
(96, '', 0, '16398Mercedes_benz_silverlogo.png', 0),
(97, '19361marutisuzuki-sx4-new', 0, '19361marutisuzuki-sx4-new-338388227-68.jpg', 0),
(98, '29126marutisuzuki-sx4-new', 0, '29126marutisuzuki-sx4-new-642231577-68.jpg', 0),
(99, '30087marutisuzuki-sx4-new', 0, '30087marutisuzuki-sx4-new-752951426-68.jpg', 0),
(100, '23732marutisuzuki-sx4-new', 0, '23732marutisuzuki-sx4-new-867367568-68.jpg', 0),
(101, '8329marutisuzuki-sx4-new-', 0, '8329marutisuzuki-sx4-new-338388227-68.jpg', 0),
(102, '18574marutisuzuki-sx4-new', 0, '18574marutisuzuki-sx4-new-642231577-68.jpg', 0),
(103, '22703marutisuzuki-sx4-new', 0, '22703marutisuzuki-sx4-new-752951426-68.jpg', 0),
(104, '17596marutisuzuki-sx4-new', 0, '17596marutisuzuki-sx4-new-867367568-68.jpg', 0),
(105, '14789marutisuzuki-sx4-new', 0, '14789marutisuzuki-sx4-new-338388227-68.jpg', 0),
(106, '20250marutisuzuki-sx4-new', 0, '20250marutisuzuki-sx4-new-642231577-68.jpg', 0),
(107, '19019marutisuzuki-sx4-new', 0, '19019marutisuzuki-sx4-new-752951426-68.jpg', 0),
(108, '11304marutisuzuki-sx4-new', 0, '11304marutisuzuki-sx4-new-867367568-68.jpg', 0),
(109, '2048marutisuzuki-sx4-new-', 0, '2048marutisuzuki-sx4-new-338388227-68.jpg', 0),
(110, '6201marutisuzuki-sx4-new-', 0, '6201marutisuzuki-sx4-new-642231577-68.jpg', 0),
(111, '24190marutisuzuki-sx4-new', 0, '24190marutisuzuki-sx4-new-752951426-68.jpg', 0),
(112, '20447marutisuzuki-sx4-new', 0, '20447marutisuzuki-sx4-new-867367568-68.jpg', 0),
(113, '17126marutisuzuki-sx3.jpg', 0, '17126marutisuzuki-sx3.jpg', 0),
(114, '16423marutisuzuki-sx4.jpg', 0, '16423marutisuzuki-sx4.jpg', 0),
(115, '25300marutisuzuki-sx41.jp', 0, '25300marutisuzuki-sx41.jpg', 0),
(116, '23677marutisuzuki-sx42.jp', 0, '23677marutisuzuki-sx42.jpg', 0),
(118, '4128Audi-A8-1-.jpg', 17, '4128Audi-A8-1-.jpg', 0),
(119, '19929Audi-A8-2.jpg', 17, '19929Audi-A8-2.jpg', 0),
(120, '29598Audi-A8-3.jpg', 17, '29598Audi-A8-3.jpg', 0),
(125, '4071audi01.jpg', 18, '4071audi01.jpg', 0),
(126, '23669audi02.jpg', 18, '23669audi02.jpg', 0),
(127, '29336audi03.jpg', 18, '29336audi03.jpg', 0),
(128, '2610Audi-TT-Front-.jpg', 19, '2610Audi-TT-Front-.jpg', 0),
(129, '17283Audi-TT-Left-jpg.jpg', 19, '17283Audi-TT-Left-jpg.jpg', 0),
(130, '22784Audi-TT-Right-.jpg', 19, '22784Audi-TT-Right-.jpg', 0),
(131, '17171Audi-S6-Frontjpg.jpg', 0, '17171Audi-S6-Frontjpg.jpg', 0),
(132, '2384Audi-S6-Left.jpg', 0, '2384Audi-S6-Left.jpg', 0),
(133, '1750AudiS6-Front.jpg', 20, '1750AudiS6-Front.jpg', 0),
(134, '19799Audi-S6-Left.jpg', 20, '19799Audi-S6-Left.jpg', 0),
(135, '9517Audi-S6 v back.jpg', 20, '9517Audi-S6 v back.jpg', 0),
(136, '32111audi RS5 01.jpg', 21, '32111audi RS5 01.jpg', 0),
(137, '27260audi Rs5 02.jpg', 21, '27260audi Rs5 02.jpg', 0),
(138, '23386audi .jpg', 21, '23386audi .jpg', 0),
(139, '16223audi q5 01.jpg', 22, '16223audi q5 01.jpg', 0),
(140, '7596audi q5 02.jpg', 22, '7596audi q5 02.jpg', 0),
(141, '14965audi q5 03.jpg', 22, '14965audi q5 03.jpg', 0),
(142, '7695Hyundai_Verna_2.jpg', 23, '7695Hyundai_Verna_2.jpg', 0),
(143, '3740Hyundai_Verna1.jpg', 23, '3740Hyundai_Verna1.jpg', 0),
(144, '1324Hyundai verna_3.jpg', 23, '1324Hyundai verna_3.jpg', 0),
(146, '5428Hyundai_i10_01.jpeg', 16, '5428Hyundai_i10_01.jpeg', 0),
(147, '11658Hyundai_i10 1.jpg', 16, '11658Hyundai_i10 1.jpg', 0),
(148, '4306Hyundai_i10_3.jpeg', 16, '4306Hyundai_i10_3.jpeg', 0),
(149, '17497Hyundai_Xcent_82.jpe', 13, '17497Hyundai_Xcent_82.jpeg', 0),
(150, '24757Hyundai_Xcent_88.jpe', 13, '24757Hyundai_Xcent_88.jpeg', 0),
(151, '22145hyundai-eon-front-1.', 24, '22145hyundai-eon-front-1.jpg', 0),
(152, '12913hyundai-eon-2.jpg', 24, '12913hyundai-eon-2.jpg', 0),
(153, '8891hyundai-eon-3.jpg', 24, '8891hyundai-eon-3.jpg', 0),
(154, '26666Hyundai-Elantra-1.jp', 0, '26666Hyundai-Elantra-1.jpg', 0),
(155, '22043Hyundai-Elantra2.jpg', 0, '22043Hyundai-Elantra2.jpg', 0),
(156, '5048Hyundai-Elantra3.jpg', 0, '5048Hyundai-Elantra3.jpg', 0),
(157, '19908Hyundai-Elantra-1.jp', 25, '19908Hyundai-Elantra-1.jpg', 0),
(158, '1197Hyundai-Elantra2.jpg', 25, '1197Hyundai-Elantra2.jpg', 0),
(159, '12183Hyundai-Elantra3.jpg', 25, '12183Hyundai-Elantra3.jpg', 0),
(160, '3348hyundai i20 1.jpg', 0, '3348hyundai i20 1.jpg', 0),
(161, '22973Hyundai-i20 2.jpg', 0, '22973Hyundai-i20 2.jpg', 0),
(162, '31666Hyundai-i20 3.jpg', 0, '31666Hyundai-i20 3.jpg', 0),
(163, '29037hyundai i20 1.jpg', 0, '29037hyundai i20 1.jpg', 0),
(164, '12706Hyundai-i20 2.jpg', 0, '12706Hyundai-i20 2.jpg', 0),
(165, '11827Hyundai-i20 3.jpg', 0, '11827Hyundai-i20 3.jpg', 0),
(166, '26240hyundai i20 1.jpg', 0, '26240hyundai i20 1.jpg', 0),
(167, '14185hyundai i20.jpg', 0, '14185hyundai i20.jpg', 0),
(168, '17902Hyundai-i20 2.jpg', 0, '17902Hyundai-i20 2.jpg', 0),
(169, '31375Hyundai-i20 3.jpg', 0, '31375Hyundai-i20 3.jpg', 0),
(170, '560mecerdeces 1.jpg', 0, '560mecerdeces 1.jpg', 0),
(171, '16041mercedces 2.jpg', 0, '16041mercedces 2.jpg', 0),
(172, '23598mercedces 3.jpg', 0, '23598mercedces 3.jpg', 0),
(173, '2289mecerdeces 1.jpg', 26, '2289mecerdeces 1.jpg', 0),
(174, '27862mercedces 2.jpg', 26, '27862mercedces 2.jpg', 0),
(175, '15191mercedces 3.jpg', 26, '15191mercedces 3.jpg', 0),
(176, '4444Mercedes-Benz-CLS1.jp', 27, '4444Mercedes-Benz-CLS1.jpg', 0),
(177, '7269Mercedes-Benz-CLS2.jp', 27, '7269Mercedes-Benz-CLS2.jpg', 0),
(179, '12459mercedes e1.jpg', 28, '12459mercedes e1.jpg', 0),
(180, '776mercedes e03.jpg', 28, '776mercedes e03.jpg', 0),
(181, '4175mercedes e01.jpg', 28, '4175mercedes e01.jpg', 0),
(182, '13242Mercedes ec1.jpg', 29, '13242Mercedes ec1.jpg', 0),
(183, '25195mercedes ec2.jpg', 29, '25195mercedes ec2.jpg', 0),
(184, '12744mercedes ec3jpg.jpg', 29, '12744mercedes ec3jpg.jpg', 0),
(185, '32476volkswagen.0.jpg', 30, '32476volkswagen.0.jpg', 0),
(186, '15333Volkswagen-Passat-Ex', 30, '15333Volkswagen-Passat-Exterior-1.jpg', 0),
(187, '30394Volkswagen-Passat-Fr', 30, '30394Volkswagen-Passat-Front-0.jpg', 0),
(188, '17542volkswagen-9.jpg', 9, '17542volkswagen-9.jpg', 0),
(189, '22646volkswagen-beetle-1.', 9, '22646volkswagen-beetle-1.jpg', 0),
(190, '19828volkswagen-beetle-6.', 9, '19828volkswagen-beetle-6.jpg', 0),
(191, '2278volkswagen-vento1.jpg', 31, '2278volkswagen-vento1.jpg', 0),
(192, '3623volkswagen-vento2jpg.', 31, '3623volkswagen-vento2jpg.jpg', 0),
(193, '6356volkswagen-vento3.jpg', 31, '6356volkswagen-vento3.jpg', 0),
(194, '26051volkswagen touareg 0', 0, '26051volkswagen touareg 01.jpg', 0),
(195, '28224volkswagen touareg 1', 0, '28224volkswagen touareg 1.jpg', 0),
(196, '8569volkswagen touareg 3.', 0, '8569volkswagen touareg 3.jpg', 0),
(197, '8978volkswagen touareg 01', 32, '8978volkswagen touareg 01.jpg', 0),
(198, '6883volkswagen touareg 1.', 32, '6883volkswagen touareg 1.jpg', 0),
(199, '19680volkswagen touareg 3', 32, '19680volkswagen touareg 3.jpg', 0),
(200, '4732volkswagen polo3.jpg', 33, '4732volkswagen polo3.jpg', 0),
(201, '22277Volkswagen-Polo2.jpg', 33, '22277Volkswagen-Polo2.jpg', 0),
(202, '17242Volkswagen-Polo-Exte', 33, '17242Volkswagen-Polo-Exterior1.jpg', 0),
(203, '241582013-volkswagen-01.j', 0, '241582013-volkswagen-01.jpg', 0),
(204, '5752013-volkswagen-2.jpg', 0, '5752013-volkswagen-2.jpg', 0),
(205, '222842013-volkswagen3.jpg', 0, '222842013-volkswagen3.jpg', 0),
(206, '241932013-volkswagen-01.j', 0, '241932013-volkswagen-01.jpg', 0),
(207, '151422013-volkswagen-2.jp', 0, '151422013-volkswagen-2.jpg', 0),
(208, '295432013-volkswagen3.jpg', 0, '295432013-volkswagen3.jpg', 0),
(209, '25021volkswagen-01.jpg', 0, '25021volkswagen-01.jpg', 0),
(210, '25522volkswagen-2.jpg', 0, '25522volkswagen-2.jpg', 0),
(211, '24323volkswagen3.jpg', 0, '24323volkswagen3.jpg', 0),
(212, '23737volkswagen-01.jpg', 0, '23737volkswagen-01.jpg', 0),
(213, '2302volkswagen-2.jpg', 0, '2302volkswagen-2.jpg', 0),
(214, '26719volkswagen3.jpg', 0, '26719volkswagen3.jpg', 0),
(215, '13720Maruti_Kizashi_01.jp', 34, '13720Maruti_Kizashi_01.jpg', 0),
(216, '20977Maruti_Kizashi_1.jpg', 34, '20977Maruti_Kizashi_1.jpg', 0),
(217, '470Maruti_Kizashi_2.jpg', 34, '470Maruti_Kizashi_2.jpg', 0),
(218, '11351Maruti_Kizashi_3.jpg', 34, '11351Maruti_Kizashi_3.jpg', 0),
(219, '18918marutisuzuki-sx3.jpg', 5, '18918marutisuzuki-sx3.jpg', 0),
(220, '393marutisuzuki-sx4.jpg', 5, '393marutisuzuki-sx4.jpg', 0),
(221, '7213marutisuzuki-sx42.jpg', 5, '7213marutisuzuki-sx42.jpg', 0),
(222, '20349Maruti_Celerio_1.jpe', 0, '20349Maruti_Celerio_1.jpeg', 0),
(223, '7794Maruti_Celerio_2.jpeg', 0, '7794Maruti_Celerio_2.jpeg', 0),
(224, '25283Maruti_Celerio_3.jpe', 0, '25283Maruti_Celerio_3.jpeg', 0),
(225, '4023Maruti_Celerio_1.jpeg', 35, '4023Maruti_Celerio_1.jpeg', 0),
(226, '8996Maruti_Celerio_2.jpeg', 35, '8996Maruti_Celerio_2.jpeg', 0),
(227, '7821Maruti_Celerio_3.jpeg', 35, '7821Maruti_Celerio_3.jpeg', 0),
(228, '19856Maruti_Swift_1.jpg', 36, '19856Maruti_Swift_1.jpg', 0),
(229, '5769Maruti_Swift_2.jpg', 36, '5769Maruti_Swift_2.jpg', 0),
(230, '1678Maruti_Swift_3.jpg', 36, '1678Maruti_Swift_3.jpg', 0),
(231, '12222maruti-swift-dzire-1', 37, '12222maruti-swift-dzire-1.jpg', 0),
(232, '26655maruti-swift-dzire-2', 37, '26655maruti-swift-dzire-2.jpg', 0),
(233, '30572maruti-swift-dzire3.', 37, '30572maruti-swift-dzire3.jpg', 0),
(234, '4677maruti-suzuki-estilo-', 38, '4677maruti-suzuki-estilo-1.jpg', 0),
(235, '32154maruti-suzuki-estilo', 38, '32154maruti-suzuki-estilo-2.jpg', 0),
(236, '5835maruti-suzuki-estilo-', 38, '5835maruti-suzuki-estilo-4.jpg', 0),
(237, '776801_chevrolet_spark_ve', 11, '776801_chevrolet_spark_velvet_red.jpg', 0),
(238, '20019Chevrolrt 4.jpg', 11, '20019Chevrolrt 4.jpg', 0),
(239, '22972Chevrolet-Spark-1.jp', 11, '22972Chevrolet-Spark-1.jpg', 0),
(240, '9189chevcruze_1_.jpg', 39, '9189chevcruze_1_.jpg', 0),
(241, '16058chevcruze_2.jpg', 39, '16058chevcruze_2.jpg', 0),
(242, '4459chevycruze_body_3.jpg', 39, '4459chevycruze_body_3.jpg', 0),
(243, '13512chevycruze_body_4.jp', 39, '13512chevycruze_body_4.jpg', 0),
(244, '30870captiva_2.jpg', 40, '30870captiva_2.jpg', 0),
(245, '15383chevcaptiva_1.jpg', 40, '15383chevcaptiva_1.jpg', 0),
(246, '18436chevcaptiva_3.jpg', 40, '18436chevcaptiva_3.jpg', 0),
(247, '4589chevcaptiva4.jpg', 40, '4589chevcaptiva4.jpg', 0),
(248, '7508beat_1.jpg', 41, '7508beat_1.jpg', 0),
(249, '17661beat_2.jpg', 41, '17661beat_2.jpg', 0),
(250, '9714beat_3.jpg', 41, '9714beat_3.jpg', 0),
(251, '5187beat_4.jpg', 41, '5187beat_4.jpg', 0),
(252, '120942014-chevrolet-ss-3_', 0, '120942014-chevrolet-ss-3_102.jpg', 0),
(253, '127032014-chevrolet-ss-4_', 0, '127032014-chevrolet-ss-4_102.jpg', 0),
(254, '171322014-chevrolet-ss-5_', 0, '171322014-chevrolet-ss-5_102 (1).jpg', 0),
(255, '223772014-chevrolet-1.jpg', 0, '223772014-chevrolet-1.jpg', 0),
(256, '260942014-chevrolet-2.jpg', 0, '260942014-chevrolet-2.jpg', 0),
(257, '67992014-chevrolet-3.jpg', 0, '67992014-chevrolet-3.jpg', 0),
(258, '32062014-chevrolet-1.jpg', 0, '32062014-chevrolet-1.jpg', 0),
(259, '228552014-chevrolet-2.jpg', 0, '228552014-chevrolet-2.jpg', 0),
(260, '218762014-chevrolet-3.jpg', 0, '218762014-chevrolet-3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `salesid` int(10) NOT NULL AUTO_INCREMENT,
  `vehid` int(10) NOT NULL,
  `custid` int(10) NOT NULL,
  `showroomid` int(10) NOT NULL,
  `vehcost` float(10,2) NOT NULL,
  `taxid` int(10) NOT NULL,
  `ord_date` date NOT NULL,
  `del_date` date NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`salesid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `vehid`, `custid`, `showroomid`, `vehcost`, `taxid`, `ord_date`, `del_date`, `description`, `status`) VALUES
(20, 10, 51, 26, 780000.00, 0, '2014-03-19', '2014-04-03', 'good', 'Pending'),
(21, 11, 52, 25, 3.00, 0, '2014-03-20', '2014-04-04', 'good car', 'Pending'),
(22, 9, 53, 26, 900000.00, 0, '2014-03-20', '2014-04-04', 'THIS IS A BRAND NEW CAR,AND I LOVE IT!!! ', 'Pending'),
(23, 7, 50, 25, 780000.00, 0, '2014-03-20', '2014-04-04', 'this is good vehicle', 'Pending'),
(24, 16, 54, 24, 799000.00, 0, '2014-03-20', '2014-04-04', 'the best car....!!!', 'Pending'),
(25, 22, 56, 27, 4300000.00, 1, '2014-03-22', '2014-04-06', 'GOOD CAR', 'Pending'),
(26, 13, 57, 36, 468000.00, 1, '2014-03-24', '2014-04-08', 'no comment', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `showroom`
--

CREATE TABLE IF NOT EXISTS `showroom` (
  `showroomid` int(10) NOT NULL AUTO_INCREMENT,
  `dealerid` int(10) NOT NULL,
  `showroomname` varchar(200) NOT NULL,
  `imagepath` varchar(200) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`showroomid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `showroom`
--

INSERT INTO `showroom` (`showroomid`, `dealerid`, `showroomname`, `imagepath`, `contactno`, `address`, `city`, `state`, `pincode`, `status`) VALUES
(23, 29, 'Maruthi showroom', '29890marutishowroom1.jpg', '7895486214', 'Maruthi Showroom,\r\nMangalore', 'Mangalore', 'Karnataka', '589745', 'Enabled'),
(24, 30, 'Hyundai Showroom', '12562hyndaiB.jpg', '8894571277', 'Hyundai Showroom,\r\ns.r road,\r\nBangalore', 'Bangalore', 'Karnataka', '587478', 'Enabled'),
(25, 33, 'Chevrolet Showroom', '12878ChevroletShowroom_02.jpg', '7413574861', 'Chevrolet Showroom,\r\nBangalore', 'Bangalore', 'Karnataka', '784578', 'Enabled'),
(26, 32, 'Volkswagen showroom', '425volkswagen1.jpg', '9854708965', 'Volkswagen showroom,\r\nMangalore.', 'Mangalore', 'Karnataka', '544122', 'Enabled'),
(27, 34, 'Audi Showroom', '24882audiahowroom.jpg', '7847845963', 'm.h road,\r\nGoa', 'Goa', 'Goa', '587478', 'Enabled'),
(28, 34, 'Audi Showroom', '22592audi.jpg', '7457965411', 'Hampankatta road,\r\nMangalore', 'Mangalore', 'Karnataka', '572133', 'Enabled'),
(29, 34, 'Audi Showroom', '18622audi-bhopal-showroom-exterior-shot-1_560x420.jpg', '8787965147', 'p.v.r circle,\r\nBangalore', 'Bangalore', 'Karnataka', '587455', 'Enabled'),
(30, 34, 'Audi Showroom', '29318audii.jpg', '7412369877', 'kt road,\r\nKerala', 'Kerala', 'Kerala', '784789', 'Enabled'),
(31, 33, 'Chevrolet Showroom', '28500chervolet.jpg', '789547856', 'n.h road,\r\nBangalore', 'Bangalore', 'Karnataka', '587478', 'Enabled'),
(32, 33, 'Chevrolet Showroom', '14444chervolet3.jpg', '9988745621', 'jyothi circle,\r\nMangalore', 'Mangalore', 'Karnataka', '577224', 'Enabled'),
(33, 33, 'Chevrolet Showroom', '17208chervolet2.jpg', '8741122554', 'mayur mahal,\r\nMysore', 'Mysore', 'Karnataka', '445745', 'Enabled'),
(34, 30, 'Hyundai Showroom', '23611hyndai1.jpg', '8821470963', 'mount circle,\r\nGoa', 'Goa', 'Goa', '321456', 'Enabled'),
(35, 30, 'Hyundai Showroom', '32501hyndai5.jpg', '9008877445', 'guar road,\r\nKerala', 'Kerala', 'Kerala', '587478', 'Enabled'),
(36, 30, 'Hyundai Showroom', '22296classic-hyundai-showroom.gif', '7847854000', 'h.g complex,\r\nMangalore', 'Mangalore', 'Karnataka', '577224', 'Enabled'),
(37, 29, 'Maruthi showroom', '3651maru.jpg', '789654890', 'light house road,\r\nGoa', 'Goa', 'Select', '478965', 'Enabled'),
(38, 29, 'Maruthi showroom', '14114maruthi.jpg', '8879700011', 'hashka road,\r\nBangalore', 'Bangalore', 'Karnataka', '560040', 'Enabled'),
(39, 32, 'Volkswagen showroom', '31458volkswagen1T.jpg', '7569012651', 't.k road,\r\nBangalore', 'bangalore', 'Karnataka', '560040', 'Enabled'),
(40, 32, 'Volkswagen showroom', '10096volkswagen3.jpg', '8700145211', 'pals road,\r\nGoa', 'Goa', 'Goa', '478965', 'Enabled'),
(41, 32, 'Volkswagen showroom', '12694volkswagen.jpg', '8521479630', 'firak road,\r\nKerala', 'Kerala', 'Kerala', '445745', 'Enabled'),
(42, 35, 'Mercedes Showroom', '6828mercedes benze.jpg', '8745963210', 'jain road,\r\nBangalore', 'Bangalore', 'Karnataka', '587478', 'Enabled'),
(43, 35, 'Mercedes Showroom', '32522mercedes.jpg', '7548965210', 'Falnir road,\r\nMangalore', 'Mangalore', 'Karnataka', '577224', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `taxid` int(10) NOT NULL AUTO_INCREMENT,
  `taxdescription` text NOT NULL,
  `tax` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`taxid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`taxid`, `taxdescription`, `tax`, `status`) VALUES
(1, 'tax', 75.00, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehid` int(10) NOT NULL AUTO_INCREMENT,
  `dealerid` int(10) NOT NULL,
  `vehname` varchar(50) NOT NULL,
  `vehmodel` varchar(50) NOT NULL,
  `vehtype` varchar(15) NOT NULL,
  `vehdescription` text NOT NULL,
  `vehcost` decimal(10,2) NOT NULL,
  `createdat` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`vehid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehid`, `dealerid`, `vehname`, `vehmodel`, `vehtype`, `vehdescription`, `vehcost`, `createdat`, `status`) VALUES
(5, 29, 'Maruthi Suzuki SX4', 'SX4', 'Petrol', 'The new Maruti SX4 sedan is finally here and it has a host of improvements. The SX4 has huge ground clearance and that adds to the presence. The prices for the new SX4 are unchanged over the earlier one and it is good value for money.', '450000.00', '0000-00-00', 'Enabled'),
(9, 32, 'volkswagen beetle', 'volkswagen-new-beetle-', 'Petrol', 'Volkswagen Group, the worldâ€™s third largest automobile manufacturer, launched its world famous luxurious small car â€œNew Beetleâ€ in India in December 2009.', '2100000.00', '0000-00-00', 'Enabled'),
(11, 33, 'Chevrolet spark', 'chevrolet-spark', 'Petrol', 'General Motors has released the Chevrolet Spark facelift version an unchanged price of Rs.3.16 lakh (ex-showroom New Delhi).Expressive exterior design, stylish interiors and some really smart features; it this fuel efficient car comes with a combination so suave that itâ€™s sure to turn those heads, twice! A feast for your eyes and senses, this smart piece of engineering is cut out to add oomph to your drive and charisma to your personality.', '750000.00', '0000-00-00', 'Enabled'),
(13, 30, 'Hyundai-xcent', 'Hyundai_Xcent', 'Petrol', ' The most awaited mid-size sedan, Xcent from Hyundai is finally launched today at a mesmerizing price of Rs 4.66 lakh.', '468000.00', '0000-00-00', 'Enabled'),
(16, 30, 'Hyundai grand-i10', 'hyundai grand-i10', 'Petrol', 'The new Hyundai Grand-i10 model series has been launched with both petrol and diesel engine based variants, which churn out a healthy mileage. This is one of the most important aspects of any car and this hatchback series certainly has a good mileage within the city limits as well as on the highway.', '799000.00', '0000-00-00', 'Enabled'),
(17, 34, 'Audi', 'Al8', 'Diesel', 'A8 is a luxury sedan, manufactured by one of the leading German carmakers - Audi. The car, launched in India, has been specifically designed to suit Indian driving conditions and the needs of the consumers in the country.', '150000.00', '0000-00-00', 'Enabled'),
(18, 34, 'Audi Q3', 'Q3', 'Petrol', 'The vehicles offered by Audi are for those who enjoy the finer tastes in life. For enthusiasts and Audi aficionados, photos and technical specifications further fuel the desire to understand and gain more knowledge on their favourite vehicle.', '2580000.00', '0000-00-00', 'Enabled'),
(19, 34, 'Audi TT', 'TT', 'Diesel', 'Audi TT comes in following versions with 1 engine and 1transmission and 1 fuel options.Audi TT Coupe is truly a fascinating car from every perspective. The petrol-driven vehicle offers mind-blowing top speed.', '5300000.00', '2014-03-21', 'Enabled'),
(20, 34, 'Audi S6', 'S6', 'Petrol', 'Audi S6 is the sporty sibling of the A6 that will debut on Indian soil on 12 July. The S6 will distinguish itself from the A6 by being available in at least one bright colour.', '8700000.00', '0000-00-00', 'Enabled'),
(21, 34, 'Audi RS5', 'RS5', 'Petrol', 'The Audi RS7 is the most powerful Audi in production and will keep up with almost every Supercar on the street while keeping the occupants reasonably comfortable', '12800000.00', '0000-00-00', 'Enabled'),
(22, 34, 'Audi Q5', 'Q5', 'Petrol', 'The Audi Q5 is a perfect combination of sporty dynamism offered in a sedan combined with highly variable interiors that offer versatile options for leisure or business use. Strong and efficient engines.', '4300000.00', '2014-03-21', 'Enabled'),
(23, 30, 'Hyundai Verna', 'Verna', 'Diesel', 'Hyundai has transformed their Verna into its latest iterant the Verna Fluidic. It is the latest and improved upgrade over the old Verna and is one of the best looking cars in the premium class mid-size sedan segment.', '7510000.00', '0000-00-00', 'Enabled'),
(24, 30, 'Hyundai EON', 'EON', 'Petrol', 'EON gives more dynamic look with its side charcter lines and its sloping\r\nroofline with its unique arc style is smooth and seductive to the viewer', '320000.00', '0000-00-00', 'Enabled'),
(25, 30, 'Hyundai Elantra', 'Elantra', 'Petrol', 'The Elantra looks fantastic and is a welcome change among models that need a serious wardrobe revamp', '1278000.00', '0000-00-00', 'Enabled'),
(26, 35, 'Mercedes-Benz', 'SLK', 'Diesel', 'Mercedes-Benz SLK-Class comes in following versions with 2 engine and 1 transmission.', '7501000.00', '2014-03-21', 'Enabled'),
(27, 35, 'Mercedes-Benz', 'CLS', 'Petrol', 'Mercedes-Benz CLS comes in following versions with 1 engine and 1transmission and 1 fuel options. ', '3484000.00', '2014-03-21', 'Enabled'),
(28, 35, 'Mercedes-Benz', 'E CLASS', 'Petrol', 'The Mercedes-Benz E-Class is a range of executive cars manufactured by Mercedes-Benz in various engine and body configurations.', '5070000.00', '0000-00-00', 'Enabled'),
(29, 35, 'Mercedes-Benz E class', 'E class coupe', 'Diesel', 'Mercedes-Benz E-Class Coupe range car review by the expert drivers covering comfort, performance, coolness, quality, handing, practicality and running costs.', '7980000.00', '2014-03-21', 'Enabled'),
(30, 32, 'volkswagen passat', 'passat', 'Petrol', 'Making driving on City roads a little bit bearable is the Volkwagen Passat.The Volkswagen Passat is the largest and most spacious car in the Volkswagen car line-up after the Volkswagen Phaeton', '2207000.00', '2014-03-22', 'Enabled'),
(31, 32, 'volkswagen vento', 'vento', 'Diesel', 'New Volkswagen Vento 2011 is among most recent additions to the C+ car segment in India. The appealing Volkswagen Vento is an extended version of the hatchback Volkswagen Polo', '754000.00', '2014-03-22', 'Enabled'),
(32, 32, 'Volkswagen Touareg', 'Touareg', 'Petrol', 'Volkswagen (VW) is one of the world''s largest automobile manufacturers. The company is headquartered in Wolfsburg, Lower Saxony, Germany', '4700000.00', '2014-03-22', 'Enabled'),
(33, 32, 'Volkswagen polo', 'Polo ', 'Petrol', 'After Volkswagen unveiled the Polo at the Auto Expo in Delhi earlier this year, the Polo has already garnered much attention among car enthusiasts', '496000.00', '2014-03-22', 'Enabled'),
(34, 29, 'Maruthi Khizashi', 'Khizashi', 'Petrol', 'As Maruti Suzuki venture into the as yet unexplored luxury car segment with the Kizashi, the designers seem to have taken inspiration from an athlete in motion. The Kizashi now is only available on order. It is priced at Rs 17.6  to 18.2 ex-showroom New Delhi', '165000.00', '0000-00-00', 'Enabled'),
(35, 29, 'Maruti Celerio', 'Celerio', 'Petrol', 'he Maruti Celerio is a step-up from both the A-Star and the Estilo hatchback. The Celerio will be sold in a total of five versions - 3 manual and 2 automatic. ', '450000.00', '0000-00-00', 'Enabled'),
(36, 29, 'Maruti Swift', 'LXI', 'Petrol', 'The new Swift carries on the same DNA while taking it to a new higher level. There are changes no doubt to all angles of the car but first look at the new Swift, and you can easily pass it on as the previous one.', '670000.00', '0000-00-00', 'Enabled'),
(37, 29, 'Maruti Swift Dzire', 'Dzire LDI', 'Petrol', 'The car maker has equipped all the diesel variants of compact sedan with a 4-cylinder, 1.3-litre, DDiS based diesel power plant that has 1248cc displacement capacity. This engine is designed with a common rail.', '689000.00', '0000-00-00', 'Enabled'),
(38, 29, 'Maruti Suzuki Estilo', 'Estilo VXI', 'Petrol', 'Maruti Suzuki Estilo has come a long way from its Zen days. The Zen has come off as a small car with go-kart look and feel. With Estilo, the brand has evolved in both its design and size. ', '384.00', '2014-03-23', 'Enabled'),
(39, 33, 'Chevrolet Cruze', 'Cruze', 'Petrol', 'The Chevrolet Cruze is a compact car produced by the Chevrolet division of the American manufacturer General Motors (GM) since 2008. The car was originally intended to be used by Jason Plato in 2012 but RML and Chevrolet withdrew from the BTCC', '475000.00', '2014-03-23', 'Enabled'),
(40, 33, 'Chevrolet Captiva', 'Captiva', 'Petrol', 'The Chevrolet Captiva is a compact SUV developed by GM Daewoo (now GM Korea), the South Korean subsidiary of General Motors (GM), and sold under the Chevrolet brand.For the Captiva, the production version of the S3X, both five- or seven-seat configurations are available', '524000.00', '2014-03-23', 'Enabled'),
(41, 33, 'Chevrolet Beat', 'Beat', 'Petrol', 'The redesigned Matiz (codenamed M300) was launched in 2009 and is based on the 2007 Chevrolet Beat concept car. India this model retains the Beat name from the concept car, as the second generation Spark continues to be sold in this market. ', '458000.00', '2014-03-23', 'Enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
