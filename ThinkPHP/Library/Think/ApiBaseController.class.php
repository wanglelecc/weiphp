<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think;

use Think\Controller;

/**
 * ThinkPHP 控制器基类 抽象类
 */
class ApiBaseController extends Controller {
	
	/**
	 * 视图实例对象
	 *
	 * @var view
	 * @access protected
	 */
	protected $expires_in = 7200; // 凭证有效时间
	protected $mid = 0;
	protected $uid = 0;
	protected $user = array ();
	
	/**
	 * 架构函数 取得模板对象实例
	 *
	 * @access public
	 */
	public function __construct() {
		parent::__construct ();
		
		$uid = session ( 'mid' );
		
		// 当前登录者
		$GLOBALS ['mid'] = $this->mid = intval ( $uid );
		$myinfo = get_userinfo ( $this->mid );
		$GLOBALS ['myinfo'] = $myinfo;
		
		// 当前访问对象的uid
		$GLOBALS ['uid'] = $this->uid = intval ( $_REQUEST ['uid'] == 0 ? $this->mid : $_REQUEST ['uid'] );
		
		if (ACTION_NAME != 'access_token') {
			// $this->check_access_token ();
		}
	}
	// 获取ACCESS_TOKEN
	function access_token() {
		$map ['appid'] = I ( 'appid' );
		$map ['secret'] = I ( 'secret' );
		if (empty ( $map ['appid'] ) || empty ( $map ['secret'] )) {
			$this->error ( '115000:appid或secret参数不能为空' );
		}
		
		$dao = M ( 'api_access_token' );
		
		$cache_key = 'api_access_token_' . $map ['appid'];
		$access_token = S ( $cache_key );
		if ($access_token === false) {
			// 先从数据库中找找2小时内有效的access_token
			$map ['cTime'] = [ 
					'gt',
					NOW_TIME - $this->expires_in 
			];
			
			$info = $dao->where ( $map )->find ();
			if (! empty ( $info )) {
				$access_token = $info ['access_token'];
				$time = $this->expires_in - (NOW_TIME - $info ['cTime']);
				S ( $cache_key, $access_token, $time );
				S ( 'check_' . $access_token, 1, $time );
			}
			unset ( $map ['cTime'] );
		}
		// 重新分配access_token
		if (empty ( $access_token )) {
			// 先判断appid和secret是否正确
			$id = M ( 'apps' )->where ( $map )->getField ( 'id' );
			if (! $id) {
				$this->error ( '115001:appid或secret参数不对' );
			}
			
			// 每天限制2000次
			$map ['cTime'] = [ 
					'gt',
					strtotime ( date ( 'Y-m-d' ) ) 
			];
			$count = $dao->where ( $map )->count ();
			if ($count > 2000) {
				$this->error ( '115005:access_token每天最多只取发放2000个' );
			}
			
			$rand = rand ( 10, 99 );
			$access_token = md5 ( $id . NOW_TIME . $rand . $map ['appid'] );
			S ( $cache_key, $access_token, $this->expires_in );
			S ( 'check_' . $access_token, 1, $this->expires_in );
			
			$map ['access_token'] = $access_token;
			$map ['cTime'] = NOW_TIME;
			$res = $dao->add ( $map );
			if (! $res) {
				$this->error ( '115002:保存access_token失败' );
			}
		}
		
		$this->del_old_data ();
		
		$this->ajaxReturn ( [ 
				'access_token' => $access_token,
				'expires_in' => $this->expires_in 
		] );
	}
	function check_access_token() {
		$access_token = I ( 'access_token' );
		if (empty ( $access_token )) {
			$this->error ( '115003:缺少access_token参数' );
		}
		
		// 优先从缓存中查检
		$check = S ( 'check_' . $access_token );
		if ($check === false) {
			// 从数据库中检查
			$map ['access_token'] = $access_token;
			$map ['cTime'] = [ 
					'gt',
					NOW_TIME - $this->expires_in 
			];
			
			$check = M ( 'api_access_token' )->where ( $map )->find ();
		}
		
		if (! $check) {
			$this->error ( '115004:access_token不正确或已过期' );
		}
		
		return true;
	}
	function del_old_data() {
		// 每天只清一次
		$key = 'del_old_data_lock_' . date ( 'Y_m_d' );
		$lock = S ( $key );
		
		if ($lock !== false)
			return false;
		
		S ( $key, 1, 86400 );
		
		// 清除48小时之前的数据
		$map ['cTime'] = [ 
				'lt',
				NOW_TIME - 172800 
		];
		M ( 'api_access_token' )->where ( $map )->delete ();
	}
	
	// 重写error方法，符合API的返回格式
	protected function error($message = '', $jumpUrl = '') {
		$code = 0;
		if (strpos ( $message, ':' ) !== false) {
			list ( $code, $message ) = explode ( ':', $message, 2 );
		}
		// 提示信息
		$data ['api_msg'] = $message;
		$data ['api_status'] = 0;
		empty ( $code ) || $data ['code'] = $code;
		empty ( $jumpUrl ) || $data ['url'] = $jumpUrl;
		if (isset ( $_GET ['debug'] )) {
			dump ( $data );
		} else {
			$this->ajaxReturn ( $data );
		}
	}
}
// 设置控制器别名 便于升级
class_alias ( 'Think\Controller', 'Think\Action' );