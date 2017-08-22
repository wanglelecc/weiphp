<?php
/**
 * Ask数据模型
 */
class AskTable {
	// 数据表模型配置
	public $config = [
			'name' => 'ask',
			'title' => '抢答问卷',
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
					'title' => '微抢答ID',
					'function' => '',
					'width' => '',
					'sort' => '',
					'href' => [ ]
			],
			'keyword' => [
					'title' => '关键词',
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
			'cTime' => [
					'title' => '发布时间',
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
									'title' => '问题管理',
									'url' => 'ask_question&id=[id]'
							],
							'3' => [
									'title' => '数据管理',
									'url' => 'ask_answer&id=[id]'
							],
							'4' => [
									'title' => '预览',
									'url' => 'preview&id=[id]&target=_blank'
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
			'keyword' => [
					'title' => '关键词',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_show' => 1,
					'is_must' => 1
			],
			'keyword_type' => [
					'title' => '关键词类型',
					'field' => 'tinyint(2) NOT NULL',
					'type' => 'select',
					'value' => 0,
					'is_show' => 1,
					'extra' => '0:完全匹配
1:左边匹配
2:右边匹配
3:模糊匹配
4:正则匹配
5:随机匹配',
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
					'type' => 'textarea',
					'is_show' => 1,
					'is_must' => 1
			],
			'mTime' => [
					'title' => '修改时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function'
			],
			'cover' => [
					'title' => '封面图片',
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
			'finish_tip' => [
					'title' => '结束语',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '为空默认为：抢答完成，谢谢参与',
					'is_show' => 1,
					'is_must' => 1
			],
			'content' => [
					'title' => '活动介绍',
					'field' => 'text NULL',
					'type' => 'editor',
					'remark' => '显示在用户进入的开始界面',
					'is_show' => 1
			],
			'shop_address' => [
					'title' => '商家地址',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '显示在马上开始的下面，多个地址用英文逗号或者换行分割',
					'is_show' => 1
			],
			'appids' => [
					'title' => '提示关注的公众号',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '格式：广东南方卫视|wx2d7ce60bbfc928ef 多个公众号用换行分割',
					'is_show' => 1
			],
			'finish_button' => [
					'title' => '成功抢答完后显示的按钮',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '格式：按钮名|跳转链接，如：百度|www.baidu.com 多个时换行分割',
					'is_show' => 1
			],
			'card_id' => [
					'title' => '卡券ID',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '可为空',
					'is_show' => 1
			],
			'appsecre' => [
					'title' => '卡券对应的appsecre',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'template' => [
					'title' => '素材模板',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'default',
					'is_show' => 1
			]
	];
}	