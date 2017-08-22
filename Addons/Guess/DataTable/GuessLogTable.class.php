<?php
/**
 * GuessLog数据模型
 */
class GuessLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'guess_log',
			'title' => '竞猜记录',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Guess'
	];
	
	// 列表定义
	public $list_grid = [
			'optionIds' => [
					'title' => '竞猜选项',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'user_id' => [
					'title' => '用户id',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'user_name' => [
					'title' => '用户昵称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'token' => [
					'title' => '用户token',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cTime' => [
					'title' => '竞猜时间',
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
			'user_id' => [
					'title' => '用户ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num'
			],
			'guess_id' => [
					'title' => '竞猜Id',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num'
			],
			'token' => [
					'title' => '用户token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'optionIds' => [
					'title' => '用户猜的选项IDs',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'cTime' => [
					'title' => '创时间',
					'field' => 'int(10) NULL',
					'type' => 'date'
			]
	];
}	