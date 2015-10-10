-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2015 at 05:06 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `advdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`prd_id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `prdname` varchar(300) NOT NULL,
  `price` int(10) NOT NULL,
  `menufac_id` int(5) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='เก็บรายละเอียดสินค้า' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `category_id`, `prdname`, `price`, `menufac_id`, `status`) VALUES
(1, 1, 'The Help (Movie Tie-In)', 360, 1, 0),
(2, 1, 'Heat of the Night', 240, 1, 0),
(3, 1, 'The Magical Worlds of Harry Potter', 210, 1, 0),
(4, 2, 'Cars 2 Siddeley the Spy Jet Transporter', 575, 2, 0),
(5, 2, 'LEGO Ultimate Building Set - 405 Pieces (6166)', 755, 3, 0),
(6, 2, 'Disney Tangled Rapunzel Deluxe Story Bag', 650, 2, 0),
(7, 3, 'adidas Men''s Marathon TR 10 M Running Shoe', 2400, 4, 0),
(8, 3, 'adidas Air Force Falcons Royal Blue Relentless T-shirt', 600, 4, 0),
(9, 4, 'Apple MacBook Air MC969LL/A 11.6-Inch Laptop (NEWEST VERSION)', 41970, 5, 0),
(10, 4, 'Samsung Series 5 3G Chromebook (Arctic White)', 14970, 6, 0),
(11, 5, 'Levi''s 580 Women''s Plus Defined Waist Boot Cut Jean', 1260, 7, 0),
(12, 5, 'Levi''s Misses Denim Pencil Skirt', 135, 7, 0),
(13, 5, 'Calvin Klein Men''s Flat Front Dylan Pant', 1740, 8, 0),
(14, 6, 'Black & Decker 9099KC 7.2-Volt Cordless Drill with Keyless Chuck', 600, 9, 0),
(15, 6, 'Fiskars 7067 3-Piece Softouch Garden Tool Set', 420, 10, 0),
(16, 8, 'Garmin nüvi 1350LMT 4.3-Inch Portable GPS Navigator with Lifetime Map', 4440, 13, 0),
(18, 5, 'Lacote Shirt', 1499, 7, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`prd_id`), ADD FULLTEXT KEY `prdname` (`prdname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `prd_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
