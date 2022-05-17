-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 02:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_ms`
--

CREATE TABLE `admin_ms` (
  `admin_id` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_password_text` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_ms`
--

INSERT INTO `admin_ms` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_password_text`, `created_at`, `updated_at`, `deleted_at`) VALUES
('A625683247a7ad', 'Gregorius Hariyanto ', 'hari@gmail.com', '$2y$10$f4QQLnGXgnoY35wT1obFp.zt/Miz8her6FhB57MSdU85603ZU7QOW', '123456789', '2022-04-13 15:00:36', '2022-05-14 13:33:06', '0000-00-00 00:00:00'),
('A6278d2d3156a1', 'admin', 'admin@spk.com', '$2y$10$LR8wboquuCPCjp1NN0fT8.RsZzhcmqk.blXbJE/UB5FI6OxGeqhQm', 'admin123', '2022-05-09 15:37:39', '2022-05-09 15:37:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gpu_kriteria_ms`
--

CREATE TABLE `gpu_kriteria_ms` (
  `gpu_kriteria_id` varchar(255) NOT NULL,
  `gpu_kriteria_name` varchar(255) NOT NULL,
  `gpu_kriteria_bobot` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gpu_kriteria_ms`
--

INSERT INTO `gpu_kriteria_ms` (`gpu_kriteria_id`, `gpu_kriteria_name`, `gpu_kriteria_bobot`, `created_at`, `updated_at`, `deleted_at`) VALUES
('G6253df4b35560', 'Intel Graphic', 4, '2022-04-11 02:56:59', '2022-05-14 13:31:55', '0000-00-00 00:00:00'),
('G6253df536ba92', 'Nvidia', 5, '2022-04-11 02:57:07', '2022-04-13 14:44:57', '0000-00-00 00:00:00'),
('G6253df5e08d0e', 'Radeon', 3, '2022-04-11 02:57:18', '2022-05-07 16:05:12', '0000-00-00 00:00:00'),
('G627b97960041a', 'Apple M1', 2, '2022-05-11 18:01:42', '2022-05-11 18:01:42', '0000-00-00 00:00:00'),
('G627f470b4615c', 'Gregorius Hariyanto Setiadi', 4, '2022-05-14 13:07:07', '2022-05-14 13:07:11', '2022-05-14 13:07:11'),
('G627f48e79ac34', 'RRR', 3, '2022-05-14 13:15:03', '2022-05-14 13:15:25', '2022-05-14 13:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `harga_kriteria_ms`
--

CREATE TABLE `harga_kriteria_ms` (
  `harga_kriteria_id` varchar(255) NOT NULL,
  `harga_kriteria_name` varchar(255) NOT NULL,
  `harga_kriteria_bobot` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `harga_kriteria_ms`
--

INSERT INTO `harga_kriteria_ms` (`harga_kriteria_id`, `harga_kriteria_name`, `harga_kriteria_bobot`, `created_at`, `updated_at`, `deleted_at`) VALUES
('H6253e083ab33f', '< 8.000.000', 5, '2022-04-11 03:02:11', '2022-05-14 13:30:35', '0000-00-00 00:00:00'),
('H6253e089b4e1b', '8.000.000 - 10.000.000', 4, '2022-04-11 03:02:17', '2022-04-11 03:02:17', '0000-00-00 00:00:00'),
('H6253e09962e9c', '10.000.000 - 12.000.000', 3, '2022-04-11 03:02:33', '2022-04-11 03:02:33', '0000-00-00 00:00:00'),
('H6253e09f788fc', '12.000.000 - 15.000.000', 2, '2022-04-11 03:02:39', '2022-04-11 03:02:39', '0000-00-00 00:00:00'),
('H6253e0a6d80a7', '> 15.000.000', 1, '2022-04-11 03:02:46', '2022-04-11 03:02:46', '0000-00-00 00:00:00'),
('H627f48351429e', 'eeee', 4, '2022-05-14 13:12:05', '2022-05-14 13:12:09', '2022-05-14 13:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `laptop_ms`
--

CREATE TABLE `laptop_ms` (
  `laptop_id` varchar(255) NOT NULL,
  `laptop_name` varchar(255) NOT NULL,
  `laptop_image` varchar(255) NOT NULL,
  `laptop_price` int(11) NOT NULL,
  `ram_id` varchar(255) NOT NULL,
  `processor_id` varchar(255) NOT NULL,
  `gpu_id` varchar(255) NOT NULL,
  `memori_id` varchar(255) NOT NULL,
  `harga_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laptop_ms`
--

INSERT INTO `laptop_ms` (`laptop_id`, `laptop_name`, `laptop_image`, `laptop_price`, `ram_id`, `processor_id`, `gpu_id`, `memori_id`, `harga_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('L6275f057c5e30', 'ASUS Vivobook S14 S433', '1652165128_05bfa1b7e81188ff4d43.png', 14000000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 11:06:47', '2022-05-17 07:48:13', '0000-00-00 00:00:00'),
('L6275f0e3bab6f', 'ASUS M415', '1651896547_744da6872765f0ff74da.png', 6600000, 'R6253df85b8c01', 'P6253dff259569', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e083ab33f', '2022-05-07 11:09:07', '2022-05-07 11:09:07', '0000-00-00 00:00:00'),
('L6275f18c5c355', 'ASUS Vivobook Pro 14 ', '1651896716_5404b51462461443156f.png', 11300000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e09962e9c', '2022-05-07 11:11:56', '2022-05-07 11:16:34', '0000-00-00 00:00:00'),
('L6275f2f20bb92', 'ASUS VivoBook 15 A516', '1651897074_ae654808dd3453048a72.jpg', 6000000, 'R6253df7e6e52b', 'P6253dfd2da4ef', 'G6253df4b35560', 'M6253e0362198d', 'H6253e083ab33f', '2022-05-07 11:17:54', '2022-05-07 11:22:14', '0000-00-00 00:00:00'),
('L6275f3d210074', 'ASUS VivoBook 14 A409', '1651897298_7916f69a34dbec5e4c84.png', 6000000, 'R6253df7e6e52b', 'P6253dfd2da4ef', 'G6253df4b35560', 'M6253e0362198d', 'H6253e083ab33f', '2022-05-07 11:21:38', '2022-05-07 11:21:38', '0000-00-00 00:00:00'),
('L6275f48a63dbf', 'ASUS Zenbook 13 OLED', '1651897482_9a9197e44b63108041fc.png', 13922000, 'R6253df85b8c01', 'P6253e0008d6e4', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 11:24:42', '2022-05-07 11:28:53', '0000-00-00 00:00:00'),
('L6275f4faedb7b', 'Asus Zenbook 14 ', '1651897594_3e52c34ad0cb7e8ffe16.png', 17299000, 'R6253df9a691d6', 'P6253dfe614930', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 11:26:34', '2022-05-07 11:26:34', '0000-00-00 00:00:00'),
('L6275f6d5f300f', 'ASUS Zenbook  Flip 13 OLED', '1651898069_8657743ef78d6d8ab2f8.png', 20299000, 'R6253df9a691d6', 'P6253dfe614930', 'G6253df4b35560', 'M6253e04466d89', 'H6253e0a6d80a7', '2022-05-07 11:34:29', '2022-05-07 11:34:29', '0000-00-00 00:00:00'),
('L6275f7e5c62a3', 'ASUS TUF Gaming F15', '1651898341_a855142be3b9d36fa596.jpg', 12913000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 11:39:01', '2022-05-07 11:39:01', '0000-00-00 00:00:00'),
('L6275f99c61d65', 'ASUS ROG Strix G15 G513', '1651947998_81d54ea8af5ec2eb0ba5.png', 15800000, 'R6253df85b8c01', 'P6253e011b6a83', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 11:46:20', '2022-05-08 01:26:38', '0000-00-00 00:00:00'),
('L6275fa596daab', 'Apple Macbook Air 13 Inch', '1651898969_34cc06944ad02db8bb8b.jpg', 15164244, 'R6253df85b8c01', 'P6253e0179e9bd', 'G627b97960041a', 'M6253e0362198d', 'H6253e0a6d80a7', '2022-05-07 11:49:29', '2022-05-11 18:02:16', '0000-00-00 00:00:00'),
('L6275faee5c755', 'Apple Macbook Pro 13 Inch', '1651899118_45bbdaf65515cbb0f86e.jpg', 19350370, 'R6253df85b8c01', 'P6253e0179e9bd', 'G627b97960041a', 'M6253e0362198d', 'H6253e0a6d80a7', '2022-05-07 11:51:58', '2022-05-11 18:02:31', '0000-00-00 00:00:00'),
('L6275fc7a342f1', 'HP Pavilion Laptop 14-ec0013AU', '1651899514_119d9d572f261ea8bc63.jpg', 10600000, 'R6253df9a691d6', 'P6253e0008d6e4', 'G6253df5e08d0e', 'M6253e03d0f412', 'H6253e09962e9c', '2022-05-07 11:58:34', '2022-05-07 11:58:34', '0000-00-00 00:00:00'),
('L6275fd37c5319', 'HP Pavilion Laptop 14-dv0517TX', '1651899703_c799f3f4a17a0e435177.jpg', 13780000, 'R6253df9a691d6', 'P6253dfdb0cacd', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 12:01:43', '2022-05-07 12:01:43', '0000-00-00 00:00:00'),
('L62760b71def94', 'HP Pavilion Gaming Laptop 15-dk2002TX', '1651903345_58b3ee6e2569287bd340.jpg', 15999000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 13:02:25', '2022-05-07 13:02:25', '0000-00-00 00:00:00'),
('L62760c45b5df3', 'HP Pavilion x360 Convertible 14-dy0065TU', '1651903557_9bbd0e21e50389769ac6.jpg', 14999000, 'R6253df85b8c01', 'P6253dfe614930', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 13:05:57', '2022-05-07 13:05:57', '0000-00-00 00:00:00'),
('L62760ce47a041', 'HP Laptop 14s-cf2517TU', '1651903716_e51ddc4144e9e1a63263.jpg', 6599000, 'R6253df7e6e52b', 'P6253dfd2da4ef', 'G6253df4b35560', 'M6253e0362198d', 'H6253e083ab33f', '2022-05-07 13:08:36', '2022-05-07 13:08:36', '0000-00-00 00:00:00'),
('L62760e274974b', 'HP ProBook 635 Aero G8 Notebook PC', '1651904039_902fa07fc91d660a5daa.png', 13999000, 'R6253df85b8c01', 'P6253e0008d6e4', 'G6253df5e08d0e', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 13:13:59', '2022-05-07 13:13:59', '0000-00-00 00:00:00'),
('L62760ea408120', 'HP 245 G8 Notebook PC', '1651904164_7e78d619da56f228fd36.png', 6999000, 'R6253df7e6e52b', 'P6253dff259569', 'G6253df5e08d0e', 'M6253e0362198d', 'H6253e083ab33f', '2022-05-07 13:16:04', '2022-05-07 13:16:04', '0000-00-00 00:00:00'),
('L62760f3777dbc', 'HP ENVY Laptop 13-ba1517TU', '1651904311_eca94d13ecce6e4ad182.jpg', 18499000, 'R6253df9a691d6', 'P6253dfe614930', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 13:18:31', '2022-05-07 13:18:31', '0000-00-00 00:00:00'),
('L62760fa9db14f', 'HP ENVY x360 Convert 13-ay1054AU', '1651904425_683d68caa22057ec4c03.jpg', 17499000, 'R6253df9a691d6', 'P6253e011b6a83', 'G6253df5e08d0e', 'M6253e04466d89', 'H6253e0a6d80a7', '2022-05-07 13:20:25', '2022-05-07 13:20:25', '0000-00-00 00:00:00'),
('L6276103046a00', 'HP OMEN Gaming Laptop 15-en1029AX', '1651904560_064e8daa6e1be323b784.jpg', 21099000, 'R6253df9a691d6', 'P6253e011b6a83', 'G6253df536ba92', 'M6253e04466d89', 'H6253e0a6d80a7', '2022-05-07 13:22:40', '2022-05-07 13:24:49', '0000-00-00 00:00:00'),
('L627611c80a0b0', 'Acer Aspire 5 Performance Notebook', '1651904968_5c7ec71bf02aa17aaddb.png', 9796000, 'R6253df85b8c01', 'P6253dfe614930', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e089b4e1b', '2022-05-07 13:29:28', '2022-05-07 13:29:28', '0000-00-00 00:00:00'),
('L6276120946456', 'Acer Aspire 7 Ryzen 5000 Performance Laptop', '1651905033_dd4673874615cbda60c6.png', 13724000, 'R6253df9a691d6', 'P6253e0008d6e4', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 13:30:33', '2022-05-07 13:30:33', '0000-00-00 00:00:00'),
('L62761250c3963', 'Acer Swift 3 Infinity 4 Ultrathin Laptop', '1651905104_21f25f5c59216aef427c.png', 11761000, 'R6253df9a691d6', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e09962e9c', '2022-05-07 13:31:44', '2022-05-07 13:31:44', '0000-00-00 00:00:00'),
('L6276133d17034', 'Acer Aspire 5 Slim Performance', '1651905341_efcfd65883409cbb72c3.png', 6571000, 'R6253df7e6e52b', 'P6253dfd2da4ef', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e083ab33f', '2022-05-07 13:35:41', '2022-05-07 13:35:41', '0000-00-00 00:00:00'),
('L627613729b8e9', 'Acer Swift 3X Ultrathin Creator Notebook', '1651905394_ecb98f593f5a6e85b824.png', 16149000, 'R6253df9a691d6', 'P6253dfe614930', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 13:36:34', '2022-05-07 13:36:34', '0000-00-00 00:00:00'),
('L627613b10e5d5', 'Acer Swift 5 Ultrathin Notebook', '1651905457_bb5ff0e6d7d797403e90.png', 13579000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 13:37:37', '2022-05-07 13:37:37', '0000-00-00 00:00:00'),
('L627613fce25fa', 'Acer Nitro 5 4000 Series Laptop Gaming', '1651905532_d30ced50f78f0aea02a6.png', 15499000, 'R6253df85b8c01', 'P6253e011b6a83', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 13:38:52', '2022-05-07 13:38:52', '0000-00-00 00:00:00'),
('L6276144a67d5b', 'Acer Aspire 5 Performance Notebook', '1651905610_ce9cddaf97aa8a23de01.png', 6377000, 'R6253df7e6e52b', 'P6253dfd2da4ef', 'G6253df4b35560', 'M6253e0362198d', 'H6253e083ab33f', '2022-05-07 13:40:10', '2022-05-07 13:40:10', '0000-00-00 00:00:00'),
('L627614c089f02', 'Acer Spin 3 Active Convertible Laptop', '1651905728_2a63b86016ac16f104e4.png', 16149000, 'R6253df9a691d6', 'P6253dfe614930', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 13:42:08', '2022-05-07 13:42:08', '0000-00-00 00:00:00'),
('L6276154a6c901', 'Acer Nitro 5 Laptop Gaming', '1651905866_38795f13319b3fe397df.png', 12499000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 13:44:26', '2022-05-07 13:44:26', '0000-00-00 00:00:00'),
('L627616476b728', 'DELL Inspiron 15 3000 Laptop', '1651906119_1ec34f5aa9930b327f3a.png', 5074382, 'R6253df85b8c01', 'P6253dfd2da4ef', 'G6253df4b35560', 'M6253e0362198d', 'H6253e083ab33f', '2022-05-07 13:48:39', '2022-05-07 13:48:39', '0000-00-00 00:00:00'),
('L62761b76da369', 'DELL Inspiron 15 Laptop (I5)', '1651907446_b1f190a6b7012dbca13e.png', 9423000, 'R6253df9a691d6', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e0362198d', 'H6253e089b4e1b', '2022-05-07 14:10:46', '2022-05-11 13:25:48', '0000-00-00 00:00:00'),
('L62761bbb7e0dc', 'DELL Inspiron 15 Laptop (AMD)', '1651907515_5a14534a80e8652598e7.png', 10148000, 'R6253df9a691d6', 'P6253e011b6a83', 'G6253df5e08d0e', 'M6253e03d0f412', 'H6253e09962e9c', '2022-05-07 14:11:55', '2022-05-07 14:11:55', '0000-00-00 00:00:00'),
('L62761c1b95484', 'DELL Inspiron 14 2-in-1 Laptop (AMD)', '1651907611_c602deb8f9a2ab56ade9.png', 8699000, 'R6253df9a691d6', 'P6253e0008d6e4', 'G6253df5e08d0e', 'M6253e03d0f412', 'H6253e089b4e1b', '2022-05-07 14:13:31', '2022-05-07 14:13:31', '0000-00-00 00:00:00'),
('L62761c9ba2f60', 'DELL Inspiron 15 Laptop (I7)', '1651907739_f6460547cdf33bb18810.png', 10873000, 'R6253df9a691d6', 'P6253dfe614930', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e09962e9c', '2022-05-07 14:15:39', '2022-05-11 13:26:06', '0000-00-00 00:00:00'),
('L62761d59b57ed', 'DELL G15 Gaming Laptop', '1651907929_2c42c41b9711d0a115cb.png', 11598000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e09962e9c', '2022-05-07 14:18:49', '2022-05-07 14:18:49', '0000-00-00 00:00:00'),
('L62761dca38d76', 'DELL G15 Ryzen™ Edition Gaming Laptop', '1651908042_b8950e689059e92b3dd0.png', 12323000, 'R6253df85b8c01', 'P6253e011b6a83', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-07 14:20:42', '2022-05-07 14:20:42', '0000-00-00 00:00:00'),
('L62761e233c5b1', 'DELL XPS 13 Plus Laptop', '1651908131_a52e5789c870b2a961af.png', 18833746, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 14:22:11', '2022-05-07 14:22:11', '0000-00-00 00:00:00'),
('L62761e7aee6aa', 'DELL XPS 15 Laptop', '1651908218_cabff0b9acff5e66f206.png', 22458000, 'R6253df9a691d6', 'P6253dfe614930', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 14:23:38', '2022-05-07 14:23:38', '0000-00-00 00:00:00'),
('L62761ed061a09', 'DELL Alienware m15 R6 Gaming Laptop', '1651908304_db62a9e601f49bac68ee.png', 15948000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-07 14:25:04', '2022-05-07 14:25:04', '0000-00-00 00:00:00'),
('L6276ad263031e', 'LENOVO IdeaPad 3', '1651944742_b30cd0b968fd6b4f7b45.jpg', 8675000, 'R6253df85b8c01', 'P6253e0008d6e4', 'G6253df5e08d0e', 'M6253e03d0f412', 'H6253e089b4e1b', '2022-05-08 00:32:22', '2022-05-08 00:34:42', '0000-00-00 00:00:00'),
('L6276ae112c3b1', 'LENOVO IdeaPad 5 15ITL05', '1651944977_9beb2b486fd791e4471a.jpg', 10245000, 'R6253df7e6e52b', 'P6253dfd2da4ef', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e09962e9c', '2022-05-08 00:36:17', '2022-05-08 00:36:17', '0000-00-00 00:00:00'),
('L6276ae8deb900', 'LENOVO IdeaPad Slim 5i', '1651945101_b0fa8518a601d014c3c3.jpg', 13489000, 'R6253df9a691d6', 'P6253dfe614930', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-08 00:38:21', '2022-05-08 00:38:21', '0000-00-00 00:00:00'),
('L6276af1d50c2c', 'LENOVO IdeaPad S540', '1651945245_c720ca84ae079c9ceca6.jpg', 11187000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e09962e9c', '2022-05-08 00:40:45', '2022-05-08 00:40:45', '0000-00-00 00:00:00'),
('L6276aff16956d', 'LENOVO Yoga Slim 7 ', '1651945457_eb9914b6e48f28e55e95.jpg', 12233000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e09f788fc', '2022-05-08 00:44:17', '2022-05-08 00:44:17', '0000-00-00 00:00:00'),
('L6276b06198dfa', 'LENOVO IdeaPad Gaming 3', '1651945569_dbbd742bd424e988a106.jpg', 11919000, 'R6253df85b8c01', 'P6253e0008d6e4', 'G6253df536ba92', 'M6253e03d0f412', 'H6253e09962e9c', '2022-05-08 00:46:09', '2022-05-14 16:16:44', '0000-00-00 00:00:00'),
('L6276b0e617695', 'Lenovo V14', '1651945702_ae6a50555eb8e2d8f7ec.jpg', 7099000, 'R6253df7e6e52b', 'P6253dfd2da4ef', 'G6253df536ba92', 'M6253e0362198d', 'H6253e083ab33f', '2022-05-08 00:48:22', '2022-05-08 00:48:22', '0000-00-00 00:00:00'),
('L6276b1ac6ab57', 'Lenovo ThinkPad T14 Gen 2', '1651945922_3952e7ab96f0a7692da5.jpg', 19599000, 'R6253df9a691d6', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e03d0f412', 'H6253e0a6d80a7', '2022-05-08 00:51:40', '2022-05-08 00:52:02', '0000-00-00 00:00:00'),
('L627b85ea63e09', 'ASUS Vivobook Ultra 15 OLED K513 ', '1652262378_f21d7b62fa1e28df3737.png', 8575000, 'R6253df7e6e52b', 'P6253dfd2da4ef', 'G6253df4b35560', 'M6253e0362198d', 'H6253e089b4e1b', '2022-05-11 16:46:18', '2022-05-11 16:52:15', '0000-00-00 00:00:00'),
('L627b86cd3e1f7', 'HP 240 G8 Notebook PC', '1652262605_d8488f91c4dcffeded2b.jpg', 8930000, 'R6253df7e6e52b', 'P6253dfd2da4ef', 'G6253df4b35560', 'M6253e0362198d', 'H6253e089b4e1b', '2022-05-11 16:50:05', '2022-05-11 16:50:05', '0000-00-00 00:00:00'),
('L627b872c742cd', 'HP Laptop 14s-fq1005AU', '1652262700_c9363164dd11005e9ad8.jpg', 9599000, 'R6253df85b8c01', 'P6253e0008d6e4', 'G6253df5e08d0e', 'M6253e03d0f412', 'H6253e089b4e1b', '2022-05-11 16:51:40', '2022-05-11 16:51:40', '0000-00-00 00:00:00'),
('L627b87eed5520', 'HP 240 G7 Notebook PC', '1652262894_7e8b2178519c062cd5d9.jpg', 9500000, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e0362198d', 'H6253e089b4e1b', '2022-05-11 16:54:54', '2022-05-11 16:54:54', '0000-00-00 00:00:00'),
('L6281de8bb01fc', '6 GB', 'default.jpg', 9147010, 'R6253df85b8c01', 'P6253dfdb0cacd', 'G6253df4b35560', 'M6253e04466d89', 'H6253e09962e9c', '2022-05-16 12:18:03', '2022-05-16 12:18:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `memori_kriteria_ms`
--

CREATE TABLE `memori_kriteria_ms` (
  `memori_kriteria_id` varchar(255) NOT NULL,
  `memori_kriteria_name` varchar(255) NOT NULL,
  `memori_kriteria_bobot` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memori_kriteria_ms`
--

INSERT INTO `memori_kriteria_ms` (`memori_kriteria_id`, `memori_kriteria_name`, `memori_kriteria_bobot`, `created_at`, `updated_at`, `deleted_at`) VALUES
('M6253e0362198d', '256 GB', 4, '2022-04-11 03:00:54', '2022-05-14 13:31:14', '0000-00-00 00:00:00'),
('M6253e03d0f412', '512 GB', 5, '2022-04-11 03:01:01', '2022-04-11 03:01:01', '0000-00-00 00:00:00'),
('M6253e04466d89', '1 TB ', 3, '2022-04-11 03:01:08', '2022-04-11 03:01:08', '0000-00-00 00:00:00'),
('M627f4979be30e', 'Gregorius Hariyanto Setiadi', 7, '2022-05-14 13:17:29', '2022-05-14 13:17:38', '2022-05-14 13:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-04-11-015030', 'App\\Database\\Migrations\\CreateTableRamKriteria', 'default', 'App', 1649642340, 1),
(2, '2022-04-11-015435', 'App\\Database\\Migrations\\CreateTableGpuKriteria', 'default', 'App', 1649642340, 1),
(3, '2022-04-11-015527', 'App\\Database\\Migrations\\CreateTableHargaKriteria', 'default', 'App', 1649642340, 1),
(4, '2022-04-11-015551', 'App\\Database\\Migrations\\CreateTableMemoriKriteria', 'default', 'App', 1649642340, 1),
(5, '2022-04-11-015622', 'App\\Database\\Migrations\\CreateTableProcessorKriteria', 'default', 'App', 1649642340, 1),
(12, '2022-04-11-072919', 'App\\Database\\Migrations\\CreateTableAdmin', 'default', 'App', 1649664956, 2),
(14, '2022-04-13-014152', 'App\\Database\\Migrations\\CreateTableLaptop', 'default', 'App', 1649815018, 3);

-- --------------------------------------------------------

--
-- Table structure for table `processor_kriteria_ms`
--

CREATE TABLE `processor_kriteria_ms` (
  `processor_kriteria_id` varchar(255) NOT NULL,
  `processor_kriteria_name` varchar(255) NOT NULL,
  `processor_kriteria_bobot` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `processor_kriteria_ms`
--

INSERT INTO `processor_kriteria_ms` (`processor_kriteria_id`, `processor_kriteria_name`, `processor_kriteria_bobot`, `created_at`, `updated_at`, `deleted_at`) VALUES
('P6253dfd2da4ef', 'Intel I3', 4, '2022-04-11 02:59:14', '2022-05-14 16:20:17', '0000-00-00 00:00:00'),
('P6253dfdb0cacd', 'Intel I5', 5, '2022-04-11 02:59:23', '2022-05-14 16:20:03', '0000-00-00 00:00:00'),
('P6253dfe614930', 'Intel I7', 3, '2022-04-11 02:59:34', '2022-04-11 03:00:08', '0000-00-00 00:00:00'),
('P6253dff259569', 'Ryzen 3', 4, '2022-04-11 02:59:46', '2022-05-14 16:20:14', '0000-00-00 00:00:00'),
('P6253e0008d6e4', 'Ryzen 5', 5, '2022-04-11 03:00:00', '2022-05-14 16:20:09', '0000-00-00 00:00:00'),
('P6253e011b6a83', 'Ryzen 7', 3, '2022-04-11 03:00:17', '2022-04-11 03:00:17', '0000-00-00 00:00:00'),
('P6253e0179e9bd', 'Apple M1', 2, '2022-04-11 03:00:23', '2022-04-11 03:00:23', '0000-00-00 00:00:00'),
('P627f49edb7030', 'Gregorius Hariyanto ', 2, '2022-05-14 13:19:25', '2022-05-14 13:19:55', '2022-05-14 13:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `ram_kriteria_ms`
--

CREATE TABLE `ram_kriteria_ms` (
  `ram_kriteria_id` varchar(255) NOT NULL,
  `ram_kriteria_name` varchar(255) NOT NULL,
  `ram_kriteria_bobot` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ram_kriteria_ms`
--

INSERT INTO `ram_kriteria_ms` (`ram_kriteria_id`, `ram_kriteria_name`, `ram_kriteria_bobot`, `created_at`, `updated_at`, `deleted_at`) VALUES
('R6253df7e6e52b', '4 GB', 4, '2022-04-11 02:57:50', '2022-05-14 13:31:34', '0000-00-00 00:00:00'),
('R6253df85b8c01', '8 GB', 5, '2022-04-11 02:57:57', '2022-04-11 02:58:08', '0000-00-00 00:00:00'),
('R6253df9a691d6', '16 GB', 3, '2022-04-11 02:58:18', '2022-04-11 02:58:47', '0000-00-00 00:00:00'),
('R627f4ad5dafc7', 'f', 5, '2022-05-14 13:23:17', '2022-05-14 13:23:41', '2022-05-14 13:23:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_ms`
--
ALTER TABLE `admin_ms`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `gpu_kriteria_ms`
--
ALTER TABLE `gpu_kriteria_ms`
  ADD PRIMARY KEY (`gpu_kriteria_id`);

--
-- Indexes for table `harga_kriteria_ms`
--
ALTER TABLE `harga_kriteria_ms`
  ADD PRIMARY KEY (`harga_kriteria_id`);

--
-- Indexes for table `laptop_ms`
--
ALTER TABLE `laptop_ms`
  ADD PRIMARY KEY (`laptop_id`);

--
-- Indexes for table `memori_kriteria_ms`
--
ALTER TABLE `memori_kriteria_ms`
  ADD PRIMARY KEY (`memori_kriteria_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processor_kriteria_ms`
--
ALTER TABLE `processor_kriteria_ms`
  ADD PRIMARY KEY (`processor_kriteria_id`);

--
-- Indexes for table `ram_kriteria_ms`
--
ALTER TABLE `ram_kriteria_ms`
  ADD PRIMARY KEY (`ram_kriteria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
