<?php
/**
 * ShopVote数据模型
 */
class ShopVoteTable {
	// 数据表模型配置
	public $config = [
			'name' => 'shop_vote',
			'title' => '商城微投票',
			'search_key' => 'title:请输入活动名称',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Vote'
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '活动名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'select_type' => [
					'title' => '投票类型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'start_time' => [
					'title' => '开始时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'end_time' => [
					'title' => '结束时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'remark' => [
					'title' => '活动说明',
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
									'url' => '[DELETE]'
							],
							'2' => [
									'title' => '投票选项',
									'url' => 'option_lists&vote_id=[id]'
							],
							'3' => [
									'title' => '投票记录',
									'url' => 'show_log&vote_id=[id]'
							],
							'4' => [
									'title' => '预览',
									'url' => 'preview&vote_id=[id]'
							],
							'5' => [
									'title' => '复制链接',
									'url' => 'Vote/Wap/index&vote_id=[id]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'title' => [
					'title' => '活动名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'select_type' => [
					'title' => '投票类型',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'value' => 1,
					'is_show' => 1,
					'extra' => '1:单选|multi_num@hide
2:多选|multi_num@show'
			],
			'multi_num' => [
					'title' => '多选限制',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '0代表不限制',
					'is_show' => 1
			],
			'start_time' => [
					'title' => '开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'end_time' => [
					'title' => '结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'remark' => [
					'title' => '活动说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'manager_id' => [
					'title' => '管理员id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'is_verify' => [
					'title' => '投票是否需要填写验证码',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'remark' => '防止刷票行为时需要开启',
					'is_show' => 1,
					'extra' => '0:不需要
1:需要'
			]
	];
}	