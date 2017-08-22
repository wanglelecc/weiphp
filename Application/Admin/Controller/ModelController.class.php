<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: huajie <banhuajie@163.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;

/**
 * 模型管理控制器
 *
 * @author huajie <banhuajie@163.com>
 */
class ModelController extends AdminController {
	
	/**
	 * 模型管理首页
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function index() {
		// 自动加载数据模型文件
		$map = [ ];
		if (isset ( $_GET ['title'] )) {
			$title = I ( 'get.title' );
			$map ['name'] = array (
					'like',
					"%$title%" 
			);
		}
		$list = $this->lists ( 'model', $map );
		
		$addonArr = $this->_get_all_addon ();
		$dao = D ( 'Common/Model' );
		foreach ( $list as &$vo ) {
			$file = $dao->requireFile ( $vo );
			$file_md5 = md5_file ( $file );
			$vo ['update_db'] = $vo ['file_md5'] != $file_md5 ? 1 : 0;
			
			require_once $file;
			$name = parse_name ( $vo ['name'], 1 );
			$class = $name . 'Table';
			$obj = new $class ();
			
			$fields_md5 = md5 ( json_encode ( $obj->fields ) );
			// dump ( $fields_md5 );
			
			$data = $this->getDBInfo ( $vo ['name'], $obj->fields, '' );
			$data_md5 = md5 ( json_encode ( $data ) );
			// dump ( $data_md5 );
			
			if ($data_md5 != $fields_md5) {
				// dump ( $obj->fields );
				// dump ( $data );
				$vo ['update_file'] = 1;
			} else {
				$vo ['update_file'] = 0;
			}
			empty ( $vo ['addon'] ) || $vo ['addon'] = $addonArr [$vo ['addon']];
		}
		
		int_to_string ( $list );
		// 记录当前列表页的cookie
		Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] );
		
		$this->assign ( '_list', $list );
		$this->meta_title = '模型管理';
		$this->display ();
	}
	function freshDBtoFile() {
		set_time_limit ( 0 );
		$dao = D ( 'Common/Model' );
		$map = [ ];
		if (isset ( $_GET ['model_id'] )) {
			$map ['id'] = I ( 'model_id' );
		}
		$list = $dao->where ( $map )->select ();
		foreach ( $list as $vo ) {
			// dump ( $vo );
			$obj = $dao->getFileInfo ( $vo );
			// =================================================//
			$list_grid = $this->_list_grid ( $vo );
			// dump ( $list_grid ['list_grids'] );
			$list_grid_arr = [ ];
			foreach ( $list_grid ['list_grids'] as $v ) {
				$func = $href = '';
				$hrefArr = [ ];
				if (strpos ( $v ['field'], '|' ) === false) {
					$field = $v ['field'];
				} else {
					list ( $field, $func ) = explode ( '|', $v ['field'], 2 );
				}
				if (isset ( $v ['href'] )) {
					$arr1 = explode ( ',', $v ['href'] );
					foreach ( $arr1 as $k => $h ) {
						$arr2 = explode ( '|', $h );
						$hrefArr [$k] ['title'] = $arr2 [1];
						$hrefArr [$k] ['url'] = $arr2 [0];
					}
				}
				if (empty ( $hrefArr )) {
					$list_grid_arr [$field] = [ 
							'title' => $v ['title'],
							'come_from' => 0,
							'width' => '',
							'is_sort' => 0 
					];
				} else {
					$list_grid_arr [$field] = [ 
							'title' => $v ['title'],
							'come_from' => 1,
							'width' => '',
							'is_sort' => 0,
							'href' => $hrefArr 
					];
				}
			}
			// dump ( $list_grid_arr );
			
			$config = [ 
					'name' => $vo ['name'],
					'title' => $vo ['title'],
					'search_key' => $vo ['search_key'],
					'add_button' => 1,
					'del_button' => 1,
					'search_button' => 1,
					'check_all' => 1,
					'list_row' => $vo ['list_row'],
					'addon' => $vo ['addon'] 
			];
			
			// =================================================//
			$fields = $obj == false ? [ ] : $obj->fields;
			$data = $this->getDBInfo ( $vo ['name'], $fields );
			// if ($vo ['name'] == 'tool') {
			// dump ( $data );
			// }
			// 保持字段排序
			$newList = [ ];
			foreach ( $fields as $name => $f ) {
				if (isset ( $data [$name] )) {
					$newList [$name] = $data [$name];
					unset ( $data [$name] );
				}
			}
			
			// 新增加的字段放最后
			foreach ( $data as $name => $f ) {
				$newList [$name] = $f;
			}
			$dao->buildFile ( $vo, $newList, $list_grid_arr, $config );
			unset ( $vo );
		}
		// exit ();
		$this->success ( '更新完成', U ( 'index' ) );
	}
	function freshAttrtoFile() {
		set_time_limit ( 0 );
		$dao = D ( 'Common/Model' );
		$list = $dao->select (); // ->where ( 'id=123' )
		foreach ( $list as $vo ) {
			// dump ( $vo );
			$map ['model_id'] = $vo ['id'];
			$fields = M ( 'attribute_copy' )->where ( $map )->select ();
			
			$obj = $dao->getFileInfo ( $vo );
			$oldFields = $obj->fields;
			// 组装数据
			$newList = [ ];
			foreach ( $fields as $v ) {
				$name = $v ['name'];
				if (! isset ( $oldFields [$name] ))
					continue;
				
				$data = [ ];
				$info = $oldFields [$name];
				// 'remark' => '', // 字段备注(用于表单中的提示]
				// 'is_show' => '1', // 是否需要在表单里 1:始终显示 2:新增显示 3:编辑显示 5:条件控件 4:隐藏值 0:不显示
				
				// // 以下高级选项不用时可以去掉
				// 'validate_type' => 'regex', // 验证方式 regex:正则验证 function:函数验证 unique:唯一验证 :length:长度验证 in:验证在范围内 notin:验证不在范围内 between:区间验证 notbetween：不在区间验证
				// 'validate_rule' => '', // 验证规则（根据验证方式定义相关验证规则）,为空表示不验证
				// 'validate_time' => '3', // 验证时间 0:无 3:始 终 1:新 增 2:编 辑
				// 'error_info' => '', // 验证失败出错提示
				
				// 'auto_rule' => '', // 自动完成规则（根据完成方式订阅相关规则）
				// 'auto_time' => '3', // 自动完成时间 0:无 3:始 终 1:新 增 2:编 辑
				// 'auto_type' => 'function' /* 自动完成方式 function:函数 field:字段 string:字符串 */
				
				$data ['type'] = $v ['type'];
				empty ( $v ['remark'] ) || $data ['remark'] = $v ['remark'];
				empty ( $v ['is_show'] ) || $data ['is_show'] = $v ['is_show'];
				empty ( $v ['extra'] ) || $data ['extra'] = $v ['extra'];
				
				if (! empty ( $v ['validate_rule'] )) {
					$data ['validate_type'] = $v ['validate_type'];
					$data ['validate_rule'] = $v ['validate_rule'];
					$data ['validate_time'] = $v ['validate_time'];
					$data ['error_info'] = $v ['error_info'];
				}
				if (! empty ( $v ['auto_rule'] )) {
					$data ['auto_rule'] = $v ['auto_rule'];
					$data ['auto_time'] = $v ['auto_time'];
					$data ['auto_type'] = $v ['auto_type'];
				}
				if (empty ( $data ))
					continue;
				
				$newList [$name] = array_merge ( $info, $data );
			}
			
			foreach ( $oldFields as $name => &$f ) {
				if (isset ( $newList [$name] )) {
					$f = $newList [$name];
					unset ( $newList [$name] );
				}
			}
			
			$dao->buildFile ( $vo, $oldFields );
			unset ( $vo );
		}
		// exit ();
		$this->success ( '更新完成', U ( 'index' ) );
	}
	function getDBInfo($dbname, $fields = [], $type = 'filetodb') {
		// 检查表是否存在
		$table_exist = D ( 'Common/Model' )->checkTableExist ( $dbname );
		if (! $table_exist) {
			return [ ];
		}
		
		$db_name = C ( 'DB_PREFIX' ) . strtolower ( $dbname );
		$sql = 'SHOW FULL COLUMNS FROM ' . $db_name;
		$fields_list = M ()->query ( $sql );
		
		// 组装数据
		$data = [ ];
		foreach ( $fields_list as $v ) {
			$name = $v ['Field'];
			$info = isset ( $fields [$name] ) && $type != 'filetodb' ? $fields [$name] : [ ];
			// 主键不需要放到文件里
			if ($name == 'id' || ($dbname == 'user' && $name == 'uid') || ($dbname == 'tool' && $name == 'uid')) {
				continue;
			}
			
			if ($v ['Null'] == 'YES') {
				$null = ' NULL';
				$is_must = isset ( $info ['is_must'] ) ? $info ['is_must'] : 0;
			} else {
				$null = ' NOT NULL';
				$is_must = 1;
			}
			
			$data [$name] = [ 
					'title' => $v ['Comment'],
					'field' => $v ['Type'] . $null,
					'type' => isset ( $info ['type'] ) ? $info ['type'] : 'string',
					'is_must' => $is_must 
			];
			// dump ( $v );
			// exit ();
			if ($v ['Default'] != NULL) {
				$data [$name] ['value'] = $v ['Default'];
			}
			
			$data [$name] = array_merge ( $info, $data [$name] );
		}
		unset ( $fields_list );
		
		return $data;
	}
	function freshFiletoDB() {
		set_time_limit ( 0 );
		$dao = D ( 'Common/Model' );
		$map = [ ];
		if (isset ( $_GET ['model_id'] )) {
			$map ['id'] = I ( 'model_id' );
		}
		$list = $dao->where ( $map )->select ();
		foreach ( $list as $vo ) {
			$obj = $dao->getFileInfo ( $vo );
			if ($obj == false)
				continue;
			
			$data = [ ];
			// 需要先判断数据表是否存在
			$table_exist = $dao->checkTableExist ( $vo );
			if ($table_exist) {
				$data = $this->getDBInfo ( $vo ['name'] );
			}
			// 字段比较
			foreach ( $obj->fields as $name => $f ) {
				$f ['model_id'] = $vo ['id'];
				$f ['name'] = $name;
				if (isset ( $data [$name] )) { // 更新字段
					$val = $data [$name];
					if ($val ['title'] != $f ['title'] || $val ['field'] != $f ['field'] || $val ['value'] != $f ['value'] || $val ['is_must'] != $f ['is_must']) {
						$dao->updateField ( $f, $val );
					}
					unset ( $data [$name] );
				} else { // 新增字段
					$dao->addField ( $f );
				}
			}
			
			if (! empty ( $data )) { // 删除字段
				foreach ( $data as $n => $field ) {
					$field ['name'] = $name;
					$dao->deleteField ( $field, $vo ['id'] );
				}
			}
		}
		
		$this->success ( '更新完成', U ( 'index' ) );
	}
	function freshFileMd5() {
		set_time_limit ( 0 );
		$dao = D ( 'Common/Model' );
		$list = $dao->select ();
		foreach ( $list as $vo ) {
			$file = $dao->requireFile ( $vo );
			$save ['file_md5'] = md5_file ( $file );
			$map ['id'] = $vo ['id'];
			$dao->where ( $map )->save ( $save );
		}
		
		$this->success ( '更新完成', U ( 'index' ) );
	}
	/**
	 * 新增页面初始化
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function add() {
		// 获取所有的模型
		$models = M ( 'model' )->field ( 'id,name,title' )->select ();
		$this->assign ( 'models', $models );
		
		$this->_get_all_addon ();
		
		$this->meta_title = '新增模型';
		$this->display ();
	}
	function _get_all_addon() {
		$list = M ( 'addons' )->field ( 'name,title' )->select ();
		
		$arr ['Core'] = '系统核心模式';
		foreach ( $list as $vo ) {
			$arr [$vo ['name']] = $vo ['title'];
		}
		$arr ['Api'] = 'Api应用';
		$arr ['Admin'] = 'Admin应用';
		$arr ['Home'] = 'Home应用';
		$arr ['WeiApp'] = 'WeiApp应用';
		$this->assign ( 'list', $arr );
		
		return $arr;
	}
	
	/**
	 * 编辑页面初始化
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function edit() {
		$id = I ( 'get.id', '' );
		if (empty ( $id )) {
			$this->error ( '140156:参数不能为空！' );
		}
		
		/* 获取一条记录的详细数据 */
		$Model = M ( 'model' );
		$data = $Model->field ( true )->find ( $id );
		if (! $data) {
			$this->error ( '140157:' . $Model->getError () );
		}
		// 更新前台缓存
		S ( 'getModelByName_' . $data ['name'], NULL );
		
		$obj = D ( 'Common/Model' )->getFileInfo ( $data );
		$config = ( array ) $obj->config;
		$fields = ( array ) $obj->fields;
		
		$this->_get_all_addon ();
		$info = array_merge ( $data, $config );
		
		if ($data ['need_pk']) {
			$fields ['id'] = [ 
					'name' => 'id',
					'type' => 'Int',
					'is_must' => 0,
					'remark' => '',
					'title' => 'ID主键' 
			];
		}
		// dump ($obj->list_grid);
		
		$this->assign ( 'fields', $fields );
		$this->assign ( 'list_grid', $obj->list_grid );
		$this->assign ( 'info', $info );
		$this->meta_title = '编辑模型';
		$this->display ();
	}
	
	/**
	 * 删除一条数据
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function del() {
		$ids = I ( 'get.ids' );
		empty ( $ids ) && $this->error ( '140158:参数不能为空！' );
		$ids = explode ( ',', $ids );
		foreach ( $ids as $value ) {
			$res = D ( 'Common/Model' )->del ( $value );
			if (! $res) {
				break;
			}
		}
		if (! $res) {
			$this->error ( '140159:' . D ( 'Common/Model' )->getError () );
		} else {
			$this->success ( '删除模型成功！' );
		}
	}
	
	/**
	 * 更新一条数据
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function update() {
		$data = I ( 'post.' );
		
		// dump ( $data );
		$config = [ 
				'name' => $data ['name'],
				'title' => $data ['title'],
				'search_key' => $data ['search_key'],
				'add_button' => isset ( $data ['add_button'] ) ? $data ['add_button'] : 1,
				'del_button' => isset ( $data ['del_button'] ) ? $data ['del_button'] : 1,
				'search_button' => isset ( $data ['search_button'] ) ? $data ['search_button'] : 1,
				'check_all' => isset ( $data ['check_all'] ) ? $data ['check_all'] : 1,
				'list_row' => $data ['list_row'],
				'addon' => $data ['addon'] 
		];
		
		// dump ( $config );
		$list_grid = [ ];
		$j = 0;
		foreach ( $data ['attr_title'] as $k => $vo ) {
			
			if (! empty ( $vo )) {
				$res = [ ];
				$res ['title'] = $vo;
				$res ['come_from'] = $from = $data ['come_from'] [$k];
				$res ['width'] = $data ['width'] [$k];
				if ($from == 1) {
					$name = $j == 0 ? 'urls' : 'urls' . $j;
					$j ++;
					
					$res ['is_sort'] = 0;
					$res ['href'] = [ ];
					foreach ( $data ['url_title'] [$k] as $kk => $vv ) {
						$title = $vv;
						$url = $data ['url_url'] [$k] [$kk];
						if (! empty ( $title ) && ! empty ( $url )) {
							$res ['href'] [] = [ 
									'title' => $title,
									'url' => $url 
							];
						}
					}
				} else {
					$name = $data ['field'] [$k];
					$res ['is_sort'] = $data ['is_sort'] [$k];
				}
				
				$list_grid [$name] = $res;
			}
		}
		// dump ( $data );
		$res = D ( 'Common/Model' )->buildFile ( $data, null, $list_grid, $config );
		// dump ( $res );
		// exit ();
		if (! $res) {
			$this->error ( '140160:保存失败' );
		} else {
			! empty ( $config ['addon'] ) && $config ['addon'] != 'Core' && $this->update_sql ( $config ['addon'] );
			$this->success ( $res ['id'] ? '更新成功' : '新增成功', Cookie ( '__forward__' ) );
		}
	}
	
	/**
	 * 生成一个模型
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function generate() {
		if (! IS_POST) {
			// 获取所有的数据表
			$tables = D ( 'Common/Model' )->getTables ();
			
			$this->assign ( 'tables', $tables );
			$this->meta_title = '生成模型';
			$this->display ();
		} else {
			$table = I ( 'post.table' );
			empty ( $table ) && $this->error ( '140161:请选择要生成的数据表！' );
			$res = D ( 'Common/Model' )->generate ( $table, I ( 'post.name' ), I ( 'post.title' ) );
			if ($res) {
				$this->success ( '生成模型成功！', U ( 'index' ) );
			} else {
				$this->error ( '140162:' . D ( 'Common/Model' )->getError () );
			}
		}
	}
	/**
	 * 导出一个模型
	 */
	public function export($is_all = false, $model_id = 0, $export_type = 0, $return_sql = false) {
		$id = empty ( $model_id ) ? I ( 'get.id' ) : $model_id;
		$type = empty ( $export_type ) ? I ( 'get.type', 0, 'intval' ) : $export_type;
		empty ( $id ) && $this->error ( '140163:参数不能为空！' );
		$px = C ( 'DB_PREFIX' );
		
		// 模型信息
		$map ['id'] = $id;
		$model = D ( 'Common/Model' )->where ( $map )->find ();
		
		// 模型字段
		$list = D ( 'Common/Model' )->getFileInfo ( $model );
		
		// 模型数据表
		$name = get_table_name ( $model ['id'] );
		$data = [ ];
		$return_sql || $data = M ( parse_name ( $name, true ) )->select ();
		$name = strtolower ( $name );
		if ($type == 1) {
			$sql .= "DELETE FROM `{$px}model` WHERE `name`='{$model['name']}' ORDER BY id DESC LIMIT 1;\r\n";
			$sql .= "DROP TABLE IF EXISTS `{$px}" . strtolower ( $name ) . "`;";
			$path = $is_all ? RUNTIME_PATH . 'uninstall/' . $model ['name'] . '.sql' : RUNTIME_PATH . 'uninstall.sql';
		} else {
			// 获取索引表
			$index = '';
			$index_list = M ()->query ( "SHOW INDEX FROM {$px}{$name}" );
			foreach ( $index_list as $vo ) {
				if ($vo ['Key_name'] == 'PRIMARY')
					continue;
				
				if (isset ( $indexArr [$vo ['Key_name']] )) {
					$indexArr [$vo ['Key_name']] ['field'] [] = $vo ['Column_name'];
				} else {
					$px_type = '';
					if ($vo ['Index_type'] == 'FULLTEXT') {
						$px_type = 'FULLTEXT ';
					} elseif ($vo ['Non_unique'] == 0) {
						$px_type = 'UNIQUE ';
					}
					$indexArr [$vo ['Key_name']] ['text'] = $px_type . 'KEY `' . $vo ['Key_name'] . '`';
					$indexArr [$vo ['Key_name']] ['field'] [] = '`' . $vo ['Column_name'] . '`';
				}
			}
			foreach ( $indexArr as $vv ) {
				$index .= $vv ['text'] . ' (' . implode ( ',', $vv ['field'] ) . "),\r\n";
			}
			$index = trim ( $index, ",\r\n" );
			
			if ($model ['need_pk']) {
				$create_table = "`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',\r\n";
				$key = empty ( $index ) ? "PRIMARY KEY (`id`)" : "PRIMARY KEY (`id`),\r\n";
			}
			
			foreach ( $list->fields as $n => $field ) {
				// 获取默认值
				if ($field ['value'] === '') {
					$default = '';
				} elseif (is_numeric ( $field ['value'] )) {
					$default = ' DEFAULT ' . $field ['value'];
				} elseif (is_string ( $field ['value'] )) {
					$default = ' DEFAULT \'' . $field ['value'] . '\'';
				} else {
					$default = '';
				}
				$create_table .= "`{$n}`  {$field['field']} {$default} COMMENT '{$field['title']}',\r\n";
			}
			
			$sql .= <<<sql
CREATE TABLE IF NOT EXISTS `{$px}{$name}` (
{$create_table}{$key}{$index}
) ENGINE={$model['engine_type']} DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;\r\n
sql;
			$search = array (
					"\r\n",
					"'" 
			);
			$replace = array (
					'\r\n',
					"\\'" 
			);
			unset ( $field );
			foreach ( $data as $d ) {
				$field = '';
				$value = '';
				foreach ( $d as $k => $v ) {
					$field .= "`$k`,";
					$value .= "'" . str_replace ( $search, $replace, $v ) . "',";
				}
				$sql .= "INSERT INTO `" . $px . "{$name}` (" . rtrim ( $field, ',' ) . ') VALUES (' . rtrim ( $value, ',' ) . ");\r\n";
			}
			
			unset ( $model ['id'] );
			$field = '';
			$value = '';
			foreach ( $model as $k => $v ) {
				$field .= "`$k`,";
				$value .= "'" . str_replace ( $search, $replace, $v ) . "',";
			}
			$sql .= 'INSERT INTO `' . $px . 'model` (' . rtrim ( $field, ',' ) . ') VALUES (' . rtrim ( $value, ',' ) . ');' . "\r\n";
			
			$path = $is_all ? RUNTIME_PATH . 'install/' . $model ['name'] . '.sql' : RUNTIME_PATH . 'install.sql';
		}
		
		if ($return_sql)
			return $sql;
		
		if ($is_all) {
			mkdirs ( RUNTIME_PATH . 'install' );
			mkdirs ( RUNTIME_PATH . 'uninstall' );
		}
		
		file_put_contents ( $path, $sql );

		if (! $is_all)
			redirect ( SITE_URL . '/' . $path );
	}
	// 一键增加微信插件常用模型
	function add_comon_model() {
		$install_sql = './Application/Admin/Conf/common_model.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		$this->success ( '增加成功' );
	}
	// 导出全部模型数据
	function export_all() {
		$id = I ( 'id', 0, 'intval' );
		$type = I ( 'type', 0, 'intval' );
		$map ['id'] = array (
				'gt',
				$id 
		);
		$info = M ( 'model' )->where ( $map )->order ( 'id asc' )->find ();
		if (! $info) {
			echo 'It is over';
			exit ();
		}
		
		$this->export ( true, $info ['id'], 0 );
		$this->export ( true, $info ['id'], 1 );
		
		$param ['id'] = $info ['id'];
		
		echo 'export ' . $info ['name'] . ' now...';
		
		$url = U ( 'export_all', $param );
		echo '<script>window.location.href="' . $url . '"</script> ';
	}
	// 更新插件的安装卸载文件
	function update_sql($addon_name = '') {
		set_time_limit ( 0 );
		
		if (empty ( $addon_name )) {
			$id = I ( 'id', 0, 'intval' );
			$map ['id'] = array (
					'gt',
					$id 
			);
			$addon = M ( 'addons' )->where ( $map )->order ( 'id asc' )->find ();
			if (! $addon) {
				redirect ( U ( 'index' ) );
				exit ();
			}
			$addon_name = $addon ['name'];
		}
		$map2 ['addon'] = $addon_name;
		
		$list = M ( 'model' )->where ( $map2 )->order ( 'id asc' )->select ();
		if (! empty ( $list )) {
			$path = realpath ( SITE_PATH . '/Addons/' . $addon_name );
			
			$install_sql = $uninstall_sql = '';
			foreach ( $list as $info ) {
				$install_sql .= $this->export ( true, $info ['id'], 0, true ) . "\r\n" . "\r\n" . "\r\n";
				$uninstall_sql .= $this->export ( true, $info ['id'], 1, true ) . "\r\n" . "\r\n" . "\r\n";
			}
			
			// 更新文件
			@file_put_contents ( $path . '/install.sql', $install_sql );
			@file_put_contents ( $path . '/uninstall.sql', $uninstall_sql );
		}
		if (! empty ( $addon_name )) {
			return true;
		}
		
		$param ['id'] = $addon ['id'];
		echo 'update ' . $addon_name . ' now...';
		
		$url = U ( 'update_sql', $param );
		echo '<script>window.location.href="' . $url . '"</script> ';
	}
}
