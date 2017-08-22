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
			'list_row' => 20,
			'addon' => 'Ask'
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '微抢答ID',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'id',
					'function' => '',
					'href' => [ ]
			],
			'keyword' => [
					'title' => '关键词',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'keyword',
					'function' => '',
					'href' => [ ]
			],
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'title',
					'function' => '',
					'href' => [ ]
			],
			'cTime' => [
					'title' => '发布时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'cTime',
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
					],
					'name' => 'ids',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'keyword' => [
					'title' => '关键词',
					'field' => 'varchar(100) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'keyword_type' => [
					'title' => '关键词类型',
					'type' => 'select',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:完全匹配
1:左边匹配
2:右边匹配
3:模糊匹配
4:正则匹配
5:随机匹配',
					'is_show' => 0,
					'is_must' => 0
			],
			'title' => [
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'intro' => [
					'title' => '封面简介',
					'field' => 'text NULL',
					'type' => 'textarea',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'mTime' => [
					'title' => '修改时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 3,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'cover' => [
					'title' => '封面图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) unsigned NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'finish_tip' => [
					'title' => '结束语',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '为空默认为：抢答完成，谢谢参与',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'content' => [
					'title' => '活动介绍',
					'field' => 'text NULL',
					'type' => 'editor',
					'remark' => '显示在用户进入的开始界面',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'shop_address' => [
					'title' => '商家地址',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '显示在马上开始的下面，多个地址用英文逗号或者换行分割',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'appids' => [
					'title' => '提示关注的公众号',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '格式：广东南方卫视|wx2d7ce60bbfc928ef 多个公众号用换行分割',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'finish_button' => [
					'title' => '成功抢答完后显示的按钮',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '格式：按钮名|跳转链接，如：百度|www.baidu.com 多个时换行分割',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'card_id' => [
					'title' => '卡券ID',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '可为空',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'appsecre' => [
					'title' => '卡券对应的appsecre',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
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
			]
	];
}	