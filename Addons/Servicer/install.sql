CREATE TABLE IF NOT EXISTS `wp_servicer` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`uid`  int(10) NULL  COMMENT '用户选择',
`truename`  varchar(255) NULL  COMMENT '真实姓名',
`mobile`  varchar(255) NULL  COMMENT '手机号',
`role`  varchar(100) NULL  DEFAULT 0 COMMENT '授权列表',
`enable`  int(10) NULL  DEFAULT 1 COMMENT '是否启用',
`token`  varchar(255) NULL  COMMENT 'token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`,`addon`) VALUES ('servicer','授权用户','0','','1','["uid","truename","mobile","role","enable"]','1:基础','','','','','truename:姓名\r\nrole:权限列表\r\nnickname:微信名称\r\nenable:是否启用\r\nids:操作:set_enable?id=[id]&enable=[enable]|改变启用状态,[EDIT]|编辑,[DELETE]|删除','10','truename','','1443066649','1490713267','1','MyISAM','Servicer');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('uid','用户选择','int(10) NULL','user','','','1','','0','servicer','1','1','1445325351','1443066688','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('truename','真实姓名','varchar(255) NULL','string','','','1','','0','servicer','1','1','1445325390','1443066736','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('mobile','手机号','varchar(255) NULL','string','','','1','','0','servicer','1','1','1445325401','1443066833','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('role','授权列表','varchar(100) NULL','checkbox','0','','1','1:微信客服\r\n2:扫码验证\r\n3:微订单接单','0','servicer','1','1','1445325510','1443067065','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('enable','是否启用','int(10) NULL','radio','1','','1','0:禁用\r\n1:启用','0','servicer','0','1','1443067721','1443067149','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('token','token','varchar(255) NULL','string','','','0','','0','servicer','0','1','1443067647','1443067638','','3','','regex','get_token','1','function');
UPDATE `wp_attribute` a, wp_model m SET a.model_id = m.id WHERE a.model_name=m.`name`;


