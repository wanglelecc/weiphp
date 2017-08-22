<?php
/**
 * Coupon数据模型
 */
class CouponTable {
	// 数据表模型配置
	public $config = [
			'name' => 'coupon',
			'title' => '优惠券',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '优惠券编号',
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
			'num' => [
					'title' => '计划发送数',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'collect_count' => [
					'title' => '已领取数',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'use_count' => [
					'title' => '已使用数',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'start_time' => [
					'title' => '开始时间',
					'function' => 'time_format',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'end_time' => [
					'title' => '结束时间',
					'function' => 'time_format',
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
									'title' => '成员管理',
									'url' => 'Sn/lists?target_id=[id]&target=_blank'
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
			'background' => [
					'title' => '素材背景图',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'keyword' => [
					'title' => '关键词',
					'field' => 'varchar(100) NULL',
					'type' => 'string'
			],
			'use_tips' => [
					'title' => '使用说明',
					'field' => 'text NULL',
					'type' => 'editor',
					'remark' => '用户获取优惠券后显示的提示信息',
					'is_show' => 1,
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
					'type' => 'textarea'
			],
			'end_time' => [
					'title' => '领取结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'cover' => [
					'title' => '优惠券图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
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
			'start_time' => [
					'title' => '开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'end_tips' => [
					'title' => '领取结束说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '活动过期或者结束说明',
					'is_show' => 1
			],
			'end_img' => [
					'title' => '领取结束提示图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'remark' => '可为空',
					'is_show' => 1
			],
			'num' => [
					'title' => '优惠券数量',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '0表示不限制数量',
					'is_show' => 1
			],
			'max_num' => [
					'title' => '每人最多允许获取次数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 1,
					'remark' => '0表示不限制数量'
			],
			'follower_condtion' => [
					'title' => '粉丝状态',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => 1,
					'remark' => '粉丝达到设置的状态才能获取',
					'extra' => '0:不限制
1:已关注
2:已绑定信息
3:会员卡成员'
			],
			'credit_conditon' => [
					'title' => '积分限制',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '粉丝达到多少积分后才能领取，领取后不扣积分'
			],
			'credit_bug' => [
					'title' => '积分消费',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0,
					'remark' => '用积分中的财富兑换、兑换后扣除相应的积分财富'
			],
			'addon_condition' => [
					'title' => '插件场景限制',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '格式：[插件名:id值]，如[投票:10]表示对ID为10的投票投完才能领取，更多的说明见表单上的提示'
			],
			'collect_count' => [
					'title' => '已领取数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0
			],
			'view_count' => [
					'title' => '浏览人数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 0
			],
			'addon' => [
					'title' => '插件',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => 'public',
					'extra' => 'public:通用
invite:微邀约'
			],
			'shop_uid' => [
					'title' => '商家管理员ID',
					'field' => 'varchar(255) NULL',
					'type' => 'string'
			],
			'use_count' => [
					'title' => '已使用数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			],
			'pay_password' => [
					'title' => '核销密码',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'empty_prize_tips' => [
					'title' => '奖品抽完后的提示',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '不填写时默认显示：您来晚了，优惠券已经领取完',
					'is_show' => 1
			],
			'start_tips' => [
					'title' => '活动还没开始时的提示语',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'more_button' => [
					'title' => '其它按钮',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '格式：按钮名称|按钮跳转地址，每行一个。如：查看官网|http://weiphp.cn',
					'is_show' => 1
			],
			'over_time' => [
					'title' => '使用的截止时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'remark' => '券的使用截止时间，为空时表示不限制',
					'is_show' => 1
			],
			'use_start_time' => [
					'title' => '使用开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'is_must' => 1
			],
			'shop_name' => [
					'title' => '商家名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => '优惠商家',
					'is_show' => 1
			],
			'shop_logo' => [
					'title' => '商家LOGO',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1
			],
			'head_bg_color' => [
					'title' => '头部背景颜色',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => '#35a2dd',
					'is_show' => 1
			],
			'button_color' => [
					'title' => '按钮颜色',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => '#0dbd02',
					'is_show' => 1
			],
			'template' => [
					'title' => '素材模板',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'default',
					'is_show' => 1
			],
			'member' => [
					'title' => '选择人群',
					'field' => 'varchar(100) NULL',
					'type' => 'checkbox',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:所有用户
-1:所有会员'
			],
			'is_del' => [
					'title' => '是否删除',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 0
			]
	];
}	