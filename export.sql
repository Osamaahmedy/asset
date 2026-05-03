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

-- Dump completed on 2026-05-03 23:37:19
