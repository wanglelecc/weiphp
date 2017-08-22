<?php
/**
 * CardMarketing数据模型
 */
class CardMarketingTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_marketing',
			'title' => '会员营销活动',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
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
			'title' => [
					'title' => '活动名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'start_time' => [
					'title' => '开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'is_must' => 1
			],
			'end_time' => [
					'title' => '结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'is_must' => 1
			],
			'status' => [
					'title' => '状态',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:关闭
1:开启'
			],
			'type' => [
					'title' => '活动类型',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'is_show' => 1,
					'extra' => '1:开卡即送
2:积分兑换
3:充值赠送
4:消费赠送'
			],
			'give_type' => [
					'title' => '赠送类型',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'is_show' => 1,
					'extra' => '1:积分
2:优惠券
3:现金'
			],
			'give' => [
					'title' => '赠送数据',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'condition' => [
					'title' => '赠送条件',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'branch_id' => [
					'title' => '充值门店',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'grade' => [
					'title' => '适用人群',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'exchange_count' => [
					'title' => '兑换次数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'open_give_rule' => [
					'title' => '启用赠送规则',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1
			],
			'enjoy_power' => [
					'title' => '消费享受权限',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:不限
1:使用券消费的用户不享受'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			]
	];
}	