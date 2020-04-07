UPDATE `general_settings` SET `value` = '2.1' WHERE `general_settings`.`type` = 'version';
INSERT INTO `general_settings` (`general_settings_id`, `type`, `value`) VALUES (NULL, 'facebook_pixel_set', 'no'), (NULL, 'facebook_pixel_id', NULL);
ALTER TABLE `customer_product` ADD `seo_title` VARCHAR(255) NULL DEFAULT NULL AFTER `tag`, ADD `seo_description` VARCHAR(255) NULL DEFAULT NULL AFTER `tag`;
ALTER TABLE `product` ADD `seo_title` VARCHAR(255) NULL DEFAULT NULL AFTER `tag`, ADD `seo_description` VARCHAR(255) NULL DEFAULT NULL AFTER `tag`;
ALTER TABLE `vendor` ADD `seo_title` VARCHAR(255) NULL DEFAULT NULL AFTER `keywords`, ADD `seo_description` VARCHAR(255) NULL DEFAULT NULL AFTER `keywords`;