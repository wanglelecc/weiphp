<?php
/**
 * ExamAnswer数据模型
 */
class ExamAnswerTable {
	// 数据表模型配置
	public $config = [
			'name' => 'exam_answer',
			'title' => '考试回答',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'openid' => [
					'title' => 'OpenId',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'truename' => [
					'title' => '姓名',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'mobile' => [
					'title' => '手机号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'score' => [
					'title' => '成绩',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '考试时间',
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
									'title' => '答题详情',
									'url' => 'detail?uid=[uid]&exam_id=[exam_id]'
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
			'answer' => [
					'title' => '回答内容',
					'field' => 'text NOT NULL',
					'type' => 'textarea',
					'is_must' => 1
			],
			'openid' => [
					'title' => 'OpenId',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'auto_rule' => 'get_openid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'uid' => [
					'title' => '用户UID',
					'field' => 'int(10) NOT NULL',
					'type' => 'num',
					'is_must' => 1,
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'question_id' => [
					'title' => 'question_id',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'is_show' => 4,
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
			'exam_id' => [
					'title' => 'exam_id',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'is_show' => 4,
					'is_must' => 1
			],
			'score' => [
					'title' => '得分',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'value' => 0,
					'is_must' => 1
			]
	];
}	