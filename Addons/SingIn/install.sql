CREATE TABLE IF NOT EXISTS `wp_signin_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`score`  int(10) NOT NULL  COMMENT '积分',
`token`  varchar(255) NULL  COMMENT 'Token',
`sTime`  int(10) unsigned NULL  COMMENT '签到时间',
`uid`  varchar(255) NOT NULL  COMMENT '用户ID',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('SignIn_Log','签到记录','1','{"1":["uid","score"]}','uid:用户ID\r\nnickname:呢称\r\nsTime|time_format:签到时间\r\nscore:积分\r\n','10','uid','MyISAM','SingIn','1ae42b046281a1a7854926ca8261ac01');



