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
 * 用户扫码登录的主站接口端
 */
class ScanLoginApiController extends ManageBaseController {
	function __construct() {
		$this->need_login = false;
		$this->need_appinfo = false;
		parent::__construct ();
	}
	function getQrCode() {
		$key = I ( 'key' );
		if (empty ( $key )) {
			exit ( '0' );
		}
		
		$map ['addon'] = 'ScanLogin';
		$map ['extra_text'] = $key;
		$info = M ( 'qr_code' )->where ( $map )->field ( true )->find ();
		
		$qr_code = $info ['qr_code'];
		if ($info && (NOW_TIME - $info ['cTime'] > $info ['expire_seconds'])) {
			M ( 'qr_code' )->where ( $map )->delete ();
			$qr_code = '';
		}
		
		if (! $qr_code) {
			$qr_code = D ( 'Home/QrCode' )->add_qr_code ( 'QR_SCENE', 'ScanLogin', 0, 0, $key );
		}
		exit ( $qr_code );
	}
	function checkLogin() {
		$key = I ( 'key' );
		// 该缓存的值是在Wecomme插件的扫码事件处理中赋值的
		$user = S ( $key );
		if ($user ['uid'] > 0) {
			exit ( json_encode ( $user ) );
		} else {
			exit ( '0' );
		}
	}
}