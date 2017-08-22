<?php
/**
 * HelpOpen数据模型
 */
class HelpOpenTable {
	// 数据表模型配置
	public $config = [
			'name' => 'help_open',
			'title' => '帮拆礼包',
			'search_key' => 'title:请输入活动名称',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '礼包名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'status' => [
					'title' => '状态',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'prize_num' => [
					'title' => '大礼包总数',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'collect_num' => [
					'title' => '大礼包领取',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'limit_num' => [
					'title' => '分享要求',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'total' => [
					'title' => '领取总数',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'start_time' => [
					'title' => '有效期',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'urls' => [
					'title' => '操作',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [
							'0' => [
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'1' => [
									'title' => '获奖查询',
									'url' => 'prize_lists?id=[id]'
							],
							'2' => [
									'title' => '分享记录',
									'url' => 'share_lists?id=[id]'
							],
							'3' => [
									'title' => '核销记录',
									'url' => 'sncode_lists?id=[id]'
							],
							'4' => [
									'title' => '删除',
									'url' => '[DELETE]'
							],
							'5' => [
									'title' => '预览',
									'url' => 'preview?id=[id]'
							],
							'6' => [
									'title' => '复制链接',
									'url' => 'HelpOpen/Wap/index&id=[id]&invite_uid=1'
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
			'title' => [
					'title' => '活动名称',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'start_time' => [
					'title' => '开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'end_time' => [
					'title' => '过期时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'limit_num' => [
					'title' => '帮拆人数限制',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 5,
					'remark' => '多少好友帮拆开礼包才有效',
					'is_show' => 1
			],
			'content' => [
					'title' => '活动规则',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'manager_id' => [
					'title' => 'manager_id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'prize_num' => [
					'title' => '大礼包数量',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'status' => [
					'title' => '是否开启',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'is_show' => 1,
					'extra' => '0:禁用
1:启用'
			],
			'collect_tips' => [
					'title' => '领取说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'share_icon' => [
					'title' => '分享图标',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'share_title' => [
					'title' => '分享标题',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'share_intro' => [
					'title' => '分享简介',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			]
	];
}	