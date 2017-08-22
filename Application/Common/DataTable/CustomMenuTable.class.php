<?php
/**
 * CustomMenu数据模型
 */
class CustomMenuTable {
	// 数据表模型配置
	public $config = [
			'name' => 'custom_menu',
			'title' => '自定义菜单',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '菜单名',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'keyword' => [
					'title' => '关联关键词',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'url' => [
					'title' => '关联URL',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'sort' => [
					'title' => '排序号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'urls' => [
					'title' => '操作',
					'function' => '',
					'width' => '',
					'sort' => '',
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
			'id' => [
					'title' => '主键',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'string',
					'is_must' => 1
			],
			'url' => [
					'title' => '关联URL',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'keyword' => [
					'title' => '关联关键词',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'title' => [
					'title' => '菜单名',
					'field' => 'varchar(50) NOT NULL',
					'type' => 'string',
					'remark' => '可创建最多 3 个一级菜单，每个一级菜单下可创建最多 5 个二级菜单。编辑中的菜单不会马上被用户看到，请放心调试。',
					'is_show' => 1,
					'is_must' => 1
			],
			'pid' => [
					'title' => '一级菜单',
					'field' => 'int(10) NULL',
					'type' => 'select',
					'value' => 0,
					'remark' => '如果是一级菜单，选择“无”即可',
					'is_show' => 1,
					'extra' => '0:无'
			],
			'sort' => [
					'title' => '排序号',
					'field' => 'tinyint(4) NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '数值越小越靠前',
					'is_show' => 1
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'type' => [
					'title' => '类型',
					'field' => 'varchar(30) NULL',
					'type' => 'bool',
					'value' => 'click',
					'is_show' => 1,
					'extra' => 'click:点击推事件|keyword@show,url@hide
view:跳转URL|keyword@hide,url@show
scancode_push:扫码推事件|keyword@show,url@hide
scancode_waitmsg:扫码带提示|keyword@show,url@hide
pic_sysphoto:弹出系统拍照发图|keyword@show,url@hide
pic_photo_or_album:弹出拍照或者相册发图|keyword@show,url@hide
pic_weixin:弹出微信相册发图器|keyword@show,url@hide
location_select:弹出地理位置选择器|keyword@show,url@hide
none:无事件的一级菜单|keyword@hide,url@hide'
			],
			'from_type' => [
					'title' => '配置动作',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => -1,
					'is_show' => 1,
					'extra' => '0:站内信息|keyword@hide,url@hide,type@hide,sucai_type@hide,addon@show,jump_type@show
1:站内素材|keyword@hide,url@hide,type@hide,sucai_type@show,addon@hide,jump_type@hide
9:自定义|keyword@show,url@hide,type@show,addon@hide,sucai_type@hide,jump_type@hide
-1:请选择|keyword@hide,url@hide,type@hide,addon@hide,sucai_type@hide,jump_type@hide'
			],
			'addon' => [
					'title' => '选择插件',
					'field' => 'char(30) NULL',
					'type' => 'select',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:请选择'
			],
			'target_id' => [
					'title' => '选择内容',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 4,
					'extra' => '0:请选择'
			],
			'sucai_type' => [
					'title' => '素材类型',
					'field' => 'varchar(50) NULL',
					'type' => 'material',
					'is_show' => 1
			],
			'jump_type' => [
					'title' => '推送类型',
					'field' => 'int(10) NULL',
					'type' => 'radio',
					'value' => 0,
					'is_show' => 1,
					'extra' => '1:URL|keyword@hide,url@show
0:关键词|keyword@show,url@hide'
			]
	];
}	