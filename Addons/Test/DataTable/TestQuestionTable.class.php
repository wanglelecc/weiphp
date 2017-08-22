<?php
/**
 * TestQuestion数据模型
 */
class TestQuestionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'test_question',
			'title' => '测试题目',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Test'
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '问题编号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'id',
					'function' => '',
					'href' => [ ]
			],
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'title',
					'function' => '',
					'href' => [ ]
			],
			'extra' => [
					'title' => '参数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'extra',
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
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'1' => [
									'title' => '删除',
									'url' => '[DELETE]'
							]
					],
					'name' => 'ids',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'title' => [
					'title' => '题目标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'intro' => [
					'title' => '题目描述',
					'field' => 'text NOT NULL',
					'type' => 'textarea',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '发布时间',
					'type' => 'datetime',
					'field' => 'int(10) unsigned NULL',
					'auto_type' => 'function',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'type' => 'string',
					'field' => 'varchar(255) NULL',
					'auto_type' => 'function',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			],
			'is_must' => [
					'title' => '是否必填',
					'type' => 'bool',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:否
1:是',
					'value' => 1,
					'placeholder' => '请输入内容'
			],
			'extra' => [
					'title' => '参数',
					'field' => 'text NOT NULL',
					'type' => 'textarea',
					'is_must' => 1,
					'remark' => '输入格式见上面的提示',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'type' => [
					'title' => '题目类型',
					'type' => 'radio',
					'field' => 'char(50) NULL',
					'extra' => 'radio:单选题',
					'value' => 'radio',
					'auto_type' => 'string',
					'auto_rule' => 'radio',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			],
			'test_id' => [
					'title' => 'test_id',
					'type' => 'num',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 4,
					'is_must' => 0
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'is_must' => 1,
					'remark' => '值越小越靠前',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	