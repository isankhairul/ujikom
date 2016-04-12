-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2013 at 02:33 PM
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
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_trans` varchar(5) NOT NULL,
  `id_cust` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `dp` int(11) NOT NULL,
  `jmlBayar` int(100) NOT NULL,
  `tgl_trans` date NOT NULL,
  `tgl_bayar` date NOT NULL,
  `flag_bayar` set('0','1') NOT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_cust`, `nama_barang`, `dp`, `jmlBayar`, `tgl_trans`, `tgl_bayar`, `flag_bayar`) VALUES
('TR001', 'CS001', 'Beat', 500000, 5000000, '2013-09-01', '2013-09-13', '1'),
('TR002', 'CS004', 'New Vixion', 800000, 0, '2013-09-06', '0000-00-00', '1'),
('TR003', 'CS010', 'Ninja 250', 5000000, 0, '2013-09-01', '0000-00-00', '0'),
('TR004', 'CS011', 'Blitz', 800000, 0, '2013-09-03', '0000-00-00', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
