<?php
/**
 * Store数据模型
 */
class StoreTable {
	// 数据表模型配置
	public $config = [
			'name' => 'store',
			'title' => '应用商店',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => 'ID值',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'type' => [
					'title' => '应用类型',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '应用标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'price' => [
					'title' => '价格',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'logo' => [
					'title' => '应用LOGO',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'mTime' => [
					'title' => '更新时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'audit' => [
					'title' => '审核状态',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'audit_time' => [
					'title' => '审核时间',
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
			'title' => [
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1
			],
			'uid' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'content' => [
					'title' => '内容',
					'field' => 'text NULL',
					'type' => 'editor',
					'is_show' => 1
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'attach' => [
					'title' => '插件安装包',
					'field' => 'varchar(255) NULL',
					'type' => 'file',
					'remark' => '需要上传zip文件',
					'is_show' => 1
			],
			'is_top' => [
					'title' => '置顶',
					'field' => 'int(10) NULL',
					'type' => 'bool',
					'remark' => '0表示不置顶，否则其它值表示置顶且值是置顶的时间',
					'is_show' => 1,
					'extra' => '0:不置顶
1:置顶'
			],
			'cid' => [
					'title' => '分类',
					'field' => 'tinyint(4) NULL',
					'type' => 'select',
					'extra' => '1:基础模块
2:行业模块
3:会议活动
4:娱乐模块
5:其它模块'
			],
			'view_count' => [
					'title' => '浏览数',
					'field' => 'int(11) unsigned NULL',
					'type' => 'num'
			],
			'img_1' => [
					'title' => '插件截图1',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'img_2' => [
					'title' => '插件截图2',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'img_3' => [
					'title' => '插件截图3',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'img_4' => [
					'title' => '插件截图4',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'download_count' => [
					'title' => '下载数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num'
			]
	];
}	