<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Home\Controller;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserController extends HomeController {
    function __construct() {
	   
		$this->need_login = false;
		$this->need_appinfo = false;
		parent::__construct();
		
	}
	// 手机绑定登录
	function wap_scan() {
		$key = I ( 'key' );
		
		get_token ( DEFAULT_TOKEN );
		
		$isWeixinBrowser = isWeixinBrowser ();
		if (! $isWeixinBrowser) {
			$this->error ( '110173:请在微信里打开' );
		}
		$info = get_token_appinfo ();
		$param ['appid'] = $info ['appid'];
		$callback = U ( 'wap_scan', array (
				'key' => $key 
		) );
		if ($_GET ['state'] != 'weiphp') {
			$param ['redirect_uri'] = $callback;
			$param ['response_type'] = 'code';
			$param ['scope'] = 'snsapi_userinfo';
			$param ['state'] = 'weiphp';
			$info ['is_bind'] && $param ['component_appid'] = C ( 'COMPONENT_APPID' );
			$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?' . http_build_query ( $param ) . '#wechat_redirect';
			redirect ( $url );
		} elseif ($_GET ['state'] == 'weiphp') {
			if (empty ( $_GET ['code'] )) {
				exit ( 'code获取失败' );
			}
			
			$param ['code'] = I ( 'code' );
			$param ['grant_type'] = 'authorization_code';
			
			if ($info ['is_bind']) {
				$param ['appid'] = I ( 'appid' );
				$param ['component_appid'] = C ( 'COMPONENT_APPID' );
				$param ['component_access_token'] = D ( 'Addons://PublicBind/PublicBind' )->_get_component_access_token ();
				
				$url = 'https://api.weixin.qq.com/sns/oauth2/component/access_token?' . http_build_query ( $param );
			} else {
				$param ['secret'] = $info ['secret'];
				
				$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?' . http_build_query ( $param );
			}
			
			$content = get_data ( $url );
			$content = json_decode ( $content, true );
			if (! empty ( $content ['errmsg'] )) {
				exit ( $content ['errmsg'] );
			}
			
			$uid = D ( 'Common/Follow' )->init_follow ( $content ['openid'], $info ['token'] );
			$user = D ( 'Common/User' )->getUserInfo ( $uid );
			
			S ( $key, $user, 120 );
			
			$this->display ();
		}
	}
	/* 注册页面 */
	public function register($username = '', $password = '', $repassword = '', $mobile = '', $truename = '', $email = '', $verify = '') {
		if (! C ( 'USER_ALLOW_REGISTER' )) {
			$this->error ( '110174:注册已关闭' );
		}
		if (IS_POST) { // 注册用户
			$username = trim ( $username );
			$hasusername = D ( 'Common/User' )->where ( array (
					'nickname' => $username 
			) )->getfield ( 'uid' );
			/* 测试用户名 */
			if (empty ( $username )) {
				$this->error ( '110175:用户名不能为空！' );
			} else if (! preg_match ( '/[a-zA-Z0-9_]$/', $username )) {
				$this->error ( '110176:用户名必须由‘字母’、‘数字’、‘_’组成！' );
			} else if (strlen ( $username ) > 16) {
				$this->error ( '110177:用户名长度必须在16个字符以内！' );
			} else if ($hasusername) {
				$this->error ( '110178:该用户名已经存在，请重新填写用户名！' );
			}
			/* 检测密码 */
			if (strlen ( $password ) < 6 || strlen ( $password ) > 30) {
				$this->error ( '110179:密码长度必须在6-30个字符之间！' );
			}
			if ($password != $repassword) {
				$this->error ( '110180:密码和重复密码不一致！' );
			}
			/* 测试手机号 */
			// if (! preg_match ( '/^(13[0-9]|15[0|3|6|7|8|9]|18[8|9])\d{8}$/', $mobile )) {
			// $this->error ( '110181:手机格式不正确！' );
			// }
			if (empty ( $mobile )) {
				$this->error ( '110182:手机号码不能为空' );
			}
			if (strlen ( $mobile ) != 11) {
				$this->error ( '110183:手机格式不正确！' );
			}
			/* 测试联系人 */
			if (empty ( $truename )) {
				$this->error ( '110184:联系人不能为空！' );
			}
			/* 测试邮箱 */
			if (empty ( $email )) {
				$this->error ( '110185:邮箱不能为空' );
			}
			if (! preg_match ( '/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/', $email )) {
				$this->error ( '110186:邮箱格式不正确！' );
			}
			
			/* 检测验证码 */
			if (! check_verify ( $verify )) {
				$this->error ( '110187:验证码输入错误！' );
			}
			// CHECKOUT
			// $map ['code'] = I ( 'invite_code' );
			// if (empty ( $map ['code'] )) {
			// $this->error ( '110188:内测码不能为空！' );
			// }
			// if (! M ( 'invite_code' )->where ( $map )->find ()) {
			// $this->error ( '110189:内测码不正确！' );
			// }
			
			/* 调用注册接口注册用户 */
			$uid = D ( 'Common/User' )->register ( $username, $password, $email, $mobile, $truename );
			
			if (0 < $uid) {
				M ( 'invite_code' )->where ( $map )->delete ();
				// 注册成功
				// TODO: 发送验证邮件
				// 关联默认可管理的公众号
				$public = C ( 'DEFAULT_PUBLIC' );
				$publicArr = array_filter ( explode ( ',', $public ) );
				foreach ( $publicArr as $p ) {
					$data ['uid'] = $uid;
					$data ['mp_id'] = $p;
					M ( 'apps_link' )->add ( $data );
				}
				
				// 自动加入公众号管理组
				$access ['uid'] = $uid;
				$access ['group_id'] = 3; // TODO 后续可优化为自动获取
				M ( 'auth_group_access' )->add ( $access );
				
				// $this->success ( '注册成功，请登录', U ( 'login' ) );
				$user ['uid'] = $uid;
				$user ['username'] = $username;
				
				D ( 'Common/User' )->autoLogin ( $user );
				$this->success ( '恭喜，注册成功！', U ( 'Home/Apps/add', array (
						'from' => 3 
				) ) );
			} else { // 注册失败，显示错误信息
				$this->error ( '110190:'.$this->showRegError ( $uid ) );
			}
		} else { // 显示注册表单
			$this->display ();
		}
	}
	
	/* 登录页面 */
	public function login($username = '', $password = '', $verify = '') {
		$key = Cookie ( 'ScanLoginKey' );
		if (IS_POST) {
			if (isset ( $_POST ['username'] )) {
				/* 检测验证码 */
				if (C ( 'WEB_SITE_VERIFY' ) && ! check_verify ( $verify )) {
					$this->error ( '110191:验证码输入错误！' );
				}
				
				$dao = D ( 'Common/User' );
				$uid = $dao->login ( $username, $password );
				if (! $uid) { // 登录失败
					$this->error ( '110192:'.$dao->getError () );
					exit ();
				}
				
				$url = Cookie ( '__forward__' );
				if ($url) {
					Cookie ( '__forward__', null );
				} else {
					$url = U ( 'Home/Index/index' );
				}
				
				// 判断是否已经绑定公众号登录
				if (C ( 'SCAN_LOGIN' )) {
					unset ( $map );
					$map ['uid'] = $uid;
					$map ['token'] = DEFAULT_TOKEN;
					$openid = M ( 'apps_follow' )->where ( $map )->getField ( 'openid' );
					if (! $openid) {
						$url = U ( 'bind_login' );
						$this->success ( '请先绑定扫码登录公众号', $url );
						exit ();
					}
				}
				$this->success ( '登录成功！', $url );
			} else {
				$user = S ( $key );
				if ($user ['uid'] > 0) {
					D ( 'Common/User' )->autoLogin ( $user );
					echo 1;
				} else {
					echo 0;
				}
			}
		} else {
			if (isMobile ()) {
				// 跳转到手机版的个人空间
				redirect ( addons_url ( 'UserCenter://Wap/userCenter', array (
						'from' => 1 
				) ) );
			}
			if (is_login ()) {
				$url = U ( 'Home/Apps/lists', array (
						'from' => 3 
				) );
				redirect ( $url );
			}
			
			if (empty ( $key )) {
				$key = uniqid ();
				Cookie ( 'ScanLoginKey', $key );
			}
			
			$this->assign ( 'key', $key );
			
			$map ['addon'] = 'ScanLogin';
			$map ['extra_text'] = $key;
			$info = M ( 'qr_code' )->where ( $map )->field ( true )->find ();
			
			if ($info && (NOW_TIME - $info ['cTime'] > $info ['expire_seconds'])) {
				M ( 'qr_code' )->where ( $map )->delete ();
				$info ['qr_code'] = '';
			}
			if (! $info ['qr_code']) {
				$dao = D ( 'Home/QrCode' );
				$dao->set_public ( C ( 'SCAN_LOGIN_PUBLIC' ) );
				$info ['qr_code'] = $dao->add_qr_code ( 'QR_SCENE', 'ScanLogin', 0, 0, $key );
			}
			$this->assign ( 'qrcode', $info ['qr_code'] );
			
			$html = 'login';
			$_GET ['from'] == 'store' && $html = 'simple_login';
			
			$this->display ( $html );
		}
	}
	function bind_login() {
		$key = Cookie ( 'ScanLoginKey' );
		if (IS_POST) {
			$has_bind = S ( $key );
			if ($has_bind == 1) {
				echo 1;
			} else {
				echo 0;
			}
		} else {
			if (empty ( $key )) {
				$key = uniqid ();
				Cookie ( 'ScanLoginKey', $key );
			}
			S ( $key, 0 );
			$this->assign ( 'key', $key );
			
			$map ['addon'] = 'ScanBindLogin';
			$map ['extra_text'] = $key;
			$info = M ( 'qr_code' )->where ( $map )->field ( true )->find ();
			
			if ($info && (NOW_TIME - $info ['cTime'] > $info ['expire_seconds'])) {
				M ( 'qr_code' )->where ( $map )->delete ();
				$info ['qr_code'] = '';
			}
			if (! $info ['qr_code']) {
				$info ['qr_code'] = D ( 'Home/QrCode' )->add_qr_code ( 'QR_SCENE', 'ScanBindLogin', 0, $this->mid, $key );
			}
			$this->assign ( 'qrcode', $info ['qr_code'] );
			
			$this->display ();
		}
	}
	
	/* 退出登录 */
	public function logout() {
		if (is_login ()) {
			$key = Cookie ( 'ScanLoginKey' );
			S ( $key, NULL );
			
			D ( 'Common/User' )->logout ();
			
			if (isset ( $_GET ['no_tips'] )) {
				$this->redirect ( 'User/login' );
			}
			$this->redirect ( 'User/login' );
			// $this->success ( '退出成功！', U ( 'User/login' ) );
		} else {
			$this->redirect ( 'User/login' );
		}
	}
	
	/* 验证码，用于登录和注册 */
	public function verify() {
		$verify = new \Think\Verify ();
		$verify->entry ( 1 );
	}
	
	/**
	 * 获取用户注册错误信息
	 *
	 * @param integer $code
	 *        	错误编码
	 * @return string 错误信息
	 */
	private function showRegError($code = 0) {
		switch ($code) {
			case - 1 :
				$error = '用户名长度必须在16个字符以内！';
				break;
			case - 2 :
				$error = '用户名被禁止注册！';
				break;
			case - 3 :
				$error = '用户名被占用！';
				break;
			case - 4 :
				$error = '密码长度必须在6-30个字符之间！';
				break;
			case - 5 :
				$error = '邮箱格式不正确！';
				break;
			case - 6 :
				$error = '邮箱长度必须在1-32个字符之间！';
				break;
			case - 7 :
				$error = '邮箱被禁止注册！';
				break;
			case - 8 :
				$error = '邮箱被占用！';
				break;
			case - 9 :
				$error = '手机格式不正确！';
				break;
			case - 10 :
				$error = '手机被禁止注册！';
				break;
			case - 11 :
				$error = '手机号被占用！';
				break;
			default :
				// $error = '未知错误';
				$error = '用户名被占用！';
		}
		return $error;
	}
	
	/**
	 * 修改密码提交
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function profile() {
		if (! is_login ()) {
			$this->error ( '110193:您还没有登陆', U ( 'User/login' ) );
		}
		if (IS_POST) {
			// 获取参数
			$uid = is_login ();
			$password = I ( 'post.old' );
			$repassword = I ( 'post.repassword' );
			$data ['password'] = I ( 'post.password' );
			empty ( $password ) && $this->error ( '110194:请输入原密码' );
			empty ( $data ['password'] ) && $this->error ( '110195:请输入新密码' );
			empty ( $repassword ) && $this->error ( '110196:请输入确认密码' );
			
			if ($data ['password'] !== $repassword) {
				$this->error ( '110197:您输入的新密码与确认密码不一致' );
			}
			$isUser = get_userinfo ( $uid, 'manager_id' );
			if ($isUser) {
				$data ['login_password'] = $data ['password'];
			}
			$res = D ( 'Common/User' )->updateUserFields ( $uid, $password, $data );
			if ($res !== false) {
				$this->success ( '修改密码成功！' );
			} else {
				$this->error ( '110198:修改密码失败！' );
			}
		} else {
			$this->display ();
		}
	}
	
	// 子站扫码登录demo
	public function scan_login() {
		// 如果已登录，直接跳转到网站内
		if (is_login ()) {
			return redirect ( U ( 'Home/Apps/lists' ) );
		}
		// 生成LoginKey，并放到Cookie中，防止用户重复刷新获取二维码
		$key = cookie ( 'LoginKey' );
		if (empty ( $key )) {
			$key = uniqid ();
			cookie ( 'LoginKey', $key );
		}
		$this->assign ( 'LoginKey', $key );
		
		$main_url = 'http://demo.weiphp.cn/'; // 主站的网址，开发者要替换成自己的网站
		                                      
		// 获取二维码的地址 TODO 待加上access_token
		$qr_code = get_data ( $main_url . 'index.php?s=/Home/ScanLoginApi/getQrCode/key/' . $key );
		
		$this->assign ( 'qr_code', $qr_code );
		
		$this->display ();
	}
	function checkLogin() {
		$main_url = 'http://demo.weiphp.cn/'; // 主站的网址，开发者要替换成自己的网站
		
		$key = cookie ( 'LoginKey' );
		// 通过LoginKey获取用户扫码进度
		$user = get_data ( $main_url . 'index.php?s=/Home/ScanLoginApi/checkLogin/key/' . $key );
		
		if (empty ( $user )) { // 用户未扫码,直接返回
			exit ( '0' );
		}
		
		// 已扫码，获取用户信息
		$user = json_decode ( $user, true );
		unset ( $user ['uid'] );
		
		// 获取用户ID，如果用户未注册，会自动完成注册
		$user ['uid'] = D ( 'Common/Follow' )->init_follow ( $user ['openid'], $user ['token'], false, $user );
		
		// 自动完成登录
		D ( 'Common/User' )->autoLogin ( $user );
		
		$return ['status'] = 1;
		$return ['url'] = cookie ( '__forward__' );
		if (! $return ['url']) {
			$return ['url'] = U ( 'Home/Apps/lists' );
		} else {
			cookie ( '__forward__', null );
		}
		
		// 返回跳转地址信息
		exit ( json ( $return ) );
	}
}