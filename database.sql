/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 10.4.8-MariaDB : Database - sipenurut
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sipenurut` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sipenurut`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_admin` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `superadmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id`,`nm_admin`,`username`,`password`,`superadmin`) values (1,'Super Admin','Superadmin','e10adc3949ba59abbe56e057f20f883e',1);

/*Table structure for table `ajar` */

DROP TABLE IF EXISTS `ajar`;

CREATE TABLE `ajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_permintaan` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` enum('Aktif','Selesai') DEFAULT NULL,
  `review` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ajar` */

insert  into `ajar`(`id`,`id_permintaan`,`tgl_mulai`,`tgl_selesai`,`status`,`review`) values (4,14,'2020-01-07','2020-01-14','Selesai',1);

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_guru` varchar(100) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katolik','Buddha','Hindu','Konghucu') DEFAULT NULL,
  `jenjang` enum('SD','SMP','SMA') DEFAULT NULL,
  `jurusan` enum('IPA','IPS') DEFAULT NULL,
  `pddterakhir` enum('Sedang Kuliah','D3','S1/D4','S2','S3') DEFAULT NULL,
  `jurusanpdd` varchar(100) DEFAULT NULL,
  `ijazah` text DEFAULT NULL,
  `nilai` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `verifikasi` enum('Belum Terverifikasi','Terverifikasi','Permintaan Ditolak') DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jns_kel` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_wilayah` (`id_wilayah`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `guru` */

insert  into `guru`(`id`,`nm_guru`,`tmpt_lahir`,`tgl_lahir`,`alamat`,`agama`,`jenjang`,`jurusan`,`pddterakhir`,`jurusanpdd`,`ijazah`,`nilai`,`foto`,`verifikasi`,`id_wilayah`,`username`,`password`,`no_hp`,`jns_kel`,`deskripsi`) values (6,'Bima Febriansyah','Pontianak','1998-02-10','Jl. Perdamaian, Komplek Borneo 1 Blok B3, Kab. Kubu Raya, Kalimantan Barat','Islam','SMA','IPA','D3','Komputer','ftpdf_3_0011.png','khs_bima000121.jpg','DSC_14111.jpg','Terverifikasi',2,'BmF1002','e10adc3949ba59abbe56e057f20f883e','89693943932','Laki-laki','Saya adalah lulusan dari Universitas Bina Sarana Informatika untuk D3 Sistem Infromasi');

/*Table structure for table `murid` */

DROP TABLE IF EXISTS `murid`;

CREATE TABLE `murid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_murid` varchar(100) DEFAULT NULL,
  `jns_kel` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tmpt_lahir` varbinary(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katolik','Buddha','Hindu','Konghucu') DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `murid` */

insert  into `murid`(`id`,`nm_murid`,`jns_kel`,`tmpt_lahir`,`tgl_lahir`,`alamat`,`agama`,`no_hp`,`email`,`password`) values (1,'Bima Febriansyah','Laki-laki','Pontianak','1998-02-10','Jl. Perdamaian Komplek Borneo 1 blok b2, Pontianak, Kalimantan Barat','Islam','089693943932','ini.mailku1@gmail.com','e10adc3949ba59abbe56e057f20f883e'),(5,'Joko Susilo',NULL,NULL,NULL,NULL,NULL,'089693943932','jokosusilo@mail.com','e10adc3949ba59abbe56e057f20f883e');

/*Table structure for table `permintaan` */

DROP TABLE IF EXISTS `permintaan`;

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_murid` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `jumlah` int(3) DEFAULT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `status` enum('Terima','Tolak','Proses') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `permintaan` */

insert  into `permintaan`(`id`,`id_murid`,`id_guru`,`tgl`,`jumlah`,`hari`,`status`) values (14,5,6,'2020-01-14 10:01:08',3,'Senin, Rabu, Jumat','Terima');

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ajar` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_murid` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `review` */

insert  into `review`(`id`,`id_ajar`,`id_guru`,`id_murid`,`tgl`,`ulasan`,`rate`) values (7,4,6,5,'2020-01-14 10:03:25','Gurunya ramah dan baik. ????????',5);

/*Table structure for table `verifikasi` */

DROP TABLE IF EXISTS `verifikasi`;

CREATE TABLE `verifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `status` enum('Proses','Terima','Tolak') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `verifikasi` */

insert  into `verifikasi`(`id`,`id_guru`,`tgl_update`,`status`) values (3,6,'2020-01-14 09:57:44','Terima');

/*Table structure for table `wilayah` */

DROP TABLE IF EXISTS `wilayah`;

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `wilayah` */

insert  into `wilayah`(`id`,`kota`,`provinsi`) values (1,'Singkawang','Kalimantan Barat'),(2,'Pontianak','Kalimantan Barat'),(3,'Ketapang','Kalimantan Barat');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
