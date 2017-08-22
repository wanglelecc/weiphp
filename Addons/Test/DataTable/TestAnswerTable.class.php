<?php
/**
 * TestAnswer数据模型
 */
class TestAnswerTable {
	// 数据表模型配置
	public $config = [
			'name' => 'test_answer',
			'title' => '测试回答',
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
			'openid' => [
					'title' => 'OpenId',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'openid',
					'function' => '',
					'href' => [ ]
			],
			'truename' => [
					'title' => '姓名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'truename',
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
			'score' => [
					'title' => '得分',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'score',
					'function' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '测试时间',
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
									'title' => '答题详情',
									'url' => 'detail?uid=[uid]&test_id=[test_id]'
							]
					],
					'name' => 'urls',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'answer' => [
					'title' => '回答内容',
					'type' => 'textarea',
					'field' => 'text NULL',
					'placeholder' => '请输入内容'
			],
			'openid' => [
					'title' => 'OpenId',
					'type' => 'string',
					'field' => 'varchar(255) NULL',
					'auto_type' => 'function',
					'auto_rule' => 'get_openid',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			],
			'uid' => [
					'title' => '用户UID',
					'type' => 'num',
					'field' => 'int(10) NULL',
					'auto_type' => 'function',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			],
			'question_id' => [
					'title' => 'question_id',
					'type' => 'num',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 4,
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
			'test_id' => [
					'title' => 'test_id',
					'type' => 'num',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 4,
					'placeholder' => '请输入内容'
			],
			'score' => [
					'title' => '得分',
					'type' => 'num',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 0,
					'is_must' => 0
			]
	];
}	