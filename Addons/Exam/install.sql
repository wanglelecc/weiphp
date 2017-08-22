CREATE TABLE IF NOT EXISTS `wp_exam` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(100) NOT NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NOT NULL  COMMENT '关键词匹配类型',
`title`  varchar(255) NOT NULL  COMMENT '试卷标题',
`intro`  text NOT NULL  COMMENT '封面简介',
`mTime`  int(10) NULL  COMMENT '修改时间',
`cover`  int(10) unsigned NOT NULL  COMMENT '封面图片',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`finish_tip`  text NOT NULL  COMMENT '结束语',
`start_time`  int(10) NULL  COMMENT '考试开始时间',
`end_time`  int(10) NULL  COMMENT '考试结束时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('exam','考试试卷','1','["keyword","keyword_type","title","intro","cover","finish_tip"]','keyword:关键词\r\nkeyword_type:关键词匹配类型\r\ntitle:试卷标题\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nid:操作:[EDIT]|编辑,[DELETE]|删除,exam_question&target=_blank&id=[id]|题目管理,exam_answer&target=_blank&id=[id]|考生成绩,preview&id=[id]&target=_blank|试卷预览','10','title:请输入试卷标题搜索','MyISAM','Exam','34986b8d771050f06e189f8b3a7061eb');



CREATE TABLE IF NOT EXISTS `wp_exam_question` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NOT NULL  COMMENT '题目标题',
`intro`  text NOT NULL  COMMENT '题目描述',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`is_must`  tinyint(2) NULL  DEFAULT 1 COMMENT '是否必填',
`extra`  text NOT NULL  COMMENT '参数',
`type`  char(50) NOT NULL  DEFAULT 'radio' COMMENT '题目类型',
`exam_id`  int(10) unsigned NULL  COMMENT 'exam_id',
`sort`  int(10) unsigned NOT NULL  COMMENT '排序号',
`score`  int(10) unsigned NOT NULL  COMMENT '分值',
`answer`  varchar(255) NOT NULL  COMMENT '标准答案',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('exam_question','考试题目','1','{"1":["title","type","extra","intro","is_must","sort"]}','title:标题\r\ntype:题目类型\r\nscore:分值\r\nid:操作:[EDIT]|编辑,[DELETE]|删除','10','title','MyISAM','Exam','135f0f5804ab409443eb153552160589');



CREATE TABLE IF NOT EXISTS `wp_exam_answer` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`answer`  text NULL  COMMENT '回答内容',
`openid`  varchar(255) NULL  COMMENT 'OpenId',
`uid`  int(10) NULL  COMMENT '用户UID',
`question_id`  int(10) unsigned NULL  COMMENT 'question_id',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`exam_id`  int(10) unsigned NULL  COMMENT 'exam_id',
`score`  int(10) unsigned NULL  COMMENT '得分',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('exam_answer','考试回答','1','','openid:OpenId\r\ntruename:姓名\r\nmobile:手机号\r\nscore:成绩\r\ncTime|time_format:考试时间\r\nid:操作:detail?uid=[uid]&exam_id=[exam_id]|答题详情','10','title','MyISAM','Exam','dc80191244c1939f58292977a4543730');



