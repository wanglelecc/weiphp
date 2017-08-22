<?php
/**
 * ReserveAttribute数据模型
 */
class ReserveAttributeTable {
	// 数据表模型配置
	public $config = [
			'name' => 'reserve_attribute',
			'title' => '微预约字段',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '字段标题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'name' => [
					'title' => '字段名',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'type' => [
					'title' => '字段类型',
					'function' => '',
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
									'url' => '[EDIT]&reserve_id=[reserve_id]'
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
			'id' => [
					'title' => '主键',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'string',
					'is_must' => 1
			],
			'is_show' => [
					'title' => '是否显示',
					'field' => 'tinyint(2) NULL',
					'type' => 'select',
					'value' => 1,
					'remark' => '是否显示在微预约中',
					'is_show' => 1,
					'extra' => '1:显示
0:不显示'
			],
			'reserve_id' => [
					'title' => '微预约ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 4
			],
			'error_info' => [
					'title' => '出错提示',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '验证不通过时的提示语',
					'is_show' => 1
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '值越小越靠前',
					'is_show' => 1
			],
			'validate_rule' => [
					'title' => '正则验证',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '为空表示不作验证',
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
			'remark' => [
					'title' => '字段备注',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '用于微预约中的提示',
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
			'value' => [
					'title' => '默认值',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '字段的默认值',
					'is_show' => 1
			],
			'title' => [
					'title' => '字段标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'remark' => '请输入字段标题，用于微预约显示',
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
			'extra' => [
					'title' => '参数',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '字段类型为单选、多选、下拉选择和级联选择时的定义数据，其它字段类型为空',
					'is_show' => 1
			],
			'type' => [
					'title' => '字段类型',
					'field' => 'char(50) NOT NULL',
					'type' => 'select',
					'value' => 'string',
					'remark' => '用于微预约中的展示方式',
					'is_show' => 1,
					'extra' => 'string:单行输入
textarea:多行输入
radio:单选
checkbox:多选
select:下拉选择
datetime:时间
picture:上传图片',
					'is_must' => 1
			]
	];
}	