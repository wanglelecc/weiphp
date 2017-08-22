CREATE TABLE IF NOT EXISTS `wp_redbag` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`mch_id`  varchar(32) NULL  COMMENT '商户号',
`sub_mch_id`  varchar(32) NULL  COMMENT '子商户号',
`wxappid`  varchar(32) NULL  COMMENT '公众账号appid',
`nick_name`  varchar(32) NULL  COMMENT '提供方名称',
`send_name`  varchar(32) NULL  COMMENT '商户名称',
`total_amount`  int(10) NULL  DEFAULT 1000 COMMENT '付款金额',
`min_value`  int(10) NULL  DEFAULT 1000 COMMENT '最小红包金额',
`max_value`  int(10) NULL  DEFAULT 1000 COMMENT '最大红包金额',
`total_num`  int(10) NULL  DEFAULT 1 COMMENT '红包发放总人数',
`wishing`  varchar(255) NULL  COMMENT '红包祝福语',
`act_name`  varchar(255) NULL  COMMENT '活动名称',
`remark`  varchar(255) NULL  COMMENT '备注',
`logo_imgurl`  int(10) unsigned NULL  COMMENT '商户logo的url',
`share_content`  varchar(255) NULL  COMMENT '分享文案',
`share_url`  varchar(255) NULL  COMMENT '分享链接',
`share_imgurl`  int(10) unsigned NULL  COMMENT '分享的图片',
`collect_count`  int(10) NULL  COMMENT '领取人数',
`collect_amount`  int(10) NULL  COMMENT '已领取金额',
`collect_limit`  tinyint(2) NULL  COMMENT '每人最多领取次数',
`partner_key`  varchar(50) NULL  COMMENT '商户API密钥',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '素材模板',
`token`  varchar(50) NULL  COMMENT 'token',
`uid`  int(10) NULL  COMMENT 'uid',
`act_remark`  varchar(255) NULL  COMMENT '活动备注',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('redbag','微信红包','1','["mch_id","wxappid","nick_name","send_name","total_amount","min_value","max_value","total_num","wishing","act_name","remark","collect_limit","partner_key","token","uid","template"]','act_name:活动名称\r\nsend_name:商户名称\r\ntotal_amount:付款金额\r\nmin_value:最小红包\r\nmax_value:最大红包\r\ntotal_num:发放人数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,preview?id=[id]&target=_blank|预览','20','act_name:活动名称','MyISAM','RedBag','642f74dcce3d8e141794ce75376f704d');



CREATE TABLE IF NOT EXISTS `wp_redbag_follow` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`redbag_id`  int(10) NULL  COMMENT '红包ID',
`follow_id`  int(10) NULL  COMMENT '粉丝ID',
`amount`  int(10) NULL  COMMENT '领取金额',
`cTime`  int(10) NULL  COMMENT '发放时间',
`status`  char(10) NULL  DEFAULT 'SENDING' COMMENT '发放状态',
`reason`  varchar(50) NULL  COMMENT '失败原因 ',
`Rcv_time`  int(10) NULL  COMMENT '领取红包的时间 ',
`Send_time`  int(10) NULL  COMMENT '红包发送时间 ',
`Refund_time`  int(10) NULL  COMMENT '红包退款时间',
`extra`  text NULL  COMMENT '微信返回的数据集',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('redbag_follow','领取红包的用户','1','["redbag_id","follow_id","amount","cTime"]','follow_id|get_follow_name:粉丝\r\namount:领取金额（分）\r\ncTime|time_format:领取时间','20','','MyISAM','RedBag','f0f1c1416662260d20d4eaabc0007c5c');



