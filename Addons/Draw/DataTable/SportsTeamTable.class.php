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
			'list_row' => 20,
			'addon' => 'Draw'
	];
	
	// 列表定义
	public $list_grid = [
			'logo' => [
					'title' => '球队图标',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '球队名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'intro' => [
					'title' => '球队说明',
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
			'title' => [
					'title' => '球队名称',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'remark' => '请输入球队名称',
					'is_show' => 1,
					'validate_type' => 'unique',
					'validate_rule' => 'unique',
					'validate_time' => 3,
					'error_info' => '球队名称不能重复'
			],
			'logo' => [
					'title' => '球队图标',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
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
					'type' => 'num'
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'int(10) NULL',
					'type' => 'num'
			]
	];
}	