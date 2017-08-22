<?php

namespace Addons\Ask\Controller;

use Think\ManageBaseController;

class AskController extends ManageBaseController {
	function preview() {
		$id = I ( 'id', 0, 'intval' );
		$url = U ( 'Wap/index', [ 
				'id' => $id 
		] );
		$this->assign ( 'url', $url );
		$this->display ( 'Home@Addons/preview' );
	}
	function ask_question() {
		$param ['mdm'] = $_GET ['mdm'];
		$param ['ask_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Ask://Question/lists', $param );
		// dump($url);
		redirect ( $url );
	}
	function ask_answer() {
		$param ['mdm'] = $_GET ['mdm'];
		$param ['ask_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Ask://Answer/lists', $param );
		// dump($url);
		redirect ( $url );
	}
}
