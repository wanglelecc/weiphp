CREATE TABLE IF NOT EXISTS `wp_survey` (
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
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '素材模板',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '结束时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('survey','调研问卷','1','["keyword","keyword_type","title","cover","intro","finish_tip","template","start_time","end_time"]','id:微调研ID\r\nkeyword:关键词\r\nkeyword_type:关键词类型\r\ntitle:标题\r\ncTime|time_format:发布时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,survey_answer&id=[id]|数据管理,preview?id=[id]&target=_blank|预览','20','title','MyISAM','Survey','1d41a879ec1b69429e79518c7c242396');



CREATE TABLE IF NOT EXISTS `wp_survey_answer` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`survey_id`  int(10) unsigned NULL  COMMENT 'survey_id',
`question_id`  int(10) unsigned NULL  COMMENT 'question_id',
`uid`  int(10) NULL  COMMENT '用户UID',
`openid`  varchar(255) NULL  COMMENT 'OpenId',
`answer`  text NULL  COMMENT '回答内容',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('survey_answer','调研回答','1','','openid:OpenId\r\nnickname:昵称\r\nmobile:手机号\r\ncTime|time_format:参与时间\r\nids:操作:detail?uid=[uid]&survey_id=[survey_id]|回答内容','20','title','MyISAM','Survey','ac6db18664f18bade142f0ff2ef88b4f');



CREATE TABLE IF NOT EXISTS `wp_survey_question` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '问题描述',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`survey_id`  int(10) unsigned NULL  COMMENT 'survey_id',
`type`  char(50) NOT NULL  DEFAULT 'radio' COMMENT '问题类型',
`extra`  text NULL  COMMENT '参数',
`is_must`  tinyint(2) NULL  COMMENT '是否必填',
`sort`  int(10) unsigned NULL  COMMENT '排序号',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('survey_question','调研问题','1','["title","type","extra","intro","is_must","sort"]','title:标题\r\ntype:问题类型\r\nis_must:是否必填\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','20','title','MyISAM','Survey','3bb94f00b45ded719b90ce3d56ac03e1');



