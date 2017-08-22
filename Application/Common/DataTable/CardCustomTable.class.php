<?php
/**
 * CardCustom数据模型
 */
class CardCustomTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_custom',
			'title' => '客户关怀活动',
			'search_key' => 'title:请输入活动名称搜索',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '节日名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'start_time' => [
					'title' => '节日时间',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'member' => [
					'title' => '目标人群',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'end_time' => [
					'title' => '赠送时间',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'type' => [
					'title' => '赠送内容',
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
			'score' => [
					'title' => '积分数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			],
			'coupon_id' => [
					'title' => '商城优惠券',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'is_show' => [
					'title' => '是否在会员卡界面展示',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:否
1:是'
			],
			'start_time' => [
					'title' => '节日时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'end_time' => [
					'title' => '赠送时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'title' => [
					'title' => '活动名称',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'type' => [
					'title' => '活动策略',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:送积分
1:送优惠券'
			],
			'content' => [
					'title' => '活动说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'member' => [
					'title' => '适用人群',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'is_birthday' => [
					'title' => '节日类型',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:公历节日
1:会员生日'
			],
			'before_day' => [
					'title' => '生日前',
					'field' => 'tinyint(2) NULL',
					'type' => 'num',
					'value' => 1,
					'is_show' => 1
			]
	];
}	