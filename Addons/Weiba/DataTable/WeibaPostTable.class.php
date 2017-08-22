<?php
/**
 * WeibaPost数据模型
 */
class WeibaPostTable {
	// 数据表模型配置
	public $config = [
			'name' => 'weiba_post',
			'title' => '微社区帖子',
			'search_key' => 'title:请输入标题搜索',
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
					'title' => '帖子编号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '帖子标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'weiba_id' => [
					'title' => '所属版块',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'post_uid' => [
					'title' => '发帖人',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'read_count' => [
					'title' => '浏览数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'reply_count' => [
					'title' => '回复数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'post_time' => [
					'title' => '发帖时间',
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
			'weiba_id' => [
					'title' => '所属版块',
					'field' => 'int(10) NULL',
					'type' => 'dynamic_select',
					'is_show' => 1,
					'extra' => 'table=weiba&value_field=id&title_field=weiba_name'
			],
			'post_uid' => [
					'title' => '发表者uid',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'title' => [
					'title' => '帖子标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'content' => [
					'title' => '帖子内容',
					'field' => 'text NOT NULL',
					'type' => 'editor',
					'is_must' => 1,
					'is_show' => 1
			],
			'post_time' => [
					'title' => '发表时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'reply_count' => [
					'title' => '回复数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'read_count' => [
					'title' => '浏览数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'last_reply_uid' => [
					'title' => '最后回复人',
					'field' => 'varchar(50) NULL',
					'type' => 'string'
			],
			'last_reply_time' => [
					'title' => '最后回复时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			],
			'digest' => [
					'title' => '全局精华',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool',
					'extra' => '0:否
1:是'
			],
			'top' => [
					'title' => '置顶帖',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'extra' => '0:否
1:吧内
2:全局'
			],
			'lock' => [
					'title' => '锁帖',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool',
					'remark' => '不允许回复',
					'extra' => '0:否
1:是'
			],
			'recommend' => [
					'title' => '是否设为推荐',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool',
					'extra' => '0:否
1:是'
			],
			'recommend_time' => [
					'title' => '设为推荐的时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			],
			'is_del' => [
					'title' => '是否已删除',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'extra' => '0:否
1:是'
			],
			'reply_all_count' => [
					'title' => '全部评论数目',
					'field' => 'int(11) NULL',
					'type' => 'num'
			],
			'attach' => [
					'title' => 'attach',
					'field' => 'varchar(255) NULL',
					'type' => 'file'
			],
			'praise' => [
					'title' => '喜欢',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'from' => [
					'title' => '客户端类型',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '0:网站
1:手机网页版
2:android
3:iphone'
			],
			'top_time' => [
					'title' => 'top_time',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'is_index' => [
					'title' => '是否推荐到首页',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'extra' => '0:否
1:是'
			],
			'index_img' => [
					'title' => 'index_img',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture'
			],
			'is_index_time' => [
					'title' => 'is_index_time',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'img_ids' => [
					'title' => 'img_ids',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'tag_id' => [
					'title' => '标签',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'index_order' => [
					'title' => '首页帖子排序',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'is_event' => [
					'title' => '类型',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'extra' => '0:话题
1:活动'
			],
			'globle_recommend' => [
					'title' => '推荐到全站',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'extra' => '0:否
1:是'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			]
	];
}	