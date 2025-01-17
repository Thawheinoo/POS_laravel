-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 01:49 PM
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
-- Database: `pos_project_code_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_logs`
--

CREATE TABLE `action_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action_logs`
--

INSERT INTO `action_logs` (`id`, `user_id`, `post_id`, `action`, `created_at`, `updated_at`) VALUES
(1, 9, 6, 'seen', '2025-01-03 02:27:30', '2025-01-03 02:27:30'),
(2, 9, 9, 'seen', '2025-01-03 02:28:02', '2025-01-03 02:28:02'),
(3, 9, 9, 'comment', '2025-01-03 02:28:26', '2025-01-03 02:28:26'),
(4, 9, 9, 'seen', '2025-01-03 02:28:26', '2025-01-03 02:28:26'),
(5, 9, 9, 'seen', '2025-01-03 02:31:55', '2025-01-03 02:31:55'),
(6, 9, 9, 'seen', '2025-01-03 02:32:58', '2025-01-03 02:32:58'),
(7, 9, 9, 'seen', '2025-01-03 02:33:28', '2025-01-03 02:33:28'),
(8, 9, 9, 'seen', '2025-01-03 02:34:07', '2025-01-03 02:34:07'),
(9, 9, 9, 'seen', '2025-01-03 02:35:02', '2025-01-03 02:35:02'),
(10, 9, 9, 'seen', '2025-01-03 02:35:16', '2025-01-03 02:35:16'),
(11, 9, 9, 'seen', '2025-01-03 02:35:36', '2025-01-03 02:35:36'),
(12, 9, 6, 'seen', '2025-01-03 02:35:59', '2025-01-03 02:35:59'),
(13, 9, 7, 'seen', '2025-01-03 02:36:06', '2025-01-03 02:36:06'),
(14, 9, 7, 'seen', '2025-01-03 02:37:15', '2025-01-03 02:37:15'),
(15, 9, 7, 'seen', '2025-01-03 02:39:20', '2025-01-03 02:39:20'),
(16, 9, 7, 'seen', '2025-01-03 02:39:34', '2025-01-03 02:39:34'),
(17, 9, 7, 'seen', '2025-01-03 02:40:07', '2025-01-03 02:40:07'),
(18, 9, 7, 'seen', '2025-01-03 02:40:24', '2025-01-03 02:40:24'),
(19, 9, 7, 'seen', '2025-01-03 02:45:27', '2025-01-03 02:45:27'),
(20, 9, 7, 'seen', '2025-01-03 02:45:55', '2025-01-03 02:45:55'),
(21, 9, 7, 'seen', '2025-01-03 02:46:05', '2025-01-03 02:46:05'),
(22, 9, 8, 'seen', '2025-01-03 06:48:44', '2025-01-03 06:48:44'),
(23, 9, 8, 'seen', '2025-01-03 06:49:01', '2025-01-03 06:49:01'),
(24, 9, 6, 'seen', '2025-01-03 06:49:06', '2025-01-03 06:49:06'),
(25, 9, 7, 'seen', '2025-01-03 06:49:14', '2025-01-03 06:49:14'),
(26, 9, 9, 'seen', '2025-01-03 06:49:21', '2025-01-03 06:49:21'),
(27, 9, 8, 'seen', '2025-01-03 06:49:36', '2025-01-03 06:49:36'),
(28, 9, 8, 'seen', '2025-01-03 06:56:56', '2025-01-03 06:56:56'),
(29, 9, 8, 'seen', '2025-01-03 06:57:03', '2025-01-03 06:57:03'),
(30, 9, 8, 'seen', '2025-01-03 07:02:00', '2025-01-03 07:02:00'),
(31, 9, 8, 'seen', '2025-01-03 07:02:29', '2025-01-03 07:02:29'),
(32, 9, 8, 'seen', '2025-01-03 07:14:08', '2025-01-03 07:14:08'),
(33, 9, 8, 'seen', '2025-01-03 07:15:37', '2025-01-03 07:15:37'),
(34, 9, 8, 'seen', '2025-01-03 07:15:52', '2025-01-03 07:15:52'),
(35, 9, 8, 'seen', '2025-01-03 07:15:54', '2025-01-03 07:15:54'),
(36, 9, 8, 'seen', '2025-01-03 07:16:07', '2025-01-03 07:16:07'),
(37, 9, 8, 'seen', '2025-01-03 07:16:16', '2025-01-03 07:16:16'),
(38, 9, 8, 'seen', '2025-01-03 07:16:19', '2025-01-03 07:16:19'),
(39, 9, 8, 'seen', '2025-01-03 07:16:23', '2025-01-03 07:16:23'),
(40, 9, 8, 'seen', '2025-01-03 07:16:30', '2025-01-03 07:16:30'),
(41, 9, 8, 'seen', '2025-01-03 07:16:46', '2025-01-03 07:16:46'),
(42, 9, 8, 'seen', '2025-01-03 07:16:48', '2025-01-03 07:16:48'),
(43, 9, 8, 'seen', '2025-01-03 07:16:56', '2025-01-03 07:16:56'),
(44, 9, 8, 'seen', '2025-01-03 07:16:57', '2025-01-03 07:16:57'),
(45, 9, 8, 'seen', '2025-01-03 07:17:13', '2025-01-03 07:17:13'),
(46, 9, 8, 'seen', '2025-01-03 07:19:09', '2025-01-03 07:19:09'),
(47, 9, 8, 'seen', '2025-01-03 08:04:07', '2025-01-03 08:04:07'),
(48, 9, 8, 'seen', '2025-01-03 08:04:32', '2025-01-03 08:04:32'),
(49, 9, 8, 'seen', '2025-01-03 08:04:38', '2025-01-03 08:04:38'),
(50, 9, 8, 'seen', '2025-01-03 08:04:40', '2025-01-03 08:04:40'),
(51, 9, 8, 'seen', '2025-01-03 08:04:44', '2025-01-03 08:04:44'),
(52, 9, 8, 'seen', '2025-01-03 08:04:47', '2025-01-03 08:04:47'),
(53, 9, 8, 'seen', '2025-01-03 08:05:20', '2025-01-03 08:05:20'),
(54, 9, 8, 'seen', '2025-01-03 08:05:40', '2025-01-03 08:05:40'),
(55, 9, 8, 'seen', '2025-01-03 08:05:47', '2025-01-03 08:05:47'),
(56, 9, 8, 'seen', '2025-01-03 08:09:14', '2025-01-03 08:09:14'),
(57, 9, 8, 'seen', '2025-01-03 08:09:51', '2025-01-03 08:09:51'),
(58, 9, 8, 'seen', '2025-01-03 08:15:02', '2025-01-03 08:15:02'),
(59, 9, 8, 'seen', '2025-01-03 08:15:08', '2025-01-03 08:15:08'),
(60, 9, 8, 'seen', '2025-01-03 08:18:06', '2025-01-03 08:18:06'),
(61, 7, 8, 'seen', '2025-01-03 08:18:57', '2025-01-03 08:18:57'),
(62, 7, 8, 'comment', '2025-01-03 08:19:11', '2025-01-03 08:19:11'),
(63, 7, 8, 'seen', '2025-01-03 08:19:11', '2025-01-03 08:19:11'),
(64, 7, 9, 'seen', '2025-01-03 08:45:48', '2025-01-03 08:45:48'),
(65, 7, 9, 'seen', '2025-01-03 08:45:55', '2025-01-03 08:45:55'),
(66, 7, 9, 'seen', '2025-01-03 08:59:29', '2025-01-03 08:59:29'),
(67, 7, 9, 'seen', '2025-01-03 08:59:34', '2025-01-03 08:59:34'),
(68, 7, 9, 'seen', '2025-01-03 08:59:36', '2025-01-03 08:59:36'),
(69, 7, 9, 'seen', '2025-01-03 08:59:41', '2025-01-03 08:59:41'),
(70, 7, 9, 'seen', '2025-01-03 08:59:49', '2025-01-03 08:59:49'),
(71, 7, 7, 'seen', '2025-01-03 09:03:04', '2025-01-03 09:03:04'),
(72, 7, 8, 'seen', '2025-01-03 09:03:26', '2025-01-03 09:03:26'),
(73, 7, 7, 'seen', '2025-01-03 09:04:40', '2025-01-03 09:04:40'),
(74, 7, 8, 'seen', '2025-01-03 09:04:52', '2025-01-03 09:04:52'),
(75, 7, 8, 'seen', '2025-01-03 09:05:37', '2025-01-03 09:05:37'),
(76, 7, 8, 'seen', '2025-01-03 09:16:38', '2025-01-03 09:16:38'),
(77, 7, 8, 'seen', '2025-01-03 09:18:21', '2025-01-03 09:18:21'),
(78, 7, 8, 'seen', '2025-01-03 09:22:16', '2025-01-03 09:22:16'),
(79, 7, 7, 'seen', '2025-01-03 09:22:32', '2025-01-03 09:22:32'),
(80, 7, 8, 'seen', '2025-01-03 09:22:35', '2025-01-03 09:22:35'),
(81, 7, 8, 'seen', '2025-01-03 09:26:32', '2025-01-03 09:26:32'),
(82, 7, 8, 'seen', '2025-01-03 09:28:26', '2025-01-03 09:28:26'),
(83, 7, 8, 'seen', '2025-01-03 09:28:54', '2025-01-03 09:28:54'),
(84, 7, 8, 'seen', '2025-01-03 09:29:33', '2025-01-03 09:29:33'),
(85, 9, 8, 'seen', '2025-01-03 20:39:42', '2025-01-03 20:39:42'),
(86, 9, 8, 'seen', '2025-01-03 20:51:09', '2025-01-03 20:51:09'),
(87, 9, 8, 'seen', '2025-01-03 20:55:14', '2025-01-03 20:55:14'),
(88, 9, 8, 'seen', '2025-01-03 20:55:37', '2025-01-03 20:55:37'),
(89, 7, 19, 'seen', '2025-01-04 01:50:53', '2025-01-04 01:50:53'),
(90, 7, 21, 'seen', '2025-01-04 01:52:18', '2025-01-04 01:52:18');

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Perfumes', '2025-01-04 01:41:48', '2025-01-04 01:41:48'),
(9, 'Men Shirts', '2025-01-04 01:42:07', '2025-01-04 01:42:07'),
(10, 'Shoes', '2025-01-04 01:42:19', '2025-01-04 01:42:19'),
(11, 'Glasses', '2025-01-04 01:42:28', '2025-01-04 01:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 8, 9, 'hello world', '2025-01-02 00:03:30', '2025-01-02 00:03:30'),
(2, 8, 9, 'this is good product .very good', '2025-01-02 00:22:54', '2025-01-02 00:22:54'),
(3, 8, 9, 'good', '2025-01-02 00:33:05', '2025-01-02 00:33:05'),
(5, 9, 9, 'good perfumes', '2025-01-03 02:28:26', '2025-01-03 02:28:26'),
(6, 8, 7, 'good', '2025-01-03 08:19:11', '2025-01-03 08:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `title`, `message`, `created_at`, `updated_at`) VALUES
(1, 9, 'for good', 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nWhat is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nWhat is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-01-03 10:32:30', '2025-01-03 10:32:30'),
(3, 9, 'reply from admin', 'ok i will fix it', '2025-01-03 18:56:24', '2025-01-03 18:56:24'),
(4, 9, 'buy t more', 'goood gor purchase', '2025-01-03 19:11:34', '2025-01-03 19:11:34'),
(5, 9, 'reply from admin', 'thank yout', '2025-01-03 19:13:13', '2025-01-03 19:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2024_12_06_083224_create_categories_table', 1),
(5, '2024_12_06_083351_create_products_table', 1),
(6, '2024_12_06_083918_create_discounts_table', 1),
(7, '2024_12_06_084030_create_comments_table', 1),
(8, '2024_12_06_084051_create_ratings_table', 1),
(9, '2024_12_06_084356_create_carts_table', 1),
(10, '2024_12_06_084602_create_payments_table', 1),
(11, '2024_12_06_084806_create_orders_table', 1),
(12, '2024_12_06_085005_create_contacts_table', 1),
(13, '2024_12_06_085141_create_action_logs_table', 1),
(14, '2024_12_28_051857_create_payment_histories_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `count`, `status`, `order_code`, `created_at`, `updated_at`) VALUES
(4, 7, 9, 1, '1', 'POS-9835626', '2024-12-28 01:10:51', '2025-01-01 01:45:09'),
(5, 9, 9, 1, '1', 'POS-9835626', '2024-12-28 01:10:51', '2025-01-01 01:45:09'),
(6, 12, 9, 12, '1', 'POS-337005', '2024-12-28 01:13:11', '2025-01-01 01:45:22'),
(7, 11, 9, 12, '1', 'POS-337005', '2024-12-28 01:13:11', '2025-01-01 01:45:22'),
(8, 13, 9, 1, '1', 'POS-6497349', '2024-12-28 02:42:32', '2025-01-01 01:47:37'),
(9, 6, 7, 5, '1', 'POS-7853658', '2024-12-30 01:00:34', '2025-01-03 20:31:25'),
(10, 8, 9, 1, '2', 'POS-3284269', '2025-01-03 20:47:36', '2025-01-04 01:49:44'),
(11, 8, 9, 1, '2', 'POS-3558809', '2025-01-03 20:51:40', '2025-01-04 01:49:41'),
(12, 21, 7, 2, '1', 'POS-4005621', '2025-01-04 01:54:26', '2025-01-04 01:57:01');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `type` char(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `account_number`, `account_name`, `type`, `created_at`, `updated_at`) VALUES
(3, '12345678912345', 'Thaw Hein OO', 'MAB', '2024-12-15 07:10:55', '2024-12-15 07:10:55'),
(4, '123456987ujgyy', 'Thaw Hein Oo', 'KBZ', '2025-01-04 01:49:08', '2025-01-04 01:49:08'),
(5, '1236598745221', 'Thaw Hein OO', 'Wave Pay', '2025-01-04 01:49:31', '2025-01-04 01:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `payment_histories`
--

CREATE TABLE `payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `payslip_image` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_histories`
--

INSERT INTO `payment_histories` (`id`, `user_name`, `phone`, `address`, `payslip_image`, `payment_method`, `order_code`, `total_amount`, `created_at`, `updated_at`) VALUES
(5, 'mgmg', '0622496583', 'Yangon', '676fb28b354d5images (12).jpg', 'MAB', 'POS-9835626', '955000 mmk', '2024-12-28 01:10:51', '2024-12-28 01:10:51'),
(6, 'mgmg', '0622496583', 'Yangon', '676fb317ab020images (13).jpg', 'MAB', 'POS-337005', '46805000 mmk', '2024-12-28 01:13:11', '2024-12-28 01:13:11'),
(7, 'Mg Mg', '0622496583', 'Thailand', '676fc808708d0download (5).jpg', 'MAB', 'POS-6497349', '155000', '2024-12-28 02:42:32', '2024-12-28 02:42:32'),
(8, 'testing test', '0956222555', 'Mandalay', '67725322e9d71download (4).jpg', 'MAB', 'POS-7853658', '1255000', '2024-12-30 01:00:34', '2024-12-30 01:00:34'),
(9, 'Mg Mg', '2356687444', 'Yangon', '6778af5806541images (6).jpg', 'MAB', 'POS-3284269', '605000', '2025-01-03 20:47:36', '2025-01-03 20:47:36'),
(10, 'Mg Mg', '46456513', 'Yangon', '6778b04bf3a59images (13).jpg', 'MAB', 'POS-3558809', '605000', '2025-01-03 20:51:39', '2025-01-03 20:51:39'),
(11, 'testing test', '0622496583', 'Yangon', '6778f741e9d0fimages (11).jpg', 'MAB', 'POS-4005621', '1305000', '2025-01-04 01:54:25', '2025-01-04 01:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `category_id`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(14, 'Converse shoes', 500000, 'This is red shoes.', 10, 10, '6778f4af6b07fdownload (1).jpg', '2025-01-04 01:43:27', '2025-01-04 01:43:27'),
(15, 'Blue Shoes', 300000, 'This is blue shoes .', 10, 100, '6778f4d2d309edownload (3).jpg', '2025-01-04 01:44:02', '2025-01-04 01:44:02'),
(16, 'Adidas', 1500000, 'This is black .', 10, 2, '6778f4f368e25download (4).jpg', '2025-01-04 01:44:35', '2025-01-04 01:44:35'),
(17, 'Blue Shirts', 15000, 'This is shirt .', 9, 360, '6778f53175f60download (5).jpg', '2025-01-04 01:45:37', '2025-01-04 01:45:37'),
(18, 'Coco', 3650000, 'This is pink', 8, 1, '6778f556c3ba8download (6).jpg', '2025-01-04 01:46:14', '2025-01-04 01:46:14'),
(19, 'Black shirt', 900000, 'This is black shirt', 9, 2, '6778f5852e4a7images (2).jpg', '2025-01-04 01:47:01', '2025-01-04 01:47:01'),
(20, 'Rayy', 982000, 'This is glass.', 11, 6, '6778f5a5a81cfimages (6).jpg', '2025-01-04 01:47:33', '2025-01-04 01:47:33'),
(21, 'Shirt Shity', 650000, 'this is good', 9, 67, '6778f5d2a5155images (4).jpg', '2025-01-04 01:48:18', '2025-01-04 01:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `count`, `created_at`, `updated_at`) VALUES
(1, 8, 9, 5, '2025-01-02 02:52:04', '2025-01-03 06:57:02'),
(2, 6, 9, 1, '2025-01-02 02:54:15', '2025-01-03 01:49:44'),
(3, 9, 9, 1, '2025-01-03 01:46:35', '2025-01-03 01:49:24'),
(4, 7, 9, 4, '2025-01-03 02:39:33', '2025-01-03 02:39:33'),
(5, 8, 7, 5, '2025-01-03 09:05:37', '2025-01-03 09:16:38');

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
('1JAwO5AlB17yeekqeuqsgARRLpkJiwFnwzXA3pcu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMTB4dTRLc0NoQ0dMaTJXRXZOMHRiY0hxUWxGTmFTaHpLdUtKZTkxRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1735994957);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `provider_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `email`, `email_verified_at`, `password`, `phone`, `address`, `profile`, `role`, `provider`, `provider_id`, `provider_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, 'superadmin@gmail.com', NULL, '$2y$12$prZjKBdB6Ys8c8RCw7LXYOeb17qNvcQAT9PlaWADYd47j9u.1b8Ui', '06224965834', NULL, '67792e125fab1images (6).jpg', 'superadmin', NULL, NULL, NULL, NULL, '2024-12-14 23:53:09', '2025-01-04 05:48:18'),
(4, 'mgmg', NULL, 'mgmg@gmail.com', NULL, '$2y$12$/wDDLPzMq5rn3uIbnmgkwOGZW8z4UTlLFmiEWWwYBLM51XxOqWBkS', NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, '2024-12-15 20:38:08', '2024-12-15 20:38:08'),
(5, 'pont pont', NULL, 'pont@gmail.com', NULL, '$2y$12$MJvSCYzoiqqortniVgmE0.S7YJpvZt.rL9V8.bp3QM7IX9ua71ghy', NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, '2024-12-15 22:23:32', '2024-12-15 22:23:32'),
(6, 'thaw', NULL, 'thaw@gmail.com', NULL, '$2y$12$fOLyW76/x4H2i.d.MWLv3O2t7G/bhuQ9g75LTYWAFSjeAQGyM5iZe', NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, '2024-12-15 22:24:28', '2024-12-15 22:24:28'),
(7, 'testing test', NULL, 'testingtest11337799@gmail.com', NULL, NULL, '0123456789', 'Yangon', '6776438eed3e7images (3).jpg', 'user', 'google', '100471332723226102790', 'ya29.a0ARW5m76SOGU3OlCWBTqWMf4I2MYL-SWJ0tJJLD8sXsk1fi_rqEOgA2hQ7W7VYOACSdLQL_uCknG6dRZmdFkTQHGNjmpqdAdyV4eU94pR-M1rykwXPn-p7P-lKRkDyUo5UaLQofDQShhXhAiWRSUEpPVw5LOAWC6A-1EaCgYKAYMSARASFQHGX2MitXryB4CZ50ne9u2S8SSURQ0170', NULL, '2024-12-16 00:18:53', '2025-01-04 01:50:32'),
(8, 'pont', NULL, 'pontpont@gmail.com', NULL, '$2y$12$CIeUDVWByRMlwq0tZ4O7Sup3PIvka5hYyK.bYun/ctw0NtXzwN36S', '0622496583', NULL, NULL, 'user', NULL, NULL, NULL, NULL, '2024-12-20 10:20:21', '2024-12-20 10:20:21'),
(9, 'Mg Mg', NULL, 'mgmgcustomer@gmail.com', NULL, '$2y$12$ebX2xT8nxP9uNYxeuSUI3el6frmdZdnSN8PuwQVgeoG3ciaIVSbAe', '0622496583', 'Yangon', '676986c799328images (7).jpg', 'user', NULL, NULL, NULL, NULL, '2024-12-21 23:47:23', '2024-12-23 10:59:41'),
(10, 'thaw', NULL, 'thaw12345@gmail.com', NULL, '$2y$12$R3uI4rvHBj/v259x6eOuruTvJz36RvCVxsIAWOYQRqmpcvg9Z2mqy', '123456987', NULL, NULL, 'user', NULL, NULL, NULL, NULL, '2024-12-24 02:01:15', '2024-12-24 02:01:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_logs`
--
ALTER TABLE `action_logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `action_logs`
--
ALTER TABLE `action_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_histories`
--
ALTER TABLE `payment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
