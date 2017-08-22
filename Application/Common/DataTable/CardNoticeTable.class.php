<?php
/**
 * CardNotice数据模型
 */
class CardNoticeTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_notice',
			'title' => '会员卡通知',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '标题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '发布时间',
					'function' => 'time_format',
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
									'title' => '删除',
									'url' => '[DELETE]'
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
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'content' => [
					'title' => '通知内容',
					'field' => 'text NOT NULL',
					'type' => 'editor',
					'is_show' => 1,
					'is_must' => 1
			],
			'title' => [
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'img' => [
					'title' => '通知图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'grade' => [
					'title' => '适用人群',
					'field' => 'varchar(100) NULL',
					'type' => 'checkbox',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:所有会员'
			],
			'to_uid' => [
					'title' => '指定用户',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			]
	];
}	