-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 06:43 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rathings`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `caption` text COLLATE utf8_slovenian_ci NOT NULL,
  `text` text COLLATE utf8_slovenian_ci,
  `author` int(11) NOT NULL,
  `image` text COLLATE utf8_slovenian_ci,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `author` (`author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `caption`, `text`, `author`, `image`, `date`) VALUES
(2, 'Eminem reaches million subscribers', 'The most popular hip hop singer in the world\r\n hits the magic number in March 2015.', 'Spotify named rapper Marshall Bruce Eminem Mathers III as the most streamed artist of all time and pop\r\nstar Robyn Rihanna Fenty as the most streamed female artist ever, USA Today reported.\r\n Eminem and Rihanna collaborated in the song Love The Way You Lie in 2010.', 1, 'images/mobile.png', '2015-05-26 13:56:34'),
(5, 'Hyundai releases new model.', 'Don''t miss hyundai''s latest\r\nluxury car that has everythnig you need.', NULL, 1, 'images/car.png', '2015-05-28 16:31:14'),
(6, 'Samsung releases new model.', 'Samsung has once again proved to be one\r\nof the best there is in the market.', 'The Galaxy S6 line retains similarities in design to previous models, but now uses a unibody metal frame with\r\na glass backing, a curved bezel with chamfered sides to improve grip, and the speaker grille was moved to the\r\nbottom. The devices are available in "White Pearl", "Black Sapphire", and "Gold Platinum" color finishes; additional " Blue Topaz" and "Emerald Green" finishes are exclusive to the S6 and S6 Edge respectively. The S6 carries some regressions in its design over the S5; it is no longer waterproof, does not contain a MicroSD card slot, reverts to a USB 2.0 port from USB 3, and has a non-removable battery.', 1, NULL, '2015-05-28 16:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `category` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `image` text COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci NOT NULL,
  `rating` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `image`, `description`, `rating`) VALUES
(1, 'S6 Galaxy Tablet', 'Technology', 'images/phone.png', 'The newest Samsung model.', 10),
(2, 'Passat 7', 'Vehicles', 'images/car.png', 'The newest VW model.', 9.3),
(3, 'Subaru X4', 'Vehicles', 'images/car.png', 'This model has everything you need.', 10),
(4, 'Iphone 6', 'Technology', 'images/phone.png', 'The newest Apple model.', 9),
(5, 'Theory of everything', 'Books', 'images/movie.png', 'The newest Hollywood movie.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_slovenian_ci NOT NULL,
  `author_name` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `author_email` varchar(30) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `rating` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `text`, `author_name`, `author_email`, `rating`, `date`, `product`) VALUES
(1, 'Absolutely fantastic! The best mobile phone I have ever had.', 'Melanie Black', 'mblack@gmail.com', 10, '2015-05-26 14:57:16', 1),
(13, 'Totally worth the money.', 'Orhan Ljubunčić', 'orhanljubuncic@yahoo.com', 10, '2015-05-27 21:27:47', 1),
(15, 'The best movie I have ever watched.', 'John Doe', NULL, 6, '2015-05-28 16:38:18', 5),
(16, 'Better than Iphone 5 but still not perfect.', 'Maria Sharapova', 'msharapova@gmail.com', 9, '2015-05-28 16:40:52', 4),
(17, 'The best car ever!!!', 'Marcus Slowney', NULL, 10, '2015-05-28 16:40:52', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `username` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'Orhan', 'Ljubunčić', 'oljubuncic1@etf.unsa.ba', 'oljubuncic1@etf.unsa.ba', 'a722c63db8ec8625af6cf71cb8c2d939');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
