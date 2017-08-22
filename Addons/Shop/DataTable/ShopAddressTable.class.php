<?php
/**
 * ShopAddress数据模型
 */
class ShopAddressTable {
	// 数据表模型配置
	public $config = [
			'name' => 'shop_address',
			'title' => '收货地址',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Shop'
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'uid' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'truename' => [
					'title' => '收货人姓名',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'mobile' => [
					'title' => '手机号码',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'city' => [
					'title' => '城市',
					'field' => 'varchar(255) NULL',
					'type' => 'cascade',
					'is_show' => 1,
					'extra' => 'module=city'
			],
			'address' => [
					'title' => '具体地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'is_use' => [
					'title' => '是否设置为默认',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:否
1:是'
			]
	];
}	