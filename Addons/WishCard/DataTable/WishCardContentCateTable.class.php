<?php
/**
 * WishCardContentCate数据模型
 */
class WishCardContentCateTable {
	// 数据表模型配置
	public $config = [
			'name' => 'wish_card_content_cate',
			'title' => '祝福语类别',
			'search_key' => 'content_cate_name:类别',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'WishCard'
	];
	
	// 列表定义
	public $list_grid = [
			'content_cate_name' => [
					'title' => '类别',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'content_cate_icon' => [
					'title' => '图标',
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
			'content_cate_name' => [
					'title' => '祝福语类别',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'content_cate_icon' => [
					'title' => '类别图标',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			]
	];
}	