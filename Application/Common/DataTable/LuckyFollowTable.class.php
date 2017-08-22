<?php
/**
 * LuckyFollow数据模型
 */
class LuckyFollowTable {
	// 数据表模型配置
	public $config = [
			'name' => 'lucky_follow',
			'title' => '中奖者信息',
			'search_key' => 'award_id:输入奖品名称',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'draw_id' => [
					'title' => '活动',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'award_id' => [
					'title' => '奖项',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'award_name' => [
					'title' => '奖品',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'zjtime' => [
					'title' => '中奖时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'follow_id' => [
					'title' => '微信昵称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'state' => [
					'title' => '发奖状态',
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
									'title' => '发放奖品',
									'url' => 'do_fafang?id=[id]'
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
			'draw_id' => [
					'title' => '活动编号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'sport_id' => [
					'title' => '场次编号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'award_id' => [
					'title' => '奖品编号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'follow_id' => [
					'title' => '粉丝id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'address' => [
					'title' => '地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'num' => [
					'title' => '获奖数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			],
			'state' => [
					'title' => '兑奖状态',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:未兑奖
1:已兑奖'
			],
			'zjtime' => [
					'title' => '中奖时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'djtime' => [
					'title' => '兑奖时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'uid' => [
					'title' => 'uid',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'aim_table' => [
					'title' => '活动标识',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'remark' => [
					'title' => '备注',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'scan_code' => [
					'title' => '核销码',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			]
	];
}	