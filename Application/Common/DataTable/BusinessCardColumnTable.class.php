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
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'type' => [
					'title' => '栏目类型',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cate_id' => [
					'title' => '分类名',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'title' => [
					'title' => '标题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'url' => [
					'title' => 'url',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'sort' => [
					'title' => '排序',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'urls' => [
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
			'type' => [
					'title' => '栏目类型',
					'field' => 'char(10) NULL',
					'type' => 'select',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:自定义|cate_id@hide,title@show,url@show
1:文章分类|cate_id@show,title@hide,url@hide'
			],
			'cate_id' => [
					'title' => '分类',
					'field' => 'varchar(100) NULL',
					'type' => 'dynamic_select',
					'value' => 0,
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
					'value' => 0,
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