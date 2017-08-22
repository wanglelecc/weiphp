<?php
/**
 * Sucai数据模型
 */
class SucaiTable {
	// 数据表模型配置
	public $config = [
			'name' => 'sucai',
			'title' => '素材管理',
			'search_key' => 'name',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'name' => [
					'title' => '素材名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'status' => [
					'title' => '状态',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'url' => [
					'title' => '页面URL',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'create_time' => [
					'title' => '申请时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'checked_time' => [
					'title' => '入库时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'name' => [
					'title' => '素材名称',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'status' => [
					'title' => '状态',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'value' => 'UnSubmit',
					'is_show' => 1,
					'extra' => 'UnSubmit:未提交
Waiting:入库中
Success:入库成功
Failure:入库失败'
			],
			'cTime' => [
					'title' => '提交时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'url' => [
					'title' => '实际摇一摇所使用的页面URL',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'type' => [
					'title' => '素材类型',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'detail' => [
					'title' => '素材内容',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'reason' => [
					'title' => '入库失败的原因',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'create_time' => [
					'title' => '申请时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'checked_time' => [
					'title' => '入库时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'source' => [
					'title' => '来源',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'source_id' => [
					'title' => '来源ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'wechat_id' => [
					'title' => '微信端的素材ID',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'uid' => [
					'title' => 'uid',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			]
	];
}	