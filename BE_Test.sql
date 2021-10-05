/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80026
 Source Host           : localhost:3306
 Source Schema         : technical_test

 Target Server Type    : MySQL
 Target Server Version : 80026
 File Encoding         : 65001

 Date: 06/10/2021 03:39:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint DEFAULT '1' COMMENT '0:Non-Active, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bank
-- ----------------------------
BEGIN;
INSERT INTO `bank` VALUES (1, 'Bank Central Asia', 1, '2021-01-12 11:56:45', '2021-02-08 16:15:29', 'Super Admin', 'Admin Unit Kerja');
INSERT INTO `bank` VALUES (2, 'Bank Mandiri', 1, '2021-01-20 13:21:22', '2021-01-20 13:21:33', 'Super Admin', 'Super Admin');
INSERT INTO `bank` VALUES (10, 'Bank Negara Indonesia', 1, '2021-03-12 10:26:45', '2021-03-12 10:26:45', 'YUSRON HAMIDI', NULL);
INSERT INTO `bank` VALUES (11, 'Bank Republik Indonesia', 1, '2021-03-12 11:22:18', '2021-03-12 11:22:36', 'YUSRON HAMIDI', 'YUSRON HAMIDI');
INSERT INTO `bank` VALUES (13, 'Bank Jabar', 1, '2021-03-23 10:34:57', '2021-03-23 10:34:57', 'YON GURETNO', NULL);
INSERT INTO `bank` VALUES (14, 'Permata', 1, '2021-04-28 20:39:32', '2021-04-28 20:39:32', 'Super Admin', NULL);
INSERT INTO `bank` VALUES (15, 'BTPN', 1, '2021-04-28 21:21:14', '2021-04-28 21:21:14', 'Super Admin', NULL);
INSERT INTO `bank` VALUES (16, 'CIMB Niaga Syariah', 1, '2021-04-29 10:52:42', '2021-04-29 10:52:42', 'Super Admin', NULL);
COMMIT;

-- ----------------------------
-- Table structure for candidate
-- ----------------------------
DROP TABLE IF EXISTS `candidate`;
CREATE TABLE `candidate` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('P','L') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'P:Perempuan, L:Laki-laki',
  `city_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` bigint unsigned NOT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_id` bigint unsigned NOT NULL,
  `university_id` bigint unsigned DEFAULT NULL,
  `university_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_college` tinyint DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_portofolio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_information_id` bigint unsigned DEFAULT NULL,
  `source_information_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ranking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assessment_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_sent` tinyint DEFAULT '0' COMMENT '0: Not Yet, 1: Done',
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_status_id` bigint unsigned DEFAULT NULL,
  `aggrement` tinyint(1) DEFAULT '1' COMMENT '0:Non-Active, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apprentice_vacancy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apprentice_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apprentice_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apprentice_periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `candidates_religion_id_foreign` (`religion_id`),
  KEY `candidates_bank_id_foreign` (`bank_id`),
  KEY `candidates_education_id_foreign` (`education_id`),
  KEY `candidates_university_id_foreign` (`university_id`),
  KEY `candidates_source_information_id_foreign` (`source_information_id`),
  KEY `candidates_candidate_status_id_foreign` (`candidate_status_id`),
  CONSTRAINT `candidates_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `candidates_candidate_status_id_foreign` FOREIGN KEY (`candidate_status_id`) REFERENCES `candidate_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `candidates_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `candidates_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `candidates_source_information_id_foreign` FOREIGN KEY (`source_information_id`) REFERENCES `source_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `candidates_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for candidate_organization
-- ----------------------------
DROP TABLE IF EXISTS `candidate_organization`;
CREATE TABLE `candidate_organization` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `org_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for candidate_status
-- ----------------------------
DROP TABLE IF EXISTS `candidate_status`;
CREATE TABLE `candidate_status` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1' COMMENT '0:Non-Active, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of candidate_status
-- ----------------------------
BEGIN;
INSERT INTO `candidate_status` VALUES (1, 'Review JLI', '<label class=\"badge badge-gradient-warning\">Review JLI</label>', 1, '2021-01-20 10:25:48', '2021-01-20 10:25:48', NULL, NULL);
INSERT INTO `candidate_status` VALUES (2, 'Tidak Lolos (Oleh JLI)', '<label class=\"badge badge-gradient-danger\">Tidak Lolos (JLI)</label>', 1, '2021-01-20 10:25:59', '2021-01-20 10:25:59', NULL, NULL);
INSERT INTO `candidate_status` VALUES (3, 'Review Unit Kerja', '<label class=\"badge badge-gradient-info\">Review Unit Kerja</label>', 1, '2021-01-20 10:26:29', '2021-01-20 10:26:29', NULL, NULL);
INSERT INTO `candidate_status` VALUES (4, 'Lolos (Oleh Unit Kerja)', '<label class=\"badge badge-gradient-success\"> Lolos (Unit)</label>', 1, '2021-01-20 10:26:44', '2021-01-20 10:26:44', NULL, NULL);
INSERT INTO `candidate_status` VALUES (5, 'Tidak Lolos (Oleh Unit Kerja)', '<label class=\"badge badge-gradient-danger\"> Tidak Lolos (Unit)</label>', 1, '2021-01-20 10:26:51', '2021-01-20 10:26:51', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for education
-- ----------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1' COMMENT '0:Non-Active, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of education
-- ----------------------------
BEGIN;
INSERT INTO `education` VALUES (1, 'SMA', 1, '2021-01-12 11:35:34', '2021-01-12 11:40:51', 'Super Admin', 'Super Admin');
INSERT INTO `education` VALUES (2, 'S1', 1, '2021-01-20 13:28:18', '2021-02-08 14:33:38', 'Super Admin', 'Super Admin');
INSERT INTO `education` VALUES (6, 'S2', 1, '2021-02-08 14:33:56', '2021-02-08 14:33:56', 'Super Admin', NULL);
INSERT INTO `education` VALUES (12, 'S3', 1, '2021-03-12 11:19:00', '2021-03-12 15:55:04', 'YUSRON HAMIDI', 'YON GURETNO');
INSERT INTO `education` VALUES (14, 'D3', 1, '2021-03-23 10:32:18', '2021-03-23 10:32:18', 'YON GURETNO', NULL);
INSERT INTO `education` VALUES (15, 'D4', 0, '2021-03-23 10:32:38', '2021-04-09 16:52:05', 'YON GURETNO', 'YON GURETNO');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_10_05_134309_create_transaction_table', 2);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for religion
-- ----------------------------
DROP TABLE IF EXISTS `religion`;
CREATE TABLE `religion` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1' COMMENT '0:Non-Active, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of religion
-- ----------------------------
BEGIN;
INSERT INTO `religion` VALUES (1, 'Islam', 1, '2021-01-11 13:42:08', '2021-01-11 13:42:08', 'db', NULL);
INSERT INTO `religion` VALUES (2, 'Budha', 1, '2021-01-11 14:11:37', '2021-01-11 14:16:31', 'Super Admin', 'Super Admin');
INSERT INTO `religion` VALUES (3, 'Protestan', 1, '2021-03-02 14:09:22', '2021-03-02 14:09:22', 'dira', NULL);
INSERT INTO `religion` VALUES (4, 'Katolik', 1, '2021-03-02 14:09:27', '2021-03-02 14:09:27', 'dira', NULL);
INSERT INTO `religion` VALUES (5, 'Hindu', 1, '2021-03-02 14:09:44', '2021-03-02 14:09:44', 'dira', NULL);
COMMIT;

-- ----------------------------
-- Table structure for source_information
-- ----------------------------
DROP TABLE IF EXISTS `source_information`;
CREATE TABLE `source_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1' COMMENT '0:Non-Active, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of source_information
-- ----------------------------
BEGIN;
INSERT INTO `source_information` VALUES (1, 'Internet', 1, '2021-02-24 08:58:35', '2021-02-24 08:58:35', NULL, NULL);
INSERT INTO `source_information` VALUES (2, 'Instagram', 1, '2021-02-24 08:58:38', '2021-02-24 08:58:38', NULL, NULL);
INSERT INTO `source_information` VALUES (3, 'Twitter', 1, '2021-02-24 08:58:41', '2021-02-24 08:58:41', NULL, NULL);
INSERT INTO `source_information` VALUES (4, 'Kampus', 1, '2021-02-24 08:58:44', '2021-02-24 08:58:44', NULL, NULL);
INSERT INTO `source_information` VALUES (5, 'Facebook', 1, '2021-02-24 08:59:02', '2021-02-24 08:59:02', NULL, NULL);
INSERT INTO `source_information` VALUES (6, 'Lain-lain', 1, '2021-02-24 08:59:05', '2021-02-24 08:59:05', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for university
-- ----------------------------
DROP TABLE IF EXISTS `university`;
CREATE TABLE `university` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendation_university_id` bigint unsigned DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1' COMMENT '0:Non-Active, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of university
-- ----------------------------
BEGIN;
INSERT INTO `university` VALUES (1, 'Universitas Singaperbangsa Karawang', NULL, 1, 1, '2021-01-12 11:46:56', '2021-01-20 13:33:56', 'Super Admin', 'Super Admin');
INSERT INTO `university` VALUES (2, 'Institut Teknologi Bandung', NULL, 1, 1, '2021-01-20 13:35:05', '2021-01-20 13:35:16', 'Super Admin', 'Super Admin');
INSERT INTO `university` VALUES (3, 'Universitas Trisakti', NULL, NULL, 1, '2021-02-08 14:37:01', '2021-02-08 14:37:14', 'Super Admin', 'Super Admin');
INSERT INTO `university` VALUES (5, 'Universitas Jakarta', NULL, NULL, 1, '2021-02-15 09:10:19', '2021-03-12 11:21:09', 'YUSRON HAMIDI', 'YUSRON HAMIDI');
INSERT INTO `university` VALUES (10, 'Universitas Telkom', NULL, NULL, 1, '2021-03-12 11:19:54', '2021-03-12 11:19:54', 'YUSRON HAMIDI', NULL);
INSERT INTO `university` VALUES (11, 'Universitas Malang', NULL, NULL, 0, '2021-03-12 15:55:18', '2021-03-12 15:55:23', 'YON GURETNO', 'YON GURETNO');
INSERT INTO `university` VALUES (12, 'Universitas Negeri Jakarta', NULL, NULL, 0, '2021-03-23 10:32:54', '2021-03-23 10:33:20', 'YUSRON HAMIDI', 'YUSRON HAMIDI');
INSERT INTO `university` VALUES (13, 'Universitas Padjajaran', NULL, NULL, 1, '2021-03-23 10:33:06', '2021-03-23 10:33:06', 'YON GURETNO', NULL);
INSERT INTO `university` VALUES (15, 'Institut Kesehatan Deli Husada Deli Tua', NULL, NULL, 1, '2021-04-12 11:18:15', '2021-04-12 11:18:15', NULL, NULL);
INSERT INTO `university` VALUES (16, 'Institut Pertanian Bogor', NULL, NULL, 1, '2021-04-12 11:18:42', '2021-04-12 11:18:42', NULL, NULL);
INSERT INTO `university` VALUES (17, 'Institut Teknologi Nasional Bandung', NULL, NULL, 1, '2021-04-12 11:19:04', '2021-04-12 11:19:04', NULL, NULL);
INSERT INTO `university` VALUES (18, 'Institut Teknologi Sepuluh Nopember', NULL, NULL, 1, '2021-04-12 11:19:41', '2021-04-12 11:19:41', NULL, NULL);
INSERT INTO `university` VALUES (19, 'Politeknik Negeri Jakarta', NULL, NULL, 1, '2021-04-12 11:20:00', '2021-04-12 11:20:00', NULL, NULL);
INSERT INTO `university` VALUES (20, 'Politeknik Negeri Media Kreatif', NULL, NULL, 1, '2021-04-12 11:20:13', '2021-04-12 11:20:13', NULL, NULL);
INSERT INTO `university` VALUES (21, 'Sekolah Tinggi Ilmu Ekonomi Indonesia', NULL, NULL, 1, '2021-04-12 11:20:32', '2021-04-12 11:20:32', NULL, NULL);
INSERT INTO `university` VALUES (22, 'Sekolah Tinggi Teknik PLN', NULL, NULL, 1, '2021-04-12 11:20:47', '2021-04-12 11:20:47', NULL, NULL);
INSERT INTO `university` VALUES (23, 'Sekolah Tinggi Teknologi Bandung', NULL, NULL, 1, '2021-04-12 11:21:03', '2021-04-12 11:21:03', NULL, NULL);
INSERT INTO `university` VALUES (24, 'STMIK Nusa Mandiri', NULL, NULL, 1, '2021-04-12 11:21:14', '2021-04-12 11:21:14', NULL, NULL);
INSERT INTO `university` VALUES (25, 'Universitas Bakrie', NULL, NULL, 1, '2021-04-12 11:21:34', '2021-04-12 11:21:34', NULL, NULL);
INSERT INTO `university` VALUES (26, 'Universitas Bina Nusantara', NULL, NULL, 1, '2021-04-12 11:22:02', '2021-04-12 11:22:02', NULL, NULL);
INSERT INTO `university` VALUES (27, 'Universitas Brawijaya', NULL, NULL, 1, '2021-04-12 11:22:15', '2021-04-12 11:22:15', NULL, NULL);
INSERT INTO `university` VALUES (28, 'Universitas Esa Unggul', NULL, NULL, 1, '2021-04-12 11:23:41', '2021-04-12 11:23:41', NULL, NULL);
INSERT INTO `university` VALUES (29, 'Universitas Fajar', NULL, NULL, 1, '2021-04-12 11:23:52', '2021-04-12 11:23:52', NULL, NULL);
INSERT INTO `university` VALUES (30, 'Universitas Islam Indonesia', NULL, NULL, 1, '2021-04-12 11:24:05', '2021-04-12 11:24:05', NULL, NULL);
INSERT INTO `university` VALUES (31, 'Universitas Islam Negeri Sunan Gunung Jati Bandung', NULL, NULL, 1, '2021-04-12 11:24:29', '2021-04-12 11:24:29', NULL, NULL);
INSERT INTO `university` VALUES (32, 'Universitas Mercu Buana', NULL, NULL, 1, '2021-04-12 11:24:54', '2021-04-12 11:24:54', NULL, NULL);
INSERT INTO `university` VALUES (33, 'Universitas Muhammadiyah Jakarta', NULL, NULL, 1, '2021-04-12 11:25:14', '2021-04-12 11:25:14', NULL, NULL);
INSERT INTO `university` VALUES (34, 'Universitas Nasional Jakarta', NULL, NULL, 1, '2021-04-12 11:25:28', '2021-04-12 11:25:28', NULL, NULL);
INSERT INTO `university` VALUES (35, 'Universitas Pancasila', NULL, NULL, 1, '2021-04-12 11:25:49', '2021-04-12 11:25:49', NULL, NULL);
INSERT INTO `university` VALUES (36, 'Universitas Pembangunan Jaya', NULL, NULL, 1, '2021-04-12 11:26:03', '2021-04-12 11:26:03', NULL, NULL);
INSERT INTO `university` VALUES (37, 'Universitas Presiden', NULL, NULL, 1, '2021-04-12 11:26:14', '2021-04-12 11:26:14', NULL, NULL);
INSERT INTO `university` VALUES (38, 'Universitas Sultan Ageng Tirtayasa', NULL, NULL, 1, '2021-04-12 11:27:23', '2021-04-12 11:27:23', NULL, NULL);
INSERT INTO `university` VALUES (39, 'Universitas Widyagama Malang', NULL, NULL, 1, '2021-04-12 11:27:47', '2021-04-12 11:27:47', NULL, NULL);
INSERT INTO `university` VALUES (40, 'UPN Veteran Jakarta', NULL, NULL, 1, '2021-04-12 11:28:00', '2021-04-12 11:28:00', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
