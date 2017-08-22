CREATE TABLE IF NOT EXISTS `wp_cms` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`img`  int(10) UNSIGNED NULL  COMMENT '封面图',
`content`  text NULL  COMMENT '正文内容',
`cTime`  int(10) NULL  COMMENT '发布时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('cms','小程序CMS','1','','','20','','MyISAM','Cms','');



