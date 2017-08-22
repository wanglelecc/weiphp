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
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '问题编号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'title' => [
					'title' => '标题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'extra' => [
					'title' => '参数',
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
			'title' => [
					'title' => '题目标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'intro' => [
					'title' => '题目描述',
					'field' => 'text NOT NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'is_must' => 1
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'datetime',
					'is_must' => 1,
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'is_must' => [
					'title' => '是否必填',
					'field' => 'tinyint(2) NOT NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '0:否
1:是',
					'is_must' => 1
			],
			'extra' => [
					'title' => '参数',
					'field' => 'text NOT NULL',
					'type' => 'textarea',
					'remark' => '输入格式见上面的提示',
					'is_show' => 1,
					'is_must' => 1
			],
			'type' => [
					'title' => '题目类型',
					'field' => 'char(50) NOT NULL',
					'type' => 'radio',
					'value' => 'radio',
					'extra' => 'radio:单选题',
					'is_must' => 1,
					'auto_rule' => 'radio',
					'auto_time' => 1,
					'auto_type' => 'string'
			],
			'test_id' => [
					'title' => 'test_id',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'is_show' => 4,
					'is_must' => 1
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '值越小越靠前',
					'is_show' => 1,
					'is_must' => 1
			]
	];
}	