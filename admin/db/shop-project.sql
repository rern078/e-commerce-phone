-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2024 at 04:28 AM
-- Server version: 5.7.36
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `brand_code` varchar(191) NOT NULL,
  `brand_name` varchar(191) NOT NULL,
  `brand_image` varchar(255) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  `status` varchar(191) NOT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_code` (`brand_code`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `cat_id`, `brand_code`, `brand_name`, `brand_image`, `sequence`, `status`, `create_date`) VALUES
(1, 1, 'Brand001', 'iPhone', 'NA-15Pro_Jan-300x300.jpg', 0, 'active', '2024-02-22 11:17:00'),
(2, 3, 'Brand003', 'iWatches', '1-1699347833R1Grb.jpg', 11, 'inactive', '2024-02-22 11:18:09'),
(4, 1, 'Brand002', 'Samsung', 'profile-s24-ultra-170548969653Oov.png', 0, 'active', '2024-02-22 13:44:13'),
(5, 1, 'Brand004', 'Vivo', 'v25-5g-gold-1662626483drFnI.png', 0, 'active', '2024-02-22 13:45:15'),
(6, 1, 'Brand006', 'Realmi', 'NA_Poco-F5-Pro-300x300.jpg', 0, 'active', '2024-02-22 13:46:40'),
(7, 1, 'Brand007', 'Lenovo', 'NA-15plus_Jan.2-300x300.jpg', 0, 'inactive', '2024-02-22 13:48:37'),
(8, 1, 'Brand005', 'Oppo', 'silver-2-1655518398mcJU5.png', 0, 'inactive', '2024-02-22 14:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_discount` float NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_image` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_code` varchar(11) NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `category_image` varchar(191) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  `status` varchar(191) NOT NULL,
  `parent_category` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `category_code` (`category_code`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category_code`, `category_name`, `category_image`, `sequence`, `status`, `parent_category`) VALUES
(3, 'Ch0003', 'Labtops', 'MSI_NB_GE62_Photo10.png', 0, 'active', NULL),
(6, 'Ch0006', 'Accessories', '1-1706607119IxfOY.png', 0, 'inactive', NULL),
(1, 'Ch0001', 'Mobile Phones', 'NA-15Pro_Jan-300x300.jpg', 0, 'active', NULL),
(2, 'Ch0002', 'Smart Watchs', 'silver-1-new-1707099721XTtx4.png', 0, 'active', NULL),
(5, 'Ch0005', 'Tablets', 'NA_Tab-S9-2-300x300.jpg', 0, 'active', NULL),
(4, 'Ch0004', 'Monitor', '18-186110_best-gaming-monitor-under-300-euro-hd-png.png', 0, 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_code` varchar(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_discount` float NOT NULL DEFAULT '0',
  `product_des` varchar(255) DEFAULT NULL,
  `product_quantity` int(191) NOT NULL DEFAULT '0',
  `product_image` varchar(255) DEFAULT NULL,
  `product_gallery` varchar(255) DEFAULT NULL,
  `status` varchar(191) NOT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pro_id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `cat_id`, `brand_id`, `product_code`, `product_name`, `product_price`, `product_discount`, `product_des`, `product_quantity`, `product_image`, `product_gallery`, `status`, `create_date`) VALUES
(4, 2, 1, 'Chp002', 'iPhone 14 Pro Max', 700, 10, 'iPhone 14 Pro Max', 59, 'silver-1-new-1707099721XTtx4.png', 'silver-1-new-1707099721XTtx4.png', 'active', '2024-02-21 14:35:34'),
(5, 5, 0, 'Chp005', 'iPad Air 5 Cellular 2022', 700, 0, 'iPad Air 5 Cellular 2022', 20, 'pink2-1649315869S8NaK.png', 'pink2-1649315869S8NaK.png', 'inactive', '2024-02-21 14:36:50'),
(3, 1, 4, 'Chp001', 'Samsung Galaxy S24 Ultra', 1489, 0, 'Samsung Galaxy S24 Ultra', 0, 'profile-s24-ultra-170548969653Oov.png', 'profile-s24-ultra-170548969653Oov.png', 'active', '2024-02-21 14:35:04'),
(18, 1, 4, 'Chp004', 'Samsung Note 10 Plus', 250, 40, 'Samsung Note 10 Plus', 40, 'images.jpg', 'images.jpg', 'active', '2024-02-21 16:03:52'),
(17, 6, 0, 'Chp006', 'Sony SA-RS3S Total 100W Additional Wireless Rear Speakers', 50, 10, 'Samsung Galaxy Note10+', 20, '1-1706607119IxfOY.png', '1-1706607119IxfOY.png', 'active', '2024-02-21 15:45:10'),
(19, 1, 4, 'Chp007', 'Galaxy A15', 229, 10, 'Galaxy A15', 50, 'blue-1704176955ignl5.png', 'blue-1704176955ignl5.png', 'active', '2024-02-21 16:31:32'),
(20, 1, 1, 'Chp008', 'ZTE nubia Red Magic 9 Pro', 700, 40, 'ZTE nubia Red Magic 9 Pro', 40, 'profile-1705287734bmZjU.png', 'profile-1705287734bmZjU.png', 'active', '2024-02-21 16:33:25'),
(21, 1, 1, 'Chp009', 'iPhone 14 Pro Max', 1100, 30, 'iPhone 14 Pro Max', 30, 'NA_13-Pro-MAX_USA1-300x300.jpg', 'NA_13-Pro-MAX_USA1-300x300.jpg', 'active', '2024-02-21 16:34:31'),
(22, 5, 0, 'Chp0010', 'iPad Pro 11â€³ Wi-Fi 2021', 1699, 20, 'iPad Pro 11â€³ Wi-Fi 2021', 10, 'new-silver-1622796563G3h35.png', 'new-silver-1622796563G3h35.png', 'active', '2024-02-21 16:44:08'),
(23, 1, 4, 'Chp0011', 'Galaxy Tab S9 Ultra', 200, 15, 'Galaxy Tab S9 Ultra', 20, 'black1-s9-ultra-1690455126eWKHW.jpg', 'black1-s9-ultra-1690455126eWKHW.jpg', 'active', '2024-02-21 16:45:39'),
(24, 5, 0, 'Chp0012', 'Huawei MatePad Pro 11 (2022)', 870, 30, 'Huawei MatePad Pro 11 (2022)', 20, 'huawei-matepad-pro-11-2022-ofic-removebg-preview-1661788029aQSOl.png', 'huawei-matepad-pro-11-2022-ofic-removebg-preview-1661788029aQSOl.png', 'inactive', '2024-02-21 16:46:36'),
(25, 2, 4, 'Chp0013', 'Apple Watch Ultra 2 Trail Loop', 830, 5, 'Apple Watch Ultra 2 Trail Loop', 20, '1-1699347833R1Grb.jpg', '1-1699347833R1Grb.jpg', 'active', '2024-02-21 16:52:07'),
(26, 2, 0, 'Chp0014', 'Apple Watch Ultra 2 Ocean Band', 820, 20, 'Apple Watch Ultra 2 Ocean Band', 10, '1-16993480459m7Lx.jpg', '1-16993480459m7Lx.jpg', 'active', '2024-02-21 16:52:57'),
(27, 1, 4, 'Chp0015', 'COROS VERTIX 2 GPS Adventure Watch ', 670, 5, 'COROS VERTIX 2 GPS Adventure Watch COROS Mobile Phone Tablet Smart Watch Accessories', 30, 'coros-vertix-2-gps-adventure-watch-1637312613FoFLd.png', 'coros-vertix-2-gps-adventure-watch-1637312613FoFLd.png', 'inactive', '2024-02-21 16:54:25'),
(28, 2, 0, 'Chp0016', 'Garmin FÄ“nixÂ® 6s Pro Solar', 620, 5, 'Garmin FÄ“nixÂ® 6s Pro Solar', 20, 'fenix-6s-pro-solar-1703924356ooKzW.png', 'fenix-6s-pro-solar-1703924356ooKzW.png', 'active', '2024-02-21 16:55:31'),
(29, 1, 4, 'Chp0017', 'MacBook Pro 16&quot; 2023 M3 Max', 3889, 20, 'MacBook Pro 16&quot; 2023 M3 Max', 30, 'black-1-17023567044M3VG.png', 'black-1-17023567044M3VG.png', 'active', '2024-02-21 16:57:10'),
(30, 3, 0, 'Chp0018', 'MacBook Air 15â€ M2 2023 8C', 1250, 0, 'MacBook Air 15â€ M2 2023 8C', 10, 'space-gray-1689060426lnJdL.png', 'space-gray-1689060426lnJdL.png', 'active', '2024-02-21 16:58:02'),
(31, 3, 0, 'Chp0019', 'MacBook Air 13â€ M2 2022 10C', 1800, 20, 'MacBook Air 13â€ M2 2022 10C', 10, 'macbook-air-m2-2022-space-gray-1657797239CaLQC.jpg', 'macbook-air-m2-2022-space-gray-1657797239CaLQC.jpg', 'active', '2024-02-21 16:59:52'),
(32, 3, 0, 'Chp0020', 'iMac 24â€³ M3 Chip 8C', 1800, 30, 'iMac 24â€³ M3 Chip 8C', 20, 'green-1-1703153373OcEDu.jpg', 'green-1-1703153373OcEDu.jpg', 'active', '2024-02-21 17:06:07'),
(33, 3, 0, 'Chp0021', 'MacBook Air 13â€ M2 2022 10C', 1500, 20, 'MacBook Air 13â€ M2 2022 10C', 10, 'macbook-air-m2-2022-starlight-1657797242Aqyta.jpg', 'macbook-air-m2-2022-starlight-1657797242Aqyta.jpg', 'active', '2024-02-21 17:07:41'),
(34, 3, 0, 'Chp0022', 'MacBook Pro 16&quot; 2022 M2 Max', 4500, 25, 'MacBook Pro 16&quot; 2022 M2 Max', 20, 'space-gray-1677564901OJQu7.jpg', 'space-gray-1677564901OJQu7.jpg', 'inactive', '2024-02-21 17:08:27'),
(35, 3, 0, 'Chp0023', 'MacBook Pro 13&quot; 2022 M2', 2300, 20, 'MacBook Pro 13&quot; 2022 M2', 11, 'macbook-pro-13-m2-space-gray-removebg-preview-1657078925mfa4Z.png', 'macbook-pro-13-m2-space-gray-removebg-preview-1657078925mfa4Z.png', 'active', '2024-02-21 17:09:40'),
(36, 3, 0, 'Chp0024', 'MacBook Air 13â€ 2020 Intel Core i5', 1200, 15, 'MacBook Air 13â€ 2020 Intel Core i5', 112, 'untitled-1-16408534935EFaC.png', 'untitled-1-16408534935EFaC.png', 'active', '2024-02-21 17:10:29'),
(37, 3, 0, 'Chp025', 'MacBook Air 13â€ M2 2022 10C', 1270, 18, 'MacBook Air 13â€ M2 2022 10C', 23, 'macbook-air-m2-2022-silver-1657797236FTPd7.jpg', 'macbook-air-m2-2022-silver-1657797236FTPd7.jpg', 'inactive', '2024-02-21 17:11:10'),
(38, 3, 0, 'Chp0026', 'Mac Studio M1 Ultra', 4700, 19, 'Mac Studio M1 Ultra', 25, 'untitled-2-1651888509A9gJq.png', 'untitled-2-1651888509A9gJq.png', 'active', '2024-02-21 17:12:24'),
(39, 4, 0, 'Chp0027', 'LCD Dell ALIENWARE AW2518HF 25', 600, 23, 'LCD Dell ALIENWARE AW2518HF 25', 25, '7440_Dell_ALIENWARE_AW2518HF_copy.jpg', '7440_Dell_ALIENWARE_AW2518HF_copy.jpg', 'active', '2024-02-21 17:14:14'),
(40, 4, 0, 'Chp0028', 'Monitor Dell 32 Curved 4K UHD', 599, 25, 'Monitor Dell 32 Curved 4K UHD', 37, '21089_S3221QS.jpg', '21089_S3221QS.jpg', 'inactive', '2024-02-21 17:14:48'),
(41, 4, 0, 'Chp0029', 'Monitor Dell Alienware AW2521H 24.5 Inch', 550, 20, 'Monitor Dell Alienware AW2521H 24.5 Inch', 30, '19533_Dell_Alienware_AW2521H.jpg', '19533_Dell_Alienware_AW2521H.jpg', 'active', '2024-02-21 17:15:49'),
(42, 4, 0, 'Chp0030', 'LCD Alienware 34 Curved Gaming Monitor AW3418DW', 1200, 10, 'LCD Alienware 34 Curved Gaming Monitor AW3418DW', 30, '11469_001.jpg', '11469_001.jpg', 'active', '2024-02-21 17:16:54'),
(43, 6, 0, 'Chp0031', 'WiWU Laptop Crystal Shield Case For Macbook Pro 14.2&quot;', 25, 5, 'WiWU Laptop Crystal Shield Case For Macbook Pro 14.2&quot;', 20, '1-1708490040kdoLa.png', '1-1708490040kdoLa.png', 'active', '2024-02-21 17:18:30'),
(44, 6, 0, 'Chp0032', 'WiWU EB312 3.5mm Jack Wired Earphone', 8, 2, 'WiWU EB312 3.5mm Jack Wired Earphone', 30, '1-1708498113ixNKX.png', '', 'inactive', '2024-02-21 17:19:46'),
(45, 6, 0, 'Chp0033', 'LUUCCO Wirefree Handheld Adapter for Campact Wireless Mic', 15, 0, 'LUUCCO Wirefree Handheld Adapter for Campact Wireless Mic', 90, 'wirefree-1-1705377921wlkty.png', 'wirefree-1-1705377921wlkty.png', 'active', '2024-02-21 17:21:05'),
(46, 6, 0, 'Chp0034', 'Sony HT-AX7 Portable Theater System with 360 Spatial Sound Mapping', 35, 20, 'Sony HT-AX7 Portable Theater System with 360 Spatial Sound Mapping', 50, '1-1702350750yPKl9.png', '1-1702350750yPKl9.png', 'active', '2024-02-21 17:21:47'),
(47, 6, 0, 'Chp0035', 'COTEetCI Crystal Case Transparent for Macbook Air 13.6&quot; M2', 18, 6, 'COTEetCI Crystal Case Transparent for Macbook Air 13.6&quot; M2', 40, 'transparent-1-1701765639i6SKD.png', 'transparent-1-1701765639i6SKD.png', 'active', '2024-02-21 17:23:06'),
(48, 6, 0, 'Chp0036', 'WiWU MW-002 Mag Wallet Pop-Up Card Holder With Stand', 20, 10, 'WiWU MW-002 Mag Wallet Pop-Up Card Holder With Stand', 50, '1-1708487448BsJuP.png', '1-1708487448BsJuP.png', 'active', '2024-02-21 17:24:07'),
(49, 6, 0, 'Chp0037', 'MONSTERÂ® AIRMARS XKT16 Wireless Gaming Headphones', 25, 14, 'MONSTERÂ® AIRMARS XKT16 Wireless Gaming Headphones', 40, 'green-1-1703758581Xk0eg.png', 'green-1-1703758581Xk0eg.png', 'active', '2024-02-21 17:24:45'),
(50, 6, 0, 'Chp0038', 'COTEetCI Aluminum Alloy Rotating Desktop Stand Holder', 25, 10, 'COTEetCI Aluminum Alloy Rotating Desktop Stand Holder', 49, '1-1701774007jWHz9.png', '1-1701774007jWHz9.png', 'active', '2024-02-21 17:25:34'),
(51, 1, 8, 'Chp0039', 'Oppo Reno7 Pro 5G', 670, 10, 'Oppo Reno7 Pro 5G', 40, 'silver-2-1655518398mcJU5.png', 'silver-2-1655518398mcJU5.png', 'active', '2024-02-21 17:28:16'),
(52, 1, 5, 'Chp0040', 'Vivo V25 5G', 389, 15, 'vivo V25 5G', 37, 'v25-5g-gold-1662626483drFnI.png', 'v25-5g-gold-1662626483drFnI.png', 'active', '2024-02-21 17:29:19'),
(53, 1, 1, 'test0011', 'tesst brand fdf', 2354, 20, 'categoryfdfff', 34, '15pm_ZACH-300x300.jpg', '15pm_ZACH-300x300.jpg', 'inactive', '2024-02-22 10:25:06'),
(54, 1, 4, 'Chp2222', 'test12324324', 800, 20, 'test brand name', 20, '21089_S3221QS.jpg', '21089_S3221QS.jpg', 'inactive', '2024-02-22 14:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` int(191) NOT NULL,
  `user_roles` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `account_name`, `password`, `email`, `phone`, `user_roles`) VALUES
(25, 'user', '$2y$10$6WSdT0SqAv9570/JjDDcgeIxpCIwPWELTYlHovZqeVqQoAr1EhZjm', 'user@gmail.com', 967797762, 0),
(28, 'chamrern1', '123456789', 'chamrern@gmail.com', 967797762, 1),
(27, 'admin', '$2y$10$HU7pCzT6B4lWMNVpqD7k3.y9CxclptIEkC5QGh24As.8OhN23P3Hm', 'admin@gmail.com', 967797762, 0),
(26, 'chamrern', '$2y$10$bcSQ/oDRpxC2rBkzX6LwgeQTGs39ho3kQ7iD3sc5RwjWpTTr66Ay6', 'chamrern@gmail.com', 967797762, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
