<?php
/**
 * CommonCategory数据模型
 */
class CommonCategoryTable {
	// 数据表模型配置
	public $config = [
			'name' => 'common_category',
			'title' => '通用分类',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'code' => [
					'title' => '编号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'icon' => [
					'title' => '图标',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'sort' => [
					'title' => '排序号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'is_show' => [
					'title' => '显示',
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
			'name' => [
					'title' => '分类标识',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '只能使用英文'
			],
			'title' => [
					'title' => '分类标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'icon' => [
					'title' => '分类图标',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'pid' => [
					'title' => '上一级分类',
					'field' => 'int(10) unsigned NULL',
					'type' => 'select',
					'remark' => '如果你要增加一级分类，这里选择“无”即可',
					'is_show' => 1,
					'extra' => '0:无'
			],
			'path' => [
					'title' => '分类路径',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'module' => [
					'title' => '分类所属功能',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'remark' => '数值越小越靠前',
					'is_show' => 1
			],
			'is_show' => [
					'title' => '是否显示',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'is_show' => 1,
					'extra' => '0:不显示
1:显示'
			],
			'intro' => [
					'title' => '分类描述',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'code' => [
					'title' => '分类扩展编号',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '原分类或者导入分类的扩展编号'
			]
	];
}	