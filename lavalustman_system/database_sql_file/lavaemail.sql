-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 03:36 PM
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
-- Database: `lavaemail`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reset_token` varchar(10) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registervf`
--

CREATE TABLE `registervf` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registervf`
--

INSERT INTO `registervf` (`id`, `email`, `reset_token`, `created_on`) VALUES
(21, 'normanrivera005@gmail.com', 'QYNFjwvSIs', '2024-11-21 11:43:31'),
(22, 'nor@gmail.com', 'EWdwQozOij', '2024-11-27 06:04:18'),
(23, 'malakas@gmail.com', '8J9I7y3Fc2', '2024-12-10 14:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `ip` varchar(60) NOT NULL,
  `session_data` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `browser`, `ip`, `session_data`, `created_at`) VALUES
(24, 30, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '::1', '28b0370bc4abadafad937c16874ccc14b252dbac9e76660f2731cf9ecc0fb59c', '2024-11-21 19:44:31'),
(25, 32, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', 'ebbe3977d652c23bbc933371e78229bcb5a0ae427789b1ee0d533a53df2245d8', '2024-12-10 22:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_token` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `google_oauth_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_token`, `email_verified_at`, `password`, `remember_token`, `google_oauth_id`, `created_at`, `updated_at`) VALUES
(30, 'Soseyj', 'normanrivera005@gmail.com', '2e10aba1cf51a902d960503b2a948c5f6b6fdb0055a23ab2a5085869751979b9f134b4067a0434553bf60e43bdb104b5366c', NULL, '$2y$04$SshXIEle7CJcmPh8YCrcx.DNyIQxICjt9KhqYSjwuQFTy00Qd.9Ce', NULL, NULL, '2024-11-21 11:43:31', NULL),
(31, 'manman', 'nor@gmail.com', '7295f89c61f8689f1f8b41158d0fe1eb993b49afd033818325788987e6b120837fec322ecfaee66515cb2de280a50f2e3aef', NULL, '$2y$04$ShvWaulVPodieYMjZsZS/eFBV7S9v7acdkC6a9ZUEzC8mEWhDoMzG', NULL, NULL, '2024-11-27 06:04:18', NULL),
(32, 'Malakas', 'malakas@gmail.com', 'fd7c947ff1269c070df169425ba478525d020c51e238389ff78e78255ae4ac5f14ec2443bd8a7f7f47f20d7ca25e1def5a43', NULL, '$2y$04$WexMs0OR84TOvxkIeMTW4Oi772EgzQ9CmLc.MGl84fcCwzP/8qkj6', NULL, NULL, '2024-12-10 14:33:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registervf`
--
ALTER TABLE `registervf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
