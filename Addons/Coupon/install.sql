CREATE TABLE IF NOT EXISTS `wp_coupon` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`background`  int(10) unsigned NULL  COMMENT '素材背景图',
`keyword`  varchar(100) NULL  COMMENT '关键词',
`use_tips`  text NULL  COMMENT '使用说明',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '封面简介',
`end_time`  int(10) NULL  COMMENT '领取结束时间',
`cover`  int(10) unsigned NULL  COMMENT '优惠券图片',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_tips`  text NULL  COMMENT '领取结束说明',
`end_img`  int(10) unsigned NULL  COMMENT '领取结束提示图片',
`num`  int(10) unsigned NULL  COMMENT '优惠券数量',
`max_num`  int(10) unsigned NULL  DEFAULT 1 COMMENT '每人最多允许获取次数',
`follower_condtion`  char(50) NULL  DEFAULT 1 COMMENT '粉丝状态',
`credit_conditon`  int(10) unsigned NULL  COMMENT '积分限制',
`credit_bug`  int(10) unsigned NULL  COMMENT '积分消费',
`addon_condition`  varchar(255) NULL  COMMENT '插件场景限制',
`collect_count`  int(10) unsigned NULL  COMMENT '已领取数',
`view_count`  int(10) unsigned NULL  COMMENT '浏览人数',
`addon`  char(50) NULL  DEFAULT 'public' COMMENT '插件',
`shop_uid`  varchar(255) NULL  COMMENT '商家管理员ID',
`use_count`  int(10) NULL  COMMENT '已使用数',
`pay_password`  varchar(255) NULL  COMMENT '核销密码',
`empty_prize_tips`  varchar(255) NULL  COMMENT '奖品抽完后的提示',
`start_tips`  varchar(255) NULL  COMMENT '活动还没开始时的提示语',
`more_button`  text NULL  COMMENT '其它按钮',
`over_time`  int(10) NULL  COMMENT '使用的截止时间',
`use_start_time`  int(10) NULL  COMMENT '使用开始时间',
`shop_name`  varchar(255) NULL  DEFAULT '优惠商家' COMMENT '商家名称',
`shop_logo`  int(10) unsigned NULL  COMMENT '商家LOGO',
`head_bg_color`  varchar(255) NULL  DEFAULT '#35a2dd' COMMENT '头部背景颜色',
`button_color`  varchar(255) NULL  DEFAULT '#0dbd02' COMMENT '按钮颜色',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '素材模板',
`member`  varchar(100) NULL  COMMENT '选择人群',
`is_del`  int(10) NULL  COMMENT '是否删除',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('coupon','优惠券','1','["title","cover","use_tips","start_time","start_tips","end_time","end_tips","end_img","num","max_num","over_time","empty_prize_tips","pay_password","background","more_button","use_start_time","shop_name","shop_logo","head_bg_color","button_color","template","member"]','id:优惠券编号\r\ntitle:标题\r\nnum:计划发送数\r\ncollect_count:已领取数\r\nuse_count:已使用数\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,lists?target_id=[id]&target=_blank&_controller=Sn|成员管理,preview?id=[id]&target=_blank|预览','20','title','MyISAM','Coupon','479e1c8a58d9494b90a659db775ea96d');



CREATE TABLE IF NOT EXISTS `wp_coupon_shop` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`name`  varchar(100) NULL  COMMENT '店名',
`address`  varchar(255) NULL  COMMENT '详细地址',
`phone`  varchar(30) NULL  COMMENT '联系电话',
`gps`  varchar(50) NULL  COMMENT 'GPS经纬度',
`coupon_id`  int(10) NULL  COMMENT '所属优惠券编号',
`token`  varchar(255) NULL  COMMENT 'token',
`manager_id`  int(10) NULL  COMMENT '管理员id',
`open_time`  varchar(50) NULL  COMMENT '营业时间',
`img`  int(10) unsigned NULL  COMMENT '门店展示图',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('coupon_shop','适用门店','1','["name","address","gps","phone"]','name:店名\r\nphone:联系电话\r\naddress:详细地址\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','20','name:店名搜索','MyISAM','Coupon','e9256cbd8f0942071cbe0ce0f3566533');



CREATE TABLE IF NOT EXISTS `wp_coupon_shop_link` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`coupon_id`  int(10) NULL  COMMENT 'coupon_id',
`shop_id`  int(10) NULL  COMMENT 'shop_id',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('coupon_shop_link','门店关联','1','','','20','','MyISAM','Coupon','7bab76a8b758da810e6fc0bf090c8221');



