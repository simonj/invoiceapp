# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18-0ubuntu0.16.04.1)
# Database: invoiceapp
# Generation Time: 2017-06-30 18:00:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table client_invoice_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `client_invoice_items`;

CREATE TABLE `client_invoice_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_invoice_id` int(10) unsigned NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_invoice_items_client_invoice_id_foreign` (`client_invoice_id`),
  CONSTRAINT `client_invoice_items_client_invoice_id_foreign` FOREIGN KEY (`client_invoice_id`) REFERENCES `client_invoice_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `client_invoice_items` WRITE;
/*!40000 ALTER TABLE `client_invoice_items` DISABLE KEYS */;

INSERT INTO `client_invoice_items` (`id`, `client_invoice_id`, `quantity`, `description`, `price`, `created_at`, `updated_at`)
VALUES
	(1,1,'1','asdsa','150','2016-05-14 11:02:13','2016-05-14 11:02:13'),
	(2,2,'1','asdsa','150','2016-05-14 11:02:31','2016-05-14 11:02:31'),
	(3,3,'1','test','1500','2016-05-14 11:03:31','2016-05-14 11:03:31'),
	(4,4,'1','adsasds','155','2016-05-17 11:43:49','2016-05-17 11:43:49'),
	(5,5,'1','haha','1','2016-06-03 07:16:47','2016-06-03 07:16:47'),
	(6,6,'1','494894','48','2016-06-03 07:19:44','2016-06-03 07:19:44'),
	(8,8,'1','saddas','2323','2017-03-21 18:42:38','2017-03-21 18:42:38');

/*!40000 ALTER TABLE `client_invoice_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table client_invoices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `client_invoices`;

CREATE TABLE `client_invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `due_date` datetime NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `has_open_email` int(11) NOT NULL,
  `has_visited_link` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_invoices_client_id_foreign` (`client_id`),
  KEY `client_invoices_user_id_foreign` (`user_id`),
  CONSTRAINT `client_invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `client_invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `client_invoices` WRITE;
/*!40000 ALTER TABLE `client_invoices` DISABLE KEYS */;

INSERT INTO `client_invoices` (`id`, `reference_key`, `client_id`, `user_id`, `due_date`, `status`, `amount`, `paid`, `created_at`, `updated_at`, `has_open_email`, `has_visited_link`)
VALUES
	(5,'755XknFbUGU8xe5H8FsAL2MiuV7OvkBS6l7t7udEkAD5IMRKNepM8WphdaXf',2,2,'2019-09-15 00:00:00','sent',1,0,'2016-06-03 07:16:47','2016-06-03 07:16:47',0,0),
	(6,'GCdxbTMh3xxsdl6lBwTLcUsJFye5bYbIYjTZBAMNfw2spKK2PqyrEebUGsYH',2,2,'2015-01-03 00:00:00','sent',48,0,'2016-06-03 07:19:44','2016-06-03 07:19:44',0,0),
	(8,'MZxFiULMkhhPjyfiB0TDQauSkoSm46yOTpCeLuzdJxJkpIB0vUqNbw6Nb2sc',7,1,'2017-03-21 00:00:00','sent',2323,0,'2017-03-21 18:42:38','2017-03-21 18:42:38',0,0);

/*!40000 ALTER TABLE `client_invoices` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_url` text COLLATE utf8_unicode_ci,
  `uses_two_factor_auth` tinyint(4) NOT NULL DEFAULT '0',
  `authy_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_factor_reset_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_team_id` int(11) DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_enabled` int(11) DEFAULT NULL,
  `stripe_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_refresh_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_publishable_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_billing_plan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address_line_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_zip` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_billing_information` text COLLATE utf8_unicode_ci,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `last_read_announcements_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `photo_url`, `uses_two_factor_auth`, `authy_id`, `country_code`, `phone`, `two_factor_reset_code`, `current_team_id`, `stripe_id`, `stripe_user_id`, `stripe_enabled`, `stripe_access_token`, `stripe_refresh_token`, `stripe_publishable_key`, `current_billing_plan`, `card_brand`, `card_last_four`, `card_country`, `billing_address`, `billing_address_line_2`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `vat_id`, `extra_billing_information`, `trial_ends_at`, `last_read_announcements_at`, `created_at`, `updated_at`)
VALUES
	(1,'Simon','sijmon2003@gmail.com','$2y$10$yiKfK.ygTz6V3U2qtURNKudTFtPOA2jpiJlxZgZ5zH7bfquDLTFFC','DktRsHzyCHmQpoCRFgpNzyugdEZscXKVsR79FN7h1n1tpMyjy1KyokyRRziZ','/storage/profiles/f7fe38403c296c7fcfb907b063afd59e.jpeg',0,NULL,NULL,NULL,NULL,NULL,'cus_8aBPpYj0NxqkD8','acct_17eUnICln4HTQohO',1,'sk_live_9dmEzyI2uzYWON1vVUrLuPes','rt_8aAa4CB5PUpGkTR8qgaK7LaU9fPH0eCBMmCSOolW6xJenvCD','pk_live_WlqRzzAWLQ9O3q5dwHIF2TAw','Pro','Visa','6643',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-24 18:09:32','2016-05-12 17:24:08','2016-10-24 18:09:38'),
	(2,'John Høj Andreassen','john.andreassen83@gmail.com','$2y$10$hGAFMn7E.HzmFc.y26Z7EOThX2ONmmOLkbDBxy1c.w5XxxkeEmQz6',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-06-17 07:12:50','2016-06-03 07:12:50','2016-06-03 07:12:50','2016-06-03 07:12:50'),
	(3,'A Slack Test User','slackuser@slackage.com','$2y$10$H6VWHEpcXLoqQThrKohhfOt7mVHBHQshvZa2vd.9tuXW4uRa9TUsm','a9NOL9LNT6iOwUezNzR1t9v4BtmMBg3zUJd7W9EMU503gJpvb4tLDhng3vx8',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-06-19 15:00:51','2016-06-05 15:00:51','2016-06-05 15:00:51','2016-06-05 15:14:01'),
	(4,'Brian Dillingham','test@test.com','$2y$10$vPvIDDLx2IgIgQ278RL4F.x.AKLvQ2H0sWTTs7E07f/hKSgU.Zw0q',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-06-19 17:00:01','2016-06-05 17:02:55','2016-06-05 17:00:01','2016-06-05 17:02:55'),
	(5,'Mikkel Bonde','mikbonde@gmail.com','$2y$10$DA.hdwO02Ko79Py3A4i2zO.wyAn/pm1.d99G1MygFsgYRnKDPYmPu',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-06-20 19:03:11','2016-06-06 19:04:57','2016-06-06 19:03:11','2016-06-06 19:04:57'),
	(6,'Thomas Roel','therealroel@gmail.com','$2y$10$gaJVnkRBKMcF.pLl01I9mekUkarJAzsIGCsqngkGVAmW53s6Euh7.','TleajhvLmRbGrDXZ4u3ILaVKw5B4jICjn0TPoqzzsIVCwUGraqKiY4HPTfsJ',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-06-23 13:40:17','2016-06-09 13:40:35','2016-06-09 13:40:17','2016-06-09 13:42:42'),
	(7,'Daniel Fod','Daniel@rawrsome.co.uk','$2y$10$kQrN7TWptGbJ/TGCjvnigOf6NDZRLU6Go2H7b71NK1X6eIiY/9kYW','hJubcY8pV5wSjyL1KQJAIvS1XBotgJrdJm2BRk3tyc54QwjJ5jNbIYxIOyfZ',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-07-15 12:10:42','2016-07-01 12:11:09','2016-07-01 12:10:42','2016-07-01 13:51:38'),
	(8,'Yassine','yasssinebel@gmail.com','$2y$10$4SZR/7o.v5d1k4xVdoZa8utPo4pcCuYlLMhfQftT25xSmfGV2oFnW',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-07-15 12:15:04','2016-07-01 12:15:43','2016-07-01 12:15:04','2016-07-01 12:15:43'),
	(9,'Tim','timothy@tjrnetworks.com','$2y$10$XmlnEHw/jHn7Od9D/Nnl2eLUwQTUjH0HAAEUfgiVsIbCPueh6L5QS',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-07-15 21:34:20','2016-07-01 21:35:53','2016-07-01 21:34:20','2016-07-01 21:35:53'),
	(10,'jahanzaib','herosolutions.tk@gmail.com','$2y$10$WxNQi8.f1f6q.a9MhVV6BeZt8DFczKag2YKtkcWJVI5KulaMH8CGC',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-08-10 11:22:30','2016-07-27 11:22:53','2016-07-27 11:22:30','2016-07-27 11:22:53'),
	(11,'Kenneth Brøgger-Luplau','kb@blueblau.dk','$2y$10$PM9HSmkSu8AveJ5ya.PnA.BehgK.KqshoxUjqWIGx7UZ4AIzwIgbq',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,'cus_8wdMCyQIMElV0J','acct_15Hh4DITtd0nlW1z',1,'sk_live_hTg808H5BspeMP2TSdCddfVq','rt_8wdOrFyl3FH7hzMVqMyY5O0y8aUWbsAeRuySxbAsY0Mt1hHc','pk_live_Uhmjb4Yp0XWCRp6CiT0jbooY',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-08-18 11:31:40','2016-08-04 11:37:07','2016-08-04 11:31:40','2016-08-04 11:37:07'),
	(12,'Jacob Zlogar','jacob.zlogar@gmail.com','$2y$10$2J/n7bJd6q3oYTLJqMitmeAJMautH4gQWF.7PhYqJZbOwdo12bLEi',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-08-22 14:07:52','2016-08-08 14:07:52','2016-08-08 14:07:52','2016-08-08 14:07:52'),
	(13,'Casper','invoiceappio@casperboone.nl','$2y$10$BY/U1Z9CZ.44VMixelBzDuwWeiu8U2u5hf0NXL1Qv9oRo24dSCpVC',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-08-22 16:07:51','2016-08-08 16:07:51','2016-08-08 16:07:51','2016-08-08 16:07:51'),
	(14,'Dominic Fitch-Jones','dominic@dominicmfj.com','$2y$10$48fF3hSDIhFILNUH26N.AecAY1w/ol3Gf6kSq7bV1gW3PWtULKl/G','4T9RvyVQBd806nv36YJz8FJ1CJVjk16yteGEAILqYo376wcifiXeqPDivtlL',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-08-22 16:20:41','2016-08-08 16:20:41','2016-08-08 16:20:41','2016-12-14 10:13:27'),
	(15,'nehal','nehalg266@gmail.com','$2y$10$Pqa.2aqqe/PleuRdENekaurzJUntWKVDJshplB0ROiuUNlKCZTg6i',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-08-25 11:07:09','2016-08-11 11:07:09','2016-08-11 11:07:09','2016-08-11 11:07:09'),
	(16,'demo','demo@demo.demo','$2y$10$7ra0piBJ0kkcpnnHr7ndG.8Lk2PnzMaJZiZI1mQwkInrqRYqz0P4.',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-11-23 16:06:25','2016-11-09 16:06:25','2016-11-09 16:06:25','2016-11-09 16:06:25'),
	(17,'Owen','owenmelbz@gmail.com','$2y$10$HRLXTmnrm9FUW4/fwajeR.Q3P6GdNMA/PkcL/.Vw2dH645z83KC.u',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-11-23 19:27:01','2016-11-09 19:27:01','2016-11-09 19:27:01','2016-11-09 19:27:01'),
	(18,'Prueba','coso@maildrop.cc','$2y$10$U8C4.dnR7nOrtz..WyfTkepqDHL2GyjdQLB8t1r/Z6d5iyaxTZTK2',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-11-25 02:30:41','2016-11-11 02:30:48','2016-11-11 02:30:41','2016-11-11 02:30:48'),
	(19,'John ','ashbeats@gmail.com','$2y$10$BBOMOlE1xLwDk971Hvb5ee/yT5cL1uWjanYAoFwD9V.PqpwSrfLR2',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-12-17 13:09:38','2016-12-03 13:09:38','2016-12-03 13:09:38','2016-12-03 13:09:38'),
	(20,'Florian Wartner','f.wartner@icloud.com','$2y$10$vlqwv3Ex/L06V4Zf47JX9OS0C8ELb1SsgX4C3jp0gnMizcVMxUKzG',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'acct_1944MEAYqS8h5XaK',1,'sk_live_z8L6TH8nHvg72YkjTNMJQDlf','rt_9g0iUCIsRD4PROcheRYFgZaoVTPa0JtYqdmDHPogPDegyPxZ','pk_live_1TIoyYsoHCFBlfYB8uWorM4E',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-12-17 14:39:31','2016-12-03 14:39:31','2016-12-03 14:39:31','2016-12-03 14:40:55'),
	(21,'Devin','devin.gray.email@gmail.com','$2y$10$kx/pi6YGttGV66C7GOe2ceOTCYC4FvMSnkL.16QATQ6qbuKRbJMl6',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-12-17 17:38:17','2016-12-03 17:38:17','2016-12-03 17:38:17','2016-12-03 17:38:17'),
	(22,'tester','fasterfene86@gmail.com','$2y$10$IjSJ69Xw2p1FcDUrDl3tnO.S00cZSe7iNlViQ9E7LsEPE6/N/1lpy','bgBWyxCMoNAMbPtJRrN0P1RcmQJzj5queCQ7rStlxQO6s9HVJHsm8nNcitrs',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-12-18 05:30:19','2016-12-04 05:47:12','2016-12-04 05:30:19','2016-12-04 05:47:12'),
	(23,'Ivars Mednis','ivars.mednis@g-i.lv','$2y$10$bxQpK5uK2QSzqiXpLn5EKuX2gfqXrCaHzeQ6Qnzzqhi/.9eJX28X6',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-12-23 18:29:32','2016-12-09 18:29:39','2016-12-09 18:29:32','2016-12-09 18:29:39'),
	(24,'Christopher Landon','chris@automashion.com','$2y$10$tadvZm1i9r2SUMCXSvEUWuRkXhOSMbFCY5wAOv6byOJxJyxPZSemO','Pba1NsqwB3DWW7ejMXfLFNvmim1bO5VJLalYGi97mzkWGuq93tjfqCcjJMK8',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-01-06 18:56:04','2016-12-23 18:56:15','2016-12-23 18:56:04','2016-12-23 18:57:50'),
	(25,'Shane Rosenthal','webrevllc@gmail.com','$2y$10$Nrp6Y20OlUxgL4rwri8wIuH0OBVmsZ9XXVfLEurBlnnFEQ.n33oi.','XjPz2lpxrNIVWFTFKTfgvRAtj0pQPw6zekeHoI9fF7JPn9AZkSO9g8fNSw36',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-01-12 04:43:55','2016-12-29 04:43:55','2016-12-29 04:43:55','2017-01-13 19:25:40'),
	(26,'Sydney','sgwcollins@gmail.com','$2y$10$VI90OOEkbEceg5MD7Emmk.1qH7GsPQ5EjKnXFzqhmHfyNO5Futqmu',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-02 14:49:35','2017-02-16 14:49:52','2017-02-16 14:49:35','2017-02-16 14:49:52'),
	(27,'Rahul Banka','dermerchantcross@gmail.com','$2y$10$L.ESMJvbQWFWccfbt0R0LOJH0x.PgNJ7/OveY78NwrKwOtwaA.0yi',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-05-29 19:21:30','2017-05-15 19:21:30','2017-05-15 19:21:30','2017-05-15 19:21:30');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
