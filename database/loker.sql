-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 06:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loker`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lowongan_pekerjaan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lamars`
--

CREATE TABLE `lamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promosikan_diri` text NOT NULL,
  `upload_file_resume` varchar(255) NOT NULL,
  `id_lowongan_pekerjaan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lamars`
--

INSERT INTO `lamars` (`id`, `promosikan_diri`, `upload_file_resume`, `id_lowongan_pekerjaan`, `created_at`, `updated_at`) VALUES
(1, 'uddddddddddddddddddddddddddddddd', 'resumes/UcCsDqBh5Q4R9d4rpIZmayNlAskTwoC1AV6iVNr8.pdf', 1, '2025-01-09 05:19:13', '2025-01-09 05:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan_pekerjaan`
--

CREATE TABLE `lowongan_pekerjaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` bigint(20) UNSIGNED NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gaji` decimal(15,2) DEFAULT NULL,
  `tipe_pekerjaan` enum('freelance','parttime','fulltime','kontrak','magang') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lowongan_pekerjaan`
--

INSERT INTO `lowongan_pekerjaan` (`id`, `perusahaan_id`, `posisi`, `deskripsi`, `gaji`, `tipe_pekerjaan`, `created_at`, `updated_at`) VALUES
(1, 1, 'backend engginer', 'sjjjjjjjjjjjjjjjjjjjjjjjjj', 7000000.00, 'freelance', '2025-01-09 05:10:12', '2025-01-09 05:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_07_032311_create_perusahaan_table', 1),
(5, '2025_01_07_032312_create_lowongan_pekerjaan_table', 1),
(6, '2025_01_07_032313_create_lamaran_table', 1),
(7, '2025_01_07_032313_create_profil_pengguna_table', 1),
(8, '2025_01_07_032314_create_profil_perusahaan_table', 1),
(9, '2025_01_07_032315_create_pelamar_lowongan_table', 1),
(10, '2025_01_07_032727_add_role_to_users_table', 1),
(11, '2025_01_07_122256_add_user_id_to_perusahaan_table', 1),
(12, '2025_01_08_012645_create_resume_table', 1),
(13, '2025_01_09_023202_create_pertanyaan_table', 1),
(14, '2025_01_09_060537_create_lamars_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelamar_lowongan`
--

CREATE TABLE `pelamar_lowongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lamaran_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaans`
--

CREATE TABLE `pertanyaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lowongan_pekerjaan_id` bigint(20) UNSIGNED NOT NULL,
  `judul_pertanyaan` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaans`
--

INSERT INTO `pertanyaans` (`id`, `lowongan_pekerjaan_id`, `judul_pertanyaan`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'uul', 'jssssssssssssssssssssssssss', '2025-01-09 05:10:23', '2025-01-09 05:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `user_id`, `nama_perusahaan`, `email`, `telepon`, `alamat`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'nike air', 'ifa1@gmail', '0897654222', 'banyuanyar', 'logos/Yu0sQJAxGCnospOaBe3klOOTRDLbQQctFbHavkTL.png', '2025-01-09 05:09:45', '2025-01-09 05:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `profil_pengguna`
--

CREATE TABLE `profil_pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tentang_saya` text NOT NULL,
  `keterampilan` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_perusahaan`
--

CREATE TABLE `profil_perusahaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` bigint(20) UNSIGNED NOT NULL,
  `tentang_perusahaan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tahun_lahir` year(4) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `pengalaman` text DEFAULT NULL,
  `pendidikan` text DEFAULT NULL,
  `keahlian` text DEFAULT NULL,
  `minat` text DEFAULT NULL,
  `ringkasan_pribadi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `id_pengguna`, `nama_lengkap`, `jenis_kelamin`, `tahun_lahir`, `lokasi`, `pengalaman`, `pendidikan`, `keahlian`, `minat`, `ringkasan_pribadi`, `created_at`, `updated_at`) VALUES
(1, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:21', '2025-01-09 07:55:21'),
(2, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:25', '2025-01-09 07:55:25'),
(3, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:25', '2025-01-09 07:55:25'),
(4, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:28', '2025-01-09 07:55:28'),
(5, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:29', '2025-01-09 07:55:29'),
(6, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:29', '2025-01-09 07:55:29'),
(7, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:30', '2025-01-09 07:55:30'),
(8, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:31', '2025-01-09 07:55:31'),
(9, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:31', '2025-01-09 07:55:31'),
(10, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:32', '2025-01-09 07:55:32'),
(11, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:33', '2025-01-09 07:55:33'),
(12, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:34', '2025-01-09 07:55:34'),
(13, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:35', '2025-01-09 07:55:35'),
(14, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:35', '2025-01-09 07:55:35'),
(15, 2, 'ssssssssssssssssssssss', 'Wanita', '2007', 'patokan', 'xnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmmmm', 'jdejdddddddddddddddddd', 'dnnnnnnnnnnnnnnnnnnn', 'dmmmmmmmmmmmmm', '2025-01-09 07:55:36', '2025-01-09 07:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GnGIeQ0FMsUQ48j6WDy9hB8djlfTXcMUPibak0GM', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibnFmZ1dpYTVHREg1a3JvYXRQSzdkOVh1dEduRFZzT0o3UkxPdmN6MCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1736442161);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('user','perusahaan') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'sudimarto', 'sudimarto@gmail.com', NULL, '$2y$12$7fZ8cjt4SuJIlZQnUFj/V.xcxf5xQ1LcpbaUUgML.rRXfE1OTaGCa', NULL, '2025-01-09 00:20:41', '2025-01-09 00:20:41', 'perusahaan'),
(2, 'ifa', 'ifa2@gmail.com', NULL, '$2y$12$rpiG4lz9bVvbMmEaY1S7cus8sBJr052/bzhGKz.aDhmSS2b2JyvFy', NULL, '2025-01-09 05:17:10', '2025-01-09 05:17:10', 'user');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lamaran_lowongan_pekerjaan_id_foreign` (`lowongan_pekerjaan_id`),
  ADD KEY `lamaran_user_id_foreign` (`user_id`);

--
-- Indexes for table `lamars`
--
ALTER TABLE `lamars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lamars_id_lowongan_pekerjaan_foreign` (`id_lowongan_pekerjaan`);

--
-- Indexes for table `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lowongan_pekerjaan_perusahaan_id_foreign` (`perusahaan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelamar_lowongan`
--
ALTER TABLE `pelamar_lowongan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelamar_lowongan_lamaran_id_foreign` (`lamaran_id`);

--
-- Indexes for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaans_lowongan_pekerjaan_id_foreign` (`lowongan_pekerjaan_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perusahaan_user_id_foreign` (`user_id`);

--
-- Indexes for table `profil_pengguna`
--
ALTER TABLE `profil_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_pengguna_user_id_foreign` (`user_id`);

--
-- Indexes for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_perusahaan_perusahaan_id_foreign` (`perusahaan_id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resumes_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lamars`
--
ALTER TABLE `lamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelamar_lowongan`
--
ALTER TABLE `pelamar_lowongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil_pengguna`
--
ALTER TABLE `profil_pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `lamaran_lowongan_pekerjaan_id_foreign` FOREIGN KEY (`lowongan_pekerjaan_id`) REFERENCES `lowongan_pekerjaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lamaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lamars`
--
ALTER TABLE `lamars`
  ADD CONSTRAINT `lamars_id_lowongan_pekerjaan_foreign` FOREIGN KEY (`id_lowongan_pekerjaan`) REFERENCES `lowongan_pekerjaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  ADD CONSTRAINT `lowongan_pekerjaan_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pelamar_lowongan`
--
ALTER TABLE `pelamar_lowongan`
  ADD CONSTRAINT `pelamar_lowongan_lamaran_id_foreign` FOREIGN KEY (`lamaran_id`) REFERENCES `lamaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD CONSTRAINT `pertanyaans_lowongan_pekerjaan_id_foreign` FOREIGN KEY (`lowongan_pekerjaan_id`) REFERENCES `lowongan_pekerjaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profil_pengguna`
--
ALTER TABLE `profil_pengguna`
  ADD CONSTRAINT `profil_pengguna_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  ADD CONSTRAINT `profil_perusahaan_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
