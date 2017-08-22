<?php
/**
 * WishCardContent数据模型
 */
class WishCardContentTable {
	// 数据表模型配置
	public $config = [
			'name' => 'wish_card_content',
			'title' => '祝福语',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'content_cate_id' => [
					'title' => '类别Id',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'content_cate' => [
					'title' => '类别',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'content' => [
					'title' => '祝福语',
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
			'content_cate_id' => [
					'title' => '祝福语类别Id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 4,
					'is_must' => 1
			],
			'content' => [
					'title' => '祝福语',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'is_must' => 1
			],
			'content_cate' => [
					'title' => '类别',
					'field' => 'varchar(255) NULL',
					'type' => 'select',
					'is_show' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			]
	];
}	