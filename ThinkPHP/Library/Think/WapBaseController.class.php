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
class WapBaseController extends Controller {
	
	/**
	 * 视图实例对象
	 *
	 * @var view
	 * @access protected
	 */
	protected $mid = 0;
	protected $uid = 0;
	protected $user = array ();
	protected $get_param = array ();
	
	/**
	 * 控制器参数
	 *
	 * @var config
	 * @access protected
	 */
	protected $config = array ();
	
	/**
	 * 架构函数 取得模板对象实例
	 *
	 * @access public
	 */
	public function __construct() {
		parent::__construct ();
		
		$info = [ ];
		if ($this->need_appinfo) {
			$info = $this->initPublic ();
			if ($info == false) {
				$this->error ( '100018:公众号信息缺失' );
			}
		}
		
		if ($this->need_login) {
			$user = $this->initUser ();
			if ($user == false) {
				// Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] );
				// $this->error ( '100019:请先登录', addons_url ( 'UserCenter:///Wap/login' ) );
			}
		}
		
		// 权限验证，原则：开放一切未禁止的页面
		if ($this->mid > 0 && ! checkRule ( '', $this->mid )) {
			$this->error ( '100020:您无权访问！' );
		}
		
		// 控制器初始化
		if (method_exists ( $this, '_initialize' ))
			$this->_initialize ();
	}
	// 初始化操作
	function _initialize() {
	}
	
	// 初始化公众号信息
	private function initPublic() {
		$token = get_token ();
		if (! $token || $token == - 1)
			return false;
		
		$info = $GLOBALS ['public_info'] = get_token_appinfo ( $token );
		if (! $info)
			return false;
			
			// 设置公众号管理者信息
		if ($info ['uid']) {
			$manager_id = $info ['uid'];
			session ( 'manager_id', $manager_id );
		}
		$manager = get_userinfo ( $manager_id );
		// 设置版权信息
		$this->assign ( 'system_copy_right', empty ( $manager ['copy_right'] ) ? C ( 'COPYRIGHT' ) : $manager ['copy_right'] );
		$tongji_code = empty ( $manager ['tongji_code'] ) ? C ( 'TONGJI_CODE' ) : $manager ['tongji_code'];
		
		$param = $_GET;
		$param ['publicid'] = $info ['id'];
		$param ['m'] = MODULE_NAME;
		$param ['c'] = CONTROLLER_NAME;
		$param ['a'] = ACTION_NAME;
		$param ['uid'] = intval ( session ( 'mid' ) );
		$tongji_code .= '<script>$.post("' . SITE_URL . '/log.php?' . http_build_query ( $param ) . '");</script>';
		$this->assign ( 'tongji_code', $tongji_code );
		
		// 公众号接口权限
		$config = S ( 'PUBLIC_AUTH_' . $info ['type'] );
		if (! $config) {
			$config = M ( 'apps_auth' )->getField ( 'name,type_' . intval ( $info ['type'] ) . ' as val' );
			
			S ( 'PUBLIC_AUTH_' . $info ['type'], $config, 86400 );
		}
		C ( $config ); // 公众号接口权限
		               
		// 初始化微信JSAPI需要的参数
		Vendor ( 'jssdk.jssdk' );
		$jssdk = new \JSSDK ( $info ['appid'], $info ['secret'] );
		$jsapiParams = $jssdk->GetsignPackage ();
		$this->assign ( 'jsapiParams', $jsapiParams );
		
		$this->assign ( 'page_title', $info ['public_name'] ); // 用公众号名作为默认的页面标题
		$this->assign ( 'public_info', $info ); // 通用公众号信息
		
		return $info;
	}
	// 初始化用户信息
	private function initUser() {
		$uid = session ( 'mid' );
		
		// 重新跳转，去掉URL中的openid参数，以防分享出去的地址带有openid参数
		$openid = I ( 'get.openid' );
		
		if (! empty ( $openid ) && $openid != '-1' && $openid != '-2' && IS_GET) {
			$token = session ( 'token' );
			$old_openid = session ( 'openid_' . $token );
			get_openid ( $openid );
			$is_manager = M ( 'manager' )->find ( $uid );
			if (! $is_manager && $old_openid != $openid) {
				session ( 'mid', null );
			}
			if (! $is_manager) {
				$sreach_arr = array (
						'/openid/' . $openid,
						'&openid=' . $openid,
						'?openid=' . $openid 
				);
				$url = str_replace ( $sreach_arr, '', $_SERVER ['REQUEST_URI'] );
				redirect ( $url );
			}
		}
		
		if (! $uid || $uid <= 0) {
			$uid = get_uid_by_openid ();
			$uid > 0 && session ( 'mid', $uid );
		}
		if ($uid <= 0)
			return false;
			
			// 当前登录者
		$GLOBALS ['mid'] = $this->mid = intval ( $uid );
		$myinfo = get_userinfo ( $this->mid );
		$GLOBALS ['myinfo'] = $myinfo;
		
		// 当前访问对象的uid
		$GLOBALS ['uid'] = $this->uid = intval ( $_REQUEST ['uid'] == 0 ? $this->mid : $_REQUEST ['uid'] );
		
		$this->assign ( 'mid', $this->mid ); // 登录者
		$this->assign ( 'uid', $this->uid ); // 访问对象
		$this->assign ( 'myinfo', $GLOBALS ['myinfo'] ); // 访问对象
		
		return $GLOBALS ['myinfo'];
	}
}
// 设置控制器别名 便于升级
class_alias ( 'Think\Controller', 'Think\Action' );