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
			'type' => [
					'title' => '题目类型',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'score' => [
					'title' => '分值',
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
					'remark' => '每个选项换一行，每项输入格式如：A:男人',
					'is_show' => 1,
					'is_must' => 1
			],
			'type' => [
					'title' => '题目类型',
					'field' => 'char(50) NOT NULL',
					'type' => 'radio',
					'value' => 'radio',
					'is_show' => 1,
					'extra' => 'radio:单选题
checkbox:多选题',
					'is_must' => 1
			],
			'exam_id' => [
					'title' => 'exam_id',
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
			],
			'score' => [
					'title' => '分值',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '考生答对此题的得分数',
					'is_show' => 1,
					'is_must' => 1
			],
			'answer' => [
					'title' => '标准答案',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'remark' => '多个答案用空格分开，如： A B C',
					'is_show' => 1,
					'is_must' => 1
			]
	];
}	