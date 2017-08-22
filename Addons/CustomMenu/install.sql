CREATE TABLE IF NOT EXISTS `wp_custom_menu` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`url`  varchar(255) NULL  COMMENT '关联URL',
`keyword`  varchar(100) NULL  COMMENT '关联关键词',
`title`  varchar(50) NOT NULL  COMMENT '菜单名',
`pid`  int(10) NULL  COMMENT '一级菜单',
`sort`  tinyint(4) NULL  COMMENT '排序号',
`token`  varchar(255) NULL  COMMENT 'Token',
`type`  varchar(30) NULL  DEFAULT 'click' COMMENT '类型',
`from_type`  char(50) NULL  DEFAULT -1 COMMENT '配置动作',
`addon`  char(30) NULL  COMMENT '选择插件',
`target_id`  int(10) NULL  COMMENT '选择内容',
`sucai_type`  varchar(50) NULL  COMMENT '素材类型',
`jump_type`  int(10) NULL  COMMENT '推送类型',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('custom_menu','自定义菜单','1','["pid","title","from_type","type","jump_type","addon","sucai_type","keyword","url","sort"]','title:10%菜单名\r\nkeyword:10%关联关键词\r\nurl:50%关联URL\r\nsort:5%排序号\r\nid:10%操作:[EDIT]|编辑,[DELETE]|删除','20','title','MyISAM','CustomMenu','cadd23b9777d70a707bf1724014679fc');



