<?php
/**
 * ReserveValue数据模型
 */
class ReserveValueTable {
	// 数据表模型配置
	public $config = [
			'name' => 'reserve_value',
			'title' => '微预约数据',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
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
			'reserve_id' => [
					'title' => '微预约ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 4
			],
			'value' => [
					'title' => '微预约值',
					'field' => 'text NULL',
					'type' => 'textarea'
			],
			'cTime' => [
					'title' => '增加时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'openid' => [
					'title' => 'OpenId',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_openid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'uid' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'is_check' => [
					'title' => '验证是否成功',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			],
			'is_pay' => [
					'title' => '是否支付',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			]
	];
}	