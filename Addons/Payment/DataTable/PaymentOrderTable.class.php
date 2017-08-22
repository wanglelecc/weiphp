<?php
/**
 * PaymentOrder数据模型
 */
class PaymentOrderTable {
	// 数据表模型配置
	public $config = [
			'name' => 'payment_order',
			'title' => '订单支付记录',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Payment'
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
			'from' => [
					'title' => '回调地址',
					'field' => 'varchar(50) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'orderName' => [
					'title' => '订单名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'single_orderid' => [
					'title' => '订单号',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'price' => [
					'title' => '价格',
					'field' => 'decimal(10,2) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'wecha_id' => [
					'title' => 'OpenID',
					'field' => 'varchar(200) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'paytype' => [
					'title' => '支付方式',
					'field' => 'varchar(30) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'showwxpaytitle' => [
					'title' => '是否显示标题',
					'field' => 'tinyint(2) NOT NULL',
					'type' => 'bool',
					'is_must' => 1,
					'is_show' => 1,
					'extra' => '0:不显示
1:显示'
			],
			'status' => [
					'title' => '支付状态',
					'field' => 'tinyint(2) NOT NULL',
					'type' => 'bool',
					'is_must' => 1,
					'is_show' => 1,
					'extra' => '0:未支付
1:已支付
2:支付失败'
			],
			'aim_id' => [
					'title' => 'aim_id',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'uid' => [
					'title' => '用户uid',
					'field' => 'int(10) NULL',
					'type' => 'num'
			]
	];
}	