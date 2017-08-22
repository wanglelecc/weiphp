<?php
/**
 * DebugLog数据模型
 */
class DebugLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'debug_log',
			'title' => '调试日志',
			'search_key' => '',
			'add_button' => 0,
			'del_button' => 0,
			'search_button' => 0,
			'check_all' => 0,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'cTime_format' => [
					'title' => '格式化后的时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'data' => [
					'title' => '序列化后的参数1',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'data' => [
					'title' => '序列化后的参数1',
					'type' => 'textarea',
					'field' => 'text NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'data_post' => [
					'title' => '序列化后的参数2',
					'type' => 'textarea',
					'field' => 'text NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime_format' => [
					'title' => '格式化后的时间',
					'type' => 'string',
					'field' => 'varchar(30) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '记录时间',
					'type' => 'datetime',
					'field' => 'int(10) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	