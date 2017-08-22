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
			'list_row' => 10,
			'addon' => 'Card'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'title',
					'function' => '',
					'href' => [ ]
			],
			'give_type' => [
					'title' => '发放方式',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'give_type',
					'function' => '',
					'href' => [ ]
			],
			'start_date' => [
					'title' => '开始时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'start_date',
					'function' => '',
					'href' => [ ]
			],
			'end_date' => [
					'title' => '结束时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'end_date',
					'function' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '发布时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'cTime',
					'function' => '',
					'href' => [ ]
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
					],
					'name' => 'urls',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'give_type' => [
					'title' => '发放方式',
					'type' => 'bool',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:自动发放
1:人工发放',
					'remark' => '人工发放是指管理员要会员管理列表手工进行发放',
					'placeholder' => '请输入内容'
			],
			'title' => [
					'title' => '优惠券标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'end_date' => [
					'title' => '结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'start_date' => [
					'title' => '开始时间',
					'field' => 'int(10) NOT NULL',
					'type' => 'datetime',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'content' => [
					'title' => '使用说明',
					'field' => 'text NOT NULL',
					'type' => 'editor',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'type' => 'string',
					'field' => 'varchar(100) NULL',
					'is_show' => 0,
					'is_must' => 0,
					'auto_type' => 'function',
					'auto_rule' => 'get_token',
					'auto_time' => 1
			]
	];
}	