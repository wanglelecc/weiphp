<?php
/**
 * LotteryPrizeList数据模型
 */
class LotteryPrizeListTable {
	// 数据表模型配置
	public $config = [
			'name' => 'lottery_prize_list',
			'title' => '抽奖奖品列表',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'sports_id' => [
					'title' => '比赛场次',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'award_id' => [
					'title' => '奖品名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'award_num' => [
					'title' => '奖品数量',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'urls' => [
					'title' => '编辑',
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
							],
							'2' => [
									'title' => '添加',
									'url' => 'add?sports_id=[sports_id]'
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
			'sports_id' => [
					'title' => '活动编号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'award_id' => [
					'title' => '奖品编号',
					'field' => 'varchar(255) NULL',
					'type' => 'cascade',
					'is_show' => 1
			],
			'award_num' => [
					'title' => '奖品数量',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'uid' => [
					'title' => 'uid',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			]
	];
}	