-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1:3306
-- Tid vid skapande: 16 maj 2019 kl 13:23
-- Serverversion: 5.7.24
-- PHP-version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `system`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartId` int not null AUTO_INCREMENT, 
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cartId`),
  FOREIGN KEY(`userId`) REFERENCES user(`userId`),
  FOREIGN KEY(`productId`) REFERENCES product(`productId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `cart`
--


-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` text,
  `productPrice` decimal(10,0) DEFAULT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `pictureUrl` varchar(1000) DEFAULT NULL,
  `productDescription` text,
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`productId`, `productName`, `productPrice`, `productQuantity`, `pictureUrl`, `productDescription`) VALUES
(4, 'hej', '120', 5, 'https://www.rei.com/media/b7ff5ada-4272-4203-bca9-57b3eb6c80b2?size=784x588', NULL),
(8, 'afad', '123', 444, 'https://cdn.shopify.com/s/files/1/1689/4579/products/01048-scout-hat-cleaning-kit-1_500x.jpg?v=1523557420', NULL),
(6, 'hejsan', '67', 13, 'https://embed.widencdn.net/img/redwing/ymfggtyxfv/550x400px/RW03340C_MUL_N1_1015.jpeg?position=s&crop=no&color=ffffffff&u=lkbof4', NULL),
(7, 'svejsan', '67', 13, 'https://images-na.ssl-images-amazon.com/images/I/81KaaAYRaHL._UX395_.jpg', NULL),
(9, 'afad', '123', 444, 'https://images-na.ssl-images-amazon.com/images/I/81skRZ06QtL._UX395_.jpg', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `firstName`, `lastName`, `email`) VALUES
(5, 'johan', '$2y$10$kUbFqHTXf6.MLbQ43FysLOrwZ/59NNGlxmdujIrUCZY4YpWomhQty', 'johan', 'westin', 'johan@test.com'),
(6, 'johan1', '$2y$10$lDPLfc.Ff.WpWuGPNDuRlOhMkgZU6eM.deFVCHTkCTkZDTeFV6W0C', 'johan', 'westin', 'johan@test.com'),
(7, 'test', '$2y$10$xz3q9YD2stFKVLGocuGZYOwMEvjnz4Ytf6ZfjxTWdefYwAthf79Ui', 'test', 'test2', 'test@test.com'),
(8, '', '$2y$10$FR5POenjwvx.4U..8kFLp.8aucCUJlZsvtLdU6h41hKI8b1fGPHAG', '', '', ''),
(9, 'yas', '$2y$10$hLq81NdU3qrmNh6p/vZRUuvGJwYVrGzUpu8Rn27dm5OaYpyygJsle', 'yas', 'ysas', 'yas@yas'),
(10, 'admin', '$2y$10$zus5zKZRCe6KjHCZlFo4gO3CBX0owz.S4ivtDlVOZZac6VUmby0qO', 'admin', 'admin', 'admin@admin.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
