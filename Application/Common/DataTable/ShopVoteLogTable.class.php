<?php
/**
 * ShopVoteLog数据模型
 */
class ShopVoteLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'shop_vote_log',
			'title' => '商城投票记录',
			'search_key' => 'truename:请输入用户名字',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'vote_id' => [
					'title' => '用户头像',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'uid' => [
					'title' => '用户',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'option_id' => [
					'title' => '投票选项',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'ctime' => [
					'title' => '投票时间',
					'function' => 'time_format',
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
			'vote_id' => [
					'title' => '活动id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'option_id' => [
					'title' => '选项id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'uid' => [
					'title' => '投票者id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'ctime' => [
					'title' => '投票时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			]
	];
}	