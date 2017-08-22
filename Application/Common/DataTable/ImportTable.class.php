<?php
/**
 * Import数据模型
 */
class ImportTable {
	// 数据表模型配置
	public $config = [
			'name' => 'import',
			'title' => '导入数据',
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
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'attach' => [
					'title' => '上传文件',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'file',
					'is_must' => 1,
					'remark' => '支持xls,xlsx两种格式',
					'is_show' => 1
			]
	];
}	