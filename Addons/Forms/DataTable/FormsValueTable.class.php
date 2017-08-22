<?php
/**
 * FormsValue数据模型
 */
class FormsValueTable {
	// 数据表模型配置
	public $config = [ 
			'name' => 'forms_value',
			'title' => '通用表单数据',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Forms' 
	];
	
	// 列表定义
	public $list_grid = [ 
			'uid' => [ 
					'title' => '用户',
					'function' => 'get_nickname' 
			],
			'cTime' => [ 
					'title' => '发布时间',
					'function' => 'time_format' 
			],
			'urls' => [ 
					'title' => '操作',
					'come_from' => 1,
					'href' => [ 
							'0' => [ 
									'title' => '删除',
									'url' => '[DELETE]' 
							] 
					] 
			] 
	];
	
	// 字段定义
	public $fields = [ 
			'uid' => [ 
					'title' => '用户ID',
					'field' => 'int(10) NULL',
					'type' => 'num' 
			],
			'openid' => [ 
					'title' => 'OpenId',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_openid',
					'auto_time' => 1,
					'auto_type' => 'function' 
			],
			'forms_id' => [ 
					'title' => '表单ID',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'is_show' => 4 
			],
			'value' => [ 
					'title' => '表单值',
					'field' => 'text NULL',
					'type' => 'textarea' 
			],
			'cTime' => [ 
					'title' => '增加时间',
					'field' => 'int(10) NULL',
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
			] 
	];
}	