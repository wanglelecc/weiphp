<?php
/**
 * CardScore数据模型
 */
class CardScoreTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_score',
			'title' => '积分兑换活动',
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
			'coupon_id' => [
					'title' => '兑换内容',
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
			'member' => [
					'title' => '适用人群',
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
			'num_limit' => [
					'title' => '兑换次数限制',
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
			'score_limit' => [
					'title' => '所需积分',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
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
			'member' => [
					'title' => '适用人群',
					'field' => 'varchar(100) NULL',
					'type' => 'checkbox',
					'is_show' => 1,
					'extra' => '0:所有用户
-1:所有会员卡成员'
			],
			'coupon_type' => [
					'title' => '优惠券类型',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'extra' => '0:代金券
1:优惠券'
			],
			'cover_id' => [
					'title' => '活动图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			]
	];
}	