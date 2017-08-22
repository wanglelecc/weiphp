<?php
/**
 * WeibaCategory数据模型
 */
class WeibaCategoryTable {
	// 数据表模型配置
	public $config = [
			'name' => 'weiba_category',
			'title' => '微吧分类',
			'search_key' => 'name:请输入分类名称搜索',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '分类编号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'name' => [
					'title' => '分类名称',
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
					'field' => 'int(11) NOT NULL',
					'type' => 'string',
					'is_must' => 1
			],
			'name' => [
					'title' => '分类名称',
					'field' => 'varchar(255) NULL',
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