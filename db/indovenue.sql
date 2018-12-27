/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.10-MariaDB : Database - indovenuedb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `room_rating` */

DROP TABLE IF EXISTS `room_rating`;

CREATE TABLE `room_rating` (
  `id_room` varchar(100) NOT NULL,
  `id_booking` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `rating_value` int(2) NOT NULL,
  `rating_description` varchar(200) NOT NULL,
  `rating_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_room`,`id_booking`,`account_name`),
  KEY `id_booking` (`id_booking`),
  KEY `account_name` (`account_name`),
  CONSTRAINT `room_rating_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `room_master` (`id_room`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_rating_ibfk_2` FOREIGN KEY (`id_booking`) REFERENCES `booking_master` (`id_booking`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_rating_ibfk_3` FOREIGN KEY (`account_name`) REFERENCES `account` (`account_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `room_rating` */

LOCK TABLES `room_rating` WRITE;

insert  into `room_rating`(`id_room`,`id_booking`,`account_name`,`rating_value`,`rating_description`,`rating_date`) values ('KRM000001','INV000003','muchilham',4,'Sangat sangat bagus!','2017-10-08 11:58:32'),('KRM000001','INV000010','muchilham',4,'sdaf','2017-10-08 20:26:39');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
