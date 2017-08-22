CREATE TABLE IF NOT EXISTS `wp_custom_reply_mult` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(255) NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NULL  COMMENT '关键词类型',
`mult_ids`  varchar(255) NULL  COMMENT '多图文ID',
`token`  varchar(255) NULL  COMMENT 'Token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('custom_reply_mult','多图文配置','1','','','20','','MyISAM','CustomReply','958b44bd61bf5436015725f1a0461636');



CREATE TABLE IF NOT EXISTS `wp_custom_reply_news` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(100) NOT NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NULL  COMMENT '关键词类型',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '简介',
`cate_id`  int(10) unsigned NULL  COMMENT '所属类别',
`cover`  int(10) unsigned NULL  COMMENT '封面图片',
`content`  text NULL  COMMENT '内容',
`cTime`  int(10) NULL  COMMENT '发布时间',
`sort`  int(10) unsigned NULL  COMMENT '排序号',
`view_count`  int(10) unsigned NULL  COMMENT '浏览数',
`token`  varchar(255) NULL  COMMENT 'Token',
`jump_url`  varchar(255) NULL  COMMENT '外链',
`author`  varchar(50) NULL  COMMENT '作者',
`show_type`  varchar(100) NULL  COMMENT '显示方式',
`is_show`  char(10) NULL  DEFAULT 1 COMMENT '图片是否显示在内容页',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('custom_reply_news','图文回复','1','["keyword","keyword_type","title","intro","cate_id","cover","content","sort"]','id:5%ID\r\nkeyword:10%关键词\r\nkeyword_type:20%关键词类型\r\ntitle:30%标题\r\ncate_id:10%所属分类\r\nsort:7%排序号\r\nview_count:8%浏览数\r\nid:10%操作:[EDIT]|编辑,[DELETE]|删除','20','title','MyISAM','CustomReply','8bbf55a6ad6a2c0422c94b07a9d0bb9a');



CREATE TABLE IF NOT EXISTS `wp_custom_reply_text` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(255) NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NULL  COMMENT '关键词类型',
`content`  text NULL  COMMENT '回复内容',
`view_count`  int(10) unsigned NULL  COMMENT '浏览数',
`sort`  int(10) unsigned NULL  COMMENT '排序号',
`token`  varchar(255) NULL  COMMENT 'Token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('custom_reply_text','文本回复','1','["keyword","keyword_type","content","sort"]','id:ID\r\nkeyword:关键词\r\nkeyword_type:关键词类型\r\nsort:排序号\r\nview_count:浏览数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','20','keyword','MyISAM','CustomReply','e8ea53c386128548fc6dbd260026499c');



