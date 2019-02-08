-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 03:54 PM
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
-- Table structure for table `vaccination`
--

CREATE TABLE IF NOT EXISTS `vaccination` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `animal_id` int(11) NOT NULL,
  `date_of_vaccination` varchar(255) NOT NULL,
  `vaccine` varchar(255) NOT NULL,
  `route_of_admin` varchar(255) NOT NULL,
  `vet_doctor` varchar(255) NOT NULL,
  `frequency_of_vaccination` varchar(100) DEFAULT NULL,
  `disease` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `vaccination`
--

INSERT INTO `vaccination` (`farm_id`, `id`, `animal_id`, `date_of_vaccination`, `vaccine`, `route_of_admin`, `vet_doctor`, `frequency_of_vaccination`, `disease`) VALUES
(0, 1, 0, '2018-09-12', 'Adsd', 'Ddwd', 'Dfdf', NULL, NULL),
(0, 2, 0, '2018-10-10', 'Pink Eye Vaccine', 'Topical', 'Dr. Joseph', NULL, NULL),
(0, 3, 0, '2018-10-10', 'Pink Eye Vaccine', 'Topical', 'Dr. Joseph', NULL, NULL),
(0, 7, 0, '2018-10-24', ' IBR (Infectious Bovine Rhinotracheitis)', 'Sublingual', 'Dr. Musoke Ronald', NULL, NULL),
(0, 9, 0, '', 'EFAMU001', '', '', NULL, NULL),
(0, 10, 0, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel', NULL, NULL),
(0, 11, 0, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel', NULL, NULL),
(0, 12, 0, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel', NULL, NULL),
(0, 13, 3, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel', NULL, NULL),
(0, 14, 5, '2018-11-30', ' IBR (Infectious Bovine Rhinotracheitis)', 'Rectal', 'Dr.Ntege Samuel', NULL, NULL),
(0, 15, 3, '2018-11-30', ' IBR (Infectious Bovine Rhinotracheitis)', 'Sublingual', 'Dr. Musoke Ronald', NULL, NULL),
(0, 16, 2, '', 'Pink Eye Vaccine', 'Rectal', 'Dr. Musoke Ronald', NULL, NULL),
(0, 17, 2, '2018-11-30', 'Pink Eye Vaccine', 'Rectal', 'Dr. Musoke Ronald', NULL, NULL),
(0, 18, 6, '2018-11-28', 'BVD Vaccine', 'Parenteral', 'Dr.Ntege Samuel', NULL, NULL),
(0, 19, 9, '2018-11-30', 'Killed Vaccine', 'Rectal', 'Dr.Ntege Samuel', NULL, NULL),
(0, 20, 9, '2018-11-23', 'Pink Eye Vaccine', 'Topical', 'Dr.Ntege Samuel', NULL, NULL),
(0, 21, 7, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel', NULL, NULL),
(0, 22, 11, '2018-11-15', 'BVD Vaccine', 'Intravenous Injection', 'Dr.Ntege Samuel', NULL, NULL),
(0, 23, 8, '2018-11-30', ' IBR (Infectious Bovine Rhinotracheitis)', 'Parenteral', 'Dr.Ntege Samuel', NULL, NULL),
(1, 24, 3, '2018-12-12', 'Pink Eye Vaccine', 'Rectale', 'Dr. Musoke Ronald', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
