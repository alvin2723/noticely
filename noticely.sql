-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 01:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noticely`
--

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'IT', NULL, NULL),
(2, 'Marketing', NULL, NULL),
(3, 'Desain', NULL, NULL),
(4, 'Data', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id_manager` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id_manager`, `id_users`, `division_id`, `name`, `alamat`, `phone`, `created_at`, `updated_at`) VALUES
('M01', 2, 1, 'SOkap', 'Jambi', '082281595024', NULL, NULL);

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
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2020_10_22_015528_database_mom', 1),
(27, '2020_10_22_042451_create_permission_tables', 1),
(28, '2020_11_01_033918_create_division_table', 1),
(29, '2020_11_01_041054_create_staff_supervisor_manager_table', 1),
(30, '2020_11_05_121154_user_mom_table', 2),
(31, '2020_11_18_044735_m_o_m_notif_note', 3),
(32, '2020_11_18_050453_user_notif_note', 4),
(33, '2020_11_18_054719_mom_note', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 4),
(2, 'App\\User', 1),
(2, 'App\\User', 17),
(2, 'App\\User', 18),
(2, 'App\\User', 19),
(2, 'App\\User', 20),
(2, 'App\\User', 22),
(2, 'App\\User', 27),
(3, 'App\\User', 3),
(3, 'App\\User', 21),
(3, 'App\\User', 23),
(3, 'App\\User', 25),
(3, 'App\\User', 26),
(4, 'App\\User', 2),
(4, 'App\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `mom`
--

CREATE TABLE `mom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `title_mom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_mom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_mom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_mom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objective_mom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decision_made` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_attendee` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mom`
--

INSERT INTO `mom` (`id`, `id_users`, `title_mom`, `date_mom`, `start_mom`, `end_mom`, `objective_mom`, `decision_made`, `count_attendee`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdasdaaaaa', '123123-03-12', '13:23', '12:23', 'sdfsfdsdssds', 'sdfsdfsdfsdsdd', 1, '3', NULL, '2020-11-17 23:23:15', '2020-11-18 03:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `note_mom`
--

CREATE TABLE `note_mom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mom` bigint(20) UNSIGNED DEFAULT NULL,
  `note_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mom` bigint(20) UNSIGNED DEFAULT NULL,
  `notif_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `id_mom`, `notif_type`, `created_at`, `updated_at`) VALUES
(2, 1, 'Email', '2020-11-18 02:50:15', '2020-11-18 02:50:15'),
(3, 1, 'WhatsApp', '2020-11-18 03:28:25', '2020-11-18 03:28:25');

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
-- Table structure for table `permissions`
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-10-31 22:19:49', '2020-10-31 22:19:49'),
(2, 'Staff', 'web', '2020-10-31 22:19:49', '2020-10-31 22:19:49'),
(3, 'Supervisor', 'web', '2020-10-31 22:19:49', '2020-10-31 22:19:49'),
(4, 'Manager', 'web', '2020-10-31 22:19:49', '2020-10-31 22:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_supervisor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(12) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `id_users`, `id_supervisor`, `name`, `division_id`, `alamat`, `phone`, `created_at`, `updated_at`) VALUES
('S01', 1, 'SP01', 'Julsa', 1, 'Jambi', '6285215000284', NULL, NULL),
('S02', 12, 'SP01', 'Juladf', 1, 'Jambi', '012312315656', NULL, NULL),
('S04', 18, 'SP01', 'adasda', 1, 'fdsdfsdfds', '123123123', NULL, NULL),
('S05', 19, 'SP01', 'Baw', 1, 'Jambisss 234', '012312315657', NULL, NULL),
('S06', 20, 'SP02', 'Harry', 1, 'Gatot Subroto', '0812323', NULL, NULL),
('S07', 22, 'SP03', 'Hans', 2, 'Jl. Pawot', '085402300456', '2020-11-12 20:29:59', '2020-11-12 20:29:59'),
('S08', 27, 'SP02', 'Julian', 1, 'Jl. Kelapa Dua', '6285215000284', '2020-11-18 04:30:56', '2020-11-18 04:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id_supervisor` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(12) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id_supervisor`, `id_users`, `id_manager`, `name`, `division_id`, `alamat`, `phone`, `created_at`, `updated_at`) VALUES
('SP01', 3, 'M01', 'Julsan', 1, 'Jambi', '082281595030', NULL, NULL),
('SP02', 8, 'M01', 'Mager', 1, 'Jambi', '082281595030', NULL, NULL),
('SP03', 21, 'M01', 'Jack', 2, 'Jl. Gatot', '082319922234', '2020-11-12 20:28:53', '2020-11-12 20:28:53'),
('SP04', 26, 'M01', 'Bokap', 1, 'Jambisss', '1231231232323', '2020-11-12 21:39:04', '2020-11-12 21:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alvin.julian@student.umn.ac.id', NULL, '$2y$10$vLnAx1vSp5oFim3cafUhwO.Nl0ZdrMqybgAnY.gJMF.SoM87wMAVW', NULL, '2020-10-31 22:20:28', '2020-10-31 22:20:28'),
(2, 'user2@gmail.com', NULL, '$2y$10$TbWl.AWtsqxJHvPFiCJOjee2NflvUxy2YeCg4TZTwk.CZQS8.MXGe', NULL, '2020-10-31 22:21:54', '2020-10-31 22:21:54'),
(3, 'user1@gmail.com', NULL, '$2y$10$UubzPA4zATQmIsiYF1Z36OPHBvneD8MICO14aZW90vbpT6tJIINHG', NULL, '2020-10-31 22:22:59', '2020-10-31 22:22:59'),
(4, 'alvinjulian62@gmail.com', NULL, '$2y$10$c8p27zzYpAiCUit/mAjWZuW5se1XVdNW1VhrFOz2/y2rwwY2E3Kiy', NULL, '2020-10-31 22:30:22', '2020-10-31 22:30:22'),
(5, 'dds', NULL, '$2y$10$u0h1nDB3MeNEqEHWa1QfE.bVmZIhqufJpMcNSGvgKpCPRvhgazf5m', NULL, '2020-11-04 21:30:36', '2020-11-04 21:30:36'),
(7, 'ddsfff', NULL, '$2y$10$EQM/y/qnBuXGQ2ZJpxSD5.drSbDld39a2iu1bU5LGJHXjTyRxn7qG', NULL, '2020-11-04 21:36:49', '2020-11-04 21:36:49'),
(8, 'ddsfffsss', NULL, '$2y$10$7tH/cdDkKFSduBVnAfDJnujfuWT4jKY7ATBIdvHrwMOXWX7s4Hziy', NULL, '2020-11-04 21:37:03', '2020-11-04 21:37:03'),
(9, 'daa', NULL, '$2y$10$Ril/QFscIJwB1v/R4aKjPugaKw8JnFme6waIH27Fdi1Nu8nPkUrDa', NULL, '2020-11-04 21:41:32', '2020-11-04 21:41:32'),
(12, 'sdf31122@gmail.com', NULL, '$2y$10$Qftgs1uzGVUISFsqvH4TpOXoctn1clTSWwfD6NEd9NXhpg1wjowbC', NULL, '2020-11-04 22:08:49', '2020-11-04 22:08:49'),
(15, 'asdads@gmail.com', NULL, '$2y$10$MQMwVLHp9mYcGy6x0wJNYOT/VjVSMzee49.6iL8BjU/MhQpVZZ0Ne', NULL, '2020-11-10 01:34:02', '2020-11-10 01:34:02'),
(17, 'asdads222@gmail.com', NULL, '$2y$10$Q/KXz62YBWsiqjwSLoPcj.ceFwyGdoes4iwevyPTIEhS3v7s0z/LC', NULL, '2020-11-10 01:36:40', '2020-11-10 01:36:40'),
(18, 'asdads22aaa2@gmail.com', NULL, '$2y$10$UzunwjK49t1YZwCqCdmZXu1oB/DfkST8KMz5L98xXgNDH2lJ0Tr0.', NULL, '2020-11-10 01:41:41', '2020-11-10 01:41:41'),
(19, 'bawo@gmail.com', NULL, '$2y$10$U92Jyj80SmbNUWnXH5z94em3BArcg5hmjJ7/nFWqG2MseMvTNFrd2', NULL, '2020-11-12 20:08:50', '2020-11-12 20:08:50'),
(20, 'harry@gmail.com', NULL, '$2y$10$OmQe99VX3D6sFJCpJCKZtOnta3jfuiw.uU5sognAieJkYi2f50Qca', NULL, '2020-11-12 20:12:32', '2020-11-12 20:12:32'),
(21, 'jack@gmail.com', NULL, '$2y$10$BM6N.OyAOAoom0M3fK8n5.oi9LyVDNp.G2mh2S6hs5vft3bovrgNK', NULL, '2020-11-12 20:28:53', '2020-11-12 20:28:53'),
(22, 'hans@gmail.com', NULL, '$2y$10$p0dcegZaWVErQvH9afieouvkeUDH15XMwzKnlWwo4galEVKK7qb9m', NULL, '2020-11-12 20:29:59', '2020-11-12 20:29:59'),
(23, '12ss@gmail.com', NULL, '$2y$10$gia5awvKFzfx8dPW5OF34eSnfw13VwAK07R.NAANOcRRoQi8rnXJO', NULL, '2020-11-12 21:37:48', '2020-11-12 21:37:48'),
(25, '12aass@gmail.com', NULL, '$2y$10$Y5ZsJHDPck5LQm13lHYGd.lehyhhZeNvP8qo6EsGpvxSjjmj6L2qy', NULL, '2020-11-12 21:38:18', '2020-11-12 21:38:18'),
(26, '12aaaass@gmail.com', NULL, '$2y$10$BPVhdiYGlW.ZB2e1HNA4tebAnYWkUAc.61S8YhHluzSrkazEWxBDK', NULL, '2020-11-12 21:39:03', '2020-11-12 21:39:03'),
(27, 'alvinjulian87@gmail.com', NULL, '$2y$10$6P33t35aBX8FG5ql1FHgFuMgyS9VBHBd7BPeJm74GDTP4G2zQ1sdG', NULL, '2020-11-18 04:30:56', '2020-11-18 04:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_mom`
--

CREATE TABLE `user_mom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mom` bigint(20) UNSIGNED DEFAULT NULL,
  `id_attendee` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_mom`
--

INSERT INTO `user_mom` (`id`, `id_mom`, `id_attendee`, `created_at`, `updated_at`) VALUES
(1, 1, 'S02', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_manager`),
  ADD KEY `manager_id_users_foreign` (`id_users`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mom`
--
ALTER TABLE `mom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mom_id_users_foreign` (`id_users`);

--
-- Indexes for table `note_mom`
--
ALTER TABLE `note_mom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_mom_id_mom_foreign` (`id_mom`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notif_id_mom_foreign` (`id_mom`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `staff_id_users_foreign` (`id_users`),
  ADD KEY `staff_id_supervisor_foreign` (`id_supervisor`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id_supervisor`),
  ADD KEY `supervisor_id_users_foreign` (`id_users`),
  ADD KEY `supervisor_id_manager_foreign` (`id_manager`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_mom`
--
ALTER TABLE `user_mom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_mom_id_mom_foreign` (`id_mom`),
  ADD KEY `user_mom_id_attendee_foreign` (`id_attendee`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mom`
--
ALTER TABLE `mom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `note_mom`
--
ALTER TABLE `note_mom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_mom`
--
ALTER TABLE `user_mom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mom`
--
ALTER TABLE `mom`
  ADD CONSTRAINT `mom_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `note_mom`
--
ALTER TABLE `note_mom`
  ADD CONSTRAINT `note_mom_id_mom_foreign` FOREIGN KEY (`id_mom`) REFERENCES `mom` (`id`);

--
-- Constraints for table `notif`
--
ALTER TABLE `notif`
  ADD CONSTRAINT `notif_id_mom_foreign` FOREIGN KEY (`id_mom`) REFERENCES `mom` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_id_supervisor_foreign` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`id_supervisor`),
  ADD CONSTRAINT `staff_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_id_manager_foreign` FOREIGN KEY (`id_manager`) REFERENCES `manager` (`id_manager`),
  ADD CONSTRAINT `supervisor_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_mom`
--
ALTER TABLE `user_mom`
  ADD CONSTRAINT `user_mom_id_attendee_foreign` FOREIGN KEY (`id_attendee`) REFERENCES `staff` (`id_staff`),
  ADD CONSTRAINT `user_mom_id_mom_foreign` FOREIGN KEY (`id_mom`) REFERENCES `mom` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
