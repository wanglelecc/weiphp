<?php
/**
 * CommonCategoryGroup数据模型
 */
class CommonCategoryGroupTable {
	// 数据表模型配置
	public $config = [
			'name' => 'common_category_group',
			'title' => '通用分类分组',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'name' => [
					'title' => '分组标识',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '分组标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '数据管理',
									'url' => 'cascade?target=_blank&module=[name]'
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
			'name' => [
					'title' => '分组标识',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'remark' => '英文字母或者下划线，长度不超过30',
					'is_show' => 1
			],
			'title' => [
					'title' => '分组标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) unsigned NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'level' => [
					'title' => '最多级数',
					'field' => 'tinyint(1) unsigned NULL',
					'type' => 'select',
					'value' => 3,
					'is_show' => 1,
					'extra' => '1:1级
2:2级
3:3级
4:4级
5:5级
6:6级
7:7级'
			]
	];
}	