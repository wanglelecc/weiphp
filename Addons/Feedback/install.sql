CREATE TABLE IF NOT EXISTS `wp_feedback` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`username`  varchar(50) NULL  COMMENT '姓名',
`product`  varchar(100) NULL  COMMENT '关注的产品',
`from`  char(10) NULL  COMMENT '来源渠道',
`area`  char(50) NULL  COMMENT '你所在地区',
`score`  int(10) NULL  COMMENT '打分',
`is_dev`  tinyint(2) NULL  COMMENT '是否是前端开发人员',
`cTime`  int(10) NULL  COMMENT '反馈时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('feedback','用户反馈','1','','','20','','MyISAM','Feedback','');



