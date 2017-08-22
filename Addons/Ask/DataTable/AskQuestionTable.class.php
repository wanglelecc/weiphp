<?php
/**
 * AskQuestion数据模型
 */
class AskQuestionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'ask_question',
			'title' => '抢答问题',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Ask'
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
			'wait_time' => [
					'title' => '时间间隔',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'wait_time',
					'function' => '',
					'href' => [ ]
			],
			'percent' => [
					'title' => '抢中概率',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'percent',
					'function' => '',
					'href' => [ ]
			],
			'answer' => [
					'title' => '正确答案',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'answer',
					'function' => '',
					'href' => [ ]
			],
			'sort' => [
					'title' => '排序号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'sort',
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
			'is_must' => [
					'title' => '是否必填',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '0:否
1:是',
					'placeholder' => '请输入内容'
			],
			'extra' => [
					'title' => '参数',
					'field' => 'text NOT NULL',
					'type' => 'textarea',
					'is_must' => 1,
					'remark' => '类型为单选、多选时的定义数据，格式见上面的提示',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'type' => [
					'title' => '问题类型',
					'field' => 'char(50) NOT NULL',
					'type' => 'radio',
					'value' => 'radio',
					'is_must' => 1,
					'is_show' => 1,
					'extra' => 'radio:单选题
checkbox:多选题',
					'placeholder' => '请输入内容'
			],
			'ask_id' => [
					'title' => 'ask_id',
					'type' => 'num',
					'field' => 'int(10) unsigned NULL',
					'is_show' => 4,
					'is_must' => 0
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'remark' => '值越小越靠前',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'answer' => [
					'title' => '正确答案',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'remark' => '多个答案用空格分开，如： A B C',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'is_last' => [
					'title' => '是否最后一题',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'remark' => '如设置为最后一题，用户回答后进入完成页面，否则进入等待下一题提示页面',
					'extra' => '0:否
1:是',
					'placeholder' => '请输入内容'
			],
			'wait_time' => [
					'title' => '等待时间',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '单位为秒，表示答题后进入下一题的间隔时间',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'percent' => [
					'title' => '抢中概率',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 100,
					'remark' => '抢到题目的百分比，请填写0~100之间的整数，如填写50表示概率为50%',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'answer_time' => [
					'title' => '答题时间',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '不填则为无答题时间限制',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	