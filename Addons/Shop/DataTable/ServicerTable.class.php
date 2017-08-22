<?php
/**
 * Servicer数据模型
 */
class ServicerTable {
	// 数据表模型配置
	public $config = [
			'name' => 'servicer',
			'title' => '授权用户',
			'search_key' => 'truename',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Shop'
	];
	
	// 列表定义
	public $list_grid = [
			'truename' => [
					'title' => '姓名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'truename',
					'function' => '',
					'href' => [ ]
			],
			'role' => [
					'title' => '权限列表',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'role',
					'function' => '',
					'href' => [ ]
			],
			'nickname' => [
					'title' => '微信名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'nickname',
					'function' => '',
					'href' => [ ]
			],
			'enable' => [
					'title' => '是否启用',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'enable',
					'function' => '',
					'href' => [ ]
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '改变启用状态',
									'url' => 'set_enable?id=[id]&enable=[enable]'
							],
							'1' => [
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'2' => [
									'title' => '删除',
									'url' => '[DELETE]'
							]
					],
					'name' => 'ids',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'uid' => [
					'title' => '用户选择',
					'type' => 'user',
					'field' => 'int(10) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'truename' => [
					'title' => '真实姓名',
					'type' => 'string',
					'field' => 'varchar(255) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'mobile' => [
					'title' => '手机号',
					'type' => 'string',
					'field' => 'varchar(255) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'validate_type' => 'regex',
					'validate_rule' => '/^\\d{11}$/',
					'validate_time' => 3
			],
			'role' => [
					'title' => '授权列表',
					'type' => 'checkbox',
					'field' => 'varchar(100) NULL',
					'extra' => '2:扫码验证',
					'value' => 2,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'enable' => [
					'title' => '是否启用',
					'field' => 'int(10) NULL',
					'type' => 'radio',
					'value' => 1,
					'is_show' => 1,
					'extra' => '0:禁用
1:启用',
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			]
	];
}	