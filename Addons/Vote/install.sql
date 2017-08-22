CREATE TABLE IF NOT EXISTS `wp_vote` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(50) NOT NULL  COMMENT '关键词',
`title`  varchar(100) NOT NULL  COMMENT '投票标题',
`description`  text NULL  COMMENT '投票描述',
`picurl`  int(10) unsigned NULL  COMMENT '封面图片',
`type`  char(10) NULL  COMMENT '选择类型',
`start_date`  int(10) NULL  COMMENT '开始日期',
`end_date`  int(10) NULL  COMMENT '结束日期',
`is_img`  tinyint(2) NULL  COMMENT '文字/图片投票',
`vote_count`  int(10) unsigned NULL  COMMENT '投票数',
`cTime`  int(10) NULL  COMMENT '投票创建时间',
`mTime`  int(10) NULL  COMMENT '更新时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '素材模板',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('vote','投票','1','["keyword","title","description","picurl","start_date","end_date","template"]','id:投票ID\r\nkeyword:关键词\r\ntitle:投票标题\r\ntype:类型\r\nis_img:状态\r\nvote_count:投票数\r\nids:操作:[EDIT]&id=[id]|编辑,[DELETE]|删除,showLog&id=[id]|投票记录,showCount&id=[id]|选项票数,preview?id=[id]&target=_blank|预览','20','title','MyISAM','Vote','e692418f1bbffdf2d9063ff0e2d2e20a');



CREATE TABLE IF NOT EXISTS `wp_vote_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`vote_id`  int(10) unsigned NULL  COMMENT '投票ID',
`user_id`  int(10) NULL  COMMENT '用户ID',
`token`  varchar(255) NULL  COMMENT '用户TOKEN',
`options`  varchar(255) NULL  COMMENT '选择选项',
`cTime`  int(10) NULL  COMMENT '创建时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('vote_log','投票记录','1','["vote_id","user_id","options"]','vote_id:25%用户头像\r\nuser_id:25%用户\r\noptions:25%投票选项\r\ncTime|time_format:25%创建时间\r\n\r\n\r\n\r\n','20','','MyISAM','Vote','10b7b1b767d7fc4a3b684eb768aba639');



CREATE TABLE IF NOT EXISTS `wp_vote_option` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`vote_id`  int(10) unsigned NULL  COMMENT '投票ID',
`name`  varchar(255) NOT NULL  COMMENT '选项标题',
`image`  int(10) unsigned NULL  COMMENT '图片选项',
`opt_count`  int(10) unsigned NULL  COMMENT '当前选项投票数',
`order`  int(10) unsigned NULL  COMMENT '选项排序',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('vote_option','投票选项','1','["name","opt_count","order"]','image|get_img_html:选项图片\r\nname:选项标题\r\nopt_count:投票数','20','','MyISAM','Vote','3900eea5beb71c8229cbecedebf871c7');



CREATE TABLE IF NOT EXISTS `wp_shop_vote` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NULL  COMMENT '活动名称',
`select_type`  char(10) NULL  DEFAULT 1 COMMENT '投票类型',
`multi_num`  int(10) NULL  COMMENT '多选限制',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '结束时间',
`remark`  text NULL  COMMENT '活动说明',
`token`  varchar(255) NULL  COMMENT 'token',
`manager_id`  int(10) NULL  COMMENT '管理员id',
`is_verify`  tinyint(2) NULL  COMMENT '投票是否需要填写验证码',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('shop_vote','商城微投票','1','["title","select_type","multi_num","start_time","end_time","is_verify","remark"]','title:活动名称\r\nselect_type:投票类型\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nremark:活动说明\r\nids:操作:[EDIT]&id=[id]|编辑,[DELETE]|删除,option_lists&vote_id=[id]|投票选项,show_log&vote_id=[id]|投票记录,preview&vote_id=[id]|预览,index&_addons=Vote&_controller=Wap&vote_id=[id]|复制链接','10','title:请输入活动名称','MyISAM','Vote','7d3d1a8078e00579a7e5de6872e13dc3');



CREATE TABLE IF NOT EXISTS `wp_shop_vote_option` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`truename`  varchar(255) NULL  COMMENT '参赛者',
`image`  int(10) unsigned NULL  COMMENT '参赛图片',
`uid`  int(10) NULL  COMMENT '用户id',
`manifesto`  text NULL  COMMENT '参赛宣言',
`introduce`  text NULL  COMMENT '选手介绍',
`ctime`  int(10) NULL  COMMENT '创建时间',
`vote_id`  int(10) NULL  COMMENT '活动id',
`opt_count`  int(10) NULL  COMMENT '投票数',
`token`  varchar(255) NULL  COMMENT 'token',
`number`  int(10) NULL  DEFAULT 1 COMMENT '编号',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('shop_vote_option','投票选项表','1','["truename","image","manifesto","introduce"]','truename:10%参赛者\r\nimage|get_img_html:10%参赛图片\r\nmanifesto:30%参赛宣言\r\nintroduce:25%选手介绍\r\nopt_count:8%得票数\r\nids:17%操作:option_edit&id=[id]|编辑,option_del&id=[id]|删除,show_log&option_id=[id]|投票记录','10','truename:请输入姓名','MyISAM','Vote','1797d983742d0933743136e8a7fc93e7');



CREATE TABLE IF NOT EXISTS `wp_shop_vote_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`vote_id`  int(10) NULL  COMMENT '活动id',
`option_id`  int(10) NULL  COMMENT '选项id',
`uid`  int(10) NULL  COMMENT '投票者id',
`token`  varchar(255) NULL  COMMENT 'token',
`ctime`  int(10) NULL  COMMENT '投票时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('shop_vote_log','商城投票记录','1','["vote_id","option_id","uid"]','vote_id:25%用户头像\r\nuid:25%用户\r\noption_id:25%投票选项\r\nctime|time_format:25%投票时间','10','truename:请输入用户名字','MyISAM','Vote','65a9aed7b58b1ca8c08e8cb57542235a');



