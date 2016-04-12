-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: angsuran
-- ------------------------------------------------------
-- Server version	5.6.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `kelamin` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `user` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Septiadi Satyo Nugroho','adidoeldoly21@gmail.com','pria','admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `angsuran`
--

DROP TABLE IF EXISTS `angsuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `angsuran` (
  `no_ang` int(100) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `tgl_tempo` date NOT NULL,
  `ags_ke` int(100) NOT NULL,
  `telat` int(100) NOT NULL,
  `denda` int(100) NOT NULL,
  `no` varchar(6) NOT NULL,
  `id_nasabah` varchar(6) NOT NULL,
  PRIMARY KEY (`no_ang`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `angsuran`
--

LOCK TABLES `angsuran` WRITE;
/*!40000 ALTER TABLE `angsuran` DISABLE KEYS */;
INSERT INTO `angsuran` VALUES (1,'2012-09-10','2012-10-02',1,0,0,'PN0002','NB0004'),(2,'2012-09-10','2012-11-02',2,0,0,'PN0002','NB0004'),(3,'2012-09-10','2012-10-06',1,0,0,'PN0001','NB0001'),(4,'2012-09-12','2012-11-06',2,0,0,'PN0001','NB0001'),(5,'2012-10-30','2012-12-02',3,0,0,'PN0002','NB0004'),(6,'2013-04-06','2013-01-02',4,94,390100,'PN0002','NB0004'),(7,'2013-09-09','2012-12-06',3,277,300086,'PN0001','NB0001');
/*!40000 ALTER TABLE `angsuran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id_barang` varchar(3) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES ('B01',0,'Eolia',10000000),('B02',0,'Polytron',17000000),('B03',0,'Sharp',12000000),('B04',0,'Samsung',15000000);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id_cust` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telepon` varchar(15) NOT NULL,
  PRIMARY KEY (`id_cust`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('CS001','Muhammad Solahudin 2','Jl. Bandengan Utara Kav 70 jakarta Utara','0813000054664','','0000-00-00',''),('CS002','Jason Becker Al Ahmad','Jl. Gunung Sahari','55664439009090','Jakarta','1979-03-08','0812223060757'),('CS003','Ryan Pramana','jl. Raya Imam Bonjol Perum Aster','00092812211222','Palembang','1987-05-12',''),('CS004','Jimmy Page','Jl. K.H. hasyim Asyari','29001245889800','Tegal','1986-11-01',''),('CS005','James Hatfield','Jl. haji Juanda 43A','878722220021212','tegal','1987-02-03','081345678008'),('CS006','Dave Mustaine','jl. Ir Soekarno AA98','332321000044746','New York','1989-07-01','02189878762'),('CS007','Kasino hadiwibowo','Jl. KH Hasyim Asyari','3390111221123445','Gombong','1985-07-31','085742798012'),('CS008','David Elfiansyah','Jl. Kapten Tendean no 11','512300909090192','Jakarta','1989-10-06','081326760021'),('CS009','Bagus Pradino','Jl. Gunung Sahari no 9','5470007732332122','Serang','1990-11-23','08581234500'),('CS010','jajal','Kebayoran lama','087735353519','','0000-00-00','');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lama`
--

DROP TABLE IF EXISTS `lama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lama` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lama` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lama`
--

LOCK TABLES `lama` WRITE;
/*!40000 ALTER TABLE `lama` DISABLE KEYS */;
INSERT INTO `lama` VALUES (1,12),(2,24),(3,36),(4,48),(6,60);
/*!40000 ALTER TABLE `lama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merek`
--

DROP TABLE IF EXISTS `merek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merek` (
  `id_merek` int(11) NOT NULL AUTO_INCREMENT,
  `n_merek` varchar(50) NOT NULL,
  PRIMARY KEY (`id_merek`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merek`
--

LOCK TABLES `merek` WRITE;
/*!40000 ALTER TABLE `merek` DISABLE KEYS */;
INSERT INTO `merek` VALUES (1,'Yamaha'),(2,'Honda'),(3,'Kawasaki');
/*!40000 ALTER TABLE `merek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nasabah`
--

DROP TABLE IF EXISTS `nasabah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nasabah` (
  `id` varchar(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nasabah`
--

LOCK TABLES `nasabah` WRITE;
/*!40000 ALTER TABLE `nasabah` DISABLE KEYS */;
INSERT INTO `nasabah` VALUES ('NB0001','Akhmad Dharma','13787038473849','Bogor','1990-09-25','Serua Raya, Sawangan Depok','085691738451','dharma@lokomedia.com'),('NB0002','Andik Firmansyah','','Jakarta','1984-09-05','Jl. Ciputat No.44, Tangerang Selatan','08562823115','andik@yahoo.com'),('NB0004','Kresna Abimanyu','','Jakarta','1980-03-12','Jalan Jombang Raya No. 12 ','08573515129','abim19@yahoo.com'),('NB0003','Ari Setiawan','','Bojongsari','1989-09-22','Jl. Kesuman 23','0878625522','matriks27@yahoo.com'),('NB0005','Dewi Retno Wulan','','Jakarta','1989-07-07','Jalan Paninggilan Ciledug','0218366386','dewi289@yahoo.com'),('NB0006','Joni Adi Surya','','Samarinda','1991-09-25','Jalan Montong Raya 23','08561622161','joni@gmail.com'),('NB0007','Eko Sulistyo','137982374809189','Klaten','1991-04-17','Jl. Sudirman No. 60','08120984098','ekosulistyo@gmail.com');
/*!40000 ALTER TABLE `nasabah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pinjaman`
--

DROP TABLE IF EXISTS `pinjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pinjaman` (
  `no` varchar(6) NOT NULL,
  `tgl` date NOT NULL,
  `pokok` bigint(20) NOT NULL,
  `lama` int(10) NOT NULL,
  `bunga` float NOT NULL,
  `angsuran` bigint(20) NOT NULL,
  `status` enum('belum','lunas') NOT NULL DEFAULT 'belum',
  `id` varchar(12) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pinjaman`
--

LOCK TABLES `pinjaman` WRITE;
/*!40000 ALTER TABLE `pinjaman` DISABLE KEYS */;
INSERT INTO `pinjaman` VALUES ('PN0001','2012-09-06',1000000,12,30,108334,'belum','NB0001'),('PN0002','2012-09-02',6000000,24,33,415000,'belum','NB0004'),('PN0003','2012-09-12',3000000,36,20,133334,'belum','NB0002'),('PN0004','2013-04-02',10000000,36,20,444445,'belum','NB0006'),('PN0005','2013-04-06',8000000,12,10,733334,'belum','NB0003');
/*!40000 ALTER TABLE `pinjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokok`
--

DROP TABLE IF EXISTS `pokok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokok` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pokok` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokok`
--

LOCK TABLES `pokok` WRITE;
/*!40000 ALTER TABLE `pokok` DISABLE KEYS */;
INSERT INTO `pokok` VALUES (1,5000000),(3,6000000),(4,7000000),(5,8000000),(6,9000000),(7,10000000),(8,11000000),(9,12000000),(10,13000000),(11,14000000),(12,15000000),(13,16000000),(14,17000000),(15,18000000),(16,19000000),(18,20000000),(19,21000000),(20,22000000),(21,23000000),(22,24000000),(24,25000000),(25,1000000),(26,2000000),(27,3000000),(28,4000000);
/*!40000 ALTER TABLE `pokok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teknisi`
--

DROP TABLE IF EXISTS `teknisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teknisi` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teknisi`
--

LOCK TABLES `teknisi` WRITE;
/*!40000 ALTER TABLE `teknisi` DISABLE KEYS */;
INSERT INTO `teknisi` VALUES ('TK001','Dodi Or Black','','','0000-00-00','Jl. Kramat Raya no 1','02189875221'),('TK002','faizal hamdur','','','0000-00-00','Jl. Kebagusan scdsacacsd','087783373340'),('TK003','Rianty Novemberini','1120092238212231','Medan','1988-04-02','jl. perintis Kemerdekaan','0217345678'),('TK004','test','','','0000-00-00','test','0212345');
/*!40000 ALTER TABLE `teknisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id_trans` varchar(5) NOT NULL,
  `id_cust` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `dp` int(11) NOT NULL,
  `tgl_trans` date NOT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES ('TR001','CS001','Beat',500000,'2013-09-01'),('TR002','CS004','New Vixion',800000,'2013-09-06'),('TR003','CS010','Ninja 250',5000000,'2013-09-01');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-12 22:47:15
