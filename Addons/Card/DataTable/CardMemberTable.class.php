<?php
/**
 * CardMember数据模型
 */
class CardMemberTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_member',
			'title' => '会员卡成员',
			'search_key' => 'username:请输入姓名',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Card'
	];
	
	// 列表定义
	public $list_grid = [
			'number' => [
					'title' => '卡号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'number',
					'function' => '',
					'href' => [ ]
			],
			'uid' => [
					'title' => 'uid',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'uid',
					'function' => '',
					'href' => [ ]
			],
			'username' => [
					'title' => '姓名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'username',
					'function' => '',
					'href' => [ ]
			],
			'phone' => [
					'title' => '手机号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'phone',
					'function' => '',
					'href' => [ ]
			],
			'score' => [
					'title' => '剩余积分',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'score',
					'function' => '',
					'href' => [ ]
			],
			'recharge' => [
					'title' => '余额',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'recharge',
					'function' => '',
					'href' => [ ]
			],
			'level' => [
					'title' => '等级',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'level',
					'function' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '加入时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'cTime',
					'function' => '',
					'href' => [ ]
			],
			'status' => [
					'title' => '状态',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'status',
					'function' => '',
					'href' => [ ]
			],
			'urls' => [
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
									'title' => '会员充值',
									'url' => 'do_recharge&id=[id]'
							],
							'3' => [
									'title' => '会员消费',
									'url' => 'do_buy&id=[id]'
							],
							'4' => [
									'title' => '手动修改积分',
									'url' => 'update_score&id=[id]'
							]
					],
					'name' => 'urls',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'number' => [
					'title' => '卡号',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 3,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '加入时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'phone' => [
					'title' => '手机号',
					'field' => 'varchar(30) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'username' => [
					'title' => '姓名',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'uid' => [
					'title' => '用户UID',
					'type' => 'num',
					'field' => 'int(10) NULL',
					'auto_type' => 'function',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'type' => 'string',
					'field' => 'varchar(100) NULL',
					'is_show' => 0,
					'is_must' => 0,
					'auto_type' => 'function',
					'auto_rule' => 'get_token',
					'auto_time' => 1
			],
			'recharge' => [
					'title' => '余额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'status' => [
					'title' => '会员状态',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '1:正常
0:冻结',
					'placeholder' => '请输入内容'
			],
			'birthday' => [
					'title' => '生日',
					'field' => 'int(10) NULL',
					'type' => 'date',
					'placeholder' => '请输入内容'
			],
			'address' => [
					'title' => '地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			],
			'level' => [
					'title' => '会员卡等级',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'sex' => [
					'title' => '性别',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'extra' => '1:男
2:女',
					'placeholder' => '请输入内容'
			]
	];
}	