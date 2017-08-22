<?php

namespace Addons\Forms\Controller;

use Addons\Forms\Controller\BaseController;

class FormsValueController extends BaseController {
	var $model;
	var $forms_id;
	function _initialize() {
		parent::_initialize ();
		
		$this->model = $this->getModel ( 'forms_value' );
		
		// $param ['forms_id'] = $this->forms_id = intval ( $_REQUEST ['forms_id'] );
		$param ['forms_id'] = $this->forms_id = intval ( I ( 'forms_id' ) );
		$res ['title'] = '通用表单';
		$res ['url'] = addons_url ( 'Forms://Forms/lists' );
		$res ['class'] = '';
		$nav [] = $res;
		
		$res ['title'] = '数据管理';
		$res ['url'] = addons_url ( 'Forms://FormsValue/lists', $param );
		$res ['class'] = 'current';
		$nav [] = $res;
		
		$this->assign ( 'nav', $nav );
	}
	
	// 通用插件的列表模型
	public function lists() {
		$this->assign ( 'add_button', false );
		$this->assign ( 'search_button', false );
		
		$dataTable = D ( 'Common/Model' )->getFileInfo ( $this->model );
		$list_data ['list_grids'] = $dataTable->list_grid;
		
		$admin_grid = array_pop ( $list_data ['list_grids'] );
		// 解析列表规则
		
		$map ['forms_id'] = $this->forms_id;
		$attribute = M ( 'forms_attribute' )->where ( $map )->order ( 'sort asc, id asc' )->select ();
		foreach ( $attribute as &$fd ) {
			$fd ['name'] = 'attr_' . $fd ['forms_id'] . '_' . $fd ['sort'];
		}
		foreach ( $attribute as $vo ) {
			$list_data ['list_grids'] [$vo ['name']] = [ 
					'title' => $vo ['title'] 
			];
			
			$attr [$vo ['name']] ['type'] = $vo ['type'];
			
			if ($vo ['type'] == 'radio' || $vo ['type'] == 'checkbox' || $vo ['type'] == 'select') {
				$extra = parse_config_attr ( $vo ['extra'],'/[\s;\r\n|]+/' );
				if (is_array ( $extra ) && ! empty ( $extra )) {
					$attr [$vo ['name']] ['extra'] = $extra;
				}
			} elseif ($vo ['type'] == 'cascade' || $vo ['type'] == 'dynamic_select' || $vo ['type'] == 'dynamic_checkbox') {
				$attr [$vo ['name']] ['extra'] = $vo ['extra'];
			}
		}
		
		$param ['forms_id'] = $this->forms_id;
		$param ['model'] = $this->model ['id'];
		$add_url = U ( 'add', $param );
		$this->assign ( 'add_url', $add_url );
		
		// 搜索条件
		$map = $this->_search_map ( $this->model );
		
		$page = I ( 'p', 1, 'intval' );
		$row = 20;
		
		$name = parse_name ( get_table_name ( $this->model ['id'] ), true );
		$list = M ( $name )->where ( $map )->order ( 'id DESC' )->selectPage ();
		$list ['list_data'] = $this->parseData ( $list ['list_data'], $dataTable->fields, $dataTable->list_grid, $dataTable->config );
		
		$list_data = array_merge ( $list_data, $list );
		foreach ( $list_data ['list_data'] as &$vo ) {
			$value = unserialize ( $vo ['value'] );
			foreach ( $value as $n => &$d ) {
				$type = $attr [$n] ['type'];
				$extra = $attr [$n] ['extra'];
			
				if ($type == 'radio' || $type == 'select') {
					if ($extra) {
						// $extArr = explode ( ' ', $extra [0] );
						$d = $extra [$d];
					}
				} elseif ($type == 'checkbox') {
					
					// $extArr = explode ( ' ', $extra);
					
					// var_dump($extra[1]);
					foreach ( $d as &$v ) {
						// var_dump($d);
						if (isset ( $extra [$v] )) {
							$v = $extra [$v];
						}
					}
					$d = implode ( ', ', $d );
				} elseif ($type == 'datetime') {
					$d = time_format ( $d );
				} elseif ($type == 'picture') {
					$imgstr = '';
					foreach ( $d as $p ) {
						$imgstr .= get_img_html ( $p ) . '&nbsp;&nbsp;';
					}
					$d = $imgstr;
					// dump($d);
					// $d = get_cover_url ( $d );
				} elseif ($type == 'cascade') {
					$d = getCascadeTitle ( $d, $extra );
				}
			}
			
			unset ( $vo ['value'] );
			$vo = array_merge ( $vo, $value );
		}
		$list_data ['list_grids'] ['urls'] = $admin_grid;
		$this->assign ( $list_data );
		
		
		$this->display ();
	}
	
	// 通用插件的编辑模型
	public function edit() {
		$this->add ();
	}
	function detail() {
		$id = I ( 'id' );
		// $forms = M ( 'forms' )->find ( $id );
		$forms = D ( 'Forms' )->getInfo ( $id );
		$forms ['cover'] = ! empty ( $forms ['cover'] ) ? get_cover_url ( $forms ['cover'] ) : ADDON_PUBLIC_PATH . '/background.png';
		$this->assign ( 'forms', $forms );
		
		$this->display ();
	}
	
	// 通用插件的删除模型
	public function del() {
		parent::common_del ( $this->model );
	}
}
