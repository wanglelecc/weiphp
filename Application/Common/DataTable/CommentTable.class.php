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
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'headimgurl' => [
					'title' => '用户头像',
					'function' => 'url_img_html',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'nickname' => [
					'title' => '用户姓名',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'content' => [
					'title' => '评论内容',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '评论时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'is_audit' => [
					'title' => '审核状态',
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
									'title' => '删除',
									'url' => '[DELETE]'
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
					'type' => 'num',
					'is_must' => 1
			],
			'content' => [
					'title' => '评论内容',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_must' => 1
			],
			'is_audit' => [
					'title' => '是否审核',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 0,
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