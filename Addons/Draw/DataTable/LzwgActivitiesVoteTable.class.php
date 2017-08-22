<?php
/**
 * LzwgActivitiesVote数据模型
 */
class LzwgActivitiesVoteTable {
	// 数据表模型配置
	public $config = [
			'name' => 'lzwg_activities_vote',
			'title' => '投票答题活动',
			'search_key' => 'lzwg_id:活动名称',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Draw'
	];
	
	// 列表定义
	public $list_grid = [
			'lzwg_name' => [
					'title' => '活动名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'start_time' => [
					'title' => '活动开始时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'end_time' => [
					'title' => '活动结束时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'lzwg_type' => [
					'title' => '活动类型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'vote_title' => [
					'title' => '题目',
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
							],
							'2' => [
									'title' => '用户参与分析',
									'url' => 'tongji&id=[id]'
							]
					]
			],
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'lzwg_id' => [
					'title' => '活动编号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'lzwg_type' => [
					'title' => '活动类型',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'is_show' => 1,
					'extra' => '0:投票
1:调查'
			],
			'vote_id' => [
					'title' => '题目编号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'vote_type' => [
					'title' => '问题类型',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'value' => 1,
					'is_show' => 1,
					'extra' => '0:单选
1:多选'
			],
			'vote_limit' => [
					'title' => '最多选择几项',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			]
	];
}	