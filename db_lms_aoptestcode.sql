-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2025 pada 20.02
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
-- Database: `lms_aoptestcode`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` enum('admin','librarian','member') NOT NULL DEFAULT 'member',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', NULL, NULL, 'admin', '$2a$12$V0GHZtIqS3e3/ZmXcaaq6uTKWV4hpwKqxLwx7M2gxgdpA/XVDjW12', NULL, NULL, NULL, NULL),
(3, 'John Daniele', 'johndaniele@gmail.com', '089622725978', NULL, 'member', '$2y$10$PEzDS4mWJWY9AYq5.cD.iejDgcPsO3kdMxGhcBwHz6sWYyDJDDxZK', NULL, '2025-08-11 12:26:43', '2025-08-11 12:48:07', NULL),
(5, 'Laura Mine', 'laura@gmail.com', '081256784567', 'Pasar Minggu Jakarta', 'librarian', '$2y$10$F/gBq6mI2vf3ct1eX3ZEOOv/OBhvpGq6Ub1qr.d.taBdMtfpthQA6', NULL, '2025-08-11 12:28:42', '2025-08-11 12:43:26', NULL),
(6, 'Fransiska', 'fransiska@gmail.com', NULL, NULL, 'member', '$2y$10$jrLwMBKPizICsHkiHSazo.LX.1aG4Hotxib23Sjqm5v1JEEMzV0fq', NULL, '2025-08-12 10:30:26', '2025-08-12 10:30:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
