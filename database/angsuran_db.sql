-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2013 at 03:45 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `angsuran_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(3) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_merek`, `nama_barang`, `harga`) VALUES
('B01', 1, 'Mio', 10000000),
('B02', 1, 'New Vixion', 17000000),
('B03', 1, 'Jupiter Mx', 12000000),
('B04', 2, 'CBR 150R', 15000000),
('B06', 3, 'Ninja 250', 23000000),
('B05', 2, 'Beat', 13000000),
('B07', 2, 'New MegaPro DISK', 18500000),
('B08', 3, 'Blitz', 12500000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
