<?php
/**
 * CardRechargeCondition数据模型
 */
class CardRechargeConditionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_recharge_condition',
			'title' => '充值赠送条件',
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
			'money_param' => [
					'title' => '现金参数',
					'field' => 'decimal(11,2) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'money' => [
					'title' => '现在开关',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'extra' => '0:关
1:开'
			],
			'reward_id' => [
					'title' => '活动ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			],
			'condition' => [
					'title' => '条件',
					'field' => 'decimal(11,2) NULL',
					'type' => 'num',
					'remark' => '满多少元',
					'is_show' => 1,
					'is_must' => 1
			],
			'score' => [
					'title' => '积分开关',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:关
1:开'
			],
			'score_param' => [
					'title' => '积分参数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'shop_coupon' => [
					'title' => '优惠券开关',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:关
1:开'
			],
			'shop_coupon_param' => [
					'title' => '优惠券ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			]
	];
}	