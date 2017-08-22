<?php
/**
 * WeisiteFooter数据模型
 */
class WeisiteFooterTable {
	// 数据表模型配置
	public $config = [
			'name' => 'weisite_footer',
			'title' => '底部导航',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'WeiSite'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '菜单名',
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
			'url' => [
					'title' => '关联URL',
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
			'url' => [
					'title' => '关联URL',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'title' => [
					'title' => '菜单名',
					'field' => 'varchar(50) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'remark' => '可创建最多 3 个一级菜单，每个一级菜单下可创建最多 5 个二级菜单。编辑中的菜单不会马上被用户看到，请放心调试。',
					'is_show' => 1
			],
			'pid' => [
					'title' => '一级菜单',
					'field' => 'tinyint(2) NULL',
					'type' => 'select',
					'remark' => '如果是一级菜单，选择“无”即可',
					'is_show' => 1,
					'extra' => '0:无'
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'tinyint(4) NULL',
					'type' => 'num',
					'remark' => '数值越小越靠前',
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
			'icon' => [
					'title' => '图标',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'remark' => '根据选择的底部模板决定是否需要上传图标',
					'is_show' => 1
			]
	];
}	