CREATE TABLE IF NOT EXISTS `wp_ask` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(100) NOT NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NULL  COMMENT '关键词类型',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '封面简介',
`mTime`  int(10) NULL  COMMENT '修改时间',
`cover`  int(10) unsigned NULL  COMMENT '封面图片',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`finish_tip`  text NULL  COMMENT '结束语',
`content`  text NULL  COMMENT '活动介绍',
`shop_address`  text NULL  COMMENT '商家地址',
`appids`  text NULL  COMMENT '提示关注的公众号',
`finish_button`  text NULL  COMMENT '成功抢答完后显示的按钮',
`card_id`  varchar(255) NULL  COMMENT '卡券ID',
`appsecre`  varchar(255) NULL  COMMENT '卡券对应的appsecre',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '素材模板',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('ask','抢答问卷','1','["keyword","keyword_type","title","cover","intro","finish_tip","shop_address","appids","finish_button","content","card_id","appsecre","template"]','id:微抢答ID\r\nkeyword:关键词\r\ntitle:标题\r\ncTime|time_format:发布时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,ask_question&id=[id]|问题管理,ask_answer&id=[id]|数据管理,preview&id=[id]&target=_blank|预览','20','title','MyISAM','Ask','6ccc1f36b67b7a6d1d4680147555ee22');



CREATE TABLE IF NOT EXISTS `wp_ask_answer` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`answer`  text NULL  COMMENT '回答内容',
`openid`  varchar(255) NULL  COMMENT 'OpenId',
`uid`  int(10) NULL  COMMENT '用户UID',
`question_id`  int(10) unsigned NULL  COMMENT 'question_id',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`ask_id`  int(10) unsigned NULL  COMMENT 'ask_id',
`is_correct`  tinyint(2) NULL  DEFAULT 1 COMMENT '是否回答正确',
`times`  int(4) NULL  COMMENT '次数',
PRIMARY KEY (`id`),
KEY `ask_id_uid` (`ask_id`,uid),
KEY `question_uid` (`uid`,question_id,times)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('ask_answer','抢答回答','1','','uid:用户ID\r\nnickname:昵称\r\nquestion_id:问题\r\nanswer:回答\r\nis_correct:是否正确\r\ntrue_answer:正确答案\r\ntimes:第几轮\r\ncTime|time_format:回答时间','20','uid:请输入用户ID','MyISAM','Ask','6ae44b401f443ee6cfa4555efad00a92');



CREATE TABLE IF NOT EXISTS `wp_ask_question` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '问题描述',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`is_must`  tinyint(2) NULL  DEFAULT 1 COMMENT '是否必填',
`extra`  text NOT NULL  COMMENT '参数',
`type`  char(50) NOT NULL  DEFAULT 'radio' COMMENT '问题类型',
`ask_id`  int(10) unsigned NULL  COMMENT 'ask_id',
`sort`  int(10) unsigned NULL  COMMENT '排序号',
`answer`  varchar(255) NOT NULL  COMMENT '正确答案',
`is_last`  tinyint(2) NULL  COMMENT '是否最后一题',
`wait_time`  int(10) NULL  COMMENT '等待时间',
`percent`  int(10) NULL  DEFAULT 100 COMMENT '抢中概率',
`answer_time`  int(10) NULL  COMMENT '答题时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('ask_question','抢答问题','1','["title","type","extra","answer","wait_time","sort","percent","intro"]','title:标题\r\ntype:问题类型\r\nwait_time:时间间隔\r\npercent:抢中概率\r\nanswer:正确答案\r\nsort:排序号\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','20','title','MyISAM','Ask','061adf9eec101cc03dd6c97080c3436e');



