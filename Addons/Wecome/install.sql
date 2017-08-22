CREATE TABLE IF NOT EXISTS `wp_tool` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`test`  varchar(255) NULL  COMMENT '序言',
`nickname`  varchar(100) NULL  COMMENT '用户名',
`password`  varchar(100) NULL  COMMENT '登录密码',
`truename`  varchar(30) NULL  COMMENT '真实姓名',
`mobile`  varchar(30) NULL  COMMENT '联系电话',
`email`  varchar(100) NULL  COMMENT '邮箱地址',
`sex55`  tinyint(2) NULL  DEFAULT 1 COMMENT '性别33',
`headimgurl`  varchar(255) NULL  COMMENT '头像地址',
`city`  varchar(30) NULL  COMMENT '城市',
`province`  varchar(30) NULL  COMMENT '省份',
`country`  varchar(30) NULL  COMMENT '国家',
`language`  varchar(20) NULL  DEFAULT 'zh-cn' COMMENT '语言',
`score`  int(10) NULL  COMMENT '金币值',
`experience`  int(10) NULL  COMMENT '经验值',
`unionid`  varchar(50) NULL  COMMENT '微信第三方ID',
`login_count`  int(10) NULL  COMMENT '登录次数',
`reg_ip`  varchar(30) NULL  COMMENT '注册IP',
`reg_time`  int(10) NULL  COMMENT '注册时间',
`last_login_ip`  varchar(30) NULL  COMMENT '最近登录IP',
`last_login_time`  int(10) NULL  COMMENT '最近登录时间',
`status`  tinyint(2) NULL  DEFAULT 1 COMMENT '状态',
`is_init`  tinyint(2) NULL  COMMENT '初始化状态',
`is_audit`  tinyint(2) NULL  COMMENT '审核状态',
`subscribe_time`  int(10) NULL  COMMENT '用户关注公众号时间',
`remark`  varchar(100) NULL  COMMENT '微信用户备注',
`groupid`  int(10) NULL  COMMENT '微信端的分组ID',
`come_from`  tinyint(1) NULL  COMMENT '来源',
`level`  tinyint(2) NULL  COMMENT '管理等级',
`membership`  char(50) NULL  COMMENT '会员等级',
`yyy`  int(10) NULL  COMMENT 'retre',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('tool','用户信息表','1','','','10','title:请输入标题进行搜索44','MyISAM','Wecome','e3012e3cb91bb906e243084ef994bb3d');



