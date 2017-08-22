<?php
/**
 * PaymentSet数据模型
 */
class PaymentSetTable {
	// 数据表模型配置
	public $config = [
			'name' => 'payment_set',
			'title' => '支付配置',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10
	];
	
	// 列表定义
	public $list_grid = [
			'' => [
					'title' => '',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
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
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'ctime' => [
					'title' => '创建时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime'
			],
			'wxappid' => [
					'title' => 'AppID',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '微信支付中的公众号应用ID',
					'is_show' => 1,
					'is_must' => 1
			],
			'wxpaysignkey' => [
					'title' => '支付密钥',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => 'PartnerKey',
					'is_show' => 1,
					'is_must' => 1
			],
			'wxappsecret' => [
					'title' => 'AppSecret',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '微信支付中的公众号应用密钥',
					'is_show' => 1,
					'is_must' => 1
			],
			'zfbname' => [
					'title' => '帐号',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'pid' => [
					'title' => 'PID',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'key' => [
					'title' => 'KEY',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'partnerid' => [
					'title' => '财付通标识',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'partnerkey' => [
					'title' => '财付通Key',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'wappartnerid' => [
					'title' => '财付通标识WAP',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'wappartnerkey' => [
					'title' => 'WAP财付通Key',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'wxpartnerkey' => [
					'title' => '微信partnerkey',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'wxpartnerid' => [
					'title' => '微信partnerid',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'quick_security_key' => [
					'title' => '银联在线Key',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'quick_merid' => [
					'title' => '银联在线merid',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'quick_merabbr' => [
					'title' => '商户名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'shop_id' => [
					'title' => '商店ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			],
			'wxmchid' => [
					'title' => '微信支付商户号',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'wx_cert_pem' => [
					'title' => '上传证书',
					'field' => 'int(10) unsigned NULL',
					'type' => 'file',
					'remark' => 'apiclient_cert.pem',
					'is_show' => 1
			],
			'wx_key_pem' => [
					'title' => '上传密匙',
					'field' => 'int(10) unsigned NULL',
					'type' => 'file',
					'remark' => 'apiclient_key.pem',
					'is_show' => 1
			],
			'shop_pay_score' => [
					'title' => '支付返积分',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '不设置则默认为采用该支付方式不送积分',
					'is_show' => 1
			]
	];
}	