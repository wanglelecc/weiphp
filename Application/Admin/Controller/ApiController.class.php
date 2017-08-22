<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Admin\Controller;

/**
 * 后台首页控制器
 *
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class ApiController extends AdminController {
	public function lists() {
		$dataTable = D ( 'Common/Model' )->getFileInfo ( 'api' );
		
		$config = $dataTable->config;
		$this->assign ( $config );
		// dump ( $config );
		
		$this->_search_map ( $config, $dataTable->fields );
		
		$list_grid = $dataTable->list_grid;
		$this->assign ( 'list_grid', $list_grid );
		// dump ( $list_grid );
		
		$list_data = $this->_get_model_list ( $dataTable->config );
		foreach ( $list_data ['list_data'] as &$vo ) {
			$vo ['url'] = SITE_URL . '/index.php?s=/Api/Api/index/mod/' . $vo ['mod'] . '/act/' . $vo ['url'] . '/access_token/ACCESS_TOKEN';
		}
		// dump ( $list_data );
		$this->assign ( $list_data );
		
		$this->display ();
	}
	function doc() {
		$id = I ( 'id' );
		$url = U ( 'Api/Index/index' ) . '#content' . $id;
		redirect ( $url );
	}
	public function getFields() {
		$mod = I ( 'mod' );
		$model = $this->getModel ( $mod );
		
		$dataTable = D ( 'Common/Model' )->getFileInfo ( $mod );
		
		$typeArr = [ 
				'num' => 'Int',
				'string' => 'String',
				'textarea' => 'String',
				'date' => 'Int',
				'datetime' => 'Int',
				'bool' => 'bool',
				'select' => 'String',
				'radio' => 'String',
				'checkbox' => 'String',
				'editor' => 'String',
				'picture' => 'Int',
				'file' => 'Int',
				'cascade' => 'String',
				'mult_picture' => 'String',
				'dynamic_select' => 'String',
				'dynamic_checkbox' => 'String',
				'material' => 'String',
				'prize' => 'String',
				'news' => 'Int',
				'image' => 'Int',
				'user' => 'Int',
				'users' => 'Int',
				'admin' => 'Int' 
		];
		
		$html = "<option value='0'>请选择</option>";
		if ($model ['need_pk']) {
			$html .= "<option value='id' data-must='0' data-type='Int' data-remark='' >ID主键</option>";
		}
		foreach ( $dataTable->fields as $n => $f ) {
			$type = isset ( $typeArr [$f ['type']] ) ? $typeArr [$f ['type']] : '';
			$html .= "<option value='{$n}' data-must='{$f['is_must']}' data-type='{$type}' data-remark='{$f['remark']}' >{$f['title']}</option>";
		}
		echo $html;
	}
	public function add() {
		if (IS_POST) {
			// dump ( $_POST );
			// exit ();
			$model = $this->getModel ( 'api' );
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			$Model->create ();
			$id = $Model->add ();
			if ($id) {
				$this->saveParam ( $id, $_POST );
				$this->success ( '添加' . $model ['title'] . '成功！', U ( 'lists?model=' . $model ['name'], $this->get_param ) );
			} else {
				$this->error ( '100007:' . $Model->getError () );
			}
		} else {
			$this->display ( 'edit' );
		}
	}
	public function edit() {
		$model = $this->getModel ( 'api' );
		if (IS_POST) {
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			$Model->create ();
			$id = $Model->save ();
			if ($id) {
				$this->saveParam ( 0, $_POST );
				$this->success ( '添加' . $model ['title'] . '成功！', U ( 'lists?model=' . $model ['name'], $this->get_param ) );
			} else {
				$this->error ( '100007:' . $Model->getError () );
			}
		} else {
			$dataTable = D ( 'Common/Model' )->getFileInfo ( 'api' );
			
			$config = $dataTable->config;
			$this->assign ( $config );
			// dump ( $config );
			
			$this->_search_map ( $config, $dataTable->fields );
			
			$list_grid = $dataTable->list_grid;
			$this->assign ( 'list_grid', $list_grid );
			// dump ( $list_grid );
			$id = $pmap ['api_id'] = I ( 'id' );
			$data = M ( 'api' )->find ( $id );
			$this->assign ( 'data', $data );
			
			$list = M ( 'api_param' )->where ( $pmap )->order ( 'id asc' )->select ();
			
			$params = [ ];
			foreach ( $list as $vo ) {
				$params [$vo ['param_type']] [] = $vo;
			}
			$this->assign ( 'params', $params );
			// dump ( $params );
			
			$fields = [ ];
			$mod = $data ['mod'];
			$dataTable = D ( 'Common/Model' )->getFileInfo ( $mod );
			
			$typeArr = [ 
					'num' => 'Int',
					'string' => 'String',
					'textarea' => 'String',
					'date' => 'Int',
					'datetime' => 'Int',
					'bool' => 'bool',
					'select' => 'String',
					'radio' => 'String',
					'checkbox' => 'String',
					'editor' => 'String',
					'picture' => 'Int',
					'file' => 'Int',
					'cascade' => 'String',
					'mult_picture' => 'String',
					'dynamic_select' => 'String',
					'dynamic_checkbox' => 'String',
					'material' => 'String',
					'prize' => 'String',
					'news' => 'Int',
					'image' => 'Int',
					'user' => 'Int',
					'users' => 'Int',
					'admin' => 'Int' 
			];
			if ($model ['need_pk']) {
				$fields ['id'] = [ 
						'name' => 'id',
						'type' => 'Int',
						'is_must' => 0,
						'remark' => '',
						'title' => 'ID主键' 
				];
			}
			foreach ( $dataTable->fields as $n => $f ) {
				$fields [$n] = $f;
				$fields [$n] ['name'] = $n;
				$fields [$n] ['type'] = isset ( $typeArr [$f ['type']] ) ? $typeArr [$f ['type']] : '';
			}
			$this->assign ( 'param_fields', $fields );
			// dump ( $fields );
			
			$this->display ();
		}
	}
	function saveParam($api_id, $param) {
		$api_id == 0 && $api_id = $param ['id'];
		
		$param_type = [ 
				'condition',
				'order',
				'save' 
		];
		$dao = M ( 'api_param' );
		
		$data ['api_id'] = $api_id;
		// 删除老数据
		$dao->where ( $data )->delete ();
		
		foreach ( $param_type as $ptype ) {
			if (! isset ( $param [$ptype] ))
				continue;
			
			$data ['param_type'] = $ptype;
			foreach ( $param [$ptype] as $ptype => $vo ) {
				$add_data = array_merge ( $data, $vo );
				$dao->add ( $add_data );
			}
		}
	}
	public function del() {
		$map ['id'] = $param_map ['api_id'] = I ( 'id' );
		
		$res = M ( 'api' )->where ( $map )->delete ();
		if ($res) {
			M ( 'api_param' )->where ( $param_map )->delete ();
			$this->success ( '删除成功' );
		} else {
			$this->error ( '删除失败' );
		}
	}
}
