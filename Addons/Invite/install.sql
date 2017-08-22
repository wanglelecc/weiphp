CREATE TABLE IF NOT EXISTS `wp_invite` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(100) NOT NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NULL  COMMENT '关键词类型',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NOT NULL  COMMENT '封面简介',
`mTime`  int(10) NULL  COMMENT '修改时间',
`cover`  int(10) unsigned NOT NULL  COMMENT '封面图片',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`experience`  int(10) NULL  COMMENT '消耗体力值',
`num`  int(10) NOT NULL  COMMENT '邀请人数',
`coupon_id`  varchar(100) NOT NULL  COMMENT '优惠券编号',
`coupon_num`  int(10) NULL  COMMENT '优惠券数',
`receive_num`  int(10) NULL  COMMENT '已领取优惠券数',
`content`  text NOT NULL  COMMENT '邀约介绍',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '模板名称',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('invite','微邀约','1','["keyword","keyword_type","title","intro","cover","experience","num","coupon_id","content","template"]','keyword:关键词\r\ntitle:标题\r\nexperience:消耗经验值\r\ncoupon_id:优惠券编号\r\ncoupon_name:优惠券标题\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,lists?target_id=[coupon_id]&target=_blank&_addons=Coupon&_controller=Sn|领取记录,preview?id=[id]&target=_blank|预览','20','title','MyISAM','Invite','fab725733244e7be51d719f72b2b5b46');



CREATE TABLE IF NOT EXISTS `wp_invite_user` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`token`  varchar(255) NULL  COMMENT 'Token',
`uid`  int(10) NULL  COMMENT '用户ID',
`invite_id`  int(10) NULL  COMMENT '邀约ID',
`invite_num`  int(10) NULL  COMMENT '已邀请人数',
`invite_uid`  int(10) NULL  DEFAULT 0 COMMENT '邀请用户',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('invite_user','微邀约用户记录','1','','','20','','MyISAM','Invite','4bc678d84518d2f94941d844b964a58a');



