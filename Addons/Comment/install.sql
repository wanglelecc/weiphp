CREATE TABLE IF NOT EXISTS `wp_comment` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`aim_table`  varchar(30) NULL  COMMENT '评论关联数据表',
`aim_id`  int(10) NULL  COMMENT '评论关联ID',
`cTime`  int(10) NULL  COMMENT '评论时间',
`follow_id`  int(10) NULL  COMMENT 'follow_id',
`content`  text NULL  COMMENT '评论内容',
`is_audit`  tinyint(2) NULL  COMMENT '是否审核',
`uid`  int(10) NULL  COMMENT 'uid',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('comment','评论互动','1','["is_audit"]','headimgurl|url_img_html:用户头像\r\nnickname:用户姓名\r\ncontent:评论内容\r\ncTime|time_format:评论时间\r\nis_audit:审核状态\r\nids:操作:[DELETE]|删除','20','content:请输入评论内容','MyISAM','Comment','9131bf06f3c1598fb35b48450fce7ca9');



