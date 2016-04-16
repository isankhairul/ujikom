-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2016 at 09:01 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `angsuran`
--
CREATE DATABASE `angsuran` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `angsuran`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(3) NOT NULL auto_increment,
  `nama` varchar(255) collate latin1_general_ci NOT NULL,
  `email` varchar(255) collate latin1_general_ci NOT NULL,
  `kelamin` varchar(8) collate latin1_general_ci NOT NULL,
  `user` varchar(25) collate latin1_general_ci NOT NULL,
  `password` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `kelamin`, `user`, `password`) VALUES
(1, 'Septiadi Satyo Nugroho', 'adidoeldoly21@gmail.com', 'pria', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE IF NOT EXISTS `angsuran` (
  `no_ang` int(100) NOT NULL auto_increment,
  `tgl` date NOT NULL,
  `tgl_tempo` date NOT NULL,
  `ags_ke` int(100) NOT NULL,
  `telat` int(100) NOT NULL,
  `denda` int(100) NOT NULL,
  `no` varchar(6) NOT NULL,
  `id_nasabah` varchar(6) NOT NULL,
  PRIMARY KEY  (`no_ang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`no_ang`, `tgl`, `tgl_tempo`, `ags_ke`, `telat`, `denda`, `no`, `id_nasabah`) VALUES
(1, '2012-09-10', '2012-10-02', 1, 0, 0, 'PN0002', 'NB0004'),
(2, '2012-09-10', '2012-11-02', 2, 0, 0, 'PN0002', 'NB0004'),
(3, '2012-09-10', '2012-10-06', 1, 0, 0, 'PN0001', 'NB0001'),
(4, '2012-09-12', '2012-11-06', 2, 0, 0, 'PN0001', 'NB0001'),
(5, '2012-10-30', '2012-12-02', 3, 0, 0, 'PN0002', 'NB0004'),
(6, '2013-04-06', '2013-01-02', 4, 94, 390100, 'PN0002', 'NB0004'),
(7, '2013-09-09', '2012-12-06', 3, 277, 300086, 'PN0001', 'NB0001');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(3) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY  (`id_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_merek`, `nama_barang`, `harga`) VALUES
('B01', 0, 'Eolia', 10000000),
('B02', 0, 'Polytron', 17000000),
('B03', 0, 'Sharp', 12000000),
('B04', 0, 'Samsung', 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_cust` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telepon` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_cust`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cust`, `nama`, `alamat`, `ktp`, `tempat_lahir`, `tanggal_lahir`, `telepon`) VALUES
('CS001', 'Muhammad Solahudin', 'Jl. Bandengan Utara Kav 70 jakarta Utara', '0813000054664', '', '0000-00-00', ''),
('CS002', 'Jason Becker Al Ahmad', 'Jl. Gunung Sahari', '55664439009090', 'Jakarta', '1979-03-08', '0812223060757'),
('CS003', 'Ryan Pramana', 'jl. Raya Imam Bonjol Perum Aster', '00092812211222', 'Palembang', '1987-05-12', ''),
('CS004', 'Jimmy Page', 'Jl. K.H. hasyim Asyari', '29001245889800', 'Tegal', '1986-11-01', ''),
('CS005', 'James Hatfield', 'Jl. haji Juanda 43A', '878722220021212', 'tegal', '1987-02-03', '081345678008'),
('CS006', 'Dave Mustaine', 'jl. Ir Soekarno AA98', '332321000044746', 'New York', '1989-07-01', '02189878762'),
('CS007', 'Kasino hadiwibowo', 'Jl. KH Hasyim Asyari', '3390111221123445', 'Gombong', '1985-07-31', '085742798012'),
('CS008', 'David Elfiansyah', 'Jl. Kapten Tendean no 11', '512300909090192', 'Jakarta', '1989-10-06', '081326760021'),
('CS009', 'Bagus Pradino', 'Jl. Gunung Sahari no 9', '5470007732332122', 'Serang', '1990-11-23', '08581234500'),
('CS010', 'jajal', 'Kebayoran lama', '087735353519', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `lama`
--

CREATE TABLE IF NOT EXISTS `lama` (
  `id` int(10) NOT NULL auto_increment,
  `lama` int(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lama`
--

INSERT INTO `lama` (`id`, `lama`) VALUES
(1, 12),
(2, 24),
(3, 36),
(4, 48),
(6, 60);

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE IF NOT EXISTS `merek` (
  `id_merek` int(11) NOT NULL auto_increment,
  `n_merek` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_merek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `n_merek`) VALUES
(1, 'Yamaha'),
(2, 'Honda'),
(3, 'Kawasaki');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE IF NOT EXISTS `nasabah` (
  `id` varchar(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `nama`, `ktp`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `telpon`, `email`) VALUES
('NB0001', 'Akhmad Dharma', '13787038473849', 'Bogor', '1990-09-25', 'Serua Raya, Sawangan Depok', '085691738451', 'dharma@lokomedia.com'),
('NB0002', 'Andik Firmansyah', '', 'Jakarta', '1984-09-05', 'Jl. Ciputat No.44, Tangerang Selatan', '08562823115', 'andik@yahoo.com'),
('NB0004', 'Kresna Abimanyu', '', 'Jakarta', '1980-03-12', 'Jalan Jombang Raya No. 12 ', '08573515129', 'abim19@yahoo.com'),
('NB0003', 'Ari Setiawan', '', 'Bojongsari', '1989-09-22', 'Jl. Kesuman 23', '0878625522', 'matriks27@yahoo.com'),
('NB0005', 'Dewi Retno Wulan', '', 'Jakarta', '1989-07-07', 'Jalan Paninggilan Ciledug', '0218366386', 'dewi289@yahoo.com'),
('NB0006', 'Joni Adi Surya', '', 'Samarinda', '1991-09-25', 'Jalan Montong Raya 23', '08561622161', 'joni@gmail.com'),
('NB0007', 'Eko Sulistyo', '137982374809189', 'Klaten', '1991-04-17', 'Jl. Sudirman No. 60', '08120984098', 'ekosulistyo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `no` varchar(6) NOT NULL,
  `tgl` date NOT NULL,
  `pokok` bigint(20) NOT NULL,
  `lama` int(10) NOT NULL,
  `bunga` float NOT NULL,
  `angsuran` bigint(20) NOT NULL,
  `status` enum('belum','lunas') NOT NULL default 'belum',
  `id` varchar(12) NOT NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`no`, `tgl`, `pokok`, `lama`, `bunga`, `angsuran`, `status`, `id`) VALUES
('PN0001', '2012-09-06', 1000000, 12, 30, 108334, 'belum', 'NB0001'),
('PN0002', '2012-09-02', 6000000, 24, 33, 415000, 'belum', 'NB0004'),
('PN0003', '2012-09-12', 3000000, 36, 20, 133334, 'belum', 'NB0002'),
('PN0004', '2013-04-02', 10000000, 36, 20, 444445, 'belum', 'NB0006'),
('PN0005', '2013-04-06', 8000000, 12, 10, 733334, 'belum', 'NB0003');

-- --------------------------------------------------------

--
-- Table structure for table `pokok`
--

CREATE TABLE IF NOT EXISTS `pokok` (
  `id` int(10) NOT NULL auto_increment,
  `pokok` int(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `pokok`
--

INSERT INTO `pokok` (`id`, `pokok`) VALUES
(1, 5000000),
(3, 6000000),
(4, 7000000),
(5, 8000000),
(6, 9000000),
(7, 10000000),
(8, 11000000),
(9, 12000000),
(10, 13000000),
(11, 14000000),
(12, 15000000),
(13, 16000000),
(14, 17000000),
(15, 18000000),
(16, 19000000),
(18, 20000000),
(19, 21000000),
(20, 22000000),
(21, 23000000),
(22, 24000000),
(24, 25000000),
(25, 1000000),
(26, 2000000),
(27, 3000000),
(28, 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `nama`, `ktp`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`) VALUES
('SL001', 'Dodi Or Black', '', '', '0000-00-00', 'Jl. Kramat Raya no 1', '02189875221'),
('SL003', 'faizal hamdur', '', '', '0000-00-00', 'Jl. Kebagusan scdsacacsd', '087783373340'),
('SL004', 'Rianty Novemberini', '1120092238212231', 'Medan', '1988-04-02', 'jl. perintis Kemerdekaan', '0217345678');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_trans` varchar(5) NOT NULL,
  `id_cust` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `dp` int(11) NOT NULL,
  `tgl_trans` date NOT NULL,
  PRIMARY KEY  (`id_trans`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_cust`, `nama_barang`, `dp`, `tgl_trans`) VALUES
('TR001', 'CS001', 'Beat', 500000, '2013-09-01'),
('TR002', 'CS004', 'New Vixion', 800000, '2013-09-06'),
('TR003', 'CS010', 'Ninja 250', 5000000, '2013-09-01');
