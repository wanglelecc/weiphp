<?php
/**
 * CouponShop数据模型
 */
class CouponShopTable {
	// 数据表模型配置
	public $config = [
			'name' => 'coupon_shop',
			'title' => '适用门店',
			'search_key' => 'name:店名搜索',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'name' => [
					'title' => '店名',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'phone' => [
					'title' => '联系电话',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'address' => [
					'title' => '详细地址',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'ids' => [
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
			'name' => [
					'title' => '店名',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'address' => [
					'title' => '详细地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'phone' => [
					'title' => '联系电话',
					'field' => 'varchar(30) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'gps' => [
					'title' => 'GPS经纬度',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'remark' => '格式：经度,纬度',
					'is_show' => 1
			],
			'coupon_id' => [
					'title' => '所属优惠券编号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'manager_id' => [
					'title' => '管理员id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'open_time' => [
					'title' => '营业时间',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'img' => [
					'title' => '门店展示图',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			]
	];
}	