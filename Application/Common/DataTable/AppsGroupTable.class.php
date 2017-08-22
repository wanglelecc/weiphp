<?php
/**
 * AppsGroup数据模型
 */
class AppsGroupTable {
	// 数据表模型配置
	public $config = [
			'name' => 'apps_group',
			'title' => '公众号等级',
			'search_key' => 'title',
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
					'title' => '等级ID',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'title' => [
					'title' => '等级名',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'addon_status' => [
					'title' => '授权的插件',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'public_count' => [
					'title' => '公众号数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '编辑',
									'url' => 'editPublicGroup&id=[id]'
							],
							'1' => [
									'title' => '删除',
									'url' => 'delPublicGroup&id=[id]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'title' => [
					'title' => '等级名',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'addon_status' => [
					'title' => '插件权限',
					'field' => 'text NULL',
					'type' => 'checkbox',
					'is_show' => 1,
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
'
			]
	];
}	