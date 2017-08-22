<?php
/**
 * UserTag数据模型
 */
class UserTagTable {
	// 数据表模型配置
	public $config = [
			'name' => 'user_tag',
			'title' => '用户标签',
			'search_key' => 'title:请输入标签名称搜索',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '标签编号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'title' => [
					'title' => '标签名称',
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
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'1' => [
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
			'title' => [
					'title' => '标签名称',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			]
	];
}	