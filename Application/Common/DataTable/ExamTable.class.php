<?php
/**
 * Exam数据模型
 */
class ExamTable {
	// 数据表模型配置
	public $config = [
			'name' => 'exam',
			'title' => '考试试卷',
			'search_key' => 'title:请输入试卷标题搜索',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'keyword' => [
					'title' => '关键词',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'keyword_type' => [
					'title' => '关键词匹配类型',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'title' => [
					'title' => '试卷标题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'start_time' => [
					'title' => '开始时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'end_time' => [
					'title' => '结束时间',
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
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'1' => [
									'title' => '删除',
									'url' => '[DELETE]'
							],
							'2' => [
									'title' => '题目管理',
									'url' => 'exam_question&target=_blank&id=[id]'
							],
							'3' => [
									'title' => '考生成绩',
									'url' => 'exam_answer&target=_blank&id=[id]'
							],
							'4' => [
									'title' => '试卷预览',
									'url' => 'preview&id=[id]&target=_blank'
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
			'keyword' => [
					'title' => '关键词',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'keyword_type' => [
					'title' => '关键词匹配类型',
					'field' => 'tinyint(2) NOT NULL',
					'type' => 'select',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:完全匹配
1:左边匹配
2:右边匹配
3:模糊匹配',
					'is_must' => 1
			],
			'title' => [
					'title' => '试卷标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'intro' => [
					'title' => '封面简介',
					'field' => 'text NOT NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'is_must' => 1
			],
			'mTime' => [
					'title' => '修改时间',
					'field' => 'int(10) NOT NULL',
					'type' => 'datetime',
					'is_must' => 1,
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'cover' => [
					'title' => '封面图片',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'picture',
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
			'finish_tip' => [
					'title' => '结束语',
					'field' => 'text NOT NULL',
					'type' => 'string',
					'remark' => '为空默认为：考试完成，谢谢参与',
					'is_show' => 1,
					'is_must' => 1
			],
			'start_time' => [
					'title' => '考试开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'remark' => '为空表示什么时候开始都可以',
					'is_show' => 2
			],
			'end_time' => [
					'title' => '考试结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'remark' => '为空表示不限制结束时间',
					'is_show' => 2
			]
	];
}	