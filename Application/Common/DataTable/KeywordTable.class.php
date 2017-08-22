<?php
/**
 * Keyword数据模型
 */
class KeywordTable {
	// 数据表模型配置
	public $config = [
			'name' => 'keyword',
			'title' => '关键词表',
			'search_key' => 'keyword',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '编号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'keyword' => [
					'title' => '关键词',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'addon' => [
					'title' => '所属插件',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'aim_id' => [
					'title' => '插件数据ID',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cTime' => [
					'title' => '增加时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'request_count' => [
					'title' => '请求数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'ids' => [
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
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'keyword' => [
					'title' => '关键词',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'addon' => [
					'title' => '关键词所属插件',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'aim_id' => [
					'title' => '插件表里的ID值',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'is_must' => 1,
					'is_show' => 1
			],
			'cTime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'keyword_length' => [
					'title' => '关键词长度',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'keyword_type' => [
					'title' => '匹配类型',
					'field' => 'tinyint(2) NULL',
					'type' => 'select',
					'is_show' => 1,
					'extra' => '0:完全匹配
1:左边匹配
2:右边匹配
3:模糊匹配
4:正则匹配
5:随机匹配'
			],
			'extra_text' => [
					'title' => '文本扩展',
					'field' => 'text NULL',
					'type' => 'textarea'
			],
			'extra_int' => [
					'title' => '数字扩展',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'request_count' => [
					'title' => '请求数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '用户回复的次数'
			]
	];
}	