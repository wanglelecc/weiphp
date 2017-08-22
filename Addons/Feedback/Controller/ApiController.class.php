<?php

namespace Addons\Feedback\Controller;

use Think\ApiBaseController;

class ApiController extends ApiBaseController {
	public function addFeedback() {
		$data ["username"] = I ( 'username' );
		
		$data ["from"] = I ( 'from', 0, 'intval' );
		
		$data ["is_dev"] = I ( 'is_dev' );
		// echo $data["switch"];
		$data ["is_dev"] = $data ["is_dev"] == true ? 1 : 0;
		
		$data ["area"] = I ( 'area', 0, 'intval' );
		$data ["score"] = I ( 'score', 0, 'intval' );
		
		$data ["product"] = str_replace ( array (
				'"',
				'[',
				']' 
		), '', I ( 'product' ) );
		
		$data ['cTime'] = NOW_TIME;
		
		$res = M ( 'feedback' )->add ( $data );
		echo intval ( $res );
	}
}
