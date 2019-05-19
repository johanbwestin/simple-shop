-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2019 at 02:11 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cartId`),
  KEY `userId` (`userId`),
  KEY `productId` (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productBrand` varchar(255) DEFAULT NULL,
  `productPrice` decimal(10,0) DEFAULT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `pictureUrl` varchar(1000) DEFAULT NULL,
  `productDescription` text,
  `productModel` varchar(255) DEFAULT NULL,
  `productMaterial` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productBrand`, `productPrice`, `productQuantity`, `pictureUrl`, `productDescription`, `productModel`, `productMaterial`) VALUES
(4, 'Red Wing', '315', 5, 'https://www.rei.com/media/b7ff5ada-4272-4203-bca9-57b3eb6c80b2?size=784x588', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non magna velit. Curabitur in nibh finibus, dictum orci. ', '8181 Round Toe', 'Hawthorne Muleskinner Leather '),
(8, 'Scout', '123', 444, 'https://cdn.shopify.com/s/files/1/1689/4579/products/01048-scout-hat-cleaning-kit-1_500x.jpg?v=1523557420', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non magna velit. Curabitur in nibh finibus, dictum orci. ', 'Leather Cleaner/Protector', '-'),
(6, 'Red Wing', '299', 13, 'https://embed.widencdn.net/img/redwing/ymfggtyxfv/550x400px/RW03340C_MUL_N1_1015.jpeg?position=s&crop=no&color=ffffffff&u=lkbof4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non magna velit. Curabitur in nibh finibus, dictum orci. ', '3340 BLACKSMITH', 'Briar Oil Slick Leather'),
(7, 'Red Wing', '340', 13, 'https://images-na.ssl-images-amazon.com/images/I/81KaaAYRaHL._UX395_.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non magna velit. Curabitur in nibh finibus, dictum orci. ', '8111 Iron Ranger', 'Amber Harness Leather'),
(9, 'Red Wing', '350', 444, 'https://images-na.ssl-images-amazon.com/images/I/81skRZ06QtL._UX395_.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non magna velit. Curabitur in nibh finibus, dictum orci. ', '875 Classic Moc', 'Oro Legacy Leather'),
(10, 'Blundstones', '184', 30, 'https://images-na.ssl-images-amazon.com/images/I/819157sPZ3L._UX395_.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non magna velit. Curabitur in nibh finibus, dictum orci. ', '062 Dress Boot ', 'Stout brown leather');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` text,
  `lastName` text,
  `email` text,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `firstName`, `lastName`, `email`) VALUES
(7, 'test', '$2y$10$xz3q9YD2stFKVLGocuGZYOwMEvjnz4Ytf6ZfjxTWdefYwAthf79Ui', 'test', 'test2', 'test@test.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
