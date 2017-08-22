CREATE TABLE IF NOT EXISTS `wp_forms` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`finish_tip`  text NULL  COMMENT '用户提交后提示内容',
`cTime`  int(10) unsigned NULL  COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`password`  varchar(255) NULL  COMMENT '表单密码',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '封面简介',
`mTime`  int(10) NULL  COMMENT '修改时间',
`cover`  int(10) unsigned NULL  COMMENT '封面图片',
`keyword`  varchar(100) NOT NULL  COMMENT '关键词',
`can_edit`  tinyint(2) NULL  COMMENT '是否允许编辑',
`content`  text NULL  COMMENT '详细介绍',
`jump_url`  varchar(255) NULL  COMMENT '提交后跳转的地址',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '模板',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('forms','通用表单','1','["keyword","keyword_type","title","intro","cover","can_edit","finish_tip","jump_url","content","template"]','id:通用表单ID\r\nkeyword:关键词\r\nkeyword_type:关键词类型\r\ntitle:标题\r\ncTime|time_format:发布时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,forms_attribute&id=[id]|字段管理,forms_value&id=[id]|数据管理,preview&id=[id]|预览','20','title','MyISAM','Forms','9cdc90ff2096fe7f1f339079a23dee7d');



CREATE TABLE IF NOT EXISTS `wp_forms_attribute` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`type`  char(50) NOT NULL  DEFAULT 'string' COMMENT '字段类型',
`title`  varchar(255) NOT NULL  COMMENT '字段标题',
`mTime`  int(10) NULL  COMMENT '修改时间',
`extra`  text NULL  COMMENT '参数',
`value`  varchar(255) NULL  COMMENT '默认值',
`token`  varchar(255) NULL  COMMENT 'Token',
`name`  varchar(100) NULL  COMMENT '字段名',
`remark`  varchar(255) NULL  COMMENT '字段备注',
`is_must`  tinyint(2) NULL  COMMENT '是否必填',
`validate_rule`  varchar(255) NULL  COMMENT '正则验证',
`sort`  int(10) unsigned NULL  COMMENT '排序号',
`error_info`  varchar(255) NULL  COMMENT '出错提示',
`forms_id`  int(10) unsigned NULL  COMMENT '表单ID',
`is_show`  tinyint(2) NULL  DEFAULT 1 COMMENT '是否显示',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('forms_attribute','表单字段','1','["name","title","type","extra","value","remark","is_must","validate_rule","error_info","sort"]','title:字段标题\r\nname:字段名\r\ntype:字段类型\r\nids:操作:[EDIT]&forms_id=[forms_id]|编辑,[DELETE]|删除','20','title','MyISAM','Forms','b97f36d1587e5eebf660a8f5f8daecf5');



CREATE TABLE IF NOT EXISTS `wp_forms_value` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`uid`  int(10) NULL  COMMENT '用户ID',
`openid`  varchar(255) NULL  COMMENT 'OpenId',
`forms_id`  int(10) unsigned NULL  COMMENT '表单ID',
`value`  text NULL  COMMENT '表单值',
`cTime`  int(10) NULL  COMMENT '增加时间',
`token`  varchar(255) NULL  COMMENT 'Token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('forms_value','通用表单数据','1','','','20','','MyISAM','Forms','bb57a17340dff243559bc07146f73c54');



