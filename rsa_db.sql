-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 06:56 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rsa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('9fki94rte254v8n46gsfjlracq20fnqt', '::1', 1547195940, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373139353934303b),
('b44r3cdojnrr22qkk597dm8832g86908', '::1', 1547315449, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373331353330343b656d61696c7c733a31353a22656d61696c40676d61696c2e636f6d223b69735f6c6f676765645f757365727c693a313b6772616e64546f74616c7c643a3738303b6f726465727c693a31353b737563636573735f6d73677c733a32363a224f7264657220706c61636564207375636365737366756c6c792e223b),
('f5kcrh267u9uq50lpo81sc3hjq7d7pbr', '::1', 1547195585, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373139353534353b),
('ns22nqsgsr1rhsv19hn2eq9me4bo2ful', '::1', 1547315773, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373331353737333b),
('veaqoi27dn4so4798j4lrudskam29avb', '::1', 1547197516, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373139373531363b);

-- --------------------------------------------------------

--
-- Table structure for table `customers_data`
--

CREATE TABLE IF NOT EXISTS `customers_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `account_number` text COLLATE utf8_bin NOT NULL,
  `card_number` text COLLATE utf8_bin NOT NULL,
  `cvv` text COLLATE utf8_bin NOT NULL,
  `pin` text COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

--
-- Dumping data for table `customers_data`
--

INSERT INTO `customers_data` (`id`, `email`, `account_number`, `card_number`, `cvv`, `pin`, `created`) VALUES
(13, 'hssnn@gmail.com', 'XT9W2eOHB29ZY7G/qN+KkJLtrz28Js+LG/5GBTRnlhtF1GiUDP72RNBfsYDaW5s6Gi7LG2kyGHv2k8/orU4aM4O73AWF8sUxur4RmMmM+kHil/CUwOkK79tZQ1gJN3y8rjfmc0nrT5O5R7+EYuTCgA8HZboGcEi2Xkrs8fEME7U=', 'PWHrLVIdfuh3WObvm9MzAZ0AIbSEdmEt/swXtcqySZyST3Z/Yv1pp75+fPaZKFf+86ou1sFkMcFMVK+qKEkcccyVW+9S/5OVzlVL+6+n00nr0V3f0oStln4gAvAzXWRMjDZt+E/EO8Qe2+A0lnZnG0M24eOnCe6vzyWMYg32+e4=', 'QP51mWmPodCJVAi41vIkO+dN2qH+TkX2mc1wThZG72IRcEoPqhknkbcL6qlOsz+ISJANki1vfTyAt6Hu7Fp1l/L4ZswFoVqiauRRBXs/UGHbQ/Th/xiGUZViyPpFE5dp4ZGihEU4qy9THBYX94QRxfkLVxmx6B137+VVBemB1XI=', 'ao92CIQfuLzyh7ht5vxH4QRqP5w0hIec82IeYXQj2SUwS3ZF+7iNUd88LhQVtZU2sZXSHM1WFuWLHb97/Xgt1O1plxwmbitQ7FN650k8Hwlw6GkUC29kxHndWz9jVJeYNjK1sLTUQbOjV9igNpaWXXufZRPX09PVWs2fp80XolY=', '2019-01-11 11:28:56'),
(14, 'email@gmail.com', '8Lg4REREIeKwPAQC31woeTi8BSw8Sp8cwvDY1joLZLBySALSeYjJvSzrDgdqiqs0tviuONTyF86rplIXoE1bkjwxQb4IHExV9MBkwSpQWRPh90NIXb/7bqYybUWORc8cRcVLbwP5haK+pXiaR/RhNgQza4GpCgazW9JlqJ9NyiE=', '5guV2ZPZAX4e/JEEp94Qh9ZMuSI71Zn1RIqcqs4ufhsyVwyjMY8TFOf6xduqNAsoxJJLUyBlL5YTC2H6dbZK7RUxKtB59H9HRgb1kVNislvPJSVlF633IjWLG9yWSGWRdPPRdXt148c5XEUEi6CrcWuxJHk0965KKVREJY1MToQ=', 'JUHd9blhYLyYSiyKCuV1hLkVe0uaZEt5jIJxfzOTk5+pSyVnLuqlaCU7FLeeOnDHMsYOq3ldUEpllQRRm96RtytbCT95spPXwjKTBZyFxKhlDDWvxPyXAhUOSPt9qeGtQydM430MWEnR7RvakrMcz1HIn18e0oQSu5X+RTLLaqE=', 'H4Md19lwCXELKWantuu4LO+JKUP0wRLwbtE+A14u8slm9LvG44Vplqn+BRIGskyNqiW7kju2ZXN2tfnTdtM8ObF4XjaLwhBY7UXmDD7Bnta6WjlvGRlImWz7NxkvMg35J1Tbi4XzmiQ0ZPJi1ASh+YiB6mbEGX2hsEcLxyNqND8=', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `grand_total`) VALUES
(13, 13, 780.00),
(14, 14, 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `sub_total` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `sub_total`) VALUES
(13, 13, 8, 1, 780.00),
(14, 14, 6, 1, 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `created`, `status`) VALUES
(3, '6e56e2de9ae3cd9f7e24c6dc191db84e.jpeg', 'HTC Smartphone', 'jjsjajajaajaj', 89.00, '0000-00-00 00:00:00', '1'),
(4, 'bfd1ebacf2db7e2fe4213af982a1aad8.jpeg', 'karbon', 'sisididididdidii', 20.00, '0000-00-00 00:00:00', '1'),
(5, 'c934931411d892d53151bdbead360bc0.jpeg', 'white sumsung', 'iisssksksjs sjsjsjs', 300.00, '0000-00-00 00:00:00', '1'),
(6, '4af64a2a80152dc271f7314e9c89f4ae.jpeg', 'Nokia Lumia', 'sjsjsjs sjsj', 80.00, '0000-00-00 00:00:00', '1'),
(7, '4023a97bd9b878a68269289e0a2c1f5a.jpeg', 'Sony', 'kddkdkdkdkd', 600.00, '0000-00-00 00:00:00', '1'),
(8, 'dcf562884cbd5bb35a241de3c1baccfd.jpeg', 'Men T-Shirt', 'Where men feel in', 780.00, '2019-01-11 11:26:07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'juma', 'peter', 'email@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'skskskk', 'kwdkdkdk', 'hssnn@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'aaaaaaaaaaaaa', 'kkkkkkkkkkkkkkkk', 'jsksksk@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers_data` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
