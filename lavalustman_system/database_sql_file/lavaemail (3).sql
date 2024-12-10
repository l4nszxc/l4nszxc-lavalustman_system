-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2024 at 09:31 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavaemail`
--

-- --------------------------------------------------------

--
-- Table structure for table `flashcards`
--

CREATE TABLE `flashcards` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('draft','posted') COLLATE utf8mb4_general_ci DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flashcards`
--

INSERT INTO `flashcards` (`id`, `user_id`, `category`, `title`, `created_at`, `status`) VALUES
(13, 33, 'Soc Sci 114', 'hello', '2024-12-11 03:29:57', 'posted'),
(16, 33, 'ITC 311', 'dasdas', '2024-12-11 04:16:04', 'draft'),
(17, 33, 'ITP 312', 'hii', '2024-12-11 04:16:19', 'posted');

-- --------------------------------------------------------

--
-- Table structure for table `flashcard_items`
--

CREATE TABLE `flashcard_items` (
  `id` int NOT NULL,
  `flashcard_id` int NOT NULL,
  `question` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flashcard_items`
--

INSERT INTO `flashcard_items` (`id`, `flashcard_id`, `question`, `answer`, `created_at`) VALUES
(29, 17, 'will u marry me?', 'no', '2024-12-11 04:55:57'),
(30, 17, 'u want ice cream?', 'yes', '2024-12-11 04:55:57'),
(31, 13, 'yoww', 'hahah', '2024-12-11 05:29:33'),
(32, 13, 'dsad', 'sadas', '2024-12-11 05:29:33'),
(33, 13, 'hello', 'hii', '2024-12-11 05:29:33'),
(34, 13, 'das', 'dasdsa', '2024-12-11 05:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reset_token` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `flashcard_id` int NOT NULL,
  `score` int NOT NULL,
  `total_questions` int NOT NULL,
  `completed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `flashcard_id`, `score`, `total_questions`, `completed_at`) VALUES
(1, 33, 17, 0, 2, '2024-12-11 05:26:23'),
(2, 33, 17, 0, 2, '2024-12-11 05:26:50'),
(3, 33, 17, 0, 2, '2024-12-11 05:26:55'),
(4, 33, 17, 0, 2, '2024-12-11 05:27:00'),
(5, 33, 17, 0, 2, '2024-12-11 05:27:30'),
(6, 33, 17, 0, 2, '2024-12-11 05:28:57'),
(7, 33, 17, 0, 2, '2024-12-11 05:29:01'),
(8, 33, 17, 0, 2, '2024-12-11 05:29:07'),
(9, 33, 13, 0, 4, '2024-12-11 05:29:51'),
(10, 33, 13, 0, 4, '2024-12-11 05:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `registervf`
--

CREATE TABLE `registervf` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registervf`
--

INSERT INTO `registervf` (`id`, `email`, `reset_token`, `created_on`) VALUES
(24, 'lanslorence@gmail.com', 'RfPjhvOxIn', '2024-12-10 14:54:33'),
(25, 'hernandezlanslorence@gmail.com', 'xevntFGECs', '2024-12-10 17:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int NOT NULL,
  `user_id` int NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `session_data` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `browser`, `ip`, `session_data`, `created_at`) VALUES
(24, 30, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '::1', '28b0370bc4abadafad937c16874ccc14b252dbac9e76660f2731cf9ecc0fb59c', '2024-11-21 19:44:31'),
(25, 32, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', 'ebbe3977d652c23bbc933371e78229bcb5a0ae427789b1ee0d533a53df2245d8', '2024-12-10 22:35:04'),
(40, 33, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '127.0.0.1', '4611fac4ab672686d2660b42590669fc4a030841a95d780600965a0a3f696043', '2024-12-11 02:43:12'),
(44, 33, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '127.0.0.1', 'e6f2b313e41fd4f23328522f2cd89d7d053d76327f5e5cc4da2872ffb63c023a', '2024-12-11 04:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_oauth_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_token`, `email_verified_at`, `password`, `remember_token`, `google_oauth_id`, `created_at`, `updated_at`) VALUES
(33, 'L4nszxc_09', 'lanslorence@gmail.com', '4187ce80db37be6cd2780bd821a0e0926080f4bdce447830de4c145e021e76e01c3ea78b9003afd0d30bb311f5f1aedb933e', NULL, '$2y$04$nUi755fWYl/anrER.VAxketnBBwskzdM4oK.AIpc7SLFyPJNmNagq', NULL, NULL, '2024-12-10 14:54:33', NULL),
(34, 'L4nszxc_', 'hernandezlanslorence@gmail.com', '523d69f4e8dff11c6113a87d826ae45bb4d31f881b2bcd799a12256dbe7ff20dc7504e3bc0c2f21fd95d8852f40a89eba00f', NULL, '$2y$04$fV40md9gZ/9ZD6j7IegEa./sJGWumwyAnVY3vSOVkBz4t7pa122hy', NULL, NULL, '2024-12-10 17:01:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `flashcard_items`
--
ALTER TABLE `flashcard_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flashcard_id` (`flashcard_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flashcard_id` (`flashcard_id`);

--
-- Indexes for table `registervf`
--
ALTER TABLE `registervf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `flashcard_items`
--
ALTER TABLE `flashcard_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registervf`
--
ALTER TABLE `registervf`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD CONSTRAINT `flashcards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `flashcard_items`
--
ALTER TABLE `flashcard_items`
  ADD CONSTRAINT `flashcard_items_ibfk_1` FOREIGN KEY (`flashcard_id`) REFERENCES `flashcards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quiz_results_ibfk_2` FOREIGN KEY (`flashcard_id`) REFERENCES `flashcards` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
