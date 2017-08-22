<?php
/**
 * GuessOption数据模型
 */
class GuessOptionTable {
	// 数据表模型配置
	public $config = [
			'name' => 'guess_option',
			'title' => '竞猜项目',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Guess'
	];
	
	// 列表定义
	public $list_grid = [
			'guess_id' => [
					'title' => '活动名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'name' => [
					'title' => '选项名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'image' => [
					'title' => '选项图片',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'order' => [
					'title' => '选项顺序',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'guess_count' => [
					'title' => '竞猜人数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'urls' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '查看选项竞猜记录',
									'url' => 'optionLog&guess_id=[guess_id]&option_id=[id]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'guess_id' => [
					'title' => '竞猜活动的Id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4,
					'placeholder' => '请输入内容'
			],
			'name' => [
					'title' => '选项名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'image' => [
					'title' => '选项图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'order' => [
					'title' => '选项顺序',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'guess_count' => [
					'title' => '竞猜人数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			]
	];
}	