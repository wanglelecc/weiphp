<?php

/**
 * 用户模型
 */
class ToolTable {
	// 数据表模型配置
	public $config = [ 
			'name' => 'tool',
			'title' => '用户信息表',
			'search_key' => 'title:请输入标题进行搜索',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => '20' 
	];
	// 列表定义
	public $list_grid = [ 
			[ 
					'headimgurl' => [  // 显示图片
							'title' => '头像',
							'function' => 'url_img_html',
							'width' => '' 
					],
					'nickname' => [  // 普通字段显示
							'title' => '用户昵称',
							'function' => '',
							'width' => '',
							'sort' => false 
					],
					'sex' => [  // 状态显示
							'title' => '性别',
							'function' => '',
							'width' => '',
							'sort' => false 
					],
					'ids' => [  // 管理操作
							'title' => '操作',
							'function' => '',
							'width' => '',
							'href' => [ 
									0 => [ 
											'title' => '设置登录账号',
											'url' => 'set_login?uid=[uid]' 
									],
									1 => [ 
											'title' => '详细资料',
											'url' => 'detail?uid=[uid]' 
									],
									2 => [ 
											'title' => '编辑',
											'url' => '[EDIT]' 
									] 
							] 
					] 
			] 
	];
	// 字段定义
	public $fields = [ 
			'string' => [ 
					'title' => '字符串', // 字段标题（请输入字段标题，用于表单显示）
					'type' => 'string', // 字段类型（用于表单中的展示方式）
					'value' => '', // 默认值
					'placeholder' => '请输入内容', // 占位符
					'remark' => '', // 字段备注(用于表单中的提示]
					'is_show' => '1', // 是否需要在表单里 1:始终显示 2:新增显示 3:编辑显示 5:条件控件 4:隐藏值 0:不显示
					'is_must' => '1', // 是否必填（用于自动验证）
					'field' => 'varchar(255) NULL', // 字段定义（字段属性的sql表示）
					                                
					// 以下高级选项不用时可以去掉
					'validate_type' => 'regex', // 验证方式 regex:正则验证 function:函数验证 unique:唯一验证 :length:长度验证 in:验证在范围内 notin:验证不在范围内 between:区间验证 notbetween：不在区间验证
					'validate_rule' => '', // 验证规则（根据验证方式定义相关验证规则）,为空表示不验证
					'validate_time' => '3', // 验证时间 0:无 3:始 终 1:新 增 2:编 辑
					'error_info' => '', // 验证失败出错提示
					
					'auto_rule' => '', // 自动完成规则（根据完成方式订阅相关规则）
					'auto_time' => '3', // 自动完成时间 0:无 3:始 终 1:新 增 2:编 辑
					'auto_type' => 'function' /* 自动完成方式 function:函数 field:字段 string:字符串 */
					],
			'num' => [ 
					'title' => '数字',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => '0',
					'placeholder' => '',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'textarea' => [ 
					'title' => '文本框',
					'field' => 'text NULL',
					'type' => 'textarea',
					'value' => '',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'date' => [ 
					'title' => '日期',
					'field' => 'int(10) NULL',
					'type' => 'date',
					'value' => '',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'datetime' => [ 
					'title' => '时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'value' => '',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'editor' => [ 
					'title' => '编辑器',
					'field' => 'text NULL',
					'type' => 'editor',
					'value' => '',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'picture' => [ 
					'title' => '上传图片',
					'field' => 'int(10) UNSIGNED NULL',
					'type' => 'picture',
					'value' => '',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'material' => [ 
					'title' => '素材选择器',
					'field' => 'varchar(50) NULL',
					'type' => 'material',
					'value' => 'news:20',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'prize' => [ 
					'title' => '奖品选择器',
					'field' => 'varchar(255) NULL',
					'type' => 'prize',
					'value' => '',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'news' => [ 
					'title' => '图文素材选择器',
					'field' => 'int(30) NULL',
					'type' => 'news',
					'value' => '10',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'image' => [ 
					'title' => '图片素材选择器',
					'field' => 'int(10) NULL',
					'type' => 'image',
					'value' => '',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'user' => [ 
					'title' => '单用户选择',
					'field' => 'int(10) NULL',
					'type' => 'user',
					'value' => '1',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'users' => [ 
					'title' => '多用户选择',
					'field' => 'int(10) NULL',
					'type' => 'users',
					'value' => '1,2,3',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'admin' => [ 
					'title' => '单管理员选择',
					'field' => 'int(10) NULL',
					'type' => 'admin',
					'value' => '0',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'mult_picture' => [ 
					'title' => '多图上传',
					'field' => 'varchar(255) NULL',
					'type' => 'mult_picture',
					'value' => '25,26',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
			'file' => [ 
					'title' => '上传附件',
					'field' => 'int(10) UNSIGNED NULL',
					'type' => 'file',
					'value' => '',
					'remark' => '',
					'is_show' => '1',
					'is_must' => '0' 
			],
					/* 带extra配置信息的字段 */
					'bool' => [ 
					'title' => '布尔',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'value' => '1',
					'remark' => '',
					'is_show' => '1',
					'extra' => '0:否;1:是', // 格式：选项1的值:选项1的标题;选项2的值:选项2的标题;...
					'is_must' => '0' 
			],
			'select' => [ 
					'title' => '枚举',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => '',
					'remark' => '',
					'is_show' => '1',
					'extra' => '0:音乐;1:旅游;2:足球', // 格式：选项1的值:选项1的标题;选项2的值:选项2的标题;...
					'is_must' => '0' 
			],
			'radio' => [ 
					'title' => '单选',
					'field' => 'char(10) NULL',
					'type' => 'radio',
					'value' => '1',
					'remark' => '',
					'is_show' => '1',
					'extra' => '0:音乐;1:旅游;2:足球', // 格式：选项1的值:选项1的标题;选项2的值:选项2的标题;...
					'is_must' => '0' 
			],
			'checkbox' => [ 
					'title' => '多选',
					'field' => 'varchar(100) NULL',
					'type' => 'checkbox',
					'value' => '0,1',
					'remark' => '',
					'is_show' => '1',
					'extra' => '0:音乐;1:旅游;2:足球', // 格式：选项1的值:选项1的标题;选项2的值:选项2的标题;...
					'is_must' => '0' 
			],
			'cascade' => [ 
					'title' => '级联',
					'field' => 'varchar(255) NULL',
					'type' => 'cascade',
					'value' => '1,2,3',
					'remark' => '',
					'is_show' => '1',
					'extra' => 'type=db&table=common_category&module=shop_category&value_field=id&custom_field=id,title,pid,sort&custom_pid=0', // 动态数据，数据自动从数据表里获取
					/* 'extra' => 'type=text&data=[广西[南宁,桂林], 广东[广州, 深圳[福田区, 龙岗区, 宝安区]]]', // 静态数据，内容是固定的 */
					'is_must' => '0' 
			],
			'dynamic_select' => [ 
					'title' => '动态下拉菜单',
					'field' => 'varchar(100) NULL',
					'type' => 'dynamic_select',
					'value' => '1',
					'remark' => '',
					'is_show' => '1',
					'extra' => 'table=addons&type=1&value_field=name&title_field=title&order=id desc&first_option=请选择',
					'is_must' => '0' 
			],
			'dynamic_checkbox' => [ 
					'title' => '动态多选菜单',
					'field' => 'varchar(100) NULL',
					'type' => 'dynamic_checkbox',
					'value' => '1,2,3',
					'remark' => '',
					'is_show' => '1',
					'extra' => 'table=addons&type=1&value_field=name&title_field=title&order=id desc',
					'is_must' => '0' 
			] 
	];
}	