-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2018 at 12:11 PM
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
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminunits`
--

INSERT INTO `adminunits` (`id`, `country`, `admincode`, `designation`, `name`, `created_at`, `updated_at`) VALUES
(1, 'aSAS', 'ASASa', 'aSAS', 'SAS', '2018-01-09 23:54:38', '2018-01-09 23:54:38'),
(2, 'aSASs', 'asas', 'asasas', 'asas', '2018-01-09 23:56:25', '2018-01-09 23:56:25'),
(3, 'weraSASs', 'asas', 'asasas', 'asas', '2018-01-09 23:57:09', '2018-01-09 23:57:09'),
(4, 'c', 'xcv', 'xcvxcv', 'xcvxcvxcv', '2018-01-10 00:42:29', '2018-01-10 00:42:29'),
(5, 'c1', 'dfgdfg', 'fgfdgdfgd', 'dfgdfgdfgd', '2018-01-10 00:42:45', '2018-01-10 00:42:45'),
(6, 'countryd', 'admincode-', 'designation_', 'name-', '2018-01-10 00:50:03', '2018-01-11 02:00:30');

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
(1, 'tyutyuyt', 'tyutyuuty', '2018-01-09 00:54:19', '2018-01-09 00:54:19'),
(3, 'dfgdf', 'dfgfdg', '2018-01-09 03:22:14', '2018-01-09 03:22:14'),
(6, 'bvnbvnv', 'vbnvbnv', '2018-01-11 02:56:26', '2018-01-11 02:56:26'),
(7, 'vsdvdssd', 'dsfsdfdsf', '2018-01-11 23:15:21', '2018-01-11 23:15:21'),
(8, 'sdfsdf', 'dsfdsf', '2018-01-11 23:15:39', '2018-01-11 23:15:39'),
(9, 'sdfsdfsd', 'dsfdsf', '2018-01-11 23:17:46', '2018-01-11 23:17:46');

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
(2, 'gfhgfhgf', 'gfhgfhgfh', '2018-01-09 07:01:38', '2018-01-09 07:01:38'),
(3, 'dfgdfgd', 'dfgdfgdf', '2018-01-09 07:01:46', '2018-01-11 01:59:19'),
(4, 'dfgdfgdfg', 'dfgdfgdfg', '2018-01-11 02:58:05', '2018-01-11 02:58:05'),
(5, 'dfgdfgdfgg', 'dfgfdgdfgdf', '2018-01-11 03:02:13', '2018-01-11 03:02:13'),
(6, 'dfgdfg', 'dfgdfgdfg', '2018-01-11 03:04:28', '2018-01-11 03:04:28'),
(7, 'cvbvc', 'bcvbcb', '2018-01-11 03:08:52', '2018-01-11 03:08:52');

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
(2, 'FF', 'Forest Specialist', '2018-01-09 03:01:26', '2018-01-09 03:01:26'),
(3, 'FFg', 'Forest Generalist', '2018-01-09 03:02:28', '2018-01-09 03:02:28'),
(4, 'rt', 'rtrt', '2018-01-09 03:06:53', '2018-01-09 03:06:53'),
(5, 'dfgdfgd', 'fgdfgd', '2018-01-11 23:11:13', '2018-01-11 23:11:13');

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
(4, 'T', 'Tree', '2018-01-08 06:54:13', '2018-01-08 06:54:13'),
(5, 'gro1', 'dsfsf', '2018-01-11 01:53:49', '2018-01-11 01:53:58'),
(6, 'gfhgfhgfh', 'gfhgfh', '2018-01-11 23:23:17', '2018-01-11 23:23:17'),
(7, 'gfhgfhgfhdd', 'gfhgfh', '2018-01-11 23:26:25', '2018-01-11 23:26:25');

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
(8, 'CR', 'Critically endangered', '2018-01-05 03:56:39', '2018-01-05 03:56:39'),
(9, 'EN', 'Endangered', '2018-01-05 03:57:08', '2018-01-05 03:57:08'),
(10, 'VU', 'Vulnerable', '2018-01-05 03:57:31', '2018-01-05 03:57:31'),
(11, 'NT', 'Near Threatened', '2018-01-05 03:57:58', '2018-01-05 03:57:58'),
(12, 'LC', 'Least Concern', '2018-01-05 03:58:26', '2018-01-05 03:58:26'),
(13, 'DD', 'Data Deficient', '2018-01-05 03:58:50', '2018-01-05 03:58:50'),
(16, 'iun', 'ty', '2018-01-11 01:45:58', '2018-01-11 01:52:34'),
(17, 'dfgdfgdf', 'dfgdfgdfgd', '2018-01-11 03:07:34', '2018-01-11 03:07:34');

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
(2, 'asdasdasd', 'asdasdasdasd', '2018-01-10 05:15:33', '2018-01-10 05:15:33'),
(3, 'dfdsfsdfds', 'fdsfsdfsdf', '2018-01-11 22:51:28', '2018-01-11 22:51:28'),
(4, 'vbvbv', 'bvbvb', '2018-01-11 22:57:42', '2018-01-11 22:57:42');

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
(2, 'nsdfsdfsd', 'sdfsdfsdfsdf', '2018-01-08 00:30:02', '2018-01-08 00:30:02'),
(3, 'na', 'dfdf', '2018-01-11 01:14:32', '2018-01-11 01:14:32'),
(5, 'sdfsdf', 'sdfdsf', '2018-01-11 02:49:20', '2018-01-11 02:49:20'),
(6, 'bvnbvnbv', 'nbvnbvnbvn', '2018-01-11 03:07:46', '2018-01-11 03:07:46'),
(7, 'dfgfdgdfgdfg', 'dfgfdgdfg', '2018-01-11 07:14:02', '2018-01-11 07:14:02');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `protected_areas`
--

INSERT INTO `protected_areas` (`id`, `designation_code`, `code_description`, `name`, `created_at`, `updated_at`) VALUES
(3, 'dfdf1', 'dfdfd', 'dfdf', '2018-01-11 01:57:36', '2018-01-11 01:57:49'),
(4, 'dfgdfgdfg', 'fdgdfgdf', 'dfgdfgdfg', '2018-01-11 23:18:50', '2018-01-11 23:18:50');

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
(5, 'RWee', 'Rwandaee', '2018-01-08 02:49:18', '2018-01-11 01:56:32'),
(8, 'sdfsdf', 'sdfsdfsdf', '2018-01-11 02:49:41', '2018-01-11 02:49:41'),
(9, 'dfghhgfhgfh', 'gfhgfhgfhgfh', '2018-01-11 02:58:56', '2018-01-11 02:58:56'),
(10, 'fsdfsdfsd', 'fsdfsdf', '2018-01-11 07:25:17', '2018-01-11 07:25:17'),
(11, 'fsdfsdfsdd', 'fsdfsdf', '2018-01-11 07:29:01', '2018-01-11 07:29:01');

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
(1, 'erer4', 'rerrer', NULL, '2018-01-04 05:41:35'),
(2, 'zxczxc', 'zxczxc', '2018-01-04 03:05:59', '2018-01-04 03:05:59'),
(4, 'taxon', 'cvbcvbcvb', '2018-01-04 03:06:11', '2018-01-04 04:42:04'),
(6, 'sdfsdf', 'sdfsdf', '2018-01-04 03:17:52', '2018-01-04 03:17:52'),
(10, 'xcvxcvxcv', 'xcvxcvxcv', '2018-01-04 03:26:01', '2018-01-04 03:26:01'),
(11, 'r', 'r', '2018-01-04 03:26:33', '2018-01-04 03:26:33'),
(12, 'rt', 'rt', '2018-01-04 03:33:45', '2018-01-04 03:33:45'),
(15, 'yttryrt', 'ytrytrytry', '2018-01-04 03:37:50', '2018-01-04 03:37:50'),
(16, 'tryuu', 'dfgdfgdfg', '2018-01-04 03:44:58', '2018-01-04 04:42:21'),
(17, 'sdfsdfsdfsd', 'sdfsdfsdf', '2018-01-04 03:48:17', '2018-01-04 03:48:17'),
(18, 'rr', 'fxcgvgdf', '2018-01-04 03:56:25', '2018-01-04 03:56:25'),
(20, 'satya', 'satya', '2018-01-04 04:48:19', '2018-01-04 04:48:19'),
(21, 'last', 'dfgdfgdf', '2018-01-04 04:55:56', '2018-01-04 04:55:56'),
(22, 'sdfsdfsd', 'sdfdsfsdfsd', '2018-01-05 01:39:54', '2018-01-05 01:39:54'),
(23, 'T1', 'Tc', '2018-01-11 01:14:06', '2018-01-11 01:14:06'),
(25, 't1we', '214124', '2018-01-11 01:16:02', '2018-01-11 01:16:02'),
(26, 'PL', 'Plants', '2018-01-11 01:29:36', '2018-01-11 01:45:35'),
(27, 'dfgdfgd', 'dfgdfgdg', '2018-01-11 02:49:04', '2018-01-11 02:49:04'),
(28, 'gfhgfhgf', 'fghgfhgfh', '2018-01-11 03:05:15', '2018-01-11 03:05:15'),
(29, 'gfhgfhfghgfh', 'fghgfhgfhgfh', '2018-01-11 03:05:25', '2018-01-11 03:05:25'),
(30, 'jbhjk', 'dfgdfg', '2018-01-11 05:05:30', '2018-01-11 05:05:30'),
(31, 'cvbvcbvcb', 'cvbcvbvcb', '2018-01-11 05:05:39', '2018-01-11 05:05:39'),
(32, 'zxcxzcxzc', 'zxcxzcxz', '2018-01-11 05:06:46', '2018-01-11 05:06:46'),
(33, 'xcvxcvcx', 'xcvxcvxcv', '2018-01-11 05:06:56', '2018-01-11 05:06:56'),
(34, 'dfgdfgdfff', 'gfdgfdgdfg', '2018-01-11 05:08:40', '2018-01-11 05:08:40'),
(35, 'asdsad', 'sadsadsad', '2018-01-11 05:10:31', '2018-01-11 05:10:31'),
(36, 'gfhgfh', 'gfhgfhgfh', '2018-01-11 05:14:08', '2018-01-11 05:14:08'),
(37, 'mnbnm', 'nbmbnmbnm', '2018-01-11 05:24:41', '2018-01-11 05:24:41'),
(38, 'bn nbmnb', 'mbnmbnmnb', '2018-01-11 05:24:51', '2018-01-11 05:24:51'),
(39, 'sdfdsfd', 'sfsdfsdfsdf', '2018-01-11 05:28:09', '2018-01-11 05:28:09'),
(42, 'sdfsdfsdf', 'sdfsdfsdfsdfsdf', '2018-01-11 05:32:58', '2018-01-11 05:32:58'),
(44, 'afdsfsdfs', 'sdfsdfsd', '2018-01-11 05:55:53', '2018-01-11 05:55:53'),
(45, 'afdsfsdfsdfgdfg', 'hgghgfh', '2018-01-11 05:57:30', '2018-01-11 05:57:30'),
(46, 'dfgdfg', 'sdfdsf', '2018-01-11 06:05:57', '2018-01-11 06:05:57'),
(47, 'dfgdfgg', 'sdfdsf', '2018-01-11 06:06:56', '2018-01-11 06:06:56'),
(48, 'cvbvcb', 'vcbcvbvcb', '2018-01-11 06:09:06', '2018-01-11 06:09:06'),
(49, 'asdsadsa', 'asdasdasd', '2018-01-11 06:11:24', '2018-01-11 06:11:24'),
(50, 'sdfsdfds', 'dsfdsfsdf', '2018-01-11 06:56:09', '2018-01-11 06:56:09'),
(51, 'dfgfdg1', 'dfgdfg', '2018-01-11 23:29:57', '2018-01-11 23:30:03');

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
(1, 'gvtcadmin', 'ravi', 'address', '96767676', 'rvkumar738@gmail.com', 'Gvtc', 'admin', 'default_document.png', '5a571367b5573_userprofile_png', '$2y$10$s//bO75xDlIeAovCCGkat.51X6VQmIB9aZA.FNvvbDiC4yPCuQ1sq', 'admin', 'en', 'dfxa3s0I1q0Qq3GnsYcIaWh10GXTTWoBDRzjUGhnLL5JNL9NVCRqGH6XQM14', NULL, '2018-01-11 02:03:59'),
(2, NULL, 'Rahul', 'Address5ji', '23523525ji', '', 'Departmentji', 'de', 'logo.jpg', 'logo.jpg', '$2y$10$s//bO75xDlIeAovCCGkat.51X6VQmIB9aZA.FNvvbDiC4yPCuQ1sq', 'user', 'fr', 'fBdZjvalT3dFgpaDJEu8InBgKCcNXYMAYZ3SIf3K5s2ldGhMFLQJtqznaxhW', '2018-01-02 23:17:24', '2018-01-03 04:23:03'),
(3, NULL, 'Sonu', 'address', '23847324', '', 'Department', 'DEsignation', 'logo.jpg', 'logo.jpg', '$2y$10$4nOIrSND8rXm3aJOWcrHKec6v3FOM2dN1OP3dyIs9B7iDsexPEsR6', 'user', '', NULL, '2018-01-03 00:36:13', '2018-01-03 00:36:13'),
(5, NULL, 'somu', 'Jharkhand', '23424234', '', 'sdfsdf', 'des', 'logo.jpg', 'logo.jpg', '$2y$10$HZBh4olrdvixU8kPeek1Iew5X4VrWmqJmcjFmjhR1guKxQ7jP0WyS', 'user', '', NULL, '2018-01-03 02:06:59', '2018-01-03 02:06:59'),
(6, NULL, 'Raju', 'uttamnager', '1231232', '', 'Department', 'designation', 'logo.jpg', 'logo.jpg', '$2y$10$z9knfSCCPTMeBlpFAXo4fuCT.rc0uAYwNJ4V0uOanonqnM52c0yje', 'user', '', NULL, '2018-01-03 02:48:21', '2018-01-03 02:48:21'),
(7, NULL, 'ss', 'address', '2352352', '', 'de', 'de', 'logo.jpg', 'logo.jpg', '$2y$10$JXuwJ4bo/Bk9CbZmyiTNBOgciMXPfM9aY3TySleoeMjk95x43FH2K', 'user', '', NULL, '2018-01-03 03:31:17', '2018-01-03 04:04:53'),
(9, NULL, 'Rahul5', 'address', '2352352', '', 'Department', 'de', '5a4cb40ea80a4_useridproof_jpg', '/tmp/php7vNPLM', '$2y$10$4nP2pz0cb71U0zkSLEE.FecHrAWWGO2ya7BihiFzku8.Mbiuv7kme', 'user', '', NULL, '2018-01-03 05:14:30', '2018-01-03 05:14:30'),
(10, NULL, 'withoutimage', 'uttamnager', '234234', '', 'Department', 'de', '5a534dce820ae_useridproof_jpeg', '5a534dce81fe2_userprofile_jpg', '$2y$10$Spm.x1SuYcSx8fWDP1ug0e2ZNoW0lCFqEPAkXyOonkqRp1vqAcVVS', 'user', '', NULL, '2018-01-03 05:19:30', '2018-01-08 05:24:06'),
(11, NULL, 'Rahul5ertre', 'address', '2352352', '', '4543534', '345345', '', '', '$2y$10$U1urG0jpT07FA0sjF5l37euRAU2DuPhI.599gMSlhDqGiPqOcAI/.', 'user', '', NULL, '2018-01-03 05:55:47', '2018-01-03 05:55:47'),
(12, NULL, 'new rahul', 'sgfdsgdfg', '45435435', '', 'dfgdfg', 'dfgdfg', 'default_profile.jpg', '', '$2y$10$T7Vat4wP4u3MPWSu3L2ZhO3AUArAapktgW0NrU1PZpRRg.C4vWWr6', 'user', '', NULL, '2018-01-03 05:58:15', '2018-01-03 05:58:15'),
(13, NULL, 'newuser', 'address', '2352352', '', 'Department', 'de', '', 'default_profile.jpg', '$2y$10$R8lVhKsvkEmvjgYsPtlTseufLwnBDAVLEr00RXSBQ0OF6FBrzFjSW', 'user', '', NULL, '2018-01-03 06:07:55', '2018-01-03 06:07:55'),
(14, NULL, 'rex', 'address', '1231232', '', 'Department', 'de', '$fileprofile', 'default_profile.jpg', '$2y$10$IqjRXChWlb9mlqqWCUbto.efc6NVnUgOMNitjcm25.yHhPtO6QF1e', 'user', '', NULL, '2018-01-03 06:18:35', '2018-01-03 06:25:12'),
(15, NULL, 'Rajnesh', 'werwer', '2352352', '', 'Department', 'de', 'http://127.0.0.1:8000/profilepicture/5a4cc6cfaecd2_useridproof_jpg', 'http://127.0.0.1:8000/profilepicture/5a4cc6cfaec5a_userprofile_jpg', '$2y$10$b.NXZqcAQ8hNZvUxX8nULOX/a.J5ztFyXBGwfg8yww4tTaA4FQrxS', 'user', '', NULL, '2018-01-03 06:25:57', '2018-01-03 06:35:17'),
(17, NULL, 'Ankita', 'kritnagar', '23241234', '', 'Department', 'de', '5a4cc8de8a0b9_useridproof_jpg', '5a4cc8fe2fcef_userprofile_jpg', '$2y$10$cGPTCaYvvq1UpNtwhWvRt.KsxTzU/S.8R7VqOSlPJG52hFyVr74DG', 'user', '', NULL, '2018-01-03 06:43:18', '2018-01-03 06:43:50'),
(18, NULL, 'Ansu', 'address', '9897667345', '', 'Department', 'Designation', '5a4db0b1e002a_useridproof_jpg', '5a4db0b1e028b_userprofile_jpeg', '$2y$10$hBreMiwvipzwsVNPVTid9uIKxVFAoOve2Lci8zx4uwFZ8whmGMtzK', 'user', '', NULL, '2018-01-03 23:12:26', '2018-01-03 23:12:26'),
(19, NULL, 'gdfgg', 'dg', '9823423423', '', '234234', '234234', '5a55d850f3f8a_useridproof_jpg', '5a55d850f4004_userprofile_jpg', '$2y$10$ygfKk9L4xPW0gboi71eNs.M0AZn31B8UyRAQ2y3no8lO2JsaO6cju', 'user', '', NULL, '2018-01-10 03:39:37', '2018-01-10 03:39:37'),
(20, NULL, 'sfsdfds', 'fsdfsdfds', '23423423', '', 'rwerwer', 'werwer', '5a55d8ca1cade_useridproof_jpg', '5a55d8ca1cb8e_userprofile_jpg', '$2y$10$TnuZjwJP4cPgo81LsYUsz.Q.PX.CZMoUcdSqzAankplSYmXr43cdq', 'user', '', NULL, '2018-01-10 03:41:38', '2018-01-10 03:41:38'),
(21, NULL, 'dfgdfgdfgdfgdfgdf', 'dfgdfgfdgdfgdfgdfgd', '123456', '', 'dgsdgsg', 'dfgdfgdfg', '5a55d962280de_useridproof_jpg', '5a55d962281ba_userprofile_jpeg', '$2y$10$yKt/WNfYtd.7e6BR5VNKluToZ08LU3CcU9qe7emQUq8vTVaKqcuXS', 'user', '15', NULL, '2018-01-10 03:44:10', '2018-01-10 03:44:10'),
(23, NULL, 'asdsad', 'asdasd', '9823423423', '', 'ss', 'sdfsdf', '5a55de83938c6_useridproof_jpeg', '5a55de8393983_userprofile_jpg', '$2y$10$EpS281ZRfS.AK/vUMD2Twup670IjHC0nmxhnYa9Sh8I.LNmFnrxTG', 'user', '7889456', 'zlSecZUNc4vWisaUZ718yvz0mxdvuduHqJjZqsAEDedwCwW10cBGvrG2gbmc', '2018-01-10 04:06:03', '2018-01-10 04:06:03'),
(24, NULL, 'sachin', 'mumbai', '837423984', '', 'Department', 'Designation', '5a55e0dd3e459_useridproof_jpg', '5a55e0dd3e4d3_userprofile_jpg', '$2y$10$JH/E4pDoelLXuCur8PeOouh7EVewjdqRC3LS6.X.fF86TM77vgc.m', 'user', '92807356', 'Y11jFOiCcH0laJHJzxs9cLLJYKgEMJtJgDQPRM4tvVH6AUpsoymuhpif03hI', '2018-01-10 04:16:05', '2018-01-10 04:16:05'),
(25, NULL, 'wertert', 'erterter', '23423', '', 'etwet', 'erterte', '5a55e149c2e5c_useridproof_jpg', '5a55e149c2ef5_userprofile_jpeg', '$2y$10$O4Xo4dG2Hm6NcDau0pAMzunQP0bsA9tFfW85t/0Bkf.LZkHE4azX.', 'user', '43192679', NULL, '2018-01-10 04:17:53', '2018-01-10 04:17:53'),
(26, NULL, 'ertertert', 'erterter', 'eterterte', '', 'sdfsdfs', 'sfsdfsdf', '5a55e16d3603c_useridproof_jpg', '5a55e16d360c7_userprofile_jpeg', '$2y$10$wcRd4fPNvHgrcj1RiCn/KeuglR8UbE400BwkvHZ5HlZygUbb5PpLu', 'user', '39214229', NULL, '2018-01-10 04:18:29', '2018-01-10 04:18:29'),
(27, NULL, 'asdsadasd', 'asdasdsa', '123123', '', '12312332', '13213123', '5a55e245625a2_useridproof_jpg', '5a55e24562634_userprofile_jpg', '$2y$10$nie0yJ/efPCsvI5IRQstku9aaRsft.7IZl16WIcZH.gSJfMm/R.H.', 'user', '4776218', NULL, '2018-01-10 04:22:05', '2018-01-10 04:22:05'),
(28, NULL, 'Rahul5', 'address', '2352352', '', 'Department', '234234', '5a55e2ece0822_useridproof_jpg', '5a55e2ece08c7_userprofile_jpg', '$2y$10$vdVhT0isWp3eS7iGKQ6zju7yWIwRLRFrwCxh22YfUMH5t3ozwOUf6', 'user', '74053677', NULL, '2018-01-10 04:24:52', '2018-01-10 04:24:52'),
(29, NULL, 'Rahul5', 'address', '2352352', '', 'Department', 'de', '5a55e30331120_useridproof_jpg', '5a55e303311c6_userprofile_jpg', '$2y$10$06s8Ky7lvdw1Re11vDb04On0BnlamS8CwJRZUTaoK5n7y4U7hBIni', 'user', '53553907', NULL, '2018-01-10 04:25:15', '2018-01-10 04:25:15'),
(30, NULL, 'rttt', 'tytyt', '2354345', '', 'Department', 'sfasdfsdf', '5a55e36aa71a4_useridproof_jpg', '5a55e36aa7232_userprofile_jpg', '$2y$10$E17A9J3pj33/5/z7sAygGO7CTpAerwlXg6sgIxT.mtnGd7vzuoEqW', 'user', '35135244', NULL, '2018-01-10 04:26:58', '2018-01-10 04:26:58'),
(31, NULL, 'sdfdsfdsf', 'sdfsdf', '2352352', '', 'sdfsdfsd', 'sdfsdfsd', '5a55e390038d0_useridproof_jpg', '5a55e39003980_userprofile_jpg', '$2y$10$WCQYcSaohErFggF9W2Hciuri5Quc4qmXMplchxnOzB938m/mmNh2a', 'user', '24448428', NULL, '2018-01-10 04:27:36', '2018-01-10 04:27:36'),
(32, NULL, 'asdfgsdgfsdf', 'sdfsdfsdfsd', 'dsfsdfsdf', '', 'Department', 'de', '5a55e3c22916c_useridproof_jpg', '5a55e3c2291ff_userprofile_jpg', '$2y$10$ETGBnsoYm9Bn180eVcKc9ORzKMmGYDOm3QQSdG3UK29zqdcM5ySM.', 'user', '32007405', NULL, '2018-01-10 04:28:26', '2018-01-10 04:28:26'),
(33, NULL, 'sdfsdf', 'address', '2352352', '', 'Department', '234234', '5a55e3dfece22_useridproof_jpeg', '5a55e3dfecec8_userprofile_jpeg', '$2y$10$EAm6hQFRj7cqHtHTgntdwua58xbT6KwIKFsJxNvA6KjpYxBfsOLDe', 'user', '49067455', NULL, '2018-01-10 04:28:56', '2018-01-10 04:28:56'),
(34, NULL, 'Rahul5', 'asdasd', '2352352', '', 'Department', 'de', '5a55e4382c67f_useridproof_jpg', '5a55e4382c73f_userprofile_jpg', '$2y$10$fzLypZAXykEDJ5jgvo8P1.O2jrEM0M8ir0L.yI/zyo5hbK1ht2Jxm', 'user', '71126746', NULL, '2018-01-10 04:30:24', '2018-01-10 04:30:24'),
(35, NULL, 'Rahul5', 'asdasd', '2352352', '', 'Department', '234234', '5a55e455939d0_useridproof_jpg', '5a55e45593ba2_userprofile_jpg', '$2y$10$HTlo4y71U1.PlIXwqKgMi.ET6wMTFYwSE8JwqN2UyKI1Q5/PkWLgi', 'user', '49841708', NULL, '2018-01-10 04:30:53', '2018-01-10 04:30:53'),
(36, NULL, 'Rahul5ddddd', 'address', '2352352', '', 'Department', '234234', '5a55e4800aa52_useridproof_jpg', '5a55e4800aad7_userprofile_jpg', '$2y$10$Z934WOEp3Ds1MVXS21rzouiyQOM49cjECZgwfK5H6t877cnVOdC72', 'user', '86922527', NULL, '2018-01-10 04:31:36', '2018-01-10 04:31:36'),
(37, NULL, 'qweqweqwe', 'qweqweqw', '123123', '', '123213', '123123123', '5a55e5d0ed7f2_useridproof_jpg', '5a55e5d0ed896_userprofile_jpg', '$2y$10$ta6QvrlKWOwlJSHiy92Kq.p5P7Lyt2OQ0g0ugY1Elzfi1YlTHo/Ta', 'user', '52636405', NULL, '2018-01-10 04:37:13', '2018-01-10 04:37:13'),
(38, NULL, 'qweqweqwe', 'qweqweqw', '123123', '', '123213', '123123123', '5a55e60aa78e2_useridproof_jpeg', '5a55e60aa795d_userprofile_jpg', '$2y$10$n4.05Qp7wkrr0YVE1Ye9fuxt/0kZ.y2elBCQjGnk7sFxgWiDBmIHK', 'user', '287257', NULL, '2018-01-10 04:38:10', '2018-01-10 04:38:10'),
(39, NULL, 'werwerwe', 'werwerwe', 'werwer', '', 'sdfsdf', 'sdfsdf', '5a55e65f7c3a9_useridproof_jpeg', '5a55e65f7c4de_userprofile_jpg', '$2y$10$hxasH4P2O4ACpho0s6mmJuDeepONKLcMV5bxgzrisnvF0dCIT/hKa', 'user', '90986342', NULL, '2018-01-10 04:39:35', '2018-01-10 04:39:35'),
(40, NULL, 'werwerwe', 'werwerwe', 'werwer', '', 'sdfsdf', 'sdfsdf', '5a55e73629f3a_useridproof_jpg', '5a55e73629fc9_userprofile_jpeg', '$2y$10$jUQMLGsoHfBDo6ieg6bJK.FIFm/wbKgpvl1tcHOGJh5v3MTBONV7y', 'user', '90989176', NULL, '2018-01-10 04:43:10', '2018-01-10 04:43:10'),
(42, NULL, 'Yubraj', 'Punajb', '432423423', '', 'dep', 'designation', '5a55e808556a5_useridproof_jpg', '5a55e808557ab_userprofile_png', '$2y$10$O6apClWbXVhAefdY1xflm.Yma/E9SSkk0Ry7i2zKA/pUhPBCkwxXO', 'user', '53979683', 'yklLQ9bhgMQlVHrNn9Le630MlvmDhTZ3jjj9XKWvP4cBKK4iAd4a2eYjvS6P', '2018-01-10 04:46:40', '2018-01-10 04:46:40'),
(47, NULL, 'erterter', 'r', 'r', '', 'Department', 'fgfdgdfgd', 'default_document.png', 'default_profile.jpg', '$2y$10$3JQ8N7TU5BDbPAmyAUnwk.rMHFOix5vx7KAhMD.nVWFKqLn3t5u6q', 'user', '42165215', NULL, '2018-01-10 06:52:45', '2018-01-10 06:52:45'),
(48, NULL, 'fgfg', 'fgfg', 'fgfg', '', 'gfhgfhf', 'gfhgfhgfh', '5a5605cad1430_useridproof_jpg', 'default_profile.jpg', '$2y$10$DW4pYCEhsaCJkdmxkTBLoerYaMxPRhVqTCmw47d2ovqeaQ3/5HFD6', 'user', '14456225', NULL, '2018-01-10 06:53:38', '2018-01-10 06:53:38'),
(49, NULL, 'fgfdg', 'dfgdfg', 'dfgdfg', '', 'ertert', 'ertertert', 'default_document.png', 'default_profile.jpg', '$2y$10$ZfMZUpGKeGQkMv59vPIyFOt8iRJkW2/9uDAaR8DHrMTkngrFxaBVS', 'user', '82961854', NULL, '2018-01-10 06:55:40', '2018-01-10 06:55:40'),
(52, 'aki', 'Rahul5', 'address', '2352352', '', 'Department', '234234', '5a560c886729c_useridproof_jpg', '5a560c886732a_userprofile_jpg', '$2y$10$FHWqu5glSUI01fldaqSvnuFgUz4HRNRjr4Zr7GlLmLjFl1F5k2eMm', 'user', '71692947', NULL, '2018-01-10 07:22:24', '2018-01-10 07:22:24'),
(53, 'akis', 'Rahul5', 'address', '2352352', '', '234234', '234234', 'default_document.png', 'default_profile.jpg', '$2y$10$Ci6huReSjE0WDvHXfIhEVO1J/2QpPwRdg5TlBhp/6TPealDUwCoPq', 'user', '46098555', NULL, '2018-01-10 07:23:12', '2018-01-10 07:23:12'),
(54, 'rohitsharma', 'rohit', 'uttamnager', '2345345345', '', 'Department', 'Designation', 'default_document.png', 'default_profile.jpg', '$2y$10$HR/LFPq0q5R3MItzue6chu98OlExn4WhvVlFUGMhSzLRhK7oT6SGS', 'user', '42227595', NULL, '2018-01-10 07:30:17', '2018-01-10 07:30:17'),
(58, 'sohansingh', 'sohan11', 'uttamnager1', '23523521', 'soshan@gmail.com', 'Department1', 'designation1', '5a56e961e00b8_useridproof_jpeg', '5a56e961e0164_userprofile_jpg', '$2y$10$YqCNfGvEEuyB2LpVXhkd9O.SZc1/ilrjcCdGfuu./ZUQPhSQ0aU/6', 'user', '61169810', 'oDUXq6oYDOiR3qGio99twInafetTR3raCInv4MazFGDpwjK0T0g0mumEESaU', '2018-01-10 23:04:41', '2018-01-11 00:00:47'),
(60, 'gvtcsonu', 'sonu Kumar', 'uttamnager', '987564343', 'sonu@gmail.com', 'Development', 'php developer', '5a56f86ac2830_useridproof_jpg', '5a56f86ac28b5_userprofile_jpeg', '$2y$10$ObR7KYepN6qxSOdTmATWJO3Lzqzr0z8w8YgrBMY8x3oPpApR6/LSa', 'user', '41385925', NULL, '2018-01-11 00:08:50', '2018-01-11 00:08:50'),
(61, 'sachinrameshtendulkar', 'sachin', 'address', '1234567891', 'sachin@gmail.com', 'Department', 'designation', 'default_document.png', '5a56fd9f5af54_userprofile_jpeg', '$2y$10$t8N5Pfname2PWm6w6wo/E.DxMU.Fd4SdNaFFdszolMYf2giAN1y9G', 'user', '30597024', 'q5OWnDFQUQFHkBPnRxBsX9buFZDVUuLyAY1Q3pEZBG98yoHvJjTJ44uhhOgJ', '2018-01-11 00:28:14', '2018-01-11 01:15:47'),
(62, 'gvtcauser', 'name', 'uttamnager1', '98989879', 'rahul@gmail.com', 'rqwrqwer', 'werwer', 'default_document.png', 'default_profile.jpg', '$2y$10$v1eOymSVU5.DDK3eqWOjB.w8s1PwgDxjrEskrDWPzVGydpgRIV5Lq', 'user', '58910341', NULL, '2018-01-11 06:18:39', '2018-01-11 06:18:39'),
(63, 'shivaram', 'shiva', 'address', '2352352', 'rahul@gmail.com', 'Department', 'designation', '5a584115eae7e_useridproof_jpeg', '5a584115eafa3_userprofile_jpeg', '$2y$10$fnooHlYi9MCFJOrxgBNaHOaS9V5/avKhiLoBsjBiDsp/PY0HKozFS', 'user', '90556712', NULL, '2018-01-11 23:31:10', '2018-01-11 23:31:10');

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
(3, 'water4', 'jidfbdjisfb2', '2018-01-09 04:10:17', '2018-01-09 04:28:54'),
(6, 'rgtreterterte1', 'rterterter1', '2018-01-11 07:00:26', '2018-01-11 07:00:45'),
(7, 'sdgfsdgsg', 'fsdgfsdgfdg', '2018-01-11 23:11:04', '2018-01-11 23:11:04');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `endenisms`
--
ALTER TABLE `endenisms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `endnisms`
--
ALTER TABLE `endnisms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forestuse`
--
ALTER TABLE `forestuse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `growths`
--
ALTER TABLE `growths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `iucn_threats`
--
ALTER TABLE `iucn_threats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `migration_tbl`
--
ALTER TABLE `migration_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `national_threat_codes`
--
ALTER TABLE `national_threat_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `protected_areas`
--
ALTER TABLE `protected_areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taxons`
--
ALTER TABLE `taxons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `wateruse`
--
ALTER TABLE `wateruse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
