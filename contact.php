-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2025 at 10:16 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `published_date` timestamp NULL,
  PRIMARY KEY (`article_id`),
  KEY `category_id` (`category_id`),
  KEY `author_id` (`author_id`)
);

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `content`, `image_url`, `category_id`, `author_id`, `published_date`) VALUES
(1, 'New Technology Breakthrough', 'Lorem ipsum dolor sit amet...', '/news/uploads/68a1a041d3867_bird-colorful-logo-gradient-vector_343694-1365.avif', 2, 1, '2025-08-11 08:49:21'),
(2, 'Election Results Announced', 'Lorem ipsum dolor sit amet...', '/news/uploads/68a1a03204d82_bird-colorful-logo-gradient-vector_343694-1365.avif', 1, 1, '2025-08-11 08:49:21'),
(3, 'World Cup Finals', 'Lorem ipsum dolor sit amet...', '/news/uploads/68a1a047d5fc5_bird-colorful-logo-gradient-vector_343694-1365.avif', 3, 2, '2025-08-11 08:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
);

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'سياسة'),
(2, 'تكنولوجيا'),
(3, 'رياضة'),
(4, 'ترفيه'),
(5, 'اعمال'),
(6, 'صحة');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `article_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `comment_text` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`)
);

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `article_id`, `user_id`, `comment_text`, `timestamp`) VALUES
(4, 1, 1, 'fdbdfbdf', '2025-08-17 10:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$TkvPICsBxRW.ZUgVN67aVOYSoJXLTkN3.Lt9GUuXM2XQ5lIHWkIpa', 'admin', '2025-08-11 08:49:21'),
(2, 'user1', 'user1@example.com', '$2y$10$TkvPICsBxRW.ZUgVN67aVOYSoJXLTkN3.Lt9GUuXM2XQ5lIHWkIpa', 'admin', '2025-08-11 08:49:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;