<?php
/**
 * SurveyAnswer数据模型
 */
class SurveyAnswerTable {
	// 数据表模型配置
	public $config = [
			'name' => 'survey_answer',
			'title' => '调研回答',
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
			'openid' => [
					'title' => 'OpenId',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'openid',
					'function' => '',
					'href' => [ ]
			],
			'nickname' => [
					'title' => '昵称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'nickname',
					'function' => '',
					'href' => [ ]
			],
			'mobile' => [
					'title' => '手机号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'mobile',
					'function' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '参与时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'cTime',
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
									'title' => '回答内容',
									'url' => 'detail?uid=[uid]&survey_id=[survey_id]'
							]
					],
					'name' => 'ids',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
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
					'placeholder' => '请输入内容'
			],
			'question_id' => [
					'title' => 'question_id',
					'type' => 'num',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 4,
					'is_must' => 0
			],
			'uid' => [
					'title' => '用户UID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'openid' => [
					'title' => 'OpenId',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_openid',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'answer' => [
					'title' => '回答内容',
					'field' => 'text NULL',
					'type' => 'textarea',
					'placeholder' => '请输入内容'
			]
	];
}	