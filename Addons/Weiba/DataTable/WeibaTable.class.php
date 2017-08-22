<?php
/**
 * Weiba数据模型
 */
class WeibaTable {
	// 数据表模型配置
	public $config = [
			'name' => 'weiba',
			'title' => '微社区',
			'search_key' => 'weiba_name:请输入版块名称搜索',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Weiba'
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '微吧ID',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'weiba_name' => [
					'title' => '版块名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cid' => [
					'title' => '版块分类',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'thread_count' => [
					'title' => '帖子数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'follower_count' => [
					'title' => '成员数',
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
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'cid' => [
					'title' => '所属分类',
					'field' => 'varchar(100) NULL',
					'type' => 'dynamic_select',
					'is_show' => 1,
					'extra' => 'table=weiba_category&value_field=id&title_field=name'
			],
			'weiba_name' => [
					'title' => '版块名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'uid' => [
					'title' => '创建者ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'ctime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'logo' => [
					'title' => '版块图标',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'intro' => [
					'title' => '版块说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'who_can_post' => [
					'title' => '发帖权限',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:所有人
1:仅成员
2:版块管理员 
3:版块圈主'
			],
			'who_can_reply' => [
					'title' => '回帖权限',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool',
					'extra' => '0:所有人
1:仅成员'
			],
			'follower_count' => [
					'title' => '成员数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'thread_count' => [
					'title' => '帖子数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'admin_uid' => [
					'title' => '版主',
					'field' => 'varchar(255) NULL',
					'type' => 'users',
					'is_show' => 1
			],
			'recommend' => [
					'title' => '是否设置为推荐',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:否
1:是'
			],
			'status' => [
					'title' => '审核状态',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '0:未通过
1:已通过'
			],
			'is_del' => [
					'title' => '是否删除',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool'
			],
			'notify' => [
					'title' => '版块公告',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'avatar_big' => [
					'title' => 'avatar_big',
					'field' => 'text NULL',
					'type' => 'textarea'
			],
			'avatar_middle' => [
					'title' => 'avatar_middle',
					'field' => 'text NULL',
					'type' => 'textarea'
			],
			'new_count' => [
					'title' => '最新帖子数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'new_day' => [
					'title' => 'new_day',
					'field' => 'date NULL',
					'type' => 'date'
			],
			'info' => [
					'title' => '申请附件信息',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			]
	];
}	