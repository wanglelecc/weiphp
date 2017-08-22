<?php
/**
 * UserTagLink数据模型
 */
class UserTagLinkTable {
	// 数据表模型配置
	public $config = [
			'name' => 'user_tag_link',
			'title' => '用户标签关系表',
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
					'title' => 'uid',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'tag_id' => [
					'title' => 'tag_id',
					'field' => 'int(10) NULL',
					'type' => 'num'
			]
	];
}	