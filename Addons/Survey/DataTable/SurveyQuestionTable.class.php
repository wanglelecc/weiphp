<?php
/**
 * SurveyQuestion数据模型
 */
class SurveyQuestionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'survey_question',
			'title' => '调研问题',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Survey'
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
			'type' => [
					'title' => '问题类型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'type',
					'function' => '',
					'href' => [ ]
			],
			'is_must' => [
					'title' => '是否必填',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'is_must',
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
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'intro' => [
					'title' => '问题描述',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) unsigned NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function',
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
			'survey_id' => [
					'title' => 'survey_id',
					'type' => 'num',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 4,
					'is_must' => 0
			],
			'type' => [
					'title' => '问题类型',
					'field' => 'char(50) NOT NULL',
					'type' => 'radio',
					'value' => 'radio',
					'is_must' => 1,
					'is_show' => 1,
					'extra' => 'radio:单选题
checkbox:多选题
textarea:简答题',
					'placeholder' => '请输入内容'
			],
			'extra' => [
					'title' => '参数',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '类型为单选、多选时的定义数据，格式见上面的提示',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'is_must' => [
					'title' => '是否必填',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:否
1:是',
					'placeholder' => '请输入内容'
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'remark' => '值越小越靠前',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	