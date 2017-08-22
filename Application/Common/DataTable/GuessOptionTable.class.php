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
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '活动名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'name' => [
					'title' => '选项名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'image' => [
					'title' => '选项图片',
					'function' => 'get_img_html',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'order' => [
					'title' => '选项顺序',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'guess_count' => [
					'title' => '竞猜人数',
					'function' => '',
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
									'title' => '查看选项竞猜记录',
									'url' => 'optionLog&guess_id=[guess_id]&option_id=[id]'
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
			'guess_id' => [
					'title' => '竞猜活动的Id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 4
			],
			'name' => [
					'title' => '选项名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'image' => [
					'title' => '选项图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'order' => [
					'title' => '选项顺序',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			],
			'guess_count' => [
					'title' => '竞猜人数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0
			]
	];
}	