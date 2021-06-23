-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2020 at 06:36 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(25) NOT NULL,
  `password` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin1@gmail.com', 12345),
(2, 'admin2@gmail.com', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`bid`, `brand`) VALUES
(1, 'yamaha'),
(2, 'korg'),
(3, 'roland'),
(4, 'dz strand'),
(5, 'pearl'),
(6, 'mapex'),
(7, 'tama'),
(8, 'tornado'),
(9, 'stentor'),
(10, 'mendini'),
(11, 'fender'),
(12, 'gibson'),
(13, 'seagull'),
(14, 'tylor'),
(15, 'casio');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `city`) VALUES
(1, 'ernakulam'),
(2, 'kottayam'),
(3, 'alappuzha'),
(4, 'thrissur'),
(5, 'idukki'),
(6, 'trivandrum');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `c_id` int(50) NOT NULL AUTO_INCREMENT,
  `p_id` int(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `p_id_fk` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `p_id`, `phone`, `city`, `address`) VALUES
(1, 1, '9876543210', 'ernakulam', 'mg road,\r\nenakulam'),
(2, 2, '8976541231', 'thrissur', 'near ksrtc,\r\nthrissur'),
(3, 3, '9654785123', 'kottayam', 'athirampuzha,\r\nkottayam'),
(4, 4, '9632105874', 'alappuzha', 'harippad,\r\nalappuzha'),
(6, 5, '8957451236', 'ernakulam', 'mg road,ernakulam');

-- --------------------------------------------------------

--
-- Table structure for table `contviewer`
--

DROP TABLE IF EXISTS `contviewer`;
CREATE TABLE IF NOT EXISTS `contviewer` (
  `view_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `vpassword` varchar(50) NOT NULL,
  PRIMARY KEY (`view_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `f_id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `email`, `feedback`) VALUES
(1, '123@gmail.com', 'hello'),
(2, '12@gmail.com', 'testing'),
(3, '1@gmail.com', 'hello'),
(4, 'a@gmail.com', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `downloads`) VALUES
(1, 'mp.pdf', 12062, 2),
(2, 'mp final.docx', 24387, 2),
(3, 'ch10-dma.pdf', 303265, 1);

-- --------------------------------------------------------

--
-- Table structure for table `instposter`
--

DROP TABLE IF EXISTS `instposter`;
CREATE TABLE IF NOT EXISTS `instposter` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_password` varchar(50) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instposter`
--

INSERT INTO `instposter` (`p_id`, `email`, `p_name`, `p_password`) VALUES
(1, 'anu@gmail.com', 'anu', '1234'),
(2, 'binu@gmail.com', 'binu', '1234'),
(3, 'dinu@gmail.com', 'dinu', '1234'),
(4, 'ginu@gmail.com', 'ginu', '1234'),
(5, 'hinu@gmail.com', 'hinu', '12345'),
(6, 'jinu@gmail.com', 'jinu', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `iname` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `img1` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `rentperday` int(20) NOT NULL,
  `advance` int(11) NOT NULL,
  `overview` varchar(200) NOT NULL,
  `pick` varchar(20) NOT NULL,
  `kepo` varchar(20) NOT NULL,
  `stand` varchar(20) NOT NULL,
  `footpedal` varchar(20) NOT NULL,
  `adapter` varchar(20) NOT NULL,
  `stick` varchar(20) NOT NULL,
  PRIMARY KEY (`iid`),
  KEY `p_id_fk` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instrument`
--

INSERT INTO `instrument` (`iid`, `p_id`, `iname`, `brand`, `model`, `img1`, `status`, `rentperday`, `advance`, `overview`, `pick`, `kepo`, `stand`, `footpedal`, `adapter`, `stick`) VALUES
(1, 1, 'drums', 'pearl', '0021', 'images/h6', 0, 500, 5000, 'Set the stage on fire with this Acoustic Drum set from the house of PEARL. It is an excellent drum kit delivering great specifications.', 'not included', 'not included', 'not included', 'not included', 'not included', 'included'),
(2, 2, 'drums', 'tornado', 'T01', 'images/h7', 0, 550, 5000, 'It is an excellent drum kit delivering great specifications. Made from premium quality material, this set of 5 pieces is sturdy will last for a long time.', 'not included', 'not included', 'not included', 'not included', 'not included', 'included'),
(3, 3, 'drums', 'pearl', 'P87', 'images/h6', 0, 550, 5000, 'Set the stage on fire with this Acoustic Drum set from the house of Pearl.', 'not included', 'not included', 'not included', 'not included', 'not included', 'included'),
(4, 4, 'drums', 'tornado', 'T012', 'images/h7', 0, 570, 5000, 'Set the stage on fire with this Acoustic Drum set made from premium quality material.', 'not included', 'not included', 'not included', 'not included', 'not included', 'included'),
(5, 1, 'drums', 'mapex', 'Map98', 'images/h10', 0, 600, 5600, 'Set the stage on fire with this Acoustic Drum set ', 'not included', 'not included', 'not included', 'not included', 'not included', 'included'),
(6, 2, 'drums', 'tama', 'TA01', 'images/h9', 0, 560, 5000, 'Set the stage on fire with this instrument.', 'not included', 'not included', 'not included', 'not included', 'not included', 'included'),
(7, 3, 'violin', 'dz strad', '800', 'images/h20', 0, 250, 2000, 'Amazing instrument', 'not included', 'not included', 'not included', 'not included', 'not included', 'not included'),
(8, 4, 'violin', 'yamaha', 'y265', 'images/h21', 0, 270, 2400, 'Set stage on fire with these instrument', 'not included', 'not included', 'not included', 'not included', 'not included', 'not included'),
(9, 1, 'violin', 'stentor', 's987', 'images/h21', 0, 250, 2900, 'Ideal instrument for all level of performance', 'not included', 'not included', 'not included', 'not included', 'not included', 'not included'),
(10, 2, 'violin', 'mendini', 'm865', 'images/h22', 0, 250, 2500, 'Amazing instrument', 'not included', 'not included', 'not included', 'not included', 'not included', 'not included'),
(11, 3, 'violin', 'yamaha', 'y25', 'images/h23', 0, 290, 2900, 'Ideal for all level of peformance', 'not included', 'not included', 'not included', 'not included', 'not included', 'not included'),
(12, 4, 'violin', 'stentor', 'str756', 'images/h24', 0, 350, 2000, 'Best for stage performance', 'not included', 'not included', 'not included', 'not included', 'not included', 'not included'),
(13, 1, 'keyboard', 'yamaha', 'psr775', 'images/h28', 0, 900, 6000, 'Best for beginners and intermediate performers', 'not included', 'not included', 'included', 'included', 'included', 'not included'),
(14, 2, 'keyboard', 'korg', 'pa800', 'images/h29', 0, 1000, 6000, 'Amazing instrument for stage performance', 'not included', 'not included', 'included', 'included', 'included', 'not included'),
(15, 3, 'keyboard', 'korg', 'pa900', 'images/h30', 0, 2000, 6000, 'Best for stage performance. Highly recommended for recording.', 'not included', 'not included', 'included', 'included', 'included', 'not included'),
(16, 4, 'keyboard', 'roland', 'bk3', 'images/h31', 0, 1100, 6000, 'suitable for professionals', 'not included', 'not included', 'not included', 'included', 'included', 'not included'),
(17, 1, 'keyboard', 'roland', 'bk4', 'images/h32', 0, 1200, 6000, 'Ideal for recording as well as stage performance.', 'not included', 'not included', 'included', 'included', 'included', 'not included'),
(18, 2, 'keyboard', 'korg', 'pa850', 'images/h33', 0, 900, 3000, 'Best for professionals', 'not included', 'not included', 'included', 'included', 'included', 'not included'),
(19, 3, 'guitar', 'yamaha', 'f280', 'images/h11', 0, 250, 2000, 'Amazing instrument', 'included', 'included', 'not included', 'not included', 'not included', 'not included'),
(20, 4, 'guitar', 'fender', 'f870', 'images/h12', 0, 300, 3000, 'Fender guitar for rent', 'included', 'included', 'not included', 'not included', 'not included', 'not included'),
(21, 1, 'guitar', 'gibson', 'gb657', 'images/h13', 0, 550, 5000, 'Gibson instrument for rent', 'included', 'included', 'not included', 'not included', 'not included', 'not included'),
(22, 2, 'guitar', 'seagull', 'se678', 'images/h14', 0, 425, 4000, 'Best sound quality', 'included', 'included', 'not included', 'not included', 'not included', 'not included'),
(23, 3, 'guitar', 'taylor', 'tay654', 'images/h15', 0, 450, 4000, 'Best for all players', 'included', 'included', 'not included', 'not included', 'not included', 'not included'),
(24, 4, 'guitar', 'yamaha', 'yh212', 'images/h16', 0, 400, 1000, 'Amazing instrument', 'included', 'included', 'not included', 'not included', 'not included', 'not included'),
(25, 2, 'guitar', 'fender', 'f543', 'images/h16', 0, 255, 1000, 'Amazing for stage ', 'included', 'included', 'not included', 'not included', 'not included', 'not included');

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

DROP TABLE IF EXISTS `instruments`;
CREATE TABLE IF NOT EXISTS `instruments` (
  `ins_id` int(11) NOT NULL AUTO_INCREMENT,
  `instrument` varchar(50) NOT NULL,
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`ins_id`, `instrument`) VALUES
(1, 'keyboard'),
(2, 'guitar'),
(3, 'violin'),
(4, 'drums');

-- --------------------------------------------------------

--
-- Table structure for table `regupload`
--

DROP TABLE IF EXISTS `regupload`;
CREATE TABLE IF NOT EXISTS `regupload` (
  `up_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `upname` varchar(25) NOT NULL,
  `rpassword` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`up_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `instposter` (`p_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `instrument`
--
ALTER TABLE `instrument`
  ADD CONSTRAINT `instrument_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `instposter` (`p_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
