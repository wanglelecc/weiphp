CREATE TABLE IF NOT EXISTS `wp_weiba_category` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`name`  varchar(255) NULL  COMMENT '分类名称',
`token`  varchar(100) NULL  COMMENT 'token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('weiba_category','微吧分类','1','["name"]','id:分类编号\r\nname:分类名称\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','10','name:请输入分类名称搜索','MyISAM','Weiba','99a7a6cc3e8be95d8cad012ac0f17494');



CREATE TABLE IF NOT EXISTS `wp_weiba` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`cid`  varchar(100) NULL  COMMENT '所属分类',
`weiba_name`  varchar(255) NULL  COMMENT '版块名称',
`uid`  int(10) NULL  COMMENT '创建者ID',
`ctime`  int(10) NULL  COMMENT '创建时间',
`logo`  int(10) unsigned NULL  COMMENT '版块图标',
`intro`  text NULL  COMMENT '版块说明',
`who_can_post`  tinyint(1) NULL  COMMENT '发帖权限',
`who_can_reply`  tinyint(1) NULL  COMMENT '回帖权限',
`follower_count`  int(10) NULL  COMMENT '成员数',
`thread_count`  int(10) NULL  COMMENT '帖子数',
`admin_uid`  varchar(255) NULL  COMMENT '版主',
`recommend`  tinyint(1) NULL  COMMENT '是否设置为推荐',
`status`  tinyint(1) NULL  DEFAULT 1 COMMENT '审核状态',
`is_del`  tinyint(1) NULL  COMMENT '是否删除',
`notify`  text NULL  COMMENT '版块公告',
`avatar_big`  text NULL  COMMENT 'avatar_big',
`avatar_middle`  text NULL  COMMENT 'avatar_middle',
`new_count`  int(10) NULL  COMMENT '最新帖子数',
`new_day`  date NULL  COMMENT 'new_day',
`info`  varchar(255) NULL  COMMENT '申请附件信息',
`token`  varchar(100) NULL  COMMENT 'token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('weiba','微社区','1','["weiba_name","cid","logo","who_can_post","recommend","admin_uid","intro","notify"]','id:微吧ID\r\nweiba_name:版块名称\r\ncid:版块分类\r\nthread_count:帖子数\r\nfollower_count:成员数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','10','weiba_name:请输入版块名称搜索','MyISAM','Weiba','f5ec1b287e98526b6f6b30170b0a50b5');



CREATE TABLE IF NOT EXISTS `wp_weiba_post` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`weiba_id`  int(10) NULL  COMMENT '所属版块',
`post_uid`  int(10) NULL  COMMENT '发表者uid',
`title`  varchar(255) NOT NULL  COMMENT '帖子标题',
`content`  text NOT NULL  COMMENT '帖子内容',
`post_time`  int(10) NULL  COMMENT '发表时间',
`reply_count`  int(10) NULL  COMMENT '回复数',
`read_count`  int(10) NULL  COMMENT '浏览数',
`last_reply_uid`  varchar(50) NULL  COMMENT '最后回复人',
`last_reply_time`  int(10) NULL  COMMENT '最后回复时间',
`digest`  tinyint(1) NULL  COMMENT '全局精华',
`top`  tinyint(2) NULL  COMMENT '置顶帖',
`lock`  tinyint(1) NULL  COMMENT '锁帖',
`recommend`  tinyint(1) NULL  COMMENT '是否设为推荐',
`recommend_time`  int(10) NULL  COMMENT '设为推荐的时间',
`is_del`  tinyint(2) NULL  COMMENT '是否已删除',
`reply_all_count`  int(11) NULL  COMMENT '全部评论数目',
`attach`  varchar(255) NULL  COMMENT 'attach',
`praise`  int(10) NULL  COMMENT '喜欢',
`from`  tinyint(1) NULL  DEFAULT 1 COMMENT '客户端类型',
`top_time`  int(10) NULL  COMMENT 'top_time',
`is_index`  tinyint(2) NULL  COMMENT '是否推荐到首页',
`index_img`  int(10) unsigned NULL  COMMENT 'index_img',
`is_index_time`  int(10) NULL  COMMENT 'is_index_time',
`img_ids`  varchar(255) NULL  COMMENT 'img_ids',
`tag_id`  int(10) NULL  COMMENT '标签',
`index_order`  int(10) NULL  COMMENT '首页帖子排序',
`is_event`  tinyint(2) NULL  COMMENT '类型',
`globle_recommend`  tinyint(2) NULL  COMMENT '推荐到全站',
`token`  varchar(100) NULL  COMMENT 'token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('weiba_post','微社区帖子','1','["weiba_id","title","content"]','id:帖子编号\r\ntitle:帖子标题\r\nweiba_id:所属版块\r\npost_uid:发帖人\r\nread_count:浏览数\r\nreply_count:回复数\r\npost_time|time_format:发帖时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','10','title:请输入标题搜索','MyISAM','Weiba','6d623b3e764566a0203fc394ccec2ab3');



