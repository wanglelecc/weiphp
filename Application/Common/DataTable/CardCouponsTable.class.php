<?php
/**
 * CardCoupons数据模型
 */
class CardCouponsTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_coupons',
			'title' => '会员卡优惠券',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
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
			'give_type' => [
					'title' => '发放方式',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'start_date' => [
					'title' => '开始时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'end_date' => [
					'title' => '结束时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '发布时间',
					'function' => 'time_format',
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
			'give_type' => [
					'title' => '发放方式',
					'field' => 'tinyint(2) NOT NULL',
					'type' => 'bool',
					'value' => 0,
					'remark' => '人工发放是指管理员要会员管理列表手工进行发放',
					'extra' => '0:自动发放
1:人工发放',
					'is_must' => 1
			],
			'title' => [
					'title' => '优惠券标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'end_date' => [
					'title' => '结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'start_date' => [
					'title' => '开始时间',
					'field' => 'int(10) NOT NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'is_must' => 1
			],
			'content' => [
					'title' => '使用说明',
					'field' => 'text NOT NULL',
					'type' => 'editor',
					'is_show' => 1,
					'is_must' => 1
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			]
	];
}	