CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `main_image_url` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `summery` varchar(1000) NOT NULL,
  `description` longtext NOT NULL,
  `blog_category` varchar(25) NOT NULL,
  `number_of_view` int(11) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activate` tinyint(4) NOT NULL DEFAULT '1',
  `main_view` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `blog_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `category_blog` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `category_center` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `category_class` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `center` (
  `center_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `about` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `address_detail` varchar(128) NOT NULL,
  `latitude` varchar(32) NOT NULL,
  `longitude` varchar(32) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approval_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL DEFAULT '0',
  `like` int(11) NOT NULL DEFAULT '0',
  `bookmark` int(11) NOT NULL DEFAULT '0',
  `info` text,
  `teacher_cnt` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`center_id`),
  UNIQUE KEY `latitude` (`latitude`,`longitude`),
  UNIQUE KEY `activate` (`activate`,`center_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


alter table foit.center add shower tinyint not null default 0;
alter table foit.center add towel tinyint not null default 0;
alter table foit.center add parking tinyint not null default 0;
alter table foit.center add valet tinyint not null default 0;


CREATE TABLE `center_category` (
  `center_id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `type` int(11) NOT NULL,
  `activate` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`center_id`,`category`,`type`),
  UNIQUE KEY `category` (`type`,`category`,`center_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `center_location` (
  `center_id` int(11) NOT NULL,
  `location` geometry NOT NULL,
  PRIMARY KEY (`center_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `center_schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `center_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `title` varchar(32) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(32) DEFAULT NULL,
  `weekly_0` tinyint(4) NOT NULL DEFAULT '0',
  `weekly_1` tinyint(4) NOT NULL DEFAULT '0',
  `weekly_2` tinyint(4) NOT NULL DEFAULT '0',
  `weekly_3` tinyint(4) NOT NULL DEFAULT '0',
  `weekly_4` tinyint(4) NOT NULL DEFAULT '0',
  `weekly_5` tinyint(4) NOT NULL DEFAULT '0',
  `weekly_6` tinyint(4) NOT NULL DEFAULT '0',
  `weekly_none` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`schedule_id`),
  UNIQUE KEY `schedule_id` (`schedule_id`,`center_id`),
  KEY `schedule_date` (`schedule_id`,`start_date`,`end_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `center_teacher` (
  `center_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  UNIQUE KEY `center_id` (`center_id`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `about` varchar(64) NOT NULL,
  `youtube` varchar(256) DEFAULT NULL,
  `instagram` varchar(256) DEFAULT NULL,
  `homepage` varchar(256) DEFAULT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approval_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL DEFAULT '0',
  `like` int(11) NOT NULL DEFAULT '0',
  `bookmark` int(11) NOT NULL DEFAULT '0',
  `video_cnt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `activate` (`activate`,`teacher_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `teacher_category` (
  `teacher_id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  PRIMARY KEY (`teacher_id`,`category`),
  UNIQUE KEY `category` (`category`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `teacher_video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `desc` varchar(256) DEFAULT NULL,
  `thumbnail_image_url` varchar(256) DEFAULT NULL,
  `video_url` varchar(256) DEFAULT NULL,
  `playtime` int(11) NOT NULL DEFAULT '0',
  `activate` tinyint(4) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `like` int(11) NOT NULL DEFAULT '0',
  `bookmark` int(11) NOT NULL DEFAULT '0',
  `yt_info` longtext,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`video_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `teacher_video_category` (
  `video_id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  PRIMARY KEY (`video_id`,`category`),
  UNIQUE KEY `category` (`category`,`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `kakao_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL DEFAULT '0',
  `center_id` int(11) NOT NULL DEFAULT '0',
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(64) DEFAULT NULL,
  `nickname` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `user_type` smallint(6) DEFAULT '0',
  `gender` varchar(16) NOT NULL,
  `kakao_thumbnail_image_url` varchar(256) DEFAULT NULL,
  `kakao_profile_image_url` varchar(256) DEFAULT NULL,
  `profile_image_url` varchar(256) DEFAULT NULL,
  `create_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `last_login_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `kakao_id` (`kakao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `bookmark_center` (
  `user_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`center_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `bookmark_class` (
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `bookmark_teacher` (
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `like_center` (
  `user_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`center_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `like_class` (
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `like_teacher` (
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
