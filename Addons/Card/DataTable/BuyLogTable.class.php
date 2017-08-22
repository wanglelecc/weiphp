<?php
/**
 * BuyLog数据模型
 */
class BuyLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'buy_log',
			'title' => '会员消费记录',
			'search_key' => 'member:请输入会员名称或手机号',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Card'
	];
	
	// 列表定义
	public $list_grid = [
			'member_id' => [
					'title' => '会员名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'phone' => [
					'title' => '电话',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cTime' => [
					'title' => '消费时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'branch_id' => [
					'title' => '消费门店',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'pay' => [
					'title' => '消费金额',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'sn_id' => [
					'title' => '优惠金额',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'pay_type' => [
					'title' => '消费方式',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'pay' => [
					'title' => '消费金额',
					'field' => 'float NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'sn_id' => [
					'title' => '优惠卷',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'pay_type' => [
					'title' => '支付方式',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'is_show' => 1,
					'extra' => '1:会员卡余额消费
2:现金或POS机消费'
			],
			'branch_id' => [
					'title' => '消费门店',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'member_id' => [
					'title' => '会员卡id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4
			],
			'cTime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'manager_id' => [
					'title' => '管理员ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			]
	];
}	