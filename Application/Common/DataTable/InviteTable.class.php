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
			'list_row' => 20
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
			'title' => [
					'title' => '标题',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'experience' => [
					'title' => '消耗经验值',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'coupon_id' => [
					'title' => '优惠券编号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'coupon_name' => [
					'title' => '优惠券标题',
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
							],
							'2' => [
									'title' => '领取记录',
									'url' => 'Coupon/Sn/lists?target_id=[coupon_id]&target=_blank'
							],
							'3' => [
									'title' => '预览',
									'url' => 'preview?id=[id]&target=_blank'
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
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'keyword_type' => [
					'title' => '关键词类型',
					'field' => 'tinyint(2) NOT NULL',
					'type' => 'select',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:完全匹配
1:左边匹配
2:右边匹配
3:模糊匹配',
					'is_must' => 1
			],
			'title' => [
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'intro' => [
					'title' => '封面简介',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'is_must' => 1
			],
			'mTime' => [
					'title' => '修改时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'cover' => [
					'title' => '封面图片',
					'field' => 'int(10) unsigned NOT NULL',
					'type' => 'picture',
					'is_show' => 1,
					'is_must' => 1
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) unsigned NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'experience' => [
					'title' => '消耗体力值',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			],
			'num' => [
					'title' => '邀请人数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '邀请多少人后才能用优惠券',
					'is_show' => 1,
					'is_must' => 1
			],
			'coupon_id' => [
					'title' => '优惠券编号',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '可以在优惠券列表中找到对应的编号',
					'is_show' => 1,
					'is_must' => 1
			],
			'coupon_num' => [
					'title' => '优惠券数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '赠送多少张优惠券'
			],
			'receive_num' => [
					'title' => '已领取优惠券数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			],
			'content' => [
					'title' => '邀约介绍',
					'field' => 'text NULL',
					'type' => 'editor',
					'is_show' => 1,
					'is_must' => 1
			],
			'template' => [
					'title' => '模板名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'default',
					'is_show' => 1
			]
	];
}	