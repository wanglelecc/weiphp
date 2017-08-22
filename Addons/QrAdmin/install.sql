CREATE TABLE IF NOT EXISTS `wp_qr_admin` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`action_name`  varchar(30) NOT NULL  DEFAULT 'QR_SCENE' COMMENT '类型',
`group_id`  int(10) NULL  COMMENT '用户组',
`tag_ids`  varchar(255) NULL  COMMENT '用户标签',
`qr_code`  varchar(255) NULL  COMMENT '二维码',
`material`  varchar(50) NULL  COMMENT '扫码后的回复内容',
`mult_pic`  varchar(255) NULL  COMMENT '多图上传',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('qr_admin','扫码管理','1','["action_name","group_id","tag_ids"]','qr_code:二维码\r\naction_name:类型\r\ngroup_id:用户组\r\ntag_ids:标签\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','10','','MyISAM','QrAdmin','1d0ef6e95f0309ef85fee990e389f547');



