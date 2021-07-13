-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 08:18 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sik_inova`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah_id` int(11) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `id_card`, `alamat`, `wilayah_id`, `kota_id`, `jenis_kelamin`, `pendidikan_terakhir`, `photo`, `created_at`, `updated_at`) VALUES
(1, 5, '3273242207960001', 'Cimahi', 5, 7, 'Laki-laki', 'Sarjana 1', 'photo_pegawai/HScVhV_foto.jpg', '2021-07-12 22:41:03', '2021-07-12 22:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_wilayah` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `name`, `description`, `id_wilayah`, `created_at`, `updated_at`) VALUES
(7, 'Cimahi', 'Kota Cimahi', 5, '2021-07-11 14:14:53', '2021-07-11 14:14:53'),
(9, 'Kota Menteng', 'Kota Administrasi Jakarta Pusat: Menteng.', 7, '2021-07-12 15:27:57', '2021-07-12 15:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2021_07_08_053853_create_sessions_table', 2),
(7, '2021_07_08_110622_create_roles_table', 3),
(8, '2021_07_08_112659_add_role_id_to_users_table', 3),
(9, '2021_07_08_231849_create_wilayahs_table', 4),
(10, '2021_07_08_234440_create_kotas_table', 5),
(12, '2021_07_09_015127_create_employees_table', 6),
(13, '2021_07_09_232222_create_pasiens_table', 7),
(15, '2021_07_10_021736_create_obats_table', 8),
(16, '2021_07_10_025557_create_tindakans_table', 9),
(17, '2021_07_10_031226_create_pendaftarans_table', 10),
(20, '2021_07_10_071529_create_pengobatans_table', 11),
(25, '2021_07_10_203921_create_pengobatan_details_table', 12),
(26, '2021_07_11_220810_create_reseps_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `name`, `harga`, `description`, `created_at`, `updated_at`) VALUES
(1, 'CTM', 8000, 'Obat gatal dan alergi.', '2021-07-09 19:51:49', '2021-07-09 19:53:18'),
(2, 'Paracetamol', 6000, 'Obat panas / demam', '2021-07-09 19:53:52', '2021-07-09 19:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_handphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_handphone`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Nana Suryana', '3273242207960001', 'Laki-laki', 'Bandung', '1996-07-22', '089677705979', 'Bandung', '2021-07-09 18:52:36', '2021-07-09 18:52:36'),
(3, 'Isma Nur Rizki', '3273243101080001', 'Perempuan', 'Bandung', '2008-01-31', '089657384768', 'Sukamiskin, Arcamanik Kota Bandung', '2021-07-09 19:01:10', '2021-07-09 19:17:04'),
(4, 'Asep Wahyudin', '3273243107910001', 'Laki-laki', 'Bandung', '2021-07-11', '089657384777', 'Jatihandap, Bandung', '2021-07-10 17:02:44', '2021-07-10 17:02:44'),
(5, 'Dheris Kun', '3273202209800001', 'Laki-laki', 'Bandung', '1998-09-22', '089657222301', 'Kiaracondong, Bandung', '2021-07-10 17:06:50', '2021-07-10 17:06:50'),
(6, 'Tubagus Fikri Fatoni', '3273220101960001', 'Laki-laki', 'Bandung', '1996-01-01', '081221888092', 'Parakan Saat, Bandung', '2021-07-10 17:15:36', '2021-07-10 17:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` int(10) UNSIGNED NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `keluhan_pasien` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `pasien_id`, `tanggal_daftar`, `keluhan_pasien`, `no_pasien`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-07-10', 'Meriang & demam', '202107101', 'Selesai', '2021-07-09 23:33:16', '2021-07-12 04:34:29'),
(3, 6, '2021-07-11', 'Gatal-gatal dan badan demam', '202107112', 'Dalam Antrian', '2021-07-10 17:07:23', '2021-07-10 17:15:54'),
(4, 6, '2021-07-13', 'Demam dan gatal-gatal', '202107132', 'Sedang Dalam Pemeriksaan Dokter', '2021-07-12 21:35:53', '2021-07-12 21:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `pengobatan`
--

CREATE TABLE `pengobatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `pasien_id` int(10) UNSIGNED NOT NULL,
  `total_biaya_pengobatan` bigint(20) DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengobatan`
--

INSERT INTO `pengobatan` (`id`, `pendaftaran_id`, `pasien_id`, `total_biaya_pengobatan`, `status_pembayaran`, `tanggal_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 148000, 'Lunas', '2021-07-12', '2021-07-10 13:33:41', '2021-07-12 06:07:43'),
(2, 4, 6, 146000, 'Ditangguhkan', NULL, '2021-07-12 21:36:25', '2021-07-12 21:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `pengobatan_detail`
--

CREATE TABLE `pengobatan_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengobatan_id` int(11) NOT NULL,
  `tindakan_id` int(11) NOT NULL,
  `biaya_tindakan` bigint(20) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengobatan_detail`
--

INSERT INTO `pengobatan_detail` (`id`, `pengobatan_id`, `tindakan_id`, `biaya_tindakan`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 100000, 'Cek kesehatan test darah', '2021-07-11 16:54:37', '2021-07-11 16:54:37'),
(4, 2, 1, 50000, 'Cek kesehatan tes darah', '2021-07-12 21:36:56', '2021-07-12 21:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengobatan_id` int(10) UNSIGNED NOT NULL,
  `obat_id` int(10) UNSIGNED NOT NULL,
  `harga_obat` bigint(20) NOT NULL,
  `jumlah_obat` bigint(20) NOT NULL,
  `dosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id`, `pengobatan_id`, `obat_id`, `harga_obat`, `jumlah_obat`, `dosis`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 8000, 6, '2 kali sehari', 'dipakai bila terasa gatal', '2021-07-11 16:56:34', '2021-07-11 16:56:34'),
(5, 2, 1, 8000, 12, '2 kali sehari', 'Diminum bila terasa gatal', '2021-07-12 21:37:33', '2021-07-12 21:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Dokter', 'Hak Akses  Untuk Dokter', '2021-07-08 05:35:47', '2021-07-08 16:17:06'),
(5, 'Resepsionis', 'Hak Akses Resepsionis + Apoteker', '2021-07-08 05:35:48', '2021-07-08 05:35:48'),
(7, 'Admin', 'Hak Akses Admin', '2021-07-08 05:35:48', '2021-07-08 05:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0RTh0c3zctjjeBsfaBRIdkyx1NfMU8r3N3iVZbqD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTdySjlCbUFRYnljeHVJU3djczVEYWFuM290dkFuSk45eU0xU2tpZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626152080),
('1Ldqquw0MIEG0JbfmpWxrUTZGdH4K18SLoxXyPgu', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianZFeEo2MjQ3QVdMd3NNSVJyVUZ3cGthWkhTcUsyeXdzUzk4R3RETiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154605),
('2wgTYOUlQGOq05owwHoVlbG5CBroXUMwINUcHIO5', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUloanFwWnlWeDBzTFU4TDFlYkRGTHJ4VWZyTTMxZTJpdzdnT2dhTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154910),
('36CLOYvuNlzcIW6rjafhusl1GPaEFDqmcWyasdrC', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1YwSTBCZ1pjRjd5aVNkc0NDUmZqMzBONjRIRWV4RFlSTVBRUnE2bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154635),
('62ihI1djc4Pb9G08TF19aD4a37YP8AXegHRlzZoT', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNU10Mk1Wak9ZbFNaQWhId0hpNzlJWUtxaldlczU5cWtzNlF3YWk4QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155023),
('8Kpckg38w34WdgygUbtla9uqlzPPWTciNgmaIbfp', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWVRRE9mOERLNVpSUlo2WHdRUThSVkJITFJqVHBMTXZhQ0hhUzU4NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155986),
('8pUDN0Azpt26gljPL585SktrbeYuBs6ZkVoaSPVm', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3gzOWNDbzBLSGJheTlMRE04dzhYMmRmcEF1dEY5bk5XbUlwYVJGRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626156246),
('8ZiPLWXl1LZNK5vXQU0BfTVc6FgrVFfHe7Gkx3E4', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmo4VFhDZk5taE5VbEhoVnQyNGlmWlJGYWR3MHFZc1VibzhhTHJYVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154036),
('A99xRp3eD76DdMLIEeDVeiQcuXrpEpPPzf7oxSbl', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHRDbkJRQXZRVm9jYXg2TjNpMkxrcFZFNzhUOEw1UHMxVWVyaEwyWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155553),
('ARaZBab81rqESYjuC16pqrc2kdoZH7CkVNqDZOi9', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1NYMWdqVWtxRlZxVWZ1QnlmRXZuNGJ2SmVhZHg2MDBZQWNkblpsUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626153732),
('B2fq2KUkv9RnpdlpCbRoCyIAc9qVCNBPSuqMt9TQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDVhazBrQmYwSG9UNUdjNVM3eTN6dVJoN1FuUENCbVpHZGUzQUZvZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626153570),
('BJn6ri9cP01WXsu6qgIxG7Or03jfwkNrBWOW8T4Z', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUtzSmw1NzIxVzVhQmV1Zm81STlab0lYcERDZWJHd0dOcGlCTTV0eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154224),
('C49cXJK40VtFhnHnrmE3dw9iyXy0K3yki8JVhAOH', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2VqOFR5bUNOYXhRSVJxekY4NlRQNEJhSlJDYWVXeVRBMXJ6WHpPTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626156505),
('CFJLSQWnWmAAmyqS1luuZAGojnP8egUwawzvZ9YY', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmdHWDN5S0g3dkc4R3pvSXZKVERHN3NkVUFrOTZ3NVZmSFJiQldlUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155452),
('CS3VBAuHoH035nQ4UCeHP8JjlrlxSTtOF9p2Gr4R', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVklEcHNHUEswejNPdWh3WHNWOU1ERG5YemZTNzVEV0pvSmpkeVh1dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154073),
('cvYoJ6eTbgLxdhr5rZrRLNACJExJ5cjj2is77UQV', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTAxb2lHSVJ4ZHRkMkYwbnlwWWFyUDBNdVc1a3VhNXB0MEZCUlJCNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626152053),
('cWvsSZNqcL27XeUpnaTqnTz1TRcdnQ3vVmUYIEme', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmc5TlNxbG1ndkt3cVFPSkJQbHFGVHIzbGZhWkpON2pBY1N5dzNORCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155200),
('e3l7k0u0gW11T8GKoHoSYbvoeCE1SQCSOjnlVk7o', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTW45RVZ0cU1Sc1VUR0hVb0xDR3F1NUtoOXoyNThwTk56SW5saU1TZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150454),
('fGKqN2PROjs48rtMvDYRNIvkeQ36YQ7M2FOaAgXV', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTY4QmRYenVVaEZZcnBiY2ZWOWlDdVVwQzI5UmxnQm9zRElNUWU1dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626156138),
('FQuiv5QaixcW1FPrC0aqdIMJjphMwZrDVwMdAU9s', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibVFKTTJYQ3VkSVNienhsN3hNWnNSZDZDQllXTTNIOUhwUVNESW9rVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155647),
('GF67dQTNNsoySOzhRetxE5bASXti1i5JKGSR3RXN', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTk5MRlY2cWlkUldDUnJ2QTFkU0hCQVNWYTJSdTd2NjlwRjVkeUtIRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626151755),
('H1ijQopASIK5E2jestfgAs3pRheqWXPVz1L5AAhn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMlI4cTFjSlg1NWszSzVmZTB2amR3Y2dtdjgzRDN3Nm9VTXNmUlVlayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155045),
('HcjhP9uRG3FeirP02a0PdadkVA5P7ZsoMrN5JkBF', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWtGS0pMQXU3eE9EaDV4b2d5SlFQQmN2NTEyVzBZUU45Ukg4UDBUaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626156510),
('HEHj0Mjm8wIsfJXHjzBqhyYzZErdD0geL4xcRPH0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkc0TW9DRVlQM2E2VXFJZjZVWUNmQXE0QUV1T0d3V05VbG10WWpEOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626153009),
('HNt267FkO7uSWbEhz7Zb4ftXRnlogJUYKyuj1hNX', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0hNeWJrWjBnYWRQUVhGMEJpYUNLbnE0bFFPa0pFSWpnQm83WnJsUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155157),
('hq8TD7925HSmryfKDjalEAkn09HfUoTAmiCTTlIw', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDA1c2lrNTZXNXVoenR3QVBzSUhaRUM3RzVRcnBUelJPbG1BRHJTbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150486),
('iC0ZcS7mCkgEGrMgbRG50zTEIvPXiRtp32NoYeqt', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFVNajhtSk9YNHBCOUZoSFR2QVF2b254ZllhNnk2cXYxZ3NGTmR1biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154586),
('JKrYs7ma9CxEb7l72bpHfHouQniL6uFRzqFAdQ67', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekpzR1dUWEY3UDQyWDZQZXUzZ1E0MFdCS1lMVlVPM0ZtZE5HcVJFWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150307),
('jN6xgs6L128rDB4heAAYCvE9qaKKRooMhcOjqgwv', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0dXM280SHFqQ0xkYW5ZQkpYTk41QnZBaTE4Q3gwRnZaSXZYd3VTYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626151549),
('jRRPBmnJiG7mp0Q75rN71FcJZgPpAlb3ANP15diY', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUEhHYmM0S0ZDY0o2YVdlSFRYT2lxelBDVklQZ2YxZGlTVVhFWlVVMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154201),
('K5a8vSweycnL20mXePmlVFOuyPcJrq6UyznA7z8n', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHQwc1FhRm5TTFV2WE0ycEhBYTh6ckdxUFpiQXhnWFk0YzdLVm5raSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154593),
('K8ZmS1SzfWbsUvFNCVMtMi6NpdUhtUSYevVmFWkQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHBMN0pyQ1Fya2tqbjBIWWVCRlRBUzZsb3lKbmpubjJTeEh6WTdYMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155849),
('kfNTMwo69fE0N0XvTlMzutJLrAYtOTv12euqo9M3', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWJFVXk3RHZpN1pBQWpHNnBQZjhZUW03TDhNZVhhVlA0V3htamZIdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154093),
('l2KAfVO44W5tL7NlISRP0IXw0fWNqwkcrlQkfkuP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZlVPTm5iYVN5a1NjMjlpVVZjbzFqUUI0Y0xsNUFQcnhsZmxlb3h3NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154112),
('LepppqWBUuJYu2usVFNtCRKEUamqp1V0Ltw1hIP3', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYklVZXZyVjZRaHF5V0pwc3pvMnVVVVIxQ3dMVXQ0cXpyZEROajJscyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154013),
('LJLE3MOXbvByxWBMOyiiUB3X87WJPgWxDGepJoUD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUI4OW9mMExlcUJDaHJBcjNtRDVzZGVyemZQOGF6RUN3cGcwT2pwcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626153436),
('mIKbAgSuSaXpaxC76BDmEom1EVcev80bXPCoonDx', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHU3azhRWnJlakFQTmRwTFZsZzBnRnB0WEtNbUZjTUNvN000SG9hSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626151788),
('nGJyTYpUGxxeuJl5WO9LmdqES3rdTN4K0RF5XtBb', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTdXUTV6eHh4U3FSSGNlWEN5b1h4RDNkMGRXR3NjMHMzZDBCY05KcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626151607),
('nvOjPfNPeUC9drl4oIdDBnY0JhTAwHCxE78ugbue', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDVBczdJRjJ1bEJsalhQbjdmZmM4dTllZDYxM0ZPV1FyaUxRTlo4ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154596),
('NX7Ud0SSr7SGKeH6QmNTy2752wf2nGcnSXgBa5fV', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXhXb1RwY3oxRGp0UzN5QkNBVU1GNzVGdHp6cXI3N2VCTW9UU2h5UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155843),
('oPSDFhZIhBujAh7VQDtAswk3WjzyOq0sU77Exdhc', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibUhCd3dKbFVDaGdSZDZXNUttWDM2a24xbHZSQ0g5UTB2c2RkaDRTZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155470),
('OYHOZmvtsCBNkkbFL0VhRGjifhOxkc9yQSbbAoZn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUFtbHdHWEpZdDRQZFdDWEhyT244MW9iQmp5ekRCY3VESFFoeVpIciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626153174),
('pcKt9VSbLdFsrllKEpa56fyMXfvSQXuhXtUIWvqd', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZlBlbVJtTG1GazRyb3oxb05WWmlaOEphZVFKTTJFVHFCaVBtbU1YZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150202),
('PrGba8e2LxL5ynA4IHhZTBTofQqqOKk6GWONNYzU', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWZKTlRJckoyVUlWeHVYeWNYTFl1enFsVHdMc1hySEZCNktrRXpUdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155491),
('q3Kk83kZqlXCMOPSfDIjh4OBIYCexVd5I6nK4aqy', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDU0RjNXaE5PNDhFSHNITzF6M1pxUG43b3RGbkpma0Fja3g4SkdzRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626155534),
('qauCIdMGzrT6FtXOHeGAVVlm2Q3vKKmL72zUKfby', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVTZqc0lRakxMYTBhQm9obUR3Q0xmZmk2Wm1KZjdZdkZSRUl4UjRYNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154234),
('qm2i8gkOM7CjGW8WKKq4sdCY4eFoQjPV8f52Dt6p', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnEzd2QzWEdRenJPUktvTUMwV0JtOWlZTFpIZjI5V3c5UTRhaGdEZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626151620),
('QSvxjof2BvzookrpRj8vozUPP8QODAzfl47EKj99', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRURXTFY2SEhIdTlzMllBbGRndW5XMkpWNGRhVVlXQkZ4VlJuQXBwRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626151579),
('Rg1UtxIEXYfHLJxfpOG4iup4bfjLFEaiDL0LiDuP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTBNNGdLV0dVUDFMUG5oUDV5czN4SzZVQk5rV2h5UGhoYzNYemo2aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150271),
('Rm7ydPCPvy4g9y2HViVegufLxaS8PrL4luESF7xP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWRBMjJ2d0NhODJ0cHJYZVphbTYyRVI0TmZlRmp3SlMzYXI1dlJJTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150397),
('RxFmLLsVWHFkRgJmlwsInAmaCHcNWSHfSPL0Stos', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDA5bWZIOGJpUnlZNEtVcVZJNmltTDZoN2o3d1I1QzBaU2toRmFwMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626151679),
('S6GfOOQPhpwUmBBroV240IFORcVfPFqTBb87dVBA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVp3QjBCSXdDQUVwRmVldWlSaEF4aXFkNjAySWV2aUFLNDNabkRlUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626156023),
('sghGLUuxXn9mQwKRfZtt2MzAUoXxCdCE57QTHNJj', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMlgycUxZNWpFYjBLRHIwZjFRM0lkWVFXdUFTTFhIMWxDdGNrQ3c4ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154830),
('tNT2dhjKXHLo0STHVUaPvmraXKhBBIFTB36PLnyj', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEZxNlhBbWdGaXRnUktOU29CS29wTGlXNUhEN3RvNEdORjc1OUgxZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150212),
('U7clrxDzDmglwV5ITXbrc2Pu3xDstwznvpy7xLHM', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmVTaDJFTWNTcDFySEVJYmdqREtiNlcwaEJSUk9YZnJ6MGxKRWhYMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154644),
('Urobmi26CN2qRxfetHmhKZBNZ6w2jT3EajqPLZlH', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoienhZWHYweWFHUG1IbU5Dc0tLRGhVbk4zSmhuQmxIRjczRVh2clc4WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150732),
('v7fUvFho2Jedf7AJRKigKnjkZ74AvwJHWaMWLLUo', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2FsaXNRZVBMbXVQcUVOU0hGSzhOSkpjSUhDOVpYQ2NHYVNMUERBRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154155),
('vbFgD6I4zfKsh9GdxUYrDOPmzE3nWmsTktFpYpXp', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDB4bzE2YkdwT29LRGlZVVdFNjRqTHFQMTJHbk90ejExMm16U29KTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154919),
('VRkLriAi9lpiFPc7qgiTBV6Nj1yTfEQmHK64dOl8', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidk8zTDRWUHJ3ZzFQdE43bjBvNDEyTkVoczhVTnhOMElvSFhCeTNCeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154089),
('VzezZF59GeRPqMgblPsqQXNBP5fMc20O9e6kX5tN', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0NNbDh1eWJIdzNWMDdKRk5aQ3N0UEFPY3IzQ1lpRllKUURkWUZGZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626153800),
('w3cEgdEdSdZYoOCiji935bJpCxUPX07p8sljkup8', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYUdUTlh0cTEzZzhYM1ZzOU9OcnVMSUxueU1nY1Zlc3FEVnQxQ09YWSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcGVnYXdhaS8xL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkOWUxTmRLRHJadjlyT2JVWUt1THU0dTcwQ3kzaWdXZzZwMi9ZbGZ3a0sxcjFBeThRcXNTLkMiO30=', 1626156257),
('wiZxq5ENTT2QthRnFebjufTHPvtEJ7vKJdNhOzGN', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHd0aUt5dTJxSlhwaG5lS2s1N2lkR3lacFluT0ZkVFQ3UFd0SnFMMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626151653),
('WwYMeaScjBiVjxFr6qXDx0islMk41SrLEsUV0xY6', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEdDbVpkSndINFhzaW5jSDN1dHlhWWM1bFltQTFnTGk1Yk5JQ1JtViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150361),
('xdOEzuAIltu5Fq2oOVuzORvMVLcs7jBMWxpDXYCb', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXhKd1RDWkNrZ1U3NHpUVkdpVTAzSFNEZ1F5VlYxc2dqRUIyVTRaOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626150386),
('Xqp5E8XC5fUVKLHmoSy7mVTXkgtLyeVsWXQhHAI3', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFlocld1YXRMd3VLV1B3Z3djaFdoNjJ2ZUJXaWQwZnFMZm9XazJWeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154545),
('yb0q3ZG3dANwpqcKTDZoAHmWM6HBeaReKbvOOnJk', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0VxWlJVeVV6OHVGNjd1c1MxNWdDV1dxd3VacnVjVnd5OURoRG8zZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626153791),
('YCEteDsghty2MEONWkHQzr4mOPGiKfpzKyRFfu8E', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFZjdXZvOHZ4Zlp2T2VYTnZQOFJPRWttRk5QVjdJV3RoTGtSZTdDSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626149075),
('zJ3KxTFrZGZquDAJw8tXEaAIYJFbm1QPHHNAdOFh', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHhjZnhvZEhiNEhjUWEyN2daSlM2c29KOXdMV1FOYlFzTzRJQ1FGbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626154031),
('zm69rwcjnHH4SHrmzfs4yBlLeYlRE7DzbNyaGj3g', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWI2OHg5S3Ziem0wOXpyQjZWaE5pdUxpRzE1QU9qSUFRUmVNOUlLMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626151682);

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id`, `name`, `harga`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lab (Test Darah)', 50000, 'Tes darah di laboratorium', '2021-07-09 20:09:22', '2021-07-12 15:58:48'),
(2, 'Tes mata minus', 30000, 'Test mata minus', '2021-07-09 20:10:25', '2021-07-09 20:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(5, 'Nana Suryana', 'admin@gmail.com', NULL, '$2y$10$9e1NdKDrZv9rObUYKuLu4u70Cy3igWg6p2/YlfwkK1r1Ay8QqsS.C', NULL, NULL, 'pO6MjrXZtig7i3oXuFMpObN5sDhSnuNJXYg0rdQQ1TZAjl9pMQSWggEKEONg', '2021-07-08 08:33:54', '2021-07-08 08:34:24', 7),
(9, 'Tubagus Fikri Fatoni', 'dokter_fikri@mail.com', NULL, '$2y$10$R6pNsS322oxTpX50L4zRmu.ga2Ry0xJJAZ9F1JoOqs9yg4QKL0Ra6', NULL, NULL, NULL, '2021-07-12 15:24:11', '2021-07-12 15:24:43', 4),
(10, 'Nur Amanah', 'resepsionis@mail.com', NULL, '$2y$10$ViNKM2eLsIi2WOkABe3uo.Oppxt49SCMfO.cIk1OxQrejv6RVSgoK', NULL, NULL, NULL, '2021-07-12 15:25:34', '2021-07-12 17:45:58', 5),
(11, 'Endi Mandala', 'endi@mail.com', NULL, '$2y$10$p8LW8GFhhOJnFLXL/30J6OWPUETEQOE1n73Jf76EYdJMF1XM.Fcme', NULL, NULL, NULL, '2021-07-12 16:10:16', '2021-07-12 16:10:16', 5);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Jawa Barat', 'Wilayah Jawa Barat', '2021-07-08 18:16:03', '2021-07-08 18:16:03'),
(7, 'DKI (Daerah Khusus Ibukota) Jakarta', 'Wilayah Jakarta', '2021-07-12 15:26:25', '2021-07-12 15:26:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengobatan`
--
ALTER TABLE `pengobatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengobatan_detail`
--
ALTER TABLE `pengobatan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengobatan`
--
ALTER TABLE `pengobatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengobatan_detail`
--
ALTER TABLE `pengobatan_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
