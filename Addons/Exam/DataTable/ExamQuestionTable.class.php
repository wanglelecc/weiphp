<?php
/**
 * ExamQuestion数据模型
 */
class ExamQuestionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'exam_question',
			'title' => '考试题目',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Exam'
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
					'title' => '题目类型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'type',
					'function' => '',
					'href' => [ ]
			],
			'score' => [
					'title' => '分值',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'score',
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
					'remark' => '每个选项换一行，每项输入格式如：A:男人',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'type' => [
					'title' => '题目类型',
					'field' => 'char(50) NOT NULL',
					'type' => 'radio',
					'value' => 'radio',
					'is_must' => 1,
					'is_show' => 1,
					'extra' => 'radio:单选题
checkbox:多选题',
					'placeholder' => '请输入内容'
			],
			'exam_id' => [
					'title' => 'exam_id',
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
			],
			'score' => [
					'title' => '分值',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'is_must' => 1,
					'remark' => '考生答对此题的得分数',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'answer' => [
					'title' => '标准答案',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'remark' => '多个答案用空格分开，如： A B C',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	