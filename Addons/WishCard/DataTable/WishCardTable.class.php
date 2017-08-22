<?php
/**
 * WishCard数据模型
 */
class WishCardTable {
	// 数据表模型配置
	public $config = [
			'name' => 'wish_card',
			'title' => '微贺卡',
			'search_key' => 'content:祝福语',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'WishCard'
	];
	
	// 列表定义
	public $list_grid = [
			'send_name' => [
					'title' => '发送人',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'receive_name' => [
					'title' => '接收人',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'content' => [
					'title' => '祝福语',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'create_time' => [
					'title' => '创建时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'read_count' => [
					'title' => '浏览次数',
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
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'1' => [
									'title' => '预览',
									'url' => 'preview?id=[id]&target=_blank'
							],
							'2' => [
									'title' => '删除',
									'url' => '[DELETE]'
							],
							'3' => [
									'title' => '复制链接',
									'url' => 'WishCard/Wap/card_show&id=[id]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'send_name' => [
					'title' => '发送人',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'receive_name' => [
					'title' => '接收人',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'content' => [
					'title' => '祝福语',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'create_time' => [
					'title' => ' 创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'template' => [
					'title' => '模板',
					'field' => 'char(50) NULL',
					'type' => 'string',
					'remark' => '模板的文件夹名称，不能为中文',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'template_cate' => [
					'title' => '模板分类',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 4,
					'placeholder' => '请输入内容'
			],
			'read_count' => [
					'title' => '浏览次数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'mid' => [
					'title' => '用户Id',
					'field' => 'varchar(255) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			]
	];
}	