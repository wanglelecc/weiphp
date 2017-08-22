<?php
/**
 * ArticleStyleGroup数据模型
 */
class ArticleStyleGroupTable {
	// 数据表模型配置
	public $config = [
			'name' => 'article_style_group',
			'title' => '图文样式分组',
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
			'group_name' => [
					'title' => '分组名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'desc' => [
					'title' => '说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			]
	];
}	