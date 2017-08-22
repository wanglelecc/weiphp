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
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'optionIds' => [
					'title' => '竞猜选项',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'user_id' => [
					'title' => '用户id',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'user_name' => [
					'title' => '用户昵称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'token' => [
					'title' => '用户token',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '竞猜时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'' => [
					'title' => '',
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
			'user_id' => [
					'title' => '用户ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0
			],
			'guess_id' => [
					'title' => '竞猜Id',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0
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