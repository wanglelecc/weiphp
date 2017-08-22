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
 * 微信扫码支付接口
 */
class ScanPayApiController extends HomeController {
	function __construct() {
		$this->need_login = false;
		$this->need_appinfo = false;
		parent::__construct ();
	}
	function getQrCode() {
		$key = I ( 'key' );
		if (empty ( $key )) {
			echo 0;
			exit ();
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
		echo $qr_code;
	}
	function checkPay() {
		$key = I ( 'key' );
		
		$map ['id'] = S ( 'checkPay_' . $key );
		if (! empty ( $map ['id'] )) {
			$info = M ( 'payment_order' )->where ( $map )->find ();
			$res = think_encrypt ( json_encode ( $info ), 'weiphp' );
			echo $res;
		} else {
			echo 0;
		}
	}
	function pay() {
		get_token ( DEFAULT_TOKEN );
		get_openid ();
		
		$key = I ( 'key' );
		$this->assign ( 'key', $key );
		$this->display ();
	}
	function doPay() {
		$key = I ( 'key' );
		$money = I ( 'money' );
		
		if (empty ( $money )) {
			$this->error ( '110167:金额不能为空' );
		}
		if ($money < 2) {
			// $this->error ( '110168:金额不能少于 2元');
		}
		if (empty ( $key )) {
			$this->error ( '110169:参数缺失，请联系管理员' );
		}
		
		$from = "Home_ScanPayApi_doPayAfter";
		$url = addons_url ( 'Payment://Alipay/pay', array (
				'from' => $from,
				'orderName' => urlencode ( '支付悬赏金' ),
				'price' => $money,
				'token' => get_token (),
				'wecha_id' => get_openid (),
				'paytype' => 0,
				'orderNumber' => $key . '_' . NOW_TIME 
		) );
		
		$data ['status'] = 1;
		$data ['url'] = $url;
		$this->ajaxReturn ( $data );
	}
	function doPayAfter() {
		$map ['id'] = I ( 'paymentId' );
		$key = M ( 'payment_order' )->where ( $map )->getField ( 'single_orderid' );
		$arr = explode ( '_', $key );
		$key = $arr [0];
		S ( 'checkPay_' . $key, $map ['id'], 3600 );
		
		$this->display ( 'payok' );
	}
}