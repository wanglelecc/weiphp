CREATE TABLE IF NOT EXISTS `wp_auto_reply` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(255) NOT NULL  COMMENT '关键词',
`msg_type`  char(50) NULL  DEFAULT 'text' COMMENT '消息类型',
`content`  text NULL  COMMENT '文本内容',
`group_id`  int(10) NULL  COMMENT '图文',
`image_id`  int(10) unsigned NULL  COMMENT '上传图片',
`manager_id`  int(10) NULL  COMMENT '管理员ID',
`token`  varchar(50) NULL  COMMENT 'Token',
`image_material`  int(10) NULL  COMMENT '素材图片id',
`voice_id`  int(10) NULL  COMMENT '语音素材id',
`video_id`  int(10) NULL  COMMENT '视频素材id',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('auto_reply','自动回复','1','["keyword","content","group_id","image_id"]','keyword:关键词\r\ncontent:文件内容\r\ngroup_id:图文\r\nimage_id:图片\r\nvoice_id:语音\r\nvideo_id:视频\r\nids:操作:[EDIT]&type=[msg_type]|编辑,[DELETE]|删除','10','keyword:请输入关键词','MyISAM','AutoReply','d33b1e6a8b025df4e75e88ef2004d4ff');



