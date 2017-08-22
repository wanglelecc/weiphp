<?php
/**
 * Feedback数据模型
 */
class FeedbackTable {
	// 数据表模型配置
	public $config = [
			'name' => 'feedback',
			'title' => '用户反馈',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Feedback'
	];
	
	// 列表定义
	public $list_grid = [
			'username' => [
					'title' => '姓名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'product' => [
					'title' => '关注的产品',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'from' => [
					'title' => '来源渠道',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'area' => [
					'title' => '你所在地区',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'score' => [
					'title' => '打分',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'is_dev' => [
					'title' => '是否是前端开发人员',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cTime' => [
					'title' => '反馈时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'urls' => [
					'title' => '姓名',
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
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'username' => [
					'title' => '姓名',
					'type' => 'string',
					'field' => 'varchar(50) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'product' => [
					'title' => '关注的产品',
					'type' => 'checkbox',
					'field' => 'varchar(100) NULL',
					'extra' => '0:微商城
1:微社区
2:乐摇',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'from' => [
					'title' => '来源渠道',
					'type' => 'radio',
					'field' => 'char(10) NULL',
					'extra' => '0:百度搜索来的
1:朋友介绍
2:公众号推送',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'area' => [
					'title' => '你所在地区',
					'type' => 'select',
					'field' => 'char(50) NULL',
					'extra' => '0:美国
1:中国
2:巴西
3:日本',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'score' => [
					'title' => '打分',
					'type' => 'num',
					'field' => 'int(10) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'is_dev' => [
					'title' => '是否是前端开发人员',
					'type' => 'bool',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:否
1:是',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '反馈时间',
					'type' => 'datetime',
					'field' => 'int(10) NULL',
					'is_show' => 1,
					'auto_type' => 'function',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	