<?php
/**
 * Apps数据模型
 */
class AppsTable {
	// 数据表模型配置
	public $config = [
			'name' => 'apps',
			'title' => '公众号管理',
			'search_key' => 'public_name',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Core'
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '公众号ID',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'id',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'public_name' => [
					'title' => '公众号名称',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'public_name',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'token' => [
					'title' => 'Token',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'token',
					'function' => '',
					'sort' => '',
					'href' => [ ]
			],
			'count' => [
					'title' => '管理员数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'count',
					'function' => '',
					'sort' => '',
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
									'title' => '进入管理',
									'url' => 'main&public_id=[id]'
							]
					],
					'name' => 'ids',
					'function' => '',
					'sort' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'uid' => [
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'auto_rule' => 'get_mid',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'public_name' => [
					'title' => '公众号名称',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'public_id' => [
					'title' => '公众号原始id',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'remark' => '请正确填写，保存后不能再修改，且无法接收到微信的信息',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'headface_url' => [
					'title' => '公众号头像',
					'field' => 'varchar(255) NULL',
					'type' => 'picture',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'area' => [
					'title' => '地区',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			],
			'addon_config' => [
					'title' => '插件配置',
					'field' => 'text NULL',
					'type' => 'textarea',
					'placeholder' => '请输入内容'
			],
			'addon_status' => [
					'title' => '插件状态',
					'field' => 'text NULL',
					'type' => 'textarea',
					'extra' => '18:欢迎语
19:微信用户中心
56:自定义菜单
111:帐号配置
101:微信卡券
39:微官网
42:微信宣传页
48:自定义回复
50:微调研
91:微邀约
93:互动游戏
97:微抢答
100:通用表单
106:微信红包
107:竞猜
108:微贺卡
110:实物奖励
126:开发者工具箱
128:微名片
130:自动回复
133:支付通
134:投票
137:评论互动
140:没回答的回复
141:工作授权
142:优惠券
143:帮拆礼包
144:会员卡
145:签到
146:微预约
151:短信服务
152:微考试
153:微测试
162:微社区
163:扫码管理
156:比赛抽奖
164:一键绑定公众号
',
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			],
			'type' => [
					'title' => '类型',
					'type' => 'radio',
					'field' => 'char(10) NULL',
					'extra' => '0:普通订阅号
1:认证订阅号
2:普通服务号',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'appid' => [
					'title' => 'AppID',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '应用ID',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'secret' => [
					'title' => 'AppSecret',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '应用密钥',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'encodingaeskey' => [
					'title' => 'EncodingAESKey',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '安全模式下必填',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'tips_url' => [
					'title' => '提示关注公众号的文章地址',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'is_bind' => [
					'title' => '是否为微信开放平台绑定账号',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'extra' => '0:否
1:是',
					'placeholder' => '请输入内容'
			],
			'app_type' => [
					'title' => '类型',
					'type' => 'bool',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:公众号
1:小程序
2:APP',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'mch_id' => [
					'title' => '商户号',
					'type' => 'string',
					'field' => 'varchar(32) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'partner_key' => [
					'title' => 'API密钥',
					'type' => 'string',
					'field' => 'varchar(100) NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cert_pem' => [
					'title' => '微信支付证书cert',
					'type' => 'file',
					'field' => 'int(10) UNSIGNED NULL',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'key_pem' => [
					'title' => '微信支付证书key',
					'type' => 'file',
					'field' => 'int(10) UNSIGNED NULL',
					'is_show' => 1,
					'is_must' => 0
			]
	];
}	