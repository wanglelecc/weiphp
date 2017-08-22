<?php

namespace WeiApp\Controller;

use Think\Controller;

class ApiController extends Controller {
	function index() {
		// 接口请求日志记录 TODO
		$param = I ();
		// dump($param);exit;
		if (! isset ( $param ['act'] )) {
			$this->error ( '参数出错' );
		}
		$mod = isset ( $param ['mod'] ) ? $param ['mod'] : 'weiapp';
		$act = $param ['act'];
		
		$res = D ( $mod )->$act ( $param );
		echo $res;
		// 接口返回日志记录 TODO
		// return $res;
	}
	function sendCode() {
		$code = I ( 'code' );
		
		$param = [ 
				'appid' => C ( '_appid' ),
				'secret' => C ( '_secret' ),
				'js_code' => $code,
				'grant_type' => 'authorization_code' 
		];
		$url = "https://api.weixin.qq.com/sns/jscode2session?appid={$param['appid']}&secret={$param['secret']}&js_code={$param['js_code']}&grant_type=authorization_code";
		// openid 用户唯一标识 session_key 会话密钥
		$data = post_data ( $url, [ ] ); // {"session_key":"gHkoobsIWnTYnUj1ZTQKDA==","expires_in":2592000,"openid":"onfcX0fV3mjzsLRK7C15vk_2N86w"}
		if ((isset ( $data ['errcode'] ) && $data ['errcode'] == '40029') || ! isset ( $data ['session_key'] ) || ! isset ( $data ['openid'] )) {
			return api_return ( 410001, [ ], '获取微信信息失败！' );
		} else {
			session ( 'session_key', $data ['session_key'] );
			session ( 'openid', $data ['openid'] );
			if (! M ( 'public_follow' )->where ( 'openid', $data ['openid'] )->find ()) {
				$uid = M ( 'user' )->insertGetId ( [ 
						'reg_time' => NOW_TIME 
				] );
				M ( 'public_follow' )->insert ( [ 
						'openid' => $data ['openid'],
						'uid' => $uid 
				] );
			} else {
				$re = M ( 'public_follow' )->alias ( 'a' )->join ( DB_PREFIX . 'user b', 'a.uid = b.uid' )->where ( 'a.openid', $data ['openid'] )->find ();
				session ( 'user_info', $re );
				$uid = $re ['uid'];
			}
			$uid = 1;
			// $this->saveSession ();
			session ( 'mid', $uid );
			session ( 'uid', $uid );
			/*
			 * session('mid',1);
			 * session('uid',1);
			 */
			$return ['PHPSESSID'] = session_id ();
			$return ['openid'] = $data ['openid'];
			
			$res = api_return ( 0, $return );
			
			echo $res;
		}
	}
	function saveUserInfo() {
		$encryptedData = I ( 'encryptedData' );
		$iv = I ( 'iv' );
		if ($encryptedData != '' && $iv != '') {
			include_once EXTEND_PATH . 'decrypdata/wxBizDataCrypt.php';
			$appid = C ( '_appid' );
			$sessionKey = C ( 'session_key' );
			
			$pc = new \WXBizDataCrypt ( $appid, $sessionKey );
			$errCode = $pc->decryptData ( $encryptedData, $iv, $data );
			
			if ($errCode == 0) {
				$data = json_decode ( $data, true );
				session ( 'user_info', $data );
				$save = [ 
						'nickname' => $data ['nickName'],
						'sex' => $data ['gender'],
						'language' => $data ['language'],
						'city' => $data ['city'],
						'province' => $data ['province'],
						'country' => $data ['country'],
						'headimgurl' => $data ['avatarUrl'] 
				];
				isset ( $data ['unionid'] ) && $save ['unionid'] = $data ['unionid'];
				if (session ( 'mid' ) > 0) {
					$res = D ( 'common/User' )->save ( $save, [ 
							'uid' => session ( 'mid' ) 
					] );
					$save ['uid'] = session ( 'mid' );
					D ( 'common/User' )->autoLogin ( $save );
					return api_return ( 0, $res );
				} else {
					return api_return ( 4100025, [ ], '登录错误' );
				}
			} else {
				// print($errCode . "\n");
				return api_return ( $errCode, [ ] );
			}
		} else {
			return api_return ( 140002, [ ], '缺少用户加密信息' );
		}
	}
	/*
	 * function saveSession() {
	 * $list = D ( 'Addons://Shop/Cart' )->saveSession ();
	 *
	 * return $list;
	 * }
	 */
}

