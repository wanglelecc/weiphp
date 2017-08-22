<?php
/**
 * Message数据模型
 */
class MessageTable {
	// 数据表模型配置
	public $config = [
			'name' => 'message',
			'title' => '群发消息',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'bind_keyword' => [
					'title' => '关联关键词',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'remark' => '先在自定义回复里增加图文，多图文或者文本内容，再把它的关键词填写到这里',
					'is_show' => 1
			],
			'preview_openids' => [
					'title' => '预览人OPENID',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '选填，多个可用逗号或者换行分开，OpenID值可在微信用户的列表中找到',
					'is_show' => 1
			],
			'group_id' => [
					'title' => '群发对象',
					'field' => 'int(10) NULL',
					'type' => 'dynamic_select',
					'remark' => '全部用户或者某分组用户',
					'is_show' => 1,
					'extra' => 'table=auth_group&manager_id=[manager_id]&token=[token]&value_field=id&title_field=title&first_option=全部用户'
			],
			'type' => [
					'title' => '素材来源',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:站内关键词|bind_keyword@show,media_id@hide
1:微信永久素材ID|bind_keyword@hide,media_id@show'
			],
			'media_id' => [
					'title' => '微信素材ID',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'remark' => '微信后台的素材管理里永久素材的media_id值',
					'is_show' => 1
			],
			'send_type' => [
					'title' => '发送方式',
					'field' => 'tinyint(1) NULL',
					'type' => 'bool',
					'is_show' => 1,
					'extra' => '0:按用户组发送|group_id@show,send_openids@hide
1:指定OpenID发送|group_id@hide,send_openids@show'
			],
			'send_openids' => [
					'title' => '要发送的OpenID',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '多个可用逗号或者换行分开，OpenID值可在微信用户的列表中找到',
					'is_show' => 1
			],
			'msg_id' => [
					'title' => 'msg_id',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'content' => [
					'title' => '文本消息内容',
					'field' => 'text NULL',
					'type' => 'textarea'
			],
			'msgtype' => [
					'title' => '消息类型',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'appmsg_id' => [
					'title' => '图文id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'voice_id' => [
					'title' => '语音id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'video_id' => [
					'title' => '视频id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'cTime' => [
					'title' => '群发时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function'
			]
	];
}	