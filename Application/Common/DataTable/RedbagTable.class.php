<?php
/**
 * Redbag数据模型
 */
class RedbagTable {
	// 数据表模型配置
	public $config = [
			'name' => 'redbag',
			'title' => '微信红包',
			'search_key' => 'act_name:活动名称',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'act_name' => [
					'title' => '活动名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'send_name' => [
					'title' => '商户名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'total_amount' => [
					'title' => '付款金额',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'min_value' => [
					'title' => '最小红包',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'max_value' => [
					'title' => '最大红包',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'total_num' => [
					'title' => '发放人数',
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
			'mch_id' => [
					'title' => '商户号',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'remark' => '微信支付分配的商户号',
					'is_show' => 1,
					'is_must' => 1
			],
			'sub_mch_id' => [
					'title' => '子商户号',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'remark' => '可为空，微信支付分配的子商户号，受理模式下必填'
			],
			'wxappid' => [
					'title' => '公众账号appid',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'remark' => '商户appid',
					'is_show' => 1,
					'is_must' => 1
			],
			'nick_name' => [
					'title' => '提供方名称',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'send_name' => [
					'title' => '商户名称',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'remark' => '红包发送者名称',
					'is_show' => 1,
					'is_must' => 1
			],
			'total_amount' => [
					'title' => '付款金额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1000,
					'remark' => '付款金额，单位分',
					'is_show' => 1,
					'is_must' => 1
			],
			'min_value' => [
					'title' => '最小红包金额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1000,
					'remark' => '最小红包金额，单位分',
					'is_show' => 1,
					'is_must' => 1
			],
			'max_value' => [
					'title' => '最大红包金额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1000,
					'remark' => '最大红包金额，单位分',
					'is_show' => 1,
					'is_must' => 1
			],
			'total_num' => [
					'title' => '红包发放总人数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1,
					'is_show' => 1,
					'is_must' => 1
			],
			'wishing' => [
					'title' => '红包祝福语',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '如：感谢您参加猜灯谜活动，祝您元宵节快乐！',
					'is_show' => 1,
					'is_must' => 1
			],
			'act_name' => [
					'title' => '活动名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '如：猜灯谜抢红包活动',
					'is_show' => 1,
					'is_must' => 1
			],
			'remark' => [
					'title' => '备注',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '如：猜越多得越多，快来抢！',
					'is_show' => 1,
					'is_must' => 1
			],
			'logo_imgurl' => [
					'title' => '商户logo的url',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture'
			],
			'share_content' => [
					'title' => '分享文案',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '如：快来参加猜灯谜活动'
			],
			'share_url' => [
					'title' => '分享链接',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'share_imgurl' => [
					'title' => '分享的图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture'
			],
			'collect_count' => [
					'title' => '领取人数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			],
			'collect_amount' => [
					'title' => '已领取金额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '单位为分'
			],
			'collect_limit' => [
					'title' => '每人最多领取次数',
					'field' => 'tinyint(2) NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '0 表示不限制',
					'is_show' => 1
			],
			'partner_key' => [
					'title' => '商户API密钥',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'remark' => '用户生成支付签名',
					'is_show' => 1
			],
			'template' => [
					'title' => '素材模板',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'default',
					'is_show' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'uid' => [
					'title' => 'uid',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function'
			],
			'act_remark' => [
					'title' => '活动备注',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			]
	];
}	