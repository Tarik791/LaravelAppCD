-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2022 at 05:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_cd_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `quantity`, `price`, `image`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(46, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 'Verbatim Blu-Ray disc 6x 25gb BD-R', '10', '270', '1665662771.jpg', '10', '3', '2022-10-13 13:11:37', '2022-10-13 13:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(10, 'CD\'s', '2022-10-13 09:52:21', '2022-10-13 09:52:21'),
(11, 'VCD\'s', '2022-10-13 10:02:41', '2022-10-13 10:02:41'),
(12, 'DVD\'s', '2022-10-13 10:07:28', '2022-10-13 10:07:28'),
(13, 'Tapes', '2022-10-13 10:09:39', '2022-10-13 10:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_10_07_221712_create_sessions_table', 1),
(7, '2022_10_09_082337_create_categories_table', 2),
(8, '2022_10_09_101338_create_products_table', 3),
(9, '2022_10_09_170633_create_carts_table', 4),
(10, '2022_10_10_203429_create_orders_table', 5),
(11, '2022_10_11_223238_create_notifications_table', 6),
(12, '2022_10_12_134027_create_comments_table', 7),
(13, '2022_10_12_134039_create_replies_table', 7),
(14, '2022_10_12_162124_create_contact_us_table', 8),
(15, '2022_10_12_211206_create_locations_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `lng`, `lat`, `created_at`, `updated_at`) VALUES
(37, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Sony CD-RW 4x 700mb description', '10', '250', '1665662370.jpg', 9, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 10:00:48', '2022-10-13 10:00:48'),
(38, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Sony CD-RW 4x 700mb description', '10', '250', '1665662370.jpg', 9, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 10:00:48', '2022-10-13 10:00:48'),
(39, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Sony CD-RW 4x 700mb description', '10', '250', '1665662370.jpg', 9, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 10:01:23', '2022-10-13 10:01:23'),
(40, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'CD-R 52X 700MB/80Min Branded Logo Blank Media Recordable Data Disc', '20', '340', '1665663135.jpg', 12, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 11:54:33', '2022-10-13 11:54:33'),
(41, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Sony CD-RW 4x 700mb description', '10', '250', '1665662370.jpg', 9, 'Paid', 'Delivered', NULL, NULL, '2022-10-13 11:54:33', '2022-10-13 13:33:28'),
(42, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Sony CD-RW 4x 700mb description', '10', '250', '1665662370.jpg', 9, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 12:03:20', '2022-10-13 12:03:20'),
(43, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Verbatim Blu-Ray disc 6x 25gb BD-R', '10', '270', '1665662771.jpg', 10, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 12:03:20', '2022-10-13 12:03:20'),
(44, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Sony CD-RW 4x 700mb description', '10', '250', '1665662370.jpg', 9, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 12:06:29', '2022-10-13 12:06:29'),
(45, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Verbatim DVD+R 4.7GB 16X IJP 50pk Spindle [43512]', '20', '370', '1665663354.jpg', 14, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 12:24:18', '2022-10-13 12:24:18'),
(46, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Verbatim Blu-Ray disc 6x 25gb BD-R', '18', '4860', '1665662771.jpg', 10, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 12:47:32', '2022-10-13 12:47:32'),
(47, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Sony DVD-R 1X 4.7GB Media DVD, 50-Disc', '20', '300', '1665662950.jpg', 11, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 12:47:32', '2022-10-13 12:47:32'),
(48, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'CD-R 52X 700MB/80Min Branded Logo Blank Media Recordable Data Disc', '20', '340', '1665663135.jpg', 12, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 12:47:32', '2022-10-13 12:47:32'),
(49, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Verbatim Blu-Ray disc 6x 25gb BD-R', '10', '270', '1665662771.jpg', 10, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 12:48:37', '2022-10-13 12:48:37'),
(50, 'Tarik', 'terzotarik@gmail.com', '13214124', 'Doglodi', 3, 'Sony DVD-R 1X 4.7GB Media DVD, 50-Disc', '20', '300', '1665662950.jpg', 11, 'cash on delivery', 'processing', NULL, NULL, '2022-10-13 12:48:37', '2022-10-13 12:48:37');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `category`, `quantity`, `price`, `discount_price`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Sony CD-RW 4x 700mb description', 'The Sony CD-RW Rewritable 700MB, 80 Minute Recordable Disc is a rewritable disc that provides 700MB of data storage or 80 minutes of audio recording time archiving, backing up, and distributing computer data. The discs are compatible for playback on CD-ROM, audio CD players and photo CDs.', '1665662370.jpg', 'CD\'s', '10', '250', '150', 'Tarik', 1, '2022-10-13 09:59:30', '2022-10-13 09:59:37'),
(10, 'Verbatim Blu-Ray disc 6x 25gb BD-R', 'Verbatim Blu-ray Recordable Disc is designed to store large HD video, audio files and can handle up to 1080p resolution video. Discs use blue-violet laser technology to write data and have a storage capacity of 25GB, allowing you to use fewer discs while backing up or duplicating HD digital recordings.', '1665662771.jpg', 'VCD\'s', '10', '270', NULL, 'Tarik', 1, '2022-10-13 10:06:11', '2022-10-13 10:06:19'),
(11, 'Sony DVD-R 1X 4.7GB Media DVD, 50-Disc', 'This DVD+R 4.7GB Recordable Media Spindle from Sony contains 50 discs which can hold 4.7 GB of data and are compatible for playback with most DVD video players and DVD-ROM PC drives. Each disc is capable of 1-16x write speed and can be used to store video, audio, photos, multimedia and other data files.', '1665662950.jpg', 'DVD\'s', '20', '300', '100', 'Tarik', 1, '2022-10-13 10:09:10', '2022-10-13 10:09:26'),
(12, 'CD-R 52X 700MB/80Min Branded Logo Blank Media Recordable Data Disc', 'Imation 4x CD-RW is a great solution for your data organization needs. Whether its for temporary storage, presentations, backups, downloads or archiving, this highly reliable media features the convenience of rewritability, noise-free playback and is highly compatible with all CD-RW drives.', '1665663135.jpg', 'Tapes', '20', '340', '50', 'Tarik', 1, '2022-10-13 10:12:15', '2022-10-13 10:12:22'),
(13, 'Moserbaer Dvd+R 5 Pack Jewel Case [12065_3_12]', 'Note: Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', '1665663276.', 'DVD\'s', '25', '150', NULL, 'Tarik', 1, '2022-10-13 10:14:36', '2022-10-13 10:17:39'),
(14, 'Verbatim DVD+R 4.7GB 16X IJP 50pk Spindle [43512]', 'Note: Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', '1665663354.jpg', 'CD\'s', '20', '370', NULL, 'Tarik', 1, '2022-10-13 10:15:54', '2022-10-13 10:17:29'),
(15, 'Verbatim 700MB 4X-12X High Speed CD-RW with Branded Surface (25 PK Spindle)', 'When it comes to CD Technology, Verbatim rewrote the book.Verbatim CDRW is the industry standard for performance, compatibility, and the ultimate in reliability. Verbatim CDRW utilizes an advanced super-eutectic phase change recording layer which ensures durability and reliability while archiving data at higher rewrite speeds. These discs allow you to rewrite data without errors up to 1,000 times. All backed by a Verbatim Limited Lifetime Warranty. More from the Manufacturer', '1665663424.jpg', 'VCD\'s', '20', '250', '50', 'Tarik', 1, '2022-10-13 10:17:04', '2022-10-13 10:17:15'),
(16, 'Computer tape', 'A tape is a magnetically thin coated piece of plastic wrapped around wheels capable of storing data. Tape is less expensive than other storage mediums, but also much slower because it is sequential access and is often used for backing up large amounts of data.', '1665663666.jpg', 'Tapes', '20', '450', '140', 'Tarik', 1, '2022-10-13 10:21:06', '2022-10-13 10:24:46'),
(17, 'Imation CD-RW Blank Media', 'Brand: Imation. Type: CD-R. Speed: 52X. Capacity: 700MB. Audio Storage: 80 minutes. Surface: Logo Top. Quantity: 50 Pack. Packing: Plastic Shrink Wrap Note: Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', '1665663742.jpg', 'CD\'s', '20', '160', NULL, 'Tarik', 1, '2022-10-13 10:22:22', '2022-10-13 10:24:39'),
(18, 'Verbatim BD-R 25GB 5Pk Jewel Case 6x Blu Ray [43715]', 'Blu-ray discs were designed for high definition. With their high capacity, Blu-ray discs can record, store and play back large high definition video and audio files. Verbatim Blu-ray discs are compatible with the latest Blu-ray players and writers from the industry’s leading manufacturers, and from a company with 50 years of experience, Verbatim Blu-ray discs come with a Limited Lifetime Warranty and the peace of mind knowing that this is a technology that you can trust.', '1665663852.jpg', 'VCD\'s', '20', '300', NULL, 'Tarik', 1, '2022-10-13 10:24:12', '2022-10-13 10:24:32'),
(19, 'Verbatim DVD+R 4.7GB 16x SP 50 PR- 43512', 'Blu-ray discs were designed for high definition. With their high capacity, Blu-ray discs can record, store and play back large high definition video and audio files. Verbatim Blu-ray discs are compatible with the latest Blu-ray players and writers from the industry’s leading manufacturers, and from a company with 50 years of experience, Verbatim Blu-ray discs come with a Limited Lifetime Warranty and the peace of mind knowing that this is a technology that you can trust.', '1665663988.jpg', 'VCD\'s', '20', '250', NULL, 'Tarik', 1, '2022-10-13 10:26:28', '2022-10-13 10:28:08'),
(20, 'DVD-R 47 5 Pack 10mm Jewel Case', 'Maxell DVD-R discs are ideal for recording data, text, video, photographs and much more. The write-once DVD ensures stored data cannot be altered and is perfect for archving files of importance. They feature a recording capacity of up to 4.7GB, 120 minutes of video and have a recording speed of up to 16x compatiblity. These single sided discs are durable and well protected against sunlight exposure. Suitable for most DVD players and DVD-ROM drives and recorders that are -R compatible.', '1665664074.jpg', 'DVD\'s', '25', '340', '100', 'Tarik', 1, '2022-10-13 10:27:54', '2022-10-13 10:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('a0UvexUi645VbQtoZUjDQ6udJPLByw7teaRFNmhq', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTUlySTByTE5rV0RaeHdDeUNGY2YzWW9rYTBETXhjUzhHMkxMU2N1MiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWRpcmVjdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1665675426);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Tarii', 'terzootarik@gmail.com', '0', '1234', 'Doglodi', NULL, '$2y$10$7s1VTjCMvarkcX7VErXp5uitYcgqXM.zfQzjtiyfLBi7F6EjACZMe', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-07 20:31:42', '2022-10-07 20:31:42'),
(2, 'admin', 'admin@gmail.com', '1', '1234', 'Doglodi', '2022-10-11 19:58:11', '$2y$10$4t8mnCc9bKRHwv8aOtZrpu8/MHGO0ohmvypEREpjL0SC2rYDSkTtK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-07 20:32:52', '2022-10-07 20:32:52'),
(3, 'Tarik', 'terzotarik@gmail.com', '0', '13214124', 'Doglodi', '2022-10-11 19:58:11', '$2y$10$wCorCFEdVGbPVol8vVXr5.XfV7TfcJ7SrgPRzkjoZH1CAWUA0kwD2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-11 19:57:02', '2022-10-12 18:15:53'),
(4, 'Tarikkk', 'tarikterzo@gmail.com', '0', '13214124', 'Doglodi', '2022-10-11 20:02:41', '$2y$10$qkm6e158KjQ5mfwfB6MVO.e0t0oS88bLf4X3065x6OVJ7SSBqmY2i', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-11 20:01:01', '2022-10-11 20:02:41');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
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
