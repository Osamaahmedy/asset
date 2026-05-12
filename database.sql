-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2026 at 11:34 AM
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
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `action`, `model_type`, `model_id`, `model_name`, `department_name`, `created_at`, `updated_at`, `description`) VALUES
(1, 'تم إنشاء أصل', 'App\\Models\\Asset', 4, NULL, NULL, '2025-07-11 14:37:03', '2025-07-11 14:37:03', NULL),
(2, 'تم تعديل أصل', 'App\\Models\\Asset', 4, NULL, NULL, '2025-07-11 14:37:09', '2025-07-11 14:37:09', NULL),
(3, 'تم إنشاء أصل', 'App\\Models\\Asset', 5, NULL, NULL, '2025-07-11 14:39:15', '2025-07-11 14:39:15', NULL),
(4, 'تم تعديل أصل', 'App\\Models\\Asset', 4, NULL, NULL, '2025-07-11 14:39:47', '2025-07-11 14:39:47', NULL),
(5, 'تم تعديل أصل', 'App\\Models\\Asset', 4, NULL, NULL, '2025-07-11 14:40:08', '2025-07-11 14:40:08', NULL),
(6, 'تم تعديل أصل', 'App\\Models\\Asset', 5, NULL, NULL, '2025-07-11 14:49:20', '2025-07-11 14:49:20', NULL),
(7, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 3, NULL, NULL, '2025-07-11 14:54:50', '2025-07-11 14:54:50', NULL),
(8, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 1, NULL, NULL, '2025-07-11 14:55:18', '2025-07-11 14:55:18', NULL),
(9, 'تم إنشاء أصل', 'App\\Models\\Asset', 6, NULL, NULL, '2025-07-11 15:02:41', '2025-07-11 15:02:41', NULL),
(10, 'تم تعديل أصل', 'App\\Models\\Asset', 6, NULL, NULL, '2025-07-11 15:03:08', '2025-07-11 15:03:08', NULL),
(11, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 5, NULL, NULL, '2025-07-11 15:03:46', '2025-07-11 15:03:46', NULL),
(12, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 5, NULL, NULL, '2025-07-11 15:04:08', '2025-07-11 15:04:08', NULL),
(13, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 5, NULL, NULL, '2025-07-11 15:04:23', '2025-07-11 15:04:23', NULL),
(14, 'تم حذف أصل', 'App\\Models\\Asset', 6, NULL, NULL, '2025-07-11 15:04:38', '2025-07-11 15:04:38', NULL),
(15, 'تم تعديل أصل', 'App\\Models\\Asset', 2, NULL, NULL, '2025-07-11 15:05:52', '2025-07-11 15:05:52', NULL),
(16, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 6, NULL, NULL, '2025-07-11 15:07:16', '2025-07-11 15:07:16', NULL),
(17, 'تم إنشاء أصل', 'App\\Models\\Asset', 7, NULL, NULL, '2025-07-11 15:35:31', '2025-07-11 15:35:31', NULL),
(18, 'تم إنشاء أصل', 'App\\Models\\Asset', 8, NULL, NULL, '2025-07-12 07:38:26', '2025-07-12 07:38:26', NULL),
(19, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 7, NULL, NULL, '2025-07-12 07:39:57', '2025-07-12 07:39:57', NULL),
(20, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, '2025-07-12 07:40:51', '2025-07-12 07:40:51', NULL),
(21, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, '2025-07-12 07:40:53', '2025-07-12 07:40:53', NULL),
(22, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, '2025-07-12 07:40:54', '2025-07-12 07:40:54', NULL),
(23, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, '2025-07-12 07:48:00', '2025-07-12 07:48:00', NULL),
(24, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, '2025-07-12 07:49:25', '2025-07-12 07:49:25', NULL),
(25, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 8, NULL, NULL, '2025-07-12 07:51:40', '2025-07-12 07:51:40', NULL),
(26, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, '2025-07-12 07:52:42', '2025-07-12 07:52:42', NULL),
(27, 'تم تعديل أصل', 'App\\Models\\Asset', 8, NULL, NULL, '2025-07-12 07:55:28', '2025-07-12 07:55:28', NULL),
(28, 'تم حذف أصل', 'App\\Models\\Asset', 1, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(29, 'تم حذف أصل', 'App\\Models\\Asset', 2, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(30, 'تم حذف أصل', 'App\\Models\\Asset', 5, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(31, 'تم حذف أصل', 'App\\Models\\Asset', 7, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(32, 'تم حذف أصل', 'App\\Models\\Asset', 8, NULL, NULL, '2025-07-12 07:55:59', '2025-07-12 07:55:59', NULL),
(33, 'تم إنشاء أصل', 'App\\Models\\Asset', 9, NULL, NULL, '2025-07-12 07:57:16', '2025-07-12 07:57:16', NULL),
(34, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, '2025-07-12 07:58:00', '2025-07-12 07:58:00', NULL),
(35, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 10, NULL, NULL, '2025-07-12 07:58:34', '2025-07-12 07:58:34', NULL),
(36, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, '2025-07-12 07:59:42', '2025-07-12 07:59:42', NULL),
(37, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, '2025-07-12 08:00:58', '2025-07-12 08:00:58', NULL),
(38, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 11, NULL, NULL, '2025-07-12 08:02:02', '2025-07-12 08:02:02', NULL),
(39, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, '2025-07-12 08:07:54', '2025-07-12 08:07:54', NULL),
(40, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, '2025-07-12 08:08:22', '2025-07-12 08:08:22', NULL),
(41, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, '2025-07-12 08:08:23', '2025-07-12 08:08:23', NULL),
(42, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, '2025-07-12 08:11:49', '2025-07-12 08:11:49', NULL),
(43, 'تم تعديل أصل', 'App\\Models\\Asset', 9, NULL, NULL, '2025-07-12 08:13:25', '2025-07-12 08:13:25', NULL),
(44, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 9, NULL, NULL, '2025-07-12 08:14:28', '2025-07-12 08:14:28', NULL),
(45, 'تم إنشاء أصل', 'App\\Models\\Asset', 10, NULL, NULL, '2025-07-12 08:56:35', '2025-07-12 08:56:35', NULL),
(46, 'تم تعديل أصل', 'App\\Models\\Asset', 10, NULL, NULL, '2025-07-12 08:57:20', '2025-07-12 08:57:20', NULL),
(47, 'تم إنشاء أصل', 'App\\Models\\Asset', 11, NULL, NULL, '2025-07-12 15:12:23', '2025-07-12 15:12:23', NULL),
(48, 'تم تعديل أصل', 'App\\Models\\Asset', 11, NULL, NULL, '2025-07-12 15:12:43', '2025-07-12 15:12:43', NULL),
(49, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 12, NULL, NULL, '2025-07-12 15:13:41', '2025-07-12 15:13:41', NULL),
(50, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 12, NULL, NULL, '2025-07-12 15:14:14', '2025-07-12 15:14:14', NULL),
(51, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 12, NULL, NULL, '2025-07-12 15:15:20', '2025-07-12 15:15:20', NULL),
(52, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, '2025-07-14 14:59:39', '2025-07-14 14:59:39', NULL),
(53, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, '2025-07-14 15:00:24', '2025-07-14 15:00:24', NULL),
(54, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, '2025-07-14 15:01:11', '2025-07-14 15:01:11', NULL),
(55, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, '2025-07-14 15:05:37', '2025-07-14 15:05:37', NULL),
(56, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, '2025-07-14 15:05:43', '2025-07-14 15:05:43', NULL),
(57, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, '2025-07-14 15:06:12', '2025-07-14 15:06:12', NULL),
(58, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, '2025-07-14 15:06:25', '2025-07-14 15:06:25', NULL),
(59, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, '2025-07-14 15:06:52', '2025-07-14 15:06:52', NULL),
(60, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 13, NULL, NULL, '2025-07-14 15:07:10', '2025-07-14 15:07:10', NULL),
(61, 'تم تعديل أصل', 'App\\Models\\Asset', 10, NULL, NULL, '2025-07-14 15:07:55', '2025-07-14 15:07:55', NULL),
(62, 'تم حذف أصل', 'App\\Models\\Asset', 10, NULL, NULL, '2025-07-14 16:37:29', '2025-07-14 16:37:29', NULL),
(63, 'تم إنشاء أصل', 'App\\Models\\Asset', 14, NULL, NULL, '2025-07-14 16:53:26', '2025-07-14 16:53:26', NULL),
(64, 'تم تعديل أصل', 'App\\Models\\Asset', 14, NULL, NULL, '2025-07-14 16:54:01', '2025-07-14 16:54:01', NULL),
(65, 'تم حذف أصل', 'App\\Models\\Asset', 14, NULL, NULL, '2025-07-14 16:54:48', '2025-07-14 16:54:48', NULL),
(66, 'تم حذف أصل', 'App\\Models\\Asset', 13, NULL, NULL, '2025-07-14 16:59:01', '2025-07-14 16:59:01', NULL),
(67, 'تم حذف أصل', 'App\\Models\\Asset', 13, NULL, NULL, '2025-07-14 16:59:01', '2025-07-14 16:59:01', NULL),
(68, 'تم حذف أصل', 'App\\Models\\Asset', 12, NULL, NULL, '2025-07-14 17:02:04', '2025-07-14 17:02:04', 'اسم الأصل: admin'),
(69, 'تم حذف أصل', 'App\\Models\\Asset', 12, NULL, NULL, '2025-07-14 17:02:04', '2025-07-14 17:02:04', NULL),
(70, 'تم تعديل أصل', 'App\\Models\\Asset', 9, NULL, NULL, '2025-07-14 17:17:22', '2025-07-14 17:17:22', NULL),
(71, 'تم تعديل أصل', 'App\\Models\\Asset', 11, NULL, NULL, '2025-07-14 17:33:37', '2025-07-14 17:33:37', NULL),
(72, 'تم تعديل أصل', 'App\\Models\\Asset', 9, NULL, NULL, '2025-07-14 17:34:16', '2025-07-14 17:34:16', NULL),
(73, 'تم حذف أصل', 'App\\Models\\Asset', 9, NULL, NULL, '2025-07-14 17:35:22', '2025-07-14 17:35:22', 'اسم الأصل: مكيف'),
(74, 'تم حذف أصل', 'App\\Models\\Asset', 9, NULL, NULL, '2025-07-14 17:35:22', '2025-07-14 17:35:22', NULL),
(75, 'تم حذف أصل', 'App\\Models\\Asset', 11, NULL, NULL, '2025-07-14 17:35:29', '2025-07-14 17:35:29', 'اسم الأصل: سلك'),
(76, 'تم حذف أصل', 'App\\Models\\Asset', 11, NULL, NULL, '2025-07-14 17:35:30', '2025-07-14 17:35:30', NULL),
(77, 'تم إنشاء أصل', 'App\\Models\\Asset', 15, NULL, NULL, '2025-07-14 17:45:29', '2025-07-14 17:45:29', NULL),
(78, 'تم إنشاء أصل', 'App\\Models\\Asset', 16, NULL, NULL, '2025-07-14 17:46:31', '2025-07-14 17:46:31', NULL),
(79, 'تم إنشاء أصل', 'App\\Models\\Asset', 17, NULL, NULL, '2025-07-14 17:50:15', '2025-07-14 17:50:15', NULL),
(80, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 14, NULL, NULL, '2025-07-14 17:52:52', '2025-07-14 17:52:52', NULL),
(81, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 14, NULL, NULL, '2025-07-14 17:53:51', '2025-07-14 17:53:51', NULL),
(82, 'تم حذف أصل', 'App\\Models\\Asset', 15, NULL, NULL, '2025-07-14 17:57:59', '2025-07-14 17:57:59', 'اسم الأصل: تلاجه'),
(83, 'تم حذف أصل', 'App\\Models\\Asset', 17, NULL, NULL, '2025-07-19 18:50:40', '2025-07-19 18:50:40', 'اسم الأصل: رشاش ماء'),
(84, 'تم تعديل أصل', 'App\\Models\\Asset', 16, NULL, NULL, '2025-07-19 18:56:20', '2025-07-19 18:56:20', NULL),
(85, 'تم تعديل أصل', 'App\\Models\\Asset', 16, NULL, NULL, '2025-07-19 19:14:25', '2025-07-19 19:14:25', NULL),
(86, 'تم إنشاء صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:19:59', '2025-07-19 19:19:59', NULL),
(87, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:28:51', '2025-07-19 19:28:51', NULL),
(88, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:29:18', '2025-07-19 19:29:18', NULL),
(89, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:29:37', '2025-07-19 19:29:37', NULL),
(90, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:30:41', '2025-07-19 19:30:41', NULL),
(91, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:31:12', '2025-07-19 19:31:12', NULL),
(92, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:31:13', '2025-07-19 19:31:13', NULL),
(93, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:31:14', '2025-07-19 19:31:14', NULL),
(94, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:31:14', '2025-07-19 19:31:14', NULL),
(95, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:31:14', '2025-07-19 19:31:14', NULL),
(96, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:31:15', '2025-07-19 19:31:15', NULL),
(97, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:31:15', '2025-07-19 19:31:15', NULL),
(98, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:31:20', '2025-07-19 19:31:20', NULL),
(99, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:32:25', '2025-07-19 19:32:25', NULL),
(100, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:34:51', '2025-07-19 19:34:51', NULL),
(101, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:40:14', '2025-07-19 19:40:14', NULL),
(102, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:41:49', '2025-07-19 19:41:49', NULL),
(103, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:41:50', '2025-07-19 19:41:50', NULL),
(104, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:43:34', '2025-07-19 19:43:34', NULL),
(105, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:43:56', '2025-07-19 19:43:56', NULL),
(106, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:44:23', '2025-07-19 19:44:23', NULL),
(107, 'تم تعديل صيانة', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:44:24', '2025-07-19 19:44:24', NULL),
(108, 'Maintenance updated', 'App\\Models\\Maintenance', 15, NULL, NULL, '2025-07-19 19:52:34', '2025-07-19 19:52:34', NULL),
(109, 'Maintenance created', 'App\\Models\\Maintenance', 16, NULL, NULL, '2025-07-19 19:54:52', '2025-07-19 19:54:52', NULL),
(110, 'Maintenance updated', 'App\\Models\\Maintenance', 16, NULL, NULL, '2025-07-19 19:55:05', '2025-07-19 19:55:05', NULL),
(111, 'Maintenance created', 'App\\Models\\Maintenance', 17, NULL, NULL, '2025-07-19 19:55:52', '2025-07-19 19:55:52', NULL),
(112, 'Asset updated', 'App\\Models\\Asset', 16, NULL, NULL, '2025-07-19 19:56:13', '2025-07-19 19:56:13', NULL),
(113, 'Asset created', 'App\\Models\\Asset', 18, NULL, NULL, '2025-07-19 19:57:06', '2025-07-19 19:57:06', NULL),
(114, 'Asset deleted', 'App\\Models\\Asset', 18, NULL, NULL, '2025-07-19 19:58:10', '2025-07-19 19:58:10', 'Asset Name: ي'),
(115, 'Asset created', 'App\\Models\\Asset', 19, NULL, NULL, '2025-07-22 13:08:29', '2025-07-22 13:08:29', NULL),
(116, 'Asset updated', 'App\\Models\\Asset', 19, NULL, NULL, '2025-07-22 13:08:54', '2025-07-22 13:08:54', NULL),
(117, 'Maintenance created', 'App\\Models\\Maintenance', 18, NULL, NULL, '2025-07-22 13:17:24', '2025-07-22 13:17:24', NULL),
(118, 'Maintenance created', 'App\\Models\\Maintenance', 19, NULL, NULL, '2025-07-22 13:18:20', '2025-07-22 13:18:20', NULL),
(119, 'Maintenance updated', 'App\\Models\\Maintenance', 18, NULL, NULL, '2025-07-22 13:18:49', '2025-07-22 13:18:49', NULL),
(120, 'Asset deleted', 'App\\Models\\Asset', 16, NULL, NULL, '2025-07-22 13:21:56', '2025-07-22 13:21:56', 'Asset Name: مكيف'),
(121, 'Asset created', 'App\\Models\\Asset', 20, NULL, NULL, '2025-07-22 14:47:34', '2025-07-22 14:47:34', NULL),
(122, 'Asset updated', 'App\\Models\\Asset', 20, NULL, NULL, '2026-03-08 18:04:38', '2026-03-08 18:04:38', NULL),
(123, 'Asset deleted', 'App\\Models\\Asset', 20, NULL, NULL, '2026-03-08 18:06:11', '2026-03-08 18:06:11', 'Asset Name: test'),
(124, 'Maintenance created', 'App\\Models\\Maintenance', 20, NULL, NULL, '2026-03-08 18:07:54', '2026-03-08 18:07:54', NULL),
(125, 'Asset created', 'App\\Models\\Asset', 21, NULL, NULL, '2026-04-18 05:14:06', '2026-04-18 05:14:06', NULL),
(126, 'Asset updated', 'App\\Models\\Asset', 21, NULL, NULL, '2026-04-18 05:14:56', '2026-04-18 05:14:56', NULL),
(127, 'Maintenance created', 'App\\Models\\Maintenance', 21, NULL, NULL, '2026-04-18 05:17:37', '2026-04-18 05:17:37', NULL),
(128, 'Asset deleted', 'App\\Models\\Asset', 21, NULL, NULL, '2026-04-18 05:19:20', '2026-04-18 05:19:20', 'Asset Name: lab'),
(129, 'Asset created', 'App\\Models\\Asset', 22, NULL, NULL, '2026-04-18 08:44:42', '2026-04-18 08:44:42', NULL),
(130, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, '2026-04-18 08:44:47', '2026-04-18 08:44:47', NULL),
(131, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, '2026-04-18 08:45:02', '2026-04-18 08:45:02', NULL),
(132, 'Asset updated', 'App\\Models\\Asset', 19, NULL, NULL, '2026-04-18 08:45:34', '2026-04-18 08:45:34', NULL),
(133, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, '2026-04-18 08:47:40', '2026-04-18 08:47:40', NULL),
(134, 'Asset updated', 'App\\Models\\Asset', 19, NULL, NULL, '2026-04-18 08:49:27', '2026-04-18 08:49:27', NULL),
(135, 'Asset created', 'App\\Models\\Asset', 23, NULL, NULL, '2026-04-18 08:49:55', '2026-04-18 08:49:55', NULL),
(136, 'Asset updated', 'App\\Models\\Asset', 23, NULL, NULL, '2026-04-18 08:50:04', '2026-04-18 08:50:04', NULL),
(137, 'Asset updated', 'App\\Models\\Asset', 23, NULL, NULL, '2026-04-18 08:50:42', '2026-04-18 08:50:42', NULL),
(138, 'Asset updated', 'App\\Models\\Asset', 23, NULL, NULL, '2026-04-18 08:50:52', '2026-04-18 08:50:52', NULL),
(139, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, '2026-04-18 09:03:06', '2026-04-18 09:03:06', NULL),
(140, 'Asset updated', 'App\\Models\\Asset', 22, NULL, NULL, '2026-04-18 09:03:16', '2026-04-18 09:03:16', NULL),
(141, 'Asset created', 'App\\Models\\Asset', 24, NULL, NULL, '2026-04-18 09:08:18', '2026-04-18 09:08:18', NULL),
(142, 'Asset created', 'App\\Models\\Asset', 25, 'ث', 'new', '2026-04-18 09:12:24', '2026-04-18 09:12:24', NULL),
(143, 'Asset updated', 'App\\Models\\Asset', 25, 'ث', 'new', '2026-04-18 09:12:50', '2026-04-18 09:12:50', NULL),
(144, 'Maintenance created', 'App\\Models\\Maintenance', 22, 'صيانة: ث', 'new', '2026-04-18 09:13:19', '2026-04-18 09:13:19', NULL),
(145, 'Asset deleted', 'App\\Models\\Asset', 25, 'ث', 'new', '2026-04-18 09:16:19', '2026-04-18 09:16:19', 'تم حذف الأصل: ث'),
(146, 'Maintenance created', 'App\\Models\\Maintenance', 23, 'صيانة: Osama Ahmed', 'new', '2026-04-18 09:27:56', '2026-04-18 09:27:56', NULL),
(147, 'Asset updated', 'App\\Models\\Asset', 19, 'phone', 'test', '2026-05-11 05:57:54', '2026-05-11 05:57:54', NULL),
(148, 'Asset updated', 'App\\Models\\Asset', 19, 'phone', 'test', '2026-05-11 05:58:22', '2026-05-11 05:58:22', NULL),
(149, 'Maintenance created', 'App\\Models\\Maintenance', 24, 'صيانة: phone', 'test', '2026-05-11 05:58:51', '2026-05-11 05:58:51', NULL),
(150, 'Maintenance updated', 'App\\Models\\Maintenance', 24, 'صيانة: phone', 'test', '2026-05-11 05:59:08', '2026-05-11 05:59:08', NULL),
(151, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', 'new', '2026-05-11 06:23:03', '2026-05-11 06:23:03', NULL),
(152, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', 'new', '2026-05-11 10:55:56', '2026-05-11 10:55:56', NULL),
(153, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', 'new', '2026-05-11 11:02:40', '2026-05-11 11:02:40', NULL),
(154, 'maintenance', 'App\\Models\\Asset', 23, 'Osama Ahmed', 'new', '2026-05-11 13:39:47', '2026-05-11 13:39:47', 'طلب صيانة جديد من: سامر — الأولوية: متوسط — عطل بالمروحة'),
(155, 'maintenance', 'App\\Models\\Asset', 23, 'Osama Ahmed', 'new', '2026-05-11 13:41:53', '2026-05-11 13:41:53', 'اكتمل طلب الصيانة — مرسل الطلب: سامر'),
(156, 'maintenance', 'App\\Models\\Asset', 23, 'Osama Ahmed', 'new', '2026-05-11 13:47:19', '2026-05-11 13:47:19', 'طلب صيانة جديد من: سامر — الأولوية: متوسط — عطل بالمروحة'),
(157, 'Asset updated', 'App\\Models\\Asset', 24, 'lenove-e456', 'new', '2026-05-11 13:47:53', '2026-05-11 13:47:53', NULL),
(158, 'maintenance', 'App\\Models\\Asset', 24, 'lenove-e456', 'new', '2026-05-11 13:48:02', '2026-05-11 13:48:02', 'طلب صيانة جديد من: سامر — الأولوية: متوسط — عطل بالمروحة'),
(159, 'updated', 'App\\Models\\Asset', 24, 'lenove-e456', 'new', '2026-05-11 14:34:11', '2026-05-11 14:34:11', 'تم تأجيل طلب الصيانة — مرسل الطلب: سامر'),
(160, 'maintenance', 'App\\Models\\Asset', 24, 'lenove-e456', 'new', '2026-05-11 14:34:29', '2026-05-11 14:34:29', 'اكتمل طلب الصيانة — مرسل الطلب: سامر'),
(161, 'maintenance', 'App\\Models\\Asset', 24, 'lenove-e456', 'new', '2026-05-11 15:23:26', '2026-05-11 15:23:26', 'طلب صيانة جديد من: حسام — الأولوية: عالي — عطل بالمروحة'),
(162, 'Asset updated', 'App\\Models\\Asset', 23, 'Osama Ahmed', 'new', '2026-05-11 15:24:48', '2026-05-11 15:24:48', NULL);

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
(1, '5', 1, '2026-05-11 08:37:46', '2026-05-11 08:37:46');

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
  `purchase_date` date NOT NULL,
  `maintenance_due_date` date DEFAULT NULL,
  `maintenance_cycle_months` int NOT NULL DEFAULT '3',
  `last_maintenance_date` date DEFAULT NULL,
  `maintenance_interval_months` int UNSIGNED NOT NULL DEFAULT '3',
  `price` decimal(10,2) NOT NULL,
  `vendor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `maintenance_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'جيدة',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `asset_type_id`, `purchase_date`, `maintenance_due_date`, `maintenance_cycle_months`, `last_maintenance_date`, `maintenance_interval_months`, `price`, `vendor`, `serial_number`, `department_id`, `employee_id`, `maintenance_status`, `created_at`, `updated_at`) VALUES
(19, 'phone', NULL, '2025-07-22', '2026-04-02', 3, '2026-05-11', 3, 5000.00, 'ali', 'ASSET-687FB77CDDE08', 2, NULL, 'جيدة', '2025-07-22 13:08:28', '2026-05-11 05:59:08'),
(22, '7', NULL, '2026-04-18', '2026-04-21', 1, '2026-04-18', 3, 50.00, 'ء', 'ASSET-69E36EA9E3AD3', 1, NULL, 'جيدة', '2026-04-18 08:44:41', '2026-04-18 09:03:16'),
(23, 'Osama Ahmed', 1, '2026-04-18', '2026-07-18', 9, '2026-05-11', 3, 864.00, '5465', 'ASSET-69E36FE3069AA', 3, 2, 'جيدة', '2026-04-18 08:49:55', '2026-05-11 15:24:48'),
(24, 'lenove-e456', 1, '2026-04-18', '2026-07-18', 3, '2026-05-11', 3, 5.00, 'ص', 'ASSET-69E3743262318', 3, 1, 'جيدة', '2026-04-18 09:08:18', '2026-05-11 14:34:29');

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
(1, 'lab', '2026-05-11 11:02:35', '2026-05-11 11:02:35');

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
('asset_cache_blocked:ip:10.0.252.231', 'b:1;', 1778526244),
('asset_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1778571502),
('asset_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1778571502;', 1778571502),
('asset_cache_rate_limit:login:ip:10.0.252.231', 'i:5;', 1778522662),
('asset_cache_rate_limit:login:ip:127.0.0.1', 'i:1;', 1778574239),
('asset_cache_rate_limit:read:token:cTfBxR89UqSSHMlwXrEMn1M3JpJvHIn2XrY7wK78Pi9vyuRb1OO5fObucKtA', 'i:16;', 1778522218),
('asset_cache_rate_limit:read:token:omG15neWBbA8ABtG1vBskL3fF7jfKMkpugK8buHr51a1OZINAWBQzAsthVah', 'i:2;', 1778574385),
('asset_cache_rate_limit:write:token:bV8CXnszbCh4ZDOEpn1K9C98L68feVV4OA3b7nJB1zBxYR4ENGZhNvFmdNKM', 'i:1;', 1778523866),
('asset_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:33:{i:0;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:19:\"عرض الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:23:\"إنشاء الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:23:\"تعديل الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:19:\"حذف الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:25:\"عرض الإشعارات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:29:\"تعديل الإشعارات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:28:\"عرض سجل الأنشطة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:28:\"عرض طلبات الحذف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:32:\"تعديل طلبات الحذف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:28:\"حذف طلبات الحذف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:21:\"عرض الأقسام\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:17:\"إنشاء قسم\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:25:\"تعديل الأقسام\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:21:\"حذف الأقسام\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:23:\"عرض الصيانات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:21:\"إنشاء صيانة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:27:\"تعديل الصيانات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:23:\"حذف الصيانات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:27:\"عرض المستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:23:\"إنشاء مستخدم\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:31:\"تعديل المستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:27:\"حذف المستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:25:\"عرض الصلاحيات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:23:\"إنشاء صلاحية\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:29:\"تعديل الصلاحيات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:25:\"حذف الصلاحيات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:21:\"عرض الأدوار\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:17:\"إنشاء دور\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:25:\"تعديل الأدوار\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:21:\"حذف الأدوار\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:38:\"عرض إحصائيات الصيانة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:36:\"عرض إحصائيات الأصول\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:30:\"عرض جدول الصيانة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1778609783),
('asset_cache_violations:ip:10.0.252.231', 'i:10;', 1778526244),
('asset_cache_violations:ip:127.0.0.1', 'i:10;', 1778525951);

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
(3, 'new', 1, '2025-07-14 17:44:18', '2026-05-11 14:17:44'),
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
(7, 1, 3, NULL, NULL),
(10, 1, 2, NULL, NULL),
(11, 1, 4, NULL, NULL),
(12, 7, 1, NULL, NULL),
(13, 8, 1, NULL, NULL),
(14, 1, 5, NULL, NULL),
(15, 1, 6, NULL, NULL),
(16, 4, 1, NULL, NULL),
(17, 5, 1, NULL, NULL);

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
  `position` enum('employee','office_manager') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'employee',
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `password`, `api_token`, `priority`, `position`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'سامر', '718323599', '$2y$12$c775eziw6ID9C6Ls5m2rg.SZdrnaoEPDuhnTyb7lW7u8a5ukR4QDK', 'NL2cRoPcC1Uj6fleSnLaiDvBUC5tLoMZk5hVIVecKkBS1gzX3LUoagAZBwyM', 'medium', 'employee', 3, '2026-05-11 10:55:38', '2026-05-11 15:03:28'),
(2, 'حسام', '7183235995', '$2y$12$XJ7GUZ/GO7pUsR2OA.NHa..T2JvQ7VtO0XoFAfYejKEvGfCCgUloy', 'omG15neWBbA8ABtG1vBskL3fF7jfKMkpugK8buHr51a1OZINAWBQzAsthVah', 'high', 'office_manager', 3, '2026-05-11 15:17:41', '2026-05-12 05:23:00');

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
(24, 19, NULL, '2026-05-11', 'Maintenance Completed', '2026-05-11 05:58:51', '2026-05-11 05:59:08');

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
(2, 23, 1, '2026-04-30', 'عطل بالمروحة', 'medium', 'pending', NULL, NULL, '2026-05-11 13:47:19', '2026-05-11 13:47:19'),
(3, 24, 1, '2026-04-30', 'عطل بالمروحة', 'medium', 'completed', '6', '7', '2026-05-11 13:48:02', '2026-05-11 14:34:29'),
(4, 24, 2, '2026-04-30', 'عطل بالمروحة', 'high', 'pending', NULL, NULL, '2026-05-11 15:23:26', '2026-05-11 15:23:26');

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
(118, '2026_05_11_162630_create_maintenance_requests_table', 20);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `asset_id`, `status`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(26, 19, '🔔 Less than two months', 'Maintenance Alert: Asset phone status is 🔔 Less than two months', 1, '2025-07-22 13:18:49', '2025-11-28 11:13:30'),
(29, 23, '❌ Overdue', 'Maintenance Alert: Asset Osama Ahmed status is ❌ Overdue', 0, '2026-04-18 08:50:42', '2026-04-18 08:56:56'),
(30, 22, '❓ Unknown', 'Maintenance Alert: Asset 7 status is ❓ Unknown', 0, '2026-04-18 09:03:06', '2026-04-18 09:03:06'),
(31, 22, '⚠️ Less than a month', 'Maintenance Alert: Asset 7 status is ⚠️ Less than a month', 0, '2026-04-18 09:03:16', '2026-04-18 09:03:16'),
(32, 19, '❌ Overdue', 'Maintenance Alert: Asset phone status is ❌ Overdue', 0, '2026-05-11 05:58:22', '2026-05-11 05:58:22'),
(33, 24, '❌ Overdue', 'Maintenance Alert: Asset lenove-e456 status is ❌ Overdue', 0, '2026-05-11 13:47:53', '2026-05-11 13:47:53');

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
(1, '45', '2026-05-11 08:37:38', '2026-05-11 08:37:38');

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
('HOZmpwmzVLbWoLXrLYm7kPN3yGZQBsWURvQtF8G1', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQm5qNXBuZTlrN1dqdDdtZ0dsUGpaVHY1ZE5nMmU0bnR5Z0tqZ3lwdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9hZG1pbi9hc3NldHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJFFCWEdJTFkzVGtId2c3NXdHM2ouQk9KV1M5OG1ndTVYeUpkMjFTUy5uVDRvTElLTml6WEVPIjtzOjg6ImZpbGFtZW50IjthOjA6e319', 1778523952),
('LLKVWmPp0xYvTmY382HFi55MkRkUHUjnlaBEx0Pf', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiOFZQM3JmZUVEcTI5Z3JrSnZ4alJ5TXl4alZUeHg5eDNpSURQSkdPYyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vYWN0aXZpdHktbG9ncyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRRQlhHSUxZM1RrSHdnNzV3RzNqLkJPSldTOThtZ3U1WHlKZDIxU1MublQ0b0xJS05pelhFTyI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1778520874),
('TSyvRVMvzfQfdlfklWRDWmTJaBQ1nJmOwrh3dI1o', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSFRFVFlDMkpVZThTWTBGTU1iM3RndHd4ZFRGV243M1NLTzhabmxTbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkUUJYR0lMWTNUa0h3Zzc1d0czai5CT0pXUzk4bWd1NVh5SmQyMVNTLm5UNG9MSUtOaXpYRU8iO30=', 1778576163);

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
(1, 'admin', 'asaam4292@gmail.com', NULL, '$2y$12$QBXGILY3TkHwg75wG3j.BOJWS98mgu5XyJd21SS.nT4oLIKNizXEO', 'pwhPbJD46VuJoM9A4Q3a3o6cXUqkeO1ypajziobN9ac9GQLL6vTSk3Xjpv9p', '2025-06-01 08:33:16', '2025-07-11 12:34:10'),
(4, 'news editor', 'asasa2@gmail.come', NULL, '$2y$12$xmUqxd8DOJTf/GzfytmnHeZztNB86hLqG1gPX0hXe9HaFWGSN1KaK', 'oYBoZGnd2tZocmguEzWZJe4lFt7e9Nq651T06J3bsEPo8dMqnxPOGJNn6Wee', '2025-06-08 14:48:56', '2026-04-18 05:09:48'),
(5, 'mgd', 'mgd@admin.com', NULL, '$2y$12$Ytbi4N16rIZZwxym/ta01u7YNM/8fn9kH5qV0VUALpxh0FJqIVT0C', 'iy9pIhqEQwTi2Foy1ALbYFoUIsOiKSpiF7tafuDm0rxt12XvIOtHCfIxkaii', '2025-06-23 07:07:12', '2026-04-18 05:21:22'),
(6, 'Admin', 'admin@example.com', NULL, '$2y$12$I9BrrJ9SBOxnrbbtpTiyBuaJb03Yfg/RDbKfga0VSD35Jt7rrjPci', NULL, '2025-07-11 12:14:40', '2025-07-11 12:14:40'),
(7, 'user2', 'user2@asest.com', NULL, '$2y$12$xbW7rn.c6itfWGkyEyM60OFjMpkkgvW6vJkaqPCOsWajj7cKeTzsK', NULL, '2025-07-22 13:26:09', '2025-07-22 13:26:09'),
(8, 'user', 'user@gmail.come', NULL, '$2y$12$qMa4uW23UhOjVqYqlYwkZeGlhsLSki9g3pJMezl09kG4P9dTw.p7e', NULL, '2025-07-25 09:28:57', '2025-07-25 09:28:57');

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
  ADD KEY `assets_asset_type_id_foreign` (`asset_type_id`);

--
-- Indexes for table `asset_deletion_confirmations`
--
ALTER TABLE `asset_deletion_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_deletion_confirmations_asset_id_foreign` (`asset_id`),
  ADD KEY `asset_deletion_confirmations_requested_by_foreign` (`requested_by`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `notifications_asset_id_foreign` (`asset_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `asset_deletion_confirmations`
--
ALTER TABLE `asset_deletion_confirmations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `nas`
--
ALTER TABLE `nas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_asset_type_id_foreign` FOREIGN KEY (`asset_type_id`) REFERENCES `asset_types` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `assets_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assets_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `asset_deletion_confirmations`
--
ALTER TABLE `asset_deletion_confirmations`
  ADD CONSTRAINT `asset_deletion_confirmations_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asset_deletion_confirmations_requested_by_foreign` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE;

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
