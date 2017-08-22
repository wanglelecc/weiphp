<?php
/**
 * Comment数据模型
 */
class CommentTable {
	// 数据表模型配置
	public $config = [
			'name' => 'comment',
			'title' => '评论互动',
			'search_key' => 'content:请输入评论内容',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Comment'
	];
	
	// 列表定义
	public $list_grid = [
			'headimgurl' => [
					'title' => '用户头像',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'nickname' => [
					'title' => '用户姓名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'content' => [
					'title' => '评论内容',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cTime' => [
					'title' => '评论时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'is_audit' => [
					'title' => '审核状态',
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
									'title' => '删除',
									'url' => '[DELETE]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'aim_table' => [
					'title' => '评论关联数据表',
					'field' => 'varchar(30) NULL',
					'type' => 'string'
			],
			'aim_id' => [
					'title' => '评论关联ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'cTime' => [
					'title' => '评论时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			],
			'follow_id' => [
					'title' => 'follow_id',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'content' => [
					'title' => '评论内容',
					'field' => 'text NULL',
					'type' => 'textarea'
			],
			'is_audit' => [
					'title' => '是否审核',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:未审核
1:已审核'
			],
			'uid' => [
					'title' => 'uid',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 3,
					'auto_type' => 'function'
			]
	];
}	