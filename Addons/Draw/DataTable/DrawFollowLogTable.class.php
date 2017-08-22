<?php
/**
 * DrawFollowLog数据模型
 */
class DrawFollowLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'draw_follow_log',
			'title' => '粉丝抽奖记录',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Draw'
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'follow_id' => [
					'title' => '粉丝id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'sports_id' => [
					'title' => '场次id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'count' => [
					'title' => '抽奖次数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'cTime' => [
					'title' => '支持时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'uid' => [
					'title' => 'uid',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			]
	];
}	