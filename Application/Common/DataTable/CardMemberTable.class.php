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
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'number' => [
					'title' => '卡号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'uid' => [
					'title' => 'uid',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'username' => [
					'title' => '姓名',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'phone' => [
					'title' => '手机号',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'score' => [
					'title' => '剩余积分',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'recharge' => [
					'title' => '余额',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'level' => [
					'title' => '等级',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '加入时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'status' => [
					'title' => '状态',
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
			'number' => [
					'title' => '卡号',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 3
			],
			'cTime' => [
					'title' => '加入时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'phone' => [
					'title' => '手机号',
					'field' => 'varchar(30) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'username' => [
					'title' => '姓名',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'uid' => [
					'title' => '用户UID',
					'field' => 'int(10) NOT NULL',
					'type' => 'num',
					'is_must' => 1,
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'recharge' => [
					'title' => '余额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			],
			'status' => [
					'title' => '会员状态',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => 1,
					'extra' => '1:正常
0:冻结'
			],
			'birthday' => [
					'title' => '生日',
					'field' => 'int(10) NULL',
					'type' => 'date'
			],
			'address' => [
					'title' => '地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'level' => [
					'title' => '会员卡等级',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'is_show' => 1
			],
			'sex' => [
					'title' => '性别',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'extra' => '1:男
2:女'
			]
	];
}	