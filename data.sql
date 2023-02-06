/*
SQLyog Enterprise
MySQL - 5.7.24 : Database - data
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `t_buku` */

CREATE TABLE `t_buku` (
  `Id_buku` varchar(5) NOT NULL,
  `Kategori` enum('Keilmuan','Bisnis','Novel') DEFAULT NULL,
  `Nama_Buku` text NOT NULL,
  `Harga` int(11) NOT NULL,
  `Stok` int(11) NOT NULL,
  `id_penerbit` varchar(5) NOT NULL,
  PRIMARY KEY (`Id_buku`),
  KEY `id_penerbit` (`id_penerbit`),
  CONSTRAINT `t_buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `t_penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_buku` */

insert  into `t_buku`(`Id_buku`,`Kategori`,`Nama_Buku`,`Harga`,`Stok`,`id_penerbit`) values 
('B1001','Bisnis','Bisnis Online',75000,9,'SP01'),
('B1002','Bisnis','Etika Bisnis dan Tanggung Jawab Sosial',67500,20,'SP01'),
('K1001','Keilmuan','Analisis & Perancangan Sistem Informasi',50000,60,'SP01'),
('K1002','Keilmuan','Artifical Intelligence',45000,60,'SP01'),
('K2003','Keilmuan','Autocad 3 Dimensi',40000,25,'SP01'),
('K3004','Keilmuan','Cloud Computing Technology',85000,15,'SP01'),
('N1001','Novel','Cahaya Di Penjuru Hati',68000,5,'SP02'),
('N1002','Novel','Aku Ingin Cerita',48000,12,'SP03');

/*Table structure for table `t_penerbit` */

CREATE TABLE `t_penerbit` (
  `id_penerbit` varchar(5) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Alamat` text NOT NULL,
  `Kota` varchar(20) NOT NULL,
  `Telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_penerbit` */

insert  into `t_penerbit`(`id_penerbit`,`Nama`,`Alamat`,`Kota`,`Telepon`) values 
('SP01','Penerbit Informatika','jl. Buah Batu no.121','Bandung','0813-2220-1946'),
('SP02','Andi Offset','jl. Suryalaya IX no.3','Bandung','0878-3903-0688'),
('SP03','Danendra','jl Moch. Toha 44','Bandung','022-5201215');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
