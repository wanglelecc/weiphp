<?php
/**
 * RequestLog数据模型
 */
class RequestLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'request_log',
			'title' => '接口日志',
			'search_key' => 'url',
			'add_button' => 0,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'cTime' => [
					'title' => '记录时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'url' => [
					'title' => '接口地址',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'error_code' => [
					'title' => 'curl的错误码',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'msg' => [
					'title' => 'curl的错误提示',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'res' => [
					'title' => '接口返回的参数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'md5' => [
					'title' => 'md5标识',
					'type' => 'string',
					'field' => 'char(32) NOT NULL',
					'remark' => '用于外部功能查找日志',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'url' => [
					'title' => '接口地址',
					'type' => 'string',
					'field' => 'varchar(255) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'param' => [
					'title' => '序列化后的参数',
					'type' => 'textarea',
					'field' => 'text NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'res' => [
					'title' => '接口返回的参数',
					'type' => 'textarea',
					'field' => 'text NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'error_code' => [
					'title' => 'curl的错误码',
					'type' => 'string',
					'field' => 'char(32) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'msg' => [
					'title' => 'curl的错误提示',
					'type' => 'string',
					'field' => 'varchar(255) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'server_ip' => [
					'title' => '服务器IP地址',
					'type' => 'string',
					'field' => 'varchar(30) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '记录时间',
					'type' => 'datetime',
					'field' => 'int(10) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	