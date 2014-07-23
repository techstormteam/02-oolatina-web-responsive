-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2014 at 03:37 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `short_description` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `price_supplier` decimal(7,2) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `stock_quantity` int(4) NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `meta_keywords` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `short_description`, `description`, `category`, `sku`, `currency`, `price_supplier`, `price`, `status`, `stock_quantity`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'product title', 'product short description', 'product description in details.', 'Fashion', 'fs2775', 'USD', '9.55', '20.50', 'UP', 5, 'seo meta title', 'seo meta description', 'meta keywords goes here', '2014-05-22 23:39:36'),
(5, 'product title', 'product title', 'description', 'Mobiles', '38488', 'USD', '50.00', '150.00', 'UP', 5, 'seo meta title', 'seo meta keywords', 'meta keywords', '2014-05-23 01:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_imgs`
--

CREATE TABLE IF NOT EXISTS `product_imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `dnt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_imgs`
--

INSERT INTO `product_imgs` (`id`, `product_id`, `img_url`, `dnt`) VALUES
(1, 1, 'imgurl.jpg', '2014-05-22 23:41:35'),
(2, 5, '87101400808304.jpg', '2014-05-23 01:25:04'),
(3, 5, '1991400808304.jpg', '2014-05-23 01:25:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD CONSTRAINT `product_id_img` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
