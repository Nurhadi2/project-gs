-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2024 pada 10.53
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'user', '2024-11-18 14:47:49'),
(20, 25, 'ketua', '2024-12-01 15:19:53'),
(23, 31, 'ketua', '2024-12-10 11:35:19'),
(25, 33, 'penyuluh', '2024-12-10 11:42:06'),
(26, 34, 'petani', '2024-12-10 11:55:03'),
(27, 35, 'ketua', '2024-12-10 13:37:10'),
(28, 39, 'penyuluh', '2024-12-10 13:42:15'),
(29, 41, 'petani', '2024-12-10 13:52:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text DEFAULT NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'admin@gmail.com', '$2y$12$py32Vy4L.cMiG.bhs37m7uSD2E8mi2QBOE5V/Aa6ft/02rXpmv.8e', NULL, NULL, 0, '2024-12-24 07:17:15', '2024-11-18 14:47:48', '2024-12-24 07:17:15'),
(25, 25, 'email_password', NULL, 'khaliqadam463@gmail.com', '$2y$12$KLYmC98wDrVU./aYGbi7rOsAyzNbqezhzpGza36m98jg0qiCvyX1W', NULL, NULL, 0, NULL, '2024-12-01 15:19:53', '2024-12-01 15:19:53'),
(30, 31, 'email_password', NULL, 'jamaluddintoasi@gmail.com', '$2y$12$wT7tD9OkhZxeMxbZMGuPUOWX3BDSZZzXLJAx3hl2zcgVDlX3VvB4C', NULL, NULL, 0, '2024-12-24 07:13:52', '2024-12-10 11:35:18', '2024-12-24 07:13:52'),
(32, 33, 'email_password', NULL, 'agussenge@gmail.com', '$2y$12$jE/OIbXM372IQPuXT.aOz.4flZqWO6FeRW.KO12RIcsurjUz8o2WK', NULL, NULL, 0, '2024-12-10 11:55:41', '2024-12-10 11:42:05', '2024-12-10 11:55:41'),
(33, 34, 'email_password', NULL, 'haeruddin@gmail.com', '$2y$12$MNHBdT2WDv/g74z5MhWw8uSnzkIb2jkJ1AThBOFXX3QswT9OtbsCe', NULL, NULL, 0, '2024-12-24 07:13:02', '2024-12-10 11:55:02', '2024-12-24 07:13:02'),
(34, 35, 'email_password', NULL, 'badaruddin@gmail.com', '$2y$12$mhDmLOY1Y.pmJ8MVOXOIsuR0ReMCOfqs.w6r2c9BTRtv5sbuLR28K', NULL, NULL, 0, NULL, '2024-12-10 13:37:10', '2024-12-10 13:37:10'),
(36, 39, 'email_password', NULL, 'abidin@gmail.com', '$2y$12$UMOslGXEOn8/0QpiMA3MUOr4Fep0r/FJkkpWXVMizx5WUorFwd/hO', NULL, NULL, 0, NULL, '2024-12-10 13:42:14', '2024-12-10 13:42:15'),
(37, 41, 'email_password', NULL, 'noddin@gmail.com', '$2y$12$Vjl6pxT1uN2WAIEjqy9JvuR5tEk.0Eh8fTkX1JWj4ntFJMx1LgFOm', NULL, NULL, 0, NULL, '2024-12-10 13:52:09', '2024-12-10 13:52:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:15:05', 1),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:16:54', 1),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:20:17', 1),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-18 15:30:26', 0),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:30:34', 1),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:35:49', 1),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-19 01:22:37', 0),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-19 01:22:47', 1),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-19 04:36:19', 0),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-20 00:56:38', 0),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-20 00:56:45', 0),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-20 00:56:51', 0),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-20 00:56:59', 1),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-20 01:43:58', 1),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 01:32:33', 1),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-21 02:37:26', 0),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-21 02:37:34', 0),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 02:37:40', 1),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 04:10:23', 1),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 08:07:35', 1),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 08:42:04', 1),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-22 02:45:54', 1),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-22 13:34:24', 1),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-23 01:22:13', 0),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 01:22:19', 1),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-23 01:26:24', 0),
(27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 01:26:30', 1),
(28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 01:42:55', 1),
(29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 06:30:17', 1),
(30, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 08:07:56', 1),
(31, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 13:50:18', 1),
(32, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-24 11:42:08', 1),
(33, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-25 00:58:22', 1),
(34, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-25 06:14:48', 1),
(35, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-25 08:39:48', 1),
(36, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 00:53:53', 1),
(37, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 06:28:27', 1),
(38, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 13:56:33', 1),
(39, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'vio@gmail.com', 6, '2024-11-26 14:45:00', 1),
(40, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 14:48:59', 1),
(41, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 14:58:42', 1),
(42, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'vio@gmail.com', NULL, '2024-11-26 15:00:06', 0),
(43, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'vio@gmail.com', 6, '2024-11-26 15:00:13', 1),
(44, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 15:01:53', 1),
(45, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-27 23:18:52', 1),
(46, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd3@gmail.com', 12, '2024-11-27 23:40:53', 1),
(47, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-27 23:41:24', 1),
(48, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-28 02:45:49', 1),
(49, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-28 02:50:51', 1),
(50, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'penyuluh@gmail.com', 19, '2024-11-28 03:34:28', 1),
(51, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'ketua@gmail.com', 18, '2024-11-28 03:35:34', 1),
(52, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'penyuluh@gmail.com', 19, '2024-11-28 03:37:09', 1),
(53, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-28 03:42:33', 1),
(54, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-28 03:42:49', 1),
(55, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-29 13:09:13', 1),
(56, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:05:03', 1),
(57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:05:47', 1),
(58, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:06:27', 1),
(59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:09:16', 1),
(60, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:10:33', 1),
(61, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-12-01 14:36:24', 1),
(62, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-12-02 06:25:58', 1),
(63, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin12345@gmail.com', NULL, '2024-12-02 06:31:56', 0),
(64, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin123@gmail.com', 28, '2024-12-02 06:32:05', 1),
(65, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin2@gmail.com', 29, '2024-12-02 06:33:31', 1),
(66, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-12-02 06:34:32', 1),
(67, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin2@gmail.com', NULL, '2024-12-02 06:39:03', 0),
(68, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin2@gmail.com', 29, '2024-12-02 06:39:09', 1),
(69, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-12-08 08:30:33', 1),
(70, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-12-10 11:23:10', 1),
(71, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'haeruddin@gmail.com', 32, '2024-12-10 11:43:37', 1),
(72, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'jamaluddintoasi@gmail.com', 31, '2024-12-10 11:45:40', 1),
(73, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'haeruddin@gmail.com', NULL, '2024-12-10 11:46:56', 0),
(74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'jamaluddintoasi@gmail.com', 31, '2024-12-10 11:47:08', 1),
(75, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'jamaluddintoasi@gmail.com', 31, '2024-12-10 11:54:29', 1),
(76, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'agussenge@gmail.com', 33, '2024-12-10 11:55:41', 1),
(77, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-12-10 13:30:42', 1),
(78, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', NULL, '2024-12-24 07:10:44', 0),
(79, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', NULL, '2024-12-24 07:10:49', 0),
(80, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-12-24 07:10:56', 1),
(81, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'haeruddin@gmail.com', 34, '2024-12-24 07:13:03', 1),
(82, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'jamaluddintoasi@gmail.com', 31, '2024-12-24 07:13:52', 1),
(83, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-12-24 07:17:15', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(14, '2024-11-18-140853', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1731940311, 1),
(15, '2024-11-18-142102', 'App\\Database\\Migrations\\User', 'default', 'App', 1731940311, 1),
(16, '2024-11-18-142611', 'App\\Database\\Migrations\\Komoditas', 'default', 'App', 1731940311, 1),
(17, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1731940512, 2),
(18, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1731940512, 2),
(19, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1731940512, 2),
(20, '2024-11-20-010448', 'App\\Database\\Migrations\\KelompokTani', 'default', 'App', 1732064875, 3),
(21, '2024-11-20-045303', 'App\\Database\\Migrations\\Petani', 'default', 'App', 1732177950, 4),
(22, '2024-11-23-020826', 'App\\Database\\Migrations\\JenisKomoditas', 'default', 'App', 1732327921, 5),
(25, '2024-11-23-033009', 'App\\Database\\Migrations\\TransaksiTanam', 'default', 'App', 1732333943, 6),
(26, '2024-11-23-033016', 'App\\Database\\Migrations\\TransaksiPanen', 'default', 'App', 1732333943, 6),
(27, '2024-11-27-231945', 'App\\Database\\Migrations\\KetuaKelompokTani', 'default', 'App', 1732749820, 7),
(28, '2024-11-27-232156', 'App\\Database\\Migrations\\Penyuluh', 'default', 'App', 1732749820, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_month` varchar(255) DEFAULT NULL,
  `month_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_month`, `month_name`) VALUES
('1', 'January'),
('2', 'February'),
('3', 'March'),
('4', 'April'),
('5', 'May'),
('6', 'June'),
('7', 'July'),
('8', 'August'),
('9', 'September'),
('10', 'October'),
('11', 'November'),
('12', 'December');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_kepemilikan`
--

CREATE TABLE `tb_jenis_kepemilikan` (
  `id_jenis_kepemilikan` int(11) NOT NULL,
  `nama_jenis_kepemilikan` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_jenis_kepemilikan`
--

INSERT INTO `tb_jenis_kepemilikan` (`id_jenis_kepemilikan`, `nama_jenis_kepemilikan`, `created_at`, `updated_at`) VALUES
(1, 'Kepemilikan Pribadi', NULL, NULL),
(2, 'Bagi Hasil', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_komoditas`
--

CREATE TABLE `tb_jenis_komoditas` (
  `id_jenis_komoditas` int(10) UNSIGNED NOT NULL,
  `name_jenis_komoditas` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_jenis_komoditas`
--

INSERT INTO `tb_jenis_komoditas` (`id_jenis_komoditas`, `name_jenis_komoditas`, `created_at`, `updated_at`) VALUES
(2, 'Hortikultura', '2024-11-28 03:17:32', '2024-12-08 08:52:52'),
(3, 'Pangan', '2024-11-28 03:49:34', '2024-11-28 03:49:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `kategori_title` varchar(100) NOT NULL,
  `kategori_description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
(1, 'Watang Sawitto', NULL, NULL),
(5, 'Patampanua', NULL, NULL),
(6, 'Tiroang', NULL, NULL),
(7, 'Paleteang', NULL, NULL),
(8, 'Lembang', NULL, NULL),
(9, 'Duampanua', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelompok_tani`
--

CREATE TABLE `tb_kelompok_tani` (
  `id_kelompok_tani` int(10) UNSIGNED NOT NULL,
  `nama_kelompok_tani` varchar(100) NOT NULL,
  `nama_ketua` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_kecamatan` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_kelompok_tani`
--

INSERT INTO `tb_kelompok_tani` (`id_kelompok_tani`, `nama_kelompok_tani`, `nama_ketua`, `alamat`, `id_kecamatan`, `created_at`, `updated_at`) VALUES
(9, 'Pada Idi', '6', 'Desa Mattiro Ade, Kecamatan Patampanua', 5, '2024-12-02 06:29:25', '2024-12-02 06:29:25'),
(10, 'Padaelo', '7', 'Desa Mattiro Ade, Kecamatan Patampanua', 5, '2024-12-10 11:39:07', '2024-12-10 11:39:07'),
(11, 'Harapan', '8', 'Desa Bungi, Kecamatan Duampanua', 9, '2024-12-10 13:38:25', '2024-12-10 13:38:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ketua_kelompok_tani`
--

CREATE TABLE `tb_ketua_kelompok_tani` (
  `id_ketua_kelompok_tani` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `handphone` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_ketua_kelompok_tani`
--

INSERT INTO `tb_ketua_kelompok_tani` (`id_ketua_kelompok_tani`, `alamat`, `nama_lengkap`, `handphone`, `nik`, `id_user`, `created_at`, `updated_at`) VALUES
(6, 'Desa Mattiro Ade, Kecamatan Patampanua', 'Baharuddin', '08234567890', '7315050701030004', 25, '2024-12-01 15:19:53', '2024-12-01 15:19:53'),
(7, 'Desa Mattiro Ade, Kecamatan Patampanua', 'Jamaluddin Toasi', '081234567890', '7315050701030004', 31, '2024-12-10 11:35:19', '2024-12-10 11:35:19'),
(8, 'Desa Bungi, Kecamatan Duampanua', 'Badaruddin', '08234567890', '7315050701030004', 35, '2024-12-10 13:37:10', '2024-12-10 13:37:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komoditas`
--

CREATE TABLE `tb_komoditas` (
  `id_komoditas` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_komoditas` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_komoditas`
--

INSERT INTO `tb_komoditas` (`id_komoditas`, `id_kategori`, `nama_komoditas`, `created_at`, `updated_at`) VALUES
(6, 3, 'Padi', '2024-12-02 14:27:01', '2024-12-02 14:27:01'),
(7, 3, 'Jagung', '2024-12-02 14:27:11', '2024-12-02 14:27:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_koordinat`
--

CREATE TABLE `tb_koordinat` (
  `id_koordinat` int(11) NOT NULL,
  `id_lahan` int(11) DEFAULT NULL,
  `latitude` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `longitude` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_koordinat`
--

INSERT INTO `tb_koordinat` (`id_koordinat`, `id_lahan`, `latitude`, `created_at`, `updated_at`, `longitude`) VALUES
(1, 1, '-3.8023080887228673', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66394424438477'),
(2, 1, '-3.804502655971931', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66308593750001'),
(3, 1, '-3.80488804281437', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66383695602418'),
(4, 1, '-3.8040744481670314', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66409444808961'),
(5, 1, '-3.8035713037243886', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66440558433534'),
(6, 1, '-3.8027362974053576', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66500639915468'),
(7, 2, '-3.8025543087412927', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.6987807750702'),
(8, 2, '-3.803153800665983', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.69857692718507'),
(9, 2, '-3.803988806580523', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.7002935409546'),
(10, 2, '-3.8036890609606986', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70054030418397'),
(11, 2, '-3.8039245753850506', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70117330551149'),
(12, 2, '-3.8043206676808556', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70105528831483'),
(13, 2, '-3.8046311182718866', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70165610313417'),
(14, 2, '-3.804170794941685', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70188140869142'),
(15, 2, '-3.8038603441847947', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70207452774049'),
(16, 2, '-3.8039995117793044', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.7024178504944'),
(17, 2, '-3.804138679351334', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70273971557619'),
(18, 2, '-3.804245731314527', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70291137695314'),
(19, 2, '-3.803175211084155', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70386624336244'),
(20, 2, '-3.8013767341040814', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.69969272613527'),
(21, 6, '-3.7070897588781477', '2024-12-02 06:37:26', '2024-12-02 06:37:26', '119.66986672764553'),
(22, 6, '-3.7071452735956463', '2024-12-02 06:37:26', '2024-12-02 06:37:26', '119.6707923800522'),
(23, 6, '-3.708184189207018', '2024-12-02 06:37:26', '2024-12-02 06:37:26', '119.67066127899311'),
(24, 6, '-3.708108847764024', '2024-12-02 06:37:26', '2024-12-02 06:37:26', '119.66952109769966');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_koordinat_kecamatan`
--

CREATE TABLE `tb_koordinat_kecamatan` (
  `id_koordinat_kecamatan` int(11) NOT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `latitude` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `longitude` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_koordinat_kecamatan`
--

INSERT INTO `tb_koordinat_kecamatan` (`id_koordinat_kecamatan`, `id_kecamatan`, `latitude`, `created_at`, `updated_at`, `longitude`) VALUES
(1, 1, '-3.7891917531350443', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.65347290039062'),
(2, 1, '-3.8248185295599084', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.65347290039062'),
(3, 1, '-3.859073648893726', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.63699340820314'),
(4, 1, '-3.882366341710861', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.63150024414064'),
(5, 1, '-3.920729374303303', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.62463378906251'),
(6, 1, '-3.9399102315272283', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.61502075195314'),
(7, 1, '-3.9755306486184714', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.64111328125001'),
(8, 1, '-3.9906003625922026', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.65209960937501'),
(9, 1, '-3.9577206315863434', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.66583251953126'),
(10, 1, '-3.9481304636558225', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.68093872070314'),
(11, 1, '-3.9220994501539064', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.696044921875'),
(12, 1, '-3.9220084686240706', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.70102310180665'),
(13, 1, '-3.9177269736706735', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.70428466796876'),
(14, 1, '-3.91361671790139', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.71063613891603'),
(15, 1, '-3.908821394010173', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.71595764160158'),
(16, 1, '-3.9069375092625394', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.71904754638673'),
(17, 1, '-3.904197305714831', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.72351074218751'),
(18, 1, '-3.9027683288318133', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.73861694335938'),
(19, 1, '-3.8637193933405203', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.77294921875001'),
(20, 1, '-3.8527579647750305', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.80041503906251'),
(21, 1, '-3.843851700056829', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.81277465820314'),
(22, 1, '-3.8322049058743795', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.74273681640626'),
(23, 1, '-3.7986338487645215', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.68917846679689'),
(24, 2, '-3.776291671376186', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.65484619140625'),
(25, 2, '-3.763273635195431', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.7005081176758'),
(26, 2, '-3.7293573131312434', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.73896026611328'),
(27, 2, '-3.710931893132288', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.74205017089845'),
(28, 2, '-3.703394597093784', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.75166320800783'),
(29, 2, '-3.690375480117165', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.7557830810547'),
(30, 2, '-3.6766709403345166', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.75784301757814'),
(31, 2, '-3.684893689530931', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.77363586425783'),
(32, 2, '-3.6711890653984076', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.78256225585939'),
(33, 2, '-3.6794118651672703', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.79011535644533'),
(34, 2, '-3.7040798084785482', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.79217529296876'),
(35, 2, '-3.7123023036883724', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.80247497558594'),
(36, 2, '-3.723265511510233', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.81895446777345'),
(37, 2, '-3.7198395237111486', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.83406066894533'),
(38, 2, '-3.7239507074707445', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.84298706054689'),
(39, 2, '-3.727606861273276', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85191345214845'),
(40, 2, '-3.733430981173967', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.86358642578126'),
(41, 2, '-3.7363430266414346', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.86873626708986'),
(42, 2, '-3.744222630601502', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.86839294433595'),
(43, 2, '-3.751416989678668', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.86495971679689'),
(44, 2, '-3.7565557813333954', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85929489135744'),
(45, 2, '-3.7601676378814686', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85517501831055'),
(46, 2, '-3.761366679948778', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85508918762208'),
(47, 2, '-3.7650159864447885', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85646247863771'),
(48, 2, '-3.7769768257731453', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85019683837892'),
(49, 2, '-3.8074656474270254', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.83131408691408'),
(50, 2, '-3.835898070120294', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.82616424560548'),
(51, 2, '-3.8430916659445', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.81792449951173'),
(52, 2, '-3.8287044137387087', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.75406646728517'),
(53, 2, '-3.8266490722369846', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.73896026611328'),
(54, 2, '-3.816372290806852', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.72557067871095'),
(55, 2, '-3.7951332199053165', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.68643188476564'),
(56, 2, '-3.792050085489475', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.65347290039062'),
(57, 5, '-3.688040242575763', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.67171002159111'),
(58, 5, '-3.6924814965988193', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.71582350858564'),
(59, 5, '-3.7153218722167107', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.7529449670284'),
(60, 5, '-3.725219184136265', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.75650455434206'),
(61, 5, '-3.749708213779264', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.75688592971849'),
(62, 5, '-3.770897641862083', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.74671566827936'),
(63, 5, '-3.780413689354298', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.70908571980978'),
(64, 5, '-3.733593748767919', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.69955110494813'),
(65, 5, '-3.724204081478717', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.68772818545271'),
(66, 5, '-3.7042824308024387', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.66484509721477'),
(67, 5, '-3.6932428542924525', '2024-12-01 15:25:01', '2024-12-01 15:25:01', '119.66522648306622');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lahan`
--

CREATE TABLE `tb_lahan` (
  `id_lahan` int(11) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `status_kepemilikan` varchar(20) DEFAULT NULL,
  `total_penghasilan` int(11) DEFAULT NULL,
  `lokasi` varchar(128) DEFAULT NULL,
  `luas` int(11) DEFAULT NULL,
  `id_petani` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_lahan`
--

INSERT INTO `tb_lahan` (`id_lahan`, `jenis`, `status_kepemilikan`, `total_penghasilan`, `lokasi`, `luas`, `id_petani`) VALUES
(6, '6', '1', 3000000, 'Desa Mattiro Ade, Kecamatan Patampanua', 10, 10),
(7, '6', '2', 20000000, 'Desa Bungi, Kecamatan Bungi', 20, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyuluh`
--

CREATE TABLE `tb_penyuluh` (
  `id_penyuluh` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `handphone` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_kecamatan` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_penyuluh`
--

INSERT INTO `tb_penyuluh` (`id_penyuluh`, `alamat`, `nama_lengkap`, `handphone`, `nik`, `id_user`, `id_kecamatan`, `created_at`, `updated_at`) VALUES
(5, 'Desa Mattiro Ade, Kecamatan Patampanua', 'A. Agus Senge, SE, SP', '081234567890', '7315050701030004', 33, 5, '2024-12-10 11:42:06', '2024-12-10 11:42:06'),
(6, 'Desa Bungi, Kecamatan Duampanua', 'Abidin', '081234567890', '7315050701030004', 39, 9, '2024-12-10 13:42:15', '2024-12-10 13:42:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petani`
--

CREATE TABLE `tb_petani` (
  `id_petani` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `handphone` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_kelompok_tani` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_petani`
--

INSERT INTO `tb_petani` (`id_petani`, `alamat`, `nama_lengkap`, `handphone`, `nik`, `id_user`, `id_kelompok_tani`, `created_at`, `updated_at`) VALUES
(12, 'Desa Mattiro Ade, Kecamatan Patampanua', 'Haeruddin', '081234567890', '7315050701030004', 34, 10, '2024-12-10 11:55:03', '2024-12-10 11:55:03'),
(13, 'Desa Bungi, Kecamatan Duampanua', 'Noddin', '08123456789', '7315050701030004', 41, 11, '2024-12-10 13:52:10', '2024-12-10 13:52:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_panen`
--

CREATE TABLE `tb_transaksi_panen` (
  `id_transaksi_panen` int(10) UNSIGNED NOT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `id_lahan` int(10) UNSIGNED NOT NULL,
  `total_area` int(11) DEFAULT NULL,
  `produksi` double DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_transaksi_panen`
--

INSERT INTO `tb_transaksi_panen` (`id_transaksi_panen`, `bulan`, `tahun`, `id_lahan`, `total_area`, `produksi`, `created_at`, `updated_at`) VALUES
(6, '6', '2024', 6, 2, 4.965, '2024-12-10 11:59:30', '2024-12-10 13:56:22'),
(8, '6', '2024', 7, 1090, 42267, '2024-12-10 13:55:15', '2024-12-10 13:55:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_tanam`
--

CREATE TABLE `tb_transaksi_tanam` (
  `id_transaksi_tanam` int(10) UNSIGNED NOT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `id_lahan` int(10) UNSIGNED NOT NULL,
  `total_area` int(11) DEFAULT NULL,
  `urea` double DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_transaksi_tanam`
--

INSERT INTO `tb_transaksi_tanam` (`id_transaksi_tanam`, `bulan`, `tahun`, `id_lahan`, `total_area`, `urea`, `created_at`, `updated_at`) VALUES
(11, '6', '2024', 6, 136, 53, '2024-12-10 11:57:57', '2024-12-10 13:12:08'),
(12, '6', '2024', 7, 195, 65, '2024-12-10 13:54:06', '2024-12-10 13:54:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `nip`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, '112233', '12345', 'admin', '2024-11-18 21:31:58', '2024-11-18 21:31:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', NULL, NULL, 1, '2024-12-24 07:24:46', '2024-11-18 14:47:48', '2024-11-18 14:47:49', NULL),
(25, '7315050701030004', NULL, NULL, 1, NULL, '2024-12-01 15:19:53', '2024-12-01 15:19:53', NULL),
(31, 'Jamaluddin Toasi', NULL, NULL, 1, '2024-12-24 07:14:06', '2024-12-10 11:35:18', '2024-12-10 11:35:19', NULL),
(33, 'Andi Agus', NULL, NULL, 1, '2024-12-10 13:30:27', '2024-12-10 11:42:05', '2024-12-10 11:42:06', NULL),
(34, 'Haeruddin', NULL, NULL, 1, '2024-12-24 07:13:30', '2024-12-10 11:55:02', '2024-12-10 11:55:57', NULL),
(35, 'Badaruddin', NULL, NULL, 1, NULL, '2024-12-10 13:37:09', '2024-12-10 13:37:10', NULL),
(39, 'Abidin', NULL, NULL, 1, NULL, '2024-12-10 13:42:14', '2024-12-10 13:42:15', NULL),
(41, 'Noddin', NULL, NULL, 1, NULL, '2024-12-10 13:52:09', '2024-12-10 13:52:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `type_secret` (`type`,`secret`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_type_identifier` (`id_type`,`identifier`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `selector` (`selector`) USING BTREE,
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_type_identifier` (`id_type`,`identifier`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_jenis_kepemilikan`
--
ALTER TABLE `tb_jenis_kepemilikan`
  ADD PRIMARY KEY (`id_jenis_kepemilikan`) USING BTREE;

--
-- Indeks untuk tabel `tb_jenis_komoditas`
--
ALTER TABLE `tb_jenis_komoditas`
  ADD PRIMARY KEY (`id_jenis_komoditas`) USING BTREE;

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`) USING BTREE;

--
-- Indeks untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`) USING BTREE;

--
-- Indeks untuk tabel `tb_kelompok_tani`
--
ALTER TABLE `tb_kelompok_tani`
  ADD PRIMARY KEY (`id_kelompok_tani`) USING BTREE;

--
-- Indeks untuk tabel `tb_ketua_kelompok_tani`
--
ALTER TABLE `tb_ketua_kelompok_tani`
  ADD PRIMARY KEY (`id_ketua_kelompok_tani`) USING BTREE;

--
-- Indeks untuk tabel `tb_komoditas`
--
ALTER TABLE `tb_komoditas`
  ADD PRIMARY KEY (`id_komoditas`) USING BTREE;

--
-- Indeks untuk tabel `tb_koordinat`
--
ALTER TABLE `tb_koordinat`
  ADD PRIMARY KEY (`id_koordinat`) USING BTREE;

--
-- Indeks untuk tabel `tb_koordinat_kecamatan`
--
ALTER TABLE `tb_koordinat_kecamatan`
  ADD PRIMARY KEY (`id_koordinat_kecamatan`) USING BTREE;

--
-- Indeks untuk tabel `tb_lahan`
--
ALTER TABLE `tb_lahan`
  ADD PRIMARY KEY (`id_lahan`) USING BTREE;

--
-- Indeks untuk tabel `tb_penyuluh`
--
ALTER TABLE `tb_penyuluh`
  ADD PRIMARY KEY (`id_penyuluh`) USING BTREE;

--
-- Indeks untuk tabel `tb_petani`
--
ALTER TABLE `tb_petani`
  ADD PRIMARY KEY (`id_petani`) USING BTREE;

--
-- Indeks untuk tabel `tb_transaksi_panen`
--
ALTER TABLE `tb_transaksi_panen`
  ADD PRIMARY KEY (`id_transaksi_panen`) USING BTREE;

--
-- Indeks untuk tabel `tb_transaksi_tanam`
--
ALTER TABLE `tb_transaksi_tanam`
  ADD PRIMARY KEY (`id_transaksi_tanam`) USING BTREE;

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_kepemilikan`
--
ALTER TABLE `tb_jenis_kepemilikan`
  MODIFY `id_jenis_kepemilikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_komoditas`
--
ALTER TABLE `tb_jenis_komoditas`
  MODIFY `id_jenis_komoditas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kelompok_tani`
--
ALTER TABLE `tb_kelompok_tani`
  MODIFY `id_kelompok_tani` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_ketua_kelompok_tani`
--
ALTER TABLE `tb_ketua_kelompok_tani`
  MODIFY `id_ketua_kelompok_tani` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_komoditas`
--
ALTER TABLE `tb_komoditas`
  MODIFY `id_komoditas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_koordinat`
--
ALTER TABLE `tb_koordinat`
  MODIFY `id_koordinat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_koordinat_kecamatan`
--
ALTER TABLE `tb_koordinat_kecamatan`
  MODIFY `id_koordinat_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `tb_lahan`
--
ALTER TABLE `tb_lahan`
  MODIFY `id_lahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_penyuluh`
--
ALTER TABLE `tb_penyuluh`
  MODIFY `id_penyuluh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_petani`
--
ALTER TABLE `tb_petani`
  MODIFY `id_petani` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_panen`
--
ALTER TABLE `tb_transaksi_panen`
  MODIFY `id_transaksi_panen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_tanam`
--
ALTER TABLE `tb_transaksi_tanam`
  MODIFY `id_transaksi_tanam` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
