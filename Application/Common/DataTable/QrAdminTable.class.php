<?php
/**
 * QrAdmin数据模型
 */
class QrAdminTable {
	// 数据表模型配置
	public $config = [
			'name' => 'qr_admin',
			'title' => '扫码管理',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'qr_code' => [
					'title' => '二维码',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'action_name' => [
					'title' => '类型',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'group_id' => [
					'title' => '用户组',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'tag_ids' => [
					'title' => '标签',
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
			'action_name' => [
					'title' => '类型',
					'field' => 'varchar(30) NOT NULL',
					'type' => 'bool',
					'value' => 'QR_SCENE',
					'remark' => '临时二维码最长有效期是30天',
					'is_show' => 1,
					'extra' => 'QR_SCENE:临时二维码
QR_LIMIT_SCENE:永久二维码',
					'is_must' => 1
			],
			'group_id' => [
					'title' => '用户组',
					'field' => 'int(10) NULL',
					'type' => 'dynamic_select',
					'value' => 0,
					'is_show' => 1,
					'extra' => 'table=auth_group&value_field=id&title_field=title&first_option=不选择'
			],
			'tag_ids' => [
					'title' => '用户标签',
					'field' => 'varchar(255) NULL',
					'type' => 'dynamic_checkbox',
					'is_show' => 1,
					'extra' => 'table=user_tag'
			],
			'qr_code' => [
					'title' => '二维码',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'material' => [
					'title' => '扫码后的回复内容',
					'field' => 'varchar(50) NULL',
					'type' => 'material',
					'is_show' => 1
			],
			'mult_pic' => [
					'title' => '多图上传',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			]
	];
}	