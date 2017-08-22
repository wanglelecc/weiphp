<?php
/**
 * BusinessCardColumn数据模型
 */
class BusinessCardColumnTable {
	// 数据表模型配置
	public $config = [
			'name' => 'business_card_column',
			'title' => '名片栏目',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'BusinessCard'
	];
	
	// 列表定义
	public $list_grid = [
			'type' => [
					'title' => '栏目类型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cate_id' => [
					'title' => '分类名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'url' => [
					'title' => 'url',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'sort' => [
					'title' => '排序',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'urls' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
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
			'type' => [
					'title' => '栏目类型',
					'field' => 'char(10) NULL',
					'type' => 'select',
					'is_show' => 1,
					'extra' => '0:自定义|cate_id@hide,title@show,url@show
1:文章分类|cate_id@show,title@hide,url@hide'
			],
			'cate_id' => [
					'title' => '分类',
					'field' => 'varchar(100) NULL',
					'type' => 'dynamic_select',
					'is_show' => 1,
					'extra' => 'table=we_media_category&value_field=id'
			],
			'title' => [
					'title' => '栏目名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'url' => [
					'title' => '跳转url',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'sort' => [
					'title' => '排序',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'business_card_id' => [
					'title' => '名片id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4
			],
			'uid' => [
					'title' => '用户id',
					'field' => 'int(10) NULL',
					'type' => 'num'
			]
	];
}	