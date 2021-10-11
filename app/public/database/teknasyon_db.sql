-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: mysql
-- Üretim Zamanı: 11 Eki 2021, 19:11:57
-- Sunucu sürümü: 8.0.26
-- PHP Sürümü: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `teknasyon_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE DATABASE teknasyon_db;
USE teknasyon_db;

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category` varchar(500) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(8, 'Ekledim', '', ''),
(15, 'Deneem', '04-10-2021-12:47', '04-10-2021-12:47'),
(16, 'Falan', '04-10-2021-03:20', '04-10-2021-03:20'),
(17, 'Filan', '04-10-2021-03:20', '04-10-2021-03:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `new_id` int NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approve` int NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `new_id`, `comment`, `approve`, `created_at`, `updated_at`) VALUES
(2, 0, 173, 'Tamam dedim', 0, '10-10-2021:56', '10-10-2021:56'),
(3, 0, 173, 'sadasdas', 0, '10-10-2021:57', '10-10-2021:57'),
(4, 40, 173, 'sadasdas', 0, '10-10-2021:59', '10-10-2021:59'),
(5, 40, 173, 'sadasdas', 0, '10-10-2021:59', '10-10-2021:59'),
(6, 40, 173, 'sadasdas', 0, '10-10-2021:02', '10-10-2021:02'),
(7, 0, 169, 'dfsf', 0, '10-10-2021:03', '10-10-2021:03'),
(8, 0, 169, 'dfsf', 0, '10-10-2021:05', '10-10-2021:05'),
(9, 41, 165, 'Anonim kullanıcı yorumu...', 0, '10-10-2021:07', '10-10-2021:07'),
(10, 0, 165, 'Anonim kullanıcı yorumu...', 0, '10-10-2021:08', '10-10-2021:08'),
(11, 0, 164, 'Hadi oldu diyelim :)', 0, '10-10-2021:24', '10-10-2021:24'),
(12, 0, 164, 'Hadi oldu diyelim :)', 0, '10-10-2021:25', '10-10-2021:25'),
(13, 0, 172, 'sdadas', 1, '10-10-2021:26', '10-10-2021:26'),
(14, 0, 172, 'sdadas', 1, '10-10-2021:26', '10-10-2021:26'),
(15, 0, 172, 'zxcxzcxz', 0, '10-10-2021:26', '10-10-2021:26'),
(16, 0, 172, 'sdfdsfsaf', 0, '10-10-2021:27', '10-10-2021:27'),
(17, 0, 172, 'ffsdfsdfs', 0, '10-10-2021:30', '10-10-2021:30'),
(18, 0, 172, 'sfsdfds', 0, '10-10-2021:35', '10-10-2021:35'),
(19, 0, 172, 'oldu mu?', 1, '10-10-2021:37', '10-10-2021:27'),
(20, 0, 165, 'Bu yorum benden', 1, '10-10-2021:35', '10-10-2021:35'),
(21, 41, 165, 'Bu yorum da benden :)', 1, '10-10-2021:36', '10-10-2021:36'),
(22, 0, 169, 'benim yorumum anponim', 1, '11-10-2021:40', '11-10-2021:49'),
(23, 48, 169, 'bu yorum tekrar anonim', 1, '11-10-2021:46', '11-10-2021:48'),
(24, 0, 169, 'bu yorum tekrar anonim-2', 1, '11-10-2021:47', '11-10-2021:48'),
(25, 0, 169, 'bu yorum tekrar anonim-2', 1, '11-10-2021:47', '11-10-2021 02:57'),
(26, 0, 169, 'anm olrk yrm ypld', 1, '11-10-2021  02', '11-10-2021 02:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment_history`
--

CREATE TABLE `comment_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `new_id` int NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `editor_categories`
--

CREATE TABLE `editor_categories` (
  `id` int NOT NULL,
  `editor_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `editor_categories`
--

INSERT INTO `editor_categories` (`id`, `editor_id`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 37, 17, '04-10-2021:57', '04-10-2021:57'),
(6, 37, 16, '04-10-2021:58', '04-10-2021:58'),
(7, 36, 15, '04-10-2021:20', '04-10-2021:20'),
(9, 38, 8, '06-10-2021:18', '06-10-2021:18'),
(10, 38, 16, '06-10-2021:05', '06-10-2021:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `editor_update_time`
--

CREATE TABLE `editor_update_time` (
  `id` int NOT NULL,
  `time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `editor_update_time`
--

INSERT INTO `editor_update_time` (`id`, `time`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `category` int NOT NULL,
  `img` varchar(500) NOT NULL,
  `published` int NOT NULL,
  `created_at` varchar(500) NOT NULL,
  `updated_at` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `user_id`, `title`, `content`, `category`, `img`, `published`, `created_at`, `updated_at`) VALUES
(99, 41, '--Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '29-09-2021-03:13', '06-10-2021-03:13'),
(100, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '30-09-2021-03:13', '06-10-2021-03:13'),
(101, 41, 'xEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '10-10-2021-03:13', '06-10-2021-03:13'),
(102, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(103, 38, 'rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(105, 38, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 0, '06-10-2021-03:13', '06-10-2021-07:57'),
(115, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1872346704.jpg', 0, '06-10-2021-09:23', '06-10-2021-09:23'),
(116, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1503030511.jpg', 1, '06-10-2021-09:24', '06-10-2021-09:24'),
(117, 41, '--Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '29-09-2021-03:13', '06-10-2021-03:13'),
(118, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '30-09-2021-03:13', '06-10-2021-03:13'),
(119, 41, 'xEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(120, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(121, 38, 'rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(122, 38, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 0, '06-10-2021-03:13', '06-10-2021-07:57'),
(123, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1872346704.jpg', 0, '06-10-2021-09:23', '06-10-2021-09:23'),
(124, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1503030511.jpg', 1, '06-10-2021-09:24', '06-10-2021-09:24'),
(125, 41, '--Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '29-09-2021-03:13', '06-10-2021-03:13'),
(126, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '30-09-2021-03:13', '06-10-2021-03:13'),
(127, 41, 'xEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(128, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(129, 38, 'rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(130, 38, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 0, '06-10-2021-03:13', '06-10-2021-07:57'),
(131, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1872346704.jpg', 0, '06-10-2021-09:23', '06-10-2021-09:23'),
(132, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1503030511.jpg', 1, '06-10-2021-09:24', '06-10-2021-09:24'),
(133, 41, '--Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '29-09-2021-03:13', '06-10-2021-03:13'),
(134, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '30-09-2021-03:13', '06-10-2021-03:13'),
(135, 41, 'xEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(136, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(137, 38, 'rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(138, 38, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 0, '06-10-2021-03:13', '06-10-2021-07:57'),
(139, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1872346704.jpg', 0, '06-10-2021-09:23', '06-10-2021-09:23'),
(140, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1503030511.jpg', 1, '06-10-2021-09:24', '06-10-2021-09:24'),
(141, 41, '--Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '29-09-2021-03:13', '06-10-2021-03:13'),
(142, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '30-09-2021-03:13', '06-10-2021-03:13'),
(143, 41, 'xEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(144, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(145, 38, 'rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(146, 38, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 0, '06-10-2021-03:13', '06-10-2021-07:57'),
(147, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1872346704.jpg', 0, '06-10-2021-09:23', '06-10-2021-09:23'),
(148, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1503030511.jpg', 1, '06-10-2021-09:24', '06-10-2021-09:24'),
(149, 41, '--Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '29-09-2021-03:13', '06-10-2021-03:13'),
(150, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '30-09-2021-03:13', '06-10-2021-03:13'),
(151, 41, 'xEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(152, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(153, 38, 'rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(154, 38, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 0, '06-10-2021-03:13', '06-10-2021-07:57'),
(155, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1872346704.jpg', 0, '06-10-2021-09:23', '06-10-2021-09:23'),
(156, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1503030511.jpg', 1, '06-10-2021-09:24', '06-10-2021-09:24'),
(157, 41, '--Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '29-09-2021-03:13', '06-10-2021-03:13'),
(158, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '30-09-2021-03:13', '06-10-2021-03:13'),
(159, 41, 'xEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(160, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(161, 38, 'rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(162, 38, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 0, '06-10-2021-03:13', '06-10-2021-07:57'),
(163, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1872346704.jpg', 0, '06-10-2021-09:23', '06-10-2021-09:23'),
(164, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1503030511.jpg', 1, '06-10-2021-09:24', '06-10-2021-09:24'),
(165, 41, '--Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '29-09-2021-03:13', '06-10-2021-03:13'),
(166, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '30-09-2021-03:13', '06-10-2021-03:13'),
(167, 41, 'xEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(168, 41, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '06-10-2021-03:13'),
(169, 38, 'rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 1, '06-10-2021-03:13', '11-10-2021-02:46'),
(170, 38, 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 'Email rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been addedEmail rent notification has been added', 8, '/assets/img/1818738482.jpg', 0, '06-10-2021-03:13', '06-10-2021-07:57'),
(171, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1872346704.jpg', 0, '06-10-2021-09:23', '06-10-2021-09:23'),
(172, 38, 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 'DenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDenemeDeneme', 16, '/assets/img/1503030511.jpg', 1, '06-10-2021-09:24', '06-10-2021-09:24'),
(173, 41, 'Kayseri\'nin Bünyan ilçesinde yapılan yol çalışması sırasında elektrik trafosuna yaklaşınca akıma kapılan 21 yaşındaki Ramazan Enes Şimşek, yaşamını yitirdi.', 'Kayseri\'nin Bünyan ilçesinde yapılan yol çalışması sırasında elektrik trafosuna yaklaşınca akıma kapılan 21 yaşındaki Ramazan Enes Şimşek, yaşamını yitirdi.\r\nBünyan ilçesinde yol çalışması yapan taşeron firmada işçi olan Ramazan Enes Şimşek, elektrik trafosuna yaklaşınca akıma kapıldı.TÜM MÜDAHALELERE RAĞMEN HAYATA TUTUNAMADIDiğer işçilerin ihbarı üzerine bölgeye polis ve sağlık ekipleri sevk edildi. Ambulansla Bünyan Devlet Hastanesi\'ne kaldıran Şimşek, doktorların çabasına karşın kurtarılamadı.', 15, '/assets/img/3138210629.jpg', 1, '08-10-2021-02:19', '08-10-2021-02:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news_history`
--

CREATE TABLE `news_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `new_id` int NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `news_history`
--

INSERT INTO `news_history` (`id`, `user_id`, `new_id`, `created_at`) VALUES
(1, 40, 173, '10-10-2021:40'),
(2, 40, 172, '10-10-2021:40'),
(3, 41, 165, '10-10-2021:58'),
(4, 41, 167, '10-10-2021:58'),
(5, 40, 173, '10-10-2021:35'),
(6, 41, 173, '10-10-2021:36'),
(7, 41, 173, '10-10-2021:21'),
(8, 41, 173, '10-10-2021:24'),
(9, 40, 173, '10-10-2021:57'),
(10, 41, 165, '10-10-2021:05'),
(11, 41, 165, '10-10-2021:06'),
(12, 41, 165, '10-10-2021:06'),
(13, 41, 165, '10-10-2021:07'),
(14, 40, 173, '10-10-2021:35'),
(15, 41, 165, '10-10-2021:35'),
(16, 41, 165, '10-10-2021:36'),
(17, 48, 169, '11-10-2021:40'),
(18, 48, 168, '11-10-2021:41'),
(19, 48, 169, '11-10-2021:46'),
(20, 48, 169, '11-10-2021:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `type`, `token`, `created_at`, `updated_at`) VALUES
(0, 'Anonim', 'Kullanıcı', '', '', '', '', '', ''),
(10, 'Mesut', 'Yilmaz', 'mesutyilmaz1993@gmail.com', '11223344', '2', '1213134', '03-10-2021-08:16', '04-10-2021-01:45'),
(24, 'Mesut', 'Yilmaz', 'adasd2@gmail.com', '11223344', '1', '03123154654', '03-10-2021-08:16', '03-10-2021-08:25'),
(25, 'Mesut', 'Yilmaz', 'sadas@gmail.com', '12345678', '1', '8988961', '03-10-2021-08:35', '03-10-2021-08:42'),
(30, 'Mesut', 'Yilmaz', 'sdfasdfsdfa4@gmail.com', '11223344', '1', '898789484', '03-10-2021-08:16', '03-10-2021-08:25'),
(31, 'Mesut', 'Yilmaz', 'fvdfggdfg@gmail.com', '12345678', '1', '5645646515', '03-10-2021-08:35', '03-10-2021-08:42'),
(35, 'Mesut', 'Yilmaz', 'dgsdfgsg@gmail.com', '12345678', '1', '255615646', '03-10-2021-08:35', '03-10-2021-08:42'),
(36, 'Mesut', 'Yilmaz', '42342343@fsail.com', '11223344', '3', '16515615', '03-10-2021-08:16', '05-10-2021-02:51'),
(37, 'Mesut', 'Yilmaz', 'sgdfgfdgdgfgd@gmail.com', '12345678', '1', '5646515684', '03-10-2021-08:35', '03-10-2021-08:42'),
(38, 'editörm', 'hesabi', 'e@gmail.com', '11223344', '3', '5561516', '05-10-2021-11:15', '05-10-2021-01:11'),
(39, 'Moderatörüm', 'Hesabı', 'm@gmail.com', '11223344', '2', '56654651', '05-10-2021-11:15', '05-10-2021-11:15'),
(40, 'Kullanıcı', 'Hesabı', 'k@gmail.com', '11223344', '4', '464651564', '05-10-2021-11:16', '05-10-2021-11:16'),
(41, 'Adminim', 'Hesabı', 'a@gmail.com', '11223344', '1', '51561651', '05-10-2021-11:16', '05-10-2021-11:16'),
(48, 'Mesut', 'Yılmaz', 'asdsada@gmail.com', '11223344', '4', '1633611598', '07-10-2021-12:59', '07-10-2021-12:59'),
(50, 'Mesut', 'Yilmaz', 'sadasdas@gaa.com', '11223344', '4', '1633969120', '11-10-2021 04:18', '11-10-2021 04:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_related_categories`
--

CREATE TABLE `user_related_categories` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `user_related_categories`
--

INSERT INTO `user_related_categories` (`id`, `user_id`, `category_id`) VALUES
(25, 41, 17),
(28, 38, 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `waitings_deletion`
--

CREATE TABLE `waitings_deletion` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `who_delete` int DEFAULT NULL,
  `is_deleted` int NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comment_history`
--
ALTER TABLE `comment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_new_history` (`new_id`),
  ADD KEY `fk_comment_user_history` (`user_id`);

--
-- Tablo için indeksler `editor_categories`
--
ALTER TABLE `editor_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CategoryID` (`category_id`),
  ADD KEY `FK_UserID` (`editor_id`);

--
-- Tablo için indeksler `editor_update_time`
--
ALTER TABLE `editor_update_time`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_news` (`category`),
  ADD KEY `fk_user_news` (`user_id`);

--
-- Tablo için indeksler `news_history`
--
ALTER TABLE `news_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_new_history` (`new_id`),
  ADD KEY `fk_user_history` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `user_related_categories`
--
ALTER TABLE `user_related_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `waitings_deletion`
--
ALTER TABLE `waitings_deletion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `comment_history`
--
ALTER TABLE `comment_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `editor_categories`
--
ALTER TABLE `editor_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `editor_update_time`
--
ALTER TABLE `editor_update_time`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- Tablo için AUTO_INCREMENT değeri `news_history`
--
ALTER TABLE `news_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Tablo için AUTO_INCREMENT değeri `user_related_categories`
--
ALTER TABLE `user_related_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `waitings_deletion`
--
ALTER TABLE `waitings_deletion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `comment_history`
--
ALTER TABLE `comment_history`
  ADD CONSTRAINT `fk_comment_new_history` FOREIGN KEY (`new_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comment_user_history` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `editor_categories`
--
ALTER TABLE `editor_categories`
  ADD CONSTRAINT `FK_CategoryID` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`editor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_category_news` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_news` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `news_history`
--
ALTER TABLE `news_history`
  ADD CONSTRAINT `fk_new_history` FOREIGN KEY (`new_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_history` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `waitings_deletion`
--
ALTER TABLE `waitings_deletion`
  ADD CONSTRAINT `fk_delete_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
