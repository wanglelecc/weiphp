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
			'list_row' => 10,
			'addon' => 'SingIn'
	];
	
	// 列表定义
	public $list_grid = [
			'uid' => [
					'title' => '用户ID',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'uid',
					'function' => '',
					'href' => [ ]
			],
			'nickname' => [
					'title' => '呢称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'nickname',
					'function' => '',
					'href' => [ ]
			],
			'sTime' => [
					'title' => '签到时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'sTime',
					'function' => '',
					'href' => [ ]
			],
			'score' => [
					'title' => '积分',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'score',
					'function' => '',
					'href' => [ ]
			],
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => '',
					'function' => '',
					'href' => [ ]
			]
	];
	
	// 字段定义
	public $fields = [
			'score' => [
					'title' => '积分',
					'field' => 'int(10) NOT NULL',
					'type' => 'num',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'type' => 'string',
					'field' => 'varchar(255) NULL',
					'auto_type' => 'function',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			],
			'sTime' => [
					'title' => '签到时间',
					'type' => 'datetime',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 0,
					'is_must' => 0,
					'auto_type' => 'function',
					'auto_rule' => 'time',
					'auto_time' => 1
			],
			'uid' => [
					'title' => '用户ID',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'textarea',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	