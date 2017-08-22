<?php
/**
 * Forms数据模型
 */
class FormsTable {
	// 数据表模型配置
	public $config = [
			'name' => 'forms',
			'title' => '通用表单',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '通用表单ID',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'keyword' => [
					'title' => '关键词',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'keyword_type' => [
					'title' => '关键词类型',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'title' => [
					'title' => '标题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '发布时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'ids' => [
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
									'title' => '字段管理',
									'url' => 'forms_attribute&id=[id]'
							],
							'3' => [
									'title' => '数据管理',
									'url' => 'forms_value&id=[id]'
							],
							'4' => [
									'title' => '预览',
									'url' => 'preview&id=[id]'
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
			'finish_tip' => [
					'title' => '用户提交后提示内容',
					'field' => 'text NULL',
					'type' => 'string',
					'remark' => '为空默认为：提交成功，谢谢参与',
					'is_show' => 1
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
			'password' => [
					'title' => '表单密码',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '如要用户输入密码才能进入表单，则填写此项。否则留空，用户可直接进入表单'
			],
			'keyword_type' => [
					'title' => '关键词类型',
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
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'intro' => [
					'title' => '封面简介',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'is_must' => 1
			],
			'mTime' => [
					'title' => '修改时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'cover' => [
					'title' => '封面图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1,
					'is_must' => 1
			],
			'keyword' => [
					'title' => '关键词',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'can_edit' => [
					'title' => '是否允许编辑',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
					'remark' => '用户提交表单是否可以再编辑',
					'is_show' => 1,
					'extra' => '0:不允许
1:允许'
			],
			'content' => [
					'title' => '详细介绍',
					'field' => 'text NULL',
					'type' => 'editor',
					'remark' => '可不填',
					'is_show' => 1
			],
			'jump_url' => [
					'title' => '提交后跳转的地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '要以http://开头的完整地址，为空时不跳转',
					'is_show' => 1
			],
			'template' => [
					'title' => '模板',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'default',
					'is_show' => 1
			]
	];
}	