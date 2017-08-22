<?php
/**
 * SportsTeam数据模型
 */
class SportsTeamTable {
	// 数据表模型配置
	public $config = [
			'name' => 'sports_team',
			'title' => '比赛球队',
			'search_key' => 'title:请输入球队名',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'logo' => [
					'title' => '球队图标',
					'function' => 'get_img_html',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'title' => [
					'title' => '球队名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'intro' => [
					'title' => '球队说明',
					'function' => 'lists_msubstr',
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
			'id' => [
					'title' => '主键',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'string',
					'is_must' => 1
			],
			'title' => [
					'title' => '球队名称',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'remark' => '请输入球队名称',
					'is_show' => 1,
					'is_must' => 1,
					'validate_rule' => 'unique',
					'validate_time' => 3,
					'error_info' => '球队名称不能重复',
					'validate_type' => 'unique'
			],
			'logo' => [
					'title' => '球队图标',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1,
					'is_must' => 1
			],
			'intro' => [
					'title' => '球队说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'pid' => [
					'title' => 'pid',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			]
	];
}	