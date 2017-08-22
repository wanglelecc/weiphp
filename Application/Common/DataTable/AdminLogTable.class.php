<?php
/**
 * AdminLog数据模型
 */
class AdminLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'admin_log',
			'title' => '管理日志表',
			'search_key' => '',
			'add_button' => 0,
			'del_button' => 0,
			'search_button' => 0,
			'check_all' => 0,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'uid' => [
					'title' => '管理员',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'uid',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'ip' => [
					'title' => 'IP地址',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'ip',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'content' => [
					'title' => '日志内容',
					'come_from' => 0,
					'width' => 100,
					'is_sort' => 0,
					'name' => 'content',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'mod' => [
					'title' => '应用名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'mod',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '记录时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'cTime',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			]
	];
	
	// 字段定义
	public $fields = [
			'uid' => [
					'title' => '用户ID',
					'type' => 'user',
					'field' => 'int(10) NULL',
					'is_show' => 1,
					'is_must' => 0
			],
			'ip' => [
					'title' => '用户IP地址',
					'type' => 'string',
					'field' => 'varchar(30) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'content' => [
					'title' => '日志内容',
					'type' => 'string',
					'field' => 'text NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'mod' => [
					'title' => '应用名',
					'type' => 'string',
					'field' => 'varchar(50) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '记录时间',
					'type' => 'datetime',
					'field' => 'int(10) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	