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
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'vote_id' => [
					'title' => '用户头像',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'user_id' => [
					'title' => '用户',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'options' => [
					'title' => '投票选项',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '创建时间',
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
			'vote_id' => [
					'title' => '投票ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 1,
					'is_must' => 1
			],
			'user_id' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'is_must' => 1
			],
			'token' => [
					'title' => '用户TOKEN',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_must' => 1
			],
			'options' => [
					'title' => '选择选项',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'cTime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			]
	];
}	