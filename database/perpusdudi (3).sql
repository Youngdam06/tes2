-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 04:47 PM
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
-- Database: `perpusdudi`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`` PROCEDURE `tampilPetugas` ()   BEGIN
    SELECT * FROM users WHERE level = 'petugas';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tahunterbit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `image`, `tahunterbit`, `created_at`, `updated_at`) VALUES
(2, 'Laskar Pelangi', 'Adam Ilyasa', 'gramed', '1708571663_laskar.jpg', 2020, '2024-02-19 20:49:42', '2024-02-21 20:14:23'),
(3, 'The Great Gatsby', 'Fathoni Adam', 'Gramedia', '1708571960_the_great_gatsby.jpeg', 2020, '2024-02-19 20:50:01', '2024-02-21 20:19:20'),
(4, 'Fourth Wing', 'Rebecca Yaros', 'Empyrian', '1708574414_fourth_wing.jpg', 2023, '2024-02-19 20:50:28', '2024-02-21 21:00:14'),
(5, 'Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia', '1708575152_negeri_5_menara.jpg', 1989, '2024-02-20 00:42:09', '2024-02-21 21:12:32'),
(9, 'Mockingjay', 'Suzunne Collins', 'Scholastic', '1708575615.jpeg', 2010, '2024-02-21 21:20:15', '2024-02-21 21:20:15'),
(10, 'ahahJj', 'Suzunne Collins', 'Scholastic', '1710382935.jpg', 2010, '2024-03-13 19:22:15', '2024-03-13 19:22:15'),
(11, 'juju', 'juju', 'juju', '1710391904.jpg', 20101, '2024-03-13 21:51:44', '2024-03-13 21:51:44'),
(14, 'kocheng', 'kocheng', 'KOCHENG', '1713835461.png', 2022, '2024-04-22 18:24:21', '2024-04-22 18:24:21'),
(15, 'atha', 'atha', 'atha', '1713837916.jpg', 2022, '2024-04-22 19:05:16', '2024-04-22 19:05:16');

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Thrillerr', NULL, '2024-02-22 00:12:39'),
(2, 'Fantasi', NULL, NULL),
(3, 'Novel', NULL, NULL),
(4, 'Komik', NULL, NULL),
(5, 'Cerpen', NULL, NULL),
(6, 'Misteri', NULL, NULL),
(7, 'Horor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_relasi`
--

CREATE TABLE `kategori_relasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bukuid` bigint(20) UNSIGNED NOT NULL,
  `kategoriid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_relasi`
--

INSERT INTO `kategori_relasi` (`id`, `bukuid`, `kategoriid`, `created_at`, `updated_at`) VALUES
(9, 9, 2, NULL, NULL),
(10, 9, 4, NULL, NULL),
(17, 4, 6, NULL, NULL),
(19, 5, 5, NULL, NULL),
(20, 5, 6, NULL, NULL),
(24, 11, 5, NULL, NULL),
(25, 11, 1, NULL, NULL),
(30, 10, 2, NULL, NULL),
(40, 3, 2, NULL, NULL),
(47, 2, 5, NULL, NULL),
(49, 14, 1, NULL, NULL),
(50, 15, 1, NULL, NULL),
(52, 15, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `bukuid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id`, `userid`, `bukuid`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '2024-03-14 20:35:48', '2024-03-14 20:35:48'),
(2, 3, 3, '2024-03-14 20:37:55', '2024-03-14 20:37:55'),
(3, 3, 11, '2024-03-14 20:39:39', '2024-03-14 20:39:39'),
(4, 3, 10, '2024-03-26 20:48:23', '2024-03-26 20:48:23'),
(5, 3, 5, '2024-03-26 21:20:58', '2024-03-26 21:20:58'),
(6, 3, 2, '2024-04-16 03:41:04', '2024-04-16 03:41:04'),
(7, 3, 2, '2024-04-18 20:17:28', '2024-04-18 20:17:28'),
(8, 19, 4, '2024-04-21 21:45:52', '2024-04-21 21:45:52'),
(9, 19, 9, '2024-04-22 02:48:13', '2024-04-22 02:48:13'),
(10, 20, 9, '2024-04-22 20:12:27', '2024-04-22 20:12:27'),
(11, 20, 2, '2024-04-22 20:50:02', '2024-04-22 20:50:02'),
(12, 20, 5, '2024-04-23 06:51:50', '2024-04-23 06:51:50'),
(13, 20, 5, '2024-04-23 06:55:29', '2024-04-23 06:55:29');

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
(10, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(11, '2019_08_19_000000_create_failed_jobs_table', 2),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(13, '2024_02_07_040605_create_buku_table', 2),
(14, '2024_02_07_040824_create_peminjaman_table', 2),
(15, '2024_02_07_043601_create_kategori_table', 2),
(16, '2024_02_07_043840_create_ulasan_table', 2),
(17, '2024_02_07_044422_create_kategori_relasi_table', 2),
(18, '2024_02_15_065925_add_image_column_to_buku_table', 3);

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
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `bukuid` bigint(20) UNSIGNED NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `tanggalkembali` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `userid`, `bukuid`, `tanggalpinjam`, `tanggalkembali`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '2024-03-15', '2024-03-15', 'Dikembalikan', '2024-03-14 20:34:43', '2024-03-14 20:35:48'),
(2, 3, 3, '2024-03-15', '2024-03-15', 'Dikembalikan', '2024-03-14 20:37:48', '2024-03-14 20:37:55'),
(3, 3, 11, '2024-03-15', '2024-03-15', 'Dikembalikan', '2024-03-14 20:39:29', '2024-03-14 20:39:39'),
(4, 3, 10, '2024-03-27', '2024-03-27', 'Dikembalikan', '2024-03-26 20:47:57', '2024-03-26 20:48:23'),
(5, 3, 5, '2024-03-27', '2024-04-03', 'Dipinjam', '2024-03-26 21:15:39', '2024-03-26 21:15:39'),
(6, 3, 5, '2024-03-27', '2024-04-03', 'Dipinjam', '2024-03-26 21:20:58', '2024-03-26 21:20:58'),
(7, 3, 2, '2024-04-16', '2024-04-23', 'Dikembalikan', '2024-04-16 03:41:04', '2024-04-22 18:01:38'),
(8, 3, 2, '2024-04-19', '2024-04-25', 'Dipinjam', '2024-04-18 20:17:28', '2024-04-18 20:17:28'),
(9, 19, 4, '2024-04-22', '2024-04-29', 'Dipinjam', '2024-04-21 21:45:52', '2024-04-21 21:45:52'),
(10, 19, 9, '2024-04-22', '2024-04-29', 'Dipinjam', '2024-04-22 02:48:13', '2024-04-22 02:48:13'),
(11, 20, 9, '2024-04-23', '2024-04-23', 'Dikembalikan', '2024-04-22 20:12:27', '2024-04-22 20:12:58'),
(12, 20, 2, '2024-04-23', '2024-04-23', 'Dikembalikan', '2024-04-22 20:50:02', '2024-04-22 20:50:43'),
(13, 20, 5, '2024-04-23', '2024-04-23', 'Dikembalikan', '2024-04-23 06:51:50', '2024-04-23 06:52:01'),
(14, 20, 5, '2024-04-23', '2024-04-23', 'Dikembalikan', '2024-04-23 06:55:29', '2024-04-23 06:55:37');

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `cek_tanggal_kembali` BEFORE INSERT ON `peminjaman` FOR EACH ROW BEGIN
    IF NEW.tanggalkembali < NEW.tanggalpinjam THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Tanggal kembali harus setelah tanggal pinjam';
    END IF;
END
$$
DELIMITER ;

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
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `bukuid` bigint(20) UNSIGNED NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `userid`, `bukuid`, `ulasan`, `rating`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'b ajah sih', 3, '2024-02-27 03:16:40', '2024-02-27 03:16:40'),
(2, 2, 4, 'jelek buku luh', 1, '2024-02-27 20:35:13', '2024-02-27 20:35:13'),
(3, 14, 3, 'rekomen parah dah ni buku.', 5, '2024-02-28 23:35:24', '2024-02-28 23:35:24'),
(4, 2, 3, 'uwelekk', 1, '2024-03-11 22:13:23', '2024-03-11 22:13:23'),
(5, 2, 3, 'b aja', 3, '2024-03-11 22:21:02', '2024-03-11 22:21:02'),
(6, 3, 2, 'rekomen parahh', 5, '2024-03-11 23:00:11', '2024-03-11 23:00:11'),
(7, 3, 4, 'keren dah', 4, '2024-03-14 18:41:19', '2024-03-14 18:41:19'),
(8, 3, 5, 'jeleek', 1, '2024-03-14 18:41:49', '2024-03-14 18:41:49'),
(9, 20, 9, 'luar biasa keren', 5, '2024-04-22 20:13:20', '2024-04-22 20:13:20'),
(10, 20, 2, 'jelek', 2, '2024-04-22 20:51:24', '2024-04-22 20:51:24'),
(11, 20, 5, 'luar biasa bagus', 1, '2024-04-23 06:52:15', '2024-04-23 06:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` enum('admin','petugas','tamu') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `namalengkap`, `alamat`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin1', 'admin@tes.email', NULL, '$2y$12$Kzkxav19xS5WUiE/CwCvNOJJhczjXUmmzCjVRQVkFmphu5LbBFOlK', 'admin satu', 'ada\r\n', 'admin', NULL, '2024-02-18 18:45:18', '2024-02-18 18:45:18'),
(3, 'admin2', 'admin@tes2.email', NULL, '$2y$12$wOYyibGfnQ8gMZhFGE00LOLVhxgGoXicdb3uKpnoq4Pwig6hv01rO', 'admin dua', 'daa', 'admin', NULL, '2024-02-19 19:06:18', '2024-02-19 19:06:18'),
(13, 'Zayn', 'malik@email.test', NULL, '$2y$12$xhfmY8mvBdxeEqVL0J/wFO2xEL0e8UDvh60vjO8YkHBEdM37u4L9e', 'zayn malik', 'amerika\r\n', 'tamu', NULL, '2024-02-21 23:30:50', '2024-02-21 23:30:50'),
(14, 'jono01', 'jono@tes.email', NULL, '$2y$12$Unal40ILuF1gzIO6ZWztW.pqAYwiSHA4cGUHob9NqlNsmnEDPHrjO', 'jono lucu', 'gatau', 'tamu', NULL, '2024-02-28 21:12:52', '2024-02-28 21:12:52'),
(15, 'jojo01', 'wowo@email.tes', NULL, '$2y$12$mBy4j58pJay1lDH./KwhEOlZKtfpJ95HHG5RjvY9cXauGQv1/4SqO', 'wowolucuk', 'jabon', 'petugas', NULL, '2024-03-13 18:04:52', '2024-03-13 18:04:52'),
(17, 'pak owi', 'owi123@email.tes', NULL, '$2y$12$QYvISwGz81YyGZ3uWC46JO/Os5tk6vUj3nNtF3BM2j088Re10Nnla', 'Owi Owi', 'sekolah tunas media', 'petugas', NULL, '2024-04-21 20:53:10', '2024-04-21 20:53:10'),
(18, 'Kucing', 'kucinglala@email.tes', NULL, '$2y$12$RqusRYje59JX.sTandMh/O8uqWgDPkJEhtetTpwsmDUyhl3NnCRxi', 'kucing ilyasa', 'ada', 'tamu', NULL, '2024-04-21 20:55:47', '2024-04-21 20:55:47'),
(19, 'bangku', 'bangku@email.tes', NULL, '$2y$12$VPWeg6QswA4f1YiXwGXO.OcP8qF4KtlVw6fZ9iNV5tx7JPav41s.e', 'bangku', 'bangku', 'petugas', NULL, '2024-04-21 21:04:11', '2024-04-21 21:04:11'),
(20, 'fathoni01', 'fathoni@email.tes', NULL, '$2y$12$cTzV1Z7w4CPVwJ.VWxih3ujEgbyAZByCB1/nWLYOXxlLHtnOneMnO', 'fathoni adam', 'ada', 'tamu', NULL, '2024-04-22 20:11:52', '2024-04-22 20:11:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_relasi`
--
ALTER TABLE `kategori_relasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_relasi_bukuid_foreign` (`bukuid`),
  ADD KEY `kategori_relasi_kategoriid_foreign` (`kategoriid`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koleksi_userid_foreign` (`userid`),
  ADD KEY `bukuid` (`bukuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_userid_foreign` (`userid`),
  ADD KEY `peminjaman_bukuid_foreign` (`bukuid`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasan_userid_foreign` (`userid`),
  ADD KEY `bukuid` (`bukuid`);

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
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_relasi`
--
ALTER TABLE `kategori_relasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_relasi`
--
ALTER TABLE `kategori_relasi`
  ADD CONSTRAINT `kategori_relasi_bukuid_foreign` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `kategori_relasi_kategoriid_foreign` FOREIGN KEY (`kategoriid`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD CONSTRAINT `koleksi_ibfk_1` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `koleksi_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_bukuid_foreign` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `peminjaman_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `ulasan_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
