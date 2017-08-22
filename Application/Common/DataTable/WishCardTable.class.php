<?php
/**
 * WishCard数据模型
 */
class WishCardTable {
	// 数据表模型配置
	public $config = [
			'name' => 'wish_card',
			'title' => '微贺卡',
			'search_key' => 'content:祝福语',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'send_name' => [
					'title' => '发送人',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'receive_name' => [
					'title' => '接收人',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'content' => [
					'title' => '祝福语',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'create_time' => [
					'title' => '创建时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'read_count' => [
					'title' => '浏览次数',
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
									'title' => '预览',
									'url' => 'Wap/card_show?id=[id]&target=_blank'
							],
							'2' => [
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
			'send_name' => [
					'title' => '发送人',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'receive_name' => [
					'title' => '接收人',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'content' => [
					'title' => '祝福语',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'is_must' => 1
			],
			'create_time' => [
					'title' => ' 创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'template' => [
					'title' => '模板',
					'field' => 'char(50) NULL',
					'type' => 'string',
					'remark' => '模板的文件夹名称，不能为中文',
					'is_show' => 1,
					'is_must' => 1
			],
			'template_cate' => [
					'title' => '模板分类',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 4,
					'is_must' => 1
			],
			'read_count' => [
					'title' => '浏览次数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			],
			'mid' => [
					'title' => '用户Id',
					'field' => 'varchar(255) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			]
	];
}	