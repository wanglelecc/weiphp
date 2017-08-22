<?php
/**
 * CouponShopLink数据模型
 */
class CouponShopLinkTable {
	// 数据表模型配置
	public $config = [
			'name' => 'coupon_shop_link',
			'title' => '门店关联',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Coupon'
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
			'coupon_id' => [
					'title' => 'coupon_id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'shop_id' => [
					'title' => 'shop_id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			]
	];
}	