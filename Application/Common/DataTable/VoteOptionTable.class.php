<?php
/**
 * VoteOption数据模型
 */
class VoteOptionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'vote_option',
			'title' => '投票选项',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'image' => [
					'title' => '选项图片',
					'function' => 'get_img_html',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'name' => [
					'title' => '选项标题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'opt_count' => [
					'title' => '投票数',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			]
	];
	
	// 字段定义
	public $fields = [
			'id' => [
					'title' => '主键',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'string',
					'is_must' => 1
			],
			'vote_id' => [
					'title' => '投票ID',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'is_show' => 4,
					'is_must' => 1,
					'auto_rule' => '$_REQUEST['vote_id']',
					'auto_time' => 3,
					'auto_type' => 'string'
			],
			'name' => [
					'title' => '选项标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'image' => [
					'title' => '图片选项',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 5
			],
			'opt_count' => [
					'title' => '当前选项投票数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			],
			'order' => [
					'title' => '选项排序',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			]
	];
}	