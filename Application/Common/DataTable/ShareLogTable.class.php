<?php
/**
 * ShareLog数据模型
 */
class ShareLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'share_log',
			'title' => '分享记录',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
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
			'uid' => [
					'title' => '用户id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'sTime' => [
					'title' => '分享时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'score' => [
					'title' => '积分',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			]
	];
}	