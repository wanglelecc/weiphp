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
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'level' => [
					'title' => '会员等级',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'score' => [
					'title' => '累计积分',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'recharge' => [
					'title' => '累计充值',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'discount' => [
					'title' => '享受折扣',
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