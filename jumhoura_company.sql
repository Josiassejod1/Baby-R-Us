-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2016 at 10:39 PM
-- Server version: 5.6.34
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jumhoura_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`) VALUES
(1, 'dalvin', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `Amount` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `price`, `code`, `image`, `Amount`) VALUES
(1, 'Diaper', 52.00, 'dia200', 'images/diaper.jpg', 15),
(2, 'Bottle', 25.00, 'Bot200', 'images/bottle.jpg', 9),
(3, 'Cart', 200.00, 'babycart', 'images/babycart.jpg', 10),
(4, 'Red Shirt', 8.99, 'reds', 'images/shopping.jpg', 10),
(5, 'Graphic T-Shirt', 10.99, 'GTShirt', 'images/graphic.jpg', 0),
(6, 'Santa Hat', 5.99, 'xmashat', 'images/santa-hat.jpg', 15),
(7, 'Assortment Pack of Socks', 10.99, 'babysocks', 'images/socks.jpg', 8),
(8, 'Pants Variety Pack', 20.99, 'babypants', 'images/pants.jpg', 0),
(9, 'Baby Monitor', 100.99, 'monitor', 'images/baby-monitor.jpg', 10),
(10, 'Night Light', 13.99, 'nlight', 'images/night-light.jpg', 9),
(11, 'Milk Warmer', 25.99, 'milkwarmer', 'images/milk-warmer.JPG', 10),
(12, 'Humidifier', 35.99, 'humid', 'images/humidifier.jpg', 10),
(13, 'Bib Variety Pack', 15.99, 'bibs', 'images/bibs.jpg', 9),
(14, 'Baby Breathing Monitor', 109.99, 'breathingsenor', 'images/sensor.jpg', 14),
(15, 'Formula', 15.99, 'babyformula', 'images/formula.jpg', 19),
(16, 'Snack Starter Pack', 16.99, 'snacks', 'images/snacks.jpg', 20),
(17, 'Baby Food Container Variety Pack', 9.99, 'container', 'images/container.jpg', 15),
(18, 'Breast Feeder', 55.99, 'feeder', 'images/feeder.jpg', 10),
(19, 'Baby Crib', 349.99, 'crib', 'images/crib.jpg', 25),
(20, 'Baby Cradle', 150.99, 'cradle', 'images/cradle.jpg', 25),
(21, 'Baby Car Seat', 120.99, 'carseat', 'images/car-seat.jpg', 50),
(22, 'Bassinet', 100.99, 'bassinet', 'images/bassinet.jpg', 30),
(23, 'Changing Table', 175.99, 'changing', 'images/changing-table.jpg', 14),
(24, 'Baby Walker', 50.99, 'walker', 'images/walker.jpg', 20),
(25, 'Baby Teething Toys', 5.99, 'teething', 'images/teething.JPG', 40),
(26, 'Baby Shower Toys', 10.99, 'showertoy', 'images/shower.jpg', 25),
(27, 'Baby Plush Toy (Organic Cotton)', 14.99, 'plushtoy', 'images/plush-toy.jpg', 29),
(28, 'Baby Pajamas', 13.99, 'pajamas', 'images/pajamas.png', 50),
(29, 'Baby Pacifier', 5.99, 'pacifier', 'images/pacifier.JPG', 100),
(30, 'Baby Hats', 9.99, 'hat', 'images/baby-hats.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'alaa', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(30, 'test', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb'),
(33, 'ekram', '98c1eb4ee93476743763878fcb96a25fbc9a175074d64004779ecb5242f645e6'),
(32, 'john', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
