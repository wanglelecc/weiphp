<?php
/**
 * ShopVoteOption数据模型
 */
class ShopVoteOptionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'shop_vote_option',
			'title' => '投票选项表',
			'search_key' => 'truename:请输入姓名',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Vote'
	];
	
	// 列表定义
	public $list_grid = [
			'truename' => [
					'title' => '参赛者',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'image' => [
					'title' => '参赛图片',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'manifesto' => [
					'title' => '参赛宣言',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'introduce' => [
					'title' => '选手介绍',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'opt_count' => [
					'title' => '得票数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '编辑',
									'url' => 'option_edit&id=[id]'
							],
							'1' => [
									'title' => '删除',
									'url' => 'option_del&id=[id]'
							],
							'2' => [
									'title' => '投票记录',
									'url' => 'show_log&option_id=[id]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'truename' => [
					'title' => '参赛者',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'image' => [
					'title' => '参赛图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'uid' => [
					'title' => '用户id',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'manifesto' => [
					'title' => '参赛宣言',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'introduce' => [
					'title' => '选手介绍',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'ctime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'vote_id' => [
					'title' => '活动id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4
			],
			'opt_count' => [
					'title' => '投票数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'number' => [
					'title' => '编号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1
			]
	];
}	