-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 03:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveldb07`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `user_id`, `department_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'ฝ่ายโฆษณา', '2022-02-21 09:06:57', '2022-02-23 07:32:44', '2022-02-23 07:32:44'),
(2, 4, 'ฝ่ายกราฟฟิกดีไซน์', '2022-02-21 09:19:38', '2022-02-23 07:33:32', NULL),
(3, 4, 'โปรแกรมเมอร์', '2022-02-21 09:23:08', '2022-02-23 07:32:46', '2022-02-23 07:32:46'),
(4, 4, 'ฝ่ายการตลาด', '2022-02-21 09:23:33', '2022-02-23 07:24:30', NULL),
(12, 4, 'ฝ่ายจัดซื้อ', '2022-02-22 02:35:50', '2022-02-23 07:24:29', NULL),
(13, 4, 'ผู้ดูแลระบบ', '2022-02-22 02:44:20', '2022-02-23 07:24:28', NULL),
(14, 4, 'ฝ่ายบัญชี', '2022-02-22 02:56:30', '2022-02-23 07:09:15', NULL),
(15, 3, 'ฝ่ายกฏหมาย', '2022-02-22 03:23:56', '2022-02-23 07:10:29', NULL),
(17, 3, 'ฝ่ายนวัตกรรม', '2022-02-23 03:59:34', '2022-02-23 07:24:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2022_02_17_034154_create_sessions_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(7, '2022_02_21_110332_create_departments_table', 3),
(8, '2022_02_23_151009_create_services_table', 4),
(9, '2022_02_25_141232_create_siams_table', 5),
(10, '2022_02_25_141300_create_paes_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `paes`
--

CREATE TABLE `paes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paes`
--

INSERT INTO `paes` (`id`, `name_id`, `data`, `data2`, `created_at`, `updated_at`) VALUES
(1, '4', '55.32', 3, '2022-02-25 07:17:05', '2022-02-25 07:17:10'),
(2, '4', '49.65', 8, '2022-02-25 07:17:19', '2022-02-25 07:17:21'),
(3, '4', '12.33', 12, '2022-02-25 07:17:19', '2022-02-25 07:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_image`, `created_at`, `updated_at`) VALUES
(1, 'ทดสอบ1', 'image/services\\1645754676.jpg', '2022-02-25 02:04:36', '2022-02-25 06:59:41'),
(2, 'เทส', 'image/services\\1645754687.jpg', '2022-02-25 02:04:47', '2022-02-25 02:04:47'),
(3, 'ทดสอบ2', 'image/services\\1645772364.jpg', '2022-02-25 02:04:56', '2022-02-25 06:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BgiIAMHGEE15kGBpDtDX51iTlsV4Xy1qVTUXt8fm', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNVhDNzh6cE0waklpdlB0eVBTNUhtcVZhODI4RGFHMm00SUtTamo4MyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJERtaUJEUHhCSE1qdS5IQXV2cW9ySy52cm1Cdnp2bTVySjE4dnZsSTdrWlNiLzEucHJwZHpPIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCREbWlCRFB4QkhNanUuSEF1dnFvcksudnJtQnZ6dm01ckoxOHZ2bEk3a1pTYi8xLnBycGR6TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1645772324),
('VOOgg241BiCJXGshpP5Lat0edcKWJFbyj7dA4k6t', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVUljZ2NzdGg2dWZzNjkzQjBJYkdnRm1hME9CVmxiQkhrNE00dnhxcSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJERtaUJEUHhCSE1qdS5IQXV2cW9ySy52cm1Cdnp2bTVySjE4dnZsSTdrWlNiLzEucHJwZHpPIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCREbWlCRFB4QkhNanUuSEF1dnFvcksudnJtQnZ6dm01ckoxOHZ2bEk3a1pTYi8xLnBycGR6TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1645772323),
('Ym541KJBDv92q0F4s3GNW3qtEy0wkCoX5MIqQn8m', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoib0tzOUdYTkp2UVhjQ05XQXpRR2dkR29qblBMNkY3czJzUFBYQnEwWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYW51dGF0L2FsbCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCREbWlCRFB4QkhNanUuSEF1dnFvcksudnJtQnZ6dm01ckoxOHZ2bEk3a1pTYi8xLnBycGR6TyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkRG1pQkRQeEJITWp1LkhBdXZxb3JLLnZybUJ2enZtNXJKMTh2dmxJN2taU2IvMS5wcnBkek8iO30=', 1645778833);

-- --------------------------------------------------------

--
-- Table structure for table `siams`
--

CREATE TABLE `siams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siams`
--

INSERT INTO `siams` (`id`, `name_id`, `data`, `data2`, `created_at`, `updated_at`) VALUES
(1, '3', '78.96', 2, '2022-02-25 07:17:59', '2022-02-25 07:18:02'),
(2, '3', '32.45', 1, '2022-02-25 07:18:04', '2022-02-25 07:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(3, 'siams', 'siam@siam.com', NULL, '$2y$10$DmiBDPxBHMju.HAuvqorK.vrmBvzvm5rJ18vvlI7kZSb/1.prpdzO', NULL, NULL, 'Ue0pSS8aiA9FU49JVUOsOWp0vWdxglhozgYRnbYCUrw75KpFzvGCcGDsMlew', NULL, NULL, '2022-02-17 08:44:20', '2022-02-25 08:46:07'),
(4, 'paes', 'pae@pae.com', NULL, '$2y$10$oSr5LJasgchSZ5QUzlYePOS4lhcFiIg0tj8ePz.Wt5KLpX9lRUm8a', NULL, NULL, 'I8TlIQ77VIWFbX0MBPhKBA8H2PmfXgj76cZV1dOxIqxr0cLDZZXBAxSu5hwF', NULL, NULL, '2022-02-21 02:24:53', '2022-02-25 08:46:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paes`
--
ALTER TABLE `paes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siams`
--
ALTER TABLE `siams`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paes`
--
ALTER TABLE `paes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siams`
--
ALTER TABLE `siams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
