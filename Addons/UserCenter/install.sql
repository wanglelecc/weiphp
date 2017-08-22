CREATE TABLE IF NOT EXISTS `wp_user_tag` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(50) NULL  COMMENT '标签名称',
`token`  varchar(100) NULL  COMMENT 'token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('user_tag','用户标签','1','["title"]','id:标签编号\r\ntitle:标签名称\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','10','title:请输入标签名称搜索','MyISAM','UserCenter','29aa7d6d57aca5b7edda9ac3b8de3086');



CREATE TABLE IF NOT EXISTS `wp_user_tag_link` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`uid`  int(10) NULL  COMMENT 'uid',
`tag_id`  int(10) NULL  COMMENT 'tag_id',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('user_tag_link','用户标签关系表','1','','','10','','MyISAM','UserCenter','de1a4aa19fdac24cff8cceb661441c54');



