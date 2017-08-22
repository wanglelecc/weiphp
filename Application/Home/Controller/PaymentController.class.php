<?php

namespace Home\Controller;

class PaymentController extends HomeController {
	// 交易流水
	function index() { // body out_trade_no total_fee auth_code
		$product = [ 
				'body' => '圆梦云--软件',
				'out_trade_no' => 'wx' . NOW_TIME,
				'total_fee' => 1,
				'auth_code' => '设备读取用户微信中的条码或者二维码信息' 
		];
		$callback = 'weixin/Service/payok';
		
		$appid = 'wx9e088eb8b3152ae2';
		
		$pay = D ( 'Common/Payment' )->micro_pay ( $appid, $product, $callback );
		if ($pay ['status'] == 0) {
			$this->error ( $pay ['msg'] );
		}
		
		$this->assign ( 'pay', $pay );
		
		return $this->fetch ();
	}
	function jsapi() {
		$product = [ 
				'openid' => 'orgF0t4eiPzEhD4Iv0o9VoKNnkVo',
				'body' => '圆梦云--软件',
				'out_trade_no' => 'wx' . NOW_TIME,
				'total_fee' => 1 
		];
		$callback = 'Common/Service/payok';
		
		$appid = 'wx9e088eb8b3152ae2';
		
		$pay = D ( 'Common/Payment' )->jsapi_pay ( $appid, $product, $callback );
		
		if ($pay ['status'] == 0) {
			$this->error ( $pay ['msg'] );
		}
		
		$this->assign ( 'pay', $pay );
		$this->assign ( 'jump_url', U ( 'show_success' ) );
		
		return $this->fetch ();
	}
	function redbag() {
		$appid = 'wx9e088eb8b3152ae2';
		$openid = 'orgF0t4eiPzEhD4Iv0o9VoKNnkV55o';
		$money = '100';
		$res = D ( 'Common/RedbagRecode' )->add_redbag ( $appid, $openid, $money, [ ], false );
		dump ( $res );
		exit ();
		if ($res ['status'] == 0) {
			$this->error ( $res ['msg'] );
		} else {
			dump ( $res );
		}
	}
	// 账号配置
	function config() {
		return $this->fetch ();
	}
	// 测试支付
	function test() {
	}
}
