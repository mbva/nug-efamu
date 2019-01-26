-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 10:32 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `efamu-db-updated`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_feeding`
--

CREATE TABLE IF NOT EXISTS `animal_feeding` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fdate` date DEFAULT NULL,
  `animalclass` varchar(255) DEFAULT NULL,
  `feedtype` varchar(255) DEFAULT NULL,
  `quantityfed` int(255) DEFAULT NULL,
  `frequency` int(255) DEFAULT NULL,
  `numberofanimals` int(255) DEFAULT NULL,
  `recby` varchar(255) DEFAULT NULL,
  `recdate` date DEFAULT NULL,
  `daily_tot_qty` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `animal_feeding`
--

INSERT INTO `animal_feeding` (`farm_id`, `id`, `fdate`, `animalclass`, `feedtype`, `quantityfed`, `frequency`, `numberofanimals`, `recby`, `recdate`, `daily_tot_qty`) VALUES
(1, 2, '2018-10-17', 'Dry Feeding', 'Pasture', 6, 3, 5, 'Golola Charles', '2018-10-17', NULL),
(0, 3, '2018-10-24', 'Dry Feeding', 'Pasture', 100, 4, 9, 'Golola Charles', '2018-10-24', NULL),
(1, 4, '2018-12-12', 'Dry Feeding', 'Supplement', 50, 2, 13, 'Golola Charles', '2018-12-13', NULL),
(1, 5, '2019-01-03', 'Breeding Heard', 'Total Mixed Ratio', 2, 2, 20, 'Efamu Brenda Kembabaz', '2019-01-03', NULL),
(2, 6, '2019-01-25', 'Dry Feeding', 'Total Mixed Ratio(Hay:,Silage:12Daily Level:56)', 12, 3, 23, 'Nugsoft Support Account', '2019-01-26', NULL),
(2, 7, '2019-01-17', 'Breeding Heard', 'Total Mixed Ratio(Hay:54,Silage:34Daily Level:12)', 88, 12, 4, 'Nugsoft Support Account', '2019-01-26', NULL),
(2, 8, '2019-01-18', 'Dry Feeding', 'Pasture(Hay:,Silage:Daily Level:)', 45, 23, 10, 'Nugsoft Support Account', '2019-01-26', 10350),
(2, 9, '2019-01-26', 'Breeding Heard', 'Total Mixed Ratio(Hay:10,Silage:12Daily Level:4)', 26, 10, 2, 'Nugsoft Support Account', '2019-01-26', 520);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
