-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2026 at 07:25 PM
-- Server version: 8.0.44-0ubuntu0.24.04.2
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `action`, `model_type`, `model_id`, `model_name`, `user_name`, `department_name`, `created_at`, `updated_at`, `description`) VALUES
(1, 'تم إنشاء أصل', 'App\\Models\\Asset', 4, NULL, NULL, NULL, '2025-07-11 14:37:03', '2025-07-11 14:37:03', NULL),
(2, 'تم تعديل أصل', 'App\\Models\\Asset', 4, NULL, NULL, NULL, '2025-07-11 14:37:09', '2025-07-11 14:37:09', NULL),
(3, 'تم إنشاء أصل', 'App\\Models\\Asset', 5, NULL, NULL, NULL, '2025-07-11 14:39:15', '2025-07-11 14:39:15', NULL),
(4, 'تم تعديل أصل', 'App\\Models\\Asset', 4, NULL, NULL, NULL, '2025-07-11 14:39:47', '2025-07-11 14:39:47', NULL),
(5, 'تم تعديل أصل', 'App\\Models\\Asset', 4, NULL, NULL, NULL, '2025-07-11 14:40:08', '2025-07-11 14:40:08', NULL),
(6, 'تم تعديل أصل', 'App\\Models\\Asset', 5, NULL, NULL, NULL, '2025-07-11 14:49:20', '2025-07-11 14:49:20', NULL),
(7, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 3, NULL, NULL, NULL, '2025-07-11 14:54:50', '2025-07-11 14:54:50', NULL),
(8, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 1, NULL, NULL, NULL, '2025-07-11 14:55:18', '2025-07-11 14:55:18', NULL),
(9, 'تم إنشاء أصل', 'App\\Models\\Asset', 6, NULL, NULL, NULL, '2025-07-11 15:02:41', '2025-07-11 15:02:41', NULL),
(10, 'تم تعديل أصل', 'App\\Models\\Asset', 6, NULL, NULL, NULL, '2025-07-11 15:03:08', '2025-07-11 15:03:08', NULL),
(11, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 5, NULL, NULL, NULL, '2025-07-11 15:03:46', '2025-07-11 15:03:46', NULL),
(12, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 5, NULL, NULL, NULL, '2025-07-11 15:04:08', '2025-07-11 15:04:08', NULL),
(13, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 5, NULL, NULL, NULL, '2025-07-11 15:04:23', '2025-07-11 15:04:23', NULL),
(14, 'تم حذف أصل', 'App\\Models\\Asset', 6, NULL, NULL, NULL, '2025-07-11 15:04:38', '2025-07-11 15:04:38', NULL),
(15, 'تم تعديل أصل', 'App\\Models\\Asset', 2, NULL, NULL, NULL, '2025-07-11 15:05:52', '2025-07-11 15:05:52', NULL),
(16, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 6, NULL, NULL, NULL, '2025-07-11 15:07:16', '2025-07-11 15:07:16', NULL),
(17, 'تم إنشاء أصل', 'App\\Models\\Asset', 7, NULL, NULL, NULL, '2025-07-11 15:35:31', '2025-07-11 15:35:31', NULL),
(18, 'تم إنشاء أصل', 'App\\Models\\Asset', 8, NULL, NULL, NULL, '2025-07-12 07:38:26', '2025-07-12 07:38:26', NULL),
(19, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 7, NULL, NULL, NULL, '2025-07-12 07:39:57', '2025-07-12 07:39:57', NULL),
(20, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, NULL, '2025-07-12 07:40:51', '2025-07-12 07:40:51', NULL),
(21, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, NULL, '2025-07-12 07:40:53', '2025-07-12 07:40:53', NULL),
(22, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, NULL, '2025-07-12 07:40:54', '2025-07-12 07:40:54', NULL),
(23, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, NULL, '2025-07-12 07:48:00', '2025-07-12 07:48:00', NULL),
(24, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, NULL, '2025-07-12 07:49:25', '2025-07-12 07:49:25', NULL),
(25, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 8, NULL, NULL, NULL, '2025-07-12 07:51:40', '2025-07-12 07:51:40', NULL),
(26, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, NULL, '2025-07-12 07:52:42', '2025-07-12 07:52:42', NULL),
(27, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, NULL, '2025-07-12 07:55:28', '2025-07-12 07:55:28', NULL),
(28, 'تم حذف أصل', 'App\\Models\\Asset', 1, NULL, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(29, 'تم حذف أصل', 'App\\Models\\Asset', 2, NULL, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(30, 'تم حذف أصل', 'App\\Models\\Asset', 5, NULL, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(31, 'تم حذف أصل', 'App\\Models\\Asset', 7, NULL, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(32, 'تم حذف أصل', 'App\\Models\\Asset', 8, NULL, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(33, 'تم إنشاء أصل', 'App\\Models\\Asset', 9, NULL, NULL, NULL, '2025-07-12 07:57:16', '2025-07-12 07:57:16', NULL),
(34, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, NULL, '2025-07-12 07:58:00', '2025-07-12 07:58:00', NULL),
(35, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 10, NULL, NULL, NULL, '2025-07-12 07:58:34', '2025-07-12 07:58:34', NULL),
(36, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, NULL, '2025-07-12 07:59:42', '2025-07-12 07:59:42', NULL),
(37, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, NULL, '2025-07-12 08:00:58', '2025-07-12 08:00:58', NULL),
(38, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 11, NULL, NULL, NULL, '2025-07-12 08:02:02', '2025-07-12 08:02:02', NULL),
(39, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, NULL, '2025-07-12 08:07:54', '2025-07-12 08:07:54', NULL),
(40, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, NULL, '2025-07-12 08:08:22', '2025-07-12 08:08:22', NULL),
(41, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, NULL, '2025-07-12 08:08:23', '2025-07-12 08:08:23', NULL),
(42, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, NULL, '2025-07-12 08:11:49', '2025-07-12 08:11:49', NULL),
(43, 'تم تعديل أصل', 'App\\Models\\Asset', 9, NULL, NULL, NULL, '2025-07-12 08:13:25', '2025-07-12 08:13:25', NULL),
(44, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, NULL, '2025-07-12 08:14:28', '2025-07-12 08:14:28', NULL),
(45, 'تم إنشاء أصل', 'App\\Models\\Asset', 10, NULL, NULL, NULL, '2025-07-12 08:56:35', '2025-07-12 08:56:35', NULL),
(46, 'تم تعديل أصل', 'App\\Models\\Asset', 10, NULL, NULL, NULL, '2025-07-12 08:57:20', '2025-07-12 08:57:20', NULL),
(47, 'تم إنشاء أصل', 'App\\Models\\Asset', 11, NULL, NULL, NULL, '2025-07-12 15:12:23', '2025-07-12 15:12:23', NULL),
(48, 'تم تعديل أصل', 'App\\Models\\Asset', 11, NULL, NULL, NULL, '2025-07-12 15:12:43', '2025-07-12 15:12:43', NULL),
(49, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 12, NULL, NULL, NULL, '2025-07-12 15:13:41', '2025-07-12 15:13:41', NULL),
(50, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 12, NULL, NULL, NULL, '2025-07-12 15:14:14', '2025-07-12 15:14:14', NULL),
(51, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 12, NULL, NULL, NULL, '2025-07-12 15:15:20', '2025-07-12 15:15:20', NULL),
(52, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, NULL, '2025-07-14 14:59:39', '2025-07-14 14:59:39', NULL),
(53, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, NULL, '2025-07-14 15:00:24', '2025-07-14 15:00:24', NULL),
(54, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, NULL, '2025-07-14 15:01:11', '2025-07-14 15:01:11', NULL),
(55, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, NULL, '2025-07-14 15:05:37', '2025-07-14 15:05:37', NULL),
(56, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, NULL, '2025-07-14 15:05:43', '2025-07-14 15:05:43', NULL),
(57, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, NULL, '2025-07-14 15:06:12', '2025-07-14 15:06:12', NULL),
(58, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, NULL, '2025-07-14 15:06:25', '2025-07-14 15:06:25', NULL),
(59, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, NULL, '2025-07-14 15:06:52', '2025-07-14 15:06:52', NULL),
(60, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, NULL, '2025-07-14 15:07:10', '2025-07-14 15:07:10', NULL),
(61, 'تم تعديل أصل', 'App\\Models\\Asset', 10, NULL, NULL, NULL, '2025-07-14 15:07:55', '2025-07-14 15:07:55', NULL),
(62, 'تم حذف أصل', 'App\\Models\\Asset', 10, NULL, NULL, NULL, '2025-07-14 16:37:29', '2025-07-14 16:37:29', NULL),
(63, 'تم إنشاء أصل', 'App\\Models\\Asset', 14, NULL, NULL, NULL, '2025-07-14 16:53:26', '2025-07-14 16:53:26', NULL),
(64, 'تم تعديل أصل', 'App\\Models\\Asset', 14, NULL, NULL, NULL, '2025-07-14 16:54:01', '2025-07-14 16:54:01', NULL),
(65, 'تم حذف أصل', 'App\\Models\\Asset', 14, NULL, NULL, NULL, '2025-07-14 16:54:48', '2025-07-14 16:54:48', NULL),
(66, 'تم حذف أصل', 'App\\Models\\Asset', 13, NULL, NULL, NULL, '2025-07-14 16:59:01', '2025-07-14 16:59:01', NULL),
(67, 'تم حذف أصل', 'App\\Models\\Asset', 13, NULL, NULL, NULL, '2025-07-14 16:59:01', '2025-07-14 16:59:01', NULL),
(68, 'تم حذف أصل', 'App\\Models\\Asset', 12, NULL, NULL, NULL, '2025-07-14 17:02:04', '2025-07-14 17:02:04', 'اسم الأصل: admin'),
(69, 'تم حذف أصل', 'App\\Models\\Asset', 12, NULL, NULL, NULL, '2025-07-14 17:02:04', '2025-07-14 17:02:04', NULL),
(70, 'تم تعديل أصل', 'App\\Models\\Asset', 9, NULL, NULL, NULL, '2025-07-14 17:17:22', '2025-07-14 17:17:22', NULL),
(71, 'تم تعديل أصل', 'App\\Models\\Asset', 11, NULL, NULL, NULL, '2025-07-14 17:33:37', '2025-07-14 17:33:37', NULL),
(72, 'تم تعديل أصل', 'App\\Models\\Asset', 9, NULL, NULL, NULL, '2025-07-14 17:34:16', '2025-07-14 17:34:16', NULL),
(73, 'تم حذف أصل', 'App\\Models\\Asset', 9, NULL, NULL, NULL, '2025-07-14 17:35:22', '2025-07-14 17:35:22', 'اسم الأصل: مكيف'),
(74, 'تم حذف أصل', 'App\\Models\\Asset', 9, NULL, NULL, NULL, '2025-07-14 17:35:22', '2025-07-14 17:35:22', NULL),
(75, 'تم حذف أصل', 'App\\Models\\Asset', 11, NULL, NULL, NULL, '2025-07-14 17:35:29', '2025-07-14 17:35:29', 'اسم الأصل: سلك'),
(76, 'تم حذف أصل', 'App\\Models\\Asset', 11, NULL, NULL, NULL, '2025-07-14 17:35:30', '2025-07-14 17:35:30', NULL),
(77, 'تم إنشاء أصل', 'App\\Models\\Asset', 15, NULL, NULL, NULL, '2025-07-14 17:45:29', '2025-07-14 17:45:29', NULL),
(78, 'تم إنشاء أصل', 'App\\Models\\Asset', 16, NULL, NULL, NULL, '2025-07-14 17:46:31', '2025-07-14 17:46:31', NULL),
(79, 'تم إنشاء أصل', 'App\\Models\\Asset', 17, NULL, NULL, NULL, '2025-07-14 17:50:15', '2025-07-14 17:50:15', NULL),
(80, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 14, NULL, NULL, NULL, '2025-07-14 17:52:52', '2025-07-14 17:52:52', NULL),
(81, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 14, NULL, NULL, NULL, '2025-07-14 17:53:51', '2025-07-14 17:53:51', NULL),
(82, 'تم حذف أصل', 'App\\Models\\Asset', 15, NULL, NULL, NULL, '2025-07-14 17:57:59', '2025-07-14 17:57:59', 'اسم الأصل: تلاجه'),
(83, 'تم حذف أصل', 'App\\Models\\Asset', 17, NULL, NULL, NULL, '2025-07-19 18:50:40', '2025-07-19 18:50:40', 'اسم الأصل: رشاش ماء'),
(84, 'تم تعديل أصل', 'App\\Models\\Asset', 16, NULL, NULL, NULL, '2025-07-19 18:56:20', '2025-07-19 18:56:20', NULL),
(85, 'تم تعديل أصل', 'App\\Models\\Asset', 16, NULL, NULL, NULL, '2025-07-19 19:14:25', '2025-07-19 19:14:25', NULL),
(86, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:19:59', '2025-07-19 19:19:59', NULL),
(87, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:28:51', '2025-07-19 19:28:51', NULL),
(88, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:29:18', '2025-07-19 19:29:18', NULL),
(89, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:29:37', '2025-07-19 19:29:37', NULL),
(90, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:30:41', '2025-07-19 19:30:41', NULL),
(91, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:31:12', '2025-07-19 19:31:12', NULL),
(92, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:31:13', '2025-07-19 19:31:13', NULL),
(93, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:31:14', '2025-07-19 19:31:14', NULL),
(94, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:31:14', '2025-07-19 19:31:14', NULL),
(95, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:31:14', '2025-07-19 19:31:14', NULL),
(96, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:31:15', '2025-07-19 19:31:15', NULL),
(97, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:31:15', '2025-07-19 19:31:15', NULL),
(98, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:31:20', '2025-07-19 19:31:20', NULL),
(99, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:32:25', '2025-07-19 19:32:25', NULL),
(100, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:34:51', '2025-07-19 19:34:51', NULL),
(101, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:40:14', '2025-07-19 19:40:14', NULL),
(102, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:41:49', '2025-07-19 19:41:49', NULL),
(103, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:41:50', '2025-07-19 19:41:50', NULL),
(104, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:43:34', '2025-07-19 19:43:34', NULL),
(105, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:43:56', '2025-07-19 19:43:56', NULL),
(106, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:44:23', '2025-07-19 19:44:23', NULL),
(107, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:44:24', '2025-07-19 19:44:24', NULL),
(108, 'Maintenance updated', 'App\\Models\\Maintenance', 15, NULL, NULL, NULL, '2025-07-19 19:52:34', '2025-07-19 19:52:34', NULL),
(109, 'Maintenance created', 'App\\Models\\Maintenance', 16, NULL, NULL, NULL, '2025-07-19 19:54:52', '2025-07-19 19:54:52', NULL),
(110, 'Maintenance updated', 'App\\Models\\Maintenance', 16, NULL, NULL, NULL, '2025-07-19 19:55:05', '2025-07-19 19:55:05', NULL),
(111, 'Maintenance created', 'App\\Models\\Maintenance', 17, NULL, NULL, NULL, '2025-07-19 19:55:52', '2025-07-19 19:55:52', NULL),
(112, 'Asset updated', 'App\\Models\\Asset', 16, NULL, NULL, NULL, '2025-07-19 19:56:13', '2025-07-19 19:56:13', NULL),
(113, 'Asset created', 'App\\Models\\Asset', 18, NULL, NULL, NULL, '2025-07-19 19:57:06', '2025-07-19 19:57:06', NULL),
(114, 'Asset deleted', 'App\\Models\\Asset', 18, NULL, NULL, NULL, '2025-07-19 19:58:10', '2025-07-19 19:58:10', 'Asset Name: ي'),
(115, 'Asset created', 'App\\Models\\Asset', 19, NULL, NULL, NULL, '2025-07-22 13:08:29', '2025-07-22 13:08:29', NULL),
(116, 'Asset updated', 'App\\Models\\Asset', 19, NULL, NULL, NULL, '2025-07-22 13:08:54', '2025-07-22 13:08:54', NULL),
(117, 'Maintenance created', 'App\\Models\\Maintenance', 18, NULL, NULL, NULL, '2025-07-22 13:17:24', '2025-07-22 13:17:24', NULL),
(118, 'Maintenance created', 'App\\Models\\Maintenance', 19, NULL, NULL, NULL, '2025-07-22 13:18:20', '2025-07-22 13:18:20', NULL),
(119, 'Maintenance updated', 'App\\Models\\Maintenance', 18, NULL, NULL, NULL, '2025-07-22 13:18:49', '2025-07-22 13:18:49', NULL),
(120, 'Asset deleted', 'App\\Models\\Asset', 16, NULL, NULL, NULL, '2025-07-22 13:21:56', '2025-07-22 13:21:56', 'Asset Name: مكيف'),
(121, 'Asset created', 'App\\Models\\Asset', 20, NULL, NULL, NULL, '2025-07-22 14:47:34', '2025-07-22 14:47:34', NULL),
(122, 'Asset updated', 'App\\Models\\Asset', 20, NULL, NULL, NULL, '2026-03-08 18:04:38', '2026-03-08 18:04:38', NULL),
(123, 'Asset deleted', 'App\\Models\\Asset', 20, NULL, NULL, NULL, '2026-03-08 18:06:11', '2026-03-08 18:06:11', 'Asset Name: test'),
(124, 'Maintenance created', 'App\\Models\\Maintenance', 20, NULL, NULL, NULL, '2026-03-08 18:07:54', '2026-03-08 18:07:54', NULL),
(125, 'Asset created', 'App\\Models\\Asset', 21, NULL, NULL, NULL, '2026-04-18 05:14:06', '2026-04-18 05:14:06', NULL),
(126, 'Asset updated', 'App\\Models\\Asset', 21, NULL, NULL, NULL, '2026-04-18 05:14:56', '2026-04-18 05:14:56', NULL),
(127, 'Maintenance created', 'App\\Models\\Maintenance', 21, NULL, NULL, NULL, '2026-04-18 05:17:37', '2026-04-18 05:17:37', NULL),
(128, 'Asset deleted', 'App\\Models\\Asset', 21, NULL, NULL, NULL, '2026-04-18 05:19:20', '2026-04-18 05:19:20', 'Asset Name: lab'),
(129, 'Asset created', 'App\\Models\\Asset', 22, NULL, NULL, NULL, '2026-04-18 08:44:42', '2026-04-18 08:44:42', NULL),
(130, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, NULL, '2026-04-18 08:44:47', '2026-04-18 08:44:47', NULL),
(131, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, NULL, '2026-04-18 08:45:02', '2026-04-18 08:45:02', NULL),
(132, 'Asset updated', 'App\\Models\\Asset', 19, NULL, NULL, NULL, '2026-04-18 08:45:34', '2026-04-18 08:45:34', NULL),
(133, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, NULL, '2026-04-18 08:47:40', '2026-04-18 08:47:40', NULL),
(134, 'Asset updated', 'App\\Models\\Asset', 19, NULL, NULL, NULL, '2026-04-18 08:49:27', '2026-04-18 08:49:27', NULL),
(135, 'Asset created', 'App\\Models\\Asset', 23, NULL, NULL, NULL, '2026-04-18 08:49:55', '2026-04-18 08:49:55', NULL),
(136, 'Asset updated', 'App\\Models\\Asset', 23, NULL, NULL, NULL, '2026-04-18 08:50:04', '2026-04-18 08:50:04', NULL),
(137, 'Asset updated', 'App\\Models\\Asset', 23, NULL, NULL, NULL, '2026-04-18 08:50:42', '2026-04-18 08:50:42', NULL),
(138, 'Asset updated', 'App\\Models\\Asset', 23, NULL, NULL, NULL, '2026-04-18 08:50:52', '2026-04-18 08:50:52', NULL),
(139, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, NULL, '2026-04-18 09:03:06', '2026-04-18 09:03:06', NULL),
(140, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, NULL, '2026-04-18 09:03:16', '2026-04-18 09:03:16', NULL),
(141, 'Asset created', 'App\\Models\\Asset', 24, NULL, NULL, NULL, '2026-04-18 09:08:18', '2026-04-18 09:08:18', NULL),
(142, 'Asset created', 'App\\Models\\Asset', 25, 'ث', NULL, 'new', '2026-04-18 09:12:24', '2026-04-18 09:12:24', NULL),
(143, 'Asset updated', 'App\\Models\\Asset', 25, 'ث', NULL, 'new', '2026-04-18 09:12:50', '2026-04-18 09:12:50', NULL),
(144, 'Maintenance created', 'App\\Models\\Maintenance', 22, 'صيانة: ث', NULL, 'new', '2026-04-18 09:13:19', '2026-04-18 09:13:19', NULL),
(145, 'Asset deleted', 'App\\Models\\Asset', 25, 'ث', NULL, 'new', '2026-04-18 09:16:19', '2026-04-18 09:16:19', 'تم حذف الأصل: ث'),
(146, 'Maintenance created', 'App\\Models\\Maintenance', 23, 'صيانة: Osama Ahmed', NULL, 'new', '2026-04-18 09:27:56', '2026-04-18 09:27:56', NULL),
(147, 'Asset updated', 'App\\Models\\Asset', 19, 'phone', NULL, 'test', '2026-05-11 05:57:54', '2026-05-11 05:57:54', NULL),
(148, 'Asset updated', 'App\\Models\\Asset', 19, 'phone', NULL, 'test', '2026-05-11 05:58:22', '2026-05-11 05:58:22', NULL),
(149, 'Maintenance created', 'App\\Models\\Maintenance', 24, 'صيانة: phone', NULL, 'test', '2026-05-11 05:58:51', '2026-05-11 05:58:51', NULL),
(150, 'Maintenance updated', 'App\\Models\\Maintenance', 24, 'صيانة: phone', NULL, 'test', '2026-05-11 05:59:08', '2026-05-11 05:59:08', NULL),
(151, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-11 06:23:03', '2026-05-11 06:23:03', NULL),
(152, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-11 10:55:56', '2026-05-11 10:55:56', NULL),
(153, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-11 11:02:40', '2026-05-11 11:02:40', NULL),
(154, 'maintenance', 'App\\Models\\Asset', 23, 'Osama Ahmed', NULL, 'new', '2026-05-11 13:39:47', '2026-05-11 13:39:47', 'طلب صيانة جديد من: سامر — الأولوية: متوسط — عطل بالمروحة'),
(155, 'maintenance', 'App\\Models\\Asset', 23, 'Osama Ahmed', NULL, 'new', '2026-05-11 13:41:53', '2026-05-11 13:41:53', 'اكتمل طلب الصيانة — مرسل الطلب: سامر'),
(156, 'maintenance', 'App\\Models\\Asset', 23, 'Osama Ahmed', NULL, 'new', '2026-05-11 13:47:19', '2026-05-11 13:47:19', 'طلب صيانة جديد من: سامر — الأولوية: متوسط — عطل بالمروحة'),
(157, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-11 13:47:53', '2026-05-11 13:47:53', NULL),
(158, 'maintenance', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-11 13:48:02', '2026-05-11 13:48:02', 'طلب صيانة جديد من: سامر — الأولوية: متوسط — عطل بالمروحة'),
(159, 'updated', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-11 14:34:11', '2026-05-11 14:34:11', 'تم تأجيل طلب الصيانة — مرسل الطلب: سامر'),
(160, 'maintenance', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-11 14:34:29', '2026-05-11 14:34:29', 'اكتمل طلب الصيانة — مرسل الطلب: سامر'),
(161, 'maintenance', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-11 15:23:26', '2026-05-11 15:23:26', 'طلب صيانة جديد من: حسام — الأولوية: عالي — عطل بالمروحة'),
(162, 'Asset updated', 'App\\Models\\Asset', 23, 'Osama Ahmed', NULL, 'new', '2026-05-11 15:24:48', '2026-05-11 15:24:48', NULL),
(163, 'Asset updated', 'App\\Models\\Asset', 19, 'phone', NULL, 'test', '2026-05-13 10:37:35', '2026-05-13 10:37:35', NULL),
(164, 'Asset created', 'App\\Models\\Asset', 26, 'd', NULL, 'new', '2026-05-13 10:38:02', '2026-05-13 10:38:02', NULL),
(165, 'Asset updated', 'App\\Models\\Asset', 23, 'Osama Ahmed', NULL, 'new', '2026-05-19 05:28:37', '2026-05-19 05:28:37', NULL),
(166, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-19 05:30:22', '2026-05-19 05:30:22', NULL),
(167, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', NULL, 'new', '2026-05-19 05:30:42', '2026-05-19 05:30:42', NULL),
(168, 'إضافة', 'App\\Models\\Asset', 27, 'Osama Ahmed', NULL, 'test', '2026-05-26 17:23:38', '2026-05-26 17:23:38', 'تمت إضافة أصل جديد باسم: Osama Ahmed'),
(169, 'Asset created', 'App\\Models\\Asset', 27, 'Osama Ahmed', NULL, 'test', '2026-05-26 17:23:38', '2026-05-26 17:23:38', NULL),
(170, 'إضافة', 'App\\Models\\Vendor', 1, 'Osama Ahmed', NULL, NULL, '2026-05-26 17:29:56', '2026-05-26 17:29:56', 'تمت إضافة مورد جديد باسم: Osama Ahmed'),
(171, 'إضافة', 'App\\Models\\AssetHandover', 1, '1', NULL, NULL, '2026-05-26 17:45:39', '2026-05-26 17:45:39', 'تمت إضافة عهدة أصل جديد باسم: 1'),
(172, 'إضافة', 'App\\Models\\SparePart', 1, 'admin', NULL, NULL, '2026-05-26 18:53:31', '2026-05-26 18:53:31', 'تمت إضافة قطعة غيار جديد باسم: admin'),
(173, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', NULL, 'test', '2026-05-26 18:55:21', '2026-05-26 18:55:21', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [name] تغير من (Osama Ahmed) إلى (Osama Ahmedي).\n- الحقل [vendor_id] تغير من (فارغ) إلى (1).'),
(174, 'Asset updated', 'App\\Models\\Asset', 27, 'Osama Ahmedي', NULL, 'test', '2026-05-26 18:55:21', '2026-05-26 18:55:21', NULL),
(175, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', NULL, 'test', '2026-05-26 18:55:28', '2026-05-26 18:55:28', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [warranty_months] تغير من (فارغ) إلى (65).\n- الحقل [warranty_start_date] تغير من (فارغ) إلى (2026-05-25).'),
(176, 'Asset updated', 'App\\Models\\Asset', 27, 'Osama Ahmedي', NULL, 'test', '2026-05-26 18:55:28', '2026-05-26 18:55:28', NULL),
(177, 'إضافة', 'App\\Models\\AssetHandover', 2, '2', NULL, NULL, '2026-05-26 18:56:13', '2026-05-26 18:56:13', 'تمت إضافة عهدة أصل جديد باسم: 2'),
(178, 'إضافة', 'App\\Models\\Location', 1, 'Osama Ahmed', NULL, NULL, '2026-05-26 18:57:28', '2026-05-26 18:57:28', 'تمت إضافة موقع جديد باسم: Osama Ahmed'),
(179, 'إضافة', 'App\\Models\\Location', 2, 'الدور الثاني قسم c', NULL, NULL, '2026-05-26 18:59:41', '2026-05-26 18:59:41', 'تمت إضافة موقع جديد باسم: الدور الثاني قسم c'),
(180, 'تعديل', 'App\\Models\\Location', 1, 'الدور الثاني', NULL, NULL, '2026-05-26 18:59:59', '2026-05-26 18:59:59', 'تم تعديل موقع (الدور الثاني).\nالتغييرات:\n- الحقل [name] تغير من (Osama Ahmed) إلى (الدور الثاني).'),
(181, 'إضافة', 'App\\Models\\AssetHandover', 3, '3', NULL, NULL, '2026-05-26 19:01:59', '2026-05-26 19:01:59', 'تمت إضافة عهدة أصل جديد باسم: 3'),
(182, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', NULL, 'test', '2026-05-26 19:01:59', '2026-05-26 19:01:59', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [is_personal] تغير من (0) إلى (1).\n- الحقل [employee_id] تغير من (1) إلى (2).'),
(183, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', NULL, 'test', '2026-05-26 19:02:27', '2026-05-26 19:02:27', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [location_id] تغير من (فارغ) إلى (2).'),
(184, 'Asset updated', 'App\\Models\\Asset', 27, 'Osama Ahmedي', NULL, 'test', '2026-05-26 19:02:27', '2026-05-26 19:02:27', NULL),
(185, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', NULL, 'test', '2026-05-26 19:08:26', '2026-05-26 19:08:26', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [is_personal] تغير من (1) إلى (0).\n- الحقل [employee_id] تغير من (2) إلى (1).'),
(186, 'Asset updated', 'App\\Models\\Asset', 27, 'Osama Ahmedي', NULL, 'test', '2026-05-26 19:08:26', '2026-05-26 19:08:26', NULL),
(187, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 4, '4', 'admin', NULL, '2026-05-26 19:10:57', '2026-05-26 19:10:57', 'تم تعديل طلب صيانة خارجي (4).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (فارغ) إلى (545).\n- الحقل [status] تغير من (pending) إلى (approved).'),
(188, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 4, '4', 'admin', NULL, '2026-05-26 19:11:00', '2026-05-26 19:11:00', 'تم تعديل طلب صيانة خارجي (4).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (545.00) إلى (545).\n- الحقل [status] تغير من (approved) إلى (completed).'),
(189, 'تعديل', 'App\\Models\\AssetType', 1, '8lab', 'admin', NULL, '2026-05-26 19:12:39', '2026-05-26 19:12:39', 'تم تعديل نوع أصل (8lab).\nالتغييرات:\n- الحقل [name] تغير من (lab) إلى (8lab).'),
(190, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:13:00', '2026-05-26 19:13:00', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [is_personal] تغير من (0) إلى (1).'),
(191, 'إضافة', 'App\\Models\\Location', 3, '6', 'admin', NULL, '2026-05-26 19:14:35', '2026-05-26 19:14:35', 'تمت إضافة موقع جديد باسم: 6'),
(192, 'إضافة', 'App\\Models\\SparePart', 2, 'ر', 'admin', NULL, '2026-05-26 19:14:45', '2026-05-26 19:14:45', 'تمت إضافة قطعة غيار جديد باسم: ر'),
(193, 'إضافة', 'App\\Models\\AssetHandover', 4, '4', 'admin', NULL, '2026-05-26 19:15:12', '2026-05-26 19:15:12', 'تمت إضافة عهدة أصل جديد باسم: 4'),
(194, 'تعديل', 'App\\Models\\AssetHandover', 4, '4', 'admin', NULL, '2026-05-26 19:16:16', '2026-05-26 19:16:16', 'تم تعديل عهدة أصل (4).\nالتغييرات:\n- الحقل [employee_id] تغير من (2) إلى (1).'),
(195, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-05-26 19:16:16', '2026-05-26 19:16:16', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [is_personal] تغير من (0) إلى ().\n- الحقل [employee_id] تغير من (1) إلى ().'),
(196, 'إضافة', 'App\\Models\\AssetHandover', 5, '5', 'admin', NULL, '2026-05-26 19:16:48', '2026-05-26 19:16:48', 'تمت إضافة عهدة أصل جديد باسم: 5'),
(197, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-05-26 19:16:48', '2026-05-26 19:16:48', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [is_personal] تغير من (1) إلى (1).\n- الحقل [employee_id] تغير من (1) إلى (2).'),
(198, 'تعديل', 'App\\Models\\MaintenanceRequest', 4, '4', 'admin', NULL, '2026-05-26 19:17:41', '2026-05-26 19:17:41', 'تم تعديل طلب صيانة (4).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(199, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-05-26 19:17:41', '2026-05-26 19:17:41', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [last_maintenance_date] تغير من (2026-05-11) إلى (2026-05-26).'),
(200, 'تعديل', 'App\\Models\\MaintenanceRequest', 2, '2', 'admin', NULL, '2026-05-26 19:18:22', '2026-05-26 19:18:22', 'تم تعديل طلب صيانة (2).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(201, 'تعديل', 'App\\Models\\Asset', 23, 'Osama Ahmed', 'admin', 'new', '2026-05-26 19:18:22', '2026-05-26 19:18:22', 'تم تعديل أصل (Osama Ahmed).\nالتغييرات:\n- الحقل [last_maintenance_date] تغير من (2026-05-11) إلى (2026-05-26).'),
(202, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 3, '3', 'admin', NULL, '2026-05-26 19:19:25', '2026-05-26 19:19:25', 'تم تعديل طلب صيانة خارجي (3).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(203, 'تعديل', 'App\\Models\\Vendor', 1, 'Osama Ahmed1', 'admin', NULL, '2026-05-26 19:24:28', '2026-05-26 19:24:28', 'تم تعديل مورد (Osama Ahmed1).\nالتغييرات:\n- الحقل [name] تغير من (Osama Ahmed) إلى (Osama Ahmed1).'),
(204, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-05-26 19:24:41', '2026-05-26 19:24:41', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [vendor_id] تغير من (فارغ) إلى (1).\n- الحقل [location_id] تغير من (فارغ) إلى (3).'),
(205, 'إضافة', 'App\\Models\\AssetHandover', 6, '6', 'admin', NULL, '2026-05-26 19:34:23', '2026-05-26 19:34:23', 'تمت إضافة عهدة أصل جديد باسم: 6'),
(206, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:34:23', '2026-05-26 19:34:23', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [is_personal] تغير من (1) إلى (1).\n- الحقل [status] تغير من (متاح) إلى (في العهدة).\n- الحقل [employee_id] تغير من (1) إلى (2).'),
(207, 'إضافة', 'App\\Models\\Maintenance', 25, '25', 'admin', NULL, '2026-05-26 19:34:49', '2026-05-26 19:34:49', 'تمت إضافة صيانة جديد باسم: 25'),
(208, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:34:49', '2026-05-26 19:34:49', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(209, 'Maintenance created', 'App\\Models\\Maintenance', 25, 'صيانة: Osama Ahmedي', NULL, 'test', '2026-05-26 19:34:49', '2026-05-26 19:34:49', NULL),
(210, 'تعديل', 'App\\Models\\Maintenance', 25, '25', 'admin', NULL, '2026-05-26 19:35:24', '2026-05-26 19:35:24', 'تم تعديل صيانة (25).\nالتغييرات:\n- الحقل [status] تغير من (Pending) إلى (Maintenance Completed).'),
(211, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:35:24', '2026-05-26 19:35:24', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(212, 'Maintenance updated', 'App\\Models\\Maintenance', 25, 'صيانة: Osama Ahmedي', NULL, 'test', '2026-05-26 19:35:24', '2026-05-26 19:35:24', NULL),
(213, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:36:25', '2026-05-26 19:36:25', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [salvage_value] تغير من (فارغ) إلى (54).\n- الحقل [useful_life_years] تغير من (فارغ) إلى (1).'),
(214, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-05-26 19:44:11', '2026-05-26 19:44:11', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [useful_life_years] تغير من (فارغ) إلى (2).\n- الحقل [warranty_months] تغير من (فارغ) إلى (1).\n- الحقل [warranty_start_date] تغير من (فارغ) إلى (2010-05-07).'),
(215, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-05-26 19:48:31', '2026-05-26 19:48:31', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [useful_life_years] تغير من (2) إلى (1).'),
(216, 'إضافة', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-26 19:50:11', '2026-05-26 19:50:11', 'تمت إضافة أصل جديد باسم: admin'),
(217, 'تعديل', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-26 19:53:32', '2026-05-26 19:53:32', 'تم تعديل أصل (admin).\nالتغييرات:\n- الحقل [salvage_value] تغير من (فارغ) إلى (545).'),
(218, 'تعديل', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-26 19:53:52', '2026-05-26 19:53:52', 'تم تعديل أصل (admin).\nالتغييرات:\n- الحقل [warranty_start_date] تغير من (2026-05-14) إلى (2016-05-06).'),
(219, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:54:57', '2026-05-26 19:54:57', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [price] تغير من (5.00) إلى (500).'),
(220, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:55:16', '2026-05-26 19:55:16', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [warranty_months] تغير من (65) إلى (1).\n- الحقل [warranty_start_date] تغير من (2026-05-25) إلى (2018-05-10).'),
(221, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:55:32', '2026-05-26 19:55:32', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [useful_life_years] تغير من (1) إلى (2).'),
(222, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:55:37', '2026-05-26 19:55:37', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [useful_life_years] تغير من (2) إلى (10).'),
(223, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'test', '2026-05-26 19:55:54', '2026-05-26 19:55:54', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [useful_life_years] تغير من (10) إلى (9).'),
(224, 'إضافة', 'App\\Models\\AssetAudit', 1, 'الدور الرابع', 'admin', NULL, '2026-05-26 20:21:56', '2026-05-26 20:21:56', 'تمت إضافة AssetAudit جديد باسم: الدور الرابع'),
(225, 'إضافة', 'App\\Models\\AssetAudit', 2, 'Osama Ahmed', 'admin', NULL, '2026-05-26 20:26:31', '2026-05-26 20:26:31', 'تمت إضافة AssetAudit جديد باسم: Osama Ahmed'),
(226, 'تعديل', 'App\\Models\\AssetAudit', 2, 'Osama Ahmed', 'admin', NULL, '2026-05-26 20:27:01', '2026-05-26 20:27:01', 'تم تعديل AssetAudit (Osama Ahmed).\nالتغييرات:\n- الحقل [status] تغير من (In Progress) إلى (Completed).'),
(227, 'إضافة', 'App\\Models\\AssetAudit', 3, 'Osama Ahmed', 'admin', NULL, '2026-05-26 20:28:25', '2026-05-26 20:28:25', 'تمت إضافة AssetAudit جديد باسم: Osama Ahmed'),
(228, 'تعديل', 'App\\Models\\AssetAudit', 3, 'Osama Ahmed', 'admin', NULL, '2026-05-26 20:34:24', '2026-05-26 20:34:24', 'تم تعديل AssetAudit (Osama Ahmed).\nالتغييرات:\n- الحقل [status] تغير من (In Progress) إلى (Completed).'),
(229, 'إضافة', 'App\\Models\\AssetAudit', 4, 'ي', 'admin', NULL, '2026-05-26 20:34:44', '2026-05-26 20:34:44', 'تمت إضافة AssetAudit جديد باسم: ي'),
(230, 'تعديل', 'App\\Models\\AssetAudit', 4, 'ي', 'admin', NULL, '2026-05-26 20:36:12', '2026-05-26 20:36:12', 'تم تعديل AssetAudit (ي).\nالتغييرات:\n- الحقل [status] تغير من (In Progress) إلى (Completed).'),
(231, 'إضافة', 'App\\Models\\AssetAudit', 5, '5', 'admin', NULL, '2026-05-26 20:36:23', '2026-05-26 20:36:23', 'تمت إضافة AssetAudit جديد باسم: 5'),
(232, 'تعديل', 'App\\Models\\AssetAudit', 5, '5', 'admin', NULL, '2026-05-26 20:36:56', '2026-05-26 20:36:56', 'تم تعديل AssetAudit (5).\nالتغييرات:\n- الحقل [status] تغير من (In Progress) إلى (Completed).'),
(233, 'إضافة', 'App\\Models\\AssetAudit', 6, '6', 'admin', NULL, '2026-05-26 20:42:44', '2026-05-26 20:42:44', 'تمت إضافة AssetAudit جديد باسم: 6'),
(234, 'إضافة', 'App\\Models\\Maintenance', 26, '26', 'admin', NULL, '2026-05-26 20:43:15', '2026-05-26 20:43:15', 'تمت إضافة صيانة جديد باسم: 26'),
(235, 'تعديل', 'App\\Models\\Maintenance', 25, '25', 'admin', NULL, '2026-05-26 20:43:39', '2026-05-26 20:43:39', 'تم تعديل صيانة (25).\nالتغييرات:\n- الحقل [status] تغير من (Maintenance Completed) إلى (Postponed).'),
(236, 'تعديل', 'App\\Models\\Maintenance', 25, '25', 'admin', NULL, '2026-05-26 20:43:43', '2026-05-26 20:43:43', 'تم تعديل صيانة (25).\nالتغييرات:\n- الحقل [status] تغير من (Postponed) إلى (Maintenance Completed).'),
(237, 'تعديل', 'App\\Models\\User', 1, 'admin', 'admin', NULL, '2026-05-27 06:43:45', '2026-05-27 06:43:45', 'تم تعديل مستخدم (admin).\nالتغييرات:\n- الحقل [remember_token] تغير من (pwhPbJD46VuJoM9A4Q3a3o6cXUqkeO1ypajziobN9ac9GQLL6vTSk3Xjpv9p) إلى (qZOgEuzYQCkroZCXdxWLUcfIlEcxsGiP69YXxwQVM6cVCSedkWbOZKSRPw7D).'),
(238, 'تعديل', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-27 07:10:31', '2026-05-27 07:10:31', 'تم تعديل أصل (admin).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في الصيانة).'),
(239, 'تعديل', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-27 07:10:49', '2026-05-27 07:10:49', 'تم تعديل أصل (admin).\nالتغييرات:\n- الحقل [is_personal] تغير من (0) إلى (1).'),
(240, 'إضافة', 'App\\Models\\Maintenance', 27, '27', 'admin', NULL, '2026-05-27 07:11:17', '2026-05-27 07:11:17', 'تمت إضافة صيانة جديد باسم: 27'),
(241, 'تعديل', 'App\\Models\\MaintenanceRequest', 3, '3', 'admin', NULL, '2026-05-27 07:27:35', '2026-05-27 07:27:35', 'تم تعديل طلب صيانة (3).\nالتغييرات:\n- الحقل [status] تغير من (completed) إلى (pending).'),
(242, 'تعديل', 'App\\Models\\MaintenanceRequest', 4, '4', 'admin', NULL, '2026-05-27 07:30:19', '2026-05-27 07:30:19', 'تم تعديل طلب صيانة (4).\nالتغييرات:\n- الحقل [status] تغير من (completed) إلى (postponed).'),
(243, 'تعديل', 'App\\Models\\MaintenanceRequest', 4, '4', 'admin', NULL, '2026-05-27 07:30:24', '2026-05-27 07:30:24', 'تم تعديل طلب صيانة (4).\nالتغييرات:\n- الحقل [status] تغير من (postponed) إلى (completed).'),
(244, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-05-27 07:30:24', '2026-05-27 07:30:24', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [last_maintenance_date] تغير من (2026-05-26) إلى (2026-05-27).'),
(245, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-05-27 08:30:22', '2026-05-27 08:30:22', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (TCPBXpjep6EjZqHx4LH35IuMmgaQdhuA4EfXxeUBTDUZupXWcYkntVTUWT6E) إلى (jN9wfck6zwEFaYQZ6nuImpiOygPV27Y5KYBsR0tBAWuGz0J78vA9JNHMJfdD).'),
(246, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:31:45', '2026-05-27 08:31:45', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [department_id] تغير من (2) إلى (3).'),
(247, 'إضافة', 'App\\Models\\MaintenanceRequest', 5, '5', 'نظام (System)', NULL, '2026-05-27 08:33:40', '2026-05-27 08:33:40', 'تمت إضافة طلب صيانة جديد باسم: 5'),
(248, 'إضافة', 'App\\Models\\Maintenance', 28, '28', 'admin', NULL, '2026-05-27 08:34:30', '2026-05-27 08:34:30', 'تمت إضافة صيانة جديد باسم: 28'),
(249, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:34:30', '2026-05-27 08:34:30', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(250, 'تعديل', 'App\\Models\\Maintenance', 27, '27', 'admin', NULL, '2026-05-27 08:37:15', '2026-05-27 08:37:15', 'تم تعديل صيانة (27).\nالتغييرات:\n- الحقل [status] تغير من (Pending) إلى (Maintenance Completed).'),
(251, 'تعديل', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-27 08:37:15', '2026-05-27 08:37:15', 'تم تعديل أصل (admin).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).\n- الحقل [last_maintenance_date] تغير من (2026-05-26) إلى (2026-05-27).'),
(252, 'تعديل', 'App\\Models\\Maintenance', 28, '28', 'admin', NULL, '2026-05-27 08:37:57', '2026-05-27 08:37:57', 'تم تعديل صيانة (28).\nالتغييرات:\n- الحقل [status] تغير من (Pending) إلى (Maintenance Completed).'),
(253, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:37:57', '2026-05-27 08:37:57', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).\n- الحقل [last_maintenance_date] تغير من (2026-05-26) إلى (2026-05-27).'),
(254, 'تعديل', 'App\\Models\\MaintenanceRequest', 5, '5', 'admin', NULL, '2026-05-27 08:40:00', '2026-05-27 08:40:00', 'تم تعديل طلب صيانة (5).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(255, 'إضافة', 'App\\Models\\MaintenanceRequest', 6, '6', 'نظام (System)', NULL, '2026-05-27 08:40:24', '2026-05-27 08:40:24', 'تمت إضافة طلب صيانة جديد باسم: 6'),
(256, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 08:40:24', '2026-05-27 08:40:24', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(257, 'تعديل', 'App\\Models\\MaintenanceRequest', 6, '6', 'admin', NULL, '2026-05-27 08:40:58', '2026-05-27 08:40:58', 'تم تعديل طلب صيانة (6).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(258, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:40:58', '2026-05-27 08:40:58', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(259, 'تعديل', 'App\\Models\\MaintenanceRequest', 6, '6', 'admin', NULL, '2026-05-27 08:42:28', '2026-05-27 08:42:28', 'تم تعديل طلب صيانة (6).\nالتغييرات:\n- الحقل [status] تغير من (completed) إلى (postponed).'),
(260, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:42:28', '2026-05-27 08:42:28', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(261, 'تعديل', 'App\\Models\\MaintenanceRequest', 6, '6', 'admin', NULL, '2026-05-27 08:42:31', '2026-05-27 08:42:31', 'تم تعديل طلب صيانة (6).\nالتغييرات:\n- الحقل [status] تغير من (postponed) إلى (completed).'),
(262, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:42:31', '2026-05-27 08:42:31', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(263, 'إضافة', 'App\\Models\\MaintenanceRequest', 7, '7', 'نظام (System)', NULL, '2026-05-27 08:44:44', '2026-05-27 08:44:44', 'تمت إضافة طلب صيانة جديد باسم: 7'),
(264, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 08:44:44', '2026-05-27 08:44:44', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(265, 'تعديل', 'App\\Models\\MaintenanceRequest', 7, '7', 'admin', NULL, '2026-05-27 08:45:02', '2026-05-27 08:45:02', 'تم تعديل طلب صيانة (7).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (postponed).'),
(266, 'تعديل', 'App\\Models\\MaintenanceRequest', 7, '7', 'admin', NULL, '2026-05-27 08:45:41', '2026-05-27 08:45:41', 'تم تعديل طلب صيانة (7).\nالتغييرات:\n- الحقل [status] تغير من (postponed) إلى (completed).'),
(267, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:45:41', '2026-05-27 08:45:41', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(268, 'تعديل', 'App\\Models\\MaintenanceRequest', 7, '7', 'admin', NULL, '2026-05-27 08:46:02', '2026-05-27 08:46:02', 'تم تعديل طلب صيانة (7).\nالتغييرات:\n- الحقل [status] تغير من (completed) إلى (pending).'),
(269, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:46:02', '2026-05-27 08:46:02', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(270, 'تعديل', 'App\\Models\\MaintenanceRequest', 7, '7', 'admin', NULL, '2026-05-27 08:46:13', '2026-05-27 08:46:13', 'تم تعديل طلب صيانة (7).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(271, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:46:13', '2026-05-27 08:46:13', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(272, 'تعديل', 'App\\Models\\MaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-05-27 08:46:48', '2026-05-27 08:46:48', 'تم تعديل طلب صيانة (3).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(273, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-05-27 08:47:26', '2026-05-27 08:47:26', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [last_maintenance_date] تغير من (2026-05-27) إلى ().'),
(274, 'إضافة', 'App\\Models\\MaintenanceRequest', 8, '8', 'نظام (System)', NULL, '2026-05-27 08:48:42', '2026-05-27 08:48:42', 'تمت إضافة طلب صيانة جديد باسم: 8'),
(275, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 08:48:42', '2026-05-27 08:48:42', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(276, 'تعديل', 'App\\Models\\MaintenanceRequest', 8, '8', 'admin', NULL, '2026-05-27 08:49:01', '2026-05-27 08:49:01', 'تم تعديل طلب صيانة (8).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(277, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:49:02', '2026-05-27 08:49:02', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(278, 'إضافة', 'App\\Models\\Notification', 34, '34', 'نظام (System)', NULL, '2026-05-27 08:49:11', '2026-05-27 08:49:11', 'تمت إضافة Notification جديد باسم: 34'),
(279, 'تعديل', 'App\\Models\\MaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-05-27 08:49:11', '2026-05-27 08:49:11', 'تم تعديل طلب صيانة (3).\nالتغييرات:\n- الحقل [status] تغير من (completed) إلى (pending).'),
(280, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-05-27 08:49:11', '2026-05-27 08:49:11', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في الصيانة).'),
(281, 'إضافة', 'App\\Models\\Notification', 35, '35', 'نظام (System)', NULL, '2026-05-27 08:49:11', '2026-05-27 08:49:11', 'تمت إضافة Notification جديد باسم: 35'),
(282, 'تعديل', 'App\\Models\\MaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-05-27 08:49:11', '2026-05-27 08:49:11', 'تم تعديل طلب صيانة (3).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(283, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-05-27 08:49:11', '2026-05-27 08:49:11', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (متاح).\n- الحقل [last_maintenance_date] تغير من (فارغ) إلى (2026-05-27).'),
(284, 'إضافة', 'App\\Models\\MaintenanceRequest', 9, '9', 'نظام (System)', NULL, '2026-05-27 08:50:54', '2026-05-27 08:50:54', 'تمت إضافة طلب صيانة جديد باسم: 9'),
(285, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 08:50:54', '2026-05-27 08:50:54', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(286, 'تعديل', 'App\\Models\\MaintenanceRequest', 9, '9', 'admin', NULL, '2026-05-27 08:51:10', '2026-05-27 08:51:10', 'تم تعديل طلب صيانة (9).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(287, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:51:10', '2026-05-27 08:51:10', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(288, 'إضافة', 'App\\Models\\MaintenanceRequest', 10, '10', 'نظام (System)', NULL, '2026-05-27 08:53:29', '2026-05-27 08:53:29', 'تمت إضافة طلب صيانة جديد باسم: 10'),
(289, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 08:53:29', '2026-05-27 08:53:29', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(290, 'إضافة', 'App\\Models\\ExternalMaintenanceRequest', 5, '5', 'admin', NULL, '2026-05-27 08:53:40', '2026-05-27 08:53:40', 'تمت إضافة طلب صيانة خارجي جديد باسم: 5'),
(291, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:58:14', '2026-05-27 08:58:14', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).\n- الحقل [maintenance_due_date] تغير من (2026-08-26) إلى (2026-08-27).'),
(292, 'تعديل', 'App\\Models\\MaintenanceRequest', 10, '10', 'admin', NULL, '2026-05-27 08:58:14', '2026-05-27 08:58:14', 'تم تعديل طلب صيانة (10).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(293, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 08:58:52', '2026-05-27 08:58:52', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(294, 'إضافة', 'App\\Models\\MaintenanceRequest', 11, '11', 'نظام (System)', NULL, '2026-05-27 08:58:52', '2026-05-27 08:58:52', 'تمت إضافة طلب صيانة جديد باسم: 11'),
(295, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 08:59:10', '2026-05-27 08:59:10', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(296, 'تعديل', 'App\\Models\\MaintenanceRequest', 11, '11', 'admin', NULL, '2026-05-27 08:59:10', '2026-05-27 08:59:10', 'تم تعديل طلب صيانة (11).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(297, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-05-27 09:00:20', '2026-05-27 09:00:20', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [maintenance_due_date] تغير من (2026-07-18) إلى ().\n- الحقل [last_maintenance_date] تغير من (2026-05-27) إلى ().'),
(298, 'إضافة', 'App\\Models\\Notification', 36, '36', 'نظام (System)', NULL, '2026-05-27 09:00:20', '2026-05-27 09:00:20', 'تمت إضافة Notification جديد باسم: 36'),
(299, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-05-27 09:00:20', '2026-05-27 09:00:20', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في الصيانة).'),
(300, 'إضافة', 'App\\Models\\Notification', 37, '37', 'نظام (System)', NULL, '2026-05-27 09:00:20', '2026-05-27 09:00:20', 'تمت إضافة Notification جديد باسم: 37'),
(301, 'تعديل', 'App\\Models\\MaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-05-27 09:00:20', '2026-05-27 09:00:20', 'تم تعديل طلب صيانة (3).\nالتغييرات:\n- الحقل [status] تغير من (completed) إلى (pending).'),
(302, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-05-27 09:00:20', '2026-05-27 09:00:20', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (متاح).\n- الحقل [maintenance_due_date] تغير من (فارغ) إلى (2026-08-27).\n- الحقل [last_maintenance_date] تغير من (فارغ) إلى (2026-05-27).'),
(303, 'تعديل', 'App\\Models\\MaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-05-27 09:00:20', '2026-05-27 09:00:20', 'تم تعديل طلب صيانة (3).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(304, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 09:01:16', '2026-05-27 09:01:16', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(305, 'إضافة', 'App\\Models\\MaintenanceRequest', 12, '12', 'نظام (System)', NULL, '2026-05-27 09:01:16', '2026-05-27 09:01:16', 'تمت إضافة طلب صيانة جديد باسم: 12'),
(306, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 09:01:55', '2026-05-27 09:01:55', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(307, 'تعديل', 'App\\Models\\MaintenanceRequest', 12, '12', 'admin', NULL, '2026-05-27 09:01:55', '2026-05-27 09:01:55', 'تم تعديل طلب صيانة (12).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(308, 'إضافة', 'App\\Models\\MaintenanceRequest', 13, '13', 'نظام (System)', NULL, '2026-05-27 09:02:40', '2026-05-27 09:02:40', 'تمت إضافة طلب صيانة جديد باسم: 13'),
(309, 'حذف', 'App\\Models\\MaintenanceRequest', 13, '13', 'admin', NULL, '2026-05-27 09:04:13', '2026-05-27 09:04:13', 'تم حذف السجل بالكامل'),
(310, 'إضافة', 'App\\Models\\MaintenanceRequest', 14, '14', 'نظام (System)', NULL, '2026-05-27 09:05:41', '2026-05-27 09:05:41', 'تمت إضافة طلب صيانة جديد باسم: 14');
INSERT INTO `activity_logs` (`id`, `action`, `model_type`, `model_id`, `model_name`, `user_name`, `department_name`, `created_at`, `updated_at`, `description`) VALUES
(311, 'حذف', 'App\\Models\\MaintenanceRequest', 14, '14', 'admin', NULL, '2026-05-27 09:06:31', '2026-05-27 09:06:31', 'تم حذف السجل بالكامل'),
(312, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 09:06:40', '2026-05-27 09:06:40', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(313, 'إضافة', 'App\\Models\\MaintenanceRequest', 15, '15', 'نظام (System)', NULL, '2026-05-27 09:06:40', '2026-05-27 09:06:40', 'تمت إضافة طلب صيانة جديد باسم: 15'),
(314, 'تعديل', 'App\\Models\\Asset', 23, 'Osama Ahmed', 'نظام (System)', 'new', '2026-05-27 09:06:56', '2026-05-27 09:06:56', 'تم تعديل أصل (Osama Ahmed).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في الصيانة).\n- الحقل [maintenance_due_date] تغير من (2026-07-18) إلى (2027-02-26).'),
(315, 'إضافة', 'App\\Models\\MaintenanceRequest', 16, '16', 'نظام (System)', NULL, '2026-05-27 09:07:33', '2026-05-27 09:07:33', 'تمت إضافة طلب صيانة جديد باسم: 16'),
(316, 'تعديل', 'App\\Models\\Asset', 23, 'Osama Ahmed', 'نظام (System)', 'new', '2026-05-27 09:08:11', '2026-05-27 09:08:11', 'تم تعديل أصل (Osama Ahmed).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).\n- الحقل [maintenance_due_date] تغير من (2027-02-26) إلى (2027-02-27).\n- الحقل [last_maintenance_date] تغير من (2026-05-26) إلى (2026-05-27).'),
(317, 'تعديل', 'App\\Models\\MaintenanceRequest', 16, '16', 'نظام (System)', NULL, '2026-05-27 09:08:11', '2026-05-27 09:08:11', 'تم تعديل طلب صيانة (16).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(318, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 09:09:49', '2026-05-27 09:09:49', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(319, 'تعديل', 'App\\Models\\MaintenanceRequest', 15, '15', 'admin', NULL, '2026-05-27 09:09:49', '2026-05-27 09:09:49', 'تم تعديل طلب صيانة (15).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(320, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 09:10:38', '2026-05-27 09:10:38', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(321, 'إضافة', 'App\\Models\\MaintenanceRequest', 17, '17', 'نظام (System)', NULL, '2026-05-27 09:10:38', '2026-05-27 09:10:38', 'تمت إضافة طلب صيانة جديد باسم: 17'),
(322, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 09:10:55', '2026-05-27 09:10:55', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(323, 'تعديل', 'App\\Models\\MaintenanceRequest', 17, '17', 'admin', NULL, '2026-05-27 09:10:55', '2026-05-27 09:10:55', 'تم تعديل طلب صيانة (17).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(324, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 09:12:58', '2026-05-27 09:12:58', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(325, 'إضافة', 'App\\Models\\MaintenanceRequest', 18, '18', 'نظام (System)', NULL, '2026-05-27 09:12:58', '2026-05-27 09:12:58', 'تمت إضافة طلب صيانة جديد باسم: 18'),
(326, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 09:14:12', '2026-05-27 09:14:12', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(327, 'تعديل', 'App\\Models\\MaintenanceRequest', 18, '18', 'admin', NULL, '2026-05-27 09:14:12', '2026-05-27 09:14:12', 'تم تعديل طلب صيانة (18).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(328, 'إضافة', 'App\\Models\\MaintenanceRequest', 19, '19', 'نظام (System)', NULL, '2026-05-27 09:15:12', '2026-05-27 09:15:12', 'تمت إضافة طلب صيانة جديد باسم: 19'),
(329, 'تعديل', 'App\\Models\\MaintenanceRequest', 19, '19', 'admin', NULL, '2026-05-27 09:15:52', '2026-05-27 09:15:52', 'تم تعديل طلب صيانة (19).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(330, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 09:18:40', '2026-05-27 09:18:40', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(331, 'إضافة', 'App\\Models\\MaintenanceRequest', 20, '20', 'نظام (System)', NULL, '2026-05-27 09:18:40', '2026-05-27 09:18:40', 'تمت إضافة طلب صيانة جديد باسم: 20'),
(332, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 09:18:59', '2026-05-27 09:18:59', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(333, 'تعديل', 'App\\Models\\MaintenanceRequest', 20, '20', 'admin', NULL, '2026-05-27 09:18:59', '2026-05-27 09:18:59', 'تم تعديل طلب صيانة (20).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(334, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 09:19:21', '2026-05-27 09:19:21', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(335, 'إضافة', 'App\\Models\\MaintenanceRequest', 21, '21', 'نظام (System)', NULL, '2026-05-27 09:19:21', '2026-05-27 09:19:21', 'تمت إضافة طلب صيانة جديد باسم: 21'),
(336, 'إضافة', 'App\\Models\\ExternalMaintenanceRequest', 6, '6', 'admin', NULL, '2026-05-27 09:19:32', '2026-05-27 09:19:32', 'تمت إضافة طلب صيانة خارجي جديد باسم: 6'),
(337, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 6, '6', 'admin', NULL, '2026-05-27 09:19:45', '2026-05-27 09:19:45', 'تم تعديل طلب صيانة خارجي (6).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(338, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 09:20:04', '2026-05-27 09:20:04', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(339, 'تعديل', 'App\\Models\\MaintenanceRequest', 21, '21', 'admin', NULL, '2026-05-27 09:20:04', '2026-05-27 09:20:04', 'تم تعديل طلب صيانة (21).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(340, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-05-27 09:23:27', '2026-05-27 09:23:27', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [maintenance_due_date] تغير من (2026-08-27) إلى ().\n- الحقل [last_maintenance_date] تغير من (2026-05-27) إلى ().'),
(341, 'إضافة', 'App\\Models\\Notification', 38, '38', 'نظام (System)', NULL, '2026-05-27 09:23:27', '2026-05-27 09:23:27', 'تمت إضافة Notification جديد باسم: 38'),
(342, 'تعديل', 'App\\Models\\MaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-05-27 09:23:27', '2026-05-27 09:23:27', 'تم تعديل طلب صيانة (3).\nالتغييرات:\n- الحقل [status] تغير من (completed) إلى (pending).'),
(343, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-05-27 09:23:27', '2026-05-27 09:23:27', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في الصيانة).'),
(344, 'إضافة', 'App\\Models\\Notification', 39, '39', 'نظام (System)', NULL, '2026-05-27 09:23:27', '2026-05-27 09:23:27', 'تمت إضافة Notification جديد باسم: 39'),
(345, 'تعديل', 'App\\Models\\MaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-05-27 09:23:27', '2026-05-27 09:23:27', 'تم تعديل طلب صيانة (3).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(346, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-05-27 09:23:27', '2026-05-27 09:23:27', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (متاح).\n- الحقل [maintenance_due_date] تغير من (فارغ) إلى (2026-08-27).\n- الحقل [last_maintenance_date] تغير من (فارغ) إلى (2026-05-27).'),
(347, 'إضافة', 'App\\Models\\MaintenanceRequest', 22, '22', 'نظام (System)', NULL, '2026-05-27 09:24:17', '2026-05-27 09:24:17', 'تمت إضافة طلب صيانة جديد باسم: 22'),
(348, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 09:24:17', '2026-05-27 09:24:17', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(349, 'تعديل', 'App\\Models\\MaintenanceRequest', 22, '22', 'admin', NULL, '2026-05-27 09:24:30', '2026-05-27 09:24:30', 'تم تعديل طلب صيانة (22).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(350, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 09:24:30', '2026-05-27 09:24:30', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(351, 'إضافة', 'App\\Models\\MaintenanceRequest', 23, '23', 'نظام (System)', NULL, '2026-05-27 09:28:57', '2026-05-27 09:28:57', 'تمت إضافة طلب صيانة جديد باسم: 23'),
(352, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 09:28:57', '2026-05-27 09:28:57', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(353, 'تعديل', 'App\\Models\\MaintenanceRequest', 23, '23', 'admin', NULL, '2026-05-27 09:29:30', '2026-05-27 09:29:30', 'تم تعديل طلب صيانة (23).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(354, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 09:29:30', '2026-05-27 09:29:30', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(355, 'إضافة', 'App\\Models\\MaintenanceRequest', 24, '24', 'نظام (System)', NULL, '2026-05-27 09:30:03', '2026-05-27 09:30:03', 'تمت إضافة طلب صيانة جديد باسم: 24'),
(356, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-05-27 09:30:03', '2026-05-27 09:30:03', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).\n- الحقل [maintenance_due_date] تغير من (2026-08-27) إلى (2025-04-16).'),
(357, 'إضافة', 'App\\Models\\Notification', 40, '40', 'نظام (System)', NULL, '2026-05-27 09:30:03', '2026-05-27 09:30:03', 'تمت إضافة Notification جديد باسم: 40'),
(358, 'تعديل', 'App\\Models\\MaintenanceRequest', 24, '24', 'admin', NULL, '2026-05-27 09:30:24', '2026-05-27 09:30:24', 'تم تعديل طلب صيانة (24).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(359, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'new', '2026-05-27 09:30:24', '2026-05-27 09:30:24', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).\n- الحقل [maintenance_due_date] تغير من (2025-04-16) إلى (2026-08-27).\n- الحقل [last_maintenance_date] تغير من (2025-01-16) إلى (2026-05-27).'),
(360, 'إضافة', 'App\\Models\\MaintenanceRequest', 25, '25', 'نظام (System)', NULL, '2026-05-27 09:32:12', '2026-05-27 09:32:12', 'تمت إضافة طلب صيانة جديد باسم: 25'),
(361, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'نظام (System)', 'new', '2026-05-27 09:32:12', '2026-05-27 09:32:12', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في الصيانة).'),
(362, 'تعديل', 'App\\Models\\MaintenanceRequest', 25, '25', 'admin', NULL, '2026-05-27 09:32:39', '2026-05-27 09:32:39', 'تم تعديل طلب صيانة (25).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (postponed).'),
(363, 'تعديل', 'App\\Models\\MaintenanceRequest', 25, '25', 'admin', NULL, '2026-05-27 09:32:54', '2026-05-27 09:32:54', 'تم تعديل طلب صيانة (25).\nالتغييرات:\n- الحقل [status] تغير من (postponed) إلى (completed).'),
(364, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-05-27 09:32:54', '2026-05-27 09:32:54', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).\n- الحقل [maintenance_due_date] تغير من (2026-08-13) إلى (2026-08-27).\n- الحقل [last_maintenance_date] تغير من (2026-05-13) إلى (2026-05-27).'),
(365, 'تعديل', 'App\\Models\\User', 1, 'admin', 'admin', NULL, '2026-05-27 09:36:16', '2026-05-27 09:36:16', 'تم تعديل مستخدم (admin).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$QBXGILY3TkHwg75wG3j.BOJWS98mgu5XyJd21SS.nT4oLIKNizXEO) إلى ($2y$12$XtmIvZNkZmHJDgrGzaSZ1e1MBHF8SOJi6s17Ef4flBVKZqWD2s.Wm).'),
(366, 'تعديل', 'App\\Models\\User', 1, 'admin', 'admin', NULL, '2026-05-27 09:36:41', '2026-05-27 09:36:41', 'تم تعديل مستخدم (admin).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$XtmIvZNkZmHJDgrGzaSZ1e1MBHF8SOJi6s17Ef4flBVKZqWD2s.Wm) إلى ($2y$12$1B0MGGlP7eedz.fl3PNtnun76q3r9gArMVHw/g45IEdD4iJy51Jc2).'),
(367, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-05-27 13:29:42', '2026-05-27 13:29:42', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (jN9wfck6zwEFaYQZ6nuImpiOygPV27Y5KYBsR0tBAWuGz0J78vA9JNHMJfdD) إلى (a88bf4b5d7d8e0649c73fe5c09a1b7d28321b4efe6ffacc84c38aa11b7fbd729).'),
(368, 'تعديل', 'App\\Models\\SparePart', 2, 'ر', 'admin', NULL, '2026-05-27 13:32:18', '2026-05-27 13:32:18', 'تم تعديل قطعة غيار (ر).\nالتغييرات:\n- الحقل [quantity] تغير من (0) إلى (01).'),
(369, 'تعديل', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-27 13:33:07', '2026-05-27 13:33:07', 'تم تعديل أصل (admin).\nالتغييرات:\n- الحقل [maintenance_due_date] تغير من (2026-08-26) إلى (2017-02-09).\n- الحقل [warranty_start_date] تغير من (2016-05-06) إلى (2026-05-14).'),
(370, 'إضافة', 'App\\Models\\Notification', 41, '41', 'admin', NULL, '2026-05-27 13:33:07', '2026-05-27 13:33:07', 'تمت إضافة Notification جديد باسم: 41'),
(371, 'تعديل', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-27 13:33:56', '2026-05-27 13:33:56', 'تم تعديل أصل (admin).\nالتغييرات:\n- الحقل [useful_life_years] تغير من (1) إلى (3).'),
(372, 'إضافة', 'App\\Models\\Notification', 42, '42', 'admin', NULL, '2026-05-27 13:33:56', '2026-05-27 13:33:56', 'تمت إضافة Notification جديد باسم: 42'),
(373, 'إضافة', 'App\\Models\\Maintenance', 29, '29', 'admin', NULL, '2026-05-27 13:34:59', '2026-05-27 13:34:59', 'تمت إضافة صيانة جديد باسم: 29'),
(374, 'إضافة', 'App\\Models\\Maintenance', 30, '30', 'admin', NULL, '2026-05-27 13:36:05', '2026-05-27 13:36:05', 'تمت إضافة صيانة جديد باسم: 30'),
(375, 'تعديل', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-27 13:36:05', '2026-05-27 13:36:05', 'تم تعديل أصل (admin).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(376, 'إضافة', 'App\\Models\\Notification', 43, '43', 'admin', NULL, '2026-05-27 13:36:05', '2026-05-27 13:36:05', 'تمت إضافة Notification جديد باسم: 43'),
(377, 'تعديل', 'App\\Models\\Maintenance', 30, '30', 'admin', NULL, '2026-05-27 13:36:36', '2026-05-27 13:36:36', 'تم تعديل صيانة (30).\nالتغييرات:\n- الحقل [status] تغير من (Pending) إلى (Maintenance Completed).'),
(378, 'تعديل', 'App\\Models\\Asset', 28, 'admin', 'admin', 'new', '2026-05-27 13:36:36', '2026-05-27 13:36:36', 'تم تعديل أصل (admin).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).\n- الحقل [maintenance_due_date] تغير من (2017-02-09) إلى (2026-08-27).\n- الحقل [last_maintenance_date] تغير من (2016-11-09) إلى (2026-05-27).'),
(379, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-05-27 13:39:21', '2026-05-27 13:39:21', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [useful_life_years] تغير من (1) إلى (20).\n- الحقل [warranty_start_date] تغير من (2010-05-07) إلى (2026-05-19).'),
(380, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-05-27 13:39:37', '2026-05-27 13:39:37', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [useful_life_years] تغير من (20) إلى (10).\n- الحقل [warranty_months] تغير من (1) إلى (20).'),
(381, 'إضافة', 'App\\Models\\Maintenance', 31, '31', 'admin', NULL, '2026-05-27 13:42:49', '2026-05-27 13:42:49', 'تمت إضافة صيانة جديد باسم: 31'),
(382, 'إضافة', 'App\\Models\\Maintenance', 32, '32', 'admin', NULL, '2026-05-27 16:44:37', '2026-05-27 16:44:37', 'تمت إضافة صيانة جديد باسم: 32'),
(383, 'تعديل', 'App\\Models\\Asset', 19, 'phone', 'admin', 'test', '2026-05-27 16:44:37', '2026-05-27 16:44:37', 'تم تعديل أصل (phone).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في العهدة).\n- الحقل [maintenance_due_date] تغير من (2026-04-02) إلى (2026-08-27).\n- الحقل [last_maintenance_date] تغير من (2026-05-11) إلى (2026-05-27).'),
(384, 'إضافة', 'App\\Models\\MaintenanceRequest', 26, '26', 'نظام (System)', NULL, '2026-05-27 19:30:20', '2026-05-27 19:30:20', 'تمت إضافة طلب صيانة جديد باسم: 26'),
(385, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'نظام (System)', 'new', '2026-05-27 19:30:20', '2026-05-27 19:30:20', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(386, 'تعديل', 'App\\Models\\User', 1, 'admin', 'admin', NULL, '2026-05-28 11:55:24', '2026-05-28 11:55:24', 'تم تعديل مستخدم (admin).\nالتغييرات:\n- الحقل [remember_token] تغير من (qZOgEuzYQCkroZCXdxWLUcfIlEcxsGiP69YXxwQVM6cVCSedkWbOZKSRPw7D) إلى (1mpY1lXXZ0ItDbT16Tdg7gL2RQgQb4hKV8KrJkq9y0vmurvjZBskCgdX3B8W).'),
(387, 'تعديل', 'App\\Models\\User', 1, 'admin', 'admin', NULL, '2026-05-28 12:01:38', '2026-05-28 12:01:38', 'تم تعديل مستخدم (admin).\nالتغييرات:\n- الحقل [remember_token] تغير من (1mpY1lXXZ0ItDbT16Tdg7gL2RQgQb4hKV8KrJkq9y0vmurvjZBskCgdX3B8W) إلى (QIqGyOGKdPD83hWqLKrb0OFVqWhsM9lqLcEMEIcj7J6Ed0BKm5LKozWsk9lJ).'),
(388, 'تعديل', 'App\\Models\\User', 1, 'admin', 'نظام (System)', NULL, '2026-05-28 12:02:20', '2026-05-28 12:02:20', 'تم تعديل مستخدم (admin).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$1B0MGGlP7eedz.fl3PNtnun76q3r9gArMVHw/g45IEdD4iJy51Jc2) إلى ($2y$12$xTL4uGvSAouvssK.pummJuHWMTskQm.ORfQ2Ahynp4A8J9sMap3Vy).\n- الحقل [remember_token] تغير من (QIqGyOGKdPD83hWqLKrb0OFVqWhsM9lqLcEMEIcj7J6Ed0BKm5LKozWsk9lJ) إلى (iHA19jPjvmjTwRin1em6P5Dadk8CDqAtdUHTRUGPHaNgyuEVhluWiabL2Wfv).'),
(389, 'إضافة', 'App\\Models\\AssetAudit', 7, 'l', 'admin', NULL, '2026-06-02 07:05:52', '2026-06-02 07:05:52', 'تمت إضافة AssetAudit جديد باسم: l'),
(390, 'تعديل', 'App\\Models\\AssetHandover', 1, '1', 'admin', NULL, '2026-06-02 07:28:28', '2026-06-02 07:28:28', 'تم تعديل عهدة أصل (1).\nالتغييرات:\n- الحقل [condition_on_handover] تغير من (ئ) إلى (needs_repair).'),
(391, 'إضافة', 'App\\Models\\AssetAudit', 8, 'k', 'admin', NULL, '2026-06-02 07:40:23', '2026-06-02 07:40:23', 'تمت إضافة AssetAudit جديد باسم: k'),
(392, 'إضافة', 'App\\Models\\AssetAudit', 9, 's', 'admin', NULL, '2026-06-02 07:40:48', '2026-06-02 07:40:48', 'تمت إضافة AssetAudit جديد باسم: s'),
(393, 'إضافة', 'App\\Models\\AssetAudit', 10, '10', 'admin', NULL, '2026-06-02 07:40:59', '2026-06-02 07:40:59', 'تمت إضافة AssetAudit جديد باسم: 10'),
(394, 'تعديل', 'App\\Models\\AssetAudit', 10, '10', 'admin', NULL, '2026-06-02 07:44:17', '2026-06-02 07:44:17', 'تم تعديل AssetAudit (10).\nالتغييرات:\n- الحقل [status] تغير من (In Progress) إلى (Completed).'),
(395, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-06-02 07:44:46', '2026-06-02 07:44:46', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(396, 'إضافة', 'App\\Models\\AssetAudit', 11, 'l\';l\'', 'admin', NULL, '2026-06-02 07:45:02', '2026-06-02 07:45:02', 'تمت إضافة AssetAudit جديد باسم: l\';l\''),
(397, 'إضافة', 'App\\Models\\AssetHandover', 7, '7', 'admin', NULL, '2026-06-02 07:53:35', '2026-06-02 07:53:35', 'تمت إضافة عهدة أصل جديد باسم: 7'),
(398, 'تعديل', 'App\\Models\\AssetHandover', 7, '7', 'admin', NULL, '2026-06-02 07:58:53', '2026-06-02 07:58:53', 'تم تعديل عهدة أصل (7).\nالتغييرات:\n- الحقل [handed_over_at] تغير من (فارغ) إلى (2026-06-19).\n- الحقل [condition_on_handover] تغير من (فارغ) إلى (good).\n- الحقل [handover_notes] تغير من (فارغ) إلى (ؤ).\n- الحقل [notes] تغير من (فارغ) إلى (ؤ).'),
(399, 'إضافة', 'App\\Models\\AssetHandover', 8, '8', 'admin', NULL, '2026-06-02 08:01:07', '2026-06-02 08:01:07', 'تمت إضافة عهدة أصل جديد باسم: 8'),
(400, 'إضافة', 'App\\Models\\AssetHandover', 9, '9', 'admin', NULL, '2026-06-02 08:02:38', '2026-06-02 08:02:38', 'تمت إضافة عهدة أصل جديد باسم: 9'),
(401, 'تعديل', 'App\\Models\\Asset', 19, 'phone', 'admin', 'test', '2026-06-02 08:02:38', '2026-06-02 08:02:38', 'تم تعديل أصل (phone).\nالتغييرات:\n- الحقل [is_personal] تغير من (1) إلى (1).'),
(402, 'إضافة', 'App\\Models\\AssetAudit', 12, 'admin', 'admin', 'test', '2026-06-02 08:12:20', '2026-06-02 08:12:20', 'تمت إضافة AssetAudit جديد باسم: admin'),
(403, 'إضافة', 'App\\Models\\AssetAudit', 13, 'معهد صناعي', 'admin', 'new', '2026-06-02 08:13:11', '2026-06-02 08:13:11', 'تمت إضافة AssetAudit جديد باسم: معهد صناعي'),
(404, 'تعديل', 'App\\Models\\AssetAudit', 13, 'معهد صناعي', 'admin', 'new', '2026-06-02 08:15:06', '2026-06-02 08:15:06', 'تم تعديل AssetAudit (معهد صناعي).\nالتغييرات:\n- الحقل [status] تغير من (In Progress) إلى (Completed).'),
(405, 'إضافة', 'App\\Models\\Maintenance', 33, '33', 'admin', NULL, '2026-06-02 08:22:19', '2026-06-02 08:22:19', 'تمت إضافة صيانة جديد باسم: 33'),
(406, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-06-02 08:22:19', '2026-06-02 08:22:19', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [maintenance_due_date] تغير من (2026-08-27) إلى (2026-09-02).\n- الحقل [last_maintenance_date] تغير من (2026-05-27) إلى (2026-06-02).'),
(407, 'إضافة', 'App\\Models\\Maintenance', 34, '34', 'admin', NULL, '2026-06-02 08:22:53', '2026-06-02 08:22:53', 'تمت إضافة صيانة جديد باسم: 34'),
(408, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-06-02 08:22:53', '2026-06-02 08:22:53', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [maintenance_due_date] تغير من (2026-08-27) إلى (2026-09-02).\n- الحقل [last_maintenance_date] تغير من (2026-05-27) إلى (2026-06-02).'),
(409, 'إضافة', 'App\\Models\\Maintenance', 35, '35', 'admin', NULL, '2026-06-02 08:23:16', '2026-06-02 08:23:16', 'تمت إضافة صيانة جديد باسم: 35'),
(410, 'تعديل', 'App\\Models\\MaintenanceRequest', 26, '26', 'admin', NULL, '2026-06-02 08:27:24', '2026-06-02 08:27:24', 'تم تعديل طلب صيانة (26).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(411, 'إضافة', 'App\\Models\\MaintenanceRequest', 27, '27', 'نظام (System)', NULL, '2026-06-02 08:27:33', '2026-06-02 08:27:33', 'تمت إضافة طلب صيانة جديد باسم: 27'),
(412, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'نظام (System)', 'new', '2026-06-02 08:27:33', '2026-06-02 08:27:33', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (في الصيانة).'),
(413, 'تعديل', 'App\\Models\\MaintenanceRequest', 27, '27', 'admin', NULL, '2026-06-02 08:28:25', '2026-06-02 08:28:25', 'تم تعديل طلب صيانة (27).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(414, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-06-02 08:28:25', '2026-06-02 08:28:25', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (في العهدة).'),
(415, 'إضافة', 'App\\Models\\AssetReplacementRequest', 1, '1', 'admin', NULL, '2026-06-02 08:32:31', '2026-06-02 08:32:31', 'تمت إضافة AssetReplacementRequest جديد باسم: 1'),
(416, 'تعديل', 'App\\Models\\AssetReplacementRequest', 1, '1', 'admin', NULL, '2026-06-02 08:32:44', '2026-06-02 08:32:44', 'تم تعديل AssetReplacementRequest (1).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (approved).\n- الحقل [approver_id] تغير من (فارغ) إلى (1).\n- الحقل [actioned_at] تغير من (فارغ) إلى (2026-06-02 11:32:44).'),
(417, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-06-02 08:32:44', '2026-06-02 08:32:44', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [is_personal] تغير من (0) إلى ().\n- الحقل [status] تغير من (متاح) إلى (تالف / مُكهّن).\n- الحقل [location_id] تغير من (فارغ) إلى (3).'),
(418, 'إضافة', 'App\\Models\\AssetReplacementRequest', 2, '2', 'admin', NULL, '2026-06-02 08:36:18', '2026-06-02 08:36:18', 'تمت إضافة AssetReplacementRequest جديد باسم: 2'),
(419, 'تعديل', 'App\\Models\\AssetReplacementRequest', 2, '2', 'admin', NULL, '2026-06-02 08:37:01', '2026-06-02 08:37:01', 'تم تعديل AssetReplacementRequest (2).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (approved).\n- الحقل [approver_id] تغير من (فارغ) إلى (1).\n- الحقل [actioned_at] تغير من (فارغ) إلى (2026-06-02 11:37:01).'),
(420, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-06-02 08:37:01', '2026-06-02 08:37:01', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [is_personal] تغير من (0) إلى ().\n- الحقل [location_id] تغير من (3) إلى (1).'),
(421, 'إضافة', 'App\\Models\\AssetReplacementRequest', 3, '3', 'admin', NULL, '2026-06-02 08:41:31', '2026-06-02 08:41:31', 'تمت إضافة AssetReplacementRequest جديد باسم: 3'),
(422, 'إضافة', 'App\\Models\\AssetReplacementRequest', 4, '4', 'admin', NULL, '2026-06-02 08:47:40', '2026-06-02 08:47:40', 'تمت إضافة AssetReplacementRequest جديد باسم: 4'),
(423, 'تعديل', 'App\\Models\\AssetReplacementRequest', 3, '3', 'admin', NULL, '2026-06-02 08:48:10', '2026-06-02 08:48:10', 'تم تعديل AssetReplacementRequest (3).\nالتغييرات:\n- الحقل [notes] تغير من (فارغ) إلى (ت).'),
(424, 'تعديل', 'App\\Models\\AssetReplacementRequest', 3, '3', 'admin', NULL, '2026-06-02 08:48:21', '2026-06-02 08:48:21', 'تم تعديل AssetReplacementRequest (3).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (approved).\n- الحقل [approver_id] تغير من (فارغ) إلى (1).\n- الحقل [actioned_at] تغير من (فارغ) إلى (2026-06-02 11:48:21).'),
(425, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-06-02 08:48:21', '2026-06-02 08:48:21', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [is_personal] تغير من (1) إلى ().\n- الحقل [status] تغير من (في العهدة) إلى (تالف / مُكهّن).\n- الحقل [employee_id] تغير من (2) إلى ().'),
(426, 'تعديل', 'App\\Models\\AssetHandover', 5, '5', 'admin', NULL, '2026-06-02 08:48:21', '2026-06-02 08:48:21', 'تم تعديل عهدة أصل (5).\nالتغييرات:\n- الحقل [returned_at] تغير من (فارغ) إلى (2026-06-02 11:48:21).\n- الحقل [condition_on_return] تغير من (فارغ) إلى (damaged).\n- الحقل [return_notes] تغير من (فارغ) إلى (تم استبدال الأصل ونقله بموجب طلب موافق عليه.).'),
(427, 'إضافة', 'App\\Models\\AssetReplacementRequest', 5, '5', 'admin', NULL, '2026-06-02 08:48:44', '2026-06-02 08:48:44', 'تمت إضافة AssetReplacementRequest جديد باسم: 5'),
(428, 'إضافة', 'App\\Models\\ExternalMaintenanceRequest', 7, '7', 'admin', NULL, '2026-06-02 10:07:59', '2026-06-02 10:07:59', 'تمت إضافة طلب صيانة خارجي جديد باسم: 7'),
(429, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 7, '7', 'admin', NULL, '2026-06-02 10:13:56', '2026-06-02 10:13:56', 'تم تعديل طلب صيانة خارجي (7).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (فارغ) إلى (50).\n- الحقل [status] تغير من (pending) إلى (approved).'),
(430, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 7, '7', 'admin', NULL, '2026-06-02 10:14:00', '2026-06-02 10:14:00', 'تم تعديل طلب صيانة خارجي (7).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (50.00) إلى (50).\n- الحقل [status] تغير من (approved) إلى (completed).'),
(431, 'إضافة', 'App\\Models\\AssetAudit', 14, 'l', 'admin', 'test', '2026-06-02 10:15:28', '2026-06-02 10:15:28', 'تمت إضافة AssetAudit جديد باسم: l'),
(432, 'تعديل', 'App\\Models\\Asset', 19, 'phone', 'admin', 'test', '2026-06-02 10:16:20', '2026-06-02 10:16:20', 'تم تعديل أصل (phone).\nالتغييرات:\n- الحقل [location_id] تغير من (فارغ) إلى (3).'),
(433, 'تعديل', 'App\\Models\\AssetAudit', 12, 'admin', 'admin', 'test', '2026-06-02 10:17:19', '2026-06-02 10:17:19', 'تم تعديل AssetAudit (admin).\nالتغييرات:\n- الحقل [status] تغير من (In Progress) إلى (Completed).'),
(434, 'تعديل', 'App\\Models\\Notification', 42, '42', 'admin', NULL, '2026-06-02 10:17:47', '2026-06-02 10:17:47', 'تم تعديل Notification (42).\nالتغييرات:\n- الحقل [is_read] تغير من (0) إلى (1).'),
(435, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'admin', 'new', '2026-06-03 08:10:55', '2026-06-03 08:10:55', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [position] تغير من (office_manager) إلى (purchasing_agent).'),
(436, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-03 08:11:43', '2026-06-03 08:11:43', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (a88bf4b5d7d8e0649c73fe5c09a1b7d28321b4efe6ffacc84c38aa11b7fbd729) إلى (59ef96535125d16c77d0c0560fec1e5931205fba8bbd2c9fefcaa559aec1dc38).'),
(437, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-03 08:23:14', '2026-06-03 08:23:14', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (59ef96535125d16c77d0c0560fec1e5931205fba8bbd2c9fefcaa559aec1dc38) إلى (400cab376230a52750ce79f7bc55cebf66caf368c4a5f12fceb5f8a17e6c9c0d).'),
(438, 'تعديل', 'App\\Models\\User', 1, 'admin', 'admin', NULL, '2026-06-03 08:26:40', '2026-06-03 08:26:40', 'تم تعديل مستخدم (admin).\nالتغييرات:\n- الحقل [remember_token] تغير من (iHA19jPjvmjTwRin1em6P5Dadk8CDqAtdUHTRUGPHaNgyuEVhluWiabL2Wfv) إلى (YUqVLGk0x1lWshsSp3VSvmtFieY0JmE6w80iJ48L5Xv3F9rDAKaoGseFHgmc).'),
(439, 'إضافة', 'App\\Models\\AssetReplacementRequest', 6, '6', 'admin', NULL, '2026-06-03 08:35:40', '2026-06-03 08:35:40', 'تمت إضافة AssetReplacementRequest جديد باسم: 6'),
(440, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-03 08:41:51', '2026-06-03 08:41:51', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$4TXryBgGnbECgjsn1Rdg6OylN7s3WMMhMidRnX6CUlc7mYPQRnf.i) إلى ($2y$12$okfTqTIBUSkgPqikDSMHc.5NEiox0C6eW9dWttmErhe6JLNu9/R2.).'),
(441, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-03 08:42:07', '2026-06-03 08:42:07', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (400cab376230a52750ce79f7bc55cebf66caf368c4a5f12fceb5f8a17e6c9c0d) إلى (d1875437b442e166171b78d87bfba954a88e5c5d79fdfe600595c6f7b6a9da12).'),
(442, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 2, '2', 'نظام (System)', NULL, '2026-06-03 08:42:44', '2026-06-03 08:42:44', 'تم تعديل طلب صيانة خارجي (2).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (500.00) إلى (750).\n- الحقل [status] تغير من (pending) إلى (approved).\n- الحقل [admin_note] تغير من (فارغ) إلى (تم الموافقة على الصيانة الخارجية).'),
(443, 'تعديل', 'App\\Models\\Employee', 1, 'سامر', 'نظام (System)', 'new', '2026-06-03 08:42:55', '2026-06-03 08:42:55', 'تم تعديل موظف (سامر).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$8ldgG0a46/XSigkphr8hiOViNvdB3BHmYa8yIZe5FqHU3fji3lq.O) إلى ($2y$12$ad7205/0/UDx5rDwYWbsJOwOkdcvdnH2nAJgtlxBR0B.cdeJy9euS).'),
(444, 'تعديل', 'App\\Models\\Employee', 1, 'سامر', 'نظام (System)', 'new', '2026-06-03 08:43:09', '2026-06-03 08:43:09', 'تم تعديل موظف (سامر).\nالتغييرات:\n- الحقل [api_token] تغير من (hv85hW0deEhgbhQ9tCrY6WxAKxFoChtfunRnwMo6zQ7zMrzV8CpEQprRmYNG) إلى (2073cf450e994aca1c7c9e6f86d6159a13f5b937a5cda8bb1d42e6256a394ef7).'),
(445, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'admin', 'new', '2026-06-03 08:49:03', '2026-06-03 08:49:03', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$okfTqTIBUSkgPqikDSMHc.5NEiox0C6eW9dWttmErhe6JLNu9/R2.) إلى ($2y$12$Al398wCQ1r4/s7iGaRyEjez.ezZe5pNr3msG0Yejqv8N5FM1QU9my).'),
(446, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-03 08:49:11', '2026-06-03 08:49:11', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (d1875437b442e166171b78d87bfba954a88e5c5d79fdfe600595c6f7b6a9da12) إلى (90f661817130b3b3bd7850c10e29a12199036bbfc783117ffaf34e175d0901e7).'),
(447, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-03 08:49:36', '2026-06-03 08:49:36', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (90f661817130b3b3bd7850c10e29a12199036bbfc783117ffaf34e175d0901e7) إلى ().'),
(448, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-03 08:49:58', '2026-06-03 08:49:58', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (فارغ) إلى (7b480b9bdf95aab17c7b808e959415c278a5e539cf9025bc490fb2228fb03984).'),
(449, 'إضافة', 'App\\Models\\MaintenanceRequest', 28, '28', 'نظام (System)', NULL, '2026-06-03 08:51:00', '2026-06-03 08:51:00', 'تمت إضافة طلب صيانة جديد باسم: 28'),
(450, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'نظام (System)', 'new', '2026-06-03 08:51:00', '2026-06-03 08:51:00', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (تالف / مُكهّن) إلى (في الصيانة).'),
(451, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'admin', 'new', '2026-06-03 08:53:21', '2026-06-03 08:53:21', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [employee_id] تغير من (فارغ) إلى (2).'),
(452, 'تعديل', 'App\\Models\\Employee', 1, 'سامر', 'admin', 'new', '2026-06-03 09:00:36', '2026-06-03 09:00:36', 'تم تعديل موظف (سامر).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$ad7205/0/UDx5rDwYWbsJOwOkdcvdnH2nAJgtlxBR0B.cdeJy9euS) إلى ($2y$12$qPJx1Ub9AVdh8DUISYb1wuL.qTQGZifG7mRooQNrJdTMvBhsV8g8S).'),
(453, 'تعديل', 'App\\Models\\Employee', 1, 'سامر', 'نظام (System)', 'new', '2026-06-03 09:00:45', '2026-06-03 09:00:45', 'تم تعديل موظف (سامر).\nالتغييرات:\n- الحقل [api_token] تغير من (2073cf450e994aca1c7c9e6f86d6159a13f5b937a5cda8bb1d42e6256a394ef7) إلى (ef463c5bd3299334785a9412029c1006bd0ba9d7747ba28eba4daacde9f10557).'),
(454, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 7, '7', 'admin', NULL, '2026-06-03 09:05:09', '2026-06-03 09:05:09', 'تم تعديل طلب صيانة خارجي (7).\nالتغييرات:\n- الحقل [required_parts] تغير من (nkl\n\n) إلى (nkl\nئئ\n).'),
(455, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-06-03 09:06:01', '2026-06-03 09:06:01', 'تم تعديل طلب صيانة خارجي (3).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (10000.00) إلى (50).\n- الحقل [status] تغير من (completed) إلى (approved).\n- الحقل [rejection_reason] تغير من (فارغ) إلى (string).\n- الحقل [admin_note] تغير من (فارغ) إلى (456).'),
(456, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-06-03 09:07:10', '2026-06-03 09:07:10', 'تم تعديل طلب صيانة خارجي (3).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (50.00) إلى (50).\n- الحقل [status] تغير من (approved) إلى (completed).'),
(457, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-06-03 09:07:17', '2026-06-03 09:07:17', 'تم تعديل طلب صيانة خارجي (3).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (50.00) إلى (50).\n- الحقل [status] تغير من (completed) إلى (rejected).'),
(458, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-06-03 09:07:21', '2026-06-03 09:07:21', 'تم تعديل طلب صيانة خارجي (3).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (50.00) إلى (50).\n- الحقل [rejection_reason] تغير من (string) إلى (4).'),
(459, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 3, '3', 'نظام (System)', NULL, '2026-06-03 09:07:39', '2026-06-03 09:07:39', 'تم تعديل طلب صيانة خارجي (3).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (50.00) إلى (50).\n- الحقل [status] تغير من (rejected) إلى (approved).'),
(460, 'تعديل', 'App\\Models\\AssetReplacementRequest', 6, '6', 'نظام (System)', NULL, '2026-06-03 09:26:58', '2026-06-03 09:26:58', 'تم تعديل AssetReplacementRequest (6).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (approved).\n- الحقل [approver_employee_id] تغير من (فارغ) إلى (2).\n- الحقل [actioned_at] تغير من (فارغ) إلى (2026-06-03 12:26:58).'),
(461, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'new', '2026-06-03 09:26:58', '2026-06-03 09:26:58', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [is_personal] تغير من (1) إلى ().\n- الحقل [status] تغير من (في العهدة) إلى (تالف / مُكهّن).\n- الحقل [employee_id] تغير من (2) إلى ().\n- الحقل [location_id] تغير من (2) إلى (1).'),
(462, 'تعديل', 'App\\Models\\AssetHandover', 3, '3', 'نظام (System)', NULL, '2026-06-03 09:26:58', '2026-06-03 09:26:58', 'تم تعديل عهدة أصل (3).\nالتغييرات:\n- الحقل [returned_at] تغير من (فارغ) إلى (2026-06-03 12:26:58).\n- الحقل [condition_on_return] تغير من (فارغ) إلى (damaged).\n- الحقل [return_notes] تغير من (فارغ) إلى (تم استبدال الأصل ونقله بموجب طلب موافق عليه.).'),
(463, 'تعديل', 'App\\Models\\AssetReplacementRequest', 5, '5', 'نظام (System)', NULL, '2026-06-03 09:27:49', '2026-06-03 09:27:49', 'تم تعديل AssetReplacementRequest (5).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (rejected).\n- الحقل [approver_employee_id] تغير من (فارغ) إلى (2).\n- الحقل [rejection_reason] تغير من (فارغ) إلى (st545ring).\n- الحقل [actioned_at] تغير من (فارغ) إلى (2026-06-03 12:27:49).'),
(464, 'تعديل', 'App\\Models\\MaintenanceRequest', 28, '28', 'admin', NULL, '2026-06-04 08:12:44', '2026-06-04 08:12:44', 'تم تعديل طلب صيانة (28).\nالتغييرات:\n- الحقل [status] تغير من (pending) إلى (completed).'),
(465, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-06-04 08:12:44', '2026-06-04 08:12:44', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (في الصيانة) إلى (متاح).\n- الحقل [maintenance_due_date] تغير من (2026-09-02) إلى (2026-09-04).\n- الحقل [last_maintenance_date] تغير من (2026-06-02) إلى (2026-06-04).'),
(466, 'إضافة', 'App\\Models\\AssetHandover', 10, '10', 'admin', NULL, '2026-06-04 08:13:04', '2026-06-04 08:13:04', 'تمت إضافة عهدة أصل جديد باسم: 10'),
(467, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-06-04 08:13:04', '2026-06-04 08:13:04', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في العهدة).\n- الحقل [employee_id] تغير من (فارغ) إلى (2).'),
(468, 'إضافة', 'App\\Models\\AssetHandover', 11, '11', 'admin', NULL, '2026-06-04 08:13:46', '2026-06-04 08:13:46', 'تمت إضافة عهدة أصل جديد باسم: 11'),
(469, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-06-04 08:13:46', '2026-06-04 08:13:46', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (متاح).\n- الحقل [employee_id] تغير من (2) إلى ().'),
(470, 'إضافة', 'App\\Models\\AssetHandover', 12, '12', 'admin', NULL, '2026-06-04 08:18:58', '2026-06-04 08:18:58', 'تمت إضافة عهدة أصل جديد باسم: 12'),
(471, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-06-04 08:18:58', '2026-06-04 08:18:58', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في العهدة).\n- الحقل [employee_id] تغير من (فارغ) إلى (2).'),
(472, 'إضافة', 'App\\Models\\AssetHandover', 13, '13', 'admin', NULL, '2026-06-04 08:19:35', '2026-06-04 08:19:35', 'تمت إضافة عهدة أصل جديد باسم: 13'),
(473, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-06-04 08:19:35', '2026-06-04 08:19:35', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (في العهدة) إلى (متاح).\n- الحقل [employee_id] تغير من (2) إلى ().'),
(474, 'تعديل', 'App\\Models\\MaintenanceRequest', 28, '28', 'admin', NULL, '2026-06-08 09:51:07', '2026-06-08 09:51:07', 'تم تعديل طلب صيانة (28).\nالتغييرات:\n- الحقل [status] تغير من (completed) إلى (pending).'),
(475, 'تعديل', 'App\\Models\\Asset', 24, 'lenove-e456', 'admin', 'new', '2026-06-08 09:51:08', '2026-06-08 09:51:08', 'تم تعديل أصل (lenove-e456).\nالتغييرات:\n- الحقل [status] تغير من (متاح) إلى (في الصيانة).'),
(476, 'إضافة', 'App\\Models\\Location', 4, 'ي', 'admin', NULL, '2026-06-08 10:08:57', '2026-06-08 10:08:57', 'تمت إضافة موقع جديد باسم: ي'),
(477, 'إضافة', 'App\\Models\\Location', 5, 'd', 'admin', NULL, '2026-06-08 10:14:33', '2026-06-08 10:14:33', 'تمت إضافة موقع جديد باسم: d'),
(478, 'تعديل', 'App\\Models\\Location', 2, 'الشقة ', 'admin', NULL, '2026-06-08 10:16:57', '2026-06-08 10:16:57', 'تم تعديل موقع (الشقة ).\nالتغييرات:\n- الحقل [name] تغير من (الدور الثاني قسم c) إلى (الشقة ).'),
(479, 'تعديل', 'App\\Models\\Location', 2, 'الشقة 2', 'admin', NULL, '2026-06-08 10:17:00', '2026-06-08 10:17:00', 'تم تعديل موقع (الشقة 2).\nالتغييرات:\n- الحقل [name] تغير من (الشقة ) إلى (الشقة 2).'),
(480, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-09 07:54:33', '2026-06-09 07:54:33', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (7b480b9bdf95aab17c7b808e959415c278a5e539cf9025bc490fb2228fb03984) إلى (dc54ab9569ae45d35e0ea25ceaf64005596c0bfbd699ac9746c790dcd76b575f).'),
(481, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'admin', 'new', '2026-06-09 07:54:44', '2026-06-09 07:54:44', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$Al398wCQ1r4/s7iGaRyEjez.ezZe5pNr3msG0Yejqv8N5FM1QU9my) إلى ($2y$12$2/P4bQBuArt0km1S7wpXVOG4rzvB.zcb4zLLI.tIn/y3MzFkgzsCS).\n- الحقل [position] تغير من (purchasing_agent) إلى (office_manager).'),
(482, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-09 07:54:48', '2026-06-09 07:54:48', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (dc54ab9569ae45d35e0ea25ceaf64005596c0bfbd699ac9746c790dcd76b575f) إلى (3f11e33628193db13483d85b8eb4c6c9019bf699207988b540531a217786290f).'),
(483, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'admin', 'new', '2026-06-09 07:55:03', '2026-06-09 07:55:03', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$2/P4bQBuArt0km1S7wpXVOG4rzvB.zcb4zLLI.tIn/y3MzFkgzsCS) إلى ($2y$12$wQXEeIrHQnYlJXvVL4cJW.VOpLUwxl8.tun5Qt.iUjpmonvDlRMRe).\n- الحقل [position] تغير من (office_manager) إلى (employee).'),
(484, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-09 07:55:06', '2026-06-09 07:55:06', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (3f11e33628193db13483d85b8eb4c6c9019bf699207988b540531a217786290f) إلى (c11e817b27d2cd8bb6134f968e6254320cd0ccff12c973901d953aa2a1da22c4).'),
(485, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'admin', 'new', '2026-06-09 07:57:28', '2026-06-09 07:57:28', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$wQXEeIrHQnYlJXvVL4cJW.VOpLUwxl8.tun5Qt.iUjpmonvDlRMRe) إلى ($2y$12$kPBiBLEnbnmDVuaejsnlX.wC/GgRg5BzjRxBpSJbsTVM7vnajt9S6).\n- الحقل [position] تغير من (employee) إلى (office_manager).'),
(486, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'admin', 'new', '2026-06-09 07:57:37', '2026-06-09 07:57:37', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$kPBiBLEnbnmDVuaejsnlX.wC/GgRg5BzjRxBpSJbsTVM7vnajt9S6) إلى ($2y$12$kLI5.uxkRLjsrH0Ar4gIA.V9gyBFIgXO42zQvETx3TG7EaeumJu.2).\n- الحقل [position] تغير من (office_manager) إلى (purchasing_agent).'),
(487, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 7, '7', 'admin', NULL, '2026-06-14 07:27:06', '2026-06-14 07:27:06', 'تم تعديل طلب صيانة خارجي (7).\nالتغييرات:\n- الحقل [currency] تغير من (فارغ) إلى (SAR).'),
(488, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-14 07:28:10', '2026-06-14 07:28:10', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (c11e817b27d2cd8bb6134f968e6254320cd0ccff12c973901d953aa2a1da22c4) إلى (a5edceedb6183a69967a7b2ac0a80dff7a98dca07a6c6ee28876c23fee2769cc).'),
(489, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-14 07:30:54', '2026-06-14 07:30:54', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (a5edceedb6183a69967a7b2ac0a80dff7a98dca07a6c6ee28876c23fee2769cc) إلى (a4b73bfc95d20395c5c69fbf2765786bb040ee8dfb5d179c13c5febb0857b44b).'),
(490, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 6, '6', 'نظام (System)', NULL, '2026-06-14 07:31:32', '2026-06-14 07:31:32', 'تم تعديل طلب صيانة خارجي (6).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (فارغ) إلى (0).\n- الحقل [currency] تغير من (فارغ) إلى (YER).\n- الحقل [status] تغير من (completed) إلى (pending).\n- الحقل [rejection_reason] تغير من (فارغ) إلى (string).\n- الحقل [admin_note] تغير من (فارغ) إلى (string).'),
(491, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 6, '6', 'نظام (System)', NULL, '2026-06-14 07:35:10', '2026-06-14 07:35:10', 'تم تعديل طلب صيانة خارجي (6).\nالتغييرات:\n- الحقل [estimated_amount] تغير من (0.00) إلى (44).\n- الحقل [currency] تغير من (YER) إلى (EUR).'),
(492, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-14 11:19:47', '2026-06-14 11:19:47', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$kLI5.uxkRLjsrH0Ar4gIA.V9gyBFIgXO42zQvETx3TG7EaeumJu.2) إلى ($2y$12$N8MAj8gVcCdb/BEL.1WSquHwGWc872gb8S88ZCDl8eUduq5/m1FRK).'),
(493, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'admin', 'new', '2026-06-14 11:21:27', '2026-06-14 11:21:27', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$N8MAj8gVcCdb/BEL.1WSquHwGWc872gb8S88ZCDl8eUduq5/m1FRK) إلى ($2y$12$SM4LkrCuffyz8dAuVF6Ov.XPlB3pjn7t1337CKIme6G7VO5wMc73G).'),
(494, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-14 11:21:30', '2026-06-14 11:21:30', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (a4b73bfc95d20395c5c69fbf2765786bb040ee8dfb5d179c13c5febb0857b44b) إلى (47e151410d784366137bc10574697945f0b459e4ac814d03048d75be3d906618).'),
(495, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-14 11:21:51', '2026-06-14 11:21:51', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (47e151410d784366137bc10574697945f0b459e4ac814d03048d75be3d906618) إلى (4c98aa706d63b08f772c090f625ac958955338f58bcb900be25b1a76020eefbd).'),
(496, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-14 11:22:01', '2026-06-14 11:22:01', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$SM4LkrCuffyz8dAuVF6Ov.XPlB3pjn7t1337CKIme6G7VO5wMc73G) إلى ($2y$12$cbLN6G1Tn0foqyiq6a87kOm3a6S3M8i/X550KkTjw4B2tbxsWyBp.).'),
(497, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'admin', 'new', '2026-06-14 11:25:18', '2026-06-14 11:25:18', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$cbLN6G1Tn0foqyiq6a87kOm3a6S3M8i/X550KkTjw4B2tbxsWyBp.) إلى ($2y$12$tniJQZJHFxkj0LEseI/KQe.3xqQ6dBYG2kHkMoVQMACnOAw4asOGO).'),
(498, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-14 11:25:26', '2026-06-14 11:25:26', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (4c98aa706d63b08f772c090f625ac958955338f58bcb900be25b1a76020eefbd) إلى (4958ef835b5ea0f5994359738991f6874a8a25b05b79511e0dbeefc1713e4c42).'),
(499, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-14 11:25:44', '2026-06-14 11:25:44', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$tniJQZJHFxkj0LEseI/KQe.3xqQ6dBYG2kHkMoVQMACnOAw4asOGO) إلى ($2y$12$KZnxWefWSiEr/lpRBUT8..R2diPLEM0tHTnoZrC/sW/4IRKqxd9yq).'),
(500, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-14 11:26:43', '2026-06-14 11:26:43', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (4958ef835b5ea0f5994359738991f6874a8a25b05b79511e0dbeefc1713e4c42) إلى (d970b9b5780f3baf2943d50ccd2cd8894b75c87f4e83617055572efd16c80765).'),
(501, 'تعديل', 'App\\Models\\User', 1, 'admin', 'نظام (System)', NULL, '2026-06-18 07:29:17', '2026-06-18 07:29:17', 'تم تعديل مستخدم (admin).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$xTL4uGvSAouvssK.pummJuHWMTskQm.ORfQ2Ahynp4A8J9sMap3Vy) إلى ($2y$12$kumw32iB/.GlSX2KVmKZJ.wyfq7rpYut7Ln3POn6t8kY3uUrgQR2m).\n- الحقل [remember_token] تغير من (YUqVLGk0x1lWshsSp3VSvmtFieY0JmE6w80iJ48L5Xv3F9rDAKaoGseFHgmc) إلى (MX6Xnl5mMunQ2OPkkMq79wbgNyrzk4RS4FJJI5jY1ewgMGEsFRMKYCNAc8Co).'),
(502, 'تعديل', 'App\\Models\\ExternalMaintenanceRequest', 7, '7', 'admin', NULL, '2026-06-18 07:33:53', '2026-06-18 07:33:53', 'تم تعديل طلب صيانة خارجي (7).\nالتغييرات:\n- الحقل [status] تغير من (completed) إلى (pending).'),
(503, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'admin', 'new', '2026-06-18 07:36:20', '2026-06-18 07:36:20', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [password] تغير من ($2y$12$KZnxWefWSiEr/lpRBUT8..R2diPLEM0tHTnoZrC/sW/4IRKqxd9yq) إلى ($2y$12$iHuV4dncwJBarhKPnqmy3O3fJt.80OFK7Nz9QdSIssN6VBOt2IC/C).'),
(504, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-18 07:36:40', '2026-06-18 07:36:40', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (d970b9b5780f3baf2943d50ccd2cd8894b75c87f4e83617055572efd16c80765) إلى (6aa5da8e4bdc2c9d2785c1468d6fdd51a4fb77b34a98ff301d975b8316bafd35).'),
(505, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'new', '2026-06-18 07:37:05', '2026-06-18 07:37:05', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (6aa5da8e4bdc2c9d2785c1468d6fdd51a4fb77b34a98ff301d975b8316bafd35) إلى (06049dc42ba995685e27576f9b31fbf8af6fd105e882e166259a692d9da63d45).'),
(506, 'إضافة', 'App\\Models\\MaintenanceRequest', 29, '29', 'نظام (System)', NULL, '2026-06-18 07:37:50', '2026-06-18 07:37:50', 'تمت إضافة طلب صيانة جديد باسم: 29'),
(507, 'تعديل', 'App\\Models\\Asset', 26, 'd', 'نظام (System)', 'new', '2026-06-18 07:37:50', '2026-06-18 07:37:50', 'تم تعديل أصل (d).\nالتغييرات:\n- الحقل [status] تغير من (تالف / مُكهّن) إلى (في الصيانة).'),
(508, 'إضافة', 'App\\Models\\ExternalMaintenanceRequest', 8, '8', 'admin', NULL, '2026-06-18 08:02:09', '2026-06-18 08:02:09', 'تمت إضافة طلب صيانة خارجي جديد باسم: 8'),
(509, 'تعديل', 'App\\Models\\Sector', 1, 'النظم و المعلومات ', 'admin', NULL, '2026-06-18 08:13:58', '2026-06-18 08:13:58', 'تم تعديل قطاع (النظم و المعلومات ).\nالتغييرات:\n- الحقل [name] تغير من (45) إلى (النظم و المعلومات ).'),
(510, 'تعديل', 'App\\Models\\Administration', 1, 'النظم', 'admin', NULL, '2026-06-18 08:14:13', '2026-06-18 08:14:13', 'تم تعديل إدارة عليا (النظم).\nالتغييرات:\n- الحقل [name] تغير من (5) إلى (النظم).'),
(511, 'تعديل', 'App\\Models\\Department', 3, 'تقنيه المعلومات', 'admin', NULL, '2026-06-18 08:14:43', '2026-06-18 08:14:43', 'تم تعديل إدارة (تقنيه المعلومات).\nالتغييرات:\n- الحقل [name] تغير من (new) إلى (تقنيه المعلومات).'),
(512, 'تعديل', 'App\\Models\\Administration', 1, 'ادارة العلاقات العامة و الاعلام', 'admin', NULL, '2026-06-18 08:14:58', '2026-06-18 08:14:58', 'تم تعديل إدارة عليا (ادارة العلاقات العامة و الاعلام).\nالتغييرات:\n- الحقل [name] تغير من (النظم) إلى (ادارة العلاقات العامة و الاعلام).'),
(513, 'إضافة', 'App\\Models\\AssetReplacementRequest', 7, '7', 'admin', NULL, '2026-06-18 08:17:52', '2026-06-18 08:17:52', 'تمت إضافة AssetReplacementRequest جديد باسم: 7'),
(514, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'admin', 'تقنيه المعلومات', '2026-06-23 10:57:28', '2026-06-23 10:57:28', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [employee_id] تغير من (فارغ) إلى (1).');
INSERT INTO `activity_logs` (`id`, `action`, `model_type`, `model_id`, `model_name`, `user_name`, `department_name`, `created_at`, `updated_at`, `description`) VALUES
(515, 'تعديل', 'App\\Models\\Employee', 2, 'حسام', 'نظام (System)', 'تقنيه المعلومات', '2026-06-23 10:57:53', '2026-06-23 10:57:53', 'تم تعديل موظف (حسام).\nالتغييرات:\n- الحقل [api_token] تغير من (06049dc42ba995685e27576f9b31fbf8af6fd105e882e166259a692d9da63d45) إلى (6d7e1eae1d4e17d3afc3e91ad12c5405081f7c0a44981cf33ccde4d6f6443fea).'),
(516, 'إضافة', 'App\\Models\\MaintenanceRequest', 30, '30', 'نظام (System)', NULL, '2026-06-23 10:58:25', '2026-06-23 10:58:25', 'تمت إضافة طلب صيانة جديد باسم: 30'),
(517, 'تعديل', 'App\\Models\\Asset', 27, 'Osama Ahmedي', 'نظام (System)', 'تقنيه المعلومات', '2026-06-23 10:58:25', '2026-06-23 10:58:25', 'تم تعديل أصل (Osama Ahmedي).\nالتغييرات:\n- الحقل [status] تغير من (تالف / مُكهّن) إلى (في الصيانة).');

-- --------------------------------------------------------

--
-- Table structure for table `administrations`
--

CREATE TABLE `administrations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrations`
--

INSERT INTO `administrations` (`id`, `name`, `sector_id`, `created_at`, `updated_at`) VALUES
(1, 'ادارة العلاقات العامة و الاعلام', 1, '2026-05-11 08:37:46', '2026-06-18 08:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_branch`
--

CREATE TABLE `admin_branch` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_type_id` bigint UNSIGNED DEFAULT NULL,
  `is_personal` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'متاح',
  `purchase_date` date NOT NULL,
  `maintenance_due_date` date DEFAULT NULL,
  `maintenance_cycle_months` int NOT NULL DEFAULT '3',
  `last_maintenance_date` date DEFAULT NULL,
  `maintenance_interval_months` int UNSIGNED NOT NULL DEFAULT '3',
  `price` decimal(10,2) NOT NULL,
  `salvage_value` decimal(10,2) DEFAULT NULL,
  `useful_life_years` int DEFAULT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `maintenance_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'جيدة',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_id` bigint UNSIGNED DEFAULT NULL,
  `location_id` bigint UNSIGNED DEFAULT NULL,
  `warranty_months` int DEFAULT NULL,
  `warranty_start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `asset_type_id`, `is_personal`, `status`, `purchase_date`, `maintenance_due_date`, `maintenance_cycle_months`, `last_maintenance_date`, `maintenance_interval_months`, `price`, `salvage_value`, `useful_life_years`, `serial_number`, `department_id`, `employee_id`, `maintenance_status`, `created_at`, `updated_at`, `vendor_id`, `location_id`, `warranty_months`, `warranty_start_date`) VALUES
(19, 'phone', 1, 1, 'في العهدة', '2025-07-22', '2026-08-27', 3, '2026-05-27', 3, 5000.00, NULL, NULL, 'ASSET-687FB77CDDE08', 2, 1, 'جيدة', '2025-07-22 13:08:28', '2026-06-02 10:16:20', NULL, 3, NULL, NULL),
(22, '7', NULL, 0, 'متاح', '2026-04-18', '2026-04-21', 1, '2026-04-18', 3, 50.00, NULL, NULL, 'ASSET-69E36EA9E3AD3', 1, NULL, 'جيدة', '2026-04-18 08:44:41', '2026-04-18 09:03:16', NULL, NULL, NULL, NULL),
(23, 'Osama Ahmed', 1, 1, 'في العهدة', '2026-04-18', '2027-02-27', 9, '2026-05-27', 3, 864.00, NULL, NULL, 'ASSET-69E36FE3069AA', 3, 2, 'جيدة', '2026-04-18 08:49:55', '2026-05-27 09:08:11', NULL, NULL, NULL, NULL),
(24, 'lenove-e456', 1, 0, 'في الصيانة', '2026-04-18', '2026-09-04', 3, '2026-06-04', 3, 5.00, NULL, NULL, 'ASSET-69E3743262318', 3, NULL, 'جيدة', '2026-04-18 09:08:18', '2026-06-08 09:51:08', NULL, 1, NULL, NULL),
(26, 'd', 1, 0, 'في الصيانة', '2026-05-13', '2026-09-02', 3, '2026-06-02', 3, 5.00, NULL, 10, 'ASSET-6A047EBAA127A', 3, 2, 'جيدة', '2026-05-13 10:38:02', '2026-06-18 07:37:50', 1, 3, 20, '2026-05-19'),
(27, 'Osama Ahmedي', 1, 0, 'في الصيانة', '2026-05-26', '2026-08-27', 3, '2026-05-27', 3, 500.00, NULL, 9, 'ASSET-6A16014A217B4', 3, 1, 'جيدة', '2026-05-26 17:23:38', '2026-06-23 10:58:25', 1, 1, 1, '2018-05-10'),
(28, 'admin', 1, 1, 'في العهدة', '2026-05-26', '2026-08-27', 3, '2026-05-27', 3, 500.00, 545.00, 3, 'ASSET-6A1623A36B5D9', 3, 1, 'جيدة', '2026-05-26 19:50:11', '2026-05-27 13:36:36', 1, 3, 5, '2026-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `asset_audits`
--

CREATE TABLE `asset_audits` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audit_date` date NOT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `location_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Progress',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_audits`
--

INSERT INTO `asset_audits` (`id`, `name`, `audit_date`, `department_id`, `location_id`, `user_id`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'الدور الرابع', '2026-05-26', NULL, 2, 1, 'Completed', 'ي', '2026-05-26 20:21:56', '2026-05-26 20:21:56'),
(2, 'Osama Ahmed', '2026-05-26', NULL, 3, 1, 'Completed', NULL, '2026-05-26 20:26:31', '2026-05-26 20:27:01'),
(3, 'Osama Ahmed', '2026-05-27', NULL, 3, 1, 'Completed', NULL, '2026-05-26 20:28:25', '2026-05-26 20:34:24'),
(4, 'ي', '2026-05-26', NULL, 3, 1, 'Completed', NULL, '2026-05-26 20:34:44', '2026-05-26 20:36:12'),
(5, NULL, '2026-05-26', NULL, 2, 1, 'Completed', NULL, '2026-05-26 20:36:23', '2026-05-26 20:36:56'),
(6, NULL, '2026-05-26', NULL, 3, 1, 'In Progress', NULL, '2026-05-26 20:42:44', '2026-05-26 20:42:44'),
(7, 'l', '2026-06-02', NULL, 1, 1, 'In Progress', NULL, '2026-06-02 07:05:52', '2026-06-02 07:05:52'),
(8, 'k', '2026-06-02', NULL, 2, 1, 'In Progress', NULL, '2026-06-02 07:40:23', '2026-06-02 07:40:23'),
(9, 's', '2026-06-02', NULL, 1, 1, 'In Progress', NULL, '2026-06-02 07:40:48', '2026-06-02 07:40:48'),
(10, NULL, '2026-06-02', NULL, 3, 1, 'Completed', NULL, '2026-06-02 07:40:59', '2026-06-02 07:44:17'),
(11, 'l\';l\'', '2026-06-02', NULL, 3, 1, 'In Progress', NULL, '2026-06-02 07:45:02', '2026-06-02 07:45:02'),
(12, 'admin', '2026-06-02', 2, 3, 1, 'Completed', 'ف', '2026-06-02 08:12:20', '2026-06-02 10:17:19'),
(13, 'معهد صناعي', '2026-06-02', 3, 3, 1, 'Completed', 'ؤ', '2026-06-02 08:13:11', '2026-06-02 08:15:06'),
(14, 'l', '2026-06-02', 2, 3, 1, 'Completed', 'l', '2026-06-02 10:15:28', '2026-06-02 10:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `asset_audit_items`
--

CREATE TABLE `asset_audit_items` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_audit_id` bigint UNSIGNED NOT NULL,
  `asset_id` bigint UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scanned_serial_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_audit_items`
--

INSERT INTO `asset_audit_items` (`id`, `asset_audit_id`, `asset_id`, `status`, `scanned_serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 27, 'Missing', NULL, '2026-05-26 20:21:56', '2026-05-26 20:21:56'),
(2, 2, 26, 'Found', 'ASSET-6A047EBAA127A', '2026-05-26 20:26:31', '2026-05-26 20:26:51'),
(3, 2, 28, 'Found', 'ASSET-6A1623A36B5D9', '2026-05-26 20:26:31', '2026-05-26 20:26:57'),
(4, 3, 26, 'Missing', NULL, '2026-05-26 20:28:25', '2026-05-26 20:28:25'),
(5, 3, 28, 'Missing', NULL, '2026-05-26 20:28:25', '2026-05-26 20:28:25'),
(6, 4, 26, 'Found', 'ASSET-6A047EBAA127A', '2026-05-26 20:34:44', '2026-05-26 20:35:54'),
(7, 4, 28, 'Found', 'ASSET-6A1623A36B5D9', '2026-05-26 20:34:44', '2026-05-26 20:36:04'),
(8, 5, 27, 'Found', 'ASSET-6A16014A217B4', '2026-05-26 20:36:23', '2026-05-26 20:36:48'),
(9, 5, 28, 'Misplaced', 'ASSET-6A1623A36B5D9', '2026-05-26 20:36:33', '2026-05-26 20:36:33'),
(10, 6, 26, 'Found', 'ASSET-6A047EBAA127A', '2026-05-26 20:42:44', '2026-05-27 08:27:15'),
(11, 6, 28, 'Found', 'ASSET-6A1623A36B5D9', '2026-05-26 20:42:44', '2026-06-02 07:06:52'),
(12, 8, 27, 'Missing', NULL, '2026-06-02 07:40:23', '2026-06-02 07:40:23'),
(13, 10, 28, 'Missing', NULL, '2026-06-02 07:40:59', '2026-06-02 07:40:59'),
(14, 11, 26, 'Missing', NULL, '2026-06-02 07:45:02', '2026-06-02 07:45:02'),
(15, 11, 28, 'Missing', NULL, '2026-06-02 07:45:02', '2026-06-02 07:45:02'),
(16, 13, 26, 'Found', 'ASSET-6A047EBAA127A', '2026-06-02 08:13:11', '2026-06-02 08:14:58'),
(17, 13, 28, 'Found', 'ASSET-6A1623A36B5D9', '2026-06-02 08:13:11', '2026-06-02 08:14:21'),
(18, 12, 22, 'Found', 'ASSET-69E36EA9E3AD3', '2026-06-02 10:14:29', '2026-06-02 10:14:42'),
(19, 12, 19, 'Found', 'ASSET-687FB77CDDE08', '2026-06-02 10:15:00', '2026-06-02 10:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `asset_deletion_confirmations`
--

CREATE TABLE `asset_deletion_confirmations` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_id` bigint UNSIGNED NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `requested_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_handovers`
--

CREATE TABLE `asset_handovers` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `action_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'handover',
  `handed_over_at` date DEFAULT NULL,
  `returned_at` date DEFAULT NULL,
  `condition_on_handover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handover_notes` text COLLATE utf8mb4_unicode_ci,
  `condition_on_return` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_notes` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_handovers`
--

INSERT INTO `asset_handovers` (`id`, `asset_id`, `employee_id`, `action_type`, `handed_over_at`, `returned_at`, `condition_on_handover`, `handover_notes`, `condition_on_return`, `return_notes`, `notes`, `created_at`, `updated_at`) VALUES
(1, 23, 1, 'handover', '2026-05-26', '2026-05-26', 'needs_repair', NULL, 'ئ', NULL, 'ئ', '2026-05-26 17:45:39', '2026-06-02 07:28:28'),
(2, 27, 2, 'handover', '2026-05-27', '2026-05-27', 'جديد', NULL, NULL, NULL, 'ي', '2026-05-26 18:56:13', '2026-05-26 18:56:13'),
(3, 27, 2, 'handover', '2026-05-27', '2026-06-03', 'ء', NULL, 'damaged', 'تم استبدال الأصل ونقله بموجب طلب موافق عليه.', NULL, '2026-05-26 19:01:59', '2026-06-03 09:26:58'),
(4, 24, 1, 'handover', '2026-05-27', '2026-05-27', NULL, NULL, NULL, NULL, NULL, '2026-05-26 19:15:12', '2026-05-26 19:16:16'),
(5, 26, 2, 'handover', '2026-05-13', '2026-06-02', NULL, NULL, 'damaged', 'تم استبدال الأصل ونقله بموجب طلب موافق عليه.', NULL, '2026-05-26 19:16:48', '2026-06-02 08:48:21'),
(6, 27, 2, 'handover', '2026-05-27', NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-26 19:34:23', '2026-05-26 19:34:23'),
(7, 24, 1, 'handover', '2026-06-19', '2026-06-26', 'good', 'ؤ', 'needs_repair', NULL, 'ؤ', '2026-06-02 07:53:35', '2026-06-02 07:58:53'),
(8, 19, 2, 'return', NULL, '2026-06-26', NULL, NULL, 'good', ' ؤ', 'ؤ', '2026-06-02 08:01:07', '2026-06-02 08:01:07'),
(9, 19, 1, 'handover', '2026-06-02', NULL, 'acceptable', 'ء', NULL, NULL, 'ء', '2026-06-02 08:02:38', '2026-06-02 08:02:38'),
(10, 24, 2, 'handover', '2026-06-04', NULL, 'excellent', NULL, NULL, NULL, NULL, '2026-06-04 08:13:04', '2026-06-04 08:13:04'),
(11, 24, 2, 'return', NULL, '2026-06-19', NULL, NULL, 'damaged', NULL, NULL, '2026-06-04 08:13:46', '2026-06-04 08:13:46'),
(12, 24, 2, 'handover', '2026-06-04', NULL, 'good', NULL, NULL, NULL, NULL, '2026-06-04 08:18:58', '2026-06-04 08:18:58'),
(13, 24, 2, 'return', NULL, '2026-06-26', NULL, NULL, 'acceptable', NULL, NULL, '2026-06-04 08:19:35', '2026-06-04 08:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `asset_notifications`
--

CREATE TABLE `asset_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_notifications`
--

INSERT INTO `asset_notifications` (`id`, `asset_id`, `status`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(26, 19, '🔔 Less than two months', 'Maintenance Alert: Asset phone status is 🔔 Less than two months', 1, '2025-07-22 13:18:49', '2025-11-28 11:13:30'),
(29, 23, '❌ Overdue', 'Maintenance Alert: Asset Osama Ahmed status is ❌ Overdue', 0, '2026-04-18 08:50:42', '2026-04-18 08:56:56'),
(30, 22, '❓ Unknown', 'Maintenance Alert: Asset 7 status is ❓ Unknown', 0, '2026-04-18 09:03:06', '2026-04-18 09:03:06'),
(31, 22, '⚠️ Less than a month', 'Maintenance Alert: Asset 7 status is ⚠️ Less than a month', 0, '2026-04-18 09:03:16', '2026-04-18 09:03:16'),
(32, 19, '❌ Overdue', 'Maintenance Alert: Asset phone status is ❌ Overdue', 0, '2026-05-11 05:58:22', '2026-05-11 05:58:22'),
(33, 24, '❌ Overdue', 'Maintenance Alert: Asset lenove-e456 status is ❌ Overdue', 0, '2026-05-11 13:47:53', '2026-05-11 13:47:53'),
(34, 24, '❓ Unknown', 'Maintenance Alert: Asset lenove-e456 status is ❓ Unknown', 0, '2026-05-27 08:49:11', '2026-05-27 08:49:11'),
(35, 24, '❓ Unknown', 'Maintenance Alert: Asset lenove-e456 status is ❓ Unknown', 0, '2026-05-27 08:49:11', '2026-05-27 08:49:11'),
(36, 24, '❓ Unknown', 'Maintenance Alert: Asset lenove-e456 status is ❓ Unknown', 0, '2026-05-27 09:00:20', '2026-05-27 09:00:20'),
(37, 24, '❓ Unknown', 'Maintenance Alert: Asset lenove-e456 status is ❓ Unknown', 0, '2026-05-27 09:00:20', '2026-05-27 09:00:20'),
(38, 24, '❓ Unknown', 'Maintenance Alert: Asset lenove-e456 status is ❓ Unknown', 0, '2026-05-27 09:23:27', '2026-05-27 09:23:27'),
(39, 24, '❓ Unknown', 'Maintenance Alert: Asset lenove-e456 status is ❓ Unknown', 0, '2026-05-27 09:23:27', '2026-05-27 09:23:27'),
(40, 27, '❌ Overdue', 'Maintenance Alert: Asset Osama Ahmedي status is ❌ Overdue', 0, '2026-05-27 09:30:03', '2026-05-27 09:30:03'),
(41, 28, '❌ Overdue', 'Maintenance Alert: Asset admin status is ❌ Overdue', 0, '2026-05-27 13:33:07', '2026-05-27 13:33:07'),
(42, 28, '❌ Overdue', 'Maintenance Alert: Asset admin status is ❌ Overdue', 1, '2026-05-27 13:33:56', '2026-06-02 10:17:47'),
(43, 28, '❌ Overdue', 'Maintenance Alert: Asset admin status is ❌ Overdue', 0, '2026-05-27 13:36:05', '2026-05-27 13:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `asset_replacement_requests`
--

CREATE TABLE `asset_replacement_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_id` bigint UNSIGNED NOT NULL,
  `requester_id` bigint UNSIGNED NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `target_location_id` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approver_id` bigint UNSIGNED DEFAULT NULL,
  `approver_employee_id` bigint UNSIGNED DEFAULT NULL,
  `rejection_reason` text COLLATE utf8mb4_unicode_ci,
  `actioned_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_replacement_requests`
--

INSERT INTO `asset_replacement_requests` (`id`, `asset_id`, `requester_id`, `reason`, `description`, `notes`, `target_location_id`, `status`, `approver_id`, `approver_employee_id`, `rejection_reason`, `actioned_at`, `created_at`, `updated_at`) VALUES
(1, 24, 1, 'expired', 'مىم', NULL, 3, 'approved', 1, NULL, NULL, '2026-06-02 08:32:44', '2026-06-02 08:32:31', '2026-06-02 08:32:44'),
(2, 24, 1, 'other', '\n5\n', NULL, 1, 'approved', 1, NULL, NULL, '2026-06-02 08:37:01', '2026-06-02 08:36:18', '2026-06-02 08:37:01'),
(3, 26, 1, 'other', 'ي', 'ت', 3, 'approved', 1, NULL, NULL, '2026-06-02 08:48:21', '2026-06-02 08:41:31', '2026-06-02 08:48:21'),
(4, 23, 1, 'expired', NULL, 'ت', 3, 'pending', NULL, NULL, NULL, NULL, '2026-06-02 08:47:40', '2026-06-02 08:47:40'),
(5, 19, 1, 'other', 'ت', 'م', 1, 'rejected', NULL, 2, 'st545ring', '2026-06-03 09:27:49', '2026-06-02 08:48:44', '2026-06-03 09:27:49'),
(6, 27, 1, 'other', 'ا', 'ت', 1, 'approved', NULL, 2, NULL, '2026-06-03 09:26:58', '2026-06-03 08:35:40', '2026-06-03 09:26:58'),
(7, 28, 1, 'expired', NULL, 'ى', 1, 'pending', NULL, NULL, NULL, NULL, '2026-06-18 08:17:52', '2026-06-18 08:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `asset_types`
--

CREATE TABLE `asset_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_types`
--

INSERT INTO `asset_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '8lab', '2026-05-11 11:02:35', '2026-05-26 19:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_livewire-rate-limiter:62dcdddd2131784090e8a5916c260a90678e71b3', 'i:1;', 1781767726),
('laravel_cache_livewire-rate-limiter:62dcdddd2131784090e8a5916c260a90678e71b3:timer', 'i:1781767726;', 1781767726),
('laravel_cache_livewire-rate-limiter:814ac60a66e4593ee6ceda8417da30191970ee04', 'i:1;', 1781772615),
('laravel_cache_livewire-rate-limiter:814ac60a66e4593ee6ceda8417da30191970ee04:timer', 'i:1781772615;', 1781772615),
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1782211707),
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1782211707;', 1782211707),
('laravel_cache_livewire-rate-limiter:c9648cc0cb3d6646e566f360255b7283d9012d02', 'i:1;', 1781767816),
('laravel_cache_livewire-rate-limiter:c9648cc0cb3d6646e566f360255b7283d9012d02:timer', 'i:1781767816;', 1781767816),
('laravel_cache_rate_limit:login:ip:127.0.0.1', 'i:1;', 1782212333),
('laravel_cache_rate_limit:read:token:3AOPADxb9vmhB0ret3Cev6YeWNOxrt1iPXmqfhLd9czFhwwD2ipV40CG6cXe', 'i:3;', 1780991897),
('laravel_cache_rate_limit:read:token:8SQwcEtMXipZjoNmpk6J8VlWbS5AVM00alq6xAKWE9JMA3pG8ho19KlRyQ9y', 'i:1;', 1780474463),
('laravel_cache_rate_limit:read:token:Kz72QKvIDdQMm6ywk1PvXhzCAn7rTKkMbo2CZmxe0I73K78YbjaIjDKNDzB3', 'i:1;', 1781422556),
('laravel_cache_rate_limit:read:token:LGASCbXuDcnVrB9LZ1aGsRxqDNqW8PZp6IzMzmjempTf95OShxjU5SzfT8zp', 'i:2;', 1780478811),
('laravel_cache_rate_limit:read:token:r3nufJfzqB2i7YbsVpWbSjU0BlGX7pV2tsllPNAsUuW4m0K9bbcEHW9FeRhB', 'i:2;', 1780476203),
('laravel_cache_rate_limit:read:token:S7bHt8W4CbDuGYetvWH355NvrP9IjDnlzN0Sn0tzTxQ2zsx0shhSAvqn814D', 'i:1;', 1780476630),
('laravel_cache_rate_limit:write:token:0H7tV0TcasUe51WNImvBXXvuNnv2Vahd9ODKCcg6LmCbVA6a4reptyCmSxB3', 'i:2;', 1780388872),
('laravel_cache_rate_limit:write:token:2BCBbOn9wUoB8OPKLTUcLOZp830BPfC6UeU4mLR5DkDIqJY488yPP88deSbA', 'i:1;', 1782212365),
('laravel_cache_rate_limit:write:token:Kz72QKvIDdQMm6ywk1PvXhzCAn7rTKkMbo2CZmxe0I73K78YbjaIjDKNDzB3', 'i:2;', 1781436046),
('laravel_cache_rate_limit:write:token:LGASCbXuDcnVrB9LZ1aGsRxqDNqW8PZp6IzMzmjempTf95OShxjU5SzfT8zp', 'i:3;', 1780478909),
('laravel_cache_rate_limit:write:token:r3nufJfzqB2i7YbsVpWbSjU0BlGX7pV2tsllPNAsUuW4m0K9bbcEHW9FeRhB', 'i:1;', 1780476224),
('laravel_cache_rate_limit:write:token:S7bHt8W4CbDuGYetvWH355NvrP9IjDnlzN0Sn0tzTxQ2zsx0shhSAvqn814D', 'i:1;', 1780476636),
('laravel_cache_rate_limit:write:token:sNEIfb7fQlZt35vBvRlzOIorJvTHQK9ztTdoPWtDMrygRfMRoiFmerYfXgYW', 'i:4;', 1781768301),
('laravel_cache_rate_limit:write:token:twYYlfweOYkee3hDxr8D5oEsa9vOuJJAgNCX9OJKf18mWpqeSX4sIfiFJEY8', 'i:1;', 1781436180),
('laravel_cache_rate_limit:write:token:vJf0kqWPk3A75cL4edSHcxm7LRPplDKLrhwtWg3D1tVckkZUGi12knyfmnVl', 'i:2;', 1781436398),
('laravel_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:33:{i:0;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:19:\"عرض الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:23:\"إنشاء الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:23:\"تعديل الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:19:\"حذف الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:25:\"عرض الإشعارات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:29:\"تعديل الإشعارات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:28:\"عرض سجل الأنشطة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:28:\"عرض طلبات الحذف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:32:\"تعديل طلبات الحذف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:28:\"حذف طلبات الحذف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:21:\"عرض الأقسام\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:17:\"إنشاء قسم\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:25:\"تعديل الأقسام\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:21:\"حذف الأقسام\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:23:\"عرض الصيانات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:21:\"إنشاء صيانة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:27:\"تعديل الصيانات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:23:\"حذف الصيانات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:27:\"عرض المستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:23:\"إنشاء مستخدم\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:31:\"تعديل المستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:27:\"حذف المستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:25:\"عرض الصلاحيات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:23:\"إنشاء صلاحية\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:29:\"تعديل الصلاحيات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:25:\"حذف الصلاحيات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:21:\"عرض الأدوار\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:17:\"إنشاء دور\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:25:\"تعديل الأدوار\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:21:\"حذف الأدوار\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:38:\"عرض إحصائيات الصيانة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:36:\"عرض إحصائيات الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:30:\"عرض جدول الصيانة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1782298047),
('laravel_cache_stats_widget_2_4_5_6', 'a:4:{i:0;O:41:\"Filament\\Widgets\\StatsOverviewWidget\\Stat\":17:{s:9:\"\0*\0except\";a:0:{}s:13:\"componentName\";N;s:10:\"attributes\";N;s:8:\"\0*\0chart\";a:7:{i:0;i:7;i:1;i:2;i:2;i:10;i:3;i:3;i:4;i:15;i:5;i:4;i:6;i:17;}s:13:\"\0*\0chartColor\";N;s:8:\"\0*\0color\";s:7:\"success\";s:7:\"\0*\0icon\";N;s:14:\"\0*\0description\";s:24:\"Available: 0 | In Use: 1\";s:18:\"\0*\0descriptionIcon\";s:15:\"heroicon-m-cube\";s:26:\"\0*\0descriptionIconPosition\";N;s:19:\"\0*\0descriptionColor\";N;s:18:\"\0*\0extraAttributes\";a:0:{}s:24:\"\0*\0shouldOpenUrlInNewTab\";b:0;s:6:\"\0*\0url\";N;s:5:\"\0*\0id\";N;s:8:\"\0*\0label\";s:12:\"Total Assets\";s:8:\"\0*\0value\";i:1;}i:1;O:41:\"Filament\\Widgets\\StatsOverviewWidget\\Stat\":17:{s:9:\"\0*\0except\";a:0:{}s:13:\"componentName\";N;s:10:\"attributes\";N;s:8:\"\0*\0chart\";a:7:{i:0;i:1;i:1;i:4;i:2;i:2;i:3;i:8;i:4;i:3;i:5;i:9;i:6;i:2;}s:13:\"\0*\0chartColor\";N;s:8:\"\0*\0color\";s:6:\"danger\";s:7:\"\0*\0icon\";N;s:14:\"\0*\0description\";s:27:\"Damaged: 0 | Maintenance: 0\";s:18:\"\0*\0descriptionIcon\";s:29:\"heroicon-m-wrench-screwdriver\";s:26:\"\0*\0descriptionIconPosition\";N;s:19:\"\0*\0descriptionColor\";N;s:18:\"\0*\0extraAttributes\";a:0:{}s:24:\"\0*\0shouldOpenUrlInNewTab\";b:0;s:6:\"\0*\0url\";N;s:5:\"\0*\0id\";N;s:8:\"\0*\0label\";s:23:\"Broken / In Maintenance\";s:8:\"\0*\0value\";i:0;}i:2;O:41:\"Filament\\Widgets\\StatsOverviewWidget\\Stat\":17:{s:9:\"\0*\0except\";a:0:{}s:13:\"componentName\";N;s:10:\"attributes\";N;s:8:\"\0*\0chart\";a:7:{i:0;i:2;i:1;i:5;i:2;i:8;i:3;i:4;i:4;i:10;i:5;i:6;i:6;i:12;}s:13:\"\0*\0chartColor\";N;s:8:\"\0*\0color\";s:7:\"primary\";s:7:\"\0*\0icon\";N;s:14:\"\0*\0description\";s:18:\"Total Employees: 0\";s:18:\"\0*\0descriptionIcon\";s:21:\"heroicon-m-user-group\";s:26:\"\0*\0descriptionIconPosition\";N;s:19:\"\0*\0descriptionColor\";N;s:18:\"\0*\0extraAttributes\";a:0:{}s:24:\"\0*\0shouldOpenUrlInNewTab\";b:0;s:6:\"\0*\0url\";N;s:5:\"\0*\0id\";N;s:8:\"\0*\0label\";s:23:\"Departments & Employees\";s:8:\"\0*\0value\";i:4;}i:3;O:41:\"Filament\\Widgets\\StatsOverviewWidget\\Stat\":17:{s:9:\"\0*\0except\";a:0:{}s:13:\"componentName\";N;s:10:\"attributes\";N;s:8:\"\0*\0chart\";a:7:{i:0;i:3;i:1;i:7;i:2;i:2;i:3;i:5;i:4;i:8;i:5;i:4;i:6;i:6;}s:13:\"\0*\0chartColor\";N;s:8:\"\0*\0color\";s:7:\"success\";s:7:\"\0*\0icon\";N;s:14:\"\0*\0description\";s:34:\"طلبات تحتاج مراجعة\";s:18:\"\0*\0descriptionIcon\";s:16:\"heroicon-m-clock\";s:26:\"\0*\0descriptionIconPosition\";N;s:19:\"\0*\0descriptionColor\";N;s:18:\"\0*\0extraAttributes\";a:0:{}s:24:\"\0*\0shouldOpenUrlInNewTab\";b:0;s:6:\"\0*\0url\";N;s:5:\"\0*\0id\";N;s:8:\"\0*\0label\";s:32:\"طلبات صيانة معلقة\";s:8:\"\0*\0value\";i:0;}}', 1780384051),
('laravel_cache_stats_widget_2_4_5_6_3', 'a:4:{i:0;O:41:\"Filament\\Widgets\\StatsOverviewWidget\\Stat\":17:{s:9:\"\0*\0except\";a:0:{}s:13:\"componentName\";N;s:10:\"attributes\";N;s:8:\"\0*\0chart\";a:7:{i:0;i:7;i:1;i:2;i:2;i:10;i:3;i:3;i:4;i:15;i:5;i:4;i:6;i:17;}s:13:\"\0*\0chartColor\";N;s:8:\"\0*\0color\";s:7:\"success\";s:7:\"\0*\0icon\";N;s:14:\"\0*\0description\";s:34:\"متاح: 0 | في العهدة: 3\";s:18:\"\0*\0descriptionIcon\";s:15:\"heroicon-m-cube\";s:26:\"\0*\0descriptionIconPosition\";N;s:19:\"\0*\0descriptionColor\";N;s:18:\"\0*\0extraAttributes\";a:0:{}s:24:\"\0*\0shouldOpenUrlInNewTab\";b:0;s:6:\"\0*\0url\";N;s:5:\"\0*\0id\";N;s:8:\"\0*\0label\";s:25:\"إجمالي الأصول\";s:8:\"\0*\0value\";i:6;}i:1;O:41:\"Filament\\Widgets\\StatsOverviewWidget\\Stat\":17:{s:9:\"\0*\0except\";a:0:{}s:13:\"componentName\";N;s:10:\"attributes\";N;s:8:\"\0*\0chart\";a:7:{i:0;i:1;i:1;i:4;i:2;i:2;i:3;i:8;i:4;i:3;i:5;i:9;i:6;i:2;}s:13:\"\0*\0chartColor\";N;s:8:\"\0*\0color\";s:6:\"danger\";s:7:\"\0*\0icon\";N;s:14:\"\0*\0description\";s:27:\"معطل: 1 | صيانة: 2\";s:18:\"\0*\0descriptionIcon\";s:29:\"heroicon-m-wrench-screwdriver\";s:26:\"\0*\0descriptionIconPosition\";N;s:19:\"\0*\0descriptionColor\";N;s:18:\"\0*\0extraAttributes\";a:0:{}s:24:\"\0*\0shouldOpenUrlInNewTab\";b:0;s:6:\"\0*\0url\";N;s:5:\"\0*\0id\";N;s:8:\"\0*\0label\";s:44:\"الأصول المتعطلة/الصيانة\";s:8:\"\0*\0value\";i:3;}i:2;O:41:\"Filament\\Widgets\\StatsOverviewWidget\\Stat\":17:{s:9:\"\0*\0except\";a:0:{}s:13:\"componentName\";N;s:10:\"attributes\";N;s:8:\"\0*\0chart\";a:7:{i:0;i:2;i:1;i:5;i:2;i:8;i:3;i:4;i:4;i:10;i:5;i:6;i:6;i:12;}s:13:\"\0*\0chartColor\";N;s:8:\"\0*\0color\";s:7:\"primary\";s:7:\"\0*\0icon\";N;s:14:\"\0*\0description\";s:32:\"إجمالي الموظفين: 2\";s:18:\"\0*\0descriptionIcon\";s:21:\"heroicon-m-user-group\";s:26:\"\0*\0descriptionIconPosition\";N;s:19:\"\0*\0descriptionColor\";N;s:18:\"\0*\0extraAttributes\";a:0:{}s:24:\"\0*\0shouldOpenUrlInNewTab\";b:0;s:6:\"\0*\0url\";N;s:5:\"\0*\0id\";N;s:8:\"\0*\0label\";s:33:\"الأقسام والموظفين\";s:8:\"\0*\0value\";i:5;}i:3;O:41:\"Filament\\Widgets\\StatsOverviewWidget\\Stat\":17:{s:9:\"\0*\0except\";a:0:{}s:13:\"componentName\";N;s:10:\"attributes\";N;s:8:\"\0*\0chart\";a:7:{i:0;i:3;i:1;i:7;i:2;i:2;i:3;i:5;i:4;i:8;i:5;i:4;i:6;i:6;}s:13:\"\0*\0chartColor\";N;s:8:\"\0*\0color\";s:7:\"warning\";s:7:\"\0*\0icon\";N;s:14:\"\0*\0description\";s:34:\"طلبات تحتاج مراجعة\";s:18:\"\0*\0descriptionIcon\";s:16:\"heroicon-m-clock\";s:26:\"\0*\0descriptionIconPosition\";N;s:19:\"\0*\0descriptionColor\";N;s:18:\"\0*\0extraAttributes\";a:0:{}s:24:\"\0*\0shouldOpenUrlInNewTab\";b:0;s:6:\"\0*\0url\";N;s:5:\"\0*\0id\";N;s:8:\"\0*\0label\";s:32:\"طلبات صيانة معلقة\";s:8:\"\0*\0value\";i:2;}}', 1782211948);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `administration_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `administration_id`, `created_at`, `updated_at`) VALUES
(1, 'it', NULL, '2025-07-11 14:02:27', '2025-07-11 14:02:27'),
(2, 'test', NULL, '2025-07-14 15:58:09', '2025-07-14 15:58:09'),
(3, 'تقنيه المعلومات', 1, '2025-07-14 17:44:18', '2026-06-18 08:14:43'),
(4, 'admin', NULL, '2025-07-19 19:24:33', '2025-07-19 19:24:33'),
(5, 'log', 1, '2026-04-18 05:04:56', '2026-05-11 08:39:41'),
(6, 'Osama Ahmed', 1, '2026-04-18 05:05:39', '2026-05-11 08:39:50'),
(7, 'س', NULL, '2026-04-18 09:14:26', '2026-04-18 09:14:26'),
(8, 'ل', NULL, '2026-04-18 09:23:55', '2026-04-18 09:23:55'),
(9, '4', NULL, '2026-04-18 09:24:25', '2026-04-18 09:24:25'),
(10, 'عت', 1, '2026-05-11 08:38:05', '2026-05-11 08:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `department_user`
--

CREATE TABLE `department_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_user`
--

INSERT INTO `department_user` (`id`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(10, 1, 2, NULL, NULL),
(11, 1, 4, NULL, NULL),
(12, 7, 1, NULL, NULL),
(13, 8, 1, NULL, NULL),
(14, 1, 5, NULL, NULL),
(15, 1, 6, NULL, NULL),
(16, 4, 1, NULL, NULL),
(17, 5, 1, NULL, NULL),
(19, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `position` enum('employee','office_manager','purchasing_agent') COLLATE utf8mb4_unicode_ci DEFAULT 'employee',
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `password`, `api_token`, `priority`, `position`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'سامر', '718323599', '$2y$12$qPJx1Ub9AVdh8DUISYb1wuL.qTQGZifG7mRooQNrJdTMvBhsV8g8S', 'ef463c5bd3299334785a9412029c1006bd0ba9d7747ba28eba4daacde9f10557', 'medium', 'employee', 3, '2026-05-11 10:55:38', '2026-06-03 09:00:45'),
(2, 'حسام', '7183235995', '$2y$12$iHuV4dncwJBarhKPnqmy3O3fJt.80OFK7Nz9QdSIssN6VBOt2IC/C', '6d7e1eae1d4e17d3afc3e91ad12c5405081f7c0a44981cf33ccde4d6f6443fea', 'high', 'purchasing_agent', 3, '2026-05-11 15:17:41', '2026-06-23 10:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `id` bigint UNSIGNED NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `file_disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exporter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processed_rows` int UNSIGNED NOT NULL DEFAULT '0',
  `total_rows` int UNSIGNED NOT NULL,
  `successful_rows` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `external_maintenance_requests`
--

CREATE TABLE `external_maintenance_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `maintenance_request_id` bigint UNSIGNED NOT NULL,
  `technical_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_parts` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','approved','completed','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejection_reason` text COLLATE utf8mb4_unicode_ci,
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_by_employee` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `external_maintenance_requests`
--

INSERT INTO `external_maintenance_requests` (`id`, `maintenance_request_id`, `technical_description`, `estimated_amount`, `currency`, `required_parts`, `status`, `rejection_reason`, `admin_note`, `created_by`, `created_by_employee`, `created_at`, `updated_at`) VALUES
(1, 2, 'نماهن', 50.00, NULL, 'تهختاه', 'completed', NULL, 'نا', NULL, NULL, '2026-05-13 10:56:21', '2026-05-13 10:56:28'),
(2, 4, 'ت', 750.00, NULL, '\nن', 'approved', NULL, 'تم الموافقة على الصيانة الخارجية', 1, NULL, '2026-05-13 10:56:52', '2026-06-03 08:42:44'),
(3, 3, 'j', 50.00, NULL, 'k\n', 'approved', '4', '456', 1, NULL, '2026-05-17 06:33:00', '2026-06-03 09:07:39'),
(4, 1, 'd', 545.00, NULL, 'd\n', 'completed', NULL, NULL, 1, NULL, '2026-05-17 09:14:56', '2026-05-26 19:11:00'),
(5, 10, 'ي', NULL, NULL, 'ء', 'pending', NULL, NULL, 1, NULL, '2026-05-27 08:53:40', '2026-05-27 08:53:40'),
(6, 21, 'ر', 44.00, 'EUR', 'ر', 'pending', 'string', 'string', 1, NULL, '2026-05-27 09:19:32', '2026-06-14 07:35:10'),
(7, 27, 'rkngklrng', 50.00, 'SAR', 'nkl\nئئ\n', 'pending', NULL, NULL, 1, NULL, '2026-06-02 10:07:59', '2026-06-18 07:33:53'),
(8, 28, 'بالحاجه لشاشه', NULL, NULL, 'مستعجل\n', 'pending', NULL, NULL, 1, NULL, '2026-06-18 08:02:09', '2026-06-18 08:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_import_rows`
--

CREATE TABLE `failed_import_rows` (
  `id` bigint UNSIGNED NOT NULL,
  `data` json NOT NULL,
  `import_id` bigint UNSIGNED NOT NULL,
  `validation_error` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` bigint UNSIGNED NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processed_rows` int UNSIGNED NOT NULL DEFAULT '0',
  `total_rows` int UNSIGNED NOT NULL,
  `successful_rows` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imports`
--

INSERT INTO `imports` (`id`, `completed_at`, `file_name`, `file_path`, `importer`, `processed_rows`, `total_rows`, `successful_rows`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'sample_assets_import.csv', '/home/osama/Desktop/web/asset/storage/app/private/livewire-tmp/8XfvmaDyjayVQyLisGNseG5HAMCAUK-metac2FtcGxlX2Fzc2V0c19pbXBvcnQuY3N2-.csv', 'App\\Filament\\Imports\\AssetImporter', 0, 3, 0, 1, '2026-05-26 20:05:55', '2026-05-26 20:05:55'),
(2, NULL, 'sample_assets_import.csv', '/home/osama/Desktop/web/asset/storage/app/private/livewire-tmp/KgRam6fVW4sP4Sa5G6PKlCm09gSVW9-metac2FtcGxlX2Fzc2V0c19pbXBvcnQuY3N2-.csv', 'App\\Filament\\Imports\\AssetImporter', 0, 3, 0, 1, '2026-05-26 20:06:26', '2026-05-26 20:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"91abcd55-94f7-4555-ba72-54887be5f75c\",\"displayName\":\"Filament\\\\Actions\\\\Imports\\\\Jobs\\\\ImportCsv\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":1779923155,\"data\":{\"commandName\":\"Filament\\\\Actions\\\\Imports\\\\Jobs\\\\ImportCsv\",\"command\":\"O:39:\\\"Filament\\\\Actions\\\\Imports\\\\Jobs\\\\ImportCsv\\\":6:{s:11:\\\"\\u0000*\\u0000importer\\\";O:34:\\\"App\\\\Filament\\\\Imports\\\\AssetImporter\\\":3:{s:9:\\\"\\u0000*\\u0000import\\\";O:38:\\\"Filament\\\\Actions\\\\Imports\\\\Models\\\\Import\\\":33:{s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";N;s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:1;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:9:\\\"file_name\\\";s:24:\\\"sample_assets_import.csv\\\";s:9:\\\"file_path\\\";s:135:\\\"\\/home\\/osama\\/Desktop\\/web\\/asset\\/storage\\/app\\/private\\/livewire-tmp\\/8XfvmaDyjayVQyLisGNseG5HAMCAUK-metac2FtcGxlX2Fzc2V0c19pbXBvcnQuY3N2-.csv\\\";s:8:\\\"importer\\\";s:34:\\\"App\\\\Filament\\\\Imports\\\\AssetImporter\\\";s:10:\\\"total_rows\\\";i:3;s:10:\\\"updated_at\\\";s:19:\\\"2026-05-26 23:05:55\\\";s:10:\\\"created_at\\\";s:19:\\\"2026-05-26 23:05:55\\\";s:2:\\\"id\\\";i:1;}s:11:\\\"\\u0000*\\u0000original\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:9:\\\"file_name\\\";s:24:\\\"sample_assets_import.csv\\\";s:9:\\\"file_path\\\";s:135:\\\"\\/home\\/osama\\/Desktop\\/web\\/asset\\/storage\\/app\\/private\\/livewire-tmp\\/8XfvmaDyjayVQyLisGNseG5HAMCAUK-metac2FtcGxlX2Fzc2V0c19pbXBvcnQuY3N2-.csv\\\";s:8:\\\"importer\\\";s:34:\\\"App\\\\Filament\\\\Imports\\\\AssetImporter\\\";s:10:\\\"total_rows\\\";i:3;s:10:\\\"updated_at\\\";s:19:\\\"2026-05-26 23:05:55\\\";s:10:\\\"created_at\\\";s:19:\\\"2026-05-26 23:05:55\\\";s:2:\\\"id\\\";i:1;}s:10:\\\"\\u0000*\\u0000changes\\\";a:0:{}s:11:\\\"\\u0000*\\u0000previous\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:4:{s:12:\\\"completed_at\\\";s:9:\\\"timestamp\\\";s:14:\\\"processed_rows\\\";s:7:\\\"integer\\\";s:10:\\\"total_rows\\\";s:7:\\\"integer\\\";s:15:\\\"successful_rows\\\";s:7:\\\"integer\\\";}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:0:{}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:27:\\\"\\u0000*\\u0000relationAutoloadCallback\\\";N;s:26:\\\"\\u0000*\\u0000relationAutoloadContext\\\";N;s:10:\\\"timestamps\\\";b:1;s:13:\\\"usesUniqueIds\\\";b:0;s:9:\\\"\\u0000*\\u0000hidden\\\";a:0:{}s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:11:\\\"\\u0000*\\u0000fillable\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:0:{}}s:12:\\\"\\u0000*\\u0000columnMap\\\";a:0:{}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}}s:9:\\\"\\u0000*\\u0000import\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:38:\\\"Filament\\\\Actions\\\\Imports\\\\Models\\\\Import\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"\\u0000*\\u0000rows\\\";s:1140:\\\"YTozOntpOjA7YTo3OntzOjQ6Im5hbWUiO3M6MzA6Itis2YfYp9iyINmD2YXYqNmK2YjYqtixINiv2YrZhCI7czoxMzoic2VyaWFsX251bWJlciI7czoxMDoiQVNTRVQtMTAwMSI7czo1OiJwcmljZSI7czo0OiIxNTAwIjtzOjEwOiJkZXBhcnRtZW50IjtzOjM2OiLZgtiz2YUg2KrZgtmG2YrYqSDYp9mE2YXYudmE2YjZhdin2KoiO3M6OToiYXNzZXRUeXBlIjtzOjIzOiLYrNmH2KfYsiDZg9mF2KjZitmI2KrYsSI7czoxMzoicHVyY2hhc2VfZGF0ZSI7czoxMDoiMjAyNC0wMS0xNSI7czo2OiJzdGF0dXMiO3M6ODoi2YXYqtin2K0iO31pOjE7YTo3OntzOjQ6Im5hbWUiO3M6MjI6Iti32KfYqNi52Kkg2KXYqti0INio2YoiO3M6MTM6InNlcmlhbF9udW1iZXIiO3M6MTA6IkFTU0VULTEwMDIiO3M6NToicHJpY2UiO3M6MzoiMzAwIjtzOjEwOiJkZXBhcnRtZW50IjtzOjI5OiLYp9mE2YXZiNin2LHYryDYp9mE2KjYtNix2YrYqSI7czo5OiJhc3NldFR5cGUiO3M6MTA6Iti32KfYqNi52KkiO3M6MTM6InB1cmNoYXNlX2RhdGUiO3M6MTA6IjIwMjMtMTEtMjAiO3M6Njoic3RhdHVzIjtzOjE3OiLZgdmKINin2YTYudmH2K\\/YqSI7fWk6MjthOjc6e3M6NDoibmFtZSI7czoyMzoi2LTYp9i02Kkg2LPYp9mF2LPZiNmG2KwiO3M6MTM6InNlcmlhbF9udW1iZXIiO3M6MTA6IkFTU0VULTEwMDMiO3M6NToicHJpY2UiO3M6MzoiMjAwIjtzOjEwOiJkZXBhcnRtZW50IjtzOjI5OiLYp9mE2KXYr9in2LHYqSDYp9mE2YXYp9mE2YrYqSI7czo5OiJhc3NldFR5cGUiO3M6MTU6Iti02KfYtNipINi52LHYtiI7czoxMzoicHVyY2hhc2VfZGF0ZSI7czoxMDoiMjAyNC0wMy0wNSI7czo2OiJzdGF0dXMiO3M6ODoi2YXYqtin2K0iO319\\\";s:12:\\\"\\u0000*\\u0000columnMap\\\";a:0:{}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}s:7:\\\"batchId\\\";s:36:\\\"a1e00dc1-b350-4dc6-b1e6-872ec1108bf5\\\";}\"},\"createdAt\":1779836755,\"delay\":null}', 0, NULL, 1779836755, 1779836755),
(2, 'default', '{\"uuid\":\"3715715a-d1cf-4b66-9516-1b13028053f7\",\"displayName\":\"Filament\\\\Actions\\\\Imports\\\\Jobs\\\\ImportCsv\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":1779923186,\"data\":{\"commandName\":\"Filament\\\\Actions\\\\Imports\\\\Jobs\\\\ImportCsv\",\"command\":\"O:39:\\\"Filament\\\\Actions\\\\Imports\\\\Jobs\\\\ImportCsv\\\":6:{s:11:\\\"\\u0000*\\u0000importer\\\";O:34:\\\"App\\\\Filament\\\\Imports\\\\AssetImporter\\\":3:{s:9:\\\"\\u0000*\\u0000import\\\";O:38:\\\"Filament\\\\Actions\\\\Imports\\\\Models\\\\Import\\\":33:{s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";N;s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:1;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:9:\\\"file_name\\\";s:24:\\\"sample_assets_import.csv\\\";s:9:\\\"file_path\\\";s:135:\\\"\\/home\\/osama\\/Desktop\\/web\\/asset\\/storage\\/app\\/private\\/livewire-tmp\\/KgRam6fVW4sP4Sa5G6PKlCm09gSVW9-metac2FtcGxlX2Fzc2V0c19pbXBvcnQuY3N2-.csv\\\";s:8:\\\"importer\\\";s:34:\\\"App\\\\Filament\\\\Imports\\\\AssetImporter\\\";s:10:\\\"total_rows\\\";i:3;s:10:\\\"updated_at\\\";s:19:\\\"2026-05-26 23:06:26\\\";s:10:\\\"created_at\\\";s:19:\\\"2026-05-26 23:06:26\\\";s:2:\\\"id\\\";i:2;}s:11:\\\"\\u0000*\\u0000original\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:9:\\\"file_name\\\";s:24:\\\"sample_assets_import.csv\\\";s:9:\\\"file_path\\\";s:135:\\\"\\/home\\/osama\\/Desktop\\/web\\/asset\\/storage\\/app\\/private\\/livewire-tmp\\/KgRam6fVW4sP4Sa5G6PKlCm09gSVW9-metac2FtcGxlX2Fzc2V0c19pbXBvcnQuY3N2-.csv\\\";s:8:\\\"importer\\\";s:34:\\\"App\\\\Filament\\\\Imports\\\\AssetImporter\\\";s:10:\\\"total_rows\\\";i:3;s:10:\\\"updated_at\\\";s:19:\\\"2026-05-26 23:06:26\\\";s:10:\\\"created_at\\\";s:19:\\\"2026-05-26 23:06:26\\\";s:2:\\\"id\\\";i:2;}s:10:\\\"\\u0000*\\u0000changes\\\";a:0:{}s:11:\\\"\\u0000*\\u0000previous\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:4:{s:12:\\\"completed_at\\\";s:9:\\\"timestamp\\\";s:14:\\\"processed_rows\\\";s:7:\\\"integer\\\";s:10:\\\"total_rows\\\";s:7:\\\"integer\\\";s:15:\\\"successful_rows\\\";s:7:\\\"integer\\\";}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:0:{}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:27:\\\"\\u0000*\\u0000relationAutoloadCallback\\\";N;s:26:\\\"\\u0000*\\u0000relationAutoloadContext\\\";N;s:10:\\\"timestamps\\\";b:1;s:13:\\\"usesUniqueIds\\\";b:0;s:9:\\\"\\u0000*\\u0000hidden\\\";a:0:{}s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:11:\\\"\\u0000*\\u0000fillable\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:0:{}}s:12:\\\"\\u0000*\\u0000columnMap\\\";a:0:{}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}}s:9:\\\"\\u0000*\\u0000import\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:38:\\\"Filament\\\\Actions\\\\Imports\\\\Models\\\\Import\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"\\u0000*\\u0000rows\\\";s:1140:\\\"YTozOntpOjA7YTo3OntzOjQ6Im5hbWUiO3M6MzA6Itis2YfYp9iyINmD2YXYqNmK2YjYqtixINiv2YrZhCI7czoxMzoic2VyaWFsX251bWJlciI7czoxMDoiQVNTRVQtMTAwMSI7czo1OiJwcmljZSI7czo0OiIxNTAwIjtzOjEwOiJkZXBhcnRtZW50IjtzOjM2OiLZgtiz2YUg2KrZgtmG2YrYqSDYp9mE2YXYudmE2YjZhdin2KoiO3M6OToiYXNzZXRUeXBlIjtzOjIzOiLYrNmH2KfYsiDZg9mF2KjZitmI2KrYsSI7czoxMzoicHVyY2hhc2VfZGF0ZSI7czoxMDoiMjAyNC0wMS0xNSI7czo2OiJzdGF0dXMiO3M6ODoi2YXYqtin2K0iO31pOjE7YTo3OntzOjQ6Im5hbWUiO3M6MjI6Iti32KfYqNi52Kkg2KXYqti0INio2YoiO3M6MTM6InNlcmlhbF9udW1iZXIiO3M6MTA6IkFTU0VULTEwMDIiO3M6NToicHJpY2UiO3M6MzoiMzAwIjtzOjEwOiJkZXBhcnRtZW50IjtzOjI5OiLYp9mE2YXZiNin2LHYryDYp9mE2KjYtNix2YrYqSI7czo5OiJhc3NldFR5cGUiO3M6MTA6Iti32KfYqNi52KkiO3M6MTM6InB1cmNoYXNlX2RhdGUiO3M6MTA6IjIwMjMtMTEtMjAiO3M6Njoic3RhdHVzIjtzOjE3OiLZgdmKINin2YTYudmH2K\\/YqSI7fWk6MjthOjc6e3M6NDoibmFtZSI7czoyMzoi2LTYp9i02Kkg2LPYp9mF2LPZiNmG2KwiO3M6MTM6InNlcmlhbF9udW1iZXIiO3M6MTA6IkFTU0VULTEwMDMiO3M6NToicHJpY2UiO3M6MzoiMjAwIjtzOjEwOiJkZXBhcnRtZW50IjtzOjI5OiLYp9mE2KXYr9in2LHYqSDYp9mE2YXYp9mE2YrYqSI7czo5OiJhc3NldFR5cGUiO3M6MTU6Iti02KfYtNipINi52LHYtiI7czoxMzoicHVyY2hhc2VfZGF0ZSI7czoxMDoiMjAyNC0wMy0wNSI7czo2OiJzdGF0dXMiO3M6ODoi2YXYqtin2K0iO319\\\";s:12:\\\"\\u0000*\\u0000columnMap\\\";a:0:{}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}s:7:\\\"batchId\\\";s:36:\\\"a1e00df1-4e2f-4f13-84f5-ed686dc62ee9\\\";}\"},\"createdAt\":1779836786,\"delay\":null}', 0, NULL, 1779836786, 1779836786),
(3, 'default', '{\"uuid\":\"018e152c-c86a-4e14-a618-a6ebc1199dd3\",\"displayName\":\"Filament\\\\Notifications\\\\Auth\\\\ResetPassword\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:41:\\\"Filament\\\\Notifications\\\\Auth\\\\ResetPassword\\\":3:{s:3:\\\"url\\\";s:222:\\\"http:\\/\\/127.0.0.1:8000\\/admin\\/password-reset\\/reset?email=asaam4292%40gmail.com&token=a5500d18aae906677cc6b6d80d64ea08f9c4389bff1f91263f8c2b1b3c340b33&signature=42897453d47e47bfb1b8ef0369a11abecc857112363ba5238fe0774700197daf\\\";s:5:\\\"token\\\";s:64:\\\"a5500d18aae906677cc6b6d80d64ea08f9c4389bff1f91263f8c2b1b3c340b33\\\";s:2:\\\"id\\\";s:36:\\\"928fdb00-3b74-4a2d-9cd2-cb740dc613fa\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\",\"batchId\":null},\"createdAt\":1779969331,\"delay\":null}', 0, NULL, 1779969331, 1779969331),
(4, 'default', '{\"uuid\":\"9790ec06-99ff-4ae9-a27e-3d2d43fc95b5\",\"displayName\":\"Filament\\\\Notifications\\\\Auth\\\\ResetPassword\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:41:\\\"Filament\\\\Notifications\\\\Auth\\\\ResetPassword\\\":3:{s:3:\\\"url\\\";s:222:\\\"http:\\/\\/127.0.0.1:8000\\/admin\\/password-reset\\/reset?email=asaam4292%40gmail.com&token=15eea0c6eac600f6afa0a1d21b9978b7442b5617bcc1e56af1b136642219bba9&signature=a38a2648a1ffe86a855255ffb75e0630921a122d184a50c5c71e9ff5b682eaff\\\";s:5:\\\"token\\\";s:64:\\\"15eea0c6eac600f6afa0a1d21b9978b7442b5617bcc1e56af1b136642219bba9\\\";s:2:\\\"id\\\";s:36:\\\"239967a8-9c26-44b6-b706-2953877be7e6\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\",\"batchId\":null},\"createdAt\":1779969422,\"delay\":null}', 0, NULL, 1779969422, 1779969422);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_batches`
--

INSERT INTO `job_batches` (`id`, `name`, `total_jobs`, `pending_jobs`, `failed_jobs`, `failed_job_ids`, `options`, `cancelled_at`, `created_at`, `finished_at`) VALUES
('a1e00dc1-b350-4dc6-b1e6-872ec1108bf5', '', 1, 1, 0, '[]', 'a:2:{s:13:\"allowFailures\";b:1;s:7:\"finally\";a:1:{i:0;O:47:\"Laravel\\SerializableClosure\\SerializableClosure\":1:{s:12:\"serializable\";O:46:\"Laravel\\SerializableClosure\\Serializers\\Signed\":2:{s:12:\"serializable\";s:3420:\"O:46:\"Laravel\\SerializableClosure\\Serializers\\Native\":5:{s:3:\"use\";a:4:{s:9:\"columnMap\";a:0:{}s:6:\"import\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Imports\\Models\\Import\";s:2:\"id\";i:1;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:13:\"jobConnection\";N;s:7:\"options\";a:0:{}}s:8:\"function\";s:2925:\"function () use ($columnMap, $import, $jobConnection, $options) {\n                    $import->touch(\'completed_at\');\n\n                    event(new \\Filament\\Actions\\Imports\\Events\\ImportCompleted($import, $columnMap, $options));\n\n                    if (! $import->user instanceof \\Illuminate\\Contracts\\Auth\\Authenticatable) {\n                        return;\n                    }\n\n                    $failedRowsCount = $import->getFailedRowsCount();\n\n                    \\Filament\\Notifications\\Notification::make()\n                        ->title($import->importer::getCompletedNotificationTitle($import))\n                        ->body($import->importer::getCompletedNotificationBody($import))\n                        ->when(\n                            ! $failedRowsCount,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->success(),\n                        )\n                        ->when(\n                            $failedRowsCount && ($failedRowsCount < $import->total_rows),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->warning(),\n                        )\n                        ->when(\n                            $failedRowsCount === $import->total_rows,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->danger(),\n                        )\n                        ->when(\n                            $failedRowsCount,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->actions([\n                                \\Filament\\Notifications\\Actions\\Action::make(\'downloadFailedRowsCsv\')\n                                    ->label(trans_choice(\'filament-actions::import.notifications.completed.actions.download_failed_rows_csv.label\', $failedRowsCount, [\n                                        \'count\' => \\Illuminate\\Support\\Number::format($failedRowsCount),\n                                    ]))\n                                    ->color(\'danger\')\n                                    ->url(route(\'filament.imports.failed-rows.download\', [\'import\' => $import], absolute: false), shouldOpenInNewTab: true)\n                                    ->markAsRead(),\n                            ]),\n                        )\n                        ->when(\n                            ($jobConnection === \'sync\') ||\n                                (blank($jobConnection) && (config(\'queue.default\') === \'sync\')),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification\n                                ->persistent()\n                                ->send(),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->sendToDatabase($import->user, isEventDispatched: true),\n                        );\n                }\";s:5:\"scope\";s:29:\"Filament\\Actions\\ImportAction\";s:4:\"this\";N;s:4:\"self\";s:32:\"0000000000000c240000000000000000\";}\";s:4:\"hash\";s:44:\"moMAiYAuKo193wZvF98s2McCz90DhkzYCIrxiS34wE4=\";}}}}', NULL, 1779836755, NULL),
('a1e00df1-4e2f-4f13-84f5-ed686dc62ee9', '', 1, 1, 0, '[]', 'a:2:{s:13:\"allowFailures\";b:1;s:7:\"finally\";a:1:{i:0;O:47:\"Laravel\\SerializableClosure\\SerializableClosure\":1:{s:12:\"serializable\";O:46:\"Laravel\\SerializableClosure\\Serializers\\Signed\":2:{s:12:\"serializable\";s:3420:\"O:46:\"Laravel\\SerializableClosure\\Serializers\\Native\":5:{s:3:\"use\";a:4:{s:9:\"columnMap\";a:0:{}s:6:\"import\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Imports\\Models\\Import\";s:2:\"id\";i:2;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:13:\"jobConnection\";N;s:7:\"options\";a:0:{}}s:8:\"function\";s:2925:\"function () use ($columnMap, $import, $jobConnection, $options) {\n                    $import->touch(\'completed_at\');\n\n                    event(new \\Filament\\Actions\\Imports\\Events\\ImportCompleted($import, $columnMap, $options));\n\n                    if (! $import->user instanceof \\Illuminate\\Contracts\\Auth\\Authenticatable) {\n                        return;\n                    }\n\n                    $failedRowsCount = $import->getFailedRowsCount();\n\n                    \\Filament\\Notifications\\Notification::make()\n                        ->title($import->importer::getCompletedNotificationTitle($import))\n                        ->body($import->importer::getCompletedNotificationBody($import))\n                        ->when(\n                            ! $failedRowsCount,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->success(),\n                        )\n                        ->when(\n                            $failedRowsCount && ($failedRowsCount < $import->total_rows),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->warning(),\n                        )\n                        ->when(\n                            $failedRowsCount === $import->total_rows,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->danger(),\n                        )\n                        ->when(\n                            $failedRowsCount,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->actions([\n                                \\Filament\\Notifications\\Actions\\Action::make(\'downloadFailedRowsCsv\')\n                                    ->label(trans_choice(\'filament-actions::import.notifications.completed.actions.download_failed_rows_csv.label\', $failedRowsCount, [\n                                        \'count\' => \\Illuminate\\Support\\Number::format($failedRowsCount),\n                                    ]))\n                                    ->color(\'danger\')\n                                    ->url(route(\'filament.imports.failed-rows.download\', [\'import\' => $import], absolute: false), shouldOpenInNewTab: true)\n                                    ->markAsRead(),\n                            ]),\n                        )\n                        ->when(\n                            ($jobConnection === \'sync\') ||\n                                (blank($jobConnection) && (config(\'queue.default\') === \'sync\')),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification\n                                ->persistent()\n                                ->send(),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->sendToDatabase($import->user, isEventDispatched: true),\n                        );\n                }\";s:5:\"scope\";s:29:\"Filament\\Actions\\ImportAction\";s:4:\"this\";N;s:4:\"self\";s:32:\"0000000000000c240000000000000000\";}\";s:4:\"hash\";s:44:\"GMYxS7K0erBn8r/PxN6G4hmpLengHiUexzxfaIIXWLs=\";}}}}', NULL, 1779836786, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'الدور الثاني', NULL, '2026-05-26 18:57:28', '2026-05-26 18:59:59'),
(2, 'الشقة 2', 1, '2026-05-26 18:59:41', '2026-06-08 10:17:00'),
(3, '6', 1, '2026-05-26 19:14:35', '2026-05-26 19:14:35'),
(4, 'ي', 1, '2026-06-08 10:08:57', '2026-06-08 10:08:57'),
(5, 'd', NULL, '2026-06-08 10:14:33', '2026-06-08 10:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_id` bigint UNSIGNED NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `maintenance_date` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `asset_id`, `note`, `maintenance_date`, `status`, `created_at`, `updated_at`) VALUES
(18, 19, 'fix battery', '2025-05-22', 'Maintenance Completed', '2025-07-22 13:17:24', '2025-07-22 13:18:49'),
(19, 19, 'fix battery', '2025-07-22', 'Maintenance Completed', '2025-07-22 13:18:20', '2025-07-22 13:18:20'),
(20, 19, 'd', '2026-03-09', 'Pending', '2026-03-08 18:07:54', '2026-03-08 18:07:54'),
(21, 19, 'dgdg', '2026-04-18', 'Maintenance Completed', '2026-04-18 05:17:37', '2026-04-18 05:17:37'),
(22, 24, NULL, '2026-04-18', 'Maintenance Completed', '2026-04-18 09:13:19', '2026-04-18 09:13:19'),
(23, 23, NULL, '2026-04-18', 'Maintenance Completed', '2026-04-18 09:27:56', '2026-04-18 09:27:56'),
(24, 19, NULL, '2026-05-11', 'Maintenance Completed', '2026-05-11 05:58:51', '2026-05-11 05:59:08'),
(25, 27, 'ؤ', '2026-05-26', 'Maintenance Completed', '2026-05-26 19:34:49', '2026-05-26 20:43:43'),
(26, 28, NULL, '2026-05-26', 'Maintenance Completed', '2026-05-26 20:43:15', '2026-05-26 20:43:15'),
(27, 28, NULL, '2026-05-27', 'Maintenance Completed', '2026-05-27 07:11:17', '2026-05-27 08:37:15'),
(28, 27, NULL, '2026-05-27', 'Maintenance Completed', '2026-05-27 08:34:30', '2026-05-27 08:37:57'),
(29, 28, NULL, '2026-05-27', 'Maintenance Completed', '2026-05-27 13:34:59', '2026-05-27 13:34:59'),
(30, 28, 'ء', '2026-05-27', 'Maintenance Completed', '2026-05-27 13:36:05', '2026-05-27 13:36:36'),
(31, 26, NULL, '2026-05-27', 'Maintenance Completed', '2026-05-27 13:42:49', '2026-05-27 13:42:49'),
(32, 19, 'س', '2026-05-27', 'Maintenance Completed', '2026-05-27 16:44:37', '2026-05-27 16:44:37'),
(33, 24, 'g', '2026-06-02', 'Maintenance Completed', '2026-06-02 08:22:19', '2026-06-02 08:22:19'),
(34, 26, NULL, '2026-06-02', 'Maintenance Completed', '2026-06-02 08:22:53', '2026-06-02 08:22:53'),
(35, 26, NULL, '2026-06-02', 'Postponed', '2026-06-02 08:23:16', '2026-06-02 08:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_requests`
--

CREATE TABLE `maintenance_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `problem_date` date NOT NULL,
  `problem_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `status` enum('pending','postponed','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `supervisor_note` text COLLATE utf8mb4_unicode_ci,
  `it_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance_requests`
--

INSERT INTO `maintenance_requests` (`id`, `asset_id`, `employee_id`, `problem_date`, `problem_description`, `priority`, `status`, `supervisor_note`, `it_note`, `created_at`, `updated_at`) VALUES
(1, 23, 1, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', 'ت', 'ت', '2026-05-11 13:39:47', '2026-05-11 13:41:53'),
(2, 23, 1, '2026-04-30', 'عطل بالمروحة', 'medium', 'completed', NULL, NULL, '2026-05-11 13:47:19', '2026-05-26 19:18:22'),
(3, 24, 1, '2026-04-30', 'عطل بالمروحة', 'medium', 'completed', '6', '7', '2026-05-11 13:48:02', '2026-05-27 09:23:27'),
(4, 24, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-11 15:23:26', '2026-05-27 07:30:24'),
(5, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 08:33:40', '2026-05-27 08:40:00'),
(6, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 08:40:24', '2026-05-27 08:42:31'),
(7, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 08:44:44', '2026-05-27 08:46:13'),
(8, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 08:48:42', '2026-05-27 08:49:01'),
(9, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 08:50:54', '2026-05-27 08:51:10'),
(10, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 08:53:29', '2026-05-27 08:58:14'),
(11, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 08:58:52', '2026-05-27 08:59:10'),
(12, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:01:16', '2026-05-27 09:01:55'),
(15, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:06:40', '2026-05-27 09:09:49'),
(16, 23, 2, '2026-05-27', 'Test', 'low', 'completed', NULL, NULL, '2026-05-27 09:07:33', '2026-05-27 09:08:11'),
(17, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:10:38', '2026-05-27 09:10:55'),
(18, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-03-02 09:12:58', '2026-05-27 09:14:12'),
(19, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:15:12', '2026-05-27 09:15:52'),
(20, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:18:40', '2026-05-27 09:18:59'),
(21, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:19:21', '2026-05-27 09:20:04'),
(22, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:24:17', '2026-05-27 09:24:30'),
(23, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:28:57', '2026-05-27 09:29:30'),
(24, 27, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:30:03', '2026-05-27 09:30:24'),
(25, 26, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 09:32:12', '2026-05-27 09:32:54'),
(26, 26, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-05-27 19:30:20', '2026-06-02 08:27:24'),
(27, 26, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'completed', NULL, NULL, '2026-06-02 08:27:33', '2026-06-02 08:28:25'),
(28, 24, 2, '2019-08-24', 'stringstri', 'high', 'pending', NULL, NULL, '2026-06-03 08:51:00', '2026-06-08 09:51:07'),
(29, 26, 2, '2019-08-24', 'stringstri', 'high', 'pending', NULL, NULL, '2026-06-18 07:37:50', '2026-06-18 07:37:50'),
(30, 27, 2, '2019-08-24', 'stringstri', 'high', 'pending', NULL, NULL, '2026-06-23 10:58:25', '2026-06-23 10:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_spare_part`
--

CREATE TABLE `maintenance_spare_part` (
  `id` bigint UNSIGNED NOT NULL,
  `maintenance_id` bigint UNSIGNED NOT NULL,
  `spare_part_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(8, 'App\\Models\\Maintenance', 5, '5c7d074f-38d3-4d71-b569-20cd7a0d0b55', 'images', 'Screenshot from 2025-07-11 16-33-10', '01JZXAHCA6050M77MEV00CT8GJ.png', 'image/png', 'public', 'public', 267398, '[]', '[]', '[]', '[]', 1, '2025-07-11 15:04:08', '2025-07-11 15:04:08'),
(11, 'App\\Models\\Maintenance', 6, 'e994b4d3-e76f-4b5a-8760-593acf43fdd0', 'images', 'Screenshot from 2025-07-11 16-33-10', '01JZXAQ35AP09DN21DA3C0QCQ4.png', 'image/png', 'public', 'public', 267398, '[]', '[]', '[]', '[]', 1, '2025-07-11 15:07:16', '2025-07-11 15:07:16'),
(16, 'App\\Models\\Maintenance', 7, '480e856d-10c5-4955-8e74-a7700549d71a', 'images', 'Screenshot from 2025-07-11 15-48-50', '01JZZ3GR5YWX2XZHJVTFPX7QNR.png', 'image/png', 'public', 'public', 191594, '[]', '[]', '[]', '[]', 1, '2025-07-12 07:39:57', '2025-07-12 07:39:57'),
(17, 'App\\Models\\Maintenance', 8, '48d6c590-beb9-49dc-932d-613e11163ad4', 'images', 'Screenshot from 2025-07-11 15-48-50', '01JZZ46728QKRZJCE70S47Q7VD.png', 'image/png', 'public', 'public', 191594, '[]', '[]', '[]', '[]', 1, '2025-07-12 07:51:40', '2025-07-12 07:51:40'),
(20, 'App\\Models\\Maintenance', 9, '45a23258-e834-4495-9a42-66ba0be2ab69', 'images', 'Screenshot from 2025-07-11 15-48-50', '01JZZ4HTD3P4HXJQV4G2G8NKYN.png', 'image/png', 'public', 'public', 191594, '[]', '[]', '[]', '[]', 1, '2025-07-12 07:58:00', '2025-07-12 07:58:00'),
(21, 'App\\Models\\Maintenance', 10, 'da8af920-4fbc-4792-a6d4-92dc3a47a8fc', 'images', 'Screenshot from 2025-07-11 15-48-50', '01JZZ4JVK7VN9CDBG5XMZNFK4J.png', 'image/png', 'public', 'public', 191594, '[]', '[]', '[]', '[]', 1, '2025-07-12 07:58:34', '2025-07-12 07:58:34'),
(22, 'App\\Models\\Maintenance', 11, '00eecb8f-847c-4c88-a672-49fdb607a9d8', 'images', 'Screenshot from 2025-07-11 16-36-44', '01JZZ4S6G3465J6K63W8T4BRWY.png', 'image/png', 'public', 'public', 262406, '[]', '[]', '[]', '[]', 1, '2025-07-12 08:02:02', '2025-07-12 08:02:02'),
(28, 'App\\Models\\Maintenance', 12, 'b60ca1f5-6189-449f-ab1a-3e5d35e7a0b8', 'images', 'Screenshot from 2025-07-11 16-33-10', '01JZZXGJEYTTMJ294HT3WRWVXP.png', 'image/png', 'public', 'public', 267398, '[]', '[]', '[]', '[]', 1, '2025-07-12 15:14:14', '2025-07-12 15:14:14'),
(37, 'App\\Models\\Maintenance', 14, 'ce9d0e89-1882-45d2-a525-e42a704be1ec', 'images', 'Screenshot from 2025-07-11 15-48-50', '01K05BCFC4B1EM97PAWQAR1BFP.png', 'image/png', 'public', 'public', 191594, '[]', '[]', '[]', '[]', 1, '2025-07-14 17:52:52', '2025-07-14 17:52:52'),
(41, 'App\\Models\\Asset', 19, 'e2dff7ae-a463-49ff-a9f7-c9b191767ece', 'document', 'Screenshot from 2025-06-29 21-00-06', '01K0SE9G23W4YMR7MHN2JMS007.png', 'image/png', 'public', 'public', 112787, '[]', '[]', '[]', '[]', 2, '2025-07-22 13:08:28', '2025-07-22 13:08:28'),
(42, 'App\\Models\\Maintenance', 18, '494811dc-9919-42e3-9fc3-e19ab996c720', 'images', 'Screenshot from 2025-07-11 15-48-50', '01K0SESV6KX9TK5K04Q0QCSJG5.png', 'image/png', 'public', 'public', 191594, '[]', '[]', '[]', '[]', 1, '2025-07-22 13:17:24', '2025-07-22 13:17:24'),
(43, 'App\\Models\\Maintenance', 19, '37aa3834-9f82-4d4c-b15c-9f98abef6ee2', 'images', 'Screenshot from 2025-07-11 16-33-10', '01K0SEVHT95TEPWBA88JB82001.png', 'image/png', 'public', 'public', 267398, '[]', '[]', '[]', '[]', 1, '2025-07-22 13:18:20', '2025-07-22 13:18:20'),
(46, 'App\\Models\\Maintenance', 20, 'c65653b4-d4ef-4034-a9b6-d9d25a00415c', 'images', 'Screenshot from 2026-03-09 00-06-24', '01KK7MEBRQNRQPTNX1YA679YPG.png', 'image/png', 'public', 'public', 108368, '[]', '[]', '[]', '[]', 1, '2026-03-08 18:07:54', '2026-03-08 18:07:54'),
(49, 'App\\Models\\Maintenance', 21, 'e474aeed-d730-45b4-bd7e-8dd35d8d464f', 'images', 'WhatsApp Image 2025-09-14 at 11.38.41 PM', '01KPFTNCABK5TQ2XHCPMRTQH49.jpeg', 'image/jpeg', 'public', 'public', 126842, '[]', '[]', '[]', '[]', 1, '2026-04-18 05:17:37', '2026-04-18 05:17:37'),
(50, 'App\\Models\\Asset', 22, '6cb88b9a-1636-4d11-80dd-5c3baffcafab', 'image', 'WhatsApp Image 2025-09-14 at 11.38.41 PM', '01KPG6GHZE54SW3CNDJQPBHKDX.jpeg', 'image/jpeg', 'public', 'public', 126842, '[]', '[]', '[]', '[]', 1, '2026-04-18 08:44:42', '2026-04-18 08:44:42'),
(51, 'App\\Models\\Asset', 22, 'f64e0f8a-3d1c-4dd1-8d99-1eac48a72eb8', 'document', 'WhatsApp Image 2025-09-14 at 11.38.41 PM', '01KPG6GJ1MP2A5ZRDG9EYK3QD7.jpeg', 'image/jpeg', 'public', 'public', 126842, '[]', '[]', '[]', '[]', 2, '2026-04-18 08:44:42', '2026-04-18 08:44:42'),
(52, 'App\\Models\\Asset', 19, 'ad15785d-d481-4718-beff-04c3d4c094c5', 'image', 'WhatsApp Image 2025-09-14 at 11.38.41 PM', '01KPG6S8R5EMJXQCTNX5TJ8EKV.jpeg', 'image/jpeg', 'public', 'public', 126842, '[]', '[]', '[]', '[]', 3, '2026-04-18 08:49:27', '2026-04-18 08:49:27'),
(53, 'App\\Models\\Asset', 23, '5762d9cc-e0cd-454f-8b7c-428d5f427ae3', 'image', 'WhatsApp Image 2025-09-14 at 11.38.41 PM', '01KPG6T3PZ7914G4DDKHFW3533.jpeg', 'image/jpeg', 'public', 'public', 126842, '[]', '[]', '[]', '[]', 1, '2026-04-18 08:49:55', '2026-04-18 08:49:55'),
(54, 'App\\Models\\Asset', 23, '02c7e5e1-ef67-4990-95e8-e56fcf66332a', 'document', 'WhatsApp Image 2025-09-14 at 11.38.41 PM', '01KPG6TD331MF2FFKSYPE1TQM0.jpeg', 'image/jpeg', 'public', 'public', 126842, '[]', '[]', '[]', '[]', 2, '2026-04-18 08:50:04', '2026-04-18 08:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '0001_01_01_000000_create_users_table', 1),
(7, '0001_01_01_000001_create_cache_table', 1),
(8, '0001_01_01_000002_create_jobs_table', 1),
(9, '2025_06_01_101803_create_posts_table', 1),
(10, '2025_06_01_104622_create_news_table', 1),
(11, '2025_06_02_093521_create_news_post_table', 2),
(12, '2025_06_02_100917_change_title_and_content_columns_in_news_table', 3),
(13, '2025_06_02_123233_add_translated_columns_to_news_table', 3),
(14, '2025_06_08_170011_create_permission_tables', 4),
(15, '2025_06_15_071255_create_institutes_table', 5),
(16, '2025_06_15_071255_create_universities_table', 5),
(17, '2025_06_15_071255_create_university_majors_table', 5),
(18, '2025_06_15_073126_create_institute_majors_table', 5),
(19, '2025_06_23_070750_create_students_table', 5),
(20, '2025_07_11_164220_create_departments_table', 6),
(21, '2025_07_11_164307_create_assets_table', 6),
(22, '2025_07_11_164336_create_maintenances_table', 6),
(23, '2025_07_11_164401_create_activity_logs_table', 6),
(24, '2025_07_14_174010_create_notifications_table', 7),
(25, '2025_07_14_181812_create_department_user_table', 8),
(26, '2025_07_14_185103_create_asset_deletion_confirmations_table', 9),
(27, '2025_07_14_185243_create_asset_deletion_confirmations_table', 10),
(28, '2025_09_12_193342_create_staff_table', 11),
(29, '2025_12_26_213551_create_admins_table', 12),
(30, '2025_12_26_213608_create_branches_table', 12),
(31, '2025_12_26_213739_create_admin_branch_table', 12),
(32, '2026_04_18_120523_add_model_name_to_activity_logs_table', 13),
(33, '2026_05_03_210119_create_activity_logs_table', 0),
(34, '2026_05_03_210119_create_admin_branch_table', 0),
(35, '2026_05_03_210119_create_admins_table', 0),
(36, '2026_05_03_210119_create_asset_deletion_confirmations_table', 0),
(37, '2026_05_03_210119_create_assets_table', 0),
(38, '2026_05_03_210119_create_branches_table', 0),
(39, '2026_05_03_210119_create_cache_table', 0),
(40, '2026_05_03_210119_create_cache_locks_table', 0),
(41, '2026_05_03_210119_create_department_user_table', 0),
(42, '2026_05_03_210119_create_departments_table', 0),
(43, '2026_05_03_210119_create_failed_jobs_table', 0),
(44, '2026_05_03_210119_create_job_batches_table', 0),
(45, '2026_05_03_210119_create_jobs_table', 0),
(46, '2026_05_03_210119_create_maintenances_table', 0),
(47, '2026_05_03_210119_create_media_table', 0),
(48, '2026_05_03_210119_create_model_has_permissions_table', 0),
(49, '2026_05_03_210119_create_model_has_roles_table', 0),
(50, '2026_05_03_210119_create_nas_table', 0),
(51, '2026_05_03_210119_create_nasreload_table', 0),
(52, '2026_05_03_210119_create_notifications_table', 0),
(53, '2026_05_03_210119_create_password_reset_tokens_table', 0),
(54, '2026_05_03_210119_create_permissions_table', 0),
(55, '2026_05_03_210119_create_radacct_table', 0),
(56, '2026_05_03_210119_create_radcheck_table', 0),
(57, '2026_05_03_210119_create_radgroupcheck_table', 0),
(58, '2026_05_03_210119_create_radgroupreply_table', 0),
(59, '2026_05_03_210119_create_radpostauth_table', 0),
(60, '2026_05_03_210119_create_radreply_table', 0),
(61, '2026_05_03_210119_create_radusergroup_table', 0),
(62, '2026_05_03_210119_create_role_has_permissions_table', 0),
(63, '2026_05_03_210119_create_roles_table', 0),
(64, '2026_05_03_210119_create_sessions_table', 0),
(65, '2026_05_03_210119_create_staff_table', 0),
(66, '2026_05_03_210119_create_users_table', 0),
(67, '2026_05_03_210122_add_foreign_keys_to_asset_deletion_confirmations_table', 0),
(68, '2026_05_03_210122_add_foreign_keys_to_assets_table', 0),
(69, '2026_05_03_210122_add_foreign_keys_to_department_user_table', 0),
(70, '2026_05_03_210122_add_foreign_keys_to_maintenances_table', 0),
(71, '2026_05_03_210122_add_foreign_keys_to_model_has_permissions_table', 0),
(72, '2026_05_03_210122_add_foreign_keys_to_model_has_roles_table', 0),
(73, '2026_05_03_210122_add_foreign_keys_to_notifications_table', 0),
(74, '2026_05_03_210122_add_foreign_keys_to_role_has_permissions_table', 0),
(75, '2026_05_03_212734_create_activity_logs_table', 0),
(76, '2026_05_03_212734_create_admin_branch_table', 0),
(77, '2026_05_03_212734_create_admins_table', 0),
(78, '2026_05_03_212734_create_asset_deletion_confirmations_table', 0),
(79, '2026_05_03_212734_create_assets_table', 0),
(80, '2026_05_03_212734_create_branches_table', 0),
(81, '2026_05_03_212734_create_cache_table', 0),
(82, '2026_05_03_212734_create_cache_locks_table', 0),
(83, '2026_05_03_212734_create_department_user_table', 0),
(84, '2026_05_03_212734_create_departments_table', 0),
(85, '2026_05_03_212734_create_failed_jobs_table', 0),
(86, '2026_05_03_212734_create_job_batches_table', 0),
(87, '2026_05_03_212734_create_jobs_table', 0),
(88, '2026_05_03_212734_create_maintenances_table', 0),
(89, '2026_05_03_212734_create_media_table', 0),
(90, '2026_05_03_212734_create_model_has_permissions_table', 0),
(91, '2026_05_03_212734_create_model_has_roles_table', 0),
(92, '2026_05_03_212734_create_nas_table', 0),
(93, '2026_05_03_212734_create_nasreload_table', 0),
(94, '2026_05_03_212734_create_notifications_table', 0),
(95, '2026_05_03_212734_create_password_reset_tokens_table', 0),
(96, '2026_05_03_212734_create_permissions_table', 0),
(97, '2026_05_03_212734_create_role_has_permissions_table', 0),
(98, '2026_05_03_212734_create_roles_table', 0),
(99, '2026_05_03_212734_create_sessions_table', 0),
(100, '2026_05_03_212734_create_staff_table', 0),
(101, '2026_05_03_212734_create_users_table', 0),
(102, '2026_05_03_212737_add_foreign_keys_to_asset_deletion_confirmations_table', 0),
(103, '2026_05_03_212737_add_foreign_keys_to_assets_table', 0),
(104, '2026_05_03_212737_add_foreign_keys_to_department_user_table', 0),
(105, '2026_05_03_212737_add_foreign_keys_to_maintenances_table', 0),
(106, '2026_05_03_212737_add_foreign_keys_to_model_has_permissions_table', 0),
(107, '2026_05_03_212737_add_foreign_keys_to_model_has_roles_table', 0),
(108, '2026_05_03_212737_add_foreign_keys_to_notifications_table', 0),
(109, '2026_05_03_212737_add_foreign_keys_to_role_has_permissions_table', 0),
(110, '2026_05_11_100700_create_sectors_table', 14),
(111, '2026_05_11_113256_add_administration_id_to_departments_table', 15),
(112, '2026_05_11_134532_create_employees_table', 16),
(113, '2026_05_11_135003_add_employee_id_to_assets_table', 17),
(114, '2026_05_11_135003_add_fields_to_employees_table', 17),
(115, '2026_05_11_135801_create_asset_types_table', 18),
(116, '2026_05_11_135802_add_asset_type_id_to_assets_table', 18),
(117, '2026_05_11_141130_add_api_token_to_employees_table', 19),
(118, '2026_05_11_162630_create_maintenance_requests_table', 20),
(119, '2026_05_13_133440_add_isperson_to_assets_table', 21),
(120, '2026_05_13_134544_create_external_maintenance_requests_table', 22),
(122, '2026_05_17_121038_make_estimated_amount_nullable_in_external_maintenance_requests_table', 23),
(123, '2026_05_26_202145_create_vendors_table', 24),
(124, '2026_05_26_202146_create_asset_handovers_table', 24),
(125, '2026_05_26_202146_create_locations_table', 24),
(126, '2026_05_26_202146_create_spare_parts_table', 24),
(127, '2026_05_26_202147_add_vendor_location_warranty_to_assets_table', 24),
(128, '2026_05_26_202147_create_maintenance_spare_part_table', 24),
(129, '2026_05_26_220908_add_user_name_to_activity_logs_table', 25),
(130, '2026_05_26_222625_add_status_and_depreciation_to_assets_table', 26),
(131, '2026_05_26_224840_drop_vendor_column_from_assets', 27),
(132, '2026_05_26_230407_create_imports_table', 28),
(133, '2026_05_26_230408_create_exports_table', 28),
(134, '2026_05_26_230409_create_failed_import_rows_table', 28),
(137, '2026_05_26_230901_create_asset_audits_table', 29),
(138, '2026_05_26_230902_create_asset_audit_items_table', 30),
(139, '2026_05_27_084747_rename_notifications_to_asset_notifications', 31),
(140, '2026_06_02_103833_alter_asset_handovers_table_add_action_and_notes_fields', 32),
(141, '2026_06_02_113000_create_asset_replacement_requests_table', 33),
(142, '2026_06_02_114259_add_notes_to_asset_replacement_requests_table', 34),
(143, '2026_06_03_111002_update_position_enum_in_employees_table', 35),
(144, '2026_06_03_113701_add_approver_employee_id_to_asset_replacement_requests_table', 36),
(145, '2026_06_03_113701_add_created_by_employee_to_external_maintenance_requests_table', 36),
(146, '2026_06_14_102343_add_currency_to_external_maintenance_requests_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 4),
(7, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `nas`
--

CREATE TABLE `nas` (
  `id` int NOT NULL,
  `nasname` varchar(128) NOT NULL,
  `shortname` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT 'other',
  `ports` int DEFAULT NULL,
  `secret` varchar(60) NOT NULL DEFAULT 'secret',
  `server` varchar(64) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT 'RADIUS Client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nas`
--

INSERT INTO `nas` (`id`, `nasname`, `shortname`, `type`, `ports`, `secret`, `server`, `community`, `description`) VALUES
(1, '127.0.0.1', 'localhost', 'other', NULL, 'testing123', NULL, NULL, 'RADIUS Client');

-- --------------------------------------------------------

--
-- Table structure for table `nasreload`
--

CREATE TABLE `nasreload` (
  `nasipaddress` varchar(15) NOT NULL,
  `reloadtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('4733470f-59c3-11f1-bafd-1c1bb50177fa', '6', '56', 1, '6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(45, 'عرض الأصول', 'web', '2026-04-18 08:55:15', '2026-04-18 08:55:15'),
(46, 'إنشاء الأصول', 'web', '2026-04-18 08:55:35', '2026-04-18 08:55:35'),
(47, 'تعديل الأصول', 'web', '2026-04-18 08:55:43', '2026-04-18 08:55:43'),
(48, 'حذف الأصول', 'web', '2026-04-18 08:55:47', '2026-04-18 08:55:47'),
(49, 'عرض الإشعارات', 'web', '2026-04-18 08:56:07', '2026-04-18 08:56:15'),
(50, 'تعديل الإشعارات', 'web', '2026-04-18 08:56:29', '2026-04-18 08:56:29'),
(51, 'عرض سجل الأنشطة', 'web', '2026-04-18 09:07:18', '2026-04-18 09:07:18'),
(52, 'عرض طلبات الحذف', 'web', '2026-04-18 09:15:37', '2026-04-18 09:15:37'),
(53, 'تعديل طلبات الحذف', 'web', '2026-04-18 09:15:45', '2026-04-18 09:15:45'),
(54, 'حذف طلبات الحذف', 'web', '2026-04-18 09:15:52', '2026-04-18 09:15:52'),
(55, 'عرض الأقسام', 'web', '2026-04-18 09:22:38', '2026-04-18 09:22:38'),
(56, 'إنشاء قسم', 'web', '2026-04-18 09:22:52', '2026-04-18 09:22:52'),
(57, 'تعديل الأقسام', 'web', '2026-04-18 09:23:05', '2026-04-18 09:23:05'),
(58, 'حذف الأقسام', 'web', '2026-04-18 09:23:11', '2026-04-18 09:23:11'),
(59, 'عرض الصيانات', 'web', '2026-04-18 09:26:19', '2026-04-18 09:26:19'),
(60, 'إنشاء صيانة', 'web', '2026-04-18 09:27:00', '2026-04-18 09:27:00'),
(61, 'تعديل الصيانات', 'web', '2026-04-18 09:27:13', '2026-04-18 09:27:13'),
(62, 'حذف الصيانات', 'web', '2026-04-18 09:27:24', '2026-04-18 09:27:24'),
(63, 'عرض المستخدمين', 'web', '2026-04-18 09:29:47', '2026-04-18 09:29:47'),
(64, 'إنشاء مستخدم', 'web', '2026-04-18 09:29:57', '2026-04-18 09:29:57'),
(65, 'تعديل المستخدمين', 'web', '2026-04-18 09:30:14', '2026-04-18 09:30:14'),
(66, 'حذف المستخدمين', 'web', '2026-04-18 09:30:18', '2026-04-18 09:30:18'),
(67, 'عرض الصلاحيات', 'web', '2026-04-18 18:21:22', '2026-04-18 18:21:22'),
(68, 'إنشاء صلاحية', 'web', '2026-04-18 18:21:41', '2026-04-18 18:21:41'),
(69, 'تعديل الصلاحيات', 'web', '2026-04-18 18:21:53', '2026-04-18 18:21:53'),
(70, 'حذف الصلاحيات', 'web', '2026-04-18 18:21:59', '2026-04-18 18:21:59'),
(71, 'عرض الأدوار', 'web', '2026-04-18 18:23:43', '2026-04-18 18:23:43'),
(72, 'إنشاء دور', 'web', '2026-04-18 18:23:55', '2026-04-18 18:23:55'),
(73, 'تعديل الأدوار', 'web', '2026-04-18 18:24:06', '2026-04-18 18:24:06'),
(74, 'حذف الأدوار', 'web', '2026-04-18 18:24:11', '2026-04-18 18:24:11'),
(75, 'عرض إحصائيات الصيانة', 'web', '2026-04-18 18:28:10', '2026-04-18 18:28:10'),
(76, 'عرض إحصائيات الأصول', 'web', '2026-04-18 18:31:22', '2026-04-18 18:31:22'),
(77, 'عرض جدول الصيانة', 'web', '2026-04-18 18:34:27', '2026-04-18 18:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-06-08 14:40:14', '2025-06-08 14:40:14'),
(2, 'admin2', 'web', '2025-06-08 14:59:24', '2025-06-08 14:59:24'),
(3, 'normal', 'web', '2025-06-23 07:06:02', '2025-06-23 07:06:02'),
(5, 'admin27', 'web', '2025-07-22 13:28:07', '2025-07-22 13:28:07'),
(6, 'user', 'web', '2026-04-18 05:11:39', '2026-04-18 05:11:39'),
(7, 'normal uswe', 'web', '2026-04-18 05:20:43', '2026-04-18 05:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'النظم و المعلومات ', '2026-05-11 08:37:38', '2026-06-18 08:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PzuQMD8no46eky5WWxoa1brOuW1ouh64AIVYecT9', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNjN2RjRpcmJBY0pNbk5SdzFLS0tZOWV1YUUwcFV1Q0JZWDFCOUd5UiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9yZXBsYWNlbWVudC1yZXBvcnQvNy9leHBvcnQiO3M6NToicm91dGUiO3M6MjU6InJlcGxhY2VtZW50LnJlcG9ydC5leHBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiOWY2YzQxNzZkMzA3YzhkYmRkZWRkOTM5ZjY3MGNmNDdlZWM3Y2EyNzBmNzYxYjE2ODE2MTA4YTYwOTI0NDExMSI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1782212864);

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

CREATE TABLE `spare_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spare_parts`
--

INSERT INTO `spare_parts` (`id`, `name`, `part_number`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 'admin', '01235', 20, 20.00, '2026-05-26 18:53:31', '2026-05-26 18:53:31'),
(2, 'ر', 'ب', 1, 0.00, '2026-05-26 19:14:45', '2026-05-27 13:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Test Staff', 'staff@test.com', '$2y$12$QKI8wOL4PeWtsVXKLGuq.ePw5S3HYK/wqlZrG8gR/2ffLPQq0dXlq', '2025-09-12 16:37:35', '2025-09-12 16:37:35'),
(2, 'اسامه', 'os@test.com', '$2y$12$.R5UMexBRpT3T6pi1dNGaefPL21jWGaVo/OCXXBW1kYS8uaqPqGIu', '2025-09-12 16:47:49', '2025-09-12 16:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'asaam4292@gmail.com', NULL, '$2y$12$kumw32iB/.GlSX2KVmKZJ.wyfq7rpYut7Ln3POn6t8kY3uUrgQR2m', 'MX6Xnl5mMunQ2OPkkMq79wbgNyrzk4RS4FJJI5jY1ewgMGEsFRMKYCNAc8Co', '2025-06-01 08:33:16', '2026-06-18 07:29:17'),
(4, 'news editor', 'asasa2@gmail.come', NULL, '$2y$12$xmUqxd8DOJTf/GzfytmnHeZztNB86hLqG1gPX0hXe9HaFWGSN1KaK', 'oYBoZGnd2tZocmguEzWZJe4lFt7e9Nq651T06J3bsEPo8dMqnxPOGJNn6Wee', '2025-06-08 14:48:56', '2026-04-18 05:09:48'),
(5, 'mgd', 'mgd@admin.com', NULL, '$2y$12$Ytbi4N16rIZZwxym/ta01u7YNM/8fn9kH5qV0VUALpxh0FJqIVT0C', 'iy9pIhqEQwTi2Foy1ALbYFoUIsOiKSpiF7tafuDm0rxt12XvIOtHCfIxkaii', '2025-06-23 07:07:12', '2026-04-18 05:21:22'),
(6, 'Admin', 'admin@example.com', NULL, '$2y$12$I9BrrJ9SBOxnrbbtpTiyBuaJb03Yfg/RDbKfga0VSD35Jt7rrjPci', NULL, '2025-07-11 12:14:40', '2025-07-11 12:14:40'),
(7, 'user2', 'user2@asest.com', NULL, '$2y$12$xbW7rn.c6itfWGkyEyM60OFjMpkkgvW6vJkaqPCOsWajj7cKeTzsK', NULL, '2025-07-22 13:26:09', '2025-07-22 13:26:09'),
(8, 'user', 'user@gmail.come', NULL, '$2y$12$qMa4uW23UhOjVqYqlYwkZeGlhsLSki9g3pJMezl09kG4P9dTw.p7e', NULL, '2025-07-25 09:28:57', '2025-07-25 09:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `contact_person`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Osama Ahmed1', 'Osama Ahmed', '0718323599', 'asaam4292@gmail.com', '5aden', '2026-05-26 17:29:56', '2026-05-26 19:24:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrations`
--
ALTER TABLE `administrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_branch`
--
ALTER TABLE `admin_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assets_serial_number_unique` (`serial_number`),
  ADD KEY `assets_department_id_foreign` (`department_id`),
  ADD KEY `assets_employee_id_foreign` (`employee_id`),
  ADD KEY `assets_asset_type_id_foreign` (`asset_type_id`),
  ADD KEY `assets_vendor_id_foreign` (`vendor_id`),
  ADD KEY `assets_location_id_foreign` (`location_id`);

--
-- Indexes for table `asset_audits`
--
ALTER TABLE `asset_audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_audits_department_id_foreign` (`department_id`),
  ADD KEY `asset_audits_location_id_foreign` (`location_id`),
  ADD KEY `asset_audits_user_id_foreign` (`user_id`);

--
-- Indexes for table `asset_audit_items`
--
ALTER TABLE `asset_audit_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_audit_items_asset_audit_id_foreign` (`asset_audit_id`),
  ADD KEY `asset_audit_items_asset_id_foreign` (`asset_id`);

--
-- Indexes for table `asset_deletion_confirmations`
--
ALTER TABLE `asset_deletion_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_deletion_confirmations_asset_id_foreign` (`asset_id`),
  ADD KEY `asset_deletion_confirmations_requested_by_foreign` (`requested_by`);

--
-- Indexes for table `asset_handovers`
--
ALTER TABLE `asset_handovers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_handovers_asset_id_foreign` (`asset_id`),
  ADD KEY `asset_handovers_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `asset_notifications`
--
ALTER TABLE `asset_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_asset_id_foreign` (`asset_id`);

--
-- Indexes for table `asset_replacement_requests`
--
ALTER TABLE `asset_replacement_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_replacement_requests_asset_id_foreign` (`asset_id`),
  ADD KEY `asset_replacement_requests_requester_id_foreign` (`requester_id`),
  ADD KEY `asset_replacement_requests_target_location_id_foreign` (`target_location_id`),
  ADD KEY `asset_replacement_requests_approver_id_foreign` (`approver_id`),
  ADD KEY `asset_replacement_requests_approver_employee_id_foreign` (`approver_employee_id`);

--
-- Indexes for table `asset_types`
--
ALTER TABLE `asset_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_administration_id_foreign` (`administration_id`);

--
-- Indexes for table `department_user`
--
ALTER TABLE `department_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_user_user_id_foreign` (`user_id`),
  ADD KEY `department_user_department_id_foreign` (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_api_token_unique` (`api_token`),
  ADD KEY `employees_department_id_foreign` (`department_id`);

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exports_user_id_foreign` (`user_id`);

--
-- Indexes for table `external_maintenance_requests`
--
ALTER TABLE `external_maintenance_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `external_maintenance_requests_maintenance_request_id_foreign` (`maintenance_request_id`),
  ADD KEY `external_maintenance_requests_created_by_foreign` (`created_by`),
  ADD KEY `external_maintenance_requests_created_by_employee_foreign` (`created_by_employee`);

--
-- Indexes for table `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `failed_import_rows_import_id_foreign` (`import_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imports_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenances_asset_id_foreign` (`asset_id`);

--
-- Indexes for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenance_requests_asset_id_foreign` (`asset_id`),
  ADD KEY `maintenance_requests_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `maintenance_spare_part`
--
ALTER TABLE `maintenance_spare_part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenance_spare_part_maintenance_id_foreign` (`maintenance_id`),
  ADD KEY `maintenance_spare_part_spare_part_id_foreign` (`spare_part_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nas`
--
ALTER TABLE `nas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nasname` (`nasname`);

--
-- Indexes for table `nasreload`
--
ALTER TABLE `nasreload`
  ADD PRIMARY KEY (`nasipaddress`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;

--
-- AUTO_INCREMENT for table `administrations`
--
ALTER TABLE `administrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_branch`
--
ALTER TABLE `admin_branch`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `asset_audits`
--
ALTER TABLE `asset_audits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `asset_audit_items`
--
ALTER TABLE `asset_audit_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `asset_deletion_confirmations`
--
ALTER TABLE `asset_deletion_confirmations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `asset_handovers`
--
ALTER TABLE `asset_handovers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `asset_notifications`
--
ALTER TABLE `asset_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `asset_replacement_requests`
--
ALTER TABLE `asset_replacement_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `asset_types`
--
ALTER TABLE `asset_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department_user`
--
ALTER TABLE `department_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `external_maintenance_requests`
--
ALTER TABLE `external_maintenance_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `maintenance_spare_part`
--
ALTER TABLE `maintenance_spare_part`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `nas`
--
ALTER TABLE `nas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spare_parts`
--
ALTER TABLE `spare_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_asset_type_id_foreign` FOREIGN KEY (`asset_type_id`) REFERENCES `asset_types` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `assets_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assets_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `assets_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `assets_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `asset_audits`
--
ALTER TABLE `asset_audits`
  ADD CONSTRAINT `asset_audits_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `asset_audits_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `asset_audits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `asset_audit_items`
--
ALTER TABLE `asset_audit_items`
  ADD CONSTRAINT `asset_audit_items_asset_audit_id_foreign` FOREIGN KEY (`asset_audit_id`) REFERENCES `asset_audits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asset_audit_items_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `asset_deletion_confirmations`
--
ALTER TABLE `asset_deletion_confirmations`
  ADD CONSTRAINT `asset_deletion_confirmations_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asset_deletion_confirmations_requested_by_foreign` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `asset_handovers`
--
ALTER TABLE `asset_handovers`
  ADD CONSTRAINT `asset_handovers_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asset_handovers_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `asset_notifications`
--
ALTER TABLE `asset_notifications`
  ADD CONSTRAINT `notifications_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `asset_replacement_requests`
--
ALTER TABLE `asset_replacement_requests`
  ADD CONSTRAINT `asset_replacement_requests_approver_employee_id_foreign` FOREIGN KEY (`approver_employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `asset_replacement_requests_approver_id_foreign` FOREIGN KEY (`approver_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `asset_replacement_requests_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asset_replacement_requests_requester_id_foreign` FOREIGN KEY (`requester_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asset_replacement_requests_target_location_id_foreign` FOREIGN KEY (`target_location_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_administration_id_foreign` FOREIGN KEY (`administration_id`) REFERENCES `administrations` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `department_user`
--
ALTER TABLE `department_user`
  ADD CONSTRAINT `department_user_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `exports`
--
ALTER TABLE `exports`
  ADD CONSTRAINT `exports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `external_maintenance_requests`
--
ALTER TABLE `external_maintenance_requests`
  ADD CONSTRAINT `external_maintenance_requests_created_by_employee_foreign` FOREIGN KEY (`created_by_employee`) REFERENCES `employees` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `external_maintenance_requests_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `external_maintenance_requests_maintenance_request_id_foreign` FOREIGN KEY (`maintenance_request_id`) REFERENCES `maintenance_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
  ADD CONSTRAINT `failed_import_rows_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `imports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `maintenances_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD CONSTRAINT `maintenance_requests_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maintenance_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maintenance_spare_part`
--
ALTER TABLE `maintenance_spare_part`
  ADD CONSTRAINT `maintenance_spare_part_maintenance_id_foreign` FOREIGN KEY (`maintenance_id`) REFERENCES `maintenances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maintenance_spare_part_spare_part_id_foreign` FOREIGN KEY (`spare_part_id`) REFERENCES `spare_parts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
