<?php
/**
 * Invite数据模型
 */
class InviteTable {
	// 数据表模型配置
	public $config = [
			'name' => 'invite',
			'title' => '微邀约',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Invite'
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
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'title',
					'function' => '',
					'href' => [ ]
			],
			'experience' => [
					'title' => '消耗经验值',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'experience',
					'function' => '',
					'href' => [ ]
			],
			'coupon_id' => [
					'title' => '优惠券编号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'coupon_id',
					'function' => '',
					'href' => [ ]
			],
			'coupon_name' => [
					'title' => '优惠券标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'coupon_name',
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
									'url' => '[EDIT]'
							],
							'1' => [
									'title' => '删除',
									'url' => '[DELETE]'
							],
							'2' => [
									'title' => '领取记录',
									'url' => 'Coupon/Sn/lists?target_id=[coupon_id]&target=_blank'
							],
							'3' => [
									'title' => '预览',
									'url' => 'preview?id=[id]&target=_blank'
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
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'keyword_type' => [
					'title' => '关键词类型',
					'type' => 'select',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:完全匹配
1:左边匹配
2:右边匹配
3:模糊匹配',
					'placeholder' => '请输入内容'
			],
			'title' => [
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'intro' => [
					'title' => '封面简介',
					'type' => 'textarea',
					'field' => 'text NOT NULL',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'mTime' => [
					'title' => '修改时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'cover' => [
					'title' => '封面图片',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'picture',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) unsigned NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'experience' => [
					'title' => '消耗体力值',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'num' => [
					'title' => '邀请人数',
					'type' => 'num',
					'field' => 'int(10) NOT NULL',
					'remark' => '邀请多少人后才能用优惠券',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'coupon_id' => [
					'title' => '优惠券编号',
					'type' => 'dynamic_select',
					'field' => 'varchar(100) NOT NULL',
					'remark' => '可以在优惠券列表中找到对应的编号',
					'is_show' => 1,
					'is_must' => 1,
					'placeholder' => '请输入内容'
			],
			'coupon_num' => [
					'title' => '优惠券数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '赠送多少张优惠券',
					'placeholder' => '请输入内容'
			],
			'receive_num' => [
					'title' => '已领取优惠券数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'content' => [
					'title' => '邀约介绍',
					'type' => 'editor',
					'field' => 'text NOT NULL',
					'is_show' => 1,
					'is_must' => 1
			],
			'template' => [
					'title' => '模板名称',
					'type' => 'string',
					'field' => 'varchar(255) NULL',
					'value' => 'default',
					'placeholder' => '请输入内容'
			]
	];
}	