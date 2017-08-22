CREATE TABLE IF NOT EXISTS `wp_shop_address` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`uid`  int(10) NULL  COMMENT '用户ID',
`truename`  varchar(100) NULL  COMMENT '收货人姓名',
`mobile`  varchar(50) NULL  COMMENT '手机号码',
`city`  varchar(255) NULL  COMMENT '城市',
`address`  varchar(255) NULL  COMMENT '具体地址',
`is_use`  tinyint(2) NULL  COMMENT '是否设置为默认',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('shop_address','收货地址','1','','','20','','MyISAM','Shop','2a80cf035cddd794b688cc75f11419bc');
