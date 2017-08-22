<?php
/**
 * AskAnswer数据模型
 */
class AskAnswerTable {
	// 数据表模型配置
	public $config = [
			'name' => 'ask_answer',
			'title' => '抢答回答',
			'search_key' => 'uid:请输入用户ID',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Ask'
	];
	
	// 列表定义
	public $list_grid = [
			'uid' => [
					'title' => '用户ID',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'uid',
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
			'question_id' => [
					'title' => '问题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'question_id',
					'function' => '',
					'href' => [ ]
			],
			'answer' => [
					'title' => '回答',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'answer',
					'function' => '',
					'href' => [ ]
			],
			'is_correct' => [
					'title' => '是否正确',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'is_correct',
					'function' => '',
					'href' => [ ]
			],
			'true_answer' => [
					'title' => '正确答案',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'true_answer',
					'function' => '',
					'href' => [ ]
			],
			'times' => [
					'title' => '第几轮',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'times',
					'function' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '回答时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'cTime',
					'function' => '',
					'href' => [ ]
			]
	];
	
	// 字段定义
	public $fields = [
			'answer' => [
					'title' => '回答内容',
					'field' => 'text NULL',
					'type' => 'textarea',
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
			'uid' => [
					'title' => '用户UID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function',
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
			'ask_id' => [
					'title' => 'ask_id',
					'type' => 'num',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 4,
					'is_must' => 0
			],
			'is_correct' => [
					'title' => '是否回答正确',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '0:不正确
1:正确',
					'placeholder' => '请输入内容'
			],
			'times' => [
					'title' => '次数',
					'field' => 'int(4) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			]
	];
}	