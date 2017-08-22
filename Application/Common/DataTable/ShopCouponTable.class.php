<?php
/**
 * ShopCoupon数据模型
 */
class ShopCouponTable {
	// 数据表模型配置
	public $config = [
			'name' => 'shop_coupon',
			'title' => '代金券',
			'search_key' => 'title:请输入代金券名称搜索',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '代金券名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'money' => [
					'title' => '面值',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'limit_num' => [
					'title' => '领取限制',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'start_time' => [
					'title' => '有效期',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'collect_count' => [
					'title' => '已领取',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'use_count' => [
					'title' => '已使用',
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
									'title' => '预览',
									'url' => 'preview?id=[id]'
							],
							'1' => [
									'title' => '领取记录',
									'url' => 'lists?_controller=Sn&target_id=[id]'
							],
							'2' => [
									'title' => '核销记录',
									'url' => 'sncode_lists?id=[id]'
							],
							'3' => [
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'4' => [
									'title' => '删除',
									'url' => '[DELETE]'
							],
							'5' => [
									'title' => '复制链接',
									'url' => 'ShopCoupon/Wap/index&id=[id]'
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
			'title' => [
					'title' => '优惠券名称',
					'field' => 'varchar(30) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'num' => [
					'title' => '发放量',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1,
					'is_must' => 1
			],
			'money' => [
					'title' => '面值',
					'field' => 'decimal(11,2) NULL',
					'type' => 'num',
					'is_show' => 1,
					'is_must' => 1
			],
			'money_max' => [
					'title' => '最大面值',
					'field' => 'decimal(11,2) NULL',
					'type' => 'num',
					'value' => 0.00,
					'is_show' => 1
			],
			'is_money_rand' => [
					'title' => '面值是否随机',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:否|money_max@hide
1:是|money_max@show'
			],
			'order_money' => [
					'title' => '订单金额',
					'field' => 'decimal(11,2) NULL',
					'type' => 'num',
					'value' => 0.00,
					'remark' => '满多少可以使用，0表示不限制',
					'is_show' => 1
			],
			'limit_num' => [
					'title' => '每人限领',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:不限张
1:1张
2:2张
3:3张
4:4张
5:5张
10:10张'
			],
			'start_time' => [
					'title' => '生效时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'is_must' => 1
			],
			'end_time' => [
					'title' => '过期时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'is_must' => 1
			],
			'limit_goods' => [
					'title' => '可适用商品',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:全店适用|limit_gooods_ids@hide
1:指定商品适用|limit_gooods_ids@show'
			],
			'limit_goods_ids' => [
					'title' => '指定的商品',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'is_market_price' => [
					'title' => '仅原价购买商品时可用 ',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:否
1:是'
			],
			'content' => [
					'title' => '使用说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'status' => [
					'title' => '状态',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '0:失效
1:正常'
			],
			'collect_count' => [
					'title' => '领取数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			],
			'use_count' => [
					'title' => '已使用数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			],
			'manager_id' => [
					'title' => '管理员ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'cTime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'member' => [
					'title' => '选择人群',
					'field' => 'varchar(100) NULL',
					'type' => 'checkbox',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:所有用户
-1:所有会员'
			],
			'type' => [
					'title' => '优惠券类型',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:优惠券
1:代金券
2:礼品券'
			],
			'is_del' => [
					'title' => '是否删除',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			]
	];
}	