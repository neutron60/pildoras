-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2020 at 01:10 PM
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
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactivo',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `title`, `description`, `image`, `category`, `department_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tarjeta madre', 'tarjetas madres de ultima generacion', 'Tarjetas madres para su PC o laptop, la ultima tecnologia', 'http://pildoras.test/images/Srs1kWgHiSwPOjjarBuoaa6UmZzc4laKRuNZFt2s.jpeg', 'socket 1150', 1, 'activo', NULL, '2020-05-01 01:44:14', '2020-05-01 01:44:14'),
(2, 'tarjeta madre', 'tarjetas madres de ultima generacion', 'Tarjetas madres para su PC o laptop, la ultima tecnologia', 'http://pildoras.test/images/Srs1kWgHiSwPOjjarBuoaa6UmZzc4laKRuNZFt2s.jpeg', 'socket 1155', 1, 'activo', NULL, '2020-05-01 21:31:50', '2020-05-01 21:31:50'),
(3, 'memoria ram', 'memorias ram para pc o laptop', 'mejore el rendimiento de su pc actualizando su memoria ram', 'http://pildoras.test/images/pYo6WUugrOyLEVQg40XsHaxoJ5Jw0nVS8gEugxkr.jpeg', 'ddr2', 1, 'activo', NULL, '2020-05-02 01:28:55', '2020-05-02 01:28:55'),
(4, 'tarjeta madre', 'tarjetas madres de ultima generacion', 'Tarjetas madres para su PC o laptop, la ultima tecnologia', 'http://pildoras.test/images/Srs1kWgHiSwPOjjarBuoaa6UmZzc4laKRuNZFt2s.jpeg', 'ddr3', 1, 'activo', NULL, '2020-05-02 01:30:53', '2020-05-02 01:30:53'),
(5, 'tarjeta madre', 'tarjetas madres de ultima generacion', 'Tarjetas madres para su PC o laptop, la ultima tecnologia', 'http://pildoras.test/images/Srs1kWgHiSwPOjjarBuoaa6UmZzc4laKRuNZFt2s.jpeg', 'ddr4', 1, 'activo', NULL, '2020-05-02 01:31:03', '2020-05-02 01:31:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
