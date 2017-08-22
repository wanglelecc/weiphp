<?php
/**
 * CourseBuy数据模型
 */
class CourseBuyTable {
	// 数据表模型配置
	public $config = [
			'name' => 'course_buy',
			'title' => '课程购买',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => '',
			'addon' => ''
	];
	
	// 列表定义
	public $list_grid = [ ];
	
	// 字段定义
	public $fields = [
			'uid' => [
					'title' => '用户UID',
					'type' => 'num',
					'field' => 'int(10) NULL',
					'placeholder' => '请输入内容'
			],
			'is_pay' => [
					'title' => '是否支付',
					'type' => 'bool',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:否
1:是',
					'placeholder' => '请输入内容'
			],
			'openid' => [
					'title' => 'openid',
					'type' => 'string',
					'field' => 'varchar(255) NULL',
					'is_show' => 0,
					'is_must' => 0
			]
	];
}	