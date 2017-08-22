<?php
/**
 * Docs数据模型
 */
class DocsTable {
	// 数据表模型配置
	public $config = [
			'name' => 'docs',
			'title' => '文档库',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'WeiApp'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '文件名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 1,
					'name' => 'title',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '上传时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'cTime',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'download_count' => [
					'title' => '下载次数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 1,
					'name' => 'download_count',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'url' => [
					'title' => '下载地址',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'url',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'urls' => [
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
					'name' => 'urls',
					'function' => '',
					'sort' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'title' => [
					'title' => '文件名',
					'type' => 'string',
					'field' => 'varchar(100) NULL',
					'is_show' => 0,
					'is_must' => 0
			],
			'url' => [
					'title' => '下载地址',
					'type' => 'string',
					'field' => 'varchar(255) NULL',
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '上传时间',
					'type' => 'datetime',
					'field' => 'int(10) NULL',
					'auto_type' => 'function',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			],
			'download_count' => [
					'title' => '下载次数',
					'type' => 'num',
					'field' => 'int(10) NULL',
					'placeholder' => '请输入内容'
			],
			'file_id' => [
					'title' => '文件在系统中的ID',
					'type' => 'file',
					'field' => 'int(10) UNSIGNED NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	