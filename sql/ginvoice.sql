-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014-05-17 22:07:00
-- 服务器版本: 5.5.34
-- PHP 版本: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ginvoice`
--

-- --------------------------------------------------------

--
-- 表的结构 `ivt_customer`
--

CREATE TABLE IF NOT EXISTS `ivt_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ivt_customer`
--

INSERT INTO `ivt_customer` (`id`, `name`, `phone`, `address`) VALUES
(1, 'Andy', 2147483647, '8877 Jasper ave');

-- --------------------------------------------------------

--
-- 表的结构 `ivt_detail`
--

CREATE TABLE IF NOT EXISTS `ivt_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemnum` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice` (`invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ivt_detail`
--

INSERT INTO `ivt_detail` (`id`, `itemnum`, `description`, `unitprice`, `amount`, `invoice_id`) VALUES
(1, 'A000002', 'Desktop Computer', '110.00', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ivt_invoice`
--

CREATE TABLE IF NOT EXISTS `ivt_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL,
  `payment_method` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ivt_invoice`
--

INSERT INTO `ivt_invoice` (`id`, `date`, `customer_id`, `payment_method`) VALUES
(1, '2014-05-17 20:04:12', 1, 'Credit');

-- --------------------------------------------------------

--
-- 表的结构 `ivt_product`
--

CREATE TABLE IF NOT EXISTS `ivt_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ivt_product`
--

INSERT INTO `ivt_product` (`id`, `tag`, `description`, `price`) VALUES
(1, 'A000001', 'Laptop Computer', '229.00');

--
-- 限制导出的表
--

--
-- 限制表 `ivt_detail`
--
ALTER TABLE `ivt_detail`
  ADD CONSTRAINT `invoice_id_detail` FOREIGN KEY (`invoice_id`) REFERENCES `ivt_invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `ivt_invoice`
--
ALTER TABLE `ivt_invoice`
  ADD CONSTRAINT `customer_invoice_id` FOREIGN KEY (`customer_id`) REFERENCES `ivt_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
