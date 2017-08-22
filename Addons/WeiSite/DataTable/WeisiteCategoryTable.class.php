<?php
/**
 * WeisiteCategory数据模型
 */
class WeisiteCategoryTable {
	// 数据表模型配置
	public $config = [
			'name' => 'weisite_category',
			'title' => '微官网分类',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'WeiSite'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '分类标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'icon' => [
					'title' => '分类图片',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'url' => [
					'title' => '外链',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'sort' => [
					'title' => '排序号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'pid' => [
					'title' => '一级目录',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'is_show' => [
					'title' => '显示',
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
			'title' => [
					'title' => '分类标题',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'icon' => [
					'title' => '分类图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'url' => [
					'title' => '外链',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '为空时默认跳转到该分类的文章列表页面',
					'is_show' => 1
			],
			'is_show' => [
					'title' => '显示',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'is_show' => 1,
					'extra' => '0:不显示
1:显示'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '数值越小越靠前',
					'is_show' => 1
			],
			'pid' => [
					'title' => '一级目录',
					'field' => 'int(10) NULL',
					'type' => 'cascade',
					'is_show' => 1,
					'extra' => 'type=db&table=weisite_category&pid=id'
			],
			'template' => [
					'title' => '二级模板',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			]
	];
}	