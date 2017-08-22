<?php

namespace Addons\ConfigureAccount\Controller;

use Think\ManageBaseController;

class ConfigureAccountController extends ManageBaseController {
	function lists() {
		$url = U ( 'Home/Apps/add', array('from'=>4) );
		redirect ( $url );
	}
}
