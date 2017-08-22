<?php
/**
 * SnCode数据模型
 */
class SnCodeTable {
	// 数据表模型配置
	public $config = [
			'name' => 'sn_code',
			'title' => 'SN码',
			'search_key' => 'sn',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'sn' => [
					'title' => 'SN码',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'sn',
					'function' => '',
					'href' => [ ]
			],
			'uid' => [
					'title' => '昵称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'function' => 'get_nickname',
					'name' => 'uid',
					'href' => [ ]
			],
			'prize_title' => [
					'title' => '奖项',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'prize_title',
					'function' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '创建时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'cTime',
					'function' => '',
					'href' => [ ]
			],
			'is_use' => [
					'title' => '是否已使用',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'is_use',
					'function' => '',
					'href' => [ ]
			],
			'use_time' => [
					'title' => '使用时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'use_time',
					'function' => '',
					'href' => [ ]
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '删除',
									'url' => '[DELETE]'
							],
							'1' => [
									'title' => '改变使用状态',
									'url' => 'set_use?id=[id]'
							]
					],
					'name' => 'ids',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'sn' => [
					'title' => 'SN码',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'uniqid',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'uid' => [
					'title' => '粉丝UID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'is_use' => [
					'title' => '是否已使用',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'extra' => '0:未使用
1:已使用',
					'placeholder' => '请输入内容'
			],
			'use_time' => [
					'title' => '使用时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'placeholder' => '请输入内容'
			],
			'addon' => [
					'title' => '来自的插件',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'Coupon',
					'is_show' => 4,
					'placeholder' => '请输入内容'
			],
			'target_id' => [
					'title' => '来源ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 4,
					'placeholder' => '请输入内容'
			],
			'prize_id' => [
					'title' => '奖项ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'status' => [
					'title' => '是否可用',
					'type' => 'string',
					'field' => 'tinyint(2) NULL',
					'value' => 1,
					'is_show' => 0,
					'is_must' => 0
			],
			'prize_title' => [
					'title' => '奖项',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'can_use' => [
					'title' => '是否可用',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '0:不可用
1:可用',
					'placeholder' => '请输入内容'
			],
			'server_addr' => [
					'title' => '服务器IP',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'admin_uid' => [
					'title' => '核销管理员ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			]
	];
}	