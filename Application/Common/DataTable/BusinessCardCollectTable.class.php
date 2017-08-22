<?php
/**
 * BusinessCardCollect数据模型
 */
class BusinessCardCollectTable {
	// 数据表模型配置
	public $config = [
			'name' => 'business_card_collect',
			'title' => '名片收藏',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
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
			'from_uid' => [
					'title' => '收藏人ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'to_uid' => [
					'title' => '被收藏人的ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'cTime' => [
					'title' => '收藏时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			]
	];
}	