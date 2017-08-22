<?php
/**
 * MaterialFile数据模型
 */
class MaterialFileTable {
	// 数据表模型配置
	public $config = [
			'name' => 'material_file',
			'title' => '文件素材',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => '',
					'function' => '',
					'href' => [ ]
			]
	];
	
	// 字段定义
	public $fields = [
			'file_id' => [
					'title' => '上传文件',
					'type' => 'file',
					'field' => 'int(10) NOT NULL',
					'is_show' => 1,
					'is_must' => 1
			],
			'cover_url' => [
					'title' => '本地URL',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			],
			'media_id' => [
					'title' => '微信端图文消息素材的media_id',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			],
			'wechat_url' => [
					'title' => '微信端的文件地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function',
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
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'title' => [
					'title' => '素材名称',
					'type' => 'string',
					'field' => 'varchar(255) NOT NULL',
					'remark' => '长度限制为21个字内',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'type' => [
					'title' => '类型',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'extra' => '1:语音素材
2:视频素材',
					'placeholder' => '请输入内容'
			],
			'introduction' => [
					'title' => '描述',
					'field' => 'text NULL',
					'type' => 'textarea',
					'placeholder' => '请输入内容'
			],
			'is_use' => [
					'title' => '可否使用',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1,
					'extra' => '0:不可用
1:可用',
					'placeholder' => '请输入内容'
			],
			'aim_id' => [
					'title' => '添加来源标识id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'aim_table' => [
					'title' => '来源表名',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			]
	];
}	