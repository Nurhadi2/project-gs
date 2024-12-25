/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100431 (10.4.31-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_gis_farmfield

 Target Server Type    : MySQL
 Target Server Version : 100431 (10.4.31-MariaDB)
 File Encoding         : 65001

 Date: 30/11/2024 21:11:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_groups_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `auth_groups_users_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_groups_users
-- ----------------------------
INSERT INTO `auth_groups_users` VALUES (1, 1, 'user', '2024-11-18 14:47:49');
INSERT INTO `auth_groups_users` VALUES (14, 18, 'ketua', '2024-11-28 03:18:33');
INSERT INTO `auth_groups_users` VALUES (15, 19, 'penyuluh', '2024-11-28 03:30:19');
INSERT INTO `auth_groups_users` VALUES (16, 20, 'petani', '2024-11-28 03:33:18');
INSERT INTO `auth_groups_users` VALUES (17, 22, 'petani', '2024-11-28 03:36:33');
INSERT INTO `auth_groups_users` VALUES (18, 23, 'ketua', '2024-11-28 03:43:53');
INSERT INTO `auth_groups_users` VALUES (19, 24, 'petani', '2024-11-28 03:45:31');

-- ----------------------------
-- Table structure for auth_identities
-- ----------------------------
DROP TABLE IF EXISTS `auth_identities`;
CREATE TABLE `auth_identities`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secret2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `expires` datetime NULL DEFAULT NULL,
  `extra` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `type_secret`(`type` ASC, `secret` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_identities
-- ----------------------------
INSERT INTO `auth_identities` VALUES (1, 1, 'email_password', NULL, 'admin@gmail.com', '$2y$12$py32Vy4L.cMiG.bhs37m7uSD2E8mi2QBOE5V/Aa6ft/02rXpmv.8e', NULL, NULL, 0, '2024-11-30 14:10:33', '2024-11-18 14:47:48', '2024-11-30 14:10:33');
INSERT INTO `auth_identities` VALUES (18, 18, 'email_password', NULL, 'ketua@gmail.com', '$2y$12$8mPbe1pfMLlDRSTk/Hf1TuVWbwcdX7zABePyM1DgXNsmbz6Iwg9p6', NULL, NULL, 0, '2024-11-28 03:35:34', '2024-11-28 03:18:33', '2024-11-28 03:35:34');
INSERT INTO `auth_identities` VALUES (19, 19, 'email_password', NULL, 'penyuluh@gmail.com', '$2y$12$e7dsJXUQtl8000G9ppZZgeFFk/8dfmSwQprWyDBFFlumoepKEBwWG', NULL, NULL, 0, '2024-11-28 03:37:09', '2024-11-28 03:30:19', '2024-11-28 03:37:09');
INSERT INTO `auth_identities` VALUES (20, 20, 'email_password', NULL, 'petaniaktif@gmail.com', '$2y$12$xeONjfvbeEV9lkOcFXr/o.Flj.6te9LjckKNiR0xL1LJBh6J0Iaha', NULL, NULL, 0, NULL, '2024-11-28 03:33:18', '2024-11-28 03:33:18');
INSERT INTO `auth_identities` VALUES (22, 22, 'email_password', NULL, 'petani1@gmail.com', '$2y$12$0Wa99nFd7aKk05m1yoYI/uWsC/U30RKxSsJiYomXSamCIbj6XtBgW', NULL, NULL, 0, NULL, '2024-11-28 03:36:33', '2024-11-28 03:36:33');
INSERT INTO `auth_identities` VALUES (23, 23, 'email_password', NULL, 'mashadi@gmail.com', '$2y$12$OI5IHsl6ckcsEDboRdJUK.DWk4./sTkfL.YsgXZkUCqheMkaeZ5am', NULL, NULL, 0, NULL, '2024-11-28 03:43:53', '2024-11-28 03:43:53');
INSERT INTO `auth_identities` VALUES (24, 24, 'email_password', NULL, 'petanimashadi@gmail.com', '$2y$12$7DE2Au9d4cMLEGrIbx2akuidcDiG.4Fn/Ogd600JXU./K3XfSY716', NULL, NULL, 0, NULL, '2024-11-28 03:45:31', '2024-11-28 03:45:31');

-- ----------------------------
-- Table structure for auth_logins
-- ----------------------------
DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED NULL DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_type_identifier`(`id_type` ASC, `identifier` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_logins
-- ----------------------------
INSERT INTO `auth_logins` VALUES (1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:15:05', 1);
INSERT INTO `auth_logins` VALUES (2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:16:54', 1);
INSERT INTO `auth_logins` VALUES (3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:20:17', 1);
INSERT INTO `auth_logins` VALUES (4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-18 15:30:26', 0);
INSERT INTO `auth_logins` VALUES (5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:30:34', 1);
INSERT INTO `auth_logins` VALUES (6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-18 15:35:49', 1);
INSERT INTO `auth_logins` VALUES (7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-19 01:22:37', 0);
INSERT INTO `auth_logins` VALUES (8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-19 01:22:47', 1);
INSERT INTO `auth_logins` VALUES (9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-19 04:36:19', 0);
INSERT INTO `auth_logins` VALUES (10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-20 00:56:38', 0);
INSERT INTO `auth_logins` VALUES (11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-20 00:56:45', 0);
INSERT INTO `auth_logins` VALUES (12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-20 00:56:51', 0);
INSERT INTO `auth_logins` VALUES (13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-20 00:56:59', 1);
INSERT INTO `auth_logins` VALUES (14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-20 01:43:58', 1);
INSERT INTO `auth_logins` VALUES (15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 01:32:33', 1);
INSERT INTO `auth_logins` VALUES (16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-21 02:37:26', 0);
INSERT INTO `auth_logins` VALUES (17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-21 02:37:34', 0);
INSERT INTO `auth_logins` VALUES (18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 02:37:40', 1);
INSERT INTO `auth_logins` VALUES (19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 04:10:23', 1);
INSERT INTO `auth_logins` VALUES (20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 08:07:35', 1);
INSERT INTO `auth_logins` VALUES (21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-21 08:42:04', 1);
INSERT INTO `auth_logins` VALUES (22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-22 02:45:54', 1);
INSERT INTO `auth_logins` VALUES (23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-22 13:34:24', 1);
INSERT INTO `auth_logins` VALUES (24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-23 01:22:13', 0);
INSERT INTO `auth_logins` VALUES (25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 01:22:19', 1);
INSERT INTO `auth_logins` VALUES (26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', NULL, '2024-11-23 01:26:24', 0);
INSERT INTO `auth_logins` VALUES (27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 01:26:30', 1);
INSERT INTO `auth_logins` VALUES (28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 01:42:55', 1);
INSERT INTO `auth_logins` VALUES (29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 06:30:17', 1);
INSERT INTO `auth_logins` VALUES (30, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 08:07:56', 1);
INSERT INTO `auth_logins` VALUES (31, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-23 13:50:18', 1);
INSERT INTO `auth_logins` VALUES (32, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-24 11:42:08', 1);
INSERT INTO `auth_logins` VALUES (33, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-25 00:58:22', 1);
INSERT INTO `auth_logins` VALUES (34, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-25 06:14:48', 1);
INSERT INTO `auth_logins` VALUES (35, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-25 08:39:48', 1);
INSERT INTO `auth_logins` VALUES (36, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 00:53:53', 1);
INSERT INTO `auth_logins` VALUES (37, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 06:28:27', 1);
INSERT INTO `auth_logins` VALUES (38, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 13:56:33', 1);
INSERT INTO `auth_logins` VALUES (39, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'vio@gmail.com', 6, '2024-11-26 14:45:00', 1);
INSERT INTO `auth_logins` VALUES (40, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 14:48:59', 1);
INSERT INTO `auth_logins` VALUES (41, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 14:58:42', 1);
INSERT INTO `auth_logins` VALUES (42, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'vio@gmail.com', NULL, '2024-11-26 15:00:06', 0);
INSERT INTO `auth_logins` VALUES (43, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'vio@gmail.com', 6, '2024-11-26 15:00:13', 1);
INSERT INTO `auth_logins` VALUES (44, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-26 15:01:53', 1);
INSERT INTO `auth_logins` VALUES (45, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-27 23:18:52', 1);
INSERT INTO `auth_logins` VALUES (46, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd3@gmail.com', 12, '2024-11-27 23:40:53', 1);
INSERT INTO `auth_logins` VALUES (47, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-27 23:41:24', 1);
INSERT INTO `auth_logins` VALUES (48, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-28 02:45:49', 1);
INSERT INTO `auth_logins` VALUES (49, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-28 02:50:51', 1);
INSERT INTO `auth_logins` VALUES (50, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'penyuluh@gmail.com', 19, '2024-11-28 03:34:28', 1);
INSERT INTO `auth_logins` VALUES (51, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'ketua@gmail.com', 18, '2024-11-28 03:35:34', 1);
INSERT INTO `auth_logins` VALUES (52, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'penyuluh@gmail.com', 19, '2024-11-28 03:37:09', 1);
INSERT INTO `auth_logins` VALUES (53, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-28 03:42:33', 1);
INSERT INTO `auth_logins` VALUES (54, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-28 03:42:49', 1);
INSERT INTO `auth_logins` VALUES (55, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'adrianhhd@gmail.com', 1, '2024-11-29 13:09:13', 1);
INSERT INTO `auth_logins` VALUES (56, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:05:03', 1);
INSERT INTO `auth_logins` VALUES (57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:05:47', 1);
INSERT INTO `auth_logins` VALUES (58, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:06:27', 1);
INSERT INTO `auth_logins` VALUES (59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:09:16', 1);
INSERT INTO `auth_logins` VALUES (60, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'email_password', 'admin@gmail.com', 1, '2024-11-30 14:10:33', 1);

-- ----------------------------
-- Table structure for auth_permissions_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_permissions_users`;
CREATE TABLE `auth_permissions_users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `auth_permissions_users_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_permissions_users
-- ----------------------------

-- ----------------------------
-- Table structure for auth_remember_tokens
-- ----------------------------
DROP TABLE IF EXISTS `auth_remember_tokens`;
CREATE TABLE `auth_remember_tokens`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hashedValidator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `selector`(`selector` ASC) USING BTREE,
  INDEX `auth_remember_tokens_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_remember_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for auth_token_logins
-- ----------------------------
DROP TABLE IF EXISTS `auth_token_logins`;
CREATE TABLE `auth_token_logins`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED NULL DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_type_identifier`(`id_type` ASC, `identifier` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_token_logins
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (14, '2024-11-18-140853', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1731940311, 1);
INSERT INTO `migrations` VALUES (15, '2024-11-18-142102', 'App\\Database\\Migrations\\User', 'default', 'App', 1731940311, 1);
INSERT INTO `migrations` VALUES (16, '2024-11-18-142611', 'App\\Database\\Migrations\\Komoditas', 'default', 'App', 1731940311, 1);
INSERT INTO `migrations` VALUES (17, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1731940512, 2);
INSERT INTO `migrations` VALUES (18, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1731940512, 2);
INSERT INTO `migrations` VALUES (19, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1731940512, 2);
INSERT INTO `migrations` VALUES (20, '2024-11-20-010448', 'App\\Database\\Migrations\\KelompokTani', 'default', 'App', 1732064875, 3);
INSERT INTO `migrations` VALUES (21, '2024-11-20-045303', 'App\\Database\\Migrations\\Petani', 'default', 'App', 1732177950, 4);
INSERT INTO `migrations` VALUES (22, '2024-11-23-020826', 'App\\Database\\Migrations\\JenisKomoditas', 'default', 'App', 1732327921, 5);
INSERT INTO `migrations` VALUES (25, '2024-11-23-033009', 'App\\Database\\Migrations\\TransaksiTanam', 'default', 'App', 1732333943, 6);
INSERT INTO `migrations` VALUES (26, '2024-11-23-033016', 'App\\Database\\Migrations\\TransaksiPanen', 'default', 'App', 1732333943, 6);
INSERT INTO `migrations` VALUES (27, '2024-11-27-231945', 'App\\Database\\Migrations\\KetuaKelompokTani', 'default', 'App', 1732749820, 7);
INSERT INTO `migrations` VALUES (28, '2024-11-27-232156', 'App\\Database\\Migrations\\Penyuluh', 'default', 'App', 1732749820, 7);

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `type` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'string',
  `context` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------

-- ----------------------------
-- Table structure for tb_bulan
-- ----------------------------
DROP TABLE IF EXISTS `tb_bulan`;
CREATE TABLE `tb_bulan`  (
  `id_month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `month_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_bulan
-- ----------------------------
INSERT INTO `tb_bulan` VALUES ('1', 'January');
INSERT INTO `tb_bulan` VALUES ('2', 'February');
INSERT INTO `tb_bulan` VALUES ('3', 'March');
INSERT INTO `tb_bulan` VALUES ('4', 'April');
INSERT INTO `tb_bulan` VALUES ('5', 'May');
INSERT INTO `tb_bulan` VALUES ('6', 'June');
INSERT INTO `tb_bulan` VALUES ('7', 'July');
INSERT INTO `tb_bulan` VALUES ('8', 'August');
INSERT INTO `tb_bulan` VALUES ('9', 'September');
INSERT INTO `tb_bulan` VALUES ('10', 'October');
INSERT INTO `tb_bulan` VALUES ('11', 'November');
INSERT INTO `tb_bulan` VALUES ('12', 'December');

-- ----------------------------
-- Table structure for tb_jenis_kepemilikan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_kepemilikan`;
CREATE TABLE `tb_jenis_kepemilikan`  (
  `id_jenis_kepemilikan` int NOT NULL AUTO_INCREMENT,
  `nama_jenis_kepemilikan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_kepemilikan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jenis_kepemilikan
-- ----------------------------
INSERT INTO `tb_jenis_kepemilikan` VALUES (1, 'SHM (Sertifikat Hak Milik)', NULL, NULL);

-- ----------------------------
-- Table structure for tb_jenis_komoditas
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_komoditas`;
CREATE TABLE `tb_jenis_komoditas`  (
  `id_jenis_komoditas` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_jenis_komoditas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jenis_komoditas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jenis_komoditas
-- ----------------------------
INSERT INTO `tb_jenis_komoditas` VALUES (2, 'Buah', '2024-11-28 03:17:32', '2024-11-28 03:17:32');
INSERT INTO `tb_jenis_komoditas` VALUES (3, 'Pangan', '2024-11-28 03:49:34', '2024-11-28 03:49:34');

-- ----------------------------
-- Table structure for tb_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori`  (
  `id_kategori` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kategori
-- ----------------------------

-- ----------------------------
-- Table structure for tb_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_kecamatan`;
CREATE TABLE `tb_kecamatan`  (
  `id_kecamatan` int NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kecamatan
-- ----------------------------
INSERT INTO `tb_kecamatan` VALUES (1, 'Watang Sawitto', NULL, NULL);
INSERT INTO `tb_kecamatan` VALUES (2, 'Kaliang', NULL, NULL);
INSERT INTO `tb_kecamatan` VALUES (3, 'Enrekang', NULL, NULL);
INSERT INTO `tb_kecamatan` VALUES (4, 'Cabean', NULL, NULL);

-- ----------------------------
-- Table structure for tb_kelompok_tani
-- ----------------------------
DROP TABLE IF EXISTS `tb_kelompok_tani`;
CREATE TABLE `tb_kelompok_tani`  (
  `id_kelompok_tani` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kelompok_tani` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_ketua` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_kecamatan` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kelompok_tani`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kelompok_tani
-- ----------------------------
INSERT INTO `tb_kelompok_tani` VALUES (7, 'Kelompoknya Mas Adrian', '4', 'Jl. Sesama', 1, '2024-11-28 03:31:25', '2024-11-28 03:31:25');
INSERT INTO `tb_kelompok_tani` VALUES (8, 'Kelompoknya Mas Hadi', '5', 'afgajlbsfkjasb', 3, '2024-11-28 03:44:09', '2024-11-28 03:44:09');

-- ----------------------------
-- Table structure for tb_ketua_kelompok_tani
-- ----------------------------
DROP TABLE IF EXISTS `tb_ketua_kelompok_tani`;
CREATE TABLE `tb_ketua_kelompok_tani`  (
  `id_ketua_kelompok_tani` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `handphone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ketua_kelompok_tani`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_ketua_kelompok_tani
-- ----------------------------
INSERT INTO `tb_ketua_kelompok_tani` VALUES (4, 'Jl. Sesama', 'Mas Ketua', '18274987214', '148761983', 18, '2024-11-28 03:18:33', '2024-11-28 03:18:33');
INSERT INTO `tb_ketua_kelompok_tani` VALUES (5, 'Jetis', 'Mas Hadi', '12847198271', '909090', 23, '2024-11-28 03:43:53', '2024-11-28 03:43:53');

-- ----------------------------
-- Table structure for tb_komoditas
-- ----------------------------
DROP TABLE IF EXISTS `tb_komoditas`;
CREATE TABLE `tb_komoditas`  (
  `id_komoditas` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_kategori` int UNSIGNED NOT NULL,
  `nama_komoditas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_komoditas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_komoditas
-- ----------------------------
INSERT INTO `tb_komoditas` VALUES (5, 2, 'Semangka', '2024-11-28 10:49:21', '2024-11-28 10:49:21');

-- ----------------------------
-- Table structure for tb_koordinat
-- ----------------------------
DROP TABLE IF EXISTS `tb_koordinat`;
CREATE TABLE `tb_koordinat`  (
  `id_koordinat` int NOT NULL AUTO_INCREMENT,
  `id_lahan` int NULL DEFAULT NULL,
  `latitude` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `longitude` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_koordinat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_koordinat
-- ----------------------------
INSERT INTO `tb_koordinat` VALUES (1, 1, '-3.8023080887228673', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66394424438477');
INSERT INTO `tb_koordinat` VALUES (2, 1, '-3.804502655971931', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66308593750001');
INSERT INTO `tb_koordinat` VALUES (3, 1, '-3.80488804281437', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66383695602418');
INSERT INTO `tb_koordinat` VALUES (4, 1, '-3.8040744481670314', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66409444808961');
INSERT INTO `tb_koordinat` VALUES (5, 1, '-3.8035713037243886', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66440558433534');
INSERT INTO `tb_koordinat` VALUES (6, 1, '-3.8027362974053576', '2024-09-12 13:53:23', '2024-09-12 13:53:23', '119.66500639915468');
INSERT INTO `tb_koordinat` VALUES (7, 2, '-3.8025543087412927', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.6987807750702');
INSERT INTO `tb_koordinat` VALUES (8, 2, '-3.803153800665983', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.69857692718507');
INSERT INTO `tb_koordinat` VALUES (9, 2, '-3.803988806580523', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.7002935409546');
INSERT INTO `tb_koordinat` VALUES (10, 2, '-3.8036890609606986', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70054030418397');
INSERT INTO `tb_koordinat` VALUES (11, 2, '-3.8039245753850506', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70117330551149');
INSERT INTO `tb_koordinat` VALUES (12, 2, '-3.8043206676808556', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70105528831483');
INSERT INTO `tb_koordinat` VALUES (13, 2, '-3.8046311182718866', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70165610313417');
INSERT INTO `tb_koordinat` VALUES (14, 2, '-3.804170794941685', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70188140869142');
INSERT INTO `tb_koordinat` VALUES (15, 2, '-3.8038603441847947', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70207452774049');
INSERT INTO `tb_koordinat` VALUES (16, 2, '-3.8039995117793044', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.7024178504944');
INSERT INTO `tb_koordinat` VALUES (17, 2, '-3.804138679351334', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70273971557619');
INSERT INTO `tb_koordinat` VALUES (18, 2, '-3.804245731314527', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70291137695314');
INSERT INTO `tb_koordinat` VALUES (19, 2, '-3.803175211084155', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.70386624336244');
INSERT INTO `tb_koordinat` VALUES (20, 2, '-3.8013767341040814', '2024-09-12 13:53:57', '2024-09-12 13:53:57', '119.69969272613527');

-- ----------------------------
-- Table structure for tb_koordinat_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_koordinat_kecamatan`;
CREATE TABLE `tb_koordinat_kecamatan`  (
  `id_koordinat_kecamatan` int NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int NULL DEFAULT NULL,
  `latitude` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `longitude` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_koordinat_kecamatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_koordinat_kecamatan
-- ----------------------------
INSERT INTO `tb_koordinat_kecamatan` VALUES (1, 1, '-3.7891917531350443', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.65347290039062');
INSERT INTO `tb_koordinat_kecamatan` VALUES (2, 1, '-3.8248185295599084', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.65347290039062');
INSERT INTO `tb_koordinat_kecamatan` VALUES (3, 1, '-3.859073648893726', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.63699340820314');
INSERT INTO `tb_koordinat_kecamatan` VALUES (4, 1, '-3.882366341710861', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.63150024414064');
INSERT INTO `tb_koordinat_kecamatan` VALUES (5, 1, '-3.920729374303303', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.62463378906251');
INSERT INTO `tb_koordinat_kecamatan` VALUES (6, 1, '-3.9399102315272283', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.61502075195314');
INSERT INTO `tb_koordinat_kecamatan` VALUES (7, 1, '-3.9755306486184714', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.64111328125001');
INSERT INTO `tb_koordinat_kecamatan` VALUES (8, 1, '-3.9906003625922026', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.65209960937501');
INSERT INTO `tb_koordinat_kecamatan` VALUES (9, 1, '-3.9577206315863434', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.66583251953126');
INSERT INTO `tb_koordinat_kecamatan` VALUES (10, 1, '-3.9481304636558225', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.68093872070314');
INSERT INTO `tb_koordinat_kecamatan` VALUES (11, 1, '-3.9220994501539064', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.696044921875');
INSERT INTO `tb_koordinat_kecamatan` VALUES (12, 1, '-3.9220084686240706', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.70102310180665');
INSERT INTO `tb_koordinat_kecamatan` VALUES (13, 1, '-3.9177269736706735', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.70428466796876');
INSERT INTO `tb_koordinat_kecamatan` VALUES (14, 1, '-3.91361671790139', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.71063613891603');
INSERT INTO `tb_koordinat_kecamatan` VALUES (15, 1, '-3.908821394010173', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.71595764160158');
INSERT INTO `tb_koordinat_kecamatan` VALUES (16, 1, '-3.9069375092625394', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.71904754638673');
INSERT INTO `tb_koordinat_kecamatan` VALUES (17, 1, '-3.904197305714831', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.72351074218751');
INSERT INTO `tb_koordinat_kecamatan` VALUES (18, 1, '-3.9027683288318133', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.73861694335938');
INSERT INTO `tb_koordinat_kecamatan` VALUES (19, 1, '-3.8637193933405203', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.77294921875001');
INSERT INTO `tb_koordinat_kecamatan` VALUES (20, 1, '-3.8527579647750305', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.80041503906251');
INSERT INTO `tb_koordinat_kecamatan` VALUES (21, 1, '-3.843851700056829', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.81277465820314');
INSERT INTO `tb_koordinat_kecamatan` VALUES (22, 1, '-3.8322049058743795', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.74273681640626');
INSERT INTO `tb_koordinat_kecamatan` VALUES (23, 1, '-3.7986338487645215', '2024-09-12 13:50:28', '2024-09-12 13:50:28', '119.68917846679689');
INSERT INTO `tb_koordinat_kecamatan` VALUES (24, 2, '-3.776291671376186', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.65484619140625');
INSERT INTO `tb_koordinat_kecamatan` VALUES (25, 2, '-3.763273635195431', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.7005081176758');
INSERT INTO `tb_koordinat_kecamatan` VALUES (26, 2, '-3.7293573131312434', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.73896026611328');
INSERT INTO `tb_koordinat_kecamatan` VALUES (27, 2, '-3.710931893132288', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.74205017089845');
INSERT INTO `tb_koordinat_kecamatan` VALUES (28, 2, '-3.703394597093784', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.75166320800783');
INSERT INTO `tb_koordinat_kecamatan` VALUES (29, 2, '-3.690375480117165', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.7557830810547');
INSERT INTO `tb_koordinat_kecamatan` VALUES (30, 2, '-3.6766709403345166', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.75784301757814');
INSERT INTO `tb_koordinat_kecamatan` VALUES (31, 2, '-3.684893689530931', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.77363586425783');
INSERT INTO `tb_koordinat_kecamatan` VALUES (32, 2, '-3.6711890653984076', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.78256225585939');
INSERT INTO `tb_koordinat_kecamatan` VALUES (33, 2, '-3.6794118651672703', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.79011535644533');
INSERT INTO `tb_koordinat_kecamatan` VALUES (34, 2, '-3.7040798084785482', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.79217529296876');
INSERT INTO `tb_koordinat_kecamatan` VALUES (35, 2, '-3.7123023036883724', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.80247497558594');
INSERT INTO `tb_koordinat_kecamatan` VALUES (36, 2, '-3.723265511510233', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.81895446777345');
INSERT INTO `tb_koordinat_kecamatan` VALUES (37, 2, '-3.7198395237111486', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.83406066894533');
INSERT INTO `tb_koordinat_kecamatan` VALUES (38, 2, '-3.7239507074707445', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.84298706054689');
INSERT INTO `tb_koordinat_kecamatan` VALUES (39, 2, '-3.727606861273276', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85191345214845');
INSERT INTO `tb_koordinat_kecamatan` VALUES (40, 2, '-3.733430981173967', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.86358642578126');
INSERT INTO `tb_koordinat_kecamatan` VALUES (41, 2, '-3.7363430266414346', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.86873626708986');
INSERT INTO `tb_koordinat_kecamatan` VALUES (42, 2, '-3.744222630601502', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.86839294433595');
INSERT INTO `tb_koordinat_kecamatan` VALUES (43, 2, '-3.751416989678668', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.86495971679689');
INSERT INTO `tb_koordinat_kecamatan` VALUES (44, 2, '-3.7565557813333954', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85929489135744');
INSERT INTO `tb_koordinat_kecamatan` VALUES (45, 2, '-3.7601676378814686', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85517501831055');
INSERT INTO `tb_koordinat_kecamatan` VALUES (46, 2, '-3.761366679948778', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85508918762208');
INSERT INTO `tb_koordinat_kecamatan` VALUES (47, 2, '-3.7650159864447885', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85646247863771');
INSERT INTO `tb_koordinat_kecamatan` VALUES (48, 2, '-3.7769768257731453', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.85019683837892');
INSERT INTO `tb_koordinat_kecamatan` VALUES (49, 2, '-3.8074656474270254', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.83131408691408');
INSERT INTO `tb_koordinat_kecamatan` VALUES (50, 2, '-3.835898070120294', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.82616424560548');
INSERT INTO `tb_koordinat_kecamatan` VALUES (51, 2, '-3.8430916659445', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.81792449951173');
INSERT INTO `tb_koordinat_kecamatan` VALUES (52, 2, '-3.8287044137387087', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.75406646728517');
INSERT INTO `tb_koordinat_kecamatan` VALUES (53, 2, '-3.8266490722369846', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.73896026611328');
INSERT INTO `tb_koordinat_kecamatan` VALUES (54, 2, '-3.816372290806852', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.72557067871095');
INSERT INTO `tb_koordinat_kecamatan` VALUES (55, 2, '-3.7951332199053165', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.68643188476564');
INSERT INTO `tb_koordinat_kecamatan` VALUES (56, 2, '-3.792050085489475', '2024-09-12 13:51:47', '2024-09-12 13:51:47', '119.65347290039062');

-- ----------------------------
-- Table structure for tb_lahan
-- ----------------------------
DROP TABLE IF EXISTS `tb_lahan`;
CREATE TABLE `tb_lahan`  (
  `id_lahan` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_kepemilikan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total_penghasilan` int NULL DEFAULT NULL,
  `lokasi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `luas` int NULL DEFAULT NULL,
  `id_petani` int NOT NULL,
  PRIMARY KEY (`id_lahan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_lahan
-- ----------------------------
INSERT INTO `tb_lahan` VALUES (4, '4', '1', 9000000, 'Jetis Utara 1', 155, 7);
INSERT INTO `tb_lahan` VALUES (5, '3', '1', 6000000, 'akjsfhajkshf', 115, 9);

-- ----------------------------
-- Table structure for tb_penyuluh
-- ----------------------------
DROP TABLE IF EXISTS `tb_penyuluh`;
CREATE TABLE `tb_penyuluh`  (
  `id_penyuluh` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `handphone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `id_kecamatan` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_penyuluh`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_penyuluh
-- ----------------------------
INSERT INTO `tb_penyuluh` VALUES (3, 'Jl. Sesama', 'Penyuluh', '812398124', '123123123', 19, 1, '2024-11-28 03:30:19', '2024-11-28 03:30:19');

-- ----------------------------
-- Table structure for tb_petani
-- ----------------------------
DROP TABLE IF EXISTS `tb_petani`;
CREATE TABLE `tb_petani`  (
  `id_petani` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `handphone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `id_kelompok_tani` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_petani`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_petani
-- ----------------------------
INSERT INTO `tb_petani` VALUES (7, 'aslkfhalskf', 'Petani Aktif Langusng', '1478212131', '121231231', 20, 7, '2024-11-28 03:33:18', '2024-11-28 03:33:18');
INSERT INTO `tb_petani` VALUES (8, 'asdasdasdasd', 'Petani Harus Melalui Persetujuan', '1231231', '1231231', 22, 7, '2024-11-28 03:36:33', '2024-11-28 03:36:33');
INSERT INTO `tb_petani` VALUES (9, 'ajsdgajsfnhlaskj', 'Petaninya Mas Hadi', '1984712713', '1290478120931', 24, 8, '2024-11-28 03:45:31', '2024-11-28 03:45:31');

-- ----------------------------
-- Table structure for tb_transaksi_panen
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaksi_panen`;
CREATE TABLE `tb_transaksi_panen`  (
  `id_transaksi_panen` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `bulan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_lahan` int UNSIGNED NOT NULL,
  `total_area` int NULL DEFAULT NULL,
  `produksi` double NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi_panen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_transaksi_panen
-- ----------------------------
INSERT INTO `tb_transaksi_panen` VALUES (5, '11', '2024', 5, 88, 9, '2024-11-28 03:47:04', '2024-11-28 03:47:04');

-- ----------------------------
-- Table structure for tb_transaksi_tanam
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaksi_tanam`;
CREATE TABLE `tb_transaksi_tanam`  (
  `id_transaksi_tanam` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `bulan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_lahan` int UNSIGNED NOT NULL,
  `total_area` int NULL DEFAULT NULL,
  `urea` double NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi_tanam`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_transaksi_tanam
-- ----------------------------
INSERT INTO `tb_transaksi_tanam` VALUES (8, '11', '2024', 4, 100, 90, '2024-11-28 03:40:32', '2024-11-28 03:40:32');
INSERT INTO `tb_transaksi_tanam` VALUES (9, '11', '2024', 5, 111, 99, '2024-11-28 03:46:20', '2024-11-28 03:46:20');
INSERT INTO `tb_transaksi_tanam` VALUES (10, '10', '2024', 4, 55, 44, '2024-11-28 03:48:11', '2024-11-28 03:48:11');

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users`  (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `updated_at` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES (1, '112233', '12345', 'admin', '2024-11-18 21:31:58', '2024-11-18 21:31:58');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', NULL, NULL, 1, '2024-11-30 14:10:33', '2024-11-18 14:47:48', '2024-11-18 14:47:49', NULL);
INSERT INTO `users` VALUES (18, 'ketua', NULL, NULL, 1, '2024-11-28 03:36:33', '2024-11-28 03:18:33', '2024-11-28 03:18:33', NULL);
INSERT INTO `users` VALUES (19, 'penyuluh', NULL, NULL, 1, '2024-11-28 03:42:15', '2024-11-28 03:30:19', '2024-11-28 03:30:19', NULL);
INSERT INTO `users` VALUES (20, 'petaniaktif', NULL, NULL, 1, NULL, '2024-11-28 03:33:18', '2024-11-28 03:33:18', NULL);
INSERT INTO `users` VALUES (22, 'petani1@gmail.com', NULL, NULL, 1, NULL, '2024-11-28 03:36:32', '2024-11-28 03:37:31', NULL);
INSERT INTO `users` VALUES (23, 'mashadi', NULL, NULL, 1, NULL, '2024-11-28 03:43:53', '2024-11-28 03:43:53', NULL);
INSERT INTO `users` VALUES (24, 'petanimashadi', NULL, NULL, 1, NULL, '2024-11-28 03:45:30', '2024-11-28 03:45:31', NULL);

SET FOREIGN_KEY_CHECKS = 1;
