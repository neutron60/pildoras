-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2020 at 07:18 PM
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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'computacion', 'COMPUTACION Y REDES', 'Los mejores componentes para su PC o Laptop. Redes de computacion, redes inalambricas y mucho mas ...', 'http://pildoras.test/images/LcdpurNmnxCP75KJyL2SOvxMHORLxgOYe0XnvQv3.jpeg', 1, '2020-04-30 02:29:06', '2020-05-05 15:47:32', NULL),
(2, 'ROPA', 'ROPA  PARA DAMAS Y CABALLEROS', 'Lo mejor en moda de vestir para damas, caballeros, ninos y ninas.\r\nColeccion renovada', 'http://pildoras.test/images/UpHZz07r2hX8Q3thrf3WvX9ag52LuI4ib9AX7jkd.jpeg', 1, '2020-04-30 02:31:29', '2020-04-30 02:31:29', NULL),
(3, 'VEHICULOS', 'ACCESORIO PARA CARROS', 'Todo lo que busque para su vehiculo en accesorios. Las mejores marcas', 'http://pildoras.test/images/vYFGTSbwKZfOP9dc1wD3vQsIyrYezfaHZvPmb09N.jpeg', 1, '2020-04-30 02:34:19', '2020-04-30 02:34:19', NULL),
(4, 'DEPORTES', 'IMPLEMENTOS DEPORTIVOS', 'Todo sport los mejores uniformes e implementos deportivos.\r\nLas mejores marcas deportivas representadas aqui', 'http://pildoras.test/images/7MmwKl8OSt6copEkndlZ4fiEnVzGPais0RWSuQso.jpeg', 1, '2020-04-30 02:36:31', '2020-04-30 02:36:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
