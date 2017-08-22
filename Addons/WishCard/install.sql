CREATE TABLE IF NOT EXISTS `wp_wish_card` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`send_name`  varchar(255) NULL  COMMENT '发送人',
`receive_name`  varchar(255) NULL  COMMENT '接收人',
`content`  text NULL  COMMENT '祝福语',
`create_time`  int(10) NULL  COMMENT ' 创建时间',
`template`  char(50) NULL  COMMENT '模板',
`template_cate`  varchar(255) NULL  COMMENT '模板分类',
`read_count`  int(10) NULL  COMMENT '浏览次数',
`mid`  varchar(255) NULL  COMMENT '用户Id',
`token`  varchar(255) NULL  COMMENT 'Token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('wish_card','微贺卡','1','["send_name","receive_name","content","template"]','send_name:10%发送人\r\nreceive_name:10%接收人\r\ncontent:40%祝福语\r\ncreate_time|time_format:15%创建时间\r\nread_count:10%浏览次数\r\nid:15%操作:[EDIT]|编辑,card_show?id=[id]&target=_blank&_controller=Wap|预览,[DELETE]|删除','20','content:祝福语','MyISAM','WishCard','c71ddcff2d9cae210ab8e291afbad0d6');



CREATE TABLE IF NOT EXISTS `wp_wish_card_content` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`content_cate_id`  int(10) NULL  COMMENT '祝福语类别Id',
`content`  text NULL  COMMENT '祝福语',
`content_cate`  varchar(255) NULL  COMMENT '类别',
`token`  varchar(255) NULL  COMMENT 'Token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('wish_card_content','祝福语','1','["content_cate","content"]','content_cate_id:10%类别Id\r\ncontent_cate:20%类别\r\ncontent:50%祝福语\r\nid:20%操作:[EDIT]|编辑,[DELETE]|删除','20','','MyISAM','WishCard','e0e9271b915664c5c1384a1ee403dafb');



CREATE TABLE IF NOT EXISTS `wp_wish_card_content_cate` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`content_cate_name`  varchar(255) NULL  COMMENT '祝福语类别',
`token`  varchar(255) NULL  COMMENT 'Token',
`content_cate_icon`  int(10) unsigned NULL  COMMENT '类别图标',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('wish_card_content_cate','祝福语类别','1','["content_cate_name","content_cate_icon"]','content_cate_name:类别\r\ncontent_cate_icon|get_img_html:图标\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','20','content_cate_name:类别','MyISAM','WishCard','6568c4701329361fbb0b474e96370d58');



