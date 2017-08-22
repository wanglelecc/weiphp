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
			'list_row' => 10,
			'addon' => 'Card'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'title',
					'function' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '发布时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'cTime',
					'function' => '',
					'href' => [ ]
			],
			'urls' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'1' => [
									'title' => '删除',
									'url' => '[DELETE]'
							]
					],
					'name' => 'urls',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'content' => [
					'title' => '通知内容',
					'field' => 'text NOT NULL',
					'type' => 'editor',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'title' => [
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'type' => 'string',
					'field' => 'varchar(100) NULL',
					'is_show' => 0,
					'is_must' => 0,
					'auto_type' => 'function',
					'auto_rule' => 'get_token',
					'auto_time' => 1
			],
			'img' => [
					'title' => '通知图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'grade' => [
					'title' => '适用人群',
					'field' => 'varchar(100) NULL',
					'type' => 'checkbox',
					'is_show' => 1,
					'extra' => '0:所有会员',
					'placeholder' => '请输入内容'
			],
			'to_uid' => [
					'title' => '指定用户',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			]
	];
}	