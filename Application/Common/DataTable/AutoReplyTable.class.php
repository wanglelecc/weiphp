<?php
/**
 * AutoReply数据模型
 */
class AutoReplyTable {
	// 数据表模型配置
	public $config = [
			'name' => 'auto_reply',
			'title' => '自动回复',
			'search_key' => 'keyword:请输入关键词',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'keyword' => [
					'title' => '关键词',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'content' => [
					'title' => '文件内容',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'group_id' => [
					'title' => '图文',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'image_id' => [
					'title' => '图片',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'voice_id' => [
					'title' => '语音',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'video_id' => [
					'title' => '视频',
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
									'title' => '编辑',
									'url' => '[EDIT]&type=[msg_type]'
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
			'id' => [
					'title' => '主键',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'string',
					'is_must' => 1
			],
			'keyword' => [
					'title' => '关键词',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '多个关键词可以用空格分开，如“高富帅 白富美”',
					'is_show' => 1,
					'is_must' => 1
			],
			'msg_type' => [
					'title' => '消息类型',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => 'text',
					'extra' => 'text:文本|content@show,group_id@hide,image_id@hide,voice_id@hide,video_id@hide
news:图文|content@hide,group_id@show,image_id@hide,voice_id@hide,video_id@hide
image:图片|content@hide,group_id@hide,image_id@show,voice_id@hide,video_id@hide
voice:语音|content@hide,group_id@hide,image_id@hide,voice_id@show,video_id@hide
video:视频|content@hide,group_id@hide,image_id@hide,voice_id@hide,video_id@show
',
					'is_must' => 1
			],
			'content' => [
					'title' => '文本内容',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'group_id' => [
					'title' => '图文',
					'field' => 'int(10) NULL',
					'type' => 'news',
					'is_show' => 1
			],
			'image_id' => [
					'title' => '上传图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'manager_id' => [
					'title' => '管理员ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'image_material' => [
					'title' => '素材图片id',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'voice_id' => [
					'title' => '语音素材id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4
			],
			'video_id' => [
					'title' => '视频素材id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4
			]
	];
}	