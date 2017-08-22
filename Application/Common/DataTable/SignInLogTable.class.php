<?php
/**
 * SignInLog数据模型
 */
class SignInLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'SignIn_Log',
			'title' => '签到记录',
			'search_key' => 'uid',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'uid' => [
					'title' => '用户ID',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'nickname' => [
					'title' => '呢称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'sTime' => [
					'title' => '签到时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'score' => [
					'title' => '积分',
					'function' => '',
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
			'score' => [
					'title' => '积分',
					'field' => 'int(10) NOT NULL',
					'type' => 'num',
					'is_show' => 1,
					'is_must' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'sTime' => [
					'title' => '签到时间',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'datetime',
					'is_must' => 1,
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'uid' => [
					'title' => '用户ID',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'is_must' => 1
			]
	];
}	