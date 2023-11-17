-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 nov 2023 om 13:09
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `verzamelaarsplatform`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `brands`
--

INSERT INTO `brands` (`id`, `brand_name`) VALUES
(1, 'TEST1'),
(2, 'TEST1'),
(3, 'TEST1'),
(4, 'TEST1'),
(5, 'TEST2'),
(6, 'TEST2'),
(7, 'TEST2'),
(8, 'TEST2'),
(9, 'TEST2'),
(10, 'TEST4'),
(11, 'TEST5'),
(12, 'DELETE TEST'),
(13, 'TEST7'),
(14, 'TEST8'),
(15, 'TEST10'),
(16, 'TEST 240'),
(17, 'TEST1'),
(18, 'TEST 420'),
(19, 'TEST 666'),
(20, '555'),
(21, 'TEST 666'),
(22, 'TEST FINAL'),
(23, 'TEST FINAL 2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `colors1`
--

CREATE TABLE `colors1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `colors1`
--

INSERT INTO `colors1` (`id`, `color1`) VALUES
(1, 'geel'),
(2, 'geel'),
(3, 'geel'),
(4, 'geel'),
(5, 'geel'),
(6, 'TEST4'),
(7, 'TEST5'),
(8, 'DELETE TEST'),
(9, 'TEST7'),
(10, 'TEST8'),
(11, 'TEST10'),
(12, 'TEST1'),
(13, 'TEST FINAL'),
(14, 'TEST FINAL 2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `colors2`
--

CREATE TABLE `colors2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `colors2`
--

INSERT INTO `colors2` (`id`, `color2`) VALUES
(1, 'oranje'),
(2, 'oranje'),
(3, 'oranje'),
(4, 'oranje'),
(5, 'oranje'),
(6, 'TEST4'),
(7, 'TEST5'),
(8, 'DELETE TEST'),
(9, 'TEST7'),
(10, 'TEST8'),
(11, 'TEST10'),
(12, 'TEST1'),
(13, 'TEST FINAL'),
(14, 'TEST FINAL 2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `epoches`
--

CREATE TABLE `epoches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `epoche_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `epoches`
--

INSERT INTO `epoches` (`id`, `epoche_name`) VALUES
(1, 'TEST1'),
(2, 'TEST1'),
(3, 'TEST1'),
(4, 'TEST1'),
(5, 'TEST2'),
(6, 'TEST2'),
(7, 'TEST2'),
(8, 'TEST2'),
(9, 'TEST2'),
(10, 'TEST4'),
(11, 'TEST5'),
(12, 'DELETE TEST'),
(13, 'TEST7'),
(14, 'TEST8'),
(15, 'TEST10'),
(16, 'TEST1'),
(17, 'TEST FINAL'),
(18, 'TEST FINAL 2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE `events` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `event_date` date NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locatie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_08_12_000000_create_users_table', 1),
(2, '2014_09_28_114327_create_categories_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_28_114144_create_sorts_table', 1),
(7, '2023_09_28_114159_create_brands_table', 1),
(8, '2023_09_28_114218_create_owners_table', 1),
(9, '2023_09_28_114232_create_colors_table', 1),
(10, '2023_09_28_114239_create_epoches_table', 1),
(11, '2023_09_28_114251_create_news_table', 1),
(12, '2023_09_28_114307_create_events_table', 1),
(13, '2023_10_04_103158_create_permission_tables', 1),
(14, '2023_11_08_084236_create_colors1_table', 1),
(15, '2023_11_08_084430_create_colors2_table', 1),
(16, '2024_09_28_113608_create_overviews_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE `news` (
  `artikel_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `titel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inhoud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `overviews`
--

CREATE TABLE `overviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sort_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `catalogusnr` bigint(20) NOT NULL,
  `epoche_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nummer` bigint(20) NOT NULL,
  `eigenschappen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bijzonderheden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `overviews`
--

INSERT INTO `overviews` (`id`, `user_id`, `sort_id`, `brand_id`, `catalogusnr`, `epoche_id`, `nummer`, `eigenschappen`, `owner_id`, `color1_id`, `color2_id`, `bijzonderheden`, `foto`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 3, NULL, 3, 'TEST3', NULL, NULL, NULL, 'TEST3', 'TEST3', '2023-11-08 10:05:51', '2023-11-08 10:09:34'),
(2, NULL, NULL, NULL, 4, NULL, 4, 'TEST4', NULL, NULL, NULL, 'TEST4', 'TEST4', '2023-11-08 11:06:01', '2023-11-08 11:06:01'),
(3, NULL, NULL, NULL, 6, NULL, 6, 'TEST6', NULL, NULL, NULL, 'TEST6', 'TEST6', '2023-11-13 08:40:04', '2023-11-13 08:40:33'),
(5, NULL, NULL, NULL, 6, NULL, 6, 'TEST6', NULL, NULL, NULL, 'TEST6', 'TEST6', '2023-11-13 09:09:07', '2023-11-13 09:09:07'),
(6, NULL, NULL, NULL, 7, NULL, 7, 'TEST7', NULL, NULL, NULL, 'TEST7', 'TEST7', '2023-11-13 09:12:37', '2023-11-13 09:12:37'),
(8, NULL, NULL, NULL, 10, NULL, 10, 'TEST10', NULL, NULL, NULL, 'TEST10', 'TEST10', '2023-11-13 10:58:26', '2023-11-13 10:58:26'),
(9, NULL, NULL, NULL, 1, NULL, 1, 'TEST1', NULL, NULL, NULL, 'TEST1', 'TEST1', '2023-11-16 09:06:18', '2023-11-16 09:06:18'),
(10, NULL, NULL, NULL, 0, NULL, 0, 'TEST FINAL', NULL, NULL, NULL, 'TEST FINAL', 'TEST FINAL', '2023-11-16 10:30:46', '2023-11-16 10:30:46');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `owners`
--

INSERT INTO `owners` (`id`, `owner_name`) VALUES
(1, 'TEST1'),
(2, 'TEST1'),
(3, 'TEST1'),
(4, 'TEST1'),
(5, 'TEST2'),
(6, 'TEST2'),
(7, 'TEST2'),
(8, 'TEST2'),
(9, 'TEST2'),
(10, 'TEST4'),
(11, 'TEST5'),
(12, 'DELETE TEST'),
(13, 'TEST7'),
(14, 'TEST8'),
(15, 'TEST10'),
(16, 'TEST1'),
(17, '222'),
(18, 'TEST FINAL'),
(19, 'TEST FINAL 2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-11-08 09:55:13', '2023-11-08 09:55:13'),
(2, 'writer', 'web', '2023-11-08 09:55:13', '2023-11-08 09:55:13'),
(3, 'user', 'web', '2023-11-08 09:55:13', '2023-11-08 09:55:13');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sorts`
--

CREATE TABLE `sorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `sorts`
--

INSERT INTO `sorts` (`id`, `sort_name`) VALUES
(1, 'TEST1'),
(2, 'TEST1'),
(3, 'TEST1'),
(4, 'TEST1'),
(5, 'TEST2'),
(6, 'TEST2'),
(7, 'TEST2'),
(8, 'TEST2'),
(9, 'TEST2'),
(10, 'TEST4'),
(11, 'TEST5'),
(12, 'DELETE TEST'),
(13, 'TEST7'),
(14, 'TEST10'),
(15, 'TEST230'),
(16, 'TEST 420'),
(17, 'TEST 666'),
(18, 'TEST FINAL'),
(19, 'TEST FINAL 2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '2023-11-08 09:55:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-11-08 09:55:13', '2023-11-08 09:55:13');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `colors1`
--
ALTER TABLE `colors1`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `colors2`
--
ALTER TABLE `colors2`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `epoches`
--
ALTER TABLE `epoches`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `events_category_id_foreign` (`category_id`);

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexen voor tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexen voor tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`artikel_id`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Indexen voor tabel `overviews`
--
ALTER TABLE `overviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overviews_user_id_foreign` (`user_id`),
  ADD KEY `overviews_sort_id_foreign` (`sort_id`),
  ADD KEY `overviews_brand_id_foreign` (`brand_id`),
  ADD KEY `overviews_epoche_id_foreign` (`epoche_id`),
  ADD KEY `overviews_owner_id_foreign` (`owner_id`),
  ADD KEY `overviews_color1_id_foreign` (`color1_id`),
  ADD KEY `overviews_color2_id_foreign` (`color2_id`);

--
-- Indexen voor tabel `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexen voor tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexen voor tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexen voor tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexen voor tabel `sorts`
--
ALTER TABLE `sorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `colors1`
--
ALTER TABLE `colors1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `colors2`
--
ALTER TABLE `colors2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `epoches`
--
ALTER TABLE `epoches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
  MODIFY `event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
  MODIFY `artikel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `overviews`
--
ALTER TABLE `overviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `sorts`
--
ALTER TABLE `sorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Beperkingen voor tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Beperkingen voor tabel `overviews`
--
ALTER TABLE `overviews`
  ADD CONSTRAINT `overviews_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `overviews_color1_id_foreign` FOREIGN KEY (`color1_id`) REFERENCES `colors1` (`id`),
  ADD CONSTRAINT `overviews_color2_id_foreign` FOREIGN KEY (`color2_id`) REFERENCES `colors2` (`id`),
  ADD CONSTRAINT `overviews_epoche_id_foreign` FOREIGN KEY (`epoche_id`) REFERENCES `epoches` (`id`),
  ADD CONSTRAINT `overviews_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`),
  ADD CONSTRAINT `overviews_sort_id_foreign` FOREIGN KEY (`sort_id`) REFERENCES `sorts` (`id`),
  ADD CONSTRAINT `overviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
