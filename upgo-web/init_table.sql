CREATE DATABASE `upgo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

-- Create syntax for TABLE 'admin_menu'
CREATE TABLE `admin_menu` (
                              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                              `parent_id` int(11) NOT NULL DEFAULT '0',
                              `order` int(11) NOT NULL DEFAULT '0',
                              `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                              `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                              `created_at` timestamp NULL DEFAULT NULL,
                              `updated_at` timestamp NULL DEFAULT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'admin_operation_log'
CREATE TABLE `admin_operation_log` (
                                       `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                                       `user_id` int(11) NOT NULL,
                                       `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `created_at` timestamp NULL DEFAULT NULL,
                                       `updated_at` timestamp NULL DEFAULT NULL,
                                       PRIMARY KEY (`id`),
                                       KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=817 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'admin_permissions'
CREATE TABLE `admin_permissions` (
                                     `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                                     `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                                     `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                                     `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                     `http_path` text COLLATE utf8mb4_unicode_ci,
                                     `created_at` timestamp NULL DEFAULT NULL,
                                     `updated_at` timestamp NULL DEFAULT NULL,
                                     PRIMARY KEY (`id`),
                                     UNIQUE KEY `admin_permissions_name_unique` (`name`),
                                     UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'admin_role_menu'
CREATE TABLE `admin_role_menu` (
                                   `role_id` int(11) NOT NULL,
                                   `menu_id` int(11) NOT NULL,
                                   `created_at` timestamp NULL DEFAULT NULL,
                                   `updated_at` timestamp NULL DEFAULT NULL,
                                   KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'admin_role_permissions'
CREATE TABLE `admin_role_permissions` (
                                          `role_id` int(11) NOT NULL,
                                          `permission_id` int(11) NOT NULL,
                                          `created_at` timestamp NULL DEFAULT NULL,
                                          `updated_at` timestamp NULL DEFAULT NULL,
                                          KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'admin_role_users'
CREATE TABLE `admin_role_users` (
                                    `role_id` int(11) NOT NULL,
                                    `user_id` int(11) NOT NULL,
                                    `created_at` timestamp NULL DEFAULT NULL,
                                    `updated_at` timestamp NULL DEFAULT NULL,
                                    KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'admin_roles'
CREATE TABLE `admin_roles` (
                               `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                               `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL,
                               PRIMARY KEY (`id`),
                               UNIQUE KEY `admin_roles_name_unique` (`name`),
                               UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'admin_user_permissions'
CREATE TABLE `admin_user_permissions` (
                                          `user_id` int(11) NOT NULL,
                                          `permission_id` int(11) NOT NULL,
                                          `created_at` timestamp NULL DEFAULT NULL,
                                          `updated_at` timestamp NULL DEFAULT NULL,
                                          KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'admin_users'
CREATE TABLE `admin_users` (
                               `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                               `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                               `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL,
                               PRIMARY KEY (`id`),
                               UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'failed_jobs'
CREATE TABLE `failed_jobs` (
                               `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                               `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
                               `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
                               `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                               `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                               `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                               PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'migrations'
CREATE TABLE `migrations` (
                              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                              `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `batch` int(11) NOT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'password_resets'
CREATE TABLE `password_resets` (
                                   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `created_at` timestamp NULL DEFAULT NULL,
                                   KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'users'
CREATE TABLE `users` (
                         `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                         `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email_verified_at` timestamp NULL DEFAULT NULL,
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create syntax for TABLE 'web_about_page'
CREATE TABLE `web_about_page` (
                                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                  `partner_count` int(11) NOT NULL DEFAULT '0',
                                  `theme_count` int(11) NOT NULL DEFAULT '0',
                                  `artist_count` int(11) NOT NULL DEFAULT '0',
                                  `first_title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                                  `first_desc` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                                  `sec_title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                  `sec_desc` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                                  `trd_title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                                  `trd_desc` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                                  `content_title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                  `content_desc` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                                  `image_1` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                  `image_2` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
                                  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='关于界面配置';

-- Create syntax for TABLE 'web_case_page'
CREATE TABLE `web_case_page` (
                                 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                 `title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                 `sub_title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                 `main_image_url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                 `category_id` int(11) NOT NULL DEFAULT '0',
                                 `home_page_display` tinyint(4) NOT NULL DEFAULT '0',
                                 `display` tinyint(4) NOT NULL DEFAULT '1',
                                 `display_index` int(11) NOT NULL DEFAULT '0',
                                 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                 `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                 PRIMARY KEY (`id`),
                                 KEY `idx_title` (`title`),
                                 KEY `idx_sub_title` (`sub_title`),
                                 KEY `idx_cate_id` (`category_id`),
                                 KEY `idx_display` (`display`),
                                 KEY `idx_main_display` (`home_page_display`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='详情条目';

-- Create syntax for TABLE 'web_case_page_item'
CREATE TABLE `web_case_page_item` (
                                      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                      `case_id` int(11) NOT NULL DEFAULT '0',
                                      `image_url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                      `display_index` int(11) NOT NULL DEFAULT '0',
                                      `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                      `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                      PRIMARY KEY (`id`),
                                      KEY `idx_case_id` (`case_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='详情条目图片列表';

-- Create syntax for TABLE 'web_category'
CREATE TABLE `web_category` (
                                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                `cate_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                `display_index` int(11) NOT NULL,
                                `display` tinyint(2) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`),
                                KEY `idx_cate_name` (`cate_name`),
                                KEY `idx_display_index` (`display_index`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='案例分类';

-- Create syntax for TABLE 'web_contact_address'
CREATE TABLE `web_contact_address` (
                                       `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                       `title_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `title_hint` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `detail_address` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `contact_mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `contact_chat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `post_code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `display_image` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                       `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                       `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                       PRIMARY KEY (`id`),
                                       KEY `idx_name` (`title_name`),
                                       KEY `idx_address` (`detail_address`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='联系地址';

-- Create syntax for TABLE 'web_home_banner'
CREATE TABLE `web_home_banner` (
                                   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                   `title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `case_id` int(11) NOT NULL,
                                   `image_url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `display` tinyint(2) NOT NULL,
                                   `display_index` int(11) NOT NULL,
                                   `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                   `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                   PRIMARY KEY (`id`),
                                   KEY `idx_display` (`display`),
                                   KEY `idx_display_index` (`display_index`),
                                   KEY `idx_case_id` (`case_id`),
                                   KEY `idx_title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='首页轮播图';

-- Create syntax for TABLE 'web_partner'
CREATE TABLE `web_partner` (
                               `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                               `partner_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                               `logo_url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                               `display_index` int(11) NOT NULL,
                               `display` tinyint(2) NOT NULL,
                               `case_id` int(11) NOT NULL,
                               `delete_time` datetime NOT NULL,
                               `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                               `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                               PRIMARY KEY (`id`),
                               KEY `idx_partner` (`partner_name`),
                               KEY `idx_display` (`logo_url`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='合作伙伴信息';

-- Create syntax for TABLE 'web_service_page'
CREATE TABLE `web_service_page` (
                                    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                    `title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `sub_title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `image_url` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `display` tinyint(4) NOT NULL,
                                    `display_index` int(11) NOT NULL,
                                    `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                    PRIMARY KEY (`id`),
                                    KEY `idx_title` (`title`),
                                    KEY `idx_sub_title` (`sub_title`),
                                    KEY `idx_display` (`display`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='详情条目';

-- Create syntax for TABLE 'web_service_page_item'
CREATE TABLE `web_service_page_item` (
                                         `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                         `service_id` int(11) NOT NULL,
                                         `image_url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                         `display_index` int(11) NOT NULL,
                                         `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                         `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                         PRIMARY KEY (`id`),
                                         KEY `idx_service_id` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='详情条目图片列表';

-- Create syntax for TABLE 'web_site_setting'
CREATE TABLE `web_site_setting` (
                                    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                    `brand_title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `brand_short_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `slogan` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `brand_desc` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `case_title_img` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `service_title_img` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `about_title_img` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `partner_title_img` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `site_logo` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `business_wechat` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `resume_contact` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `site_code` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `weibo_link` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `qq_link` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `weixi_qrcode_link` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `created_at` datetime NOT NULL,
                                    `updated_at` datetime NOT NULL,
                                    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;