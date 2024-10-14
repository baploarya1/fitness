-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 10:12 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness_centre2`
--

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode_kategori`, `nama_kategori`, `user_id`, `username`, `type`, `created_at`, `updated_at`) VALUES
(1, 'CO0001', 'COMPANY', NULL, NULL, 'a', NULL, NULL),
(2, 'CO0002', 'CHILDREN', NULL, NULL, 'a', NULL, NULL),
(3, 'CO0003', 'INDIVIDUAL', NULL, NULL, 'a', NULL, NULL),
(4, 'CO0004', 'FAMILY', NULL, NULL, 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_handphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_registrasi` date DEFAULT NULL,
  `photo_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kartu_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nomor_member`, `nama_member`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `alamat`, `nomor_ktp`, `nomor_handphone`, `pekerjaan`, `status_member`, `tanggal_registrasi`, `photo_ktp`, `photo_member`, `nomor_kartu_member`, `user_id`, `username`, `created_at`, `updated_at`, `type`) VALUES
(1, 'MB6407', 'Liza Sipes', '2008-04-18', 'Baumbachmouth', 'L', '11794 Theo Island\nNorth Carole, CO 40349', 'KTP5789621', '1-959-849-6143', 'Refrigeration Mechanic', 'Tidak Aktif', '1981-06-17', 'https://lorempixel.com/640/480/people/Faker/?60810', 'https://lorempixel.com/640/480/people/Faker/?22577', 'KM0337', 2, 'admin', NULL, NULL, 'z'),
(2, 'MB5293', 'Christiana Heidenreich', '1995-09-25', 'North Alfonsoshire', 'L', '20290 Celine Place\nSouth Turnerbury, AL 77079-1325', 'KTP2639256', '476-735-0875', 'Appliance Repairer', 'Tidak Aktif', '1979-10-01', 'https://lorempixel.com/640/480/people/Faker/?90818', 'https://lorempixel.com/640/480/people/Faker/?61657', 'KM0435', 2, 'admin', NULL, '2024-10-04 23:29:57', 'z'),
(3, 'MB9867', 'Colby Walker', '2005-01-17', 'Smithamview', 'P', '409 Kiehn Meadow Apt. 308\nGretchenborough, IL 59441-8067', 'KTP4501730', '(530) 633-8151', 'Poultry Cutter', 'Tidak Aktif', '1981-06-20', 'https://lorempixel.com/640/480/people/Faker/?46676', 'https://lorempixel.com/640/480/people/Faker/?21216', 'KM7061', 2, 'admin', NULL, '2024-10-04 23:30:05', 'z'),
(4, 'MB5395', 'Roxanne Dietrich', '1996-12-25', 'Lebsackstad', 'P', '990 Spencer Squares Suite 379\nBayerport, ND 16291-7645', 'KTP9726699', '1-757-333-4651', 'Gauger', 'Aktif', '1972-04-09', 'https://lorempixel.com/640/480/people/Faker/?92846', 'https://lorempixel.com/640/480/people/Faker/?57316', 'KM6545', 2, 'admin', NULL, '2024-10-04 23:30:26', 'z'),
(5, 'MB9510', 'Prof. Rhett Bernhard', '1997-11-14', 'Port Arleneborough', 'P', '3693 Beatrice Port Suite 798\nPadbergmouth, AL 93137-8528', 'KTP9892585', '(273) 522-8022', 'Biophysicist', 'Tidak Aktif', '2024-05-22', 'https://lorempixel.com/640/480/people/Faker/?85049', 'https://lorempixel.com/640/480/people/Faker/?57845', 'KM5428', 2, 'admin', NULL, NULL, 'a'),
(6, 'MB8634', 'Coby Quitzon DDS', '1972-08-19', 'Bashirianport', 'P', '95210 Maryam Terrace\nNorth Domenickstad, NC 55151-0027', 'KTP1925008', '(770) 771-5679', 'Rigger', 'Tidak Aktif', '2015-07-01', 'https://lorempixel.com/640/480/people/Faker/?10970', 'https://lorempixel.com/640/480/people/Faker/?96314', 'KM8242', 2, 'admin', NULL, NULL, 'a'),
(7, 'MB4262', 'Jakayla Bashirian', '2001-10-30', 'Rowestad', 'P', '400 Neal Locks Suite 382\nBomouth, MS 21178', 'KTP5613177', '639.990.2577', 'State', 'Tidak Aktif', '1985-10-06', 'https://lorempixel.com/640/480/people/Faker/?38502', 'https://lorempixel.com/640/480/people/Faker/?91080', 'KM4522', 2, 'admin', NULL, NULL, 'a'),
(8, 'MB3917', 'Prof. Gracie Rolfson V', '2012-04-05', 'North Erin', 'L', '124 Swaniawski Curve\nEast Damiantown, AL 29015', 'KTP1312707', '931-559-8204 x65010', 'Agricultural Sales Representative', 'Aktif', '2013-04-17', 'https://lorempixel.com/640/480/people/Faker/?54342', 'https://lorempixel.com/640/480/people/Faker/?52704', 'KM1707', 2, 'admin', NULL, NULL, 'a'),
(9, 'MB4644', 'Dr. Izabella Stamm', '2014-05-03', 'West Leeborough', 'P', '13114 Hickle Garden\nClintonborough, SD 14755-7679', 'KTP2814263', '(832) 727-3430', 'Lawyer', 'Aktif', '1983-09-14', 'https://lorempixel.com/640/480/people/Faker/?25239', 'https://lorempixel.com/640/480/people/Faker/?27922', 'KM0998', 2, 'admin', NULL, NULL, 'a'),
(10, 'MB9932', 'Freida Greenfelder', '2023-05-01', 'Wandabury', 'P', '79042 Sawayn Spring\nDietrichside, IN 45502-0017', 'KTP1722099', '1-349-656-3158', 'Gluing Machine Operator', 'Tidak Aktif', '2009-10-21', 'https://lorempixel.com/640/480/people/Faker/?37527', 'https://lorempixel.com/640/480/people/Faker/?18249', 'KM8509', 2, 'admin', NULL, '2024-10-04 23:26:03', 'z'),
(11, 'MB2842', 'Jaunita Smitham II', '2013-01-25', 'Waylonborough', 'P', '238 Stokes Causeway Suite 329\nNorth Hillary, IA 50330', 'KTP4558281', '1-509-675-9209 x464', 'Electrical and Electronics Drafter', 'Tidak Aktif', '2003-08-31', 'https://lorempixel.com/640/480/people/Faker/?74444', 'https://lorempixel.com/640/480/people/Faker/?55981', 'KM7986', 2, 'admin', NULL, '2024-10-04 23:26:35', 'z'),
(12, 'MB2870', 'Breana Fadel', '2022-12-11', 'East Murphychester', 'P', '4171 Beer Pine Suite 897\nBinshaven, KS 82641', 'KTP1942756', '1-321-943-0468 x69327', 'Talent Director', 'Aktif', '2008-11-09', 'https://lorempixel.com/640/480/people/Faker/?79393', 'https://lorempixel.com/640/480/people/Faker/?99958', 'KM9421', 2, 'admin', NULL, '2024-10-04 23:54:41', 'z'),
(13, 'MB6834', 'Miss Verdie Dickens I', '1984-08-09', 'West Violetberg', 'P', '84097 Chadd Squares\nAmaniton, CO 42913', 'KTP9490660', '(668) 837-6948', 'Textile Cutting Machine Operator', 'Aktif', '1985-03-28', 'https://lorempixel.com/640/480/people/Faker/?17754', 'https://lorempixel.com/640/480/people/Faker/?27262', 'KM3969', 2, 'admin', NULL, NULL, 'a'),
(14, 'MB2725', 'Prof. Zane Wintheiser III', '1997-10-22', 'Lake Dinobury', 'L', '943 Erdman Fields\nPort Magnolia, MI 77618-9655', 'KTP2226795', '1-943-942-0302 x2639', 'Logging Worker', 'Aktif', '2008-09-17', 'https://lorempixel.com/640/480/people/Faker/?52063', 'https://lorempixel.com/640/480/people/Faker/?43549', 'KM2743', 2, 'admin', NULL, '2024-10-04 23:53:44', 'z'),
(15, 'MB6886', 'Selina Yost', '2009-02-19', 'Gottliebfort', 'L', '92810 Cordell Heights\nWest Horaceburgh, IL 55954-3395', 'KTP0613104', '+1-790-315-3576', 'Electrician', 'Tidak Aktif', '2006-07-25', 'https://lorempixel.com/640/480/people/Faker/?53499', 'https://lorempixel.com/640/480/people/Faker/?51852', 'KM4742', 2, 'admin', NULL, '2024-10-04 23:54:52', 'z'),
(16, 'M0091', 'arya wardhana', '2024-10-05', 'medan', 'L', 'dsadasaaaaaaa', '31231222', '08231231', 'kepala sekolah', 'Aktif', '2024-10-22', 'photos/ktp/yseKS5Av9DCsfXxGvP9CJLfoqjhzfhfOExzCs5Ia.png', 'photos/members/OcznBE6F66WzQgtdJQ8EIcGCRVDv7kBIyM3rqGrY.png', '31231200001', 2, NULL, '2024-10-04 21:14:48', '2024-10-04 23:16:44', 'z'),
(17, 'M00912', 'arya wardhanaa', '2024-10-05', 'medan', 'L', 'dsadasaaaaaaa', '31231222', '08231231', 'kepala sekolah', 'Aktif', '2024-10-05', NULL, NULL, '31231200001d', 2, NULL, '2024-10-04 21:31:07', '2024-10-04 21:45:02', 'z'),
(18, 'M00913', 'muhammad arya wardhanaa', '2024-10-05', 'medan', 'L', 'dsadasaaaaaaa', '31231222', '08231231', 'kepala sekolah', 'Aktif', '2024-10-05', NULL, NULL, '31231200001daaaaa', 2, NULL, '2024-10-04 21:45:02', '2024-10-04 21:48:33', 'z'),
(19, 'M00913', 'muhammad arya wardhana gunawan', '2024-10-05', 'medan', 'L', 'dsadasaaaaaaa', '31231222', '08231231', 'kepala sekolah', 'Aktif', '2024-10-05', NULL, NULL, '31231200001', 2, NULL, '2024-10-04 21:48:33', '2024-10-04 21:51:11', 'z'),
(20, 'M0091', 'arya wardhanas', '2024-10-05', 'medan', 'L', 'dsadasaaaaaaa', '31231222', '08231231', 'kepala sekolah', 'Aktif', '2024-10-05', NULL, NULL, '31231200001', 2, 'ADMIN', '2024-10-04 23:16:44', '2024-10-04 23:17:00', 'z'),
(21, 'M0091', 'arya wardhanasd', '2024-10-05', 'medan', 'L', 'dsadasaaaaaaa', '31231222', '08231231', 'kepala sekolah', 'Aktif', '2024-10-05', NULL, NULL, '31231200001', 2, 'ADMIN', '2024-10-04 23:17:00', '2024-10-04 23:29:21', 'z'),
(22, 'F092111', 'FERDIAN SYAHPUTRA', '2024-10-07', 'aceh', 'L', 'jalan bakti luhur', '08312321', '08312312', 'kepala sekolah', 'Aktif', '2024-10-16', 'photos/F092111.FERDIAN SYAHPUTRA/15BtfMspmBJL4Jz725sTuLodCnPGcJY3sfMRDVbT.jpg', 'photos/F092111.FERDIAN SYAHPUTRA/sDtez7QiHllkVKFFmlE5eRIcEkTUjwlCbe1UqJAd.jpg', '222121111143', 2, 'ADMIN', '2024-10-07 00:54:38', '2024-10-07 00:54:38', 'a');

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
(4, '2024_10_01_061332_member', 1),
(5, '2024_10_04_090817_add_type_column_to_member_table', 1),
(6, '2024_10_05_073751_paket', 2),
(7, '2024_10_05_080004_create_paket_table', 3),
(8, '2024_10_07_035944_paket', 4),
(9, '2024_10_07_040138_paket', 5),
(10, '2024_10_08_023035_paket', 6),
(11, '2024_10_08_023305_paket', 7),
(12, '2024_10_08_031250_pembayaran', 8),
(13, '2024_10_08_031440_transaksi', 8),
(14, '2024_10_08_060358_add_column_kode_to_transaksi_table', 9),
(15, '2024_10_14_032047_kategori', 10),
(16, '2024_10_14_032729_kategori', 11),
(17, '2024_10_14_065706_rename_kategori', 12);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai_berlaku` date DEFAULT NULL,
  `tanggal_habis_berlaku` date DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `harga_paket` decimal(16,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `kode_paket`, `nama_paket`, `kode_kategori`, `tanggal_mulai_berlaku`, `tanggal_habis_berlaku`, `jumlah_peserta`, `harga_paket`, `status`, `user_id`, `username`, `type`, `created_at`, `updated_at`) VALUES
(1, 'IN0001', 'INDIVIDUAL 1 BULAN', 'CO0003', '2024-10-08', '2024-10-08', NULL, '3500000.00', NULL, 2, 'ADMIN', 'a', '2024-10-07 19:33:26', '2024-10-07 19:33:26'),
(2, 'IN00002', 'INDIVIDUAL 3 BULAN', 'CO0003', '2024-10-08', '2024-10-08', NULL, '4000000.00', NULL, 2, 'ADMIN', 'a', '2024-10-07 19:34:15', '2024-10-07 19:34:15'),
(3, 'IN0003', 'INDIVIDUAL 9 BULAN', 'CO0003', '2024-10-08', '2024-10-08', NULL, '0.00', NULL, 2, 'ADMIN', 'a', '2024-10-07 19:35:05', '2024-10-07 19:35:05'),
(4, 'IN0004', 'INDIVIDUAL 12 BULAN', 'CO0003', '2024-10-08', '2024-10-08', NULL, '5000000.00', NULL, 2, 'ADMIN', 'a', '2024-10-07 19:46:31', '2024-10-07 19:46:31'),
(5, 'CO0001', 'COMPANY 3 MONTHS', 'CO0001', NULL, NULL, NULL, '5000000.00', NULL, NULL, NULL, 'a', NULL, NULL),
(6, 'CO0002', 'COMPANY 6 MONTHS', 'CO0001', NULL, NULL, NULL, '6000000.00', NULL, NULL, NULL, 'z', NULL, '2024-10-07 21:06:10'),
(7, 'CO0003', 'COMPANY 12 MONTHS', 'CO0001', NULL, NULL, NULL, '7000000.00', NULL, NULL, NULL, 'z', NULL, '2024-10-07 21:06:52'),
(8, 'FA0001', 'FAMILY 1 MONTHS', NULL, NULL, NULL, NULL, '7000000.00', NULL, NULL, NULL, 'z', NULL, '2024-10-07 21:06:24'),
(9, 'CHI0001', 'CHILDREN 1 MONTHS', 'CO0002', NULL, NULL, NULL, '200000.00', NULL, NULL, NULL, 'z', NULL, '2024-10-07 21:06:41'),
(10, 'CHI0002', 'CHILDREN 3 MONTHS', 'CO0002', NULL, NULL, NULL, '400000.00', NULL, NULL, NULL, 'z', NULL, '2024-10-07 21:07:03'),
(11, 'CHI0003', 'CHILDREN 6 MONTHS', 'CO0002', NULL, NULL, NULL, '800000.00', NULL, NULL, NULL, 'a', NULL, NULL),
(12, 'CHI0004', 'CHILDREN 12 MONTHS', 'CO0002', NULL, NULL, NULL, '1200000.00', NULL, NULL, NULL, 'a', NULL, NULL),
(13, 'CO0002', 'COMPANY 6 MONTHS', 'COMPANY', '2024-10-08', '2024-10-08', NULL, '6000000.00', NULL, 2, 'ADMIN', 'a', '2024-10-07 21:06:10', '2024-10-07 21:06:10'),
(14, 'FA0001', 'FAMILY 1 MONTHS', 'FAMILY', '2024-10-08', '2024-10-08', NULL, '7000000.00', NULL, 2, 'ADMIN', 'a', '2024-10-07 21:06:24', '2024-10-07 21:06:24'),
(15, 'CHI0001', 'CHILDREN 1 MONTHS', 'CO0002', '2024-10-08', '2024-10-08', NULL, '200000.00', NULL, 2, 'ADMIN', 'a', '2024-10-07 21:06:41', '2024-10-07 21:06:41'),
(16, 'CO0003', 'COMPANY 12 MONTHS', 'COMPANY', '2024-10-08', '2024-10-08', NULL, '7000000.00', NULL, 2, 'ADMIN', 'a', '2024-10-07 21:06:52', '2024-10-07 21:06:52'),
(17, 'CHI0002', 'CHILDREN 3 MONTHS', 'CO0002', '2024-10-08', '2024-10-08', NULL, '400000.00', NULL, 2, 'ADMIN', 'a', '2024-10-07 21:07:03', '2024-10-07 21:07:03');

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
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `kode_pembayaran`, `nama_pembayaran`, `keterangan`, `user_id`, `username`, `type`, `created_at`, `updated_at`) VALUES
(1, 'PAY0001', 'QRIS', NULL, NULL, NULL, 'a', NULL, NULL),
(2, 'PAY0002', 'CREDIT CARD', NULL, NULL, NULL, 'a', NULL, NULL),
(3, 'PAY0003', 'DEBIT CARD', NULL, NULL, NULL, 'a', NULL, NULL),
(4, 'PAY0004', 'CASH', NULL, NULL, NULL, 'a', NULL, NULL),
(5, 'PAY0001', 'QRIS', NULL, NULL, NULL, 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `tanggal_mulai_berlaku` date DEFAULT NULL,
  `tanggal_habis_berlaku` date DEFAULT NULL,
  `harga_paket` decimal(16,2) DEFAULT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_paket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nomor_transaksi`, `tanggal_transaksi`, `id_paket`, `id_member`, `tanggal_mulai_berlaku`, `tanggal_habis_berlaku`, `harga_paket`, `id_pembayaran`, `status`, `keterangan`, `no_kartu`, `user_id`, `username`, `type`, `created_at`, `updated_at`, `kode_paket`, `nomor_member`, `kode_pembayaran`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 01:32:18', '2024-10-08 01:32:18', 'IN0003', 'MB9867', NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 01:44:30', '2024-10-08 01:44:30', 'CO0001', 'MB9867', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 01:46:05', '2024-10-08 01:46:05', 'CO0001', 'MB9867', NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 01:50:38', '2024-10-08 01:50:38', 'CO0001', 'MB9867', NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 01:55:04', '2024-10-08 01:55:04', NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-08 01:55:15', '2024-10-08 01:55:15', NULL, NULL, NULL),
(7, '3213122111', '2024-10-08', NULL, NULL, NULL, NULL, NULL, NULL, 'Paid', 'dsadasda', NULL, 2, 'ADMIN', 'z', '2024-10-08 01:57:28', '2024-10-11 20:33:32', 'CO0001', 'MB5293', 'PAY0004'),
(8, 'C009111', '2024-10-11', NULL, NULL, NULL, NULL, NULL, NULL, 'Paid', 'dasdasd', NULL, 2, 'ADMIN', 'z', '2024-10-10 22:06:56', '2024-10-11 03:29:05', 'IN00002', 'MB4262', 'PAY0004'),
(9, 'C009111', '2024-10-11', NULL, NULL, NULL, NULL, NULL, NULL, 'Paid', 'dasdasd', NULL, 2, 'ADMIN', 'a', '2024-10-11 03:29:05', '2024-10-11 03:29:05', 'IN00002', 'MB4262', 'PAY0003');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ARYA', 'arya@gmail.com', NULL, '$2y$10$9z0glL7lArQ3u13wq3u8Z.KKp9.sf4qL74AmaVMEEI61ryBaifghS', NULL, NULL, NULL),
(2, 'ADMIN', 'admin@gmail.com', NULL, '$2y$10$JcyAjm64cqmcrQ0ubFNde.KbBYcIKC2QMLBvLdMS3lNFFcngd3YK.', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
