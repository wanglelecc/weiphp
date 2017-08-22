<?php
/**
 * InviteUser数据模型
 */
class InviteUserTable {
	// 数据表模型配置
	public $config = [
			'name' => 'invite_user',
			'title' => '微邀约用户记录',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
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
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'uid' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'invite_id' => [
					'title' => '邀约ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'invite_num' => [
					'title' => '已邀请人数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			]
	];
}	