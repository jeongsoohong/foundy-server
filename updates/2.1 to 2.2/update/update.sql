UPDATE `general_settings` SET `value` = '2.2' WHERE `general_settings`.`type` = 'version';
INSERT INTO `general_settings` (`general_settings_id`, `type`, `value`) VALUES (NULL, 'facebook_chat_set', 'no'),
 (NULL, 'facebook_chat_page_id', NULL),
 (NULL, 'facebook_chat_theme_color', NULL),
 (NULL, 'facebook_chat_logged_in_greeting', NULL),
 (NULL, 'facebook_chat_logged_out_greeting', NULL);
