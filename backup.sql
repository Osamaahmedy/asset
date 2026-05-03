-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: localhost    Database: asset
-- ------------------------------------------------------
-- Server version	8.0.44-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
INSERT INTO `activity_logs` VALUES (1,'تم إنشاء أصل','App\\Models\\Asset',4,NULL,NULL,'2025-07-11 14:37:03','2025-07-11 14:37:03',NULL),(2,'تم تعديل أصل','App\\Models\\Asset',4,NULL,NULL,'2025-07-11 14:37:09','2025-07-11 14:37:09',NULL),(3,'تم إنشاء أصل','App\\Models\\Asset',5,NULL,NULL,'2025-07-11 14:39:15','2025-07-11 14:39:15',NULL),(4,'تم تعديل أصل','App\\Models\\Asset',4,NULL,NULL,'2025-07-11 14:39:47','2025-07-11 14:39:47',NULL),(5,'تم تعديل أصل','App\\Models\\Asset',4,NULL,NULL,'2025-07-11 14:40:08','2025-07-11 14:40:08',NULL),(6,'تم تعديل أصل','App\\Models\\Asset',5,NULL,NULL,'2025-07-11 14:49:20','2025-07-11 14:49:20',NULL),(7,'تم تعديل صيانة','App\\Models\\Maintenance',3,NULL,NULL,'2025-07-11 14:54:50','2025-07-11 14:54:50',NULL),(8,'تم تعديل صيانة','App\\Models\\Maintenance',1,NULL,NULL,'2025-07-11 14:55:18','2025-07-11 14:55:18',NULL),(9,'تم إنشاء أصل','App\\Models\\Asset',6,NULL,NULL,'2025-07-11 15:02:41','2025-07-11 15:02:41',NULL),(10,'تم تعديل أصل','App\\Models\\Asset',6,NULL,NULL,'2025-07-11 15:03:08','2025-07-11 15:03:08',NULL),(11,'تم إنشاء صيانة','App\\Models\\Maintenance',5,NULL,NULL,'2025-07-11 15:03:46','2025-07-11 15:03:46',NULL),(12,'تم تعديل صيانة','App\\Models\\Maintenance',5,NULL,NULL,'2025-07-11 15:04:08','2025-07-11 15:04:08',NULL),(13,'تم تعديل صيانة','App\\Models\\Maintenance',5,NULL,NULL,'2025-07-11 15:04:23','2025-07-11 15:04:23',NULL),(14,'تم حذف أصل','App\\Models\\Asset',6,NULL,NULL,'2025-07-11 15:04:38','2025-07-11 15:04:38',NULL),(15,'تم تعديل أصل','App\\Models\\Asset',2,NULL,NULL,'2025-07-11 15:05:52','2025-07-11 15:05:52',NULL),(16,'تم إنشاء صيانة','App\\Models\\Maintenance',6,NULL,NULL,'2025-07-11 15:07:16','2025-07-11 15:07:16',NULL),(17,'تم إنشاء أصل','App\\Models\\Asset',7,NULL,NULL,'2025-07-11 15:35:31','2025-07-11 15:35:31',NULL),(18,'تم إنشاء أصل','App\\Models\\Asset',8,NULL,NULL,'2025-07-12 07:38:26','2025-07-12 07:38:26',NULL),(19,'تم إنشاء صيانة','App\\Models\\Maintenance',7,NULL,NULL,'2025-07-12 07:39:57','2025-07-12 07:39:57',NULL),(20,'تم تعديل أصل','App\\Models\\Asset',8,NULL,NULL,'2025-07-12 07:40:51','2025-07-12 07:40:51',NULL),(21,'تم تعديل أصل','App\\Models\\Asset',8,NULL,NULL,'2025-07-12 07:40:53','2025-07-12 07:40:53',NULL),(22,'تم تعديل أصل','App\\Models\\Asset',8,NULL,NULL,'2025-07-12 07:40:54','2025-07-12 07:40:54',NULL),(23,'تم تعديل أصل','App\\Models\\Asset',8,NULL,NULL,'2025-07-12 07:48:00','2025-07-12 07:48:00',NULL),(24,'تم تعديل أصل','App\\Models\\Asset',8,NULL,NULL,'2025-07-12 07:49:25','2025-07-12 07:49:25',NULL),(25,'تم إنشاء صيانة','App\\Models\\Maintenance',8,NULL,NULL,'2025-07-12 07:51:40','2025-07-12 07:51:40',NULL),(26,'تم تعديل أصل','App\\Models\\Asset',8,NULL,NULL,'2025-07-12 07:52:42','2025-07-12 07:52:42',NULL),(27,'تم تعديل أصل','App\\Models\\Asset',8,NULL,NULL,'2025-07-12 07:55:28','2025-07-12 07:55:28',NULL),(28,'تم حذف أصل','App\\Models\\Asset',1,NULL,NULL,'2025-07-12 07:55:59','2025-07-12 07:55:59',NULL),(29,'تم حذف أصل','App\\Models\\Asset',2,NULL,NULL,'2025-07-12 07:55:59','2025-07-12 07:55:59',NULL),(30,'تم حذف أصل','App\\Models\\Asset',5,NULL,NULL,'2025-07-12 07:55:59','2025-07-12 07:55:59',NULL),(31,'تم حذف أصل','App\\Models\\Asset',7,NULL,NULL,'2025-07-12 07:55:59','2025-07-12 07:55:59',NULL),(32,'تم حذف أصل','App\\Models\\Asset',8,NULL,NULL,'2025-07-12 07:55:59','2025-07-12 07:55:59',NULL),(33,'تم إنشاء أصل','App\\Models\\Asset',9,NULL,NULL,'2025-07-12 07:57:16','2025-07-12 07:57:16',NULL),(34,'تم إنشاء صيانة','App\\Models\\Maintenance',9,NULL,NULL,'2025-07-12 07:58:00','2025-07-12 07:58:00',NULL),(35,'تم إنشاء صيانة','App\\Models\\Maintenance',10,NULL,NULL,'2025-07-12 07:58:34','2025-07-12 07:58:34',NULL),(36,'تم تعديل صيانة','App\\Models\\Maintenance',9,NULL,NULL,'2025-07-12 07:59:42','2025-07-12 07:59:42',NULL),(37,'تم تعديل صيانة','App\\Models\\Maintenance',9,NULL,NULL,'2025-07-12 08:00:58','2025-07-12 08:00:58',NULL),(38,'تم إنشاء صيانة','App\\Models\\Maintenance',11,NULL,NULL,'2025-07-12 08:02:02','2025-07-12 08:02:02',NULL),(39,'تم تعديل صيانة','App\\Models\\Maintenance',9,NULL,NULL,'2025-07-12 08:07:54','2025-07-12 08:07:54',NULL),(40,'تم تعديل صيانة','App\\Models\\Maintenance',9,NULL,NULL,'2025-07-12 08:08:22','2025-07-12 08:08:22',NULL),(41,'تم تعديل صيانة','App\\Models\\Maintenance',9,NULL,NULL,'2025-07-12 08:08:23','2025-07-12 08:08:23',NULL),(42,'تم تعديل صيانة','App\\Models\\Maintenance',9,NULL,NULL,'2025-07-12 08:11:49','2025-07-12 08:11:49',NULL),(43,'تم تعديل أصل','App\\Models\\Asset',9,NULL,NULL,'2025-07-12 08:13:25','2025-07-12 08:13:25',NULL),(44,'تم تعديل صيانة','App\\Models\\Maintenance',9,NULL,NULL,'2025-07-12 08:14:28','2025-07-12 08:14:28',NULL),(45,'تم إنشاء أصل','App\\Models\\Asset',10,NULL,NULL,'2025-07-12 08:56:35','2025-07-12 08:56:35',NULL),(46,'تم تعديل أصل','App\\Models\\Asset',10,NULL,NULL,'2025-07-12 08:57:20','2025-07-12 08:57:20',NULL),(47,'تم إنشاء أصل','App\\Models\\Asset',11,NULL,NULL,'2025-07-12 15:12:23','2025-07-12 15:12:23',NULL),(48,'تم تعديل أصل','App\\Models\\Asset',11,NULL,NULL,'2025-07-12 15:12:43','2025-07-12 15:12:43',NULL),(49,'تم إنشاء صيانة','App\\Models\\Maintenance',12,NULL,NULL,'2025-07-12 15:13:41','2025-07-12 15:13:41',NULL),(50,'تم تعديل صيانة','App\\Models\\Maintenance',12,NULL,NULL,'2025-07-12 15:14:14','2025-07-12 15:14:14',NULL),(51,'تم تعديل صيانة','App\\Models\\Maintenance',12,NULL,NULL,'2025-07-12 15:15:20','2025-07-12 15:15:20',NULL),(52,'تم إنشاء صيانة','App\\Models\\Maintenance',13,NULL,NULL,'2025-07-14 14:59:39','2025-07-14 14:59:39',NULL),(53,'تم تعديل صيانة','App\\Models\\Maintenance',13,NULL,NULL,'2025-07-14 15:00:24','2025-07-14 15:00:24',NULL),(54,'تم تعديل صيانة','App\\Models\\Maintenance',13,NULL,NULL,'2025-07-14 15:01:11','2025-07-14 15:01:11',NULL),(55,'تم تعديل صيانة','App\\Models\\Maintenance',13,NULL,NULL,'2025-07-14 15:05:37','2025-07-14 15:05:37',NULL),(56,'تم تعديل صيانة','App\\Models\\Maintenance',13,NULL,NULL,'2025-07-14 15:05:43','2025-07-14 15:05:43',NULL),(57,'تم تعديل صيانة','App\\Models\\Maintenance',13,NULL,NULL,'2025-07-14 15:06:12','2025-07-14 15:06:12',NULL),(58,'تم تعديل صيانة','App\\Models\\Maintenance',13,NULL,NULL,'2025-07-14 15:06:25','2025-07-14 15:06:25',NULL),(59,'تم تعديل صيانة','App\\Models\\Maintenance',13,NULL,NULL,'2025-07-14 15:06:52','2025-07-14 15:06:52',NULL),(60,'تم تعديل صيانة','App\\Models\\Maintenance',13,NULL,NULL,'2025-07-14 15:07:10','2025-07-14 15:07:10',NULL),(61,'تم تعديل أصل','App\\Models\\Asset',10,NULL,NULL,'2025-07-14 15:07:55','2025-07-14 15:07:55',NULL),(62,'تم حذف أصل','App\\Models\\Asset',10,NULL,NULL,'2025-07-14 16:37:29','2025-07-14 16:37:29',NULL),(63,'تم إنشاء أصل','App\\Models\\Asset',14,NULL,NULL,'2025-07-14 16:53:26','2025-07-14 16:53:26',NULL),(64,'تم تعديل أصل','App\\Models\\Asset',14,NULL,NULL,'2025-07-14 16:54:01','2025-07-14 16:54:01',NULL),(65,'تم حذف أصل','App\\Models\\Asset',14,NULL,NULL,'2025-07-14 16:54:48','2025-07-14 16:54:48',NULL),(66,'تم حذف أصل','App\\Models\\Asset',13,NULL,NULL,'2025-07-14 16:59:01','2025-07-14 16:59:01',NULL),(67,'تم حذف أصل','App\\Models\\Asset',13,NULL,NULL,'2025-07-14 16:59:01','2025-07-14 16:59:01',NULL),(68,'تم حذف أصل','App\\Models\\Asset',12,NULL,NULL,'2025-07-14 17:02:04','2025-07-14 17:02:04','اسم الأصل: admin'),(69,'تم حذف أصل','App\\Models\\Asset',12,NULL,NULL,'2025-07-14 17:02:04','2025-07-14 17:02:04',NULL),(70,'تم تعديل أصل','App\\Models\\Asset',9,NULL,NULL,'2025-07-14 17:17:22','2025-07-14 17:17:22',NULL),(71,'تم تعديل أصل','App\\Models\\Asset',11,NULL,NULL,'2025-07-14 17:33:37','2025-07-14 17:33:37',NULL),(72,'تم تعديل أصل','App\\Models\\Asset',9,NULL,NULL,'2025-07-14 17:34:16','2025-07-14 17:34:16',NULL),(73,'تم حذف أصل','App\\Models\\Asset',9,NULL,NULL,'2025-07-14 17:35:22','2025-07-14 17:35:22','اسم الأصل: مكيف'),(74,'تم حذف أصل','App\\Models\\Asset',9,NULL,NULL,'2025-07-14 17:35:22','2025-07-14 17:35:22',NULL),(75,'تم حذف أصل','App\\Models\\Asset',11,NULL,NULL,'2025-07-14 17:35:29','2025-07-14 17:35:29','اسم الأصل: سلك'),(76,'تم حذف أصل','App\\Models\\Asset',11,NULL,NULL,'2025-07-14 17:35:30','2025-07-14 17:35:30',NULL),(77,'تم إنشاء أصل','App\\Models\\Asset',15,NULL,NULL,'2025-07-14 17:45:29','2025-07-14 17:45:29',NULL),(78,'تم إنشاء أصل','App\\Models\\Asset',16,NULL,NULL,'2025-07-14 17:46:31','2025-07-14 17:46:31',NULL),(79,'تم إنشاء أصل','App\\Models\\Asset',17,NULL,NULL,'2025-07-14 17:50:15','2025-07-14 17:50:15',NULL),(80,'تم إنشاء صيانة','App\\Models\\Maintenance',14,NULL,NULL,'2025-07-14 17:52:52','2025-07-14 17:52:52',NULL),(81,'تم تعديل صيانة','App\\Models\\Maintenance',14,NULL,NULL,'2025-07-14 17:53:51','2025-07-14 17:53:51',NULL),(82,'تم حذف أصل','App\\Models\\Asset',15,NULL,NULL,'2025-07-14 17:57:59','2025-07-14 17:57:59','اسم الأصل: تلاجه'),(83,'تم حذف أصل','App\\Models\\Asset',17,NULL,NULL,'2025-07-19 18:50:40','2025-07-19 18:50:40','اسم الأصل: رشاش ماء'),(84,'تم تعديل أصل','App\\Models\\Asset',16,NULL,NULL,'2025-07-19 18:56:20','2025-07-19 18:56:20',NULL),(85,'تم تعديل أصل','App\\Models\\Asset',16,NULL,NULL,'2025-07-19 19:14:25','2025-07-19 19:14:25',NULL),(86,'تم إنشاء صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:19:59','2025-07-19 19:19:59',NULL),(87,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:28:51','2025-07-19 19:28:51',NULL),(88,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:29:18','2025-07-19 19:29:18',NULL),(89,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:29:37','2025-07-19 19:29:37',NULL),(90,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:30:41','2025-07-19 19:30:41',NULL),(91,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:31:12','2025-07-19 19:31:12',NULL),(92,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:31:13','2025-07-19 19:31:13',NULL),(93,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:31:14','2025-07-19 19:31:14',NULL),(94,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:31:14','2025-07-19 19:31:14',NULL),(95,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:31:14','2025-07-19 19:31:14',NULL),(96,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:31:15','2025-07-19 19:31:15',NULL),(97,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:31:15','2025-07-19 19:31:15',NULL),(98,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:31:20','2025-07-19 19:31:20',NULL),(99,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:32:25','2025-07-19 19:32:25',NULL),(100,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:34:51','2025-07-19 19:34:51',NULL),(101,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:40:14','2025-07-19 19:40:14',NULL),(102,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:41:49','2025-07-19 19:41:49',NULL),(103,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:41:50','2025-07-19 19:41:50',NULL),(104,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:43:34','2025-07-19 19:43:34',NULL),(105,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:43:56','2025-07-19 19:43:56',NULL),(106,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:44:23','2025-07-19 19:44:23',NULL),(107,'تم تعديل صيانة','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:44:24','2025-07-19 19:44:24',NULL),(108,'Maintenance updated','App\\Models\\Maintenance',15,NULL,NULL,'2025-07-19 19:52:34','2025-07-19 19:52:34',NULL),(109,'Maintenance created','App\\Models\\Maintenance',16,NULL,NULL,'2025-07-19 19:54:52','2025-07-19 19:54:52',NULL),(110,'Maintenance updated','App\\Models\\Maintenance',16,NULL,NULL,'2025-07-19 19:55:05','2025-07-19 19:55:05',NULL),(111,'Maintenance created','App\\Models\\Maintenance',17,NULL,NULL,'2025-07-19 19:55:52','2025-07-19 19:55:52',NULL),(112,'Asset updated','App\\Models\\Asset',16,NULL,NULL,'2025-07-19 19:56:13','2025-07-19 19:56:13',NULL),(113,'Asset created','App\\Models\\Asset',18,NULL,NULL,'2025-07-19 19:57:06','2025-07-19 19:57:06',NULL),(114,'Asset deleted','App\\Models\\Asset',18,NULL,NULL,'2025-07-19 19:58:10','2025-07-19 19:58:10','Asset Name: ي'),(115,'Asset created','App\\Models\\Asset',19,NULL,NULL,'2025-07-22 13:08:29','2025-07-22 13:08:29',NULL),(116,'Asset updated','App\\Models\\Asset',19,NULL,NULL,'2025-07-22 13:08:54','2025-07-22 13:08:54',NULL),(117,'Maintenance created','App\\Models\\Maintenance',18,NULL,NULL,'2025-07-22 13:17:24','2025-07-22 13:17:24',NULL),(118,'Maintenance created','App\\Models\\Maintenance',19,NULL,NULL,'2025-07-22 13:18:20','2025-07-22 13:18:20',NULL),(119,'Maintenance updated','App\\Models\\Maintenance',18,NULL,NULL,'2025-07-22 13:18:49','2025-07-22 13:18:49',NULL),(120,'Asset deleted','App\\Models\\Asset',16,NULL,NULL,'2025-07-22 13:21:56','2025-07-22 13:21:56','Asset Name: مكيف'),(121,'Asset created','App\\Models\\Asset',20,NULL,NULL,'2025-07-22 14:47:34','2025-07-22 14:47:34',NULL),(122,'Asset updated','App\\Models\\Asset',20,NULL,NULL,'2026-03-08 18:04:38','2026-03-08 18:04:38',NULL),(123,'Asset deleted','App\\Models\\Asset',20,NULL,NULL,'2026-03-08 18:06:11','2026-03-08 18:06:11','Asset Name: test'),(124,'Maintenance created','App\\Models\\Maintenance',20,NULL,NULL,'2026-03-08 18:07:54','2026-03-08 18:07:54',NULL),(125,'Asset created','App\\Models\\Asset',21,NULL,NULL,'2026-04-18 05:14:06','2026-04-18 05:14:06',NULL),(126,'Asset updated','App\\Models\\Asset',21,NULL,NULL,'2026-04-18 05:14:56','2026-04-18 05:14:56',NULL),(127,'Maintenance created','App\\Models\\Maintenance',21,NULL,NULL,'2026-04-18 05:17:37','2026-04-18 05:17:37',NULL),(128,'Asset deleted','App\\Models\\Asset',21,NULL,NULL,'2026-04-18 05:19:20','2026-04-18 05:19:20','Asset Name: lab'),(129,'Asset created','App\\Models\\Asset',22,NULL,NULL,'2026-04-18 08:44:42','2026-04-18 08:44:42',NULL),(130,'Asset updated','App\\Models\\Asset',22,NULL,NULL,'2026-04-18 08:44:47','2026-04-18 08:44:47',NULL),(131,'Asset updated','App\\Models\\Asset',22,NULL,NULL,'2026-04-18 08:45:02','2026-04-18 08:45:02',NULL),(132,'Asset updated','App\\Models\\Asset',19,NULL,NULL,'2026-04-18 08:45:34','2026-04-18 08:45:34',NULL),(133,'Asset updated','App\\Models\\Asset',22,NULL,NULL,'2026-04-18 08:47:40','2026-04-18 08:47:40',NULL),(134,'Asset updated','App\\Models\\Asset',19,NULL,NULL,'2026-04-18 08:49:27','2026-04-18 08:49:27',NULL),(135,'Asset created','App\\Models\\Asset',23,NULL,NULL,'2026-04-18 08:49:55','2026-04-18 08:49:55',NULL),(136,'Asset updated','App\\Models\\Asset',23,NULL,NULL,'2026-04-18 08:50:04','2026-04-18 08:50:04',NULL),(137,'Asset updated','App\\Models\\Asset',23,NULL,NULL,'2026-04-18 08:50:42','2026-04-18 08:50:42',NULL),(138,'Asset updated','App\\Models\\Asset',23,NULL,NULL,'2026-04-18 08:50:52','2026-04-18 08:50:52',NULL),(139,'Asset updated','App\\Models\\Asset',22,NULL,NULL,'2026-04-18 09:03:06','2026-04-18 09:03:06',NULL),(140,'Asset updated','App\\Models\\Asset',22,NULL,NULL,'2026-04-18 09:03:16','2026-04-18 09:03:16',NULL),(141,'Asset created','App\\Models\\Asset',24,NULL,NULL,'2026-04-18 09:08:18','2026-04-18 09:08:18',NULL),(142,'Asset created','App\\Models\\Asset',25,'ث','new','2026-04-18 09:12:24','2026-04-18 09:12:24',NULL),(143,'Asset updated','App\\Models\\Asset',25,'ث','new','2026-04-18 09:12:50','2026-04-18 09:12:50',NULL),(144,'Maintenance created','App\\Models\\Maintenance',22,'صيانة: ث','new','2026-04-18 09:13:19','2026-04-18 09:13:19',NULL),(145,'Asset deleted','App\\Models\\Asset',25,'ث','new','2026-04-18 09:16:19','2026-04-18 09:16:19','تم حذف الأصل: ث'),(146,'Maintenance created','App\\Models\\Maintenance',23,'صيانة: Osama Ahmed','new','2026-04-18 09:27:56','2026-04-18 09:27:56',NULL);
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_branch`
--

DROP TABLE IF EXISTS `admin_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_branch` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_branch`
--

LOCK TABLES `admin_branch` WRITE;
/*!40000 ALTER TABLE `admin_branch` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_deletion_confirmations`
--

DROP TABLE IF EXISTS `asset_deletion_confirmations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_deletion_confirmations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint unsigned NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `requested_by` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asset_deletion_confirmations_asset_id_foreign` (`asset_id`),
  KEY `asset_deletion_confirmations_requested_by_foreign` (`requested_by`),
  CONSTRAINT `asset_deletion_confirmations_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `asset_deletion_confirmations_requested_by_foreign` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_deletion_confirmations`
--

LOCK TABLES `asset_deletion_confirmations` WRITE;
/*!40000 ALTER TABLE `asset_deletion_confirmations` DISABLE KEYS */;
INSERT INTO `asset_deletion_confirmations` VALUES (11,19,0,'2025-07-22 13:21:04','2025-07-22 13:21:04',1);
/*!40000 ALTER TABLE `asset_deletion_confirmations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `maintenance_due_date` date DEFAULT NULL,
  `maintenance_cycle_months` int NOT NULL DEFAULT '3',
  `last_maintenance_date` date DEFAULT NULL,
  `maintenance_interval_months` int unsigned NOT NULL DEFAULT '3',
  `price` decimal(10,2) NOT NULL,
  `vendor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint unsigned NOT NULL,
  `maintenance_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'جيدة',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `assets_serial_number_unique` (`serial_number`),
  KEY `assets_department_id_foreign` (`department_id`),
  CONSTRAINT `assets_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` VALUES (19,'phone','2025-07-22','2026-04-02',3,'2026-04-18',3,5000.00,'ali','ASSET-687FB77CDDE08',2,'جيدة','2025-07-22 13:08:28','2026-04-18 08:49:27'),(22,'7','2026-04-18','2026-04-21',1,'2026-04-18',3,50.00,'ء','ASSET-69E36EA9E3AD3',1,'جيدة','2026-04-18 08:44:41','2026-04-18 09:03:16'),(23,'Osama Ahmed','2026-04-18','2026-07-18',9,'2026-04-18',3,864.00,'5465','ASSET-69E36FE3069AA',3,'جيدة','2026-04-18 08:49:55','2026-04-18 09:27:56'),(24,'ث','2026-04-18','2026-07-18',3,'2026-04-18',3,5.00,'ص','ASSET-69E3743262318',3,'جيدة','2026-04-18 09:08:18','2026-04-18 09:08:18');
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_user`
--

DROP TABLE IF EXISTS `department_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `department_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_user_user_id_foreign` (`user_id`),
  KEY `department_user_department_id_foreign` (`department_id`),
  CONSTRAINT `department_user_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `department_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_user`
--

LOCK TABLES `department_user` WRITE;
/*!40000 ALTER TABLE `department_user` DISABLE KEYS */;
INSERT INTO `department_user` VALUES (7,1,3,NULL,NULL),(10,1,2,NULL,NULL),(11,1,4,NULL,NULL),(12,7,1,NULL,NULL),(13,8,1,NULL,NULL),(14,1,5,NULL,NULL),(15,1,6,NULL,NULL),(16,4,1,NULL,NULL),(17,5,1,NULL,NULL);
/*!40000 ALTER TABLE `department_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'it','2025-07-11 14:02:27','2025-07-11 14:02:27'),(2,'test','2025-07-14 15:58:09','2025-07-14 15:58:09'),(3,'new','2025-07-14 17:44:18','2025-07-14 17:44:18'),(4,'admin','2025-07-19 19:24:33','2025-07-19 19:24:33'),(5,'log','2026-04-18 05:04:56','2026-04-18 05:04:56'),(6,'Osama Ahmed','2026-04-18 05:05:39','2026-04-18 05:05:39'),(7,'س','2026-04-18 09:14:26','2026-04-18 09:14:26'),(8,'ل','2026-04-18 09:23:55','2026-04-18 09:23:55'),(9,'4','2026-04-18 09:24:25','2026-04-18 09:24:25');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenances`
--

DROP TABLE IF EXISTS `maintenances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maintenances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint unsigned NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `maintenance_date` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maintenances_asset_id_foreign` (`asset_id`),
  CONSTRAINT `maintenances_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenances`
--

LOCK TABLES `maintenances` WRITE;
/*!40000 ALTER TABLE `maintenances` DISABLE KEYS */;
INSERT INTO `maintenances` VALUES (18,19,'fix battery','2025-05-22','Maintenance Completed','2025-07-22 13:17:24','2025-07-22 13:18:49'),(19,19,'fix battery','2025-07-22','Maintenance Completed','2025-07-22 13:18:20','2025-07-22 13:18:20'),(20,19,'d','2026-03-09','Pending','2026-03-08 18:07:54','2026-03-08 18:07:54'),(21,19,'dgdg','2026-04-18','Maintenance Completed','2026-04-18 05:17:37','2026-04-18 05:17:37'),(22,24,NULL,'2026-04-18','Maintenance Completed','2026-04-18 09:13:19','2026-04-18 09:13:19'),(23,23,NULL,'2026-04-18','Maintenance Completed','2026-04-18 09:27:56','2026-04-18 09:27:56');
/*!40000 ALTER TABLE `maintenances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (8,'App\\Models\\Maintenance',5,'5c7d074f-38d3-4d71-b569-20cd7a0d0b55','images','Screenshot from 2025-07-11 16-33-10','01JZXAHCA6050M77MEV00CT8GJ.png','image/png','public','public',267398,'[]','[]','[]','[]',1,'2025-07-11 15:04:08','2025-07-11 15:04:08'),(11,'App\\Models\\Maintenance',6,'e994b4d3-e76f-4b5a-8760-593acf43fdd0','images','Screenshot from 2025-07-11 16-33-10','01JZXAQ35AP09DN21DA3C0QCQ4.png','image/png','public','public',267398,'[]','[]','[]','[]',1,'2025-07-11 15:07:16','2025-07-11 15:07:16'),(16,'App\\Models\\Maintenance',7,'480e856d-10c5-4955-8e74-a7700549d71a','images','Screenshot from 2025-07-11 15-48-50','01JZZ3GR5YWX2XZHJVTFPX7QNR.png','image/png','public','public',191594,'[]','[]','[]','[]',1,'2025-07-12 07:39:57','2025-07-12 07:39:57'),(17,'App\\Models\\Maintenance',8,'48d6c590-beb9-49dc-932d-613e11163ad4','images','Screenshot from 2025-07-11 15-48-50','01JZZ46728QKRZJCE70S47Q7VD.png','image/png','public','public',191594,'[]','[]','[]','[]',1,'2025-07-12 07:51:40','2025-07-12 07:51:40'),(20,'App\\Models\\Maintenance',9,'45a23258-e834-4495-9a42-66ba0be2ab69','images','Screenshot from 2025-07-11 15-48-50','01JZZ4HTD3P4HXJQV4G2G8NKYN.png','image/png','public','public',191594,'[]','[]','[]','[]',1,'2025-07-12 07:58:00','2025-07-12 07:58:00'),(21,'App\\Models\\Maintenance',10,'da8af920-4fbc-4792-a6d4-92dc3a47a8fc','images','Screenshot from 2025-07-11 15-48-50','01JZZ4JVK7VN9CDBG5XMZNFK4J.png','image/png','public','public',191594,'[]','[]','[]','[]',1,'2025-07-12 07:58:34','2025-07-12 07:58:34'),(22,'App\\Models\\Maintenance',11,'00eecb8f-847c-4c88-a672-49fdb607a9d8','images','Screenshot from 2025-07-11 16-36-44','01JZZ4S6G3465J6K63W8T4BRWY.png','image/png','public','public',262406,'[]','[]','[]','[]',1,'2025-07-12 08:02:02','2025-07-12 08:02:02'),(28,'App\\Models\\Maintenance',12,'b60ca1f5-6189-449f-ab1a-3e5d35e7a0b8','images','Screenshot from 2025-07-11 16-33-10','01JZZXGJEYTTMJ294HT3WRWVXP.png','image/png','public','public',267398,'[]','[]','[]','[]',1,'2025-07-12 15:14:14','2025-07-12 15:14:14'),(37,'App\\Models\\Maintenance',14,'ce9d0e89-1882-45d2-a525-e42a704be1ec','images','Screenshot from 2025-07-11 15-48-50','01K05BCFC4B1EM97PAWQAR1BFP.png','image/png','public','public',191594,'[]','[]','[]','[]',1,'2025-07-14 17:52:52','2025-07-14 17:52:52'),(41,'App\\Models\\Asset',19,'e2dff7ae-a463-49ff-a9f7-c9b191767ece','document','Screenshot from 2025-06-29 21-00-06','01K0SE9G23W4YMR7MHN2JMS007.png','image/png','public','public',112787,'[]','[]','[]','[]',2,'2025-07-22 13:08:28','2025-07-22 13:08:28'),(42,'App\\Models\\Maintenance',18,'494811dc-9919-42e3-9fc3-e19ab996c720','images','Screenshot from 2025-07-11 15-48-50','01K0SESV6KX9TK5K04Q0QCSJG5.png','image/png','public','public',191594,'[]','[]','[]','[]',1,'2025-07-22 13:17:24','2025-07-22 13:17:24'),(43,'App\\Models\\Maintenance',19,'37aa3834-9f82-4d4c-b15c-9f98abef6ee2','images','Screenshot from 2025-07-11 16-33-10','01K0SEVHT95TEPWBA88JB82001.png','image/png','public','public',267398,'[]','[]','[]','[]',1,'2025-07-22 13:18:20','2025-07-22 13:18:20'),(46,'App\\Models\\Maintenance',20,'c65653b4-d4ef-4034-a9b6-d9d25a00415c','images','Screenshot from 2026-03-09 00-06-24','01KK7MEBRQNRQPTNX1YA679YPG.png','image/png','public','public',108368,'[]','[]','[]','[]',1,'2026-03-08 18:07:54','2026-03-08 18:07:54'),(49,'App\\Models\\Maintenance',21,'e474aeed-d730-45b4-bd7e-8dd35d8d464f','images','WhatsApp Image 2025-09-14 at 11.38.41 PM','01KPFTNCABK5TQ2XHCPMRTQH49.jpeg','image/jpeg','public','public',126842,'[]','[]','[]','[]',1,'2026-04-18 05:17:37','2026-04-18 05:17:37'),(50,'App\\Models\\Asset',22,'6cb88b9a-1636-4d11-80dd-5c3baffcafab','image','WhatsApp Image 2025-09-14 at 11.38.41 PM','01KPG6GHZE54SW3CNDJQPBHKDX.jpeg','image/jpeg','public','public',126842,'[]','[]','[]','[]',1,'2026-04-18 08:44:42','2026-04-18 08:44:42'),(51,'App\\Models\\Asset',22,'f64e0f8a-3d1c-4dd1-8d99-1eac48a72eb8','document','WhatsApp Image 2025-09-14 at 11.38.41 PM','01KPG6GJ1MP2A5ZRDG9EYK3QD7.jpeg','image/jpeg','public','public',126842,'[]','[]','[]','[]',2,'2026-04-18 08:44:42','2026-04-18 08:44:42'),(52,'App\\Models\\Asset',19,'ad15785d-d481-4718-beff-04c3d4c094c5','image','WhatsApp Image 2025-09-14 at 11.38.41 PM','01KPG6S8R5EMJXQCTNX5TJ8EKV.jpeg','image/jpeg','public','public',126842,'[]','[]','[]','[]',3,'2026-04-18 08:49:27','2026-04-18 08:49:27'),(53,'App\\Models\\Asset',23,'5762d9cc-e0cd-454f-8b7c-428d5f427ae3','image','WhatsApp Image 2025-09-14 at 11.38.41 PM','01KPG6T3PZ7914G4DDKHFW3533.jpeg','image/jpeg','public','public',126842,'[]','[]','[]','[]',1,'2026-04-18 08:49:55','2026-04-18 08:49:55'),(54,'App\\Models\\Asset',23,'02c7e5e1-ef67-4990-95e8-e56fcf66332a','document','WhatsApp Image 2025-09-14 at 11.38.41 PM','01KPG6TD331MF2FFKSYPE1TQM0.jpeg','image/jpeg','public','public',126842,'[]','[]','[]','[]',2,'2026-04-18 08:50:04','2026-04-18 08:50:04');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (6,'0001_01_01_000000_create_users_table',1),(7,'0001_01_01_000001_create_cache_table',1),(8,'0001_01_01_000002_create_jobs_table',1),(9,'2025_06_01_101803_create_posts_table',1),(10,'2025_06_01_104622_create_news_table',1),(11,'2025_06_02_093521_create_news_post_table',2),(12,'2025_06_02_100917_change_title_and_content_columns_in_news_table',3),(13,'2025_06_02_123233_add_translated_columns_to_news_table',3),(14,'2025_06_08_170011_create_permission_tables',4),(15,'2025_06_15_071255_create_institutes_table',5),(16,'2025_06_15_071255_create_universities_table',5),(17,'2025_06_15_071255_create_university_majors_table',5),(18,'2025_06_15_073126_create_institute_majors_table',5),(19,'2025_06_23_070750_create_students_table',5),(20,'2025_07_11_164220_create_departments_table',6),(21,'2025_07_11_164307_create_assets_table',6),(22,'2025_07_11_164336_create_maintenances_table',6),(23,'2025_07_11_164401_create_activity_logs_table',6),(24,'2025_07_14_174010_create_notifications_table',7),(25,'2025_07_14_181812_create_department_user_table',8),(26,'2025_07_14_185103_create_asset_deletion_confirmations_table',9),(27,'2025_07_14_185243_create_asset_deletion_confirmations_table',10),(28,'2025_09_12_193342_create_staff_table',11),(29,'2025_12_26_213551_create_admins_table',12),(30,'2025_12_26_213608_create_branches_table',12),(31,'2025_12_26_213739_create_admin_branch_table',12),(32,'2026_04_18_120523_add_model_name_to_activity_logs_table',13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(6,'App\\Models\\User',4),(7,'App\\Models\\User',5),(3,'App\\Models\\User',7),(3,'App\\Models\\User',8);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nas`
--

DROP TABLE IF EXISTS `nas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nasname` varchar(128) NOT NULL,
  `shortname` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT 'other',
  `ports` int DEFAULT NULL,
  `secret` varchar(60) NOT NULL DEFAULT 'secret',
  `server` varchar(64) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT 'RADIUS Client',
  PRIMARY KEY (`id`),
  KEY `nasname` (`nasname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nas`
--

LOCK TABLES `nas` WRITE;
/*!40000 ALTER TABLE `nas` DISABLE KEYS */;
INSERT INTO `nas` VALUES (1,'127.0.0.1','localhost','other',NULL,'testing123',NULL,NULL,'RADIUS Client');
/*!40000 ALTER TABLE `nas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nasreload`
--

DROP TABLE IF EXISTS `nasreload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nasreload` (
  `nasipaddress` varchar(15) NOT NULL,
  `reloadtime` datetime NOT NULL,
  PRIMARY KEY (`nasipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nasreload`
--

LOCK TABLES `nasreload` WRITE;
/*!40000 ALTER TABLE `nasreload` DISABLE KEYS */;
/*!40000 ALTER TABLE `nasreload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_asset_id_foreign` (`asset_id`),
  CONSTRAINT `notifications_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (26,19,'🔔 Less than two months','Maintenance Alert: Asset phone status is 🔔 Less than two months',1,'2025-07-22 13:18:49','2025-11-28 11:13:30'),(29,23,'❌ Overdue','Maintenance Alert: Asset Osama Ahmed status is ❌ Overdue',0,'2026-04-18 08:50:42','2026-04-18 08:56:56'),(30,22,'❓ Unknown','Maintenance Alert: Asset 7 status is ❓ Unknown',0,'2026-04-18 09:03:06','2026-04-18 09:03:06'),(31,22,'⚠️ Less than a month','Maintenance Alert: Asset 7 status is ⚠️ Less than a month',0,'2026-04-18 09:03:16','2026-04-18 09:03:16');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (45,'عرض الأصول','web','2026-04-18 08:55:15','2026-04-18 08:55:15'),(46,'إنشاء الأصول','web','2026-04-18 08:55:35','2026-04-18 08:55:35'),(47,'تعديل الأصول','web','2026-04-18 08:55:43','2026-04-18 08:55:43'),(48,'حذف الأصول','web','2026-04-18 08:55:47','2026-04-18 08:55:47'),(49,'عرض الإشعارات','web','2026-04-18 08:56:07','2026-04-18 08:56:15'),(50,'تعديل الإشعارات','web','2026-04-18 08:56:29','2026-04-18 08:56:29'),(51,'عرض سجل الأنشطة','web','2026-04-18 09:07:18','2026-04-18 09:07:18'),(52,'عرض طلبات الحذف','web','2026-04-18 09:15:37','2026-04-18 09:15:37'),(53,'تعديل طلبات الحذف','web','2026-04-18 09:15:45','2026-04-18 09:15:45'),(54,'حذف طلبات الحذف','web','2026-04-18 09:15:52','2026-04-18 09:15:52'),(55,'عرض الأقسام','web','2026-04-18 09:22:38','2026-04-18 09:22:38'),(56,'إنشاء قسم','web','2026-04-18 09:22:52','2026-04-18 09:22:52'),(57,'تعديل الأقسام','web','2026-04-18 09:23:05','2026-04-18 09:23:05'),(58,'حذف الأقسام','web','2026-04-18 09:23:11','2026-04-18 09:23:11'),(59,'عرض الصيانات','web','2026-04-18 09:26:19','2026-04-18 09:26:19'),(60,'إنشاء صيانة','web','2026-04-18 09:27:00','2026-04-18 09:27:00'),(61,'تعديل الصيانات','web','2026-04-18 09:27:13','2026-04-18 09:27:13'),(62,'حذف الصيانات','web','2026-04-18 09:27:24','2026-04-18 09:27:24'),(63,'عرض المستخدمين','web','2026-04-18 09:29:47','2026-04-18 09:29:47'),(64,'إنشاء مستخدم','web','2026-04-18 09:29:57','2026-04-18 09:29:57'),(65,'تعديل المستخدمين','web','2026-04-18 09:30:14','2026-04-18 09:30:14'),(66,'حذف المستخدمين','web','2026-04-18 09:30:18','2026-04-18 09:30:18'),(67,'عرض الصلاحيات','web','2026-04-18 18:21:22','2026-04-18 18:21:22'),(68,'إنشاء صلاحية','web','2026-04-18 18:21:41','2026-04-18 18:21:41'),(69,'تعديل الصلاحيات','web','2026-04-18 18:21:53','2026-04-18 18:21:53'),(70,'حذف الصلاحيات','web','2026-04-18 18:21:59','2026-04-18 18:21:59'),(71,'عرض الأدوار','web','2026-04-18 18:23:43','2026-04-18 18:23:43'),(72,'إنشاء دور','web','2026-04-18 18:23:55','2026-04-18 18:23:55'),(73,'تعديل الأدوار','web','2026-04-18 18:24:06','2026-04-18 18:24:06'),(74,'حذف الأدوار','web','2026-04-18 18:24:11','2026-04-18 18:24:11'),(75,'عرض إحصائيات الصيانة','web','2026-04-18 18:28:10','2026-04-18 18:28:10'),(76,'عرض إحصائيات الأصول','web','2026-04-18 18:31:22','2026-04-18 18:31:22'),(77,'عرض جدول الصيانة','web','2026-04-18 18:34:27','2026-04-18 18:34:27');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radacct`
--

DROP TABLE IF EXISTS `radacct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `radacct` (
  `radacctid` bigint NOT NULL AUTO_INCREMENT,
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT NULL,
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctsessiontime` int DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint DEFAULT NULL,
  `acctoutputoctets` bigint DEFAULT NULL,
  `calledstationid` varchar(50) DEFAULT NULL,
  `callingstationid` varchar(50) DEFAULT NULL,
  `acctterminatecause` varchar(32) DEFAULT NULL,
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`radacctid`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radacct`
--

LOCK TABLES `radacct` WRITE;
/*!40000 ALTER TABLE `radacct` DISABLE KEYS */;
/*!40000 ALTER TABLE `radacct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radcheck`
--

DROP TABLE IF EXISTS `radcheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `radcheck` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radcheck`
--

LOCK TABLES `radcheck` WRITE;
/*!40000 ALTER TABLE `radcheck` DISABLE KEYS */;
INSERT INTO `radcheck` VALUES (1,'osama','Cleartext-Password',':=','111'),(3,'osama1','Cleartext-Password',':=','999'),(4,'os','','==','999'),(5,'ggg','','==','ggg'),(6,'888','','==','111'),(7,'6666','Cleartext-Password',':=','8888');
/*!40000 ALTER TABLE `radcheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radgroupcheck`
--

DROP TABLE IF EXISTS `radgroupcheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `radgroupcheck` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radgroupcheck`
--

LOCK TABLES `radgroupcheck` WRITE;
/*!40000 ALTER TABLE `radgroupcheck` DISABLE KEYS */;
/*!40000 ALTER TABLE `radgroupcheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radgroupreply`
--

DROP TABLE IF EXISTS `radgroupreply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `radgroupreply` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radgroupreply`
--

LOCK TABLES `radgroupreply` WRITE;
/*!40000 ALTER TABLE `radgroupreply` DISABLE KEYS */;
/*!40000 ALTER TABLE `radgroupreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radpostauth`
--

DROP TABLE IF EXISTS `radpostauth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `radpostauth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `reply` varchar(32) NOT NULL DEFAULT '',
  `authdate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `class` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `class` (`class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radpostauth`
--

LOCK TABLES `radpostauth` WRITE;
/*!40000 ALTER TABLE `radpostauth` DISABLE KEYS */;
/*!40000 ALTER TABLE `radpostauth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radreply`
--

DROP TABLE IF EXISTS `radreply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `radreply` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radreply`
--

LOCK TABLES `radreply` WRITE;
/*!40000 ALTER TABLE `radreply` DISABLE KEYS */;
/*!40000 ALTER TABLE `radreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radusergroup`
--

DROP TABLE IF EXISTS `radusergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `radusergroup` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `priority` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radusergroup`
--

LOCK TABLES `radusergroup` WRITE;
/*!40000 ALTER TABLE `radusergroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `radusergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2025-06-08 14:40:14','2025-06-08 14:40:14'),(2,'admin2','web','2025-06-08 14:59:24','2025-06-08 14:59:24'),(3,'normal','web','2025-06-23 07:06:02','2025-06-23 07:06:02'),(5,'admin27','web','2025-07-22 13:28:07','2025-07-22 13:28:07'),(6,'user','web','2026-04-18 05:11:39','2026-04-18 05:11:39'),(7,'normal uswe','web','2026-04-18 05:20:43','2026-04-18 05:20:43');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('xXVF542My4kw52JownRF7KIuDcwpgqLZOP8ExWRp',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiR2RjOFlDclo2V09zejVnQUVRa2VEWEg5WXd1cGx5NU5EcjgxN3lnRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kZXBhcnRtZW50cy82L2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkUUJYR0lMWTNUa0h3Zzc1d0czai5CT0pXUzk4bWd1NVh5SmQyMVNTLm5UNG9MSUtOaXpYRU8iO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=',1776548627);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Test Staff','staff@test.com','$2y$12$QKI8wOL4PeWtsVXKLGuq.ePw5S3HYK/wqlZrG8gR/2ffLPQq0dXlq','2025-09-12 16:37:35','2025-09-12 16:37:35'),(2,'اسامه','os@test.com','$2y$12$.R5UMexBRpT3T6pi1dNGaefPL21jWGaVo/OCXXBW1kYS8uaqPqGIu','2025-09-12 16:47:49','2025-09-12 16:47:49');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','asaam4292@gmail.com',NULL,'$2y$12$QBXGILY3TkHwg75wG3j.BOJWS98mgu5XyJd21SS.nT4oLIKNizXEO','pwhPbJD46VuJoM9A4Q3a3o6cXUqkeO1ypajziobN9ac9GQLL6vTSk3Xjpv9p','2025-06-01 08:33:16','2025-07-11 12:34:10'),(4,'news editor','asasa2@gmail.come',NULL,'$2y$12$xmUqxd8DOJTf/GzfytmnHeZztNB86hLqG1gPX0hXe9HaFWGSN1KaK','oYBoZGnd2tZocmguEzWZJe4lFt7e9Nq651T06J3bsEPo8dMqnxPOGJNn6Wee','2025-06-08 14:48:56','2026-04-18 05:09:48'),(5,'mgd','mgd@admin.com',NULL,'$2y$12$Ytbi4N16rIZZwxym/ta01u7YNM/8fn9kH5qV0VUALpxh0FJqIVT0C','iy9pIhqEQwTi2Foy1ALbYFoUIsOiKSpiF7tafuDm0rxt12XvIOtHCfIxkaii','2025-06-23 07:07:12','2026-04-18 05:21:22'),(6,'Admin','admin@example.com',NULL,'$2y$12$I9BrrJ9SBOxnrbbtpTiyBuaJb03Yfg/RDbKfga0VSD35Jt7rrjPci',NULL,'2025-07-11 12:14:40','2025-07-11 12:14:40'),(7,'user2','user2@asest.com',NULL,'$2y$12$xbW7rn.c6itfWGkyEyM60OFjMpkkgvW6vJkaqPCOsWajj7cKeTzsK',NULL,'2025-07-22 13:26:09','2025-07-22 13:26:09'),(8,'user','user@gmail.come',NULL,'$2y$12$qMa4uW23UhOjVqYqlYwkZeGlhsLSki9g3pJMezl09kG4P9dTw.p7e',NULL,'2025-07-25 09:28:57','2025-07-25 09:28:57');
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

-- Dump completed on 2026-05-04  0:00:23
