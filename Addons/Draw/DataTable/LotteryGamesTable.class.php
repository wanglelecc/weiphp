<?php
/**
 * LotteryGames数据模型
 */
class LotteryGamesTable {
	// 数据表模型配置
	public $config = [
			'name' => 'lottery_games',
			'title' => '抽奖游戏',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Draw'
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '序号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '活动名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'game_type' => [
					'title' => '游戏类型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'keyword' => [
					'title' => '关键词',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'start_time' => [
					'title' => '开始时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'end_time' => [
					'title' => '结束时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'status' => [
					'title' => '活动状态',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'attend_num' => [
					'title' => '参与人数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'winners_list' => [
					'title' => '中奖人列表',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'1' => [
									'title' => '删除',
									'url' => '[DELETE]'
							],
							'2' => [
									'title' => '预览',
									'url' => 'preview&games_id=[id]'
							],
							'3' => [
									'title' => '复制链接',
									'url' => 'Draw/Wap/index&games_id=[id]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'title' => [
					'title' => '活动名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'game_type' => [
					'title' => '游戏类型',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'value' => 1,
					'is_show' => 1,
					'extra' => '1:刮刮乐
2:大转盘
3:砸金蛋
4:九宫格'
			],
			'status' => [
					'title' => '状态',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'value' => 1,
					'is_show' => 1,
					'extra' => '1:开启
0:禁用'
			],
			'start_time' => [
					'title' => '开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'end_time' => [
					'title' => '结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'day_attend_limit' => [
					'title' => '每人每天抽奖次数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '0，则不限制，超过此限制点击抽奖，系统会提示“您今天的抽奖次数已经用完!”',
					'is_show' => 1
			],
			'attend_limit' => [
					'title' => '每人总共抽奖次数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '0，则不限制；否则必须>=每人每天抽奖次数，超过此限制点击抽奖，系统会提示“您的所有抽奖次数已用完!”',
					'is_show' => 1
			],
			'day_win_limit' => [
					'title' => '每人每天中奖次数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '0，则不限制，超过此限制点击抽奖，抽奖者将无概率中奖',
					'is_show' => 1
			],
			'win_limit' => [
					'title' => '每人总共中奖次数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '0，则不限制；否则必须>=每人每天中奖次数，超过此限制点击抽奖，抽奖者将无概率中奖',
					'is_show' => 1
			],
			'day_winners_count' => [
					'title' => '每天最多中奖人数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '0，则不限制，超过此限制时，系统会提示“今天奖品已抽完，明天再来吧!”',
					'is_show' => 1
			],
			'url' => [
					'title' => '关注链接',
					'field' => 'varchar(300) NULL',
					'type' => 'string'
			],
			'remark' => [
					'title' => '活动说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'keyword' => [
					'title' => '微信关键词',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'attend_num' => [
					'title' => '参与总人数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'manager_id' => [
					'title' => '管理员id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			]
	];
}	