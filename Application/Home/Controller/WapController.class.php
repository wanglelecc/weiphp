<?php

namespace Home\Controller;

use Think\WapBaseController;

class WapController extends WapBaseController {
	function news_detail() {
		$map ['id'] = I ( 'id' );
		$info = M ( 'material_news' )->where ( $map )->find ();
		$this->assign ( 'info', $info );
		
		$this->display ();
	}
	function card() {
		// 初始化微信JSAPI需要的参数
		Vendor ( 'jssdk.jssdk' );
		$jssdk = new \JSSDK ( 'wx9e088eb8b3152ae2', '1b2c9f82c92cbb62dda72ed6e4fb8796' );
		$jsapiParams = $jssdk->GetsignPackage ();
		$this->assign ( 'js', $jsapiParams );
		
		$access_token = 'kNdtkgEASkQ600PY-NSmV67z-F52dxZoHLEwyezsha07y3rfVw0pyThNHlGRRjszAwvCuFatQujv55R-fIYvegBhXp6W24VPwzHBgcENmoN05SezMvE6VRvVhZNKvk4eYBWaABAORM';
		$ticket = api_ticket ( $access_token );
		
		// $param ['code'] = '';
		$param ['api_ticket'] = $ticket;
		$param ['card_id'] = 'prgF0t5TTYf8SfKtbXU3JRltG86U';
		$param ['timestamp'] = NOW_TIME;
		$param ['nonce_str'] = uniqid ();
		
		// 将 api_ticket、timestamp、card_id、code、openid、nonce_str的value值进行字符串的字典序排序
		
		asort ( $param, SORT_STRING );
		$sortString = "";
		foreach ( $param as $temp ) {
			$sortString = $sortString . $temp;
		}
		$param ['signature'] = sha1 ( $sortString );
		$param ['code'] = '';
		$param ['openid'] = '';
		unset ( $param ['api_ticket'] );
		$cardExt = json_encode ( $param );
		$this->assign ( 'cardExt', $cardExt );
		
		$this->display ();
	}
}
