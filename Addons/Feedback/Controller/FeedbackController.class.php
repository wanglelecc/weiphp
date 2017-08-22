<?php

namespace Addons\Feedback\Controller;

use Think\ManageBaseController;

class FeedbackController extends ManageBaseController {
	// 通用插件的列表模型
	public function lists($model = null, $page = 0) {
		// 通用表单的控制开关
		$this->assign ( 'add_button', false );
		$this->assign ( 'del_button', true );
		$this->assign ( 'check_all', true );
		
		is_array ( $model ) || $model = $this->getModel ( $model );
		parent::common_lists ( $model, $page );
	}
}
