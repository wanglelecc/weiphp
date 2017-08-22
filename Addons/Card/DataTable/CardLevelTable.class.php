<?php
/**
 * CardLevel数据模型
 */
class CardLevelTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_level',
			'title' => '会员等级',
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
			'level' => [
					'title' => '会员等级',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'score' => [
					'title' => '累计积分',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'recharge' => [
					'title' => '累计充值',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'discount' => [
					'title' => '享受折扣',
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
			'level' => [
					'title' => '会员等级',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'score' => [
					'title' => '累计积分',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'recharge' => [
					'title' => '累计充值',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'discount' => [
					'title' => '折扣率',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '例如10代表优惠10%，即打9折',
					'is_show' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			]
	];
}	