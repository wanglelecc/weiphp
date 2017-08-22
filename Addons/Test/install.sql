CREATE TABLE IF NOT EXISTS `wp_test` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(100) NOT NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NOT NULL  COMMENT '关键词匹配类型',
`title`  varchar(255) NOT NULL  COMMENT '问卷标题',
`intro`  text NOT NULL  COMMENT '封面简介',
`mTime`  int(10) NULL  COMMENT '修改时间',
`cover`  int(10) unsigned NOT NULL  COMMENT '封面图片',
`token`  varchar(255) NULL  COMMENT 'Token',
`finish_tip`  text NOT NULL  COMMENT '评论语',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('test','测试问卷','1','["keyword","keyword_type","title","intro","cover","finish_tip"]','keyword:关键词\r\nkeyword_type:关键词匹配类型\r\ntitle:问卷标题\r\nid:操作:[EDIT]|编辑,[DELETE]|删除,test_question&target=_blank&id=[id]|题目管理,test_answer&target=_blank&id=[id]|用户记录,preview&target=_blank&id=[id]|问卷预览','10','title:请输入问卷标题搜索','MyISAM','Test','38ca9322f86b764b7e2f418f8cf04ab8');



CREATE TABLE IF NOT EXISTS `wp_test_question` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NOT NULL  COMMENT '题目标题',
`intro`  text NOT NULL  COMMENT '题目描述',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`is_must`  tinyint(2) NULL  DEFAULT 1 COMMENT '是否必填',
`extra`  text NOT NULL  COMMENT '参数',
`type`  char(50) NULL  DEFAULT 'radio' COMMENT '题目类型',
`test_id`  int(10) unsigned NULL  COMMENT 'test_id',
`sort`  int(10) unsigned NOT NULL  COMMENT '排序号',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('test_question','测试题目','1','{"1":["title","extra","intro","sort"]}','id:问题编号\r\ntitle:标题\r\nextra:参数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','10','title','MyISAM','Test','07d69da97728ae5b73e273a08fc3b441');



CREATE TABLE IF NOT EXISTS `wp_test_answer` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`answer`  text NULL  COMMENT '回答内容',
`openid`  varchar(255) NULL  COMMENT 'OpenId',
`uid`  int(10) NULL  COMMENT '用户UID',
`question_id`  int(10) unsigned NULL  COMMENT 'question_id',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`test_id`  int(10) unsigned NULL  COMMENT 'test_id',
`score`  int(10) unsigned NULL  COMMENT '得分',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('test_answer','测试回答','1','','openid:OpenId\r\ntruename:姓名\r\nmobile:手机号\r\nscore:得分\r\ncTime|time_format:测试时间\r\nid:操作:detail?uid=[uid]&test_id=[test_id]|答题详情','10','title','MyISAM','Test','940e3c8db80a675c5df5710f20cb0737');



