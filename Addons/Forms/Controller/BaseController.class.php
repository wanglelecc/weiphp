<?php

namespace Addons\Forms\Controller;

use Think\ManageBaseController;

function get_forms_id() {
	return $_REQUEST ['forms_id'];
}
class BaseController extends ManageBaseController {
}
