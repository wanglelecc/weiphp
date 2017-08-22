<?php
/**
 * Cms数据模型
 */
class CmsTable {
	// 数据表模型配置
	public $config = [
			'name' => 'cms',
			'title' => '小程序CMS',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Cms'
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => 'ID主键',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 1
			],
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 1
			],
			'img' => [
					'title' => '封面图',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 1
			],
			'cTime' => [
					'title' => '发布时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 1
			],
			'urls' => [
					'title' => '标题',
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
			'title' => [
					'title' => '标题',
					'type' => 'string',
					'field' => 'varchar(255) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'img' => [
					'title' => '封面图',
					'type' => 'picture',
					'field' => 'int(10) UNSIGNED NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'content' => [
					'title' => '正文内容',
					'type' => 'textarea',
					'field' => 'text NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '发布时间',
					'type' => 'datetime',
					'field' => 'int(10) NULL',
					'auto_type' => 'function',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	