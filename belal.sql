-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2025 at 09:57 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belal`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentications`
--

DROP TABLE IF EXISTS `authentications`;
CREATE TABLE IF NOT EXISTS `authentications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `form_id` int NOT NULL,
  `access_level` int NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `box_recipits`
--

DROP TABLE IF EXISTS `box_recipits`;
CREATE TABLE IF NOT EXISTS `box_recipits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipit_type` int NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `safe_id` int NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `code`, `car_number`, `driver_name`, `phone`, `notes`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, '001', 'ق م ل 587', 'محمد عبدالدايم', '', '', 1, 0, '2025-05-02 13:17:26', '2025-05-02 13:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `car_daily_meals`
--

DROP TABLE IF EXISTS `car_daily_meals`;
CREATE TABLE IF NOT EXISTS `car_daily_meals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` int NOT NULL,
  `weakly_meal_id` int NOT NULL,
  `type` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supplier_id` int NOT NULL,
  `buffalo_weight` decimal(8,2) NOT NULL,
  `bovine_weight` decimal(8,2) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buffalo_weight_difference` decimal(8,2) NOT NULL,
  `bovine_weight_difference` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catch_recipits`
--

DROP TABLE IF EXISTS `catch_recipits`;
CREATE TABLE IF NOT EXISTS `catch_recipits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_method` int NOT NULL,
  `safe_id` int NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cheese_meals`
--

DROP TABLE IF EXISTS `cheese_meals`;
CREATE TABLE IF NOT EXISTS `cheese_meals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_milk_meal` int NOT NULL,
  `milk_weight` decimal(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `average_weight_per_milk_litter` decimal(8,2) NOT NULL,
  `average_productivity_per_cheese_disk` decimal(8,2) NOT NULL,
  `productivity` decimal(8,2) NOT NULL,
  `cost_per_cheese_kilo` decimal(8,2) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buffalo_min_limit` decimal(8,2) NOT NULL,
  `buffalo_max_limit` decimal(8,2) NOT NULL,
  `bovine_min_limit` decimal(8,2) NOT NULL,
  `bovine_max_limit` decimal(8,2) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `type`, `name`, `phone`, `buffalo_min_limit`, `buffalo_max_limit`, `bovine_min_limit`, `bovine_max_limit`, `address`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 1, 'ام محمد بلتاجي', '0122954151454', 0.00, 0.00, 0.00, 0.00, '', 1, 1, '2025-05-02 12:27:44', '2025-05-02 12:29:44'),
(2, 2, 'أولاد حسنين', '', 50.00, 100.00, 20.00, 50.00, '', 1, 1, '2025-05-02 12:30:09', '2025-05-03 03:56:10'),
(3, 0, 'عميل تست', '', 0.00, 0.00, 0.00, 0.00, '', 1, 0, '2025-05-03 03:05:28', '2025-05-03 03:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `client_accounts`
--

DROP TABLE IF EXISTS `client_accounts`;
CREATE TABLE IF NOT EXISTS `client_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `debit` decimal(8,2) NOT NULL,
  `credit` decimal(8,2) NOT NULL,
  `opening_balance_debit` decimal(8,2) NOT NULL,
  `opening_balance_credit` decimal(8,2) NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_milk_meals`
--

DROP TABLE IF EXISTS `daily_milk_meals`;
CREATE TABLE IF NOT EXISTS `daily_milk_meals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weakly_meal_id` int NOT NULL,
  `type` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supplier_id` int NOT NULL,
  `buffalo_weight` decimal(8,2) NOT NULL,
  `bovine_weight` decimal(8,2) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasBonus` int NOT NULL DEFAULT '0',
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_milk_meals`
--

INSERT INTO `daily_milk_meals` (`id`, `code`, `weakly_meal_id`, `type`, `date`, `supplier_id`, `buffalo_weight`, `bovine_weight`, `notes`, `hasBonus`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'DMM0001', 1, 0, '2025-05-03 06:52:00', 1, 150.00, 30.00, '', 0, 1, 0, '2025-05-03 03:53:12', '2025-05-03 03:53:12'),
(3, 'DMM0002', 1, 0, '2025-05-03 07:11:00', 2, 120.00, 20.00, '', 0, 1, 0, '2025-05-03 04:11:55', '2025-05-03 04:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_selling_price` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `code`, `name`, `details`, `default_selling_price`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, '001', 'جبنة رومي', '', 240.00, 1, 0, '2025-05-02 12:43:09', '2025-05-02 12:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int NOT NULL,
  `safe_id` int NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `installment_amount` decimal(8,2) NOT NULL,
  `installment_count` int NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remaining_installments` int NOT NULL,
  `paid_installments` int NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_26_055714_create_settings_table', 1),
(6, '2025_04_30_121710_create_clients_table', 1),
(7, '2025_04_30_121922_create_client_accounts_table', 1),
(8, '2025_04_30_122101_create_weakly_milk_meals_table', 1),
(9, '2025_04_30_122114_create_daily_milk_meals_table', 1),
(10, '2025_04_30_122643_create_cheese_meals_table', 1),
(11, '2025_04_30_122901_create_stores_table', 1),
(12, '2025_04_30_122929_create_sales_table', 1),
(13, '2025_04_30_122941_create_sales_details_table', 1),
(14, '2025_04_30_123201_create_stock_transactions_table', 1),
(15, '2025_04_30_123210_create_stock_transaction_details_table', 1),
(16, '2025_04_30_123419_create_recipits_table', 1),
(17, '2025_04_30_123430_create_catch_recipits_table', 1),
(18, '2025_04_30_123441_create_box_recipits_table', 1),
(19, '2025_04_30_123515_create_loans_table', 1),
(20, '2025_04_30_123700_create_recipit_types_table', 1),
(21, '2025_04_30_124004_create_forms_table', 1),
(22, '2025_04_30_124018_create_authentications_table', 1),
(23, '2025_04_30_124030_create_safes_table', 1),
(24, '2025_04_30_124046_create_store_quantities_table', 1),
(25, '2025_04_30_124200_create_roles_table', 1),
(26, '2025_04_30_124521_create_cars_table', 1),
(27, '2025_04_30_124538_create_items_table', 1),
(28, '2025_04_30_124553_create_car_daily_meals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipits`
--

DROP TABLE IF EXISTS `recipits`;
CREATE TABLE IF NOT EXISTS `recipits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_method` int NOT NULL,
  `safe_id` int NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipit_types`
--

DROP TABLE IF EXISTS `recipit_types`;
CREATE TABLE IF NOT EXISTS `recipit_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipit_types`
--

INSERT INTO `recipit_types` (`id`, `name`, `code`, `description`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'شحن كهرباء', '001', '', 1, 1, '2025-05-02 07:34:45', '2025-05-02 07:34:48'),
(2, 'مصروفات بوفية', '002', '', 1, 0, '2025-05-02 07:35:14', '2025-05-02 07:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'مدير الموقع', 1, 1, '2025-05-03 05:35:09', '2025-05-03 05:35:36'),
(2, 'محاسب', 1, 0, '2025-05-03 05:35:43', '2025-05-03 05:35:43'),
(3, 'محصل لبن', 1, 0, '2025-05-03 05:35:49', '2025-05-03 05:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `safes`
--

DROP TABLE IF EXISTS `safes`;
CREATE TABLE IF NOT EXISTS `safes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `safes`
--

INSERT INTO `safes` (`id`, `name`, `code`, `details`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'خزنة المكتب الرئيسية', '001', '', 1, 1, '2025-05-02 07:25:21', '2025-05-02 07:25:25'),
(3, 'حساب البنك الأهلي', '002', '', 1, 1, '2025-05-02 07:27:50', '2025-05-02 07:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `client_id` int NOT NULL,
  `store_id` int NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `net` decimal(8,2) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

DROP TABLE IF EXISTS `sales_details`;
CREATE TABLE IF NOT EXISTS `sales_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_id` int NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `buffalo_milk_price` decimal(8,2) NOT NULL,
  `bovine_milk_price` decimal(8,2) NOT NULL,
  `morning_bonus_time` timestamp NOT NULL,
  `evening_bonus_time` timestamp NOT NULL,
  `bonus_value` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL,
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `buffalo_milk_price`, `bovine_milk_price`, `morning_bonus_time`, `evening_bonus_time`, `bonus_value`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 25.00, 20.00, '2025-05-03 05:51:14', '2025-05-03 05:51:14', 2.00, 0, 0, '2025-05-03 05:50:25', '2025-05-03 05:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `stock_transactions`
--

DROP TABLE IF EXISTS `stock_transactions`;
CREATE TABLE IF NOT EXISTS `stock_transactions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_number` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_store` int NOT NULL,
  `to_store` int NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_transaction_details`
--

DROP TABLE IF EXISTS `stock_transaction_details`;
CREATE TABLE IF NOT EXISTS `stock_transaction_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaction_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `code`, `name`, `details`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(2, '0001', 'المخزن الرئيسي', '', 1, 1, '2025-05-02 04:14:29', '2025-05-02 07:22:39'),
(3, '002', 'مخزن فرعي - 1', '', 1, 0, '2025-05-02 04:14:58', '2025-05-02 04:14:58'),
(4, '003', 'مخزن مبيعات - 1', '', 1, 1, '2025-05-02 04:15:13', '2025-05-02 04:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `store_quantities`
--

DROP TABLE IF EXISTS `store_quantities`;
CREATE TABLE IF NOT EXISTS `store_quantities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `opening_quantity` decimal(8,2) NOT NULL,
  `quantity_in` decimal(8,2) NOT NULL,
  `quantity_out` decimal(8,2) NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL DEFAULT '0',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'kareem', 'admin@gmail.com', NULL, '$2y$10$KFQNqJv7qknJSg7HXUefNe4q2XaE5APqcnbg77i4i718jychdGKtS', 'saJyWscDs0l9fCeqnHXf8hHPAmidGAV5LvisZeJnXBdylKLyM7wXweCuDwW8', '2025-01-18 06:56:31', '2025-05-03 05:37:59'),
(3, 2, 'محاسب 1', 'm@belal.com', NULL, '$2y$10$2Q8mO.FCCBBcSzJ8KYebfueYPQGZ4aOf9nifGcQ/v.yZAmAHIfVh.', 'JKDTGDlBylu4EJe9hgTCtmSjKZBUeyA2CxuUPLKXhDxlbcsyeLa0KBTEDPpr', '2025-01-23 13:21:42', '2025-05-03 05:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `weakly_milk_meals`
--

DROP TABLE IF EXISTS `weakly_milk_meals`;
CREATE TABLE IF NOT EXISTS `weakly_milk_meals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int NOT NULL,
  `price_buffalo` decimal(8,2) NOT NULL,
  `price_bovine` decimal(8,2) NOT NULL,
  `total_buffalo_weight` decimal(8,2) NOT NULL,
  `total_bovine_weight` decimal(8,2) NOT NULL,
  `total_money` decimal(8,2) NOT NULL,
  `number_of_daily_meals` int NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weakly_milk_meals`
--

INSERT INTO `weakly_milk_meals` (`id`, `start_date`, `end_date`, `code`, `state`, `price_buffalo`, `price_bovine`, `total_buffalo_weight`, `total_bovine_weight`, `total_money`, `number_of_daily_meals`, `notes`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, '2025-05-02 21:00:00', '2025-05-09 21:00:00', 'WM0001', 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 'تست تست تست', 1, 1, '2025-05-03 00:36:27', '2025-05-03 00:46:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
