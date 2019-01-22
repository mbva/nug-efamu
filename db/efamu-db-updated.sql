-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 09:04 AM
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
-- Table structure for table `animalsales`
--

CREATE TABLE IF NOT EXISTS `animalsales` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` int(11) DEFAULT NULL,
  `sp` varchar(200) DEFAULT NULL,
  `soldby` varchar(200) NOT NULL,
  `solddate` date NOT NULL DEFAULT '0000-00-00',
  `recdate` date NOT NULL,
  `recby` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `animalsales`
--

INSERT INTO `animalsales` (`farm_id`, `id`, `animal_id`, `sp`, `soldby`, `solddate`, `recdate`, `recby`) VALUES
(0, 4, 0, '566333', 'Davis', '2018-10-08', '2018-10-03', 'Golola Charles'),
(0, 5, 4, '120000', 'Me', '2018-11-30', '2018-11-30', 'Efamu Brenda Kembabazi'),
(1, 6, 8, '600000', 'Me', '2018-12-02', '2018-11-30', 'Efamu Brenda Kembabazi'),
(0, 7, 9, '70000', 'Me', '2018-12-02', '2018-11-30', 'Efamu Brenda Kembabazi'),
(0, 8, 6, '999000', 'Me', '2018-11-30', '2018-11-30', 'Efamu Brenda Kembabazi');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `animal_feeding`
--

INSERT INTO `animal_feeding` (`farm_id`, `id`, `fdate`, `animalclass`, `feedtype`, `quantityfed`, `frequency`, `numberofanimals`, `recby`, `recdate`) VALUES
(1, 2, '2018-10-17', 'Dry Feeding', 'Pasture', 6, 3, 5, 'Golola Charles', '2018-10-17'),
(0, 3, '2018-10-24', 'Dry Feeding', 'Pasture', 100, 4, 9, 'Golola Charles', '2018-10-24'),
(1, 4, '2018-12-12', 'Dry Feeding', 'Supplement', 50, 2, 13, 'Golola Charles', '2018-12-13'),
(1, 5, '2019-01-03', 'Breeding Heard', 'Total Mixed Ratio', 2, 2, 20, 'Efamu Brenda Kembabaz', '2019-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `animal_pregtest`
--

CREATE TABLE IF NOT EXISTS `animal_pregtest` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eartag` varchar(100) DEFAULT NULL,
  `pd_expect_date` date NOT NULL DEFAULT '0000-00-00',
  `servedby` varchar(100) DEFAULT NULL,
  `actualtest_date` date NOT NULL DEFAULT '0000-00-00',
  `test_result` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `animal_registration`
--

CREATE TABLE IF NOT EXISTS `animal_registration` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `animal_id` int(250) NOT NULL AUTO_INCREMENT,
  `tagNo` varchar(250) DEFAULT NULL,
  `animal_name` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `breed` varchar(250) DEFAULT NULL,
  `dob` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `genetic_percentage` varchar(250) DEFAULT NULL,
  `name_of_dam` varchar(250) DEFAULT NULL,
  `breed_of_dam` varchar(250) DEFAULT NULL,
  `name_of_sire` varchar(250) DEFAULT NULL,
  `breed_of_sire` varchar(250) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`animal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `animal_registration`
--

INSERT INTO `animal_registration` (`farm_id`, `animal_id`, `tagNo`, `animal_name`, `gender`, `breed`, `dob`, `location`, `genetic_percentage`, `name_of_dam`, `breed_of_dam`, `name_of_sire`, `breed_of_sire`, `status`) VALUES
(2, 2, 'EFAMU001', 'Bihogo', 'Female', 'Ankole', '2013-05-06', 'On', '17', 'Lucky', 'Ankole', 'Kahil', 'Ankole', 'Culled'),
(1, 3, 'EFAMU23', 'Kahil', 'Male', 'dsv kg', '2016-09-16', 'yes', '63', 'casc', 'sacs', 'cs', 'fs', 'Present'),
(1, 4, '45656', 'Joanota', 'Female', 'Abigar', '2018-11-17', 'On', '67', 'Vincent Matsiko', '433434', 'TOT', 'TOPO', 'Sold'),
(1, 11, 'EG4323', 'Nugspftc', 'Female', 'Abigar', '2018-11-29', 'no', '63', 'faf', 'afa', 'saf', 'asf', 'Present'),
(2, 12, '001', 'KOGA', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Culled'),
(1, 13, 'OO2', 'JASI', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 14, '003', 'STELLA', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 15, '004', 'LIILY', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(2, 16, '005', 'KWEZI', 'Female', 'FRIESIAN', '', 'On', '50', 'ANKOLE', 'ANKOLE', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 17, '006', 'SUUBI', 'Female', 'FRIESIAN', '', 'On', '50', 'ANKOLE', 'ANKOLE', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 18, '007', 'BANI', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 19, '008', 'ALVIN', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 20, '009', 'ELLEN', 'Female', 'FRIESIAN', '', 'On', '50', 'ANKOLE', 'ANKOLE', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 21, '010', 'KANTU', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 22, '011', 'KIRABO', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 23, '012', 'MBALE', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(2, 24, '014', 'KOFI', 'Female', 'FRIESIAN', '', 'On', '50', 'ANKOLE', 'ANKOLE', 'ANKOLE', 'FRIESIAN', 'Culled'),
(1, 25, '015', 'HIMA', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 26, '016', 'ESTHER', 'Female', 'FRIESIAN', '', 'On', '75', 'ANKOLE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 27, '017', 'OLIVE', 'Female', 'FRIESIAN', '', 'On', '50', 'ANKOLE', 'ANKOLE', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 28, '019', 'PAUL', 'Male', 'FRIESIAN', '2018-11-17', 'On', '75', 'MBALE', 'FRIESIAN', 'ANKOLE', 'FRIESIAN', 'Present'),
(1, 29, 'B0098', 'Jane', 'Female', 'FRESIAN', '2018-06-05', 'On', '56', 'FRESIAN', 'FRESIAN', 'JOHN', 'MM', 'Present'),
(1, 30, '5213', 'CharlesG', 'Male', 'FRESIAN', '2019-01-11', 'On', '56', '51548', 'Dfddf', 'Mukosa', 'Miidfdf', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `animal_serving`
--

CREATE TABLE IF NOT EXISTS `animal_serving` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eartag` varchar(100) DEFAULT 'animal_id',
  `servedate` date NOT NULL DEFAULT '0000-00-00',
  `servedby` varchar(100) DEFAULT NULL,
  `checkup_date` date DEFAULT NULL,
  `sohdate` date NOT NULL DEFAULT '0000-00-00',
  `soh_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `animal_serving`
--

INSERT INTO `animal_serving` (`farm_id`, `id`, `eartag`, `servedate`, `servedby`, `checkup_date`, `sohdate`, `soh_status`) VALUES
(1, 1, 'EFAMU23', '2018-11-15', 'Dr. Musoke Ronald', '2018-12-06', '2018-11-16', 'Pending'),
(0, 2, '45656', '2018-11-17', 'Dr. Musoke Ronald', '2018-12-08', '2018-11-17', 'Pregnant'),
(0, 3, '89899', '2018-11-01', 'Dr. Musoke Ronald', '2018-11-22', '2018-11-19', 'Pregnant'),
(0, 4, '89899', '2018-10-11', 'Dr. Musoke Ronald', '2018-11-01', '2018-11-19', 'Pregnant'),
(0, 5, '89899', '2018-11-19', 'Dr. Musoke Ronald', '2018-12-10', '2018-11-19', 'Pregnant'),
(0, 6, 'J0989', '2018-11-13', 'Dr. Musoke Ronald', '2018-12-04', '0000-00-00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `calf_feeding`
--

CREATE TABLE IF NOT EXISTS `calf_feeding` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` varchar(255) DEFAULT NULL,
  `fdate` date DEFAULT NULL,
  `colostrumgiven` varchar(255) DEFAULT NULL,
  `milkgiven` varchar(255) DEFAULT NULL,
  `supplementgiven` varchar(255) DEFAULT NULL,
  `recby` varchar(255) DEFAULT NULL,
  `recdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `calf_feeding`
--

INSERT INTO `calf_feeding` (`farm_id`, `id`, `animal_id`, `fdate`, `colostrumgiven`, `milkgiven`, `supplementgiven`, `recby`, `recdate`) VALUES
(1, 3, 'EFAMU001', '2018-10-10', '23', '45', 'Grasss', 'Golola Charles', '2018-10-17'),
(0, 5, 'EFAMU23', '2018-10-24', '85', '84', 'Ffgge', 'Golola Charles', '2018-10-24'),
(1, 6, '3', '2018-12-12', '12', '23', 'Ebikuta', 'Golola Charles', '2018-12-13'),
(1, 7, '2', '2019-01-03', '12', '5', '45', 'Efamu Brenda Kembabaz', '2019-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `calving`
--

CREATE TABLE IF NOT EXISTS `calving` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cdate` date DEFAULT NULL,
  `animal_id` int(255) DEFAULT NULL,
  `eoc` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `ymcp` varchar(255) DEFAULT NULL,
  `calgel` varchar(255) DEFAULT NULL,
  `probios` varchar(255) DEFAULT NULL,
  `ketogel` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `calfalive` varchar(255) DEFAULT NULL,
  `colostrum` varchar(255) DEFAULT NULL,
  `dipnavel` varchar(255) DEFAULT NULL,
  `vitamins` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `bloodymilk` varchar(255) DEFAULT NULL,
  `milkfever` varchar(255) DEFAULT NULL,
  `expelled` varchar(255) DEFAULT NULL,
  `ecp` varchar(255) DEFAULT NULL,
  `days_after_calving` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `calving`
--

INSERT INTO `calving` (`farm_id`, `id`, `cdate`, `animal_id`, `eoc`, `des`, `ymcp`, `calgel`, `probios`, `ketogel`, `other`, `calfalive`, `colostrum`, `dipnavel`, `vitamins`, `weight`, `bloodymilk`, `milkfever`, `expelled`, `ecp`, `days_after_calving`, `status`) VALUES
(1, 15, '2019-01-03', 29, 'No Problem', 'Ok', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '34', 'Yes', 'Yes', 'Yes', 'No', NULL, NULL),
(2, 16, '2019-01-13', 2, 'No Problem', 'Dsdsd', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', '356', 'Yes', 'No', 'No', 'Yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `culling`
--

CREATE TABLE IF NOT EXISTS `culling` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `animal_id` varchar(255) DEFAULT NULL,
  `date_of_culling` date DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `culling`
--

INSERT INTO `culling` (`farm_id`, `id`, `animal_id`, `date_of_culling`, `reason`, `comment`) VALUES
(1, 1, 'EFAMU23', '2018-12-01', 'Sick', 'It Was Un Able To Live More'),
(1, 6, 'R45', '2018-12-24', 'Dafs', 'Dasfgd'),
(1, 8, '11', '2018-11-23', 'HG', 'VC'),
(1, 9, '11', '2018-12-12', 'Ogamba Kato', 'I Was Around'),
(2, 17, '24', '0000-00-00', 'Egdf', 'Dfg'),
(2, 18, '24', '2019-01-14', 'Fssas', 'Asfsff'),
(2, 19, '2', '0000-00-00', '', ''),
(2, 20, '2', '0000-00-00', '', ''),
(2, 21, '12', '2019-01-02', 'Oppp', 'Jkkj');

-- --------------------------------------------------------

--
-- Table structure for table `deleted`
--

CREATE TABLE IF NOT EXISTS `deleted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `farm_id` int(11) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `Deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `deleted`
--

INSERT INTO `deleted` (`id`, `name`, `description`, `category`, `farm_id`, `delete_date`, `Deleted_by`) VALUES
(1, '', '', '', 1, '2018-12-22 13:07:22', 'Efamu Brenda Kembabaz'),
(2, '', '', '', 1, '2018-12-22 13:07:37', 'Efamu Brenda Kembabaz'),
(3, 'Nugspftc', 'Nugspftc', '', 1, '2018-12-22 13:13:51', 'Efamu Brenda Kembabaz'),
(4, '', '', '', 1, '2018-12-22 13:14:02', 'Efamu Brenda Kembabaz'),
(5, 'Trtrt', 'Trtrt', '', 0, '2018-12-22 13:14:31', 'Efamu Brenda Kembabaz'),
(6, 'Sample Animal', '4533', 'Animals', 0, '2018-12-22 13:41:01', 'Efamu Brenda Kembabaz'),
(7, 'Mmnnmnm', '767676', 'Animals', 0, '2018-12-22 15:36:33', 'Efamu Brenda Kembabaz'),
(8, 'Kahil', 'EFAMU23', 'Animals', 1, '2018-12-22 15:43:16', 'Efamu Brenda Kembabaz'),
(9, 'Bihogo', 'EFAMU001', 'Animals', 1, '2018-12-26 09:21:13', 'Efamu Brenda Kembabaz'),
(10, '', 'System Admin', 'Users', 1, '2018-12-26 11:50:15', 'Efamu Brenda Kembabaz'),
(11, '', 'Nampijja Adah', 'Users', 1, '2018-12-26 11:50:19', 'Efamu Brenda Kembabaz'),
(12, '', 'Nampijja Adah', 'Users', 1, '2018-12-26 11:50:20', 'Efamu Brenda Kembabaz'),
(13, '', 'Nampijja Adah', 'Users', 1, '2018-12-26 11:52:21', 'Efamu Brenda Kembabaz'),
(14, '', 'Nampijja Adah', 'Users', 1, '2018-12-26 11:54:29', 'Efamu Brenda Kembabaz'),
(15, '', 'Efamu Brenda Kembabaz', 'Users', 1, '2018-12-26 11:54:38', 'Efamu Brenda Kembabaz'),
(16, '', '', 'Users', 0, '2018-12-31 08:53:22', 'Efamu Brenda Kembabaz'),
(17, '', '', 'Users', 0, '2018-12-31 08:59:50', 'Efamu Brenda Kembabaz'),
(18, '', '', 'Employees', 0, '2018-12-31 09:04:32', 'Efamu Brenda Kembabaz'),
(19, '', '', 'Employees', 0, '2018-12-31 09:04:35', 'Efamu Brenda Kembabaz'),
(20, '', '', 'Employees', 0, '2018-12-31 09:04:37', 'Efamu Brenda Kembabaz'),
(21, '', '', 'Employees', 0, '2018-12-31 09:04:40', 'Efamu Brenda Kembabaz'),
(22, '', '', 'Employees', 0, '2018-12-31 09:05:13', 'Efamu Brenda Kembabaz'),
(23, '', '', 'Employees', 0, '2018-12-31 09:08:30', 'Efamu Brenda Kembabaz'),
(24, '', '', 'Employees', 0, '2018-12-31 09:11:26', 'Efamu Brenda Kembabaz'),
(25, '', '', 'Employees', 0, '2018-12-31 09:13:31', 'Efamu Brenda Kembabaz'),
(26, 'Kayizzi Sulaiman Moses', '0784512659', 'Employees', 1, '2018-12-31 09:18:02', 'Efamu Brenda Kembabaz'),
(27, 'Nalubega Sharon', '0784512365', 'Employees', 1, '2018-12-31 09:18:14', 'Efamu Brenda Kembabaz'),
(28, 'Nampijja Adah', 'EFAMU-68559', 'Users', 1, '2018-12-31 09:25:01', 'Efamu Brenda Kembabaz'),
(29, 'Nugspftc', 'EG4323', 'Animals', 1, '2018-12-31 13:06:37', 'Efamu Brenda Kembabaz');

-- --------------------------------------------------------

--
-- Table structure for table `deworming`
--

CREATE TABLE IF NOT EXISTS `deworming` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tagNo` varchar(255) DEFAULT NULL,
  `animal_name` varchar(255) DEFAULT NULL,
  `date_of_deworming` varchar(255) DEFAULT NULL,
  `physiological_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `disease_incidences`
--

CREATE TABLE IF NOT EXISTS `disease_incidences` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `animal_id` int(11) NOT NULL,
  `body_weight` varchar(255) NOT NULL,
  `body_temperature` varchar(255) NOT NULL,
  `tdate` date DEFAULT NULL,
  `signs` text NOT NULL,
  `disease` varchar(255) NOT NULL,
  `rec_treatment` varchar(255) NOT NULL,
  `act_treatment` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `treatment_length` varchar(255) NOT NULL,
  `vet_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `disease_incidences`
--

INSERT INTO `disease_incidences` (`farm_id`, `id`, `animal_id`, `body_weight`, `body_temperature`, `tdate`, `signs`, `disease`, `rec_treatment`, `act_treatment`, `dosage`, `treatment_length`, `vet_name`, `contact`) VALUES
(0, 1, 0, 'Fe', 'Fe', '2018-09-03', 'Ef', 'Ef', 'Ef', 'Ef', 'Ef', 'Ef', 'E', 'F323'),
(1, 2, 3, '52', 'Fef', '2018-12-09', 'Fe', 'Fe', 'Efe', 'Fef', '2.5 Mls Every Time', 'Fe', 'Mukasa', '1243577777'),
(0, 3, 0, '3333323', '3233', '2018-10-24', 'Dfd', 'Disease ', 'G', 'Gg', 'Dgd', 'Dgdg', 'Dr. Joseph', ''),
(0, 4, 0, '67', '43', '2018-11-29', 'Gfg', 'Bf', 'Ddf', 'Dff', '45', '5month', 'Dr. Joseph', ''),
(0, 5, 2, '67', '43', '2018-11-29', 'Gfg', 'Bf', 'Ddf', 'Dff', '45', '5month', 'Dr. Joseph', ''),
(0, 6, 3, '67', '67', '2018-11-28', 'Dfgd', 'Dfd', 'Fgdfg', 'Fgdg', 'Dfgd', 'Dfgdg', 'Dr.Ntege Samuel', ''),
(1, 7, 13, '100', '40', '2018-12-29', 'Lameness In Fore LimbLoss Of AppetiteDrop In Milk ProductionSalvation', 'Anaplasmosis', 'OTC 20% AND MULTIVITAMIN', 'OTC 20% AND MULTIVITAMIN', '35mls Of OTC, 25mls Of Multivitamin', '1*3', 'Dr. Joseph', ''),
(2, 8, 12, '456', '567', '2019-01-15', 'Dsvds', 'Dvvd', 'Dsfdf', '', 'Dfdsf', 'Dsfd', 'Select', '');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `empid` int(200) NOT NULL AUTO_INCREMENT,
  `empname` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `dob` varchar(255) DEFAULT '0000-00-00',
  `salary` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `nextofkin_name` varchar(255) DEFAULT NULL,
  `nextofkin_tel` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`farm_id`, `empid`, `empname`, `gender`, `dob`, `salary`, `designation`, `email`, `tel`, `nextofkin_name`, `nextofkin_tel`, `status`) VALUES
(0, 1, 'Awert ASDF', 'Female', '2018-09-04', '1334567', 'EFSDF', 'DSD@yaho.com', '078451265', 'dguhifjokd', '0789542128', 'Active'),
(1, 2, 'Kayizzi Sulaiman Moses', 'Malecd', '1989-08-30', '400000', 'Information Tech', 'K.sula@hotmail.com', '0784512659', 'Lukwago John', '0785412657', 'Active'),
(1, 3, 'Nalubega Sharon', 'Female', '1992-09-13', '400000', 'Human Resource', 'Nulubega@yahoo.com', '0784512365', 'Musoke Elvis', '0214657979', 'Active'),
(1, 4, 'Musiime Joan', 'Male', '2018-10-05', '56000', 'Manager', 'Vmatsiko@gmail.com', '07890087', 'Vincent Matsiko', 'Vincent Ma', 'Not Active'),
(0, 5, 'Muwanga Alvin', 'Male', '1988-10-12', '100', 'Dd', 'Sad@gmail.com', '100', 'dwd', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emp_permission`
--

CREATE TABLE IF NOT EXISTS `emp_permission` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `module_name` varchar(350) NOT NULL,
  `pcreate` varchar(20) NOT NULL,
  `pread` varchar(20) NOT NULL,
  `pupdate` varchar(20) NOT NULL,
  `pdelete` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `emp_permission`
--

INSERT INTO `emp_permission` (`id`, `user_id`, `module_name`, `pcreate`, `pread`, `pupdate`, `pdelete`) VALUES
(1, 'EFAMU-85783', 'Animals', '0', '0', '0', '1'),
(2, 'EFAMU-85783', 'Breeding', '0', '0', '0', '0'),
(3, 'EFAMU-85783', 'Settings', '0', '0', '1', '0'),
(4, 'EFAMU-85783', 'Herd Health', '0', '0', '0', '0'),
(5, 'EFAMU-85783', 'Feeding', '0', '0', '0', '0'),
(6, 'EFAMU-85783', 'Analysis Reports', '0', '0', '0', '0'),
(7, 'EFAMU-85783', 'Finance Manager', '0', '0', '0', '0'),
(8, 'EFAMU-85783', 'Milk Production', '0', '0', '0', '0'),
(9, 'EFAMU-85783', 'User Permission', '0', '0', '0', '0'),
(10, 'EFAMU-85783', 'Employees', '0', '0', '0', '0'),
(11, 'EFAMU-85783', 'System Users', '0', '0', '0', '0'),
(12, 'EFAMU-85783', 'Animals', '0', '0', '0', '0'),
(13, 'EFAMU-85783', 'Breeding', '0', '0', '0', '0'),
(14, 'EFAMU-85783', 'Settings', '0', '0', '0', '0'),
(15, 'EFAMU-85783', 'Herd Health', '0', '0', '0', '0'),
(16, 'EFAMU-85783', 'Feeding', '0', '0', '0', '0'),
(17, 'EFAMU-85783', 'Analysis Reports', '0', '1', '0', '0'),
(18, 'EFAMU-85783', 'Finance Manager', '0', '0', '0', '0'),
(19, 'EFAMU-85783', 'Milk Production', '0', '0', '0', '0'),
(20, 'EFAMU-85783', 'User Permission', '0', '0', '0', '0'),
(21, 'EFAMU-85783', 'Employees', '0', '0', '0', '0'),
(22, 'EFAMU-85783', 'System Users', '0', '0', '0', '0'),
(23, 'EFAMU-44977', 'Animals', '1', '1', '1', '1'),
(24, 'EFAMU-44977', 'Breeding', '1', '1', '1', '1'),
(25, 'EFAMU-44977', 'Settings', '1', '1', '1', '1'),
(26, 'EFAMU-44977', 'Herd Health', '1', '1', '1', '1'),
(27, 'EFAMU-44977', 'Feeding', '1', '1', '1', '1'),
(28, 'EFAMU-44977', 'Analysis Reports', '1', '1', '1', '1'),
(29, 'EFAMU-44977', 'Finance Manager', '1', '1', '1', '1'),
(30, 'EFAMU-44977', 'Milk Production', '1', '1', '1', '1'),
(31, 'EFAMU-44977', 'User Permission', '1', '1', '1', '1'),
(32, 'EFAMU-44977', 'Employees', '1', '1', '1', '1'),
(33, 'EFAMU-44977', 'System Users', '1', '1', '1', '1'),
(34, 'EFAMU-79694', 'Animals', '1', '1', '1', '1'),
(35, 'EFAMU-79694', 'Breeding', '1', '1', '1', '1'),
(36, 'EFAMU-79694', 'Settings', '1', '1', '1', '1'),
(37, 'EFAMU-79694', 'Herd Health', '1', '1', '1', '1'),
(38, 'EFAMU-79694', 'Feeding', '1', '1', '1', '1'),
(39, 'EFAMU-79694', 'Analysis Reports', '1', '1', '1', '1'),
(40, 'EFAMU-79694', 'Finance Manager', '1', '1', '1', '1'),
(41, 'EFAMU-79694', 'Milk Production', '1', '1', '1', '1'),
(42, 'EFAMU-79694', 'User Permission', '1', '1', '1', '1'),
(43, 'EFAMU-79694', 'Employees', '1', '1', '1', '1'),
(44, 'EFAMU-79694', 'System Users', '1', '1', '1', '1'),
(45, 'EFAMU-84045', 'Animals', '1', '1', '1', '1'),
(46, 'EFAMU-84045', 'Breeding', '1', '1', '1', '1'),
(47, 'EFAMU-84045', 'Settings', '1', '1', '1', '1'),
(48, 'EFAMU-84045', 'Herd Health', '1', '1', '1', '1'),
(49, 'EFAMU-84045', 'Feeding', '1', '1', '1', '1'),
(50, 'EFAMU-84045', 'Analysis Reports', '1', '1', '1', '1'),
(51, 'EFAMU-84045', 'Finance Manager', '1', '1', '1', '1'),
(52, 'EFAMU-84045', 'Milk Production', '1', '1', '1', '1'),
(53, 'EFAMU-84045', 'User Permission', '1', '1', '1', '1'),
(54, 'EFAMU-84045', 'Employees', '1', '1', '1', '1'),
(55, 'EFAMU-84045', 'System Users', '1', '1', '1', '1'),
(56, 'EFAMU-97909', 'Animals', '1', '1', '1', '1'),
(57, 'EFAMU-97909', 'Breeding', '1', '1', '1', '1'),
(58, 'EFAMU-97909', 'Settings', '1', '1', '1', '1'),
(59, 'EFAMU-97909', 'Herd Health', '1', '1', '1', '1'),
(60, 'EFAMU-97909', 'Feeding', '1', '1', '1', '1'),
(61, 'EFAMU-97909', 'Analysis Reports', '1', '1', '1', '1'),
(62, 'EFAMU-97909', 'Finance Manager', '1', '1', '1', '1'),
(63, 'EFAMU-97909', 'Milk Production', '1', '1', '1', '1'),
(64, 'EFAMU-97909', 'User Permission', '1', '1', '1', '1'),
(65, 'EFAMU-97909', 'Employees', '1', '1', '1', '1'),
(66, 'EFAMU-97909', 'System Users', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `expensecategories`
--

CREATE TABLE IF NOT EXISTS `expensecategories` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `cat_id` int(200) NOT NULL AUTO_INCREMENT,
  `catname` varchar(200) DEFAULT NULL,
  `addedby` varchar(200) DEFAULT NULL,
  `adddate` date DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `expensecategories`
--

INSERT INTO `expensecategories` (`farm_id`, `cat_id`, `catname`, `addedby`, `adddate`) VALUES
(0, 1, 'Feeds', '', '0000-00-00'),
(0, 2, 'Breeding', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `expensesitems`
--

CREATE TABLE IF NOT EXISTS `expensesitems` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(200) DEFAULT NULL,
  `cat_id` varchar(200) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `expensesitems`
--

INSERT INTO `expensesitems` (`farm_id`, `id`, `item`, `cat_id`, `status`) VALUES
(1, 1, 'Calt Pellets', '1', 'Deactivated'),
(1, 2, 'Mineral Lick', '1', 'Deactivated'),
(1, 3, 'Hay', '1', 'Deactivated'),
(1, 4, 'Silage', '1', 'Deactivated'),
(1, 5, 'Semen Straws', '2', 'Activated'),
(1, 6, 'Nitrogyen', '2', 'Activated'),
(1, 7, 'Gloves', '2', 'Activated'),
(1, 8, 'Nitrogyen Flask', '2', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `farmerresources`
--

CREATE TABLE IF NOT EXISTS `farmerresources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resourceurl` text,
  `resourcetitle` text,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `addby` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `farmerresources`
--

INSERT INTO `farmerresources` (`id`, `resourceurl`, `resourcetitle`, `date_added`, `addby`) VALUES
(7, 'http://nugsoft.com/efamu-blog/index.php/2018/10/31/troubleshooting-problems-with-low-milk-production/', 'Troubleshooting Low Milk Production', '2018-10-31 10:30:24', 'Efamu Brenda Kembabazi'),
(8, 'http://nugsoft.com/efamu-blog/index.php/2018/10/31/changing-from-local-breeds-to-cross-bred-cattleglobal/', 'Changing From Local Breed To Cross Breeds', '2018-10-31 10:31:09', 'Efamu Brenda Kembabazi'),
(9, 'http://nugsoft.com/efamu-blog/index.php/2018/10/31/how-to-increase-milk-production-in-cold-season/', 'Increasing Milk Production In Cold Season', '2018-10-31 10:33:39', 'Efamu Brenda Kembabazi'),
(10, 'http://nugsoft.com/efamu-blog/index.php/2018/10/31/how-to-feed-a-dairy-cow-for-more-milk/', 'How To Feed Dairy Cow For More Milk', '2018-10-31 10:50:57', 'Efamu Brenda Kembabazi'),
(11, 'http://nugsoft.com/efamu-blog/index.php/2018/10/31/know-about-your-cow-reproduction/', 'Know About Your Cow Reproduction', '2018-10-31 10:59:48', 'Efamu Brenda Kembabazi');

-- --------------------------------------------------------

--
-- Table structure for table `farmertips`
--

CREATE TABLE IF NOT EXISTS `farmertips` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(100) DEFAULT NULL,
  `tips` text,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `addby` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `farmertips`
--

INSERT INTO `farmertips` (`farm_id`, `id`, `section`, `tips`, `date_added`, `addby`) VALUES
(0, 4, 'Milk', 'The Milk Process Requires Several Important Steps. The Purpose Of These Steps Is To Elicit Optimal Milk Letdown, Minimize The Chances Of A Cow Contacting Mastitis Organisms During Milking, And Efficient Milk Removal.\r\n\r\n1. Milker Preparation: The Hands Of A Person Milking Cows Can Become Contaminated With Mastitis-causing Pathogens, Either From Handling Dirty Equipment Or From Contact With Contaminated Milk From Infected Cows. Some Microorganisms Prefer Living And Growing On Skin, Whether It Is The Cowâ€™s Teat Skin Of The Milkerâ€™s Hands. Today, Most Milking Operations Will Have The Milkers Wear Disposable Latex Gloves. These Are Replaced Periodically Through The Milking Process.', '2018-10-27 16:30:58', 'Golola Charles'),
(0, 5, 'Profiling', 'The Role And Effect Of Farm Animals At Care Farms For Different Client Groups Is A Relatively New Area Of Research That Requires Further Study. Care Farms Provide A Setting That Is Somewhat Different From The Therapeutic Healthcare Settings That Are Usually Studied, Mainly Based On Small And Stable Social Communities With Flexibility In Activities In Nature-based Settings. The Animals On Care Farms Are, Generally Speaking, Used For Production Rather Than For Therapeutic Purposes. As Such, It Is An Environment That Offers Different Types Of Activities And Interaction Between People And Animals Compared To Other Settings. In Most Cases, The Focus Is On Productive Farm Work, Like Feeding The Animals, Cleaning Stables And Milking The Cows. However, Interacting With Animals During These Activities At Care Farms May Also Facilitate Social And Communicative Contact With The Animal', '2018-10-27 16:31:41', 'Golola Charles');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE IF NOT EXISTS `farms` (
  `farmid` int(255) NOT NULL AUTO_INCREMENT,
  `farmname` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `regby` varchar(255) NOT NULL,
  `regtime` datetime NOT NULL,
  PRIMARY KEY (`farmid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`farmid`, `farmname`, `owner`, `address`, `contact`, `status`, `regby`, `regtime`) VALUES
(1, 'Super Admin Dummy Farm', 'Mulongo Abdul', 'Mbambire Mpigi', '0784521237', 'Active', 'Efamu Brenda Kembabazi', '2018-04-11 03:17:26'),
(2, 'Kwagala Diary Farm', 'Mujjuzi Muhamud', 'Kawempe', '0785412563', 'Active', 'Efamu Brenda Kembabazi', '2018-12-04 20:27:16'),
(5, 'SSINGO HILLS FARM', 'MR AGGREY KAKUNDA', 'MITYANA', '0772200002', 'Active', 'Efamu Brenda Kembabaz', '2019-01-03 15:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `generalexpenses`
--

CREATE TABLE IF NOT EXISTS `generalexpenses` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `exp_id` int(200) NOT NULL AUTO_INCREMENT,
  `item` varchar(200) DEFAULT NULL,
  `cat` varchar(250) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `unitcost` varchar(255) DEFAULT NULL,
  `totalcost` varchar(255) DEFAULT NULL,
  `recno` varchar(255) DEFAULT NULL,
  `receiptdate` date DEFAULT NULL,
  `recordedby` varchar(255) DEFAULT NULL,
  `entrydate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `generalexpenses`
--

INSERT INTO `generalexpenses` (`farm_id`, `exp_id`, `item`, `cat`, `qty`, `unitcost`, `totalcost`, `recno`, `receiptdate`, `recordedby`, `entrydate`) VALUES
(0, 1, 'Calt Pellets', '1', '23', '23', '529', 'D3', '2018-09-01', 'Golola Charles', '2018-09-26'),
(0, 2, 'Silage', '1', '6', '30000', '180000', 'RT02458', '2018-09-02', 'Golola Charles', '2018-09-26'),
(0, 3, 'Calt Pellets', '1', '2', '2500', '5000', '556556', '2018-09-26', 'Golola Charles', '2018-09-26'),
(1, 4, 'Mineral Lick', '', '2', '600', '1200', 'A1234', '2018-10-04', 'Golola Charles', '2018-10-04'),
(0, 5, 'Hay', '1', '5', '5300', '26500', '455j', '2018-10-22', 'Golola Charles', '2018-10-04'),
(0, 6, 'Mineral Lick', '1', '45', '5', '225', '56', '2018-10-02', 'Golola Charles', '2018-10-09'),
(0, 9, 'Hay', '1', '855', '8586', '7341030', 'Pzx34', '2018-10-10', 'Golola Charles', '2018-10-09'),
(0, 10, 'Hay', '1', '6', '200', '1200', 'H67', '2018-10-10', 'Golola Charles', '2018-10-10'),
(0, 11, 'Mineral Lick', '1', '52', '63000', '3276000', 'E456', '2018-10-25', 'Golola Charles', '2018-10-26'),
(0, 14, 'Calt Pellets', '1', '23', '343', '7889', '43', '2018-10-03', 'Golola Charles', '2018-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `heat_animals`
--

CREATE TABLE IF NOT EXISTS `heat_animals` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` varchar(100) DEFAULT NULL,
  `calving_date` date DEFAULT NULL,
  `exp_heat` date NOT NULL DEFAULT '0000-00-00',
  `actualheatdate` date DEFAULT '0000-00-00',
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `heat_animals`
--

INSERT INTO `heat_animals` (`farm_id`, `id`, `animal_id`, `calving_date`, `exp_heat`, `actualheatdate`, `status`) VALUES
(1, 1, 'EFAMU23', '2018-11-15', '2019-02-13', '2018-11-15', 'Pending'),
(1, 2, '45656', '2018-11-17', '2019-02-15', '2018-11-17', 'Pending'),
(0, 3, '89899', '2018-03-01', '2018-05-30', '2018-11-01', 'Served'),
(0, 4, '89899', '2018-03-01', '2018-11-19', '2018-11-01', 'Served'),
(0, 5, 'J0989', '2018-11-12', '2019-02-10', '2018-11-13', 'Served'),
(1, 6, '2', '2018-11-01', '2019-01-30', '2019-01-31', 'Served'),
(1, 7, '2', '2018-11-17', '2019-02-15', '2019-01-31', 'Served'),
(1, 8, '2', '2018-10-21', '2019-01-19', '2019-01-31', 'Served'),
(1, 9, '29', '2019-01-03', '2019-04-03', '2019-01-03', 'Served'),
(2, 10, '2', '2019-01-13', '2019-04-13', '0000-00-00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `loginfailure`
--

CREATE TABLE IF NOT EXISTS `loginfailure` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_time` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `loginfailure`
--

INSERT INTO `loginfailure` (`farm_id`, `id`, `login_time`, `username`, `password`) VALUES
(1, 54, '2019-01-09 23:20:15', 'naidah', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE IF NOT EXISTS `login_logs` (
  `farm_id` int(255) DEFAULT '1',
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `login_action` varchar(100) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `accountnames` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=265 ;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`farm_id`, `id`, `login_action`, `login_time`, `username`, `accountnames`) VALUES
(NULL, 150, 'Efamu Brenda Kembabaz Logged in', '2018-12-21 06:44:00', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 151, 'Efamu Brenda Kembabaz Logged in', '2018-12-21 07:30:04', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 152, 'Efamu Brenda Kembabaz Logged in', '2018-12-21 13:24:35', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 153, 'Efamu Brenda Kembabaz Logged in', '2018-12-21 13:27:21', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 154, 'Efamu Brenda Kembabaz Logged in', '2018-12-21 13:50:29', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 155, 'Efamu Brenda Kembabaz Logged in', '2018-12-22 06:45:42', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 156, 'Efamu Brenda Kembabaz Logged in', '2018-12-22 06:46:50', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 157, 'Efamu Brenda Kembabaz Logged in', '2018-12-22 06:57:47', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 158, 'Efamu Brenda Kembabaz Logged in', '2018-12-26 16:14:07', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 159, 'Efamu Brenda Kembabaz Logged in', '2018-12-26 17:29:57', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 160, 'Efamu Brenda Kembabaz Logged in', '2018-12-26 17:58:16', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 161, 'Efamu Brenda Kembabaz Logged in', '2018-12-27 17:39:13', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 162, 'Efamu Brenda Kembabaz Logged in', '2018-12-29 19:45:18', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 163, 'Efamu Brenda Kembabaz Logged in', '2018-12-29 20:03:16', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 164, 'Efamu Brenda Kembabaz Logged in', '2018-12-29 21:04:50', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 165, 'Efamu Brenda Kembabaz Logged in', '2018-12-30 12:39:03', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 166, 'Efamu Brenda Kembabaz Logged in', '2018-12-30 12:39:05', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 167, 'Efamu Brenda Kembabaz Logged in', '2018-12-30 14:24:00', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 168, 'Efamu Brenda Kembabaz Logged in', '2018-12-30 16:31:10', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 169, 'System Admin Logged in', '2018-12-30 17:29:58', 'admin', 'System Admin'),
(1, 170, 'Efamu Brenda Kembabaz Logged in', '2018-12-30 17:38:21', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 171, 'Efamu Brenda Kembabaz Logged in', '2018-12-30 18:40:00', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 172, 'Efamu Brenda Kembabaz Logged in', '2018-12-31 10:05:47', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 173, 'System Admin Logged in', '2019-01-01 21:50:50', 'admin', 'System Admin'),
(1, 174, 'Efamu Brenda Kembabaz Logged in', '2019-01-01 21:55:12', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 175, 'Efamu Brenda Kembabaz Logged in', '2019-01-01 22:51:24', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 176, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 07:36:35', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 177, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 07:55:54', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 178, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 08:01:16', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 179, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 08:30:18', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 180, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 09:09:29', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 181, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 09:13:37', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 182, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 09:27:25', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 183, 'Vincent Bakunzi Logged in', '2019-01-02 09:33:41', 'vincent', 'Vincent Bakunzi'),
(1, 184, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 09:34:31', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 185, 'Vincent Bakunzi Logged in', '2019-01-02 09:53:55', 'vincent', 'Vincent Bakunzi'),
(1, 186, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 20:00:47', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 187, 'System Admin Logged in', '2019-01-02 20:08:13', 'admin', 'System Admin'),
(1, 188, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 20:09:29', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 189, 'System Admin Logged in', '2019-01-02 20:32:54', 'admin', 'System Admin'),
(1, 190, 'System Admin Logged in', '2019-01-02 20:34:16', 'admin', 'System Admin'),
(1, 191, 'Vincent Bakunzi Logged in', '2019-01-02 20:45:39', 'vincent', 'Vincent Bakunzi'),
(1, 192, 'Efamu Brenda Kembabaz Logged in', '2019-01-02 20:46:05', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 193, 'Vincent Bakunzi Logged in', '2019-01-03 05:45:32', 'vincent', 'Vincent Bakunzi'),
(1, 194, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 05:53:00', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 195, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 06:02:19', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 196, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 06:11:03', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 197, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 08:22:07', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 198, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 08:34:32', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 199, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 08:34:48', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 200, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 08:41:35', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 201, 'System Admin Logged in', '2019-01-03 09:21:09', 'admin', 'System Admin'),
(1, 202, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 09:21:42', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 203, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 10:16:11', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 204, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 10:32:03', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 205, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 10:32:06', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 206, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 10:32:52', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 207, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 11:14:01', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 208, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 11:35:20', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 209, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 12:45:11', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 210, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 15:09:02', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 211, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 15:12:58', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 212, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 15:14:13', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 213, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 15:14:18', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 214, 'MR AGGREY KAKUNDA Logged in', '2019-01-03 15:17:00', 'AGGREY', 'MR AGGREY KAKUNDA'),
(1, 215, 'Efamu Brenda Kembabaz Logged in', '2019-01-03 15:24:51', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 216, 'Efamu Brenda Kembabaz Logged in', '2019-01-06 17:30:23', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 217, 'Efamu Brenda Kembabaz Logged in', '2019-01-07 20:59:21', 'efamu', 'Efamu Brenda Kembabaz'),
(1, 218, 'System Admin Logged in', '2019-01-09 22:26:06', 'Admin', 'System Admin'),
(1, 219, 'System Admin Logged in', '2019-01-09 22:38:43', 'Admin', 'System Admin'),
(1, 220, 'System Admin Logged in', '2019-01-09 22:49:07', 'admin', 'System Admin'),
(1, 221, 'System Admin Logged in', '2019-01-09 22:49:50', 'admin', 'System Admin'),
(1, 222, 'System Admin Logged in', '2019-01-09 22:50:58', 'admin', 'System Admin'),
(1, 223, 'System Admin Logged in', '2019-01-09 22:54:42', 'admin', 'System Admin'),
(1, 224, 'Nampijja Adah Logged in', '2019-01-09 23:20:32', 'aidah', 'Nampijja Adah'),
(1, 225, 'System Admin Logged in', '2019-01-09 23:55:52', 'admin', 'System Admin'),
(1, 226, 'System Admin Logged in', '2019-01-09 23:56:21', 'admin', 'System Admin'),
(1, 227, 'System Admin Logged in', '2019-01-10 12:38:01', 'admin', 'System Admin'),
(1, 228, 'System Admin Logged in', '2019-01-10 12:40:55', 'admin', 'System Admin'),
(1, 229, 'System Admin Logged in', '2019-01-10 13:34:53', 'admin', 'System Admin'),
(1, 230, 'System Admin Logged in', '2019-01-10 14:23:58', 'admin', 'System Admin'),
(1, 231, 'System Admin Logged in', '2019-01-10 14:36:38', 'admin', 'System Admin'),
(1, 232, 'System Admin Logged in', '2019-01-10 15:14:39', 'admin', 'System Admin'),
(1, 233, 'System Admin Logged in', '2019-01-10 17:19:35', 'admin', 'System Admin'),
(1, 234, 'System Admin Logged in', '2019-01-11 13:40:05', 'admin', 'System Admin'),
(1, 235, 'System Admin Logged in', '2019-01-11 13:49:35', 'admin', 'System Admin'),
(1, 236, 'System Admin Logged in', '2019-01-12 12:53:05', 'admin', 'System Admin'),
(1, 237, 'System Admin Logged in', '2019-01-12 12:53:24', 'admin', 'System Admin'),
(1, 238, 'System Admin Logged in', '2019-01-12 12:54:59', 'admin', 'System Admin'),
(1, 239, 'System Admin Logged in', '2019-01-12 13:03:48', 'admin', 'System Admin'),
(1, 240, 'System Admin Logged in', '2019-01-12 13:06:46', 'admin', 'System Admin'),
(1, 241, 'System Admin Logged in', '2019-01-13 21:18:13', 'admin', 'System Admin'),
(1, 242, 'System Admin Logged in', '2019-01-13 21:19:02', 'admin', 'System Admin'),
(1, 243, 'System Admin Logged in', '2019-01-13 21:33:10', 'admin', 'System Admin'),
(1, 244, 'System Admin Logged in', '2019-01-14 09:22:35', 'admin', 'System Admin'),
(1, 245, 'System Admin Logged in', '2019-01-14 09:22:47', 'admin', 'System Admin'),
(1, 246, 'System Admin Logged in', '2019-01-14 10:04:45', 'admin', 'System Admin'),
(1, 247, 'System Admin Logged in', '2019-01-15 08:58:05', 'ADMIN', 'System Admin'),
(1, 248, 'System Admin Logged in', '2019-01-15 08:58:12', 'admin', 'System Admin'),
(1, 249, 'System Admin Logged in', '2019-01-16 09:09:07', 'admin', 'System Admin'),
(1, 250, 'System Admin Logged in', '2019-01-16 09:09:14', 'admin', 'System Admin'),
(1, 251, 'System Admin Logged in', '2019-01-16 21:57:27', 'Admin', 'System Admin'),
(1, 252, 'Vincent Bakunzi Logged in', '2019-01-17 10:13:24', 'vincent', 'Vincent Bakunzi'),
(1, 253, 'Vincent Bakunzi Logged in', '2019-01-17 15:53:55', 'vincent', 'Vincent Bakunzi'),
(1, 254, 'Vincent Bakunzi Logged in', '2019-01-19 02:35:55', 'vincent', 'Vincent Bakunzi'),
(1, 255, 'Vincent Bakunzi Logged in', '2019-01-19 16:23:57', 'vincent', 'Vincent Bakunzi'),
(1, 256, 'Vincent Bakunzi Logged in', '2019-01-19 16:26:42', 'vincent', 'Vincent Bakunzi'),
(1, 257, 'Vincent Bakunzi Logged in', '2019-01-19 16:55:52', 'vincent', 'Vincent Bakunzi'),
(1, 258, 'Vincent Bakunzi Logged in', '2019-01-20 11:11:45', 'vincent', 'Vincent Bakunzi'),
(1, 259, 'Vincent Bakunzi Logged in', '2019-01-20 12:22:05', 'vincent', 'Vincent Bakunzi'),
(1, 260, 'Vincent Bakunzi Logged in', '2019-01-20 12:55:25', 'vincent', 'Vincent Bakunzi'),
(1, 261, 'Vincent Bakunzi Logged in', '2019-01-20 17:32:29', 'vincent', 'Vincent Bakunzi'),
(1, 262, 'Vincent Bakunzi Logged in', '2019-01-21 18:11:34', 'vincent', 'Vincent Bakunzi'),
(1, 263, 'Vincent Bakunzi Logged in', '2019-01-22 08:37:37', 'vincent', 'Vincent Bakunzi'),
(1, 264, 'Vincent Bakunzi Logged in', '2019-01-22 09:44:12', 'VINCENT', 'Vincent Bakunzi');

-- --------------------------------------------------------

--
-- Table structure for table `manage_acaricide`
--

CREATE TABLE IF NOT EXISTS `manage_acaricide` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acaricide_name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `registeredby` varchar(255) DEFAULT NULL,
  `regdate` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `manage_acaricide`
--

INSERT INTO `manage_acaricide` (`farm_id`, `id`, `acaricide_name`, `brand`, `manufacturer`, `registeredby`, `regdate`, `status`) VALUES
(0, 1, 'DDT ', '', '', '', '', 'Activated'),
(1, 2, 'Organophosphates  (OPs)  ', 'Sk', 'ICT Pharmacuticals', '', '', 'Activated'),
(0, 3, 'BHC/cyclodienes', '', '', '', '', 'Activated'),
(0, 4, 'BHC/cyclodienes', '', '', '', '', 'Deactivated'),
(1, 5, 'Alpha-cypermethrin', 'Alfarpor Spray And Dip', 'Alfasan', 'Efamu Brenda Kembabaz', '2018-12-30 15:30:39', 'Activated'),
(2, 6, 'Vzxv', 'Xzv', 'zvzv', 'System Admin', '2019-01-15 10:29:36', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `manage_breeds`
--

CREATE TABLE IF NOT EXISTS `manage_breeds` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `breedname` varchar(255) DEFAULT NULL,
  `registeredby` varchar(255) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `manage_breeds`
--

INSERT INTO `manage_breeds` (`farm_id`, `id`, `breedname`, `registeredby`, `regdate`, `status`) VALUES
(0, 1, 'Abigar', 'Golola Charles', '0000-00-00 00:00:00', 'Deactivated'),
(1, 2, 'Abondance', 'Golola Charles', '0000-00-00 00:00:00', 'Activated'),
(0, 3, 'Alderney', 'Golola Charles', '0000-00-00 00:00:00', 'Activated'),
(0, 4, 'Africangus', 'Golola Charles', '0000-00-00 00:00:00', 'Activated'),
(2, 5, 'FRESIAN', 'Efamu Brenda Kembabaz', '2018-12-30 12:55:20', 'Activated'),
(2, 6, 'FRIESIAN', 'Efamu Brenda Kembabaz', '2018-12-30 12:59:37', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `manage_doctors`
--

CREATE TABLE IF NOT EXISTS `manage_doctors` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `vet_name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `regby` varchar(255) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `manage_doctors`
--

INSERT INTO `manage_doctors` (`farm_id`, `id`, `vet_name`, `contact`, `email`, `regby`, `regdate`, `status`) VALUES
(1, 1, 'Dr. Joseph', '0789654123', 'jose@gmail.com', '', '0000-00-00 00:00:00', 'Activated'),
(1, 2, 'Dr. Musoke Ronald', '0772342094', 'mroni@hotmail.com', '', '0000-00-00 00:00:00', 'Activated'),
(0, 5, 'Dr.Ntege Samuel', '0785412369', 'nsamuel@gmail.com', 'Golola Charles', '2018-09-24 10:57:28', 'Activated'),
(1, 6, 'Dr. ', '0779773949', 'mukagonebertakena@gmail.com', 'Efamu Brenda Kembabaz', '2018-12-30 15:08:29', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `manage_vaccines`
--

CREATE TABLE IF NOT EXISTS `manage_vaccines` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `vaccine` varchar(255) DEFAULT NULL,
  `disease` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `registeredby` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `manage_vaccines`
--

INSERT INTO `manage_vaccines` (`farm_id`, `id`, `vaccine`, `disease`, `brand`, `registeredby`, `manufacturer`, `regdate`, `status`) VALUES
(0, 1, ' IBR (Infectious Bovine Rhinotracheitis)', 'Disease ', '', '', '', '0000-00-00 00:00:00', 'Activated'),
(1, 2, 'Pink Eye Vaccine', 'Musujja', '1', '', '2c', '0000-00-00 00:00:00', 'Deactivated'),
(0, 3, 'BVD vaccine', '', '', '', '', '0000-00-00 00:00:00', 'Activated'),
(1, 4, 'Killed Vaccine', 'Simanyi', '', '', '', '0000-00-00 00:00:00', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `milksales`
--

CREATE TABLE IF NOT EXISTS `milksales` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solddate` date NOT NULL DEFAULT '0000-00-00',
  `qty` int(200) DEFAULT NULL,
  `sp` varchar(255) DEFAULT NULL,
  `soldby` varchar(255) DEFAULT NULL,
  `recby` varchar(255) DEFAULT NULL,
  `recdate` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `milksales`
--

INSERT INTO `milksales` (`farm_id`, `id`, `solddate`, `qty`, `sp`, `soldby`, `recby`, `recdate`) VALUES
(1, 1, '2018-10-02', 5, '200000', 'Mukasa Job', 'Golola Charles', '2018-10-03'),
(0, 2, '2018-09-19', 89, '6000', 'John', 'Golola Charles', '2018-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `milkyield`
--

CREATE TABLE IF NOT EXISTS `milkyield` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `mdate` varchar(255) DEFAULT NULL,
  `animal_id` int(255) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `milkingtime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `milkyield`
--

INSERT INTO `milkyield` (`farm_id`, `id`, `mdate`, `animal_id`, `quantity`, `milkingtime`) VALUES
(0, 2, '2018-10-08', 0, 4, 'Morning'),
(0, 3, '2018-10-02', 0, 45, 'Evening'),
(1, 4, '2018-12-01', 0, 5, 'Afternoon'),
(0, 5, '2018-10-10', 0, 34, 'Morning'),
(0, 6, '2018-10-10', 0, 56, 'Afternoon'),
(1, 7, '2018-10-26', 0, 63, 'Morning'),
(0, 8, '2018-11-21', 0, 5, 'Evening'),
(1, 9, '2018-11-30', 7, 5, 'Morning'),
(0, 10, '2018-11-30', 7, 6, 'Afternoon'),
(1, 12, '2018-12-14', 11, 12.5, 'Morning'),
(1, 13, '2019-01-02', 11, 70, 'Morning');

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy_test`
--

CREATE TABLE IF NOT EXISTS `pregnancy_test` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `animal_id` varchar(255) DEFAULT NULL,
  `servedate` date DEFAULT NULL,
  `expected_preg_test` date DEFAULT NULL,
  `confirmation_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pregnancy_test`
--

INSERT INTO `pregnancy_test` (`farm_id`, `id`, `animal_id`, `servedate`, `expected_preg_test`, `confirmation_date`, `status`) VALUES
(0, 7, 'EFAMU23', NULL, '2019-01-14', '2018-11-19', 'Pregnant'),
(1, 9, 'EFAMU001', NULL, '2019-01-15', '2018-11-16', 'Pregnant'),
(0, 13, '45656', '2018-11-17', '2019-01-16', '2018-11-19', 'Pregnant'),
(0, 14, '89899', '2018-11-01', '2018-12-31', '2018-11-19', 'Pregnant'),
(0, 15, '89899', '2018-11-01', '2018-12-31', '2018-11-19', 'Pregnant');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empname` varchar(200) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `months` varchar(200) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `paydate` date NOT NULL DEFAULT '0000-00-00',
  `payby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`farm_id`, `id`, `empname`, `contact`, `months`, `amount`, `paydate`, `payby`) VALUES
(0, 3, 'Kayizzi Sulaiman', '0784512365', 'February', '100000', '2018-09-25', 'Golola Charles'),
(0, 4, 'Kayizzi Sulaiman', '0784512365', 'February', '50000', '2018-09-25', 'Golola Charles'),
(0, 5, 'Kayizzi Sulaiman', '0784512365', 'January', '50000', '2018-09-30', 'Golola Charles'),
(0, 6, 'Kayizzi Sulaiman', '0784512365', 'January', '10000', '2018-09-30', 'Golola Charles'),
(0, 7, 'Kayizzi Sulaiman', '0784512365', 'January', '100000', '2018-09-30', 'Golola Charles'),
(0, 8, 'Nalubega Sharon', '0784512365', 'January', '55000', '2018-09-30', 'Golola Charles'),
(0, 9, 'Muwanga Alvin', '07890087', 'February', '10000', '2018-10-26', 'Golola Charles'),
(0, 10, 'Nalubega Sharon', '0784512365', 'October', '0784512365', '2018-10-26', 'Golola Charles');

-- --------------------------------------------------------

--
-- Table structure for table `serving`
--

CREATE TABLE IF NOT EXISTS `serving` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagno` varchar(255) DEFAULT NULL,
  `serve_date` date DEFAULT NULL,
  `doctor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `serving`
--

INSERT INTO `serving` (`farm_id`, `id`, `tagno`, `serve_date`, `doctor`) VALUES
(0, 10, 'EFAMU001', '2018-11-12', 'Dr. Musoke Ronald'),
(0, 11, 'EFAMU23', '2018-11-15', 'Dr. Musoke Ronald'),
(0, 12, '45656', '2018-11-17', 'Dr. Musoke Ronald');

-- --------------------------------------------------------

--
-- Table structure for table `spraying`
--

CREATE TABLE IF NOT EXISTS `spraying` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date_of_spraying` varchar(255) DEFAULT NULL,
  `frequency_of_spraying` varchar(255) DEFAULT NULL,
  `accaricide` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `spraying`
--

INSERT INTO `spraying` (`farm_id`, `id`, `date_of_spraying`, `frequency_of_spraying`, `accaricide`) VALUES
(0, 2, '2018-10-09', 'Ssss', 'DDT '),
(1, 4, '2018-12-12', '3 Times', 'Organophosphates  (OPs)  '),
(1, 5, '2018-12-24', 'Once Every Month And A Half', 'Alpha-cypermethrin'),
(2, 6, '2019-01-15', '2', 'Select');

-- --------------------------------------------------------

--
-- Table structure for table `s_salary`
--

CREATE TABLE IF NOT EXISTS `s_salary` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `empname` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `months` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `s_salary`
--

INSERT INTO `s_salary` (`farm_id`, `id`, `empname`, `contact`, `months`, `amount`) VALUES
(0, 1, 'Kayizzi Sulaiman', '0784512365', 'January', '160000'),
(0, 2, 'Kayizzi Sulaiman', '0784512365', 'February', '150000'),
(0, 3, 'Nalubega Sharon', '0784512365', 'January', '55000'),
(0, 4, 'Muwanga Alvin', '07890087', 'February', '10000'),
(0, 5, 'Nalubega Sharon', '', 'October', '0784512365');

-- --------------------------------------------------------

--
-- Table structure for table `ten_day_sheet`
--

CREATE TABLE IF NOT EXISTS `ten_day_sheet` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `animal_id` int(255) DEFAULT NULL,
  `recdate` date NOT NULL,
  `recby` varchar(255) DEFAULT NULL,
  `days` int(255) DEFAULT NULL,
  `gappearance` varchar(255) DEFAULT NULL,
  `appetite` varchar(255) DEFAULT NULL,
  `eyes_ears` varchar(255) DEFAULT NULL,
  `warm_ears` varchar(255) DEFAULT NULL,
  `uterine_discharge` varchar(255) DEFAULT NULL,
  `retained_placenta` varchar(255) DEFAULT NULL,
  `milk_volume` varchar(255) DEFAULT NULL,
  `udder_edema` varchar(255) DEFAULT NULL,
  `lameness` varchar(255) DEFAULT NULL,
  `manure` varchar(255) DEFAULT NULL,
  `ketotic` varchar(255) DEFAULT NULL,
  `temperature` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_logs`
--

CREATE TABLE IF NOT EXISTS `transaction_logs` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `transaction_action` text,
  `transaction_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `transaction_by` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=546 ;

--
-- Dumping data for table `transaction_logs`
--

INSERT INTO `transaction_logs` (`farm_id`, `id`, `transaction_action`, `transaction_time`, `transaction_by`) VALUES
(0, 2, 'Registered Golola Charles', '2018-09-08 18:38:38', 'Golola Charles'),
(0, 3, 'Registered Jose Jfvf', '2018-09-09 12:32:22', 'Golola Charles'),
(0, 5, 'Activated account for Jose Jfvf', '2018-09-09 13:30:09', 'Golola Charles'),
(0, 6, 'Deactivated account for Jose Jfvf', '2018-09-09 13:30:12', 'Golola Charles'),
(0, 7, 'Activated account for Jose Jfvf', '2018-09-09 13:30:14', 'Golola Charles'),
(0, 8, 'Deactivated account for Jose Jfvf', '2018-09-09 13:30:14', 'Golola Charles'),
(0, 9, 'Activated account for Jose Jfvf', '2018-09-09 13:30:15', 'Golola Charles'),
(0, 10, 'Deactivated account for Jose Jfvf', '2018-09-09 13:30:16', 'Golola Charles'),
(0, 11, 'Activated account for Jose Jfvf', '2018-09-09 13:30:18', 'Golola Charles'),
(0, 12, 'Deactivated account for Jose Jfvf', '2018-09-09 13:30:20', 'Golola Charles'),
(0, 13, 'Activated account for Jose Jfvf', '2018-09-09 13:30:22', 'Golola Charles'),
(0, 14, 'Deactivated account for Jose Jfvf', '2018-09-09 13:34:41', 'Golola Charles'),
(0, 15, 'Deactivated account for Golola Charles', '2018-09-09 13:34:45', 'Golola Charles'),
(0, 16, 'Activated account for Jose Jfvf', '2018-09-09 13:34:46', 'Golola Charles'),
(0, 17, 'Deactivated account for Golola Charles', '2018-09-09 13:36:52', 'Golola Charles'),
(0, 18, 'Activated account for Golola Charles', '2018-09-09 13:36:53', 'Golola Charles'),
(0, 19, 'Edited user details for  ', '2018-09-09 14:10:27', 'Golola Charles'),
(0, 20, 'Deactivated account for Jose Morinyo', '2018-09-09 14:13:36', 'Golola Charles'),
(0, 21, 'Activated account for Jose Morinyo', '2018-09-09 14:13:40', 'Golola Charles'),
(0, 22, 'Edited user details for  Jose Morinyo', '2018-09-09 14:13:59', 'Golola Charles'),
(0, 23, 'Edited user details for  Jose Morinyo6', '2018-09-09 14:18:07', ''),
(0, 24, 'Edited user details for  Jose Morinyo6', '2018-09-09 14:18:19', ''),
(0, 25, 'Edited user details for  Jose Morinyo', '2018-09-09 14:19:13', ''),
(0, 26, 'Deactivated account for Golola Charles', '2018-09-09 14:25:46', 'Golola Charles'),
(0, 27, 'Activated account for Golola Charles', '2018-09-09 14:25:47', 'Golola Charles'),
(0, 28, 'Deleted user  Jose Morinyo', '2018-09-09 14:34:44', 'Golola Charles'),
(0, 29, 'Registered user  Frfrf Rfrf', '2018-09-09 14:36:07', 'Golola Charles'),
(0, 31, 'Registered Animal  EFAMU001', '2018-09-12 16:19:12', 'Golola Charles'),
(0, 32, 'Deactivated account for Golola Charles', '2018-09-12 18:12:43', 'Golola Charles'),
(0, 33, 'Activated account for Golola Charles', '2018-09-12 18:12:47', 'Golola Charles'),
(0, 34, 'Entered Deworming records of  $tag[''tagNo''];', '2018-09-15 17:40:25', 'Golola Charles'),
(0, 35, 'Entered Deworming records of  ', '2018-09-15 17:41:41', 'Golola Charles'),
(0, 36, 'Entered Deworming records of  EFAMU001', '2018-09-15 17:42:16', 'Golola Charles'),
(0, 37, 'Entered Deworming records of  EFAMU001', '2018-09-15 17:42:46', 'Golola Charles'),
(0, 38, 'Entered Deworming records of  EFAMU001', '2018-09-15 17:43:35', 'Golola Charles'),
(0, 39, 'Entered Vaccination records of  EFAMU001', '2018-09-15 21:22:59', 'Golola Charles'),
(0, 40, 'Entered Spraying records ', '2018-09-15 21:39:38', 'Golola Charles'),
(0, 41, 'Registered Animal  EFAMU23', '2018-09-16 09:37:45', 'Golola Charles'),
(0, 42, 'Entered Disease Incidence records of  EFAMU23', '2018-09-17 08:39:32', 'Golola Charles'),
(0, 43, 'Entered Disease Incidence records of  EFAMU23', '2018-09-17 08:40:01', 'Golola Charles'),
(0, 44, 'Entered Disease Incidence records of  EFAMU23', '2018-09-17 08:40:25', 'Golola Charles'),
(0, 45, 'Entered Disease Incidence records of  EFAMU23', '2018-09-17 08:41:09', 'Golola Charles'),
(0, 46, 'Entered Disease Incidence records of  EFAMU23', '2018-09-17 08:41:24', 'Golola Charles'),
(0, 47, 'Entered Disease Incidence records of  EFAMU001', '2018-09-17 08:56:41', 'Golola Charles'),
(0, 48, 'Entered Culling records of  EFAMU23', '2018-09-17 09:19:05', 'Golola Charles'),
(0, 49, 'Entered Culling records of  EFAMU23', '2018-09-17 09:21:35', 'Golola Charles'),
(0, 50, 'Registered Animal  W234', '2018-09-19 10:55:17', 'Golola Charles'),
(0, 51, 'Registered Animal  E5', '2018-09-19 10:57:15', 'Golola Charles'),
(0, 52, 'Registered Animal  Rer', '2018-09-19 11:02:03', 'Golola Charles'),
(0, 53, 'Registered Animal  W34', '2018-09-19 11:03:01', 'Golola Charles'),
(0, 54, 'Entered Vaccination records of  EFAMU001', '2018-09-19 12:13:08', 'Golola Charles'),
(0, 55, 'Registered Animal  Efam002', '2018-09-19 13:49:38', 'Golola Charles'),
(0, 56, 'Registered Doctor  Mukasa Enock0708954136', '2018-09-24 10:11:58', 'Golola Charles'),
(0, 57, 'Deleted Doctor  ', '2018-09-24 10:17:39', 'Golola Charles'),
(0, 58, 'Deleted Doctor  ', '2018-09-24 10:18:02', 'Golola Charles'),
(0, 59, 'Deleted Doctor  Mukasa Enock0708954136', '2018-09-24 10:30:44', 'Golola Charles'),
(0, 60, 'Registered Doctor  Dr.Kisitu James0784512665', '2018-09-24 10:31:30', 'Golola Charles'),
(0, 61, 'Deleted Doctor  Dr.Kisitu James0784512665', '2018-09-24 10:57:05', 'Golola Charles'),
(0, 62, 'Registered Doctor  Dr.Ntege Samuel', '2018-09-24 10:57:28', 'Golola Charles'),
(0, 63, 'Added an Acaricide', '2018-09-24 11:09:55', 'Golola Charles'),
(0, 64, 'Added an Acaricide', '2018-09-24 11:11:37', 'Golola Charles'),
(0, 65, 'Added an Acaricide', '2018-09-24 11:11:44', 'Golola Charles'),
(0, 66, 'Added an Acaricide', '2018-09-24 11:18:53', 'Golola Charles'),
(0, 67, 'Added an Acaricide', '2018-09-24 11:19:04', 'Golola Charles'),
(0, 68, 'Deleted Doctor  Ff', '2018-09-24 11:21:17', 'Golola Charles'),
(0, 69, 'Deleted Doctor  ', '2018-09-24 11:21:21', 'Golola Charles'),
(0, 70, 'Added a Vaccine', '2018-09-24 11:30:43', 'Golola Charles'),
(0, 71, 'Deleted Vaccine  Gfg', '2018-09-24 11:30:46', 'Golola Charles'),
(0, 72, 'Deleted Vaccine  Gfg', '2018-09-24 11:31:19', 'Golola Charles'),
(0, 73, 'Deleted Vaccine  Gfg', '2018-09-24 11:31:27', 'Golola Charles'),
(0, 74, 'Deleted Vaccine  Gfg', '2018-09-24 11:32:08', 'Golola Charles'),
(0, 75, 'Added a Breed $bname', '2018-09-24 11:41:50', 'Golola Charles'),
(0, 79, 'Added a Breed', '2018-09-24 11:44:18', 'Golola Charles'),
(0, 80, 'Deleted a Breed  Defdfdfd', '2018-09-24 11:46:00', 'Golola Charles'),
(0, 81, 'Added a Breed', '2018-09-24 11:50:56', 'Golola Charles'),
(0, 82, 'Deleted a Breed  Sdfdf', '2018-09-24 11:50:59', 'Golola Charles'),
(0, 83, 'Added a Vaccine', '2018-09-24 12:04:06', 'Golola Charles'),
(0, 84, 'Added a Vaccine', '2018-09-24 12:04:31', 'Golola Charles'),
(0, 85, 'Added a Vaccine', '2018-09-24 12:04:44', 'Golola Charles'),
(0, 86, 'Added a Vaccine', '2018-09-24 12:05:03', 'Golola Charles'),
(0, 87, 'Deleted Vaccine  Sf', '2018-09-24 12:05:12', 'Golola Charles'),
(0, 88, 'Updated Animal  EFAMU001', '2018-09-24 13:07:01', 'Golola Charles'),
(0, 89, 'Updated Animal  EFAMU001', '2018-09-24 13:08:36', 'Golola Charles'),
(0, 90, 'Updated Animal  EFAMU001', '2018-09-24 13:09:51', 'Golola Charles'),
(0, 91, 'Updated Animal  EFAMU001', '2018-09-24 13:15:09', 'Golola Charles'),
(0, 92, 'Updated Animal  EFAMU001', '2018-09-24 13:17:20', ''),
(0, 93, 'Updated Animal  EFAMU001', '2018-09-24 13:17:31', ''),
(0, 94, 'Deleted animal  Efam002', '2018-09-24 13:19:53', 'Golola Charles'),
(0, 95, 'Registered employee  Kayizzi Sulaiman', '2018-09-25 06:07:12', 'Golola Charles'),
(0, 96, 'Registered employee  Kayizzi Sulaiman', '2018-09-25 06:08:12', 'Golola Charles'),
(0, 97, 'Registered employee  Kayizzi Sulaiman', '2018-09-25 06:08:22', 'Golola Charles'),
(0, 98, 'Registered employee  Awert ASDF', '2018-09-25 06:08:59', 'Golola Charles'),
(0, 99, 'Registered employee  Awert ASDF', '2018-09-25 06:09:24', 'Golola Charles'),
(0, 100, 'Registered employee  Kayizzi Sulaiman', '2018-09-25 06:10:34', 'Golola Charles'),
(0, 101, 'Registered employee  Nalubega Sharon', '2018-09-25 08:59:01', 'Golola Charles'),
(0, 102, 'Paid Salary to Kayizzi Sulaiman', '2018-09-25 14:45:51', 'Golola Charles'),
(0, 103, 'Paid Salary to Kayizzi Sulaiman', '2018-09-25 14:47:18', 'Golola Charles'),
(0, 104, 'Paid Salary to Kayizzi Sulaiman', '2018-09-25 14:47:54', 'Golola Charles'),
(0, 105, 'Paid Salary to Kayizzi Sulaiman', '2018-09-25 17:56:53', 'Golola Charles'),
(0, 112, 'Entered Expense records', '2018-09-26 10:12:05', 'Golola Charles'),
(0, 113, 'Entered Expense Item', '2018-09-26 11:29:44', 'Golola Charles'),
(0, 114, 'Deleted Expense Item  Water', '2018-09-26 11:32:19', 'Golola Charles'),
(0, 115, 'Entered Expense records', '2018-09-26 18:23:29', 'Golola Charles'),
(0, 116, 'Paid Salary to Kayizzi Sulaiman', '2018-09-30 07:48:49', 'Golola Charles'),
(0, 117, 'Paid Salary to Kayizzi Sulaiman', '2018-09-30 07:50:53', 'Golola Charles'),
(0, 118, 'Paid Salary to Kayizzi Sulaiman', '2018-09-30 08:12:25', 'Golola Charles'),
(0, 119, 'Paid Salary to Nalubega Sharon', '2018-09-30 08:16:11', 'Golola Charles'),
(0, 120, 'Entered Animal Sale records for  EFAMU001', '2018-10-02 22:44:18', 'Golola Charles'),
(0, 121, 'Entered Animal Sale records for  EFAMU001', '2018-10-02 22:46:41', 'Golola Charles'),
(0, 122, 'Entered Animal Sale records for  EFAMU001', '2018-10-02 22:48:58', 'Golola Charles'),
(0, 123, 'Entered Animal Sale records for  EFAMU001', '2018-10-02 22:51:06', 'Golola Charles'),
(0, 124, 'Entered Animal Sale records for  EFAMU001', '2018-10-03 07:43:39', 'Golola Charles'),
(0, 125, 'Entered Milk Sale records ', '2018-10-03 07:57:09', 'Golola Charles'),
(0, 126, 'Entered Milk Sale records ', '2018-10-03 08:00:52', 'Golola Charles'),
(0, 127, 'Recorded Milking yield', '2018-10-03 09:10:23', 'Golola Charles'),
(0, 128, 'Recorded Milking yield', '2018-10-03 09:13:16', 'Golola Charles'),
(0, 129, 'Entered Expense records', '2018-10-04 05:11:58', 'Golola Charles'),
(0, 130, 'Entered Expense records', '2018-10-04 05:15:31', 'Golola Charles'),
(0, 131, 'Recorded animal weight for   EFAMU001', '2018-10-04 05:50:19', 'Golola Charles'),
(0, 132, 'Recorded animal weight for   EFAMU001', '2018-10-04 05:53:56', 'Golola Charles'),
(0, 133, 'Recorded animal weight for   EFAMU001', '2018-10-04 05:55:00', 'Golola Charles'),
(0, 134, 'Recorded Milking yield', '2018-10-05 21:51:23', 'Golola Charles'),
(0, 135, 'Registered user  Efamu Brenda Kembabazi', '2018-10-05 21:57:14', 'Golola Charles'),
(0, 136, 'Registered employee  Musiime Joan', '2018-10-05 22:05:45', 'Efamu Brenda Kembabazi'),
(0, 137, 'Recorded Milking yield', '2018-10-05 23:25:14', 'Efamu Brenda Kembabazi'),
(0, 138, 'Entered Expense Item', '2018-10-09 16:38:25', 'Golola Charles'),
(0, 139, 'Entered Expense Item', '2018-10-09 16:39:29', 'Golola Charles'),
(0, 140, 'Entered Expense Item', '2018-10-09 16:40:17', 'Golola Charles'),
(0, 141, 'Entered Expense Item', '2018-10-09 16:40:23', 'Golola Charles'),
(0, 142, 'Deleted Expense Item  Rwqr', '2018-10-09 16:40:27', 'Golola Charles'),
(0, 143, 'Deleted Expense Item  Water', '2018-10-09 16:40:31', 'Golola Charles'),
(0, 144, 'Registered user  Fe Df', '2018-10-09 18:28:53', 'Golola Charles'),
(0, 145, 'Entered Expense records', '2018-10-09 18:30:02', 'Golola Charles'),
(0, 146, 'Entered Expense records', '2018-10-09 18:36:18', 'Golola Charles'),
(0, 147, 'Entered Expense records', '2018-10-09 18:43:16', 'Golola Charles'),
(0, 148, 'Entered Expense records', '2018-10-09 18:45:32', 'Golola Charles'),
(0, 149, 'Recorded animal weight for   EFAMU001', '2018-10-09 20:11:14', 'Golola Charles'),
(0, 150, 'Entered Spraying records ', '2018-10-09 21:33:04', 'Golola Charles'),
(0, 151, 'Entered Spraying records ', '2018-10-09 21:33:26', 'Golola Charles'),
(0, 152, 'Entered Vaccination records of  EFAMU001', '2018-10-10 19:21:44', 'Golola Charles'),
(0, 153, 'Entered Vaccination records of  EFAMU001', '2018-10-10 19:21:48', 'Golola Charles'),
(0, 154, 'Entered Expense records', '2018-10-10 19:24:34', 'Golola Charles'),
(0, 155, 'Recorded animal weight for   EFAMU001', '2018-10-10 19:31:29', 'Golola Charles'),
(0, 156, 'Recorded Milking yield', '2018-10-10 19:52:12', 'Golola Charles'),
(0, 157, 'Recorded Milking yield', '2018-10-10 19:52:25', 'Golola Charles'),
(0, 158, 'Edited Employee details for  Kayizzi Sulaiman Moses', '2018-10-11 19:49:49', 'Golola Charles'),
(0, 159, 'Edited Employee details for  Kayizzi Sulaiman Moses', '2018-10-15 08:11:43', 'Golola Charles'),
(0, 160, 'Entered Calf Feeding records forEFAMU001', '2018-10-17 22:02:00', 'Golola Charles'),
(0, 161, 'Entered Calf Feeding records forEFAMU001', '2018-10-17 22:07:27', 'Golola Charles'),
(0, 162, 'Entered  Feeding records forDry Feeding', '2018-10-17 22:56:14', 'Golola Charles'),
(0, 163, 'Activated account for Dr. Musoke Ronald', '2018-10-17 23:26:06', 'Golola Charles'),
(0, 164, 'Deactivated account for Dr.Ntege Samuel', '2018-10-17 23:26:09', 'Golola Charles'),
(0, 165, 'Deactivated account for Dr. Joseph', '2018-10-17 23:26:11', 'Golola Charles'),
(0, 166, 'Deactivated account for Dr. Musoke Ronald', '2018-10-17 23:26:12', 'Golola Charles'),
(0, 167, 'Activated account for Dr. Musoke Ronald', '2018-10-17 23:26:13', 'Golola Charles'),
(0, 168, 'Activated account for Dr.Ntege Samuel', '2018-10-17 23:26:14', 'Golola Charles'),
(0, 169, 'Activated account for Dr. Joseph', '2018-10-17 23:26:15', 'Golola Charles'),
(0, 170, 'Deactivated account for Dr. Musoke Ronald', '2018-10-17 23:26:18', 'Golola Charles'),
(0, 171, 'Activated account for Dr. Musoke Ronald', '2018-10-17 23:26:19', 'Golola Charles'),
(0, 172, 'Deactivated account for Dr. Joseph', '2018-10-17 23:26:21', 'Golola Charles'),
(0, 173, 'Activated account for Dr. Joseph', '2018-10-17 23:26:22', 'Golola Charles'),
(0, 174, 'Deactivated account for Dr. Joseph', '2018-10-17 23:26:23', 'Golola Charles'),
(0, 175, 'Deactivated Mineral Lick', '2018-10-17 23:36:07', 'Golola Charles'),
(0, 176, 'Deactivated Hay', '2018-10-17 23:36:09', 'Golola Charles'),
(0, 177, 'Deactivated Silage', '2018-10-17 23:36:10', 'Golola Charles'),
(0, 178, 'Deactivated Organophosphates  (OPs)', '2018-10-17 23:41:17', 'Golola Charles'),
(0, 179, 'Deactivated BHC/cyclodienes', '2018-10-17 23:41:19', 'Golola Charles'),
(0, 180, 'Activated  DDT', '2018-10-17 23:41:33', 'Golola Charles'),
(0, 181, 'Activated  Organophosphates  (OPs)', '2018-10-17 23:41:34', 'Golola Charles'),
(0, 182, 'Activated  BHC/cyclodienes', '2018-10-17 23:41:35', 'Golola Charles'),
(0, 183, 'Deactivated BHC/cyclodienes', '2018-10-17 23:41:38', 'Golola Charles'),
(0, 184, 'Activated  BHC/cyclodienes', '2018-10-17 23:41:39', 'Golola Charles'),
(0, 185, 'Activated  killed vaccine', '2018-10-17 23:45:33', 'Golola Charles'),
(0, 186, 'Deactivated BVD vaccine', '2018-10-17 23:45:35', 'Golola Charles'),
(0, 187, 'Deactivated Pink Eye Vaccine', '2018-10-17 23:45:37', 'Golola Charles'),
(0, 188, 'Deactivated  IBR (Infectious Bovine Rhinotracheitis)', '2018-10-17 23:45:38', 'Golola Charles'),
(0, 189, 'Deactivated killed vaccine', '2018-10-17 23:45:38', 'Golola Charles'),
(0, 190, 'Activated   IBR (Infectious Bovine Rhinotracheitis)', '2018-10-17 23:45:45', 'Golola Charles'),
(0, 191, 'Activated  BVD vaccine', '2018-10-17 23:45:46', 'Golola Charles'),
(0, 192, 'Activated  killed vaccine', '2018-10-17 23:45:47', 'Golola Charles'),
(0, 193, 'Deactivated Breed Abondance', '2018-10-17 23:50:44', 'Golola Charles'),
(0, 194, 'Deactivated Breed Alderney', '2018-10-17 23:50:46', 'Golola Charles'),
(0, 195, 'Deactivated Breed Abigar', '2018-10-17 23:50:48', 'Golola Charles'),
(0, 196, 'Activated Breed Abondance', '2018-10-17 23:50:49', 'Golola Charles'),
(0, 197, 'Activated Breed Alderney', '2018-10-17 23:50:50', 'Golola Charles'),
(0, 198, 'Activated Breed Africangus', '2018-10-17 23:50:51', 'Golola Charles'),
(0, 199, 'Recorded Calving 10 Day Sheet info for  EFAMU001', '2018-10-23 10:55:33', 'Golola Charles'),
(0, 200, 'Registered Animal  R45', '2018-10-23 22:31:34', 'Golola Charles'),
(0, 201, 'Registered Animal  Grgrg', '2018-10-23 22:50:21', 'Golola Charles'),
(0, 202, 'Edited Employee details for  Kayizzi Sulaiman Moses', '2018-10-24 08:44:24', 'Golola Charles'),
(0, 203, 'Recorded animal weight for   R45', '2018-10-24 11:01:42', 'Golola Charles'),
(0, 204, 'Entered Culling records of  EFAMU001', '2018-10-24 13:47:49', 'Golola Charles'),
(0, 205, 'Entered Culling records of  EFAMU001', '2018-10-24 13:48:01', 'Golola Charles'),
(0, 206, 'Entered Culling records of  EFAMU001', '2018-10-24 13:52:51', 'Golola Charles'),
(0, 207, 'Entered Culling records of  EFAMU001', '2018-10-24 13:53:54', 'Golola Charles'),
(0, 208, 'Entered Culling records of  R45', '2018-10-24 13:54:17', 'Golola Charles'),
(0, 209, 'Entered Culling records of  R45', '2018-10-24 13:58:05', 'Golola Charles'),
(0, 210, 'Entered Disease Incidence records of  EFAMU001', '2018-10-24 15:04:34', 'Golola Charles'),
(0, 211, 'Entered Disease Incidence records of  EFAMU001', '2018-10-24 15:04:39', 'Golola Charles'),
(0, 212, 'Entered Disease Incidence records of  EFAMU001', '2018-10-24 15:04:42', 'Golola Charles'),
(0, 213, 'Entered Vaccination records of  EFAMU001', '2018-10-24 16:20:30', 'Golola Charles'),
(0, 214, 'Entered Vaccination records of  EFAMU001', '2018-10-24 16:21:37', 'Golola Charles'),
(0, 215, 'Entered Vaccination records of  EFAMU001', '2018-10-24 16:21:48', 'Golola Charles'),
(0, 216, 'Entered Vaccination records of  EFAMU001', '2018-10-24 16:23:18', 'Golola Charles'),
(0, 217, 'Entered Vaccination records of  EFAMU001', '2018-10-24 16:23:29', 'Golola Charles'),
(0, 218, 'Entered Vaccination records of  ', '2018-10-24 17:53:25', 'Golola Charles'),
(0, 219, 'Recorded Calving 10 Day Sheet info for  EFAMU001', '2018-10-24 18:19:59', 'Golola Charles'),
(0, 220, 'Entered Calf Feeding records forEFAMU23', '2018-10-24 20:47:03', 'Golola Charles'),
(0, 221, 'Entered Calf Feeding records forEFAMU23', '2018-10-24 20:48:39', 'Golola Charles'),
(0, 222, 'Entered  Feeding records forDry Feeding', '2018-10-24 22:13:56', 'Golola Charles'),
(0, 223, 'Recorded Milking yield', '2018-10-24 22:31:24', 'Golola Charles'),
(0, 224, 'Registered employee  Muwanga Alvin', '2018-10-24 23:07:04', 'Golola Charles'),
(0, 225, 'Activated User EFAMU-64989', '2018-10-24 23:39:14', 'Golola Charles'),
(0, 226, 'Deactivated User EFAMU-84045', '2018-10-24 23:39:24', 'Golola Charles'),
(0, 227, 'Deactivated User EFAMU-44977', '2018-10-24 23:40:01', 'Golola Charles'),
(0, 228, 'Activated User EFAMU-71457', '2018-10-24 23:40:08', 'Golola Charles'),
(0, 229, 'Deactivated User EFAMU-84045', '2018-10-24 23:40:11', 'Golola Charles'),
(0, 230, 'Activated User EFAMU-71457', '2018-10-24 23:40:45', 'Golola Charles'),
(0, 231, 'Deactivated User EFAMU-44977', '2018-10-25 09:22:32', 'Golola Charles'),
(0, 232, 'Deactivated User EFAMU-44977', '2018-10-25 09:24:43', 'Golola Charles'),
(0, 233, 'Deactivated User EFAMU-44977', '2018-10-25 22:34:21', 'Golola Charles'),
(0, 234, 'Activated User EFAMU-71457', '2018-10-25 23:13:27', 'Golola Charles'),
(0, 235, 'Activated User EFAMU-71457', '2018-10-25 23:13:29', 'Golola Charles'),
(0, 236, 'Activated User EFAMU-71457', '2018-10-25 23:13:41', 'Golola Charles'),
(0, 237, 'Activated User EFAMU-71457', '2018-10-25 23:15:18', 'Golola Charles'),
(0, 238, 'Activated User EFAMU-64989', '2018-10-25 23:15:20', 'Golola Charles'),
(0, 239, 'Deactivated User EFAMU-71457', '2018-10-25 23:15:27', 'Golola Charles'),
(0, 240, 'Deactivated User EFAMU-84045', '2018-10-25 23:15:29', 'Golola Charles'),
(0, 241, 'Deactivated User EFAMU-64989', '2018-10-25 23:15:31', 'Golola Charles'),
(0, 242, 'Registered user  Dfd Dfdf', '2018-10-25 23:25:33', 'Golola Charles'),
(0, 243, 'Activated User EFAMU-71457', '2018-10-25 23:27:21', 'Golola Charles'),
(0, 244, 'Entered Expense records', '2018-10-26 01:07:31', 'Golola Charles'),
(0, 245, 'Entered Expense records', '2018-10-26 01:09:09', 'Golola Charles'),
(0, 246, 'Entered Expense records', '2018-10-26 01:09:14', 'Golola Charles'),
(0, 247, 'Entered Expense records', '2018-10-26 01:10:32', 'Golola Charles'),
(0, 248, 'Entered Milk Sale records ', '2018-10-26 02:40:03', 'Golola Charles'),
(0, 249, 'Paid Salary to Muwanga Alvin', '2018-10-26 08:38:55', 'Golola Charles'),
(0, 250, 'Paid Salary to Nalubega Sharon', '2018-10-26 08:46:02', 'Golola Charles'),
(0, 251, 'Recorded Calving 10 Day Sheet info for  EFAMU001', '2018-10-26 09:22:22', 'Golola Charles'),
(0, 252, 'Activated User EFAMU-84045', '2018-10-26 21:52:03', 'Golola Charles'),
(0, 253, 'Activated User EFAMU-64989', '2018-10-26 21:52:06', 'Golola Charles'),
(0, 254, 'Activated User EFAMU-15018', '2018-10-26 21:52:08', 'Golola Charles'),
(0, 255, 'Recorded Milking yield', '2018-10-27 00:01:27', 'Golola Charles'),
(0, 256, 'Entered Expense records', '2018-10-30 19:32:46', 'Golola Charles'),
(0, 257, 'Entered Expense records', '2018-11-12 10:31:13', 'Golola Charles'),
(0, 258, 'Entered Serving Record', '2018-11-12 10:32:13', 'Golola Charles'),
(0, 259, 'Entered Serving Record', '2018-11-12 10:37:42', 'Golola Charles'),
(0, 260, 'Entered Serving Record', '2018-11-12 10:38:35', 'Golola Charles'),
(0, 261, 'Entered Serving Record', '2018-11-12 10:45:09', 'Golola Charles'),
(0, 262, 'Entered Serving Record', '2018-11-12 10:45:39', 'Golola Charles'),
(0, 263, 'Entered Serving Record', '2018-11-12 10:53:10', 'Golola Charles'),
(0, 264, 'Entered Serving Record', '2018-11-12 10:54:47', 'Golola Charles'),
(0, 265, 'Entered Serving Record', '2018-11-12 10:58:44', 'Golola Charles'),
(0, 266, 'Entered Serving Record', '2018-11-12 10:58:47', 'Golola Charles'),
(0, 267, 'Entered Serving Record', '2018-11-12 10:59:42', 'Golola Charles'),
(0, 268, 'Entered Serving Record', '2018-11-15 22:35:36', 'Golola Charles'),
(0, 269, 'Registered Animal  45656', '2018-11-17 11:21:36', 'Efamu Brenda Kembabazi'),
(0, 270, 'Entered Serving Record', '2018-11-17 11:25:27', 'Efamu Brenda Kembabazi'),
(0, 271, 'Registered Animal  767676', '2018-11-17 11:37:03', 'Efamu Brenda Kembabazi'),
(0, 272, 'Registered Animal  89899', '2018-11-19 14:59:12', 'Efamu Brenda Kembabazi'),
(0, 273, 'Entered Serving Record', '2018-11-19 15:04:32', 'Efamu Brenda Kembabazi'),
(0, 274, 'Entered Serving Record', '2018-11-19 15:21:21', 'Efamu Brenda Kembabazi'),
(0, 275, 'Entered Serving Record', '2018-11-19 15:22:04', 'Efamu Brenda Kembabazi'),
(0, 276, 'Registered Animal  4533', '2018-11-19 18:36:05', 'Efamu Brenda Kembabazi'),
(0, 277, 'Registered Animal  444', '2018-11-19 18:37:36', 'Efamu Brenda Kembabazi'),
(0, 278, 'Registered Animal  J0989', '2018-11-19 19:01:56', 'Efamu Brenda Kembabazi'),
(0, 279, 'Entered Serving Record', '2018-11-20 21:10:56', 'Efamu Brenda Kembabazi'),
(0, 280, 'Registered Animal  4544545', '2018-11-29 09:23:37', 'Efamu Brenda Kembabazi'),
(0, 281, 'Registered Animal  EG4323', '2018-11-29 10:35:59', 'Efamu Brenda Kembabazi'),
(0, 282, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:42:02', 'Efamu Brenda Kembabazi'),
(0, 283, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:42:50', 'Efamu Brenda Kembabazi'),
(0, 284, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:43:20', 'Efamu Brenda Kembabazi'),
(0, 285, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:43:51', 'Efamu Brenda Kembabazi'),
(0, 286, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:44:24', 'Efamu Brenda Kembabazi'),
(0, 287, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:44:53', 'Efamu Brenda Kembabazi'),
(0, 288, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:46:26', 'Efamu Brenda Kembabazi'),
(0, 289, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:46:52', 'Efamu Brenda Kembabazi'),
(0, 290, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:47:19', 'Efamu Brenda Kembabazi'),
(0, 291, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:47:44', 'Efamu Brenda Kembabazi'),
(0, 292, 'Recorded Calving 10 Day Sheet info for  EG4323', '2018-11-29 10:49:25', 'Efamu Brenda Kembabazi'),
(0, 293, 'Recorded Calving 10 Day Sheet info for  Kahil', '2018-11-29 11:01:11', 'Efamu Brenda Kembabazi'),
(0, 294, 'Recorded Calving 10 Day Sheet info for  Nugspftc (Nugspftc)', '2018-11-29 11:10:49', 'Efamu Brenda Kembabazi'),
(0, 295, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:21:02', 'Efamu Brenda Kembabazi'),
(0, 296, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:34:53', 'Efamu Brenda Kembabazi'),
(0, 297, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:36:03', 'Efamu Brenda Kembabazi'),
(0, 298, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:36:41', 'Efamu Brenda Kembabazi'),
(0, 299, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:37:19', 'Efamu Brenda Kembabazi'),
(0, 300, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:38:10', 'Efamu Brenda Kembabazi'),
(0, 301, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:38:42', 'Efamu Brenda Kembabazi'),
(0, 302, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:39:27', 'Efamu Brenda Kembabazi'),
(0, 303, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:40:03', 'Efamu Brenda Kembabazi'),
(0, 304, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:40:43', 'Efamu Brenda Kembabazi'),
(0, 305, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:41:16', 'Efamu Brenda Kembabazi'),
(0, 306, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:41:55', 'Efamu Brenda Kembabazi'),
(0, 307, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:48:32', 'Efamu Brenda Kembabazi'),
(0, 308, 'Recorded Calving 10 Day Sheet info for  ', '2018-11-29 11:49:09', 'Efamu Brenda Kembabazi'),
(0, 309, 'Entered Culling records of  ', '2018-11-29 13:31:37', 'Efamu Brenda Kembabazi'),
(0, 310, 'Entered Culling records of  ', '2018-11-29 13:39:11', 'Efamu Brenda Kembabazi'),
(0, 311, 'Entered Culling records of  ', '2018-11-29 15:02:39', 'Efamu Brenda Kembabazi'),
(0, 312, 'Entered Disease Incidence records of  ', '2018-11-29 16:55:58', 'Efamu Brenda Kembabazi'),
(0, 313, 'Entered Disease Incidence records of  ', '2018-11-29 16:57:09', 'Efamu Brenda Kembabazi'),
(0, 314, 'Entered Disease Incidence records of  ', '2018-11-29 16:58:10', 'Efamu Brenda Kembabazi'),
(0, 315, 'Entered Disease Incidence records of  ', '2018-11-29 17:34:08', 'Efamu Brenda Kembabazi'),
(0, 316, 'Entered Disease Incidence records of  ', '2018-11-29 17:35:22', 'Efamu Brenda Kembabazi'),
(0, 317, 'Entered Disease Incidence records of  ', '2018-11-29 17:38:33', 'Efamu Brenda Kembabazi'),
(0, 318, 'Entered Disease Incidence records of  ', '2018-11-29 17:48:17', 'Efamu Brenda Kembabazi'),
(0, 319, 'Entered Disease Incidence records of  ', '2018-11-29 17:53:06', 'Efamu Brenda Kembabazi'),
(0, 320, 'Entered Disease Incidence records of  ', '2018-11-29 17:53:52', 'Efamu Brenda Kembabazi'),
(0, 321, 'Entered Disease Incidence records of  ', '2018-11-29 17:54:50', 'Efamu Brenda Kembabazi'),
(0, 322, 'Entered Disease Incidence records of  ', '2018-11-29 18:02:19', 'Efamu Brenda Kembabazi'),
(0, 323, 'Entered Disease Incidence records of  ', '2018-11-29 18:10:47', 'Efamu Brenda Kembabazi'),
(0, 324, 'Entered Disease Incidence records of  ', '2018-11-29 18:13:23', 'Efamu Brenda Kembabazi'),
(0, 325, 'Entered Vaccination records of  ', '2018-11-29 18:32:29', 'Efamu Brenda Kembabazi'),
(0, 326, 'Entered Vaccination records of  ', '2018-11-29 18:33:10', 'Efamu Brenda Kembabazi'),
(0, 327, 'Entered Vaccination records of  ', '2018-11-29 18:35:55', 'Efamu Brenda Kembabazi'),
(0, 328, 'Entered Vaccination records of  ', '2018-11-29 18:38:18', 'Efamu Brenda Kembabazi'),
(0, 329, 'Entered Vaccination records of  ', '2018-11-29 18:40:04', 'Efamu Brenda Kembabazi'),
(0, 330, 'Entered Vaccination records of  ', '2018-11-30 08:31:36', 'Efamu Brenda Kembabazi'),
(0, 331, 'Entered Vaccination records of  ', '2018-11-30 08:36:24', 'Efamu Brenda Kembabazi'),
(0, 332, 'Entered Vaccination records of  ', '2018-11-30 08:44:54', 'Efamu Brenda Kembabazi'),
(0, 333, 'Entered Vaccination records of  ', '2018-11-30 08:56:35', 'Efamu Brenda Kembabazi'),
(0, 334, 'Entered Vaccination records of  ', '2018-11-30 09:02:48', 'Efamu Brenda Kembabazi'),
(0, 335, 'Entered Animal Sale records for  Nugspftc', '2018-11-30 10:32:20', 'Efamu Brenda Kembabazi'),
(0, 336, 'Entered Vaccination records of  ', '2018-11-30 10:43:47', 'Efamu Brenda Kembabazi'),
(0, 337, 'Entered Vaccination records of  ', '2018-11-30 10:46:36', 'Efamu Brenda Kembabazi'),
(0, 338, 'Entered Vaccination records of ', '2018-11-30 10:52:01', 'Efamu Brenda Kembabazi'),
(0, 339, 'Entered Vaccination records of ', '2018-11-30 10:53:53', 'Efamu Brenda Kembabazi'),
(0, 340, 'Entered Vaccination records of ', '2018-11-30 10:57:03', 'Efamu Brenda Kembabazi'),
(0, 341, 'Entered Animal Sale records for  ', '2018-11-30 11:15:07', 'Efamu Brenda Kembabazi'),
(0, 342, 'Entered Animal Sale records for  ', '2018-11-30 11:16:38', 'Efamu Brenda Kembabazi'),
(0, 343, 'Entered Animal Sale records for  Juliet', '2018-11-30 11:17:24', 'Efamu Brenda Kembabazi'),
(0, 344, 'Recorded Milking yield', '2018-11-30 15:48:13', 'Nugsoft Support Account'),
(0, 345, 'Recorded Milking yield', '2018-11-30 16:55:23', 'Nugsoft Support Account'),
(0, 346, 'Recorded Milking yield', '2018-11-30 16:58:54', 'Nugsoft Support Account'),
(0, 347, 'Recorded Milking yield', '2018-11-30 17:02:04', 'Nugsoft Support Account'),
(0, 348, 'Registered user  Niwagaba Oscar', '2018-11-30 17:19:25', 'Nugsoft Support Account'),
(0, 349, 'Registered a farm Masaka', '2018-12-02 09:06:51', 'Efamu Brenda Kembabazi'),
(0, 350, 'Registered a farm Masaka', '2018-12-02 09:07:22', 'Efamu Brenda Kembabazi'),
(0, 351, 'Registered a farm ', '2018-12-02 09:20:59', 'Efamu Brenda Kembabazi'),
(0, 352, 'Registered user  Nampijja Adah', '2018-12-02 09:35:13', 'Efamu Brenda Kembabazi'),
(0, 353, 'Registered a farm ', '2018-12-04 20:27:16', 'Efamu Brenda Kembabazi'),
(1, 354, 'Deactivated User EFAMU-44977', '2018-12-05 15:37:30', 'Golola Charles'),
(1, 355, 'Activated User EFAMU-44977', '2018-12-05 15:37:32', 'Golola Charles'),
(1, 356, 'Deactivated Farm ', '2018-12-05 16:59:46', 'Golola Charles'),
(1, 357, 'Activated User EFAMU-68559', '2018-12-05 17:00:04', 'Golola Charles'),
(1, 358, 'Deactivated Farm ', '2018-12-05 17:00:32', 'Golola Charles'),
(1, 359, 'Activated Farm ', '2018-12-05 17:01:08', 'Golola Charles'),
(1, 360, 'Activated Farm ', '2018-12-05 17:01:15', 'Golola Charles'),
(1, 361, 'Deactivated User EFAMU-44977', '2018-12-10 06:02:24', 'Golola Charlesv'),
(1, 362, 'Activated User EFAMU-44977', '2018-12-10 06:02:27', 'Golola Charlesv'),
(1, 363, 'Deactivated User EFAMU-44977', '2018-12-10 06:03:19', 'Golola Charlesv'),
(1, 364, 'Activated User EFAMU-44977', '2018-12-10 06:03:21', 'Golola Charlesv'),
(1, 365, 'Edited user  Golola Charles', '2018-12-10 19:56:23', 'Golola Charlesv'),
(1, 366, 'Edited user  Golola Charles', '2018-12-10 19:58:03', 'Golola Charlesv'),
(1, 367, 'Edited user  Golola Charles', '2018-12-10 19:59:20', 'Golola Charlesv'),
(1, 368, 'Edited user  Nampijja Adah', '2018-12-10 19:59:39', 'Golola Charlesv'),
(1, 369, 'Edited user  Nampijja Adah', '2018-12-10 19:59:49', 'Golola Charlesv'),
(1, 370, 'Edited animal  3', '2018-12-10 22:47:14', 'Golola Charlesv'),
(1, 371, 'Edited animal  11', '2018-12-10 22:49:05', 'Golola Charlesv'),
(1, 372, 'Edited animal  11', '2018-12-10 22:52:59', 'Golola Charlesv'),
(1, 373, 'Edited animal  3', '2018-12-10 22:54:08', 'Golola Charlesv'),
(1, 374, 'Edited animal  3', '2018-12-10 22:55:49', 'Golola Charlesv'),
(1, 375, 'Edited animal  3', '2018-12-10 22:56:43', 'Golola Charlesv'),
(1, 376, 'Edited animal  11', '2018-12-10 22:57:05', 'Golola Charlesv'),
(1, 377, 'Edited animal  3', '2018-12-10 22:57:16', 'Golola Charlesv'),
(1, 378, 'Edited Farm  Kinaawa Farmers', '2018-12-10 23:12:29', 'Golola Charlesv'),
(1, 379, 'Edited Farm  Kinaawa Farmers', '2018-12-10 23:12:34', 'Golola Charlesv'),
(1, 380, 'Edited Farm  Kinaawa Farmers', '2018-12-10 23:13:05', 'Golola Charlesv'),
(1, 381, 'Edited Farm  Kwagala Diary Farm', '2018-12-10 23:14:35', 'Golola Charlesv'),
(1, 382, 'Edited Farm  Kwagala Diary Farm', '2018-12-10 23:15:28', 'Golola Charlesv'),
(1, 383, 'Edited Farm  Kwagala Diary Farm', '2018-12-10 23:17:06', 'Golola Charlesv'),
(1, 384, 'Edited animal  2', '2018-12-11 08:53:38', 'Golola Charlesv'),
(1, 385, 'Edited Farm  Kinaawa Farmers', '2018-12-11 08:56:43', 'Golola Charlesv'),
(1, 386, 'Edited Farm  Kinaawa Farmers', '2018-12-11 09:00:25', 'Golola Charlesv'),
(1, 387, 'Edited Farm  Kinaawa Farmers', '2018-12-11 09:02:34', 'Golola Charlesv'),
(1, 388, 'Edited Farm  Kinaawa Farmers', '2018-12-11 09:02:44', 'Golola Charlesv'),
(1, 389, 'Recorded animal weight for   3', '2018-12-11 12:07:32', 'Golola Charlesv'),
(1, 390, 'Edited animal weight record   3', '2018-12-11 12:43:18', 'Golola Charlesv'),
(1, 391, 'Edited animal weight record   3', '2018-12-11 12:47:20', 'Golola Charlesv'),
(1, 392, 'Edited animal weight record   3', '2018-12-11 12:48:32', 'Golola Charlesv'),
(1, 393, 'Edited animal weight record   3', '2018-12-11 12:50:22', 'Golola Charlesv'),
(1, 394, 'Edited animal weight record   3', '2018-12-11 12:50:44', 'Golola Charlesv'),
(1, 395, 'Edited animal weight record   3', '2018-12-11 12:52:08', 'Golola Charlesv'),
(1, 396, 'Edited animal weight record   3', '2018-12-11 12:52:23', 'Golola Charlesv'),
(1, 397, 'Edited animal weight record   3', '2018-12-11 12:52:31', 'Golola Charlesv'),
(1, 398, 'Registered Doctor  ', '2018-12-11 13:08:06', 'Golola Charlesv'),
(1, 399, 'Registered Doctor  ', '2018-12-11 13:10:27', 'Golola Charlesv'),
(1, 400, 'Registered Doctor  Dr. Joseph', '2018-12-11 13:11:24', 'Golola Charlesv'),
(1, 401, 'Registered Doctor  Dr. Musoke Ronald', '2018-12-11 13:31:00', 'Golola Charlesv'),
(1, 402, 'Entered Culling records of  11', '2018-12-11 15:02:39', 'Golola Charlesv'),
(1, 403, 'Entered Culling records of  11', '2018-12-11 15:06:58', 'Golola Charlesv'),
(1, 404, 'Entered Culling records of  11', '2018-12-11 15:10:20', 'Golola Charlesv'),
(1, 405, 'Entered Culling records of  11', '2018-12-11 16:10:32', 'Golola Charlesv'),
(1, 406, 'Entered Culling records of  11', '2018-12-11 16:10:57', 'Golola Charlesv'),
(1, 407, 'Entered Culling records of  11', '2018-12-11 16:32:04', 'Golola Charlesv'),
(1, 408, 'Entered Culling records of  11', '2018-12-11 16:49:29', 'Golola Charlesv'),
(1, 409, 'Entered Culling records of  11', '2018-12-11 16:49:37', 'Golola Charlesv'),
(1, 410, 'Entered Culling records of  11', '2018-12-11 16:50:26', 'Golola Charlesv'),
(1, 411, 'Entered Spraying records ', '2018-12-12 12:02:32', 'Golola Charles'),
(1, 412, 'Entered Spraying records ', '2018-12-12 12:06:09', 'Golola Charles'),
(1, 413, 'Edited Spraying records ', '2018-12-12 12:29:06', 'Golola Charles'),
(1, 414, 'Edited Spraying records ', '2018-12-12 12:29:34', 'Golola Charles'),
(1, 415, 'Edited Spraying records ', '2018-12-12 12:30:16', 'Golola Charles'),
(1, 416, 'Edited Spraying records ', '2018-12-12 12:30:25', 'Golola Charles'),
(1, 417, 'Edited Spraying records ', '2018-12-12 12:38:15', 'Golola Charles'),
(1, 418, 'Entered Vaccination records of Kahil', '2018-12-12 12:42:20', 'Golola Charles'),
(1, 419, '', '0000-00-00 00:00:00', ''),
(1, 420, '', '0000-00-00 00:00:00', ''),
(1, 421, '', '0000-00-00 00:00:00', ''),
(1, 422, '', '0000-00-00 00:00:00', ''),
(1, 423, 'Edited user  Efamu Brenda Kembabaz', '2018-12-12 22:29:37', 'Golola Charles'),
(1, 424, 'Entered Calf Feeding records for', '2018-12-13 00:03:21', 'Golola Charles'),
(1, 425, 'Edited Calf Feeding records for3', '2018-12-13 00:44:31', 'Golola Charles'),
(1, 426, 'Edited Calf Feeding records for3', '2018-12-13 00:44:42', 'Golola Charles'),
(1, 427, 'Edited Calf Feeding records for3', '2018-12-13 00:45:03', 'Golola Charles'),
(1, 428, 'Entered  Feeding records forDry Feeding', '2018-12-13 00:54:37', 'Golola Charles'),
(1, 429, 'Edited  Feeding records forDry Feeding', '2018-12-13 01:42:10', 'Golola Charles'),
(1, 430, 'Edited  Feeding records forDry Feeding', '2018-12-13 01:43:33', 'Golola Charles'),
(1, 431, 'Edited  Feeding records forDry Feeding', '2018-12-13 01:44:45', 'Golola Charles'),
(1, 432, 'Edited  Feeding records forDry Feeding', '2018-12-13 01:44:50', 'Golola Charles'),
(1, 433, 'Edited Expense Item', '2018-12-13 02:05:19', 'Golola Charles'),
(1, 434, 'Edited Expense Item', '2018-12-13 02:06:56', 'Golola Charles'),
(1, 435, 'Edited Expense Item', '2018-12-13 02:07:10', 'Golola Charles'),
(1, 436, 'Edited Expense Item', '2018-12-13 02:07:16', 'Golola Charles'),
(1, 437, 'Edited Organophosphates  (OPs)   Acaricide', '2018-12-13 02:21:14', 'Golola Charles'),
(1, 438, 'Edited Organophosphates  (OPs)   Acaricide', '2018-12-13 02:21:28', 'Golola Charles'),
(1, 439, 'Edited Organophosphates  (OPs)   Acaricide', '2018-12-13 03:20:22', 'Golola Charles'),
(1, 440, 'Edited Organophosphates  (OPs)   Acaricide', '2018-12-13 03:20:31', 'Golola Charles'),
(1, 441, 'Edited Pink Eye Vaccine Vaccine', '2018-12-13 03:42:06', 'Golola Charles'),
(1, 442, 'Edited Pink Eye Vaccine Vaccine', '2018-12-13 03:42:17', 'Golola Charles'),
(1, 443, 'Edited Killed Vaccine Vaccine', '2018-12-13 03:42:39', 'Golola Charles'),
(1, 444, 'Edited Killed Vaccine Vaccine', '2018-12-13 03:43:14', 'Golola Charles'),
(1, 445, 'Edited a Breed', '2018-12-13 03:58:34', 'Golola Charles'),
(1, 446, 'Edited a Breed', '2018-12-13 03:58:41', 'Golola Charles'),
(1, 447, 'Edited a Breed', '2018-12-13 03:59:08', 'Golola Charles'),
(1, 448, 'Deactivated Breed Abondance', '2018-12-13 03:59:11', 'Golola Charles'),
(1, 449, 'Activated Breed Abondance', '2018-12-13 03:59:14', 'Golola Charles'),
(1, 450, 'Registered Doctor  Dr. Joseph', '2018-12-13 06:02:36', 'Golola Charles'),
(1, 451, 'Entered Culling records of  11', '2018-12-13 06:03:15', 'Golola Charles'),
(0, 452, 'Entered permissions records forEFAMU-84045', '0000-00-00 00:00:00', ''),
(1, 453, 'Edited animal  2', '2018-12-13 06:22:53', 'Efamu Brenda Kembabaz'),
(1, 454, '', '0000-00-00 00:00:00', ''),
(1, 455, 'Recorded Milking yield', '2018-12-14 14:27:50', 'Efamu Brenda Kembabaz'),
(1, 456, 'Edited  Milking yield for 11', '2018-12-14 15:04:36', 'Efamu Brenda Kembabaz'),
(1, 457, 'Recorded Milking yield', '2018-12-14 15:06:04', 'Efamu Brenda Kembabaz'),
(1, 458, 'Edited  Milking yield for 11', '2018-12-14 15:07:40', 'Efamu Brenda Kembabaz'),
(1, 459, 'Edited  Milking yield for 11', '2018-12-14 15:08:48', 'Efamu Brenda Kembabaz'),
(1, 460, 'Edited  Milking yield for 11', '2018-12-14 15:09:01', 'Efamu Brenda Kembabaz'),
(1, 461, 'Edited  Milking yield for 11', '2018-12-14 15:09:18', 'Efamu Brenda Kembabaz'),
(1, 462, 'Edited employee  Kayizzi Sulaiman Moses', '2018-12-14 15:58:43', 'Efamu Brenda Kembabaz'),
(1, 463, 'Edited employee  Nalubega Sharon', '2018-12-14 15:58:59', 'Efamu Brenda Kembabaz'),
(1, 464, 'Activated account for Dr. Joseph', '2018-12-20 10:29:25', 'Golola Charlesv'),
(1, 465, 'Deactivated account for Dr. Joseph', '2018-12-20 10:29:26', 'Golola Charlesv'),
(1, 466, 'Deactivated account for Dr. Musoke Ronald', '2018-12-20 10:29:30', 'Golola Charlesv'),
(1, 467, 'Activated account for Dr. Musoke Ronald', '2018-12-20 10:29:31', 'Golola Charlesv'),
(1, 468, 'Activated account for Dr. Joseph', '2018-12-20 10:29:34', 'Golola Charlesv'),
(1, 469, 'Added a Breed', '2018-12-30 12:55:20', 'Efamu Brenda Kembabaz'),
(1, 470, 'Added a Breed', '2018-12-30 12:59:37', 'Efamu Brenda Kembabaz'),
(1, 471, 'Registered Animal  001', '2018-12-30 13:01:39', 'Efamu Brenda Kembabaz'),
(1, 472, 'Registered Animal  OO2', '2018-12-30 13:03:54', 'Efamu Brenda Kembabaz'),
(1, 473, 'Registered Animal  003', '2018-12-30 13:05:11', 'Efamu Brenda Kembabaz'),
(1, 474, 'Registered Animal  004', '2018-12-30 13:09:11', 'Efamu Brenda Kembabaz'),
(1, 475, 'Registered Animal  005', '2018-12-30 13:10:50', 'Efamu Brenda Kembabaz'),
(1, 476, 'Registered Animal  006', '2018-12-30 13:11:57', 'Efamu Brenda Kembabaz'),
(1, 477, 'Registered Animal  007', '2018-12-30 13:13:19', 'Efamu Brenda Kembabaz'),
(1, 478, 'Registered Animal  008', '2018-12-30 13:14:35', 'Efamu Brenda Kembabaz'),
(1, 479, 'Registered Animal  009', '2018-12-30 13:15:39', 'Efamu Brenda Kembabaz'),
(1, 480, 'Registered Animal  010', '2018-12-30 13:16:44', 'Efamu Brenda Kembabaz'),
(1, 481, 'Registered Animal  011', '2018-12-30 13:17:50', 'Efamu Brenda Kembabaz'),
(1, 482, 'Registered Animal  012', '2018-12-30 13:19:02', 'Efamu Brenda Kembabaz'),
(1, 483, 'Registered Animal  014', '2018-12-30 13:27:31', 'Efamu Brenda Kembabaz'),
(1, 484, 'Registered Animal  015', '2018-12-30 13:28:26', 'Efamu Brenda Kembabaz'),
(1, 485, 'Registered Animal  016', '2018-12-30 13:29:33', 'Efamu Brenda Kembabaz'),
(1, 486, 'Registered Animal  017', '2018-12-30 13:32:09', 'Efamu Brenda Kembabaz'),
(1, 487, 'Recorded Calving 10 Day Sheet info for  4', '2018-12-30 14:01:21', 'Efamu Brenda Kembabaz'),
(1, 488, 'Registered Animal  019', '2018-12-30 14:08:01', 'Efamu Brenda Kembabaz'),
(1, 489, 'Recorded animal weight for   28', '2018-12-30 14:26:53', 'Efamu Brenda Kembabaz'),
(1, 490, 'Recorded animal weight for   28', '2018-12-30 14:37:12', 'Efamu Brenda Kembabaz'),
(1, 491, 'Recorded animal weight for   28', '2018-12-30 14:38:26', 'Efamu Brenda Kembabaz'),
(1, 492, 'Recorded animal weight for   28', '2018-12-30 14:48:35', 'Efamu Brenda Kembabaz'),
(1, 493, 'Recorded animal weight for   28', '2018-12-30 14:50:50', 'Efamu Brenda Kembabaz'),
(1, 494, 'Entered Disease Incidence records of  ', '2018-12-30 15:06:44', 'Efamu Brenda Kembabaz'),
(1, 495, 'Registered Doctor  Dr. ', '2018-12-30 15:08:29', 'Efamu Brenda Kembabaz'),
(1, 496, 'Added an Acaricide', '2018-12-30 15:30:39', 'Efamu Brenda Kembabaz'),
(1, 497, 'Entered Spraying records ', '2018-12-30 15:31:45', 'Efamu Brenda Kembabaz'),
(1, 498, 'Viewed Deleted Animals', '2019-01-01 23:05:08', 'Efamu Brenda Kembabaz'),
(1, 499, 'Edited animal weight record   3', '2019-01-02 09:10:55', 'Efamu Brenda Kembabaz'),
(1, 500, 'Recorded Milking yield', '2019-01-02 09:14:21', 'Efamu Brenda Kembabaz'),
(1, 501, 'Viewed Deleted Animals', '2019-01-02 09:15:17', 'Efamu Brenda Kembabaz'),
(2, 502, 'Registered user  Vincent Bakunzi', '2019-01-02 09:24:43', 'Efamu Brenda Kembabaz'),
(1, 503, 'Activated User EFAMU-97909', '2019-01-02 09:26:36', 'Efamu Brenda Kembabaz'),
(1, 504, 'Activated User EFAMU-97909', '2019-01-02 09:27:32', 'Efamu Brenda Kembabaz'),
(1, 505, 'Activated User EFAMU-97909', '2019-01-02 09:27:34', 'Efamu Brenda Kembabaz'),
(1, 506, 'Activated User EFAMU-97909', '2019-01-02 09:27:42', 'Efamu Brenda Kembabaz'),
(1, 507, 'Activated User EFAMU-97909', '2019-01-02 09:27:45', 'Efamu Brenda Kembabaz'),
(1, 508, 'Activated User EFAMU-97909', '2019-01-02 09:28:53', 'Efamu Brenda Kembabaz'),
(1, 509, 'Activated User EFAMU-97909', '2019-01-02 09:33:27', 'Efamu Brenda Kembabaz'),
(1, 510, 'Entered permissions records forEFAMU-97909', '0000-00-00 00:00:00', ''),
(1, 511, 'Viewed Deleted Animals', '2019-01-03 06:14:23', 'Efamu Brenda Kembabaz'),
(1, 512, 'Entered Calf Feeding records for', '2019-01-03 08:54:10', 'Efamu Brenda Kembabaz'),
(1, 513, 'Entered  Feeding records forBreeding Heard', '2019-01-03 08:55:36', 'Efamu Brenda Kembabaz'),
(1, 514, 'Viewed Deleted Animals', '2019-01-03 09:05:00', 'Efamu Brenda Kembabaz'),
(1, 515, 'Viewed Deleted Animals', '2019-01-03 09:05:18', 'Efamu Brenda Kembabaz'),
(1, 516, 'Viewed Deleted Animals', '2019-01-03 09:07:30', 'Efamu Brenda Kembabaz'),
(2, 517, 'Edited user  Vincent Bakunzi', '2019-01-03 09:36:58', 'Efamu Brenda Kembabaz'),
(1, 518, 'Viewed Deleted Animals', '2019-01-03 10:55:25', 'Efamu Brenda Kembabaz'),
(1, 519, 'Entered Serving Record', '2019-01-03 11:06:25', 'Efamu Brenda Kembabaz'),
(1, 520, 'Registered Animal  B0098', '2019-01-03 11:25:54', 'Efamu Brenda Kembabaz'),
(1, 521, 'Viewed Deleted Animals', '2019-01-03 11:59:35', 'Efamu Brenda Kembabaz'),
(1, 522, 'Entered Serving Record', '2019-01-03 12:12:05', 'Efamu Brenda Kembabaz'),
(1, 523, 'Registered a farm SSINGO HILLS FARM', '2019-01-03 15:10:31', 'Efamu Brenda Kembabaz'),
(5, 524, 'Registered user  MR AGGREY KAKUNDA', '2019-01-03 15:12:12', 'Efamu Brenda Kembabaz'),
(1, 525, 'Activated User EFAMU-44620', '2019-01-03 15:13:31', 'Efamu Brenda Kembabaz'),
(1, 526, 'Activated User EFAMU-44620', '2019-01-03 15:13:40', 'Efamu Brenda Kembabaz'),
(1, 527, 'Activated User EFAMU-44620', '2019-01-03 15:13:44', 'Efamu Brenda Kembabaz'),
(1, 528, 'Viewed Deleted Animals', '2019-01-09 23:19:27', 'System Admin'),
(1, 529, 'Registered Animal  5213', '2019-01-11 16:31:15', 'System Admin'),
(2, 530, 'Recorded animal weight for   2', '2019-01-13 21:46:33', 'System Admin'),
(2, 531, 'Entered Culling records of  24', '2019-01-14 15:45:29', 'System Admin'),
(2, 532, 'Entered Culling records of  24', '2019-01-14 15:45:34', 'System Admin'),
(2, 533, 'Entered Culling records of  16', '2019-01-14 15:50:21', 'System Admin'),
(2, 534, 'Entered Culling records of  24', '2019-01-14 15:50:57', 'System Admin'),
(2, 535, 'Entered Culling records of  24', '2019-01-14 16:43:16', 'System Admin'),
(2, 536, 'Entered Culling records of  24', '2019-01-14 16:43:56', 'System Admin'),
(2, 537, 'Entered Culling records of  24', '2019-01-14 16:53:23', 'System Admin'),
(2, 538, 'Entered Culling records of  24', '2019-01-14 16:54:57', 'System Admin'),
(2, 539, 'Entered Culling records of  24', '2019-01-14 17:02:09', 'System Admin'),
(2, 540, 'Entered Culling records of  2', '2019-01-15 09:19:35', 'System Admin'),
(2, 541, 'Entered Culling records of  2', '2019-01-15 09:19:39', 'System Admin'),
(2, 542, 'Entered Disease Incidence records of  ', '2019-01-15 09:21:20', 'System Admin'),
(2, 543, 'Entered Spraying records ', '2019-01-15 09:40:37', 'System Admin'),
(2, 544, 'Added an Acaricide', '2019-01-15 10:29:36', 'System Admin'),
(2, 545, 'Entered Culling records of  12', '2019-01-17 10:35:19', 'Vincent Bakunzi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `memberid` varchar(255) DEFAULT NULL,
  `full_names` varchar(250) DEFAULT NULL,
  `contact` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`farm_id`, `id`, `memberid`, `full_names`, `contact`, `username`, `password`, `photo`, `status`, `email`) VALUES
(2, 2, 'EFAMU-44977', 'System Admin', '0701656722', 'admin', 'e3afed0047b08059d0fada10f400c1e5', '', 'Activated', 'vmatsiko@gmail.com'),
(2, 5, 'EFAMU-84045', 'Efamu Brenda Kembabaz', '0781260064', 'efamu', '21232f297a57a5a743894a0e4a801fc3', '', 'Activated', 'brendabakesigaki@gmail.com'),
(1, 9, 'EFAMU-68559', 'Nampijja Adah', '0702724760', 'aidah', 'e3afed0047b08059d0fada10f400c1e5', '', 'Activated', ''),
(2, 10, 'EFAMU-97909', 'Vincent Bakunzi', '0777844758', 'vincent', 'b15ab3f829f0f897fe507ef548741afb', '', 'Activated', ''),
(5, 11, 'EFAMU-44620', 'MR AGGREY KAKUNDA', '077200002', 'AGGREY', '93a36b9e6d4390388ebe6344db288d61', '', 'Activated', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_sources`
--

CREATE TABLE IF NOT EXISTS `user_sources` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(100) DEFAULT NULL,
  `full_names` varchar(100) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `region_name` varchar(100) DEFAULT NULL,
  `city_name` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `time_zone` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `logtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `vaccination`
--

INSERT INTO `vaccination` (`farm_id`, `id`, `animal_id`, `date_of_vaccination`, `vaccine`, `route_of_admin`, `vet_doctor`) VALUES
(0, 1, 0, '2018-09-12', 'Adsd', 'Ddwd', 'Dfdf'),
(0, 2, 0, '2018-10-10', 'Pink Eye Vaccine', 'Topical', 'Dr. Joseph'),
(0, 3, 0, '2018-10-10', 'Pink Eye Vaccine', 'Topical', 'Dr. Joseph'),
(0, 7, 0, '2018-10-24', ' IBR (Infectious Bovine Rhinotracheitis)', 'Sublingual', 'Dr. Musoke Ronald'),
(0, 9, 0, '', 'EFAMU001', '', ''),
(0, 10, 0, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel'),
(0, 11, 0, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel'),
(0, 12, 0, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel'),
(0, 13, 3, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel'),
(0, 14, 5, '2018-11-30', ' IBR (Infectious Bovine Rhinotracheitis)', 'Rectal', 'Dr.Ntege Samuel'),
(0, 15, 3, '2018-11-30', ' IBR (Infectious Bovine Rhinotracheitis)', 'Sublingual', 'Dr. Musoke Ronald'),
(0, 16, 2, '', 'Pink Eye Vaccine', 'Rectal', 'Dr. Musoke Ronald'),
(0, 17, 2, '2018-11-30', 'Pink Eye Vaccine', 'Rectal', 'Dr. Musoke Ronald'),
(0, 18, 6, '2018-11-28', 'BVD Vaccine', 'Parenteral', 'Dr.Ntege Samuel'),
(0, 19, 9, '2018-11-30', 'Killed Vaccine', 'Rectal', 'Dr.Ntege Samuel'),
(0, 20, 9, '2018-11-23', 'Pink Eye Vaccine', 'Topical', 'Dr.Ntege Samuel'),
(0, 21, 7, '2018-11-28', 'BVD Vaccine', 'Topical', 'Dr.Ntege Samuel'),
(0, 22, 11, '2018-11-15', 'BVD Vaccine', 'Intravenous Injection', 'Dr.Ntege Samuel'),
(0, 23, 8, '2018-11-30', ' IBR (Infectious Bovine Rhinotracheitis)', 'Parenteral', 'Dr.Ntege Samuel'),
(1, 24, 3, '2018-12-12', 'Pink Eye Vaccine', 'Rectale', 'Dr. Musoke Ronald');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE IF NOT EXISTS `weight` (
  `farm_id` int(255) NOT NULL DEFAULT '1',
  `animal_id` int(255) NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `wdate` date DEFAULT NULL,
  `weight` int(255) DEFAULT NULL,
  `recdate` datetime DEFAULT NULL,
  `recby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`farm_id`, `animal_id`, `id`, `wdate`, `weight`, `recdate`, `recby`) VALUES
(0, 1, 1, '2018-10-04', 36, '2018-10-04 05:50:19', 'Golola Charles'),
(0, 1, 2, '2018-10-09', 6, '2018-10-09 20:11:14', 'Golola Charles'),
(0, 1, 3, '2018-10-10', 36, '2018-10-10 19:31:29', 'Golola Charles'),
(0, 1, 4, '0000-00-00', 100, '2018-10-24 11:01:42', 'Golola Charles'),
(1, 3, 5, '2018-12-11', 78, '2018-12-11 12:07:32', 'Golola Charlesv'),
(1, 28, 6, '2018-11-17', 45, '2018-12-30 14:26:53', 'Efamu Brenda Kembabaz'),
(1, 28, 7, '2018-11-24', 49, '2018-12-30 14:37:12', 'Efamu Brenda Kembabaz'),
(1, 28, 8, '2018-12-11', 55, '2018-12-30 14:38:26', 'Efamu Brenda Kembabaz'),
(1, 28, 9, '2018-12-09', 60, '2018-12-30 14:48:35', 'Efamu Brenda Kembabaz'),
(1, 28, 10, '2018-12-26', 68, '2018-12-30 14:50:50', 'Efamu Brenda Kembabaz'),
(2, 2, 11, '2019-01-13', 233, '2019-01-13 21:46:33', 'System Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
