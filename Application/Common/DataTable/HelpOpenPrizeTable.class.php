<?php
/**
 * HelpOpenPrize数据模型
 */
class HelpOpenPrizeTable {
	// 数据表模型配置
	public $config = [
			'name' => 'help_open_prize',
			'title' => '礼包奖项',
			'search_key' => 'title:请输入用户名称',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'userface' => [
					'title' => '获得用户',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'nickname' => [
					'title' => '名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'type' => [
					'title' => '类型',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'prize' => [
					'title' => '获得礼包',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '获取时间',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'deal' => [
					'title' => '操作',
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
			'help_id' => [
					'title' => '活动ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'sort' => [
					'title' => '序号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'name' => [
					'title' => '奖项名称',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'prize_type' => [
					'title' => '奖项类型',
					'field' => 'tinyint(1) NULL',
					'type' => 'radio',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:请选择
1:优惠券
2:代金券
3:返现'
			],
			'coupon_id' => [
					'title' => '优惠券ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'shop_coupon_id' => [
					'title' => '代金券ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'money' => [
					'title' => '返现金额',
					'field' => 'decimal(11,2) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'is_del' => [
					'title' => '是否删除',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			]
	];
}	