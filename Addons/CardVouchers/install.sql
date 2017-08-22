CREATE TABLE IF NOT EXISTS `wp_card_vouchers` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`content`  text NULL  COMMENT '活动介绍',
`code`  text NULL  COMMENT '卡券code码',
`appsecre`  varchar(255) NULL  COMMENT '开通卡券的商家公众号密钥',
`openid`  text NULL  COMMENT 'OpenID',
`card_id`  varchar(100) NULL  COMMENT '卡券ID',
`balance`  varchar(30) NULL  COMMENT '红包余额',
`cover`  int(10) unsigned NULL  COMMENT '素材封面',
`background`  int(10) unsigned NULL  COMMENT '背景图',
`title`  varchar(255) NULL  DEFAULT '卡券' COMMENT '卡券标题',
`button_color`  varchar(255) NULL  DEFAULT '#0dbd02' COMMENT '领取按钮颜色',
`head_bg_color`  varchar(255) NULL  DEFAULT '#35a2dd' COMMENT '头部背景颜色',
`shop_logo`  int(10) unsigned NULL  COMMENT '商家LOGO',
`shop_name`  varchar(255) NULL  COMMENT '商家名称',
`more_button`  text NULL  COMMENT '添加更多按钮',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '素材模板',
`uid`  int(10) NULL  COMMENT 'uid',
`token`  varchar(50) NULL  COMMENT 'token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('card_vouchers','微信卡券','1','["appsecre","code","content","background","title","button_color","head_bg_color","shop_name","uid","token","shop_logo","more_button","template"]','title:卡券名称\r\ncard_id:卡券ID\r\nappsecre:商家公众号密钥\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,preview?id=[id]&target=_blank|预览','20','card_id','MyISAM','CardVouchers','cb342a982bc9b8eddaef68290049b000');



