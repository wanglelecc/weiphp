<?php
/**
 * CardReward数据模型
 */
class CardRewardTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_reward',
			'title' => '开卡即送活动',
			'search_key' => 'title:请输入活动名称搜索',
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
					'title' => '活动名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'type' => [
					'title' => '活动策略',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'start_time' => [
					'title' => '有效期',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'status' => [
					'title' => '活动状态',
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
			'manager_id' => [
					'title' => '管理员ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'cTime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'start_time' => [
					'title' => '开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'end_time' => [
					'title' => '过期时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'title' => [
					'title' => '活动名称',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'type' => [
					'title' => '活动策略',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:送积分
1:送优惠券'
			],
			'score' => [
					'title' => '积分数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'coupon_id' => [
					'title' => '商城优惠券',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'is_show' => [
					'title' => '是否在用户领卡界面展示',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:否
1:是'
			],
			'content' => [
					'title' => '活动说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			]
	];
}	