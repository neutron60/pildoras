-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2020 at 07:00 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 3, 'ramon oliver', 'ramon@gmail.com', NULL, '$2y$10$IJeMFcAWOsdfrqPAHtyq8OB94ZSrNnId7hyUWQSBysYBmm6yd5SEC', NULL, '2020-03-27 15:08:27', '2020-03-29 19:59:02'),
(3, NULL, 'ricardo gomez', 'ricardo@gmail.com', NULL, '$2y$10$7ClsnfZxPfVe5dt42obiI.cBt6xhX44JtbdcaIk8HeCZ3zmIaI6Ei', NULL, '2020-03-27 15:09:55', '2020-03-27 15:09:55'),
(4, NULL, 'luisa caraballo', 'luisa@gmail.com', NULL, '$2y$10$5cnPhpEMcMdoUtuF6/s5dOcY3t9DCoLZOdMYtjl/ob2ikASa5Y86q', NULL, '2020-03-27 15:11:07', '2020-03-27 15:11:07'),
(5, NULL, 'ricardo hernandez', 'ricardoh@gmail.com', NULL, '$2y$10$ZbaoJw1twCenkXabb9o.0OaeksZfFENHpaTg/Zl1C50sOiXKdtJZe', NULL, '2020-03-27 15:12:24', '2020-03-27 15:12:24'),
(6, NULL, 'tomas fernandez', 'tomas@gmail.com', NULL, '$2y$10$7uTbADzER4WT08PAqX3ojekY1luJcqBb6IVuUXHbbfiEZUN5grkoy', NULL, '2020-03-27 15:13:10', '2020-03-27 15:13:10'),
(7, NULL, 'ana rivera', 'ana@gmail.com', NULL, '$2y$10$rQrIEHnkOfxPj5blxp/BauiB0V03HxHJVKOGGtL1XAs5/gHV0YvKa', NULL, '2020-03-27 15:13:54', '2020-03-27 15:13:54'),
(8, NULL, 'miriam chacin', 'miriam@gmail.com', NULL, '$2y$10$syCE3qM5vMiWGA9rtjR0EuSx2QNW5HJK5cFlVaFH1dd6diqvgR18u', NULL, '2020-03-27 15:14:39', '2020-03-27 15:14:39'),
(9, NULL, 'juan arismendi', 'juan1@gmail.com', NULL, '$2y$10$oYD1PHoeOvlvPHUF.642vO5plUblIAg2DLcNm55aUtWTaCm78S.4y', NULL, '2020-03-27 15:15:21', '2020-03-27 15:15:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
