<?php
/**
 * HelpOpenUser数据模型
 */
class HelpOpenUserTable {
	// 数据表模型配置
	public $config = [
			'name' => 'help_open_user',
			'title' => '帮拆参与人记录',
			'search_key' => 'title:请输入分享用户名称',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'userface' => [
					'title' => ' 用户头像',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'nickname' => [
					'title' => '分享用户',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'join_count' => [
					'title' => '获取数量',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '分享时间',
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
									'title' => '获取人列表',
									'url' => 'collect_lists?invite_uid=[invite_uid]&help_id=[help_id]'
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
			'invite_uid' => [
					'title' => '邀请人ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'friend_uid' => [
					'title' => '帮拆人ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'help_id' => [
					'title' => '活动ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'cTime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'sn_id' => [
					'title' => 'sn',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'join_count' => [
					'title' => '领取数量',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			]
	];
}	