<?php

namespace Addons\Reserve\Controller;

use Think\ManageBaseController;

function get_reserve_id() {
	return $_REQUEST ['reserve_id'];
}
class BaseController extends ManageBaseController {
}
