<?php
/**
 * ArticleStyle数据模型
 */
class ArticleStyleTable {
	// 数据表模型配置
	public $config = [
			'name' => 'article_style',
			'title' => '图文样式',
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
			'group_id' => [
					'title' => '分组样式',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'style' => [
					'title' => '样式内容',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '请填写html',
					'is_show' => 1
			]
	];
}	