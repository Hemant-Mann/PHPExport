-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 10:01 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpexport`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(12) unsigned NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `price`, `description`, `image`) VALUES
(1, 'Mobiles and Tablets', 'Moto G', 7000, '<p>Moto G in good condition purchased in January 2014.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pulvinar arcu pulvinar, dictum turpis vel, semper risus. Curabitur ac augue et felis tempor molestie. Fusce ligula libero, dignissim eget ultrices ut, varius sit amet massa. Curabitur luctus nulla non lacus malesuada, eget elementum arcu lacinia. Fusce et metus non nulla sodales hendrerit. Aenean vitae enim nunc. Integer ultrices erat ac nunc commodo, in mattis mi viverra. Nullam et vehicula orci.</p>', 'moto_g.jpg'),
(2, 'Vehicles', 'Indica Vista', 200000, '<p>Indica Vista purchased in 2011 travelled a total of 50,000 km. Price is negotiable.</p>\r\n<p>Sed accumsan, odio at vestibulum viverra, magna magna cursus mi, a venenatis nibh enim sagittis felis. Suspendisse elit tortor, dictum a est in, sollicitudin laoreet purus. Nullam quis porta tortor. Suspendisse potenti. Suspendisse commodo pulvinar arcu nec fringilla. Pellentesque dignissim scelerisque elit, nec sollicitudin turpis sodales ut. Sed eget elementum augue, non dapibus dui. Aenean non rhoncus nisi. Fusce non sem suscipit, posuere risus et, adipiscing ante. Maecenas nec neque ac urna bibendum viverra eu a eros. Maecenas quis eros a lorem blandit euismod sit amet venenatis leo. Praesent a justo ut turpis tristique volutpat. Sed volutpat felis eget enim laoreet, ac porttitor eros interdum.</p>', 'indica_vista.jpg'),
(6, 'Electronics and Computer', 'HP Pavillion', 37000, '<p>HP Laptop White in color, 6GB RAM, 2GB NVIDIA GeForce 740M, 1TB Hard Disk, Windows 8.1, 15.6 inches screen in excellent condition.</p>\r\n<p>Praesent volutpat, mauris vitae feugiat ullamcorper, quam neque tristique risus, rhoncus tempus tellus metus imperdiet tellus. Duis dolor diam, posuere fermentum est in, convallis condimentum nisl. Suspendisse a nisl vitae velit accumsan pretium sed at quam. Aliquam tincidunt in odio in scelerisque.</p>', 'hp_laptop.jpg'),
(10, 'Clothing and Accessories', 'Shirt', 1000, '<p>Designer Shirt size XL<p>\r\n<p> Nulla faucibus, est a interdum volutpat, sem neque interdum dui, aliquam accumsan velit sapien nec purus. Integer quis massa vel odio viverra molestie. Duis rhoncus posuere felis. Proin lobortis feugiat dui, eget posuere mauris aliquet ut. Integer sagittis lacinia varius. Aenean sit amet nunc mauris. Aenean sed lobortis justo, non pharetra justo.</p>', 'shirt.jpg'),
(17, 'Sports Item', 'Football', 300, '<p>Reebok Football</p>\r\n<p>Ut lobortis elit ut lectus pretium blandit. In hac habitasse platea dictumst. Quisque euismod sit amet augue non malesuada. Etiam accumsan id tellus sed ullamcorper. Vivamus eros urna, auctor id pellentesque a, feugiat at dui. Vivamus sagittis porttitor euismod. Fusce vitae ante quis orci posuere aliquam. Nullam cursus erat eu vehicula volutpat. Maecenas ut magna risus. Nunc eu eleifend massa. </p>', 'football.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
