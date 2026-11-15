-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2025 pada 16.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dvr_kamusperasaanku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_user`
--

CREATE TABLE `jawaban_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `is_answered` tinyint(1) NOT NULL DEFAULT 0,
  `score` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_level`
--

CREATE TABLE `master_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_level`
--

INSERT INTO `master_level` (`id`, `nama`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Level 1', NULL, 'ACTIVE', '2025-08-25 07:15:59', '2025-08-25 07:15:59'),
(2, 'Level 2', NULL, 'ACTIVE', '2025-08-25 07:15:59', '2025-08-25 07:15:59'),
(3, 'Level 3', NULL, 'ACTIVE', '2025-08-25 07:15:59', '2025-08-25 07:15:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_perasaan`
--

CREATE TABLE `master_perasaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `gambar_real` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_perasaan`
--

INSERT INTO `master_perasaan` (`id`, `nama`, `keterangan`, `gambar`, `gambar_real`, `audio`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Senang', NULL, 'perasaan/gambar/I9zmJbDMdnHPZNmI9qkjJVzqOzKYuupZIR6yzj5v.png', NULL, 'perasaan/audio/uBaNI2wbCyavPuRMhwdXn2M2yTzOTdO1YHu0Y9c2.mp3', 'ACTIVE', '2025-08-25 07:15:59', '2025-11-19 07:26:53'),
(2, 'Marah', NULL, 'perasaan/gambar/WQcTuHTr3UShq2ufdojnZeSU8sVPZ9sMYNh2QKiZ.png', NULL, 'perasaan/audio/IYAOs5rphGk0Aeg7fZi04tLRpJEyf0Dq08wKxTdL.mp3', 'ACTIVE', '2025-08-25 07:15:59', '2025-08-25 07:18:17'),
(3, 'Takut', NULL, 'perasaan/gambar/86IIFyThQobpGRAIquy0GdqtaEZNWJBd21FeNs6t.png', NULL, 'perasaan/audio/W3gfRpTCFXGHLzy4tbB4UGX6MUraUJxsCevPLaxC.mp3', 'ACTIVE', '2025-08-25 07:15:59', '2025-08-25 07:18:32'),
(4, 'Sedih', NULL, 'perasaan/gambar/2wfWxuKX7nqRWCPOpZ1hCZhebilGu2HGA0aLbSQO.png', NULL, 'perasaan/audio/tZgfdtfu8eBuUuuAojdUzwMFnJJ6G831f1Q7dZh9.mp3', 'ACTIVE', '2025-08-25 07:15:59', '2025-08-25 07:18:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_soal`
--

CREATE TABLE `master_soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `jumlah_isian` int(11) NOT NULL DEFAULT 1,
  `jawaban_benar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`jawaban_benar`)),
  `bobot` int(11) NOT NULL DEFAULT 100,
  `background_color` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_soal`
--

INSERT INTO `master_soal` (`id`, `level_id`, `judul`, `pertanyaan`, `gambar`, `deskripsi`, `jumlah_isian`, `jawaban_benar`, `bobot`, `background_color`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'MENCOCOKKAN GAMBAR PERASAAN', 'soal 1', NULL, NULL, 4, '[\"4\",\"1\",\"2\",\"3\"]', 100, '#baebff', 'ACTIVE', '2025-08-25 07:22:22', '2025-08-25 07:22:22'),
(2, 1, 'MENCOCOKKAN GAMBAR PERASAAN', 'soal 2', NULL, NULL, 4, '[\"2\",\"3\",\"4\",\"1\"]', 100, '#baebff', 'ACTIVE', '2025-08-25 07:22:22', '2025-08-25 07:22:22'),
(3, 2, 'PILIH PERASAANMU!', 'Saat temanku merebut mainanku, aku merasa....', 'soal/D1UFuo38y9khfZ0OkM9i1V6I6yrEVIcIK2W90s2h.png', NULL, 1, '[\"2\"]', 100, '#e76647', 'ACTIVE', '2025-08-25 07:26:03', '2025-08-25 07:26:03'),
(4, 2, 'PILIH PERASAANMU!', 'Saat aku terjatuh dari sepeda, aku merasa....', 'soal/1QbDtS0UIEPgImaECiWv6jxsGw0vS5HQooyCEjfW.png', NULL, 1, '[\"4\"]', 100, '#7ba3df', 'ACTIVE', '2025-08-25 07:26:03', '2025-08-25 07:26:03'),
(5, 2, 'PILIH PERASAANMU!', 'Saat bermain dengan teman, aku merasa...', 'soal/HB4G768BuZeosaGl0lPCpxnpfq7y6tDlj7DlIAI5.png', NULL, 1, '[\"1\"]', 100, '#9bc37b', 'ACTIVE', '2025-08-25 07:26:03', '2025-08-25 07:26:03'),
(6, 2, 'PILIH PERASAANMU!', 'Saat aku dikejar anjing, aku merasa....', 'soal/EQcepbZWOGtWj08R6tvYf0l3nnfdsepk3VpyMCnX.png', NULL, 1, '[\"3\"]', 100, '#ffe766', 'ACTIVE', '2025-08-25 07:26:03', '2025-08-25 07:26:03'),
(7, 3, 'PILIH PERASAANMU!', 'Saat temanku merebut mainanku, aku merasa....', 'soal/7N1A5YKHbkl3vwrbvVujXeD5VvBImlW2EDjfUCyH.png', NULL, 1, '[\"2\"]', 100, '#e76647', 'ACTIVE', '2025-08-25 07:27:58', '2025-08-25 07:27:58'),
(8, 3, 'PILIH PERASAANMU!', 'Saat nilaiku jelek, aku merasa....', 'soal/AMxJnSpLnEJz2lk1xGIYZ9DIaM2snDnBrjssUIA7.png', NULL, 1, '[\"4\"]', 100, '#7ba3df', 'ACTIVE', '2025-08-25 07:27:58', '2025-08-25 07:27:58'),
(9, 3, 'PILIH PERASAANMU!', 'Saat aku mendapatkan hadiah, aku merasa....', 'soal/wzY6WNRKR2Fl4u1wCdkSJgbVLk7io5IWNEMqrgfv.png', NULL, 1, '[\"1\"]', 100, '#9bc37b', 'ACTIVE', '2025-08-25 07:27:58', '2025-08-25 07:27:58'),
(10, 3, 'PILIH PERASAANMU!', 'Saat ada sesuatu yang menyeramkan, aku merasa....', 'soal/Zmj9dwFMB3P7gnnycfbKbibX0kfCzsOIElU5HIlJ.png', NULL, 1, '[\"3\"]', 100, '#ffe766', 'ACTIVE', '2025-08-25 07:27:58', '2025-08-25 07:27:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_15_063117_create_perasaan_table', 1),
(5, '2025_08_15_073916_create_level_table', 1),
(6, '2025_08_15_104345_create_soal_table', 1),
(7, '2025_08_15_135025_create_skor_user_table', 1),
(8, '2025_08_20_154912_create_jawaban_user_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('il2aoPhOdE2KM9pLbb5UZCb7lYCdiNgqf95OQXbV', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOVdYSnNkSjZJNjJIRjJ6S2JEQXJnTXhhMFhuSmRRNTZzdmJuVTBkNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2Vtb3Npa3UiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc2MzU2MTQ1Njt9fQ==', 1763563560),
('QlIYIKFO7zLsOfMLFyY83tqgd1Hxz57wqnmzmnVH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiS3pyOG9kYVFvZ0x1QkZqQ2ZabGwyb3pqVHlEVWdxajVod2tkVmlwaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXIvcGlsaWgtbGV2ZWwiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL21hc3Rlci1wZXJhc2Fhbi8xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NjM1NjE0NTI7fX0=', 1763562415);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor_user`
--

CREATE TABLE `skor_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Kamus Perasaanku', 'Admin', 'admin@kamusperasaanku.com', '2025-08-25 07:15:58', '$2y$12$HjZ99M6lxQ2sZxkGoPEzVOKx9VSJtUbMYGB1/NkRy6wm1JKH6uD8W', 'ACTIVE', 'YkOKRSZj2uotLn97e4OE3tJLliwi6EKl3TxRueOMiVkKNy7d2vWJhIMNaMdi', '2025-08-25 07:15:59', '2025-08-25 07:15:59'),
(2, 'User Kamus Perasaanku', 'User', 'user@kamusperasaanku.com', '2025-08-25 07:15:59', '$2y$12$zaatdhSs9Nm9dLr819Adq.EOIIa.fDcKgwYjRO9Ktiq47PSrXLgIW', 'ACTIVE', 'yAvg3S7BZUY9LOqRJSLTD9pjfyR7zx6yHTEVWoJINP3AUWdmrjrZdyizrL6S', '2025-08-25 07:15:59', '2025-08-25 07:15:59'),
(3, 'Admin 2', 'Admin', 'admin2@kamusperasaanku.com', NULL, '$2y$12$lWGHaAPZSLazgHAB4L5rZeGX2PvW6z1Xg0AaVeKQQRNkEy4HAV4h2', 'ACTIVE', NULL, '2025-10-28 17:58:46', '2025-10-28 17:58:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jawaban_user`
--
ALTER TABLE `jawaban_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawaban_user_user_id_foreign` (`user_id`),
  ADD KEY `jawaban_user_soal_id_foreign` (`soal_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_level`
--
ALTER TABLE `master_level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_perasaan`
--
ALTER TABLE `master_perasaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_soal`
--
ALTER TABLE `master_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_soal_level_id_foreign` (`level_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `skor_user`
--
ALTER TABLE `skor_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skor_user_user_id_foreign` (`user_id`),
  ADD KEY `skor_user_level_id_foreign` (`level_id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban_user`
--
ALTER TABLE `jawaban_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_level`
--
ALTER TABLE `master_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_perasaan`
--
ALTER TABLE `master_perasaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_soal`
--
ALTER TABLE `master_soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `skor_user`
--
ALTER TABLE `skor_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jawaban_user`
--
ALTER TABLE `jawaban_user`
  ADD CONSTRAINT `jawaban_user_soal_id_foreign` FOREIGN KEY (`soal_id`) REFERENCES `master_soal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_soal`
--
ALTER TABLE `master_soal`
  ADD CONSTRAINT `master_soal_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `master_level` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skor_user`
--
ALTER TABLE `skor_user`
  ADD CONSTRAINT `skor_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `master_level` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skor_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
