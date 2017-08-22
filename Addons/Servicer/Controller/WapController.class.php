<?php

namespace Addons\Servicer\Controller;
use Think\WapBaseController;

class WapController extends WapBaseController{
	var $model;
	function _initialize() {
		$this->model = $this->getModel ( 'servicer' );
		parent::_initialize ();
	}
	public function do_login(){
		$id = I('id',0,intval);
		if(empty($id)){
			//$this -> error('授权失败！');
		}else{
			$info = M('Servicer')->where(['id' => $id ])->find();
			$fieldsAttr = get_model_attribute ( $model ['id'] );
			$roleAttr = parse_field_attr($fieldsAttr['role']['extra']);
			$roles = explode(',',$vo['role']);
			$roleStr = '';
			foreach($roles as $r){
				if(empty($roleStr)){
					$roleStr = $roleAttr[$r];
				}else{
					$roleStr = $roleStr .'<br/>'. $roleAttr[$r];
				}
			}
			$info['roleStr '] = $roleStr ;
			$this -> assign('info',$info);
		}
		$this -> display();
	}
}
