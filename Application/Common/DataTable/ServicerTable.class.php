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
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'truename' => [
					'title' => '姓名',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'role' => [
					'title' => '权限列表',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'nickname' => [
					'title' => '微信名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'enable' => [
					'title' => '是否启用',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'ids' => [
					'title' => '操作',
					'function' => '',
					'width' => '',
					'sort' => '',
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
					]
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
			'uid' => [
					'title' => '用户选择',
					'field' => 'int(10) NULL',
					'type' => 'user',
					'is_show' => 1,
					'is_must' => 1
			],
			'truename' => [
					'title' => '真实姓名',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'mobile' => [
					'title' => '手机号',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'role' => [
					'title' => '授权列表',
					'field' => 'varchar(100) NULL',
					'type' => 'checkbox',
					'value' => 0,
					'is_show' => 1,
					'extra' => '1:微信客服
2:扫码验证
3:微订单接单',
					'is_must' => 1
			],
			'enable' => [
					'title' => '是否启用',
					'field' => 'int(10) NULL',
					'type' => 'radio',
					'value' => 1,
					'is_show' => 1,
					'extra' => '0:禁用
1:启用'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			]
	];
}	