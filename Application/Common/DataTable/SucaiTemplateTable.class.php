<?php
/**
 * SucaiTemplate数据模型
 */
class SucaiTemplateTable {
	// 数据表模型配置
	public $config = [
			'name' => 'sucai_template',
			'title' => '素材模板库',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'uid' => [
					'title' => '管理员id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'token' => [
					'title' => '用户token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'addons' => [
					'title' => '插件名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'template' => [
					'title' => '模版名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			]
	];
}	