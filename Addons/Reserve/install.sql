CREATE TABLE IF NOT EXISTS `wp_reserve` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`password`  varchar(255) NULL  COMMENT '微预约密码',
`jump_url`  varchar(255) NULL  COMMENT '提交后跳转的地址',
`content`  text NULL  COMMENT '详细介绍',
`finish_tip`  text NULL  COMMENT '用户提交后提示内容',
`can_edit`  tinyint(2) NULL  COMMENT '是否允许编辑',
`intro`  text NULL  COMMENT '封面简介',
`mTime`  int(10) NULL  COMMENT '修改时间',
`cover`  int(10) unsigned NULL  COMMENT '封面图片',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '模板',
`status`  tinyint(2) NULL  COMMENT '状态',
`start_time`  int(10) NULL  COMMENT '报名开始时间',
`end_time`  int(10) NULL  COMMENT '报名结束时间',
`pay_online`  tinyint(2) NULL  COMMENT '是否支持在线支付',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('reserve','微预约','1','["title","intro","cover","can_edit","finish_tip","jump_url","content","template","status","start_time","end_time","pay_online"]','title:标题\r\nstatus:状态\r\nstart_time:报名时间\r\nids:操作:preview&id=[id]|预览,[EDIT]|编辑,reserve_value&id=[id]|预约列表,[DELETE]|删除,index&_addons=Reserve&_controller=Wap&reserve_id=[id]|复制链接','20','title','MyISAM','Reserve','2ad3deddf605f20b3925330bedc425dd');



CREATE TABLE IF NOT EXISTS `wp_reserve_attribute` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`is_show`  tinyint(2) NULL  DEFAULT 1 COMMENT '是否显示',
`reserve_id`  int(10) unsigned NULL  COMMENT '微预约ID',
`error_info`  varchar(255) NULL  COMMENT '出错提示',
`sort`  int(10) unsigned NULL  COMMENT '排序号',
`validate_rule`  varchar(255) NULL  COMMENT '正则验证',
`is_must`  tinyint(2) NULL  COMMENT '是否必填',
`remark`  varchar(255) NULL  COMMENT '字段备注',
`token`  varchar(255) NULL  COMMENT 'Token',
`value`  varchar(255) NULL  COMMENT '默认值',
`title`  varchar(255) NOT NULL  COMMENT '字段标题',
`mTime`  int(10) NULL  COMMENT '修改时间',
`extra`  text NULL  COMMENT '参数',
`type`  char(50) NOT NULL  DEFAULT 'string' COMMENT '字段类型',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('reserve_attribute','微预约字段','1','["name","title","type","extra","value","remark","is_must","validate_rule","error_info","sort"]','title:字段标题\r\nname:字段名\r\ntype:字段类型\r\nids:操作:[EDIT]&reserve_id=[reserve_id]|编辑,[DELETE]|删除','20','title','MyISAM','Reserve','ca0583640f800b2a8372c09e92123d82');



CREATE TABLE IF NOT EXISTS `wp_reserve_value` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`reserve_id`  int(10) unsigned NULL  COMMENT '微预约ID',
`value`  text NULL  COMMENT '微预约值',
`cTime`  int(10) NULL  COMMENT '增加时间',
`openid`  varchar(255) NULL  COMMENT 'OpenId',
`uid`  int(10) NULL  COMMENT '用户ID',
`token`  varchar(255) NULL  COMMENT 'Token',
`is_check`  int(10) NULL  COMMENT '验证是否成功',
`is_pay`  int(10) NULL  COMMENT '是否支付',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('reserve_value','微预约数据','1','','','20','','MyISAM','Reserve','1a20db0aaffc9b0563a4844d6b6f109f');



CREATE TABLE IF NOT EXISTS `wp_reserve_option` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`reserve_id`  int(10) NULL  COMMENT '预约活动ID',
`name`  varchar(100) NULL  COMMENT '名称',
`money`  decimal(11,2) NULL  COMMENT '报名费用',
`max_limit`  int(10) NULL  COMMENT '最大预约数',
`init_count`  int(10) NULL  COMMENT '初始化预约数',
`join_count`  int(10) NULL  COMMENT '参加人数',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('reserve_option','预约选项','1','','','10','','MyISAM','Reserve','54e3477ca7925ff66e68b49142117668');



