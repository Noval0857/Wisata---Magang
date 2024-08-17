-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 17 Agu 2024 pada 16.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`) VALUES
(1, 'Alam'),
(2, 'Religi'),
(4, 'Kuliner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `konten` text DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `wisata_id`, `konten`, `approved`, `created_at`, `updated_at`) VALUES
(18, 9, 22, 'tes', 1, '2024-08-04 13:27:36', '2024-08-04 13:31:11'),
(19, 9, 22, 'halllloooww', 1, '2024-08-05 20:49:08', '2024-08-05 20:49:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `foto_wisatas`
--

CREATE TABLE `foto_wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `nama_foto_wisata` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `foto_wisatas`
--

INSERT INTO `foto_wisatas` (`id`, `wisata_id`, `nama_foto_wisata`, `path`, `created_at`, `updated_at`) VALUES
(24, 22, '1720609748-gW1qn7I3QuABb7tf8pHTy3PRCmGH4tGGoulbulLA.jpg', 'fotos/1720609748-gW1qn7I3QuABb7tf8pHTy3PRCmGH4tGGoulbulLA.jpg', '2024-07-10 04:09:08', '2024-07-10 04:09:08'),
(27, 22, '1720659582-5cVLQHTdNjqekOcFuyJLQdkbF39QROKcYzqzhNFo.png', 'fotos/1720659582-5cVLQHTdNjqekOcFuyJLQdkbF39QROKcYzqzhNFo.png', '2024-07-10 17:59:42', '2024-07-10 17:59:42'),
(28, 22, '1720659620-RqtP6JBKAu0ULmcIfEoBfvXsfsq5Bmo60n0m7hWt.png', 'fotos/1720659620-RqtP6JBKAu0ULmcIfEoBfvXsfsq5Bmo60n0m7hWt.png', '2024-07-10 18:00:20', '2024-07-10 18:00:20'),
(40, 33, '1722956588-TvY2SgYE3qLaVCEMRQ7QmH3EQa6QZjdrdMUA7D9g.jpg', 'fotos/1722956588-TvY2SgYE3qLaVCEMRQ7QmH3EQa6QZjdrdMUA7D9g.jpg', '2024-08-06 08:03:08', '2024-08-06 08:03:08'),
(41, 34, '1722957134-8VvgvzcgLIhTQ4EXtWKqq2KRJD4Y6i4JdDfD4oY5.jpg', 'fotos/1722957134-8VvgvzcgLIhTQ4EXtWKqq2KRJD4Y6i4JdDfD4oY5.jpg', '2024-08-06 08:12:14', '2024-08-06 08:12:14'),
(42, 35, '1722958121-qgOaO12pU2K5YnHZUPWI3IpYi7B31i9cwkfp4JM4.jpg', 'fotos/1722958121-qgOaO12pU2K5YnHZUPWI3IpYi7B31i9cwkfp4JM4.jpg', '2024-08-06 08:28:41', '2024-08-06 08:28:41'),
(43, 36, '1722958302-6aq17Lu0LGskP9vMu31VbZzILVq6My866cXO8gje.jpg', 'fotos/1722958302-6aq17Lu0LGskP9vMu31VbZzILVq6My866cXO8gje.jpg', '2024-08-06 08:31:42', '2024-08-06 08:31:42'),
(44, 35, '1722958362-RhF2ypnNFwTzxGiKrGd7PCduOb0E4BPgH0dMU9kT.jpg', 'fotos/1722958362-RhF2ypnNFwTzxGiKrGd7PCduOb0E4BPgH0dMU9kT.jpg', '2024-08-06 08:32:42', '2024-08-06 08:32:42'),
(45, 35, '1722958378-Qq2GV3DqADnnTB9IQDKx7d9DrPyZr76eSJKKDS7C.jpg', 'fotos/1722958378-Qq2GV3DqADnnTB9IQDKx7d9DrPyZr76eSJKKDS7C.jpg', '2024-08-06 08:32:58', '2024-08-06 08:32:58'),
(46, 36, '1722958399-NdNbszuhzt0dl4AXNQwpJMjePmbh7G9LkneX8c4X.jpg', 'fotos/1722958399-NdNbszuhzt0dl4AXNQwpJMjePmbh7G9LkneX8c4X.jpg', '2024-08-06 08:33:19', '2024-08-06 08:33:19'),
(47, 33, '1722958419-1pczxltBnQdPOBzI3FAmnY1lshvtjMZoxCQEYMIf.jpg', 'fotos/1722958419-1pczxltBnQdPOBzI3FAmnY1lshvtjMZoxCQEYMIf.jpg', '2024-08-06 08:33:39', '2024-08-06 08:33:39'),
(48, 34, '1722958436-REECqwlOSxvFtJxrjAUbEDFcZKbE9XAa6brnSjz2.jpg', 'fotos/1722958436-REECqwlOSxvFtJxrjAUbEDFcZKbE9XAa6brnSjz2.jpg', '2024-08-06 08:33:56', '2024-08-06 08:33:56'),
(49, 35, '1722958645-6BgYXjD2AIxIhKEvRNBGD2SO4pfdxsqRSZ1UZ9mJ.jpg', 'fotos/1722958645-6BgYXjD2AIxIhKEvRNBGD2SO4pfdxsqRSZ1UZ9mJ.jpg', '2024-08-06 08:37:25', '2024-08-06 08:37:25'),
(54, 38, '1723101853-ojGMvzs9JcNhpVCzXug8FFwkAPUV76MflbS4iKCf.jpg', 'fotos/1723101853-ojGMvzs9JcNhpVCzXug8FFwkAPUV76MflbS4iKCf.jpg', '2024-08-08 00:24:13', '2024-08-08 00:24:13'),
(55, 39, '1723102674-gAmj4W1qmpLvFdC7DvRtzlIQDwx0c4bN9yrbNQvX.jpg', 'fotos/1723102674-gAmj4W1qmpLvFdC7DvRtzlIQDwx0c4bN9yrbNQvX.jpg', '2024-08-08 00:37:54', '2024-08-08 00:37:54'),
(56, 40, '1723102846-keuPY5AWMWo2m5QEa4XidTjtXHbjDpbRWAt5DzUY.jpg', 'fotos/1723102846-keuPY5AWMWo2m5QEa4XidTjtXHbjDpbRWAt5DzUY.jpg', '2024-08-08 00:40:46', '2024-08-08 00:40:46'),
(57, 41, '1723103155-qiN7pwdX0C8g4eSdWpaIw2ppztXprFOjFaIiuKtO.jpg', 'fotos/1723103155-qiN7pwdX0C8g4eSdWpaIw2ppztXprFOjFaIiuKtO.jpg', '2024-08-08 00:45:55', '2024-08-08 00:45:55'),
(58, 42, '1723103725-FGx55GmhZSQYdzFuHbx8Q5y12MuKLbGGXx2c0NUO.jpg', 'fotos/1723103725-FGx55GmhZSQYdzFuHbx8Q5y12MuKLbGGXx2c0NUO.jpg', '2024-08-08 00:55:25', '2024-08-08 00:55:25'),
(59, 43, '1723394720-iMn2n0nKAF3UXRyAQTyUMXcssdMOkWsLGvmIqwlq.jpg', 'fotos/1723394720-iMn2n0nKAF3UXRyAQTyUMXcssdMOkWsLGvmIqwlq.jpg', '2024-08-11 09:45:20', '2024-08-11 09:45:20'),
(60, 44, '1723394953-CLv98HpUYvC3El3k0g17RISbuE4PY9ou83agmPEg.jpg', 'fotos/1723394953-CLv98HpUYvC3El3k0g17RISbuE4PY9ou83agmPEg.jpg', '2024-08-11 09:49:13', '2024-08-11 09:49:13'),
(61, 45, '1723395254-9sYifo9OafQgBfquSSB186ehykYFI9Eya8DvcyOB.jpg', 'fotos/1723395254-9sYifo9OafQgBfquSSB186ehykYFI9Eya8DvcyOB.jpg', '2024-08-11 09:54:14', '2024-08-11 09:54:14'),
(62, 46, '1723395483-PvQXVejjdI3SURYA8TNbLa7x9HiVcFeghIpttHhy.jpg', 'fotos/1723395483-PvQXVejjdI3SURYA8TNbLa7x9HiVcFeghIpttHhy.jpg', '2024-08-11 09:58:03', '2024-08-11 09:58:03'),
(63, 47, '1723395705-blwawnEhiy29Mfr1nLAijxfbHLox3lFUPUwqnL0V.jpg', 'fotos/1723395705-blwawnEhiy29Mfr1nLAijxfbHLox3lFUPUwqnL0V.jpg', '2024-08-11 10:01:45', '2024-08-11 10:01:45'),
(64, 48, '1723508104-IjeeZgHMja9s8Jd475wxBvGf1likZaIrcBtCjWDC.jpg', 'fotos/1723508104-IjeeZgHMja9s8Jd475wxBvGf1likZaIrcBtCjWDC.jpg', '2024-08-12 17:15:04', '2024-08-12 17:15:04'),
(65, 49, '1723508599-yLLWDycRRpUteJlrKFy9Zb2UT84dRZWcBmOGLvZb.jpg', 'fotos/1723508599-yLLWDycRRpUteJlrKFy9Zb2UT84dRZWcBmOGLvZb.jpg', '2024-08-12 17:23:19', '2024-08-12 17:23:19'),
(66, 50, '1723508835-pBWSBoKNR8axRU2T6fJ2lMKVNLGvKnnIeZO3W6GP.jpg', 'fotos/1723508835-pBWSBoKNR8axRU2T6fJ2lMKVNLGvKnnIeZO3W6GP.jpg', '2024-08-12 17:27:15', '2024-08-12 17:27:15'),
(67, 51, '1723520633-ET0WTwmvq203G4U3h5iij9YdcFBKqXb2rcll9hCu.jpg', 'fotos/1723520633-ET0WTwmvq203G4U3h5iij9YdcFBKqXb2rcll9hCu.jpg', '2024-08-12 20:43:53', '2024-08-12 20:43:53'),
(68, 52, '1723520990-Iyhc4DQKQjhh4129jlRj5DuSZI4inZljXhAdIxx0.jpg', 'fotos/1723520990-Iyhc4DQKQjhh4129jlRj5DuSZI4inZljXhAdIxx0.jpg', '2024-08-12 20:49:50', '2024-08-12 20:49:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_05_20_004011_create_sessions_table', 1),
(4, '2024_05_20_072505_create_posts_table', 1),
(5, '2024_05_21_050323_category', 1),
(6, '2024_05_21_050540_wisata', 1),
(7, '2024_05_22_061324_user', 1),
(8, '2024_05_29_041510_foto_wisata', 1),
(9, '2024_06_10_010434_comment', 2),
(10, '2024_06_26_053219_user_profile', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cJoAXxePPyrmFl5HB3vTnklLvgc05rKANkw9kyjw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR3ZiNlZFWWtGbGcyVXY1a1VTbkdFWFY3cElqcjhWREpXZTBVSEpwSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1723522477),
('ghxXQx2PnfXC2SovAu4DYhsTIO0CbJd7fT7W639M', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY3NZYzV0cXE2YjJrdmNUdkdBQ2QxZWRzZmlXSmNEQjZWMlZobDI0biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1723697195),
('Q1QnDvibfc8BslxvDiMb3ZKLOqMW7vmYERgBGPaF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRmtiN1pPNVVrSkRYWXFsa1NnRmdqM0VmSHFVdFI3MVRqaXJZSWRSdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXRhLXdpc2F0YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1723508849);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(225) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_profil` varchar(225) DEFAULT NULL,
  `password_reset_token` varchar(225) DEFAULT NULL,
  `password_reset_token_created_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `email_verified_at`, `role`, `password`, `alamat`, `telepon`, `tanggal_lahir`, `foto_profil`, `password_reset_token`, `password_reset_token_created_at`, `created_at`, `updated_at`) VALUES
(1, '', 'admin@gmail.com', NULL, 'admin', '$argon2id$v=19$m=65536,t=4,p=1$TDlsY1J6M204QzV0WExuZA$k/LYFt8sTN6PpIH7Psi65oSdO1m9G9HZc3c3CzM4w2E', NULL, '', NULL, '', NULL, NULL, '2024-06-30 20:52:45', '2024-06-30 20:52:45'),
(9, 'nana', 'mhmmdnoval021@gmail.com', NULL, 'umum', '$argon2id$v=19$m=65536,t=4,p=1$SGJRVmF6QUVOZEhJbUxSUA$cmk2DwR0sJ84z4IyjejYxZOLwtPum8zk8mxiLDiU3YU', NULL, '085751603193', '2024-08-05', NULL, 'o1pskU8I8wTsAnPa7YlZWzs88ciZWtmUvXjT4bfQ3dNLUotnfyBATm4bpvLP', '2024-08-04 13:42:19', '2024-08-04 13:27:03', '2024-08-04 13:42:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `nama_lengkap`, `alamat`, `telepon`, `tanggal_lahir`, `foto_profil`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, NULL, NULL, NULL, NULL, '2024-07-02 19:16:26', '2024-07-02 19:16:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisatas`
--

CREATE TABLE `wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `google_maps_url` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wisatas`
--

INSERT INTO `wisatas` (`id`, `category_id`, `nama_wisata`, `deskripsi`, `alamat`, `google_maps_url`) VALUES
(22, 1, 'MENARA PANDANG', '<p>Ke Banjarmasin tidak afdol kiranya jika tidak mengunjungi Menara Pandang. Bangunan tinggi dan bercorak khas Banjar ini merupakan ikon Banjarmasin dan menjadi tempat favorit masyarakat bersantai pagi dan sore dengan pemandangan sungai Martapura yang membelah dua kawasan di kota Banjarmasin.</p><p>&nbsp;</p><p>Menara Pandang sendiri diresmikan pada zaman Walikota Banjarmasin, H.Muhidin (sekarang Wakil Gubernur Kalsel Periode 2021-2024) pada tahun 2014 silam. Destinasi wisata yang terletak di pinggir Sungai Martapura ini, menyuguhkan pemandangan lanskap ibukota Kalimantan Selatan dan sekitarnya yang luar biasa serta jarang ditemukan di tempat lainnya.</p><p>&nbsp;</p><p>Menara bisa terlihat dari berbagai sudut Jalan Sudirman dan Piere Tendean Banjarmasin. Dua kawasan ini dibelah sungai Martapura nan indah. Bangunan yang berdiri kokoh dibangun dengan memiliki empat lantau, Lantai dua dan tiga pengujung bisa menikmati pemandangan aktivitas di sungai Martapura, sembari menyaksikan juga view indah bangunan di sekitarnya mulai Masjid Raya Sabilal Muhtadin, hotel legend Batung Batulis, Korem 101 Antasari, Kantor Gubernuran lama hingga Taman Nol Kilometer Banjarmasin.</p><p>&nbsp;</p><p>Menara pandang selain tempat bersantai, kawasan ini juga menjadi pusat keramaian di Banjarmasin. Karena hampir sebagian besar event-event nasional dan lokal digelar kawasan ini, seperti Banjarmasin Sasirangan Festival salah satu event yang mengangkat seni dan budaya, termasuk fesyen dan kreasi-kreasi berbahan dasar&nbsp;Sasirangan.</p><p>&nbsp;</p><p>Menara Pandang biasanya ramai dikunjungi masyarakat dan wisatawan pada hari Sabtu dan Minggu, terlebih di dekatnya ada Pasar Terapung Buatan (miniatur pasar terapung Muara Kuin Banjarmasin dan Lok Baintan Kabupaten Banjar). Tak hanya itu bagi wisatawan yang melakukan perjalanan wisata susur sungai, kawasan Menara Pandang adalah salah satu rute yang dilintasi kelotok-kelotok (perahu bermesin).</p><p>&nbsp;</p><p>Di lantai dua gedung Menara Pandang wisatawan bisa menyaksikan Banjarmasin Tempoe Doeloe lewat pameran foto-foto lawas yang khusus dipersembahkan bagi wisatawan yang berkunjung ke Banjarmasin. Foto-foto yang mengangkat historis sejarah Banjarmasin pada masanya menjadi salah satu museum foto yang sering dikunjungi wisatawan mancanegara.</p><p>&nbsp;</p><p>Menara Pandang sendiri berada di tengah pusat Kota Banjarmasin, sehingga sangat muda diakses dari berbagai kawasan.Berade di kawasan Banjarmasin Tengah membuat ikon wisata Banjarmasin menjadi rute wajib bagi mereka traveling dan melakukan perjalanan khusus Kota&nbsp;Seribu&nbsp;Sungai.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1341932242963!2d114.59054857480997!3d-3.316989296657841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423c1879e1fb1%3A0xc531a6a5acab5a0!2sMenara%20Pandang%20Banjarmasin!5e0!3m2!1sid!2sid!4v1720659683087!5m2!1sid!2sid'),
(33, 1, 'PATUNG BAKANTAN', '<p>Salah satu ikonik wisata di Banjarmasin adalah Patung Bekantan. Patung yang dibuat menggunakan bahan dasar perunggu dengan biaya Rp. 2,6 Miliar dan memiliki bobot mencapai 7 ton, menjadi salah satu destinasi wisata unggulan di Banjarmasin. Terletak di kawasan Siring Piere Tendean Banjarmasin dan berseberangan dengan Taher Square dan Jembatan Dewi (eks Bioskop Dewi). Letaknya yang juga berada di bantaran sungai Martapura membuat patung yang dibuat seniman patung dari Studio Patung Suwarto dari Jogjakarta, selalu dikunjungi wisatawan untuk berswafoto.&nbsp;Apalagi kawasan water front city Banjarmasin sangat instagramable&nbsp;untuk&nbsp;berfoto.</p><p>&nbsp;</p><p>Patung Bekantan merupakan hasil dari sayembara desain maskot yang dimenangkan oleh Fajar Noor Ichsan dan Rachmat Ramadhan pada tahun 2011, lalu mengalami penyesuaian dan diresmikan tanggal 10 Oktober 2015 dan menjadi salah satu destinasi ikonik kota Banjarmasin. Keberadaannya pun tak kalah dengan patung Merlion di Singapura, yang menyemburkan air dari mulutnya.Patung Bekantan sendiri merupakan refleksi terhadap upaya pelestarian hewan primata asal Kalimantan yang dikenal dengan nama latin Nasalis Larvatus.</p><p>&nbsp;</p><p>Patung ini dibuat dengan posisi duduk dengan menggaruk kepala, sedangkan tangannya yang lain memegang serentengan buah rambai. Tanaman buah ini merupakan buah khas hutan Kalimantan dan makanan favorit&nbsp;hewan&nbsp;Bekantan.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3848.2698311282643!2d114.59447672035257!3d-3.3217828203206468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423c926b766e9%3A0xbca253ca873e42d0!2sPatung%20Bakantan!5e1!3m2!1sid!2sid!4v1720661437287!5m2!1sid!2sid'),
(34, 4, 'WARUNG SOTO PAHLAWAN', '<p>Banyak kuliner khas Banjarmasin yang patut kita coba saat berlibur ke kota Seribu Sungai. Salah satu tempat wisata kuliner di Banjarmasin yang sayang untuk dilewatkan adalah Warung Soto dan. Soto ini sudah ada sejak 40 tahun lalu dan tidak hanya Soto Banjar saja, disini juga terdapat berbagai jenis masakan lainnya, ada juga sate ayam bumbu kacang yang bisa jadi tambahan lauk. Empuknya sate yang dibalur bumbu kacang ditambah segarnya kuah soto, menambah cita rasa yang membuat mulut tidak bisa berhenti&nbsp;mengunyah.</p><p>&nbsp;</p><p>Dan tidak ketinggalan juga ada Kue khas banjar yaitu Babongko yang dijual disini dengan berbagai varian seperti Gula Merah, Sagu dan Pisang.</p><p>&nbsp;</p><p>Lokasi Warung Soto Pahlawan berada di Jl. Pahlawan Kampung Melayu Banjarmasin. Jam Buka: 07.30-17.00&nbsp;WITA</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1502339663766!2d114.5942818748099!3d-3.3130056966618358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423eab82e41e9%3A0x725182de242186f9!2sWarung%20Soto%20Sate%20Pahlawan!5e0!3m2!1sid!2sid!4v1722956484385!5m2!1sid!2sid'),
(35, 2, 'KUBAH HABIB BASIRIH', '<p>Banjarmasin dikenal juga sebagai kota yang memiliki destinasi wisata religi. Salah satunya adalah Kubah Habib Basirih, yang merupakan salah satu makam ulama terkenal di Banjarmasin yakni Habib Hamid Bin Abbas Bahasyim atau yang dikenal dengan Habib Basirih. Kubah Basirih salah satu destinasi wisata yang religi yang paling sering dikunjungi dan diziarah masyarakat. Tak hanya dari Banjarmasin namun juga dari berbagai kota di Indonesia, termasuk negara jiran Malaysia dan Singapura.Makam keramat seorang ulama yang terkenal pada zamannya berada di Kelurahan Basirih, Kecamatan Banjarmasin Barat, Banjarmasin.</p><p>&nbsp;</p><p>Kubah Basirih sendiri adalah makam keramat seorang ulama yang dikenal memiliki sifat khasnya menyembunykan diri dalam khalwatnya dengan meninggalkan keluarga sehingga fokus dalam beribadah.Ulama yang dipanggil Habib Basirih ini dikenal memiliki karomah, sehingga banyak masyarakat dan wisatawan yang datang untuk berziarah ke makamnya, yang berada di bantaran Sungai Martapura. Untuk ke lokasi ini bisa melalui jalan darat bisa pula melalui jalur sungai.</p><p>&nbsp;</p><p>Salah satu yang menarik dari Makam keturunan atau zuriat dengan Nabi Muhammad SAW sebagai generasi ke-31 adalah arsitektur bangunan kubahnya yang didominasi warna hijau dan putih. Jika dilihat bentuk bangunan yang mengelilingi makam Habib Basirih ini adalah bentuknya yang segu enam, yang menyimbolkan enam rukun iman dalam agama Islam.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.0164823406467!2d114.56209812481016!3d-3.3460769966286774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4219c19718461%3A0xa7937a579164cd56!2sKubah%20Habib%20Hamid%20Bahasyim%20(Shohibul%20Basirih)!5e0!3m2!1sid!2sid!4v1722957681408!5m2!1sid!2sid'),
(36, 2, 'MAKAM SULTAN SURIANSYAH', '<p>Selain makam Habib Basirih, wisata religi lainnya di Banjarmasin adalah ziarah ke makam Sultan Suriansyah, di kawasan Alalak Utara, Kecamatan Banjarmasin Utara, Kota Banjamasin.Makam ini terletak di tepi sungai Kuin dan lokasinya berdekatan sekali dengan Masjid Sultan Suriansyah.</p><p>&nbsp;</p><p>Sultan Suriansyah adalah raja Banjar pertama yang memeluk agama islam. Beliau adalah cucu dari Maharaja Sukamara (Raja Kerajaan Negara Daha). Negara Daha adalah kerajaan bercorak Hindu sebelum lahirnya Kesultanan&nbsp;Banjar.</p><p>&nbsp;</p><p>Semasa kecil dikenal dengan sebutan Raden Samudera atau Pangeran Samudera. Pangeran Samudera setelah setelah memeluk Islam namanya menjadi Sultan Suriansyah. Sultan Suriansyah sendiri bergelar Panembahan atau Susuhunan Batu Habang, memerintah kerajaan Banjar dari tahun 1526 hingga 1550.</p><p>&nbsp;</p><p>Selain Sultan Suriansyah, di komplek pemakaman ini terdapat pula makam keluarga Sultan Banjar, termasuk makam anak seorang China, hingga hulubalangan kerajaan Makam Suriansyah salah satu makam yang banyak dikunjungi para peziaran wisatawan dari berbagai kota hingga dari&nbsp;luar&nbsp;negeri.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.2290695832708!2d114.56999807480985!3d-3.2933574966815446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4230022aa2ed1%3A0x98fc429df1658a8d!2sKompleks%20Makam%20Sultan%20Suriansyah!5e0!3m2!1sid!2sid!4v1722957870531!5m2!1sid!2sid'),
(38, 1, 'RUMAH ANNO 1925', '<p>Berwisata ke Kawasan Siring Tendean Banjarmasin, wisatawan tak hanya bisa menikmati Menara Pandang yang menjadi salah satu ikon Banjarmasin. Namun di sisi lain juga wisatawan bisa mengunjungi bangunan unik bernilai sejarah, namanya Rumah Anno 1925. Dulunya ini adalah bangunan tua yang dibangun pada masa kolonial Belanda. Rumah Anno sendiri merupakan bangunan yang mampu bertahan lebih dari 50 tahun termasuk dalam kategori pusaka. Rumah panggung ini berjenis palimasan, salah satu varian rumah tradisional khas suku Banjar, dengan identik dengan atap yang berbentuk limas.</p><p>&nbsp;</p><p>Di rumah Anno wisatawan bisa melihat bangunan tua yang sudah mendapat sentuhan untuk menjaga historis sejarahnya. Di lantai dua ada ruangan galeri tempat memamerkan produk- produk khas Banjar, seperti Kain Sasirangan, kain khas Kalimantan Selatan, Tanggui dan beragam olahan asli masyarakat kota Seribu Sungai.</p><p>&nbsp;</p><p>Tak hanya sebagai bangunan heritige, Rumah Anno sering digunakan sebagai tempat pertemuan, seminar dan workshop, pameran foto. Rumah Anno 1925 adalah salah satu bangunan bersejarah yang sering dikunjungi wisatawan nusantara dan&nbsp;mancanegara.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.131179915326!2d114.59064817480997!3d-3.317737096657088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4231dc173d6d9%3A0x9c39e3b639bf880f!2sRumah%20Anno%201925!5e0!3m2!1sid!2sid!4v1722954599179!5m2!1sid!2sid'),
(39, 1, 'KAMPUNG BIRU', '<p>Selain Kampung Hijau, di Banjarmasin ada pula Kampung Biru, Kampung ikonik merupakankawasan perkampungan lama yang ditata dengan apik sebagai pengembangan kampung di bantaran Sungai Martapura oleh Pemerintah Kota Banjarmasin. Sejak tahun 2017 kawasan ini ditata menjadi kawasan yang terlihat indah dan bersih. Pengembangan kampung ini bertujuan mengurangi kebiasaan masyarakat membuang sampah di sungai.</p><p>&nbsp;</p><p>Kampung Biru sendiri salah satu destinasi dari rangkaian wisata susur sungai yang ada di Banjarmasin. Bahkan Kampung ini masuk dalam agenda Festival Kampung Banjarmasin atau Banjarmasin Village Festival yang dimulai sejak tahun 2022. Bersama Kampung Hijau, Kampung Arab, Kampung Biuku, kampung ini juga masuk dalam rangkaian khusus wisata susur sungai yang dikembangkan Pemerintah Kota Banjarmasin.</p><p>&nbsp;</p><p>Bagi wisatawan mengunjungi Kampung Biru yang berdatan dengan Kampung Hijau menjadi pilihan menarik saat berwisata susur sungai Banjarmasin. Selain melihat dari dekat rumah warna yang dicat khusus biru dan hijau, wisatawan bisa pula menikmati jajanan ala masyarakat Banjar di warung-warung di kampung ini, seperti Buras, Pundut nasi, Soto Banjar maupun aneka olahan ikan sungai, termasuk jajanan produk UMKM setempat.</p><p>&nbsp;</p><p>Untuk menuju kampung ini bisa diakses melalui sungai bisa pula melalui jalan darat. Biasanya wisatawan menggunakan sepeda maupun kendaraan roda dua.Jaraknya yang dekat pusat kota membuat Kampung Biru dan Kampung Hijau menjadi pilihan berwisata tempo doeloe&nbsp;ke&nbsp;Banjarmasin.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.137442745788!2d114.59778547772544!3d-3.316182688043188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de42395974e6961%3A0xe5df512b7e8f48d3!2sWisata%20Kampung%20Biru!5e0!3m2!1sid!2sid!4v1722955180191!5m2!1sid!2sid'),
(40, 4, 'KETUPAT KANDANGAN HJ. MURSINAH', '<p>Meskipun ketupat Kandangan berasal dari Kandangan, namun di Banjarmasin juga terdapat warung yang menjual katupat Kandangan enak dan selalu dicari wisatawan yaitu \"Ketupat Kondangan Hj. Mursinah. Jadi untuk teman-teman yang ingin mencicipi ketupat Kandangan dan enggak sempat ke Kandangan karena harus menghabiskan waktu 4 jam untuk ke sana, warung ketupat Kandangan Hj. Mursinah bisa menjadi solusi untuk teman-teman yang ingin sekali mencicipi lezatnya ketupat Kandangan.</p><p>&nbsp;</p><p>Ketupat Kandangan Hj. Mursinah merupakan salah satu yang melegenda di Banjarmasin. Tempat ini telah dirintis sejak tahun 1965. Penggagasnya tak lain adalah Hj. Mursinah yang awalnya berjualan ketupat bersama dengan mertuanya, sebelum kemudian&nbsp;memutuskan berdagang mandiri.</p><p>&nbsp;</p><p>Citarasa dan tampilan ketupat di sini begitu menggugah selera, Teman Traveler bakal dibuat kekenyangan sekaligus kegirangan saat mencobanya. Ketupat Kandangan Hj. Mursinah bisa kalian kunjungi di Jl. Cendrawasih RT/RW: 29/7, Banjarmasin.</p><p>&nbsp;</p><p>Tempatnya memang sederhana, namun citarasa ketupat kandangan di sini bisa memuaskan perut yang tengah kelaparan. Cobalah sensasi berbeda menikmati seporsi ketupat yang diremas, dimasukkan dalam kuah santan, dan dimakan menggunakan tangan serta ditambah sambal acan (terasi), sensasi kelezatannya bakal bikin lidah bergoyang. Wajib Teman Traveler coba jika berkunjung&nbsp;ke&nbsp;Banjarmasin.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1643597488387!2d114.5767723748097!3d-3.3094936966653394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423b12c5e8d5f%3A0xf751cbe08e4ddd7d!2sKetupat%20Kandangan%20HJ%20Mursinah!5e0!3m2!1sid!2sid!4v1722956145362!5m2!1sid!2sid'),
(41, 1, 'KAMPUNG SASIRANGAN SUNGAI JINGAH', '<p>Tak hanya dikenal sebagai salah satu perkampungan asli masyarakat suku Banjar, Sungai Jingah belakangan ini juga dikenal sebagai kampung Sasirangan. Itu karena di kampung ini sebagian besar masyarakatnya masih melestarikan pembuatan kain Sasirangan, sebuah kain khas Banjar di Kalimantan Selatan. Untuk melihat perkampungan sentra sasirangan ini, wisatawan terlebih dahulu menyusuri kampung yang disekelingnya masih terdapat rumah-rumah adat Banjar tempo dulu serta Makam Syekh Jamaluddin Al-Banjari atau yang dikenal dengan sebutan Surgi</p><p>&nbsp;</p><p>Sungai Jingah sendiri dikenal sebagai kampung yang masih menjaga kearifan lokal dan mempertahankan kerajinan pembuat kain sasirangan.Terbukti sejak tiga puluh tahun silam kerajinan kain sasirangan tetap dipertahankan dan seiring waktu Sungai Jingah pun berkembang menjadi Kampung Sasirangan.</p><p>&nbsp;</p><p>Di kampung ini selain berbelanja produk berbahan dasar kain sasirangan, wisatawan juga bisa melihat langsung proses pembuatan kain celupan ala Banjar. Bahkan wisatawan pun bisa memperaktekkan langsung proses pembuatan kain sasirangan yang dipandu langsung para pengrajin, yang sebagian besar adalah ibu-ibu rumah tangga kampung tersebut. Untuk menuju ke lokasi bisa ditempuh menggunakan jalan darat dan bisa pula menggunakan jalur sungai. Jika menggunakan kelotok berangkat bisa dimulai dari dermaga Pasar Terapung Siring Tendean. Kawasan Sungai Jingah juga merupakan perlintasan rute wisata susur sungai menuju Pasar Terapung&nbsp;Lok&nbsp;Baintan.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15932.598561462923!2d114.60801577567682!3d-3.313153198253282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de42324e0e6476f%3A0xb33de3fe4107f828!2sGaleri%20sungai%20Jingah%20ba&#39;sasirangan!5e0!3m2!1sid!2sid!4v1723103084573!5m2!1sid!2sid'),
(42, 1, 'MUSEUM WASAKA', '<p>Salah satu destinasi bersejarah lainnya di Banjarmasin adalah Museum Perjuangan Wasaka. Di museum banyak menyimpan benda-benda bersejarah yang menjadi saksi bisu perjuangan rakyat Kalimantan Selatan saat melawan kolonial Belanda. Museum kebanggaan kota Banjarmasin ini diresmikan tanggal 10 Nopember 1991, terletak di Kampung Kenanga Ulu Gang Haji Andir, Kelurahan Sungai Jingah, Kecamatan Banjarmasin Utara.</p><p>&nbsp;</p><p>Berkunjung langsung ke museum ini wisatawan bisa melihat langsung koleksi senjata tradisional hingga senjata modern. Sedikitnya ada</p><p>&nbsp;</p><p>400 benda bersejarah yang disimpan dalam museum mungil yang berada di bantaran sungai Martapura. Di museum ini pula tersimpan rapi beragam benda peninggalan semasa perang yang menyimpan sejarah.</p><p>&nbsp;</p><p>Lokasinya yang berada di kawasan penghubung Banjarmasin Utara dan Banjarmasin Timur, membuat Museum Perjuangan Wasaka (Waja Sampai Kaputing) mud diakses menggunakan jalan darat. Hanya butuh 20 menit dari jantung kota Banjarmasin, wisatawan sudah bisa mengunjungi museum&nbsp;bersejarah&nbsp;ini.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15932.746869862323!2d114.60907995878092!3d-3.3039274233221723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4238fbe7d6c91%3A0x55ec0578a268a5e1!2sMuseum%20WASAKA!5e0!3m2!1sid!2sid!4v1723103496011!5m2!1sid!2sid'),
(43, 2, 'MASJID RAYA SABILAL MUHTADIN', '<p>Masjid Raya Sabilal Muhtadin adalah sebuah masjid besar yang berada di Kota Banjarmasin, Kalimantan Selatan, Indonesia. Tepatnya di kelurahan Antasan Besar, Kecamatan Banjarmasin Tengah. Didalam kompleks mini juga terdapat kantor MUI Kalimantan Selatan. Masjid ini dibangun di tepi barat Sungai Martapura dan dibangun pada&nbsp;tahun&nbsp;1981.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.126289400183!2d114.5886695748099!3d-3.31895039665586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423c3a2fe085b%3A0xa11c32c86b5171f2!2sMasjid%20Raya%20Sabilal%20Muhtadin%20Banjarmasin!5e0!3m2!1sid!2sid!4v1723394602444!5m2!1sid!2sid'),
(44, 1, 'KAMPUNG KETUPAT', '<p>Kampung Ketupat berada di kawasan Kampung Sungai Baru, Banjarmasin Tengah. Kampung ini dikenal sebagai salah satu kampung pembuat ketupat, yang merupakan profesi turun-temurun sejak limapuluh tahun silam.</p><p>&nbsp;</p><p>Kampung Ketupat adalah kampung tematik yang ada di kota Banjarmasin dan menjadi salah satu ikon kota Banjarmasin. Keunikan dari kampung ini adalah hampir sebagian besar masyarakatnya memproduksi ketupat, termasuk orong-orong ketupat (dari daun</p><p>&nbsp;</p><p>kelapa sebelum direbus). Produksi ketupat dilakukan hampir setiap hari di kampung ini. Jika pada umumnya produksi ketupat hanya pada saat saat waktu tertentu, seperti pada saat menjelang Hari Raya Idul Fitri maupun Idul Adha, namun di Kawasan Sungai Baru berlangsung&nbsp;sepanjang&nbsp;hari.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1115494243268!2d114.59339557480996!3d-3.322604596652213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423f0cb0407bd%3A0xb33421ee21d64d05!2sKampung%20Ketupat%20Banjarmasin%20Sungai%20Baru!5e0!3m2!1sid!2sid!4v1723394454834!5m2!1sid!2sid'),
(45, 2, 'MASJID JAMI\' BANJARMASIN', '<p>Masjid Jami\' Banjarmasin atau dikenal juga sebagai Masjid Jami\' Sungai Jingah adalah sebuah masjid bersejarah di kota Banjarmasin, Kalimantan Selatan. Mesjid berarsitektur Banjar dan kolonial (indish) yang dibuat dengan bahan dasar kayu ulin ini dibangun pada tahun 1777. Walaupun termasuk di lingkungan Kelurahan Antasan Kecil Timur, masjid yang seluruh konstruksi bangunan didominasi kayu besi alias kayu ulin ini lebih identik dikenal Masjid Jami Sungai Jingah. Lokasi awal pembangunan masjid ialah di tepi Sungai Martapura, setelah masjid ini dipindahkan sekarang berada di Jalan Masjid kelurahan Antasan Kecil Timur, Kota Banjarmasin pada&nbsp;tahun&nbsp;1934.</p><p>&nbsp;</p><p>Masjid ini memiliki warna dominan hijau dan cokelat. Terdapat prasasti bertuliskan Arab-Melayu yang menandakan pendirian Masjid Jami Banjarmasin. Prasasti tersebut kini dipasang di samping mimbar. Nama lama masjid ini adalah Masjid Sungai Jingah.Kegiatan keagamaan terus berlangsung di Masjid Jami Banjarmasin. Terlebih pada bulan Ramadhan, terdapat berbagai kegiatan seperti salat tarawih berjamaah, buka puasa, tadarus Al- Quran&nbsp;dan&nbsp;sebagainya.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1761769698032!2d114.59277007480989!3d-3.3065527966683015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de42396024097fd%3A0x2238b6ccdb20493b!2sMasjid%20Jami&#39;%20Banjarmasin!5e0!3m2!1sid!2sid!4v1723395124979!5m2!1sid!2sid'),
(46, 2, 'MAKAM PANGERAN ANTASARI', '<p>Pangeran Antasari adalah salah satu Pahlawan Nasional dari Kalimantan Selatan yang turut berperang melawan Belanda untuk membela wilayah Kalimantan Selatan. Pangeran Antasari lahir di Banjarma tahun 1809. Walau seorang Ningrat ia sangat merakyat, karenanya ia sangat paham penderitaan rakyat dibawah jajahan&nbsp;Belanda.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1787307841996!2d114.59450787480999!3d-3.305916896668949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423964831aab3%3A0x5e280a07672200e6!2sKompleks%20Makam%20Pangeran%20Antasari!5e0!3m2!1sid!2sid!4v1723395381182!5m2!1sid!2sid'),
(47, 2, 'KLENTENG SOETJI NURANI', '<p>Klenteng Soetji Nurani terletak di tepi Sungai Tapekong dan Sungai Martapura, di sekitar Taman Siring Tendean. Tempat ibadah Tridma Budi Suci yang umumnya masyarakat Keturunan Cina ini merupakan salah satu Klenteng Tertua di Banjarmasin. Ornamen yang menghiasi vihara ini merupakan perpaduan ornamen arsitektur tradisional Cina dan arsitektur&nbsp;Tradisional.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.118307896452!2d114.5918525748099!3d-3.3209295966538823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423c2b93ab657%3A0x64c37277a9190cc1!2sKlenteng%20Soetji%20Nurani!5e0!3m2!1sid!2sid!4v1723395605843!5m2!1sid!2sid'),
(48, 2, 'KUBAH SURGI MUFTI', '<p>Beralamatkan jalan Sungai Jingah, Kelurahan Surgi Mufti Banjarmasin Utara Kalimantan Selatan. Kubah Surgi Mufti adalah makam seorang ulama bernama K.H Jamaluddin yang pernah menjadi mufti di Banjarmasin dan mendapat-kan sebuah gelar anumetra Surgi Mufti (almarhum Surgi) Banjar/Swangi (Jawa). Kubah berasal dari Bahasa Arab \"Qubah\" yaitu makam karena letaknya di Kelurahan Surgi Mufti makanya dinamakan Makam&nbsp;Surgi&nbsp;Mufti.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1529331792412!2d114.59688147480995!3d-3.3123348966625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423eb3322274b%3A0x464fcba0856a1b2c!2sKubah%20Syekh%20Jamaluddin%20Surgi%20Mufti!5e0!3m2!1sid!2sid!4v1723507561129!5m2!1sid!2sid'),
(49, 4, 'NASI KUNING CEMPAKA', '<p>Berbeda dengan yang ada di Jawa, nasi kuning di Banjarmasin ini berwarna kuning seperti pada umumnya, namun warnanya agak sedikit pucat dan tidak terlalu terang. Nasinya tidak pulen atau lengket, melainkan agak sedikit kempyar atau lepas karena menggunakan beras&nbsp;asli&nbsp;Banjar</p><p>&nbsp;</p><p>Di Banjar, nasi kuning hanya disajikan dengan satu lauk dan semuanya dimasak dengan bumbu habang (merah) khas Banjar.</p><p>&nbsp;</p><p>Rumah Makan Nasi Kuning Cempaka berpusat di Jalan Niaga Timur nomor 6 Banjarmasin. Rumah makan ini menyediakan nasi kuning dengan berbagai macam lauk seperti haruan, itik, ayam, daging, telur, dendeng, dan sambal&nbsp;goreng&nbsp;ati.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.097085347941!2d114.5931863!3d-3.3261865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423ddd7d00bc3%3A0xda2e8bc185698baf!2sNasi%20Kuning%20Cempaka!5e0!3m2!1sid!2sid!4v1723508456791!5m2!1sid!2sid'),
(50, 4, 'LONTONG ORARI', '<p>Mulanya, nama lontong orari berawal dari kegemaran para aktivis radio amatir yang tergabung dalam ORARI (Organisasi Radio Amatir Republik Indonesia) untuk berkumpul dan \"kopi darat\". Tidak jauh dari tempat mereka berkumpul, ada penjual lontong yang enak dan lama-kelamaan lontong ini pun diberi nama lontong orari. Berbeda dengan lontong di daerah lain, lontong yang terkenal sejak tahun 1983 ini memiliki bentuk yang unik, yakni segitiga</p><p>&nbsp;</p><p>Makanan berkuah santan ini biasanya disajikan dengan lauk ikan gabus, telur, atau ayam yang dimasak habang (merah). Adapun beberapa rempah yang digunakan dalam proses pembuatannya, yaitu jahe, kencur, dan kayu manis. Perpaduan antara kenyalnya lontong, santan, dan lauk pelengkapnya menghasilkan cita rasa yang gurih dan nikmat.</p><p>&nbsp;</p><p>Jika Anda ingin mencobanya, RM Lontong Orari ada di Jl. Simp. Sei Mesa No.80, Seberan Mesjid, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan&nbsp;Selatan&nbsp;70122</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1457739187304!2d114.59584457480995!3d-3.314113796660716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423eae2586c99%3A0x844946f2a0cc155c!2sRM%20Lontong%20Orari!5e0!3m2!1sid!2sid!4v1723508719314!5m2!1sid!2sid'),
(51, 4, 'JARING HJ, FATIMAH', '<p>Jaring Hj. Fatimah sebenarnya lebih dikenal oleh warga setempat dengan sebutan Jaring Dahlia. Hal itu karena sejak dulu tempat beliau berjualan jaring alias jengkol tidak pernah berpindah, tetap di jalan Dahlia, Banjarmasin. Jaring Dahlia memang sudah terkenal sejak lama. Usaha turun temurun ini merupakan salah satu contoh sukses pengusaha UKM yang mampu bertahan hingga&nbsp;puluhan&nbsp;tahun.</p><p>&nbsp;</p><p>Mungkin tidak banyak yang mengetahui bahwa produksi Jaring Dahlia mencapai dua ratus kilogram per hari. Jaring ala Hj. Fatimah berbeda dengan jaring di tempat lain. Baunya tidak menyengat, namun rasanya tetap lezat.</p><p>&nbsp;</p><p>Selain Jaring yang biasa dijual dan dimakan dengan menggunakan Tahi Lala, juga tersedia Jaring yang diolah menjadi Semur Jengkol dan&nbsp;Jengkol&nbsp;Balado.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.0910336953802!2d114.57672357480999!3d-3.3276839966471092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423a12340d973%3A0xd808fc7196070920!2sKedai%20jaring%2Fjengkol%20hj.%20Siti%20fatimah%20jl%20dahlia!5e0!3m2!1sid!2sid!4v1723520500981!5m2!1sid!2sid'),
(52, 4, 'DEPOT BAKSO SAPI PAL SATU', '<p>Depot Bakso Sapi Pal satu merupakan salah satu restoran bakso yang cukup terkenal di Banjarmasin, kalian yang suka menu bakso dan bila datang ke banjar entah berlibur ataupun mengunjungi keluarga maka belum lengkap bila tidak kulineran ke depot bakso&nbsp;yang&nbsp;satu&nbsp;ini.</p><p>&nbsp;</p><p>Kuah bakso disini terasa harum gurih dari bawah putih, dan terlihat irisan-irisan kecil bawang putih nya. Tempat makan bakso di sini selalu ramai.. Eits! tapi jangan takut kehabisan karena buka sampai&nbsp;tengah&nbsp;malam.</p><p>&nbsp;</p><p>Menu nya ada bakso sapi, bakso ikan, bakso urat, bakso babat, bakso ayam, mie ayam, rawon, dll.</p><p>&nbsp;</p><p>Secara penampilan tempat, Depot Bakso Sapi Pal 1 ini bisa dibilang sederhana. Lokasinya ada di jalan A. Yani Km. 1 No.&nbsp;10&nbsp;Banjarmasin.</p>', 'BJM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2039355.3047725107!2d112.15790185624996!3d-3.3215438999999973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423e80cab6dbf%3A0x54f34c883e7b0b1c!2sDepot%20Bakso%20Sapi%20Pal%20Satu!5e0!3m2!1sid!2sid!4v1723520862868!5m2!1sid!2sid');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_wisata_id_foreign` (`wisata_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `foto_wisatas`
--
ALTER TABLE `foto_wisatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_wisatas_wisata_id_foreign` (`wisata_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wisatas_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto_wisatas`
--
ALTER TABLE `foto_wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto_wisatas`
--
ALTER TABLE `foto_wisatas`
  ADD CONSTRAINT `foto_wisatas_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  ADD CONSTRAINT `wisatas_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
