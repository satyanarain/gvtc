-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2018 at 06:37 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gvtc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminunits`
--

CREATE TABLE `adminunits` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminunits`
--

INSERT INTO `adminunits` (`id`, `country`, `admincode`, `designation`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'PR', NULL, NULL, '2018-01-12 02:53:59', '2018-01-12 02:53:59'),
(2, NULL, 'DI', NULL, NULL, '2018-01-12 02:54:14', '2018-01-12 02:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_within_albertine_rift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `range`, `range_within_albertine_rift`, `created_at`, `updated_at`) VALUES
(1, 'UG', 'Uganda', '2018-01-12 02:41:42', '2018-01-12 02:41:42'),
(2, 'RW', 'Rwanda', '2018-01-12 02:42:23', '2018-01-12 02:42:23'),
(3, 'DRC', 'DRC', '2018-01-12 02:42:44', '2018-01-12 02:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `endenisms`
--

CREATE TABLE `endenisms` (
  `id` int(10) UNSIGNED NOT NULL,
  `endenism` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `endenisms`
--

INSERT INTO `endenisms` (`id`, `endenism`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Y', 'Endemic to the Albertine Rift', '2018-01-12 02:47:34', '2018-01-12 02:47:34'),
(2, 'N', 'Not-Endemic to the Albertine Rift', '2018-01-12 02:47:52', '2018-01-12 02:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `endnisms`
--

CREATE TABLE `endnisms` (
  `id` int(10) UNSIGNED NOT NULL,
  `endenism` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forestuse`
--

CREATE TABLE `forestuse` (
  `id` int(10) UNSIGNED NOT NULL,
  `forest_use` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forest_habitat_usage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forestuse`
--

INSERT INTO `forestuse` (`id`, `forest_use`, `forest_habitat_usage`, `created_at`, `updated_at`) VALUES
(1, 'FF', 'Forest Specialist', '2018-01-12 02:44:12', '2018-01-12 02:44:12'),
(2, 'F', 'Forest Generalist', '2018-01-12 02:44:34', '2018-01-12 02:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `growths`
--

CREATE TABLE `growths` (
  `id` int(10) UNSIGNED NOT NULL,
  `growth_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plants_growth_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `growths`
--

INSERT INTO `growths` (`id`, `growth_form`, `plants_growth_form`, `created_at`, `updated_at`) VALUES
(1, 'T', 'Tree', '2018-01-12 01:59:02', '2018-01-12 01:59:02'),
(2, 'S', 'Shrub', '2018-01-12 01:59:18', '2018-01-12 01:59:18'),
(3, 'H', 'Herb', '2018-01-12 01:59:31', '2018-01-12 01:59:31'),
(4, 'L', 'Liana', '2018-01-12 01:59:47', '2018-01-12 01:59:47'),
(5, 'G', 'Grass', '2018-01-12 02:00:18', '2018-01-12 02:00:18'),
(6, 'F', 'Fern', '2018-01-12 02:00:34', '2018-01-12 02:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `iucn_threats`
--

CREATE TABLE `iucn_threats` (
  `id` int(10) UNSIGNED NOT NULL,
  `iucn_threat_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iucn_code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iucn_threats`
--

INSERT INTO `iucn_threats` (`id`, `iucn_threat_code`, `iucn_code_description`, `created_at`, `updated_at`) VALUES
(1, 'CR', 'Critically endangered', '2018-01-12 01:51:07', '2018-01-12 01:51:07'),
(2, 'EN', 'Endangered', '2018-01-12 01:51:36', '2018-01-12 01:51:36'),
(3, 'VU', 'Vulnerable', '2018-01-12 01:52:03', '2018-01-12 01:52:03'),
(4, 'NT', 'Near Threatened', '2018-01-12 01:52:23', '2018-01-12 01:52:23'),
(5, 'LC', 'Least Concern', '2018-01-12 01:52:47', '2018-01-12 01:52:47'),
(6, 'DD', 'Data Deficient', '2018-01-12 01:53:09', '2018-01-12 01:53:09');

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
(8, '2017_12_28_104759_entrust_setup_tables', 1),
(14, '2014_10_12_000000_create_users_table', 2),
(15, '2014_10_12_100000_create_password_resets_table', 2),
(16, '2017_12_26_104611_create_admins_table', 2),
(17, '2018_01_04_052012_create_taxons_table', 3),
(18, '2018_01_05_044909_create_iucn_threat_codes_table', 4),
(19, '2018_01_05_051139_create_tests_table', 5),
(20, '2018_01_05_051340_create_iucn_threat_table', 5),
(21, '2018_01_05_093555_create_national_threat_codes_table', 6),
(22, '2018_01_08_062420_create_ranges_table', 7),
(23, '2018_01_08_112518_create_growths_table', 8),
(24, '2018_01_08_123349_create_protected_areas_table', 9),
(25, '2018_01_09_055754_create_countries_table', 10),
(26, '2018_01_09_070238_create_forest_use_table', 11),
(27, '2018_01_09_085642_create_wateruse_table', 12),
(28, '2018_01_09_100506_create_endemisms_table', 13),
(29, '2018_01_09_100506_create_endenisms_table', 14),
(30, '2018_01_10_043843_create_adminunits_table', 15),
(31, '2018_01_10_064921_create_migration_tbl_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `migration_tbl`
--

CREATE TABLE `migration_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birds_migrating_population` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_tbl`
--

INSERT INTO `migration_tbl` (`id`, `migration_title`, `birds_migrating_population`, `created_at`, `updated_at`) VALUES
(6, 'A', 'A=Afrotropical migrant', '2018-01-12 02:49:03', '2018-01-12 02:49:03'),
(7, 'P', 'P=Palearctic migrant)', '2018-01-12 02:49:46', '2018-01-12 02:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `national_threat_codes`
--

CREATE TABLE `national_threat_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `national_threat_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_threat_code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `national_threat_codes`
--

INSERT INTO `national_threat_codes` (`id`, `national_threat_code`, `national_threat_code_description`, `created_at`, `updated_at`) VALUES
(1, 'CR', 'Critically Endangered', '2018-01-12 01:54:16', '2018-01-12 01:54:16'),
(2, 'EN', 'Critically Endangered', '2018-01-12 01:54:41', '2018-01-12 01:54:41'),
(3, 'VU', 'Vulnerable', '2018-01-12 01:55:03', '2018-01-12 01:55:03'),
(4, 'NT', 'Near Threatened', '2018-01-12 01:55:24', '2018-01-12 01:55:24'),
(5, 'LC', 'Least Concern', '2018-01-12 01:55:53', '2018-01-12 01:55:53'),
(6, 'DD', 'Data Deficient', '2018-01-12 01:56:16', '2018-01-12 01:56:16'),
(7, 'NE', 'Not Evaluated', '2018-01-12 01:56:38', '2018-01-12 01:56:38');

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
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `protected_areas`
--

CREATE TABLE `protected_areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `protected_areas`
--

INSERT INTO `protected_areas` (`id`, `designation_code`, `code_description`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NP', 'National Park', NULL, '2018-01-12 02:04:20', '2018-01-12 02:04:20'),
(2, 'FR', 'Forest Reserve', NULL, '2018-01-12 02:04:42', '2018-01-12 02:06:52'),
(3, 'WR', 'Wildlife Reserve', NULL, '2018-01-12 02:07:36', '2018-01-12 02:07:36'),
(4, 'CFR', 'Central Forest Reserve', NULL, '2018-01-12 02:07:55', '2018-01-12 02:07:55'),
(5, 'LFR', 'Local Forest Reserve', NULL, '2018-01-12 02:08:14', '2018-01-12 02:08:14'),
(6, 'DJM', 'Dual Joint Management', NULL, '2018-01-12 02:08:33', '2018-01-12 02:08:33'),
(7, 'HR', 'Hunting Reserve', NULL, '2018-01-12 02:08:58', '2018-01-12 02:08:58'),
(8, 'Hunting Zone', 'HZ', NULL, '2018-01-12 02:09:11', '2018-01-12 02:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `ranges`
--

CREATE TABLE `ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_within_the_albertine_rift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`id`, `range`, `range_within_the_albertine_rift`, `created_at`, `updated_at`) VALUES
(1, 'UG', 'Uganda', '2018-01-12 01:57:33', '2018-01-12 01:57:33'),
(2, 'RW', 'Rwanda', '2018-01-12 01:57:55', '2018-01-12 01:57:55'),
(3, 'DRC', 'DRC', '2018-01-12 01:58:09', '2018-01-12 01:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxons`
--

CREATE TABLE `taxons` (
  `id` int(10) UNSIGNED NOT NULL,
  `taxon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxon_code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxons`
--

INSERT INTO `taxons` (`id`, `taxon_code`, `taxon_code_description`, `created_at`, `updated_at`) VALUES
(1, 'PL', 'Plants', '2018-01-12 01:47:18', '2018-01-12 01:47:18'),
(2, 'IN', 'Insects', '2018-01-12 01:47:42', '2018-01-12 01:47:42'),
(3, 'FI', 'Fish', '2018-01-12 01:48:14', '2018-01-12 01:48:14'),
(4, 'AM', 'Amphibians', '2018-01-12 01:48:37', '2018-01-12 01:48:37'),
(5, 'RE', 'Reptiles', '2018-01-12 01:49:16', '2018-01-12 01:49:16'),
(6, 'BI', 'Birds', '2018-01-12 01:49:40', '2018-01-12 01:49:40'),
(7, 'MA', 'Mammals', '2018-01-12 01:50:02', '2018-01-12 01:50:02'),
(8, 'zxczxcxzc', 'zxcxzcxzc', '2018-01-12 05:31:23', '2018-01-12 05:31:23'),
(9, 'demo', 'demo test', '2018-01-12 05:32:46', '2018-01-12 05:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobilenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_document.png',
  `profilepicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_profile.jpg',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `address`, `mobilenumber`, `email`, `department`, `designation`, `photoid`, `profilepicture`, `password`, `role`, `language`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'address', '96767676', 'rvkumar738@gmail.com', 'Gvtc', 'admin', 'default_document.png', '5a571367b5573_userprofile_png', '$2y$10$s//bO75xDlIeAovCCGkat.51X6VQmIB9aZA.FNvvbDiC4yPCuQ1sq', 'admin', 'en', '6B4a5iFG5Kxaynb7c7SyFOfZsKFZQWQOSMfJ52pt3pryQklC0TWubQADDrXm', NULL, '2018-01-11 02:03:59'),
(66, 'gvtcuser', 'user', 'address', '2343434343', 'rahul@gmail.com', 'Department', 'designation', 'default_document.png', 'default_profile.jpg', '$2y$10$L6sBOHUDLCslWcJHH1rWauDAbjd5o2.6yAVqeBKSBzTkun9OqFQBe', 'user', '66448270', 'm8T3Ycy7yu8aQjQCgw7GoL6Yz9PER7zaYUnGUSfY0LLC99yh8uwEYMYhSwxv', '2018-01-12 02:59:59', '2018-01-12 02:59:59'),
(67, 'username', 'name', 'addres', '897687', 'r@email.com', 'Department', 'designation', 'default_document.png', 'default_profile.jpg', '$2y$10$D9neZnC7m2aYpJXXT6NKVuPJSwWPVsXUQPW8.dezPFcrX5O8tqKjC', 'user', '37183192', NULL, '2018-01-12 05:34:08', '2018-01-12 05:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `wateruse`
--

CREATE TABLE `wateruse` (
  `id` int(10) UNSIGNED NOT NULL,
  `water_use` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_habitat_usage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wateruse`
--

INSERT INTO `wateruse` (`id`, `water_use`, `water_habitat_usage`, `created_at`, `updated_at`) VALUES
(1, 'W', 'Waterbird', '2018-01-12 02:46:05', '2018-01-12 02:46:05'),
(2, 'we', 'water/wetland user', '2018-01-12 02:46:32', '2018-01-12 02:46:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `adminunits`
--
ALTER TABLE `adminunits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminunits_country_unique` (`country`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_range_unique` (`range`);

--
-- Indexes for table `endenisms`
--
ALTER TABLE `endenisms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `endemisms_endemism_unique` (`endenism`);

--
-- Indexes for table `endnisms`
--
ALTER TABLE `endnisms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `endnisms_endenism_unique` (`endenism`);

--
-- Indexes for table `forestuse`
--
ALTER TABLE `forestuse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forestuse_forest_use_unique` (`forest_use`);

--
-- Indexes for table `growths`
--
ALTER TABLE `growths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `growths_growth_form_unique` (`growth_form`);

--
-- Indexes for table `iucn_threats`
--
ALTER TABLE `iucn_threats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iucn_threat_iucn_threat_code_unique` (`iucn_threat_code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_tbl`
--
ALTER TABLE `migration_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `migration_tbl_migration_title_unique` (`migration_title`);

--
-- Indexes for table `national_threat_codes`
--
ALTER TABLE `national_threat_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `national_threat_codes_national_threat_code_unique` (`national_threat_code`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `protected_areas`
--
ALTER TABLE `protected_areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `protected_areas_designation_code_unique` (`designation_code`);

--
-- Indexes for table `ranges`
--
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ranges_range_unique` (`range`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `taxons`
--
ALTER TABLE `taxons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taxons_taxon_code_unique` (`taxon_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wateruse`
--
ALTER TABLE `wateruse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wateruse_water_use_unique` (`water_use`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adminunits`
--
ALTER TABLE `adminunits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `endenisms`
--
ALTER TABLE `endenisms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `endnisms`
--
ALTER TABLE `endnisms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forestuse`
--
ALTER TABLE `forestuse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `growths`
--
ALTER TABLE `growths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `iucn_threats`
--
ALTER TABLE `iucn_threats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `migration_tbl`
--
ALTER TABLE `migration_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `national_threat_codes`
--
ALTER TABLE `national_threat_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `protected_areas`
--
ALTER TABLE `protected_areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taxons`
--
ALTER TABLE `taxons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `wateruse`
--
ALTER TABLE `wateruse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
