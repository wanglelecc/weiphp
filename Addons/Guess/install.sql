CREATE TABLE IF NOT EXISTS `wp_guess` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NULL  COMMENT '竞猜标题',
`desc`  text NULL  COMMENT '活动说明',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '结束时间',
`create_time`  int(10) NULL  COMMENT '创建时间',
`guess_count`  int(10) unsigned NULL  COMMENT '',
`token`  varchar(255) NULL  COMMENT 'Token',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '素材模板',
`cover`  int(10) unsigned NULL  COMMENT '主题图片',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('guess','竞猜','1','["title","desc","start_time","end_time","template","cover"]','title:活动名称\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nguess_count:参与人数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,guessOption&guess_id=[id]&target=_blank|竞猜选项,guessLog&guess_id=[id]&target=_blank|竞猜记录,preview?id=[id]&target=_blank|预览','20','title:活动名称','MyISAM','Guess','42bec46a27a8da6fe377aa13c2c3da03');



CREATE TABLE IF NOT EXISTS `wp_guess_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`user_id`  int(10) unsigned NULL  COMMENT '用户ID',
`guess_id`  int(10) unsigned NULL  COMMENT '竞猜Id',
`token`  varchar(255) NULL  COMMENT '用户token',
`optionIds`  varchar(255) NULL  COMMENT '用户猜的选项IDs',
`cTime`  int(10) NULL  COMMENT '创时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('guess_log','竞猜记录','1','["token"]','optionIds:竞猜选项\r\nuser_id:用户id\r\nuser_name:用户昵称\r\ntoken:用户token\r\ncTime|time_format:竞猜时间\r\n','20','','MyISAM','Guess','da58b50b78a15d6836c9fd2c4d71556b');



CREATE TABLE IF NOT EXISTS `wp_guess_option` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`guess_id`  int(10) NULL  COMMENT '竞猜活动的Id',
`name`  varchar(255) NULL  COMMENT '选项名称',
`image`  int(10) unsigned NULL  COMMENT '选项图片',
`order`  int(10) NULL  COMMENT '选项顺序',
`guess_count`  int(10) unsigned NULL  COMMENT '竞猜人数',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('guess_option','竞猜项目','1','["name","image","order"]','title:活动名称\r\nname:选项名称\r\nimage|get_img_html:选项图片\r\norder:选项顺序\r\nguess_count:竞猜人数\r\nids:操作:optionLog&guess_id=[guess_id]&option_id=[id]|查看选项竞猜记录','20','','MyISAM','Guess','6f6084f582e743fcc813f81d1942aa98');



