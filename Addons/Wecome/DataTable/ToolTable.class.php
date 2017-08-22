<?php
/**
 * Tool数据模型
 */
class ToolTable {
	// 数据表模型配置
	public $config = [
			'name' => 'tool',
			'title' => '用户信息表',
			'search_key' => 'title:请输入标题进行搜索44',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Wecome'
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'test' => [
					'title' => '序言',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'nickname' => [
					'title' => '用户名',
					'field' => 'varchar(100) NULL',
					'type' => 'string'
			],
			'password' => [
					'title' => '登录密码',
					'field' => 'varchar(100) NULL',
					'type' => 'string'
			],
			'truename' => [
					'title' => '真实姓名',
					'field' => 'varchar(30) NULL',
					'type' => 'string'
			],
			'mobile' => [
					'title' => '联系电话',
					'field' => 'varchar(30) NULL',
					'type' => 'string'
			],
			'email' => [
					'title' => '邮箱地址',
					'field' => 'varchar(100) NULL',
					'type' => 'string'
			],
			'sex55' => [
					'title' => '性别33',
					'field' => 'tinyint(2) NULL',
					'type' => 'string',
					'value' => 1
			],
			'headimgurl' => [
					'title' => '头像地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'city' => [
					'title' => '城市',
					'field' => 'varchar(30) NULL',
					'type' => 'string'
			],
			'province' => [
					'title' => '省份',
					'field' => 'varchar(30) NULL',
					'type' => 'string'
			],
			'country' => [
					'title' => '国家',
					'field' => 'varchar(30) NULL',
					'type' => 'string'
			],
			'language' => [
					'title' => '语言',
					'field' => 'varchar(20) NULL',
					'type' => 'string',
					'value' => 'zh-cn'
			],
			'score' => [
					'title' => '金币值',
					'field' => 'int(10) NULL',
					'type' => 'string'
			],
			'experience' => [
					'title' => '经验值',
					'field' => 'int(10) NULL',
					'type' => 'string'
			],
			'unionid' => [
					'title' => '微信第三方ID',
					'field' => 'varchar(50) NULL',
					'type' => 'string'
			],
			'login_count' => [
					'title' => '登录次数',
					'field' => 'int(10) NULL',
					'type' => 'string'
			],
			'reg_ip' => [
					'title' => '注册IP',
					'field' => 'varchar(30) NULL',
					'type' => 'string'
			],
			'reg_time' => [
					'title' => '注册时间',
					'field' => 'int(10) NULL',
					'type' => 'string'
			],
			'last_login_ip' => [
					'title' => '最近登录IP',
					'field' => 'varchar(30) NULL',
					'type' => 'string'
			],
			'last_login_time' => [
					'title' => '最近登录时间',
					'field' => 'int(10) NULL',
					'type' => 'string'
			],
			'status' => [
					'title' => '状态',
					'field' => 'tinyint(2) NULL',
					'type' => 'string',
					'value' => 1
			],
			'is_init' => [
					'title' => '初始化状态',
					'field' => 'tinyint(2) NULL',
					'type' => 'string'
			],
			'is_audit' => [
					'title' => '审核状态',
					'field' => 'tinyint(2) NULL',
					'type' => 'string'
			],
			'subscribe_time' => [
					'title' => '用户关注公众号时间',
					'field' => 'int(10) NULL',
					'type' => 'string'
			],
			'remark' => [
					'title' => '微信用户备注',
					'field' => 'varchar(100) NULL',
					'type' => 'string'
			],
			'groupid' => [
					'title' => '微信端的分组ID',
					'field' => 'int(10) NULL',
					'type' => 'string'
			],
			'come_from' => [
					'title' => '来源',
					'field' => 'tinyint(1) NULL',
					'type' => 'string'
			],
			'level' => [
					'title' => '管理等级',
					'field' => 'tinyint(2) NULL',
					'type' => 'string'
			],
			'membership' => [
					'title' => '会员等级',
					'field' => 'char(50) NULL',
					'type' => 'string'
			],
			'yyy' => [
					'title' => 'retre',
					'field' => 'int(10) NULL',
					'type' => 'string'
			]
	];
}	