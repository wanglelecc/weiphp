<?php
/**
 * CardVouchers数据模型
 */
class CardVouchersTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_vouchers',
			'title' => '微信卡券',
			'search_key' => 'card_id',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'title' => [
					'title' => '卡券名称',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'card_id' => [
					'title' => '卡券ID',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'appsecre' => [
					'title' => '商家公众号密钥',
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
			'content' => [
					'title' => '活动介绍',
					'field' => 'text NULL',
					'type' => 'editor',
					'is_show' => 1
			],
			'code' => [
					'title' => '卡券code码',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '指定的卡券code 码，只能被领一次。use_custom_code 字段为true 的卡券必须填写，非自定义code 不必填写',
					'is_show' => 1
			],
			'appsecre' => [
					'title' => '开通卡券的商家公众号密钥',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'openid' => [
					'title' => 'OpenID',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '指定领取者的openid，只有该用户能领取。bind_openid字段为true的卡券必须填写，非自定义openid 不必填写'
			],
			'card_id' => [
					'title' => '卡券ID',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1
			],
			'balance' => [
					'title' => '红包余额',
					'field' => 'varchar(30) NULL',
					'type' => 'string',
					'remark' => '红包余额，以分为单位。红包类型必填 （LUCKY_MONEY），其他卡券类型不填'
			],
			'cover' => [
					'title' => '素材封面',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture'
			],
			'background' => [
					'title' => '背景图',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'title' => [
					'title' => '卡券标题',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => '卡券',
					'is_show' => 1
			],
			'button_color' => [
					'title' => '领取按钮颜色',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => '#0dbd02',
					'is_show' => 1
			],
			'head_bg_color' => [
					'title' => '头部背景颜色',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => '#35a2dd',
					'is_show' => 1
			],
			'shop_logo' => [
					'title' => '商家LOGO',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'shop_name' => [
					'title' => '商家名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'more_button' => [
					'title' => '添加更多按钮',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1
			],
			'template' => [
					'title' => '素材模板',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'default',
					'is_show' => 1
			],
			'uid' => [
					'title' => 'uid',
					'field' => 'int(10) NULL',
					'type' => 'num',
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
			]
	];
}	