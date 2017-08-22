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
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'member_id' => [
					'title' => '会员卡号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'truename' => [
					'title' => '姓名',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'phone' => [
					'title' => '手机号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'recharge' => [
					'title' => '充值金额',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '充值时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'branch_id' => [
					'title' => '充值门店',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'operator' => [
					'title' => '操作员',
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
			'recharge' => [
					'title' => '充值金额',
					'field' => 'float NULL',
					'type' => 'num',
					'is_show' => 1,
					'is_must' => 1
			],
			'branch_id' => [
					'title' => '充值门店',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
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