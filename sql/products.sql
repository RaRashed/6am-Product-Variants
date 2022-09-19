-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2022 at 09:37 AM
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
-- Database: `6am`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice_options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `product_price`, `category_id`, `brand_id`, `detail`, `colors`, `variant_product`, `attributes`, `sku`, `choice_options`, `variation`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'ABCD', '590', '1', '1', 'abcd', '[\"1\"]', '1', '[\"type\"]', '', '[{\"name\":\"choice_type\",\"title\":\"Type\",\"options\":[\"thr\"]}]', '[{\"type\":\"red-thr\",\"price\":590,\"sku\":\"A-red-thr\",\"qty\":1}]', '1', '2', '2022-09-19 01:19:42', '2022-09-19 01:19:42'),
(2, 'ABCD', '590', '1', '1', 'abcd', '[\"1\"]', '1', '[\"type\"]', 'abcd', '[{\"name\":\"choice_type\",\"title\":\"Type\",\"options\":[\"aa\",\"dd\"]}]', '[{\"type\":\"red-aa\",\"price\":590,\"sku\":\"A-red-aa\",\"qty\":1},{\"type\":\"red-dd\",\"price\":590,\"sku\":\"A-red-dd\",\"qty\":1}]', '1', '2', '2022-09-19 01:28:07', '2022-09-19 01:28:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
