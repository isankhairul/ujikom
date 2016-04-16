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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id_barang` varchar(3) NOT NULL,
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
INSERT INTO `barang` VALUES ('B01','Eolia',10000000),('B02','Polytron',17000000),('B03','Sharp',12000000),('B04','Samsung',15000000);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal` (
  `id_jadwal` varchar(6) NOT NULL,
  `id_pelanggan` varchar(5) DEFAULT NULL,
  `id_teknisi` varchar(5) DEFAULT NULL,
  `tipe_pelayanan` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` varchar(5) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT '',
  `jam` varchar(10) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES ('JD0001','CS003','TK001','Service','2016-04-14','B02','ok','22:18','test'),('JD0002','CS005','TK003','Service','2016-04-15','B04','ok','22:18','test'),('JD0003','PL003','TK002','Service','2016-04-15','B02','ok','23:38','test'),('JD0004','PL005','TK003','Service','2016-04-23','B04','belum_proses','23:38','test');
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telepon` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES ('PL001','Muhammad Solahudin','Jl. Bandengan Utara Kav 70 jakarta Utara','0813000054664','','0000-00-00',''),('PL002','Jason Becker Al Ahmad','Jl. Gunung Sahari','55664439009090','Jakarta','1979-03-08','0812223060757'),('PL003','Ryan Pramana','jl. Raya Imam Bonjol Perum Aster','00092812211222','Palembang','1987-05-12',''),('PL004','Jimmy Page','Jl. K.H. hasyim Asyari','29001245889800','Tegal','1986-11-01',''),('PL005','James Hatfield','Jl. haji Juanda 43A','878722220021212','tegal','1987-02-03','081345678008'),('PL006','Dave Mustaine','jl. Ir Soekarno AA98','332321000044746','New York','1989-07-01','02189878762'),('PL007','Kasino hadiwibowo','Jl. KH Hasyim Asyari','3390111221123445','Gombong','1985-07-31','085742798012'),('PL008','David Elfiansyah','Jl. Kapten Tendean no 11','512300909090192','Jakarta','1989-10-06','081326760021'),('PL009','Bagus Pradino','Jl. Gunung Sahari no 9','5470007732332122','Serang','1990-11-23','08581234500');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
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
INSERT INTO `teknisi` VALUES ('TK001','Dodi Or Black','','','0000-00-00','Jl. Kramat Raya no 1','02189875221'),('TK002','faizal hamdur','','','0000-00-00','Jl. Kebagusan scdsacacsd','087783373340'),('TK003','Rianty Novemberini','1120092238212231','Medan','1988-04-02','jl. perintis Kemerdekaan','0217345678');
/*!40000 ALTER TABLE `teknisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id_transaksi` varchar(6) NOT NULL,
  `id_jadwal` varchar(6) DEFAULT NULL,
  `jum_pembayaran` double(15,0) DEFAULT NULL,
  `last_update` datetime DEFAULT '2016-04-04 00:00:00',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES ('TR0001','JD0003',500000,'2016-04-14 23:38:43');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `kelamin` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `hak_akses` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','adidoeldoly21@gmail.com','pria','admin'),(2,'bejo','e10adc3949ba59abbe56e057f20f883e','bejo@gmail.com','pria','teknisi'),(3,'manager','e10adc3949ba59abbe56e057f20f883e','manager@gmail.com','pria','manager');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-14 23:41:58
