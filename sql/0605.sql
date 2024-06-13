-- noinspection SqlDialectInspectionForFile

-- noinspection SqlNoDataSourceInspectionForFile

alter table web_partner add column `partner_site` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT '' after case_id;

alter table web_partner modify column   `case_id` int(11) DEFAULT '0';

alter table web_site_setting add column `show_numbers` tinyint(2) NOT NULL DEFAULT '0' after weixi_qrcode_link;

alter table web_page_detail add column  `title_left_right` tinyint(2) DEFAULT '0' after text_position;
alter table web_page_detail add column  `text_left_right` tinyint(2) DEFAULT '0' after title_left_right;





alter table web_site_setting add column show_partner tinyint(2) default 1 after show_numbers;