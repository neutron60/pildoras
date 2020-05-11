-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2020 at 07:22 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pildoras`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `section_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'socket 1150', 1, 1, NULL, '2020-05-03 02:42:51', '2020-05-03 02:42:51'),
(2, 'socket 1155', 1, 1, NULL, '2020-05-03 18:57:56', '2020-05-03 18:57:56'),
(3, 'hombre', 1, 6, NULL, '2020-05-03 18:58:52', '2020-05-03 18:58:52'),
(4, 'mujer', 1, 6, NULL, '2020-05-03 18:59:18', '2020-05-03 18:59:18'),
(5, 'hombre', 1, 7, NULL, '2020-05-03 19:01:18', '2020-05-03 19:01:18'),
(6, 'mujer', 1, 7, NULL, '2020-05-03 19:01:38', '2020-05-03 19:01:38'),
(7, 'hombre', 1, 8, NULL, '2020-05-03 19:01:58', '2020-05-03 19:01:58'),
(8, 'mujer', 1, 8, NULL, '2020-05-03 19:02:24', '2020-05-03 19:02:24'),
(9, 'ninos', 1, 8, NULL, '2020-05-03 19:02:39', '2020-05-03 19:02:39'),
(10, 'repuestos', 1, 11, NULL, '2020-05-03 19:03:16', '2020-05-03 19:03:16'),
(11, 'accesorios', 1, 11, NULL, '2020-05-03 19:03:41', '2020-05-03 19:03:41'),
(12, 'repuestos', 1, 12, NULL, '2020-05-03 19:03:58', '2020-05-03 19:03:58'),
(13, 'accesorios', 1, 12, NULL, '2020-05-03 19:04:14', '2020-05-03 19:04:14'),
(14, 'chutos', 1, 12, NULL, '2020-05-03 19:04:38', '2020-05-03 19:04:38'),
(15, 'indoor', 1, 9, NULL, '2020-05-03 19:05:38', '2020-05-03 19:05:38'),
(16, 'outdoor', 1, 9, NULL, '2020-05-03 19:05:57', '2020-05-03 19:05:57'),
(17, 'implementos', 1, 10, NULL, '2020-05-03 19:06:42', '2020-05-03 19:06:42'),
(18, 'uniformes', 1, 10, NULL, '2020-05-03 19:06:58', '2020-05-03 19:06:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_section_id_foreign` (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
