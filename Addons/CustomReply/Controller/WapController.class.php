<?php

namespace Addons\CustomReply\Controller;

use Think\WapBaseController;

class CustomReplyController extends WapBaseController {
	
	// 内容页面
	function detail() {
		$id = I ( 'get.id', 0, 'intval' );
		
		$info = D ( 'Addons://CustomReply/CustomReply' )->getInfo ( $id );
		$this->assign ( 'info', $info );
		
		D ( 'Common/Count' )->set ( 'custom_reply_news', $id, 'view_count' );
		
		// 增加积分
		add_credit ( 'custom_reply', 300 );
		
		$this->display ();
	}
}
