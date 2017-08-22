<?php

// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Home\Controller;

use Think\ManageBaseController;

/**
 * 公众号管理
 */
class AppsController extends ManageBaseController {
	protected $addon, $model;
	function __construct() {
		$this->need_appinfo = false;
		parent::__construct ();
	}
	public function _initialize() {
		parent::_initialize ();
		
		$this->assign ( 'check_all', false );
		$this->assign ( 'search_url', U ( 'lists' ) );
		
		define ( 'ADDON_PUBLIC_PATH', '' );
		
		$this->model = M ( 'model' )->getByName ( 'apps' );
		$this->assign ( 'model', $this->model );
		// dump ( $this->model );
	}
	protected function _display() {
		$this->view->display ( 'Addons:' . ACTION_NAME );
	}
	function help() {
		if (empty ( $_GET ['public_id'] )) {
			$this->error ( '110009:公众号参数非法' );
		}
		$this->display ( 'Index/help' );
	}
	/**
	 * 显示指定模型列表数据
	 */
	public function lists() {
		// 获取模型信息
		$model = $this->model;
		
		// 搜索条件
		$mp_ids = M ( 'apps_link' )->where ( "uid='{$this->mid}'" )->getFields ( 'mp_id' );
		$map ['id'] = 0;
		if (! empty ( $mp_ids )) {
			$map ['id'] = $map3 ['mp_id'] = array (
					'in',
					$mp_ids 
			);
			
			$list = M ( 'apps_link' )->where ( $map3 )->group ( 'mp_id' )->field ( 'mp_id,count(1) as num' )->select ();
			foreach ( $list as $vo ) {
				$countArr [$vo ['mp_id']] = $vo ['num'];
			}
		}
		
		// 读取模型数据列表
		$name = parse_name ( get_table_name ( $model ['id'] ), true );
		$data = M ( $name )->field ( true )->where ( $map )->order ( 'id desc' )->select ();
		
		$dataTable = D ( 'Common/Model' )->getFileInfo ( $model );
		$data = $this->parseData ( $data, $dataTable->fields, $dataTable->list_grid, $dataTable->config );
		
		foreach ( $data as $d ) {
			$d ['count'] = $countArr [$d ['id']];
			$d ['is_creator'] = $d ['uid'] == $this->mid ? 1 : 0;
			$listArr [$d ['app_type']] [] = $d;
		}
		
		$list_data ['list_data'] = $listArr;
		$this->assign ( $list_data );
		
		$this->display ();
	}
	public function del() {
		$model = $this->model;
		
		$id = I ( 'id' );
		
		if (empty ( $id )) {
			$this->error ( '110010:请选择要操作的数据!' );
		}
		
		$Model = M ( get_table_name ( $model ['id'] ) );
		$map ['id'] = $id;
		$uid = $Model->where ( $map )->getField ( 'uid' );
		
		if ($uid == $this->mid) {
			
			if ($Model->where ( $map )->delete ()) {
				$map_link ['mp_id'] = $id;
				M ( 'apps_link' )->where ( $map_link )->delete ();
				
				if (C ( 'PUBLIC_BIND' )) { // TODO 通知微信解除绑定
				}
				
				$this->success ( '删除成功' );
			} else {
				$this->error ( '110011:删除失败！' );
			}
		} else {
			$map_link ['mp_id'] = $id;
			$map_link ['uid'] = $this->mid;
			M ( 'apps_link' )->where ( $map_link )->delete ();
			
			$this->success ( '删除成功' );
		}
	}
	public function edit($model = null, $id = 0) {
		$id || $id = I ( 'id' );
		redirect ( U ( 'add', [ 
				'id' => $id 
		] ) );
	}
	public function add($model = null) {
		if (IS_POST) {
			foreach ( $_POST as &$v ) {
				$v = trim ( $v );
			}
			
			$map ['uid'] = $this->mid;
			if (M ( 'manager' )->where ( $map )->find ()) {
				M ( 'manager' )->where ( $map )->save ( $_POST );
			} else {
				$_POST ['uid'] = $this->mid;
				M ( 'manager' )->add ( $_POST );
			}
			
			$data ['is_init'] = 1;
			$res = D ( 'Common/User' )->updateInfo ( $this->mid, $data );
			
			$is_open = C ( 'PUBLIC_BIND' ) && $this->mid == 46283;
			
			$url = U ( 'lists' );
			if ($res) {
				$this->success ( '保存基本信息成功！', $url );
			} elseif ($res === 0) {
				$this->success ( ' ', $url );
			} else {
				$this->error ( '110012:保存失败' );
			}
		} else {
			$manager = ( array ) M ( 'manager' )->find ( $this->mid );
			$data = D ( 'Common/User' )->find ( $this->mid );
			
			$data = array_merge ( $data, $manager );
			
			$this->assign ( 'info', $data );
			
			$this->display ();
		}
	}
	function step_0() {
		if (C ( 'PUBLIC_BIND' ) && is_install ( 'PublicBind' )) {
			$res = D ( 'Addons://PublicBind/PublicBind' )->bind ();
			if (! $res ['status']) {
				$this->error ( '110013:' . $res ['msg'] );
				exit ();
			}
			redirect ( $res ['jumpURL'] );
		}
		
		$map ['id'] = $id = I ( 'id' );
		$data = D ( 'Common/Apps' )->where ( $map )->find ();
		if (! empty ( $data ) && $data ['uid'] != $this->mid) {
			$this->error ( '110014:非法操作' );
		}
		
		$this->assign ( 'id', $id );
		
		$model = $this->model;
		if (IS_POST) {
			foreach ( $_POST as &$v ) {
				$v = trim ( $v );
			}
			if (empty ( $_POST ['public_name'] )) {
				$this->error ( '110015:公众号名称不能为空' );
			}
			if (empty ( $_POST ['public_id'] )) {
				$this->error ( '110016:原始ID不能为空' );
			}
			
			$_POST ['token'] = $_POST ['public_id'];
			$_POST ['group_id'] = intval ( C ( 'DEFAULT_APPS_GROUP_ID' ) );
			$_POST ['uid'] = $this->mid;
			$_POST ['app_type'] = 0;
			
			$map2 ['uid'] = $this->mid;
			M ( 'manager' )->where ( $map2 )->setField ( 'has_public', 1 );
			
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if (empty ( $id )) {
				if ($Model->create () && $id = $Model->add ()) {
					// 增加公众号与用户的关联关系
					$data ['uid'] = $this->mid;
					$data ['mp_id'] = $id;
					$data ['is_creator'] = 1;
					M ( 'apps_link' )->add ( $data );
					// 更新缓存
					D ( 'Common/Apps' )->clear ( $id );
					D ( 'Common/User' )->clear ( $this->mid );
					
					$url = U ( 'step_1?id=' . $id );
					
					$this->success ( '添加基本信息成功！', $url );
				} else {
					$this->error ( '110017:' . $Model->getError () );
				}
			} else {
				$_POST ['id'] = $id;
				$url = U ( 'step_1?id=' . $id );
				$Model->create () && $res = $Model->save ();
				// 更新缓存
				D ( 'Common/Apps' )->clear ( $id );
				D ( 'Common/User' )->clear ( $this->mid );
				
				if ($res) {
					$this->success ( '保存基本信息成功！', $url );
				} elseif ($res === 0) {
					$this->success ( ' ', $url );
				} else {
					$this->error ( '110018:' . $Model->getError () );
				}
			}
		} else {
			$data ['type'] = intval ( $data ['type'] );
			$this->assign ( 'info', $data );
			
			$this->display ();
		}
	}
	function step_1() {
		$id = I ( 'id' );
		$this->assign ( 'id', $id );
		
		$this->display ();
	}
	function step_2() {
		$model = $this->model;
		$id = I ( 'get.id' );
		$this->assign ( 'id', $id );
		
		$data = M ( get_table_name ( $model ['id'] ) )->find ( $id );
		if (empty ( $data ) || $data ['uid'] != $this->mid) {
			$this->error ( '110019:非法操作' );
		}
		
		$user = D ( 'Common/User' )->find ( $this->mid );
		$is_audit = $user ['is_audit'];
		$this->assign ( 'is_audit', $is_audit );
		if (IS_POST) {
			$_POST ['id'] = $id;
			
			foreach ( $_POST as &$v ) {
				$v = trim ( $v );
			}
			
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			
			if ($Model->create () && false !== $Model->save ()) {
				D ( 'Common/Apps' )->clear ( $data ['id'] );
				D ( 'Common/Apps' )->clear ( $id );
				
				if ($is_audit == 0 && ! C ( 'REG_AUDIT' )) {
					$this->success ( '提交成功！', U ( 'waitAudit', [ 
							'id' => $id 
					] ) );
				} else {
					$this->success ( '保存成功！', U ( 'Home/Apps/lists' ) );
				}
			} else {
				$this->error ( '110020:' . $Model->getError () );
			}
		} else {
			$data || $this->error ( '110021:数据不存在！' );
			
			$this->assign ( 'info', $data );
			
			$this->display ();
		}
	}
	function check_url() {
		$info = parse_url ( SITE_URL );
		if (! APP_DEBUG) {
			if ($info ['scheme'] == 'http') {
				$this->error ( '110500:小程序需要在https环境下配置' );
			}
			if ($info ['host'] == 'localhost' || $info ['host'] == '127.0.0.1') {
				$this->error ( '110501:小程序需要有域名的环境下配置' );
			}
		}
		$this->assign ( 'host', $info ['host'] );
	}
	function step_miniapp_0() {
		$this->check_url ();
		
		$map ['id'] = $id = I ( 'id' );
		$map ['app_type'] = 1;
		$data = D ( 'Common/Apps' )->where ( $map )->find ();
		if (! empty ( $data ) && $data ['uid'] != $this->mid) {
			$this->error ( '110022:非法操作' );
		}
		
		$this->assign ( 'id', $id );
		
		$model = $this->model;
		if (IS_POST) {
			foreach ( $_POST as &$v ) {
				$v = trim ( $v );
			}
			
			$_POST ['token'] = $_POST ['public_id'];
			$_POST ['group_id'] = intval ( C ( 'DEFAULT_APPS_GROUP_ID' ) );
			$_POST ['uid'] = $this->mid;
			$_POST ['app_type'] = 1;
			
			$map2 ['uid'] = $this->mid;
			M ( 'manager' )->where ( $map2 )->setField ( 'has_public', 1 );
			
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if (empty ( $id )) {
				if ($Model->create () && $id = $Model->add ()) {
					// 增加公众号与用户的关联关系
					$data ['uid'] = $this->mid;
					$data ['mp_id'] = $id;
					$data ['is_creator'] = 1;
					M ( 'apps_link' )->add ( $data );
					// 更新缓存
					D ( 'Common/Apps' )->clear ( $id );
					D ( 'Common/User' )->clear ( $this->mid );
					
					$url = U ( 'step_miniapp_1?id=' . $id );
					
					$this->success ( '添加基本信息成功！', $url );
				} else {
					$this->error ( '110023:' . $Model->getError () );
				}
			} else {
				$_POST ['id'] = $id;
				$url = U ( 'step_miniapp_1?id=' . $id );
				$Model->create () && $res = $Model->save ();
				// 更新缓存
				D ( 'Common/Apps' )->clear ( $id );
				D ( 'Common/User' )->clear ( $this->mid );
				
				if ($res) {
					$this->success ( '保存基本信息成功！', $url );
				} elseif ($res === 0) {
					$this->success ( ' ', $url );
				} else {
					$this->error ( '110024:' . $Model->getError () );
				}
			}
		} else {
			$data ['type'] = intval ( $data ['type'] );
			$this->assign ( 'info', $data );
			
			$this->display ();
		}
	}
	function step_miniapp_1() {
		$this->check_url ();
		
		$id = I ( 'id' );
		$this->assign ( 'id', $id );
		
		$baseUrl = SITE_URL . '/index.php?s=/w' . $id . '/';
		$this->assign ( 'baseUrl', $baseUrl );
		
		$this->display ();
	}
	function step_miniapp_2() {
		$model = $this->model;
		$id = I ( 'get.id' );
		$this->assign ( 'id', $id );
		
		$data = M ( get_table_name ( $model ['id'] ) )->find ( $id );
		if (empty ( $data ) || $data ['uid'] != $this->mid) {
			$this->error ( '110025:非法操作' );
		}
		
		$user = D ( 'Common/User' )->find ( $this->mid );
		$is_audit = $user ['is_audit'];
		$this->assign ( 'is_audit', $is_audit );
		if (IS_POST) {
			$_POST ['id'] = $id;
			
			foreach ( $_POST as &$v ) {
				$v = trim ( $v );
			}
			
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			
			if ($Model->create () && false !== $Model->save ()) {
				D ( 'Common/Apps' )->clear ( $data ['id'] );
				
				if ($is_audit == 0 && ! C ( 'REG_AUDIT' )) {
					$this->success ( '提交成功！', U ( 'waitAudit', [ 
							'id' => $id 
					] ) );
				} else {
					$this->success ( '保存成功！', U ( 'Home/Apps/lists' ) );
				}
			} else {
				$this->error ( '110026:' . $Model->getError () );
			}
		} else {
			$data || $this->error ( '110027:数据不存在！' );
			
			$this->assign ( 'info', $data );
			
			$this->display ();
		}
	}
	// 微信支付配置
	function payment_set() {
		$id = I ( 'id' );
		$data = D ( 'Common/Apps' )->getInfo ( $id );
		if (! empty ( $data ) && $data ['uid'] != $this->mid) {
			$this->error ( '110022:非法操作' );
		}
		
		$this->assign ( 'id', $id );
		
		if (IS_POST) {
			foreach ( $_POST as &$v ) {
				$v = trim ( $v );
			}
			$save ['appid'] = I ( 'appid' );
			if (empty ( $save ['appid'] )) {
				$this->error ( '110101:小程序APPID不能为空' );
			}
			$save ['mch_id'] = I ( 'mch_id' );
			if (empty ( $save ['mch_id'] )) {
				$this->error ( '110102:微信支付商户号不能为空' );
			}
			$save ['partner_key'] = I ( 'partner_key' );
			if (empty ( $save ['partner_key'] )) {
				$this->error ( '110103:API密钥不能为空' );
			}
			
			if (! empty ( $data ['appid'] ) && $save ['appid'] != $data ['appid']) {
				$this->error ( '110104:appid与当前账号的appid不一致' );
			}
			
			$save ['cert_pem'] = I ( 'cert_pem' );
			$save ['key_pem'] = I ( 'key_pem' );
			
			D ( 'Common/Apps' )->updateInfo ( $id, $save );
			
			// 更新缓存
			D ( 'Common/User' )->clear ( $this->mid );
			
			$this->success ( '保存成功！', U ( 'lists' ) );
		} else {
			$data ['type'] = intval ( $data ['type'] );
			$this->assign ( 'info', $data );
			
			$this->display ();
		}
	}
	protected function checkAttr($Model, $model_id) {
		$fields = get_model_attribute ( $model_id );
		$validate = $auto = array ();
		foreach ( $fields as $key => $attr ) {
			if ($attr ['is_must']) { // 必填字段
				$validate [] = array (
						$attr ['name'],
						'require',
						$attr ['title'] . '必须!' 
				);
			}
			// 自动验证规则
			if (! empty ( $attr ['validate_rule'] ) || $attr ['validate_type'] == 'unique') {
				$validate [] = array (
						$attr ['name'],
						$attr ['validate_rule'],
						$attr ['error_info'] ? $attr ['error_info'] : $attr ['title'] . '验证错误',
						0,
						$attr ['validate_type'],
						$attr ['validate_time'] 
				);
			}
			// 自动完成规则
			if (! empty ( $attr ['auto_rule'] )) {
				$auto [] = array (
						$attr ['name'],
						$attr ['auto_rule'],
						$attr ['auto_time'],
						$attr ['auto_type'] 
				);
			} elseif ('checkbox' == $attr ['type'] || 'dynamic_checkbox' == $attr ['type']) { // 多选型
				$auto [] = array (
						$attr ['name'],
						'arr2str',
						3,
						'function' 
				);
			} elseif ('datetime' == $attr ['type']) { // 日期型
				$auto [] = array (
						$attr ['name'],
						'strtotime',
						3,
						'function' 
				);
			}
		}
		return $Model->validate ( $validate )->auto ( $auto );
	}
	// 等待审核页面
	function waitAudit() {
		$data = D ( 'Common/User' )->find ( $this->mid );
		$is_audit = $data ['is_audit'];
		if ($is_audit == 0 && ! C ( 'REG_AUDIT' )) {
			$this->display ();
		} else {
			redirect ( U ( 'home/index/index' ) );
		}
	}
	// 自动检测
	function check_res() {
		$map ['id'] = I ( 'id', 0, 'intval' );
		$info = M ( 'apps' )->where ( $map )->find ();
		$type = $info ['type'];
		$arr = array (
				'0' => '普通订阅号',
				'1' => '微信认证订阅号',
				'2' => '普通服务号',
				'3' => '微信认证服务号' 
		);
		$this->assign ( 'public_type', $arr [$type] );
		$this->assign ( 'info', $info );
		
		$map2 ['token'] = $info ['token'];
		M ( 'apps_check' )->where ( $map2 )->delete ();
		
		// 获取微信权限节点
		$list = M ( 'apps_auth' )->select ();
		foreach ( $list as &$vo ) {
			$vo ['type'] = $vo ['type_' . $type];
		}
		$this->assign ( 'list_data', $list );
		// dump ( $list );
		
		$this->display ();
	}
}