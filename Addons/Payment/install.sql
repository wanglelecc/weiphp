CREATE TABLE IF NOT EXISTS `wp_payment_order` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`from`  varchar(50) NOT NULL  COMMENT '回调地址',
`orderName`  varchar(255) NULL  COMMENT '订单名称',
`single_orderid`  varchar(100) NOT NULL  COMMENT '订单号',
`price`  decimal(10,2) NULL  COMMENT '价格',
`token`  varchar(100) NOT NULL  COMMENT 'Token',
`wecha_id`  varchar(200) NOT NULL  COMMENT 'OpenID',
`paytype`  varchar(30) NOT NULL  COMMENT '支付方式',
`showwxpaytitle`  tinyint(2) NOT NULL  COMMENT '是否显示标题',
`status`  tinyint(2) NOT NULL  COMMENT '支付状态',
`aim_id`  int(10) NULL  COMMENT 'aim_id',
`uid`  int(10) NULL  COMMENT '用户uid',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('payment_order','订单支付记录','1','["from","orderName","single_orderid","price","token","wecha_id","paytype","showwxpaytitle","status"]','','20','','MyISAM','Payment','c0d4fa33a9096de226ccc373b897082b');



CREATE TABLE IF NOT EXISTS `wp_payment_set` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`token`  varchar(255) NULL  COMMENT 'token',
`ctime`  int(10) NULL  COMMENT '创建时间',
`wxappid`  varchar(255) NULL  COMMENT 'AppID',
`wxpaysignkey`  varchar(255) NULL  COMMENT '支付密钥',
`wxappsecret`  varchar(255) NULL  COMMENT 'AppSecret',
`zfbname`  varchar(255) NULL  COMMENT '帐号',
`pid`  varchar(255) NULL  COMMENT 'PID',
`key`  varchar(255) NULL  COMMENT 'KEY',
`partnerid`  varchar(255) NULL  COMMENT '财付通标识',
`partnerkey`  varchar(255) NULL  COMMENT '财付通Key',
`wappartnerid`  varchar(255) NULL  COMMENT '财付通标识WAP',
`wappartnerkey`  varchar(255) NULL  COMMENT 'WAP财付通Key',
`wxpartnerkey`  varchar(255) NULL  COMMENT '微信partnerkey',
`wxpartnerid`  varchar(255) NULL  COMMENT '微信partnerid',
`quick_security_key`  varchar(255) NULL  COMMENT '银联在线Key',
`quick_merid`  varchar(255) NULL  COMMENT '银联在线merid',
`quick_merabbr`  varchar(255) NULL  COMMENT '商户名称',
`shop_id`  int(10) NULL  COMMENT '商店ID',
`wxmchid`  varchar(255) NULL  COMMENT '微信支付商户号',
`wx_cert_pem`  int(10) unsigned NULL  COMMENT '上传证书',
`wx_key_pem`  int(10) unsigned NULL  COMMENT '上传密匙',
`shop_pay_score`  int(10) NULL  COMMENT '支付返积分',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('payment_set','支付配置','1','["wxappid","wxappsecret","wxpaysignkey","zfbname","pid","key","partnerid","partnerkey","wappartnerid","wappartnerkey","quick_security_key","quick_merid","quick_merabbr","wxmchid"]','','10','','MyISAM','Payment','219b8a3d3046c8886ee242c9f56de8b8');



