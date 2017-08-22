<?php
/**
 * CardPrivilege数据模型
 */
class CardPrivilegeTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_privilege',
			'title' => '会员卡特权',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Card'
	];
	
	// 列表定义
	public $list_grid = [
			'start_time' => [
					'title' => '特权开始时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'end_time' => [
					'title' => '特权结束时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '特权标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'grade' => [
					'title' => '适用人群',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'intro' => [
					'title' => '特权内容',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'enable' => [
					'title' => '是否开启',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'status' => [
					'title' => '状态',
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
					'title' => '特权标题',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'grade' => [
					'title' => '适用人群',
					'field' => 'varchar(100) NULL',
					'type' => 'checkbox',
					'is_show' => 1
			],
			'start_time' => [
					'title' => '开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'end_time' => [
					'title' => '结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'intro' => [
					'title' => '使用说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'enable' => [
					'title' => '是否启用',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'is_show' => 1,
					'extra' => '1:启用
0:禁用'
			]
	];
}	