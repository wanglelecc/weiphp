<?php
/**
 * ReserveOption数据模型
 */
class ReserveOptionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'reserve_option',
			'title' => '预约选项',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Reserve'
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
			'reserve_id' => [
					'title' => '预约活动ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'name' => [
					'title' => '名称',
					'field' => 'varchar(100) NULL',
					'type' => 'string'
			],
			'money' => [
					'title' => '报名费用',
					'field' => 'decimal(11,2) NULL',
					'type' => 'num'
			],
			'max_limit' => [
					'title' => '最大预约数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '为空时表示不限制'
			],
			'init_count' => [
					'title' => '初始化预约数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'join_count' => [
					'title' => '参加人数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			]
	];
}	