<?php
/**
 * RedbagFollow数据模型
 */
class RedbagFollowTable {
	// 数据表模型配置
	public $config = [
			'name' => 'redbag_follow',
			'title' => '领取红包的用户',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'RedBag'
	];
	
	// 列表定义
	public $list_grid = [
			'follow_id' => [
					'title' => '粉丝',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'amount' => [
					'title' => '领取金额（分）',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'cTime' => [
					'title' => '领取时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			]
	];
	
	// 字段定义
	public $fields = [
			'redbag_id' => [
					'title' => '红包ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'follow_id' => [
					'title' => '粉丝ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'amount' => [
					'title' => '领取金额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '单位为分',
					'is_show' => 1
			],
			'cTime' => [
					'title' => '发放时间',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'status' => [
					'title' => '发放状态',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'value' => 'SENDING',
					'is_show' => 1,
					'extra' => 'SENDING:发放中
SENT:已发放待领取
FAILED：发放失败
RECEIVED:已领取
REFUND:已退款 '
			],
			'reason' => [
					'title' => '失败原因 ',
					'field' => 'varchar(50) NULL',
					'type' => 'string'
			],
			'Rcv_time' => [
					'title' => '领取红包的时间 ',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			],
			'Send_time' => [
					'title' => '红包发送时间 ',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			],
			'Refund_time' => [
					'title' => '红包退款时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			],
			'extra' => [
					'title' => '微信返回的数据集',
					'field' => 'text NULL',
					'type' => 'textarea'
			]
	];
}	