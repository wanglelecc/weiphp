<?php
/**
 * ApiParam数据模型
 */
class ApiParamTable {
	// 数据表模型配置
	public $config = [
			'name' => 'api_param',
			'title' => 'API参数',
			'search_key' => '',
			'add_button' => '',
			'del_button' => '',
			'search_button' => '',
			'check_all' => '',
			'list_row' => '',
			'addon' => 'Api'
	];
	
	// 列表定义
	public $list_grid = [ ];
	
	// 字段定义
	public $fields = [
			'title' => [
					'title' => '名称',
					'type' => 'string',
					'field' => 'varchar(100) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'name' => [
					'title' => '字段',
					'type' => 'string',
					'field' => 'varchar(50) NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'is_must' => [
					'title' => '是否必填',
					'type' => 'bool',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:否
1:必填',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'type' => [
					'title' => '格式',
					'type' => 'string',
					'field' => 'varchar(30) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'remark' => [
					'title' => '描述',
					'type' => 'textarea',
					'field' => 'text NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'extra' => [
					'title' => '扩展字段',
					'type' => 'radio',
					'field' => 'char(10) NULL',
					'extra' => 'asc:正序
desc:倒序',
					'value' => 'asc',
					'is_show' => 1,
					'is_must' => 0
			],
			'param_type' => [
					'title' => '参数类型',
					'type' => 'string',
					'field' => 'char(10) null',
					'extra' => 'condition:条件参数
order:排序参数
save:更新/增加的内容参数
return:返回值',
					'placeholder' => '请输入内容'
			],
			'api_id' => [
					'title' => 'api表关联ID',
					'type' => 'num',
					'field' => 'int(10) NULL',
					'placeholder' => '请输入内容'
			]
	];
}	