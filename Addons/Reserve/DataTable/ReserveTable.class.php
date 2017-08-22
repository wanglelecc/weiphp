<?php
/**
 * Reserve数据模型
 */
class ReserveTable {
	// 数据表模型配置
	public $config = [
			'name' => 'reserve',
			'title' => '微预约',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Reserve'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'status' => [
					'title' => '状态',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'start_time' => [
					'title' => '报名时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '预览',
									'url' => 'preview&id=[id]'
							],
							'1' => [
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'2' => [
									'title' => '预约列表',
									'url' => 'reserve_value&id=[id]'
							],
							'3' => [
									'title' => '删除',
									'url' => '[DELETE]'
							],
							'4' => [
									'title' => '复制链接',
									'url' => 'Reserve/Wap/index&reserve_id=[id]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'title' => [
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
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
					'title' => '微预约密码',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '如要用户输入密码才能进入微预约，则填写此项。否则留空，用户可直接进入微预约'
			],
			'jump_url' => [
					'title' => '提交后跳转的地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '要以http://开头的完整地址，为空时不跳转',
					'is_show' => 1
			],
			'content' => [
					'title' => '详细介绍',
					'field' => 'text NULL',
					'type' => 'editor',
					'remark' => '可不填',
					'is_show' => 1
			],
			'finish_tip' => [
					'title' => '用户提交后提示内容',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '为空默认为：提交成功，谢谢参与',
					'is_show' => 1
			],
			'can_edit' => [
					'title' => '是否允许编辑',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'remark' => '用户提交预约是否可以再编辑',
					'is_show' => 1,
					'extra' => '0:不允许
1:允许'
			],
			'intro' => [
					'title' => '封面简介',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
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
					'is_show' => 1
			],
			'template' => [
					'title' => '模板',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'default',
					'is_show' => 1
			],
			'status' => [
					'title' => '状态',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:已禁用
1:已开启'
			],
			'start_time' => [
					'title' => '报名开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'end_time' => [
					'title' => '报名结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'pay_online' => [
					'title' => '是否支持在线支付',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:否
1:是'
			]
	];
}	