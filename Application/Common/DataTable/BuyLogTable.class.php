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
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'member_id' => [
					'title' => '会员名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'phone' => [
					'title' => '电话',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '消费时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'branch_id' => [
					'title' => '消费门店',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'pay' => [
					'title' => '消费金额',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'sn_id' => [
					'title' => '优惠金额',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'pay_type' => [
					'title' => '消费方式',
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
			'pay' => [
					'title' => '消费金额',
					'field' => 'float NULL',
					'type' => 'num',
					'is_show' => 1,
					'is_must' => 1
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
2:现金或POS机消费',
					'is_must' => 1
			],
			'branch_id' => [
					'title' => '消费门店',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
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