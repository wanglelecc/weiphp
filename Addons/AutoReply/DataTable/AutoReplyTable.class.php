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
			'list_row' => 10,
			'addon' => 'AutoReply'
	];
	
	// 列表定义
	public $list_grid = [
			'keyword' => [
					'title' => '关键词',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'keyword',
					'function' => '',
					'href' => [ ]
			],
			'content' => [
					'title' => '文件内容',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'content',
					'function' => '',
					'href' => [ ]
			],
			'group_id' => [
					'title' => '图文',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'group_id',
					'function' => '',
					'href' => [ ]
			],
			'image_id' => [
					'title' => '图片',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'image_id',
					'function' => '',
					'href' => [ ]
			],
			'voice_id' => [
					'title' => '语音',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'voice_id',
					'function' => '',
					'href' => [ ]
			],
			'video_id' => [
					'title' => '视频',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'video_id',
					'function' => '',
					'href' => [ ]
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '编辑',
									'url' => '[EDIT]&type=[msg_type]'
							],
							'1' => [
									'title' => '删除',
									'url' => '[DELETE]'
							]
					],
					'name' => 'ids',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'keyword' => [
					'title' => '关键词',
					'type' => 'string',
					'field' => 'varchar(255) NOT NULL',
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
					'placeholder' => '请输入内容'
			],
			'content' => [
					'title' => '文本内容',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'group_id' => [
					'title' => '图文',
					'field' => 'int(10) NULL',
					'type' => 'news',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'image_id' => [
					'title' => '上传图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'manager_id' => [
					'title' => '管理员ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'image_material' => [
					'title' => '素材图片id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'voice_id' => [
					'title' => '语音素材id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4,
					'placeholder' => '请输入内容'
			],
			'video_id' => [
					'title' => '视频素材id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4,
					'placeholder' => '请输入内容'
			]
	];
}	