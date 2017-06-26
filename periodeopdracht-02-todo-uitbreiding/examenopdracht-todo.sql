-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 jan 2016 om 09:56
-- Serverversie: 10.1.8-MariaDB
-- PHP-versie: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examenopdracht-todo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `done` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`id`, `owner_id`, `name`, `done`, `created_at`, `updated_at`) VALUES
(7, 1, 'Pick up milk', 0, '2016-01-25 15:18:27', '0000-00-00 00:00:00'),
(8, 1, 'Walk the dogs', 1, '2016-01-25 15:18:27', '0000-00-00 00:00:00'),
(9, 1, 'Cook dinner', 0, '2016-01-25 15:18:27', '0000-00-00 00:00:00'),
(10, 6, 'eten', 0, '2016-01-25 15:45:38', '2016-01-25 14:45:38'),
(11, 6, 'tv kijken', 0, '2016-01-25 14:19:37', '2016-01-25 14:19:37'),
(14, 5, 'test', 0, '2016-01-25 15:04:49', '2016-01-25 15:04:49'),
(15, 5, 'testest', 0, '2016-01-25 15:04:54', '2016-01-25 15:04:54'),
(16, 7, 'aaa', 0, '2016-01-26 08:38:18', '2016-01-26 07:38:18'),
(17, 7, 'aaaa', 1, '2016-01-26 08:36:03', '2016-01-26 07:36:03'),
(22, 7, 'lopen', 1, '2016-01-26 08:39:20', '2016-01-26 07:39:20'),
(23, 7, 'douchen', 0, '2016-01-25 20:33:27', '2016-01-25 19:33:27');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_23_183927_create_items_table', 1),
('2016_01_25_144354_create_users_table', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'TestPersoon1@test.be', '$2y$10$3Se.W3H1dp1visLg.p8reeMOFofdqSgih6VuN6f.5OE1S.p4jWYVq', '3tY6T4EIHA72PY7Vg1v6plmtEZJuHWgqVNW9RdcH0I4wadr4OU4VECFJbng8', '2016-01-25 16:06:38', '2016-01-25 15:06:38'),
(6, 'test@test.be', '$2y$10$5KXVBgS5K6u236FzLq9z3uXnZOWhjKnPasqINOZTjNpfqcwwTTWM6', 'SjVqBm4vioh9gdjifqw89Igq4C4MIqQzjy7YjY8F1Igd9xPT9mZQpAbSxFuS', '2016-01-25 16:18:02', '2016-01-25 15:18:02'),
(7, 'aaaa', '$2y$10$wipZeIYN9bAkM7HgHY3AuOq5lKZC./eRJTIjQZKsPyTdeEvOu5z0O', 'cIlNzpEs08CAicXaPgb8Si3t5OPRChppIQSYocaaYgpxgkM8fG05T4fgcGMe', '2016-01-26 08:45:43', '2016-01-26 07:45:43'),
(8, 'b', '$2y$10$bw5QHcmFt7Z2atPogRNaI.ALJG92Ra5wnMx0VgjJCfGpXy7YGRls2', NULL, '2016-01-25 15:37:20', '2016-01-25 15:37:20'),
(9, 'c', '$2y$10$IgOwKl7untv7SusWZVspo.n7xo.O0eLIrPYMnfxpQ/FoF5MiITOf6', 'VSDk0GKHkZtuQEex6V9wiyN6AULUm7PFDjxDpRFIdTgZgeep4gbnYOT5n8oO', '2016-01-25 16:53:01', '2016-01-25 15:53:01'),
(10, 'aaaaa', '$2y$10$VEbnxkxifF637G0uByTNte8e4o3MBCx77WkZ.l8Nxgc.mxHDwwDJ2', 'N653VOoJ6zM6EYYj5tmoQ6SGvRCHGsIY8hAXPI2M8xtyt58to0kb5pguZ5iU', '2016-01-25 17:06:51', '2016-01-25 16:06:51'),
(11, 'd@d.com', '$2y$10$pQaxUlg3U9dBb2DENVmvT.SxvYXqCR1vRsZZqDBUCz5IN07CQpSxa', 'mrVNFC8hEFK0Wbl1bBnirtTzeKoay4v5DOSaN1o884TlbsMN4p3R3jr1CMZU', '2016-01-25 17:07:12', '2016-01-25 16:07:12'),
(12, 'd@d.be', '$2y$10$jlL6rKDNCuQehKD/mtuyLu.1VSYacJL0Z2lYbW43m9YCozvuM6BXW', 't9tHAA77PvjIcY57UEGsCyzS8fGWvQ7OwrhfG5DZLNDzDmwYmOUlWrH5OWTI', '2016-01-26 08:47:28', '2016-01-26 07:47:28'),
(13, 'e@e.be', '$2y$10$2GPrRHKw959KkUjQhOqypOy.iRyqznJr2d/GOultDe4LtTlZlZuk6', 'SM5XCP4ZuZxOTHn3JeLekxvrRhauCbCD5mZtO1Ok4uOPS0spDkrNWktu2VxJ', '2016-01-26 08:48:19', '2016-01-26 07:48:19');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT voor een tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
