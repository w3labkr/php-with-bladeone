USE `laradock`;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `uuid` binary(16) NOT NULL DEFAULT (uuid_to_bin(uuid(),1)),
  `username` varchar(60) NOT NULL DEFAULT '',
  `nickname` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `email_verification_token` char(32) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `remember_token` char(32) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `welcomed` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `last_login_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uuid_idx` (`uuid`),
  UNIQUE KEY `users_username_idx` (`username`),
  UNIQUE KEY `users_email_idx` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

FLUSH PRIVILEGES;

