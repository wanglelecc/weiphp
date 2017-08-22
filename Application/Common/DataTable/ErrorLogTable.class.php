<?php
/**
 * ErrorLog数据模型
 */
class ErrorLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'error_log',
			'title' => '错误日志',
			'search_key' => '',
			'add_button' => '',
			'del_button' => '',
			'search_button' => '',
			'check_all' => '',
			'list_row' => '',
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [ ];
	
	// 字段定义
	public $fields = [
			'urls' => [
					'title' => '下载地址',
					'type' => 'textarea',
					'field' => 'text NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'os' => [
					'title' => '操作系统',
					'type' => 'string',
					'field' => 'varchar(30) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'php' => [
					'title' => 'PHP版本号',
					'type' => 'string',
					'field' => 'varchar(30) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'mysql' => [
					'title' => 'MYSQL版本号',
					'type' => 'string',
					'field' => 'varchar(50) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'web' => [
					'title' => 'WEB信息',
					'type' => 'string',
					'field' => 'varchar(50) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'sapi' => [
					'title' => 'PHP信息',
					'type' => 'string',
					'field' => 'varchar(30) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'port' => [
					'title' => '端口号',
					'type' => 'num',
					'field' => 'int(4) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'key' => [
					'title' => '网站唯一标识',
					'type' => 'string',
					'field' => 'varchar(100) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '记录时间',
					'type' => 'num',
					'field' => 'int(10) NULL',
					'is_show' => 1,
					'is_must' => 0,
					'auto_type' => 'function',
					'auto_rule' => 'time',
					'auto_time' => 1
			]
	];
}	