-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2024 at 09:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ta Van Hoan', 'admin', 'admin@gmail.com', NULL, '$2y$12$oN1JELMRlLL1C0RC99ga5e40TJ69idehw7E3lIAjah2TLLAmN1m5i', NULL, '$2y$12$tjSk574.kY983A5ucra8w.kYsLb7gXvQTTneWOsALz4jkF0ka1ec.', '2024-05-24 06:39:03', '2024-05-24 06:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `category`, `release_date`, `product_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Chăn hè Everon ES1234', 'Everon Bedding', 'Chăn', '2024-05-20', 1, '<p><strong>Chăn h&egrave; Everon ES123 được l&agrave;m từ chất liệu 100% cotton tự nhi&ecirc;n, si&ecirc;u nhẹ v&agrave; tho&aacute;ng m&aacute;t, mang đến cảm gi&aacute;c thoải m&aacute;i tối đa trong những ng&agrave;y h&egrave; oi bức. Thiết kế trang nh&atilde; với nhiều họa tiết đa dạng ph&ugrave; hợp với mọi kh&ocirc;ng gian ph&ograve;ng ngủ.</strong></p>', NULL, '2024-05-24 09:29:08'),
(2, 'Chăn đông Canada Luxe CA456 - Ấm áp vượt trội cho mùa đông lạnh giá', 'Canada Luxe', 'Chăn', '2024-02-15', 2, 'Chăn đông Canada Luxe CA456 sử dụng công nghệ sợi lông cừu cao cấp, giữ nhiệt tốt, giúp bạn luôn ấm áp trong những đêm đông lạnh giá. Thiết kế sang trọng với đường may tỉ mỉ, chất lượng vượt trội.', NULL, NULL),
(3, 'Ga chun Sông Hồng SH789 - Mềm mại và tiện lợi cho mọi loại đệm', 'Sông Hồng', 'Ga', '2023-11-10', 3, 'Ga chun Sông Hồng SH789 được làm từ chất liệu cotton 100%, mềm mại và thấm hút mồ hôi tốt. Thiết kế chun bọc quanh đệm giúp giữ ga luôn cố định, không xô lệch trong quá trình sử dụng.', NULL, NULL),
(4, 'Ga phủ Hanvico HV012 - Sang trọng và tinh tế cho phòng ngủ hiện đại', 'Hanvico', 'Ga', '2024-03-05', 4, 'Ga phủ Hanvico HV012 được làm từ chất liệu tencel cao cấp, mềm mịn và thoáng mát. Họa tiết thêu tinh xảo mang đến vẻ đẹp sang trọng và tinh tế cho không gian phòng ngủ của bạn.', NULL, NULL),
(5, 'Gối lông vũ Eden ED345 - Trải nghiệm êm ái như mây', 'Eden', 'Gối', '2023-12-28', 5, 'Gối lông vũ Eden ED345 sử dụng 100% lông vũ tự nhiên, mang đến cảm giác êm ái và nâng đỡ hoàn hảo cho đầu và cổ. Vỏ gối được làm từ chất liệu cotton mềm mịn, thoáng khí, giúp bạn có giấc ngủ ngon và sâu hơn.', NULL, NULL),
(6, 'Gối cao su non Kim Cương KC678 - Thoáng khí và đàn hồi tốt', 'Kim Cương', 'Gối', '2024-04-18', 6, 'Gối cao su non Kim Cương KC678 được làm từ chất liệu cao su non cao cấp, có độ đàn hồi tốt, giúp nâng đỡ và ôm sát đường cong tự nhiên của đầu và cổ. Thiết kế lỗ thoáng khí giúp gối luôn khô thoáng, ngăn ngừa vi khuẩn và nấm mốc.', NULL, NULL),
(7, 'Đệm bông ép Liên Á LA901 - Chắc chắn và thoáng mát', 'Liên Á', 'Đệm', '2023-09-03', 7, 'Đệm bông ép Liên Á LA901 được sản xuất từ bông tinh khiết, ép cách nhiệt tạo độ phẳng và chắc chắn. Vỏ đệm được làm từ vải gấm cao cấp, mềm mại và thoáng khí, mang đến cảm giác thoải mái khi nằm.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(10, 3, 10, 8, '2024-05-24 07:25:26', '2024-05-24 07:25:26');

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
(1, 'Chăn', '2024-05-24 06:39:03', '2024-05-24 06:39:03'),
(2, 'Ga', '2024-05-24 06:39:03', '2024-05-24 06:39:03'),
(3, 'Gối', '2024-05-24 06:39:03', '2024-05-24 06:39:03'),
(4, 'Đệm', '2024-05-24 06:39:03', '2024-05-24 06:39:03'),
(5, 'Nệm', '2024-05-24 07:01:32', '2024-05-24 07:01:32'),
(6, 'Đệm lò xo', '2024-05-24 11:27:39', '2024-05-24 11:27:39');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_25_070308_create_admins_table', 1),
(6, '2024_01_26_033032_create_otps_table', 1),
(7, '2024_03_08_151734_create_products_table', 1),
(8, '2024_03_08_165729_create_categories_table', 1),
(9, '2024_03_08_174458_create_product_categories_table', 1),
(10, '2024_03_16_074438_create_orders_table', 1),
(11, '2024_03_16_075431_create_orders_detail_table', 1),
(12, '2024_03_16_092046_create_carts_table', 1),
(13, '2024_05_22_152340_create_articles_table', 1),
(14, '2024_05_22_162622_add_content_to_articles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_place` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_price`, `status`, `purchase_date`, `purchase_place`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-05-24', 3000.00, '1', '2024-06-10', 'Hoàng Mai', '2024-05-24 07:03:24', '2024-05-24 07:07:23'),
(2, 1, '2024-05-24', 6893000.00, '1', '2024-05-30', 'Tân Mai', '2024-05-24 07:08:17', '2024-05-24 07:27:52'),
(3, 3, '2024-05-24', 2344000.00, '2', '2023-05-29', 'Tạ Quang Bửu', '2024-05-24 07:19:54', '2024-05-24 07:27:55'),
(4, 3, '2024-05-24', 796000.00, '3', '2024-05-28', 'Trần Đại Nghĩa', '2024-05-24 07:21:31', '2024-05-24 07:27:58'),
(5, 3, '2024-05-24', 3196000.00, '4', '2024-05-28', 'Trần Đại Nghĩa', '2024-05-24 07:24:54', '2024-05-24 07:24:54'),
(6, 4, '2024-05-24', 1192000.00, '4', '2024-05-28', 'Trần Đại Nghĩa', '2024-05-24 07:26:56', '2024-05-24 07:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2024-05-24 07:03:24', '2024-05-24 07:03:24'),
(2, 2, 2, 4, '2024-05-24 07:08:17', '2024-05-24 07:08:17'),
(3, 2, 3, 2, '2024-05-24 07:08:17', '2024-05-24 07:08:17'),
(4, 2, 5, 1, '2024-05-24 07:08:17', '2024-05-24 07:08:17'),
(5, 3, 10, 4, '2024-05-24 07:19:54', '2024-05-24 07:19:54'),
(6, 3, 11, 1, '2024-05-24 07:19:54', '2024-05-24 07:19:54'),
(7, 3, 12, 1, '2024-05-24 07:19:54', '2024-05-24 07:19:54'),
(8, 4, 16, 4, '2024-05-24 07:21:31', '2024-05-24 07:21:31'),
(9, 5, 17, 4, '2024-05-24 07:24:54', '2024-05-24 07:24:54'),
(10, 6, 10, 8, '2024-05-24 07:26:56', '2024-05-24 07:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 1, 'authToken', '0ac50d5846dcadee7008f766f318d99060ed9e6ba55e8ebc251adc8b9e0c6656', '[\"*\"]', '2024-05-24 07:01:13', NULL, '2024-05-24 06:56:58', '2024-05-24 07:01:13'),
(4, 'App\\Models\\User', 1, 'authToken', 'f640bc65dfae9957ca8eb634eaa3f4ed43e887a48ca0e0e13461ebc6856633a3', '[\"*\"]', '2024-05-24 07:08:17', NULL, '2024-05-24 06:57:30', '2024-05-24 07:08:17'),
(6, 'App\\Models\\User', 3, 'authToken', 'd3953ec651a1ea0b82e4383d5be028045cb2e95409ba84b8f8cd01e68153185b', '[\"*\"]', NULL, NULL, '2024-05-24 07:18:54', '2024-05-24 07:18:54'),
(7, 'App\\Models\\User', 3, 'authToken', '5988e61d149711a37b7abffa59a25c04350322183c7834447a31d739dc2edbca', '[\"*\"]', '2024-05-24 07:25:26', NULL, '2024-05-24 07:19:09', '2024-05-24 07:25:26'),
(8, 'App\\Models\\User', 4, 'authToken', 'fe8b6eea4aa02f2a3d97ecc9309b1363223075d42560f5566cbb081519ebc05e', '[\"*\"]', '2024-05-24 09:50:09', NULL, '2024-05-24 07:26:14', '2024-05-24 09:50:09'),
(9, 'App\\Models\\User', 4, 'authToken', 'e84d2858ea75ea3181a460c48096011798a69eb7ddfe2b0a3d09efda5c4b23e1', '[\"*\"]', '2024-05-24 07:26:56', NULL, '2024-05-24 07:26:22', '2024-05-24 07:26:56'),
(25, 'App\\Models\\Admin', 1, 'authToken', 'e5739e5e529d5dd3859655569c11379c0ef15db2108e794e2cf87de5dea542f5', '[\"*\"]', '2024-05-24 12:25:02', NULL, '2024-05-24 11:27:12', '2024-05-24 12:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `origin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`, `origin`, `created_at`, `updated_at`) VALUES
(1, 'Đệm cao su', 'Relax là đệm cao su nhập khẩu từ Châu Âu. Được áp dụng theo công nghệ mới, với tính năng độc quyền Airtech', 1000.00, 'https://example.com/chan-he-everon-es123.jpg', 'Việt Nam', NULL, '2024-05-24 06:54:42'),
(2, 'Chăn đông Canada Luxe CA456', 'Chăn đông dày dặn, ấm áp', 1299000.00, 'https://example.com/chan-dong-canada-luxe-ca456.jpg', 'Canada', NULL, NULL),
(3, 'Ga chun Sông Hồng SH789', 'Ga chun chất liệu cotton mềm mại', 399000.00, 'https://example.com/ga-chun-song-hong-sh789.jpg', 'Việt Nam', NULL, NULL),
(4, 'Ga phủ Hanvico HV012', 'Ga phủ họa tiết sang trọng', 699000.00, 'https://example.com/ga-phu-hanvico-hv012.jpg', 'Việt Nam', NULL, NULL),
(5, 'Gối lông vũ Eden ED345', 'Gối lông vũ êm ái, nâng đỡ', 899000.00, 'https://example.com/goi-long-vu-eden-ed345.jpg', 'Việt Nam', NULL, NULL),
(6, 'Gối cao su non Kim Cương KC678', 'Gối cao su non thoáng khí', 299000.00, 'https://example.com/goi-cao-su-non-kim-cuong-kc678.jpg', 'Việt Nam', NULL, NULL),
(7, 'Đệm bông ép Liên Á LA901', 'Đệm bông ép chắc chắn, thoáng mát', 999000.00, 'https://example.com/dem-bong-ep-lien-a-la901.jpg', 'Việt Nam', NULL, NULL),
(8, 'Đệm lò xo Dunlopillo DP234', 'Đệm lò xo hỗ trợ cột sống', 1599000.00, 'https://example.com/dem-lo-xo-dunlopillo-dp234.jpg', 'Anh', NULL, NULL),
(9, 'Đệm cao su Vạn Thành VT567', 'Đệm cao su thiên nhiên bền bỉ', 1899000.00, 'https://example.com/dem-cao-su-van-thanh-vt567.jpg', 'Việt Nam', NULL, NULL),
(10, 'Ruột gối Sông Hồng SH890', 'Ruột gối chất liệu cotton', 149000.00, 'https://example.com/ruot-goi-song-hong-sh890.jpg', 'Việt Nam', NULL, NULL),
(11, 'Bộ chăn ga Everon EPCD123', 'Bộ chăn ga cotton họa tiết hoa', 1499000.00, 'https://example.com/bo-chan-ga-everon-epcd123.jpg', 'Việt Nam', NULL, NULL),
(12, 'Gối ôm Hanvico HVO123', 'Gối ôm mềm mại, thoải mái', 249000.00, 'https://example.com/goi-om-hanvico-hvo123.jpg', 'Việt Nam', NULL, NULL),
(13, 'Topper Liên Á LAT456', 'Topper tăng độ êm ái cho đệm', 499000.00, 'https://example.com/topper-lien-a-lat456.jpg', 'Việt Nam', NULL, NULL),
(14, 'Tấm bảo vệ đệm Kim Cương KCT789', 'Tấm bảo vệ đệm chống thấm', 299000.00, 'https://example.com/tam-bao-ve-dem-kim-cuong-kct789.jpg', 'Việt Nam', NULL, NULL),
(15, 'Gối tựa lưng Eden EDT012', 'Gối tựa lưng thư giãn', 199000.00, 'https://example.com/goi-tua-lung-eden-edt012.jpg', 'Việt Nam', NULL, NULL),
(16, 'Bộ vỏ gối Sông Hồng SHV345', 'Bộ vỏ gối cotton nhiều màu sắc', 199000.00, 'https://example.com/bo-vo-goi-song-hong-shv345.jpg', 'Việt Nam', NULL, NULL),
(17, 'Đệm trẻ em Hanvico HVK678', 'Đệm trẻ em an toàn, êm ái', 799000.00, 'https://example.com/dem-tre-em-hanvico-hvk678.jpg', 'Việt Nam', NULL, NULL),
(18, 'Chăn văn phòng Everon EV901', 'Chăn văn phòng nhỏ gọn, tiện lợi', 249000.00, 'https://example.com/chan-van-phong-everon-ev901.jpg', 'Việt Nam', NULL, NULL),
(20, 'Chăn siêu ấm', 'Chăn làm từ lông cừu', 100.00, NULL, 'Việt Nam', '2024-05-24 06:53:55', '2024-05-24 06:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 4, 2, NULL, NULL),
(5, 5, 3, NULL, NULL),
(6, 6, 3, NULL, NULL),
(7, 7, 4, NULL, NULL),
(8, 8, 4, NULL, NULL),
(9, 9, 4, NULL, NULL),
(10, 10, 3, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 11, 2, NULL, NULL),
(13, 12, 3, NULL, NULL),
(14, 13, 4, NULL, NULL),
(15, 14, 4, NULL, NULL),
(16, 15, 3, NULL, NULL),
(17, 16, 3, NULL, NULL),
(18, 17, 4, NULL, NULL),
(19, 18, 1, NULL, NULL),
(21, 20, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `email_verified_at`, `password`, `status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ta', 'Van Hoan', '1234567890', 'hoanjp197@gmail.com', '2024-05-24 06:39:03', '$2y$12$AcpaFGVfaa.Nl3h4z7ASBe9HiUKTz6B2KmyrY8PHIYkR8ooSgNYYu', 1, NULL, NULL, '2024-05-24 06:39:03', '2024-05-24 06:39:03'),
(3, 'Nguyen', 'Hoang', '0123456789', 'hoang123@gmail.com', NULL, '$2y$12$4oYeGFRcEUFhVH0VxXUEG.zM02GfUpsvMXRqykCKbkWS1ck.MENV.', 0, NULL, NULL, '2024-05-24 07:18:41', '2024-05-24 07:18:41'),
(4, 'Khanh', 'Mac', '0123456789', 'khanh123@gmail.com', NULL, '$2y$12$Rr7asCz24TxkyBsPEMdgUuFgXGBwxgqN.CSDykEuRD7gOJoEvGOvy', 0, NULL, NULL, '2024-05-24 07:24:15', '2024-05-24 07:24:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_product_id_foreign` (`product_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_detail_order_id_foreign` (`order_id`),
  ADD KEY `orders_detail_product_id_foreign` (`product_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;