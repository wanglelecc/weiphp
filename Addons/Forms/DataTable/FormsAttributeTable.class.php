<?php
/**
 * FormsAttribute数据模型
 */
class FormsAttributeTable {
	// 数据表模型配置
	public $config = [
			'name' => 'forms_attribute',
			'title' => '表单字段',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Forms'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '字段标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'name' => [
					'title' => '字段名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'type' => [
					'title' => '字段类型',
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
									'url' => '[EDIT]&forms_id=[forms_id]'
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
			'type' => [
					'title' => '字段类型',
					'field' => 'char(50) NOT NULL',
					'type' => 'select',
					'value' => 'string',
					'is_must' => 1,
					'remark' => '用于表单中的展示方式',
					'is_show' => 1,
					'extra' => 'string:单行输入
textarea:多行输入
radio:单选
checkbox:多选
select:下拉选择
datetime:时间
picture:上传图片'
			],
			'title' => [
					'title' => '字段标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'remark' => '请输入字段标题，用于表单显示',
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
			'extra' => [
					'title' => '参数',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '字段类型为单选、多选、下拉选择和级联选择时的定义数据，其它字段类型为空',
					'is_show' => 1
			],
			'value' => [
					'title' => '默认值',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '字段的默认值',
					'is_show' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'name' => [
					'title' => '字段名',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'remark' => '请输入字段名 英文字母开头，长度不超过30',
					'is_show' => 1
			],
			'remark' => [
					'title' => '字段备注',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '用于表单中的提示',
					'is_show' => 1
			],
			'is_must' => [
					'title' => '是否必填',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'remark' => '用于自动验证',
					'is_show' => 1,
					'extra' => '0:否
1:是'
			],
			'validate_rule' => [
					'title' => '正则验证',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '为空表示不作验证',
					'is_show' => 1
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'remark' => '值越小越靠前',
					'is_show' => 1
			],
			'error_info' => [
					'title' => '出错提示',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '验证不通过时的提示语',
					'is_show' => 1
			],
			'forms_id' => [
					'title' => '表单ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 4
			],
			'is_show' => [
					'title' => '是否显示',
					'field' => 'tinyint(2) NULL',
					'type' => 'select',
					'value' => 1,
					'remark' => '是否显示在表单中',
					'is_show' => 1,
					'extra' => '1:显示
0:不显示'
			]
	];
}	