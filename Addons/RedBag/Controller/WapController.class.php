<?php

namespace Addons\RedBag\Controller;

use Think\WapBaseController;

class WapController extends WapBaseController {
	// 领取红包
	function collect() {
		$id = I ( 'id' );
		$msgData = D ( "Addons://RedBag/RedBag" )->getRedBag ( $id );
		
		$this->assign ( $msgData );
		$this->display ();
	}
	function index() {
		$id = I ( 'id' );
		
		$data = D ( 'Addons://RedBag/RedBag' )->getInfo ( $id );
		$this->assign ( 'data', $data );
		// dump ( $data );
		// exit ();
		$info = $public_info = get_token_appinfo ();
		
		$param ['publicid'] = $info ['id'];
		$param ['id'] = $id;
		$url = addons_url ( "RedBag://Wap/collect", $param );
		$this->assign ( 'jumpURL', $url );
		
		$this->assign ( 'public_info', $public_info );
		
		$this->display ();
	}
}
