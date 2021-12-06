-- Adminer 4.8.1 MySQL 8.0.23 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int DEFAULT '0',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `title`, `parent_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1,	'testing',	NULL,	'testing',	1,	'2021-04-25 12:53:30',	'2021-04-25 12:53:50'),
(2,	'testing1',	NULL,	'testing1',	1,	'2021-07-12 09:21:16',	'2021-07-12 09:21:16'),
(3,	'Testing2',	NULL,	'testing2',	1,	'2021-07-12 09:21:34',	'2021-07-12 09:21:34'),
(4,	'Testing3',	NULL,	'testing3',	1,	'2021-07-12 09:21:49',	'2021-07-12 09:21:49'),
(5,	'Testing4',	NULL,	'testing4',	1,	'2021-07-12 09:22:02',	'2021-07-12 09:22:02'),
(6,	'Testing5',	NULL,	'testing5',	1,	'2021-07-12 09:22:17',	'2021-07-12 09:22:17'),
(7,	'Testing6',	NULL,	'testing6',	1,	'2021-07-12 09:22:27',	'2021-07-12 09:22:27');

DROP TABLE IF EXISTS `challenges`;
CREATE TABLE `challenges` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `video_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `challenges` (`id`, `video_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(2,	1,	3,	'pending',	'2021-10-04 12:21:55',	'2021-10-11 11:41:40'),
(3,	2,	4,	'pending',	'2021-10-04 12:21:57',	'2021-10-04 12:36:37'),
(16,	1,	2,	'pending',	'2021-10-12 05:39:50',	'2021-10-12 05:39:50');

DROP TABLE IF EXISTS `comment_replies`;
CREATE TABLE `comment_replies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comment_replies` (`id`, `comment_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1,	1,	2,	'@ sdafasdf',	'2021-10-04 09:10:56',	'2021-10-04 09:10:56'),
(2,	2,	2,	'@ New Reply',	'2021-10-04 09:14:17',	'2021-10-04 09:14:17');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `video_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `video_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1,	1,	3,	'hiiiiiiiiii',	'2021-09-09 15:38:49',	'2021-09-15 15:38:54'),
(2,	1,	2,	'new Comment',	'2021-10-04 09:13:53',	'2021-10-04 09:13:53');

DROP TABLE IF EXISTS `content_pages`;
CREATE TABLE `content_pages` (
  `id` bigint unsigned NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2020_08_21_101817_create_auctions_table',	1),
(5,	'2020_08_21_102140_create_auctioneers_table',	1),
(6,	'2020_08_21_102204_create_sellers_table',	1),
(7,	'2020_08_21_102226_create_bidders_table',	1),
(8,	'2020_08_21_102302_create_categories_table',	1),
(9,	'2021_02_02_085234_create_payment_methods_table',	1),
(10,	'2021_02_02_113758_create_watchlists_table',	1),
(11,	'2021_02_02_114836_create_bidding_items_table',	1),
(12,	'2021_08_27_050551_create_comments_table',	2),
(13,	'2021_09_02_105339_create_comment_replies_table',	2),
(14,	'2021_10_04_125138_create_challenges_table',	3);

DROP TABLE IF EXISTS `nofifies`;
CREATE TABLE `nofifies` (
  `noti_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned DEFAULT NULL,
  `notification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_del` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`noti_id`),
  KEY `nofifies_id_index` (`id`)
  /*CONSTRAINT `nofifies_id_foreign` FOREIGN KEY (`id`) REFERENCES `videos` (`id`)*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE `site_settings` (
  `id` bigint unsigned NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cretaed_atupdated_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tags` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1,	'test taging',	'2021-05-19 13:57:17',	'2021-05-19 13:57:39');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('customer','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `display_name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'Admin',	'admin',	'admin@gmail.com',	'admin',	'2020-08-13 07:47:23',	'$2y$10$RJS4jRYgJL8CYUTAoO.ly.YWaMBB1zTQMu8lLYLvgrFl/PuNaMriu',	NULL,	'2020-08-13 07:47:23',	'2021-09-02 05:16:49'),
(2,	'test',	'test',	'test name',	'developertestnew@gmail.com',	'customer',	NULL,	'$2y$10$Lgt20puQFC0lv4fuq6hoguZc.uLgZtpDoLC27yQrW8Z0lW9Y92cZC',	NULL,	'2021-05-19 14:45:26',	'2021-05-19 14:45:26'),
(3,	'testtesing',	'testingff',	'sdljf',	'testing@gmail.com',	'customer',	NULL,	'$2y$10$aMI6NAYQnlBV66L6JI2P0uJ.02w2Ry11O9A6aVPaAn8ewhfiOjf/q',	NULL,	'2021-05-20 04:28:24',	'2021-05-20 04:29:38'),
(4,	'Rob',	'Ford',	'Rob Ford',	'rford@urbancam.net',	'customer',	NULL,	'$2y$10$6UiiRpUx4bgimBwtaQjbiu5./ijRGfAMj2nXHLvNXB8dQ9La.Oz9K',	NULL,	'2021-05-21 22:19:33',	'2021-05-21 22:19:33');

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `videolink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recording_date` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recording_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_comment_enable_status` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `videos` (`id`, `userid`, `title`, `videolink`, `status`, `desc`, `recording_date`, `recording_location`, `video_language`, `is_comment_enable_status`, `slug`, `created_at`, `updated_at`) VALUES
(1,	4,	'test Video title',	'vid.mp4',	1,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec convallis nisl nec lectus blandit ultricies. In a volutpat massa. Proin neque mi, pellentesque quis mollis eu, convallis a diam. Pellentesque mollis leo quis dolor fermentum interdum. Proin congue sem lorem, eget porttitor massa porta quis. Aliquam tristique dui eget turpis interdum, vel dictum nisi dignissim. Pellentesque eu lacus sapien. Suspendisse potenti.\r\n\r\nAliquam erat volutpat. Nulla nec nibh nec velit ullamcorper mattis. Suspendisse finibus nulla eu metus gravida, vel consequat tortor commodo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque viverra mollis augue. Nam et pellentesque turpis, vel finibus urna. In tincidunt elit id nibh mollis, at luctus augue congue. In feugiat tempor nunc at tincidunt. Phasellus non congue nisl, non tristique metus. Donec velit sem, sagittis sit amet viverra hendrerit, congue vel velit. Aenean in euismod augue, sit amet suscipit nisi. Morbi eget mauris eu urna tempus cursus sed in nisi. Vivamus at libero at mi commodo dapibus at in ex. Fusce orci odio, pretium id justo sed, pellentesque ullamcorper quam. Praesent eleifend eleifend orci, ut ornare ex dignissim eget.\r\n\r\nCras gravida est tellus, et dictum elit fringilla in. Phasellus in maximus diam. Nam et sodales turpis, sit amet varius ligula. Fusce sollicitudin egestas dolor id vehicula. Aliquam blandit vehicula maximus. Nam finibus porttitor nibh a mollis. Curabitur eu nisi purus. Duis tempor elementum placerat. Sed rhoncus, enim vitae euismod malesuada, enim neque bibendum purus, quis convallis nulla erat eget ex. Donec luctus malesuada libero ut posuere. Maecenas a risus commodo, imperdiet orci ornare, rutrum risus. Etiam tincidunt leo est, tincidunt posuere dolor placerat a. Sed vel augue sit amet felis convallis sodales eget eget neque. Curabitur mattis mauris ac fringilla ullamcorper.',	'12-02-2021',	'India',	'Hindi',	1,	'Testing',	'2021-08-01 06:50:25',	'2021-08-09 12:50:25'),
(2,	2,	'aise he ',	'video.mp4',	1,	'Cras gravida est tellus, et dictum elit fringilla in. Phasellus in maximus diam. Nam et sodales turpis, sit amet varius ligula. Fusce sollicitudin egestas dolor id vehicula. Aliquam blandit vehicula maximus. Nam finibus porttitor nibh a mollis. Curabitur eu nisi purus. Duis tempor elementum placerat. Sed rhoncus, enim vitae euismod malesuada, enim neque bibendum purus, quis convallis nulla erat eget ex. Donec luctus malesuada libero ut posuere. Maecenas a risus commodo, imperdiet orci ornare, rutrum risus. Etiam tincidunt leo est, tincidunt posuere dolor placerat a. Sed vel augue sit amet felis convallis sodales eget eget neque. Curabitur mattis mauris ac fringilla ullamcorper.',	'31-05-2021',	'India',	'Hindi',	0,	'asjkdl',	'2021-08-16 05:35:16',	'2021-08-17 05:35:16'),
(3,	2,	'ssf',	'video-964020846-1634043548.mp4',	0,	'test',	'1633996800',	'delhi',	NULL,	1,	'ssf',	'2021-10-12 12:59:08',	'2021-10-12 12:59:08'),
(4,	2,	'test video',	'video-1304337293-1634051004.mp4',	0,	'hello this is video',	'1633996800',	'delhi',	NULL,	1,	'test-video',	'2021-10-12 15:03:24',	'2021-10-12 15:03:24'),
(5,	2,	'test video',	'desktop_video-987994851-1638209847',	0,	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',	'1638144000',	'delhi',	NULL,	1,	'test-video-1',	'2021-11-29 18:17:28',	'2021-11-29 18:17:28'),
(6,	2,	'Lorem Ipsum is simply dummy text of the printing',	'desktop_video-257175785-1638212538.mp4',	0,	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',	'1638230400',	'delhi',	NULL,	1,	'lorem-ipsum-is-simply-dummy-text-of-the-printing',	'2021-11-29 19:02:24',	'2021-11-29 19:02:24');

DROP TABLE IF EXISTS `videos_categories`;
CREATE TABLE `videos_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `video_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `videos_categories` (`id`, `video_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1,	4,	1,	'2021-10-12 15:03:24',	'2021-10-12 15:03:24'),
(2,	5,	1,	'2021-11-29 18:17:28',	'2021-11-29 18:17:28'),
(3,	6,	1,	'2021-11-29 19:02:24',	'2021-11-29 19:02:24');

DROP TABLE IF EXISTS `videos_tags`;
CREATE TABLE `videos_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `video_id` bigint unsigned NOT NULL,
  `tag_title` varchar(255) NOT NULL,
  `tag_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `videos_tags` (`id`, `video_id`, `tag_title`, `tag_slug`, `created_at`, `updated_at`) VALUES
(1,	1,	'testtag',	'testtag',	NULL,	NULL);

-- 2021-12-02 11:29:43
