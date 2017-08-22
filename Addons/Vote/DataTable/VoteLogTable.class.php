<?php
/**
 * VoteLog数据模型
 */
class VoteLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'vote_log',
			'title' => '投票记录',
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
			'vote_id' => [
					'title' => '用户头像',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'user_id' => [
					'title' => '用户',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'options' => [
					'title' => '投票选项',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cTime' => [
					'title' => '创建时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'vote_id' => [
					'title' => '投票ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'user_id' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'token' => [
					'title' => '用户TOKEN',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'options' => [
					'title' => '选择选项',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'cTime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			]
	];
}	