CREATE TABLE IF NOT EXISTS `wp_weisite_category` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(100) NOT NULL  COMMENT '分类标题',
`icon`  int(10) unsigned NULL  COMMENT '分类图片',
`url`  varchar(255) NULL  COMMENT '外链',
`is_show`  tinyint(2) NULL  DEFAULT 1 COMMENT '显示',
`token`  varchar(100) NULL  COMMENT 'Token',
`sort`  int(10) NULL  COMMENT '排序号',
`pid`  int(10) NULL  COMMENT '一级目录',
`template`  varchar(255) NULL  COMMENT '二级模板',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('weisite_category','微官网分类','1','["title","icon","url","is_show","sort","pid"]','title:15%分类标题\r\nicon|get_img_html:分类图片\r\nurl:30%外链\r\nsort:10%排序号\r\npid:10%一级目录\r\nis_show:10%显示\r\nid:10%操作:[EDIT]|编辑,[DELETE]|删除','20','title','MyISAM','WeiSite','3a08171653cc2712434f240b9098e964');



CREATE TABLE IF NOT EXISTS `wp_weisite_cms` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(100) NOT NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NULL  COMMENT '关键词类型',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '简介',
`cate_id`  int(10) unsigned NULL  COMMENT '所属类别',
`cover`  int(10) unsigned NULL  COMMENT '封面图片',
`content`  text NULL  COMMENT '内容',
`cTime`  int(10) NULL  COMMENT '发布时间',
`sort`  int(10) unsigned NULL  COMMENT '排序号',
`view_count`  int(10) unsigned NULL  COMMENT '浏览数',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('weisite_cms','文章管理','1','["keyword","keyword_type","title","intro","cate_id","cover","content","sort"]','keyword:关键词\r\nkeyword_type:关键词类型\r\ntitle:标题\r\ncate_id:所属分类\r\nsort:排序号\r\nview_count:浏览数\r\nids:操作:[EDIT]&module_id=[pid]|编辑,[DELETE]|删除','20','title','MyISAM','WeiSite','7bf53802e037435f2628bb320468b90c');



CREATE TABLE IF NOT EXISTS `wp_weisite_footer` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`url`  varchar(255) NULL  COMMENT '关联URL',
`title`  varchar(50) NOT NULL  COMMENT '菜单名',
`pid`  tinyint(2) NULL  COMMENT '一级菜单',
`sort`  tinyint(4) NULL  COMMENT '排序号',
`token`  varchar(255) NULL  COMMENT 'Token',
`icon`  int(10) unsigned NULL  COMMENT '图标',
PRIMARY KEY (`id`),
KEY `token` (`token`,pid,sort)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('weisite_footer','底部导航','1','["pid","title","url","sort","icon"]','title:15%菜单名\r\nicon:10%图标\r\nurl:50%关联URL\r\nsort:8%排序号\r\nids:20%操作:[EDIT]|编辑,[DELETE]|删除','20','title','MyISAM','WeiSite','54c23c576370f399b963f95ff115f2db');



CREATE TABLE IF NOT EXISTS `wp_weisite_slideshow` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NULL  COMMENT '标题',
`img`  int(10) unsigned NOT NULL  COMMENT '图片',
`url`  varchar(255) NULL  COMMENT '链接地址',
`is_show`  tinyint(2) NULL  DEFAULT 1 COMMENT '是否显示',
`sort`  int(10) NULL  COMMENT '排序',
`token`  varchar(100) NULL  COMMENT 'Token',
`cate_id`  varchar(100) NULL  COMMENT '所属目录',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('weisite_slideshow','幻灯片','1','["title","img","url","is_show","sort"]','title:标题\r\nimg:图片\r\nurl:链接地址\r\nis_show:显示\r\nsort:排序\r\nids:操作:[EDIT]&module_id=[pid]|编辑,[DELETE]|删除','20','title','MyISAM','WeiSite','eaa4220f487421cbf8999aa259f0eaab');



