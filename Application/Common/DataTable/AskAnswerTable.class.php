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
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'uid' => [
					'title' => '用户ID',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'nickname' => [
					'title' => '昵称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'question_id' => [
					'title' => '问题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'answer' => [
					'title' => '回答',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'is_correct' => [
					'title' => '是否正确',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'true_answer' => [
					'title' => '正确答案',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'times' => [
					'title' => '第几轮',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '回答时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
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
					'field' => 'text NULL',
					'type' => 'textarea'
			],
			'openid' => [
					'title' => 'OpenId',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_openid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'uid' => [
					'title' => '用户UID',
					'field' => 'int(10) NULL',
					'type' => 'num',
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
					'field' => 'int(10) unsigned NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'ask_id' => [
					'title' => 'ask_id',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'is_show' => 4,
					'is_must' => 1
			],
			'is_correct' => [
					'title' => '是否回答正确',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '0:不正确
1:正确'
			],
			'times' => [
					'title' => '次数',
					'field' => 'int(4) NULL',
					'type' => 'num',
					'value' => 0
			]
	];
}	