CREATE TABLE IF NOT EXISTS `wp_business_card` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`uid`  int(10) NULL  COMMENT '用户ID',
`truename`  varchar(50) NULL  COMMENT '真实姓名',
`position`  varchar(50) NULL  COMMENT '职位头衔',
`mobile`  varchar(30) NULL  COMMENT '手机',
`company`  varchar(100) NULL  COMMENT '公司名称',
`department`  varchar(50) NULL  COMMENT '所属部门',
`service`  text NULL  COMMENT '产品服务',
`company_url`  varchar(255) NULL  COMMENT '公司网址',
`address`  varchar(255) NULL  COMMENT '地址',
`telephone`  varchar(30) NULL  COMMENT '座机',
`Email`  varchar(100) NULL  COMMENT '邮箱',
`wechat`  varchar(50) NULL  COMMENT '微信号',
`qq`  varchar(30) NULL  COMMENT 'QQ号',
`weibo`  varchar(255) NULL  COMMENT '微博',
`tag`  varchar(255) NULL  COMMENT '人物标签',
`wishing`  varchar(100) NULL  COMMENT '希望结交',
`interest`  varchar(255) NULL  COMMENT '兴趣',
`personal_url`  varchar(255) NULL  COMMENT '个人主页',
`intro`  text NULL  COMMENT '个人介绍',
`headface`  int(10) unsigned NULL  COMMENT '头像',
`permission`  char(50) NULL  DEFAULT 1 COMMENT '权限设置',
`template`  varchar(50) NULL  COMMENT '选择的模板',
`token`  varchar(100) NULL  COMMENT 'Token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('business_card','微名片','1','["truename","mobile","company","service","position","department","company_url","address","telephone","Email","wechat","qq","weibo","tag","wishing","interest","personal_url","intro","permission","token"]','uid:用户ID\r\ntruename:名称\r\nposition:职位\r\naddress:地址\r\nmobile:电话\r\ncompany:公司\r\nqq:QQ号\r\nwechat:微信号\r\nemail:邮箱\r\nqrcode:二维码\r\nids:操作:[EDIT]|编辑','10','truename:请输入名称搜索','MyISAM','BusinessCard','02f712991b8c949d179c371a40133253');



CREATE TABLE IF NOT EXISTS `wp_business_card_collect` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`from_uid`  int(10) NULL  COMMENT '收藏人ID',
`to_uid`  int(10) NULL  COMMENT '被收藏人的ID',
`cTime`  int(10) NULL  COMMENT '收藏时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('business_card_collect','名片收藏','1','','','10','','MyISAM','BusinessCard','655aa4d5d7ce8e5a193cbf7f5224ce89');



CREATE TABLE IF NOT EXISTS `wp_business_card_column` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`type`  char(10) NULL  COMMENT '栏目类型',
`cate_id`  varchar(100) NULL  COMMENT '分类',
`title`  varchar(255) NULL  COMMENT '栏目名称',
`url`  varchar(255) NULL  COMMENT '跳转url',
`sort`  int(10) NULL  COMMENT '排序',
`business_card_id`  int(10) NULL  COMMENT '名片id',
`uid`  int(10) NULL  COMMENT '用户id',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('business_card_column','名片栏目','1','["type","cate_id","title","url","sort"]','type:栏目类型\r\ncate_id:分类名\r\ntitle:标题\r\nurl:url\r\nsort:排序\r\nid:操作:[EDIT]|编辑,[DELETE]|删除','10','','MyISAM','BusinessCard','b5c757743fee3fd25445c4ad466a6d98');



