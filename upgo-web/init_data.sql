INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`)
VALUES
    (1, 0, 1, '管理看板', 'fa-bar-chart', '/', NULL, '2024-04-10 16:34:46', '2024-04-10 16:34:46'),
    (2, 0, 2, '系统设置', 'fa-tasks', '', NULL, '2024-04-10 16:34:46', '2024-04-10 16:34:46'),
    (3, 2, 3, '用户管理', 'fa-users', 'auth/users', NULL, '2024-04-10 16:34:46', '2024-04-10 16:34:46'),
    (4, 2, 4, '角色管理', 'fa-user', 'auth/roles', NULL, '2024-04-10 16:34:46', '2024-04-10 16:34:46'),
    (5, 2, 5, '权限管理', 'fa-ban', 'auth/permissions', NULL, '2024-04-10 16:34:46', '2024-04-10 16:34:46'),
    (6, 2, 6, '菜单管理', 'fa-bars', 'auth/menu', NULL, '2024-04-10 16:34:46', '2024-04-10 16:34:46'),
    (7, 2, 7, '操作日志', 'fa-history', 'auth/logs', NULL, '2024-04-10 16:34:46', '2024-04-10 16:34:46'),
    (8, 0, 8, '首页管理', 'fa-gear', '/home', '首页权限', '2024-04-10 16:34:46', '2024-04-14 06:17:34'),
    (9, 0, 9, '网站设置', 'fa-gears', 'setting/1', '网站配置', '2024-04-10 16:37:02', '2024-04-14 06:17:55'),
    (10, 0, 11, '案例管理', 'fa-list-alt', 'cases', NULL, '2024-04-11 16:39:38', '2024-04-14 05:55:33'),
    (11, 0, 12, '服务内容', 'fa-ambulance', '/service', '*', '2024-04-12 16:36:37', '2024-04-14 05:55:33'),
    (12, 0, 13, '地址管理', 'fa-location-arrow', '/address', '*', '2024-04-12 17:34:53', '2024-04-14 05:55:33'),
    (13, 0, 10, '案例分类', 'fa-sitemap', '/category', NULL, '2024-04-12 17:39:39', '2024-04-14 06:18:29'),
    (14, 0, 14, '关于设置', 'fa-volume-control-phone', '/about/1', NULL, '2024-04-14 05:54:13', '2024-04-14 05:55:52');


INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`)
VALUES
    (1, '全部权限', '*', '', '*', NULL, '2024-04-14 05:47:56'),
    (2, '首页权限', '首页权限', 'GET', '/', NULL, '2024-04-14 05:48:11'),
    (3, '登陆登出', '登陆登出', '', '/auth/login\r\n/auth/logout', NULL, '2024-04-14 05:48:24'),
    (4, '用户设置', '用户个人', 'GET,PUT', '/auth/setting', NULL, '2024-04-14 05:48:47'),
    (5, '系统管理', '系统管理', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, '2024-04-14 05:49:16'),
    (6, '网站配置', '网站配置', 'GET,POST,PUT,DELETE', '/admin/setting/*\r\n/admin/setting/*\r\n/about/*', '2024-04-14 05:50:49', '2024-04-14 06:03:06'),
    (7, '案例运营', '案例运营', '', '/admin/cases/*', '2024-04-14 05:51:20', '2024-04-14 05:51:20'),
    (8, '合作伙伴运营', '合作伙伴运营', '', '/admin/partner/*', '2024-04-14 05:51:43', '2024-04-14 05:53:09'),
    (9, '服务内容运营', '服务内容运营', '', '/service/*', '2024-04-14 05:52:07', '2024-04-14 05:52:07'),
    (10, '地址运营', '地址运营', '', '/admin/address/*', '2024-04-14 05:52:23', '2024-04-14 05:53:16'),
    (11, '案例分类运营', '案例分类运营', '', '/admin/category/*', '2024-04-14 05:52:42', '2024-04-14 05:52:42');


INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`)
VALUES
    (1, 2, NULL, NULL),
    (2, 8, NULL, NULL),
    (2, 9, NULL, NULL),
    (2, 10, NULL, NULL),
    (4, 13, NULL, NULL),
    (4, 11, NULL, NULL),
    (3, 12, NULL, NULL),
    (3, 14, NULL, NULL);


INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`)
VALUES
    (1, 1, NULL, NULL),
    (2, 3, NULL, NULL),
    (2, 4, NULL, NULL),
    (2, 5, NULL, NULL),
    (3, 2, NULL, NULL),
    (3, 3, NULL, NULL),
    (2, 6, NULL, NULL),
    (2, 7, NULL, NULL),
    (2, 8, NULL, NULL),
    (2, 9, NULL, NULL),
    (2, 10, NULL, NULL),
    (2, 11, NULL, NULL),
    (3, 10, NULL, NULL),
    (4, 3, NULL, NULL),
    (4, 4, NULL, NULL),
    (4, 7, NULL, NULL),
    (4, 11, NULL, NULL),
    (3, 6, NULL, NULL),
    (4, 2, NULL, NULL),
    (4, 8, NULL, NULL),
    (4, 9, NULL, NULL),
    (4, 10, NULL, NULL);

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`)
VALUES
    (1, 1, NULL, NULL);


INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`)
VALUES
    (1, 'Administrator', 'administrator', '2024-04-10 15:04:10', '2024-04-10 15:04:10'),
    (2, '网站所有者', '所有者', '2024-04-10 16:32:41', '2024-04-10 16:32:41'),
    (3, '网站配置', '网站配置', '2024-04-11 16:41:06', '2024-04-14 06:02:52'),
    (4, '内容运营', '内容运营', '2024-04-14 06:00:05', '2024-04-14 06:03:48');


INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`)
VALUES
    (1, 'admin', '$2y$10$dPnHkYBoA7FUnrLRjzQyM.H97AtarbjetkEjCDFwL7Z5EaltIS4YW', 'Administrator', NULL, 'JZNZCsRhUGT0XUJWix307XxMuQsprUMatvEEa8OEg092ovxnhrB7hKwrrGuL', '2024-04-10 15:04:10', '2024-04-10 15:04:10');


INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
    (1, '2014_10_12_000000_create_users_table', 1),
    (2, '2014_10_12_100000_create_password_resets_table', 1),
    (3, '2016_01_04_173148_create_admin_tables', 1),
    (4, '2019_08_19_000000_create_failed_jobs_table', 1);


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
    (1, 'admin', '', NULL, '123456', NULL, '2024-04-11 00:26:37', '2024-04-11 00:26:37');


INSERT INTO `web_about_page` (`id`, `partner_count`, `theme_count`, `artist_count`, `first_title`, `first_desc`, `sec_title`, `sec_desc`, `trd_title`, `trd_desc`, `content_title`, `content_desc`, `image_1`, `image_2`, `created_at`, `updated_at`)
VALUES
    (1, 23, 4, 22, '关于界面第一部分标题', '关于界面第一部分详情', '关于界面第二部分标题', '关于界面第二部分详情', '关于界面第三部分标题', '关于界面第三部分详情', '关于界面内容标题', '关于界面内容描述', 'images/d6cfb94e4f915b0271d006d9f0838d3f.jpg', 'images/848103b09092dae09cb3e26a7f59bd94.jpg', '2024-04-09 00:40:20', '2024-04-14 05:57:26');


INSERT INTO `web_site_setting` (`id`, `brand_title`, `brand_short_name`, `slogan`, `brand_desc`, `case_title_img`, `service_title_img`, `about_title_img`, `partner_title_img`, `site_logo`, `business_wechat`, `resume_contact`, `site_code`, `weibo_link`, `qq_link`, `weixi_qrcode_link`, `created_at`, `updated_at`)
VALUES
    (1, 'UPGO2', 'UPGO2', 'UPGO品牌战略咨询 | 100亿级超级大单品打造.', '撒打算大', 'images/DSC_5064.jpg', 'images/DSC_5025.jpg', 'images/DSC_5114.jpg', 'images/DSC_5128.jpg', 'images/iShot_2024-04-09_00.10.28.png', 'XXXsret', 'sadasd@hotmail.com( 请标记好）', '沪备：1232434号', '', '', '', '0000-00-00 00:00:00', '2024-04-14 06:11:58');
