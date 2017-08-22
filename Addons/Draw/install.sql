CREATE TABLE IF NOT EXISTS `wp_draw_follow_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`follow_id`  int(10) NULL  COMMENT '粉丝id',
`sports_id`  int(10) NULL  COMMENT '场次id',
`count`  int(10) NULL  COMMENT '抽奖次数',
`cTime`  int(10) NULL  COMMENT '支持时间',
`uid`  int(10) NULL  COMMENT 'uid',
`token`  varchar(255) NULL  COMMENT 'token',
PRIMARY KEY (`id`),
KEY `sports_id` (`sports_id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('draw_follow_log','粉丝抽奖记录','1','["follow_id","sports_id","count","cTime"]','','20','','MyISAM','Draw','f85578ffbbd5253a9452c2fa98a2a1ee');



CREATE TABLE IF NOT EXISTS `wp_lottery_prize_list` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`sports_id`  int(10) NULL  COMMENT '活动编号',
`award_id`  varchar(255) NULL  COMMENT '奖品编号',
`award_num`  int(10) NULL  COMMENT '奖品数量',
`uid`  int(10) NULL  COMMENT 'uid',
PRIMARY KEY (`id`),
KEY `sports_id` (`sports_id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('lottery_prize_list','抽奖奖品列表','1','["sports_id","award_id","award_num"]','sports_id:比赛场次\r\naward_id:奖品名称\r\naward_num:奖品数量\r\nid:编辑:[EDIT]|编辑,[DELETE]|删除,add?sports_id=[sports_id]|添加','20','','MyISAM','Draw','6a69feb054bc991bffa543705ad0017d');



CREATE TABLE IF NOT EXISTS `wp_lucky_follow` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`draw_id`  int(10) NULL  COMMENT '活动编号',
`sport_id`  int(10) NULL  COMMENT '场次编号',
`award_id`  int(10) NULL  COMMENT '奖品编号',
`follow_id`  int(10) NULL  COMMENT '粉丝id',
`address`  varchar(255) NULL  COMMENT '地址',
`num`  int(10) NULL  COMMENT '获奖数',
`state`  tinyint(2) NULL  COMMENT '兑奖状态',
`zjtime`  int(10) NULL  COMMENT '中奖时间',
`djtime`  int(10) NULL  COMMENT '兑奖时间',
`uid`  int(10) NULL  COMMENT 'uid',
`token`  varchar(255) NULL  COMMENT 'token',
`aim_table`  varchar(255) NULL  COMMENT '活动标识',
`remark`  text NULL  COMMENT '备注',
`scan_code`  varchar(255) NULL  COMMENT '核销码',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('lucky_follow','中奖者信息','1','["draw_id","sport_id","award_id","follow_id","address","num","state","zjtime","djtime","remark","scan_code"]','draw_id:活动\r\naward_id:奖项\r\naward_name:奖品\r\nzjtime|time_format:中奖时间\r\nfollow_id:8%微信昵称\r\nstate:发奖状态\r\nids:8%操作:do_fafang?id=[id]|发放奖品','20','award_id:输入奖品名称','MyISAM','Draw','08ce09306af90d155e7f07b2595efd23');



CREATE TABLE IF NOT EXISTS `wp_lzwg_activities` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NULL  COMMENT '活动名称',
`remark`  text NULL  COMMENT '活动描述',
`logo_img`  int(10) unsigned NULL  COMMENT '活动LOGO',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '结束时间',
`get_prize_tip`  varchar(255) NULL  COMMENT '中奖提示信息',
`no_prize_tip`  varchar(255) NULL  COMMENT '未中奖提示信息',
`ctime`  int(10) NULL  COMMENT '活动创建时间',
`uid`  int(10) NULL  COMMENT 'uid',
`lottery_number`  int(10) NULL  DEFAULT 1 COMMENT '抽奖次数',
`comment_status`  char(10) NULL  COMMENT '评论是否需要审核',
`get_prize_count`  int(10) NULL  DEFAULT 1 COMMENT '中奖次数',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('lzwg_activities','靓妆活动','1','["title","remark","logo_img","start_time","end_time","get_prize_tip","no_prize_tip","lottery_number","get_prize_count","comment_status"]','title:活动名称\r\nremark:活动描述\r\nlogo_img|get_img_html:活动LOGO\r\nactivitie_time:活动时间\r\nget_prize_tip:中将提示信息\r\nno_prize_tip:未中将提示信息\r\ncomment_list:评论列表\r\nset_vote:设置投票\r\nset_award:设置奖品\r\nget_prize_list:中奖列表\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','20','','MyISAM','Draw','33c0e7fb891c1ac24b322755148df484');



CREATE TABLE IF NOT EXISTS `wp_lzwg_activities_vote` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`lzwg_id`  int(10) NULL  COMMENT '活动编号',
`lzwg_type`  char(10) NULL  COMMENT '活动类型',
`vote_id`  int(10) NULL  COMMENT '题目编号',
`vote_type`  char(10) NULL  DEFAULT 1 COMMENT '问题类型',
`vote_limit`  int(10) NULL  COMMENT '最多选择几项',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('lzwg_activities_vote','投票答题活动','1','["lzwg_id","vote_type","vote_limit","lzwg_type","vote_id"]','lzwg_name:活动名称\r\nstart_time|time_format:活动开始时间\r\nend_time|time_format:活动结束时间\r\nlzwg_type:活动类型\r\nvote_title:题目\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,tongji&id=[id]|用户参与分析\r\n','20','lzwg_id:活动名称','MyISAM','Draw','1830a5bd72254e3c3d8983bd2a3e09d8');



CREATE TABLE IF NOT EXISTS `wp_sport_award` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`award_type`  varchar(30) NULL  DEFAULT 1 COMMENT '奖品类型',
`name`  varchar(255) NOT NULL  COMMENT '奖项名称',
`img`  int(10) NOT NULL  COMMENT '奖品图片',
`price`  float NULL  COMMENT '商品价格',
`explain`  text NULL  COMMENT '奖品说明',
`count`  int(10) NULL  COMMENT '奖品数量',
`sort`  int(10) unsigned NULL  COMMENT '排序号',
`score`  int(10) NULL  COMMENT '积分数',
`uid`  int(10) NULL  COMMENT 'uid',
`token`  varchar(255) NULL  COMMENT 'token',
`coupon_id`  char(50) NULL  COMMENT '选择赠送券',
`money`  float NULL  COMMENT '返现金额',
`aim_table`  varchar(255) NULL  COMMENT '活动标识',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('sport_award','抽奖奖品','1','["award_type","name","count","img","price","score","explain","coupon_id","money"]','id:6%编号\r\nname:23%奖项名称\r\nimg|get_img_html:8%商品图片\r\nprice:8%商品价格\r\nexplain:24%奖品说明\r\ncount:8%奖品数量\r\nids:20%操作:[EDIT]|编辑,[DELETE]|删除,getlistByAwardId?awardId=[id]&_controller=LuckyFollow|中奖者列表','20','name:请输入抽奖名称','MyISAM','Draw','89c94f784c4bd138e64028d092fea8db');



CREATE TABLE IF NOT EXISTS `wp_sports` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`home_team`  varchar(255) NULL  COMMENT '主场球队',
`visit_team`  varchar(255) NULL  COMMENT '客场球队',
`start_time`  int(10) NULL  COMMENT '时间',
`score`  varchar(30) NULL  COMMENT '比分',
`content`  text NULL  COMMENT '说明',
`countdown`  int(10) NULL  DEFAULT 60 COMMENT '擂鼓时长',
`drum_count`  int(10) NULL  COMMENT '擂鼓次数',
`drum_follow_count`  int(10) NULL  COMMENT '擂鼓人数',
`home_team_support_count`  int(10) NULL  COMMENT '主场球队支持数',
`visit_team_support_count`  int(10) NULL  COMMENT '客场球队支持人数',
`home_team_drum_count`  int(10) NULL  COMMENT '主场球队擂鼓数',
`visit_team_drum_count`  int(10) NULL  COMMENT '客场球队擂鼓数',
`yaotv_count`  int(10) NULL  COMMENT '摇一摇总次',
`draw_count`  int(10) NULL  COMMENT '抽奖总次数',
`is_finish`  tinyint(2) NULL  COMMENT '是否已结束',
`yaotv_follow_count`  int(10) NULL  COMMENT '摇电视总人数',
`draw_follow_count`  int(10) NULL  COMMENT '抽奖总人数',
`comment_status`  tinyint(2) NULL  COMMENT '评论是否需要审核',
PRIMARY KEY (`id`),
KEY `start_time` (`start_time`,id)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('sports','体育赛事','1','["home_team","visit_team","start_time","score","content","countdown","comment_status"]','start_time|time_format:20%比赛场次\r\nvs_team:20%对战球队（主场VS客场）\r\nscore_title:8%比分\r\ncontent|lists_msubstr:27%对战球队的介绍\r\nids:23%操作:add?sports_id=[id]&_controller=LotteryPrizeList&_addons=Draw&target=_blank|奖品配置,lists?sports_id=[id]&_addons=Draw&_controller=LuckyFollow&target=_blank|中奖列表,lists?sports_id=[id]&_addons=Comment&_controller=Comment&target=_blank|评论列表,package?id=[id]&_controller=Sucai&_addons=Sucai&source=Sports&is_preview=1&target=_blank|预览,package?id=[id]&_controller=Sucai&_addons=Sucai&source=Sports&is_download=1&target=_blank|下载素材,[EDIT]|编辑,[DELETE]|删除','20','home_team:请输入球队名','MyISAM','Draw','4eef0e099596bffead91491e36335e8a');



CREATE TABLE IF NOT EXISTS `wp_sports_drum` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`sports_id`  int(10) NULL  COMMENT '场次ID',
`team_id`  int(10) NULL  COMMENT '球队ID',
`follow_id`  int(10) NULL  COMMENT '用户ID',
`drum_count`  int(10) NULL  COMMENT '擂鼓次数',
`cTime`  int(10) NULL  COMMENT '时间',
PRIMARY KEY (`id`),
KEY `ctime` (`sports_id`,cTime),
KEY `team_id` (`sports_id`,team_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('sports_drum','擂鼓记录','1','','','20','','MyISAM','Draw','326cf1924730cb131faf19416579458d');



CREATE TABLE IF NOT EXISTS `wp_sports_support` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`sports_id`  int(10) NULL  COMMENT '场次ID',
`team_id`  int(10) NULL  COMMENT '球队ID',
`follow_id`  int(10) NULL  COMMENT '用户ID',
`cTime`  int(10) NULL  COMMENT '支持时间',
PRIMARY KEY (`id`),
KEY `sf` (`sports_id`,follow_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('sports_support','球队支持记录','1','','','20','','MyISAM','Draw','a661aa3a21a0206e3ef30fab56bf6e2e');



CREATE TABLE IF NOT EXISTS `wp_sports_team` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(100) NULL  COMMENT '球队名称',
`logo`  int(10) unsigned NULL  COMMENT '球队图标',
`intro`  text NULL  COMMENT '球队说明',
`pid`  int(10) NULL  COMMENT 'pid',
`sort`  int(10) NULL  COMMENT '排序号',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('sports_team','比赛球队','1','["title","logo","intro"]','logo|get_img_html:球队图标\r\ntitle:球队名称\r\nintro|lists_msubstr:球队说明\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','20','title:请输入球队名','MyISAM','Draw','49d14886b007edf7005ea1135de58de5');



CREATE TABLE IF NOT EXISTS `wp_lottery_games` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NULL  COMMENT '活动名称',
`game_type`  char(10) NULL  DEFAULT 1 COMMENT '游戏类型',
`status`  char(10) NULL  DEFAULT 1 COMMENT '状态',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_time`  int(10) NULL  COMMENT '结束时间',
`day_attend_limit`  int(10) NULL  COMMENT '每人每天抽奖次数',
`attend_limit`  int(10) NULL  COMMENT '每人总共抽奖次数',
`day_win_limit`  int(10) NULL  COMMENT '每人每天中奖次数',
`win_limit`  int(10) NULL  COMMENT '每人总共中奖次数',
`day_winners_count`  int(10) NULL  COMMENT '每天最多中奖人数',
`url`  varchar(300) NULL  COMMENT '关注链接',
`remark`  text NULL  COMMENT '活动说明',
`keyword`  varchar(255) NULL  COMMENT '微信关键词',
`attend_num`  int(10) NULL  COMMENT '参与总人数',
`token`  varchar(255) NULL  COMMENT 'token',
`manager_id`  int(10) NULL  COMMENT '管理员id',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('lottery_games','抽奖游戏','1','["title","keyword","game_type","start_time","end_time","status","day_attend_limit","attend_limit","day_win_limit","win_limit","day_winners_count","remark"]','id:序号\r\ntitle:活动名称\r\ngame_type:游戏类型\r\nkeyword:关键词\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nstatus:活动状态\r\nattend_num:参与人数\r\nwinners_list:中奖人列表\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,preview&games_id=[id]|预览,index&_addons=Draw&_controller=Wap&games_id=[id]|复制链接','10','','MyISAM','Draw','0ffb2d8a42e01c0d3b549ff6da0f0ba5');



CREATE TABLE IF NOT EXISTS `wp_lottery_games_award_link` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`award_id`  int(10) NULL  COMMENT '奖品id',
`games_id`  int(10) NULL  COMMENT '抽奖游戏id',
`grade`  varchar(255) NULL  COMMENT '中奖等级',
`num`  int(10) NULL  COMMENT '奖品数量',
`max_count`  int(10) NULL  COMMENT '最多抽奖',
`token`  varchar(255) NULL  COMMENT 'token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`need_pk`,`field_sort`,`list_grid`,`list_row`,`search_key`,`engine_type`,`addon`,`file_md5`) VALUES ('lottery_games_award_link','抽奖游戏奖品设置','1','','','10','','MyISAM','Draw','4347342dc5ae1cfef1495c1091fb1329');



