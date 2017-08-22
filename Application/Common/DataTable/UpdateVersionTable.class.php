<?php
/**
 * UpdateVersion数据模型
 */
class UpdateVersionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'update_version',
			'title' => '系统版本升级',
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
			'version' => [
					'title' => '版本号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '升级包名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'description' => [
					'title' => '描述',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'create_date' => [
					'title' => '创建时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'download_count' => [
					'title' => '下载统计数',
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
									'url' => '[EDIT]&id=[id]'
							],
							'1' => [
									'title' => '删除',
									'url' => '[DELETE]&id=[id]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'version' => [
					'title' => '版本号',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'num',
					'is_must' => 1,
					'is_show' => 1
			],
			'title' => [
					'title' => '升级包名',
					'field' => 'varchar(50) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'description' => [
					'title' => '描述',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'create_date' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'download_count' => [
					'title' => '下载统计',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num'
			],
			'package' => [
					'title' => '升级包地址',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'textarea',
					'is_must' => 1,
					'is_show' => 1
			]
	];
}	