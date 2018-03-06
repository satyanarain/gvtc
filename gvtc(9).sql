-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2018 at 02:17 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
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
-- Table structure for table `abundances`
--

CREATE TABLE `abundances` (
  `id` int(10) UNSIGNED NOT NULL,
  `abundance_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abundances`
--

INSERT INTO `abundances` (`id`, `abundance_group`, `code_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fdggfsdgdfg', 'dfdfgfdg', 1, '2018-01-18 00:00:46', '2018-01-18 00:36:21');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminunits`
--

INSERT INTO `adminunits` (`id`, `country`, `admincode`, `designation`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '', '', NULL, NULL, 0, '2018-01-12 02:53:59', '2018-01-12 02:53:59'),
(2, '', '', NULL, NULL, 0, '2018-01-12 02:54:14', '2018-01-12 02:55:07'),
(3, '', '', NULL, 'dfgdfg', 0, '2018-01-18 01:03:12', '2018-01-18 01:03:12'),
(4, '', '', NULL, NULL, 0, '2018-01-22 06:47:07', '2018-01-22 06:47:07'),
(5, '', '', NULL, 'Admin Unit Name15', 0, '2018-01-25 01:09:54', '2018-01-25 01:21:42'),
(6, '', '', NULL, 'adn', 0, '2018-01-25 01:21:54', '2018-01-25 01:21:54'),
(7, '', '', NULL, '111', 0, '2018-01-25 01:27:10', '2018-01-25 01:36:51'),
(8, '', '', NULL, 'Admin Unit Name18', 0, '2018-01-25 02:07:02', '2018-01-25 02:07:21'),
(9, '', '', NULL, 'Admin Unit Name11', 0, '2018-01-25 03:22:48', '2018-01-25 03:22:48'),
(10, '', '', NULL, 'Admin Unit Name10', 0, '2018-01-25 03:24:52', '2018-01-25 03:24:52'),
(11, '', '', NULL, 'Admin Unit Name', 0, '2018-01-25 03:25:28', '2018-01-25 03:25:28'),
(14, 'RWANDA', '', NULL, 'Admin Unit Name1', 0, '2018-01-25 03:33:33', '2018-01-25 03:33:33'),
(16, 'gfdgfdgdfg', 'fdgdfgdfg', NULL, 'gtfdgdf', 0, '2018-01-25 03:39:30', '2018-01-25 03:39:30'),
(17, 'UGANDA', 'District', NULL, 'Admin Unit Name14', 0, '2018-01-25 03:40:23', '2018-01-25 03:40:23'),
(18, 'UGANDA1', 'Admin Unit Type1', NULL, 'Admin Unit Name121', 1, '2018-01-25 03:40:39', '2018-01-25 03:40:50'),
(19, 'Country1', 'Admin Unit Type', NULL, 'Admin Unit Name1214', 0, '2018-01-25 04:01:27', '2018-01-25 04:01:36'),
(20, 'c', 'aut', NULL, 'aun', 0, '2018-02-22 06:39:26', '2018-02-22 06:39:26'),
(21, '1', '2', NULL, 'Admin Unit Name233', 0, '2018-02-22 06:48:15', '2018-02-22 06:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `ages`
--

CREATE TABLE `ages` (
  `id` int(10) UNSIGNED NOT NULL,
  `age_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ages`
--

INSERT INTO `ages` (`id`, `age_group`, `code_description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'dsfsdf', 'sdfsdf', 0, '2018-01-17 06:21:32', '2018-01-17 06:21:32'),
(4, '21', '11', 1, '2018-01-17 23:10:35', '2018-01-18 00:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `breedings`
--

CREATE TABLE `breedings` (
  `id` int(11) NOT NULL,
  `breeding_code` varchar(255) NOT NULL,
  `breeding_description` varchar(255) NOT NULL,
  `status` float NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breedings`
--

INSERT INTO `breedings` (`id`, `breeding_code`, `breeding_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'RB', 'Resident Breeder', 1, '2018-02-23 03:25:47', '2018-02-23 04:06:09'),
(2, 'MB', 'Migrant Breeder', 1, '2018-02-23 04:13:54', '2018-02-23 04:13:54'),
(3, 'dfgd', 'dfgdfgd', 1, '2018-02-23 05:05:34', '2018-02-23 05:05:34'),
(4, 'sdfs1', 'sdfsdf', 0, '2018-02-28 01:45:23', '2018-02-28 02:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_within_albertine_rift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `range`, `range_within_albertine_rift`, `status`, `created_at`, `updated_at`) VALUES
(1, 'UG', 'Uganda', 0, '2018-01-12 02:41:42', '2018-01-12 02:41:42'),
(2, 'RW', 'Rwanda', 1, '2018-01-12 02:42:23', '2018-01-12 02:42:23'),
(3, 'DRC', 'DRC', 0, '2018-01-12 02:42:44', '2018-01-12 02:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `distributions`
--

CREATE TABLE `distributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `taxon_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selectioncriteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specie_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specie_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gazetteer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recordid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observer_id` int(11) DEFAULT NULL,
  `age_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abundance_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specimendata` int(11) DEFAULT NULL,
  `specimencode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collectorinstitution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributions`
--

INSERT INTO `distributions` (`id`, `taxon_id`, `selectioncriteria`, `specie_id`, `specie_data`, `method_id`, `observation_id`, `gazetteer_id`, `day`, `month`, `year`, `number`, `recordid`, `observer_id`, `age_id`, `abundance_id`, `specimendata`, `specimencode`, `collectorinstitution`, `Sex`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'genus', '2', 'genus / species /', '9', '6', '23', NULL, NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-01 00:17:34', '2018-03-01 00:19:03'),
(2, '9', 'commonname', '5', 'C2', '9', '6', '22', '3', 'June', '1958', NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-01 01:58:51', '2018-03-01 03:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `endenisms`
--

CREATE TABLE `endenisms` (
  `id` int(10) UNSIGNED NOT NULL,
  `endenism` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endenism_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `endenisms`
--

INSERT INTO `endenisms` (`id`, `endenism`, `endenism_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Y', 'Endemic to the Albertine Rift', 1, '2018-01-12 02:47:34', '2018-01-12 02:47:34'),
(2, 'N', 'Not-Endemic to the Albertine Rift', 1, '2018-01-12 02:47:52', '2018-01-12 02:47:52'),
(3, '1', NULL, 0, '2018-02-21 23:26:14', '2018-02-21 23:26:14'),
(4, '12', NULL, 0, '2018-02-21 23:27:03', '2018-02-21 23:27:03'),
(5, '32231', '23231', 1, '2018-02-21 23:28:01', '2018-02-21 23:30:44');

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
  `status` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forestuse`
--

INSERT INTO `forestuse` (`id`, `forest_use`, `forest_habitat_usage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FF', 'Forest Specialist', 0, '2018-01-12 02:44:12', '2018-01-12 02:44:12'),
(2, 'F', 'Forest Generalist', 1, '2018-01-12 02:44:34', '2018-01-12 02:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `gazetteers`
--

CREATE TABLE `gazetteers` (
  `id` int(10) UNSIGNED NOT NULL,
  `gazeteer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eastings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `northings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum_dd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `habitat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `altitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aspect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `protected_area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminunit_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` float NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gazetteers`
--

INSERT INTO `gazetteers` (`id`, `gazeteer_id`, `country_id`, `place`, `details`, `eastings`, `northings`, `zone`, `datum`, `datum_dd`, `longitude`, `latitude`, `day`, `month`, `year`, `habitat`, `altitude`, `slope`, `aspect`, `soil`, `protected_area_id`, `adminunit_id`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(22, 'GVTCGZ01', '1', 'Place', 'Details', '1', '2', '4', '3', '7', '5', '6', '1', 'January', '1950', 'Habitat', 'Altitude', 'Slope', 'Aspect', 'soil', '3', '17', 'good', 0, '2018-02-20 07:23:31', '2018-02-20 07:24:22'),
(23, 'GVTCGZ023', '1', 'Place', 'Details1', '1', '45', '6', 'Datum', '540', 'Longitude', '54', '1', 'February', '1954', NULL, 'Altitude', 'Slope', 'Aspect', 'soil1', '7', '9', '14', 1, '2018-02-28 05:02:14', '2018-02-28 05:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `growths`
--

CREATE TABLE `growths` (
  `id` int(10) UNSIGNED NOT NULL,
  `growth_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plants_growth_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `growths`
--

INSERT INTO `growths` (`id`, `growth_form`, `plants_growth_form`, `status`, `created_at`, `updated_at`) VALUES
(1, 'T', 'Tree', 0, '2018-01-12 01:59:02', '2018-01-12 01:59:02'),
(2, 'S', 'Shrub', 0, '2018-01-12 01:59:18', '2018-01-12 01:59:18'),
(3, 'H', 'Herb', 0, '2018-01-12 01:59:31', '2018-01-12 01:59:31'),
(4, 'L', 'Liana', 0, '2018-01-12 01:59:47', '2018-01-12 01:59:47'),
(5, 'G', 'Grass', 0, '2018-01-12 02:00:18', '2018-01-12 02:00:18'),
(6, 'F', 'Fern', 1, '2018-01-12 02:00:34', '2018-01-12 02:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `guestregisters`
--

CREATE TABLE `guestregisters` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `institution_type` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guestregisters`
--

INSERT INTO `guestregisters` (`id`, `username`, `role`, `email`, `first_name`, `last_name`, `account`, `institution`, `institution_type`, `phone`, `address`, `country`, `created_at`, `updated_at`) VALUES
(1, 'gvtcadmin', 'guest', 'rvkumar738@gmail.com', 'First Name', 'Last Name', 'personal', 'Institution', NULL, NULL, NULL, 'Lebanon', '2018-02-15 12:03:03', '2018-02-15 12:03:03'),
(2, 'gvtcadmin4', 'guest', 'rvkumar738@gmail.com', 'First Name', 'Last Name', 'personal', 'Institution', NULL, NULL, NULL, 'Lebanon', '2018-02-15 12:05:06', '2018-02-15 12:05:06'),
(3, 'gvtcretret', 'guest', 'rahul@gmail.com', 'First Name', 'Last Name', 'personal', 'Institution', NULL, NULL, NULL, 'Lebanon', '2018-02-15 12:06:09', '2018-02-15 12:06:09'),
(4, 'gvtcadminrr', 'guest', 'rvkumar738@gmail.com', 'First Name', 'Last Name', 'personal', 'erer', NULL, NULL, NULL, 'Lebanon', '2018-02-15 12:07:55', '2018-02-15 12:07:55'),
(5, 'gvtcadmindfgfdg', 'guest', 'rahul@gmail.com', 'First Name', 'Last Name', 'personal', 'Institution', NULL, NULL, NULL, 'Lebanon', '2018-02-15 12:14:14', '2018-02-15 12:14:14'),
(6, 'gvtcadminrrt', 'guest', 'rahul@gmail.com', 'First Name', 'Last Name', 'personal', 'ee', NULL, NULL, NULL, 'Lebanon', '2018-02-15 12:15:52', '2018-02-15 12:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `iucn_threats`
--

CREATE TABLE `iucn_threats` (
  `id` int(10) UNSIGNED NOT NULL,
  `iucn_threat_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iucn_code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iucn_threats`
--

INSERT INTO `iucn_threats` (`id`, `iucn_threat_code`, `iucn_code_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CR', 'Critically endangered', 0, '2018-01-12 01:51:07', '2018-01-12 01:51:07'),
(2, 'EN', 'Endangered', 0, '2018-01-12 01:51:36', '2018-01-12 01:51:36'),
(3, 'VU', 'Vulnerable', 0, '2018-01-12 01:52:03', '2018-01-12 01:52:03'),
(4, 'NT', 'Near Threatened', 0, '2018-01-12 01:52:23', '2018-01-12 01:52:23'),
(5, 'LC', 'Least Concern', 0, '2018-01-12 01:52:47', '2018-01-12 01:52:47'),
(6, 'DD', 'Data Deficient', 1, '2018-01-12 01:53:09', '2018-01-12 01:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

CREATE TABLE `methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `method_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float NOT NULL,
  `code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `methods`
--

INSERT INTO `methods` (`id`, `method_code`, `status`, `code_description`, `created_at`, `updated_at`) VALUES
(3, 'PR', 0, 'Presence', '2018-01-17 01:58:03', '2018-01-17 01:58:03'),
(4, 'AC', 0, 'Absolute Count', '2018-01-17 02:00:51', '2018-01-17 02:00:51'),
(5, 'rtertertt', 0, 'ertreterte', '2018-01-17 03:22:12', '2018-01-17 03:22:12'),
(6, 'sdfds', 0, 'fsdfdsf', '2018-01-17 05:22:20', '2018-01-17 05:22:20'),
(7, 'werwerwe', 0, 'werwerewr', '2018-01-17 06:03:06', '2018-01-17 06:03:06'),
(8, 'dfgdfgdf', 1, 'werwerewrgfdgfdg', '2018-01-17 06:03:43', '2018-01-17 06:03:43'),
(9, 'dsfsdfdsfds', 1, 'dsfdsfsdf', '2018-01-17 06:15:55', '2018-01-17 06:15:55');

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
(31, '2018_01_10_064921_create_migration_tbl_table', 16),
(32, '2018_01_17_044703_create_methods_table', 17),
(33, '2018_01_17_083749_create_observation_table', 18),
(34, '2018_01_17_111932_create_ages_table', 19),
(35, '2018_01_18_051159_creat_abundances_table', 20),
(36, '2018_01_19_095751_create_protected_observers_table', 21),
(37, '2018_01_23_063206_create_species_table', 22),
(38, '2018_01_24_045933_create_gazetteers_table', 23),
(39, '2018_02_01_120105_create_distributions_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `migration_tbl`
--

CREATE TABLE `migration_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birds_migrating_population` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_tbl`
--

INSERT INTO `migration_tbl` (`id`, `migration_title`, `birds_migrating_population`, `status`, `created_at`, `updated_at`) VALUES
(6, 'A', 'Afrotropical migrant', 0, '2018-01-12 02:49:03', '2018-01-25 00:24:36'),
(7, 'P', 'Palearctic Migrant', 1, '2018-01-12 02:49:46', '2018-01-25 00:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `national_threat_codes`
--

CREATE TABLE `national_threat_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `national_threat_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_threat_code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `national_threat_codes`
--

INSERT INTO `national_threat_codes` (`id`, `national_threat_code`, `national_threat_code_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CR', 'Critically Endangered', 0, '2018-01-12 01:54:16', '2018-01-12 01:54:16'),
(2, 'EN', 'Critically Endangered', 0, '2018-01-12 01:54:41', '2018-01-12 01:54:41'),
(3, 'VU', 'Vulnerable', 0, '2018-01-12 01:55:03', '2018-01-12 01:55:03'),
(4, 'NT', 'Near Threatened', 0, '2018-01-12 01:55:24', '2018-01-12 01:55:24'),
(5, 'LC', 'Least Concern', 1, '2018-01-12 01:55:53', '2018-01-12 01:55:53'),
(6, 'DD', 'Data Deficient', 1, '2018-01-12 01:56:16', '2018-01-12 01:56:16'),
(7, 'NE', 'Not Evaluated', 1, '2018-01-12 01:56:38', '2018-01-24 23:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `observation`
--

CREATE TABLE `observation` (
  `id` int(10) UNSIGNED NOT NULL,
  `observation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `observation`
--

INSERT INTO `observation` (`id`, `observation_code`, `code_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sdfsdfsdf', 'sdfsdfsdf', 0, '2018-01-17 03:39:38', '2018-01-17 05:16:00'),
(3, 'dgdfg', 'sdfsdf', 0, '2018-01-17 05:19:49', '2018-01-17 05:19:49'),
(4, 'dfsdfsdf', 'sdfsdfsd', 0, '2018-01-17 05:21:21', '2018-01-17 05:21:21'),
(5, 'sdfdsf', 'fdsfsdfs', 0, '2018-01-17 05:22:32', '2018-01-17 05:22:32'),
(6, 'sdfdsfr', 'fdsfsdfs', 1, '2018-01-17 05:22:58', '2018-02-28 02:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `observers`
--

CREATE TABLE `observers` (
  `id` int(10) UNSIGNED NOT NULL,
  `observer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observeroption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_tel_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` float NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `observers`
--

INSERT INTO `observers` (`id`, `observer_id`, `tittle`, `observeroption`, `first_name`, `last_name`, `institution`, `address`, `work_tel_number`, `mobile`, `email`, `website`, `status`, `created_at`, `updated_at`) VALUES
(11, 'GVTCINS1', NULL, 'Institution', NULL, NULL, 'Institution', NULL, NULL, NULL, NULL, NULL, 1, '2018-02-27 06:16:08', '2018-02-27 06:16:08'),
(12, 'GVTCINS12', 'Prof', 'Institution', NULL, NULL, 'Institution', 'address', NULL, '2134124', NULL, NULL, 1, '2018-02-27 06:19:15', '2018-02-27 06:19:15'),
(13, 'GVTCINV13', NULL, 'Individual', 'First Name', 'Last Name', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-02-27 06:24:32', '2018-02-27 06:24:32'),
(14, 'GVTCINS14', NULL, 'Institution', NULL, NULL, 'Institution', NULL, NULL, NULL, NULL, NULL, 1, '2018-02-27 06:24:41', '2018-02-27 06:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('so566han@gmail.com', '$2y$10$Qtiu1zb69AKkpc.p1sbX5uYE0OW6MST1ktRQMACM5Rl5ArhDQCRIO', '2018-01-16 05:25:20'),
('rahul@gmail.com', '$2y$10$8E0ruSWh54DS9vzup9Qvz.L05R6VhRZTm3Gu3Y3MHeBjnTcojFhDW', '2018-01-29 05:52:16'),
('rvkumar738@gmail.com', '$2y$10$BtnoUypnxEcTNFu3gpS58.Xew7F0r8WH09yjmSg0U2zMRuskCxpRu', '2018-02-14 00:08:49');

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
  `protected_area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protected_area_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `protected_areas`
--

INSERT INTO `protected_areas` (`id`, `protected_area_name`, `country`, `protected_area_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dfhghgfhgf', 'fghgfh', 'gfhgfhf', 0, '2018-01-25 01:55:43', '2018-01-25 01:55:43'),
(2, '1', '2', '3', 0, '2018-01-25 01:56:05', '2018-01-25 01:56:05'),
(3, 'Protected Area Name1', 'Country2', 'Protected Area Code3', 0, '2018-01-25 02:01:20', '2018-01-25 02:02:10'),
(4, 'sdfdsf', 'sdfsdf', 'sdfdsfsdf', 0, '2018-01-25 02:04:26', '2018-01-25 02:04:26'),
(5, 'p1yuoioiuo', '1', '2', 0, '2018-01-25 02:05:23', '2018-01-25 02:06:18'),
(6, 'e1', 'e', 'e', 0, '2018-01-25 03:21:36', '2018-01-25 03:21:36'),
(7, 'e', 'g', 'g', 0, '2018-01-25 03:21:58', '2018-01-25 03:21:58'),
(8, 'e2', 'gfdfg', 'dfgdfgdf', 1, '2018-01-25 04:05:35', '2018-01-25 04:05:35'),
(9, 'e23', 'c', 'p', 0, '2018-01-25 04:05:57', '2018-01-25 04:05:57'),
(10, 'Protected Area Name', 'UGANDA', 'SD', 0, '2018-02-22 06:33:54', '2018-02-22 06:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `ranges`
--

CREATE TABLE `ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `range_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `range_within_the_albertine_rift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`id`, `range_code`, `range_within_the_albertine_rift`, `status`, `created_at`, `updated_at`) VALUES
(1, 'UG', 'Uganda', 1, '2018-01-12 01:57:33', '2018-01-12 01:57:33'),
(2, 'RW', 'Rwanda', 0, '2018-01-12 01:57:55', '2018-01-12 01:57:55'),
(3, 'DRC', 'DRC', 0, '2018-01-12 01:58:09', '2018-01-12 01:58:09'),
(4, 'uu', 'u', 0, '2018-02-22 03:41:06', '2018-02-22 03:41:13'),
(5, '55', 'g', 0, '2018-02-22 04:05:39', '2018-02-22 04:05:39'),
(6, '112', 'DRC', 0, '2018-02-22 04:06:07', '2018-02-22 04:07:24'),
(7, 'testrang1', 'testdes1', 1, '2018-02-22 04:08:21', '2018-02-22 04:08:30');

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
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id` int(10) UNSIGNED NOT NULL,
  `taxon_id` int(11) NOT NULL,
  `specienewid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subspecies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subspecies_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `common_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iucn_threat_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `range_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `growth_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forestuse_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wateruse_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endenisms_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `migration_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_threat_code_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breeding_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `taxon_id`, `specienewid`, `order`, `family`, `genus`, `species`, `species_author`, `subspecies`, `subspecies_author`, `common_name`, `iucn_threat_id`, `range_id`, `growth_id`, `forestuse_id`, `wateruse_id`, `endenisms_id`, `migration_tbl_id`, `national_threat_code_id`, `breeding_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'GVTCSP1', 'order', 'family', 'genus', 'species', NULL, NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-02-26 04:33:16', '2018-02-26 04:33:16'),
(3, 6, 'GVTCSP3', 'order', 'family', 'genus', '08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2', 0, '2018-02-26 04:35:09', '2018-02-26 04:35:09'),
(4, 9, 'GVTCSP4', 'order1', 'family1', 'genus1', 'species1', 'species Author', 'Subspecies', 'Subspecies Author', 'C1', '6', '1', NULL, '2', '2', '1', '7', '5', NULL, 0, '2018-02-27 00:50:30', '2018-02-27 00:50:30'),
(5, 9, 'GVTCSP5', 'order22', 'family22', 'genus12', 'species22', 'species Author', 'Subspecies', 'Subspecies Author', 'C2', '6', '1', NULL, '2', '2', '1', '7', '5', NULL, 0, '2018-02-27 00:51:31', '2018-02-27 00:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `taxons`
--

CREATE TABLE `taxons` (
  `id` int(10) UNSIGNED NOT NULL,
  `taxon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxon_code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxons`
--

INSERT INTO `taxons` (`id`, `taxon_code`, `taxon_code_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PL', 'Plants', 1, '2018-01-12 01:47:18', '2018-02-21 02:50:03'),
(2, 'IN', 'Insects', 0, '2018-01-12 01:47:42', '2018-02-21 01:58:32'),
(3, 'FI', 'Fish', 0, '2018-01-12 01:48:14', '2018-02-21 01:40:54'),
(4, 'AM', 'Amphibians', 0, '2018-01-12 01:48:37', '2018-02-21 01:59:47'),
(5, 'RE', 'Reptiles', 0, '2018-01-12 01:49:16', '2018-02-21 01:40:19'),
(6, 'BI', 'Birds', 1, '2018-01-12 01:49:40', '2018-02-21 03:00:47'),
(7, 'MA', 'Mammals', 1, '2018-01-12 01:50:02', '2018-01-12 01:50:02'),
(8, 'zxczxcxzc', 'zxcxzcxzc', 0, '2018-01-12 05:31:23', '2018-02-21 04:04:02'),
(9, 'demo1', 'demo test', 1, '2018-01-12 05:32:46', '2018-02-23 01:30:56'),
(10, 'tt', 't', 0, '2018-01-15 05:37:23', '2018-02-28 05:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobilenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photoid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_document.png',
  `profilepicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_profile.jpg',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution_type` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` float NOT NULL,
  `password_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `address`, `mobilenumber`, `email`, `department`, `designation`, `photoid`, `profilepicture`, `password`, `role`, `language`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `account`, `institution`, `institution_type`, `country`, `status`, `password_status`) VALUES
(1, 'admin', 'ravi', 'address', '967743747645', 'rvkumar738@gmail.com', 'department', 'designation', 'default_document.png', 'default_profile.jpg', '$2y$10$Lr5C0IgqOHS8cbvP9UsbW.8ThDXusSlqK79/wSVX0vOg9.wRxbChm', 'admin', '', 'UWp7BP2REPXO3yw00ajLWI49d9CLQVeOmTGDr2AYI8oSGue9LayvxOn06kpL', NULL, '2018-02-01 04:58:38', '', '', '', '', '', '', 1, '0'),
(56, 'ravi12', NULL, 'address', '2352352', 'rvkumar738@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$bIG0ci6C0vcWffgkqPI4YuPtACGyZm.H3kT6rPcLjOj3vHT4y3x2W', 'guest', '', 'alRsbrphyKtCedRREnjf8DM7D1atle4evSsYAd7lOZemkCsJ5QR0qz8b9WqE', '2018-02-20 03:01:09', '2018-02-20 03:06:35', 'Ravi', 'kumar', 'personal', 'Institution/Organization/Company', 'Institution Type test', 'Lebanon', 1, '1'),
(57, 'rohan123', 'rohan', 'kumar', '981234324', 'rvkumar738@gmail.com', 'Department', '234234', 'default_document.png', 'default_profile.jpg', '$2y$10$sr.w5GzpvLXJ6evlPJVAuOb5.gkfgi/RqgFHIiAqdCR6FnUYvczju', 'user', '28634235', 'tE9iZz6kH8HGf6dPbjit5hrziqSwrmrLI3rzTaYN53snCSg4Pjj2wetVufoc', '2018-02-20 03:25:05', '2018-02-20 03:25:05', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0'),
(58, 'admin33', NULL, 'address', '2352352', 'rvkumar738@gmail.com', NULL, NULL, 'default_document.png', 'default_profile.jpg', NULL, 'guest', '', NULL, '2018-02-20 04:36:28', '2018-02-20 04:36:28', 'First Name', 'Last Name', 'personal', 'Institution', 'Institution Type', 'Democratic People\'s Republic of Korea', 0, '0'),
(59, 'adminopl', NULL, 'address', '2352352', 'rvkumar738@gmail.com', NULL, NULL, NULL, NULL, NULL, 'guest', '', NULL, '2018-02-22 00:39:17', '2018-02-22 01:53:08', 'First Name1', 'Kumar', 'personal', 'Institution/Organization/Company', 'Institution Type test', 'Lebanon', 0, '0'),
(60, 'rahulsingh', NULL, 'address', '2352352', 'rvkumar738@gmail.com', NULL, NULL, 'default_document.png', 'default_profile.jpg', '$2y$10$Wnr2dsieh3lgsJMJujzQ3uQxOi75xAE9j.FlZcxugYrtkKnkQISv6', 'guest', '', 'zB2euZM9mUlEwegnRgpxoXgXGgeLfXSJrptDRJm5FOP6THRpUXP0HO1wM24s', '2018-02-22 23:50:41', '2018-02-22 23:50:41', 'Rahul', 'Singh', 'personal', 'Institution', 'Institution Type', 'Uganda', 1, '0'),
(61, 'sachintendulkar', NULL, 'address', '2352352', 'rvkumar738@gmail.com', NULL, NULL, 'default_document.png', 'default_profile.jpg', '$2y$10$HQXaondJZjVytU6eyM1.n.dwhH11yQw4Wq31U/Ol1XMQN5JX8KxXO', 'guest', '', NULL, '2018-02-22 23:56:26', '2018-02-22 23:56:26', 'Sachin', 'Tendulkar', 'personal', 'Institution', 'Institution Type', 'Uganda', 1, '0'),
(62, 'sonuraj', 'sonu', 'address', '2352352', 'rvkumar738@gmail.com', 'Department', 'Designation', 'default_document.png', '5a8fc0f1ec29c_userprofile.png', '$2y$10$gjPyWJMbxDZ9C1kXiKXpEuA9AmrGKOGCkNCh8Ytq02agtGQUkZXSG', 'user', '97595365', 'ZsvJERktLxhwKYXuG2FDMzNhelPaYeuqHlIRNgTwMYd2iKhCNaVpJyOAZVOs', '2018-02-23 01:51:22', '2018-02-23 01:51:22', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0'),
(63, 'amitmayura', NULL, 'address', '2352352', 'rvkumar738@gmail.com', NULL, NULL, 'default_document.png', 'default_profile.jpg', NULL, 'guest', '', NULL, '2018-02-23 05:43:33', '2018-02-23 05:43:33', 'First Name', 'Last Name', 'personal', 'Institution', 'Govermment', 'Uganda', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_fold`
--

CREATE TABLE `users_fold` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobilenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photoid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_document.png',
  `profilepicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_profile.jpg',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_fold`
--

INSERT INTO `users_fold` (`id`, `username`, `name`, `address`, `mobilenumber`, `email`, `department`, `designation`, `photoid`, `profilepicture`, `password`, `role`, `language`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ravi', 'address', '967743747645', 'rvkumar738@gmail.com', 'department', 'designation', 'default_document.png', 'default_profile.jpg', '$2y$10$Lr5C0IgqOHS8cbvP9UsbW.8ThDXusSlqK79/wSVX0vOg9.wRxbChm', 'admin', '', 'cSDfVZjhTzZaphCvEHW1HT9St0psnYOpF3LwkW7gQWzZ9cvP3wwc4kmJWHqw', NULL, '2018-02-01 04:58:38'),
(2, 'rahul', 'ravi', 'address', '11', '12kumar738@gmail.com', 'Department', 'designation', '5a853194e4f31_useridproof.jpeg', '5a853194e4ea6_userprofile.jpeg', '$2y$10$fWzUHgpQG.Z4FH.GRNVRCur/MocVxbxhtY4kPJNh./cv8nuckFEFG', NULL, '', 'D12AKnR2hxN15FdDPHRyv0vCnWbD7nRKhKLjNvfkDYkgQj8lK7f6yKLzhBFD', '2018-02-15 01:31:50', '2018-02-15 01:37:00'),
(3, 'ravi_kumar', 'Ravi', 'address', '2352352', 'ravi_kumar@opaint.in', 'Department', 'Designation', 'default_document.png', 'default_profile.jpg', '$2y$10$QmeYckzF4Emx.NNG2d/no./6.URj.IiNWOJmbxJKBNtSiWmvVdteO', 'user', '46306740', NULL, '2018-02-15 03:52:49', '2018-02-15 03:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `users_new`
--

CREATE TABLE `users_new` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobilenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photoid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_document.png',
  `profilepicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_profile.jpg',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_type` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_new`
--

INSERT INTO `users_new` (`id`, `username`, `name`, `address`, `mobilenumber`, `email`, `department`, `designation`, `photoid`, `profilepicture`, `password`, `role`, `language`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `account`, `institution`, `institution_type`, `country`) VALUES
(1, 'admin', 'ravi', 'address', '967743747645', 'rvkumar738@gmail.com', 'department', 'designation', 'default_document.png', 'default_profile.jpg', '$2y$10$Lr5C0IgqOHS8cbvP9UsbW.8ThDXusSlqK79/wSVX0vOg9.wRxbChm', 'admin', '', 'vIn50zDy1qlgaZNudF66yJ6EraVsQZzKKFYid3tCr5OUXFEOXVOFYAk32sYQ', NULL, '2018-02-01 04:58:38', '', '', '', '', '', ''),
(2, 'rahul', 'ravi', 'address', '11', '12kumar738@gmail.com', 'Department', 'designation', '5a853194e4f31_useridproof.jpeg', '5a853194e4ea6_userprofile.jpeg', '$2y$10$fWzUHgpQG.Z4FH.GRNVRCur/MocVxbxhtY4kPJNh./cv8nuckFEFG', NULL, '', 'D12AKnR2hxN15FdDPHRyv0vCnWbD7nRKhKLjNvfkDYkgQj8lK7f6yKLzhBFD', '2018-02-15 01:31:50', '2018-02-15 01:37:00', '', '', '', '', '', ''),
(3, 'ravi_kumar', 'Ravi', 'address', '2352352', 'ravi_kumar@opaint.in', 'Department', 'Designation', 'default_document.png', 'default_profile.jpg', '$2y$10$QmeYckzF4Emx.NNG2d/no./6.URj.IiNWOJmbxJKBNtSiWmvVdteO', 'user', '46306740', NULL, '2018-02-15 03:52:49', '2018-02-15 03:52:49', '', '', '', '', '', ''),
(4, 'testuser1', NULL, 'address', '2352352', 'rahul@gmail.com', NULL, NULL, 'default_document.png', 'default_profile.jpg', NULL, 'guest', '', NULL, '2018-02-15 06:57:51', '2018-02-15 06:57:51', 'First Name', 'Last Name', 'personal', 'Institution', 'qwrqwerer', 'Lebanon'),
(5, 'testuser12', NULL, 'address', '2352352', 'rvkumar738@gmail.com', NULL, NULL, 'default_document.png', 'default_profile.jpg', NULL, 'guest', '', NULL, '2018-02-15 07:01:11', '2018-02-15 07:01:11', 'First Name', 'Last Name', 'personal', 'Institution', 'Institution Type', 'Lebanon');

-- --------------------------------------------------------

--
-- Table structure for table `wateruse`
--

CREATE TABLE `wateruse` (
  `id` int(10) UNSIGNED NOT NULL,
  `water_use` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_habitat_usage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wateruse`
--

INSERT INTO `wateruse` (`id`, `water_use`, `water_habitat_usage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'W', 'Waterbird', 0, '2018-01-12 02:46:05', '2018-01-12 02:46:05'),
(2, 'we', 'water/wetland user', 1, '2018-01-12 02:46:32', '2018-01-12 02:46:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abundances`
--
ALTER TABLE `abundances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `abundances_age_group_unique` (`abundance_group`);

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
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `ages`
--
ALTER TABLE `ages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ages_age_group_unique` (`age_group`);

--
-- Indexes for table `breedings`
--
ALTER TABLE `breedings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_range_unique` (`range`);

--
-- Indexes for table `distributions`
--
ALTER TABLE `distributions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `gazetteers`
--
ALTER TABLE `gazetteers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `growths`
--
ALTER TABLE `growths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `growths_growth_form_unique` (`growth_form`);

--
-- Indexes for table `guestregisters`
--
ALTER TABLE `guestregisters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `iucn_threats`
--
ALTER TABLE `iucn_threats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iucn_threat_iucn_threat_code_unique` (`iucn_threat_code`);

--
-- Indexes for table `methods`
--
ALTER TABLE `methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `methods_method_code_unique` (`method_code`);

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
-- Indexes for table `observation`
--
ALTER TABLE `observation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `observation_observation_code_unique` (`observation_code`);

--
-- Indexes for table `observers`
--
ALTER TABLE `observers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `observers_observer_id_unique` (`observer_id`);

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
  ADD UNIQUE KEY `protected_area_name` (`protected_area_name`);

--
-- Indexes for table `ranges`
--
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ranges_range_unique` (`range_code`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users_fold`
--
ALTER TABLE `users_fold`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_new`
--
ALTER TABLE `users_new`
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
-- AUTO_INCREMENT for table `abundances`
--
ALTER TABLE `abundances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adminunits`
--
ALTER TABLE `adminunits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ages`
--
ALTER TABLE `ages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `breedings`
--
ALTER TABLE `breedings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `endenisms`
--
ALTER TABLE `endenisms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `gazetteers`
--
ALTER TABLE `gazetteers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `growths`
--
ALTER TABLE `growths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `guestregisters`
--
ALTER TABLE `guestregisters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `iucn_threats`
--
ALTER TABLE `iucn_threats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `methods`
--
ALTER TABLE `methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
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
-- AUTO_INCREMENT for table `observation`
--
ALTER TABLE `observation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `observers`
--
ALTER TABLE `observers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `protected_areas`
--
ALTER TABLE `protected_areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `taxons`
--
ALTER TABLE `taxons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users_fold`
--
ALTER TABLE `users_fold`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_new`
--
ALTER TABLE `users_new`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
