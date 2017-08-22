<?php
/**
 * ApiAccessToken数据模型
 */
class ApiAccessTokenTable {
	// 数据表模型配置
	public $config = [
			'name' => 'api_access_token',
			'title' => 'API ACCESS TOKEN',
			'search_key' => '',
			'add_button' => '',
			'del_button' => '',
			'search_button' => '',
			'check_all' => '',
			'list_row' => '',
			'addon' => 'Api'
	];
	
	// 列表定义
	public $list_grid = [ ];
	
	// 字段定义
	public $fields = [
			'appid' => [
					'title' => 'appid',
					'type' => 'string',
					'field' => 'varchar(32) NULL',
					'placeholder' => '请输入内容'
			],
			'secret' => [
					'title' => 'secret',
					'type' => 'string',
					'field' => 'varchar(50) NULL',
					'placeholder' => '请输入内容'
			],
			'access_token' => [
					'title' => 'access_token',
					'type' => 'string',
					'field' => 'varchar(100) NULL',
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '创建时间',
					'type' => 'datetime',
					'field' => 'int(10) NULL',
					'is_show' => 0,
					'is_must' => 0
			]
	];
}	