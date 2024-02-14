-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 07:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instinct_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', 'For reduce pain', '2022-06-11 17:46:05', '2022-06-11 17:49:48'),
(2, 'Category 2', 'Incision right neck', '2022-06-11 17:46:40', '2022-06-11 17:50:29'),
(3, 'Category 3', 'Patient is supine and incision cut on the right neck', '2022-06-11 20:35:44', '2022-06-11 20:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `category_id`, `title`, `author`, `image`, `price`, `short_desc`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'E-Book 1', 'Makara Meng', '165617280941QKibQAIiL.jpg', 200, 'Skeletal System', 'The skeletal system is your body\'s central framework. It consists of bones and connective tissue, including cartilage, tendons, and ligaments. It\'s also called the musculoskeletal system.', '2022-06-25 09:00:09', '2022-06-26 22:29:32'),
(2, 2, 'E-Book 2', 'Makara Meng', '165618021941zZrFcVVbL._SX384_BO1,204,203,200_.jpg', 150, 'Skeletal and Joint System', 'The anatomy of our musculoskeletal system is quite complex. It consists of a large number of tendons, ligaments, bones, cartilage, joints, and bursae. We are able to control our muscles by sending stimulating impulses via nerves from our brain.', '2022-06-25 09:00:59', '2022-06-25 11:03:39'),
(3, 1, 'E-Book 3', 'Author 2', '165617335171cD4lvKZ0L.jpg', 250, 'Muscle Anatomy', 'Muscles are soft tissues. Many stretchy fibers make up your muscles. You have more than 600 muscles in your body. Different types of muscles have different jobs. Some muscles help you run, jump or perform delicate tasks like threading a needle.', '2022-06-25 09:01:41', '2022-06-25 09:09:11'),
(4, 3, 'E-Book 4', 'Author 3', '1656307440517biFUBKRL.jpg', 100, 'Skeletal and Muscle System', 'Your musculoskeletal system includes your bones, cartilage, ligaments, tendons and connective tissues. Your skeleton provides a framework for your muscles and other soft tissues. Together, they support your body\'s weight, maintain your posture and help you move.', '2022-06-25 09:03:21', '2022-06-26 22:24:00'),
(5, 1, 'E-Book 5', 'Author 2', '1656173075the-digestive-system-6.jpg', 352, 'Disease of Digestive System', 'Common digestive disorders include gastroesophageal reflux disease, cancer, irritable bowel syndrome, lactose intolerance and hiatal hernia. The most common symptoms of digestive disorders include bleeding, bloating, constipation, diarrhea, heartburn, pain, nausea and vomiting.', '2022-06-25 09:04:35', '2022-06-25 09:04:35'),
(6, 1, 'E-Book 6', 'Makara Meng', '1656173139518FZ6h3KyL._SX359_BO1,204,203,200_.jpg', 89, 'Digestive Physiology', 'Digestion is a form of catabolism or breaking down of substances that involves two separate processes: mechanical digestion and chemical digestion. Mechanical digestion involves physically breaking down food substances into smaller particles to more efficiently undergo chemical digestion.', '2022-06-25 09:05:39', '2022-06-25 09:05:39'),
(7, 1, 'E-Book 7', 'Makara Meng', '165617317745153375._SX318_.jpg', 100, 'Neurology and Anatomy', 'Neuroanatomy is the study of the structure and organization of the nervous system. In contrast to animals with radial symmetry, whose nervous system consists of a distributed network of cells, animals with bilateral symmetry have segregated, defined nervous systems.', '2022-06-25 09:06:17', '2022-06-25 09:06:17'),
(8, 1, 'E-Book 8', 'Makara Meng', '165617323391HeP7EjQ1L.jpg', 225, 'Neurology Physiology', 'Neurophysiology is a branch of the physiology and neuroscience that studies the measurement and evaluation of nervous system function rather than nervous system architecture.', '2022-06-25 09:07:13', '2022-06-25 09:07:13'),
(9, 1, 'E-Book 9', 'Makara Meng', '1656173494item-5124-9781626232167-350x453.jpg', 125, 'Neurosurgery and Anatomy', 'Neurosurgery (or neurological surgery) is the medical specialty concerned with the diagnosis and treatment of disorders which affect any portion of the nervous system including the brain, spinal cord, cerebrovascular system, cranium and spinal column.', '2022-06-25 09:10:24', '2022-06-25 09:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_17_122055_create_categories_table', 1),
(6, '2022_03_21_024819_create_products_table', 1),
(7, '2022_03_24_125255_create_posts_table', 1),
(8, '2022_04_21_115545_create_articles_table', 1),
(9, '2022_06_08_105438_create_posts_premission_table', 1),
(10, '2022_06_14_153542_create_contacts_table', 1),
(11, '2022_06_20_113124_create_order_table', 1),
(15, '2022_06_25_154920_create_ebooks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `author`, `image`, `short_desc`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'Title 1', 'Author 2', '16550210562.4.3 Blood Supply and Lymphatics 3.jpg', 'qweqwee qewqewqewqewq 2', 'qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2', '2022-06-11 18:04:16', '2022-06-27 10:36:05'),
(2, 2, 'Title 2', 'Makara Meng', '1655021083Abnormal root 2.jpg', 'qweqwee qewqewqewqewq 2', 'qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2', '2022-06-11 18:04:43', '2022-06-11 18:04:43'),
(3, 2, 'Title 3', 'Author 2', '1655021134bulma_cap002_thumb.png', 'qweq12131231231231', 'qweqqweqqweqqweqqweqqweqqweqqweq 2131321321321', '2022-06-11 18:05:34', '2022-06-11 18:05:34'),
(4, 1, 'Disc Hernia', 'Author 2', '16551092772.2 open lumbar discectomy.jpg', 'Disc hernia', 'Lumbar Disc hernia', '2022-06-12 18:34:37', '2022-06-12 18:34:37'),
(5, 1, 'Vessel', 'Author 4', '16551093512.4.3 Blood Supply and Lymphatics 4.jpg', 'Vessel of spine', 'Vessel ,Vessel ,Vessel ,Vessel ,Vessel ,Vessel ,Vessel.', '2022-06-12 18:35:51', '2022-06-12 18:35:51'),
(6, 2, 'Title 1', 'Author 2', '1655146044download (1).jfif', 'qweqwee qewqewqewqewq 2', 'qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2', '2022-06-11 18:04:16', '2022-06-13 04:47:24'),
(7, 2, 'Title 2', 'Makara Meng', '1655146055download (2).jfif', 'qweqwee qewqewqewqewq 2', 'qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2', '2022-06-11 18:04:43', '2022-06-13 04:47:35'),
(8, 2, 'Title 3', 'Author 2', '1655146064download (3).jfif', 'qweq12131231231231', 'qweqqweqqweqqweqqweqqweqqweqqweq 2131321321321', '2022-06-11 18:05:34', '2022-06-13 04:47:44'),
(9, 1, 'Disc Hernia', 'Author 2', '1655146073download (4).jfif', 'Disc hernia', 'Lumbar Disc hernia', '2022-06-12 18:34:37', '2022-06-13 04:47:53'),
(10, 1, 'Vessel', 'Author 4', '1655146091download.jfif', 'Vessel of spine', 'Vessel ,Vessel ,Vessel ,Vessel ,Vessel ,Vessel ,Vessel.', '2022-06-12 18:35:51', '2022-06-13 04:48:11'),
(11, 3, 'Title 1', 'Author 2', '1655146102images (1).jfif', 'qweqwee qewqewqewqewq 2', 'qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2', '2022-06-11 18:04:16', '2022-06-13 04:48:22'),
(12, 3, 'Title 2', 'Makara Meng', '1655146119images (3).jfif', 'qweqwee qewqewqewqewq 2', 'qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2', '2022-06-11 18:04:43', '2022-06-13 04:48:39'),
(13, 3, 'Title 3', 'Author 2', '1655146131images (4).jfif', 'qweq12131231231231', 'qweqqweqqweqqweqqweqqweqqweqqweq 2131321321321', '2022-06-11 18:05:34', '2022-06-13 04:48:51'),
(14, 3, 'Disc Hernia', 'Author 2', '1655146148images (5).jfif', 'Disc hernia', 'Lumbar Disc hernia', '2022-06-12 18:34:37', '2022-06-13 04:49:08'),
(15, 3, 'Vessel', 'Author 4', '1655146163images (6).jfif', 'Vessel of spine', 'Vessel ,Vessel ,Vessel ,Vessel ,Vessel ,Vessel ,Vessel.', '2022-06-12 18:35:51', '2022-06-13 04:49:23'),
(16, 3, 'Title 1', 'Author 2', '1655146172images (7).jfif', 'qweqwee qewqewqewqewq 2', 'qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2', '2022-06-11 18:04:16', '2022-06-13 04:49:32'),
(17, 3, 'Title 2', 'Makara Meng', '1655146195images (8).jfif', 'qweqwee qewqewqewqewq 2', 'qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2qweqwee qewqewqewqewq 2', '2022-06-11 18:04:43', '2022-06-13 04:49:55'),
(18, 2, 'Title 3', 'Author 2', '1655146184images (9).jfif', 'qweq12131231231231', 'qweqqweqqweqqweqqweqqweqqweqqweq 2131321321321', '2022-06-11 18:05:34', '2022-06-13 04:49:44'),
(19, 3, 'Disc Hernia', 'Author 2', '1655146206images.jfif', 'Disc hernia', 'Lumbar Disc hernia', '2022-06-12 18:34:37', '2022-06-13 04:50:06'),
(20, 3, 'Vessel', 'Author 4', '1655146242images (10).jfif', 'Vessel of spine', 'Vessel ,Vessel ,Vessel ,Vessel ,Vessel ,Vessel ,Vessel.', '2022-06-12 18:35:51', '2022-06-13 04:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `posts_premission`
--

CREATE TABLE `posts_premission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Samsung Galaxy', 'Samsung Brand', 'https://dummyimage.com/200x300/000/fff&text=Samsung', '100.00', '2022-06-25 08:39:48', '2022-06-25 08:39:48'),
(2, 'Apple iPhone 12', 'Apple Brand', 'https://dummyimage.com/200x300/000/fff&text=Iphone', '500.00', '2022-06-25 08:39:48', '2022-06-25 08:39:48'),
(3, 'Google Pixel 2 XL', 'Google Pixel Brand', 'https://dummyimage.com/200x300/000/fff&text=Google', '400.00', '2022-06-25 08:39:48', '2022-06-25 08:39:48'),
(4, 'LG V10 H800', 'LG Brand', 'https://dummyimage.com/200x300/000/fff&text=LG', '200.00', '2022-06-25 08:39:48', '2022-06-25 08:39:48'),
(5, 'Samsung Note22', 'Samsung Brand', 'https://dummyimage.com/200x300/000/fff&text=Note 22', '800.00', '2022-06-25 08:39:48', '2022-06-25 08:39:48'),
(6, 'Apple iPhone 13', 'Apple Brand', 'https://dummyimage.com/200x300/000/fff&text=Iphone 13', '500.00', '2022-06-25 08:39:48', '2022-06-25 08:39:48'),
(7, 'Google Pixel 22', 'Google Pixel Brand', 'https://dummyimage.com/200x300/000/fff&text=Google22', '600.00', '2022-06-25 08:39:48', '2022-06-25 08:39:48'),
(8, 'LG V10 8800', 'LG Brand', 'https://dummyimage.com/200x300/000/fff&text=LG8800', '500.00', '2022-06-25 08:39:48', '2022-06-25 08:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ebooks_category_id_foreign` (`category_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `posts_premission`
--
ALTER TABLE `posts_premission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_premission_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts_premission`
--
ALTER TABLE `posts_premission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD CONSTRAINT `ebooks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `posts_premission`
--
ALTER TABLE `posts_premission`
  ADD CONSTRAINT `posts_premission_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
