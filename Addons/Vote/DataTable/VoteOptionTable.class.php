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
			'list_row' => 20,
			'addon' => 'Vote'
	];
	
	// 列表定义
	public $list_grid = [
			'image' => [
					'title' => '选项图片',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'image',
					'function' => '',
					'href' => [ ]
			],
			'name' => [
					'title' => '选项标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'name',
					'function' => '',
					'href' => [ ]
			],
			'opt_count' => [
					'title' => '投票数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'opt_count',
					'function' => '',
					'href' => [ ]
			]
	];
	
	// 字段定义
	public $fields = [
			'vote_id' => [
					'title' => '投票ID',
					'type' => 'num',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 4,
					'is_must' => 0,
					'auto_type' => 'string',
					'auto_rule' => '$_REQUEST[\'vote_id\']',
					'auto_time' => 3
			],
			'name' => [
					'title' => '选项标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'image' => [
					'title' => '图片选项',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 5,
					'placeholder' => '请输入内容'
			],
			'opt_count' => [
					'title' => '当前选项投票数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'order' => [
					'title' => '选项排序',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	