<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 凡星
// +----------------------------------------------------------------------
namespace Admin\Controller;

/**
 * 模型数据管理控制器
 *
 * @author 凡星
 */
class MenuController extends AdminController {
	
	/**
	 * 显示指定模型列表数据
	 *
	 * @param String $model
	 *        	模型标识
	 * @author 凡星
	 */
	public function lists($model = null, $p = 0) {
		$model = $this->getModel ( 'menu' );
		
		$map ['place'] = I ( 'place', 0, 'intval' );
		session ( 'common_condition', $map );
		
		$model ['list_row'] = 10000;
		$list_data = $this->_get_model_list ( $model, $p );
		// dump ( $list_data ['list_data'] );
		$list_data ['list_data'] = $this->_get_data ( $map, $list_data ['list_data'] );
		$this->assign ( $list_data );
		// dump ( $list_data ['list_data'] );
		
		$this->meta_title = '导航菜单管理';
		
		$this->display ();
	}
	function _get_data($map, $list_data) {
		$hask = [ ];
		foreach ( $list_data as $vo ) {
			$hask [$vo ['id']] = $vo ['ids'];
		}
		$list = M ( 'menu' )->field ( true )->where ( $map )->order ( 'sort asc,id asc' )->select ();
		// lastsql ();
		// 取一级菜单
		foreach ( $list as $k => $vo ) {
			if ($vo ['pid'] != 0)
				continue;
			
			$url = U ( 'add', [ 
					'place' => $_GET ['place'],
					'pid' => $vo ['id'] 
			] );
			$vo ['ids'] = '<a target="_self" href="' . $url . '">增加子菜单</a>&nbsp;&nbsp;&nbsp;' . $hask [$vo ['id']];
			$one_arr [$vo ['id']] = $vo;
			unset ( $list [$k] );
		}
		
		foreach ( $one_arr as $p ) {
			$data [] = $p;
			
			$two_arr = array ();
			foreach ( $list as $key => $l ) {
				if ($l ['pid'] != $p ['id'])
					continue;
				
				$l ['title'] = '├──' . $l ['title'];
				$l ['ids'] = $hask [$l ['id']];
				$two_arr [] = $l;
				unset ( $list [$key] );
			}
			
			$data = array_merge ( $data, $two_arr );
		}
		
		return $data;
	}
	public function edit($model = null, $id = 0) {
		if (IS_POST) {
			$_POST = $this->_check_data ( $_POST );
		}
		
		$model = $this->getModel ( 'menu' );
		$id || $id = I ( 'id' );
		
		// 获取数据
		$data = M ( get_table_name ( $model ['id'] ) )->find ( $id );
		$data || $this->error( '140151:数据不存在！' );
		
		$token = get_token ();
		if (isset ( $data ['token'] ) && $token != $data ['token'] && defined ( 'ADDON_PUBLIC_PATH' )) {
			$this->error( '140152:非法访问！' );
		}
		
		if (IS_POST) {
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if ($Model->create () && $Model->save ()) {
				$this->success ( '保存成功！', U ( 'lists', [ 
						'place' => I ( 'place' ) 
				] ) );
			} else {
				$this->error( '140153:' . $Model->getError () );
			}
		} else {
			$this->getFiedls ( $model ['id'] );
			$this->assign ( 'data', $data );
			
			$this->display ();
		}
	}
	public function add() {
		$model = $this->getModel ( 'menu' );
		if (IS_POST) {
			$_POST = $this->_check_data ( $_POST );
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if ($Model->create () && $id = $Model->add ()) {
				$this->success ( '增加成功！', U ( 'lists', [ 
						'place' => I ( 'place' ) 
				] ) );
			} else {
				$this->error( '140154:' . $Model->getError () );
			}
		} else {
			$this->getFiedls ( $model ['id'] );
			
			$pid = $map ['id'] = I ( 'pid', 0, 'intval' );
			if ($pid) {
				$this->assign ( 'pid', $pid );
				
				$this->assign ( 'p_title', M ( 'menu' )->where ( $map )->getField ( 'title' ) );
				$this->display ( 'add_sub' );
			} else {
				$this->display ();
			}
		}
	}
	private function getFiedls($model_id) {
		$fields = get_model_attribute ( $model_id );
		$place = I ( 'place', 0, 'intval' );
		$fields ['pid'] ['extra'] = str_replace ( '[place]', $place, $fields ['pid'] ['extra'] );
		// dump ( $fields );
		$this->assign ( 'fields', $fields );
	}
	public function del($ids = null) {
		$model = $this->getModel ( 'menu' );
		parent::common_del ( $model, $ids );
	}
	private function _check_data($data) {
		if ($data ['url_type'] == 0) {
			$data ['url'] = '';
		} else {
			$data ['addon_name'] = '';
		}
		return $data;
	}
}