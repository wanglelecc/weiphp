<?php
/**
 * RechargeLog数据模型
 */
class RechargeLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'recharge_log',
			'title' => '会员充值记录',
			'search_key' => 'operator:请输入姓名或手机号或操作员',
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
					'title' => '会员卡号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'truename' => [
					'title' => '姓名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'phone' => [
					'title' => '手机号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'recharge' => [
					'title' => '充值金额',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cTime' => [
					'title' => '充值时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'branch_id' => [
					'title' => '充值门店',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'operator' => [
					'title' => '操作员',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'recharge' => [
					'title' => '充值金额',
					'field' => 'float NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'branch_id' => [
					'title' => '充值门店',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'operator' => [
					'title' => '操作员',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
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
			'member_id' => [
					'title' => '会员id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4
			],
			'manager_id' => [
					'title' => '管理员id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'type' => [
					'title' => '充值方式',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '0:系统自动
1:管理员手工'
			],
			'remark' => [
					'title' => '备注',
					'field' => 'text NULL',
					'type' => 'textarea'
			],
			'uid' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			]
	];
}	