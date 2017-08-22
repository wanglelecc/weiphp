CREATE TABLE IF NOT EXISTS `wp_prize_address` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`address`  varchar(255) NULL  COMMENT '奖品收货地址',
`mobile`  varchar(50) NULL  COMMENT '手机',
`turename`  varchar(255) NULL  COMMENT '收货人姓名',
`uid`  int(10) NULL  COMMENT '用户id',
`remark`  varchar(255) NULL  COMMENT '备注',
`prizeid`  int(10) NULL  COMMENT '奖品编号',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('prize_address','奖品收货地址','1','["address","mobile","turename","remark"]','prizeid:奖品名称\r\nturename:收货人\r\nmobile:联系方式\r\naddress:收货地址\r\nremark:备注\r\nids:操作:address_edit&id=[id]&_controller=RealPrize&_addons=RealPrize|编辑,[DELETE]|删除','20','turename:请输入收货人搜索','MyISAM','RealPrize','7d85a7fd1974bbb6ece560f081986505');



CREATE TABLE IF NOT EXISTS `wp_real_prize` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`prize_name`  varchar(255) NULL  COMMENT '奖品名称',
`prize_conditions`  text NULL  COMMENT '活动说明',
`prize_count`  int(10) NULL  COMMENT '奖品个数',
`prize_image`  varchar(255) NULL  DEFAULT '上传奖品图片' COMMENT '奖品图片',
`token`  varchar(255) NULL  COMMENT 'token',
`prize_type`  tinyint(2) NULL  DEFAULT 1 COMMENT '奖品类型',
`use_content`  text NULL  COMMENT '使用说明',
`prize_title`  varchar(255) NULL  COMMENT '活动标题',
`fail_content`  text NULL  COMMENT '领取失败提示',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '素材模板',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('real_prize','实物奖励','1','["prize_title","prize_name","prize_conditions","prize_count","prize_image","prize_type","use_content","fail_content","template"]','prize_name:20%奖品名称\r\nprize_conditions:20%活动说明\r\nprize_count:10%奖品个数\r\nprize_type:10%奖品类型\r\nuse_content:20%使用说明\r\nid:20%操作:[EDIT]|编辑,[DELETE]|删除,address_lists?target_id=[id]|查看数据,preview?id=[id]&target=_blank|预览','20','prize_name:请输入奖品名称','MyISAM','RealPrize','130781cad4b68137352013177cc8b258');



