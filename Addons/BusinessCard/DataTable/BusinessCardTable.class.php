<?php
/**
 * BusinessCard数据模型
 */
class BusinessCardTable {
	// 数据表模型配置
	public $config = [
			'name' => 'business_card',
			'title' => '微名片',
			'search_key' => 'truename:请输入名称搜索',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'BusinessCard'
	];
	
	// 列表定义
	public $list_grid = [
			'uid' => [
					'title' => '用户ID',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'truename' => [
					'title' => '名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'position' => [
					'title' => '职位',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'address' => [
					'title' => '地址',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'mobile' => [
					'title' => '电话',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'company' => [
					'title' => '公司',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'qq' => [
					'title' => 'QQ号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'wechat' => [
					'title' => '微信号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'email' => [
					'title' => '邮箱',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'qrcode' => [
					'title' => '二维码',
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
									'title' => '编辑',
									'url' => '[EDIT]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'uid' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'truename' => [
					'title' => '真实姓名',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'position' => [
					'title' => '职位头衔',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1,
					'extra' => '如：XX创始人、xx级教师、xx投资顾问、XX爸爸、XX达人'
			],
			'mobile' => [
					'title' => '手机',
					'field' => 'varchar(30) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'company' => [
					'title' => '公司名称',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'department' => [
					'title' => '所属部门',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'service' => [
					'title' => '产品服务',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'company_url' => [
					'title' => '公司网址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'address' => [
					'title' => '地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'telephone' => [
					'title' => '座机',
					'field' => 'varchar(30) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'Email' => [
					'title' => '邮箱',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'wechat' => [
					'title' => '微信号',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'qq' => [
					'title' => 'QQ号',
					'field' => 'varchar(30) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'weibo' => [
					'title' => '微博',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'tag' => [
					'title' => '人物标签',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '多个用逗号分开',
					'is_show' => 1
			],
			'wishing' => [
					'title' => '希望结交',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'interest' => [
					'title' => '兴趣',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'personal_url' => [
					'title' => '个人主页',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'intro' => [
					'title' => '个人介绍',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'headface' => [
					'title' => '头像',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture'
			],
			'permission' => [
					'title' => '权限设置',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => 1,
					'is_show' => 1,
					'extra' => '1:完全公开(公众人物)
2:群友可见(商务交往)
3:交换名片可见(私人来往)
4:仅自己可见(绝密保存)'
			],
			'template' => [
					'title' => '选择的模板',
					'field' => 'varchar(50) NULL',
					'type' => 'string'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			]
	];
}	