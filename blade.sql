/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `blade` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci */;
USE `blade`;

CREATE TABLE IF NOT EXISTS `cap_do` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ghi_chu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ten` varchar(30) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cap_do` (`id`, `ghi_chu`, `created_at`, `updated_at`, `ten`, `deleted_at`) VALUES
	(1, 'afjdhuo;e', '2023-09-03 03:14:50', '2023-09-03 03:14:50', 'Dễ', NULL),
	(2, 'hgkdje', '2023-09-03 03:15:01', '2023-09-03 03:15:01', 'Trung bình', NULL),
	(3, 'fhjsdkkgi', '2023-09-03 03:15:19', '2023-09-03 03:15:19', 'Nâng cao', NULL),
	(4, 'ksjgfklds', '2023-09-03 03:15:33', '2023-09-03 03:15:33', 'Chuyên nghiệp', NULL),
	(5, 'hejrktif', '2023-09-03 03:15:55', '2023-09-03 03:15:55', 'Bận rộn', NULL);

CREATE TABLE IF NOT EXISTS `chi_nhanh` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ten` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `phuong_xa` varchar(255) NOT NULL,
  `quan_huyen` varchar(255) NOT NULL,
  `tinh_tp` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chi_nhanh_ten_unique` (`ten`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `chi_nhanh` (`id`, `created_at`, `updated_at`, `ten`, `dia_chi`, `phuong_xa`, `quan_huyen`, `tinh_tp`, `deleted_at`) VALUES
	(1, '2023-09-03 03:12:49', '2023-09-03 03:12:49', 'Nguyễn Tri Phương', '279 Nguyễn Tri Phương', '9', '10', 'Hồ Chí Minh', NULL),
	(2, '2023-09-03 03:13:28', '2023-09-03 03:13:28', 'Đào Duy Từ', '5 Đào Duy Từ', '8', '10', 'Hồ Chí Minh', NULL),
	(3, '2023-09-03 03:14:08', '2023-09-03 03:14:08', 'Hoàng Việt', '4 Hoàng Việt', '8', 'Tân Bình', 'Hồ Chí Minh', NULL),
	(4, '2023-09-03 04:11:37', '2023-09-03 04:11:37', 'N (Bình Chánh)', 'Lô 15 Nguyễn Văn Linh', 'Phong Phú', 'Bình Chánh', 'Hồ Chí Minh', NULL),
	(5, '2023-09-03 04:12:20', '2023-09-04 07:49:21', 'A', '56C Nguyễn Đình Chiểu', '6', '3', 'Hồ Chí Minh', NULL);

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `giang_vien` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `giang_vien_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `giang_vien` (`id`, `created_at`, `updated_at`, `ten`, `email`, `sdt`, `deleted_at`) VALUES
	(1, '2023-09-03 03:08:09', '2023-09-03 03:08:09', 'Doraemon', 'domon@g.com', '123', NULL),
	(2, '2023-09-03 03:08:31', '2023-09-03 03:08:31', 'Nobita', 'nob@g.c', '0202', NULL),
	(3, '2023-09-03 03:08:54', '2023-09-03 03:08:54', 'Suneo', 'sun@g.c', '4545', NULL),
	(4, '2023-09-03 03:10:11', '2023-09-03 03:10:11', 'Jaian', 'jai@g.c', '6546', NULL),
	(5, '2023-09-03 03:11:05', '2023-09-03 03:11:05', 'Shizuka', 'shizuka@g.c', '89789', NULL),
	(6, '2023-09-03 03:11:50', '2023-10-13 07:55:52', 'Dekisugi', 'dek@g.cm', '8999', '2023-10-13 07:55:52');

CREATE TABLE IF NOT EXISTS `hoc_vien` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ten` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hoc_vien_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `hoc_vien` (`id`, `created_at`, `updated_at`, `ten`, `ngay_sinh`, `email`, `sdt`, `deleted_at`) VALUES
	(1, '2023-09-03 03:18:50', '2023-09-13 02:44:52', 'Anabelle Paucek Sr.', '2009-12-22', 'obosco@example.net', '(678) 642-4511', '2023-09-13 02:44:52'),
	(2, '2023-09-03 03:18:50', '2023-09-13 02:45:45', 'Arjun Gleichner', '2008-02-16', 'ekuhn@example.org', '(919) 578-1092', '2023-09-13 02:45:45'),
	(3, '2023-09-03 03:19:32', '2023-09-13 04:09:57', 'r. Cullen Klocko PhD', '2003-03-20', 'von.blair@example.org', '(252) 444-2809', '2023-09-13 04:09:57'),
	(4, '2023-09-03 03:19:32', '2023-09-14 20:44:10', 'Mrs. Spencer Ledner', '1997-11-14', 'randy.shields@example.org', '+12144976741', NULL),
	(5, '2023-09-03 03:19:32', '2023-09-03 03:19:32', 'Baylee Halvorson V', '1990-05-03', 'madelyn.bashirian@example.com', '1-425-949-0353', NULL),
	(6, '2023-09-03 03:19:32', '2023-09-14 21:23:21', 'Thelma Junior Conn', '2015-09-22', 'greenfelder.sterling@example.com', '+1-603-686-4804', NULL),
	(7, '2023-09-03 03:19:32', '2023-09-03 03:19:32', 'Prof. Paolo Gislason PhD', '1973-02-07', 'barrows.euna@example.org', '+1-585-900-9995', NULL),
	(8, '2023-09-03 03:19:32', '2023-09-03 03:19:32', 'Leora Ziemann', '1971-09-12', 'jalon.ryan@example.org', '(813) 847-5474', NULL),
	(9, '2023-09-03 03:20:16', '2023-09-03 03:20:16', 'Marina Rolfson', '1998-02-01', 'lebsack.consuelo@example.org', '(341) 478-4906', NULL),
	(10, '2023-09-03 03:20:16', '2023-09-03 03:20:16', 'Prof. Soledad Mann V', '1973-10-24', 'mervin75@example.net', '+1-435-698-3295', NULL),
	(11, '2023-09-03 03:20:16', '2023-09-03 03:20:16', 'Lola Bernier', '2000-02-20', 'daugherty.keira@example.org', '+15107132347', NULL),
	(12, '2023-09-03 03:20:16', '2023-09-03 03:20:16', 'Dr. Santos Kertzmann MD', '1982-10-09', 'mikel54@example.org', '+1-813-395-4374', NULL),
	(13, '2023-09-03 03:20:17', '2023-09-03 03:20:17', 'Reese Gleason', '2014-08-23', 'bradtke.viva@example.net', '+1-865-976-3748', NULL),
	(14, '2023-09-03 03:20:17', '2023-09-03 03:20:17', 'Kari Moore', '2022-02-02', 'uanderson@example.net', '+1.743.698.6061', NULL),
	(15, '2023-09-03 03:20:17', '2023-09-03 03:20:17', 'Miss Rosetta Ryan II', '1998-10-17', 'osinski.king@example.org', '+1-629-460-7308', NULL),
	(16, '2023-09-03 03:20:17', '2023-09-03 03:20:17', 'Hassan Lowe V', '1973-10-27', 'jarrod.crooks@example.net', '+1-773-613-0324', NULL),
	(17, '2023-09-03 03:20:17', '2023-09-03 03:20:17', 'Fausto Gleason', '1985-06-30', 'gbernhard@example.org', '1-270-595-8253', NULL),
	(18, '2023-09-03 03:20:17', '2023-09-03 03:20:17', 'Rebeka Harvey', '1988-10-03', 'waelchi.reilly@example.net', '1-541-741-6332', NULL),
	(19, '2023-09-14 21:24:20', '2023-09-14 21:24:20', 'Jeff Beros', '2023-09-14', 'jb@uml.com', '78910', NULL),
	(20, '2023-10-13 08:04:17', '2023-10-13 08:04:17', 'u', '1997-02-05', 's@d.c', '56', NULL);

CREATE TABLE IF NOT EXISTS `hoc_vien_lop` (
  `hoc_vien_id` bigint(20) unsigned NOT NULL,
  `lop_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hoc_vien_id`,`lop_id`),
  KEY `lop_hoc_vien_id` (`lop_id`),
  CONSTRAINT `hoc_vien_lop_id` FOREIGN KEY (`hoc_vien_id`) REFERENCES `hoc_vien` (`id`),
  CONSTRAINT `lop_hoc_vien_id` FOREIGN KEY (`lop_id`) REFERENCES `lop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `hoc_vien_lop` (`hoc_vien_id`, `lop_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2023-09-01 18:00:00', '2023-09-03 04:22:06'),
	(1, 2, '2023-09-02 18:00:00', '2023-09-03 04:23:04'),
	(2, 1, '2023-09-01 18:00:00', '2023-09-03 04:22:06'),
	(2, 6, '2023-08-31 18:00:00', '2023-09-03 04:20:11'),
	(2, 7, '2023-09-03 18:00:00', '2023-09-03 04:25:28'),
	(3, 6, '2023-08-31 18:00:00', '2023-09-03 04:20:11'),
	(4, 1, '2023-09-01 18:00:00', '2023-09-03 04:22:06'),
	(4, 2, '2023-09-02 18:00:00', '2023-09-03 04:23:04'),
	(4, 6, '2023-08-31 18:00:00', '2023-09-03 04:20:11'),
	(4, 7, '2023-09-03 18:00:00', '2023-09-03 04:25:28'),
	(6, 1, '2023-09-01 18:00:00', '2023-09-03 04:22:06'),
	(6, 2, '2023-09-02 18:00:00', '2023-09-03 04:23:04'),
	(6, 7, '2023-09-03 18:00:00', '2023-09-03 04:25:28'),
	(7, 6, '2023-08-31 18:00:00', '2023-09-03 04:20:11'),
	(8, 6, '2023-08-31 18:00:00', '2023-09-03 04:20:11'),
	(9, 6, '2023-08-31 18:00:00', '2023-09-03 04:20:11'),
	(9, 7, '2023-09-03 18:00:00', '2023-09-03 04:25:28'),
	(12, 6, '2023-08-31 18:00:00', '2023-09-03 04:20:11'),
	(13, 6, '2023-08-31 18:00:00', '2023-09-03 04:20:11'),
	(13, 7, '2023-09-03 18:00:00', '2023-09-03 04:25:28'),
	(14, 6, '2023-08-31 18:00:00', '2023-09-03 04:20:11'),
	(14, 7, '2023-09-03 18:00:00', '2023-09-03 04:25:28'),
	(16, 1, '2023-09-01 18:00:00', '2023-09-03 04:22:06'),
	(16, 7, '2023-09-03 18:00:00', '2023-09-03 04:25:28'),
	(17, 1, '2023-09-01 18:00:00', '2023-09-03 04:22:06'),
	(18, 1, '2023-09-01 18:00:00', '2023-09-03 04:22:06');

CREATE TABLE IF NOT EXISTS `lop` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ten` varchar(255) NOT NULL,
  `chi_nhanh_id` bigint(20) unsigned DEFAULT NULL,
  `giang_vien_id` bigint(20) unsigned DEFAULT NULL,
  `cap_do_id` bigint(20) unsigned DEFAULT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `thoi_luong` varchar(3) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lop_giang_vien_id_foreign` (`giang_vien_id`),
  KEY `lop_chi_nhanh_id_foreign` (`chi_nhanh_id`),
  KEY `lop_cap_do_id_foreign` (`cap_do_id`),
  CONSTRAINT `lop_cap_do_id_foreign` FOREIGN KEY (`cap_do_id`) REFERENCES `cap_do` (`id`),
  CONSTRAINT `lop_chi_nhanh_id_foreign` FOREIGN KEY (`chi_nhanh_id`) REFERENCES `chi_nhanh` (`id`),
  CONSTRAINT `lop_giang_vien_id_foreign` FOREIGN KEY (`giang_vien_id`) REFERENCES `giang_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `lop` (`id`, `created_at`, `updated_at`, `ten`, `chi_nhanh_id`, `giang_vien_id`, `cap_do_id`, `ngay_bat_dau`, `ngay_ket_thuc`, `thoi_luong`, `deleted_at`) VALUES
	(1, '2023-09-03 03:57:12', '2023-09-03 03:57:12', 'Transfiguration', 1, 2, 2, '2023-09-10', '2023-10-28', '135', NULL),
	(2, '2023-09-03 04:04:25', '2023-09-03 04:04:25', 'Charm', 3, 5, 3, '2023-10-02', '2023-11-27', '90', NULL),
	(3, '2023-09-03 04:06:41', '2023-09-03 04:06:41', 'Defense Against Dark Arts', 2, 6, 3, '2023-09-18', '2023-11-19', '135', NULL),
	(4, '2023-09-03 04:07:49', '2023-09-03 04:07:49', 'Potions', 1, 3, 2, '2023-10-02', '2023-11-06', '90', NULL),
	(5, '2023-09-03 04:08:49', '2023-09-03 04:08:49', 'Herbology', 2, 1, 1, '2023-09-25', '2023-10-30', '45', NULL),
	(6, '2023-09-03 04:13:24', '2023-09-03 04:13:24', 'Care of Magical Creatures', 4, 4, 4, '2023-11-06', '2023-12-31', '180', NULL),
	(7, '2023-09-03 04:24:37', '2023-09-03 04:24:37', 'Flying', 4, 1, 1, '2023-09-05', '2023-10-10', '135', NULL);

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(43, '2014_10_12_000000_create_users_table', 1),
	(44, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(45, '2019_08_19_000000_create_failed_jobs_table', 1),
	(46, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(47, '2023_08_11_075045_create_giang_vien', 2),
	(48, '2023_08_15_120740_create_chi_nhanh', 2),
	(49, '2023_08_15_120845_create_hoc_vien', 2),
	(50, '2023_08_17_100049_create_cap_do', 2),
	(51, '2023_08_17_111837_create_lop', 2),
	(52, '2023_08_17_111901_create_hoc_vien_lop', 2),
	(53, '2023_08_17_155638_alter_chi_nhanh', 2),
	(54, '2023_08_17_155711_alter_hoc_vien', 2);

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Test User', 'test@example.com', '2023-09-03 03:05:40', '$2y$10$eC8.8481eAu8pEfYySorju2OxNLjMKV/M6KNKPgPdJI2k1EgmcYQa', 'ALC0tG3OK0', '2023-09-03 03:05:40', '2023-09-03 03:05:40');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
