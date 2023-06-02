-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 11:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kathlyn Gleichner', '2023-05-30 09:35:13', '2023-05-30 09:35:13'),
(2, 'Marisa Will', '2023-05-30 09:35:13', '2023-05-30 09:35:13'),
(3, 'Louie Hyatt', '2023-05-30 09:35:13', '2023-05-30 09:35:13'),
(4, 'Amalia Hartmann', '2023-05-30 09:35:13', '2023-05-30 09:35:13'),
(5, 'Bella Kris', '2023-05-30 09:35:13', '2023-05-30 09:35:13'),
(6, 'Otho Carroll Sr.', '2023-05-30 09:35:13', '2023-05-30 09:35:13'),
(7, 'Dr. Mehdi', '2023-05-30 09:35:13', '2023-05-30 13:09:19'),
(10, 'Chasity Mills', '2023-05-30 09:35:13', '2023-05-30 09:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `author` text NOT NULL,
  `category` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `publisher`, `author`, `category`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Master PHP', 'Eligendi.', 'Marisa Will', 'Minus.', 1, '2023-05-30 09:41:34', '2023-05-30 11:40:38'),
(3, 'Laravel For Beginners', 'Aut ipsam.', 'Bella Kris', 'Rerum.', 1, '2023-05-30 09:41:58', '2023-05-30 12:09:48'),
(4, 'PHP & Laravel: Zero to Hero', 'Aut ipsam.', 'Dr. Aidan Ledner V', 'Deleniti.', 0, '2023-05-30 09:42:27', '2023-05-30 12:03:25'),
(5, 'Book', 'Ofogh', 'Kathlyn Gleichner', 'Minus.', 0, '2023-05-30 13:10:37', '2023-05-30 13:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `book_issues`
--

CREATE TABLE `book_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_issues`
--

INSERT INTO `book_issues` (`id`, `student_name`, `book_name`, `student_id`, `book_id`, `created_at`, `updated_at`) VALUES
(6, 'Zora Schoen', 'PHP & Laravel: Zero to Hero', 17, 4, '2023-05-30 12:03:25', '2023-05-30 12:03:25'),
(7, 'Mehdi Saadi', 'Book', 1, 5, '2023-05-30 13:12:15', '2023-05-30 13:12:15');

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
(1, 'Soluta.', '2023-05-30 09:36:06', '2023-05-30 09:36:06'),
(2, 'Minus.', '2023-05-30 09:36:06', '2023-05-30 09:36:06'),
(3, 'PHP', '2023-05-30 09:36:06', '2023-05-30 13:09:48'),
(5, 'Rerum.', '2023-05-30 09:36:06', '2023-05-30 09:36:06');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_25_110852_create_authors_table', 1),
(7, '2023_05_25_110911_create_publishers_table', 1),
(8, '2023_05_25_111013_create_categories_table', 1),
(9, '2023_05_25_111041_create_books_table', 1),
(10, '2023_05_25_121006_create_students_table', 1),
(11, '2023_05_30_123438_create_book_issues_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Eligendi.', '2023-05-30 09:36:17', '2023-05-30 09:36:17'),
(3, 'Iusto.', '2023-05-30 09:36:17', '2023-05-30 09:36:17'),
(4, 'Aut ipsam.', '2023-05-30 09:36:17', '2023-05-30 09:36:17'),
(5, 'Aliquam.', '2023-05-30 09:36:17', '2023-05-30 09:36:17'),
(6, 'Labore.', '2023-05-30 09:36:17', '2023-05-30 09:36:17'),
(7, 'Delectus.', '2023-05-30 09:36:17', '2023-05-30 09:36:17'),
(8, 'Ofogh', '2023-05-30 09:36:17', '2023-05-30 13:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `address`, `gender`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Mehdi Saadi', '42689 Upton FreewayNew Ethyl, MS 41182', 'male', '09339514886', 'michaela81@yahoo.com', '2023-05-30 09:36:26', '2023-05-30 09:43:21'),
(2, 'Retta Stoltenberg', '4506 Schmidt View Suite 036\nSouth Simeon, ME 21340', 'male', '1-364-316-0628', 'treutel.nelson@bogan.net', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(3, 'Brooke Swaniawski', '5727 Gerlach Mountains\nWest Orphaton, TX 20201-0656', 'male', '(317) 690-0143', 'dhand@hyatt.org', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(4, 'Makenzie Lesch', '39569 Jackson Alley\nIsaiahborough, ID 66285-4021', 'male', '+1-682-694-4350', 'fledner@hotmail.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(5, 'Jaylen Nolan', '679 Bernhard Neck\nWest Lurabury, MS 65203-4343', 'male', '+12696583384', 'ron.lubowitz@yahoo.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(6, 'Imani O\'Keefe', '313 O\'Keefe Forks\nNolanfort, DE 15415', 'male', '+1.205.573.1913', 'carolyne.schaefer@oconnell.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(7, 'Emma Ernser', '2914 Walter Forge\nNew Malcolm, NY 77694-5991', 'male', '801.262.2091', 'zander.oconnell@predovic.net', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(8, 'Grover Wunsch', '385 Hyatt Flat\nNew Ryleeborough, WV 88896', 'male', '(502) 744-6849', 'lmcclure@gmail.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(9, 'Mrs. Jaqueline Dicki', '778 Bernier Flat\nSigridmouth, OH 89862', 'male', '(920) 562-8663', 'berneice.leffler@hegmann.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(10, 'Earnest Farrell DVM', '8589 Lemke Field Apt. 719\nTrevionborough, TN 68625-7260', 'male', '618.206.9904', 'macejkovic.nasir@gleichner.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(11, 'Humberto Kulas', '78253 Alia Walks Apt. 529\nHahntown, GA 50998-1152', 'male', '1-283-964-1393', 'cmcdermott@gmail.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(12, 'Deron Kiehn', '7355 Davis Flats Suite 328\nWest Isabella, DE 58174-2711', 'male', '+12179989188', 'agustina.bode@yahoo.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(13, 'Xavier Dibbert I', '74990 Moen Square\nWest Taniafort, NV 58427-3983', 'male', '813.534.5974', 'nconnelly@hotmail.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(14, 'Efrain Barton', '15054 Imogene Islands\nPaucekview, OR 54790-4818', 'male', '+12193148628', 'atorphy@hotmail.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(15, 'Prof. Clifton Hill Jr.', '25546 Green Square\nEast Elinoreton, MO 66297', 'male', '863-502-0511', 'ihomenick@yahoo.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(16, 'Alexandria Brakus DVM', '48951 Marvin Tunnel\nGeovannyfurt, FL 98273-2202', 'male', '925.573.7635', 'ernesto43@marquardt.com', '2023-05-30 09:36:26', '2023-05-30 09:36:26'),
(17, 'Zora Schoen', '84358 Hand Plains Apt. 416\nTressaville, MN 86212-5444', 'male', '859.657.9866', 'wunsch.carlee@kuhlman.biz', '2023-05-30 09:36:26', '2023-05-30 09:36:26');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mehdi', 'mehdi@gmail.com', '2023-05-30 09:38:23', '$2y$10$rOu/qWc57Yj5HtnYvpzeDug/l7pgkXDM5.YrCosWf7I35BmEYdVW2', 'qtSMbElC8Gg4abOdZ7lBO9CR75Ln5seCSh9pZ3qDQwLL47ry1bKkf4D4cMi8', '2023-05-30 09:37:06', '2023-05-30 13:31:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issues`
--
ALTER TABLE `book_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_issues_student_id_foreign` (`student_id`),
  ADD KEY `book_issues_book_id_foreign` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `publishers_name_unique` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_issues`
--
ALTER TABLE `book_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_issues`
--
ALTER TABLE `book_issues`
  ADD CONSTRAINT `book_issues_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_issues_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
