/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.30 : Database - blognew
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blognew` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `blognew`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `ID_BLOG` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `ID_KONTEN` varchar(255) DEFAULT NULL,
  `ID_KATEGORI` int NOT NULL,
  `JUDUL` varchar(255) DEFAULT NULL,
  `SLUG` varchar(150) DEFAULT NULL,
  `STATUS_PUBLISH` char(1) DEFAULT NULL,
  `TGL_UPLOAD` timestamp NULL DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL,
  `DELETED_AT` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_BLOG`),
  KEY `FK_RELATIONSHIP_1` (`ID_USER`),
  KEY `FK_RELATIONSHIP_2` (`ID_KATEGORI`),
  KEY `FK_RELATIONSHIP_3` (`ID_KONTEN`),
  CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_KONTEN`) REFERENCES `konten` (`ID_KONTEN`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `blog` */

insert  into `blog`(`ID_BLOG`,`ID_USER`,`ID_KONTEN`,`ID_KATEGORI`,`JUDUL`,`SLUG`,`STATUS_PUBLISH`,`TGL_UPLOAD`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
(3,1,'satu-satu-sayang-ibu102',2,'Satu satu sayang ibu','satu-satu-sayang-ibu','1','2023-02-22 14:21:48','2023-02-22 07:07:58','2023-02-22 07:17:37',NULL),
(4,1,'apa-iyaa110',2,'Apa iyaa','apa-iyaa','0','2023-02-22 09:05:53','2023-02-22 07:50:11','2023-02-22 09:05:53',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `ID_KATEGORI` int NOT NULL AUTO_INCREMENT,
  `KATEGORI` varchar(200) NOT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL,
  `DELETED_AT` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_KATEGORI`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`ID_KATEGORI`,`KATEGORI`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
(1,'Kategori 1',NULL,NULL,NULL),
(2,'Kategori 2',NULL,NULL,NULL);

/*Table structure for table `konten` */

DROP TABLE IF EXISTS `konten`;

CREATE TABLE `konten` (
  `ID_KONTEN` varchar(255) NOT NULL,
  `ISI` text NOT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL,
  `DELETED_AT` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_KONTEN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `konten` */

insert  into `konten`(`ID_KONTEN`,`ISI`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
('apa-iyaa110','<p>Get the HTML content of an element with id=&quot;myP&quot;:</p>\r\n\r\n<p><img alt=\"\" src=\"http://pretest.test/images/WhatsApp Image 2023-01-30 at 19.45.42_1677055593.jpeg\" style=\"height:608px; width:1080px\" /></p>','2023-02-22 08:46:45','2023-02-22 08:46:45',NULL),
('satu-satu-sayang-ibu102','<p>Cek Blog</p>\r\n\r\n<p><img alt=\"VB Zoom\" src=\"http://pretest.test/images/VB PESERTA MSIB_1677050217.png\" style=\"height:608px; width:1080px\" /></p>\r\n\r\n<p>hnajkwdm</p>\r\n\r\n<p>kadwnnnjad bkawdkd jnjwda dklkwd kalwda&nbsp;</p>','2023-02-22 07:17:37','2023-02-22 08:04:01',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `ID_USER` int NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAMA_DEPAN` varchar(150) NOT NULL,
  `NAMA_BELAKANG` varchar(150) DEFAULT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL,
  `DELETED_AT` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`ID_USER`,`EMAIL`,`PASSWORD`,`NAMA_DEPAN`,`NAMA_BELAKANG`,`USERNAME`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
(1,'hilmi@gmail.com','$2y$10$e2JAQ7Cx2LJfsJadlTZFCOlYFQ2Kn1X9IC7fC8V5KZp0u1nfuJXGC','Muhammad Hilmi','Zain','hilmi@gmail.com','2023-02-22 07:01:52','2023-02-22 07:01:52',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Muhammad Hilmi Zain','hilmi@gmail.com',NULL,'$2y$10$EXE9DrI6J9Wh1edWrMsiueyLRS87H9c/P1ruDk1kGUZTXB9bKdEzi',NULL,'2023-02-22 07:01:52','2023-02-22 07:01:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
