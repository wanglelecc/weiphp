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
			'list_row' => 20,
			'addon' => 'RedBag'
	];
	
	// 列表定义
	public $list_grid = [
			'act_name' => [
					'title' => '活动名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'act_name',
					'function' => '',
					'href' => [ ]
			],
			'send_name' => [
					'title' => '商户名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'send_name',
					'function' => '',
					'href' => [ ]
			],
			'total_amount' => [
					'title' => '付款金额',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'total_amount',
					'function' => '',
					'href' => [ ]
			],
			'min_value' => [
					'title' => '最小红包',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'min_value',
					'function' => '',
					'href' => [ ]
			],
			'max_value' => [
					'title' => '最大红包',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'max_value',
					'function' => '',
					'href' => [ ]
			],
			'total_num' => [
					'title' => '发放人数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'total_num',
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
			'mch_id' => [
					'title' => '商户号',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'remark' => '微信支付分配的商户号',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'sub_mch_id' => [
					'title' => '子商户号',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'remark' => '可为空，微信支付分配的子商户号，受理模式下必填',
					'placeholder' => '请输入内容'
			],
			'wxappid' => [
					'title' => '公众账号appid',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'remark' => '商户appid',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'nick_name' => [
					'title' => '提供方名称',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'send_name' => [
					'title' => '商户名称',
					'field' => 'varchar(32) NULL',
					'type' => 'string',
					'remark' => '红包发送者名称',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'total_amount' => [
					'title' => '付款金额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1000,
					'remark' => '付款金额，单位分',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'min_value' => [
					'title' => '最小红包金额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1000,
					'remark' => '最小红包金额，单位分',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'max_value' => [
					'title' => '最大红包金额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1000,
					'remark' => '最大红包金额，单位分',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'total_num' => [
					'title' => '红包发放总人数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'wishing' => [
					'title' => '红包祝福语',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '如：感谢您参加猜灯谜活动，祝您元宵节快乐！',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'act_name' => [
					'title' => '活动名称',
					'type' => 'string',
					'field' => 'varchar(255) NULL',
					'remark' => '如：猜灯谜抢红包活动',
					'is_show' => 1,
					'is_must' => 0
			],
			'remark' => [
					'title' => '备注',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '如：猜越多得越多，快来抢！',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'logo_imgurl' => [
					'title' => '商户logo的url',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'placeholder' => '请输入内容'
			],
			'share_content' => [
					'title' => '分享文案',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '如：快来参加猜灯谜活动',
					'placeholder' => '请输入内容'
			],
			'share_url' => [
					'title' => '分享链接',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			],
			'share_imgurl' => [
					'title' => '分享的图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'placeholder' => '请输入内容'
			],
			'collect_count' => [
					'title' => '领取人数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'collect_amount' => [
					'title' => '已领取金额',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'remark' => '单位为分',
					'placeholder' => '请输入内容'
			],
			'collect_limit' => [
					'title' => '每人最多领取次数',
					'field' => 'tinyint(2) NULL',
					'type' => 'num',
					'remark' => '0 表示不限制',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'partner_key' => [
					'title' => '商户API密钥',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'remark' => '用户生成支付签名',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'template' => [
					'title' => '素材模板',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'default',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1,
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'uid' => [
					'title' => 'uid',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'act_remark' => [
					'title' => '活动备注',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			]
	];
}	