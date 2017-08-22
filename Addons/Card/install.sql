CREATE TABLE IF NOT EXISTS `wp_card_privilege` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NULL  COMMENT '特权标题',
`grade`  varchar(100) NULL  COMMENT '适用人群',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '结束时间',
`intro`  text NULL  COMMENT '使用说明',
`token`  varchar(255) NULL  COMMENT 'token',
`enable`  tinyint(2) NULL  DEFAULT 1 COMMENT '是否启用',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_privilege','会员卡特权','1','["title","grade","start_time","end_time","intro","enable"]','start_time|time_format:特权开始时间\r\nend_time|time_format:特权结束时间\r\ntitle:特权标题\r\ngrade:适用人群\r\nintro:特权内容\r\nenable:是否开启\r\nstatus:状态\r\nid:操作:[EDIT]|编辑,[DELETE]|删除','10','','MyISAM','Card','7f6971091b108709f64f7f18f5ff2d81');



CREATE TABLE IF NOT EXISTS `wp_card_level` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`level`  varchar(255) NULL  COMMENT '会员等级',
`score`  int(10) NULL  COMMENT '累计积分',
`recharge`  int(10) NULL  COMMENT '累计充值',
`discount`  int(10) NULL  COMMENT '折扣率',
`token`  varchar(255) NULL  COMMENT 'token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_level','会员等级','1','["level","score","recharge","discount"]','level:会员等级\r\nscore:累计积分\r\nrecharge:累计充值\r\ndiscount:享受折扣\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','10','','MyISAM','Card','20b66f08dd9c87d456e44702eb4ae31f');



CREATE TABLE IF NOT EXISTS `wp_card_coupons` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`give_type`  tinyint(2) NULL  COMMENT '发放方式',
`title`  varchar(255) NOT NULL  COMMENT '优惠券标题',
`end_date`  int(10) NULL  COMMENT '结束时间',
`start_date`  int(10) NOT NULL  COMMENT '开始时间',
`content`  text NOT NULL  COMMENT '使用说明',
`cTime`  int(10) NULL  COMMENT '发布时间',
`token`  varchar(100) NULL  COMMENT 'Token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_coupons','会员卡优惠券','1','{"1":["title","give_type","start_date","end_date","content"]}','title:标题\r\ngive_type:发放方式\r\nstart_date|time_format:开始时间\r\nend_date|time_format:结束时间\r\ncTime|time_format:发布时间\r\nid:操作:[EDIT]|编辑,[DELETE]|删除','10','title','MyISAM','Card','69e7629121a4f6efdc9a775568296a65');



CREATE TABLE IF NOT EXISTS `wp_card_notice` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`cTime`  int(10) NULL  COMMENT '发布时间',
`content`  text NOT NULL  COMMENT '通知内容',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`token`  varchar(100) NULL  COMMENT 'Token',
`img`  int(10) unsigned NULL  COMMENT '通知图片',
`grade`  varchar(100) NULL  COMMENT '适用人群',
`to_uid`  int(10) NULL  COMMENT '指定用户',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_notice','会员卡通知','1','["title","img","grade","content"]','title:标题\r\ncTime|time_format:发布时间\r\nid:操作:[EDIT]|编辑,[DELETE]|删除','10','title','MyISAM','Card','d04801045a71f3514dee4cd2a12a6d44');



CREATE TABLE IF NOT EXISTS `wp_card_member` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`number`  varchar(50) NULL  COMMENT '卡号',
`cTime`  int(10) NULL  COMMENT '加入时间',
`phone`  varchar(30) NULL  COMMENT '手机号',
`username`  varchar(100) NULL  COMMENT '姓名',
`uid`  int(10) NULL  COMMENT '用户UID',
`token`  varchar(100) NULL  COMMENT 'Token',
`recharge`  int(10) NULL  COMMENT '余额',
`status`  tinyint(2) NULL  DEFAULT 1 COMMENT '会员状态',
`birthday`  int(10) NULL  COMMENT '生日',
`address`  varchar(255) NULL  COMMENT '地址',
`level`  int(10) NULL  COMMENT '会员卡等级',
`sex`  int(10) NULL  COMMENT '性别',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_member','会员卡成员','1','["phone","username","recharge"]','number:卡号\r\nuid:uid\r\nusername:姓名\r\nphone:手机号\r\nscore:剩余积分\r\nrecharge:余额\r\nlevel:等级\r\ncTime|time_format:加入时间\r\nstatus:状态\r\nid:操作:[EDIT]|编辑,[DELETE]|删除,do_recharge&id=[id]|会员充值,do_buy&id=[id]|会员消费,update_score&id=[id]|手动修改积分','10','username:请输入姓名','MyISAM','Card','ed801c2ba28f78115bbeb3a53e4c2e91');



CREATE TABLE IF NOT EXISTS `wp_recharge_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`recharge`  float NULL  COMMENT '充值金额',
`branch_id`  int(10) NULL  COMMENT '充值门店',
`operator`  varchar(255) NULL  COMMENT '操作员',
`cTime`  int(10) NULL  COMMENT '创建时间',
`token`  varchar(255) NULL  COMMENT 'token',
`member_id`  int(10) NULL  COMMENT '会员id',
`manager_id`  int(10) NULL  COMMENT '管理员id',
`type`  tinyint(2) NULL  DEFAULT 1 COMMENT '充值方式',
`remark`  text NULL  COMMENT '备注',
`uid`  int(10) NULL  COMMENT '用户ID',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('recharge_log','会员充值记录','1','["recharge","branch_id","operator","cTime","token","manager_id"]','member_id:会员卡号\r\ntruename:姓名\r\nphone:手机号\r\nrecharge:充值金额\r\ncTime|time_format:充值时间\r\nbranch_id:充值门店\r\noperator:操作员','10','operator:请输入姓名或手机号或操作员','MyISAM','Card','9040f5602a292e64328e40596bab0015');



CREATE TABLE IF NOT EXISTS `wp_buy_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`pay`  float NULL  COMMENT '消费金额',
`sn_id`  int(10) NULL  COMMENT '优惠卷',
`pay_type`  char(10) NULL  COMMENT '支付方式',
`branch_id`  int(10) NULL  COMMENT '消费门店',
`member_id`  int(10) NULL  COMMENT '会员卡id',
`cTime`  int(10) NULL  COMMENT '创建时间',
`token`  varchar(255) NULL  COMMENT 'token',
`manager_id`  int(10) NULL  COMMENT '管理员ID',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('buy_log','会员消费记录','1','["pay","pay_type","branch_id","cTime","token","manager_id","sn_id"]','member_id:会员名称\r\nphone:电话\r\ncTime|time_format:消费时间\r\nbranch_id:消费门店\r\npay:消费金额\r\nsn_id:优惠金额\r\npay_type:消费方式','10','member:请输入会员名称或手机号','MyISAM','Card','61be2938a1b88c7d35e0cd74c89e9aab');



CREATE TABLE IF NOT EXISTS `wp_card_marketing` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NULL  COMMENT '活动名称',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '结束时间',
`status`  tinyint(2) NULL  COMMENT '状态',
`type`  char(50) NULL  COMMENT '活动类型',
`give_type`  char(10) NULL  COMMENT '赠送类型',
`give`  int(10) NULL  COMMENT '赠送数据',
`condition`  int(10) NULL  COMMENT '赠送条件',
`branch_id`  int(10) NULL  COMMENT '充值门店',
`grade`  int(10) NULL  COMMENT '适用人群',
`exchange_count`  int(10) NULL  COMMENT '兑换次数',
`open_give_rule`  tinyint(2) NULL  COMMENT '启用赠送规则',
`enjoy_power`  tinyint(2) NULL  COMMENT '消费享受权限',
`token`  varchar(255) NULL  COMMENT 'token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_marketing','会员营销活动','1','','','10','','MyISAM','Card','56db570aa84c45893ab4ec4b7afbbf70');



CREATE TABLE IF NOT EXISTS `wp_card_reward` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`manager_id`  int(10) NULL  COMMENT '管理员ID',
`token`  varchar(50) NULL  COMMENT 'Token',
`cTime`  int(10) NULL  COMMENT '创建时间',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '过期时间',
`title`  varchar(100) NULL  COMMENT '活动名称',
`type`  tinyint(2) NULL  COMMENT '活动策略',
`score`  int(10) NULL  COMMENT '积分数',
`coupon_id`  int(10) NULL  COMMENT '商城优惠券',
`is_show`  tinyint(2) NULL  COMMENT '是否在用户领卡界面展示',
`content`  text NULL  COMMENT '活动说明',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_reward','开卡即送活动','1','["title","start_time","end_time","type","score","is_show","content","coupon_id"]','title:活动名称\r\ntype:活动策略\r\nstart_time:有效期\r\nstatus:活动状态\r\nid:操作:[EDIT]|编辑,[DELETE]|删除','10','title:请输入活动名称搜索','MyISAM','Card','67a26c10397c09848d506bc1ab4a04e0');



CREATE TABLE IF NOT EXISTS `wp_card_score` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`manager_id`  int(10) NULL  COMMENT '管理员ID',
`token`  varchar(50) NULL  COMMENT 'Token',
`cTime`  int(10) NULL  COMMENT '创建时间',
`num_limit`  int(10) NULL  COMMENT '兑换次数限制',
`coupon_id`  int(10) NULL  COMMENT '商城优惠券',
`score_limit`  int(10) NULL  COMMENT '所需积分',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '过期时间',
`title`  varchar(100) NULL  COMMENT '活动名称',
`member`  varchar(100) NULL  COMMENT '适用人群',
`coupon_type`  int(10) NULL  COMMENT '优惠券类型',
`cover_id`  int(10) unsigned NULL  COMMENT '活动图片',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_score','积分兑换活动','1','["title","start_time","end_time","num_limit","coupon_id","score_limit","member","coupon_type"]','title:活动名称\r\ncoupon_id:兑换内容\r\nstart_time:有效期\r\nstatus:活动状态\r\nmember:适用人群\r\nid:操作:[EDIT]|编辑,[DELETE]|删除','10','title:请输入活动名称搜索','MyISAM','Card','2d96107dc50ea1baa3c59afe2a26689c');



CREATE TABLE IF NOT EXISTS `wp_card_recharge` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`manager_id`  int(10) NULL  COMMENT '管理员ID',
`token`  varchar(50) NULL  COMMENT 'Token',
`cTime`  int(10) NULL  COMMENT '创建时间',
`goods_ids`  text NULL  COMMENT '指定商品ID串',
`is_all_goods`  tinyint(2) NULL  COMMENT '适用的活动商品',
`is_mult`  tinyint(2) NULL  COMMENT '多级优惠',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '过期时间',
`title`  varchar(100) NULL  COMMENT '活动名称',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_recharge','充值赠送活动','1','["title","start_time","end_time","is_mult","is_all_goods"]','title:活动名称\r\nstart_time:有效期\r\nstatus:活动状态\r\nid:操作:[EDIT]|编辑,[DELETE]|删除','10','title:请输入活动名称搜索','MyISAM','Card','fc2b2bfbf6b9d081d41e8573f8779b80');



CREATE TABLE IF NOT EXISTS `wp_card_recharge_condition` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`money_param`  decimal(11,2) NULL  COMMENT '现金参数',
`money`  tinyint(2) NULL  COMMENT '现在开关',
`reward_id`  int(10) NULL  COMMENT '活动ID',
`sort`  int(10) NULL  COMMENT '排序号',
`condition`  decimal(11,2) NULL  COMMENT '条件',
`score`  tinyint(2) NULL  COMMENT '积分开关',
`score_param`  int(10) NULL  COMMENT '积分参数',
`shop_coupon`  tinyint(2) NULL  COMMENT '优惠券开关',
`shop_coupon_param`  int(10) NULL  COMMENT '优惠券ID',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_recharge_condition','充值赠送条件','1','["postage","money_param","sort","condition","score","score_param","shop_coupon","shop_coupon_param"]','','10','','MyISAM','Card','03f23579f26d6ca7ec3495e46f0c3594');



CREATE TABLE IF NOT EXISTS `wp_card_custom` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`manager_id`  int(10) NULL  COMMENT '管理员ID',
`token`  varchar(50) NULL  COMMENT 'Token',
`cTime`  int(10) NULL  COMMENT '创建时间',
`score`  int(10) NULL  COMMENT '积分数',
`coupon_id`  int(10) NULL  COMMENT '商城优惠券',
`is_show`  tinyint(2) NULL  COMMENT '是否在会员卡界面展示',
`start_time`  int(10) NULL  COMMENT '节日时间',
`end_time`  int(10) NULL  COMMENT '赠送时间',
`title`  varchar(100) NULL  COMMENT '活动名称',
`type`  tinyint(2) NULL  COMMENT '活动策略',
`content`  text NULL  COMMENT '活动说明',
`member`  int(10) NULL  COMMENT '适用人群',
`is_birthday`  tinyint(2) NULL  COMMENT '节日类型',
`before_day`  tinyint(2) NULL  DEFAULT 1 COMMENT '生日前',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_custom','客户关怀活动','1','["title","start_time","end_time","type","score","is_show","content","coupon_id","member","is_birthday","before_day"]','title:节日名称\r\nstart_time:节日时间\r\nmember:目标人群\r\nend_time:赠送时间\r\ntype:赠送内容\r\nid:操作:[EDIT]|编辑,[DELETE]|删除','10','title:请输入活动名称搜索','MyISAM','Card','d0c61e563f97572e40c0709388dd91f4');



CREATE TABLE IF NOT EXISTS `wp_score_exchange_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`card_score_id`  int(10) NULL  COMMENT '兑换活动id',
`token`  varchar(255) NULL  COMMENT 'token',
`uid`  int(10) NULL  COMMENT 'uid',
`ctime`  int(10) NULL  COMMENT 'ctime',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('score_exchange_log','兑换记录','1','','','10','','MyISAM','Card','69ae7fd3e6359752be0c7d516d0c324f');



CREATE TABLE IF NOT EXISTS `wp_share_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`uid`  int(10) NULL  COMMENT '用户id',
`sTime`  int(10) NULL  COMMENT '分享时间',
`token`  varchar(255) NULL  COMMENT 'token',
`score`  int(10) NULL  COMMENT '积分',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('share_log','分享记录','1','','','10','','MyISAM','Card','cfe864927fffc6405b9ff018ea7bb568');



