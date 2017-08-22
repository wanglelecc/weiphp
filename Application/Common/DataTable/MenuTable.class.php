<?php
/**
 * Menu数据模型
 */
class MenuTable {
	// 数据表模型配置
	public $config = [
			'name' => 'menu',
			'title' => '系统菜单',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '菜单名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'title',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'menu_type' => [
					'title' => '菜单类型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'menu_type',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'addon_name' => [
					'title' => '插件名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'addon_name',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'url' => [
					'title' => '外链',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'url',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'target' => [
					'title' => '打开方式',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'target',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'is_hide' => [
					'title' => '隐藏',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'is_hide',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'sort' => [
					'title' => '排序号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'sort',
					'function' => '',
					'sort' => '',
					'href' => [ ]
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
					],
					'name' => 'ids',
					'function' => '',
					'sort' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'menu_type' => [
					'title' => '菜单类型',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:顶级菜单|pid@hide
1:侧栏菜单|pid@show',
					'placeholder' => '请输入内容'
			],
			'pid' => [
					'title' => '上级菜单',
					'field' => 'varchar(50) NULL',
					'type' => 'cascade',
					'is_show' => 1,
					'extra' => 'type=db&table=menu&menu_type=0&uid=[manager_id]&place=[place]',
					'placeholder' => '请输入内容'
			],
			'title' => [
					'title' => '菜单名',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'url_type' => [
					'title' => '链接类型',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:插件|addon_name@show,url@hide
1:外链|addon_name@hide,url@show',
					'placeholder' => '请输入内容'
			],
			'addon_name' => [
					'title' => '插件名',
					'field' => 'varchar(30) NULL',
					'type' => 'dynamic_select',
					'is_show' => 1,
					'extra' => 'table=addons&type=0&value_field=name&title_field=title&order=id asc',
					'placeholder' => '请输入内容'
			],
			'url' => [
					'title' => '外链',
					'type' => 'string',
					'field' => 'varchar(255) NULL',
					'is_show' => 1,
					'is_must' => 0
			],
			'target' => [
					'title' => '打开方式',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => '_self',
					'is_show' => 1,
					'extra' => '_self:当前窗口打开
_blank:在新窗口打开',
					'placeholder' => '请输入内容'
			],
			'is_hide' => [
					'title' => '是否隐藏',
					'field' => 'tinyint(2) NULL',
					'type' => 'radio',
					'is_show' => 1,
					'extra' => '0:否
1:是',
					'placeholder' => '请输入内容'
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '值越小越靠前',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'place' => [
					'title' => '位置',
					'field' => 'tinyint(1) NULL',
					'type' => 'string',
					'is_show' => 4,
					'placeholder' => '请输入内容'
			]
	];
}	