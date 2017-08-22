<?php
/**
 * WeisiteSlideshow数据模型
 */
class WeisiteSlideshowTable {
	// 数据表模型配置
	public $config = [
			'name' => 'weisite_slideshow',
			'title' => '幻灯片',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '标题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'img' => [
					'title' => '图片',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'url' => [
					'title' => '链接地址',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'is_show' => [
					'title' => '显示',
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
			'ids' => [
					'title' => '操作',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [
							'0' => [
									'title' => '编辑',
									'url' => '[EDIT]&module_id=[pid]'
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
			'title' => [
					'title' => '标题',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '可为空',
					'is_show' => 1
			],
			'img' => [
					'title' => '图片',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'picture',
					'is_show' => 1,
					'is_must' => 1
			],
			'url' => [
					'title' => '链接地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'is_show' => [
					'title' => '是否显示',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'is_show' => 1,
					'extra' => '0:不显示
1:显示'
			],
			'sort' => [
					'title' => '排序',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '值越小越靠前',
					'is_show' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'cate_id' => [
					'title' => '所属目录',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'value' => 0
			]
	];
}	