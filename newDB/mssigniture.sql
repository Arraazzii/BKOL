-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 05:18 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bkol`
--

-- --------------------------------------------------------

--
-- Table structure for table `mssigniture`
--

CREATE TABLE IF NOT EXISTS `mssigniture` (
  `idSigniture` int(11) NOT NULL AUTO_INCREMENT,
  `namaSigniture` varchar(255) NOT NULL,
  `jabatanSigniture` varchar(255) NOT NULL,
  `bidangSigniture` varchar(255) NOT NULL,
  `nipSigniture` varchar(255) NOT NULL,
  `gambarSigniture` text NOT NULL,
  PRIMARY KEY (`idSigniture`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mssigniture`
--

INSERT INTO `mssigniture` (`idSigniture`, `namaSigniture`, `jabatanSigniture`, `bidangSigniture`, `nipSigniture`, `gambarSigniture`) VALUES
(1, 'MEIDI HENDIANTO GUNAWAN S.Sos', 'KASI PENEMPATAN TENAGA KERJA', 'KEPALA DISNAKER KOTA DEPOK', '1234567890', 'signiture11.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
