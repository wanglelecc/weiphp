<?php
/**
 * Api数据模型
 */
class ApiTable {
	// 数据表模型配置
	public $config = [
			'name' => 'api',
			'title' => 'api应用',
			'search_key' => 'title:搜索接口名称',
			'add_button' => 1,
			'del_button' => 0,
			'search_button' => 1,
			'check_all' => 0,
			'list_row' => 20,
			'addon' => 'Api'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '接口名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 1
			],
			'url' => [
					'title' => '接口地址',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'method' => [
					'title' => '请求类型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 1
			],
			'mod' => [
					'title' => '所属模型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'urls' => [
					'title' => '管理操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => 'API说明',
									'url' => 'doc?id=[id]'
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
			'title' => [
					'title' => '接口名称',
					'type' => 'string',
					'field' => 'varchar(100) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'mod' => [
					'title' => '所属模型',
					'type' => 'dynamic_select',
					'field' => 'varchar(100) NULL',
					'extra' => 'table=model&value_field=name&title_field=title',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'url' => [
					'title' => '接口地址',
					'type' => 'string',
					'field' => 'varchar(100) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'method' => [
					'title' => '请求类型',
					'type' => 'radio',
					'field' => 'char(50) NULL',
					'extra' => 'POST
GET',
					'value' => 'POST',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'return_type' => [
					'title' => '返回值格式',
					'type' => 'radio',
					'field' => 'char(50) NULL',
					'extra' => 'JSON
XML',
					'value' => 'JSON',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'type' => [
					'title' => '接口类型',
					'type' => 'radio',
					'field' => 'char(50) NULL',
					'extra' => 'select:查询
add:增加
del:删除
update:更新',
					'value' => 'select',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'request_count' => [
					'title' => '请求次数',
					'type' => 'num',
					'field' => 'int(10) NULL',
					'placeholder' => '请输入内容'
			],
			'page' => [
					'title' => '是否有分页',
					'type' => 'bool',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:无
1:有',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	