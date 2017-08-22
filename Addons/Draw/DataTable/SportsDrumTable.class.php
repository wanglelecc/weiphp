<?php
/**
 * SportsDrum数据模型
 */
class SportsDrumTable {
	// 数据表模型配置
	public $config = [
			'name' => 'sports_drum',
			'title' => '擂鼓记录',
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
			'sports_id' => [
					'title' => '场次ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'team_id' => [
					'title' => '球队ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'follow_id' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'drum_count' => [
					'title' => '擂鼓次数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'cTime' => [
					'title' => '时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			]
	];
}	